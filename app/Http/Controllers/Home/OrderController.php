<?php
/**
 * Created by PhpStorm.
 * User: PC
 * Date: 2018/4/10
 * Time: 20:28
 */

namespace App\Http\Controllers\Home;

//订单控制器
use App\Http\Model\Addr;
use App\Http\Model\Cart;
use App\Http\Model\Orders;
use App\Http\Model\Province;
use Illuminate\Http\Request;

class OrderController extends CommonController
{
    public function __construct(){
        if (!session('Homeuserinfo.id')){
            return view('home/login');
        }

    }

    //订单
    public function index(Request $request){
        $car_id = explode(',',$request->id);

        //获取购物车商品
        $total_price_sum = 0;
        foreach ($car_id as $k=>$v) {
            if ($v != ''){
                $cartGoods[]= Cart::where('id', $v)->orderBy('id','desc')->first();
                $subtotal = Cart::where('id',$v)->select('subtotal')->first();
                $total_price_sum +=$subtotal['subtotal'];   //商品总价格
            }

        }

        //获取收货人地址
        $id = session('Homeuserinfo.id');
        $addr = (new Addr())->selAddr($id);

        //三级联动省级
        $province = Province::orderBY('id','asc')->get();



        $addr_default =(new Addr())->addr_default();

        if ($cartGoods){
            //加载页面
            return view('home.cart.order',compact('cartGoods','addr','province','total_price_sum','addr_default'));
        }else{
            return back()->with('status','0');
        }


    }

    //订单提交
    public function addOrder(Request $request){

        $aid = $request->aid;
        $input['total_price'] = $request->total_price;
        $input['uid'] = $request->uid;
        $car_id =$request->car_id;

        //获取结算商品信息
        foreach ($car_id as $v){
            $good[]=Cart::where('id',$v)->first()->toArray();
        }


        //获取收货地址
        $area = Addr::where('id',$aid)->first();

        $input['goodattr'] = serialize($good);
        $input['name_cn'] = $area['sname'];
        $input['phone_cn'] = $area['sphone'];
        $input['prov_cn'] = $area['prov_cn'];
        $input['city_cn'] = $area['city_cn'];
        $input['coun_cn'] = $area['coun_cn'];
        $input['addrinfo'] = $area['addrinfo'];


        $input['code'] = $this->build_order_no();

        $input['time'] = time();
        unset($input['aid']);


        $order = Orders::create($input);

        if ($order){
            $data = [
                'status'=>1,
                'msg'=>'订单提交成功！'
            ];

            $this->delCartGood($car_id);

        }else{
            $data =[
                'status'=>0,
                'msg'=>'订单提交失败！'
            ];
        }
        return $data;
    }

    //订单code
    function build_order_no()
    {
        return date('Ymd').substr(implode(NULL, array_map('ord', str_split(substr(uniqid(), 7, 13), 1))), 0, 8);
    }

    //删除Cart结算商品
    public function delCartGood($cart_id){
        foreach ($cart_id as $v){
            Cart::where('id',$v)->delete();
        }
    }

}