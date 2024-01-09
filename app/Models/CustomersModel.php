<?php

namespace App\Models;

use App\Helpers\AuthHelper;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class CustomersModel extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'user_type_id', 'username', 'password', 'first_name', 'last_name', 'company', 'rfc', 'photo', 'email', 'phone', 'address', 'city', 'country', 'company', 'created', 'created_by', 'status', 'modified',];
    protected $table = "users";
    protected $primaryKey = 'id';



    public static function getData($id = null)
    {
        $SQL = "SELECT c.* , ut.user_type 
        FROM users c 
        LEFT JOIN user_types ut on ut.id = c.user_type_id
        WHERE ut.user_type  = 'Customers'
        ORDER BY created DESC ";
        $res = DB::select($SQL);
        return $res;
    }

    public static  function saveData($req)
    {

        $type = DB::select("SELECT * FROM user_types WHERE user_type='Customers' ");

        $first_name     = $req->input('first_name');
        $last_name      = $req->input('last_name');
        $email          = $req->input('email');
        $phone          = $req->input('phone');
        $password       = $req->input('password');
        $company       = $req->input('company');
        $rfc       = $req->input('rfc');
        $user_type_id   = $type[0]->id;
        // $user_type_id   = $req->input('user_type_id');
        $dataSave = array(
            'first_name'         => $first_name,
            'last_name'          => $last_name,
            'email'              => $email,
            'phone'              => $phone,
            'company'            => $company,
            'rfc'                => $rfc,
            'user_type_id'       => $user_type_id,
            'password'           => AuthHelper::encrpyPassword($password),
            'created'            => date('Y-m-d H:i:s'),
            'created_by'         => Session('idUser'),
            'status'             => 'Active',
            'photo'              => "",
        );


        if ($req->file('photo')) {
            $file = $req->file('photo');
            $filename = 'driver' . rand(42, 25)  . $file->getClientOriginalName();
            $file->move(public_path('admin/img/customers'), $filename);
            $dataSave['photo'] = $filename;
        }


        DB::beginTransaction();
        try {
            DB::table('users')->insert($dataSave);
            DB::commit();
            return 1;
        } catch (\Exception $e) {
            DB::rollback();
            return $e;
            // return 0;
        }
    }



    public static function deleteData($req)
    {
        $id  = $req->input('id');

        DB::beginTransaction();
        try {
            $SQL  = "DELETE FROM users where id ='$id' ";
            DB::delete($SQL);
            DB::commit();
            return 1;
        } catch (\Exception $e) {
            DB::rollback();
            return $e;
            // return 0;
        }
    }

    public static function updateStatus($req)
    {
        $id  = $req->input('id');
        $stat  = $req->input('stat');
        $s = "";
        if ($stat == "Active") {
            $s = "Pending";
        } else {
            $s = "Active";
        }
        DB::beginTransaction();
        try {
            $SQL  = "UPDATE users set status='$s'  where id ='$id' ";
            DB::update($SQL);
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
            DB::table("users")->whereIn('id', $ids)->delete();
            DB::commit();
            return 1;
        } catch (\Exception $e) {
            DB::rollback();
            return $e;
            // return 0;
        }
    }
	
	 public static function getCustomers()
    {
        /* $SQL = "SELECT q.customer_name  , er.email , er.phone  from quotes q 
        inner join cost_per_services cps on q.reference  = cps.id  
        inner join estimate_request er on er.costperservices_id  = cps.id 
        where q.payment_status ='Paid'"; */
		$SQL = "SELECT q.name as email ,q.customer_name , X.phone  FROM quotes q
		left join cost_per_services cps on cps.id = q.reference
		left join ( select er.costperservices_id, er.phone  from estimate_request er ) X  on X.costperservices_id = q.reference
		WHERE q.payment_status = 'Paid'  GROUP BY q.customer_name";
        return DB::select($SQL);
    }
}
