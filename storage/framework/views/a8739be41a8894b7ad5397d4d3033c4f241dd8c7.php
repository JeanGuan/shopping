<?php $__env->startSection('main'); ?>

    <div class="public_m1">
        <div class="public_m2">我的订单</div>
        <!--一个订单信息-->
        <div class="public_m5">
            <table border="0" cellspacing="0" cellpadding="0">
                <tbody>
                <tr style=" border-bottom:1px solid #000">
                    <th class="olist1">订单号</th>
                    <th class="olist4">订单总额</th>
                    <th class="olist5">下单时间</th>
                    <th class="olist4">交易状态</th>
                    <th class="olist5">操作</th>
                </tr>
                <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><a href ="javascript:void(0)" id="code_<?php echo e($k); ?>" onclick="orderDetail(<?php echo e($v->id); ?>)"><?php echo e($v->code); ?></a></td>
                    <td>￥<?php echo e($v->total_price); ?></td>
                    <td><?php echo e(date('Y-m-d H:i',$v->time)); ?></td>
                    <td><font class="jdqbsys_m"><?php echo e($v->name); ?></font></td>
                    <td>
                        <?php if($v->status_id == 1): ?>
                        <a href="#">付款</a><a href="#">取消订单</a>
                        <?php elseif($v->status_id <4 && $v->status_id >1): ?>
                        <a href="#">取消订单</a>
                        <?php else: ?>
                        <a href="#">删除订单</a>
                        <?php endif; ?>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </tbody>
            </table>
        </div>
        <!--查看更多-->
        <div class="chagd_m"> <a href="#">查看更多</a> </div>
    </div>

    <div id="order" class="white_content">
        <div class="public_m1">
            <div class="public_m2">订单详情</div>
            <!--一个订单信息-->
            <div class="public_m5">
                <table border="0" cellspacing="0" cellpadding="0">
                    <tbody>
                    <tr style=" border-bottom:1px solid #000">
                        <th class="olist1">订单号</th>
                        <th class="olist4">订单总额</th>
                        <th class="olist5">下单时间</th>
                        <th class="olist4">交易状态</th>
                        <th class="olist5">操作</th>
                    </tr>
                    <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><a href ="javascript:void(0)" id="code_<?php echo e($k); ?>" onclick="orderDetail(<?php echo e($v->id); ?>)"><?php echo e($v->code); ?></a></td>
                            <td>￥<?php echo e($v->total_price); ?></td>
                            <td><?php echo e(date('Y-m-d H:i',$v->time)); ?></td>
                            <td><font class="jdqbsys_m"><?php echo e($v->name); ?></font></td>
                            <td>
                                <?php if($v->status_id == 1): ?>
                                    <a href="#">付款</a><a href="#">取消订单</a>
                                <?php elseif($v->status_id <4 && $v->status_id >1): ?>
                                    <a href="#">取消订单</a>
                                <?php else: ?>
                                    <a href="#">删除订单</a>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </tbody>
                </table>
            </div>
            <!--查看更多-->
            <div class="chagd_m"> <a href="javascript:void(0)" onclick = "closeDetail()">关闭订单详情</a> </div>
        </div>
      </div>
    <div id="closeDetail" class="black_overlay"></div>
    <script>
        function orderDetail(id) {
            document.getElementById('order').style.display='block';
            document.getElementById('closeDetail').style.display='block';
          $.ajax({
                type:'post',
                url:'/person/orderDetail',
                data:{id:id,_token:'<?php echo e(csrf_token()); ?>'},
                success:function($data){
                    var html ="";
                },
                error:function(){
                    alert('error:ajax')
                }
            })
        }

        function closeDetail(){
            document.getElementById('order').style.display='none';
            document.getElementById('closeDetail').style.display='none'
        }
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('home.public.person', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>