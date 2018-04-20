@extends('home.public.person')
@section('main')
    <!--一条开始-->
    <div class="public_m1">
        <div class="public_m2">资料管理</div>
        <!--照片和内容-->
        <div class="zp_nrm">
            <!--left-->
            @if($user->portrait !='')
                <div class="zp_nrm_l"> <img src="{{$user->portrait}}"/> <a href="#">更换头像</a> </div>
        @endif
        <!--right-->
            <div class="zp_nrm_r">
                <p><em>用户名：</em><i>{{$user->username}}</i></p>
                <p><em>邮箱：</em>
                    @if($user->email !='')
                        {{$user->email}}
                    @else
                        <i>未设置</i><a href="#">立即设置</a>
                    @endif
                </p>
                <p><em>手机号：</em><i>{{$user->phone}}</i></p>
                <p><em>性别：</em>

                    <input type="radio" name="sex" class="sex_m" value="0" @if($user->sex == 0)checked @endif>
                    <i>男</i>
                    <input type="radio" name="sex" class="sex_m" value="1" @if($user->sex == 1)checked @endif>
                    <i>女</i>
                </p>
                {{--<a href="#" class="public_m3">保存修改</a> --}}
            </div>
        </div>
    </div>
    <!--一条开始-->
@endsection