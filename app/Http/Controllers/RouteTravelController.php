<?php

namespace App\Http\Controllers;

use App\Models\CarsCategoryModel;
use App\Models\CarsModel;
use App\Models\CasetasModel;
use App\Models\DriversModel;
use App\Models\RoutesTravelModel as models;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\RedirectResponse;

class RouteTravelController extends Controller
{

    public function index(): View
    {
        $data = [
            'data' => models::getData()
        ];
        return view('admin/routetravel/listmaster', $data);
    }

    public function formAdd(): View
    {
        $data = [
            'cars'          => CarsModel::all(),
            'driver'        => DriversModel::getData(),
            'categoryCars'  => CarsCategoryModel::all(),
            // 'casetas'       => CasetasModel::casetasPrice(),
            'listCasetas'   => models::listCasetas("")
        ];
        return view('admin/routetravel/form_add', $data);
    }

    public function getListCasetas(Request $req)
    {
        $data =  models::listCasetas($req);
        return response()->json($data);
    }

    public function formedited(Request $req): View
    {
        $id = $req->input('id');
        $data = [
            'data'         => models::find($id),
            'cars'          => CarsModel::all(),
            'driver'        => DriversModel::getData(),
            'categoryCars'  => CarsCategoryModel::all(),
            // 'casetas'       => CasetasModel::casetasPrice(),
            'listCasetas'   => models::listCasetas($req)
        ];
        return view('admin/routetravel/form_edit', $data);
    }

    public function added(Request $req): RedirectResponse
    {

        $req->validate([
            'id_routes' => 'required',
            'route_name' => 'required',
            'departure' => 'required',
            'destination' => 'required',
            'travel_type' => 'required',
            'total_kms' => 'required|numeric',
            'liters_consumed' => 'required|numeric',
            'fuel_expense' => 'required',
            'yield' => 'required',
            'no_booths' => 'required|numeric',
            'booth_expense' => 'required|numeric',
            'no_drivers' => 'required|max:1',
            'car_name' => 'required',
            'category_cars' => 'required',
            'travel_time' => 'required|numeric',
        ]);


        $save = models::saveData($req);
        if ($save) {
            return redirect('/routes_travel')->with(['success' => 'Success Add New Rute']);
        } else {
            return redirect('/routes_travel/form_add')->with(['failed' => 'Failed Add New Rute ']);
        }
    }

    public function delete(Request $req)
    {
        $delete = models::deleteData($req);
        if ($delete) {
            return redirect('/routes_travel')->with(['success' => 'Success Delete Cars']);
        } else {
            return redirect('/routes_travel')->with(['failed' => 'Failed Delete Data ']);
        }
    }

    public function updated(Request $req): RedirectResponse
    {
        // $req->validate([
        //     'id_routes' => 'required',
        //     'route_name' => 'required',
        //     'departure' => 'required',
        //     'destination' => 'required',
        //     'travel_type' => 'required',
        //     'total_kms' => 'required|numeric',
        //     'liters_consumed' => 'required|numeric',
        //     'fuel_expense' => 'required',
        //     'yield' => 'required',
        //     'no_booths' => 'required|numeric',
        //     'booth_expense' => 'required|numeric',
        //     'no_drivers' => 'required',
        //     'driver_name' => 'required',
        //     'car_name' => 'required',
        //     'category_cars' => 'required',
        //     'travel_time' => 'required|numeric',
        // ]);


        $id  = $req->input('id');
        $id_routes = $req->input('id_routes');
        $route_name = $req->input('route_name');
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
        $category_cars = $req->input('category_cars');
        $casetas_id = isset($_POST['casetas_id']) ? $_POST['casetas_id'] : 0;
        $datas = models::find($id);


        DB::beginTransaction();
        try {
            $datas->id_routes = $id_routes;
            $datas->route_name = $route_name;
            $datas->departure = $departure;
            $datas->destination = $destination;
            $datas->travel_type = $travel_type;
            $datas->total_kms = $total_kms;
            $datas->liters_consumed = $liters_consumed;
            $datas->fuel_expense = $fuel_expense;
            $datas->yield = $yield;
            $datas->no_booths = $no_booths;
            $datas->booth_expense = $booth_expense;
            $datas->no_drivers = $no_drivers;
            // $datas->driver_name = $driver_name;
            $datas->category_cars = $category_cars;
            $datas->car_name = $car_name;
            $datas->travel_time = $travel_time;
            $datas->created_at =  date('Y-m-d H:i:s');
            $datas->created_by = Session('idUser');

            $lastId =   $id;
            if ($casetas_id > 0) {
                for ($i = 0; $i < count($casetas_id); $i++) {
                    $casetas_categ[] = array(
                        'casetas_id'    => $casetas_id[$i],
                        'routes_id'     => $lastId,
                        'created_at'    => date('Y-m-d H:i:s'),
                        'created_by'    => Session('idUser'),
                    );
                }
                DB::delete("DELETE FROM routes_casetas where routes_id ='$id' ");
                DB::table('routes_casetas')->insert($casetas_categ);
            } else {
                DB::delete("DELETE FROM routes_casetas where routes_id ='$id' ");
            }


            $datas->save();
            DB::commit();
            return redirect('/routes_travel')->with(['success' => 'Success Update Route']);
        } catch (\Exception $e) {
            DB::rollback();
            dd($e);
            // return back()->with(['failed' => 'Failed Update Status Route ']);
        }
    }

    public function deleteAll(Request $req)
    {
        $delete = models::deleteAll($req);
        if ($delete) {
            return redirect('/routes_travel')->with(['success' => 'Success Delete Route']);
        } else {
            return redirect('/routes_travel')->with(['failed' => 'Failed Delete Route ']);
        }
    }
}
