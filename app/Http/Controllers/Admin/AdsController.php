<?php
/**
 * Created by PhpStorm.
 * User: PC
 * Date: 2018/3/22
 * Time: 23:44
 */

namespace App\Http\Controllers\Admin;

//广告模块控制器
use App\Http\Model\Ads;

class AdsController extends CommonController
{
    //广告列表
    public function index(){
        $ads = (new Ads())->sel();
        return view('admin.ads.index',compact('ads'));
    }

    //广告添加
    public function create(){
        return view('admin.ads.add');
    }

    //广告添加提交
    public function store(){
        $re = (new Ads())->add();
        if ($re){
            return redirect('admin/ads');
        }else{
            $data = [
                'status'=>0,
                'msg'=>'会员类型添加失败！'
            ];
        }

        return $data;
    }

    //广告编辑
    public function edit($id){
        $ads = (new Ads())->edit($id);
        return view('admin.ads.edit',compact('ads'));
    }

    //广告更新
    public function update($id){
        $re = (new Ads())->upd($id);
        if ($re){
            return redirect('admin/ads');
        }else{
            $data = [
                'status'=>0,
                'msg'=>'会员类型更新失败！'
            ];
        }
        return $data;
    }

    //广告删除
    public function destroy($id){
        $re = (new Ads())->del($id);
        if ($re){
            $data = [
                'status'=>1,
                'msg'=>'广告删除成功！'
            ];
        }else{
            $data = [
                'status'=>0,
                'msg'=>'广告删除失败！'
            ];
        }
        return $data;
    }

    //轮播图排序
    public function changeOrder(){
        $re = (new Ads())->change();
        if ($re){
            $data = [
                'status'=>1,
                'msg'=>'广告图排序成功!'
            ];
        }else{
            $data = [
                'status'=>0,
                'msg'=>'广告图排序失败!'
            ];
        }
        return $data;
    }


}