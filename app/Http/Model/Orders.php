<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Input;

//订单模型
class Orders extends Model
{

    protected $table = 'orders';
    protected $primaryKey = 'id';
    public    $timestamps = false;
    public    $arr_type=[];

    protected $guarded = [];  //排除敏感字段

    //订单列表
    public function sel(){
        $order = Orders::select('orders.*','user.username','orderstatu.name')
            ->join('user','user.id','=','orders.uid')
            ->join('orderstatu','orderstatu.id','=','orders.sid')
            ->paginate(10);
        return $order;
    }

    //订单详情
    public function detail($code){
        $detail = Orders::select('orders.*','user.username','goods.title','goods.picurl','addr.*','orderstatu.name')
            ->join('user','user.id','=','orders.uid')
            ->join('addr','addr.id','=','orders.aid')
            ->join('goods','goods.id','=','orders.gid')
            ->join('orderstatu','orderstatu.id','=','orders.sid')
            ->where('code',$code)->get();
        return $detail;
    }

    //订单状态编辑
    public function orderStatusEdit($sid){
        $orders = Orders::select('orders.*','orderstatu.name')
            ->join('orderstatu','orderstatu.id','=','orders.sid')
            ->where('orderstatu.id','=',$sid)
            ->first();
        return $orders;
    }

    //订单状态更新
    public function orderStatusUpdate(){
        $input = Input::except('_token');
        $code = $input['code'];
        $re = Orders::where('code',$code)->update($input);
        return $re;
    }

}
