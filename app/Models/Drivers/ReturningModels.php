<?php

namespace App\Models\Drivers;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ReturningModels extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'service_id', 'return_odometer_time_charge', 'fuel_tank_at_destination', 'return_cost_charged_fuel', 'return_photo_evidence', 'created_at', 'created_by', 'updated_at'];
    protected $table = "service_returning";
    protected $primaryKey = 'id';
    protected $foreignKey = 'service_id';
    // public $incrementing = false;


    public static function getId($req)
    {
        $datas = DB::select("SELECT id from service_returning WHERE service_id = '$req' ");
        if (count($datas) > 0) {
            return $datas[0]->id;
        } else {
            return 0;
        }
    }
}
