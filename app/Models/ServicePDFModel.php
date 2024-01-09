<?php

namespace App\Models;

use App\Helpers\AuthHelper;
use App\Models\Drivers\ExpenseModels;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ServicePDFModel extends Model
{
    use HasFactory;


    public static function headerReport($id)
    {
        $data = DB::select("SELECT cps.customer_name as cliente ,  rt.route_name as ruta , cps.departure_date as inicio_de_servicio ,
        cps.returning_date as fin_de_servicio , cps.no_drivers as no_operados , concat(u.first_name,'  ', u.last_name)  as operador,
        cps.no_of_days as no_dias , c.car_name  as unidad
        from cost_per_services cps
        left join cars c on c.id = cps.cars_id 
        left join route_travel rt on rt.id  = cps.routes_id
        left join users u on u.id = cps.driver_name 
        where cps.id = '$id' ");
        return $data;
    }

    public static function detailCasetas($route_id, $cars_categ)
    {
        $data  = DB::select("SELECT c.caseta_name , ccc.costo_casetas  from casetas_category_cars ccc
        left join routes_casetas rc on rc.casetas_id  = ccc.id 
        left join casetas c on c.id  = ccc.casetas_id 
        where  rc.routes_id  = $route_id ");
        // $data  = DB::select("SELECT *, sum(rc.costo_casetas) as total_Casetas  from casetas rc 
        // where rc.route_id = '$id' ");
        // ccc.cars_category  = 1 AND
        return $data;
    }

    public static function detailHargaCasetas($id)
    {
        $data  = DB::select("SELECT sum(c.costo_casetas) as total_Casetas   
        from routes_casetas rc 
        left join casetas c on c.id = rc.casetas_id 
                where rc.routes_id  = '$id' ");
        // $data  = DB::select("SELECT *, sum(rc.costo_casetas) as total_Casetas  from casetas rc 
        // where rc.route_id = '$id' ");
        return $data[0]->total_Casetas;
    }


    public static function IDAKilometros_por_recorrer($servId)
    {
        $Destination = DB::select("SELECT si.odometer_at_destination  from service_destination si where si.service_id = '$servId' ");

        $InitialService = DB::select("SELECT sd.init_odometer  from service_initial sd where sd.service_id = '$servId' ");

        $destino = $Destination == null ? 0 : $Destination[0]->odometer_at_destination;
        $initial = $InitialService == null ? 0 : $InitialService[0]->init_odometer;

        return $destino - $initial;
    }


    public static function RegresoKilometros_por_recorrer($servId)
    {
        $Destination = DB::select("SELECT si.odometer_at_destination  from service_destination si where si.service_id = '$servId' ");

        $ReturningtoHome = DB::select("SELECT sd.home_odometer_arrival  from service_home sd where sd.service_id = '$servId' ");

        $destino = $Destination == null ? 0 : $Destination[0]->odometer_at_destination;
        $home = $ReturningtoHome == null ? 0 : $ReturningtoHome[0]->home_odometer_arrival;

        return $home - $destino;
    }

    public static function IDALitros($servId)
    {
        $ReturningtoHome = DB::select("SELECT IFNULL(sum(amount_liters_charged),0) as litrosIda  from service_intermediate sd where sd.service_id = '$servId' ");
        return $ReturningtoHome[0]->litrosIda;
    }

    public static function RegresoLitros($servId)
    {
        $ReturningtoHome = DB::select("SELECT IFNULL(sum(return_amount_liters_charged),0) as litrosIda  from service_returning sd where sd.service_id = '$servId' ");
        return $ReturningtoHome[0]->litrosIda;
    }


    public static function IDACostodeCombustible($servId)
    {
        $serveIntermediate = DB::select("SELECT IFNULL(sum(cost_charged_fuel),0) as result  from service_intermediate sd where sd.service_id = '$servId' ");

        return $serveIntermediate[0]->result;
    }

    public static function RegresoCostodeCombustible($servId)
    {
        $ServiceReturning = DB::select("SELECT IFNULL(sum(return_cost_charged_fuel),0) as result  from service_returning sd where sd.service_id = '$servId' ");

        $returnToHome = DB::select("SELECT IFNULL(sum(home_cost_fuel_fill_tank),0) as result  from service_home sd where sd.service_id = '$servId' ");
        return $ServiceReturning[0]->result + $returnToHome[0]->result;
    }

    public static function HonorariosOperadores($servId)
    {
        $honor = DB::select("SELECT IFNULL(sum(sa.advance_1),0) as results_1 , IFNULL(SUM(sa.advance_2),0) as results_2  ,IFNULL(SUM(sa.payment_total_1),0) as results_3 ,IFNULL(SUM(sa.payment_total_2),0) as results_4 
        from service_advance sa  where service_id = '$servId' ");
        return $honor[0];
    }

    public static function othersPayment($servId)
    {
        $honor = ExpenseModels::where('service_id', $servId)->get();
        if (count($honor) > 0) {
            $data = array(
                'hospedaje' => $honor[0]->hotel_fee_go,
                'lavado'    => $honor[0]->car_wash_go,
                'airport'   => $honor[0]->airport_fee_go,
                'others'    => $honor[0]->other_exp_go,
            );
            return $data;
        }
        $data = array(
            'hospedaje' => 0,
            'lavado' => 0,
            'airport' => 0,
            'others' => 0,
        );
        return $data;
    }


    public static function totalCostQuotes($costId)
    {
        $data = DB::select("SELECT X.total  from quotes q 
        left join (
            select sum(amount) as total , qp.quotes_id  from quotes_payment qp 
        ) X on X.quotes_id = q.id 
        where q.reference  = '$costId' ");
        if ($data[0]->total <= 0) {
            return 0;
        }
        return $data[0]->total;
    }

    public static function contract1($req)
    {
        $data = DB::select("SELECT cps.departure_date , cps.departure_time , cps.returning_date , cps.returning_time, q.total_amount  from services s
        left join cost_per_services cps  on cps.id = s.costperservices_id 
        left join quotes q on q.reference = cps.id 
        where s.id  = $req->id ");
        return $data;
    }
}
