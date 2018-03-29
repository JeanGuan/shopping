<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Input;

//广告模型
class Ads extends Model
{

    protected $table = 'ads';
    protected $primaryKey = 'id';
    public    $timestamps = false;
    public    $arr_type=[];

    protected $guarded = [];  //排除敏感字段

    //广告查询
    public function sel(){
        $ads = Ads::orderBy('order_id','asc')->paginate(10);
        return $ads;
    }

    //广告添加提交
    public function add(){
        $input = Input::except('_token','file');
        $re = Ads::create($input);
        return $re;
    }

    //广告编辑
    public function edit($id){
        $ads = Ads::find($id);
        return $ads;
    }

    //广告更新
    public function upd($id){
        $input = Input::except('_token','_method','file');
        $re = Ads::where('id',$id)->update($input);
        return $re;
    }

    //广告删除
    public function del($id){
        $re = Ads::where('id',$id)->delete();
        return $re;
    }

    //广告排序
    public function change(){
        $input = Input::all();
        $cate = Ads::find($input['id']);
        $cate->order_id = $input['order_id'];
        $re = $cate->Update();
        return $re;
    }

}
