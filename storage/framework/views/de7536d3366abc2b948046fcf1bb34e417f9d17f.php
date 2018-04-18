<div class="centers_ml">

    <!--列表go-->
    <div class="centers_listm">
        <div class="centers_listm_one"> <img src="/skin/person/picture/zshy.png"/> <em>会员中心</em> </div>
        <!--一条开始-->
        <div class="centers_listm_one_in"> <img src="/skin/person/picture/shezhi.png"/> <em>资料管理</em> <b></b> </div>
        <span class="gjszmdm"> <a href="#" class="center_in_self"><font>信息资料</font></a> <a href="#" class="center_in_self"><font>银行卡管理</font></a> </span>
        <!--一条开始-->
        <div class="centers_listm_one_in"> <img src="/skin/person/picture/ddgl.png"/> <em>订单管理</em> <b></b> </div>
        <span class="gjszmdm"> <a href="#" class="center_in_self"><font>我的订单</font></a> <a href="#" class="center_in_self"><font>我的预约</font></a> <a href="#" class="center_in_self"><font>评价订单</font></a> <a href="#" class="center_in_self"><font>订单投诉</font></a> </span>
        <!--一条开始-->
        <div class="centers_listm_one_in"> <img src="/skin/person/picture/suo.png"/> <em>账户安全</em> <b></b> </div>
        <span class="gjszmdm"> <a href="#" class="center_in_self"><font>账户安全</font></a> <a href="#" class="center_in_self"><font>账户余额</font></a> <a href="#" class="center_in_self"><font>我的积分</font></a> <a href="#" class="center_in_self"><font>积分兑换</font></a> <a href="#" class="center_in_self"><font>我的经验</font></a> <a href="#" class="center_in_self"><font>我的优惠卷</font></a> </span>
        <!--一条开始-->
        <div class="centers_listm_one_in"> <img src="/skin/person/picture/wdssc.png"/> <em>收藏管理</em> <b></b> </div>
        <span class="gjszmdm"> <a href="#" class="center_in_self"><font>店铺收藏</font></a> <a href="#" class="center_in_self"><font>菜品收藏</font></a> </span>
        <!--一条开始-->
        <div class="centers_listm_one_in"> <img src="/skin/person/picture/myfridend.png"/> <em>好友管理</em> <b></b> </div>
        <span class="gjszmdm"> <a href="#" class="center_in_self"><font>我的消息</font></a> <a href="#" class="center_in_self"><font>我的好友</font></a> </span> </div>
    <script type="text/javascript">
        $(function(){//第一步都得写这个
            $(".centers_listm_one_in").click(function(){
                $(this).next(".gjszmdm").slideToggle().siblings("gjszmdm").slideUp()
            });
        })
    </script>
</div>