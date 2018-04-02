<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

//订单状态模型
class Orderstatus extends Model
{

    protected $table = 'orderstatu';
    protected $primaryKey = 'id';
    public    $timestamps = false;
    public    $arr_type=[];

    protected $guarded = [];  //排除敏感字段

    //订单状态查询
    public function sel(){
        $orderStatus = Orderstatus::orderBy('id','asc')->get();
        return $orderStatus;
    }


}
