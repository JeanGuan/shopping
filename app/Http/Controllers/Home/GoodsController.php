<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/3/4 0004
 * Time: 14:34
 */

namespace App\Http\Controllers\Home;

//商品详情控制器
use App\Http\Model\Goods;
use Illuminate\Http\Request;

class GoodsController extends CommonController
{
    //商品详情页
    public function index(Request $request){
        //获取商品id
        $id = $request->id;

        //左侧商品分类
        $types = $this->Tree();

        //商品详细信息
        $good = Goods::where('id',18)->first();
        $attr = unserialize($good['attr']);
        $goodattr = unserialize($good['goodsattr']);
        $pic = unserialize($good['picarr']);               //图片路径

        //加载页面
        return view('home.goods',compact('types','good','pic','goodattr','attr'));
    }


}