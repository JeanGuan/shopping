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
                <h2>添加文章</h2>
            </div>
            <div class="col-lg-5 col-md-6 col-sm-12">
                <ul class="breadcrumb float-md-right">
                    <li class="breadcrumb-item"><a href="{{url('/admin')}}"><i class="zmdi zmdi-home"></i>系统主页</a></li>
                    <li class="breadcrumb-item"><a href="{{url('/admin/article')}}">文章列表</a></li>
                    <li class="breadcrumb-item active">添加文章</li>
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
                        <h2><strong>Article</strong> Add</h2>
                    </div>
                    <div class="body" >
                        <form id="form_validation" method="POST" action="{{url('/admin/article/')}}">
                        {{csrf_field()}}

                        <!--分类名称 -->
                            <div class="row clearfix">
                                <div class="col-lg-1 col-md-2 col-sm-4 form-control-label">
                                    <label for="title">文章标题</label>
                                </div>
                                <div class="col-lg-2 col-md-10 col-sm-8">
                                    <div class="form-group">
                                        <input type="text"  class="form-control" name="title" required>
                                    </div>
                                </div>
                            </div>
                            <!--所属分类 -->
                            <div class="row clearfix">
                                <div class="col-lg-1 col-md-2 col-sm-4 form-control-label">
                                    <label for="soft">所属分类</label>
                                </div>
                                <div class="col-lg-2 col-md-10 col-sm-8">
                                    <select class="form-control show-tick" name="typeid">
                                        @foreach($arctype as $v)
                                            <option value="{{$v->id}}" >{{$v->typename}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <!--分类icon -->
                            <div class="row clearfix">
                                <div class="col-lg-1 col-md-2 col-sm-4 form-control-label">
                                    <label for="icon">缩略图</label>
                                </div>
                                <div class="col-lg-2 col-md-10 col-sm-8">
                                    <div class="form-group">
                                        <img src="{{asset('skin/timg.jpg')}}" id="demo" class="img-responsive">
                                        <input type="text" name="img" id="img" autocomplete="off" class="form-control" value="" >
                                        <span type="button" class="btn btn-raised btn-primary waves-effect btn-round"  id="test">上传图片</span>
                                    </div>

                                </div>
                            </div>
                            <!--排序id -->
                            <div class="row clearfix">
                                <div class="col-lg-1 col-md-2 col-sm-4 form-control-label">
                                    <label for="order_id">作者</label>
                                </div>
                                <div class="col-lg-2 col-md-10 col-sm-8">
                                    <div class="form-group">
                                        <input type="text"  class="form-control" name="writer" value="admin" >
                                    </div>
                                </div>
                            </div>

                            <!--发布时间 -->
                            <div class="row clearfix">
                                <div class="col-lg-1 col-md-2 col-sm-4 form-control-label">
                                    <label for="order_id">发布时间</label>
                                </div>
                                <div class="col-lg-2 col-md-10 col-sm-8">
                                    <div class="form-group">
                                        <input type="text"  id="test5" placeholder="y-M-d H:i:s" class="form-control" name="time"  >
                                    </div>
                                </div>
                            </div>

                            <!--关键词 -->
                            <div class="row clearfix">
                                <div class="col-lg-1 col-md-2 col-sm-4 form-control-label">
                                    <label for="keywords">关键词</label>
                                </div>
                                <div class="col-lg-2 col-md-10 col-sm-8">
                                    <div class="form-group">
                                        <input type="text"  class="form-control" name="keywords" >
                                    </div>
                                </div>
                            </div>
                            <!--描述 -->
                            <div class="row clearfix">
                                <div class="col-lg-1 col-md-2 col-sm-4 form-control-label">
                                    <label for="description">描述</label>
                                </div>
                                <div class="col-lg-2 col-md-10 col-sm-8">
                                    <div class="form-group">
                                        <textarea name="description" cols="30" rows="5"  class="form-control no-resize"  aria-required="true"></textarea>
                                    </div>
                                </div>
                            </div>

                            <!--内容 -->
                            <div class="row clearfix">
                                <div class="col-lg-1 col-md-2 col-sm-4 form-control-label">
                                    <label for="description">文章内容</label>
                                </div>
                                <div class="col-lg-2 col-md-10 col-sm-8">
                                    <div class="form-group">
                                        <script type="text/javascript" charset="utf-8" src="{{url('/org/ueditor/ueditor.config.js')}}"></script>
                                        <script type="text/javascript" charset="utf-8" src="{{url('/org/ueditor/ueditor.all.min.js')}}"> </script>
                                        <script type="text/javascript" charset="utf-8" src="{{url('/org/ueditor/lang/zh-cn/zh-cn.js')}}"></script>
                                        <script type="text/javascript">
                                            //实例化编辑器
                                            var ue = UE.getEditor('editor');
                                        </script>
                                        <script id="editor" name="content" type="text/plain" style="width: 800px;height: 300px" ></script>

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
    layui.use('laydate', function(){
        var laydate = layui.laydate;
        //时间选择器
        laydate.render({
            elem: '#test5'
            ,type: 'datetime'
        });
    });
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

