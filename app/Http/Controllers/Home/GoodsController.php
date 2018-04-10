<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/3/4 0004
 * Time: 14:34
 */

namespace App\Http\Controllers\Home;

//商品详情控制器
use App\Http\Model\Comment;
use App\Http\Model\Goods;
use App\Http\Model\User;
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
        $good = Goods::where('id',$id)->first();
        $attr = unserialize($good['attr']);
        $goodattr = unserialize($good['goodsattr']);
        $goodattr  = json_encode($goodattr);
        $pic = unserialize($good['picarr']);               //图片路径

        //商品评论
        $commentTot = Comment::where('gid',$id)->count();   //评论数
        $goodTot = Comment::where('start','>=',4)->where('gid',$id)->count();      //好评数
        $chaTot = Comment::where('start','<=',2)->where('gid',$id)->count();      //差评数
        $zhongTot = $commentTot - $goodTot - $chaTot;    //中评数

        //加载页面
        return view('home.goods',compact('types','good','pic','goodattr','attr','commentTot','chaTot','goodTot','zhongTot'));
    }


}