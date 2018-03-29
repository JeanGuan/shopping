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
                <h2>管理员组</h2>
            </div>
            <div class="col-lg-5 col-md-6 col-sm-12">
                <ul class="breadcrumb float-md-right">
                    <li class="breadcrumb-item"><a href="{{url('/admin')}}"><i class="zmdi zmdi-home"></i> 系统主页</a></li>
                    <li class="breadcrumb-item active">管理组</li>
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
                        <h2><strong>Admin</strong> Level</h2>
                        <ul class="header-dropdown">
                            <li class="dropdown">
                                <a href="{{url('/admin/admintypes/create')}}" title="添加级别" class="badge badge-warning">添加管理组</a>
                            </li>

                        </ul>
                    </div>
                    <div class="body table-responsive">
                        <table class="table table-striped m-b-0">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>管理组</th>
                                    <th>Rank</th>
                                    <th>操作</th>
                                </tr>
                            </thead>
                                <tbody>
                                @foreach($admintypes as $v)
                                <tr>
                                    <td>{{$v->id}}</td>
                                    <td>{{$v->typename}}</td>
                                    <th>{{$v->rank}}</th>
                                    <td>
                                        <a href="{{url('admin/admintypes/'.$v->id.'/edit')}}"  class="badge badge-success">编辑</a>
                                        <a href="javascript:;"  onclick="delcCate({{$v->id}})" class="badge badge-danger">删除</a>
                                    </td>
                                </tr>
                                @endforeach

                            </tbody>
                            <tfoot>
                            <tr class="footable-paging">
                                <td colspan="5">
                                    {{$admintypes->links()}}
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
        layer.confirm('是否删除该级别?', {
            btn: ['确定', '取消'] //按钮
        }, function () {
            $.post("{{url('admin/admintypes/')}}/" + id, {
                '_method': 'delete',
                '_token': '{{csrf_token()}}'
            }, function (data) {
                if (data.status == 1) {
                    layer.msg(data.msg, {icon: 6});
                    setTimeout(function(){
                        window.location.reload();//2秒后页面刷新
                    },1000);
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
