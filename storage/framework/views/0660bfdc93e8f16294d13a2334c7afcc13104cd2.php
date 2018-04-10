<div class="bot_bg min_w">
	<div class="index_box">
		<ul class="bot_list f18 tc">
			<li><a href="#"><img src="/skin/images/b01.png" alt="" /><br />100%正品</a></li>
			<li><a href="#"><img src="/skin/images/b02.png" alt="" /><br />无理由退货</a></li>
			<li><a href="#"><img src="/skin/images/b03.png" alt="" /><br />贵就赔</a></li>
			<li><a href="#"><img src="/skin/images/b04.png" alt="" /><br />万千口碑</a></li>
			<li><a href="#"><img src="/skin/images/b05.png" alt="" /><br />活动专区</a></li>
			<li><a href="#"><img src="/skin/images/b06.png" alt="" /><br />精品推荐</a></li>
			<div class="cl"></div>
		</ul>
	</div>
	<div class="bot_list_meau">
		<ul class="index_box">
			<li>
				<h4><img src="/skin/images/c01.png" alt="" />使用帮助</h4>
				<a href="#">新手指南</a><br />
				<a href="#">常见问题</a><br />
				<a href="#">帮助中心</a><br />
				<a href="#">用户协议</a><br />
			</li>
			<li>
				<h4><img src="/skin/images/c01.png" alt="" />支付方式</h4>
				<a href="#">货到付款</a><br />
				<a href="#">在线支付</a><br />
				<a href="#">余额支付</a><br />
				<a href="#">现金卷支付</a><br />
			</li>
			<li>
				<h4><img src="/skin/images/c01.png" alt="" />配送方式</h4>
				<a href="#">买二包邮</a><br />
				<a href="#">配送说明</a><br />
				<a href="#">运费说明</a><br />
				<a href="#">验货签收</a><br />
			</li>
			<li>
				<h4><img src="/skin/images/c01.png" alt="" />售后服务</h4>
				<a href="#">正品承诺</a><br />
				<a href="#">售后咨询</a><br />
				<a href="#">退货政策</a><br />
				<a href="#">退货办理</a><br />
			</li>
			<li>
				<h4><img src="/skin/images/c01.png" alt="" />服务保障</h4>
				<a href="#">正品联盟</a><br />
				<a href="#">30天无条件退货</a><br />
				<a href="#">24小时服务</a><br />
				<a href="#">买二送一</a><br />
			</li>
			<div class="cl"></div>
		</ul>
	</div>
</div>
<div class="min_w copyright_bg tc">
	©2017   完美生活       技术支持：龙采科技
</div>
<script>
    function AddFavorite(sURL, sTitle)
    {
        sURL = encodeURI(sURL);
        try{
            window.external.addFavorite(sURL, sTitle);

        }catch(e) {

            try{

                window.sidebar.addPanel(sTitle, sURL, "");

            }catch (e) {   alert("加入收藏失败，请使用Ctrl+D进行添加,或手动在浏览器里进行设置.");
            }
        }
    }
    function SetHome(url){

        if (document.all) {

            document.body.style.behavior='url(#default#homepage)';

            document.body.setHomePage(url);


        }else{

            alert("您好,您的浏览器不支持自动设置页面为首页功能,请您手动在浏览器里设置该页面为首页!");
        }
    }
    function all_type()
    {
        $(".dn").toggle(500);
        return false;
    }
</script>