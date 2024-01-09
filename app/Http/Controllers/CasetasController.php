<?php

namespace App\Http\Controllers;

use App\Models\CarsCategoryModel;
use App\Models\CasetasModel as models;
use App\Models\RoutesTravelModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\RedirectResponse;

class CasetasController extends Controller
{

    public function index(): View
    {
        $data = [
            'data' => models::getData()
        ];
        return view('admin/casetasroutes/listmaster', $data);
    }

    public function formAdd(): View
    {
        $data  = [
            // 'routes'    => RoutesTravelModel::all(),
            'category'  => CarsCategoryModel::all(),

        ];
        return view('admin/casetasroutes/form_add', $data);
    }

    public function formedited(Request $req): View
    {

        // dd(models::checkCategories(1,11));
        $id = $req->input('id');
        $data = [
            'data'          => models::find($id),
            'category'      => CarsCategoryModel::all(),
            'cars_categ'    => DB::select("SELECT * FROM casetas_category_cars WHERE casetas_id = '$id' ")
        ];
        return view('admin/casetasroutes/form_edit', $data);
    }

    public function added(Request $req): RedirectResponse
    {
        $save = models::saveData($req);
        // dd($save);

        if ($save) {
            return redirect('/casetas_route')->with(['success' => 'Success Add Data']);
        } else {
            return redirect('/casetas_route/form_add')->with(['failed' => 'Failed Add Data ']);
        }
    }

    public function delete(Request $req)
    {
        $delete = models::deleteData($req);
        if ($delete) {
            return redirect('/casetas_route')->with(['success' => 'Success Delete Data']);
        } else {
            return redirect('/casetas_route')->with(['failed' => 'Failed Delete Data ']);
        }
    }

    public function updated(Request $req)
    {
        $id             = $req->input('id');
        $datas          = models::find($id);
        $category_cars = $_POST['category_cars'];
        $costo_casetas = $_POST['costo_casetas'];
        $images        = $_POST['images_file'];
        $files = [];


        for ($i = 0; $i < count($images); $i++) {
            $files[]['img'] = $images[$i];
        }


        // if ($req->file('images')) {
        //     foreach ($req->file('images') as $key => $file) {
        //         $file_name = time() . rand(1, 99) . '.' . $file->extension();
        //         $file->move(public_path('admin/img/casetas'), $file_name);
        //         $files[]['img'] = $file_name;
        //     }
        // }



        $cars_categ = array();
        DB::beginTransaction();
        try {
            $datas->caseta_name    = $req->input('caseta_name');

            for ($i = 0; $i < count($category_cars); $i++) {

                if (!empty($_FILES['images']['tmp_name'][$i])) {
                    $tmpFilePath = $_FILES['images']['tmp_name'][$i];
                    $filenames =   $_FILES['images']['name'];
                    $extension = pathinfo($filenames[$i], PATHINFO_EXTENSION);
                    $names = time() . '.' . $extension;
                    $files[]['img'] =  $names;
                    $newFilePath = "./public/admin/img/casetas/" .  $names;
                    if (move_uploaded_file($tmpFilePath,  $newFilePath)) {
                        $dt = array(
                            'casetas_id'    => $id,
                            'cars_category' => $category_cars[$i],
                            'costo_casetas' => $costo_casetas[$i],
                            'images'        => $files[$i]['img'],
                            'created_at'    => date('Y-m-d H:i:s'),
                            'created_by'    => Session('idUser'),
                        );
                    }
                } else {
                    $files[]['img'] =  "";
                    $dt = array(
                        'casetas_id'    => $id,
                        'cars_category' => $category_cars[$i],
                        'costo_casetas' => $costo_casetas[$i],
                        'images'        => $files[$i]['img'],
                        'created_at'    => date('Y-m-d H:i:s'),
                        'created_by'    => Session('idUser'),
                    );
                }

                $cars_categ[] = $dt;
            }

            DB::delete("DELETE FROM casetas_category_cars where casetas_id ='$id' ");
            DB::table('casetas_category_cars')->insert($cars_categ);
            $datas->save();
            DB::commit();
            return redirect('/casetas_route')->with(['success' => 'Success Update Data']);
        } catch (\Exception $e) {
            DB::rollback();
            dd($e);
            // return back()->with(['failed' => 'Failed Update Status Data ']);
        }
    }

    public function deleteAll(Request $req)
    {
        $delete = models::deleteAll($req);
        if ($delete) {
            return redirect('/casetas_route')->with(['success' => 'Success Delete Data']);
        } else {
            return redirect('/casetas_route')->with(['failed' => 'Failed Delete Data ']);
        }
    }
}
