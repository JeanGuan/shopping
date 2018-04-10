<!doctype html>
<html>
<head>
<title><?php echo e(config('web.index_title')); ?>_<?php echo e(config('web.web_name')); ?></title>
<meta name="keywords" content="<?php echo e(config('web.keywords')); ?>" />
<meta name="description" content="<?php echo e(config('web.description')); ?>" />
<meta charset="utf-8">
<meta name="format-detection" content="telephone=no">
<link href="/skin/style/webstyle.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="/skin/js/jquery-1.11.3.js"></script>
<script src="/skin/js/banner.js"></script>
</head>

<body>
<!--header start-->
<?php echo $__env->make('home.public.top', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('home.public.head', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<!--header end-->

<!--banner-->
<div class="banner">
	<div class="b-img">
		<?php $__currentLoopData = $banner; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		<a href="<?php echo e($v->href); ?>" style="background:url(<?php if($v->img != null): ?><?php echo e($v->img); ?><?php endif; ?> ) center no-repeat;" title="<?php echo e($v->title); ?>"></a>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	</div>
	<div class="b-list"></div>
	<a class="bar-left" href="#"><em></em></a><a class="bar-right" href="#"><em></em></a>
</div>
<!--banner-->

<!--楼层导航 start-->
<div class="floor_pos">
	<div class="floor_tit tc">楼层导航</div>
	<ul class="floor_list tc">
		<?php $__currentLoopData = $goods; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $class): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		<li><a href="#<?php echo e($class['key']); ?>f" ><span class="red fb"><?php echo e($class['key']); ?>F</span><br /><?php echo e($class['title']); ?>  </a></li>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	</ul>
</div> 
<!--楼层导航 end-->

<!--购物车客服 start-->
<?php echo $__env->make('Home.public.kf', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
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

<?php $__currentLoopData = $goods; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $class): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	<!--1F 卧室-->
	<div class="index_box mar40" id="<?php echo e($class['key']); ?>f">
		<div class="index_tit">
			<span class="fl index_tit_no"><?php echo e($class['key']); ?>F</span>
			<span class="fl f26"><?php echo e($class['title']); ?></span>
			<a href="<?php echo e(url('/types/'.$class['id'])); ?>" class="fr">MORE></a>
			<div class="cl"></div>
		</div>
		<div class="index_bor">
			<div class="fl index_l index_l_bg0<?php echo e($class['key']); ?>">
				<ul class="index_type index_type0<?php echo e($class['key']); ?> tc">
					<?php $__currentLoopData = $class['type']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $class2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<li><a href="/types/<?php echo e($class2->id); ?>"><?php echo e($class2->typename); ?></a></li>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					<div class="cl"></div>
				</ul>
				<div><img src="/skin/images/a19.png" alt="" /></div>
				<div class="tc index_brand_tit index_brand_tit01">品牌</div>
				<ul class="index_brand_list">
					<?php $__currentLoopData = $class['brand']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<li><a href="<?php echo e(url('/brand/'.$brand->id)); ?>"><img src="<?php echo e($brand->img); ?>" alt="<?php echo e($brand->name); ?>" title="<?php echo e($brand->name); ?>" /></a></li>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
					<?php $__currentLoopData = $class['goods']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $goods): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<li><a href="<?php echo e(url('/goods/'.$goods->id)); ?>">
								<div class="tc"><img src="<?php echo e($goods->picurl); ?>" width="250" height="200" alt="" /></div>
								<div class="index_list_name"><?php echo e($goods->title); ?></div>
								<div class="index_list_price">¥
									<?php if($goods->price != 0): ?>
									<?php echo e($goods->price); ?>

									<?php else: ?>
										<?php echo e($goods->oldprice); ?>

									<?php endif; ?>
								</div>
							</a></li>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					<div class="cl"></div>
				</ul>
			</div>
			<div class="cl"></div>
		</div>
	</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<!--新闻-->
<div class="index_box mar40">
	<div class="news_bor">
		<div class="fl news_box">
			<div class="news_tit">
				<span class="fl f18">装修课堂</span>
				<a href="<?php echo e(url('/arctype/20')); ?>" class="fr">MORE</a>
				<div class="cl"></div>
			</div>
			<ul class="news_school cl">
				<?php $__currentLoopData = $zxkt; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<li><a href="<?php echo e(url('/article/'.$v->id)); ?>">
					<span class="fl news_school_pic"><img src="<?php echo e($v->img); ?>" alt="<?php echo e($v->title); ?>" /></span>
					<div class="fr news_school_con">
						<h3><?php echo e($v->title); ?></h3>
						<?php echo e($v->description); ?>

					</div>
					<div class="cl"></div>
				</a></li>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</ul>
		</div>
		<div class="fl news_box" style="margin-left:50px;">
			<div class="news_tit">
				<span class="fl f18">通知公告</span>
				<a href="<?php echo e(url('/arctype/21')); ?>" class="fr">MORE</a>
				<div class="cl"></div>
			</div>
			<ul class="news_ann cl">
			<?php $__currentLoopData = $notice; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<li><a href="<?php echo e(url('/article/'.$v->id)); ?>"><?php echo e($v->title); ?></a></li>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
<?php echo $__env->make('home.public.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<!--footer end-->

</body>
</html>
