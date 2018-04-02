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
                    <h2>订单详情</h2>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">
                    <ul class="breadcrumb float-md-right">
                        <li class="breadcrumb-item"><a href="{{url('/admin')}}"><i class="zmdi zmdi-home"></i> 系统主页</a></li>
                        <li class="breadcrumb-item"><a href="{{url('/admin/orders')}}">订单列表</a></li>
                        <li class="breadcrumb-item active">订单详情</li>
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
                            <h2><strong>Order</strong> Details</h2>
                            <ul class="header-dropdown">
                                <li class="dropdown">
                                    <a href="{{url('/admin/orders')}}"  class="badge badge-warning">返回</a>
                                </li>

                            </ul>
                        </div>

                        <!-- Example Tab -->
                        <div class="body">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs">
                                <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#track">订单追踪</a></li>
                                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#payment">支付信息</a></li>
                            </ul>
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane in active" id="track">
                                    订单追踪
                                </div>
                                <div role="tabpanel" class="tab-pane" id="payment"> <b>Profile Content</b>
                                    <p> 支付信息</p>
                                </div>
                            </div>
                        </div>

                        <!-- #END# Example Tab -->
                        @foreach($deatil as $v)
                            <table class="table  ">
                                <tr>
                                    <td colspan="7" class="bg-purple">基本信息</td>
                                </tr>
                                <tr>
                                    <td colspan="2">订单号：<span class="badge badge-warning">{{$v->code}}</span></td>
                                    <td colspan="3">下单时间：{{date('Y-m-d H:i:s',$v->time)}}</td>
                                    <td colspan="2">订单状态：<span class="badge badge-primary">{{$v->name}}</span></td>
                                </tr>

                                <tr>
                                    <td colspan="2">收货人：{{$v->sname}}</td>
                                    <td colspan="2">电话：{{$v->sphone}}</td>
                                    <td colspan="3"></td>
                                </tr>
                                <tr>
                                    <td width="20">收货地址：</td>
                                    <td colspan="6">{{$v->addr}}_{{$v->addrinfo}}</td>
                                </tr>
                                <tr>
                                    <td colspan="7" class="bg-purple">商品信息</td>
                                </tr>
                                <tr>
                                    <td rowspan="2"><img src="{{$v->picurl}}" width="180" ></td>
                                    <td width="92">商品名称</td>
                                    <td width="80">单价（元）</td>
                                    <td width="109">数量</td>
                                    <td width="80">总价（元）</td>
                                    <td width="71">支付</td>
                                    <td width="53">操作</td>
                                </tr>
                                <tr>
                                    <td height="67">{{$v->title}}</td>
                                    <td>{{$v->price}}</td>
                                    <td>{{$v->num}}</td>
                                    <td>{{$v->num * $v->price}}</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td colspan="7">订单备注</td>
                                </tr>
                                <tr>
                                    <td height="118" colspan="7">{{$v->remarks}}</td>
                                </tr>
                                <tr>
                                    <td colspan="5" rowspan="5"></td>
                                    <td colspan="2">总价：￥ {{$v->num * $v->price}}元</td>
                                </tr>
                                <tr>
                                    <td colspan="2">折扣：￥ -880元</td>
                                </tr>
                                <tr>
                                    <td colspan="2">优惠券：￥ -200元</td>
                                </tr>
                                <tr>
                                    <td colspan="2">运费：￥ +150元</td>
                                </tr>
                                <tr>
                                    <td colspan="2">应付：￥ 让我算一会...</td>
                                </tr>

                            </table>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Jquery Core Js -->
    <script src="/assets/bundles/libscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js -->
    <script src="/assets/bundles/vendorscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js -->



    <script src="/assets/bundles/mainscripts.bundle.js"></script><!-- Custom Js -->
    <script src="/assets/js/pages/tables/footable.js"></script><!-- Custom Js -->
@endsection
