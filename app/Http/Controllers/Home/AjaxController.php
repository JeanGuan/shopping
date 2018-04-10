<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/3/7 0007
 * Time: 19:54
 */

namespace App\Http\Controllers\Home;


use App\Http\Model\Comment;
use App\Http\Model\User;
use Illuminate\Http\Request;
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
                'msg' => '验证码正确!'
            ];
        }
        return $data;
    }

    //ajax获取商品评论
    public function ajaxComment(Request $request){
        $goods_id = $request->goods_id;
        $commentType = $request->commentType;       // 1 全部 2好评 3 中评 4差评 5有图
        $p = $request->p;

        $where = ['comment.status'=>1,'comment.gid'=>$goods_id];
        if($commentType==5){
            $where['comment.picarr'] = ['<>',''];
        }else{
            $typeArr = ['1'=>'1,2,3,4,5','2'=>'4,5','3'=>'3','4'=>'1,2'];
            $where['comment.start'] = ['in',$typeArr[$commentType]];
        }

        $count = Comment::where($where)->count();

        /*//获取所有评论与用户信息
        $comment = Comment::select('comment.*','user.username','user.portrait')
            ->join('user','comment.uid','=','user.id')
            ->where('gid',$id)->get();*/
    }

}