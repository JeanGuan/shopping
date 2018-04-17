<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>订单提交 - {{config('web.web_name')}}</title>
    <link href="/skin/cart/css/public.css" type="text/css" rel="stylesheet"/>
    <link rel="stylesheet" type="text/css" href="/skin/cart/css/base.css"/>
    <script type="text/javascript" src="/skin/cart/js/jquery_cart.js"></script>
    <link rel="stylesheet" type="text/css" href="/skin/cart/css/buyConfirm.css" />
    <script src="/skin/cart/js/jquery-1.11.1.min.js" type="text/javascript"></script>

</head>

<body>
<!--顶部快捷菜单-->
@include('home.cart.public.head')
<!--顶部快捷菜单-->

<!--订单提交body部分开始-->

<div class="border_top_cart">
    <div class="container payment-con">
        <form  target="_blank" action="#" id="pay-form" method="post">
            <div class="order-info">
                <div class="msg">
                    <h3>您的订单已提交成功！付款咯～</h3>
                    <p></p>
                    <p class="post-date">成功付款后，7天发货</p>
                </div>
                <div class="info">
                    <p> 金额：<span class="pay-total">49.00元</span> </p>
                    <p> 订单：1150505740045173 </p>
                    <p> 配送：潘骏杰 <span class="line">/</span> 159****6437 <span class="line">/</span> 江苏,无锡市,北塘区 民丰西苑82号202室 <span class="line">/</span> 不限送货时间 <span class="line">/</span> 个人电子发票 </p>
                </div>
                <div class="icon-box"> <i class="iconfont"><img src="/skin/cart/images/yes_ok.png"></i> </div>
            </div>
            <div class="xm-plain-box">
                <!-- 选择支付方式 -->
                <div class="box-hd bank-title clearfix">
                    <div id="titleWrap" class="title-wrap">
                        <h2 class="title">选择支付方式</h2>
                        <h2 class="title hide " >你还需要继续支付 <em>49.00</em> 元</h2>
                        <span class="tip-tag"></span> </div>
                </div>
                <div class="box-bd" id="bankList">
                    <div class="payment-bd">
                        <form name="ck">
                            <dl class="clearfix payment-box" >
                                <dt> <strong>支付平台</strong>
                                    <p>手机等大额支付推荐使用支付宝快捷支付</p>
                                </dt>
                                <dd>
                                    <fieldset id="test4-input-input_tab1-input_tab2" style=" border:none;">
                                        <ul class="payment-list clearfix" >
                                            <li>
                                                <input class="input_tab1" name="myradio" id="r1" type="radio" checked="checked"/>
                                                <label for="r1" ><img src="/skin/cart/images/wx.png" alt=""/></label>
                                                </label>
                                            </li>
                                            <li>
                                                <input class="input_tab2" name="myradio" id="r2" type="radio" />
                                                <label for="r2" ><img src="/skin/cart/images/zfb.png" alt=""/></label>
                                            </li>
                                        </ul>

                                    </fieldset>
                                </dd>
                            </dl>
                        </form>

                    </div>
                </div>
                <div class="box-ft clearfix">
                    <a href="" class="btn btn-lineDakeLight">去支付</a> <span class="tip"></span> </div>
            </div>
        </form>
    </div>
    <!-- 支付弹框 -->
    <div class="modal hide to-pay-tip" id="toPayTip">
        <div class="modal-header"> <span class="close" id="toPayTipClose"> <i class="iconfont">&#xe617;</i> </span>
            <h3>正在支付...</h3>
        </div>
        <div class="modal-body">
            <div class="pay-tip clearfix">
                <div class="fail">
                    <h4>如果支付失败...</h4>
                    <p>额度问题，推荐<a href="#" id="alipayTrigger">支付宝快捷支付 &gt;</a></p>
                    <p>其他问题，查看<a href="#">支付常见问题 &gt;</a></p>
                </div>
                <div class="success">
                    <h4>支付成功了</h4>
                    <p>立即查看<a href="#" target="_blank">订单详情 &gt;</a></p>
                </div>
            </div>
        </div>
    </div>
    <!-- 余额支付弹框 -->
    <div class="modal hide  balance-pay" id="balancePay">
        <div class="modal-body">
            <h3>账户余额支付：<span class="num"><em id="useCashAccountPayLeft">0.00</em>元</span></h3>
            <p id="checkCodeTip">短信验证码已下发至您的手机<span class="num"></span></p>
            <input type="text" name="verifycode" id="verifycode" class="input" placeholder="请输入验证码">
            <span class="send-again" id="sendAgain">重新发送<em></em></span>
            <p>
                <input type="button" value="确认支付" class="btn btn-primary" id="toPay">
                <div class="select-other">
            <p><span id="bankName"></span> <span class="num">49.00元</span></p>
        </div>
        <a href="javascript:;" id="chooseOther">选择其他方式支付&gt;</a> </div>
</div>
</div>

<!--订单提交body部分结束-->

<!-- 底部 -->
@include('home.cart.public.foot')
<!-- 底部 -->

</body>
</html>