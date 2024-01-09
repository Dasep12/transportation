<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class SettingsController extends Controller
{

    public function index(): View
    {
        $data = [
            'data' => DB::select("SELECT * FROM tbl_settings")
        ];
        return view('admin/settings/listmaster', $data);
    }

    public function formedit(Request $req): View
    {
        $data = [
            'data'  => DB::select("SELECT * FROM tbl_settings WHERE id = '$req->id' ")
        ];
        return view('admin/settings/form_edit', $data);
    }

    public function update(Request $req)
    {

        DB::beginTransaction();
        try {
            DB::table('tbl_settings')
                ->where('id', $req->id)
                ->update(['title' => $req->title, 'content' => $req->content]);
            DB::commit();
            return redirect('/settings')->with(['success' => 'Success Update Nota']);
        } catch (\Exception $e) {
            DB::rollback();
            return back()->with(['failed' => 'Failed Update Status Data ']);
        }
    }
}
