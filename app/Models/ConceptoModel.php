<?php

namespace App\Models;

use App\Helpers\AuthHelper;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ConceptoModel extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'concept',
        'active',
        'created_at',
        'updated_at',
        'created_by',
    ];
    protected $table = "payment_concept";
    protected $primaryKey = 'id';



    public static function getData($id = null)
    {

        $whereId = "";
        if ($id != null) {
            $whereId .= " WHERE id='$id'";
        }
        $SQL = "SELECT * FROM payment_concept c 
        ORDER BY created_at DESC ";
        $res = DB::select($SQL);
        return $res;
    }

    public static  function saveData($req)
    {
        $concept       = $req->input('concept');


        $dataSave = array(
            'concept'            => $concept,
            'active'          => 1,
            'created_at'         => date('Y-m-d H:i:s'),
            'created_by'      => Session('idUser')
        );


        DB::beginTransaction();
        try {
            DB::table('payment_concept')->insert($dataSave);
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
            $SQL  = "DELETE FROM payment_concept where id ='$id' ";
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
            DB::table("payment_concept")->whereIn('id', $ids)->delete();
            DB::commit();
            return 1;
        } catch (\Exception $e) {
            DB::rollback();
            return $e;
            // return 0;
        }
    }
}
