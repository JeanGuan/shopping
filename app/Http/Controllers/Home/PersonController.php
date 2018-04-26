<?php
/**
 * Created by PhpStorm.
 * User: PC
 * Date: 2018/4/9
 * Time: 18:45
 */

namespace App\Http\Controllers\Home;

//个人中心控制器
use App\Http\Model\Addr;
use App\Http\Model\Collect;
use App\Http\Model\Orders;
use App\Http\Model\Province;
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
       // $goods = json_encode($goods);
        return $goods;

    }

    //删除订单
    public function delOrder(Request $request){
        $id = $request->id;

        $re = Orders::where('id',$id)->delete();
        if ($re){
            $data = [
                'satus'=>1,
                'msg'=>"订单删除成功！"
            ];
        }else{
            $data = [
                'satus'=>0,
                'msg'=>"订单删除失败！"
            ];
        }
        return $data;

    }

    //取消订单
    public function cancelOrder(Request $request){
        $id = $request->id;
        $status_id = $request->status_id;

        //判断订单状态 是否需要退款 2已付款 3待发货
        if ($status_id== 2 || $status_id == 3){

        }

        //更新订单状态 4已取消
        $input = ['sid'=>4];
        $re = Orders::where('id',$id)->update($input);
        if ($re){
            $data = [
                'satus'=>1,
                'msg'=>"订单取消成功！"
            ];
        }else{
            $data = [
                'satus'=>0,
                'msg'=>"订单取消失败！"
            ];
        }
        return $data;
    }

    //收货地址
    public function addrList(){
        $uid = session('Homeuserinfo.id');
        $addrList = Addr::where('uid',$uid)->orderBy('id','asc')->get();

        //三级联动省级
        $province = Province::orderBY('id','asc')->get();

        return view('home.person.addrinfo',compact('addrList','province'));
    }

    //添加收货地址
    public function createAddr(Request $request){
        $input = $request->except('_token');
        $input['uid'] =session('Homeuserinfo.id');

        //获取地址编码中文
        $area = (new Addr())->addrCode_cn($input['province'],$input['city'],$input['county']);

        $input['prov_cn'] = $area['province'];
        $input['city_cn'] = $area['city'];
        $input['coun_cn'] = $area['county'];

        $re = Addr::create($input);
        if ($re){
            $data = [
                'status'=>1,
                'msg'=>'地址添加成功！'
            ];
        }else{
            $data = [
                'status'=>0,
                'msg'=>'地址添加失败！'
            ];
        }
        return $data;
    }

    //删除收货地址
    public function delAddr(Request $request){
        $id = $request->id;

        $re = Addr::where('id',$id)->delete();
        if ($re) {
            $data = [
                'status'=>1,
                'msg'=>'地址删除成功！'
            ];
        }else{
            $data = [
                'status'=>0,
                'msg'=>'地址删除失败！'
            ];
        }
        return $data;
    }


    //商品详情收藏商品
    public function collection(){
        $uid = session('Homeuserinfo');
        $goods = Collect::select('collection.*','goods.picurl','goods.title')
            ->join('goods','collection.gid','=','goods.id')
            ->where('uid',$uid)->get();
        return view('home.person.collection',compact('goods'));
    }

    //个人中心删除收藏
    public function delcollection(Request $request){
        print_r($request->all());die();
    }


}