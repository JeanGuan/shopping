<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/3/2 0002
 * Time: 08:10
 */

namespace App\Http\Controllers\Admin;

//会员控制器
use App\Http\Model\User;

class UserController extends CommonController
{
    //会员列表
    public function index(){
        $user = (new User())->sel();
        //页面加载
        return view('admin.user.index',compact('user'));
    }

    //会员添加
    public function create(){
        //页面加载
        return view('admin.user.add');
    }

    //会员添加提交
    public function store(){

        $re = (new User())->add();

        if($re){
            //成功  跳转
           return redirect('admin/user');
        }else{
            //失败  返回错误信息
            $data = [
                'status'=>0,
                'msg'=>'会员添加失败！'
            ];
        }
        return $data;
    }

    //会员编辑
    public function edit($id){
        $field = (new User())->edit($id);
        //加载页面
        return view('admin.user.edit',compact('field'));
    }

    //会员更新
    public function update($id)
    {
        $re = (new User())->upd($id);
        if ($re){
            //跳转页面
            return redirect('admin/user');
        }else{
            $data = [
                'status'=>0,
                'msg'=>'会员更新失败！'
            ];
        }
        return $data;
    }

    //会员删除
    public function destroy($id){
        $re = (new User())->del($id);
        if ($re){
            $data =[
                'status'=>1,
                'msg'=>'会员删除成功！'
            ];
        }else{
            $data = [
                'status'=>0,
                'msg'=>'会员删除失败！'
            ];
        }
        return $data;
    }

}