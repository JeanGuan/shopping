﻿
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
                <h2>添加会员</h2>
            </div>
            <div class="col-lg-5 col-md-6 col-sm-12">
                <ul class="breadcrumb float-md-right">
                    <li class="breadcrumb-item"><a href="/admin"><i class="zmdi zmdi-home"></i>系统主页</a></li>
                    <li class="breadcrumb-item"><a href="/admin/user">会员列表</a></li>
                    <li class="breadcrumb-item active">添加会员</li>
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
                        <h2><strong>User</strong> Add</h2>
                    </div>
                    <div class="body" >
                        <form id="form_validation" method="POST" action="/admin/user">
                        <?php echo e(csrf_field()); ?>

                            <!--用户名 -->
                            <div class="row clearfix">
                                <div class="col-lg-1 col-md-2 col-sm-4 form-control-label">
                                    <label for="username">用户名</label>
                                </div>
                                <div class="col-lg-2 col-md-10 col-sm-8">
                                    <div class="form-group">
                                        <input type="text"  class="form-control" name="username" maxlength="16" minlength="4" required>
                                    </div>
                                </div>
                            </div>

                            <!--密码 -->
                            <div class="row clearfix">
                                <div class="col-lg-1 col-md-2 col-sm-4 form-control-label">
                                    <label for="password">密码</label>
                                </div>
                                <div class="col-lg-2 col-md-10 col-sm-8">
                                    <div class="form-group">
                                        <input type="password"  class="form-control" name="password" maxlength="16" minlength="8" required>
                                    </div>
                                </div>
                            </div>

                            <!--确认密码 -->
                            <div class="row clearfix">
                                <div class="col-lg-1 col-md-2 col-sm-4 form-control-label">
                                    <label for="password2">确认密码</label>
                                </div>
                                <div class="col-lg-2 col-md-10 col-sm-8">
                                    <div class="form-group">
                                        <input type="password"  class="form-control" name="password2" maxlength="16" minlength="8" required>
                                    </div>
                                </div>
                            </div>

                            <!--管理员状态 -->
                            <div class="row clearfix">
                                <div class="col-lg-1 col-md-2 col-sm-4 form-control-label">
                                    <label for="status">状态</label>
                                </div>
                                <div class="col-lg-2 col-md-10 col-sm-8">
                                    <div class="form-group">
                                        <div class="radio inlineblock m-r-20">
                                            <input type="radio" name="status" id="male" class="with-gap" value="0" checked="">
                                            <label for="male">启用</label>
                                        </div>
                                        <div class="radio inlineblock">
                                            <input type="radio" name="status" id="Female" class="with-gap" value="1" >
                                            <label for="Female">禁用</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-raised btn-primary btn-round waves-effect" type="submit">提交</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- #END# Basic Validation --> 

    </div>
</section>
<!-- Jquery Core Js -->
<script src="/assets/bundles/libscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js -->
<script src="/assets/bundles/vendorscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js -->

<script src="/assets/plugins/jquery-validation/jquery.validate.js"></script> <!-- Jquery Validation Plugin Css -->
<script src="/assets/plugins/jquery-steps/jquery.steps.js"></script> <!-- JQuery Steps Plugin Js -->

<script src="/assets/bundles/mainscripts.bundle.js"></script><!-- Custom Js -->
<script src="/assets/js/pages/forms/form-validation.js"></script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin.public.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>