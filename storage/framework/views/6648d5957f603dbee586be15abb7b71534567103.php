
<?php $__env->startSection('head'); ?>
<link rel="stylesheet" href="/assets/plugins/bootstrap/css/bootstrap.min.css">
<!-- Bootstrap Select Css -->
<link rel="stylesheet" href="/assets/plugins/bootstrap-select/css/bootstrap-select.css" />
<!-- Custom Css -->
<link rel="stylesheet" href="/assets/css/main.css">
<link rel="stylesheet" href="/assets/css/color_skins.css">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('main'); ?>
<section class="content">
    <div class="block-header">
        <div class="row">
            <div class="col-lg-7 col-md-6 col-sm-12">
                <h2>评论管理</h2>
            </div>
            <div class="col-lg-5 col-md-6 col-sm-12">
                <ul class="breadcrumb float-md-right">
                    <li class="breadcrumb-item"><a href="/admin"><i class="zmdi zmdi-home"></i>系统主页</a></li>
                    <li class="breadcrumb-item active">评论列表</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <!-- Basic Validation -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="header">
                        <h2><strong>Comment</strong> List</h2>
                    </div>
                    <div class="body" >
                        <table class="table table-striped m-b-0">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>用户</th>
                                <th>商品名称</th>
                                <th>商品图片</th>
                                <th>星级</th>
                                <th>评论时间</th>
                                <th>状态</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $comment; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($v->id); ?></td>
                                    <td><?php echo e($v->username); ?></td>
                                    <td><img src="<?php echo e($v->picurl); ?>" width="50"></td>
                                    <td><?php echo e($v->title); ?></td>
                                    <td><span class="badge badge-warning"><?php echo e(str_repeat("★",$v->start)); ?><?php echo e(str_repeat("☆",5-$v->start)); ?></span></td>
                                    <td><?php echo e(date('Y-m-d H:i:s',$v->time)); ?></td>
                                    <td>
                                        <div class="col-lg-8 col-md-10 col-sm-8">
                                            <select id="" name="status" onchange="status(this,<?php echo e($v->id); ?>)" class="form-control show-tick" >
                                                <option <?php if($v->status == 0): ?> selected <?php endif; ?> value="0">未审核</option>
                                                <option <?php if($v->status == 1): ?> selected <?php endif; ?> value="1">正常</option>
                                                <option <?php if($v->status == 2): ?> selected <?php endif; ?> value="2">黑名单</option>
                                            </select>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="8">评论：<?php echo e($v->text); ?></td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                            <tfoot>
                            <tr class="footable-paging">
                                <td colspan="5">
                                    <?php echo e($comment->links()); ?>

                                    <div class="divider"></div>
                                </td>
                            </tr>
                            </tfoot>
                        </table>

                    </div>
                </div>
            </div>
        </div>
        <!-- #END# Basic Validation -->
    </div>
</section>
<script>
    //评论状态
    function status(obj,id) {
        //获取状态值
       val = $(obj).val();
       //ajax请求
       $.post("/admin/comment/status",{"id":id,"status":val,"_token":'<?php echo e(csrf_token()); ?>'},function (data) {
           if (data.stasus == 1){
               layer.msg(data.msg, {icon: 4});
               setTimeout(function(){
                   window.location.reload();//2秒后页面刷新
               },1000);
           }else{
               setTimeout(function(){
                   window.location.reload();//2秒后页面刷新
               },1000);
               layer.msg(data.msg, {icon: 6});
           }
       })
       //alert(id);
    }
</script>
<!-- Jquery Core Js -->
<script src="/assets/bundles/libscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js -->
<script src="/assets/bundles/vendorscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js -->
<script src="/assets/plugins/jquery-validation/jquery.validate.js"></script> <!-- Jquery Validation Plugin Css -->
<script src="/assets/plugins/jquery-steps/jquery.steps.js"></script> <!-- JQuery Steps Plugin Js -->
<script src="/assets/bundles/mainscripts.bundle.js"></script><!-- Custom Js -->
<script src="/assets/js/pages/forms/form-validation.js"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.public.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>