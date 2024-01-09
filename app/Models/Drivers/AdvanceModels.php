<?php

namespace App\Models\Drivers;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class AdvanceModels extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'service_id', 'advance_1', 'advance_2', 'driver_id_1', 'driver_id_2', 'payment_total_1', 'payment_total_2', 'date_reg', 'date_update', 'updated_at', 'service_id', 'user_id'];
    protected $table = "service_advance";
    protected $primaryKey = 'id';
    protected $foreignKey = 'service_id';
    // public $incrementing = false;


    public static function getId($req)
    {
        $datas = DB::select("SELECT id from service_destination WHERE service_id = '$req' ");
        if (count($datas) > 0) {
            return $datas[0]->id;
        } else {
            return 0;
        }
    }
}
