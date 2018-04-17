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
use App\Http\Model\Goods;
use Illuminate\Http\Request;

class CartController extends CommonController
{
    //购物车
    public function index(){
        $uid = session('Homeuserinfo.id');
        $goodCart = Cart::where('uid',$uid)->get();
        //加载页面
        return view('home.cart.cart',compact('goodCart'));

    }

    //加入购物车
    public function addCart(Request $request){
        //判断用户是否登录
        if(session('Homeuserinfo.id')){

            //获取商品数据
            $input = $request->except('_token');
            $input['uid'] = session('Homeuserinfo.id');

            //商品规格数据处理
            $attr =explode(",", $input['attr']);

            //获取商品规格title
            $attrs = Goods::where('id',$input['gid'])->select('attr')->first();
            $attrs = unserialize($attrs['attr']);

            //商品规格与属性拼接
            $good_arr =  array();
            $str = '';
            foreach($attrs as $k => $v){
                $good_arr [$k]['title']= $attrs[$k]['title'];
                $good_arr [$k]['attr'] = $attr[$k];
                $str .= $good_arr [$k]['title'].':'.$good_arr [$k]['attr']."&nbsp;&nbsp;&nbsp;";
            }
            $input['attr'] = $str;

            //判断相同属性商品
            $good = Cart::where(['attr'=>$str,'gid'=>$input['gid'],'uid'=>$input['uid']])->first();
             if ($good){
                 $input['num'] = $good['num'] + $input['num'];
                 $goodsCart = Cart::where(['attr'=>$str,'gid'=>$input['gid'],'uid'=>$input['uid']])->update($input);
             }else{
                 $goodsCart = Cart::create($input);
            }

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
        }else{
            $data = [
                'status'=>0,
                'msg'=>'请登录后添加商品！'
            ];
            return $data;
        }
    }

    //移除购物车商品
    public function delCart(Request $request){
        $cartId = $request->cartId;
        $delCart = Cart::where('id',$cartId)->delete();
        if ($delCart){
            $data = [
                'status'=>1,
                'msg'=>'移除购物车成功！'
            ];
        }else{
            $data = [
                'status'=>0,
                'msg'=>'移除购物车失败！'
            ];
        }
        return $data;
    }

}