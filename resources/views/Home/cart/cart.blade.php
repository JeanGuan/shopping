<!doctype html>
<html>
<head>
    <title>商品购物车 - {{config('web.web_name')}}</title>
    <meta name="keywords" content="{{config('web.keywords')}}" />
    <meta name="description" content="{{config('web.description')}}" />
    <meta charset="utf-8">
    <meta name="format-detection" content="telephone=no">

    <link type="text/css" rel="stylesheet" href="/skin/cart/css/public.css" />
    <link rel="stylesheet" type="text/css" href="/skin/cart/css/base.css"/>
    <link rel="stylesheet" type="text/css" href="/skin/cart/css/checkOut.css" />

    <link rel="stylesheet" href="/skin/cart/css/reset.css">
    <link rel="stylesheet" href="/skin/cart/css/carts.css">

</head>

<body>

<!--顶部快捷菜单-->
@include('home.cart.public.head')
<!--顶部快捷菜单-->

<!-- 购物车  cart -->
<div class="border_top_cart">
    <form id="carForm">
        <input type="hidden" name="_token" id="_token" value="{{csrf_token()}}">
    <section class="cartMain">
        <div class="cartMain_hd">
            <ul class="order_lists cartTop">
                <li class="list_chk">
                    <!--所有商品全选-->
                    <input type="checkbox" id="all" class="whole_check">
                    <label for="all"></label>
                    全选
                </li>
                <li class="list_con">商品信息</li>
                <li class="list_info">商品参数</li>
                <li class="list_price">单价</li>
                <li class="list_amount">数量</li>
                <li class="list_sum">金额</li>
                <li class="list_op">操作</li>
            </ul>
        </div>

        <div class="cartBox">
            <div class="order_content">
                @foreach($goodCart as $key=>$v)
                    <ul class="order_lists">
                        <li class="list_chk">
                            <input type="checkbox" id="checkbox_{{$key}}" name="goodbox" class="son_check"  value="{{$v->id}}" >
                            <label for="checkbox_{{$key}}"></label>
                        </li>
                        <li class="list_con">
                            <div class="list_img"><a href="javascript:;"><img src="{{$v->img}}" alt="{{$v->title}}"></a></div>
                            <div class="list_text"><a target="_blank" href="{{url('/goods/'.$v->gid)}}">{{$v->title}}</a></div>
                        </li>
                        <li class="list_info">
                            {{$v->attr}}
                        </li>
                        <li class="list_price">
                            <p class="price">￥{{$v->price}}</p>
                        </li>

                        <input type="hidden" id="catId_{{$key}}" class="cartId" value="{{$v->id}}" />
                        <input type="hidden" id="price_{{$key}}" value="{{$v->price}}" />
                        <input type="hidden" id="num_{{$key}}" value="{{$v->num}}" />
                        <li class="list_amount">
                            <div class="amount_box">
                                <a href="javascript:;" onclick="stockNum('{{$key}}','{{$v->id}}','{{$v->gid}}','{{csrf_token()}}',2);" @if($v->num ==1 ) class="reduce reSty" @else class="reduce" @endif>-</a>
                                <input type="text"   value="{{$v->num}}"  class="met" id="sum_{{$key}}" onblur="checkNum('{{$key}}','{{$v->id}}','{{$v->gid}}','{{csrf_token()}}',this.value,3)">
                                <a href="javascript:;"   onclick="stockNum('{{$key}}','{{$v->id}}','{{$v->gid}}','{{csrf_token()}}',1);" class="plus">+</a>
                            </div>
                        </li>
                        <li class="list_sum">
                            <p class="sum_price" id="smalprice_{{$key}}">￥{{sprintf("%.2f",$v->num * $v->price)}}</p>
                        </li>
                        <li class="list_op">
                            <p class="del"><a href="javascript:;"  class="delBtn">移除商品</a></p>
                        </li>
                    </ul>
                @endforeach
            </div>
        </div>

        <!--结算-->
        <div class="bar-wrapper">
            <div class="bar-right">
                <div class="piece">已选商品<strong class="piece_num">0</strong>件</div>
                <div class="totalMoney">共计: <strong class="total_text">￥0.00</strong></div>
                <input type="hidden"  id="goodgid" name="goodgid">
                <div class="calBtn" ><a href="javascript:;" onclick="SubCart();">结算</a></div>
            </div>
        </div>
    </section>
    </form>
</div>
<section class="model_bg"></section>
<section class="my_model">
    <p class="title">删除宝贝<span class="closeModel">X</span></p>
    <p>您确认要移除该商品吗？</p>
    <div class="opBtn"><a href="javascript:;" class="dialog-sure">确定</a><a href="javascript:;" class="dialog-close">关闭</a></div>
</section>
<!-- end 购物车 -->

<!-- footer -->
@include('home.cart.public.foot')
<!-- end footer -->

<script src="/skin/cart/js/jquery.min.js"></script>
<script src="/skin/cart/js/carts.js"></script>
</body>
</html>