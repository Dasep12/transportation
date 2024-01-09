<?php

namespace App\Http\Controllers\Drivers;

use App\Http\Controllers\Controller;
use App\Models\CarsModel;
use App\Models\Drivers\DestinationModels;
use App\Models\Drivers\ExpenseModels;
use App\Models\Drivers\InitialModels;
use App\Models\Drivers\IntermediateModels;
use App\Models\Drivers\ReturningModels;
use App\Models\Drivers\ServiceHomeModels;
use App\Models\Drivers\ServiceModels as models;
use App\Models\Drivers\ServiceModels;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;


class ServicesController extends Controller
{
    //
    public function index(): View
    {
        return view('drivers/listmaster');
    }

    public function showServices(Request $req)
    {

        $data = models::showData($req);
        return response()->json($data);
    }

    public function formEdit(Request  $req): View
    {
        $data = [
            'servid'                => $req->id,
            'fuel_tank'             => ServiceModels::getFuelTank($req->id),
            'initial_service'       => InitialModels::find(InitialModels::getId($req->id)),
            'service_intermediate'  => IntermediateModels::where('service_id', $req->id)->get(),
            'service_destination'   => DestinationModels::find(DestinationModels::getId($req->id)),
            'returning_destination' => ReturningModels::where('service_id', $req->id)->get(),
            'home_service'          => ServiceHomeModels::find(ServiceHomeModels::getId($req->id)),
        ];
        return view('drivers/form_edit', $data);
    }

    public function adedd(Request $req)
    {
        // $save = ServiceModels::insertData($req);
        // dd($save);


        DB::beginTransaction();
        $servId = $req->service_id;
        try {

            // section initial 
            $searchInitial = DB::select("SELECT * ,count(id) as total from service_initial WHERE service_id = '$servId' ");
            if ($searchInitial[0]->total <= 0) {
                $init_odometer      = $req->init_odometer;
                $initial_fuel_tank  = $req->initial_fuel_tanks;
                $evidencia = "";
                if (!empty($req->file('evidencia'))) {
                    $file = $req->file('evidencia');
                    $filename = 'init' . time()  . $file->getClientOriginalName();
                    $file->move(public_path('admin/img/services/'), $filename);
                    $evidencia = $filename;
                }
                $initialData = array(
                    'service_id'         => $servId,
                    'init_odometer'      => $init_odometer,
                    'initial_fuel_tank'  => $initial_fuel_tank,
                    'evidencia'          => $evidencia,
                    'created_at'         => date('Y-m-d H:i:s'),
                    'created_by'         => Session('idUser'),
                    'others_fuel'        => $req->type_fuel
                );
                DB::table('service_initial')->insert($initialData);
            } else {
                $initdata = InitialModels::find($searchInitial[0]->id);
                $initdata->init_odometer      = $req->init_odometer;
                $initdata->initial_fuel_tank  = $req->initial_fuel_tank;
                $initdata->others_fuel  = $req->type_fuel;
                if ($req->file('evidencia')) {
                    $file = $req->file('evidencia');
                    $filename = 'init' . time()  . $file->getClientOriginalName();
                    $file->move(public_path('admin/img/services/'), $filename);
                    $initdata->evidencia = $filename;
                }
                $initdata->save();
            }

            //section fuel Fuel Recharge Intermediate
            $searchIntermediate = DB::select("SELECT * ,count(id) as total from service_intermediate WHERE service_id = '$servId' ");
            if ($searchIntermediate[0]->total <= 0) {
                $rechargeIntermediateData = [];
                $datastime_charge = [];
                if ($req->input('odometer_time_charge')) {
                    $datastime_charge = $req->input('odometer_time_charge');
                }
                for ($i = 0; $i < count($datastime_charge); $i++) {
                    $list = [
                        'odometer_time_charge'  => $req->input('odometer_time_charge')[$i],
                        'amount_liters_charged' => $req->input('amount_liters_charged')[$i],
                        'cost_charged_fuel'     => $req->input('cost_charged_fuel')[$i],
                        'photo_evidence'        => "",
                        'created_at'            => date('Y-m-d H:i:s'),
                        'created_by'            => Session('idUser'),
                        'service_id'            => $servId,
                    ];
                    if (!empty($req->file('photo_evidence')[$i])) {
                        $file = $req->file('photo_evidence')[$i];
                        $filename = 'init' . rand(23, 25)  . $file->getClientOriginalName();
                        $file->move(public_path('admin/img/services/'), $filename);
                        $list['photo_evidence'] = $filename;
                    }
                    $rechargeIntermediateData[] = $list;
                }
                DB::table('service_intermediate')->insert($rechargeIntermediateData);
            } else {
                $rechargeIntermediateData = [];
                for ($i = 0; $i < count($req->input('odometer_time_charge')); $i++) {

                    $idx  = $req->input('idIntermediate')[$i];

                    $searching = IntermediateModels::find($idx);
                    if (!empty($searching)) {
                        $searching->odometer_time_charge = $req->input('odometer_time_charge')[$i];
                        $searching->amount_liters_charged = $req->input('amount_liters_charged')[$i];
                        $searching->cost_charged_fuel = $req->input('cost_charged_fuel')[$i];
                        if (!empty($req->file('photo_evidence')[$i])) {
                            $file = $req->file('photo_evidence')[$i];
                            $filename = 'init' . time()  . $file->getClientOriginalName();
                            $file->move(public_path('admin/img/services/'), $filename);
                            $searching->photo_evidence = $filename;
                        }
                        $searching->save();
                    } else {
                        $list = [
                            'odometer_time_charge'  => $req->input('odometer_time_charge')[$i],
                            'amount_liters_charged' => $req->input('amount_liters_charged')[$i],
                            'cost_charged_fuel'     => $req->input('cost_charged_fuel')[$i],
                            'photo_evidence'        => "",
                            'created_at'            => date('Y-m-d H:i:s'),
                            'created_by'            => Session('idUser'),
                            'service_id'            => $servId,
                        ];
                        if (!empty($req->file('photo_evidence')[$i])) {
                            $file = $req->file('photo_evidence')[$i];
                            $filename = 'init' . time() . $file->getClientOriginalName();
                            $file->move(public_path('admin/img/services/'), $filename);
                            $list['photo_evidence'] = $filename;
                        }
                        $rechargeIntermediateData[] = $list;
                    }
                }
                DB::table('service_intermediate')->insert($rechargeIntermediateData);
            }


            // section destination
            $searchDestination = DB::select("SELECT * ,count(id) as total from service_destination WHERE service_id = '$servId' ");
            if ($searchDestination[0]->total <= 0) {
                $odometer_at_destination         = $req->odometer_at_destination;
                $fuel_tank_at_destination        = $req->fuel_tank_at_destination;
                $photo_destination = "";
                if (!empty($req->file('photo_destination'))) {
                    $file = $req->file('photo_destination');
                    $filename = 'desti' . time()  . $file->getClientOriginalName();
                    $file->move(public_path('admin/img/services/'), $filename);
                    $photo_destination = $filename;
                }
                $destinationDatas = array(
                    'service_id'                => $servId,
                    'odometer_at_destination'   => $odometer_at_destination,
                    'fuel_tank_at_destination'  => $fuel_tank_at_destination,
                    'photo_destination'         => $photo_destination,
                    'created_at'                => date('Y-m-d H:i:s'),
                    'created_by'                => Session('idUser'),
                );
                DB::table('service_destination')->insert($destinationDatas);
            } else {
                $destinationdata = DestinationModels::find($req->idDestination);
                $destinationdata->odometer_at_destination   = $req->odometer_at_destination;
                $destinationdata->fuel_tank_at_destination  = $req->fuel_tank_at_destination;
                if (!empty($req->file('photo_destination'))) {
                    $file = $req->file('photo_destination');
                    $filename = 'desti' . time()  . $file->getClientOriginalName();
                    $file->move(public_path('admin/img/services/'), $filename);
                    $destinationdata->photo_destination = $filename;
                }
                $destinationdata->save();
            }


            // section Fuel Recharge Return 1
            $searchReturning = DB::select("SELECT * ,count(id) as total from service_returning WHERE service_id = '$servId' ");
            if ($searchReturning[0]->total <= 0) {
                $ReturningData = [];
                $datastime_return = [];
                if ($req->input('return_odometer_time_charge')) {
                    $datastime_return = $req->input('return_odometer_time_charge');
                }
                for ($i = 0; $i < count($datastime_return); $i++) {
                    $list = [
                        'return_odometer_time_charge'  => $req->input('return_odometer_time_charge')[$i],
                        'return_amount_liters_charged' => $req->input('return_amount_liters_charged')[$i],
                        'return_cost_charged_fuel'     => $req->input('return_cost_charged_fuel')[$i],
                        'return_photo_evidence'        => "",
                        'created_at'                   => date('Y-m-d H:i:s'),
                        'created_by'                   => Session('idUser'),
                        'service_id'                   => $servId,
                    ];
                    if (!empty($req->file('return_photo_evidence')[$i])) {
                        $file = $req->file('return_photo_evidence')[$i];
                        $filename = 'rtrn' . time()  . $file->getClientOriginalName();
                        $file->move(public_path('admin/img/services/'), $filename);
                        $list['return_photo_evidence'] = $filename;
                    }
                    $ReturningData[] = $list;
                }
                DB::table('service_returning')->insert($ReturningData);
            } else {
                $ReturningData = [];
                for ($i = 0; $i < count($req->input('return_odometer_time_charge')); $i++) {

                    $idx  = $req->input('idreturning1')[$i];

                    $searching = ReturningModels::find($idx);
                    if (!empty($searching)) {
                        $searching->return_odometer_time_charge = $req->input('return_odometer_time_charge')[$i];
                        $searching->return_amount_liters_charged = $req->input('return_amount_liters_charged')[$i];
                        $searching->return_cost_charged_fuel = $req->input('return_cost_charged_fuel')[$i];
                        if (!empty($req->file('return_photo_evidence')[$i])) {
                            $file = $req->file('return_photo_evidence')[$i];
                            $filename = 'rtrn' . time()  . $file->getClientOriginalName();
                            $file->move(public_path('admin/img/services/'), $filename);
                            $searching->return_photo_evidence = $filename;
                        }
                        $searching->save();
                    } else {
                        $list = [
                            'return_odometer_time_charge'  => $req->input('return_odometer_time_charge')[$i],
                            'return_amount_liters_charged' => $req->input('return_amount_liters_charged')[$i],
                            'return_cost_charged_fuel'     => $req->input('return_cost_charged_fuel')[$i],
                            'return_photo_evidence'        => "",
                            'created_at'                   => date('Y-m-d H:i:s'),
                            'created_by'                   => Session('idUser'),
                            'service_id'                   => $servId,
                        ];
                        if (!empty($req->file('return_photo_evidence')[$i])) {
                            $file = $req->file('return_photo_evidence')[$i];
                            $filename = 'rtrn' . time()  . $file->getClientOriginalName();
                            $file->move(public_path('admin/img/services/'), $filename);
                            $list['return_photo_evidence'] = $filename;
                        }
                        $ReturningData[] = $list;
                    }
                }
                DB::table('service_returning')->insert($ReturningData);
            }

            // section fuel returning to Home
            $searchReturnHome = DB::select("SELECT * , count(id) as total from service_home WHERE service_id = '$servId' ");
            if ($searchReturnHome[0]->total <= 0) {
                $home_odometer_arrival          = $req->home_odometer_arrival;
                $home_fuel_level_arrival        = $req->home_fuel_level_arrival;
                $home_charge_fill_tank          = $req->home_charge_fill_tank;
                $home_cost_fuel_fill_tank       = $req->home_cost_fuel_fill_tank;
                $home_photo_evidence = "";
                if ($req->file('home_photo_evidence')) {
                    $file = $req->file('home_photo_evidence');
                    $filename = 'hm' . time()  . $file->getClientOriginalName();
                    $file->move(public_path('admin/img/services/'), $filename);
                    $home_photo_evidence = $filename;
                }
                $homeDatas = array(
                    'service_id'                => $servId,
                    'home_odometer_arrival'     => $home_odometer_arrival,
                    'home_fuel_level_arrival'   => $home_fuel_level_arrival,
                    'home_charge_fill_tank'     => $home_charge_fill_tank,
                    'home_cost_fuel_fill_tank'  => $home_cost_fuel_fill_tank,
                    'home_photo_evidence'       => $home_photo_evidence,
                    'created_at'                => date('Y-m-d H:i:s'),
                    'created_by'                => Session('idUser'),
                );
                DB::table('service_home')->insert($homeDatas);
            } else {
                $homereturndata = ServiceHomeModels::find($req->input('id_home'));

                if (!empty($req->home_odometer_arrival) && !empty($req->home_fuel_level_arrival)   && !empty($req->home_charge_fill_tank) && !empty($req->home_cost_fuel_fill_tank)) {
                    $homereturndata->home_odometer_arrival      = $req->home_odometer_arrival;
                    $homereturndata->home_fuel_level_arrival    = $req->home_fuel_level_arrival;
                    $homereturndata->home_charge_fill_tank      = $req->home_charge_fill_tank;
                    $homereturndata->home_cost_fuel_fill_tank   = $req->home_cost_fuel_fill_tank;
                    if ($req->file('home_photo_evidence')) {
                        $file = $req->file('home_photo_evidence');
                        $filename = 'hm' . time()  . $file->getClientOriginalName();
                        $file->move(public_path('admin/img/services/'), $filename);
                        $homereturndata->home_photo_evidence = $filename;
                    }
                    $homereturndata->save();
                    // $dataServices = ServiceModels::find($servId);
                    // $dataServices->status = 'Accomplished';
                    // $dataServices->save();

                    $dataServices = ServiceModels::find($servId);
                    $cars_sql    = DB::select("SELECT cars_id from cost_per_services WHERE id = '$dataServices->costperservices_id' ");
                    $cars_datas = CarsModel::find($cars_sql[0]->cars_id);
                    $cars_datas->car_status = 'Disponible';
                    $dataServices->status = 'Accomplished';
                    $dataServices->save();
                    $cars_datas->save();
                }
            }

            DB::commit();
            return redirect('/drivers/services')->with(['success' => 'Success Insert Data']);
        } catch (\Exception $e) {
            DB::rollback();
            dd($e);
            return redirect('/drivers/services/edited?id=' . $req->service_id)->with(['failed' => 'Failed Insert Data ']);
        }
    }



    public function formgastos(Request $req): View
    {
        $data = [
            'servid'            => $req->id,
            'data'              => ExpenseModels::find(ExpenseModels::getId($req->id))
        ];
        return view('drivers/gastos', $data);
    }

    public function addGastos(Request $req)
    {
        $service_id   = $req->service_id;

        // Gasto de Hospedajes
        $hotel_fee_go = $req->hotel_fee_go;
        $hotel_fee_img_go = "";

        // Gasto de Lavado 
        $car_wash_go = $req->car_wash_go;
        $car_wash_img_go = "";


        // Gasto de Aeropuerto
        $airport_fee_go = $req->airport_fee_go;
        $airport_fee_img_go = "";


        // Gasto de Aeropuerto
        $other_exp_desc_go = $req->other_exp_desc_go;
        $other_exp_go = $req->other_exp_go;


        $search = DB::select("SELECT COUNT(*)as cari , id  FROM service_expense WHERE service_id = $service_id ");

        DB::beginTransaction();
        try {

            if ($search[0]->cari <= 0) {
                if ($req->file('hotel_fee_img_go')) {
                    $file = $req->file('hotel_fee_img_go');
                    $filename1 = 'hotels' . time() . $file->getClientOriginalName();
                    $file->move(public_path('admin/img/services'), $filename1);
                    $hotel_fee_img_go = $filename1;
                }
                if ($req->file('car_wash_img_go')) {
                    $file = $req->file('car_wash_img_go');
                    $filename2 = 'hotels' . time() . $file->getClientOriginalName();
                    $file->move(public_path('admin/img/services'), $filename2);
                }

                if ($req->file('airport_fee_img_go')) {
                    $file = $req->file('airport_fee_img_go');
                    $filename3 = 'hotels' . time() . $file->getClientOriginalName();
                    $file->move(public_path('admin/img/services'), $filename3);
                    $airport_fee_img_go = $filename3;
                }


                $dataHotel = array(
                    'hotel_fee_go'       => $hotel_fee_go,
                    'hotel_fee_img_go'   => $hotel_fee_img_go,
                    'service_id'         => $service_id,
                    'car_wash_go'        => $car_wash_go,
                    'car_wash_img_go'    => $car_wash_img_go,
                    'airport_fee_go'     => $airport_fee_go,
                    'airport_fee_img_go' => $airport_fee_img_go,
                    'other_exp_desc_go'  => $other_exp_desc_go,
                    'other_exp_go'       => $other_exp_go,
                    'date_add'           => date('Y-m-d H:i:s'),
                    'user_add_id'        => Session('idUser'),
                );

                DB::table('service_expense')->insert($dataHotel);
                DB::commit();
                return redirect('/drivers/services')->with(['success' => 'Success Insert Data']);
            } else {
                $hotelSQL = ExpenseModels::find($search[0]->id);
                $hotelSQL->hotel_fee_go         = $hotel_fee_go;
                $hotelSQL->car_wash_go          = $car_wash_go;
                $hotelSQL->airport_fee_go       = $airport_fee_go;
                $hotelSQL->other_exp_desc_go    = $other_exp_desc_go;
                $hotelSQL->other_exp_go         = $other_exp_go;
                if ($req->file('hotel_fee_img_go')) {
                    $file = $req->file('hotel_fee_img_go');
                    $filename = 'hotels' . time() . $file->getClientOriginalName();
                    $file->move(public_path('admin/img/services'), $filename);
                    $hotelSQL->hotel_fee_img_go = $filename;
                    $hotelSQL->updated_at = date('Y-m-d H:i:s');
                }
                if ($req->file('car_wash_img_go')) {
                    $file = $req->file('car_wash_img_go');
                    $filename2 = 'hotels' . time() . $file->getClientOriginalName();
                    $file->move(public_path('admin/img/services'), $filename2);
                    $hotelSQL->car_wash_img_go = $filename2;
                }

                if ($req->file('airport_fee_img_go')) {
                    $file = $req->file('airport_fee_img_go');
                    $filename3 = 'hotels' . time() . $file->getClientOriginalName();
                    $file->move(public_path('admin/img/services'), $filename3);
                    $hotelSQL->airport_fee_img_go = $filename3;
                }


                $hotelSQL->save();
                DB::commit();
                return redirect('/drivers/services')->with(['success' => 'Success Insert Data']);
            }
        } catch (\Exception $e) {
            DB::rollback();
            return redirect('/drivers/services/gastos?id=' . $req->service_id)->with(['failed' => 'Failed Insert Data ']);
        }
    }


    // public function add
}
