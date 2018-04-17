    var vData = {
        sname: {
            norm: /^([\u4e00-\u9fa5]){2,7}$/,
            error: '请输入2-7个汉字！'
        },
        sphone: {
            norm: /^0{0,1}(13[0-9]|15[7-9]|153|156|18[7-9])[0-9]{8}$/,
            error: '请输入11位正确有效的手机号码！'
        },
        province: {
            norm:  /.+/,
            error: '请选择省级！'
        },
        city: {
            norm:  /.+/,
            error: '请选择市级！'
        },
        county: {
            norm:  /.+/,
            error: '请选择县级！'
        },
        addrinfo: {
            norm: /^([\u4e00-\u9fa5]){6,18}$/,
            error: '详细地址6-18个汉字！'
        },

    };

    $('#upForm').valid(vData, function(){
      $.ajax({
                type:"post",
                url:'/ajaxArea',
                data:$('#upForm').serialize(),
                success:function (data) {
                    alert(data.msg);

                },
                error:function () {
                     alert(data.msg);
                }
          });
    });

 function checkaddr(id,province,city,count,addrinfo){
		 $("#aid").val(id);
		  
}
    $(function() {
        $('.item').click(function() {
            $(this).addClass("selected").siblings().removeClass("selected");
        })
    });
    function dashangToggle(){
        $(".hide_box").fadeToggle();
        $(".shang_box").fadeToggle();
    }
