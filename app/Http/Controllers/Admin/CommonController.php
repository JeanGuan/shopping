<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/3/2 0002
 * Time: 01:38
 */

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class CommonController extends Controller
{
    //单图上传
    public function upload()
    {
        $file = Input::file('file');

        if ($file->isValid()) {

            $realpath = $file->getRealPath();                                   //图片存储的临时绝对路径

            $entension = $file->getClientOriginalExtension();                        //上传文件后缀
            $newname = date('YmdHis', mt_rand(100, 999)) . '.' . $entension;
            $path = $file->move(base_path() . '/public/uploads/', $newname);               //移动文件并重新命名   base_path  根目录    urldecode() 可以直接获取里面的url

            if ($path) {
                $filepath = '/uploads/' . $newname;
                $data = [
                    'code' => 1,
                    'msg' => '上传成功',
                    'src' => $filepath
                ];
            } else {
                $data = [
                    'code' => 0,
                    'msg' => '上传失败',
                    'src' => ''
                ];
            }
            return $data;
        }

    }

    //产品上传图片
    public function uploads(){

        // 获取表单上传文件 例如上传了001.jpg
        $file = Input::file('file_data');

        $dir = 'product';
        $date = date('Ym');

        $entension = $file-> getClientOriginalExtension();                  //上传文件后缀
        $newname = date('YmdHis',mt_rand(100,999)).'.'.$entension;
        $info = $file->move(base_path().'/public/uploads/product/'.$date ,$newname);

        if($info){
            $data['code'] = 0;
            $data['img'] = '/uploads/'.$dir.'/'.$date.'/'.$info->getFilename();


        }else{
            // 上传失败获取错误信息
            //echo $file->getError();
            $data['code'] = -1;
            $data['error'] = $file->getError();
        }
        exit(json_encode($data));
    }

    //删除图片
    public function updel(){
        $filename = input('filename');
        if (!empty($filename)) {
            @unlink('uploads'.$filename);
            $data['code']=1;
        } else {
            $data['code']=2;
        }
        exit(json_encode($data));
    }
}