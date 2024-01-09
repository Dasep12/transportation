<?php

namespace App\Http\Controllers;

use App\Models\CarsCategoryModel as models;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\RedirectResponse;

class CarsCategoryController extends Controller
{

    public function index(): View
    {
        $data = [
            'data' => models::orderBy("created_at", 'DESC')->get()
        ];
        return view('admin/cars_category/listmaster', $data);
    }

    public function formAdd(): View
    {
        return view('admin/cars_category/form_add');
    }

    public function formedited(Request $req): View
    {
        $id = $req->input('id');
        $data = [
            'data' => models::find($id)
        ];
        return view('admin/cars_category/form_edit', $data);
    }

    public function added(Request $req): RedirectResponse
    {

        $req->validate([
            'name' => 'required',
        ]);


        $save = models::saveData($req);
        if ($save) {
            return redirect('/cars_category')->with(['success' => 'Success Add Category Cars']);
        } else {
            return redirect('/cars_category/form_add')->with(['failed' => 'Failed Add Data ']);
        }
    }

    public function delete(Request $req)
    {
        $delete = models::deleteData($req);
        if ($delete) {
            return redirect('/cars_category')->with(['success' => 'Success Delete Category Cars']);
        } else {
            return redirect('/cars_category')->with(['failed' => 'Failed Delete Data ']);
        }
    }



    public function updated(Request $req)
    {
        $id  = $req->input('id');
        $name = $req->input('name');

        $datas = models::find($id);

        DB::beginTransaction();
        try {

            $datas->name =  $name;
            $datas->updated_at = date('Y-m-d H:i:s');

            $datas->save();
            DB::commit();
            return redirect('/cars_category')->with(['success' => 'Success Update Cars']);
        } catch (\Exception $e) {
            DB::rollback();
            // return $e;
            return back()->with(['failed' => 'Failed Update Status Data ']);
        }
    }

    public function deleteAll(Request $req)
    {
        $delete = models::deleteAll($req);
        if ($delete) {
            return redirect('/cars_category')->with(['success' => 'Success Delete Cars']);
        } else {
            return redirect('/cars_category')->with(['failed' => 'Failed Delete Data ']);
        }
    }
}
