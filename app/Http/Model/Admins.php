<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Input;

//管理员模型
class Admins extends Model
{

    protected $table = 'admin';
    protected $primaryKey = 'id';
    public    $timestamps = false;
    public    $arr_type=[];

    protected $guarded = [];  //排除敏感字段

    //管理员查询
    public function sel(){
        $admin = Admins::orderBy('status','asc')->paginate(10);
        foreach ($admin as $v){
            $admintypes =  Admintypes::get();
            foreach ($admintypes as $a){
                if($v->type_id == $a->id){
                    $v['typename']=$a['typename'];
                }
            }
        }
        return $admin;
    }

    //管理员添加
    public function add(){
            $input = Input::except('_token','password2');
            $input['password'] = encrypt($input['password']);
            $input['time']=time();
            $admintypes = Admins::create($input);
       return $admintypes;
    }

    //管理员编辑
    public function edit($id){
        $field = Admins::find($id);
        return $field;
    }

    //管理员更新
    public function upd($file_id){
        $input = Input::except('_token','_method');
        $re = Admins::where('id',$file_id)->update($input);
        return $re;
    }

    //管理员删除
    public function del($id){
        $re = Admins::where('id',$id)->delete();
        return $re;
    }


}
