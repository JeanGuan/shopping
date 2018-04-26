@extends('home.public.person')
@section('main')
    <div class="public_m1">
        <div class="public_m2">商品收藏</div>
        <!--全选和删除-->
        <div class="chice_allm">
            <i><input id="chkAll" type="checkbox" onclick="checkAll(this)">全选</i>
            <a href="javascript:void(0)" onclick="delCollect()">删除</a> </div>
        <!--收藏开始-->
        <div class="rensw_bejm">
            <ul>
                @foreach($goods as $k=>$v)
                <li> <img src="{{$v->picurl}}" title="{{$v->title}}">
                        <h5><a href="{{url('goods/'.$v->gid)}}">{{$v->title}}</a></h5>
                    <span>人气：<i>5000</i> <input type="checkbox" name="gid" value="{{$v->gid}}"/></span>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
    <script>
        //全选checkbox
        function checkAll(e)
        {
            var t=document.getElementsByName("gid");
            for(var i=0;i<t.length;i++)
            {
                t[i].checked=document.getElementById("chkAll").checked;
            }
        }
        
        //删除收藏商品
        function delCollect() {
            var checkboxValue;
            var gid = $("input[name='gid']:checked").each(function(j) {
                if (j >= 0) {
                    checkboxValue += $(this).val() + ",";
                }
            });
            $.ajax({
                type:'post',
                url:'/person/delcollection',
                date:{gid:gid,_token:'{{csrf_token()}}'},
                success:function (data) {
                    alert(data.msg)
                },
                error:function (data) {
                    alert(data.msg)
                }
            })
        }
    </script>
@endsection