<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>会员中心</title>
    <link href="/skin/style/webstyle.css" rel="stylesheet" type="text/css" />
    <script src="/skin/person/js/jquery-1.8.3.min.js"></script>
    <link rel="stylesheet" type="text/css" href="/skin/person/css/center.css">
</head>
<body>
<!--top-->
<?php echo $__env->make('home.public.top', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<div class="now_positionm"> <span>当前位置：</span><a href="<?php echo e(url('/')); ?>">首页></a><a href="<?php echo e(url('/person')); ?>">个人中心</a> </div>
<!--centers-->
<div class="centers_m">
    <!--清除浮动-->
    <div class="clear_sm"></div>
    <!--left-->
<?php echo $__env->make('home.public.person_left', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <!--right-->
    <div class="centers_mr">
        <h1 class="welcom_tm">欢迎您， <font><?php echo e($user->username); ?></font>！您上次登录时间为 <?php echo e(date('Y-m-d H:i',$user->time)); ?></h1>
        <!--一条开始-->
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
        <!--一条开始-->
        <div class="public_m1">
            <div class="public_m2">资料管理</div>
            <!--照片和内容-->
            <div class="zp_nrm">
                <!--left-->
                <?php if($user->portrait !=''): ?>
                <div class="zp_nrm_l"> <img src="<?php echo e($user->portrait); ?>"/> <a href="#">更换头像</a> </div>
                <?php endif; ?>
                <!--right-->
                <div class="zp_nrm_r">
                    <p><em>用户名：</em><i><?php echo e($user->username); ?></i></p>
                    <p><em>邮箱：</em>
                            <?php if($user->email !=''): ?>
                                <?php echo e($user->email); ?>

                            <?php else: ?>
                            <i>未设置</i><a href="#">立即设置</a>
                            <?php endif; ?>
                    </p>
                    <p><em>手机号：</em><i><?php echo e($user->phone); ?></i></p>
                    <p><em>性别：</em>

                        <input type="radio" name="sex" class="sex_m" value="0" <?php if($user->sex == 0): ?>checked <?php endif; ?>>
                        <i>男</i>
                        <input type="radio" name="sex" class="sex_m" value="1" <?php if($user->sex == 1): ?>checked <?php endif; ?>>
                        <i>女</i>
                    </p>
                    <a href="#" class="public_m3">保存修改</a> </div>
            </div>
        </div>
        <!--一条开始-->
        <div class="public_m1">
            <div class="public_m2">银行卡绑定</div>
            <!--提示信息-->
            <div class="tip_notem">
                <ul>
                    <li>1.银行卡信息必须与账户信息一致</li>
                    <li>2.为了您的方便，请尽量填写您常用的银行卡账号</li>
                </ul>
            </div>
            <div class="public_m4">
                <p><em>您当前的银行账号：</em><i>您还未设置银行卡信息</i></p>
                <p> <em>银行名称：</em>
                    <select style=" height:23px; border:1px solid #eaeaea">
                        <option>-请选择-</option>
                        <option>中国工商银行</option>
                    </select>
                </p>
                <p> <em>户主姓名：</em>
                    <input type="text" style=" height:23px; border:1px solid #eaeaea; width:140px">
                </p>
                <p> <em>银行卡号：</em>
                    <input type="text" style=" height:23px; border:1px solid #eaeaea; width:140px">
                </p>
                <p> <em>确认卡号：</em>
                    <input type="text" style=" height:23px; border:1px solid #eaeaea; width:140px">
                </p>
                <p> <em>开户银行银行地点：</em>
                    <input type="text" style=" height:23px; border:1px solid #eaeaea; width:140px;" value="这里放地点插件">
                </p>
                <p> <em>开户银行支行名称：</em>
                    <select style=" height:23px; border:1px solid #eaeaea">
                        <option>-请选择-</option>
                        <option>中国工商银行</option>
                    </select>
                </p>
                <p> <em>请输入手机验证码：</em>
                    <input type="text" style=" height:23px; border:1px solid #eaeaea; width:140px">
                    <a href="#" class="liji_fsm">发送</a> <i>注：若未绑定手机号码，请前往账户安全页面进行绑定</i> </p>
                <a href="#" class="public_m3">保存修改</a> </div>
        </div>
        <!--一条开始-->
        <div class="public_m1">
            <div class="public_m2">订单状态</div>
            <!--各种进度-->
            <div class="gezhong_jdm"> <img src="/skin/person/picture/jkkll.png"/>
                <ul>
                    <li>状态填写</li>
                    <li>状态填写</li>
                    <li>状态填写</li>
                    <li>状态填写</li>
                </ul>
            </div>
            <!--各种信息-->
            <div class="gezhong_xxm">
                <ul>
                    <li><em>商家：</em><a href="#">木木小店</a></li>
                    <li><em>订单号：</em><a href="#">2016102111523538</a></li>
                    <li><em>预约时间：</em><i>12:00-14:00</i></li>
                    <li><em>订购热线：</em><i>7310237</i></li>
                    <li><em>下单时间：</em><i>2016-10-21 11:52:38</i></li>
                    <li><em>订单状态：</em><i>已取消</i></li>
                    <li><em>订餐类型：</em><i>餐位订餐</i></li>
                </ul>
            </div>
            <!--一个订单信息-->
            <div class="public_m5">
                <table border="0" cellspacing="0" cellpadding="0">
                    <tbody>
                    <tr style=" border-bottom:1px solid #000">
                        <th class="olist1">菜品</th>
                        <th class="olist2">单价（元）</th>
                        <th class="olist3">数量</th>
                        <th class="olist4">单位</th>
                        <th class="olist5">小计</th>
                    </tr>
                    <tr>
                        <td><a href="#">青岛大虾</a></td>
                        <td>￥288.00</td>
                        <td>3</td>
                        <td class="money">只</td>
                        <td>￥864.00</td>
                    </tr>
                    <tr>
                        <td><a href="#">肉肉</a></td>
                        <td>￥288.00</td>
                        <td>3</td>
                        <td class="money">盘</td>
                        <td>￥864.00</td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <!--位置信息-->
            <div class="weizhi_xxm"> 位置信息：<font>大厅11号桌</font> </div>
            <!--合计金额-->
            <div class="heji_jem"> 合计金额：<font>1038.00元</font> </div>
            <!--订餐留言-->
            <div class="dingcan_lym"> <em>订餐留言：</em>
                <p>最佳答案：APP是英文Application(应用)的简称,由于iPhone智能手机的流行,现在的APP多指移动设备(包括平板电脑、手机、和其他移动设备)上的第三方应用程序。 目前比...</p>
            </div>
        </div>
        <!--一条开始-->
        <div class="public_m1">
            <div class="public_m2">账户安全</div>
            <div class="public_m4">
                <p><em>您当前的安全等级：</em><i style="color:#fa3b4a">高</i></p>
            </div>
            <!--各种设置-->
            <div class="gezhong_szm">
                <!--一条开始a-->
                <div class="gezhong_szm_in"> <b style=" background:url(/skin/person/images/fourm.png) no-repeat 0 0"></b> <span>登录密码<br>
          <em>已设置</em></span>
                    <p>安全性高的密码，可以使账户更安全。建议您定期更换密码。安全性高的密码，可以使账户更安全。建议您定期更换密码。安全性高的密码，可以使账户更安全。建议您定期更换密码。</p>
                    <a href="#">修改密码</a> </div>
                <!--一条开始a-->
                <div class="gezhong_szm_in"> <b style=" background:url(/skin/person/images/fourm.png) no-repeat 0 -50px"></b> <span>邮箱绑定<br>
          <em>已设置</em></span>
                    <p>进行邮箱验证后，可用于接收敏感操作的身份验证信息，以及订阅更优惠商品的促销邮件。</p>
                    <a href="#">绑定邮箱</a> </div>
                <!--一条开始a-->
                <div class="gezhong_szm_in"> <b style=" background:url(/skin/person/images/fourm.png) no-repeat 0 -100px"></b> <span>手机绑定<br>
          <em>已设置</em></span>
                    <p>进行手机验证后，可用于接收敏感操作的身份验证信息，以及进行积分消费的验证确认，非常有助于保护您的账号和账户财产安全。</p>
                    <a href="#">修改手机</a> </div>
                <!--一条开始a-->
                <div class="gezhong_szm_in"> <b style=" background:url(/skin/person/images/fourm.png) no-repeat 0 -150px"></b> <span>支付密码<br>
          <em>已设置</em></span>
                    <p>设置支付密码后，在使用账户中余额时，需输入支付密码。</p>
                    <a href="#">修改密码</a> </div>
            </div>
        </div>
        <!--一条开始-->
        <div class="public_m1">
            <div class="public_m2">绑定手机</div>
            <!--提示信息-->
            <div class="tip_notem">
                <ul>
                    <li>1. 绑定手机后可直接通过短信接受安全验证等重要操作。</li>
                    <li>2. 更改手机时，请通过安全验证后重新输入新手机号码绑定。</li>
                    <li>3. 收到安全验证码后，请在30分钟内完成验证。</li>
                </ul>
            </div>
            <div class="public_m4">
                <p> <em>绑定手机号码：</em>
                    <input type="text" style=" height:23px; border:1px solid #eaeaea; width:140px">
                    <input type="button" id="btnsj" class="btn_mfyzm" value="获取验证码" style=" border:1px solid #c8c8c8; margin-left:6px"/>
                </p>
                <p> <em>收到的验证码：</em>
                    <input type="text" style=" height:23px; border:1px solid #eaeaea; width:140px">
                </p>
                <a href="#" class="public_m3">立即绑定</a> </div>
        </div>
        <!--一条开始-->
        <div class="public_m1">
            <div class="public_m2">绑定邮箱</div>
            <!--提示信息-->
            <div class="tip_notem">
                <ul>
                    <li>1. 此邮箱将接收密码找回，订单通知等敏感性安全服务及提醒使用，请务必填写正确地址。</li>
                    <li>2. 设置提交后，系统将自动发送验证邮件到您绑定的信箱，您需在24小时内登录邮箱并完成验证。</li>
                    <li>3. 更改邮箱时，请通过安全验证后重新输入新邮箱地址绑定。</li>
                </ul>
            </div>
            <div class="public_m4">
                <p> <em>绑定邮箱地址：</em>
                    <input type="text" style=" height:23px; border:1px solid #eaeaea; width:140px">
                </p>
                <a href="#" class="public_m3">发送验证邮件</a> </div>
        </div>
        <!--一条开始-->
        <div class="public_m1">
            <div class="public_m2">实名认证</div>
            <!--提示信息-->
            <div class="tip_notem">
                <ul>
                    <li>1. 我们将对您的信息绝对保密</li>
                    <li>2. 认证可以提高信誉</li>
                    <li>3. 认证完全免费，认证成功后不可修改</li>
                </ul>
            </div>
            <div class="public_m4">
                <p> <em>真实姓名：</em>
                    <input type="text" style=" height:23px; border:1px solid #eaeaea; width:140px">
                </p>
                <p> <em>身份证号：</em>
                    <input type="text" style=" height:23px; border:1px solid #eaeaea; width:140px">
                </p>
                <p> <em>上传身份证：</em>
                    <input type="file" style=" height:23px; border:1px solid #eaeaea; width:140px">
                </p>
                <a href="#" class="public_m3">提交认证</a> </div>
        </div>
        <!--一条开始-->
        <div class="public_m1">
            <div class="public_m2">登录密码修改</div>
            <!--提示信息-->
            <div class="tip_notem">
                <ul>
                    <li>1.请牢记登录密码</li>
                    <li>2.如果丢失密码，可以通过绑定的手机或邮箱找到</li>
                </ul>
            </div>
            <div class="public_m4">
                <p> <em>原密码：</em>
                    <input type="text" style=" height:23px; border:1px solid #eaeaea; width:140px">
                </p>
                <p> <em>新的密码：</em>
                    <input type="text" style=" height:23px; border:1px solid #eaeaea; width:140px">
                </p>
                <p> <em>确认密码：</em>
                    <input type="text" style=" height:23px; border:1px solid #eaeaea; width:140px">
                </p>
                <a href="#" class="public_m3">确认修改</a> </div>
        </div>
        <!--一条开始-->
        <div class="public_m1">
            <div class="public_m2">交易密码修改</div>
            <!--提示信息-->
            <div class="tip_notem">
                <ul>
                    <li>1.请牢记登录密码</li>
                    <li>2.如果丢失密码，可以通过绑定的手机或邮箱找到</li>
                </ul>
            </div>
            <div class="public_m4">
                <p> <em>原密码：</em>
                    <input type="text" style=" height:23px; border:1px solid #eaeaea; width:140px">
                </p>
                <p> <em>验证码：</em>
                    <input type="text" style=" height:23px; border:1px solid #eaeaea; width:140px">
                    <input type="button" id="btnsj" class="btn_mfyzm" value="获取验证码" style=" border:1px solid #c8c8c8; margin-left:6px"/>
                </p>
                <p> <em>新的密码：</em>
                    <input type="text" style=" height:23px; border:1px solid #eaeaea; width:140px">
                </p>
                <p> <em>确认密码：</em>
                    <input type="text" style=" height:23px; border:1px solid #eaeaea; width:140px">
                </p>
                <a href="#" class="public_m3">确认修改</a> </div>
        </div>
        <!--一条开始-->
        <div class="public_m1">
            <div class="public_m2">收藏店铺</div>
            <!--一个订单信息-->
            <div class="public_m5">
                <table border="0" cellspacing="0" cellpadding="0">
                    <tbody>
                    <tr style=" border-bottom:1px solid #000">
                        <th class="olist1">店铺名</th>
                        <th class="olist2">店铺地址</th>
                        <th class="olist3">收藏人气</th>
                        <th class="olist4">菜系</th>
                        <th class="olist5">操作</th>
                    </tr>
                    <tr>
                        <td><a href="#">我的店</a></td>
                        <td>黄台家具广场...</td>
                        <td>3</td>
                        <td class="money">鲁菜</td>
                        <td><a href="#">取消收藏</a></td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <!--当没有东西时的东西-->
            <div class="public_m6"> <img src="/skin/person/picture/danmgydxm.png"/> </div>
        </div>
        <!--一条开始-->
        <div class="public_m1">
            <div class="public_m2">账户余额</div>
            <!--账户余额-->
            <div class="zanghye_m"> <em>可用余额：</em><i>￥84.00</i> <em>冻结金额：</em><i>￥0.00</i> <em>累计赠送：</em><i>￥3.20</i> </div>
            <!--充值提现-->
            <div class="chongzhi_htxm"> <a href="#">充值</a> <a href="#">提现</a> <a href="#" class="chakangd_m">查看更多</a> </div>
            <!--一个订单信息-->
            <div class="public_m5">
                <table border="0" cellspacing="0" cellpadding="0">
                    <tbody>
                    <tr style=" border-bottom:1px solid #000">
                        <th class="olist1">交易类型</th>
                        <th class="olist2">可用余额（元）</th>
                        <th class="olist3">变化金额（元）</th>
                        <th class="olist4">冻结金额（元）</th>
                        <th class="olist5">交易时间</th>
                        <th class="olist5">操作</th>
                    </tr>
                    <tr>
                        <td><a href="#">余额充值</a></td>
                        <td>￥84.00</td>
                        <td>+1</td>
                        <td class="money">0</td>
                        <td>2016/06/06 20:30</td>
                        <td><a href="#" style=" margin-right:6px">查看</a><a href="#">删除</a></td>
                    </tr>
                    <tr>
                        <td><a href="#">余额充值</a></td>
                        <td>￥84.00</td>
                        <td>+1</td>
                        <td class="money">0</td>
                        <td>2016/06/06 20:30</td>
                        <td><a href="#" style=" margin-right:6px">查看</a><a href="#">删除</a></td>
                    </tr>
                    <tr>
                        <td><a href="#">余额充值</a></td>
                        <td>￥84.00</td>
                        <td>+1</td>
                        <td class="money">0</td>
                        <td>2016/06/06 20:30</td>
                        <td><a href="#" style=" margin-right:6px">查看</a><a href="#">删除</a></td>
                    </tr>
                    <tr>
                        <td><a href="#">余额充值</a></td>
                        <td>￥84.00</td>
                        <td>+1</td>
                        <td class="money">0</td>
                        <td>2016/06/06 20:30</td>
                        <td><a href="#" style=" margin-right:6px">查看</a><a href="#">删除</a></td>
                    </tr>
                    <tr>
                        <td><a href="#">余额充值</a></td>
                        <td>￥84.00</td>
                        <td>+1</td>
                        <td class="money">0</td>
                        <td>2016/06/06 20:30</td>
                        <td><a href="#" style=" margin-right:6px">查看</a><a href="#">删除</a></td>
                    </tr>
                    <tr>
                        <td><a href="#">余额充值</a></td>
                        <td>￥84.00</td>
                        <td>+1</td>
                        <td class="money">0</td>
                        <td>2016/06/06 20:30</td>
                        <td><a href="#" style=" margin-right:6px">查看</a><a href="#">删除</a></td>
                    </tr>
                    <tr>
                        <td><a href="#">余额充值</a></td>
                        <td>￥84.00</td>
                        <td>+1</td>
                        <td class="money">0</td>
                        <td>2016/06/06 20:30</td>
                        <td><a href="#" style=" margin-right:6px">查看</a><a href="#">删除</a></td>
                    </tr>
                    <tr>
                        <td><a href="#">余额充值</a></td>
                        <td>￥84.00</td>
                        <td>+1</td>
                        <td class="money">0</td>
                        <td>2016/06/06 20:30</td>
                        <td><a href="#" style=" margin-right:6px">查看</a><a href="#">删除</a></td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <!--翻页符号-->
            <div class="fanyefh_m"> <a href="#">上一页</a> <a href="#"class="addclass_m">1</a> <a href="#">2</a> <a href="#">3</a> <a href="#">下一页</a> </div>
        </div>
        <!--一条开始-->
        <div class="public_m1">
            <div class="public_m2">我的消息</div>

            <!--充值提现-->
            <div class="chongzhi_htxm"> <a href="#">系统消息<font>(0)</font></a> <a href="#">商家消息<font>(2)</font></a> </div>
            <!--全选和删除-->
            <div class="chice_allm">
                <input type="checkbox">
                <i>全选</i> <span>删除</span> </div>
            <!--一个订单信息-->
            <div class="public_m5">
                <table border="0" cellspacing="0" cellpadding="0">
                    <tbody>
                    <tr style=" border-bottom:1px solid #000">
                        <th class="olist1">发信人</th>
                        <th class="olist2">标题</th>
                        <th class="olist3">时间</th>
                        <th class="olist4">操作</th>
                    </tr>
                    <tr>
                        <td><a href="#">木木小店</a></td>
                        <td>吃饭了么...</td>
                        <td>2016/06/06 20:30</td>
                        <td><a href="#" style=" margin-right:6px">查看</a><a href="#">删除</a></td>
                    </tr>
                    <tr>
                        <td><a href="#">木木小店</a></td>
                        <td>吃饭了么...</td>
                        <td>2016/06/06 20:30</td>
                        <td><a href="#" style=" margin-right:6px">查看</a><a href="#">删除</a></td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <!--当没有东西时的东西-->
            <div class="public_m6"> <img src="/skin/person/picture/danmgydxm.png"/> </div>
        </div>
        <!--一条开始-->
        <div class="public_m1">
            <div class="public_m2">我的消息</div>

            <!--充值提现-->
            <div class="chongzhi_htxm"> <a href="#">系统消息<font>(0)</font></a> <a href="#">商家消息<font>(2)</font></a> </div>
            <!--全选和删除-->
            <div class="chice_allm">
                <input type="checkbox">
                <i>全选</i> <a href="#">删除</a> <a href="#">添加好友</a> <a href="#">好友请求（0）</a> </div>
            <!--一个订单信息-->
            <div class="public_m5">
                <table border="0" cellspacing="0" cellpadding="0">
                    <tbody>
                    <tr style=" border-bottom:1px solid #000">
                        <th class="olist1">好友名称</th>
                        <th class="olist2">添加时间</th>
                        <th class="olist4">操作</th>
                    </tr>
                    <tr>
                        <td><a href="#">瓜牛</a></td>
                        <td>2016/06/06 20:30</td>
                        <td><a href="#" style=" margin-right:6px">查看</a><a href="#">删除</a></td>
                    </tr>
                    <tr>
                        <td><a href="#">瓜牛</a></td>
                        <td>2016/06/06 20:30</td>
                        <td><a href="#" style=" margin-right:6px">查看</a><a href="#">删除</a></td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <!--当没有东西时的东西-->
            <div class="public_m6"> <img src="/skin/person/picture/danmgydxm.png"/> </div>
        </div>

        <!--占空隙-->
        <div class="whatfuck_m"></div>
        <div class="public_m1">
            <div class="public_m2">购物车</div>
            <!--一个订单信息-->
            <div class="public_m5">
                <table border="0" cellspacing="0" cellpadding="0">
                    <tbody>
                    <tr style=" border-bottom:1px solid #000">
                        <th class="olist1">订单号</th>
                        <th class="olist2">订单类型</th>
                        <th class="olist3">订单商家</th>
                        <th class="olist4">订单总额</th>
                        <th class="olist5">下单时间</th>
                        <th class="olist4">交易状态</th>
                        <th class="olist5">操作</th>
                    </tr>
                    <tr>
                        <td><a href="#">2016102111523538</a></td>
                        <td>餐位订餐</td>
                        <td><a href="#">牛牛的店</a></td>
                        <td>￥1666.00</td>
                        <td>16/06/06  20:45</td>
                        <td><font class="jdqbsys_m">待付款</font></td>
                        <td><a href="#">付款</a><a href="#">取消订单</a></td>
                    </tr>
                    <tr>
                        <td><a href="#">2016102111523538</a></td>
                        <td>餐位订餐</td>
                        <td><a href="#">牛牛的店</a></td>
                        <td>￥1666.00</td>
                        <td>16/06/06  20:45</td>
                        <td><font class="jds_m">待评价</font></td>
                        <td><a href="#">评价</a><a href="#">投诉</a></td>
                    </tr>
                    <tr>
                        <td><a href="#">2016102111523538</a></td>
                        <td>餐位订餐</td>
                        <td><a href="#">牛牛的店</a></td>
                        <td>￥1666.00</td>
                        <td>16/06/06  20:45</td>
                        <td><font class="jds_m">已完成</font></td>
                        <td><a href="#">删除</a><a href="#">查看详情</a></td>
                    </tr>
                    <tr>
                        <td><a href="#">2016102111523538</a></td>
                        <td>餐位订餐</td>
                        <td><a href="#">牛牛的店</a></td>
                        <td>￥1666.00</td>
                        <td>16/06/06  20:45</td>
                        <td><font class="jdqbsys_m">待付款</font></td>
                        <td><a href="#">付款</a><a href="#">取消订单</a></td>
                    </tr>
                    <tr>
                        <td><a href="#">2016102111523538</a></td>
                        <td>餐位订餐</td>
                        <td><a href="#">牛牛的店</a></td>
                        <td>￥1666.00</td>
                        <td>16/06/06  20:45</td>
                        <td><font class="jdqbsys_m">待付款</font></td>
                        <td><a href="#">付款</a><a href="#">取消订单</a></td>
                    </tr>
                    <tr>
                        <td><a href="#">2016102111523538</a></td>
                        <td>餐位订餐</td>
                        <td><a href="#">牛牛的店</a></td>
                        <td>￥1666.00</td>
                        <td>16/06/06  20:45</td>
                        <td><font class="jdqbsys_m">待付款</font></td>
                        <td><a href="#">付款</a><a href="#">取消订单</a></td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <!--查看更多-->
            <div class="chagd_m"> <a href="#">查看更多</a> </div>
        </div>
        <!--占空隙-->
        <div class="whatfuck_m"></div>
        <div class="public_m1">
            <!--收藏菜品和收藏店铺还有查看中心-->
            <div class="pingpyj_m"> <span class="lianj_m" tg-floor="1" tg-ct="lq01">店铺收藏</span> <span tg-floor="1" tg-ct="lq02">菜品收藏</span> <a href="#">更多></a> </div>
            <!--大包-->
            <div class="thisis_m">
                <ul class="q-1-lq01">
                    <li> <img src="/skin/person/picture/mkjlm.jpg"/>
                        <h5>城南往事</h5>
                        <span>人气：<i>5000</i></span>
                        <p><em>菜系：</em> <b><img src="/skin/person/picture/lu.png"/></b> </p>
                    </li>
                    <li> <img src="/skin/person/icture/mkjlm.jpg"/>
                        <h5>城南往事</h5>
                        <span>人气：<i>5000</i></span>
                        <p><em>菜系：</em> <b><img src="/skin/person/icture/lu.png"/></b> </p>
                    </li>
                    <li> <img src="/skin/person/picture/mkjlm.jpg"/>
                        <h5>城南往事</h5>
                        <span>人气：<i>5000</i></span>
                        <p><em>菜系：</em> <b><img src="/skin/person/picture/lu.png"/></b> </p>
                    </li>
                    <li> <img src="/skin/person/picture/mkjlm.jpg"/>
                        <h5>城南往事</h5>
                        <span>人气：<i>5000</i></span>
                        <p><em>菜系：</em> <b><img src="/skin/person/picture/lu.png"/></b> </p>
                    </li>
                    <li> <img src="/skin/person/picture/mkjlm.jpg"/>
                        <h5>城南往事</h5>
                        <span>人气：<i>5000</i></span>
                        <p><em>菜系：</em> <b><img src="/skin/person/picture/lu.png"/></b> </p>
                    </li>
                    <li> <img src="/skin/person/picture/mkjlm.jpg"/>
                        <h5>城南往事</h5>
                        <span>人气：<i>5000</i></span>
                        <p><em>菜系：</em> <b><img src="/skin/person/picture/lu.png"/></b> </p>
                    </li>
                </ul>
                <ul class="q-1-lq02">
                    <li> <img src="/skin/person/picture/mkjlm.jpg"/>
                        <h5>城南往事</h5>
                        <span>人气：<i>6000</i></span>
                        <p><em>菜系：</em> <b><img src="/skin/person/picture/lu.png"/></b> </p>
                    </li>
                    <li> <img src="/skin/person/picture/mkjlm.jpg"/>
                        <h5>城南往事</h5>
                        <span>人气：<i>6000</i></span>
                        <p><em>菜系：</em> <b><img src="/skin/person/picture/lu.png"/></b> </p>
                    </li>
                    <li> <img src="/skin/person/icture/mkjlm.jpg"/>
                        <h5>城南往事</h5>
                        <span>人气：<i>6000</i></span>
                        <p><em>菜系：</em> <b><img src="/skin/person/picture/lu.png"/></b> </p>
                    </li>
                    <li> <img src="/skin/person/picture/mkjlm.jpg"/>
                        <h5>城南往事</h5>
                        <span>人气：<i>6000</i></span>
                        <p><em>菜系：</em> <b><img src="/skin/person/picture/lu.png"/></b> </p>
                    </li>
                    <li> <img src="/skin/person/picture/mkjlm.jpg"/>
                        <h5>城南往事</h5>
                        <span>人气：<i>6000</i></span>
                        <p><em>菜系：</em> <b><img src="/skin/person/picture/lu.png"/></b> </p>
                    </li>
                    <li> <img src="/skin/person/picture/mkjlm.jpg"/>
                        <h5>城南往事</h5>
                        <span>人气：<i>6000</i></span>
                        <p><em>菜系：</em> <b><img src="/skin/person/picture/lu.png"/></b> </p>
                    </li>
                </ul>
            </div>
            <script>
                $(function(){
                    $(".pingpyj_m span").click(function(){
                        $(this).addClass("lianj_m").siblings().removeClass("lianj_m")
                        var tbs=$(this).attr("tg-floor")
                        var tb=$(this).attr("tg-ct");
                        $(".q-"+tbs+"-"+tb+"").show().siblings().hide();
                    })

                })
            </script>
        </div>
        <!--一条开始-->
        <div class="public_m1">
            <div class="public_m2">订单投诉</div>
            <!--一个订单信息-->
            <div class="public_m5">
                <table border="0" cellspacing="0" cellpadding="0">
                    <tbody>
                    <tr style=" border-bottom:1px solid #000">
                        <th class="olist1">订单编号</th>
                        <th class="olist2">下单时间</th>
                        <th class="olist4">订单商家</th>
                        <th class="olist4">截单时间</th>
                        <th class="olist4">状态</th>
                    </tr>
                    <tr>
                        <td><a href="#">2016102111523538</a></td>
                        <td>2016-10-21 12:03</td>
                        <td><a href="#">城南往事</a></td>
                        <td>2016-10-21 12:03</td>
                        <td>正在点评</td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <!--评价星级-->
            <div class="pjxingji_m">
                <ul>
                    <li> <em>菜品质量：</em>
                        <input type="radio" name="cpzl_m1">
                        <img src="/skin/person/picture/1xing.png"/>
                        <input type="radio" name="cpzl_m1">
                        <img src="/skin/person/picture/2xing.png">
                        <input type="radio" name="cpzl_m1">
                        <img src="/skin/person/picture/3xing.png"/>
                        <input type="radio" name="cpzl_m1">
                        <img src="/skin/person/picture/4xing.png">
                        <input type="radio" name="cpzl_m1">
                        <img src="/skin/person/picture/5xing.png"> </li>
                    <li> <em>服务质量：</em>
                        <input type="radio" name="cpzl_m2">
                        <img src="/skin/person/picture/1xing.png"/>
                        <input type="radio" name="cpzl_m2">
                        <img src="/skin/person/picture/2xing.png"/>
                        <input type="radio" name="cpzl_m2">
                        <img src="/skin/person/picture/3xing.png"/>
                        <input type="radio" name="cpzl_m2">
                        <img src="/skin/person/picture/4xing.png"/>
                        <input type="radio" name="cpzl_m2">
                        <img src="/skin/person/picture/5xing.png"/> </li>
                    <li> <em>就餐环境：</em>
                        <input type="radio" name="cpzl_m3">
                        <img src="/skin/person/picture/1xing.png"/>
                        <input type="radio" name="cpzl_m3">
                        <img src="/skin/person/picture/2xing.png"/>
                        <input type="radio" name="cpzl_m3">
                        <img src="/skin/person/picture/3xing.png"/>
                        <input type="radio" name="cpzl_m3">
                        <img src="/skin/person/picture/4xing.png"/>
                        <input type="radio" name="cpzl_m3">
                        <img src="/skin/person/picture/5xing.png"/> </li>
                </ul>
            </div>
            <!--我的牛评-->
            <div class="my_lm"> <em>我的牛评：</em>
                <textarea></textarea>
            </div>
            <!--选择上传文件-->
            <div class="myinput_lm"> <em>上传图拍：</em>
                <input type="file">
                <input type="checkbox">
                <i>匿名上传</i> </div>
            <a href="#" class="public_m3">提交</a> </div>
        <!--一条开始-->
        <div class="public_m1">
            <div class="public_m2">我的消息</div>

            <!--充值提现-->
            <div class="chongzhi_htxm"> <a href="#">店铺收藏</a> <a href="#">菜品收藏</a> </div>
            <!--全选和删除-->
            <div class="chice_allm">
                <input type="checkbox">
                <i>全选</i> <a href="javascript:void(0)">删除</a> </div>
            <!--收藏开始-->
            <div class="rensw_bejm">
                <ul>
                    <li> <img src="/skin/person/picture/mkjlm.jpg"/> <a href="#">
                            <h5>城南往事</h5>
                        </a> <span>人气：<i>5000</i></span>
                        <p> <em>菜系：</em> <b><img src="/skin/person/picture/lu.png"/></b> </p>
                    </li>
                    <li> <img src="/skin/person/picture/mkjlm.jpg"/> <a href="#">
                            <h5>城南往事</h5>
                        </a> <span>人气：<i>5000</i></span>
                        <p> <em>菜系：</em> <b><img src="/skin/person/picture/lu.png"/></b> </p>
                    </li>
                    <li> <img src="picture/mkjlm.jpg"/> <a href="#">
                            <h5>城南往事</h5>
                        </a> <span>人气：<i>5000</i></span>
                        <p> <em>菜系：</em> <b><img src="picture/lu.png"/></b> </p>
                    </li>
                    <li> <img src="/skin/person/picture/mkjlm.jpg"/> <a href="#">
                            <h5>城南往事</h5>
                        </a> <span>人气：<i>5000</i></span>
                        <p> <em>菜系：</em> <b><img src="/skin/person/picture/lu.png"/></b> </p>
                    </li>
                    <li> <img src="/skin/person/picture/mkjlm.jpg"/> <a href="#">
                            <h5>城南往事</h5>
                        </a> <span>人气：<i>5000</i></span>
                        <p> <em>菜系：</em> <b><img src="/skin/person/picture/lu.png"/></b> </p>
                    </li>
                    <li> <img src="/skin/person/picture/mkjlm.jpg"/> <a href="#">
                            <h5>城南往事</h5>
                        </a> <span>人气：<i>5000</i></span>
                        <p> <em>菜系：</em> <b><img src="/skin/person/picture/lu.png"/></b> </p>
                    </li>
                    <li> <img src="/skin/person/picture/mkjlm.jpg"/> <a href="#">
                            <h5>城南往事</h5>
                        </a> <span>人气：<i>5000</i></span>
                        <p> <em>菜系：</em> <b><img src="/skin/person/picture/lu.png"/></b> </p>
                    </li>
                    <li> <img src="/skin/person/picture/mkjlm.jpg"/> <a href="#">
                            <h5>城南往事</h5>
                        </a> <span>人气：<i>5000</i></span>
                        <p> <em>菜系：</em> <b><img src="/skin/person/picture/lu.png"/></b> </p>
                    </li>
                    <li> <img src="/skin/person/picture/mkjlm.jpg"/> <a href="#">
                            <h5>城南往事</h5>
                        </a> <span>人气：<i>5000</i></span>
                        <p> <em>菜系：</em> <b><img src="/skin/person/picture/lu.png"/></b> </p>
                    </li>
                    <li> <img src="/skin/person/picture/mkjlm.jpg"/> <a href="#">
                            <h5>城南往事</h5>
                        </a> <span>人气：<i>5000</i></span>
                        <p> <em>菜系：</em> <b><img src="picture/lu.png"/></b> </p>
                    </li>
                </ul>
            </div>
            <div class="public_m6"> <img src="/skin/person/picture/danmgydxm.png"/> </div>
        </div>
    </div>
</div>
<?php echo $__env->make('home.public.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
</body>
</html>