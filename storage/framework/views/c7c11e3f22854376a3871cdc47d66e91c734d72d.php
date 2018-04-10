<!doctype html>
<html>
<head>
<title><?php echo e($good->title); ?>_<?php echo e(config('web.web_name')); ?></title>
<meta charset="utf-8">
<meta name="format-detection" content="telephone=no">
<link href="/skin/style/webstyle.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="/skin/js/jquery-1.11.3.js"></script>
<script src="/skin/js/banner.js"></script>
<script src="/skin/js/jquery1.42.min.js"></script>
<script src="/skin/js/jquery.SuperSlide.2.1.1.js"></script>
<script src="/skin/js/jquery.jqzoom.js"></script>
<script src="/skin/js/spxq.js"></script>
</head>

<body>
<!--header start-->
<?php echo $__env->make('home.public.top', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('home.public.head', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<!--header end-->

<!--购物车客服 start-->
<?php echo $__env->make('Home.public.kf', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<!--购物车客服 end-->

<!--main start-->
<div class="container">
	<div class="main_home">首页> <a href="#">家具城</a> > <a href="">床</a>><?php echo e($good->title); ?> </div>
	<div class="fl pic_show">
		<!-- 大图begin -->
		<div id="preview" class="spec-preview"> 
			<span class="jqzoom"><img jqimg="<?php echo e($good->picurl); ?>" src="<?php echo e($good->picurl); ?>" /></span>
		</div>
		<!-- 大图end -->
		<!-- 缩略图begin -->

		<div class="spec-scroll"> <a class="prev"><img src="/skin/images/m21.png" alt="" /></a> <a class="next"><img src="/skin/images/m22.png" alt="" /></a>
		    <div class="items">
		    	<ul>
				<li><img bimg="<?php echo e($good->picurl); ?>" src="<?php echo e($good->picurl); ?>" alt="<?php echo e($good->title); ?>" onmousemove="preview(this);"></li>
				<?php if($pic != ''): ?>
					<?php $__currentLoopData = $pic; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					 <li><img bimg="<?php echo e($v['img']); ?>" src="<?php echo e($v['img']); ?>" alt="<?php echo e($v['img']); ?>" onmousemove="preview(this);"></li>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				<?php endif; ?>
		    	</ul>
		 	 </div>
		  <div class="cl"></div>
		</div>
		<!-- 缩略图end -->	
		<div class="detail_chare">
			<a href="" class="fl"><img src="/skin/images/d25.png" alt="" />分享</a>
			<a href="" class="fl"><img src="/skin/images/d26.png" alt="" />收藏商品</a>			
		</div>
	</div>
	<div class="fl detail_con">
		<div class="detail_tit f16"> <?php echo e($good->title); ?></div>
		<div class="f12 detail_tit_text"><?php echo e($good->description); ?></div>
		<div class="detail_con_bg">
			<div class="fl detail_con_price">
				<span class="fl detail_con_cxj">促销价</span>
				<span class="fl red02 f24">￥<span id="pricespan"></span></span>
				<span class="fl">本站价：</span>
				<s class="fl grey9">¥<span id="oldpricespan"></span></s><br />
				<span class="fl detail_con_cxj">促销</span>
				<span class="fl detail_con_zj">下单立减</span>
				<span class="fl"><span id="discountprice"></span>元</span>
				<div class="cl"></div>
			</div>
			<div class="fr detail_con_ys">已售 <span class="red02"><?php echo e($good->sold); ?></span><br />评价 <?php echo e($commentTot); ?></div>
			<div class="cl"></div>
		</div>
		<ul class="detail_con_list">
			<li>
				<span class="fl detail_con_name">配送</span>
				<div class="fr detail_con_r">
					<select name="" class="fl detail_con_qu">
						<option value="">黑龙江哈尔滨道里区</option>
					</select>
					<span class="fl red">查看运费</span><br />
					<span class="fl">该商品由<span class="red">完美生活自营旗舰店</span> 发货，并提供售后服务</span>
				</div>
				<div class="cl"></div>
			</li>
			<?php if($attr != ''): ?>
			<?php $__currentLoopData = $attr; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<li class="theme-options">
				<span class="fl detail_con_name"><?php echo e($v['title']); ?></span>
				<div class="fr detail_con_r detail_con_lx f12">
					<?php $__currentLoopData = $v['attrs']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $a=>$attrs): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<div class="theme-options">
						<a href="javascript:void(0);" <?php if( $a== 0): ?> class="detail_con_lx_on" <?php endif; ?>><?php echo e($attrs); ?></a>
						<input type="radio" style="display: none"  name="goods_spec[<?php echo e($k); ?>]" <?php if($a == 0): ?> checked="checked" <?php endif; ?> value="<?php echo e($attrs); ?>"  >
					</div>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</div>
				<div class="cl"></div>
			</li>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			<?php endif; ?>
			<li>
				<span class="fl detail_con_name">数量</span>
				<div class="fr detail_con_r f12">
					<span class="fl detail_con_no">
						<input id="num" name="num" type="number" value="1" min="1" max="100"  class="fl detail_con_no_inp" onkeyup="modifyNum(this)"/>

					</span>
					<span class="fl red">库存数(<span id="homenumspan"></span>)</span>
				</div>
				<div class="cl"></div>
				<input type="hidden" name="good_id" value="<?php echo e($good->id); ?>" />
				<input type="hidden" id="goods_spec_arr" />
				<input type="hidden" id="goods_price"  />

			</li>
			<li class="detail_con_btn f16">
				<a href="javascript:;" id="AddCart"><img src="/skin/images/d19.png" alt="" />加入购物车</a>
				<a href="javascript:;"><img src="/skin/images/d20.png" alt="" /> 立即购买</a>
			</li>
		</ul>		
	</div>
	<div class="fr detail_look">
		<div class="detail_look_tit tc">看了又看</div>
		
		<div class="picScroll-top">
			<div class="hd tc">
				<a class="next"><img src="/skin/images/d23.jpg" alt="" /></a>
				<ul></ul>
				<a class="prev"><img src="/skin/images/d24.jpg" alt="" /></a>

			</div>
			<div class="bd">
				<ul class="picList">
					<li>
						<div class="pic"><a href="#" target="_blank"><img src="/skin/images/d22.jpg" /></a></div>
						<div class="title"><a href="#" target="_blank">匠心独具 品质做工 <span class="red">¥2390</span></a></div>
					</li>
					<li>
						<div class="pic"><a href="#" target="_blank"><img src="/skin/images/d22.jpg" /></a></div>
						<div class="title"><a href="#" target="_blank">匠心独具 品质做工 <span class="red">¥2390</span></a></div>
					</li>
					<li>
						<div class="pic"><a href="#" target="_blank"><img src="/skin/images/d22.jpg" /></a></div>
						<div class="title"><a href="#" target="_blank">匠心独具 品质做工 <span class="red">¥2390</span></a></div>
					</li>
					<li>
						<div class="pic"><a href="#" target="_blank"><img src="/skin/images/d22.jpg" /></a></div>
						<div class="title"><a href="#" target="_blank">匠心独具 品质做工 <span class="red">¥2390</span></a></div>
					</li>
					<li>
						<div class="pic"><a href="#" target="_blank"><img src="/skin/images/d22.jpg" /></a></div>
						<div class="title"><a href="#" target="_blank">匠心独具 品质做工 <span class="red">¥2390</span></a></div>
					</li>
					<li>
						<div class="pic"><a href="#" target="_blank"><img src="/skin/images/d22.jpg" /></a></div>
						<div class="title"><a href="#" target="_blank">匠心独具 品质做工 <span class="red">¥2390</span></a></div>
					</li>
					<li>
						<div class="pic"><a href="#" target="_blank"><img src="/skin/images/d22.jpg" /></a></div>
						<div class="title"><a href="#" target="_blank">匠心独具 品质做工 <span class="red">¥2390</span></a></div>
					</li>
				</ul>
			</div>
		</div>
		<script type="text/javascript">
		 jQuery(".picScroll-top").slide({titCell:".hd ul",mainCell:".bd ul",autoPage:true,effect:"top",autoPlay:true,vis:3,trigger:"click"});
		</script>	
	</div>
	<div class="cl" style="height:30px"></div>
</div>
<div class="container">
	<div class="fl detail_l">
		<div class="detail_rqtj_tit fb">人气推荐</div>
		<ul class="detail_rqtj_list">
			<li><a href="#">
				<img src="/skin/images/d27.png" alt="" />
				【Clover克罗弗】超值推荐 1.8<br />
				<b class="fl red">¥2799</b>
				<span class="fr">人气 7170</span>
				<div class="cl"></div>
			</a></li>
			<li><a href="#">
				<img src="/skin/images/d27.png" alt="" />
				【Clover克罗弗】超值推荐 1.8<br />
				<b class="fl red">¥2799</b>
				<span class="fr">人气 7170</span>
				<div class="cl"></div>
			</a></li>
			<li><a href="#">
				<img src="/skin/images/d27.png" alt="" />
				【Clover克罗弗】超值推荐 1.8<br />
				<b class="fl red">¥2799</b>
				<span class="fr">人气 7170</span>
				<div class="cl"></div>
			</a></li>
		</ul>
	</div>
	<div class="fr detail_r">
		<div class="detail_r_bor">
			<div class="detail_r_tit">
				<a href="javascript:;" class="detail_r_tit_on">商品详情</a>
				<a href="javascript:;">规格参数</a>
				<a href="javascript:;">评价<span class="red">(<?php echo e($commentTot); ?>)</span></a>
				<a href="javascript:;">服务保障</a>				
			</div>			
		</div>
		<div class="detail_r_con_box">
			<div>
				<div class="detail_r_con">
					<?php echo $good->content; ?>

				</div>
			</div>
			<div class="detail_r_con" style="display:none;">
				<dl class="detail_ggcx_bor">
					<?php echo $good->parameter; ?>

				</dl>
			</div>
			<div class="detail_r_con" style="display:none;">
				<div class="detail_pj_top">
					<div class="fl detail_pj_fen tr">
						<b class="red02"><?php echo e(round($goodTot/$commentTot*100)); ?>%</b>好评<br />
					</div>
					<div class="fr detail_pj_my">
						<span class="fl detail_pj_my_name tr f12">好评</span>
						<span class="fl detail_pj_my_jdt"><i style="width:<?php echo e(round($goodTot/$commentTot*100)); ?>%;"></i></span>
						<span class="fl"><?php echo e(round($goodTot/$commentTot*100)); ?>%</span>
						<div class="cl"></div>
						<span class="fl detail_pj_my_name tr f12">中评</span>
						<span class="fl detail_pj_my_jdt"><i style="width:<?php echo e(round($zhongTot/$commentTot*100)); ?>%;"></i></span>
						<span class="fl"><?php echo e(round($zhongTot/$commentTot*100)); ?>%</span>
						<div class="cl"></div>
						<span class="fl detail_pj_my_name tr f12">差评</span>
						<span class="fl detail_pj_my_jdt"><i style="width:<?php echo e(round($chaTot/$commentTot*100)); ?>%;"></i></span>
						<span class="fl"><?php echo e(round($chaTot/$commentTot*100)); ?>%</span>
						<div class="cl"></div>
					</div>
					<div class="cl"></div>
				</div>

				<div class="detail_pj_tit f12" >
					<a href="javascript:;" data-t="1"   class="detail_pj_tit_on">全部评价(<?php echo e($commentTot); ?>)</a>
					<a href="javascript:;" data-t="2" >好评(<?php echo e($goodTot); ?>)</a>
					<a href="javascript:;" data-t="3" >中评(<?php echo e($zhongTot); ?>)</a>
					<a href="javascript:;" data-t="4" >差评(<?php echo e($chaTot); ?>)</a>
					<a href="javascript:;" data-t="5" ><img src="/skin/images/d30.png" alt="" />秀家(5)</a>
					<div id="ajax_comment_return"></div>
				</div>
				

				<div class="main_page tc">
				分页
				</div>
			</div>

			<div class="detail_r_con" style="display:none;">服务保障</div>
		</div>
	</div>
	<div class="cl" style="height:50px;"></div>
</div>
<!--main end-->

<!--猜您喜欢-->
<div class="container">
	<div class="guess_love_tit">
		<b class="fl">猜您喜欢</b>
		<span class="fl grey9">您关注的分类：</span>
		<a href="#" class="fl">书柜</a>
		<a href="#" class="fl">卧室套装</a>
		<a href="#" class="fl">书柜</a>
		<a href="#" class="fl">卧室套装</a>
		<span class="grey9">您喜欢的风格：欧式风格</span>
		<a href="#" class="fr guess_love_tit_huan">换一批</a>
	</div>
	<ul class="main_pro">
		<li>
			<a href="#" class="main_pro_pic"><img src="/skin/images/d13.jpg" alt="" /></a>
			<span class="red f18">¥3400.00</span><s class="grey9">¥3650</s><span class="main_pro_icon">直降</span><br />
			<a href="#" class="main_pro_name">欧式田园 畅销经典款 高档水牛头层真皮床 对称式描金雕花 1.8米精致水晶拉扣床</a>
			<span class="grey9 f12">已售 </span><span class="red f12">40983</span>　<span class="grey9">|</span>　<span class="grey9 f12">评论 2355</span>
		</li>
		<li>
			<a href="#" class="main_pro_pic"><img src="/skin/images/d13.jpg" alt="" /></a>
			<span class="red f18">¥3400.00</span><s class="grey9">¥3650</s><span class="main_pro_icon">直降</span><br />
			<a href="#" class="main_pro_name">欧式田园 畅销经典款 高档水牛头层真皮床 对称式描金雕花 1.8米精致水晶拉扣床</a>
			<span class="grey9 f12">已售 </span><span class="red f12">40983</span>　<span class="grey9">|</span>　<span class="grey9 f12">评论 2355</span>
		</li>
		<li>
			<a href="#" class="main_pro_pic"><img src="/skin/images/d13.jpg" alt="" /></a>
			<span class="red f18">¥3400.00</span><s class="grey9">¥3650</s><span class="main_pro_icon">直降</span><br />
			<a href="#" class="main_pro_name">欧式田园 畅销经典款 高档水牛头层真皮床 对称式描金雕花 1.8米精致水晶拉扣床</a>
			<span class="grey9 f12">已售 </span><span class="red f12">40983</span>　<span class="grey9">|</span>　<span class="grey9 f12">评论 2355</span>
		</li>
		<li>
			<a href="#" class="main_pro_pic"><img src="/skin/images/d13.jpg" alt="" /></a>
			<span class="red f18">¥3400.00</span><s class="grey9">¥3650</s><span class="main_pro_icon">直降</span><br />
			<a href="#" class="main_pro_name">欧式田园 畅销经典款 高档水牛头层真皮床 对称式描金雕花 1.8米精致水晶拉扣床</a>
			<span class="grey9 f12">已售 </span><span class="red f12">40983</span>　<span class="grey9">|</span>　<span class="grey9 f12">评论 2355</span>
		</li>
		<div class="cl"></div>
	</ul>
</div>
<script>
	//外层tab切换
    $(function(){
        $(".detail_r_tit a").click(function(){

            $(this).addClass("detail_r_tit_on").siblings().removeClass("detail_r_tit_on");
            var index=$(this).index();
            $(".detail_r_con_box > div").eq(index).show().siblings().hide();
        });
    });
</script>
<script>
    var commentType = 1;// 默认评论类型
    $(function() {
        //获取评论
        ajaxComment(commentType,1);
        // 好评差评 切换
        $('.detail_pj_tit a').click(function(){
            $(this).addClass('detail_pj_tit_on').siblings().removeClass('detail_pj_tit_on');
            commentType = $(this).attr('data-t'); // 评价类型   好评 中评  差评
            ajaxComment(commentType,1);
        })
    });

    /***用ajax分页显示评论**/
    function ajaxComment(commentType,page){
        $.ajax({
            type : "POST",
            url:"/goods/ajaxComment",
            data : {goods_id:'<?php echo e($good->id); ?>',_token:'<?php echo e(csrf_token()); ?>',commentType:commentType,p:page},
            success: function(data){
                $("#ajax_comment_return").html('').append(data);
            },
            error:function(data){
                swal('error',JSON.stringify(data),'error');
            }
        });
    }
</script>


<script type="text/javascript">
	//商品数量
    function modifyNum(o){
        if(isNaN($(o).val())){
            $(o).val(1);
        }
        else{
            if($(o).val()<1){
                $(o).val(1);
            }
        }
    }
   $(function() {
        //切换规格
        $(".theme-options").click(function() {

            $(this).children('a').addClass("detail_con_lx_on");
            $(this).siblings().children('a').removeClass("detail_con_lx_on");
            $(this).siblings().children('input:radio').attr('checked',false);
            $(this).children('input:radio').attr('checked',true);

            // 更新商品价格
            get_goods_price();
        });
        // 更新商品价格
        get_goods_price();
    })


    // 更新商品价格
   function get_goods_price(){
        var goods_spec_arr = new Array();
        $("input[type='radio'][name^='goods_spec']:checked").each(function(){
            goods_spec_arr.push($(this).val());
        });
        var spec_key = goods_spec_arr.join("_");

      	var spec_goods_price_json = '<?php echo $goodattr ?>';//控制器传过来

        var spec_goods_price = JSON.parse(spec_goods_price_json);

        if(spec_goods_price.hasOwnProperty(spec_key)){
            var saleprice = spec_goods_price[spec_key]['price'];        // 找到对应规格的价格
            var marketprice = spec_goods_price[spec_key]['oldprice'];   // 找到对应规格的价格
            var discountprice = (marketprice - saleprice).toFixed(2);	//商品优惠价格
			var homenum = spec_goods_price[spec_key]['homenum'];          //商品对应的库存
            $("#pricespan").html(saleprice);
            $("#oldpricespan").html(marketprice);
          	$("#discountprice").html(discountprice);
            $("#homenumspan").html(homenum);
            $("#goods_spec_arr").val(goods_spec_arr);
            $("#goods_price").val(saleprice);
        }
   }


    //加入购物车
    $("#AddCart").click(function () {
        var num = $("#num").val();							//商品数量
        var price = $("#goods_price").val();					//商品价格
        var goods_spec_arr = $("#goods_spec_arr").val();		//商品规格

        $.ajax({
            type : "POST",
            url:"/addCart",
            data : {gid:'<?php echo e($good->id); ?>',_token:'<?php echo e(csrf_token()); ?>',num:num,price:price,attr:goods_spec_arr},
            success: function(data){
                alert(data.msg);
            },
            error:function(data){
                alert(data.msg);
                //swal('error',JSON.stringify(data),'error');
            }
        })
    });
</script>

<!--footer start-->
<?php echo $__env->make('home.public.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<!--footer end-->
</body>
</html>
