<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/3/3 0003
 * Time: 14:59
 */

namespace App\Http\Controllers\Home;

//前台首页控制器
use App\Http\Model\Article;
use App\Http\Model\Brand;
use App\Http\Model\Goods;
use App\Http\Model\Slider;
use App\Http\Model\Types;

class IndexController extends CommonController
{
    //首页
    public function index()
    {
        //左侧商品分类
        $types = $this->Tree();

        //轮播图
        $banner = $this->banner();

        //楼层分类-产品
        $goods = $this->goods();

        //装修课堂zxkt
        $zxkt = $this->zxkt();

        //通知公告notice
        $notice = $this->notice();

        //加载页面
        return view('home.index',compact('banner','goods','zxkt','notice','types'));

    }


    //前台轮播图查询
    public function banner(){
        $banner = Slider::where('status','0')->orderBY('order_id','asc')->take(3)->get();
        return $banner;
    }


    //楼层分类商品
    public function goods(){

        $types = Types::where('is_lou','1')->select('id','pid','typename')->orderBY('pid','asc')->get();

        if(!empty($types)){
            $k = 1;
            foreach ($types as &$v){
                $two = [];
                $two['key'] = $k;
                $two['id'] = $v['id'];
                $two['title'] = $v['typename'];
                $two['type'] = Types::where('pid',$v['id'])->orderBY('pid','asc')->get();
                $two['goods'] = Goods::where('path','like','%,'.$v['id'].',%')->orderBY('id','asc')->take(6)->get();
                $two['brand'] = Brand::orderBY('id','asc')->where('typeid',$v['id'])->take(6)->get();
                $class_array[] = $two;
                $k++;
            }
            return $class_array;
        }


    }

    //装修课堂zxkt()
    public function zxkt(){
        $zxkt = Article::where('typeid',20)->orderBy('time','desc')->take(3)->get();
        return $zxkt;
    }

    //通知公告
    public function notice(){
        $notice = Article::where('typeid',21)->orderBy('time','desc')->take(3)->get();
        return $notice;
    }



}