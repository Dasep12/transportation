<?php

namespace App\Http\Controllers;

use Mail;

use App\Mail\SendMail;
use App\Models\CarsCategoryModel;
use App\Models\CarsModel;
use App\Models\CosModel as models;
use App\Models\DriversModel;
use App\Models\RoutesTravelModel;
use App\Models\SolicitudModel;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail as FacadesMail;

class CosServiceController extends Controller
{

    public function index(): View
    {
        //dd(CosModel::getData());
        $data = [
            'data'          => models::getData(),

        ];
        return view('admin/costperservices/listmaster', $data);
    }

    public function formAdd(Request $req): View
    {

        $name = "";
        $ruta = "";
        $solicId = "";
        if (!empty($req->solicitud_id)) {
            $solicitud =   SolicitudModel::getDetails($req->solicitud_id);
            $name = $solicitud[0]->name;
            $ruta = $solicitud[0]->route;
            $solicId = $req->solicitud_id;
        }


        $data = [
            'cars'      => CarsModel::where('status', 'Active')->get(),
            'driver'    => DriversModel::where('status', 'Active')->get(),
            'categoryCars'  => CarsCategoryModel::all(),
            'route'     => RoutesTravelModel::orderBy('created_at', 'DESC')->get(),
            'listCasetas'   => RoutesTravelModel::listCasetas(""),
            'name'          => $name,
            'ruta'          => $ruta,
            'solicidx'         => $solicId
        ];
        return view('admin/costperservices/form_add', $data);
    }

    public function getListCars(Request $req)
    {
        $data  = CarsModel::where('category_cars', $req->id)
            ->where('car_status', 'Disponible')
            ->where('status', 'Active')
            ->get();
        return response()->json($data);
    }

    public function details(Request $req): View
    {

        $data = [
            'cars'      => CarsModel::where('status', 'Active')->get(),
            'driver'    => DriversModel::where('status', 'Active')->get(),
            'route'     => RoutesTravelModel::all(),
            'data'      => models::getData($req->id)
        ];
        return view('admin/costperservices/details', $data);
    }

    public function added(Request $req): RedirectResponse
    {

        $req->validate([
            'no_of_days' => 'required',
            'utility'    => 'required|max:2',
        ]);


        $save = models::saveData($req);
        // dd($save);
        if ($save) {
            return redirect('/quotes/form_add?ref_id=' . $save)->with(['success' => 'Success Add Cost', 'usernames' => $req->customer_name]);
        } else {
            return redirect('/costperservice/form_add')->with(['failed' => 'Failed Add Data ']);
        }
    }

    public function formedited(Request $req): View
    {
        $id = $req->input('id');
        $data = [
            'data'      => models::find($id),
            'cars'      => CarsModel::where('status', 'Active')->get(),
            'driver'    => DriversModel::where('status', 'Active')->get(),
            'route'     => RoutesTravelModel::all(),
            'categoryCars'  => CarsCategoryModel::all(),
        ];
        return view('admin/costperservices/form_edit', $data);
    }

    public function updated(Request $req)
    {
        $id  = $req->input('id');
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
        $datas = models::find($id);

        DB::beginTransaction();
        try {

            $datas->cars_id          = $cars_id;
            $datas->category_cars          = $category_cars;
            $datas->routes_id        = $routes_id;
            $datas->departure_city   = $departure_city;
            $datas->destination_city = $destination_city;
            $datas->departure_date   = $departure_date;
            $datas->departure_time   = $departure_time;
            $datas->returning_time   = $returning_time;
            $datas->returning_date   = $returning_date;
            $datas->no_of_days       = $no_of_days;
            $datas->cost_per_days    = $cost_per_days;
            $datas->kms_total        = $kms_total;
            $datas->extra_kilometres = $extra_kilometres;
            $datas->total_travel_kms = $total_travel_kms;
            $datas->car_performance_liter = $car_performance_liter;
            $datas->total_liter_consume = $total_liter_consume;
            $datas->cost_per_liter   = $cost_per_liter;
            $datas->total_fuel_expense = $total_fuel_expense;
            $datas->booth_expense    = $booth_expense;
            $datas->no_drivers       = $no_drivers;
            $datas->driver_name      = $driver_name;
            $datas->second_drivers   = $driver_name_second;
            $datas->driver_fee       = $driver_fee;
            $datas->total_fee_drivers = $total_fee_drivers;
            $datas->hotel_fee        = $hotel_fee;
            $datas->airport_fee      = $airport_fee;
            $datas->car_wash         = $car_wash;
            $datas->amenities        = $amenities;
            $datas->total_cost       = $total_cost;
            $datas->utility          = $utility;
            $datas->sugested_price   = $sugested_price;
            $datas->customer_name    = $customer_name;
            $datas->total_casetas    = $total_casetas;
            $datas->updated_by       = Session('idUser');
            $datas->updated_at       = date("Y-m-d H:i:s");

            $datas->fee_seconds_drivers  = $fee_seconds_drivers;
            $datas->fee_first_driver    = $fee_first_driver;
            $datas->save();
            DB::commit();
            return redirect('/costperservice')->with(['success' => 'Success Update Data']);
        } catch (\Exception $e) {
            DB::rollback();
            return $e;
            // return back()->with(['failed' => 'Failed Update Status Data ']);
        }
    }

    public function delete(Request $req)
    {
        $delete = models::deleteData($req);
        if ($delete) {
            return redirect('/costperservice')->with(['success' => 'Success Delete Data']);
        } else {
            return redirect('/costperservice')->with(['failed' => 'Failed Delete Data']);
        }
    }

    public function deleteAll(Request $req)
    {
        $delete = models::deleteAll($req);

        if ($delete) {
            return redirect('/costperservice')->with(['success' => 'Success Delete Data']);
        } else {
            return redirect('/costperservice')->with(['failed' => 'Failed Delete Data']);
        }
    }

    public function casetasSummarize(Request $req)
    {
        $data = models::sumarizeCasetas($req);
        echo $data;
    }

    public function addedNewRoutes(Request $req)
    {
        $save = RoutesTravelModel::saveData($req);
        return redirect()->back()->with('success', $save);
    }


    public function checkCarAvailable(Request $req)
    {
        $car_id = $req->car_id;
        $date   = $req->return_date;
        $time   = $req->return_time;

        $dates = $date . ' ' . $time;

        // $departure_date = 
        if (!empty($car_id) && !empty($date) && !empty($time)) {
            $data = DB::select("SELECT q.id , q.payment_status ,  c.car_name  , rt.route_name  ,  cps.returning_date  , cps.returning_time  , 
            date_format(concat(cps.returning_date,' ' , cps.returning_time),'%Y-%m-%d %T')as return_car_date 
            from cost_per_services cps  
            left join quotes q on q.reference  = cps.id 
            left join cars c on c.id = cps.cars_id 
            left join  route_travel rt on rt.id  = cps.routes_id 
            where q.payment_status  = 'Paid' and date_format('$dates','%Y-%m-%d %T') <=  date_format(concat(cps.returning_date,' ', cps.returning_time),'%Y-%m-%d %T') and cps.cars_id  = '$car_id' ");
            // $data = DB::select("SELECT q.id , q.payment_status ,  c.car_name  , rt.route_name  ,  cps.departure_date  , cps.returning_date 
            // from cost_per_services cps  
            // left join quotes q on q.reference  = cps.id 
            // left join cars c on c.id = cps.cars_id 
            // left join  route_travel rt on rt.id  = cps.routes_id 
            // where q.payment_status  = 'Paid' and date_format('$date','%Y-%m-%d') <=  date_format(cps.returning_date,'%Y-%m-%d') and cps.cars_id  = '$car_id' ");

            if (count($data) > 0) {
                return response()->json([
                    'res' => true,
                    'data' => $data
                ]);
            } else {
                return response()->json([
                    'res' => false,
                ]);
            }
        } else {
            return response()->json([
                'res' => false,
            ]);
        }
    }
}
