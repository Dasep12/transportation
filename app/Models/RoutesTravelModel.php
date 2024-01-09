<?php

namespace App\Models;

use App\Helpers\AuthHelper;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class RoutesTravelModel extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'id_routes',
        'route_name',
        'departure',
        'destination',
        'travel_type',
        'total_kms',
        'liters_consumed',
        'fuel_expense',
        'yield',
        'no_booths',
        'booth_expense',
        'no_drivers',
        'category_cars',
        'driver_name',
        'car_name',
        'travel_time',
        'created_at',
        'updated_at',
        'created_by',
        'updated_by',
    ];
    protected $table = "route_travel";
    protected $primaryKey = 'id';



    public static function getData($id = null)
    {
        $SQL = "SELECT r.* ,cc.name as cars_category , us.first_name , us.last_name , c.car_name FROM route_travel r
        LEFT JOIN users us on us.id = r.driver_name
        LEFT JOIN cars c on c.id = r.car_name 
        LEFT JOIN cars_category cc on cc.id = r.category_cars
        ORDER BY r.created_at DESC ";
        $res = DB::select($SQL);
        return $res;
    }

    public static  function saveData($req)
    {
        $id_routes = $req->input('id_routes');
        $route_name = $req->input('route_name');
        $category_cars = $req->input('category_cars');
        $departure = $req->input('departure');
        $destination = $req->input('destination');
        $travel_type = $req->input('travel_type');
        $total_kms = $req->input('total_kms');
        $liters_consumed = $req->input('liters_consumed');
        $fuel_expense = $req->input('fuel_expense');
        $yield = $req->input('yield');
        $no_booths = $req->input('no_booths');
        $booth_expense = $req->input('booth_expense');
        $no_drivers = $req->input('no_drivers');
        // $driver_name = $req->input('driver_name');
        $car_name = $req->input('car_name');
        $travel_time = $req->input('travel_time');
        $casetas_id = $_POST['casetas_id'];


        if (!empty($req->types)) {
            $category_cars = $req->input('category_cars2');
            $car_name = $req->input('car_name2');
            $booth_expense = $req->input('booth_expense2');
            $no_booths = $req->input('no_booths2');
        }


        $dataSave = array(
            'id_routes' => $id_routes,
            'route_name' => $route_name,
            'departure' => $departure,
            'destination' => $destination,
            'travel_type' => $travel_type,
            'total_kms' => $total_kms,
            'liters_consumed' => $liters_consumed,
            'fuel_expense' => $fuel_expense,
            'yield' => $yield,
            'no_booths' => $no_booths,
            'booth_expense' => $booth_expense,
            'no_drivers' => $no_drivers,
            // 'driver_name' => $driver_name,
            'category_cars' => $category_cars,
            'car_name' => $car_name,
            'travel_time' => $travel_time,
            'created_at' =>  date('Y-m-d H:i:s'),
            'created_by' => Session('idUser'),
        );


        DB::beginTransaction();
        try {
            DB::table('route_travel')->insert($dataSave);
            $lastId =  DB::getPdo()->lastInsertId();
            for ($i = 0; $i < count($casetas_id); $i++) {
                $casetas_categ[] = array(
                    'casetas_id'    => $casetas_id[$i],
                    'routes_id'     => $lastId,
                    'created_at'    => date('Y-m-d H:i:s'),
                    'created_by'    => Session('idUser'),
                );
            }
            DB::table('routes_casetas')->insert($casetas_categ);
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
            DB::delete("DELETE FROM routes_casetas where routes_id ='$id' ");
            $SQL  = "DELETE FROM route_travel where id ='$id' ";
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
            DB::table("routes_casetas")->whereIn('routes_id', $ids)->delete();
            DB::table("route_travel")->whereIn('id', $ids)->delete();
            DB::commit();
            return 1;
        } catch (\Exception $e) {
            DB::rollback();
            return $e;
            // return 0;
        }
    }

    public static function getCasetas($casetas, $route)
    {
        $data = DB::select("SELECT  rc.* from routes_casetas rc 
        left join casetas c  on c.id  = rc.casetas_id 
        left join route_travel rt on rt.id  = rc.routes_id 
        where rc.casetas_id  = $casetas and rc.routes_id  = $route ");
        return count($data);
    }

    public static function listCasetas($req)
    {
        $where =  "";
        if (!empty($req->categ_id)) {
            $where .= " WHERE ccc.cars_category  =  " . $req->categ_id;
        }
        $data = DB::select("SELECT ccc.id , c.caseta_name , cc.name as categ_cars , ccc.costo_casetas  from casetas_category_cars ccc 
        left join casetas c on c.id = ccc.casetas_id 
        left join cars_category cc on cc.id = ccc.cars_category  
          $where
        ");
        return $data;
    }
}
