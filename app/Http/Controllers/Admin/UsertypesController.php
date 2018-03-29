<?php
/**
 * Created by PhpStorm.
 * User: PC
 * Date: 2018/3/22
 * Time: 23:04
 */

namespace App\Http\Controllers\Admin;

//会员类型控制器
use App\Http\Model\Usertypes;

class UsertypesController extends CommonController
{
    //会员列表
    public function index(){
        $usertypes = (new Usertypes())->sel();
        return view('admin.usertypes.index',compact('usertypes'));
    }

    //会员添加
    public function create(){
        return view('admin.usertypes.add');
    }

    //会员添加提交
    public function store(){
        $re = (new Usertypes())->add();
        if ($re){
            return redirect('admin/usertypes');
        }else{
            $data = [
                'status'=>0,
                'msg'=>'会员类型添加失败！'
            ];
        }

        return $data;
    }

    //会员编辑
    public function edit($id){
        $usertypes = (new Usertypes())->edit($id);
        return view('admin.usertypes.edit',compact('usertypes'));
    }

    //会员更新
    public function update($id){
        $re = (new Usertypes())->upd($id);
        if ($re){
            return redirect('admin/usertypes');
        }else{
            $data = [
                'status'=>0,
                'msg'=>'会员类型更新失败！'
            ];
        }
        return $data;
    }

    //会员删除
    public function destroy($id){
        $re = (new Usertypes())->del($id);
        if ($re){
            $data = [
                'status'=>1,
                'msg'=>'会员类型删除成功！'
            ];
        }else{
            $data = [
                'status'=>0,
                'msg'=>'会员类型删除失败！'
            ];
        }
        return $data;
    }


}