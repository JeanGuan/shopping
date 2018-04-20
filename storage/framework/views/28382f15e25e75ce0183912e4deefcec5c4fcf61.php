<div class="top_bg min_w">
	<div class="index_box f12">
		<span class="fl">欢迎访问完美生活，家装无忧！</span>
		<span class="fl"><img src="/skin/images/a01.png" width="20" height="40" alt="" /></span>
		<?php if(session('Homeuserinfo.id')): ?>
			欢迎<a href="<?php echo e(url('/person')); ?>" class="fl"><?php echo e(session('Homeuserinfo.username')); ?></a>登录！|
			<a href="/logout">退出</a>
		<?php else: ?>
		<a href="<?php echo e(url('login')); ?>" class="fl">请登录</a>
		<a href="<?php echo e(url('register')); ?>" class="fl">免费注册</a>
		<?php endif; ?>
		<span class="fr">客服电话：<span class="red">18346100046</span></span>
		<a onClick="SetHome(window.location)" href="javascript:void(0)" class="fr">设为首页</a>
		<a onclick="AddFavorite(window.location,document.title)"
href="javascript:void(0)" class="fr">收藏本站</a>
		<a href="#" class="fr">帮助中心</a>

		<a href="<?php echo e(url('/cart')); ?>" class="fr"><img src="/skin/images/a02.png" width="20" height="40" alt="" />购物车0<img src="/skin/images/a07.png"/></a>

		<span class="fr">我的完美生活<img src="/skin/images/a07.png"/></span>
	</div>
</div>