<?php

namespace App\Models;

use App\Helpers\AuthHelper;
use App\Mail\OrdenMail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class OrdendePagoModel extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'date',
        'terms',
        'contact',
        'total',
        'date_reg',
        'supplier_id',
        'company_id',
        'applicant_id',
        'approved',
        'date_approved',
        'approved_id',
        'type_id',
        'user_id',
        'concept_id',
        'created_at',
        'updated_at',
        'created_by',
    ];
    protected $table = "payment_order";
    protected $primaryKey = 'id';



    public static function getData($id = null)
    {

        $whereId = "";
        if ($id != null) {
            $whereId .= " WHERE id='$id'";
        }
        $SQL = "SELECT * FROM payment_order c 
        ORDER BY created_at DESC ";
        $res = DB::select($SQL);
        return $res;
    }

    public static  function saveData($req)
    {
        $supplier_id        = $req->input('supplier_id');
        $applicant_id       = $req->input('applicant_id');
        $company_id         = $req->input('company_id');
        $concept_id         = $req->input('concept_id');
        $type_id            = $req->input('type_id');
        $date               = $req->input('date');
        $terms              = $req->input('terms');
        $total              = $req->input('total');
        $cost_id              = $req->input('cost_id');

        $totalPayments = 0;
        foreach ($req->input('count') as $key => $val) {
            $total = $req->count[$key] * $req->price_u[$key];
            $totalPayments += $total;
        }

        $dataSave = array(
            'date'               => $date,
            'terms'              => $terms,
            'total'              => $total,
            'date_reg'           => date('Y-m-d H:i:s'),
            'supplier_id'        => $supplier_id,
            'company_id'         => $company_id,
            'type_id'            => $type_id,
            'cost_id'            => $cost_id,
            'applicant_id'       => $applicant_id,
            'concept_id'         => $concept_id,
            'approved'           => 'En proceso',
            'created_at'         => date('Y-m-d H:i:s'),
            'created_by'         => Session('idUser'),
            'user_id'            => Session('idUser'),
            'total'              => $totalPayments
        );


        DB::beginTransaction();
        try {
            DB::table('payment_order')->insert($dataSave);
            $lastId = DB::getPdo()->lastInsertId();
            $detailTrans = [];

            foreach ($req->input('count') as $key => $val) {
                $detailTrans[] = array(
                    'description'   => $req->description[$key],
                    'quantity'      => $req->count[$key],
                    'unit_price'    => $req->price_u[$key],
                    'order_id'      => $lastId,
                    'total'         => $req->count[$key] * $req->price_u[$key]
                );
            }
            DB::table('payment_order_product')->insert($detailTrans);
            DB::commit();


            $SQL = "SELECT po.id as ids , cm.name as company , sp.name  as suppliers , concat(us.first_name ,' ' , us.last_name) as aplicant  , po.approved , sp.id as idprevedor ,
                po.terms  ,  po.`date` as dates , pc.concept , pt.description as statues  , po.total ,
                sp.bank_data  
                from payment_order po
                left join supplier sp on sp.id  = po.supplier_id 
                left join supplier cm on cm.id  = po.company_id 
                left join users us on us.id = po.applicant_id 
                left join payment_concept pc on pc.id  = po.concept_id 
                left join payment_types pt on pt.id  = po.type_id WHERE po.id = '$lastId'  ";
            $datasMail = DB::select($SQL);
            $mailData = [
                'data'          => $datasMail,
                'details'       => DB::select("SELECT * FROM payment_order_product WHERE order_id ='$lastId' "),
                'ids'           =>  $datasMail[0]->ids,
                'subject'       => 'Fwd: Solicitud de aprobación para la orden de compra # ' . $datasMail[0]->ids . '| Mundochiapas.com - Mundochiapas.com',
                'title'         => '',
            ];
            self::sendMail(self::getReceive(), $mailData);

            return true;
        } catch (\Exception $e) {
            DB::rollback();
            return $e;
        }
    }


    public static function sendMail($to, $mailData)
    {
        Mail::to($to)
            ->send(new OrdenMail($mailData));
    }

    public static function getReceive()
    {
        $SQL = "SELECT content as receive from tbl_settings WHERE kode_content='EM-01' ";
        $data = DB::select($SQL);
        return $data[0]->receive;
    }

    public static function deleteData($req)
    {
        $id  = $req->input('id');

        DB::beginTransaction();
        try {
            $SQL  = "DELETE FROM payment_order_product where order_id ='$id' ";
            $SQL1  = "DELETE FROM payment_order where id ='$id' ";
            DB::delete($SQL);
            DB::delete($SQL1);
            DB::commit();
            return true;
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
            DB::table("payment_order_product")->whereIn('order_id', $ids)->delete();
            DB::table("payment_order")->whereIn('id', $ids)->delete();
            DB::commit();
            return true;
        } catch (\Exception $e) {
            DB::rollback();
            return $e;
            // return 0;
        }
    }
}
