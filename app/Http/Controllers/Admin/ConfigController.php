<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/3/2 0002
 * Time: 08:10
 */

namespace App\Http\Controllers\Admin;

//系统配置控制器

use Illuminate\Support\Facades\Input;

class ConfigController extends CommonController
{
    //系统配置项
    public function index(){

        //页面加载
        return view('admin.config.index');
    }

    //系统配置提交
    public function store(){
        //获取表单配置项数据
        $input =Input::except('_token');

        //拼接配置文件内容
        $str = '<?php return '.var_export($input,true).'?>';          //var_export($date,true)把数组输出字符串

        //写入配置文件
        file_put_contents('../config/web.php',$str);                //file_put_contents('filename',$date)写入文件

        return back();
    }

}