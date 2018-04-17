/**
 * Created by Administrator on 2017/5/24.
 */

$(function () {

    //全局的checkbox选中和未选中的样式
    var $allCheckbox = $('input[type="checkbox"]'),     //全局的全部checkbox
        $wholeChexbox = $('.whole_check'),
        $cartBox = $('.cartBox'),                       //每个商铺盒子
        $shopCheckbox = $('.shopChoice'),               //每个商铺的checkbox
        $sonCheckBox = $('.son_check');                 //每个商铺下的商品的checkbox
		
    $allCheckbox.click(function () {
        if ($(this).is(':checked')) {
            $(this).next('label').addClass('mark');
        } else {
            $(this).next('label').removeClass('mark')
        }
    });

    //===============================================全局全选与单个商品的关系================================
    $wholeChexbox.click(function () {
        var $checkboxs = $cartBox.find('input[type="checkbox"]');
        if ($(this).is(':checked')) {
            $checkboxs.prop("checked", true);
            $checkboxs.next('label').addClass('mark');
        } else {
            $checkboxs.prop("checked", false);
            $checkboxs.next('label').removeClass('mark');
        }
       
	 
		totalMoney();
    });

    //单选
    $sonCheckBox.each(function () {
        $(this).click(function () {
            if ($(this).is(':checked')) {
                //判断：所有单个商品是否勾选
                var len = $sonCheckBox.length;
                var num = 0;
                $sonCheckBox.each(function () {
                    if ($(this).is(':checked')) {
                        num++;
                    }
                });
                if (num == len) {
                    $wholeChexbox.prop("checked", true);
                    $wholeChexbox.next('label').addClass('mark');
                }
            } else {
                //单个商品取消勾选，全局全选取消勾选
                $wholeChexbox.prop("checked", false);
                $wholeChexbox.next('label').removeClass('mark');
				$wholeChexbox.next('label').removeClass('checked');
            }
			
			 
            totalMoney();
        })
    })
});




//增加数量
function stockNum(i,id,gid,token,met) {

    //获取当前商品数量
    var num = $("#num_" + i).val();

    //判断库存
    $.ajax({
        type:"post",
        async : false,  //同步请求
        url:'/addCart/stock',
        timeout:1000,
        cache:false,
        data:{id:id,num:num,gid:gid,_token:token,met:met},
        success:function (data) {

            if(data.status == 1){
                $("#sum_" + i).val(data.num);                       //刷新商品数量
                $("#smalprice_" + i).html("￥" + data.subTotal);    //刷新商品小计
                $("#num_" + i).val(data.num);                       //刷新商品数量
                totalMoney();
            }else {
                $("#sum_" + i).val(data.num);//要刷新的div
                if(data.msg){
                    alert(data.msg);
                }
            }
        },
        error:function () {
            alert('ajax:error')
        }
    });
}

//======================================移除商品========================================

var $order_lists = null;
var $order_content = '';
$('.delBtn').click(function () {
    $order_lists = $(this).parents('.order_lists');
    $order_content = $order_lists.parents('.order_content');
    $('.model_bg').fadeIn(300);
    $('.my_model').fadeIn(300);
});

//关闭模态框
$('.closeModel').click(function () {
    closeM();
});
$('.dialog-close').click(function () {
    closeM();
});
function closeM() {
    $('.model_bg').fadeOut(300);
    $('.my_model').fadeOut(300);
}
//确定按钮，移除商品
$('.dialog-sure').click(function () {
    var id = $('.cartId').attr("id");
    var cartId = $("#"+id).val();
    var token = $("#_token").val();
    $order_lists.remove();
    closeM();
    $sonCheckBox = $('.son_check');
    totalMoney();
    delCart(cartId,token)
});

function delCart(cartId,token){
    $.ajax({
        type:"post",
        url:'/addCart/delCart',
        data:{cartId:cartId,_token:token},
        success:function (data) {
            alert(data.msg);
        },
        error:function () {
            alert('ajax:error')
        }
    });
}
//======================================总计==========================================
function totalMoney() {

    var total_money = 0;
    var total_count = 0;
    var calBtn = $('.calBtn a');
    $sonCheckBox = $('.son_check');

    var i = 0;
    $sonCheckBox.each(function () {
        if($("#checkbox_" + i).is(":checked")){
            var goods_price = $("#price_" + i).val() * $("#num_" + i).val();
            total_money = Number(total_money) + Number(goods_price);
            total_count = Number(total_count) + Number($("#num_" + i).val());
        }
        i++;
    });

    $('.total_text').html('￥'+total_money.toFixed(2));
    $('.piece_num').html(total_count);


    if(total_money!=0 && total_count!=0){
        if(!calBtn.hasClass('btn_sty')){
            calBtn.addClass('btn_sty');
        }
    }else{
        if(calBtn.hasClass('btn_sty')){
            calBtn.removeClass('btn_sty');
        }
    }

}



//商品数量判断
function  checkNum(i,id,gid,token,num,met){
    if(num == 0){
        $("#sum_" + i).val(1);
        $("#num_" + i).val(1);
        stockNum(i,id,gid,token,met);
    }else if(!isPositiveInteger(num)){
        $("#sum_" + i).val(1);
        $("#num_" + i).val(1);
        stockNum(i,id,gid,token,met);
    }else if(num >1){
        $("#num_" + i).val(num);
        stockNum(i,id,gid,token,met);
    }

}
//是否为正整数
function isPositiveInteger(s){
    var re = /^[0-9]+$/ ;
    return re.test(s);
}

//选中cat_id
function SubCart(){

			var  cart_id = '';
			$("input[name='goodbox']:checkbox").each(function () {
			if (true == $(this).is(':checked')) {
				cart_id += $(this).val() + ",";
                window.location.href = "/order?id="+cart_id;
			}
			});
			
			$("#goodgid").val(cart_id);	
}

