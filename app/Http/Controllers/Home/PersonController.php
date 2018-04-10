<?php
/**
 * Created by PhpStorm.
 * User: PC
 * Date: 2018/4/9
 * Time: 18:45
 */

namespace App\Http\Controllers\Home;

//个人中心控制器
class PersonController extends  CommonController
{
    //个人中心
    public function index(){
        //判断session_id
        if (session('Homeuserinfo.id')){
            echo '1';
            //查询用户数据
        }else{
            return redirect('/login');
        }

        return view('home.person.index');
    }

}