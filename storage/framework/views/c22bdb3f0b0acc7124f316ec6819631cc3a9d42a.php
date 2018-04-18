  <!doctype html>
<html>
<head>
<title>用户注册</title>
<meta charset="utf-8">
<meta name="format-detection" content="telephone=no">
<link href="<?php echo e(asset('/skin/style/webstyle.css')); ?>" rel="stylesheet" type="text/css" />
<script src="<?php echo e(asset('/skin/js/jquery-1.11.3.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('/skin/js/banner.js')); ?>"></script>
<!-- layer -->
<script src="<?php echo e(asset('skin/layer/jquery.js')); ?>"></script>
<script src="<?php echo e(asset('skin/layer/layer.js')); ?>"></script>
<script src="<?php echo e(asset('skin/layer/layui.js')); ?>"></script>
</head>

<body>
<div class="container">
	<a href="<?php echo e(url('/')); ?>" class="fl"><img src="/skin/images/a06.jpg" height="160"/></a>
	<span class="fr land_home"><a href="<?php echo e(url('/')); ?>">返回首页</a>  |  <a href="#">帮助中心</a></span>
	<div class="cl"></div>
</div>
<div class="container">
	<div class="login_bor">
		<div class="fl login_con">
			<form name="form1" id="form1" action="" method="post"  >
				<?php echo e(csrf_field()); ?>

			<ul>
				<li>
					<span class="fl login_con_name tr"><b class="red">*</b>昵称：</span>
					<input type="text" class="fr login_con_inp" name="username" id="username"  />
					<div class="cl"></div>
				</li>
				<li>
					<span class="fl login_con_name tr"><b class="red">*</b>设置密码：</span>
					<input type="password" name="password" id="password" class="fr login_con_inp" />
					<div class="cl"></div>
				</li>
				<li>
					<span class="fl login_con_name tr"><b class="red">*</b>确认密码：</span>
					<input type="password" name="password2" id="password2" class="fr login_con_inp" />
					<div class="cl"></div>
				</li>
				<li>
					<span class="fl login_con_name tr"><b class="red">*</b>手机号码：</span>
					<input type="tel" name="phone" id="phone" class="fr login_con_inp"/>

					<div class="cl"></div>
				</li>
				<li>
					<span class="fl login_con_name tr"><b class="red">*</b>短信验证码：</span>
					<input type="tel" name="dxCode" id="dxCode" class="fr login_con_inp" style="width:180px;float: left"/>
					<input type="button" id="btn" style="height:44px;width:120px;float: right;" value="点击发送验证码" onclick="CheckPhone()" />
					<input type="hidden" id="smscode" />
					<div class="cl"></div>
				</li>
				<li>
					<span class="fl login_con_name tr"><b class="red">*</b>验证码：</span>
					<div class="fr login_con_inp" id="cc">
						<input type="text" name="code" id="code" class="fl login_con_yzm" onblur="Checkcode()" />
						<a class="fr red login_con_yzm_text">点击更换</a>
						<a class="fr login_con_yzm_pic"><img src="<?php echo e(url('/code')); ?>" alt="" onclick="this.src='<?php echo e(url('/code')); ?>?'+Math.random()" /></a>
						<?php if(session('msg')): ?>
								<p><strong><?php echo e(session('msg')); ?></strong> </p>
						<?php endif; ?>
					</div>
					<div class="cl"></div>

				</li>
				<li class="fr login_con_xy">
					<input type="checkbox" id="agreement" class="" />
					<label for="b01" >请阅读<span ><a class="red" href="">《完美生活、家装无忧协议》</a></span></label>
				</li>
				<li>
					<input type="button" onclick="Check();" value="注册" class="login_con_btn fr f18" />
				</li>
			</ul>
			</form>
		</div>
		<div class="fr login_r">
			<div class="login_tit tc">
				<a >已注册？</a>
				<a href="<?php echo e(url('/login')); ?>" class="login_tit_on">登陆</a>
			</div>
			<div class="tc login_ewm tc">
				<img src="/skin/images/d01.jpg" alt="" /><br />
				微信扫一扫，快速登陆
			</div>
			<div class="tc login_coop grey9">
				使用合作账号登陆：<br />
				<a href=""><img src="/skin/images/d04.png" alt="" /></a>
				<a href=""><img src="/skin/images/d05.png" alt="" /></a>
				<a href=""><img src="/skin/images/d06.png" alt="" /></a>
				<a href=""><img src="/skin/images/d07.png" alt="" /></a>
			</div>
		</div>
		<div class="cl"></div>
	</div>
</div>

<!--footer start--> 
<div class="bot_bg02 min_w">
	<div class="container">
		<ul class="bot_list02 f18 tc">
			<li><a href="#"><img src="/skin/images/b01.png" alt="" /><br />100%正品</a></li>
			<li><a href="#"><img src="/skin/images/b02.png" alt="" /><br />无理由退货</a></li>
			<li><a href="#"><img src="/skin/images/b03.png" alt="" /><br />贵就赔</a></li>
			<li><a href="#"><img src="/skin/images/b04.png" alt="" /><br />万千口碑</a></li>
			<li><a href="#"><img src="/skin/images/b05.png" alt="" /><br />活动专区</a></li>
			<li><a href="#"><img src="/skin/images/b06.png" alt="" /><br />精品推荐</a></li>
			<div class="cl"></div>
		</ul>
	</div>
</div>
<div class="min_w copyright_bg tc">
	©2017   完美生活       技术支持：龙采科技
</div>
<!--footer end-->
<script>
	$(function(){
		$(".land_tit a").click(function(){
		$(this).addClass("land_tit_on").siblings().removeClass("land_tit_on"); 
		var index=$(this).index(); 
		$(".land_con_box > div").eq(index).show().siblings().hide(); 
		});
	});
</script>
<script type="text/javascript">
    function Check() {
    //昵称验证
        var username = $("#username").val();
        var myname = /^[a-zA-Z0-9_-]{4,16}$/;
        if (username.length == 0) {
            layer.tips('请输入登录昵称！', '#username', {
                tips: [2, '#c4141b']
            });
            document.form1.username.focus();
            return false;
        } else if (!myname.test(username)) {
            layer.tips('4-16位，字母开头+数字/字母/下划线！', '#username', {
                tips: [2, '#c4141b']
            });
            document.form1.username.focus();
            return false;
        }

        //密码验证
        var password = $("#password").val();
        var password2 = $("#password2").val();
        var mypas = /^(?![0-9]+$)(?![a-zA-Z]+$)[0-9A-Za-z]{6,16}$/;

        if (password.length == 0) {
            layer.tips('请输入登录密码！', '#password', {
                tips: [2, '#c4141b']
            });
            document.form1.password.focus();
            return false;
        } else if (!mypas.test(password)) {
            layer.tips('密码为6-16位数字和字母组合！', '#password', {
                tips: [2, '#c4141b']
            });
            document.form1.password.focus();
            return false;
        }

        if (password2.length == 0) {
            layer.tips('请输入确认密码！', '#password2', {
                tips: [2, '#c4141b']
            });
            document.form1.password.focus();
            return false;
        } else if (password !== password2) {
            layer.tips('两次密码输入不一致', '#password2', {
                tips: [2, '#c4141b']
            });
            document.form1.password.focus();
            return false;
        }

        //手机号验证
        var phone = $("#phone").val();
        if (phone.length == 0) {
            layer.tips('请输入手机号！', '#phone', {
                tips: [2, '#c4141b']
            });
            document.form1.phone.focus();
            return false;
        }
        if (phone.length != 11) {
            layer.tips('请输入有效的手机号码！', '#phone', {
                tips: [2, '#c4141b']
            });
            document.form1.phone.focus();
            return false;
        }

        var myreg = /^(((13[0-9]{1})|(15[0-9]{1})|(17[0-9]{1})|(18[0-9]{1}))+\d{8})$/;
        if (!myreg.test(phone)) {
            layer.tips('请输入有效的手机号码！', '#phone', {
                tips: [2, '#c4141b']
            });
            document.form1.phone.focus();
            return false;
        }

        //手机注册验证码
        var dxCode = $("#dxCode").val();
        var smscode = $("#smscode").val();
        if (dxCode.length == 0) {
            layer.tips('请输入您的手机验证码！', '#btn', {
                tips: [2, '#c4141b']
            });
            document.form1.password.focus();
            return false;
        } else if (dxCode != smscode) {
            layer.tips('手机验证码填写错误！', '#btn', {
                tips: [2, '#c4141b']
            });
            document.form1.password.focus();
            return false;
        }
		//判断验证码
        var Code = $("#code").val();
        if (Code.length == 0) {
            layer.tips('请输入验证码！', '#cc', {
                tips: [2, '#c4141b']
            });
            document.form1.password.focus();
            return false;
        }



         //判断注册条款
            if (document.getElementById("agreement").checked == false)
            {
                layer.tips('请勾选注册条款！', '#agreement', {
                    tips: [3, '#c4141b']
                });
                document.getElementById("agreement").focus();
                return false;
            }
       		 Checkcode();

    }

	//检查验证码
    function Checkcode() {
        var code = $("#code").val();
        $.ajax({
            type: "GET",
            data: {"code": code},
            url: "/Checkcode",
            dataType: "json",
            success: function (data) {
                if (data.status == 0) {
                    layer.tips('验证码错误！', '#cc',{
                        tips: [2, '#c4141b']});
                    return false;
                }else{
                    $("#form1").submit();
				}
            }
        });
    }

	//获取短信
    function CheckPhone()
    {
        var phone = $("#phone").val();
        //ajax 判断是否注册
        $.ajax({
            type: "GET",
            data: {"phone": phone},
            url: "/CheckPhone",
            dataType: "json",
            success: function (data) {
                if (data.status == 1) {
                    SendSms(phone);
                }else{
                    layer.tips('手机号已注册！', '#phone',{
                        tips: [2, '#c4141b']});
                    return false;
				}
            }
        });
    }
    //发送短信
	SendSms = function (phone) {
        $.ajax({
            type: "GET",
            data: {"phone": phone},
            url: "/sms",
            dataType: "json",
            success: function (data) {

                  if(data.status == 1){
                     //赋值  smscode
					 $("#smscode").val(data.code);
                       var btn = $("#btn");
                      sendCode(btn);
				  }

            }
        });
    }

    var clock = '';
    var nums = 60;
    function sendCode(thisBtn)
    {

        $('#btn').attr("disabled",true);   	//移除鼠标点击属性
        $("#btn").val(nums+'秒后可重新获取');
        clock = setInterval(doLoop, 1000); //一秒执行一次
    }
    function doLoop()
    {
        nums--;
        if(nums > 0){
            $("#btn").val(nums+'秒后可重新获取');
        }else{
            clearInterval(clock); //清除js定时器
            $('#btn').attr("disabled",false);
            $("#btn").val('重新发送验证码');
            nums = 60; //重置时间
        }
    }
</script>
</body>
</html>
