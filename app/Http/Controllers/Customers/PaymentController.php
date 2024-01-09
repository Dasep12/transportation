<?php

namespace App\Http\Controllers\Customers;

use App\Http\Controllers\Controller;
use App\Mail\PaymentMail;
use App\Models\QuotesModel;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Svg\Tag\Rect;
use Symfony\Component\HttpFoundation\RedirectResponse as HttpFoundationRedirectResponse;
use Illuminate\Support\Facades\Mail;

class PaymentController extends Controller
{
    //

    public function index()
    {
        $quotesId = base64_decode($_GET['idQuotes']);
        $quoteData = QuotesModel::where('id', $quotesId);

        if ($quoteData->count() > 0) {
            $amount = DB::select("SELECT IFNULL(ROUND(SUM(X.amount),2),0)as total  from quotes q 
                left join (
                select SUM(qi.amount)amount , qi.quotes_id  from quotes_items qi 
                where  qi.quotes_id  = $quotesId  
                )X on X.quotes_id = q.id ");

            $data = [
                'message' => null,
                'data'     => QuotesModel::find($quotesId),
                'amount'    => $amount[0]->total,
                'quotesId'  => $quotesId
            ];
            return view('customers/payment_form', $data);
        } else {
            echo "<center>NOT FOUND DATA</center>";
        }
    }


    public function sendMail()
    {
        $quotesId = base64_decode($_GET['quotesId']);

        $amount = DB::select("SELECT IFNULL(ROUND(SUM(X.amount),2),0)as total  from quotes q 
                left join (
                select SUM(qi.amount)amount , qi.quotes_id  from quotes_items qi 
                where  qi.quotes_id  = $quotesId  
                )X on X.quotes_id = q.id  ");

        $dataCustomers  = DB::select("SELECT q.payment_status ,  q.invoice_number , q.name as mails ,  q.customer_name as customer,   concat(cps.destination_city,'-', cps.departure_city)  rute , concat(cps.returning_date,' ' , cps.returning_time)return_times  , concat(cps.departure_date,' ' , cps.departure_time)times 
            from quotes q 
            left join cost_per_services cps on cps.id  = q.reference 
            where q.id = $quotesId ");

        try {
            if (count($dataCustomers) > 0) {
                $mailData = [
                    'subject' => 'Solicitud de Pago || ' .  $dataCustomers[0]->invoice_number,
                    'amount'  => $amount[0]->total,
                    'data'    => $dataCustomers,
                    'status'   => 1,
                    'quotesId' => base64_encode($quotesId)
                ];
                Mail::to($dataCustomers[0]->mails)
                    ->send(new PaymentMail($mailData));
                echo true;
            } else {
                echo "err";
            }
        } catch (\Exception $e) {
            echo 'err';
        }
    }



    // update payment VIA mundochiapas tour method POST 
    public function updatePaymentBonerte(Request $req)
    {
        $quotes_id = (int) base64_decode($req->qId);
        $amount = (float) base64_decode($req->t);
        $payment_date   = base64_decode($req->CUST_RSP_DATE);
        $payment_status = 'Trasferencia';
        $payment_mode = "Trasferencia";
        $payment_notes = "";
        $balance = (float) 0;
        DB::beginTransaction();
        try {
            $search = DB::select("SELECT * FROM quotes_payment WHERE quotes_id ='$quotes_id' ");
            $quotesHeader = QuotesModel::find($quotes_id);
            $saldo  = (float)$quotesHeader->total_amount;
            if (count($search) <= 0) {
                $balance = $saldo - $amount;
            } else {
                $searchSaldo = DB::select("select sum(amount) as balances  from quotes_payment where quotes_id ='$quotes_id' ");
                $balance =  $saldo - ($searchSaldo[0]->balances + $amount);
            }
            $dataPayment = array(
                'amount'         => $amount,
                'payment_mode'   => $payment_mode,
                'payment_date'   => date('Y-m-d'),
                'payment_note'   => $payment_notes,
                'payment_status' => $payment_status,
                'payment_proof'  => '',
                'date_reg'       => date('Y-m-d H:i:s'),
                'balance'        => $balance,
                'quotes_id'      => $quotes_id,
            );
            // dd($dataPayment);

            DB::table('quotes_payment')->insert($dataPayment);

            $datapayments = DB::select("SELECT ROUND(SUM(amount),2) as total_amount FROM quotes_items WHERE quotes_id = '$quotes_id' ");
            $quotesPayment =  DB::select("SELECT ROUND(SUM(amount),2) as totals FROM quotes_payment WHERE quotes_id = '$quotes_id' ");

            if (floatval($quotesPayment[0]->totals) >= floatval($datapayments[0]->total_amount)) {
                DB::table('services')
                    ->where('costperservices_id', $quotesHeader->reference)
                    ->update(['payment_status' => 'Paid']);

                DB::table('quotes')
                    ->where('id', $quotes_id)
                    ->update(['payment_status' => 'Paid']);
            }


            $quotesId = $quotes_id;
            $amount = DB::select("SELECT IFNULL(ROUND(SUM(X.amount),2),0)as total 
             from quotes q 
                left join (
                select SUM(qi.amount)amount , qi.quotes_id  from quotes_items qi 
                where  qi.quotes_id  = $quotesId  
            )X on X.quotes_id = q.id ");

            $dataCustomers  = DB::select("SELECT q.payment_status ,  q.invoice_number , q.name as mails ,  q.customer_name as customer,   concat(cps.destination_city,'-', cps.departure_city)  rute , concat(cps.returning_date,' ' , cps.returning_time)return_times  , concat(cps.departure_date,' ' , cps.departure_time)times 
            from quotes q 
            left join cost_per_services cps on cps.id  = q.reference 
            where q.id = $quotesId ");
            $ccEmails = ["reservaciones@mundochiapas.com", "direccion@mundochiapas.com"];
            $mailData = [
                'subject' => 'Solicitud de Pago || ' .  $dataCustomers[0]->invoice_number,
                'amount'  => $amount[0]->total,
                'data'    => $dataCustomers,
                'status'   => 0,
                'quotesId' => base64_encode($quotesId)
            ];
            Mail::to($dataCustomers[0]->mails)
                ->cc($ccEmails)
                ->send(new PaymentMail($mailData));

            DB::commit();
            return redirect('/showPaymentRes?q=' . base64_encode($quotesId));
        } catch (\Exception $e) {
            DB::rollback();
            // dd($e);
            return redirect('/booking_details')->with(['failed' => 'Failed Add Payment ']);
        }
    }

    // public function payment_response(Request $req)
    // {

    //     $post   = $_POST;

    //     $post['Number']     = $_GET['number'];
    //     $post['Expires']     = $_GET['exp'];
    //     $post['sc']        = base64_decode($_GET['sc']);
    //     $post['bti'] = 'A-0';
    //     $post['Total']     = 1;
    //     $data = [
    //         'post' => $post,
    //     ];


    //     return view('customers/payment_send', $data);
    // }

    public function check_cc($cc)
    {
        $cards = array(
            'visa' => '(4\d{12}(?:\d{3})?)',
            'mastercard' => '(5[1-5]\d{14})',
        );
        $names = array('VISA', 'MC');
        $matches = array();
        $pattern = '#^(?:' . implode('|', $cards) . ')$#';
        $result = preg_match($pattern, str_replace(' ', '', $cc), $matches);
        return response()->json(['result' => ($result > 0) ? $names[sizeof($matches) - 2] : false], 200);
    }

    public function showPaymentRes(Request $req)
    {
        // dd(base64_encode(6));

        $quotesId = base64_decode($_GET['q']);
        $amount = DB::select("SELECT IFNULL(ROUND(SUM(X.amount),2),0)as total 
         from quotes q 
            left join (
            select SUM(qi.amount)amount , qi.quotes_id  from quotes_items qi 
            where  qi.quotes_id  = $quotesId  
        )X on X.quotes_id = q.id ");

        $dataCustomers  = DB::select("SELECT q.payment_status ,  q.invoice_number , q.name as mails ,  q.customer_name as customer,   concat(cps.destination_city,'-', cps.departure_city)  rute , concat(cps.returning_date,' ' , cps.returning_time)return_times  , concat(cps.departure_date,' ' , cps.departure_time)times 
            from quotes q 
            left join cost_per_services cps on cps.id  = q.reference 
            where q.id = $quotesId ");

        $data = [
            'mailData'   => ['data' => $dataCustomers,  'amount'  => $amount[0]->total, 'quotesId'   => base64_encode($quotesId), 'status'   => 0,],
            'subject'    => 'Payment || ' .  $dataCustomers[0]->invoice_number,
            'status'     => 0,
        ];
        return view('customers/template_mail', $data);
    }
}
