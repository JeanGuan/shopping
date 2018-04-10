<div class="container">
    <a href="<?php echo e(url('/')); ?>" class="fl"><img src="<?php echo e(config('web.logo')); ?>" height="160"/></a>
    <div class="fl city_pos">
        <a href=""><img src="/skin/images/a03.png" width="20" height="40" alt="" />
        <span class="red">哈尔滨</span>
        <a href="#">【切换】</a>
    </div>
    <div class="fl search_box">
        <input type="text" placeholder="100平只要8万8 还送21件实木家具" class="fl search_inp main_search_inp" />
        <input type="submit" value="搜 索" class="fl search_btn" />
    </div>
    <div class="fr top_ewm tc"><img src="/skin/images/a05.jpg" alt="" /><br />关注二维码</div>
    <div class="cl"></div>
</div>

<div class="min_w nav_bor">
    <div class="<?php echo e(Request::getPathinfo()=='/' ? 'index_box':'container'); ?> rel">
        <div class="fl nav_type f18" <?php echo e(Request::getPathinfo()=='/' ? '':'onclick=all_type()'); ?>>全部分类</div>
        <div class="nav_type_pos <?php echo e(Request::getPathinfo()=='/' ? '':'dn'); ?>">
            <?php echo $__env->make('home.public.types', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        </div>
       <?php echo $__env->make('home.public.nav', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    </div>
</div>
