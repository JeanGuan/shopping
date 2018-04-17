<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;


//地址省级模型
class Province extends Model
{

    protected $table = 'cn_province';
    protected $primaryKey = 'id';
    public    $timestamps = false;
    public    $arr_type=[];

    protected $guarded = [];  //排除敏感字段



}
