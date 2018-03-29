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
                <h2>轮播图列表</h2>
            </div>
            <div class="col-lg-5 col-md-6 col-sm-12">
                <ul class="breadcrumb float-md-right">
                    <li class="breadcrumb-item"><a href="{{url('/admin')}}"><i class="zmdi zmdi-home"></i> 系统主页</a></li>
                    <li class="breadcrumb-item active">轮播图</li>
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
                        <h2><strong>Slider</strong> List</h2>
                        <ul class="header-dropdown">
                            <li class="dropdown">
                                <a href="{{url('/admin/slider/create')}}"  class="badge badge-warning">添加轮播图</a>
                            </li>

                        </ul>
                    </div>
                    <div class="body table-responsive">
                        <table class="table table-striped m-b-0">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>标题</th>
                                    <th>缩略图</th>
                                    <th>链接</th>
                                    <th>排序</th>
                                    <th>状态</th>
                                    <th>操作</th>
                                </tr>
                            </thead>
                                <tbody>
                                <tr>
                                    @foreach($slider as $v)
                                    <td>{{$v->id}}</td>
                                    <td>{{$v->title}}</td>
                                    <th>
                                        @if($v->img != null)
                                            <img src="{{$v->img}}" style=" width: 100px; height: 60px;">
                                        @else
                                            <img src="{{asset('skin/timg.jpg')}}" style=" width: 100px; height: 60px;" >
                                        @endif
                                    </th>
                                    <td>{{$v->href}}</td>
                                    <td>
                                        <div class="form-group">
                                             <input type="text" onchange="changeOrder(this,{{$v->id}})"  name="ord[]" value="{{$v->order_id}}" class="form-control col-lg-3" >
                                        </div>
                                    </td>
                                    <td>
                                        @if($v->status == 0)
                                        <span class="badge badge-success"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">开启</font></font></span>
                                        @else
                                        <span class="badge badge-primary"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">禁用</font></font></span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{url('/admin/slider/'.$v->id.'/edit')}}" class="badge badge-success">编辑</a>
                                        <a href="javascript:;" onclick="delcCate({{$v->id}})" class="badge badge-danger">删除</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                            <tr class="footable-paging">
                                <td colspan="5">
                                    {{$slider->links()}}
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
    //轮播图ajax排序
    function changeOrder(obj,id) {
        var order_id = $(obj).val();
        $.post('slider/changeOrder',{'_token':'{{csrf_token()}}','id':id,'order_id':order_id},function (data) {
            if (data.states == 1){
                setTimeout(function(){
                    window.location.reload();//2秒后页面刷新
                },1000);
                layer.msg(data.msg, {icon: 4});
            }else{
                setTimeout(function(){
                    window.location.reload();//2秒后页面刷新
                },1000);
                layer.msg(data.msg, {icon: 6});
            }

        });
    }

    function delcCate(id) {
        //询问框
        layer.confirm('是否删除该轮播图？', {
            btn: ['确定', '取消'] //按钮
        }, function () {
            $.post("{{url('admin/slider/')}}/" + id, {
                '_method': 'delete',
                '_token': '{{csrf_token()}}'
            }, function (data) {
                if (data.status == 1) {
                    setTimeout(function () {  //使用  setTimeout（）方法设定定时2000毫秒
                        window.location.reload();//2秒后页面刷新
                    }, 1000);
                    layer.msg(data.msg, {icon: 6});
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
@endsection
