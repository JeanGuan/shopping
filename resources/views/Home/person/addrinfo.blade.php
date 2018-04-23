@extends('home.public.person')
@section('main')
<div class="public_m1">
    <div class="public_m2">收货地址</div>
    <div class="chongzhi_htxm"> <a href="javascript:void(0);" onclick="createAddr()">添加新地址</a></div>
    <!--一个订单信息-->
    <div class="public_m5">
        <table border="0" cellspacing="0" cellpadding="0">
            <tbody>
            <tr style=" border-bottom:1px solid #000">
                <th class="olist1">收货人</th>
                <th class="olist2">手机</th>
                <th class="olist3">收货地址</th>
                <th class="olist4">Tag</th>
                <th class="olist5">操作</th>
            </tr>
            @foreach($addrList as $v)
            <tr>
                <td>{{$v->sname}}</td>
                <td>{{$v->sphone}}</td>
                <td>{{$v->prov_cn}}-{{$v->city_cn}}-{{$v->coun_cn}} {{$v->addrinfo}}</td>
                <td class="money">{{$v->tag}}</td>
                <td><a href="">修改</a><a href="javascript:void(0);" onclick="delAddr({{$v->id}})">删除</a></td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>

</div>
<div id="Detail" class="white_content">
    <style>
        .addrclose{float: right;}
        .input{height:23px; border:1px solid #eaeaea; }
    </style>
    <div class="public_m1">
        <div class="public_m2">添加新地址
            <a class="addrclose" href="javascript:void(0)" onClick="closeDetail()" title="关闭"><img src="/skin/cart/images/close.jpg" alt="取消" /></a>
        </div>
        <div class="public_m4">
            <form id="creatAddr">
                {{csrf_field()}}
            <p> <em>收件人姓名：</em>
                <input type="text" name="sname" class="input">
            </p>
            <p> <em>手机号：</em>
                <input type="text" name="sphone" class="input">
            </p>
            <p> <em>地址：</em>
                <select name="prov_cn" class="input">
                    <option>-请选择-</option>
                </select>
                <select name="city_cn" class="input">
                    <option>-请选择-</option>
                </select>
                <select name="coun_cn" class="input">
                    <option>-请选择-</option>
                </select>
            </p>
            <p> <em>详细地址：</em>
                <input type="text" name="addrinfo" class="input">
            </p>
            <p> <em>地址标签：</em>
                <input type="text" name="tag" class="input">
            </p>
                <p>
                    <a href="javascript:void(0)" class="public_m3" onclick = "closeDetail()">取消</a><a href="#" class="public_m3">保存修改</a></p>
            </form>
    </div>
    </div>
</div>
<div id="closeDetail" class="black_overlay"></div>

    <script>
        //添加地址
        function createAddr() {
            document.getElementById('Detail').style.display='block';
            document.getElementById('closeDetail').style.display='block';
            $.ajax({
                type:'post',
                url:'/person/createAddr',
                data:$('#creatAddr').serialize(),
                success:function(data){

                },
                error:function(){
                    alert(JSON.stringify(err));
                }
            })

        }
        function closeDetail(){
            document.getElementById('Detail').style.display='none';
            document.getElementById('closeDetail').style.display='none'
        }
        
        //删除地址
        function delAddr(id) {
            $.ajax({
                type:'post',
                url:'/person/delAddr',
                data:{id:id,_token:'{{csrf_token()}}'},
                success:function (data) {
                    alert(data.msg);
                    window.location.reload();
                },
                error:function (data) {
                    alert(data.msg)
                }
                
            
            })
        }

    </script>
@endsection