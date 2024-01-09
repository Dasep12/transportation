<?php

namespace App\Models;

use App\Helpers\AuthHelper;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class AdministratorsModel extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'user_type_id', 'username', 'password', 'first_name', 'last_name', 'company', 'company_logo', 'photo', 'email', 'phone', 'address', 'city', 'country', 'zip_code', 'created', 'created_by', 'newsletter', 'status', 'modified', 'token_num', 'license', 'fee_per_day', 'license_exp', 'photo_license', 'photo_psicofisico', 'driver_skills'];
    protected $table = "users";
    protected $primaryKey = 'id';



    public static function getData($id = null)
    {
        $SQL = "SELECT c.* , ut.user_type 
        FROM users c 
        LEFT JOIN user_types ut on ut.id = c.user_type_id
        WHERE ut.user_type  != 'Drivers'
        ORDER BY created DESC ";
        $res = DB::select($SQL);
        return $res;
    }

    public static  function saveData($req)
    {
        $first_name = $req->input('first_name');
        $last_name = $req->input('last_name');
        $email = $req->input('email');
        $phone = $req->input('phone');
        $address = $req->input('address');
        $password = $req->input('password');
        $username = $req->input('username');
        $user_type_id = $req->input('user_type_id');


        $dataSave = array(
            'first_name'         => $first_name,
            'last_name'          => $last_name,
            'email'              => $email,
            'phone'              => $phone,
            'address'            => $address,
            'user_type_id'       => $user_type_id,
            'username'           => $username,
            'password'           => AuthHelper::encrpyPassword($password),
            'created'            => date('Y-m-d H:i:s'),
            'created_by'         => Session('idUser'),
            'status'             => 'Active',
            'photo'              => "",
        );


        if ($req->file('photo')) {
            $file = $req->file('photo');
            $filename = 'driver' . rand(42, 25)  . $file->getClientOriginalName();
            $file->move(public_path('admin/img/driver'), $filename);
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
}
