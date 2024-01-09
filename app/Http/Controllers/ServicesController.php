<?php

namespace App\Http\Controllers;

use App\Mail\SendMail;
use App\Models\CarsModel;
use App\Models\CosModel;
use App\Models\Drivers\AdvanceModels;
use App\Models\Drivers\DestinationModels;
use App\Models\Drivers\InitialModels;
use App\Models\Drivers\ServiceHomeModels;
use App\Models\Drivers\ServiceModels;
use App\Models\DriversModel;
use App\Models\ServicePDFModel;
use App\Models\ServicesModel as models;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Barryvdh\DomPDF\Facade\Pdf as pdfs;
use Illuminate\Support\Facades\Mail;

class ServicesController extends Controller
{

    public function index(): View
    {


        return view('admin/services/listmaster');
    }

    public function showServices(Request $req)
    {
        $data = models::showData($req);

        $res = array();
        foreach ($data as $dt) {
            $totaleskilometers = ServicePDFModel::IDAKilometros_por_recorrer($dt->id) + ServicePDFModel::RegresoKilometros_por_recorrer($dt->id);


            $ReturningToHome =  ServiceHomeModels::where('service_id', $dt->id)->get();
            $fuelhome = count($ReturningToHome) > 0 ? $ReturningToHome[0]->home_charge_fill_tank : 0;
            $totalesLitros = ServicePDFModel::IDALitros($dt->id) + ServicePDFModel::RegresoLitros($dt->id) + $fuelhome;


            $kmsLitros = 0;
            if ($totaleskilometers > 0) {
                $kmsLitros = $totaleskilometers  / $totalesLitros;
            }

            $res[] = array(
                'id'                    => $dt->id,
                'driver_name'           => ucwords(strtolower($dt->driver_name)),
                'car_name'              => ucwords(strtolower($dt->car_name)),
                'date'                  => $dt->date,
                'costperservices_id'    => $dt->costperservices_id,
                'departure'             => ucwords(strtolower($dt->departure)),
                'destination'           => ucwords(strtolower($dt->destination)),
                'status'                => $dt->status,
                'trip_milage'           => number_format($totaleskilometers, 2),
                'kms_litres'            => number_format($kmsLitros, 2),
                'payment_status'        => $dt->payment_status,
                'litros'                => $totalesLitros,
                'status'                => $dt->status,
                'customer_name'         => ucwords(strtolower($dt->customer_name)),
            );
        }
        return response()->json($res);
    }

    public function formAdd(): View
    {
        $data = [
            'cost'      => CosModel::orderBy('created_at', 'DESC')->get(),
            'driver'    => DriversModel::orderBy('first_name', 'ASC')->where('user_type_id', 5)->get(),
            'car'       => CarsModel::orderBy('car_name', 'ASC')->get()
        ];
        return view('admin/services/form_add', $data);
    }

    public function added(Request $req): RedirectResponse
    {

        // $req->validate([
        //     'no_serie' => 'required',
        //     'car_name' => 'required',
        //     'plate' => 'required',
        //     'color' => 'required',
        //     'pasajeros' => 'required',
        //     'per_day_cost' => 'required',
        //     'odometro' => 'required',
        //     'car_feature' => 'required',
        //     'purchase_date' => 'required',
        //     'vehicle_cost' => 'required',
        //     'rendimiento_por_litro' => 'required',
        //     'fuel_capacity' => 'required',
        //     'fuel_type' => 'required',
        //     'image' => 'required',
        //     'image.*' => 'mimes:jpg,jpeg,png|max:3000',
        //     'model' => 'required',
        //     'car_type_desc' => 'required',
        //     'num_permission' => 'required',
        //     'car_type' => 'required',
        // ]);


        $save = models::saveData($req);
        if ($save) {
            return redirect('/services')->with(['success' => 'Success Add Data']);
        } else {
            return redirect('/services/form_add')->with(['failed' => 'Failed Add Data ']);
        }
    }

    public function delete(Request $req)
    {
        $delete = models::deleteData($req);
        if ($delete) {
            return redirect('/services')->with(['success' => 'Success Add Data']);
        } else {
            return redirect('/services')->with(['failed' => 'Failed Delete Data ']);
        }
    }

    public function deleteAll(Request $req)
    {
        $delete = models::deleteAll($req);
        if ($delete) {
            return redirect('/services')->with(['success' => 'Success Add Data']);
        } else {
            return redirect('/services')->with(['failed' => 'Failed Delete Data ']);
        }
    }

    public function formEdit(Request $req): View
    {
        $data = [
            'cost'      => CosModel::orderBy('created_at', 'DESC')->get(),
            'data'      => models::find($req->id),
            'driver'    => DriversModel::orderBy('first_name', 'ASC')->where('user_type_id', 5)->get(),
            'car'       => CarsModel::orderBy('car_name', 'ASC')->get()
        ];
        return view('admin/services/form_edit', $data);
    }

    public function updated(Request $req)
    {
        $id  = $req->input('id');
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
        $status = $req->input('status_');
        $status_payment = $req->input('status_payment');

        $datas = models::find($id);

        DB::beginTransaction();
        try {

            $datas->costperservices_id    = $cost_id;
            $datas->itinerary             = $itinerary;
            $datas->driver_id             = $driver;
            $datas->date                  = $date;
            $datas->time_departure        = $time_departure;
            $datas->car_id                = $cars;
            $datas->meeting_point         = $meeting_point;
            $datas->departure             = $departure;
            $datas->destination           = $destination;
            $datas->expenses              = $expenses;
            $datas->status                = $status;
            $datas->payment_status        = $status_payment;
            $datas->updated_at            = date('Y-m-d H:i:s');


            $datas->save();
            DB::commit();
            return redirect('/services')->with(['success' => 'Success Update Services']);
        } catch (\Exception $e) {
            DB::rollback();
            return $e;
            // return back()->with(['failed' => 'Failed Update Status Data ']);
        }
    }


    public function showAnticipo(Request $req): View
    {

        $SQL = DB::select("SELECT concat(us.first_name,'  ', us.last_name) as first_names, concat(us1.first_name,'  ', us1.last_name) as seconds_names , cps.no_of_days , 
        us.fee_per_day as fees_1 ,  us1.fee_per_day as fees_2 , cps.no_drivers , us.id as idDrive1 , us1.id as idDrive2 from cost_per_services cps 
        left join users us on us.id  = cps.driver_name 
        left join users us1 on us1.id = cps.second_drivers WHERE cps.id = $req->cost_id ");

        $data = [
            'cost'           => $SQL,
            'service_id'     => $req->ordenId,
            'dataAdvance'    => AdvanceModels::where('service_id', $req->ordenId)->get()
        ];
        return view('admin/services/modalanticipo', $data);
    }


    public function updateAnticipo(Request $req)
    {
        $service_id = $req->service_id;
        $advance_1 = $req->advance_1;
        $advance_2 = $req->advance_2;
        $payment_total_1 = $req->payment_total_1;
        $payment_total_2 = $req->payment_total_2;
        $advance_1 = $req->advance_1;
        $advance_2 = $req->advance_2;
        $driver_id_1 = $req->driver_id_1;
        $driver_id_2 = $req->driver_id_2;
        $cari = AdvanceModels::where('service_id', $service_id)->get();
        if (count($cari) <= 0) {
            DB::beginTransaction();
            try {
                $data = array(
                    'advance_1'         => $advance_1,
                    'advance_2'         => $advance_2,
                    'payment_total_1'   => $payment_total_1,
                    'payment_total_2'   => $payment_total_2,
                    'driver_id_1'       => $driver_id_1,
                    'driver_id_2'       => $driver_id_2,
                    'service_id'        => $service_id,
                    'user_id'           => Session('idUser'),
                    'date_reg'          => date('Y-m-d H:i:s')
                );
                DB::table('service_advance')->insert($data);
                DB::commit();
                return redirect('/services')->with(['success' => 'Success Update Anticipo']);
            } catch (\Exception $e) {
                DB::rollback();
                return redirect('/services')->with(['failed' => 'Failed Update Anticipo']);
            }
        } else {
            DB::beginTransaction();
            try {
                $data = AdvanceModels::find($cari[0]->id);

                $data->advance_1        = $advance_1;
                $data->advance_2        = $advance_2;
                $data->payment_total_1  = $payment_total_1;
                $data->payment_total_2  = $payment_total_2;
                $data->driver_id_1      = $driver_id_1;
                $data->driver_id_2      = $driver_id_2;
                $data->service_id       = $service_id;
                $data->date_update      = date('Y-m-d H:i:s');
                $data->updated_at       = date('Y-m-d H:i:s');

                $data->save();
                DB::commit();
                return redirect('/services')->with(['success' => 'Success Update Anticipo']);
            } catch (\Exception $e) {
                DB::rollback();
                return redirect('/services')->with(['failed' => 'Failed Update Anticipo']);
            }
        }
    }

    public function updateNotas(Request $req)
    {
        $datas = models::find($req->servicess_id);

        DB::beginTransaction();
        try {

            $datas->note          = $req->nota;
            $datas->updated_at    = date('Y-m-d H:i:s');

            $datas->save();
            DB::commit();
            return redirect('/services')->with(['success' => 'Success Update Nota']);
        } catch (\Exception $e) {
            DB::rollback();
            return back()->with(['failed' => 'Failed Update Status Data ']);
        }
    }


    public function serviceFile(Request $req): View
    {

        $data = [
            'cost'      => CosModel::all(),
            'id'        => $req->id
        ];
        return view('admin/services/service_file', $data);
    }

    public function serviceuploadFiles(Request $req)
    {
        $id = $req->input("id");
        $image = $req->file('file');
        $imageName = $image->getClientOriginalName();
        $image->move(public_path('admin/service_file'), $imageName);
        $dataSave = array(
            'description'   => '',
            'filename'      => $imageName,
            'title'         => pathinfo($imageName, PATHINFO_FILENAME),
            'created'       => date('Y-m-d H:i:s'),
            'service_id'    => $id
        );

        DB::beginTransaction();
        try {
            DB::table('service_files')->insert($dataSave);
            DB::commit();
            return 1;
        } catch (\Exception $e) {
            DB::rollback();
            return $e;
            // return 0;
        }
    }

    public function ajaxFiles(Request $req)
    {
        $id = $req->input('id');
        $data = models::showFile($id);
        return response()->json($data);
    }

    public function deleteFiles(Request $req)
    {
        $delete = models::deleteFiles($req);
        echo $delete;
    }


    public static function pdfReportGastos(Request $req)
    {

        $datas = ServiceModels::find($req->id);
        $cosId = $datas->costperservices_id;
        $datasCosModel = CosModel::find($cosId);
        $rotueId = $datasCosModel->routes_id;
        $filename = 'Repote De Gastos' . time() . '.pdf';
        // echo   $rotueId   . '<br>' . $datasCosModel->category_cars;
        // dd(ServicePDFModel::detailCasetas($rotueId, $datasCosModel->category_cars));
        $data = [
            'title'         => $filename,
            'headerData'    => ServicePDFModel::headerReport($cosId),
            'presupuesto'   => CosModel::find($cosId),
            'detailCasets'  => ServicePDFModel::detailCasetas($rotueId, $datasCosModel->category_cars),
            'hargaCasetas'  => ServicePDFModel::detailHargaCasetas($rotueId),
            'serviceId'     => $req->id,
            'note'          => $datas->note,
            'initialServices'   => InitialModels::where('service_id', $req->id)->get(),
            'Destination'       => DestinationModels::where('service_id', $req->id)->get(),
            'ReturningToHome'   => ServiceHomeModels::where('service_id', $req->id)->get()
        ];


        $pdf = pdfs::loadView('admin/services/pdf_gastos', $data)->setPaper('a4', 'portrait');
        return $pdf->stream($filename, array('attachment' => true));
    }


    public static function pdfReportContracto(Request $req)
    {

        $datas = ServiceModels::find($req->id);
        $costId = $datas->costperservices_id;
        $costData = CosModel::find($costId);
        $carId = $datas->car_id;
        $filename = 'Contracto - ' . time() . '.pdf';
        $data = [
            'title'         => $filename,
            'costData'      => $costData,
            'serviceData'   => $datas,
            'driver1'        =>  DriversModel::find($costData->driver_name),
            'driver2'        => DriversModel::find($costData->second_drivers),
            'carData'       => CarsModel::find($carId),
            'quotesTotal'   => ServicePDFModel::totalCostQuotes($costId),
            'contractPage1' => ServicePDFModel::contract1($req)
        ];

        $pdf = pdfs::loadView('admin/services/contracto', $data)->setPaper('a4', 'portrait');
        return $pdf->stream($filename, array('attachment' => true));
    }



    public static function test()
    {
        $mailData = [
            'subject'   => 'Cotización' . 1212 . '|Mundochiapas.com - Mundochiapas.com',
            'data'      => ['quantity' => '34', 'unit_price' => '20'],
            'title'     => 'Cotización' . 1213 . '|Mundochiapas.com - Mundochiapas.com',
            'note'      => 2,
            'costumer'  => 2,
            'email'     => 2,
            'services'  => 2,
            'invoice'   => 3434,
            'fecha'     => date('Y-m-d H:i:s'),
            'gallery'   => 1,
            'ids'       =>  1
        ];
        try {
            Mail::to("depiyawandasep13@gmail.com")
                ->send(new SendMail($mailData));
        } catch (\Exception $e) {
            dd($e);
        }
    }
}
