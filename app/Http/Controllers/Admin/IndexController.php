<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/3/2 0002
 * Time: 01:39
 */

namespace App\Http\Controllers\Admin;

//后台首页控制器
class IndexController extends CommonController
{
    //后台首页
    public function index(){
        //页面加载
        return view('admin.index');

    }


}