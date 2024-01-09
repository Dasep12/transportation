<?php

namespace App\Http\Controllers\Customers;

use App\Http\Controllers\Controller;

use Illuminate\Contracts\Session\Session;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;


class BookingController extends Controller
{
    //

    public function index()
    {
        $data = [
            'message' => null
        ];
        return view('customers/form_details', $data);
    }

    public function executeForm(Request $req)
    {
        $book_num = $req->booking_num;
        $email    = $req->email;

        return redirect('/booking_details/getData?booking_num=' . $book_num . '&email=' . $email);
    }


    public function details(Request $req): View
    {
        $book_num = $req->booking_num;
        $email    = $req->email;

        $SQL = "SELECT q.id as quote_idx,  q.name  as email , er.phone as phone_customer , q.customer_name ,q.reference  as id_cost , concat(u.first_name,'-',u.last_name) name_driver, u.photo , 
        u.phone , u.license , c.car_name  , c.plate , q.invoice_number , rt.route_name , cps.departure_city , 
        concat(cps.departure_date , ' ', cps.departure_time) as departure_dates , cps.destination_city  , 
        concat(cps.returning_date  , ' ', cps.returning_time) as returning_dates , 
        er.car_type  , er.passangers_num ,IFNULL(SUM(X.totales),0)payment_total , q.payment_status , q.invoice_number
       from quotes q
       left join cost_per_services cps on cps.id  = q.reference
       left join users u on cps.driver_name  = u.id 
       left join cars c on c.id = cps.cars_id 
       left join route_travel rt on rt.id  = cps.routes_id 
       left join estimate_request  er on cps.id  = er.costperservices_id 
       left join (
        select qi.amount as  totales, qi.quotes_id from quotes_items qi 
       )X on X.quotes_id = q.id 
       where q.invoice_number  = '$book_num' AND q.name = '$email'  ";

        $res = DB::select($SQL);


        if ($res[0]->invoice_number != null || $res[0]->invoice_number != "") {
            $segundo = DB::select("SELECT IFNULL(sum(qp.amount),0)totals   from quotes_payment qp 
        where qp.quotes_id  = '" . $res[0]->quote_idx . "' ");

            $invoice = DB::select("SELECT * FROM quotes_invoice WHERE quotes_id = '" . $res[0]->quote_idx . "' AND  showing='Y' LIMIT 2 ");
            $data = [
                'res'       => $res,
                'invoice'   => $invoice,
                'segundo'   => $segundo[0]->totals
            ];
            return view('customers/details_booking', $data);
        } else {
            $data = [
                'message' => 'Data Not Found'
            ];
            return view('customers/form_details', $data);
        }
    }


    // public function add
}
