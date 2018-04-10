<?php
/**
 * Created by PhpStorm.
 * User: PC
 * Date: 2018/4/9
 * Time: 19:15
 */

namespace App\Http\Controllers\Home;

//购物车控制器
use App\Http\Model\Cart;
use Illuminate\Http\Request;

class CartController extends CommonController
{
    //购物车
    public function index(){

        //加载页面
        return view('home.cart');
    }

    //加入购物车
    public function addCart(Request $request){

        $input = $request->except('_token');
        $goodsCart = Cart::create($input);
        if ($goodsCart){
            $data = [
                'status'=>1,
                'msg'=>'加入购物车成功！'
            ];
        }else{
            $data = [
                'status'=>0,
                'msg'=>'加入购物车失败！'
            ];
        }
        return $data;
    }

}