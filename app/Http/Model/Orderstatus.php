<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

//订单状态模型
class Orderstatus extends Model
{

    protected $table = 'orderstatus';
    protected $primaryKey = 'id';
    public    $timestamps = false;
    public    $arr_type=[];

    protected $guarded = [];  //排除敏感字段

}
