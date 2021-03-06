<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>商品订单 - <?php echo e(config('web.web_name')); ?></title>
    <meta name="keywords" content="<?php echo e(config('web.keywords')); ?>" />
    <meta name="description" content="<?php echo e(config('web.description')); ?>" />
    <link href="/skin/cart/css/public.css" type="text/css" rel="stylesheet"/>
    <link rel="stylesheet" type="text/css" href="/skin/cart/css/base.css"/>
    <link rel="stylesheet" type="text/css" href="/skin/cart/css/checkOut.css" />
    <link rel="stylesheet" type="text/css" href="/skin/cart/css/buyConfirm.css" />


</head>
<body>
<!--顶部快捷菜单-->
<?php echo $__env->make('home.cart.public.head', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<!--顶部快捷菜单-->

<!--收货地址body部分开始-->
    <div class="container">
        <div class="checkout-box">

          <div class="checkout-box-ft">
              <!-- 收货地址 -->
              <div class="xm-box">
                        <div class="box-hd ">
                            <h2 class="title">收货地址</h2>

                        </div>
                    <div class="clearfix xm-address-list" id="checkoutAddrList" >
                        <?php $__currentLoopData = $addr; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <dl  onclick="checkaddr(<?php echo e($v->id); ?>)" <?php if($v->state == 1): ?> class="item selected" <?php else: ?> class="item" <?php endif; ?>>
                                <dt> <strong class="itemConsignee"><?php echo e($v->sname); ?></strong>
                                    <?php if($v->tag != null): ?>
                                    <span class="itemTag tag"><?php echo e($v->tag); ?></span>
                                    <?php endif; ?>
                                </dt>
                                <dd>
                                    <p class="tel itemTel"><?php echo e($v->sphone); ?></p>
                                    <p class="itemRegion"><?php echo e($v->prov_cn); ?>-<?php echo e($v->city_cn); ?>-<?php echo e($v->coun_cn); ?></p>
                                    <p class="itemStreet"><?php echo e($v->addrinfo); ?></p>
                            </dl>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        <div class="item2"  id="J_useNewAddr" data-state="off" onclick="javascript:dashangToggle();">
                            <span class="iconfont icon-add"><img src="/skin/cart/images/add_cart.png" /></span>
                        </div>
                    </div>

                    <div class="content">
                        <div class="hide_box"></div>
                        <div class="shang_box">
                            <a class="shang_close" href="javascript:void(0)" onClick="dashangToggle()" title="关闭"><img src="/skin/cart/images/close.jpg" alt="取消" /></a>
                            <form id="upForm" action="" style="padding:20px ;">
                                <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                                <?php if(session('Homeuserinfo.id')): ?>
                                <input type="hidden" name="uid" value="<?php echo e(session('Homeuserinfo.id')); ?>">
                                <?php endif; ?>
                                <input type="text" name="sname" placeholder="收件人姓名" class="st-control block" data-valid-control="sname" />
                                <div class="st-error" data-valid-error="sname"></div>
                                <br />
                                <input type="text" name="sphone" id="sphone" placeholder="收件人手机" class="st-control block" data-valid-control="sphone" />
                                <div class="st-error" data-valid-error="sphone"></div>
                                <br />
                                <select name="province" id="province" class="select-1 st-control block" onchange="addChange(this.value,1)"  data-valid-control="province">
                                    <option>省份/自治区</option>
                                    <?php $__currentLoopData = $province; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($v->code); ?>"><?php echo e($v->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <div class="st-error" data-valid-error="province"></div>
                                </select>
                                <select name="city"  id="city" class="select-2 st-control block" onchange="addChange(this.value,2)"  data-valid-control="city" >
                                    <option value=""> --请选择市-- </option>
                                    <div class="st-error" data-valid-error="city"></div>
                                </select>
                                <select  name="county"  id="county" class="select-3 st-control block"  data-valid-control="county">
                                    <option value=""> --请选择区-- </option>
                                    <div class="st-error" data-valid-error="county"></div>
                                </select>

                                <br>
                                <input type="text" name="addrinfo" id="addrinfo" placeholder="收件人详细地址" class="st-control block" data-valid-control="addrinfo" />
                                <div class="st-error" data-valid-error="addrinfo"></div>
                                <br>
                                <input type="text" name="tag" placeholder="地址别名" class="st-control block"  />
                                <div class="st-error" data-valid-error="color"></div>
                                <br>
                                <input type="submit" class="st-btn block" value="保存" />
                            </form>
                        </div>
                    </div>
                    <!-- 收货地址 -- >
                    <!-- 商品清单 -->
                  <form id="orderForm">
                      <?php echo e(csrf_field()); ?>

                      <input type="hidden" name="aid" value="<?php echo e($addr_default['id']); ?>">
                      <?php if(session('Homeuserinfo.id')): ?>
                          <input type="hidden" name="uid" value="<?php echo e(session('Homeuserinfo.id')); ?>">
                      <?php endif; ?>
                    <div id="checkoutGoodsList" class="checkout-goods-box">
                        <div class="xm-box">
                            <div class="box-hd">
                                <h2 class="title">确认订单信息</h2>
                            </div>
                            <div class="box-bd">
                                <dl class="checkout-goods-list">
                                    <dt class="clearfix"> <span class="col col-1">商品名称</span> <span class="col col-2">商品规格</span> <span class="col col-3">购买价格(元)</span> <span class="col col-4">购买数量</span> <span class="col col-5">小计(元)</span> </dt>
                                    <?php $__currentLoopData = $cartGoods; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <input type="hidden" name="car_id[]" value="<?php echo e($v->id); ?>">
                                        <dd class="item clearfix">
                                            <div class="item-row">
                                                <div class="col col-1">
                                                    <div class="g-pic"><img src="<?php echo e($v->img); ?>"  width="60" height="60" /></div>
                                                    <div class="g-info"><?php echo e($v->title); ?></div>
                                                </div>
                                                <div class="col col-2"><?php echo e($v->attr); ?></div>
                                                <div class="col col-3"><?php echo e($v->price); ?></div>
                                                <div class="col col-4"><?php echo e($v->num); ?></div>
                                                <div class="col col-5" ><?php echo e($v->price * $v->num); ?>元</div>
                                            </div>
                                        </dd>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </dl>
                                <div class="checkout-count clearfix">
                                    <div class="checkout-count-extend xm-add-buy">
                                        <h3 class="title"> 会员留言
                                            </br>
                                            <textarea name="remarks"></textarea>
                                        </h3>
                                    </div>
                                    <!-- checkout-count-extend -->
                                    <div class="checkout-price">
                                        <ul>
                                            <li> 订单总额：<span><?php echo e($total_price_sum); ?>元</span> </li>
                                            <li> 运费：<span id="postageDesc">0元</span> </li>
                                        </ul>
                                        <input type="hidden" name="total_price" value="<?php echo e($total_price_sum); ?>">
                                        <p class="checkout-total">应付总额：<span><strong id="totalPrice"><?php echo e($total_price_sum); ?></strong>元</span></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- 商品清单 END -->
                    <div class="checkout-box-bd">
                        <div id="checkoutPayment">
                            <!-- 支付方式 -->
                            <div class="xm-box">
                                <div class="box-hd ">
                                    <h2 class="title">支付方式</h2>
                                </div>
                                <div class="box-bd">
                                    <ul id="checkoutPaymentList" class="checkout-option-list clearfix J_optionList">
                                        <li class="item selected">
                                            <input type="radio" name="pay" checked="checked" value="0">
                                            <p>
                                                在线支付 <span></span>
                                            </p>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!-- 支付方式 END-->
                            <div class="xm-box">
                                <div class="box-hd ">
                                    <h2 class="title">配送方式</h2>
                                </div>
                                <div class="box-bd">
                                    <ul id="checkoutShipmentList" class="checkout-option-list clearfix J_optionList">
                                        <li class="item selected">
                                            <input type="radio" data-price="0" name="distr" checked="checked" value="0">
                                            <p> 快递配送（免运费） <span></span> </p>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!-- 配送方式 END--> <!-- 配送方式 END-->
                        </div>
                        <!-- 送货时间 -->
                        <div class="xm-box">
                            <div class="box-hd">
                                <h2 class="title">送货时间</h2>
                            </div>
                            <div class="box-bd">
                                <ul class="checkout-option-list clearfix J_optionList">
                                    <li class="item selected">
                                        <input type="radio" checked="checked" name="delivery_time" value="0">
                                        <p>不限送货时间<span>周一至周日</span></p>
                                    </li>
                                    <li class="item ">
                                        <input type="radio"  name="delivery_time" value="1">
                                        <p>工作日送货<span>周一至周五</span></p>
                                    </li>
                                    <li class="item ">
                                        <input type="radio"  name="delivery_time" value="2">
                                        <p>双休日、假日送货<span>周六至周日</span></p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- 送货时间 END-->

                    </div>

                    <div class="checkout-confirm"> <a href="<?php echo e(url('/cart')); ?>" class="btn btn-lineDakeLight btn-back-cart">返回购物车</a>
                        <input type="button" class="btn btn-primary" value="立即下单" id="checkoutToPay" onclick="addOrder()" />
                    </div>
                  </form>
                </div>
          </div>
    </div>
</div>
<script>

    function addOrder() {
        $.ajax({
            type: "post",
            url: '/order/addOrder',
            data: $('#orderForm').serialize(),
            success: function (data) {
                alert(data.msg);
              window.location.href = '/pay';
            },
            error: function () {
                alert(data.msg);
            }
        });
    }

</script>


<!--收货地址body部分结束-->

<script src="/skin/cart/js/jquery-1.10.2.js"></script>
<script src="/skin/cart/js/valid.js"></script>
<script src="/skin/cart/js/Verify.js"></script>

<!-- footer -->
<?php echo $__env->make('home.cart.public.foot', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<!-- end footer -->

<script type="text/JavaScript">
    //省市区三级联动
    function addChange(val,level){
        var $city = $("#city");
        var $county = $("#county");
        $.ajax({
            type: "post",
            url: "/addrLinkage",
            data: { pcode: val,level:level,_token:'<?php echo e(csrf_token()); ?>'},
            beforeSend: function() {
                if(level=='1'){
                    $city.html('<option value=""> --请选择市-- </option>');
                    $city.val('');
                }
                $county.html('<option value=""> --请选择区-- </option>');
                $county.val('');
            },
            success: function(data) {
                var dataObj=eval("("+data+")");//转换为json对象
                if(dataObj['code']==1){
                    if(level=='1'){
                        $.each(dataObj['list'], function(i, item) {
                            $city.append('<option value="'+item['code']+'">'+item['name']+'</option>');
                        });
                    }else{
                        $.each(dataObj['list'], function(i, item) {
                            $county.append('<option value="'+item['code']+'">'+item['name']+'</option>');
                        });
                    }
                }
            },
            error: function(err){
                alert(JSON.stringify(err));
            }
        });
    }
</script>
</body>
</html>