<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;


//地址市级模型
class City extends Model
{

    protected $table = 'cn_city';
    protected $primaryKey = 'id';
    public    $timestamps = false;
    public    $arr_type=[];

    protected $guarded = [];  //排除敏感字段



}
