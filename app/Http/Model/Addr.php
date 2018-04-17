<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;


//收货地址模型
class Addr extends Model
{

    protected $table = 'addr';
    protected $primaryKey = 'id';
    public    $timestamps = false;
    public    $arr_type=[];
    protected $guarded = [];  //排除敏感字段

    //收货地址查询
    public function  selAddr($id){
        $addr = Addr::where('uid',$id)->get();
        return $addr;
    }

    //默认收货地址查询
    public function addr_default(){
       $addr = Addr::where('state',1)->select('id')->first();
        return $addr;
    }

    //地区编码查询中文
    public function addrCode_cn($province,$city,$county){
        $area =[];
        //查询省级
        $province= Province::where('code',$province)->select('name')->first();
        $area['province'] = $province['name'];

        //查询市级
        $city = City::where('code',$city)->select('name')->first();
        $area['city'] = $city['name'];

        //查询县级
        $county = County::where('code',$county)->select('name')->first();
        $area['county'] = $county['name'];

        return $area;
    }


}
