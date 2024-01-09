<?php

namespace App\Models;

use App\Helpers\AuthHelper;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class CosModel extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'cars_id',
        'routes_id',
        'departure_city',
        'destination_city',
        'departure_date',
        'departure_time',
        'returning_time',
        'returning_date',
        'no_of_days',
        'cost_per_days',
        'kms_total',
        'extra_kilometres',
        'total_travel_kms',
        'car_performance_liter',
        'total_liter_consume',
        'cost_per_liter',
        'total_fuel_expense',
        'booth_expense',
        'no_drivers',
        'driver_name',
        'driver_fee',
        'total_fee_drivers',
        'hotel_fee',
        'airport_fee',
        'car_wash',
        'amenities',
        'total_cost',
        'utility',
        'sugested_price',
        'customer_name',
        'status',
        'created_at',
        'updated_at',
        'updated_by',
        'created_by',
    ];
    protected $table = "cost_per_services";
    protected $primaryKey = 'id';


    public static function getData($id = null)
    {
        $where = "";
        if ($id) {
            $where .= 'WHERE c.id=' . $id;
        }
        $SQL = "SELECT c.* , us.first_name , us.last_name , cr.car_name , rt.route_name FROM cost_per_services c 
        LEFT JOIN users us on c.driver_name = us.id 
        LEFT JOIN cars cr on cr.id = c.cars_id
        LEFT JOIN route_travel rt on rt.id = c.routes_id 
        $where
        ORDER BY c.created_at DESC ";
        $res = DB::select($SQL);
        return $res;
    }

    public static  function saveData($req)
    {
        $cars_id = $req->input('cars_id');
        $routes_id = $req->input('route');
        $departure_city = $req->input('departure_city');
        $destination_city = $req->input('destination_city');
        $departure_date = $req->input('departure_date');
        $departure_time = $req->input('departure_time');
        $returning_date = $req->input('returning_date');
        $returning_time = $req->input('returning_time');
        $no_of_days = $req->input('no_of_days');
        $cost_per_days = $req->input('cost_per_days');
        $kms_total = $req->input('kms_total');
        $extra_kilometres = $req->input('extra_kilometres');
        $total_travel_kms = $req->input('total_travel_kms');
        $car_performance_liter = $req->input('car_performance_liter');
        $total_liter_consume = $req->input('total_liter_consume');
        $cost_per_liter = $req->input('cost_per_liter');
        $total_fuel_expense = $req->input('total_fuel_expense');
        $booth_expense = $req->input('booth_expense');
        $no_drivers = $req->input('no_drivers');
        $driver_name = $req->input('driver_name');
        $driver_name_second = $req->input('driver_name_second');
        $driver_fee = $req->input('driver_fee');
        $total_fee_drivers = $req->input('total_fee_drivers');
        $hotel_fee = $req->input('hotel_fee');
        $airport_fee = $req->input('airport_fee');
        $car_wash = $req->input('car_wash');
        $amenities = $req->input('amenities');
        $total_cost = $req->input('total_cost');
        $utility = $req->input('utility');
        $sugested_price = $req->input('sugested_price');
        $customer_name = $req->input('customer_name');
        $fee_seconds_drivers = $req->input('fee_seconds_drivers');
        $fee_first_driver = $req->input('fee_first_driver');
        $total_casetas = $req->input('total_casetas');
        $category_cars = $req->input('category_cars');


        $dataSave = array(
            'cars_id'               => $cars_id,
            'routes_id'             => $routes_id,
            'category_cars'             => $category_cars,
            'departure_city'        => $departure_city,
            'destination_city'      => $destination_city,
            'departure_date'        => $departure_date,
            'departure_time'        => $departure_time,
            'returning_time'        => $returning_time,
            'returning_date'        => $returning_date,
            'no_of_days'            => $no_of_days,
            'cost_per_days'         => $cost_per_days,
            'kms_total'             => $kms_total,
            'extra_kilometres'      => $extra_kilometres,
            'total_travel_kms'      => $total_travel_kms,
            'car_performance_liter' => $car_performance_liter,
            'total_liter_consume'   => $total_liter_consume,
            'cost_per_liter'        => $cost_per_liter,
            'total_fuel_expense'    => $total_fuel_expense,
            'booth_expense'         => $booth_expense,
            'no_drivers'            => $no_drivers,
            'driver_name'           => $driver_name,
            'second_drivers'        => $driver_name_second,
            'driver_fee'            => $driver_fee,
            'total_fee_drivers'     => $total_fee_drivers,
            'hotel_fee'             => $hotel_fee,
            'airport_fee'           => $airport_fee,
            'car_wash'              => $car_wash,
            'amenities'             => $amenities,
            'total_cost'            => $total_cost,
            'utility'               => $utility,
            'sugested_price'        => $sugested_price,
            'customer_name'         => $customer_name,
            'total_casetas'         => $total_casetas,
            'status'                => 'Active',
            'created_by'            => Session('idUser'),
            'created_at'            => date("Y-m-d H:i:s"),
            'fee_seconds_drivers'   => $fee_seconds_drivers,
            'fee_first_driver'      => $fee_first_driver,
        );




        DB::beginTransaction();
        try {
            DB::table('cost_per_services')->insert($dataSave);
            $last_id = DB::getPdo()->lastInsertId();
            if (!empty($req->solicitud_Ids)) {
                $solicId = $req->solicitud_Ids;
                $userId = Session('idUser');
                $dateStat = date('Y-m-d H:i:s');
                DB::update("UPDATE estimate_request set status = 1 , user_id = '$userId' , costperservices_id = '$last_id' , date_status='$dateStat' where id = '$solicId'  ");
            }
            DB::commit();
            return  $last_id;
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
            $SQL  = "DELETE FROM cost_per_services where id ='$id' ";
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
            DB::table("payment_order")->whereIn('id', $ids)->delete();
            DB::table("cost_per_services")->whereIn('id', $ids)->delete();
            DB::commit();
            return 1;
        } catch (\Exception $e) {
            DB::rollback();
            return $e;
            // return 0;
        }
    }

    public static function sumCasetas($req)
    {
        $data = DB::select("SELECT IFNULL(SUM(costo_casetas),0)as total FROM casetas WHERE route_id='$req' ");
        return $data[0]->total;
    }


    public static function sumCaseta($routeId)
    {
        $data = DB::select("SELECT IFNULL(sum(x.totals),0) totals  from routes_casetas rc 
        left outer join (
          select 
            c.id , c.caseta_name  , d.totals 
          from casetas c
           left  join ( 
               select sum(ccc.costo_casetas) as totals , ccc.casetas_id  from casetas_category_cars ccc  
               group by ccc.casetas_id
            ) d on d.casetas_id = c.id 
        )x on x.id = rc.casetas_id 
        where rc.routes_id = $routeId 
        group by rc.routes_id 
        ");
        if (count($data) > 0) {
            return $data[0]->totals;
        } else {
            return 0;
        }
    }

    public static function countCasetas($routeId)
    {
        $data = DB::select("SELECT count(*)as totals from routes_casetas rc 
        where rc.routes_id = $routeId ");
        return $data[0]->totals;
    }


    public static function sumarizeCasetas($req)
    {
        $data = DB::select("WITH xTables  as (
            select c.caseta_name , cc.name as categ_cars , ccc.costo_casetas  from casetas_category_cars ccc 
           inner join casetas c  on c.id = ccc.casetas_id 
           inner join cars_category cc on cc.id = ccc.cars_category 
           inner join routes_casetas rc on rc.casetas_id  = ccc.casetas_id 
           where rc.routes_id  = '$req->route' and ccc.cars_category  = '$req->cars' 
           )
           select IFNULL(sum(xTables.costo_casetas),0) as nilai_casetas
           from xTables");
        return $data[0]->nilai_casetas * 2;
    }
}
