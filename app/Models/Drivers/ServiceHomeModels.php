<?php

namespace App\Models\Drivers;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ServiceHomeModels extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'service_id', 'home_odometer_arrival', 'home_fuel_level_arrival', 'home_charge_fill_tank', 'home_cost_fuel_fill_tank', 'home_photo_evidence', 'created_at', 'created_by', 'updated_at'];
    protected $table = "service_home";
    protected $primaryKey = 'id';
    protected $foreignKey = 'service_id';
    // public $incrementing = false;


    public static function getId($req)
    {
        $datas = DB::select("SELECT id from service_home WHERE service_id = '$req' ");
        if (count($datas) > 0) {
            return $datas[0]->id;
        } else {
            return 0;
        }
    }
}
