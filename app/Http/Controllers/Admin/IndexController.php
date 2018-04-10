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

    //清除缓存
    public function flush(){
        $this->delCache('../storage/framework/cache');
        $this->delCache('../storage/framework/views');
        return redirect('admin');
    }

    //缓存删除方法
    public function delCache($path){
        //读取路径文件
        $arr = scandir($path);
        //遍历并删除文件
        foreach ($arr as $v){
            if ($v != '.' && $v != '..'){
                unlink($path.'/'.$v);
            }
        }
    }


}