<!doctype html>
<html>
<head>
<title>用户登录</title>
<meta charset="utf-8">
<meta name="format-detection" content="telephone=no">
<link href="/skin/style/webstyle.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="/skin/js/jquery-1.11.3.js"></script>
<script src="/skin/js/banner.js"></script>
</head>

<body>
<div class="container">
	<a href="{{url('/')}}" class="fl"><img src="/skin/images/a06.jpg" height="160"/></a>
	<span class="fr land_home"><a href="{{url('/')}}">返回首页</a>  |  <a href="#">帮助中心</a></span>
	<div class="cl"></div>
</div>
<div class="land_bg min_w">
	<div class="container">
		<div class="fr land_box">
			<div class="land_tit f18 tc">
				<a href="javascript:void(0);" class="land_tit_on">账号登陆</a>
				<a href="javascript:void(0);" >微信登陆</a>
				<div class="cl"></div>
			</div>
			<div class="land_con_box">
				<div class="land_con" >
					<form name="form" method="post" action="{{url('/login')}}">
						{{csrf_field()}}
						<div class="land_con_bor">
							<span class="fl"><img src="/skin/images/d02.png" alt="" /></span>
							<input type="text" name="username" placeholder="用户名/手机" class="fl land_con_inp f16" />
							<div class="cl"></div>
						</div>
						<div class="land_con_bor">
							<span class="fl"><img src="/skin/images/d03.png" alt="" /></span>
							<input type="password" name="password"  placeholder="密码" class="fl land_con_inp f16" />
							<div class="cl"></div>
						</div>
						<input type="checkbox" class="fl land_con_check" name="" id="a1" value="" />
						<label class="fl" for="a1">自动登录</label>
						@if(session('msg'))
							<div style="float:right;color:red;display: block;">
								<div class="alert media fade in alert-danger">
									<p><strong>{{session('msg')}}</strong> </p>
								</div>
							</div>
						@endif
						<div class="cl"></div>
						<input type="submit" value="登 陆" class="land_btn tc f18" />
						<a href="{{url('/register')}}" class="fl grey9">立即注册</a>
						<a href="" class="fr grey9">忘记用户名/密码？</a>
						<div class="cl"></div>
						<div class="fl land_coop">
							使用合作账号登陆：<br />
							<a href=""><img src="/skin/images/d04.png" alt="" /></a>
							<a href=""><img src="/skin/images/d05.png" alt="" /></a>
							<a href=""><img src="/skin/images/d06.png" alt="" /></a>
							<a href=""><img src="/skin/images/d07.png" alt="" /></a>

						</div>
						<div class="fr land_choose">
							您可以选择：<br />
							<a href=""><img src="/skin/images/d08.png" alt="" /> 手机快捷登陆</a>
						</div>
						<div class="cl"></div>
					</form>
				</div>
				<div class="land_ewm tc" style="display:none;" >
					<img src="/skin/images/d01.jpg" alt="" /><br />
					微信扫一扫，快速登陆
				</div>

			</div>
		</div>
		<div class="cl"></div>
	</div>
</div>

<!--footer start--> 
<div class="bot_bg02 min_w">
	<div class="container">
		<ul class="bot_list02 f18 tc">
			<li><a href="#"><img src="/skin/images/b01.png" alt="" /><br />100%正品</a></li>
			<li><a href="#"><img src="/skin/images/b02.png" alt="" /><br />无理由退货</a></li>
			<li><a href="#"><img src="/skin/images/b03.png" alt="" /><br />贵就赔</a></li>
			<li><a href="#"><img src="/skin/images/b04.png" alt="" /><br />万千口碑</a></li>
			<li><a href="#"><img src="/skin/images/b05.png" alt="" /><br />活动专区</a></li>
			<li><a href="#"><img src="/skin/images/b06.png" alt="" /><br />精品推荐</a></li>
			<div class="cl"></div>
		</ul>
	</div>
</div>
<div class="min_w copyright_bg tc">
	©2017   完美生活       技术支持：龙采科技
</div>
<!--footer end-->

<script>
	$(function(){
		$(".land_tit a").click(function(){
		$(this).addClass("land_tit_on").siblings().removeClass("land_tit_on"); 
		var index=$(this).index(); 
		$(".land_con_box > div").eq(index).show().siblings().hide();
		});
	});	
</script>
</body>
</html>
