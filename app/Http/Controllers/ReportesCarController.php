<?php

namespace App\Http\Controllers;

use App\Helpers\AuthHelper;
use App\Models\CarsModel;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\DriversModel as models;
use App\Models\EmpresasModel;
use App\Models\ReportesCarsModel;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;

define('FREE', 'free');
define('PARTIAL_CHECKOUT', 'unavailable');
define('PARTIAL_CHECKIN', 'unavailable');
define('FULL', 'unavailable');

class ReportesCarController extends Controller
{

    public function index(): View
    {
        $data = [
            'empresas'      => EmpresasModel::where('company', 1)->orderBy('created', 'DESC')->get(),
            'days'           => cal_days_in_month(CAL_GREGORIAN, date('m'), date('Y')),
            'cars'           => CarsModel::where('status', 'Active')->get()
        ];
        return view('admin/reportescar/index', $data);
    }

    public function usoenmes(Request $req)
    {

        $month = $req->month <= 9 ? '0' . $req->month : $req->month;
        $year = $req->year;
        $date1 = $year . '-' . $month;
        $date2 = date('Y-m', strtotime('+1 month', strtotime($date1 . '-01')));
        $query = CarsModel::where('status', 'Active')->get();

        $totaldaysrent = self::hitungCars(ReportesCarsModel::queryDateCars($date1, $date2, ""));

        $datas = array();
        foreach ($query as $tr) {
            $totalsCarsUtility = self::hitungCars(ReportesCarsModel::queryDateCars($date1, $date2, $tr->id));
            $datas[] = array(
                'car_name' => $tr->car_name,
                'percentage'    => $totalsCarsUtility != 0 ? (float)number_format(($totalsCarsUtility / $totaldaysrent) * 100, 2) : 0,
                'formula'    => $totalsCarsUtility . '/' . $totaldaysrent
            );
        }
        return response()->json($datas);
    }

    public function tester()
    {
        $month = 12;
        $year = 2023;
        // $month = $req->month;
        // $year = $req->year;
        $date1 = $year . '-' . $month;
        $date2 = date('Y-m', strtotime('+1 month', strtotime($date1 . '-01')));
        $query = CarsModel::where('status', 'Active')->get();

        $totaldaysrent = self::hitungCars(ReportesCarsModel::queryDateCars($date1, $date2, ""));

        $datas = array();
        foreach ($query as $tr) {
            $totalsCarsUtility = self::hitungCars(ReportesCarsModel::queryDateCars($date1, $date2, $tr->id));
            $datas[] = array(
                'car_name' => $tr->car_name,
                'percentage'    => $totalsCarsUtility != 0 ? number_format(($totalsCarsUtility / $totaldaysrent) * 100, 2) : 0,
                'formula'    => $totalsCarsUtility . '/' . $totaldaysrent
            );
        }
        return response()->json($datas);
    }

    public function presentase(Request $req)
    {
        // $month = $req->month;
        // $year = $req->year;
        // $date1 = $year . '-' . $month;
        // $days = cal_days_in_month(CAL_GREGORIAN, $month, $year);

        // $query = "SELECT c.car_name , ROUND(IFNULL((sum(X.no_of_days) / $days) * 100 ,0),2) as percentage from cars c
        // left join (
        //  select s.date as dates , cps.no_of_days , s.car_id    from services s 
        //   inner join cost_per_services cps on cps.id = s.costperservices_id 
        //   where s.payment_status = 'Paid'
        // ) X on X.car_id = c.id and date_format(X.dates,'%Y-%m')='$date1'
        // where c.status  ='Active' 
        // group by c.id order by sum(X.no_of_days) desc
        // ";

        // $datas = DB::select($query);
        // return response()->json($datas);

        $month = $req->month <= 9 ? '0' . $req->month : $req->month;
        $year = $req->year;
        $date1 = $year . '-' . $month;
        $date2 = date('Y-m', strtotime('+1 month', strtotime($date1 . '-01')));
        $query = CarsModel::where('status', 'Active');
        $totalCars = 0;
        $totaldaysrent = cal_days_in_month(CAL_GREGORIAN, $month, $year);
        $datas = array();
        foreach ($query->get() as $tr) {
            $totalsCarsUtility = self::hitungCars(ReportesCarsModel::queryDateCars($date1, $date2, $tr->id));
            $datas[] = array(
                'car_name' => $tr->car_name,
                'percentage'    => $totalsCarsUtility != 0 ? (float)number_format(($totalsCarsUtility /    $totaldaysrent) * 100, 2) : 0,
                'formula'    => $totalsCarsUtility . '/' .  $query->count()  . '/' . $totaldaysrent
            );
            $totalCars++;
        }
        return response()->json($datas);
    }


    public function hitungCars($query)
    {
        $values = array_count_values($query);
        $data = 0;
        foreach ($values as $key => $value) {
            if ($key == 'unavailable') {
                $data = $value;
            }
        }
        return $data;
    }

    public function showMonths(Request $req)
    {
        // $month = 12;
        // $year  = 2023;
        $month = $req->month <= 9 ? '0' . $req->month : $req->month;
        $year  = $req->year;
        $date1 = $year . '-' . $month;
        $date2 = date('Y-m', strtotime('+1 month', strtotime($date1 . '-01')));
        $totalCars = 0;
        $cars  = CarsModel::where('status', 'Active');
        $hariSebulan  = cal_days_in_month(CAL_GREGORIAN, $month, $year);
        $html = "";
        $html .= '<thead><tr><th class="text-white bg-primary">Carro</th>';
        for ($i = 1; $i <= $hariSebulan; $i++) {
            $html .= '<th class="text-white bg-primary">' . $i . '</th>';
        }
        $html .= '<th class="text-white bg-primary">Total</th>';
        $html .= '<th class="text-white bg-primary">%</th>';
        $html .= '</tr></thead>';

        $html .= '<tbody>';
        foreach ($cars->get() as $c) {
            $days = self::queryDateCars($date1, $date2, $c->id);
            $html .= '<tr>';
            $html .= '<td class="text-white bg-primary">' . $c->car_name . '</td>';
            foreach ($days as $val => $key) {
                if ($days[$val] == 'unavailable') {
                    $icons = "<i class='bx bx-car font-size-14'></i>";
                } else {
                    $icons =  "<i class='fas fa-times text-danger font-size-14'></i>";
                }
                $html .= '<td>' . $icons  . '</td>';
            };
            $html .= '<td>' . self::hitungCars($days) . '</td>';

            $totals = (self::hitungCars($days) /  $hariSebulan) * 100;
            $html .= '<td>' .  number_format($totals, 2)  . '%</td>';
            $html .= '</tr>';

            $totalCars += self::hitungCars($days);
        }


        $totaldaysrent2 = self::hitungCars(ReportesCarsModel::queryDateCars($date1, $date2, ""));
        $formula = $totalCars . '/' . $cars->count() . '*' . $hariSebulan;
        $totals2 = ($totalCars  / ($cars->count() * $hariSebulan)) * 100;
        $html .= "<div class='col-lg-3'><label>Total</label><br><input readonly class='form-control lg-3' value='" . number_format($totals2, 5) . "'></input></div>";
        $html .= '</tbody>';
        echo $html;
    }

    public function queryDateCars($date1, $date2, $carId)
    {

        $query = DB::select("select cps.id ,  c.car_name , cps.departure_date , cps.returning_date, cps.no_of_days  from cost_per_services cps 
        inner join quotes q on q.reference  = cps.id 
        inner join cars c on c.id = cps.cars_id 
        where q.payment_status  = 'Paid' AND DATE_FORMAT(returning_date,'%Y-%m') between  '$date1' and '$date2' AND cps.cars_id = '$carId' ");


        $events = array();
        foreach ($query as $q) {
            $events[] =
                array(
                    'check_in_date' => $q->departure_date,
                    'check_out_date' => $q->returning_date,
                );
        }

        $year = date('Y', strtotime($date1 . '-01'));
        $month = date('m', strtotime($date1 . '-01'));



        $nb_days = date("t", strtotime("$year-$month-01"));
        $begin_month_tm = strtotime("$year-$month-01");
        $end_month_tm = strtotime("$year-$month-$nb_days 23:59:59");

        $days = array_fill(1, $nb_days, FREE);

        foreach ($events as $event) {
            $check_in_tm = strtotime($event['check_in_date']);
            $check_out_tm = strtotime($event['check_out_date']);

            if (($check_out_tm < $begin_month_tm) || ($check_in_tm > $end_month_tm)) {
                continue;
            }

            if ($check_in_tm >= $begin_month_tm) {
                $inD = (int)substr($event['check_in_date'], strrpos($event['check_in_date'], '-') + 1);
                $days[$inD] = $days[$inD] == FREE ? PARTIAL_CHECKIN : FULL;
            } else {
                $inD = 0;
            }

            if ($check_out_tm <= $end_month_tm) {
                $outD = (int)substr($event['check_out_date'], strrpos($event['check_out_date'], '-') + 1);
                $days[$outD] = $days[$outD] == FREE ? PARTIAL_CHECKOUT : FULL;
            } else {
                $outD = $nb_days + 1;
            }

            for ($day = $inD + 1; ($day < $outD); $day++) {
                $days[$day] = FULL;
            }
        }
        return $days;
    }
}
