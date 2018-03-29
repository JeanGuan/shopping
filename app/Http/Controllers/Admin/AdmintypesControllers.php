<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/3/9 0009
 * Time: 17:50
 */

namespace App\Http\Controllers\Admin;

//管理员级别控制器
use App\Http\Model\Admintypes;

class AdmintypesControllers extends CommonController
{
    //管理员级别
    public function index(){

        $admintypes = (new Admintypes())->sel();

        //加载页面
        return view('admin.admintypes.index',compact('admintypes'));
    }

    //添加级别 admin/admintypes/create     get
    public function create(){

        //加载页面
        return view('admin.admintypes.add');
    }


    //添加提交  admin/admintypes/        post
    public function store(){
        $re = (new Admintypes())->add();

        if ($re){
            //跳转页面
            return redirect('admin/admintypes');
        }else{
            $data = [
                'status'=>0,
                'msg'=>'级别添加失败！'
            ];
        }
        return $data;
    }


    //修改管理员 admin/admintypes/{admintypes}/edit       post
    public function edit($id){
        $field = (new Admintypes())->edit($id);
        //加载页面
        return view('admin.admintypes.edit',compact('field'));
    }


    //修改提交  admin/admintypes/{admintypes}     put
    public function update($file_id){
        $re = (new Admintypes())->upd($file_id);
        if ($re){
            //跳转页面
            return redirect('admin/admintypes');
        }else{
            $data = [
                'status'=>0,
                'msg'=>'级别更新失败！'
            ];
        }
        return $data;

    }


    //删除管理员 admin/admintypes/{admintypes}    DELETE
    public function destroy($id){
        $re = (new Admintypes())->del($id);
        if ($re){
            $data =[
                'status'=>1,
                'msg'=>'级别删除成功！'
            ];
        }else{
            $data = [
                'status'=>0,
                'msg'=>'级别删除失败！'
            ];
        }
        return $data;
    }

}