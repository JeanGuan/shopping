<!doctype html>
<html>
<head>
    <title><?php echo e(config('web.index_title')); ?>_<?php echo e(config('web.web_name')); ?></title>
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
<div class="shortcut_v2013 alink_v2013">
    <div class="w">
        <ul class="fl 1h">
            <li class="fl"><div class="menu_hd">您好，欢迎来到完美生活！</div></li>
        </ul>

        <ul class="fr 1h">
            <?php if(session('Homeuserinfo.id')): ?>
            <li class="fl"><div class="menu_hd"><a href="<?php echo e(url('/')); ?>">返回首页</a></div></li>
            <li class="fl"><i class="shortcut_s"></i></li>
            <li class="fl"><div class="menu_hd"><a href="<?php echo e(url('/person')); ?>"><?php echo e(session('Homeuserinfo.username')); ?></a></div></li>
            <li class="fl"><i class="shortcut_s"></i></li>
            <li class="fl"><div class="menu_hd"><a href="#">我的订单</a></div></li>
            <li class="fl"><i class="shortcut_s"></i></li>
            <li class="fl"><div class="menu_hd"><a href="<?php echo e(url('/logout')); ?>">退出</a></div></li>
            <li class="fl"><i class="shortcut_s"></i></li>
            <?php else: ?>
            <li class="fl"><div class="menu_hd"><a href="<?php echo e(url('/login')); ?>">请登录</a></div></li>
            <li class="fl"><i class="shortcut_s"></i></li>
            <li class="fl"><div class="menu_hd"><a href="<?php echo e(url('register')); ?>">免费注册</a></div></li>
            <?php endif; ?>
        </ul>

        <span class="clr"></span>

    </div>
</div>
<!--顶部快捷菜单-->


<!-- 购物车  cart -->
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
            <ul class="order_lists">
                <li class="list_chk">
                    <input type="checkbox" id="checkbox_2" class="son_check">
                    <label for="checkbox_2"></label>
                </li>
                <li class="list_con">
                    <div class="list_img"><a href="javascript:;"><img src="/skin/cart/picture/1.png" alt=""></a></div>
                    <div class="list_text"><a href="javascript:;">夏季男士迷彩无袖T恤圆领潮流韩版修身男装背心青年时尚打底衫男</a></div>
                </li>
                <li class="list_info">
                    <p>规格：默认</p>
                    <p>尺寸：16*16*3(cm)</p>
                </li>
                <li class="list_price">
                    <p class="price">￥980</p>
                </li>
                <li class="list_amount">
                    <div class="amount_box">
                        <a href="javascript:;" class="reduce reSty">-</a>
                        <input type="text" value="1" class="sum">
                        <a href="javascript:;" class="plus">+</a>
                    </div>
                </li>
                <li class="list_sum">
                    <p class="sum_price">￥980</p>
                </li>
                <li class="list_op">
                    <p class="del"><a href="javascript:;" class="delBtn">移除商品</a></p>
                </li>
            </ul>
            <ul class="order_lists">
                <li class="list_chk">
                    <input type="checkbox" id="checkbox_3" class="son_check">
                    <label for="checkbox_3"></label>
                </li>
                <li class="list_con">
                    <div class="list_img"><a href="javascript:;"><img src="/skin/cart/picture/2.png" alt=""></a></div>
                    <div class="list_text"><a href="javascript:;">夏季男士迷彩无袖T恤圆领潮流韩版修身男装背心青年时尚打底衫男</a></div>
                </li>
                <li class="list_info">
                    <p>规格：默认</p>
                    <p>尺寸：16*16*3(cm)</p>
                </li>
                <li class="list_price">
                    <p class="price">￥780</p>
                </li>
                <li class="list_amount">
                    <div class="amount_box">
                        <a href="javascript:;" class="reduce reSty">-</a>
                        <input type="text" value="1" class="sum">
                        <a href="javascript:;" class="plus">+</a>
                    </div>
                </li>
                <li class="list_sum">
                    <p class="sum_price">￥780</p>
                </li>
                <li class="list_op">
                    <p class="del"><a href="javascript:;" class="delBtn">移除商品</a></p>
                </li>
            </ul>
            <ul class="order_lists">
                <li class="list_chk">
                    <input type="checkbox" id="checkbox_6" class="son_check">
                    <label for="checkbox_6"></label>
                </li>
                <li class="list_con">
                    <div class="list_img"><a href="javascript:;"><img src="/skin/cart/picture/3.png" alt=""></a></div>
                    <div class="list_text"><a href="javascript:;">夏季男士迷彩无袖T恤圆领潮流韩版修身男装背心青年时尚打底衫男</a></div>
                </li>
                <li class="list_info">
                    <p>规格：默认</p>
                    <p>尺寸：16*16*3(cm)</p>
                </li>
                <li class="list_price">
                    <p class="price">￥180</p>
                </li>
                <li class="list_amount">
                    <div class="amount_box">
                        <a href="javascript:;" class="reduce reSty">-</a>
                        <input type="text" value="1" class="sum">
                        <a href="javascript:;" class="plus">+</a>
                    </div>
                </li>
                <li class="list_sum">
                    <p class="sum_price">￥180</p>
                </li>
                <li class="list_op">
                    <p class="del"><a href="javascript:;" class="delBtn">移除商品</a></p>
                </li>
            </ul>
        </div>
    </div>

    <!--结算-->
    <div class="bar-wrapper">
        <div class="bar-right">
            <div class="piece">已选商品<strong class="piece_num">0</strong>件</div>
            <div class="totalMoney">共计: <strong class="total_text">0.00</strong></div>
            <div class="calBtn"><a href="javascript:;">结算</a></div>
        </div>
    </div>
</section>
<section class="model_bg"></section>
<section class="my_model">
    <p class="title">删除宝贝<span class="closeModel">X</span></p>
    <p>您确认要删除该宝贝吗？</p>
    <div class="opBtn"><a href="javascript:;" class="dialog-sure">确定</a><a href="javascript:;" class="dialog-close">关闭</a></div>
</section>
<!-- end 购物车 -->

<!-- footer -->
<div class="promise_box">
    <div class="w">
        <ul>
            <li><img src="/skin/cart/images/promise_img01.jpg"><span>365天不打烊</span></li>
            <li><img src="/skin/cart/images/promise_img02.jpg"><span>无理由退换货</span></li>
            <li><img src="/skin/cart/images/promise_img03.jpg"><span>担保交易</span></li>
            <li><img src="/skin/cart/images/promise_img04.jpg"><span>先行赔付</span></li>
            <li><img src="/skin/cart/images/promise_img05.jpg"><span>支持定制</span></li>
        </ul>
    </div>
</div>
<div class="bottom-links">
    <ul class="clearfix cols">
        <li class="col">
            <div class="bottom-links-title">关于我们</div>
            <ul class="clearfix bottom-links-items">
                <li><a href="#">招聘英才</a></li>
                <li><a href="#">公司简介</a></li>
                <li><a href="#">合作洽谈</a></li>
                <li><a href="#">联系我们</a></li>
            </ul>
        </li>
        <li class="col">
            <div class="bottom-links-title">客服中心</div>
            <ul class="clearfix bottom-links-items">
                <li><a href="#">收货地址</a></li>
                <li><a href="#">个人资料</a></li>
                <li><a href="#">修改密码</a></li>
            </ul>
        </li>
        <li class="col">
            <div class="bottom-links-title">售后服务</div>
            <ul class="clearfix bottom-links-items">
                <li><a href="#">退换货政策</a></li>
                <li><a href="#">退款说明</a></li>
                <li><a href="#">联系卖家</a></li>
            </ul>
        </li>
        <li class="col">
            <div class="bottom-links-title">帮助中心</div>
            <ul class="clearfix bottom-links-items">
                <li><a href="#">FAQ</a></li>
                <li><a href="#">积分兑换</a></li>
                <li><a href="#">积分细则</a></li>
                <li><a href="#">已购商品</a></li>
            </ul>
        </li>
        <li class="col">
            <div class="bottom-links-title">锡好网公众号</div>
            <ul class="clearfix bottom-links-items">
                <li>
                    <img src="/skin/cart/images/weixin_big.jpg" />
                </li>
            </ul>
        </li>
        <li class="col">
            <div class="bottom-links-title">关注我们</div>
            <ul class="clearfix bottom-links-items">
                <li><img src="/skin/cart/images/icon_sina.png" /><a href="#">新浪微博</a></li>
                <li><img src="/skin/cart/images/icon_tencent.png" /><a href="#">腾讯微博</a></li>
                <li><img src="/skin/cart/images/icon_dou.png" /><a href="#">豆瓣小站</a></li>
                <li><img src="/skin/cart/images/icon_weixin.png" /><a href="#">官方微信</a></li>
            </ul>
        </li>

    </ul>
</div>
<div class="footer_v2013 bottom-about">
    <div class="w">
        <p class="foot_p1">
            <a href="#">首页</a>|<a href="#">招聘英才</a>|<a href="#">广告合作</a>|<a href="#">联系我们</a>|<a href="#">关于我们</a>
        </p>
        <pre>
    经营许可证：苏B2-20130223备案许可证：苏ICP备13041162号-1360网站安全检测平台
    ©2013-2014 无锡太湖云电商网络科技发展有限公司   版权所有  更多模板：<a href="http://www.mycodes.net/" target="_blank">源码之家</a>
                </pre>
    </div>
</div>

<!-- end footer -->

<script src="/skin/cart/js/jquery.min.js"></script>
<script src="/skin/cart/js/carts.js"></script>
</body>
</html>