<?php

namespace App\Models;

use App\Helpers\AuthHelper;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class PrevedorModel extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
        'rfc',
        'address',
        'colony',
        'city',
        'municipality',
        'state',
        'num_ext',
        'num_int',
        'code_postal',
        'active',
        'company',
        'created',
        'bank_data',
        'telephone',
        'updated_at',
        'created_by',
    ];
    protected $table = "supplier";
    protected $primaryKey = 'id';



    public static function getData($id = null)
    {

        $whereId = "";
        if ($id != null) {
            $whereId .= " WHERE id='$id'";
        }
        $SQL = "SELECT * FROM supplier c 
        ORDER BY created DESC ";
        $res = DB::select($SQL);
        return $res;
    }

    public static  function saveData($req)
    {
        $name       = $req->input('name');
        $rfc        = $req->input('rfc');
        $address    = $req->input('address');
        $colony     = $req->input('colony');
        $city       = $req->input('city');
        $municipality = $req->input('municipality');
        $state       = $req->input('state');
        $num_ext     = $req->input('num_ext');
        $num_int     = $req->input('num_int');
        $active      = $req->input('active');
        $company     = $req->input('company');
        $bank_data   = $req->input('bank_data');
        $telephone   = $req->input('telephone');
        $code_postal = $req->input('code_postal');


        $dataSave = array(
            'name'            => $name,
            'rfc'             => $rfc,
            'address'         => $address,
            'colony'          => $colony,
            'city'            => $city,
            'municipality'    => $municipality,
            'state'           => $state,
            'num_ext'         => $num_ext,
            'num_int'         => $num_int,
            'code_postal'     => $code_postal,
            'active'          => $active,
            'company'         => 0,
            'bank_data'       => $bank_data,
            'telephone'       => $telephone,
            'active'          => 1,
            'created'         => date('Y-m-d H:i:s'),
            'created_by'      => Session('idUser')
        );


        DB::beginTransaction();
        try {
            DB::table('supplier')->insert($dataSave);
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
            $SQL  = "DELETE FROM supplier where id ='$id' ";
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
            DB::table("supplier")->whereIn('id', $ids)->delete();
            DB::commit();
            return 1;
        } catch (\Exception $e) {
            DB::rollback();
            return $e;
            // return 0;
        }
    }
}
