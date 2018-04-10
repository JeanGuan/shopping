<ul class="nav_type_list rel">
    <?php $__currentLoopData = $types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $class): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <li class="nav_type_bg">
            <span class="fl nav_type_icon01"><img src="<?php echo e($class['icon']); ?>" alt="" /></span>
            <span class="fl nav_type_icon02"><img src="<?php echo e($class['icon']); ?>" alt="" /></span>
            <span class="f16"><a href="<?php echo e(url('/types/'.$class['id'])); ?>"><?php echo e($class['typename']); ?></a></span>
            <div class="nav_type_meau">
                <ul>
                    <?php $__currentLoopData = $class['subclass']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $class2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li>
                            <b class="fl nav_type_meau_name"><a href="<?php echo e(url('/types/'.$class2->id)); ?>"><?php echo e($class2->typename); ?></a></b>
                            <div class="fr nav_type_meau_con">
                                <?php $__currentLoopData = $class2['subclass']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $class3): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <a href="<?php echo e(url('/types/'.$class3->id)); ?>"><?php echo e($class3->typename); ?></a>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                            <div class="cl"></div>
                        </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        </li>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</ul>
