<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;


//管理员模型
class Addr extends Model
{

    protected $table = 'addr';
    protected $primaryKey = 'id';
    public    $timestamps = false;
    public    $arr_type=[];

    protected $guarded = [];  //排除敏感字段



}
