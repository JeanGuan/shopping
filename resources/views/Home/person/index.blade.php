@extends('home.public.person')
@section('main')
    <div class="public_m1">
        <!--left-->
        <div class="public_m1_l">
            <!--top-->
            <div class="public_m1_top">
                <ul>
                    <li> <img src="/skin/person/picture/jif.png"/> <em>205分</em>
                        <p>我的积分</p>
                    </li>
                    <li> <img src="/skin/person/picture/yue.png"/> <em>9580.0元</em>
                        <p>账户余额</p>
                    </li>
                    <li> <img src="/skin/person/picture/kouw.png"/> <em>偏辣</em>
                        <p>口味偏好</p>
                    </li>
                    <li> <img src="/skin/person/picture/weizh.png"/> <em>济南</em>
                        <p>所在位置</p>
                    </li>
                    <li> <img src="/skin/person/picture/dengj.png"/> <em>Lv1</em>
                        <p>会员等级</p>
                    </li>
                    <li> <img src="/skin/person/picture/shouj.png"/> <em>未设置</em>
                        <p>手机绑定</p>
                    </li>
                    <li> <img src="/skin/person/picture/youx.png"/> <em>未设置</em>
                        <p>邮箱绑定</p>
                    </li>
                </ul>
            </div>
            <!--bottom-->
            <div class="public_m1_bottom">
                <h4>账户安全<font>低</font></h4>
                <span>
          <p style="width:36%"></p>
          </span> <a href="#">立即提升</a> </div>
        </div>
        <!--right-->
        <div class="public_m1_r">
            <script src="/skin/person/js/jquery.luara.0.0.1.min.js"></script>
            <div class="example1">
                <ul>
                    <li><img src="/skin/person/picture/cross_fire.jpg"/></li>
                    <li><img src="/skin/person/picture/cross_fire.jpg"/></li>
                    <li><img src="/skin/person/picture/cross_fire.jpg"/></li>
                    <li><img src="/skin/person/picture/cross_fire.jpg"/></li>
                </ul>
                <ol>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                </ol>
            </div>
            <script>
                $(function(){
                    $(".example1").luara({width:"352",height:"175",interval:5000,selected:"seleted",deriction:"top"});
                });
            </script>
        </div>
    </div>
@endsection