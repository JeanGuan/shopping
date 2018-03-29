<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Input;

//会员模型
class User extends Model
{

    protected $table = 'user';
    protected $primaryKey = 'id';
    public    $timestamps = false;
    public    $arr_type=[];

    protected $guarded = [];  //排除敏感字段

    //会员查询
    public function sel(){
        //查询会员数据表  每页10条  按状态值排序
        $user = User::orderBy('status','asc')->paginate(10);
        return $user;
    }

    //会员添加提交
    public function add(){
        //接收表单所有数据  并用except()排除不需要的字段
        $input = Input::except('_token','password2');

        //密码加密   encrypt()加密   decrypt()解密
        $input['password'] = encrypt($input['password']);

        //提交数据库
        $re = User::create($input);
        return $re;
    }

    //会员编辑
    public function edit($id){
        //查找所编辑的会员信息
        $user = User::find($id);
        return $user;
    }

    //会员更新
    public function upd($id){
        $input = Input::except('_token','_method');
        $re = User::where('id',$id)->update($input);
        return $re;
    }

    //会员删除
    public function del($id){
        $re = User::where('id',$id)->delete();
        return $re;
    }

}
