
<?php $__env->startSection('head'); ?>
<!-- Favicon-->
<link rel="stylesheet" href="/assets/plugins/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="/assets/plugins/footable-bootstrap/css/footable.bootstrap.min.css">
<link rel="stylesheet" href="/assets/plugins/footable-bootstrap/css/footable.standalone.min.css">
<!-- Custom Css -->
<link rel="stylesheet" href="/assets/css/main.css">
<link rel="stylesheet" href="/assets/css/color_skins.css">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('main'); ?>
<section class="content">
    <div class="block-header">
        <div class="row">
            <div class="col-lg-7 col-md-6 col-sm-12">
                <h2>会员列表</h2>
            </div>
            <div class="col-lg-5 col-md-6 col-sm-12">
                <ul class="breadcrumb float-md-right">
                    <li class="breadcrumb-item"><a href="<?php echo e(url('/admin')); ?>"><i class="zmdi zmdi-home"></i> 系统主页</a></li>
                    <li class="breadcrumb-item active">会员列表</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <!-- Basic Table -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="header">
                        <h2><strong>User</strong> List</h2>
                        <ul class="header-dropdown">
                            <li class="dropdown">
                                <a href="<?php echo e(url('/admin/user/create')); ?>"  class="badge badge-warning">添加会员</a>
                            </li>

                        </ul>
                    </div>
                    <div class="body table-responsive">
                        <table class="table table-striped m-b-0">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>用户名</th>
                                    <th>用户租</th>
                                    <th>邮箱</th>
                                    <th>电话</th>
                                    <th>注册时间</th>
                                    <th>状态</th>
                                    <th>操作</th>
                                </tr>
                            </thead>
                                <tbody>
                                <tr>
                                    <?php $__currentLoopData = $user; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <td><?php echo e($v->id); ?></td>
                                    <td><?php echo e($v->username); ?></td>
                                    <th><?php echo e($v->aid); ?></th>
                                    <th><?php echo e($v->email); ?></th>
                                    <th><?php echo e($v->phone); ?></th>
                                    <td><?php echo e(date('Y-m-d H:i:s',$v->time)); ?></td>
                                    <td>
                                        <?php if($v->status == 0): ?>
                                        <span class="badge badge-success"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">开启</font></font></span></td>
                                        <?php else: ?>
                                        <span class="badge badge-primary"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">禁用</font></font></span>
                                        <?php endif; ?>
                                    <td>
                                        <a href="<?php echo e(url('/admin/user/'.$v->id.'/edit')); ?>" class="badge badge-success">编辑</a>
                                        <a href="javascript:;" id="del" onclick="delcCate(<?php echo e($v->id); ?>)" class="badge badge-danger">删除</a>
                                    </td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                            <tfoot>
                            <tr class="footable-paging">
                                <td colspan="5">
                                     <?php echo e($user->links()); ?>

                                    <div class="divider"></div>
                                </td>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    function delcCate(id) {
        //询问框
        layer.confirm('是否删除该会员？', {
            btn: ['确定', '取消'] //按钮
        }, function () {
            $.post("<?php echo e(url('admin/user/')); ?>/" + id, {
                '_method': 'delete',
                '_token': '<?php echo e(csrf_token()); ?>'
            }, function (data) {
                if (data.status == 1) {
                    layer.msg(data.msg, {icon: 6});
                    $("#del"+id).remove();
                } else {
                    layer.msg(data.msg, {icon: 5});
                }
            });

        });
    }
</script>
<!-- Jquery Core Js --> 
<script src="/assets/bundles/libscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js --> 
<script src="/assets/bundles/vendorscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js -->

<script src="/assets/bundles/footable.bundle.js"></script> <!-- Lib Scripts Plugin Js -->

<script src="/assets/bundles/mainscripts.bundle.js"></script><!-- Custom Js -->
<script src="/assets/js/pages/tables/footable.js"></script><!-- Custom Js -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.public.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>