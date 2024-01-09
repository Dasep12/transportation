<?php

namespace App\Http\Controllers;

use App\Models\ConceptoModel as models;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\RedirectResponse;

class ConceptoController extends Controller
{

    public function index(): View
    {
        $data = [
            'data' => models::orderBy('created_at', 'DESC')->get()
        ];
        return view('admin/concepto/listmaster', $data);
    }

    public function formAdd(): View
    {

        return view('admin/concepto/form_add');
    }

    public function formedited(Request $req): View
    {
        $id = $req->input('id');
        $data = [
            'data'      => models::find($id),
        ];
        return view('admin/concepto/form_edit', $data);
    }

    public function addedd(Request $req): RedirectResponse
    {
        $save = models::saveData($req);
        if ($save) {
            return redirect('/concepto')->with(['success' => 'Success Add Data']);
        } else {
            return redirect('/concepto/form_add')->with(['failed' => 'Failed Add Data ']);
        }
    }

    public function delete(Request $req)
    {
        $delete = models::deleteData($req);
        if ($delete) {
            return redirect('/concepto')->with(['success' => 'Success Delete Data']);
        } else {
            return redirect('/concepto')->with(['failed' => 'Failed Delete Data ']);
        }
    }

    public function updated(Request $req)
    {
        $id             = $req->input('id');
        $datas         = models::find($id);

        DB::beginTransaction();
        try {
            $datas->concept       = $req->input('concept');
            $datas->updated_at  = date('Y-m-d H:i:s');
            $datas->save();
            DB::commit();
            return redirect('/concepto')->with(['success' => 'Success Update Data']);
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
            return redirect('/concepto')->with(['success' => 'Success Delete Data']);
        } else {
            return redirect('/concepto')->with(['failed' => 'Failed Delete Data ']);
        }
    }
}
