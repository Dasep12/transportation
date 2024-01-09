<?php

namespace App\Http\Controllers;

use App\Models\CarsModel;
use App\Models\SalesReportModel as models;
use DateTime;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;

class SalesReportController extends Controller
{

    public function index(): View
    {
        return view('admin/salesreport/index');
    }

    function rangeMonths($thna, $thnb)
    {
        $months = [];
        $tgla = $thna .  '-01';
        $dtglb = new DateTime($thnb . '-01');
        $tglb = $dtglb->format('Y-m-t');
        $start = $month = strtotime($tgla);
        $end = strtotime($tglb);
        while ($month < $end) {
            $months[] = date('Y-m', $month);
            $month = strtotime("+1 month", $month);
        }
        return $months;
    }

    public function report(Request $req)
    {
        $dates  = $req->input('tanggal');
        $bulan  =   date('m', strtotime($dates));
        $bulan2  =   date('M', strtotime($dates));
        $tahun  =    date('Y', strtotime($dates));
        $days  = cal_days_in_month(CAL_GREGORIAN, $bulan, $tahun);
        $data = array();
        for ($i = 1; $i <= $days; $i++) {
            $l = $i <= 9 ? '0' . $i : $i;
            $dt = $tahun . '-' . $bulan . '-' . $l;
            $data[] = array('tanggal' => $dt, 'label' => $i . ' ' . $bulan2 . ' ' . $tahun, 'value' => models::getReport($dt));
        }
        return response()->json($data);
    }


    public function reportSales(Request $req)
    {
        $date1  = $req->input('tanggal');
        $date2  = $req->input('tanggal2');

        $tgl1  = date('Y-m', strtotime($date1));
        $tgl2  = date('Y-m', strtotime($date2));


        $selisih = self::rangeMonths($tgl1, $tgl2);

        $data = [];
        for ($i = 0; $i < count($selisih); $i++) {
            $data[] = array(
                'value'  => models::getReportSales($selisih[$i]),
                'label'  => date('M Y', strtotime($selisih[$i]))
            );
        }
        return response()->json($data);
    }

    public function reportCar(Request $req)
    {
        // $dates  = $req->input('tanggal');
        // $bulan  =   date('m', strtotime($dates));
        // $tahun  =    date('Y', strtotime($dates));
        // $dt = $tahun . '-' . $bulan;
        $date1  = $req->input('tanggal');
        $date2  = $req->input('tanggal2');

        $tgl1  = date('Y-m', strtotime($date1));
        $tgl2  = date('Y-m', strtotime($date2));
        $data = models::getReportCar($tgl1, $tgl2);
        return response()->json($data);
    }

    public function reportPerson(Request $req)
    {
        // $dates  = $req->input('tanggal');
        // $bulan  =   date('m', strtotime($dates));
        // $tahun  =    date('Y', strtotime($dates));
        // $dt = $tahun . '-' . $bulan;
        $date1  = $req->input('tanggal');
        $date2  = $req->input('tanggal2');

        $tgl1  = date('Y-m', strtotime($date1));
        $tgl2  = date('Y-m', strtotime($date2));
        $data = models::getReportPerson($tgl1, $tgl2);
        return response()->json($data);
    }
}
