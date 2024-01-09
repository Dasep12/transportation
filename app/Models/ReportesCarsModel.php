<?php

namespace App\Models;

use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ReportesCarsModel extends Model
{
    use HasFactory;

    public static function queryDateCars($date1, $date2, $carId)
    {

        $query = self::queryCarsRunning($date1, $date2, $carId);
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

    public static function queryCarsRunning($date1, $date2, $carId)
    {

        $SQL = "SELECT cps.id ,  c.car_name , cps.departure_date , cps.returning_date, cps.no_of_days  from cost_per_services cps 
        inner join quotes q on q.reference  = cps.id 
        inner join cars c on c.id = cps.cars_id 
        where q.payment_status  = 'Paid' AND DATE_FORMAT(returning_date,'%Y-%m') between  '$date1' and '$date2' ";
        if ($carId != null || $carId != "") {
            $SQL .= " AND cps.cars_id = '$carId' ";
        }
        $data =  DB::select($SQL);
        return $data;
    }
}
