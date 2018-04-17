<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;


//地址县级模型
class County extends Model
{
    protected $table = 'cn_county';
    protected $primaryKey = 'id';
    public    $timestamps = false;
    public    $arr_type=[];

    protected $guarded = [];  //排除敏感字段



}
