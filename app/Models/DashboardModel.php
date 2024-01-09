<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use PDO;

class DashboardModel extends Model
{
    use HasFactory;
    public static function  countUsers($type)
    {
        $drivers = DB::select("SELECT count(us.id) as total FROM users us 
        LEFT JOIN user_types ut on ut.id = us.user_type_id  
        WHERE ut.user_type = '$type' ");
        return $drivers[0]->total;
    }



    public static function monthlyQuotes($req)
    {

        $year = $req->input('year');
        $months = $req->input("month");
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
            'nilai'      => number_format($curr, 3),
            'prev'       => $prev,
            'selisih'    => $selisih,
            'persentase' => number_format($persentase, 2)
        );
        return $data;
    }


    public static function yearlyQuotes($req)
    {
        $year = $req->input('year');
        $data = [];
        for ($i = 1; $i <= 12; $i++) {
            $data[] = self::quotesGetData($i, $year);
        }
        return $data;
    }

    public static function quotesGetData($month, $year)
    {
        $data = DB::select("SELECT ROUND(IFNULL(SUM(X.amount),0),2)as total  from quotes q 
        left join (
         select qi.amount , qi.quotes_id  from quotes_items qi 
        )X on X.quotes_id = q.id 
        where q.payment_status = 'Paid' and MONTH(q.created_at) = '$month' and YEAR(q.created_at) = '$year' ");
        return  number_format($data[0]->total, 2, '.', '.');
    }


    public static function revenueServiceio($req)
    {
        $year = $req->input('year');
        $months = $req->input("month");
        $SQL = "SELECT  q.id , IFNULL(SUM(X.amount),0)as total from quotes q
        left join (
         select qi.amount , qi.quotes_id  from quotes_items qi 
        )X on X.quotes_id = q.id 
        left join cost_per_services cps on cps.id = q.reference 
        left join users u on u.id = q.user_id
        where q.payment_status = 'Paid' and YEAR(q.created_at) = '" . $year . "' 
        ";
        if (!empty($months)) {
            $SQL .= "AND MONTH(q.created_at) = '" . $months . "' ";
        }

        $data = DB::select($SQL);
        return number_format($data[0]->total, 2);
    }

    public static function AveragerevenueServiceio($req)
    {
        $year = $req->input('year');
        $SQL = "SELECT  q.id , IFNULL(SUM(X.amount),0)as total from quotes q
        left join (
         select qi.amount , qi.quotes_id  from quotes_items qi 
        )X on X.quotes_id = q.id 
        left join cost_per_services cps on cps.id = q.reference 
        left join users u on u.id = q.user_id
        where q.payment_status = 'Paid' and YEAR(q.created_at) = '" . $year . "'  ";
        if (!empty($months)) {
            $SQL .= "AND MONTH(q.created_at) = '" . $months . "' ";
        }

        $SQL2 = "SELECT COUNT(*)as total FROM quotes q where  payment_status = 'Paid'  and YEAR(q.created_at) = '" . $year . "'  ";

        if (!empty($months)) {
            $SQL2 .= "AND MONTH(q.created_at) = '" . $months . "' ";
        }
        $data = DB::select($SQL);
        $data2 = DB::select($SQL2);
        // return number_format($data[0]->total /  $data2[0]->total, 2);
        if ($data2[0]->total > 0 || $data[0]->total > 0) {
            return number_format($data[0]->total /  5, 2);
        } else {
            return 0;
        }
    }

    public static function OrderServicio($req)
    {
        $year = $req->input('year');
        $months = $req->input("month");
        $SQL = "SELECT  count(q.id)as total  from quotes q
        where q.payment_status = 'Paid' and YEAR(q.created_at) = '" . $year . "' 
        ";
        if (!empty($months)) {
            $SQL .= "AND MONTH(q.created_at) = '" . $months . "' ";
        }

        $data = DB::select($SQL);
        return number_format($data[0]->total);
    }


    public static function cotizaciones($req, $type)
    {
        $year = $req->input('year');
        $months = $req->input("month");


        $data =  QuotesModel::where([
            ['mail_status', '=', $type],
            [DB::raw("(YEAR(created_at))"), '=', $year],
            [DB::raw("(MONTH(created_at))"), '=', $months],
        ])->count();
        return $data;
    }

    public static function car($req)
    {
        $year = $req->input('year');
        $months = $req->input("month");

        $SQL = "SELECT c.car_name , IFNULL(sum(x.total),0) as results from cars c 
        left join(
          select sum(cps.no_of_days) total , cps.created_at , cps.cars_id  from cost_per_services cps 
          left join quotes q on q.reference = cps.id 
          where q.payment_status = 'Paid'
          group by cps.cars_id
        )x on x.cars_id = c.id and year(x.created_at) = $year and month(x.created_at) = $months
        WHERE c.status = 'Active' 
        group by c.id ";
        return DB::select($SQL);
    }

    public static function listService($req)
    {
        $year = $req->input('year');
        $months = $req->input("month");
        $SQL = "SELECT cps.id  , cps.customer_name  ,  s.status , s.payment_status  , date_format(s.created,'%d %M %Y') as dates  , s.departure , date_format(s.date,'%d %M %Y') as tanggal , s.destination 
        from services s 
        left join cost_per_services cps on cps.id  = s.costperservices_id 
        where year(s.created)=$year and  month(s.created)=$months ";
        return DB::select($SQL);
    }


    public static function solicitudReceived($req, $type)
    {
        $SQL = "SELECT COUNT(*) total FROM view_estimate_request WHERE YEAR(fecha_registro)='$req->year' ";
        if (!empty($req->month)) {
            $SQL .= " AND MONTH(fecha_registro)='$req->month' ";
        }

        if (!empty($type) && $type == 1) {
            $SQL .= " AND estado='Atendido' ";
        }

        if (!empty($type) && $type == 2) {
            $SQL .= " AND estado_correo='Approved' ";
        }

        $data = DB::select($SQL);
        return $data[0]->total;
    }
}
