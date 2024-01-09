<?php

namespace App\Http\Controllers;

use App\Helpers\AuthHelper;
use App\Models\DashboardModel;
use App\Models\Drivers\ServiceModels;
use App\Models\OrdendePagoModel;
use App\Models\QuotesModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use League\CommonMark\Extension\SmartPunct\Quote;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;
use Svg\Tag\Rect;

class DashboardController extends Controller
{


    public function index()
    {
        $data = [
            'driver'        => DashboardModel::countUsers('Drivers'),
            'cust'          => DashboardModel::countUsers('Customers'),
        ];
        return view('admin/dashboard/dashboard', $data);
    }

    public function earningsQuotesMonths(Request $req)
    {
        $datas  = DashboardModel::monthlyQuotes($req);
        return response()->json($datas);
    }

    public function graphicQuotes(Request $req)
    {
        $datas  = DashboardModel::yearlyQuotes($req);
        return response()->json($datas);
    }

    public function quotesServiceInfo(Request $req)
    {
        $revenue        = DashboardModel::revenueServiceio($req);
        $average        = DashboardModel::AveragerevenueServiceio($req);
        $orderService   = DashboardModel::OrderServicio($req);
        $quotesPayment  = QuotesModel::where([
            [DB::raw("(YEAR(created_at))"), '=', $req->year],
            [DB::raw("(MONTH(created_at))"), '=', $req->month],
            ['payment_status', '=', 'Paid'],
        ])->count();
        $data = array(
            'revenue'   => $revenue,
            // 'average'   => $revenue / $quotesPayment,
            'average'   => $average,
            'quotesAll' => $orderService
        );
        return response()->json($data);
    }

    public function cotizaciones(Request $req)
    {

        $year = $req->input('year');
        $months = $req->input("month");
        $sent =  QuotesModel::where([
            [DB::raw("(YEAR(created_at))"), '=', $year],
            [DB::raw("(MONTH(created_at))"), '=', $months],
        ])->count();

        $approve  = DashboardModel::cotizaciones($req, "Approved");

        $datas = [
            'sent'       => $sent,
            'approve'    => $approve,
            'persentase' => $sent > 0 ? number_format(((int) $approve /  $sent) * 100, 2)  : 0
        ];
        return response()->json($datas);
    }

    public function car_utility(Request $req)
    {
        $datas  = DashboardModel::car($req);
        return response()->json($datas);
    }


    public function serviceList(Request $req)
    {
        $datas  = DashboardModel::listService($req);
        return response()->json($datas);
    }

    public function solicitud(Request $req)
    {
        $data = [
            'receive'  => DashboardModel::solicitudReceived($req, ""),
            'respond'  => DashboardModel::solicitudReceived($req, 1),
            'conversion'  => DashboardModel::solicitudReceived($req, 2),
            'persentase'  => number_format((DashboardModel::solicitudReceived($req, 2) /  DashboardModel::solicitudReceived($req, "")) * 100, 1)
        ];
        return response()->json($data);
    }



    public function test(Request $req)
    {
        $year = 2023;
        $months = 12;

        // $year = $req->input('year');
        // $months = $req->input("month");

        $currMonth  = $year . '-' . $months;
        $prevMonth  = date('Y-m', strtotime("-1 month", strtotime($currMonth)));

        $currQuotes = DB::select("SELECT IFNULL(SUM(X.amount),0)as total  from quotes q 
        left join (
         select qi.amount , qi.quotes_id  from quotes_items qi 
        )X on X.quotes_id = q.id 
        where q.payment_status = 'Paid' and date_format(q.created_at,'%Y-%m') = '" . $currMonth . "' ");

        $prevQuotes = DB::select("SELECT IFNULL(SUM(X.amount),0)as total  from quotes q 
        left join (
         select qi.amount , qi.quotes_id  from quotes_items qi 
        )X on X.quotes_id = q.id 
        where q.payment_status = 'Paid' and date_format(q.created_at,'%Y-%m') = '" . $prevMonth . "' ");


        // dd($currQuotes);

        // $prev    = 0;
        $prev    = $prevQuotes[0]->total;
        $curr    = $currQuotes[0]->total;
        $selisih = (float) number_format($curr - $prev, 2);



        if ($prev > 0) {
            $persentase = 0;
            if ($selisih > 0) {
                if ($prev == 0) {
                    $persentase = ($selisih / 1) * 0;
                } else {
                    $persentase = ($selisih / $prev) * 100;
                }
            } else if ($selisih == 0) {
                $persentase = ($selisih / $prev) * 100;
            } else if ($selisih < 0) {
                if ($prev == 0) {
                    $persentase = ($selisih / $selisih) * 100;
                } else {
                    $persentase = ($selisih / $prev) * 100;
                }
            }
        } else {
            $curr =  $curr;
            $prev = 0;
            $selisih = 0;
            $persentase = 0;
        }

        $data = array(
            'stat'       => $curr > $prev ? 'up' : 'down',
            'nilai'      => $curr,
            'prev'       => $prev,
            'selisih'    => $selisih,
            'persentase' => number_format($persentase, 2)
        );
        return $data;
    }
}
