<?php
/**
 * Created by PhpStorm.
 * User: PC
 * Date: 2018/3/21
 * Time: 10:33
 */

namespace App\Http\Controllers\Admin;

//文章分类控制器
use App\Http\Model\Arctype;

class ArctypeController extends CommonController
{
    //文章分类
    public function index(){
        $arctype = (new Arctype())->tree();
        return view('admin.arctype.index',compact('arctype'));
    }

    //文章分类添加
    public function create(){
        $types = (new Arctype())->tree();
        return view('admin.arctype.add',compact('types'));
    }

    //文章分类添加提交
    public function store(){
        $re = (new Arctype())->add();
        if($re){
            return redirect('admin/arctype');
        }else{
            $data = [
                'status'=>0,
                'msg'=>'分类添加失败！'
            ];
        }
        return $data;
    }

    //文章分类编辑
    public function edit($id){
        $arctype = (new Arctype())->tree();
        $field = (new Arctype())->edit($id);
        return view('admin.arctype.edit',compact('arctype','field'));
    }

    //文章分类更新
    public function update($id){
        $re = (new Arctype())->upd($id);
        if ($re){
            return redirect('admin/arctype');
        }else{
            $data = [
              'status'=>0,
              'msg' =>'分类更新失败！'
            ];
        }
        return $data;
    }

    //文章分类删除
    public function destroy($id){
        $re = Arctype::where('id',$id)->delete();
        if ($re){
            $data = [
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

    //文章分类排序
    public function changeOrder(){
        $re = (new Arctype())->change();
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