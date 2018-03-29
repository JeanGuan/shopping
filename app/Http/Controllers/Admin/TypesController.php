<?php
/**
 * Created by PhpStorm.
 * User: PC
 * Date: 2018/3/17
 * Time: 10:57
 */

namespace App\Http\Controllers\Admin;

//商品分类控制器
use App\Http\Model\Types;


class TypesController extends CommonController
{
    //商品分类
    public function index(){
        $types = (new Types())->tree();
        //加载页面
        return view('admin.types.index',compact('types'));
    }

    //商品分类添加
    public function create(){
        $types = (new Types())->tree();
        //加载页面
        return view('admin.types.add',compact('types'));
    }

    //商品分类 添加提交
    public function store(){
        $re =(new Types())->add();
        if($re){
            return redirect('admin/types');
        }else{
            $data = [
                'status'=>0,
                'msg'=>'分类添加失败！'
            ];
        }
        return $data;
    }

    //商品分类编辑
    public function edit($id){
        $types = (new Types())->tree();
        $field = (new Types())->edit($id);
        return view('admin.types.edit',compact('types','field'));
    }

    //商品分类 编辑更新
    public function update($id){
        $re = (new Types())->upd($id);
        if ($re){
            return redirect('admin/types');
        }else{
            return back()->with('errors','分类修改失败！');
        }
    }

    //商品分类删除
    public function destroy($id){
        $re = (new Types())->del($id);
        if ($re){
            $data =[
                'status'=>1,
                'msg'=>'分类删除成功！'
            ];
        }else{
            $data = [
                'status'=>0,
                'msg'=>'分类删除失败！'
            ];
        }
        return $data;
    }

    //商品分类排序
    public function changeOrder(){
        $re = (new Types())->change();
        if ($re){
            $data = [
                'status'=>1,
                'msg'=>'分类排序修改成功!'
            ];
        }else{
            $data = [
                'status'=>0,
                'msg'=>'分类排序修改失败!'
            ];
        }
        return $data;
    }


}