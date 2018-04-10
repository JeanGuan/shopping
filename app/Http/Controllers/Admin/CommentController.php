<?php
/**
 * Created by PhpStorm.
 * User: PC
 * Date: 2018/3/29
 * Time: 11:22
 */

namespace App\Http\Controllers\Admin;

//商品评论控制器


use App\Http\Model\Comment;
use Illuminate\Http\Request;

class CommentController extends CommonController
{
    //商品评论
    public function index(){
        $comment = (new  Comment())->comment();
        return view('admin.comment.index',compact('comment'));
    }

    //商品评论状态修改 ajax
    public function status(Request $request){
       $input =$request->except('_token');
       $data = Comment::where('id',$input['id'])->update(['status'=>$input['status']]);
       if ($data){
           $data =[
               'status' =>1,
               'msg'=>'评论状态修改成功！'
           ];
       }else{
           $data = [
               'status' => 0,
               'msg' =>'评论状态修改失败！'
           ];
       }
       return $data;
    }

}