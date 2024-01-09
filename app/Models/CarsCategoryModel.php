<?php

namespace App\Models;

use App\Helpers\AuthHelper;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class CarsCategoryModel extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
        'created_at',
        'created_by',
        'updated_at',
    ];
    protected $table = "cars_category";
    protected $primaryKey = 'id';



    public static function getData($id = null)
    {

        $whereId = "";
        if ($id != null) {
            $whereId .= " WHERE id='$id'";
        }
        $SQL = "SELECT * FROM cars_category c 
        $whereId
        ORDER BY created DESC ";
        $res = DB::select($SQL);
        return $res;
    }

    public static  function saveData($req)
    {
        $name = $req->input('name');

        $dataSave = array(
            'name'         => $name,
            'created_at'      => date('Y-m-d H:i:s'),
            'created_by'   => Session('idUser')
        );



        DB::beginTransaction();
        try {
            DB::table('cars_category')->insert($dataSave);
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
            $SQL  = "DELETE FROM cars_category where id ='$id' ";
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
            DB::table("cars_category")->whereIn('id', $ids)->delete();
            DB::commit();
            return 1;
        } catch (\Exception $e) {
            DB::rollback();
            return $e;
            // return 0;
        }
    }
}
