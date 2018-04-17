<?php
/**
 * Created by PhpStorm.
 * User: PC
 * Date: 2018/4/15
 * Time: 16:57
 */

namespace App\Http\Controllers\Home;

//订单支付控制器
class PayController extends CommonController
{
    public function index(){

        return view('home.cart.pay');
    }

}