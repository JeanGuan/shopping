<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/3/7 0007
 * Time: 19:54
 */

namespace App\Http\Controllers\Home;


use Illuminate\Support\Facades\Input;

class SmsController extends CommonController
{

    public function phoneCode(){

        $phone = Input::get('phone');
        $uid = '59402';		//数字用户名
        $pwd = '6p2ne5';		//密码
        $ster = rand(10000,99999);
        $contents = '您好，验证码：'.$ster.'【绿色联源】';		//内容
        $content = iconv("UTF-8","GB2312",$contents);
        //即时发送
        $res = $this->sendSMS($uid,$pwd,$phone,$content);
        return ['status'=>$res,'code'=>$ster];
    }

    //注册手机验证码
    function sendSMS($uid,$pwd,$mobile,$content,$time='',$mid='')
    {
        $http = 'http://http.yunsms.cn/tx/';
        $data = array
        (
            'uid'=>$uid,					//数字用户名
            'pwd'=>strtolower(md5($pwd)),	//MD5位32密码
            'mobile'=>$mobile,				//号码
            'content'=>$content,			//内容 如果对方是utf-8编码，则需转码iconv('utf-8','gbk',$content); 如果是gbk则无需转码
            'time'=>$time,		//定时发送
            'mid'=>$mid						//子扩展号
        );
        $re= $this->postSMS($http,$data);			//POST方式提交
        if( trim($re) == '100' )
        {
            return 1;
        }
        else
        {
            return 2;
        }
    }

    function postSMS($url,$data='')
    {
        $post='';
        $row = parse_url($url);
        $host = $row['host'];
        $port = 80;
        $file = $row['path'];
        while (list($k,$v) = each($data))
        {
            $post .= rawurlencode($k)."=".rawurlencode($v)."&";	//转URL标准码
        }
        $post = substr( $post , 0 , -1 );
        $len = strlen($post);
        $fp = @fsockopen( $host ,$port, $errno, $errstr, 10);
        if (!$fp) {
            return "$errstr ($errno)\n";
        } else {
            $receive = '';
            $out = "POST $file HTTP/1.0\r\n";
            $out .= "Host: $host\r\n";
            $out .= "Content-type: application/x-www-form-urlencoded\r\n";
            $out .= "Connection: Close\r\n";
            $out .= "Content-Length: $len\r\n\r\n";
            $out .= $post;
            fwrite($fp, $out);
            while (!feof($fp)) {
                $receive .= fgets($fp, 128);
            }
            fclose($fp);
            $receive = explode("\r\n\r\n",$receive);
            unset($receive[0]);
            return implode("",$receive);
        }
    }
}