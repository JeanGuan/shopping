<?php $__env->startSection('main'); ?>
    <div class="public_m1">
        <div class="public_m2">商品收藏</div>
        <!--全选和删除-->
        <div class="chice_allm">
            <i><input id="chkAll" type="checkbox" onclick="checkAll(this)">全选</i>
            <a href="javascript:void(0)" onclick="delCollect()">删除</a> </div>
        <!--收藏开始-->
        <div class="rensw_bejm">
            <ul>
                <?php $__currentLoopData = $goods; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li> <img src="<?php echo e($v->picurl); ?>" title="<?php echo e($v->title); ?>">
                        <h5><a href="<?php echo e(url('goods/'.$v->gid)); ?>"><?php echo e($v->title); ?></a></h5>
                    <span>人气：<i>5000</i> <input type="checkbox" name="gid" value="<?php echo e($v->gid); ?>"/></span>
                </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    </div>
    <script>
        //全选checkbox
        function checkAll(e)
        {
            var t=document.getElementsByName("gid");
            for(var i=0;i<t.length;i++)
            {
                t[i].checked=document.getElementById("chkAll").checked;
            }
        }
        
        //删除收藏商品
        function delCollect() {
            var checkboxValue;
            var gid = $("input[name='gid']:checked").each(function(j) {
                if (j >= 0) {
                    checkboxValue += $(this).val() + ",";
                }
            });
            $.ajax({
                type:'post',
                url:'/person/delcollection',
                date:{gid:gid,_token:'<?php echo e(csrf_token()); ?>'},
                success:function (data) {
                    alert(data.msg)
                },
                error:function (data) {
                    alert(data.msg)
                }
            })
        }
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('home.public.person', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>