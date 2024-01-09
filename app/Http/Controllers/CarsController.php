<?php

namespace App\Http\Controllers;

use App\Models\CarsCategoryModel;
use App\Models\CarsModel as models;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\RedirectResponse;

class CarsController extends Controller
{

    public function index(): View
    {
        $data = [
            'data' => models::orderBy("created", 'DESC')->get()
        ];
        return view('admin/cars/listmaster', $data);
    }

    public function formAdd(): View
    {
        $data =  [
            'categoryCars' => CarsCategoryModel::all()
        ];
        return view('admin/cars/form_add', $data);
    }

    public function formedited(Request $req): View
    {
        $id = $req->input('id');
        $data = [
            'data' => models::getData($id),
            'categoryCars' => CarsCategoryModel::all()
        ];
        return view('admin/cars/form_edit', $data);
    }

    public function added(Request $req): RedirectResponse
    {

        $req->validate([
            'no_serie' => 'required',
            'car_name' => 'required',
            'plate' => 'required',
            'color' => 'required',
            'pasajeros' => 'required',
            'per_day_cost' => 'required',
            'odometro' => 'required',
            'car_feature' => 'required',
            'purchase_date' => 'required',
            'vehicle_cost' => 'required',
            'rendimiento_por_litro' => 'required',
            'fuel_capacity' => 'required',
            'fuel_type' => 'required',
            'image' => 'required',
            'image.*' => 'mimes:jpg,jpeg,png|max:3000',
            'model' => 'required',
            'car_type_desc' => 'required',
            'num_permission' => 'required',
            'car_type' => 'required',
            'car_status' => 'required',
        ]);


        $save = models::saveData($req);
        if ($save) {
            return redirect('/cars')->with(['success' => 'Success Add Cars']);
        } else {
            return redirect('/cars/form_add')->with(['failed' => 'Failed Add Data ']);
        }
    }

    public function delete(Request $req)
    {
        $delete = models::deleteData($req);
        if ($delete) {
            return redirect('/cars')->with(['success' => 'Success Delete Cars']);
        } else {
            return redirect('/cars')->with(['failed' => 'Failed Delete Data ']);
        }
    }

    public function deleteGallery(Request $req)
    {
        $delete = models::deleteGallery($req);
        echo $delete;
    }

    public function updated(Request $req)
    {
        $id  = $req->input('id');
        $no_serie = $req->input('no_serie');
        $car_name = $req->input('car_name');
        $category_cars = $req->input('category_cars');
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

        $datas = models::find($id);

        DB::beginTransaction();
        try {

            $datas->no_serie =  $no_serie;
            $datas->car_name =  $car_name;
            $datas->category_cars =  $category_cars;
            $datas->plate =  $plate;
            $datas->color =  $color;
            $datas->pasajeros =  $pasajeros;
            $datas->per_day_cost =  $per_day_cost;
            $datas->odometro =  $odometro;
            $datas->car_feature =  $car_feature;
            $datas->purchase_date =  $purchase_date;
            $datas->vehicle_cost =  $vehicle_cost;
            $datas->rendimiento_por_litro =  $rendimiento_por_litro;
            $datas->purchase_date =  $purchase_date;
            $datas->fuel_capacity =  $fuel_capacity;
            $datas->fuel_type =  $fuel_type;
            $datas->model =  $model;
            $datas->car_status =  $car_status;
            $datas->fuel_type =  $fuel_type;
            $datas->car_type_desc =  $car_type_desc;
            $datas->car_type =  $car_type;
            $datas->num_permission =  $num_permission;
            $datas->updated_at = date('Y-m-d H:i:s');



            if ($req->file('image')) {
                $file = $req->file('image');
                $filename = 'cars' . rand(23, 25)  . $file->getClientOriginalName();
                $file->move(public_path('admin/img/cars'), $filename);

                $datas->image =  $filename;
            }

            if ($req->file('insurance_policy')) {
                $file = $req->file('insurance_policy');
                $filename = 'cars' . rand(42, 25)  . $file->getClientOriginalName();
                $file->move(public_path('admin/img/cars'), $filename);

                $datas->insurance_policy = $filename;
            }

            $datas->save();
            DB::commit();
            return redirect('/cars')->with(['success' => 'Success Update Cars']);
        } catch (\Exception $e) {
            DB::rollback();
            return $e;
            // return back()->with(['failed' => 'Failed Update Status Data ']);
        }
    }

    public function deleteAll(Request $req)
    {
        $delete = models::deleteAll($req);
        if ($delete) {
            return redirect('/cars')->with(['success' => 'Success Delete Cars']);
        } else {
            return redirect('/cars')->with(['failed' => 'Failed Delete Data ']);
        }
    }



    public function gallery(Request $req): View
    {
        $id = $req->input('id');
        $data = [
            'data' => models::gallery($id),
            'id'   => $id
        ];
        return view('admin/cars/gallery', $data);
    }

    public function ajaxGallery(Request $req)
    {
        $id = $req->input('id');
        $data = models::gallery($id);
        return response()->json($data);
    }


    public function uploadGallery(Request $req)
    {

        $save = models::saveGallery($req);
        echo $save;
    }
}
