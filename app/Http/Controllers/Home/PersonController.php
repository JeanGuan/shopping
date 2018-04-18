<?php
/**
 * Created by PhpStorm.
 * User: PC
 * Date: 2018/4/9
 * Time: 18:45
 */

namespace App\Http\Controllers\Home;

//个人中心控制器
use App\Http\Model\User;

class PersonController extends  CommonController
{
    //个人中心
    public function index(){
        //判断session_id
        if (session('Homeuserinfo.id')){
            //查询用户数据
            $id = session('Homeuserinfo.id');
            $user = User::where('id',$id)->first();
            return view('home.person.index',compact('user'));
        }else{
            return redirect('/login');
        }

        return view('home.person.index');
    }

}