<?php
/**
 * Created by PhpStorm.
 * User: PC
 * Date: 2018/3/23
 * Time: 13:12
 */

namespace App\Http\Controllers\Home;

//用户登录控制器
use App\Http\Model\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class LoginController extends CommonController
{
    //用户登录
    public function index(Request $request){


        if($request->isMethod('post')) {
            //获取数据
            $username = $request->input('username');
            $password = $request->input('password');

            //验证密码
            $User = User::first();
            if ($User->username != $username || Crypt:: decrypt($User->password) != $password){
                return back()->with('msg','用户名或密码错误！');
            }

            //存储session
            session(['Homeuserinfo.id'=>$User->id]);
            session(['Homeuserinfo.username'=>$User->username]);
            //跳转个人中心
            return redirect('/');

        }else{
            //加载登录页面
            return view('home.login');
        }

    }

    //用户注销登录
    public function logout(Request $request){
        $request->session()->flush();
        return redirect('/login');
    }


}