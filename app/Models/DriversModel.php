<?php

namespace App\Models;

use App\Helpers\AuthHelper;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class DriversModel extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'user_type_id', 'username', 'password', 'first_name', 'last_name', 'company', 'company_logo', 'photo', 'email', 'phone', 'address', 'city', 'country', 'zip_code', 'created', 'created_by', 'newsletter', 'status', 'modified', 'token_num', 'license', 'fee_per_day', 'license_exp', 'photo_license', 'photo_psicofisico', 'driver_skills'];
    protected $table = "users";
    protected $primaryKey = 'id';
    // public $incrementing = false;



    public static function getData($id = null)
    {

        $whereId = "";
        if ($id != null) {
            $whereId .= " AND us.id='$id'";
        }
        $SQL = "SELECT us.* , ut.user_type as type FROM users us 
        LEFT JOIN user_types ut on ut.id = us.user_type_id  
        WHERE ut.user_type = 'Drivers' $whereId
        ORDER BY created DESC";
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
        $license = $req->input('license');
        $costo_por_dia = $req->input('costo_por_dia');
        $license_exp = $req->input('license_exp');
        $password = $req->input('password');
        $username = $req->input('username');
        $driver_skills = $req->input('driver_skills');

        $searchType = DB::select("SELECT id FROM user_types where user_type = 'Drivers' ");


        $dataSave = array(
            'first_name' => $first_name,
            'last_name' => $last_name,
            'email' => $email,
            'phone' => $phone,
            'address' => $address,
            'license' => $license,
            'license_exp' => $license_exp,
            'fee_per_day' => $costo_por_dia,
            'username' => $username,
            'password' => AuthHelper::encrpyPassword($password),
            'created'   => date('Y-m-d H:i:s'),
            'created_by' => Session('idUser'),
            'status'      => 'Active',
            'user_type_id' => $searchType[0]->id,
            'photo'        => "",
            'photo_licence'        => "",
            'photo_psicofisico'          => "",
            'driver_skills'     => $driver_skills
        );


        if ($req->file('photo')) {
            $file = $req->file('photo');
            $filename = 'driver' . rand(42, 25)  . $file->getClientOriginalName();
            $file->move(public_path('admin/img/driver'), $filename);

            $dataSave['photo'] = $filename;
        }

        if ($req->file('photo_license')) {
            $file = $req->file('photo_license');
            $filename = 'license' . rand(33, 25)  . $file->getClientOriginalName();
            $file->move(public_path('admin/img/driver'), $filename);

            $dataSave['photo_licence'] = $filename;
        }

        if ($req->file('photo_psicofisico')) {
            $file = $req->file('photo_psicofisico');
            $filename = 'psicofisico' . rand(23, 25)  . $file->getClientOriginalName();
            $file->move(public_path('admin/img/driver'), $filename);

            $dataSave['photo_psicofisico'] = $filename;
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
            $s = "Inactive";
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
}
