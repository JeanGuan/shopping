<?php
/**
 * Created by PhpStorm.
 * User: PC
 * Date: 2018/3/23
 * Time: 13:14
 */

namespace App\Http\Controllers\Home;

//用户注册控制器
use App\Http\Model\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Input;

class RegisterController extends CommonController
{
    //用户注册
    public function index(Request $request)
    {

        if ($request->isMethod('post')) {
            //验证码判断

            $user = Input::except('_token', 'password2', 'code', 'dxCode');

            //提交注册数据
            $user['password'] = Crypt:: encrypt($user['password']);

            $re = User::create($user);

            if ($re) {
                //存储session
                session(['user' => $user]);
                //跳转个人中心
                return redirect('/login');
            } else {
                return back()->with('msg', '注册失败！');
            }

        } else {
            //加载注册页面
            return view('home.register');
        }

    }
}