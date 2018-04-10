<!doctype html>
<html>
<head>
<title>{{config('web.index_title')}}_{{config('web.web_name')}}</title>
<meta name="keywords" content="{{config('web.keywords')}}" />
<meta name="description" content="{{config('web.description')}}" />
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

<!--banner-->
<div class="banner">
	<div class="b-img">
		@foreach($banner as $v)
		<a href="{{$v->href}}" style="background:url(@if($v->img != null){{$v->img}}@endif ) center no-repeat;" title="{{$v->title}}"></a>
		@endforeach
	</div>
	<div class="b-list"></div>
	<a class="bar-left" href="#"><em></em></a><a class="bar-right" href="#"><em></em></a>
</div>
<!--banner-->

<!--楼层导航 start-->
<div class="floor_pos">
	<div class="floor_tit tc">楼层导航</div>
	<ul class="floor_list tc">
		@foreach($goods as $class )
		<li><a href="#{{$class['key']}}f" ><span class="red fb">{{$class['key']}}F</span><br />{{$class['title']}}  </a></li>
		@endforeach
	</ul>
</div> 
<!--楼层导航 end-->

<!--购物车客服 start-->
@include('Home.public.kf')
<!--购物车客服 end-->

<!--今日团购-->
<div class="index_box">
	<ul class="group_list">
		<li style="background:#ffe6ee;">
			<img src="/skin/images/a14.png" alt="" class="fr" />
			<div class="group_list_text group_list_text01 f16">
				<span class="group_list_tit01">今日团购</span><br />
				低价成团  限时限量<br />
				<a href="#" class="group_list_go fl f12">GO</a>
			</div>
		</li>
		<li style="background:#e9fbf0;">
			<img src="/skin/images/a15.png" alt="" class="fr" />
			<div class="group_list_text group_list_text02 f16">
				<span class="group_list_tit02">限时秒杀</span><br />
				限时秒杀 抢不停歇<br />
				<a href="#" class="group_list_go fl f12">GO</a>
			</div>
		</li>
		<li style="background:#f9eee9;">
			<img src="/skin/images/a16.png" alt="" class="fr" />
			<div class="group_list_text group_list_text03 f16">
				<span class="group_list_tit03">新品抢先</span><br />
				新品特惠 每周更新<br />
				<a href="#" class="group_list_go fl f12">GO</a>
			</div>
		</li>
		<li style="background:#f0f8ff;">
			<img src="/skin/images/a17.png" alt="" class="fr" />
			<div class="group_list_text group_list_text04 f16">
				<span class="group_list_tit04">精品推荐</span><br />
				懂你 懂生活<br />
				<a href="#" class="group_list_go fl f12">GO</a>
			</div>
		</li>
		<div class="cl"></div>
	</ul>
</div>

@foreach($goods as $class )
	<!--1F 卧室-->
	<div class="index_box mar40" id="{{$class['key']}}f">
		<div class="index_tit">
			<span class="fl index_tit_no">{{$class['key']}}F</span>
			<span class="fl f26">{{$class['title']}}</span>
			<a href="{{url('/types/'.$class['id'])}}" class="fr">MORE></a>
			<div class="cl"></div>
		</div>
		<div class="index_bor">
			<div class="fl index_l index_l_bg0{{$class['key']}}">
				<ul class="index_type index_type0{{$class['key']}} tc">
					@foreach($class['type'] as $class2)
						<li><a href="/types/{{$class2->id}}">{{$class2->typename}}</a></li>
					@endforeach
					<div class="cl"></div>
				</ul>
				<div><img src="/skin/images/a19.png" alt="" /></div>
				<div class="tc index_brand_tit index_brand_tit01">品牌</div>
				<ul class="index_brand_list">
					@foreach($class['brand'] as $brand)
					<li><a href="{{url('/brand/'.$brand->id)}}"><img src="{{$brand->img}}" alt="{{$brand->name}}" title="{{$brand->name}}" /></a></li>
					@endforeach
					<div class="cl"></div>
				</ul>
			</div>
			<div class="fr index_r">
				<ul class="index_list">
					<li class="index_list_pic"><a href="#">
							<img src="/skin/images/a24.jpg" width="591" height="284" alt="" />
							<div class="index_list_pic_name tc">
								<span class="index_list_pic_line">实木框架  优质油蜡</span>
								1.8米床板双人床 奥斯汀系列¥3999.00
							</div>
						</a></li>
					@foreach($class['goods'] as $goods)
						<li><a href="{{url('/goods/'.$goods->id)}}">
								<div class="tc"><img src="{{$goods->picurl}}" width="250" height="200" alt="" /></div>
								<div class="index_list_name">{{$goods->title}}</div>
								<div class="index_list_price">¥
									@if($goods->price != 0)
									{{$goods->price}}
									@else
										{{$goods->oldprice}}
									@endif
								</div>
							</a></li>
					@endforeach
					<div class="cl"></div>
				</ul>
			</div>
			<div class="cl"></div>
		</div>
	</div>
@endforeach

<!--新闻-->
<div class="index_box mar40">
	<div class="news_bor">
		<div class="fl news_box">
			<div class="news_tit">
				<span class="fl f18">装修课堂</span>
				<a href="{{url('/arctype/20')}}" class="fr">MORE</a>
				<div class="cl"></div>
			</div>
			<ul class="news_school cl">
				@foreach($zxkt as $v)
				<li><a href="{{url('/article/'.$v->id)}}">
					<span class="fl news_school_pic"><img src="{{$v->img}}" alt="{{$v->title}}" /></span>
					<div class="fr news_school_con">
						<h3>{{$v->title}}</h3>
						{{$v->description}}
					</div>
					<div class="cl"></div>
				</a></li>
					@endforeach
			</ul>
		</div>
		<div class="fl news_box" style="margin-left:50px;">
			<div class="news_tit">
				<span class="fl f18">通知公告</span>
				<a href="{{url('/arctype/21')}}" class="fr">MORE</a>
				<div class="cl"></div>
			</div>
			<ul class="news_ann cl">
			@foreach($notice as $v)
				<li><a href="{{url('/article/'.$v->id)}}">{{$v->title}}</a></li>
				@endforeach
			</ul>
		</div>
		<div class="fr news_box">
			<div class="news_tit">
				<span class="fl f18">精彩视频</span>
				<a href="#" class="fr">MORE</a>
				<div class="cl"></div>
			</div>
			<video src="" poster="/skin/images/a33.jpg"></video>
		</div>
		<div class="cl"></div>
	</div>
</div>

<!--footer start--> 
@include('home.public.footer')
<!--footer end-->

</body>
</html>
