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
@include('home.public.car')
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
			<a href="" class="fl"><img src="/skin/images/d26.png" alt="" />收藏商品</a>			
		</div>
	</div>
	<div class="fl detail_con">
		<div class="detail_tit f16"><a href="">[韩菲尔]</a> {{$good->title}}</div>
		<div class="f12 detail_tit_text">{{$good->description}}</div>
		<div class="detail_con_bg">
			<div class="fl detail_con_price">
			@if($good->price != 0)
				<span class="fl detail_con_cxj">促销价</span>
				<span class="fl red02 f24">￥{{$good->price}}</span>
				<span class="fl">本站价：</span>
				<s class="fl grey9">¥{{$good->oldprice}}</s><br />
				<span class="fl detail_con_cxj">促销</span>
				<span class="fl detail_con_zj">下单立减</span>
				<span class="fl">{{$good->oldprice - $good->price}}元</span>
			@else
				<span class="fl detail_con_cxj">本站价</span>
				<span class="fl red02 f24">￥{{$good->oldprice}}</span>
			@endif
				<div class="cl"></div>
			</div>
			<div class="fr detail_con_ys">已售 <span class="red02">{{$good->sold}}</span><br />评价 {{$good->comment}}</div>
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

			{{--<div class="yListr">

				<ul>
					@foreach($attr as $v )
					<li><span style="float:left;">{{$v->title}}</span>
						<div style="width:636px;float:left;overflow: hidden;">
							@foreach($v[] )
							{volist name="voa.attrs" id="voas"}

							<em {eq name="key" value="0"}class="yListrclickem"{/eq}>{$voas}<i></i>
							<input type="radio" style="display: none" name="goods_spec{$k}[]" value="{$voas}" {eq name="key" value="0"}checked="checked"{/eq}>
							</em>
							{/volist}
								@endforeach
						</div>
					</li>
					{/volist}
					</li>

				</ul>
				{volist name="vo.goodsattr" id="vog"}
				<input type="hidden" class="form-control" name="{$vog.attrs}" homenum="{$vog.homenum}"  value="{$vog.price}">
				@endforeach
				<br><br>
			</div>--}}

			@foreach($attr as $v )
			<li>
				<span class="fl detail_con_name">{{$v['title']}}</span>

				<div class="fr detail_con_r detail_con_lx f12">
					@foreach($v['attrs'] as $attr)
					<a href="#"  class="detail_con_lx_on" onclick="Clicked()">{{$attr}}</a>
						<input type="radio" style="display: none" id="{{$attr}}" name="{{$attr}}" value="{{$attr}}" >

					@endforeach
				</div>
				<div class="cl"></div>
			</li>
			@endforeach
			@foreach($goodattr as $vog)
			<input type="hidden" class="form-control" {{--name="{{$vog['attrs']}}"--}} homenum="{{$vog['homenum']}}"  value="{{$vog['price']}}">
			@endforeach

			<li>
				<span class="fl detail_con_name">数量</span>
				<div class="fr detail_con_r f12">
					<span class="fl detail_con_no">
						<input type="text" class="fl detail_con_no_inp num" value="1" />
						<span class="fl">
							<a href="#" class="J_jia"><img src="/skin/images/d17.jpg" alt="" /></a><br />
							<a href="#" class="J_jian"><img src="/skin/images/d18.jpg" alt="" /></a>
						</span>
					</span>
					<span class="fl red">库存数({{$good->num}})</span>
				</div>
				<div class="cl"></div>
			</li>
			<li class="detail_con_btn f16">
				<a href="#"><img src="/skin/images/d19.png" alt="" />加入购物车</a>
				<a href="#"><img src="/skin/images/d20.png" alt="" /> 立即购买</a>
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
				<!--<span class="pageState"></span>-->
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
				<a href="javascript:;">评价<span class="red">({{$good->comment}})</span></a>
				<a href="javascript:;">已售({{$good->sold}})</a>

				<a href="javascript:;">服务保障</a>				
			</div>			
		</div>
		<div class="detail_r_con_box">
			<div>
				<div class="detail_r_xq">
					<ul>
						<li>商品编号：GJ-YHD-M0178-18CD</li>
						<li>商品品牌：顾家1号垫</li>
						<li>商品体积：0.94 m³</li>
						<li>商品清单：1.8*2.0米床垫</li>
						<li>产地：浙江杭州</li>
						<div class="cl"></div>
					</ul>
				</div>
				<div class="detail_r_con">
					{!! $good->content !!}
				</div>
			</div>
			<div class="detail_r_con" style="display:none;">
				<dl class="detail_ggcx_bor">
					{{$good->config}}
					{{--<dt>基本信息</dt>
						<dd>品牌：	美宜经典</dd>
						<dd>型号：	MYJD-YH-TY-C-302-18C</dd>
						<dd>风格：	北欧风格</dd>
						<dd>包件：	3件</dd>					
					<dt>产品尺寸</dt>
						<dd>品牌：	美宜经典</dd>
						<dd>型号：	MYJD-YH-TY-C-302-18C</dd>
						<dd>风格：	北欧风格</dd>
						<dd>包件：	3件</dd>					
					<dt>产品尺寸</dt>
						<dd>品牌：	美宜经典</dd>
						<dd>型号：	MYJD-YH-TY-C-302-18C</dd>
						<dd>风格：	北欧风格</dd>
						<dd>包件：	3件</dd>		--}}
				</dl>
			</div>
			<div class="detail_r_con" style="display:none;">
				<div class="detail_pj_top">
					<div class="fl detail_pj_fen tr">
						<b class="red02">5.0</b>分<br />
						<img src="/skin/images/d29.png" alt="" />
						<img src="/skin/images/d29.png" alt="" />
						<img src="/skin/images/d29.png" alt="" />
						<img src="/skin/images/d29.png" alt="" />
						<img src="/skin/images/d29.png" alt="" />						
					</div>
					<div class="fr detail_pj_my">
						<span class="fl detail_pj_my_name tr f12">满意</span>
						<span class="fl detail_pj_my_jdt"><i style="width:100%;"></i></span>
						<span class="fl">100%</span>
						<div class="cl"></div>
						<span class="fl detail_pj_my_name tr f12">一般</span>
						<span class="fl detail_pj_my_jdt"><i style="width:50%;"></i></span>
						<span class="fl">100%</span>
						<div class="cl"></div>
						<span class="fl detail_pj_my_name tr f12">不满意</span>
						<span class="fl detail_pj_my_jdt"><i style="width:20%;"></i></span>
						<span class="fl">100%</span>
						<div class="cl"></div>
					</div>
					<div class="cl"></div>
				</div>
				<div class="detail_pj_tit f12">
					<a href="#" class="detail_pj_tit_on">全部评价(15)</a>
					<a href="#">满意(15)</a>
					<a href="#">一般(0)</a>
					<a href="#">不满意(0)</a>
					<a href="#"><img src="/skin/images/d30.png" alt="" />秀家(5)</a>
				</div>
				<ul class="detail_pj_list">
					<li>
						<div class="fl detail_pj_list_l tc">
							<img src="/skin/images/d31.jpg" alt="" /><br />
							1520461***<br />
							白金会员 
						</div>
						<div class="fl detail_pj_list_m">
							<img src="/skin/images/d29.png" alt="" />
							<img src="/skin/images/d29.png" alt="" />
							<img src="/skin/images/d29.png" alt="" />
							<img src="/skin/images/d29.png" alt="" />
							<img src="/skin/images/d29.png" alt="" />						
							5分<br />
							<div class="detail_pj_list_text">
								床到了。真心不做，木质也好，感谢销售给推荐的，以后有需要还到完美生活来购买床到了。真心不做，木质也好，感谢销售给推荐的，以后有需要还到完美生活来购买床到了。真心不做，木质也好，感谢销售给推荐的，以后有需要还到完美生活来购买床到了。真心不做，木质也好，感谢销售给推荐的，以后有需要还到完美生活来购买床到了。真心不做，木质也好，感谢销售给推荐的，以后有需要还到完美生活来购买
							</div>
							<div class="detail_pj_list_pic">
								<img src="/skin/images/d22.jpg" alt="" />
								<img src="/skin/images/d22.jpg" alt="" />
								<img src="/skin/images/d22.jpg" alt="" />
								<img src="/skin/images/d22.jpg" alt="" />
							</div>							
						</div>
						<div class="fr detail_pj_list_r grey9 f12 tr">2017-10-23 17:16:00发布</div>
						<a href="" class="detail_pj_list_you">有用(8)</a>
						<div class="cl"></div>
					</li>

				</ul>
				<div class="main_page tc">
					<a href="#">首页</a>
					<a href="#">上一页</a>
					<a href="#">1</a>
					<a href="#">2</a>
					<a href="#">3</a>
					<a href="#">4</a>
					<a href="#">5</a>
					<a href="#">下一页</a>
					<a href="#">尾页</a>
				</div>				
			</div>
			<div class="detail_r_con" style="display:none;">
				<table cellpadding="0" cellspacing="0" border="0" width="100%" class="detail_ys">
					<tr>
						<th width="200">会员名</th>
						<th width="280">商品名称</th>
						<th width="280">地址</th>
						<th width="60">件数</th>
						<th>成交时间</th>
					</tr>
					<tr>
						<td>长春高新区体验馆客户</td>
						<td>1.8米床 森林系 白蜡木全实木家具 双人床</td>
						<td>三亚 南滨路口南海*************</td>
						<td align="center">2</td>
						<td align="center">2017年10月21日</td>
					</tr>
					<tr>
						<td>长春高新区体验馆客户</td>
						<td>1.8米床 森林系 白蜡木全实木家具 双人床</td>
						<td>三亚 南滨路口南海*************</td>
						<td align="center">2</td>
						<td align="center">2017年10月21日</td>
					</tr>
					<tr>
						<td>长春高新区体验馆客户</td>
						<td>1.8米床 森林系 白蜡木全实木家具 双人床</td>
						<td>三亚 南滨路口南海*************</td>
						<td align="center">2</td>
						<td align="center">2017年10月21日</td>
					</tr>
				</table>
			</div>

			<div class="detail_r_con" style="display:none;">服务保障</div>
		</div>
	</div>
	<div class="cl" style="height:50px;"></div>
	<script>
		$(function(){
			$(".detail_r_tit a").click(function(){
			$(this).addClass("detail_r_tit_on").siblings().removeClass("detail_r_tit_on"); 
			var index=$(this).index(); 
			$(".detail_r_con_box > div").eq(index).show().siblings().hide(); 
			});
		});	
	</script>	
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
		<span class="grey9">您喜欢的风格：   欧式风格</span>
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


    $(function() {
        //cost

        $("#pricespan").text($("#cost").val());
        $(".yListr ul li em").click(function() {
            $(this).addClass("yListrclickem").siblings().removeClass("yListrclickem");
            $(this).siblings().children('input').prop('checked',false);
            $(this).children('input').prop('checked',true);
            price();
        });
        price();
    })
    function price(){
        var list=new Array();
        $("input[type='radio'][name^='goods_spec']:checked").each(function(){
            list.push($(this).val());
        });
        var name = list.join(",");
        $("#ge").val(name);
        var price = $("input[name='"+name+"']").val();
        var homenum = $("input[name='"+name+"']").attr('homenum');

        $("#pricespan").text(price);
        //  $("#homenumspan").text(homenum);

    }
</script>

<!--  -->
<script type="text/javascript">
    $(document).ready(function(){
        var add,reduce,num,num_txt;
        add=$(".J_jia");//添加数量
        reduce=$(".J_jian");//减少数量
        num="";//数量初始值
        num_txt=$(".num");//接受数量的文本框
        //var num_val=num_txt.val();//给文本框附上初始值

        /*添加数量的方法*/
        add.click(function(){
            num = $(".num").val();
            num++;
            num_txt.val(num);
            //ajax代码可以放这里传递到数据库实时改变总价
        });

        /*减少数量的方法*/
        reduce.click(function(){
            //如果文本框的值大于0才执行减去方法
            num = $(".num").val();
            if(num >0){
                //并且当文本框的值为1的时候，减去后文本框直接清空值，不显示0
                if(num==1)
                {
                    num_txt.val("1");
                }
                //否则就执行减减方法
                else
                {
                    num--;
                    num_txt.val(num);
                }

            }
        });
    })
</script>
<!--footer start-->
@include('home.public.footer')
<!--footer end-->
</body>
</html>
