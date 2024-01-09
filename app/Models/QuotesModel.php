<?php

namespace App\Models;

use App\Helpers\AuthHelper;
use App\Mail\NotifMail;
use App\Mail\PaymentMail;
use App\Mail\SendMail;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Models\CarsModel;

class QuotesModel extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
        'costumer_name',
        'invoice_number',
        'type',
        'item_name',
        'customer_note',
        'payment_date',
        'payment_ammount',
        'payment_status',
        'payment_mode',
        'payment_notes',
        'status',
        'mail_status',
        'request_change',
        'file',
        'payment_file',
        'memo',
        'payment_url',
        'terms_conditions',
        'reference',
        'item_amount',
        'item_total_amount',
        'total_amount',
        'note_business',
        'created_at',
        'updated_at',
        'user_id',
    ];
    protected $table = "quotes";
    protected $primaryKey = 'id';


    public static function getData($id = null)
    {
        $where = "";
        if ($id) {
            $where .= 'WHERE q.id=' . $id;
        }
        $SQL = "SELECT * FROM quotes q
        $where
        ORDER BY c.created_at DESC ";
        $res = DB::select($SQL);
        return $res;
    }

    public static  function saveData($req, $mail)
    {
        $items = [];
        foreach ($req->datas as $key => $value) {
            $list = [
                'item_name'     => $value['item_name'],
                'quantity'      => $value['qty'],
                'price'         => $value['price'],
                'tax'           => $value['tax'],
                'description'   => $value['description'],
            ];
            $items[] = $list;
        }
        DB::beginTransaction();
        try {
            $dataHeader = array(
                'name'              => $req->email_address,
                'customer_name'     => $req->customer_name,
                'invoice_number'    => QuotesModel::invoiceNumber(),
                'type'              => 'quantity',
                'customer_note'     => $req->customer_note,
                'mail_status'       => $mail == 'send' ? 'sent' : 'draft',
                'terms_conditions'  => $req->terms_conditions,
                'reference'         => $req->reference,
                'total_amount'      => $req->totals,
                'note_business'     => '-',
                'created_at'        => date('Y-m-d H:i:s'),
                'user_id'           => Session('idUser'),
                'item_name'         => json_encode($items),
                'payment_date'      => date('Y-m-d'),
                'payment_amount'    => $req->totals,
                'payment_status'    => '-',
                'payment_mode'      => '-',
                'payment_notes'     => '-',
                'status'            => '1',
                'request_change'    => '-',
                'file'              => '-',
                'payment_file'      => '-',
                'memo'              => $req->note_business,
                'payment_url'       => $req->gallery,
                'item_amount'       => '-',
                'item_total_amount' => '-',
            );

            if ($req->file('file')) {
                $file = $req->file('file');
                $filename = 'file_quotes' . rand(42, 25)  . $file->getClientOriginalName();
                $file->move(public_path('admin/img/quotes'), $filename);
                $dataHeader['file'] = $filename;
            }


            DB::table('quotes')->insert($dataHeader);
            $last_id = DB::getPdo()->lastInsertId();
            $detail = array();
            foreach ($req->datas as $key => $value) {
                $total = floatval($value['price']) * floatval($value['qty']);
                $tax = 0;
                $tax = floatval($total) * floatval($value['tax']);
                $amount = $total + $tax;
                $items = [
                    'item'          => $value['item_name'],
                    'qty'           => $value['qty'],
                    'price'         => $value['price'],
                    'tax'           => $value['tax'],
                    'description'   => $value['description'],
                    'quotes_id'     => $last_id,
                    'total'         => floatval($value['price']) * floatval($value['qty']),
                    'amount'        => floatval($value['price']) * floatval($value['qty']) + $tax,
                    'created_at'    => date('Y-m-d H:i:s'),
                    'created_by'    => Session('idUser')
                ];
                $detail[] = $items;
            }

            if ($mail == 'send') {
                $mailData = [
                    'subject' => 'Cotización ' . QuotesModel::invoiceNumber() . ' | Mundochiapas.com',
                    'data'    => $detail,
                    'title'     => 'Cotización ' . QuotesModel::invoiceNumber() . ' | Mundochiapas.com',
                    'note'     => $req->customer_note,
                    'costumer'  => $req->customer_name,
                    'email'  => $req->email_address,
                    'services'  => $req->terms_conditions,
                    'invoice'   => QuotesModel::invoiceNumber(),
                    'fecha'     => date('Y-m-d H:i:s'),
                    'gallery'   => $req->gallery,
                    'ids'       =>  $last_id
                ];
                self::sendMail($req->email_address, $mailData);
            }
            DB::table('quotes_items')->insert($detail);
            DB::commit();

            return true;
        } catch (\Exception $e) {
            DB::rollback();
            return $e;
        }
    }

    public static function deleteData($req)
    {
        $id  = $req->input('id');

        DB::beginTransaction();
        try {
            $SQL3  = "DELETE FROM quotes_items where quotes_id ='$id' ";
            $SQL2  = "DELETE FROM quotes_payment where quotes_id ='$id' ";
            $SQL  = "DELETE FROM quotes where id ='$id' ";
            DB::delete($SQL3);
            DB::delete($SQL2);
            DB::delete($SQL);
            DB::commit();
            return 1;
        } catch (\Exception $e) {
            DB::rollback();
            return $e;
            // return 0;
        }
    }

    public static function deleteAll($req)
    {

        DB::beginTransaction();
        try {
            $ids = $req->id_check;
            DB::table("quotes_payment")->whereIn('quotes_id', $ids)->delete();
            DB::table("quotes_items")->whereIn('quotes_id', $ids)->delete();
            DB::table("quotes")->whereIn('id', $ids)->delete();
            DB::commit();
            return true;
        } catch (\Exception $e) {
            DB::rollback();
            return $e;
            // return 0;
        }
    }

    public static function deletePayment($req)
    {

        DB::beginTransaction();
        try {
            $ids = $req->id;
            DB::table("quotes_payment")->where('id', $ids)->delete();
            DB::commit();
            return true;
        } catch (\Exception $e) {
            DB::rollback();
            return $e;
            // return 0;
        }
    }

    public static function  invoiceNumber()
    {
        $data = DB::select("select max(id) as ids, invoice_number as inv from quotes  group by invoice_number order by id desc");
        if (count($data) > 0) {
            $dataInv = $data[0]->inv;
            $invoice = explode("-", $dataInv)[1];
            if (strlen($invoice) === 4) {
                return date('Ymd-') . "0" . $invoice + 1;
            } else {
                return date('Ymd-') . $invoice + 1;
            }
        } else {
            return date('Ymd-') . '0001';
        }
    }

    public static function sendMail($to, $mailData)
    {
        $ccEmails = ["reservaciones@mundochiapas.com"];
        // , "direccion@mundochiapas.com", "depiyawandasep13@gmail.com, "direccion@mundochiapas.com""
        // Mail::to($to)
        Mail::to($to)
            ->cc("reservaciones@mundochiapas.com")
            // ->bcc("direccion@mundochiapas.com")
            ->send(new SendMail($mailData));
    }


    public static function updateData($req, $mail)
    {
        $id  = $req->input('id');
        // $totals  = $req->input('totals');
        $totals  = 0;
        $customer_name  = $req->input('customer_name');
        $email_address  = $req->input('email_address');
        $customer_note  = $req->input('customer_note');
        $terms_conditions  = $req->input('terms_conditions');
        $reference  = $req->input('reference');
        $gallery  = $req->input('gallery');
        $note_business  = $req->input('note_business');



        $datas = QuotesModel::find($id);

        DB::beginTransaction();
        try {

            $datas->customer_name       =  $customer_name;
            $datas->name                =  $email_address;
            $datas->customer_note       =  $customer_note;
            $datas->terms_conditions    =  $terms_conditions;
            $datas->reference           =  $reference;
            $datas->payment_url         =  $gallery;
            $datas->memo                =  $note_business;
            // $datas->total_amount        =  $totals;
            $datas->updated_at          =  date('Y-m-d H:i:s');

            if ($req->file('file')) {
                $file = $req->file('file');
                $filename = 'file_quotes' . rand(42, 25)  . $file->getClientOriginalName();
                $file->move(public_path('admin/img/quotes'), $filename);
                $datas->file = $filename;
            }

            DB::delete("delete from quotes_items where quotes_id = '$id' ");
            $detail = array();
            foreach ($req->datas as $key => $value) {
                $total = floatval($value['price']) * floatval($value['qty']);
                $tax = 0;
                $tax = floatval($total) * floatval($value['tax']);
                $items = [
                    'item'          => $value['item_name'],
                    'qty'           => $value['qty'],
                    'price'         => $value['price'],
                    'tax'           => $value['tax'],
                    'description'   => $value['description'],
                    'quotes_id'     => $id,
                    'total'         => floatval($value['price']) * floatval($value['qty']),
                    'amount'        => floatval($value['price']) * floatval($value['qty']) + $tax,
                    'created_at'    => date('Y-m-d H:i:s'),
                    'created_by'    => Session('idUser')
                ];
                $detail[] = $items;
                $totals += $total + $tax;
            }
            DB::table('quotes_items')->insert($detail);
            $datas->total_amount   = $totals;
            if ($mail == 'resend') {
                $datas->mail_status     =  'sent';
                $mailData = [
                    'subject'   => 'Cotización  ' .  $datas->invoice_number . ' | Mundochiapas.com',
                    'data'      => $detail,
                    'title'     => 'Cotización  ' . $datas->invoice_number  . ' | Mundochiapas.com ',
                    'note'      => $req->customer_note,
                    'costumer'  => $req->customer_name,
                    'email'     => $req->email_address,
                    'services'  => $req->terms_conditions,
                    'invoice'   => $datas->invoice_number,
                    'fecha'     => date('Y-m-d H:i:s'),
                    'gallery'   => $req->gallery,
                    'ids'       => $id
                ];
                self::sendMail($req->email_address, $mailData);
            }

            $datas->save();
            DB::commit();
            return true;
        } catch (\Exception $e) {
            DB::rollback();
            return $e;
        }
    }

    public static function approve($req)
    {
        $status = $req->s;
        $ids    = $req->id;
        $datas = QuotesModel::find($ids);

        DB::beginTransaction();
        try {

            $datas->mail_status   =  $status == 'yes' ?  'Approved' : 'Rejected';
            $datas->updated_at    = date('Y-m-d H:i:s');

            // search cars 
            $cars_sql = DB::select("SELECT cars_id from cost_per_services WHERE id= '$datas->reference' ");
            $cars_datas = CarsModel::find($cars_sql[0]->cars_id);
            $cars_datas->car_status  = 'Reservado';

            $quotesId = $datas->id;
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

            // $mailData = [
            //     'subject' => 'Solicitud de Pago || ' .  $dataCustomers[0]->invoice_number,
            //     'amount'  => $amount[0]->total,
            //     'data'    => $dataCustomers,
            //     'status'   => 1,
            //     'quotesId' => base64_encode($quotesId)
            // ];
            // Mail::to($datas->name)
            //     ->send(new PaymentMail($mailData));

            $mailData = [
                'subject'   => 'Solicitud de Pago || ' .  $dataCustomers[0]->invoice_number,
                'res'       => QuotesModel::find($quotesId),
                'ammount'   => $amount[0]->total
            ];
            Mail::to($datas->name)
                ->send(new NotifMail($mailData));

            $cars_datas->save();
            $datas->save();
            DB::commit();
            return true;
        } catch (\Exception $e) {
            DB::rollback();
            return $e;
        }
    }


    public static function paymentBalance($id)
    {
        $data = DB::select("SELECT SUM(amount) as totals FROM quotes_payment WHERE quotes_id = $id ");
        if (count($data) > 0) {
            return $data[0]->totals;
        } else {
            return 0;
        }
    }

    public  static function countSugestedPrice($id)
    {
        if (!empty($id)) {
            $data = DB::select("SELECT  ROUND((cps.total_cost / (1 - cps.utility / 100 )),3) as sugested from cost_per_services cps 
            where cps.id = $id ");
            if (count($data) > 0) {
                return $data[0]->sugested;
            } else {
                return 0;
            }
        } else {
            return 0;
        }
    }



    public static function uploadInvoice($req)
    {
        $quotes_id = $req->quotes_inv_id;
        $invoice_num = $req->invoice_num;
        $show = $req->show;
        $invoice = $_FILES['invoice']['name'];
        $invoice_list = array();
        DB::beginTransaction();
        try {
            for ($i = 0; $i < count($invoice); $i++) {
                $tmpFilePath = $_FILES['invoice']['tmp_name'][$i];
                $filenames =   $_FILES['invoice']['name'];
                $extension = pathinfo($filenames[$i], PATHINFO_EXTENSION);
                $names =  $invoice_num . '-' . $i . '.' . $extension;
                //Setup our new file path
                $newFilePath = "./public/invoice/" .  $names;
                if (move_uploaded_file($tmpFilePath,  $newFilePath)) {
                    //Handle other code here
                    $dt =  array(
                        'quotes_id'     => $quotes_id,
                        'name_invoice'  => $names,
                        'showing'       => $show[$i],
                        'created_at'    => date('Y-m-d H:i:s'),
                        'created_by'    => Session('idUser'),
                    );
                    $invoice_list[] = $dt;
                }
            }
            DB::table('quotes_invoice')->insert($invoice_list);
            DB::commit();
            return  true;
        } catch (\Exception $e) {
            DB::rollback();
            return $e;
        }
    }

    public static function showInvoice($req)
    {
        $SQL = "SELECT * FROM quotes_invoice WHERE quotes_id = $req->quotes_id";
        return DB::select($SQL);
    }

    public static function deleteInvoice($req)
    {

        $id  = $_GET['quote_id'];

        DB::beginTransaction();
        try {
            $SQL  = "DELETE FROM quotes_invoice where id ='$id' ";
            DB::delete($SQL);
            DB::commit();
            return true;
        } catch (\Exception $e) {
            DB::rollback();
            return $e;
            // return 0;
        }
    }
}
