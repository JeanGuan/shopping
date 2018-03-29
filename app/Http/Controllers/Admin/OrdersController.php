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

class OrdersController extends  CommonController
{
    //订单列表
    public function index(){
        $orders = (new Orders())->sel();
        dd($orders);
    }

}