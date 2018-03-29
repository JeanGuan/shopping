<?php
/**
 * Created by PhpStorm.
 * User: PC
 * Date: 2018/3/21
 * Time: 10:28
 */

namespace App\Http\Controllers\Admin;

//文章控制器
use App\Http\Model\Arctype;
use App\Http\Model\Article;

class ArticleController extends CommonController
{
    //文章列表
    public function index(){
        $article = (new Article())->sel();
        return view('admin.article.index',compact('article'));
    }

    //文章添加
    public function create(){
        $arctype = (new Arctype())->tree();
        return view('admin.article.add',compact('arctype'));
    }

    //文章添加提交
    public function store(){
        $re = (new Article())->add();
        if ($re){
            return redirect('admin/article');
        }else{
            $data = [
                'status'=>0,
                'msg'=>'文章添加失败！'
            ];
        }
        return $data;
    }

    //文章编辑
    public function edit($id){
        $field = (new Article())->edit($id);
        $arctype = (new Arctype())->tree();
        return view('admin.article.edit',compact('field','arctype'));
    }

    //文章更新
    public function update($id){
        $re = (new Article())->upd($id);
        if ($re){
            return redirect('admin/article');
        }else{
            $data = [
                'status'=>0,
                'msg'=>'文章更新失败!'
            ];
        }
        return $data;
    }

    //文章删除
    public function destroy($id){
        $re = (new Article())->del($id);
        if ($re){
            $data= [
                'status'=>1,
                'msg'=>'文章删除成功！'
            ];
        }else{
            $data= [
                'status'=>0,
                'msg'=>'文章删除失败！'
            ];
        }
        return $data;
    }

}