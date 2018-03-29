<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Input;

//轮播图模型
class Slider extends Model
{

    protected $table = 'slider';
    protected $primaryKey = 'id';
    public $timestamps = false;
    public $arr_type = [];

    protected $guarded = [];  //排除敏感字段

    //轮播图查询
    public function sel(){
        $slider = Slider::orderBy('order_id','asc')->paginate(10);
        return $slider;
    }

    //轮播图添加
    public function add(){
        $input = Input::except('_token','file');
        $re = Slider::create($input);
        return $re;
    }

    //轮播图编辑
    public function edit($id){
        $field = Slider::find($id);
        return $field;
    }

    //轮播图更新
    public function upd($id){
        $input = Input::except('_token','_method','file');                             //except() 排除不需要的表单值
        $re = Slider::where('id',$id)->update($input);
        return $re;
    }

    //轮播图删除
    public function del($id){
        $re = Slider::where('id',$id)->delete();
        return $re;
    }

    //轮播图排序
    public function change(){
        $input = Input::all();
        $cate = Slider::find($input['id']);
        $cate->order_id = $input['order_id'];
        $re = $cate->Update();
        return $re;
    }

}