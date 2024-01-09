<?php

namespace App\Models;

use App\Helpers\AuthHelper;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class SalesReportModel extends Model
{
    use HasFactory;

    public static function getReport($dates)
    {
        $SQL = "SELECT IFNULL(SUM(X.amount),0)as total  from quotes q 
        left join (
         select qi.amount , qi.quotes_id  from quotes_items qi 
        )X on X.quotes_id = q.id 
        where q.payment_status = 'Paid' and date_format(q.created_at,'%Y-%m-%d') = '" . $dates . "' ";
        $res = DB::select($SQL);
        return $res[0]->total;
    }

    public static function getReportSales($date1)
    {
        $SQL = "SELECT IFNULL(SUM(X.amount),0)as total  from quotes q 
        left join (
         select qi.amount , qi.quotes_id  from quotes_items qi 
        )X on X.quotes_id = q.id 
        where q.payment_status = 'Paid' and date_format(q.created_at,'%Y-%m') = '" . $date1 . "'  ";
        $res = DB::select($SQL);
        return $res[0]->total;
    }

    public static function getReportCar($date1, $date2)
    {
        $SQL = "SELECT q.id , IFNULL(SUM(X.amount),0)as total , c.car_name from quotes q
        left join (
         select qi.amount , qi.quotes_id  from quotes_items qi 
        )X on X.quotes_id = q.id 
        left join cost_per_services cps on cps.id = q.reference 
        left join cars c on c.id = cps.cars_id 
        where q.payment_status = 'Paid' and date_format(q.created_at,'%Y-%m') BETWEEN '" . $date1 . "' AND '" . $date2 . "' group by q.id  ";
        $res = DB::select($SQL);
        return $res;
    }

    public static function getReportPerson($date1, $date2)
    {
        $SQL = "SELECT  q.id , IFNULL(SUM(X.amount),0)as total , CONCAT(u.first_name,' ',u.last_name)as names  from quotes q
        left join (
         select qi.amount , qi.quotes_id  from quotes_items qi 
        )X on X.quotes_id = q.id 
        left join cost_per_services cps on cps.id = q.reference 
        left join users u on u.id = q.user_id
        where q.payment_status = 'Paid' and date_format(q.created_at,'%Y-%m') BETWEEN '" . $date1 . "' AND '" . $date2 . "' group by q.user_id ";
        $res = DB::select($SQL);
        return $res;
    }
}
