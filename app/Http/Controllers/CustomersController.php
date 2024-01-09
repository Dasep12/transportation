<?php

namespace App\Http\Controllers;

use App\Helpers\AuthHelper;
use App\Models\CustomersModel as models;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class CustomersController extends Controller
{

    public function index(): View
    {
        $data = [
            'data'  => models::getData(),
			 'customers'     => models::getCustomers()
        ];
        return view('admin/costumers/listmaster', $data);
    }

    public function formAdd(): View
    {
        return view('admin/costumers/form_add');
    }

    public function added(Request $req): RedirectResponse
    {

        $req->validate([
            'first_name'    => 'required',
            'last_name'     => 'required',
            'photo'         => 'required',
            'photo.*'       => 'mimes:jpg,jpeg,png|max:3000',
            'email'         => 'required|unique:users',
            'phone'         => 'required',
        ]);


        $save = models::saveData($req);
        if ($save) {
            return redirect('/costumers')->with(['success' => 'Success Add Customers']);
        } else {
            return redirect('/form_add')->with(['failed' => 'Failed Add Data ']);
        }
    }

    public function delete(Request $req)
    {
        $delete = models::deleteData($req);
        if ($delete) {
            return redirect('/costumers')->with(['success' => 'Success Delete Costumers']);
        } else {
            return redirect('/form_add')->with(['failed' => 'Failed Delete Data ']);
        }
    }

    public function changeStatus(Request $req)
    {
        $update = models::updateStatus($req);
        if ($update) {
            return redirect('/costumers')->with(['success' => 'Success Update Status Costumers']);
        } else {
            return redirect('/form_add')->with(['failed' => 'Failed Update Status Data ']);
        }
    }


    public function formedited(Request $req): View
    {
        $id = $req->input('id');
        $data = [
            'data' => models::find($id)
        ];
        return view('admin/costumers/form_edit', $data);
    }

    public function updated(Request $req)
    {
        $id  = $req->input('id');
        $first_name = $req->input('first_name');
        $last_name = $req->input('last_name');
        $email = $req->input('email');
        $phone = $req->input('phone');
        $password = AuthHelper::encrpyPassword($req->input('password'));
        $company       = $req->input('company');
        $rfc       = $req->input('rfc');
        $users = models::find($id);

        DB::beginTransaction();
        try {

            $users->first_name  =  $first_name;
            $users->last_name   =  $last_name;
            $users->email       =  $email;
            $users->phone       =  $phone;
            $users->company     =  $company;
            $users->rfc         =  $rfc;
            $users->modified    = date('Y-m-d H:i:s');


            if ($req->input('password') != null || $req->input('password') != "") {
                $users->password =  $password;
            }


            if ($req->file('photo')) {
                $file = $req->file('photo');
                $filename = 'driver' . rand(42, 25)  . $file->getClientOriginalName();
                $file->move(public_path('admin/img/customers'), $filename);

                $users->photo =  $filename;
            }

            $users->save();
            DB::commit();
            return redirect('/costumers')->with(['success' => 'Success Update Costumers']);
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
            return redirect('/costumers')->with(['success' => 'Success Delete Costumers']);
        } else {
            return redirect('/form_add')->with(['failed' => 'Failed Delete Data ']);
        }
    }
}
