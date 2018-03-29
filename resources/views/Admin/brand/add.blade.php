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
                <h2>添加品牌</h2>
            </div>
            <div class="col-lg-5 col-md-6 col-sm-12">
                <ul class="breadcrumb float-md-right">
                    <li class="breadcrumb-item"><a href="{{url('/admin')}}"><i class="zmdi zmdi-home"></i>系统主页</a></li>
                    <li class="breadcrumb-item"><a href="{{url('/admin/brand')}}">品牌列表</a></li>
                    <li class="breadcrumb-item active">添加品牌</li>
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
                        <h2><strong>Brand</strong> Add</h2>
                    </div>
                    <div class="body" >
                        <form id="form_validation" method="POST" action="{{url('/admin/brand/')}}">
                        {{csrf_field()}}

                        <!--品牌名称 -->
                            <div class="row clearfix">
                                <div class="col-lg-1 col-md-2 col-sm-4 form-control-label">
                                    <label for="name">品牌名称</label>
                                </div>
                                <div class="col-lg-2 col-md-10 col-sm-8">
                                    <div class="form-group">
                                        <input type="text"  class="form-control" name="name" required>
                                    </div>
                                </div>
                            </div>
                            <!--所属级别 -->
                            <div class="row clearfix">
                                <div class="col-lg-1 col-md-2 col-sm-4 form-control-label">
                                    <label for="soft">品牌分类</label>
                                </div>
                                <div class="col-lg-2 col-md-10 col-sm-8">
                                    <select class="form-control show-tick" name="typeid">
                                        @foreach($types as $v)
                                        <option value="{{$v->id}}">{{$v->typename}}</option>
                                       @endforeach
                                    </select>
                                </div>
                            </div>
                            <!--品牌logo -->
                            <div class="row clearfix">
                                <div class="col-lg-1 col-md-2 col-sm-4 form-control-label">
                                    <label for="img">品牌logo</label>
                                </div>
                                <div class="col-lg-2 col-md-10 col-sm-8">
                                    <div class="form-group">
                                        <img src="{{asset('skin/timg.jpg')}}" id="demo" class="img-responsive">
                                        <input type="text" name="img" id="img" autocomplete="off" class="form-control" value="" required>
                                        <span type="button" class="btn btn-raised btn-primary waves-effect btn-round"  id="test">上传图片</span>
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
<script>
    layui.use('upload', function () {
        var $ = layui.jquery
            , upload = layui.upload;
        //单图片上传
        var uploadInst = upload.render({
            elem: '#test'
            , size: 200 //限制文件大小，单位 KB
            , exts: 'jpg|jpeg|png|gif'
            , url: '{{url('admin/upload')}}'
            , data: {_token: '{{csrf_token()}}'}    //额外的参数
            , before: function (obj) {
                //预读本地文件示例，不支持ie8
                obj.preview(function (index, file, result) {
                    $('#demo').attr('src', result); //图片链接（base64）
                });
            }
            , done: function (res) {
                //如果上传成功
                if (res.code = 1) {
                    $('#img').val(res['src']);
                    return layer.msg('图片上传成功!');

                } else {
                    return layer.msg('图片上传失败!');
                }
            }
        });
    });
</script>
<!-- Jquery Core Js -->
<script src="/assets/bundles/libscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js -->
<script src="/assets/bundles/vendorscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js -->

<script src="/assets/plugins/jquery-validation/jquery.validate.js"></script> <!-- Jquery Validation Plugin Css -->
<script src="/assets/plugins/jquery-steps/jquery.steps.js"></script> <!-- JQuery Steps Plugin Js -->

<script src="/assets/bundles/mainscripts.bundle.js"></script><!-- Custom Js -->
<script src="/assets/js/pages/forms/form-validation.js"></script>
@endsection

