@extends('admin.public.admin')
@section('head')
<!-- Favicon-->
<link rel="stylesheet" href="/assets/plugins/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="/assets/plugins/footable-bootstrap/css/footable.bootstrap.min.css">
<link rel="stylesheet" href="/assets/plugins/footable-bootstrap/css/footable.standalone.min.css">
<!-- Custom Css -->
<link rel="stylesheet" href="/assets/css/main.css">
<link rel="stylesheet" href="/assets/css/color_skins.css">
@endsection

@section('main')
<section class="content">
    <div class="block-header">
        <div class="row">
            <div class="col-lg-7 col-md-6 col-sm-12">
                <h2>系统参数设置</h2>
            </div>
            <div class="col-lg-5 col-md-6 col-sm-12">
                <ul class="breadcrumb float-md-right">
                    <li class="breadcrumb-item"><a href="{{url('/admin')}}"><i class="zmdi zmdi-home"></i> 系统主页</a></li>
                    <li class="breadcrumb-item active">系统参数</li>
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
                        <h2><strong>Config</strong> </h2>
                    </div>
                    <div class="body" >
                        <form id="form_validation" method="POST" action="{{url('/admin/config')}}">
                        {{csrf_field()}}

                            <!--站点名称 -->
                            <div class="row clearfix">
                                <div class="col-lg-1 col-md-2 col-sm-4 form-control-label">
                                    <label for="web_name">站点名称</label>
                                </div>
                                <div class="col-lg-2 col-md-10 col-sm-8">
                                    <div class="form-group">
                                        <input type="text"  class="form-control" name="web_name" value="{{config('web.web_name')}}" placeholder="web_name" required>
                                    </div>
                                </div>
                            </div>
                            <!--站点logo -->
                            <div class="row clearfix">
                                <div class="col-lg-1 col-md-2 col-sm-4 form-control-label">
                                    <label for="logo">站点logo</label>
                                </div>
                                <div class="col-lg-2 col-md-10 col-sm-8">
                                    <div class="form-group">
                                        @if(config('web.logo') != null)
                                            <img src="{{config('web.logo')}}" id="demo" class="img-responsive">
                                        @else
                                            <img src="{{asset('skin/timg.jpg')}}" id="demo1" class="img-responsive">
                                        @endif

                                        <input type="text" name="logo" id="logo" autocomplete="off" class="form-control" value="{{config('web.logo')}}"  placeholder="logo"  required>
                                        <span type="button" class="btn btn-raised btn-primary waves-effect btn-round"  id="test">上传图片</span>
                                    </div>
                                </div>
                            </div>

                            <!--首页标题 -->
                            <div class="row clearfix">
                                <div class="col-lg-1 col-md-2 col-sm-4 form-control-label">
                                    <label for="index_title">网站标题</label>
                                </div>
                                <div class="col-lg-2 col-md-10 col-sm-8">
                                    <div class="form-group">
                                        <input type="text"  class="form-control" name="index_title"  value="{{config('web.index_title')}}"  placeholder="index_title">
                                    </div>
                                </div>
                            </div>

                            <!--网站关键词 -->
                            <div class="row clearfix">
                                <div class="col-lg-1 col-md-2 col-sm-4 form-control-label">
                                    <label for="keywords">网站关键词</label>
                                </div>
                                <div class="col-lg-2 col-md-10 col-sm-8">
                                    <div class="form-group">
                                        <input type="text"  class="form-control" name="keywords" value="{{config('web.keywords')}}" placeholder="keywords">
                                    </div>
                                </div>
                            </div>

                            <!--网站描述 -->
                            <div class="row clearfix">
                                <div class="col-lg-1 col-md-2 col-sm-4 form-control-label">
                                    <label for="description">网站描述</label>
                                </div>
                                <div class="col-lg-2 col-md-10 col-sm-8">
                                    <div class="form-group">
                                        <textarea name="description" cols="30" rows="5"  class="form-control no-resize" placeholder="description"  aria-required="true">{{config('web.description')}}</textarea>
                                    </div>
                                </div>
                            </div>

                            <!--第三方统计 -->
                            <div class="row clearfix">
                                <div class="col-lg-1 col-md-2 col-sm-4 form-control-label">
                                    <label for="count">第三方统计</label>
                                </div>
                                <div class="col-lg-2 col-md-10 col-sm-8">
                                    <div class="form-group">
                                        <textarea name="count" cols="30" rows="5"  class="form-control no-resize" placeholder="count"  aria-required="true">{{config('web.count')}}</textarea>
                                    </div>
                                </div>
                            </div>

                            <!--版权 -->
                            <div class="row clearfix">
                                <div class="col-lg-1 col-md-2 col-sm-4 form-control-label">
                                    <label for="copyright">版权</label>
                                </div>
                                <div class="col-lg-2 col-md-10 col-sm-8">
                                    <div class="form-group">
                                        <input type="text"  class="form-control" name="copyright" value="{{config('web.copyright')}}" placeholder="copyright"  >
                                    </div>
                                </div>
                            </div>
                            <!--站点状态 -->
                            <div class="row clearfix">
                                <div class="col-lg-1 col-md-2 col-sm-4 form-control-label">
                                    <label for="status">站点状态</label>
                                </div>
                                <div class="col-lg-2 col-md-10 col-sm-8">
                                    <div class="form-group">
                                        <div class="radio inlineblock m-r-20">
                                            <div class="radio inlineblock">
                                                <input type="radio" name="status" id="Female" class="with-gap" value="1" @if(config('web.status') == 1) checked @endif  >
                                                <label for="Female">开启</label>
                                            </div>
                                            <input type="radio" name="status" id="male" class="with-gap" value="0" @if(config('web.status') == 0) checked @endif >
                                            <label for="male">关闭</label>
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
                    $('#logo').val(res['src']);
                    return layer.msg('logo上传成功!');

                } else {
                    return layer.msg('logo上传失败!');
                }

            }
        });
    });
</script>
<!-- Jquery Core Js --> 
<script src="/assets/bundles/libscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js --> 
<script src="/assets/bundles/vendorscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js -->

<script src="/assets/bundles/footable.bundle.js"></script> <!-- Lib Scripts Plugin Js -->

<script src="/assets/bundles/mainscripts.bundle.js"></script><!-- Custom Js -->
<script src="/assets/js/pages/tables/footable.js"></script><!-- Custom Js -->
@endsection
