<div class="shortcut_v2013 alink_v2013">
    <div class="w">
        <ul class="fl 1h">
            <li class="fl"><div class="menu_hd">您好，欢迎来到完美生活！</div></li>
        </ul>

        <ul class="fr 1h">
            @if(session('Homeuserinfo.id'))
                <li class="fl"><div class="menu_hd"><a href="{{url('/')}}">返回首页</a></div></li>
                <li class="fl"><i class="shortcut_s"></i></li>
                <li class="fl"><div class="menu_hd"><a href="{{url('/person')}}">{{session('Homeuserinfo.username')}}</a></div></li>
                <li class="fl"><i class="shortcut_s"></i></li>
                <li class="fl"><div class="menu_hd"><a href="#">我的订单</a></div></li>
                <li class="fl"><i class="shortcut_s"></i></li>
                <li class="fl"><div class="menu_hd"><a href="{{url('/logout')}}">退出</a></div></li>
                <li class="fl"><i class="shortcut_s"></i></li>
            @else
                <li class="fl"><div class="menu_hd"><a href="{{url('/login')}}">请登录</a></div></li>
                <li class="fl"><i class="shortcut_s"></i></li>
                <li class="fl"><div class="menu_hd"><a href="{{url('register')}}">免费注册</a></div></li>
            @endif
        </ul>

        <span class="clr"></span>

    </div>
</div>