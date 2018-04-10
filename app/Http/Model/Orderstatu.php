<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Input;

//订单模型
class Orderstatu extends Model
{

    protected $table = 'Orderstatu';
    protected $primaryKey = 'id';
    public    $timestamps = false;
    public    $arr_type=[];

    protected $guarded = [];  //排除敏感字段


    //订单状态列表
    public function orderStatusList(){
        $statsus = Orderstatu::get();
        return $statsus;
    }

}
