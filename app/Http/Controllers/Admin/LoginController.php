<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/3/2 0002
 * Time: 20:15
 */

namespace App\Http\Controllers\Admin;

use App\Http\Model\Admins;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
//后台登录控制器
class LoginController extends CommonController
{
    //后台登录
    public function index(Request $request){

        if($request->isMethod('post')) {

            //获取数据
            $name = $request->input('name');
            $password = $request->input('password');

            //查询用户
            $admins = Admins::where(['name'=>$name,'status'=>0])->first();
            if ($admins){
                //验证密码
                if ($password == decrypt($admins->password)){

                    $arr =[];
                    $arr['last_time'] = time();
                    $arr['count']  = ++ $admins->count;

                    //更新管理员数据
                    Admins::where('id',$admins->id)->update($arr);
                    //存储session
                    session(['jeanuserinfo.name'=>$admins->name]);
                    session(['jeanuserinfo.id'=>$admins->id]);
                    return  redirect('admin/');

                }else{
                    return back()->with('error','密码输入不正确！');
                }
            }else{
                return back()->with('error','用户名不存在！');
            }

            //存储session
            session(['admins'=>$admins]);
            //跳转后台主页
            return redirect('admin');

        }else{
            return view('admin.login');
        }

    }

    //注销登录
    public function logout(Request $request){
        $request->session()->flush();
        return redirect('admin/login');
    }

}