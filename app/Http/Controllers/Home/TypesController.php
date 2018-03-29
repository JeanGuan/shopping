<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/3/4 0004
 * Time: 10:04
 */

namespace App\Http\Controllers\Home;

//商品列表控制器
use App\Http\Model\Goods;
use App\Http\Model\Types;
use Illuminate\Http\Request;


class TypesController extends CommonController
{
    //商品列表
    public function index(Request $request){
        //获取分类id
        $id =$request->id;

        //左侧商品分类
        $types = $this->Tree();

        //商品列表分类
        $subclass = $this->Subclass($id);

        //商品列表
        $good_list = $this->good_list($id);


        //加载页面
        return view('home.types',compact('types','good_list','subclass'));
    }

    //商品列表子类
    public function Subclass($id){
        //当前分类
        $types = Types::where('id',$id)->first();
        $two = [];
        $two['id'] = $types['id'];
        $two['typename'] = $types['typename'];

        //当前分类 下级分类
        $two['subclass'] = Types::where('pid',$two['id'])->orderBy('id','asc')->get();
        foreach ($two['subclass']  as &$t) {
            //当前分类下产品数量
            $t['count'] = Goods::where('path','like','%,'.$t['id'].',%')->orderBy('id','asc')->count();
        }
        return $two;
    }

    //商品列表
    public function good_list($id){

        //查询分类id产品
        $goods = Goods::orderBY('id','desc')->where('path','like','%,'.$id.',%')->paginate(16);
        return $goods;
    }



}