<?php

namespace App\Models\Drivers;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ExpenseModels extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'fuel_litre_go', 'fuel_exp_go', 'fuel_exp_img_go', 'road_fee_go', 'road_fee_img_go', 'hotel_fee_go', 'hotel_fee_img_go', 'car_wash_go', 'car_wash_img_go', 'airport_fee_go', 'airport_fee_img_go', 'other_exp_go', 'fuel_litre_return', 'fuel_exp_return', 'fuel_exp_img_return', 'road_fee_return', 'road_fee_img_return', 'hotel_fee_return', 'hotel_fee_img_return', 'car_wash_return', 'car_wash_img_return', 'other_exp_return', 'date_add', 'user_add_id', 'date_update', 'user_update', 'service_id', 'other_exp_desc_go', 'other_exp_desc_return'];
    protected $table = "service_expense";
    protected $primaryKey = 'id';
    protected $foreignKey = 'service_id';
    // public $incrementing = false;


    public static function getId($req)
    {
        $datas = DB::select("SELECT id from service_expense WHERE service_id = '$req' ");
        if (count($datas) > 0) {
            return $datas[0]->id;
        } else {
            return '';
        }
    }
}
