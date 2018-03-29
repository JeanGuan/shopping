@extends('admin.public.admin')
@section('head')
<link rel="stylesheet" href="/assets/plugins/bootstrap/css/bootstrap.min.css">
<!-- Bootstrap Select Css -->
<link rel="stylesheet" href="/assets/plugins/bootstrap-select/css/bootstrap-select.css" />
<!-- Custom Css -->
<link rel="stylesheet" href="/assets/css/main.css">
<link rel="stylesheet" href="/assets/css/color_skins.css">
@endsection
@section('main')
<section class="content">
    <div class="block-header">
        <div class="row">
            <div class="col-lg-7 col-md-6 col-sm-12">
                <h2>编辑管理员</h2>
            </div>
            <div class="col-lg-5 col-md-6 col-sm-12">
                <ul class="breadcrumb float-md-right">
                    <li class="breadcrumb-item"><a href="{{url('/admin')}}"><i class="zmdi zmdi-home"></i>系统主页</a></li>
                    <li class="breadcrumb-item"><a href="{{url('/admin/admin')}}">管理员列表</a></li>
                    <li class="breadcrumb-item active">编辑管理员</li>
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
                        <h2><strong>Admin</strong> Edit</h2>
                    </div>
                    <div class="body" >
                        <form id="form_validation" method="POST" action="{{url('admin/admin/'.$field->id)}}">
                            <input type="hidden" name="_method" value="put">
                            {{csrf_field()}}
                            <!--用户名 -->
                            <div class="row clearfix">
                                <div class="col-lg-1 col-md-2 col-sm-4 form-control-label">
                                    <label for="name">用户名</label>
                                </div>
                                <div class="col-lg-2 col-md-10 col-sm-8">
                                    <div class="form-group">
                                        <input type="text"  class="form-control" name="name" maxlength="16" minlength="4" value="{{$field->name}}" require>
                                    </div>
                                </div>
                            </div>
                            <!--所属级别 -->
                            <div class="row clearfix">
                                <div class="col-lg-1 col-md-2 col-sm-4 form-control-label">
                                    <label for="soft">所属级别</label>
                                </div>
                                <div class="col-lg-2 col-md-10 col-sm-8">
                                    <select class="form-control show-tick" name="type_id">
                                        <option @if($field->type_id ==3) selected @endif value="3">实习管理员</option>
                                        <option @if($field->type_id ==2) selected @endif value="2">正式管理员</option>
                                        <option @if($field->type_id ==1) selected @endif value="1">超级管理员</option>
                                    </select>
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
                                            <input type="radio" name="status" id="male" class="with-gap" @if($field->status == 0) checked @endif value="0" >
                                            <label for="male">启用</label>
                                        </div>
                                        <div class="radio inlineblock">
                                            <input type="radio" name="status" id="Female" class="with-gap" @if($field->status == 1) checked @endif value="1" >
                                            <label for="Female">禁用</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--注册时间 -->
                            <div class="row clearfix">
                                <div class="col-lg-1 col-md-2 col-sm-4 form-control-label">
                                    <label for="time">注册时间</label>
                                </div>
                                <div class="col-lg-2 col-md-10 col-sm-8">
                                    <div class="form-group">
                                        <input type="text"  class="form-control"  name="time" value="{{date('Y-m-d H:i:s',$field->time)}}" readonly>
                                    </div>
                                </div>
                            </div>
                            <!--最后登录 -->
                            <div class="row clearfix">
                                <div class="col-lg-1 col-md-2 col-sm-4 form-control-label">
                                    <label for="lasttime">最后登录</label>
                                </div>
                                <div class="col-lg-2 col-md-10 col-sm-8">
                                    <div class="form-group">
                                        <input type="text"  class="form-control" name="lasttime" value="{{date('Y-m-d H:i:s',$field->last_time)}}" readonly>
                                    </div>
                                </div>
                            </div>
                            <!--登陆次数 -->
                            <div class="row clearfix">
                                <div class="col-lg-1 col-md-2 col-sm-4 form-control-label">
                                    <label for="count">登录次数</label>
                                </div>
                                <div class="col-lg-2 col-md-10 col-sm-8">
                                    <div class="form-group">
                                        <input type="number"  class="form-control" name="count" value="{{$field->count}}" readonly>
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
@endsection

