<?php

namespace App\Http\Controllers;

use App\Helpers\AuthHelper;
use App\Models\AdministratorsModel as models;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class AdministratorController extends Controller
{

    public function index(): View
    {
        $data = [
            'datas' => models::getData()
        ];
        return view('admin/administrator/listmaster', $data);
    }

    public function formAdd(): View
    {
        $data = [
            'type' => DB::select("SELECT * FROM user_types")
        ];
        return view('admin/administrator/form_add', $data);
    }

    public function addedd(Request $req): RedirectResponse
    {
        $save = models::saveData($req);
        if ($save) {
            return redirect('/adminuser')->with(['success' => 'Success Add Data']);
        } else {
            return redirect('/adminuser/form_add')->with(['failed' => 'Failed Add Data ']);
        }
    }


    public function formedited(Request $req): View
    {

        $data = [
            'data' => models::find($req->id),
            'type' => DB::select("SELECT * FROM user_types")
        ];
        return view('admin/administrator/form_edit', $data);
    }

    public function updated(Request $req)
    {
        $data = models::find($req->id);
        $data->first_name    = $req->input('first_name');
        $data->last_name     = $req->input('last_name');
        $data->email         = $req->input('email');
        $data->phone         = $req->input('phone');
        $data->address       = $req->input('address');
        $data->username      = $req->input('username');
        $data->user_type_id  = $req->input('user_type_id');

        try {

            if ($req->password) {
                $data->password      = AuthHelper::encrpyPassword($req->input('password'));
            }
            if ($req->file('photo')) {
                $file = $req->file('photo');
                $filename = 'admin' . rand(42, 25)  . $file->getClientOriginalName();
                $file->move(public_path('admin/img/driver'), $filename);
                $data->photo = $filename;
            }
            $data->save();

            DB::commit();
            return redirect('/adminuser')->with(['success' => 'Success Update Cars']);
        } catch (\Exception $e) {
            DB::rollback();
            // return $e;
            return back()->with(['failed' => 'Failed Update Status Data ']);
        }
    }

    public function delete(Request $req)
    {
        $delete = models::deleteData($req);
        if ($delete) {
            return redirect('/adminuser')->with(['success' => 'Success Delete Data']);
        } else {
            return redirect('/adminuser')->with(['failed' => 'Failed Delete Data ']);
        }
    }

    public function deleteAll(Request $req)
    {
        $delete = models::deleteAll($req);
        if ($delete) {
            return redirect('/adminuser')->with(['success' => 'Success Delete Data']);
        } else {
            return redirect('/adminuser')->with(['failed' => 'Failed Delete Data ']);
        }
    }
}
