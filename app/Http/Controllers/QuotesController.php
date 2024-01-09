<?php

namespace App\Http\Controllers;

use App\Mail\NotifMail;
use App\Mail\SendMail;
use App\Models\CosModel;
use App\Models\QuotesModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;
use PDF;
use Barryvdh\DomPDF\Facade\Pdf as pdfs;

class QuotesController extends Controller
{

    public function index(): View
    {
        $data = [
            'data' => QuotesModel::orderBy('created_at', 'desc')->limit(10)->get()
        ];
        return view('admin/quotes/listmaster', $data);
    }

    public function formAdd(): View
    {

        $data = [
            'references'    => CosModel::orderBy('created_at', 'DESC')->limit(10)->get(),
            'invoice'       => QuotesModel::invoiceNumber()
        ];
        return view('admin/quotes/form_add', $data);
    }

    public function added(Request $req)
    {
        if (isset($_POST['send'])) {
            $save = QuotesModel::saveData($req, 'send');
            // dd($save);
            if ($save) {
                return redirect('/quotes')->with(['success' => 'Success Send Quotes']);
            } else {
                return redirect('/quotes')->with(['failed' => 'Failed Add Data ']);
            }
        }

        if (isset($_POST['save'])) {
            $save = QuotesModel::saveData($req, 'save');
            if ($save) {
                return redirect('/quotes')->with(['success' => 'Success Add Quotes']);
            } else {
                return redirect('/quotes')->with(['failed' => 'Failed Add Data ']);
            }
        }
    }

    public function formedited(Request $req): View
    {
        $id = $req->input('id');
        $data = [
            'data'      => QuotesModel::find($id),
            'references' => CosModel::orderBy('created_at', 'DESC')->get(),
            'items'     => DB::select("SELECT * FROM quotes_items WHERE quotes_id= $id ")
        ];
        return view('admin/quotes/form_edit', $data);
    }

    public function updated(Request $req)
    {
        if (isset($_POST['resend'])) {
            $save = QuotesModel::updateData($req, 'resend');
            // dd($save);
            if ($save) {
                return redirect('/quotes')->with(['success' => 'Success Resend Quotes']);
            } else {
                return redirect('/quotes/edited?id=' . $req->id)->with(['failed' => 'Failed Resend Data ']);
            }
        }

        if (isset($_POST['update'])) {
            $save = QuotesModel::updateData($req, 'update');
            if ($save) {
                return redirect('/quotes')->with(['success' => 'Success Update Quotes']);
            } else {
                return redirect('/quotes/edited?id=' . $req->id)->with(['failed' => 'Failed Update Data ']);
            }
        }
    }

    public function mail_template(Request $req)
    {
        $id = $req->input('id');
        $data = [
            'data'      => QuotesModel::find($id),
        ];
        return view('admin/quotes/template_mail', $data);
    }

    public function approve(Request $req)
    {
        $update  = QuotesModel::approve($req);
        $ids    = $req->id;
        if ($update) {
            return redirect('notifEmail?q=' . base64_encode($ids))->with(['success' => 'Success Approve Quotes , Check Your Mail To Get Payment Link']);
        } else {
            return redirect('notifEmail?q=' . base64_encode($ids))->with(['failed' => 'Failed Update Data ']);
        }
    }

    public static function infoApprove(): View
    {
        $res  = QuotesModel::find(base64_decode($_GET['q']));
        $amount = DB::select("SELECT IFNULL(ROUND(SUM(X.amount),2),0)as total  from quotes q 
                left join (
                select SUM(qi.amount)amount , qi.quotes_id  from quotes_items qi 
                where  qi.quotes_id  = $res->id  
                )X on X.quotes_id = q.id  ");
        $data = [
            'res' => $res,
            'amount'  => $amount[0]->total,
        ];
        return view('admin/email/notification', $data);
    }


    public static function paymentQuotes(Request $req)
    {
        $quotes_id = $req->quotes_id;
        $payment_date = $req->payment_date;
        $amount = $req->amount;
        $payment_status = $req->payment_status;
        $payment_mode = $req->payment_mode;
        $payment_notes = $req->payment_notes;
        $ref = $req->ref_id;
        $balance = 0;



        DB::beginTransaction();
        try {
            $search = DB::select("SELECT * FROM quotes_payment WHERE quotes_id ='$quotes_id' ");
            $quotesHeader = QuotesModel::find($req->quotes_id);
            $saldo  = $quotesHeader->total_amount;
            if (count($search) <= 0) {
                $balance = $saldo - $amount;
            } else {
                $searchSaldo = DB::select("select sum(amount) as balances  from quotes_payment where quotes_id ='$quotes_id' ");
                $balance =  $saldo - ($searchSaldo[0]->balances + $amount);
            }
            $dataPayment = array(
                'amount'         => $amount,
                'payment_mode'   => $payment_mode,
                'payment_date'   => $payment_date,
                'payment_note'   => $payment_notes,
                'payment_status' => $payment_status,
                'payment_proof'  => '',
                'date_reg'       => date('Y-m-d H:i:s'),
                'balance'        => $balance,
                'quotes_id'      => $quotes_id,
            );
            if ($req->file('payment_proof')) {
                $file = $req->file('payment_proof');
                $filename = 'PAYMENT' . rand(42, 25)  . $file->getClientOriginalName();
                $file->move(public_path('admin/img/payment/'), $filename);
                $dataPayment['payment_proof'] = $filename;
            }


            DB::table('quotes_payment')->insert($dataPayment);

            $datapayments = DB::select("SELECT ROUND(SUM(amount),2) as total_amount FROM quotes_items WHERE quotes_id = '$quotes_id' ");
            $quotesPayment =  DB::select("SELECT ROUND(SUM(amount),2) as totals FROM quotes_payment WHERE quotes_id = '$quotes_id' ");



            // if ($datapayments[0]->total_amount >= $quotesPayment[0]->totals) {
            // if (floatval($quotesPayment[0]->totals) >= floatval($datapayments[0]->total_amount)) {
            //     DB::table('services')
            //         ->where('costperservices_id', $ref)
            //         ->update(['payment_status' => 'Paid']);
            // }

            if (floatval($quotesPayment[0]->totals) >= floatval($datapayments[0]->total_amount)) {
                DB::table('services')
                    ->where('costperservices_id', $ref)
                    ->update(['payment_status' => 'Paid']);

                DB::table('quotes')
                    ->where('id', $quotes_id)
                    ->update(['payment_status' => 'Paid']);
            } else {
                DB::table('quotes')
                    ->where('id', $quotes_id)
                    ->update(['payment_status' => 'Partial']);
            }

            DB::commit();
            return redirect('/quotes')->with(['success' => 'Success Add Payment']);
        } catch (\Exception $e) {
            DB::rollback();
            // dd($e);
            return redirect('/quotes')->with(['failed' => 'Failed Add Payment ']);
        }
    }

    public static function  showPayment(Request $req)
    {
        $data = DB::select("SELECT * FROM quotes_payment WHERE quotes_id = $req->ids ");
        return response()->json($data);
    }


    public static function pdfReport(Request $req)
    {
        $details = QuotesModel::find($req->id);
        $filename = 'Presupuesto' . $details->invoice_number . '.pdf';
        $data = [
            'data' =>  QuotesModel::find($req->id),
            'items' => DB::select("SELECT * FROM quotes_items where quotes_id = $req->id "),
            'title' => $filename
        ];

        $pdf = pdfs::loadView('admin/quotes/report_pdf_v2', $data)->setPaper('a4', 'portrait');
        return $pdf->stream($filename, array('attachment' => true));
    }

    public static function getQuotes(Request $req)
    {
        $data = QuotesModel::orderBy('created_at', 'desc')->get();
        $SQL = "SELECT * FROM quotes WHERE  id != ''  ";

        $invoice = $req->invoice_number;
        $customer_name = $req->customer_name;
        $email = $req->email;
        $status = $req->status;

        if ($invoice) {
            $SQL .= "AND invoice_number like '%$invoice%'";
        }

        if ($customer_name) {
            $SQL .= "AND customer_name like '%$customer_name%'";
        }

        if ($email) {
            $SQL .= "AND name like '%$email%'";
        }

        if ($status) {
            $SQL .= "AND mail_status like '%$status%'";
        }


        $SQL .= "ORDER BY created_at DESC";
        $queries = DB::select($SQL);
        $res = array();
        foreach ($queries as $d) {
            $balances = QuotesModel::paymentBalance($d->id);
            $res[] = array(
                'id'                => $d->id,
                'invoice_number'    => $d->invoice_number,
                'customer_name'     => ucwords(strtolower($d->customer_name)),
                'name'              => ucwords(strtolower($d->name)),
                'customer_name'     => ucwords(strtolower($d->customer_name)),
                'total_amount'      => number_format((float)$d->total_amount, 2),
                'mail_status'       => $d->mail_status,
                'reference'         => $d->reference,
                'payment_status'    => $d->payment_status,
                'balance'           => number_format((float)$balances, 2),

            );
        }
        return response()->json($res);
    }

    public static function deleteData(Request $req)
    {
        $delete = QuotesModel::deleteData($req);
        if ($delete) {
            return redirect('/quotes')->with(['success' => 'Success Delete Data']);
        } else {
            return redirect('/quotes')->with(['failed' => 'Failed Delete Data ']);
        }
    }

    public function deleteAll(Request $req)
    {
        $delete = QuotesModel::deleteAll($req);
        if ($delete) {
            return redirect('/quotes')->with(['success' => 'Success Delete Data']);
        } else {
            return redirect('/quotes')->with(['failed' => 'Failed Delete Data ']);
        }
    }

    public function deletePayment(Request $req)
    {
        $delete = QuotesModel::deletePayment($req);
        if ($delete) {
            return redirect('/quotes')->with(['success' => 'Success Delete Data']);
        } else {
            return redirect('/quotes')->with(['failed' => 'Failed Delete Data ']);
        }
    }

    public function delete(Request $req)
    {
        $delete = QuotesModel::deleteData($req);
        if ($delete) {
            return redirect('/quotes')->with(['success' => 'Success Delete Data']);
        } else {
            return redirect('/quotes')->with(['failed' => 'Failed Delete Data ']);
        }
    }

    public function tesmail(Request $req)
    {
        $mailData = [
            'subject'   => 'Information',
            'res'       => QuotesModel::find(4),
            'ammount'   => 1
        ];
        Mail::to("depiyawandasep13@gmail.com")
            ->send(new NotifMail($mailData));
    }

    public function updateInvoice(Request $req)
    {
        $save = QuotesModel::uploadInvoice($req);
        // dd($save);
        if ($save) {
            return redirect('/quotes')->with(['success' => 'Success Upload Invoice']);
        } else {
            return redirect('/quotes')->with(['failed' => 'Failed Upload Invoice']);
        }
    }
    public function showInvoice(Request $req)
    {
        $res = QuotesModel::showInvoice($req);
        return response()->json($res);
    }

    public function deleteInvoice(Request $req)
    {
        $delete = QuotesModel::deleteInvoice($req);
        // dd($delete);
        if ($delete) {
            return redirect('/quotes')->with(['success' => 'Success Delete Invoice']);
        } else {
            return redirect('/quotes')->with(['failed' => 'Failed Delete Invoice']);
        }
    }
}
