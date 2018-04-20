<?php $__env->startSection('main'); ?>
    <!--一条开始-->
    <div class="public_m1">
        <div class="public_m2">资料管理</div>
        <!--照片和内容-->
        <div class="zp_nrm">
            <!--left-->
            <?php if($user->portrait !=''): ?>
                <div class="zp_nrm_l"> <img src="<?php echo e($user->portrait); ?>"/> <a href="#">更换头像</a> </div>
        <?php endif; ?>
        <!--right-->
            <div class="zp_nrm_r">
                <p><em>用户名：</em><i><?php echo e($user->username); ?></i></p>
                <p><em>邮箱：</em>
                    <?php if($user->email !=''): ?>
                        <?php echo e($user->email); ?>

                    <?php else: ?>
                        <i>未设置</i><a href="#">立即设置</a>
                    <?php endif; ?>
                </p>
                <p><em>手机号：</em><i><?php echo e($user->phone); ?></i></p>
                <p><em>性别：</em>

                    <input type="radio" name="sex" class="sex_m" value="0" <?php if($user->sex == 0): ?>checked <?php endif; ?>>
                    <i>男</i>
                    <input type="radio" name="sex" class="sex_m" value="1" <?php if($user->sex == 1): ?>checked <?php endif; ?>>
                    <i>女</i>
                </p>
                
            </div>
        </div>
    </div>
    <!--一条开始-->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('home.public.person', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>