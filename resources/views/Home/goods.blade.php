<!doctype html>
<html>
<head>
<title>{{$good->title}}_{{config('web.web_name')}}</title>
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
@include('home.public.top')
@include('home.public.head')
<!--header end-->

<!--购物车客服 start-->
@include('Home.public.kf')
<!--购物车客服 end-->

<!--main start-->
<div class="container">
	<div class="main_home">首页> <a href="#">家具城</a> > <a href="">床</a>>{{$good->title}} </div>
	<div class="fl pic_show">
		<!-- 大图begin -->
		<div id="preview" class="spec-preview"> 
			<span class="jqzoom"><img jqimg="{{$good->picurl}}" src="{{$good->picurl}}" /></span>
		</div>
		<!-- 大图end -->
		<!-- 缩略图begin -->

		<div class="spec-scroll"> <a class="prev"><img src="/skin/images/m21.png" alt="" /></a> <a class="next"><img src="/skin/images/m22.png" alt="" /></a>
		    <div class="items">
		    	<ul>
				<li><img bimg="{{$good->picurl}}" src="{{$good->picurl}}" alt="{{$good->title}}" onmousemove="preview(this);"></li>
				@if($pic != '')
					@foreach($pic as $v)
					 <li><img bimg="{{$v['img']}}" src="{{$v['img']}}" alt="{{$v['img']}}" onmousemove="preview(this);"></li>
					@endforeach
				@endif
		    	</ul>
		 	 </div>
		  <div class="cl"></div>
		</div>
		<!-- 缩略图end -->	
		<div class="detail_chare">
			<a href="" class="fl"><img src="/skin/images/d25.png" alt="" />分享</a>
			@if(session('Homeuserinfo.id'))


					@if($good->state == 0)
					<a href="javascript:void(0);" onclick="collection({{$good->id}},0,{{session('Homeuserinfo.id')}})" class="fl"><img src="/skin/images/d26.png" alt="" />收藏商品
					@else
					<a href="javascript:void(0);" onclick="collection({{$good->id}},{{$good->state}},{{session('Homeuserinfo.id')}})" class="fl"><img src="/skin/images/d29.png" alt="" />已收藏
					@endif
				</a>
			@else
				<a href="javascript:void(0);" onclick="collection()" class="fl"><img src="/skin/images/d26.png" alt="" />收藏商品</a>
			@endif
			</div>
	</div>
	<div class="fl detail_con">
		<div class="detail_tit f16"> {{$good->title}}</div>
		<div class="f12 detail_tit_text">{{$good->description}}</div>
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
			<div class="fr detail_con_ys">已售 <span class="red02">{{$good->sold}}</span><br />评价 {{$commentTot}}</div>
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
			@if($attr != '')
			@foreach( $attr as $k=>$v)
			<li class="theme-options">
				<span class="fl detail_con_name">{{$v['title']}}</span>
				<div class="fr detail_con_r detail_con_lx f12">
					@foreach($v['attrs'] as $a=>$attrs)
					<div class="theme-options">
						<a href="javascript:void(0);" @if( $a== 0) class="detail_con_lx_on" @endif>{{$attrs}}</a>
						<input type="radio" style="display: none"  name="goods_spec[{{$k}}]" @if($a == 0) checked="checked" @endif value="{{$attrs}}"  >
					</div>
					@endforeach
				</div>
				<div class="cl"></div>
			</li>
			@endforeach
			@endif
			<li>
				<span class="fl detail_con_name">数量</span>
				<div class="fr detail_con_r f12">
					<span class="fl detail_con_no">
						<input id="num" name="num" type="number" value="1" min="1" max="100"  class="fl detail_con_no_inp" onkeyup="modifyNum(this)"/>

					</span>
					<span class="fl red">库存数(<span id="homenumspan"></span>)</span>
				</div>
				<div class="cl"></div>
				<input type="hidden" name="good_id" value="{{$good->id}}" />
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
				<a href="javascript:;">评价<span class="red">({{$commentTot}})</span></a>
				<a href="javascript:;">服务保障</a>				
			</div>			
		</div>
		<div class="detail_r_con_box">
			<div>
				<div class="detail_r_con">
					{!! $good->content !!}
				</div>
			</div>
			<div class="detail_r_con" style="display:none;">
				<dl class="detail_ggcx_bor">
					{!! $good->parameter !!}
				</dl>
			</div>
			<div class="detail_r_con" style="display:none;">
				<div class="detail_pj_top">
					<div class="fl detail_pj_fen tr">
						<b class="red02">{{round($goodTot/$commentTot*100)}}%</b>好评<br />
					</div>
					<div class="fr detail_pj_my">
						<span class="fl detail_pj_my_name tr f12">好评</span>
						<span class="fl detail_pj_my_jdt"><i style="width:{{round($goodTot/$commentTot*100)}}%;"></i></span>
						<span class="fl">{{round($goodTot/$commentTot*100)}}%</span>
						<div class="cl"></div>
						<span class="fl detail_pj_my_name tr f12">中评</span>
						<span class="fl detail_pj_my_jdt"><i style="width:{{round($zhongTot/$commentTot*100)}}%;"></i></span>
						<span class="fl">{{round($zhongTot/$commentTot*100)}}%</span>
						<div class="cl"></div>
						<span class="fl detail_pj_my_name tr f12">差评</span>
						<span class="fl detail_pj_my_jdt"><i style="width:{{round($chaTot/$commentTot*100)}}%;"></i></span>
						<span class="fl">{{round($chaTot/$commentTot*100)}}%</span>
						<div class="cl"></div>
					</div>
					<div class="cl"></div>
				</div>

				<div class="detail_pj_tit f12" >
					<a href="javascript:;" data-t="1"   class="detail_pj_tit_on">全部评价({{$commentTot}})</a>
					<a href="javascript:;" data-t="2" >好评({{$goodTot}})</a>
					<a href="javascript:;" data-t="3" >中评({{$zhongTot}})</a>
					<a href="javascript:;" data-t="4" >差评({{$chaTot}})</a>
					<a href="javascript:;" data-t="5" ><img src="/skin/images/d30.png" alt="" />秀家(5)</a>
					<div id="ajax_comment_return"></div>
				</div>
				{{--<ul class="detail_pj_list">
					@foreach($comment as $v)
						<li>
							<div class="fl detail_pj_list_l tc">
								@if($v->portrait != '')
									<img src="{{$v->portrait}}"  width="70" height="70" /><br />
								@else
									<img src="/skin/images/d31.jpg" /><br />
								@endif
								{{$v->username}}<br />
								白金会员
							</div>
							<div class="fl detail_pj_list_m">
								<span style="color:#ff9f00">{{str_repeat("★",$v->start)}}{{str_repeat("☆",5-$v->start)}}</span>
								<br />
								<div class="detail_pj_list_text">
									{{$v->text}}
								</div>
								<div class="detail_pj_list_pic" >
									@if($v->img != '')
										<img src="/skin/images/d22.jpg" alt="" />
									@endif
								</div>
							</div>
							<div class="fr detail_pj_list_r grey9 f12 tr">{{date('Y-m-d H:i:s',$v->time)}}发布</div>
							<div class="cl"></div>
						</li>
					@endforeach
				</ul>--}}

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
            data : {goods_id:'{{$good->id}}',_token:'{{csrf_token()}}',commentType:commentType,p:page},
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
	//商品收藏
	function collection(gid,state,uid) {
		if (uid == null){
		    alert('请登录后收藏商品！')
		}else{
		    $.ajax({
				type:'post',
				url:'/goods/ajaxCollection',
				data:{gid:gid,state:state,uid:uid,_token:'{{csrf_token()}}'},
				success:function (data) {
					alert(data.msg);
					window.location.reload();
                },
				error:function (data) {
                    alert(data.msg);
                }
			})
		}
    }
	
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
            data : {gid:'{{$good->id}}',title:'{{$good->title}}',img:'{{$good->picurl}}',_token:'{{csrf_token()}}',num:num,price:price,attr:goods_spec_arr},
            success: function(data){
              alert(data.msg);
            },
            error:function(data){
                alert(data.msg);
            }
        })
    });
</script>

<!--footer start-->
@include('home.public.footer')
<!--footer end-->
</body>
</html>
