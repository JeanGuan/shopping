<?php
/**
 * Created by PhpStorm.
 * User: PC
 * Date: 2018/3/21
 * Time: 23:58
 */

namespace App\Http\Controllers\Admin;

//商品品牌控制器
use App\Http\Model\Brand;
use App\Http\Model\Types;

class BrandController extends  CommonController
{
    //品牌列表
    public function index(){
        $types = (new Brand())->types();
        $brand = (new Brand())->sel();
        return view('admin.brand.index',compact('brand','types'));
    }

    //品牌添加
    public function create(){
        $types = (new Brand())->types();
        return view('admin.brand.add',compact('types'));
    }

    //品牌添加提交
    public function store(){
        $re = (new Brand())->add();
        if ($re){
            return redirect('admin/brand');
        }else{
            $data = [
                'status'=>0,
                'msg'=>'品牌添加成功！'
            ];
        }
        return $data;
    }

    //品牌编辑
    public function edit($id){
        $brand = (new Brand())->edit($id);
        $types = (new Brand())->types();
        return view('admin.brand.edit',compact('brand','types'));
    }

    //品牌更新
    public function update($id){
        $re = (new Brand())->upd($id);
        if ($re){
            return redirect('admin/brand');
        }else{
            $data = [
                'status'=>0,
                'msg'=>'品牌更新失败！'
            ];
        }
        return $data;
    }

    //品牌删除
    public function destroy($id){
        $re = (new Brand())->del($id);
        if ($re){
            $data = [
                'status'=> 1,
                'msg'=>'品牌删除成功！'
            ];
        }else{
            $data = [
                'status'=> 0,
                'msg'=>'品牌删除失败！'
            ];
        }
        return $data;
    }

}