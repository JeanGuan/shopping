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
                <h2>订单状态列表</h2>
            </div>
            <div class="col-lg-5 col-md-6 col-sm-12">
                <ul class="breadcrumb float-md-right">
                    <li class="breadcrumb-item"><a href="{{url('/admin')}}"><i class="zmdi zmdi-home"></i> 系统主页</a></li>
                    <li class="breadcrumb-item active">订单状态列表</li>
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
                        <h2><strong>OrderStatus</strong> List</h2>
                    </div>
                    <div class="body table-responsive">

                       <table class="table table-striped m-b-0">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>订单状态名称</th>
                                    <th></th>
                                </tr>
                            </thead>
                                <tbody>
                                @foreach($status as $v)

                                    <td>{{$v->id}}</td>
                                    <td>
                                        <div class="col-lg-2 col-md-10 col-sm-8">
                                        <input class="form-control" type="text" value="{{$v->name}}">
                                        </div>
                                    </td>
                                    <style>.footable .yc{display: none}</style>
                                    <td> <button id="" type="button" class="yc btn bg-purple waves-effect " >确认修改</button></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
        $("input:text").focus(function() {
            $('.yc').hide();
            $(this).next("button").show();

        });

</script>
<!-- Jquery Core Js --> 
<script src="/assets/bundles/libscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js --> 
<script src="/assets/bundles/vendorscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js -->

<script src="/assets/bundles/footable.bundle.js"></script> <!-- Lib Scripts Plugin Js -->

<script src="/assets/bundles/mainscripts.bundle.js"></script><!-- Custom Js -->
<script src="/assets/js/pages/tables/footable.js"></script><!-- Custom Js -->
@endsection
