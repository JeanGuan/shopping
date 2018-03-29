<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/3/2 0002
 * Time: 08:09
 */

namespace App\Http\Controllers\Admin;

//管理员控制器
use App\Http\Model\Admins;

class AdminController extends CommonController
{
    //管理员主页
    public function index(){
        $admin = (new Admins())->sel();
        //页面加载
        return view('admin.admin.index',compact('admin'));
    }


    //添加管理员 admin/admin/create     get
    public function create(){
        //加载页面
        return view('admin.admin.add');
    }


    //添加提交  admin/admin/        post
    public function store(){
        $re = (new Admins())->add();
        if ($re){
            //跳转页面
            return redirect('admin/admin');
        }else{
            $data = [
                'status'=>0,
                'msg'=>'级别添加失败！'
            ];
        }
        return $data;
    }


    //修改管理员 admin/admin/{admin}/edit       post
    public function edit($id){
        $field = (new Admins())->edit($id);
        //加载页面
        return view('admin.admin.edit',compact('field'));
    }


    //修改提交  admin/admin/{admin}     put
    public function update($file_id){
        $re = (new Admins())->upd($file_id);

        if ($re){
            //跳转页面
            return redirect('admin/admin');
        }else{
            $data = [
                'status'=>0,
                'msg'=>'管理员更新失败！'
            ];
        }
        return $data;

    }


    //删除管理员 admin/admin/{admin}    DELETE
    public function destroy($id){
        $re = (new Admins())->del($id);
        if ($re){
            $data =[
                'status'=>1,
                'msg'=>'管理员删除成功！'
            ];
        }else{
            $data = [
                'status'=>0,
                'msg'=>'管理员删除失败！'
            ];
        }
        return $data;
    }



}