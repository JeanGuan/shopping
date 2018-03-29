<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Input;

//会员类型模型
class Usertypes extends Model
{

    protected $table = 'usertypes';
    protected $primaryKey = 'id';
    public    $timestamps = false;
    public    $arr_type=[];

    protected $guarded = [];  //排除敏感字段

    //会员类型查询
    public function sel(){
        $usertypes = Usertypes::orderBy('id','asc')->get();
        return $usertypes;
    }

    //会员类型添加提交
    public function add(){
        $input = Input::except('_token');
        $re = Usertypes::create($input);
        return $re;
    }

    //会员类型编辑
    public function edit($id){
        $usertypes = Usertypes::find($id);
        return $usertypes;
    }

    //会员类型更新
    public function upd($id){
        $input = Input::except('_token','_method');
        $re = Usertypes::where('id',$id)->update($input);
        return $re;
    }

    //会员类型删除
    public function del($id){
        $re = Usertypes::where('id',$id)->delete();
        return $re;
    }

}
