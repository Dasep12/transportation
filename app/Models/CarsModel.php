<?php

namespace App\Models;

use App\Helpers\AuthHelper;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class CarsModel extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'car_name',
        'plate',
        'color',
        'no_serie',
        'pasajeros',
        'per_day_cost',
        'odometro',
        'car_feature',
        'rendimiento_por_litro',
        'fuel_capacity',
        'image',
        'car_type',
        'car_status',
        'status',
        'created',
        'model',
        'car_type_desc',
        'num_permission',
        'url_slug',
        'meta_description',
        'meta_keywords',
        'insurance_policy'
    ];
    protected $table = "cars";
    protected $primaryKey = 'id';



    public static function getData($id = null)
    {

        $whereId = "";
        if ($id != null) {
            $whereId .= " WHERE id='$id'";
        }
        $SQL = "SELECT * FROM cars c 
        $whereId
        ORDER BY created DESC ";
        $res = DB::select($SQL);
        return $res;
    }

    public static  function saveData($req)
    {
        $no_serie = $req->input('no_serie');
        $category_cars = $req->input('category_cars');
        $car_name = $req->input('car_name');
        $plate = $req->input('plate');
        $color = $req->input('color');
        $pasajeros = $req->input('pasajeros');
        $per_day_cost = $req->input('per_day_cost');
        $odometro = $req->input('odometro');
        $car_feature = $req->input('car_feature');
        $purchase_date = $req->input('purchase_date');
        $vehicle_cost = $req->input('vehicle_cost');
        $rendimiento_por_litro = $req->input('rendimiento_por_litro');
        $fuel_capacity = $req->input('fuel_capacity');
        $fuel_type = $req->input('fuel_type');
        $model = $req->input('model');
        $car_type_desc = $req->input('car_type_desc');
        $num_permission = $req->input('num_permission');
        $car_type = $req->input('car_type');
        $car_status = $req->input('car_status');



        $dataSave = array(
            'no_serie' => $no_serie,
            'car_name' => $car_name,
            'plate' => $plate,
            'color' => $color,
            'pasajeros' => $pasajeros,
            'per_day_cost' => $per_day_cost,
            'odometro' => $odometro,
            'car_feature' => $car_feature,
            'purchase_date' => $purchase_date,
            'vehicle_cost' => $vehicle_cost,
            'rendimiento_por_litro'   => $rendimiento_por_litro,
            'fuel_capacity' => $fuel_capacity,
            'fuel_type' => $fuel_type,
            'model'      => $model,
            'car_type_desc' => $car_type_desc,
            'num_permission'        => $num_permission,
            'car_type'        => $car_type,
            'car_status'        => $car_status,
            'image'         => "",
            'created'      => date('Y-m-d H:i:s'),
            'created_by'      => Session('idUser'),
            'category_cars'     => $category_cars,
            'insurance_policy'  => ""
        );


        if ($req->file('image')) {
            $file = $req->file('image');
            $filename = 'cars' . rand(42, 25)  . $file->getClientOriginalName();
            $file->move(public_path('admin/img/cars'), $filename);

            $dataSave['image'] = $filename;
        }
        if ($req->file('insurance_policy')) {
            $file = $req->file('insurance_policy');
            $filename = 'cars' . rand(42, 25)  . $file->getClientOriginalName();
            $file->move(public_path('admin/img/cars'), $filename);

            $dataSave['insurance_policy'] = $filename;
        }


        DB::beginTransaction();
        try {
            DB::table('cars')->insert($dataSave);
            DB::commit();
            return true;
        } catch (\Exception $e) {
            DB::rollback();
            return $e;
            // return 0;
        }
    }

    public static function saveGallery($req)
    {
        $id = $req->input("id");
        $image = $req->file('file');
        $imageName = $image->getClientOriginalName();
        $image->move(public_path('gallery'), $imageName);
        $dataSave = array(
            'title' => pathinfo($imageName, PATHINFO_FILENAME),
            'filename' => $imageName,
            'created' => date('Y-m-d H:i:s'),
            'cars_id'   => $id
        );

        DB::beginTransaction();
        try {
            DB::table('cars_gallery')->insert($dataSave);
            DB::commit();
            return true;
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
            $SQL  = "DELETE FROM cars where id ='$id' ";
            DB::delete($SQL);
            DB::commit();
            return true;
        } catch (\Exception $e) {
            DB::rollback();
            return $e;
            // return 0;
        }
    }

    public static function deleteGallery($req)
    {
        $id  = $req->input('id');

        DB::beginTransaction();
        try {
            $SQL  = "DELETE FROM cars_gallery where id ='$id' ";
            DB::delete($SQL);
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
            DB::table("cars")->whereIn('id', $ids)->delete();
            DB::commit();
            return true;
        } catch (\Exception $e) {
            DB::rollback();
            return $e;
            // return 0;
        }
    }

    public static function gallery($id)
    {
        $SQL = "SELECT * FROM cars_gallery c 
        WHERE cars_id = $id 
        ORDER BY created DESC ";
        $res = DB::select($SQL);
        return $res;
    }
}
