<?php

namespace App\Models;

use App\Helpers\AuthHelper;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class SolicitudModel extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'name', 'phone', 'email', 'route', 'date_start', 'date_end', 'car_type', 'passangers_num', 'comment', 'form_zasady', 'status', 'date_reg', 'date_status', 'comment_cancel', 'user_id', 'costperservices_id'];
    protected $table = "estimate_request";
    protected $primaryKey = 'id';

    public static function getData($id = null)
    {
        $sql = "SELECT * FROM view_estimate_request ";

        if (!empty($id)) {
            $sql .= "WHERE id=" . $id;
        }
        $sql .= " ORDER BY id DESC";
        $data = DB::select($sql);
        return $data;
        // connection("DB2")->
        // connection("DB2")->
    }

    public static function getDetails($id = null)
    {
        $sql = "SELECT * FROM estimate_request ";

        if (!empty($id)) {
            $sql .= "WHERE id=" . $id;
        }
        $sql .= " ORDER BY id DESC";
        $data = DB::select($sql);
        return $data;
    }
}
