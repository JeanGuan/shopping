<!doctype html>
<html>
<head>
<title>04产品列表页</title>
<meta charset="utf-8">
<meta name="format-detection" content="telephone=no">
<link href="/skin/style/webstyle.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="/skin/js/jquery-1.11.3.js"></script>
<script src="/skin/js/banner.js"></script>
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
	<table cellpadding="0" cellspacing="0" border="0" width="100%" class="main_type">
		<tr>

			<td width="100" class="main_type_name red">{{$subclass['typename']}}</td>

			<td>
				<div class="main_type_con main_type_text">
					@foreach($subclass['subclass'] as $v)
					<a href="{{url('/types/'.$v['id'])}}">{{$v['typename']}}<span class="red">({{$v['count']}})</span></a>
					@endforeach
				</div>				
			</td>
		</tr>
		<tr>
			<td class="main_type_name">品牌</td>
			<td>
				<div class="fl main_type_pic">
					<a href="#"><img src="/skin/images/d10.jpg" alt="" /></a>
					<a href="#"><img src="/skin/images/d10.jpg" alt="" /></a>
					<a href="#"><img src="/skin/images/d10.jpg" alt="" /></a>
					<a href="#"><img src="/skin/images/d10.jpg" alt="" /></a>
					<a href="#"><img src="/skin/images/d10.jpg" alt="" /></a>
					<div class="cl"></div>
				</div>
				<a href="" class="fr main_type_dx main_type_mar01">+多选</a>
				<a href="" class="fr main_type_more main_type_mar01">更多</a>
			</td>
		</tr>

		<tr>
			<td class="main_type_name">价格</td>
			<td>
				<div class="fl main_type_con main_type_text">
					<a href="#">0-999元</a>
					<a href="#">0-999元</a>
					<a href="#">0-999元</a>
					<a href="#">0-999元</a>
					<a href="#">0-999元</a>
				</div>
				<input type="text" class="fl main_type_inp" />
				<span class="fl">-</span>
				<input type="text" class="fl main_type_inp" />
				<input type="submit" value="确定" class="fl main_type_sure" />
			</td>
		</tr>
	</table>
</div>
<div class="container">
	<div class="main_type_bor">
		<div class="fl main_type_px">
			<a href="#" class="main_type_px_on">综合</a>
			<a href="#">销量</a>
			<a href="#">价格</a>
			<a href="#">评论数</a>
			<a href="#">上架时间</a>
			<div class="cl"></div>
		</div>		
		<a href="#" class="fr main_type_btn main_type_btn02"></a>
		<a href="#" class="fr main_type_btn main_type_btn01"></a>
		<span class="fr main_type_number">1/41</span>
		<span class="fr main_type_number">共 <b class="red">1441 </b>件商品</span>
		<div class="cl"></div>
		<div class="main_type_ps">
			<span class="fl">配送至</span>
			<select name="" id="" class="fl main_type_select">
				<option value="">请选择地区</option>
			</select>
			<span class="fl">类型</span>
			<input type="radio" id="c01" name="leixing" class="fl main_type_radio" /><label for="c01" class="fl main_type_radio_text">全部</label>
			<input type="radio" id="c02" name="leixing" class="fl main_type_radio" /><label for="c02" class="fl main_type_radio_text">完美生活自营</label>
			<input type="radio" id="c03" name="leixing" class="fl main_type_radio" /><label for="c03" class="fl main_type_radio_text">第三方卖家</label>
			<input type="checkbox" id="c04" name="baoyou" class="fl main_type_radio" /><label for="c04" class="fl main_type_radio_text">包邮</label>
			<input type="checkbox" id="c05" name="baoyou" class="fl main_type_radio" /><label for="c05" class="fl main_type_radio_text">折扣</label>
			<div class="cl"></div>
		</div>
	</div>
</div>
<div class="container">
	<ul class="main_pro">
		@foreach($good_list as $v)
			@if($v->price != 0)
				<li>
					<a href="{{url('/goods/'.$v->id)}}" class="main_pro_pic"><img src="{{$v->picurl}}" alt="" /></a>
					<span class="red f18">¥{{$v->price}}</span><s class="grey9">¥{{$v->oldprice}}</s>
					<span class="main_pro_icon">直降</span>
					<br />
					<a href="{{url('/goods/'.$v->id)}}" class="main_pro_name">{{$v->title}}</a>
					<span class="grey9 f12">已售 </span><span class="red f12">{{$v->sold}}</span>　<span class="grey9">|</span>　<span class="grey9 f12">评论 {{$v->comment}}</span>
				</li>
			@else
				<li>
					<a href="{{url('/goods/'.$v->id)}}" class="main_pro_pic"><img src="{{$v->picurl}}" alt="" /></a>
					<span class="red f18">¥{{$v->oldprice}}</span>
					<br />
					<a href="{{url('/goods/'.$v->id)}}" class="main_pro_name">{{$v->title}}</a>
					<span class="grey9 f12">已售 </span><span class="red f12">{{$v->sold}}</span>　<span class="grey9">|</span>　<span class="grey9 f12">评论 {{$v->comment}}</span>
				</li>
			@endif

		@endforeach
		<div class="cl"></div>
	</ul>
	<div class="main_page tc">
		{{$good_list->links()}}
	</div>	
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

<!--footer start-->
@include('home.public.footer')
<!--footer end-->
</body>
</html>
