<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Input;

//文章模型
class Brand extends Model
{

    protected $table = 'brand';
    protected $primaryKey = 'id';
    public $timestamps = false;
    public $arr_type = [];

    protected $guarded = [];  //排除敏感字段

    //品牌添加 - 顶级分类查询
    public function types(){
        $types = Types::where('pid',0)->get();
        return $types;
    }

    //品牌查询
    public function sel(){
        $brand = Brand::orderBy('id','asc')->paginate(15);
        return $brand;
    }

    //品牌添加提交
    public function add(){
        $input = Input::except('_token','file');
        $re = Brand::create($input);
        return $re;
    }

    //商品编辑
    public function edit($id){
        $brand = Brand::find($id);
        return $brand;
    }

    //商品更新
    public function upd($id){
        $input = Input::except('_token','_method','file');
        $re = Brand::where('id',$id)->update($input);
        return $re;
    }

    //品牌删除
    public function del($id){
        $re = Brand::where('id',$id)->delete();
        return $re;
    }

}
?>