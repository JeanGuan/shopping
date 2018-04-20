<?php
/**
 * Created by PhpStorm.
 * User: PC
 * Date: 2018/4/9
 * Time: 18:45
 */

namespace App\Http\Controllers\Home;

//个人中心控制器
use App\Http\Model\Cart;
use App\Http\Model\Orders;
use App\Http\Model\User;
use Illuminate\Http\Request;

class PersonController extends  CommonController
{
    //个人中心
    public function index()
    {

        return view('home.person.index');
    }

    //个人资料管理
    public function info(){

        $user = User::where('id',session('Homeuserinfo.id'))->first();

        return view('home.person.info',compact('user'));
    }

    //个人订单
    public function order(){
        $orders = Orders::select('orders.id','orders.code','orders.total_price','orders.time','orderstatu.name','orderstatu.id as status_id')
            ->join('orderstatu','orderstatu.id','=','orders.sid')
            ->where('orders.uid',session('Homeuserinfo.id'))
            ->get();

        return view('home.person.order',compact('orders'));
    }

    //订单详情
    public function orderDetail(Request $request){
        $order_id = $request->id;

        $goods = Orders::where('id',$order_id)->first()->toArray();
        $goods['goodattr'] = unserialize($goods['goodattr']);
        if ($goods){
            return $goods;
        }
    }


}