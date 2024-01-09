<?php

namespace App\Http\Controllers;

use App\Models\PrevedorModel as models;
use App\Models\RoutesTravelModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\RedirectResponse;

class PrevedorController extends Controller
{

    public function index(): View
    {
        $data = [
            'data' => models::where('company', 0)->orderBy('created', 'DESC')->get()
        ];
        return view('admin/prevedor/listmaster', $data);
    }

    public function formAdd(): View
    {

        return view('admin/prevedor/form_add');
    }

    public function formedited(Request $req): View
    {
        $id = $req->input('id');
        $data = [
            'data'      => models::find($id),
        ];
        return view('admin/prevedor/form_edit', $data);
    }

    public function addedd(Request $req): RedirectResponse
    {
        $save = models::saveData($req);
        if ($save) {
            return redirect('/prevedor')->with(['success' => 'Success Add Data']);
        } else {
            return redirect('/prevedor/form_add')->with(['failed' => 'Failed Add Data ']);
        }
    }

    public function delete(Request $req)
    {
        $delete = models::deleteData($req);
        if ($delete) {
            return redirect('/prevedor')->with(['success' => 'Success Delete Data']);
        } else {
            return redirect('/prevedor')->with(['failed' => 'Failed Delete Data ']);
        }
    }

    public function updated(Request $req)
    {
        $id             = $req->input('id');
        $datas = models::find($id);

        DB::beginTransaction();
        try {
            $datas->name       = $req->input('name');
            $datas->rfc        = $req->input('rfc');
            $datas->address    = $req->input('address');
            $datas->colony     = $req->input('colony');
            $datas->city       = $req->input('city');
            $datas->municipality = $req->input('municipality');
            $datas->state       = $req->input('state');
            $datas->num_ext     = $req->input('num_ext');
            $datas->num_int     = $req->input('num_int');
            $datas->active      = $req->input('active');
            $datas->bank_data   = $req->input('bank_data');
            $datas->telephone   = $req->input('telephone');
            $datas->code_postal = $req->input('code_postal');
            $datas->updated_at  = date('Y-m-d H:i:s');
            $datas->save();
            DB::commit();
            return redirect('/prevedor')->with(['success' => 'Success Update Data']);
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
            return redirect('/prevedor')->with(['success' => 'Success Delete Data']);
        } else {
            return redirect('/prevedor')->with(['failed' => 'Failed Delete Data ']);
        }
    }
}
