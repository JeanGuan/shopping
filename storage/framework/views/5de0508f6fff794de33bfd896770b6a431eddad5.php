<!doctype html>
<html>
<head>
    <title>商品购物车 - <?php echo e(config('web.web_name')); ?></title>
    <meta name="keywords" content="<?php echo e(config('web.keywords')); ?>" />
    <meta name="description" content="<?php echo e(config('web.description')); ?>" />
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
<?php echo $__env->make('home.cart.public.head', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<!--顶部快捷菜单-->

<!-- 购物车  cart -->
<div class="border_top_cart">
    <form id="carForm">
        <input type="hidden" name="_token" id="_token" value="<?php echo e(csrf_token()); ?>">
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
                <?php $__currentLoopData = $goodCart; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <ul class="order_lists">
                        <li class="list_chk">
                            <input type="checkbox" id="checkbox_<?php echo e($key); ?>" name="goodbox" class="son_check"  value="<?php echo e($v->id); ?>" >
                            <label for="checkbox_<?php echo e($key); ?>"></label>
                        </li>
                        <li class="list_con">
                            <div class="list_img"><a href="javascript:;"><img src="<?php echo e($v->img); ?>" alt="<?php echo e($v->title); ?>"></a></div>
                            <div class="list_text"><a target="_blank" href="<?php echo e(url('/goods/'.$v->gid)); ?>"><?php echo e($v->title); ?></a></div>
                        </li>
                        <li class="list_info">
                            <?php echo e($v->attr); ?>

                        </li>
                        <li class="list_price">
                            <p class="price">￥<?php echo e($v->price); ?></p>
                        </li>

                        <input type="hidden" id="catId_<?php echo e($key); ?>" class="cartId" value="<?php echo e($v->id); ?>" />
                        <input type="hidden" id="price_<?php echo e($key); ?>" value="<?php echo e($v->price); ?>" />
                        <input type="hidden" id="num_<?php echo e($key); ?>" value="<?php echo e($v->num); ?>" />
                        <li class="list_amount">
                            <div class="amount_box">
                                <a href="javascript:;" onclick="stockNum('<?php echo e($key); ?>','<?php echo e($v->id); ?>','<?php echo e($v->gid); ?>','<?php echo e(csrf_token()); ?>',2);" <?php if($v->num ==1 ): ?> class="reduce reSty" <?php else: ?> class="reduce" <?php endif; ?>>-</a>
                                <input type="text"   value="<?php echo e($v->num); ?>"  class="met" id="sum_<?php echo e($key); ?>" onblur="checkNum('<?php echo e($key); ?>','<?php echo e($v->id); ?>','<?php echo e($v->gid); ?>','<?php echo e(csrf_token()); ?>',this.value,3)">
                                <a href="javascript:;"   onclick="stockNum('<?php echo e($key); ?>','<?php echo e($v->id); ?>','<?php echo e($v->gid); ?>','<?php echo e(csrf_token()); ?>',1);" class="plus">+</a>
                            </div>
                        </li>
                        <li class="list_sum">
                            <p class="sum_price" id="smalprice_<?php echo e($key); ?>">￥<?php echo e(sprintf("%.2f",$v->num * $v->price)); ?></p>
                        </li>
                        <li class="list_op">
                            <p class="del"><a href="javascript:;"  class="delBtn">移除商品</a></p>
                        </li>
                    </ul>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
<?php echo $__env->make('home.cart.public.foot', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<!-- end footer -->

<script src="/skin/cart/js/jquery.min.js"></script>
<script src="/skin/cart/js/carts.js"></script>
</body>
</html>