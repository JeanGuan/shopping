<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Input;

//管理员级别模型
class Admintypes extends Model
{

    protected $table = 'admintypes';
    protected $primaryKey = 'id';
    public    $timestamps = false;
    public    $arr_type=[];

    protected $guarded = [];  //排除敏感字段

    //管理员级别查询
    public function sel(){

        $admintypes = Admintypes::orderBy('rank','desc')->paginate(10);
        return $admintypes;
    }

    //管理员级别添加
    public function add(){
        $input = Input::except('_token');
        $admintypes = Admintypes::create($input);
        return $admintypes;
    }

    //管理员级别修改
    public function edit($id){
        $field = Admintypes::find($id);
        return $field;
    }

    //管理员级别更新
    public function upd($file_id){
        $input = Input::except('_token','_method');
        $re = Admintypes::where('id',$file_id)->update($input);
        return $re;
    }

    //管理员删除
    public function del($id){
        $re = Admintypes::where('id',$id)->delete();
        return $re;
    }



}
