<?php

namespace App\Models\Drivers;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ServiceModels extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'date', 'departure', 'destination', 'time_departure', 'last_name', 'company', 'company_logo', 'photo', 'email', 'phone', 'address', 'city', 'end_time', 'driver_id', 'car_id', 'KM_initial', 'fuel_level', 'status', 'created', 'payment_status', 'itinerary', 'note', 'costperservices_id'];
    protected $table = "services";
    protected $primaryKey = 'id';
    // public $incrementing = false;



    public static function getData($where = array(), $table)
    {
        $whereIs = array();
        if ($where) {
            $whereIs = $where;
        }

        $SQL = "SELECT * FROM $table $where";
        $res = DB::select($SQL);
        return $res;
    }

    public static function showData($req)
    {
        $SQL = "SELECT  concat(us.first_name ,' ', us.last_name)as driver_name , c.car_name , s.* from services s 
        left join cars c on c.id = s.car_id 
        left join users us on us.id  = s.driver_id 
        where !isnull(s.id) AND s.driver_id = " . Session('idUser') . " ";

        if ($req->driver) {
            $SQL .= "AND us.first_name like '%" . $req->driver . "%' or  us.last_name like '%" . $req->driver . "%'";
        }

        if ($req->car) {
            $SQL .= "AND c.car_name like '%" . $req->car . "%' ";
        }

        if ($req->date) {
            $SQL .= "AND s.date = '" . $req->date . "' ";
        }

        if ($req->departure) {
            $SQL .= "AND s.departure like '%" . $req->departure . "%' ";
        }

        if ($req->destination) {
            $SQL .= "AND s.destination like '%" . $req->destination . "%' ";
        }

        $SQL .= "ORDER BY s.created DESC";
        $res = DB::select($SQL);
        return $res;
    }

    public static function getFuelTank($req)
    {
        $SQL = "SELECT c.fuel_capacity  from services s 
        left join cars c on c.id  = s.car_id 
        WHERE s.id = '" . $req . "' ";
        $data = DB::select($SQL);
        return $data[0]->fuel_capacity;
    }

    public static function addData($req)
    {
        DB::beginTransaction();
        $servId = $req->service_id;
        try {

            // section initial 
            $init_odometer      = $req->init_odometer;
            $initial_fuel_tank  = $req->initial_fuel_tank;
            if ($req->file('evidencia')) {
                $file = $req->file('evidencia');
                $filename = 'init' . rand(23, 25)  . $file->getClientOriginalName();
                $file->move(public_path('admin/img/services/'), $filename);
                $evidencia = $filename;
            }

            $initialData = array(
                'service_id'         => $servId,
                'init_odometer'      => $init_odometer,
                'initial_fuel_tank'  => $initial_fuel_tank,
                'evidencia'          => $evidencia,
                'created_at'         => date('Y-m-d H:i:s'),
                'created_by'         => Session('idUser')
            );
            DB::table('service_initial')->insert($initialData);


            //  section fuel Fuel Recharge Intermediate
            $rechargeIntermediateData = [];
            if ($req->datas_recharge_inter[0]['odometer_time_charge'] != null) {
                foreach ($req->datas_recharge_inter as $key => $value) {
                    $list = [
                        'odometer_time_charge'  => $value['odometer_time_charge'],
                        'amount_liters_charged' => $value['amount_liters_charged'],
                        'cost_charged_fuel'     => $value['cost_charged_fuel'],
                        'photo_evidence'        => "",
                        'created_at'            => date('Y-m-d H:i:s'),
                        'created_by'            => Session('idUser'),
                        'service_id'            => $servId,
                    ];
                    if ($value['photo_evidence']) {
                        $file = $value['photo_evidence'];
                        $filename = 'init' . rand(23, 25)  . $file->getClientOriginalName();
                        $file->move(public_path('admin/img/services/'), $filename);
                        $list['photo_evidence'] = $filename;
                    }
                    $rechargeIntermediateData[] = $list;
                }
            }
            DB::table('service_intermediate')->insert($rechargeIntermediateData);



            // section destination 
            $odometer_at_destination      = $req->odometer_at_destination;
            $fuel_tank_at_destination  = $req->fuel_tank_at_destination;
            if ($req->file('photo_destination')) {
                $file = $req->file('photo_destination');
                $filename = 'init' . time()  . $file->getClientOriginalName();
                $file->move(public_path('admin/img/services/'), $filename);
                $photo_destination = $filename;
            }

            $destinationData = array(
                'odometer_at_destination'       => $odometer_at_destination,
                'fuel_tank_at_destination'      => $fuel_tank_at_destination,
                'photo_destination'             => $photo_destination,
                'created_at'                    => date('Y-m-d H:i:s'),
                'created_by'                    => Session('idUser'),
                'service_id'                    => $servId,
            );
            DB::table('service_destination')->insert($destinationData);


            // section Fuel Recharge Return 1 
            $rechargeReturnData = [];
            if ($req->datas_recharge_return[0]['return_odometer_time_charge'] != null) {
                foreach ($req->datas_recharge_return as $key => $value) {
                    $listing = [
                        'return_odometer_time_charge'  => $value['return_odometer_time_charge'],
                        'return_amount_liters_charged' => $value['return_amount_liters_charged'],
                        'return_cost_charged_fuel'     => $value['return_cost_charged_fuel'],
                        'return_photo_evidence'        => $value['return_photo_evidence'],
                        'service_id'                   => $servId,
                        'created_at'                   => date('Y-m-d H:i:s'),
                        'created_by'                   => Session('idUser'),
                    ];
                    if ($value['return_photo_evidence']) {
                        $file = $value['return_photo_evidence'];
                        $filename = 'init' . time() . $file->getClientOriginalName();
                        $file->move(public_path('admin/img/services/'), $filename);
                        $listing['return_photo_evidence'] = $filename;
                    }
                    $rechargeReturnData[] = $listing;
                }
            }
            DB::table('service_returning')->insert($rechargeReturnData);


            // section returning to home 
            $home_odometer_arrival = $req->home_odometer_arrival;
            $home_fuel_level_arrival = $req->home_fuel_level_arrival;
            $home_charge_fill_tank = $req->home_charge_fill_tank;
            $home_cost_fuel_fill_tank = $req->home_cost_fuel_fill_tank;
            if ($req->file('home_photo_evidence')) {
                $file = $req->file('home_photo_evidence');
                $filename = 'init' . time()  . $file->getClientOriginalName();
                $file->move(public_path('admin/img/services/'), $filename);
                $home_evidencia = $filename;
            }
            $homeData = array(
                'home_odometer_arrival'     => $home_odometer_arrival,
                'home_fuel_level_arrival'   => $home_fuel_level_arrival,
                'home_charge_fill_tank'     => $home_charge_fill_tank,
                'home_cost_fuel_fill_tank'  => $home_cost_fuel_fill_tank,
                'home_photo_evidence'       => $home_evidencia,
                'service_id'                => $servId,
                'created_at'                => date('Y-m-d H:i:s'),
                'created_by'                => Session('idUser'),
            );
            DB::table('service_home')->insert($homeData);

            DB::commit();
            return 1;
        } catch (\Exception $e) {
            DB::rollback();
            return $e;
        }
    }

    public static function insertData($req)
    {
    }
}
