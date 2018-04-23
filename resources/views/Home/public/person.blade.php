<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>会员中心</title>
    <link href="/skin/style/webstyle.css" rel="stylesheet" type="text/css" />
    <script src="/skin/person/js/jquery-1.8.3.min.js"></script>
    <link rel="stylesheet" type="text/css" href="/skin/person/css/center.css">
    <link rel="stylesheet" type="text/css" href="/org/SweetAlert/css/sweetalert.css"/>

</head>
<body>
@include('home.public.top')
<div class="now_positionm"> <span>当前位置：</span><a href="{{url('/')}}">首页></a><a href="{{url('/person')}}">个人中心</a> </div>
<!--centers-->
<div class="centers_m">
    <!--清除浮动-->
    <div class="clear_sm"></div>
    <!--left-->
    <div class="centers_ml">

        <div class="centers_listm">
            <div class="centers_listm_one"> <img src="/skin/person/picture/zshy.png"/> <em>会员中心</em> </div>
            <!--一条开始-->
            <div class="centers_listm_one_in"> <img src="/skin/person/picture/shezhi.png"/> <em>资料管理</em> <b></b> </div>
            <span class="gjszmdm">
                <a href="{{url('/person/info')}}" class="center_in_self"><font>信息资料</font></a>
            </span>
            <!--一条开始-->
            <div class="centers_listm_one_in"> <img src="/skin/person/picture/ddgl.png"/> <em>订单管理</em> <b></b> </div>
            <span class="gjszmdm">
                <a href="{{url('/person/order')}}" class="center_in_self"><font>我的订单</font></a>
                <a href="#" class="center_in_self"><font>评价订单</font></a>
            </span>
            <!--一条开始-->
            <div class="centers_listm_one_in"> <img src="/skin/person/picture/suo.png"/> <em>账户安全</em> <b></b> </div>
            <span class="gjszmdm">
                <a href="#" class="center_in_self"><font>账户余额</font></a>
                <a href="#" class="center_in_self"><font>密码修改</font></a>
            </span>
            <!--一条开始-->
            <div class="centers_listm_one_in"> <img src="/skin/person/picture/wdssc.png"/> <em>收藏管理</em> <b></b> </div>
            <span class="gjszmdm">
                <a href="#" class="center_in_self"><font>商品收藏</font></a>
            </span>
            <!--一条开始-->
            <div class="centers_listm_one_in"> <img src="/skin/person/picture/myfridend.png"/> <em>地址管理</em> <b></b> </div>
            <span class="gjszmdm">
                <a href="{{url('/person/addrList')}}" class="center_in_self"><font>我的地址</font></a>
                <a href="{{url('/person/addrinfo')}}" class="center_in_self"><font>添加地址</font></a>
            </span>
        </div>
        <script type="text/javascript">
            $(function(){//第一步都得写这个
                $(".centers_listm_one_in").click(function(){
                    $(this).next(".gjszmdm").slideToggle().siblings("gjszmdm").slideUp()
                });
            })
        </script>
    </div>
    <!--right-->
    <div class="centers_mr">
        @yield('main')
    </div>
</div>
@include('home.public.footer')
<script type="text/javascript" src="/org/SweetAlert/js/jquery.js"></script>
<script type="text/javascript" src="/org/SweetAlert/js/sweetalert.min.js"></script>
</body>
</html>