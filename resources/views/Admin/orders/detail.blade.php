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
                        <!-- #END# Example Tab -->

                        <table class="table">
                                <tr>
                                    <td colspan="7" class="bg-purple">基本信息</td>
                                </tr>
                                <tr>
                                    <td colspan="2">订单号：<span class="badge badge-warning">{{$deatil->code}}</span></td>
                                    <td colspan="3">下单时间：{{date('Y-m-d H:i:s',$deatil->time)}}</td>
                                    <td colspan="2">订单状态：<span class="badge badge-primary">{{$deatil->name}}</span></td>
                                </tr>

                                <tr>
                                    <td colspan="2">收货人：{{$deatil->name_cn}}</td>
                                    <td colspan="2">电话：{{$deatil->phone_cn}}</td>
                                    <td colspan="3"></td>
                                </tr>
                                <tr>
                                    <td width="20">收货地址：</td>
                                    <td colspan="6">{{$deatil->prov_cn}}-{{$deatil->city_cn}}-{{$deatil->coun_cn}}-{{$deatil->addrinfo}}</td>
                                </tr>
                                <tr>
                                    <td colspan="7" class="bg-purple">商品信息</td>
                                </tr>
                                <tr>
                                    <td >商品图片</td>
                                    <td width="92">商品名称</td>
                                    <td width="80">单价（元）</td>
                                    <td width="109">数量</td>
                                    <td width="80">总价（元）</td>
                                    <td width="71">支付</td>
                                    <td width="53">操作</td>
                                </tr>
                              @foreach($deatil['goodattr'] as $v)
                                <tr>
                                    <td ><img src="{{$v['img']}}" width="80" ></td>
                                    <td height="67">{{$v['title']}}</td>
                                    <td>{{$v['price']}}</td>
                                    <td>{{$v['num']}}</td>
                                    <td>{{$v['num'] * $v['price']}}</td>

                                </tr>
                              @endforeach
                                <tr>
                                    <td colspan="7">订单备注</td>
                                </tr>
                                <tr>
                                    <td height="118" colspan="7">{{$deatil->remarks}}</td>
                                </tr>
                                <tr>
                                    <td colspan="5" rowspan="5"></td>
                                    <td colspan="2">总价：￥ {{$deatil->total_price}}元</td>
                                </tr>

                                <tr>
                                    <td colspan="2">运费：￥ 0元</td>
                                </tr>
                                <tr>
                                    <td colspan="2">应付：￥ {{$deatil->total_price}}</td>
                                </tr>

                            </table>
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
