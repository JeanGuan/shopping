<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/3/7 0007
 * Time: 19:54
 */

namespace App\Http\Controllers\Home;


use App\Http\Model\User;
use Illuminate\Support\Facades\Input;

class AjaxController extends CommonController
{

    /**
     * 检测该手机号是否存在
     */
    public function CheckPhone(){

        $phone = Input::get('phone');
        $re = User::where('phone',$phone)->first();
        if($re['id']){
            $data = [
                'status'=>0,
                'msg'=>'手机号已注册!'
            ];
        }else {
            $data = [
                'status' =>1,
                'msg' => ''
            ];
        }
        return $data;
    }


    /**
     * 检测验证码是否正确
     */
    public function Checkcode(){

        $code = Input::get('code');
        $_code = new \Code();
        $_code = $_code->get();

        if (strtoupper($code)!= $_code){
            $data = [
                'status'=>0,
                'msg'=>'验证码错误!'
            ];
        }else {
            $data = [
                'status' =>1,
                'msg' => ''
            ];
        }
        return $data;
    }

}