<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/3/7 0007
 * Time: 19:54
 */

namespace App\Http\Controllers\Home;


use App\Http\Model\Addr;
use App\Http\Model\Cart;
use App\Http\Model\City;
use App\Http\Model\Comment;
use App\Http\Model\County;
use App\Http\Model\Goods;
use App\Http\Model\Province;
use App\Http\Model\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class AjaxController extends CommonController
{

    /**
     * 检测该手机号是否存在
     */
    public function CheckPhone(){

        $phone = Input::get('phone');
        $re = User::where('phone',$phone)->first();
        if($re['id']){
            $data = [
                'status'=>0,
                'msg'=>'手机号已注册!'
            ];
        }else {
            $data = [
                'status' =>1,
                'msg' => ''
            ];
        }
        return $data;
    }


    /**
     * 检测验证码是否正确
     */
    public function Checkcode(){

        $code = Input::get('code');
        $_code = new \Code();
        $_code = $_code->get();

        if (strtoupper($code)!= $_code){
            $data = [
                'status'=>0,
                'msg'=>'验证码错误!'
            ];
        }else {
            $data = [
                'status' =>1,
                'msg' => '验证码正确!'
            ];
        }
        return $data;
    }

    //ajax获取商品评论
    public function ajaxComment(Request $request){
        $goods_id = $request->goods_id;
        $commentType = $request->commentType;       // 1 全部 2好评 3 中评 4差评 5有图
        $p = $request->p;

        $where = ['comment.status'=>1,'comment.gid'=>$goods_id];
        if($commentType==5){
            $where['comment.picarr'] = ['<>',''];
        }else{
            $typeArr = ['1'=>'1,2,3,4,5','2'=>'4,5','3'=>'3','4'=>'1,2'];
            $where['comment.start'] = ['in',$typeArr[$commentType]];
        }

        $count = Comment::where($where)->count();

        /*//获取所有评论与用户信息
        $comment = Comment::select('comment.*','user.username','user.portrait')
            ->join('user','comment.uid','=','user.id')
            ->where('gid',$id)->get();*/
    }


    //ajax 判断商品库存Stock与更新
    public function ajaxStock(Request $request){
        $input = $request->except('_token');

        //商品库存
        $stock = Goods::where('id',$input['gid'])->select('num')->first();
        $stock = $stock['num'];

        //购物车商品数量
        $num = Cart::where('id',$input['id'])->select('num','price')->first();

        $cartNum = $num['num'];
        $price = $num['price'];

            if($input['met'] != null ){
                //判断数量加减 1加 2减 3输入  cartNum购物车数量  subTotal商品小计
                if ($input['met'] == 1){
                    $cartNum = $cartNum + 1;

                    if ($cartNum <= $stock){
                        $subTotal = ($price * $cartNum);
                    }else{
                        $data = [
                            'status'=>0,
                            'num'=>$num['num'],
                            'msg'=>'商品超限！'
                        ];
                        return $data;
                    }

                }elseif($input['met'] == 2){
                    $cartNum = $cartNum - 1;

                    if ($cartNum > 0){
                        $subTotal = ($price * $cartNum);
                    }else{
                        $data = [
                            'status'=>0,
                            'num'=>$num['num'],
                            'msg'=>'商品数量至少为1！'
                        ];
                        return $data;
                    }

                }elseif($input['met'] == 3){
                    $cartNum = $input['num'];

                    if ($cartNum <= $stock){
                        $subTotal = ($price * $cartNum);
                    }else{
                        $data = [
                            'status'=>0,
                            'num'=>$num['num'],
                            'msg'=>'商品超限！'
                        ];
                        return $data;
                    }

                }

                $ary_input = ['num'=>$cartNum,'subTotal'=>$subTotal];

                $re = Cart::where('id',$input['id'])->update($ary_input);
                if ($re){
                    $data = [
                        'status'=>1,
                        'num'=>$cartNum,
                        'subTotal'=>$subTotal,
                    ];
                }else{
                    $data = [
                        'status'=>0,
                        'num'=>$cartNum,
                        'subTotal'=>$subTotal,
                    ];
                }
            }

        return $data;
    }


    //ajax地区联动
    public function addrLinkage(Request $request){
        if ($request->isMethod('post')) {
            $pcode = $request->pcode;       //父编码
            $level = $request->level;       //等级

            if($level==1){
                $data['list'] = City::where('pcode',$pcode)->orderBy('id','asc')->get();
            }else{
                $data['list'] = County::where('pcode',$pcode)->orderBy('id','asc')->get();
            }
            $data['code']=1;
        }
        else{
            $data['code']=0;
        }
        exit(json_encode($data));
    }

    //订单ajax添加收货地址
    public function ajaxArea(Request $request){
        if ($request->isMethod('post')){
            $input = $request->except('_token');
            $count = Addr::where('uid',$input['uid'])->count();

            $area = (new Addr())->addrCode_cn($input['province'],$input['city'],$input['county']);

            $input['prov_cn'] = $area['province'];
            $input['city_cn'] = $area['city'];
            $input['coun_cn'] = $area['county'];

            if ($count < 3){
                $newAddr = Addr::create($input);
                if ($newAddr){
                    $data = [
                        'status'=>1,
                        'msg'=>'新地址添加成功！'
                    ];
                }else{
                    $data = [
                        'status'=>0,
                        'msg'=>'新地址添加失败！'
                    ];
                }
                return $data;
            }else{
                $data = [
                    'status'=>0,
                    'msg'=>'最多添加3个地址！'
                ];
                return $data;
            }

        }
    }



}