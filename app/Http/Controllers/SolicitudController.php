<?php

namespace App\Http\Controllers;

use App\Models\QuotesModel;
use App\Models\SolicitudModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Spatie\Ignition\Contracts\Solution;

class SolicitudController extends Controller
{

    public function index(): View
    {
        $data = [
            'data' => ''
        ];
        return view('admin/solicitud/listmaster', $data);
    }

    public static function getSolicitud(Request $req)
    {
        $queries = SolicitudModel::getData();
        $res = array();
        foreach ($queries as $d) {
            $res[] = array(
                'id'                   => $d->id,
                'nombre'               => ucwords(strtolower($d->nombre)),
                'telefono'             => $d->telefono,
                'correo'               => $d->correo,
                'ruta'                 => ucwords(strtolower($d->ruta)),
                'fecha_inicio'         => $d->fecha_inicio,
                'fecha_final'          => $d->fecha_final,
                'estado'               => $d->estado,
                'estado_correo'        => $d->estado_correo,
                'nombre_usuario'       => $d->nombre_usuario,
                'fecha_registro'       => $d->fecha_registro,
                'fecha_atencion'       => $d->fecha_atencion,

            );
        }
        return response()->json($res);
    }


    public function details(Request $req): View
    {
        $data = [
            'data' => SolicitudModel::getDetails($req->id)
        ];
        return view('admin/solicitud/details', $data);
    }


    public function updateCancelar(Request $req)
    {

        try {
            $id = $req->idx;
            $data = SolicitudModel::find($id);
            $data->comment_cancel = $req->comment;
            $data->status = 0;
            $data->date_status = date('Y-m-d H:i:s');
            $data->updated_at = date('Y-m-d H:i:s');
            $data->save();
            DB::beginTransaction();
            return redirect('/solicitud')->with(['success' => 'Success Update Nota']);
        } catch (\Exception $e) {
            DB::rollback();
            dd($e);
            return back()->with(['failed' => 'Failed Update Status Data ']);
        }
    }
}
