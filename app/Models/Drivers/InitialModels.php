<?php

namespace App\Models\Drivers;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class InitialModels extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'service_id', 'init_odometer', 'initial_fuel_tank', 'evidencia', 'created_at', 'created_by', 'updated_at'];
    protected $table = "service_initial";
    protected $primaryKey = 'id';
    protected $foreignKey = 'service_id';
    // public $incrementing = false;


    public static function getId($req)
    {
        $datas = DB::select("SELECT id from service_initial WHERE service_id = '$req' ");
        if (count($datas) > 0) {
            return $datas[0]->id;
        } else {
            return 0;
        }
    }
}
