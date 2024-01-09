<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class EventosModel extends Model
{
    use HasFactory;

    public static function getData()
    {
        $SQL = "SELECT * FROM events ORDER BY created_on DESC";
        $res = DB::select($SQL);
        return $res;
    }
}
