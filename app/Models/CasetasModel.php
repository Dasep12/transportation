<?php

namespace App\Models;

use App\Helpers\AuthHelper;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class CasetasModel extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'route_id',
        'caseta_name',
        'costo_casetas',
        'created_at',
        'created_by',
        'updated_at',
    ];
    protected $table = "casetas";
    protected $primaryKey = 'id';



    public static function getData($id = null)
    {

        $whereId = "";
        if ($id != null) {
            $whereId .= " WHERE id='$id'";
        }
        $SQL = "SELECT c.* , rt.route_name , cc.name as cars_category FROM casetas c 
        LEFT JOIN route_travel rt on c.route_id = rt.id
        LEFT JOIN cars_category cc on c.category_cars = cc.id
        ORDER BY created_at DESC ";
        $res = DB::select($SQL);
        return $res;
    }

    public static  function saveData($req)
    {
        $route_id = $req->input('route_id');
        $caseta_name = $req->input('caseta_name');
        // $costo_casetas = $req->input('costo_casetas');
        $category_cars = $_POST['category_cars'];
        $costo_casetas = $_POST['costo_casetas'];
        // $images        = $_POST['images_file'];
        $cars_categ = array();


        $dataSave = array(
            'caseta_name'     => $caseta_name,
            'created_at'      => date('Y-m-d H:i:s'),
            'created_by'      => Session('idUser'),
        );
        $files = [];


        // if ($req->file('images')) {
        //     foreach ($req->file('images') as $key => $file) {
        //         $file_name = time() . rand(1, 99) . '.' . $file->extension();
        //         $file->move(public_path('admin/img/casetas'), $file_name);
        //         $files[]['img'] = $file_name;
        //     }
        // }

        DB::beginTransaction();
        try {
            DB::table('casetas')->insert($dataSave);
            $lastId =  DB::getPdo()->lastInsertId();
            for ($i = 0; $i < count($category_cars); $i++) {
                $tmpFilePath = $_FILES['images']['tmp_name'][$i];
                $filenames =   $_FILES['images']['name'];
                $extension = pathinfo($filenames[$i], PATHINFO_EXTENSION);
                $names = time() . '.' . $extension;
                if ($tmpFilePath != "") {
                    //Setup our new file path
                    $newFilePath = "./public/admin/img/casetas/" .  $names;
                    //Upload the file into the temp dir
                    if (move_uploaded_file($tmpFilePath,  $newFilePath)) {
                        //Handle other code here
                        $dt =  array(
                            'cars_category' => $category_cars[$i],
                            'casetas_id'    => $lastId,
                            'costo_casetas' => $costo_casetas[$i],
                            'images'        => $names,
                            'created_at'    => date('Y-m-d H:i:s'),
                            'created_by'    => Session('idUser'),
                        );
                        $cars_categ[] = $dt;
                    }
                } else {
                    $dt =  array(
                        'cars_category' => $category_cars[$i],
                        'casetas_id'    => $lastId,
                        'costo_casetas' => $costo_casetas[$i],
                        'images'        => "",
                        'created_at'    => date('Y-m-d H:i:s'),
                        'created_by'    => Session('idUser'),
                    );
                    $cars_categ[] = $dt;
                }
            }
            DB::table('casetas_category_cars')->insert($cars_categ);
            DB::commit();
            return 1;
            return $cars_categ;
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
            $SQL  = "DELETE FROM casetas_category_cars  where casetas_id ='$id' ";
            $SQL2  = "DELETE FROM casetas where id ='$id' ";
            DB::delete($SQL);
            DB::delete($SQL2);
            DB::commit();
            return 1;
        } catch (\Exception $e) {
            DB::rollback();
            return $e;
            // return 0;
        }
    }

    public static function checkCategories($categId, $casetasId)
    {
        $data = DB::select("SELECT  cc.id  , cc.name  , ccc.cars_category , ccc.casetas_id   from casetas_category_cars ccc 
        left join cars_category cc on cc.id  = ccc.cars_category WHERE ccc.casetas_id = '$casetasId' AND ccc.cars_category ='$categId'   ");
        return count($data);
    }

    public static function getCategoriesCars($casetasId)
    {
        $data = DB::select("SELECT  cc.id  , cc.name  , ccc.cars_category , ccc.casetas_id   from casetas_category_cars ccc 
        left join cars_category cc on cc.id  = ccc.cars_category WHERE ccc.casetas_id = '$casetasId'  ");
        return $data;
    }

    public static function deleteAll($req)
    {

        DB::beginTransaction();
        try {
            $ids = $req->id_check;
            DB::table("casetas")->whereIn('id', $ids)->delete();
            DB::commit();
            return 1;
        } catch (\Exception $e) {
            DB::rollback();
            return $e;
            // return 0;
        }
    }

    public static function casetasPrice()
    {
        $data = DB::select("SELECT c.id , c.caseta_name  , d.totals 
          from casetas c
           left  join ( 
               select sum(ccc.costo_casetas) as totals , ccc.casetas_id  from casetas_category_cars ccc  
               group by ccc.casetas_id
            ) d on d.casetas_id = c.id 
            ");
        return $data;
    }
}
