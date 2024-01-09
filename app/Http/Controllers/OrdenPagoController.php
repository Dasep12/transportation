<?php

namespace App\Http\Controllers;

use App\Mail\OrdenMail;
use App\Models\ConceptoModel;
use App\Models\CosModel;
use App\Models\OrdendePagoModel as models;
use App\Models\EmpresasModel;
use App\Models\PrevedorModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Barryvdh\DomPDF\Facade\Pdf as pdfs;
use Illuminate\Support\Facades\Mail;

class OrdenPagoController extends Controller
{

    public function index(): View
    {


        $data = [
            'data' => EmpresasModel::where('company', 1)->orderBy('created', 'DESC')->get()
        ];
        return view('admin/ordenpago/listmaster', $data);
    }

    public function formAdd(): View
    {
        $data = [
            'prevedor'  => PrevedorModel::where('company', 0)->get(),
            'empressa'  => EmpresasModel::where('company', 1)->get(),
            'solicitante'  => DB::select("SELECT * FROM users"),
            'pormadepago'  => DB::select("SELECT * FROM payment_types WHERE active = 1 "),
            'paymentconcept' => ConceptoModel::all(),
            'cost'          => CosModel::orderBy('created_at', 'DESC')->get()

        ];
        return view('admin/ordenpago/form_add', $data);
    }

    public function formedited(Request $req): View
    {
        $id = $req->input('id');
        $data = [
            'data'           => models::find($id),
            'prevedor'       => PrevedorModel::where('company', 0)->get(),
            'empressa'       => EmpresasModel::where('company', 1)->get(),
            'solicitante'    => DB::select("SELECT * FROM users"),
            'pormadepago'    => DB::select("SELECT * FROM payment_types WHERE active = 1 "),
            'paymentconcept' => ConceptoModel::all(),
            'details'        => DB::select("SELECT * FROM payment_order_product WHERE order_id ='$id' "),
            'cost'           => CosModel::orderBy('created_at', 'DESC')->get()
        ];
        return view('admin/ordenpago/form_edit', $data);
    }

    public function formView(Request $req): View
    {
        $id = $req->input('id');
        $SQL = "SELECT po.id as ids , cm.name as company , sp.name  as suppliers , concat(us.first_name ,' ' , us.last_name) as aplicant  , po.approved ,
        po.terms  ,  po.`date` as dates , pc.concept , pt.description as statues  , po.total 
        from payment_order po
        left join supplier sp on sp.id  = po.supplier_id 
        left join supplier cm on cm.id  = po.company_id 
        left join users us on us.id = po.applicant_id 
        left join payment_concept pc on pc.id  = po.concept_id 
        left join payment_types pt on pt.id  = po.type_id WHERE  po.id = '$id' ";
        $data = [
            'data'      => DB::select($SQL),
            'details'       => DB::select("SELECT * FROM payment_order_product WHERE order_id ='$id' "),

        ];
        return view('admin/ordenpago/form_view', $data);
    }

    public function addedd(Request $req): RedirectResponse
    {
        $save = models::saveData($req);
        if ($save) {
            return redirect('/ordendepago')->with(['success' => 'Success Add Data']);
        } else {
            return redirect('/ordendepago/form_add')->with(['failed' => 'Failed Add Data ']);
        }
    }

    public function delete(Request $req)
    {
        $delete = models::deleteData($req);
        if ($delete) {
            return redirect('/ordendepago')->with(['success' => 'Success Delete Data']);
        } else {
            return redirect('/ordendepago')->with(['failed' => 'Failed Delete Data ']);
        }
    }

    public function updated(Request $req)
    {
        $id             = $req->input('id');
        $datas = models::find($id);

        DB::beginTransaction();
        try {
            $datas->supplier_id       = $req->input('supplier_id');
            $datas->company_id        = $req->input('company_id');
            $datas->applicant_id        = $req->input('applicant_id');
            $datas->concept_id        = $req->input('concept_id');
            $datas->type_id        = $req->input('type_id');
            $datas->date        = $req->input('date');
            $datas->terms        = $req->input('terms');
            $datas->cost_id        = $req->input('cost_id');
            $datas->updated_at  = date('Y-m-d H:i:s');


            $detailTrans = [];
            $totals = 0;
            foreach ($req->input('count') as $key => $val) {
                $detailTrans[] = array(
                    'description'   => $req->description[$key],
                    'quantity'      => $req->count[$key],
                    'unit_price'    => $req->price_u[$key],
                    'order_id'      => $id,
                    'total'         => $req->count[$key] * $req->price_u[$key]
                );
                $totals += $req->count[$key] * $req->price_u[$key];
            }
            $datas->total = $totals;

            $datas->save();
            DB::delete("DELETE FROM payment_order_product where order_id ='$id'");
            DB::table('payment_order_product')->insert($detailTrans);
            DB::commit();
            return redirect('/ordendepago')->with(['success' => 'Success Update Data']);
        } catch (\Exception $e) {
            DB::rollback();
            // dd($e);
            return back()->with(['failed' => 'Failed Update Status Data ']);
        }
    }

    public function deleteAll(Request $req)
    {
        $delete = models::deleteAll($req);
        if ($delete) {
            return redirect('/ordendepago')->with(['success' => 'Success Delete Data']);
        } else {
            return redirect('/ordendepago')->with(['failed' => 'Failed Delete Data ']);
        }
    }

    public static function getOrden(Request $req)
    {
        $SQL = "SELECT po.id as ids , cm.name as company , sp.name  as suppliers , concat(us.first_name ,' ' , us.last_name) as aplicant  , po.approved ,
        po.terms  ,  po.`date` as dates , pc.concept , pt.description as statues  , po.total 
        from payment_order po
        left join supplier sp on sp.id  = po.supplier_id 
        left join supplier cm on cm.id  = po.company_id 
        left join users us on us.id = po.applicant_id 
        left join payment_concept pc on pc.id  = po.concept_id 
        left join payment_types pt on pt.id  = po.type_id WHERE !isnull(po.id )  ";

        $company = $req->company;
        $supplier = $req->supplier;
        $aplicant = $req->aplicant;
        $concept = $req->concept;

        if ($company) {
            $SQL .= "AND cm.name like '%$company%'";
        }

        if ($supplier) {
            $SQL .= "AND sp.name like '%$supplier%'";
        }

        if ($aplicant) {
            $SQL .= "AND us.first_name like '%$aplicant%'";
        }

        if ($concept) {
            $SQL .= "AND pc.concept like '%$concept%'";
        }
        $SQL .= "ORDER BY po.created_at DESC";
        $queries = DB::select($SQL);
        $res = array();
        foreach ($queries as $d) {

            $res[] = array(
                'id'                => $d->ids,
                'company'           => ucwords(strtolower($d->company)),
                'supplier'          => ucwords(strtolower($d->suppliers)),
                'concept'           => ucwords(strtolower($d->concept)),
                'terms'             => ucwords(strtolower($d->terms)),
                'aplicant'          => ucwords(strtolower($d->aplicant)),
                'folio'             => date('Ymd', strtotime($d->dates)) . '-' . $d->ids,
                'dates'             => $d->dates,
                'status'            => $d->approved,
                'total'             => number_format((float)$d->total, 2),
            );
        }
        return response()->json($res);
    }

    public static function pdfReport(Request $req)
    {
        $id = $req->input('id');
        $SQL = "SELECT po.id as ids , cm.name as company , sp.name  as suppliers , concat(us.first_name ,' ' , us.last_name) as aplicant  , po.approved , sp.id as idprevedor ,
        po.terms  ,  po.`date` as dates , pc.concept , pt.description as statues  , po.total ,
        sp.bank_data  
        from payment_order po
        left join supplier sp on sp.id  = po.supplier_id 
        left join supplier cm on cm.id  = po.company_id 
        left join users us on us.id = po.applicant_id 
        left join payment_concept pc on pc.id  = po.concept_id 
        left join payment_types pt on pt.id  = po.type_id WHERE !isnull(po.id ) AND po.id = $id ";
        $data = DB::select($SQL);
        $filename = 'OrdenDePago' . $data[0]->ids . '.pdf';
        $data = [
            'data'          => $data,
            'details'       => DB::select("SELECT * FROM payment_order_product WHERE order_id ='$id' "),
            'title' => $filename,
            'email'  => "",
        ];

        $pdf = pdfs::loadView('admin/ordenpago/reportpdf', $data)->setPaper('a4', 'portrait');
        return $pdf->stream($filename, array('attachment' => true));
    }


    public function formApprove(Request $req): View
    {
        $id = $req->input('id');
        $SQL = "SELECT po.id as ids , cm.name as company , sp.name  as suppliers , concat(us.first_name ,' ' , us.last_name) as aplicant  , po.approved ,
        po.terms  ,  po.`date` as dates , pc.concept , pt.description as statues  , po.total 
        from payment_order po
        left join supplier sp on sp.id  = po.supplier_id 
        left join supplier cm on cm.id  = po.company_id 
        left join users us on us.id = po.applicant_id 
        left join payment_concept pc on pc.id  = po.concept_id 
        left join payment_types pt on pt.id  = po.type_id WHERE  po.id = '$id' ";
        $data = [
            'data'      => DB::select($SQL),
            'details'       => DB::select("SELECT * FROM payment_order_product WHERE order_id ='$id' "),

        ];
        return view('admin/ordenpago/form_approve', $data);
    }

    public function updateStatus(Request $req)
    {
        $id             = $req->input('id');
        $datas = models::find($id);

        DB::beginTransaction();
        try {
            $datas->approved          = $req->input('approve');
            $datas->date_approved     = date('Y-m-d H:i:s');
            $datas->approved_id       = Session('idUser');
            $datas->save();
            DB::commit();
            return redirect('/ordendepago')->with(['success' => 'Success Update Data']);
        } catch (\Exception $e) {
            DB::rollback();
            // dd($e);
            return back()->with(['failed' => 'Failed Update Status Data ']);
        }
    }

    public static function getReceive()
    {
        $SQL = "SELECT content as receive from tbl_settings WHERE kode_content='EM-01' ";
        $data = DB::select($SQL);
        return $data[0]->receive;
    }


    public function resendMail(Request $req)
    {
        $lastId = $req->input('id');
        try {
            $SQL = "SELECT po.id as ids , cm.name as company , sp.name  as suppliers , concat(us.first_name ,' ' , us.last_name) as aplicant  , po.approved , sp.id as idprevedor ,
                po.terms  ,  po.`date` as dates , pc.concept , pt.description as statues  , po.total ,
                sp.bank_data  
                from payment_order po
                left join supplier sp on sp.id  = po.supplier_id 
                left join supplier cm on cm.id  = po.company_id 
                left join users us on us.id = po.applicant_id 
                left join payment_concept pc on pc.id  = po.concept_id 
                left join payment_types pt on pt.id  = po.type_id WHERE po.id = '$lastId'  ";
            $datasMail = DB::select($SQL);
            $mailData = [
                'data'          => $datasMail,
                'details'       => DB::select("SELECT * FROM payment_order_product WHERE order_id ='$lastId' "),
                'ids'           =>  $datasMail[0]->ids,
                'subject'       => 'Fwd: Solicitud de aprobación para la orden de compra # ' . $datasMail[0]->ids . '| Mundochiapas.com - Mundochiapas.com',
                'title'         => '',
            ];
            self::sendMail(self::getReceive(), $mailData);
            return redirect('/ordendepago')->with(['success' => 'Success Send Data']);
        } catch (\Exception $e) {
            // dd($e);
            return back()->with(['failed' => 'Failed Send  Data ']);
        }
    }


    public static function sendMail($to, $mailData)
    {
        Mail::to($to)
            ->send(new OrdenMail($mailData));
    }
}
