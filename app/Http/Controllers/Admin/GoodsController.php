<?php
/**
 * Created by PhpStorm.
 * User: PC
 * Date: 2018/3/17
 * Time: 10:55
 */

namespace App\Http\Controllers\Admin;

//商品控制器
use App\Http\Model\Brand;
use App\Http\Model\Goods;
use App\Http\Model\Types;

class GoodsController extends CommonController
{
    //商品列表
    public function index(){
        $goods = (new Goods())->sel();
        //页面加载
        return view('admin.goods.index',compact('goods'));
    }

    //商品添加
    public function create(){
        $types = (new  Types())->tree();
        $brand = (new Goods())->brand();
        return view('admin.goods.add',compact('types','brand'));
    }

    //商品添加提交
    public function store(){
        $re= (new Goods())->add();
        if ($re){
            return redirect('admin/goods');
        }else{
            $data = [
                'status'=>0,
                'msg'=>'商品添加失败！'
            ];
        }
        return $data;
    }

    //商品编辑
    public function edit($id){
        $goods = (new Goods())->edit($id);
        $pic = unserialize($goods['picarr']);               //图片路径
        $attr = unserialize($goods['attr']);                //商品属性名称

        $types = (new  Types())->tree();
        $brand = (new Goods())->brand();
        return view('admin.goods.edit',compact('goods','types','brand','pic','attr'));
    }

    //商品更新
    public function update($id){
        $re = (new Goods())->upd($id);
        if ($re){
            return redirect('admin/goods');
        }else{
            $data = [
                'status' =>0,
                'msg'=>'商品添加失败！'
            ];
        }
        return $data;
    }

    //商品删除
    public function destroy($id){
        $re = (new Goods())->del($id);
        if ($re){
            $data = [
                'status'=>1,
                'msg'=>'商品删除成功！'
            ];
        }else{
            $data = [
                'status'=>0,
                'msg'=>'商品删除失败！'
            ];
        }
        return $data;
    }



}