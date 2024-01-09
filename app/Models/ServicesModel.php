<?php

namespace App\Models;

use App\Helpers\AuthHelper;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ServicesModel extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'date', 'departure', 'destination', 'time_departure', 'last_name', 'company', 'company_logo', 'photo', 'email', 'phone', 'address', 'city', 'end_time', 'driver_id', 'car_id', 'KM_initial', 'fuel_level', 'status', 'created', 'payment_status', 'itinerary', 'note', 'costperservices_id'];
    protected $table = "services";
    protected $primaryKey = 'id';
    // public $incrementing = false;



    public static function getData($id = null)
    {
        $whereId = "";
        if ($id != null) {
            $whereId .= " AND us.id='$id'";
        }
        $SQL = "SELECT * FROM services";
        $res = DB::select($SQL);
        return $res;
    }

    public static function showData($req)
    {
        $SQL = "SELECT  cps.customer_name, concat(us.first_name ,' ', us.last_name)as driver_name , c.car_name , s.* from services s 
        left join cars c on c.id = s.car_id 
        left join users us on us.id  = s.driver_id 
        left join cost_per_services cps on cps.id = s.costperservices_id
        where !isnull(s.id) ";

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

    public static  function saveData($req)
    {
        $cost_id = $req->input('cost_id');
        $itinerary = $req->input('itinerary');
        $driver = $req->input('driver');
        $date = $req->input('date');
        $time_departure = $req->input('time_departure');
        $cars = $req->input('cars');
        $meeting_point = $req->input('meeting_point');
        $destination = $req->input('destination');
        $departure = $req->input('departure');
        $expenses = $req->input('expenses');



        $dataSave = array(
            'costperservices_id'    => $cost_id,
            'itinerary'             => $itinerary,
            'driver_id'             => $driver,
            'date'                  => $date,
            'time_departure'        => $time_departure,
            'car_id'                => $cars,
            'meeting_point'         => $meeting_point,
            'departure'             => $departure,
            'destination'           => $destination,
            'expenses'              => $expenses,
            'created'               => date('Y-m-d H:i:s')
        );



        DB::beginTransaction();
        try {
            DB::table('services')->insert($dataSave);
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
            $SQL   = "DELETE FROM service_advance where service_id ='$id' ";
            $SQL1  = "DELETE FROM service_destination where service_id ='$id' ";
            $SQL2  = "DELETE FROM service_expense where service_id ='$id' ";
            $SQL3  = "DELETE FROM service_home where service_id ='$id' ";
            $SQL4  = "DELETE FROM service_initial where service_id ='$id' ";
            $SQL5  = "DELETE FROM service_intermediate where service_id ='$id' ";
            $SQL6  = "DELETE FROM service_returning where service_id ='$id' ";
            $SQL7  = "DELETE FROM services where id ='$id' ";

            DB::delete($SQL);
            DB::delete($SQL1);
            DB::delete($SQL2);
            DB::delete($SQL3);
            DB::delete($SQL4);
            DB::delete($SQL5);
            DB::delete($SQL6);
            DB::delete($SQL7);
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
            DB::table("service_advance")->whereIn('service_id', $ids)->delete();
            DB::table("service_destination")->whereIn('service_id', $ids)->delete();
            DB::table("service_expense")->whereIn('service_id', $ids)->delete();
            DB::table("service_home")->whereIn('service_id', $ids)->delete();
            DB::table("service_initial")->whereIn('service_id', $ids)->delete();
            DB::table("service_intermediate")->whereIn('service_id', $ids)->delete();
            DB::table("service_returning")->whereIn('service_id', $ids)->delete();
            DB::table("services")->whereIn('id', $ids)->delete();
            DB::commit();
            return 1;
        } catch (\Exception $e) {
            DB::rollback();
            return $e;
            // return 0;
        }
    }


    public static function showFile($req)
    {
        return DB::select("SELECT * FROM service_files WHERE service_id='$req' ");
    }

    public static function deleteFiles($req)
    {
        $id  = $req->input('id');

        DB::beginTransaction();
        try {
            $SQL  = "DELETE FROM service_files WHERE  id ='$id' ";
            DB::delete($SQL);
            DB::commit();
            return 1;
        } catch (\Exception $e) {
            DB::rollback();
            return $e;
            // return 0;
        }
    }
}
