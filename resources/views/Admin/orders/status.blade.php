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
                <h2>订单状态修改</h2>
            </div>
            <div class="col-lg-5 col-md-6 col-sm-12">
                <ul class="breadcrumb float-md-right">
                    <li class="breadcrumb-item"><a href="{{url('/admin')}}"><i class="zmdi zmdi-home"></i>系统主页</a></li>
                    <li class="breadcrumb-item"><a href="{{url('/admin/orders')}}">订单列表</a></li>
                    <li class="breadcrumb-item active">订单状态修改</li>
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
                        <h2><strong>Order</strong> Status</h2>
                    </div>
                    <div class="body" >
                        <form id="form_validation" method="POST" action="{{url('admin/orders/status/update/'.$orders->id)}}">
                            {{csrf_field()}}
                            <!--订单号 -->
                            <div class="row clearfix">
                                <div class="col-lg-1 col-md-2 col-sm-4 form-control-label">
                                    <label for="code">订单号</label>
                                </div>
                                <div class="col-lg-2 col-md-10 col-sm-8">
                                    <div class="form-group">
                                        <input type="text"  class="form-control" name="code" maxlength="16" minlength="4" value="{{$orders->code}}" readonly>
                                    </div>
                                </div>
                            </div>
                            <!--订单状态 -->
                            <div class="row clearfix">
                                <div class="col-lg-1 col-md-2 col-sm-4 form-control-label">
                                    <label for="sid">订单状态</label>
                                </div>
                                <div class="col-lg-2 col-md-10 col-sm-8">
                                    <select class="form-control show-tick" name="sid">
                                        @foreach($ordersStatus as $v)
                                        <option value="{{$v->id}}" @if($v->id == $orders->sid) selected @endif>{{$v->name}}</option>
                                       @endforeach
                                    </select>
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

