<?php
/**
 * Created by PhpStorm.
 * User: PC
 * Date: 2018/3/15
 * Time: 17:10
 */

namespace App\Http\Controllers\Admin;

//图片轮播控制器
use App\Http\Model\Slider;

class SliderController extends CommonController
{
    //轮播图
    public function index(){
        $slider = (new Slider())->sel();
        //加载页面
        return view('admin.slider.index',compact('slider'));
    }

    //轮播图添加
    public function create(){
        //加载页面
        return view('admin.slider.add');
    }

    //轮播图添加提交
    public function store(){
        $re = (new Slider())->add();
        if ($re){
            return redirect('admin/slider');
        }else{
            return back()->with('errors','轮播图加失败！');
        }
    }

    //轮播图编辑
    public function edit($id){
       $slider = (new Slider())->edit($id);
        //加载页面
        return view('admin.slider.edit',compact('slider'));
    }

    //轮播图更新
    public function update($id){
        $re = (new Slider())->upd($id);
        if ($re){
           return redirect('admin/slider');
        }else{
            return back()->with('errors','轮播图修改失败！');
        }
    }

    //轮播图删除
    public function destroy($id){
        $re = (new Slider())->del($id);
        if ($re){
            $data =[
                'status'=>1,
                'msg'=>'轮播图删除成功！'
            ];
        }else{
            $data = [
                'status'=>0,
                'msg'=>'轮播图删除失败！'
            ];
        }
        return $data;
    }


    //轮播图排序
    public function changeOrder(){
        $re = (new Slider())->change();
        if ($re){
            $data = [
                'status'=>1,
                'msg'=>'轮播图排序修改成功!'
            ];
        }else{
            $data = [
                'status'=>0,
                'msg'=>'轮播图排序修改失败!'
            ];
        }
        return $data;
    }
}