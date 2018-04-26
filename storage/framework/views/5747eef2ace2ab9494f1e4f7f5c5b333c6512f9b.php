<?php $__env->startSection('main'); ?>
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
            <?php $__currentLoopData = $addrList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($v->sname); ?></td>
                <td><?php echo e($v->sphone); ?></td>
                <td><?php echo e($v->prov_cn); ?>-<?php echo e($v->city_cn); ?>-<?php echo e($v->coun_cn); ?> <?php echo e($v->addrinfo); ?></td>
                <td class="money"><?php echo e($v->tag); ?></td>
                <td><a href="">修改</a><a href="javascript:void(0);" onclick="delAddr(<?php echo e($v->id); ?>)">删除</a></td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>

</div>
<div id="addrinfo" class="white_content">
    <style>
        .addrclose{float: right;}
        .input{height:23px; border:1px solid #eaeaea; }
    </style>
    <div class="public_m1">
        <div class="public_m2">添加新地址
            <a class="addrclose" href="javascript:void(0);" onClick="closeAddr()" title="关闭"><img src="/skin/cart/images/close.jpg" alt="取消" /></a>
        </div>
        <div class="public_m4">
            <form id="creatAddr">
                <?php echo e(csrf_field()); ?>

            <p> <em>收件人姓名：</em>
                <input type="text" name="sname" class="input">
            </p>
            <p> <em>手机号：</em>
                <input type="text" name="sphone" class="input">
            </p>
            <p> <em>地址：</em>
                    <select name="province" id="province" class="select-1 input" onchange="addChange(this.value,1)"  >
                        <option>省份/自治区</option>
                        <?php $__currentLoopData = $province; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($v->code); ?>"><?php echo e($v->name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                    <select name="city"  id="city" class="select-2 input" onchange="addChange(this.value,2)"  >
                        <option value=""> --请选择市-- </option>
                    </select>
                    <select  name="county"  id="county" class="select-3 input"  >
                        <option value=""> --请选择区-- </option>
                    </select>
            </p>
            <p> <em>详细地址：</em>
                <input type="text" name="addrinfo" class="input">
            </p>
            <p> <em>地址标签：</em>
                <input type="text" name="tag" class="input">
            </p>
                    <a href="javascript:void(0);" id="submit" class="public_m3">保存修改</a>
            </form>
    </div>
    </div>
</div>
<div id="closeAddr" class="black_overlay"></div>

    <script>
        //添加地址
        function createAddr() {
            document.getElementById('addrinfo').style.display='block';
            document.getElementById('closeAddr').style.display='block';
            $("#submit").click( function() {
                $.ajax({
                    type:'post',
                    url:'/person/createAddr',
                    data:$('#creatAddr').serialize(),
                    success:function(data){
                        alert(data.msg);
                        closeAddr();
                        window.location.reload();
                    },
                    error:function(){
                        alert(JSON.stringify(err));
                    }
                })
            })
        }
        function closeAddr(){
            document.getElementById('addrinfo').style.display='none';
            document.getElementById('closeAddr').style.display='none'
        }
        
        //删除地址
        function delAddr(id) {
            $.ajax({
                type:'post',
                url:'/person/delAddr',
                data:{id:id,_token:'<?php echo e(csrf_token()); ?>'},
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
<script type="text/JavaScript">
    //省市区三级联动
    function addChange(val,level){
        var $city = $("#city");
        var $county = $("#county");
        $.ajax({
            type: "post",
            url: "/addrLinkage",
            data: { pcode: val,level:level,_token:'<?php echo e(csrf_token()); ?>'},
            beforeSend: function() {
                if(level=='1'){
                    $city.html('<option value=""> --请选择市-- </option>');
                    $city.val('');
                }
                $county.html('<option value=""> --请选择区-- </option>');
                $county.val('');
            },
            success: function(data) {
                var dataObj=eval("("+data+")");//转换为json对象
                if(dataObj['code']==1){
                    if(level=='1'){
                        $.each(dataObj['list'], function(i, item) {
                            $city.append('<option value="'+item['code']+'">'+item['name']+'</option>');
                        });
                    }else{
                        $.each(dataObj['list'], function(i, item) {
                            $county.append('<option value="'+item['code']+'">'+item['name']+'</option>');
                        });
                    }
                }
            },
            error: function(err){
                alert(JSON.stringify(err));
            }
        });
    }
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('home.public.person', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>