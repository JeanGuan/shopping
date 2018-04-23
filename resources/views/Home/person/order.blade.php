@extends('home.public.person')
@section('main')

    <div class="public_m1">
        <div class="public_m2">我的订单</div>
        <!--一个订单信息-->
        <div class="public_m5">
            <table border="0" cellspacing="0" cellpadding="0">
                <tbody>
                <tr style=" border-bottom:1px solid #000">
                    <th class="olist1">订单号</th>
                    <th class="olist4">订单总额</th>
                    <th class="olist5">下单时间</th>
                    <th class="olist4">交易状态</th>
                    <th class="olist5">操作</th>
                </tr>
                @foreach($orders as $k=>$v)
                <tr id="code_{{$k}}">
                    <td><a href ="javascript:void(0);"  onclick="orderDetail({{$v->id}})">{{$v->code}}</a></td>
                    <td>￥{{$v->total_price}}</td>
                    <td>{{date('Y-m-d H:i',$v->time)}}</td>
                    <td><font class="jdqbsys_m">{{$v->name}}</font></td>
                    <td> 
                        @if($v->status_id == 1)
                        <a target="_blank" href="{{url('/pay')}}">付款</a>
                        <a href="javascript:void(0);" onclick="cancelOrder({{$v->id}},{{$v->status_id}})">取消订单</a>
                        @elseif($v->status_id <4 && $v->status_id >1)
                        <a href="javascript:void(0);" onclick="cancelOrder({{$v->id}},{{$v->status_id}})">取消订单</a>
                        @elseif($v->status_id ==4 || $v->status_id == 8)
                        <a href="javascript:void(0);" onclick="delOrder({{$v->id}},{{$k}})">删除订单</a>
                        @endif
                    </td>
                </tr>
                @endforeach

                </tbody>
            </table>
        </div>
        <!--查看更多-->
        <div class="chagd_m"> <a href="#">查看更多</a> </div>
    </div>

    <div id="Detail" class="white_content">
        <div class="public_m1">
            <div class="public_m2">订单详情
                <a  style="float: right" href="javascript:void(0)" onClick="closeDetail()" title="关闭"><img src="/skin/cart/images/close.jpg" alt="取消" /></a>
            </div>
            <!--一个订单信息-->
            <div class="public_m5">
               {{-- <table border="0"  cellspacing="0" cellpadding="0">
                    <tbody>
                    <tr style=" border-bottom:1px solid #000">
                        <th class="olist1">订单号</th>
                        <th class="olist4">订单总额</th>
                        <th class="olist5">下单时间</th>
                        <th class="olist4">交易状态</th>
                        <th class="olist5">操作</th>
                    </tr>
                    @foreach($orders as $k=>$v)
                        <tr>
                            <td><a href ="javascript:void(0)" id="code_{{$k}}" onclick="orderDetail({{$v->id}})">{{$v->code}}</a></td>
                            <td>￥{{$v->total_price}}</td>
                            <td>{{date('Y-m-d H:i',$v->time)}}</td>
                            <td><font class="jdqbsys_m">{{$v->name}}</font></td>
                            <td>
                                @if($v->status_id == 1)
                                    <a href="#">付款</a><a href="#">取消订单</a>
                                @elseif($v->status_id <4 && $v->status_id >1)
                                    <a href="#">取消订单</a>
                                @else
                                    <a href="#">删除订单</a>
                                @endif
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>--}}
            </div>
        </div>
      </div>
    <div id="closeDetail" class="black_overlay"></div>
    <script>
        function orderDetail(id) {
            document.getElementById('Detail').style.display='block';
            document.getElementById('closeDetail').style.display='block';
          $.ajax({
                type:'post',
                url:'/person/orderDetail',
                data:{id:id,_token:'{{csrf_token()}}'},
                success:function(data){
                   /* Obj = jquery.parseJSON(data);*/
                    $("#Detail").append("");

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
        //删除订单
        function  delOrder(id,k) {
            $.ajax({
                type:'post',
                url:'/person/delOrder',
                data:{id:id,_token:"{{csrf_token()}}"},
                success:function (data) {
                    $("#code_"+k).remove();
                    alert(data.msg);
                },
                error:function (data) {
                    alert(data.msg)
                }
            })
        }
        
        //取消订单
        function cancelOrder(id) {
            $.ajax({
                type:'post',
                url:'/person/cancelOrder',
                data:{id:id,status_id:status_id,_token:'{{csrf_token()}}'},
                success:function (data) {
                    window.location.reload();
                    alert(data.msg);
                },
                error:function (data) {
                    alert(data.msg)
                }
                
            })
        }
    </script>
@endsection