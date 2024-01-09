<?php

namespace App\Http\Controllers;

use App\Helpers\AuthHelper;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\DriversModel as models;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;

class DriversController extends Controller
{

    public function index(): View
    {
        $data = [
            'data' => models::getData()
        ];
        return view('admin/drivers/listmaster', $data);
    }

    public function formAdd(): View
    {
        return view('admin/drivers/form_add');
    }

    public function formedited(Request $req): View
    {
        $id = $req->input('id');
        $data = [
            'data' => models::getData($id)
        ];
        return view('admin/drivers/form_edit', $data);
    }


    public function added(Request $req): RedirectResponse
    {

        $req->validate([
            'first_name' => 'required',
            'driver_skills' => 'required',
            'last_name' => 'required',
            'photo' => 'required',
            'photo.*' => 'mimes:jpg,jpeg,png|max:3000',
            'email' => 'required|unique:users',
            'phone' => 'required',
            'address' => 'required',
            'license' => 'required',
            'costo_por_dia' => 'required',
            'license_exp' => 'required',
            'photo_license' => 'required',
            'photo_license.*' => 'mimes:jpg,jpeg,png|max:3000',
            'photo_psicofisico' => 'required',
            'photo_psicofisico.*' => 'mimes:jpg,jpeg,png|max:3000',
            'username' => 'required|unique:users',
        ]);


        $save = models::saveData($req);
        if ($save) {
            return redirect('/drivers')->with(['success' => 'Success Add Drivers']);
        } else {
            return redirect('/form_add')->with(['failed' => 'Failed Add Data ']);
        }
    }

    public function delete(Request $req)
    {
        $delete = models::deleteData($req);
        if ($delete) {
            return redirect('/drivers')->with(['success' => 'Success Delete Drivers']);
        } else {
            return redirect('/form_add')->with(['failed' => 'Failed Delete Data ']);
        }
    }

    public function changeStatus(Request $req)
    {
        $update = models::updateStatus($req);
        if ($update) {
            return redirect('/drivers')->with(['success' => 'Success Update Status Drivers']);
        } else {
            return redirect('/form_add')->with(['failed' => 'Failed Update Status Data ']);
        }
    }


    public function updated(Request $req)
    {
        $id  = $req->input('id');
        $first_name = $req->input('first_name');
        $last_name = $req->input('last_name');
        $email = $req->input('email');
        $phone = $req->input('phone');
        $address = $req->input('address');
        $license = $req->input('license');
        $costo_por_dia = $req->input('costo_por_dia');
        $license_exp = $req->input('license_exp');
        $password = AuthHelper::encrpyPassword($req->input('password'));
        $username = $req->input('username');
        $driver_skills = $req->input('driver_skills');

        $users = models::find($id);

        DB::beginTransaction();
        try {

            $users->first_name =  $first_name;
            $users->last_name =  $last_name;
            $users->email =  $email;
            $users->phone =  $phone;
            $users->address =  $address;
            $users->license =  $license;
            $users->fee_per_day =  $costo_por_dia;
            $users->license_exp =  $license_exp;
            $users->username =  $username;
            $users->driver_skills =  $driver_skills;
            $users->modified = date('Y-m-d H:i:s');


            if ($req->input('password') != null || $req->input('password') != "") {
                $users->password =  $password;
            }

            if ($req->file('photo')) {
                $file = $req->file('photo');
                $filename = 'driver' . rand(42, 25)  . $file->getClientOriginalName();
                $file->move(public_path('admin/img/driver'), $filename);

                $users->photo =  $filename;
            }

            if ($req->file('photo_license')) {
                $file = $req->file('photo_license');
                $filename = 'license' . rand(33, 25)  . $file->getClientOriginalName();
                $file->move(public_path('admin/img/driver'), $filename);

                $users->photo_licence =   $filename;
            }

            if ($req->file('photo_psicofisico')) {
                $file = $req->file('photo_psicofisico');
                $filename = 'psicofisico' . rand(23, 25)  . $file->getClientOriginalName();
                $file->move(public_path('admin/img/driver'), $filename);

                $users->photo_psicofisico =  $filename;
            }

            $users->save();
            DB::commit();
            return redirect('/drivers')->with(['success' => 'Success Update Drivers']);
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
            return redirect('/drivers')->with(['success' => 'Success Delete Drivers']);
        } else {
            return redirect('/form_add')->with(['failed' => 'Failed Delete Data ']);
        }
    }
}
