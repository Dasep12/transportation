<?php

namespace App\Http\Controllers;

use App\Helpers\AuthHelper;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\DriversModel as models;
use App\Models\EmpresasModel;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;

class ReportesController extends Controller
{

    public function index(): View
    {
        $data = [
            'empresas'      => EmpresasModel::where('company', 1)->orderBy('created', 'DESC')->get(),
        ];
        return view('admin/reportes/index', $data);
    }

    public function ordenempressaAll(Request $req)
    {
        $date1 = $req->date_first;
        $date2 = $req->date_end;
        $company = $req->company;

        $query = "SELECT s.name  , sum(X.total) as total
        from payment_order po   
        left join (
          select pop.order_id  , pop.total  from payment_order_product pop  
        ) X on X.order_id  = po.id 
        inner join supplier s on s.id  =  po.company_id 
        WHERE po.date between '$date1' AND '$date2' ";

        if ($company) {
            $query .= ' AND po.company_id=' . $company;
        }

        $query .= ' group by s.id order by X.total desc';

        $datas = DB::select($query);
        return response()->json($datas);
    }


    public function ordenPrevedoraAll(Request $req)
    {
        $date1 = $req->date_first;
        $date2 = $req->date_end;
        $company = $req->company;

        $query = "SELECT s.name  , sum(X.total) as total
        from payment_order po   
        left join (
          select pop.order_id  , pop.total  from payment_order_product pop  
        ) X on X.order_id  = po.id 
        inner join supplier s on s.id  =  po.supplier_id 
        WHERE po.date between '$date1' AND '$date2' ";

        if ($company) {
            $query .= ' AND po.company_id=' . $company;
        }

        $query .= ' group by s.id order by X.total desc';

        $datas = DB::select($query);
        return response()->json($datas);
    }

    public function ordenConceptoaAll(Request $req)
    {
        $date1 = $req->date_first;
        $date2 = $req->date_end;
        $company = $req->company;

        $query = "SELECT pc.concept as name  , sum(X.total) as totals
        from payment_order po   
        left join (
          select pop.order_id  , pop.total  from payment_order_product pop  
        ) X on X.order_id  = po.id 
        inner join payment_concept pc on pc.id  =  po.concept_id  
        WHERE po.date between '$date1' AND '$date2' ";

        if ($company) {
            $query .= ' AND po.company_id=' . $company;
        }

        $query .= ' group by pc.id order by X.total desc';

        $datas = DB::select($query);
        return response()->json($datas);
    }

    public function ordenSolicitanteaAll(Request $req)
    {
        $date1 = $req->date_first;
        $date2 = $req->date_end;
        $company = $req->company;

        $query = "SELECT concat(us.first_name,' ' , us.last_name) as name  , sum(X.total) as totals
        from payment_order po   
        left join (
          select pop.order_id  , pop.total  from payment_order_product pop  
        ) X on X.order_id  = po.id 
        inner join users us on us.id  = po.applicant_id   
        WHERE po.date between '$date1' AND '$date2' ";

        if ($company) {
            $query .= ' AND po.company_id=' . $company;
        }

        $query .= ' group by us.id order by X.total desc';

        $datas = DB::select($query);
        return response()->json($datas);
    }
}
