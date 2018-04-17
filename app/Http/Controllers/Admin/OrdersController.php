<?php
/**
 * Created by PhpStorm.
 * User: PC
 * Date: 2018/3/23
 * Time: 0:28
 */

namespace App\Http\Controllers\Admin;

//订单控制器
use App\Http\Model\Orders;
use App\Http\Model\Orderstatu;
use App\Http\Model\Orderstatus;
use App\Http\Model\Status;
use Illuminate\Http\Request;

class OrdersController extends  CommonController
{
    //订单列表
    public function index(){
        $orders = (new Orders())->sel();
        return view('admin.orders.index',compact('orders'));
    }

    //订单详情
    public function details(Request $request){
        //获取订单号
       $code = $request->code;
       //查询订单详情
       $deatil = (new Orders())->detail($code);

       return view('admin.orders.detail',compact('deatil'));
    }

    //订单状态编辑
    public function statusEdit(Request $request){
        $sid = $request->sid;
        //查询当前订单信息
        $orders =(new Orders())->orderStatusEdit($sid);
        //查询所有订单状态
        $ordersStatus = (new Orderstatus())->sel();
        return view('admin.orders.edit',compact('orders','ordersStatus'));
    }

    //订单状态更新
    public function statusUpdate(Request $request){
        if ($request->isMethod('post')){
           $status = (new Orders())->orderStatusUpdate();
           if ($status){
               return redirect('admin/orders/');
           }else{
               $data = [
                   'status'=>'0',
                   'msg'=>'订单状态修改失败！'
               ];
           }
           return $data;
        }
    }

    //订单状态列表
    public function statusList(){
        $status = (new Orderstatu())->orderStatusList();

        return view('admin.orders.status',compact('status'));
    }


}