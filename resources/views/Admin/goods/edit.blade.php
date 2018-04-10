@extends('admin.public.admin')
@section('head')
<link rel="stylesheet" href="/assets/plugins/bootstrap/css/bootstrap.min.css">
<!-- Bootstrap Select Css -->
<link rel="stylesheet" href="/assets/plugins/bootstrap-select/css/bootstrap-select.css" />
<!-- Custom Css -->
<link rel="stylesheet" href="/assets/css/main.css">
<link rel="stylesheet" href="/assets/css/color_skins.css">
<!-- 图片上传css -->
<link href="{{asset('skin/Fileinput/css/fileinput.css')}}" rel="stylesheet">
<script src="{{asset('skin/Fileinput/js/jquery-1.11.1.min.js')}}"></script>
@endsection
@section('main')
<section class="content">
    <div class="block-header">
        <div class="row">
            <div class="col-lg-7 col-md-6 col-sm-12">
                <h2>编辑商品</h2>
            </div>
            <div class="col-lg-5 col-md-6 col-sm-12">
                <ul class="breadcrumb float-md-right">
                    <li class="breadcrumb-item"><a href="{{url('/admin')}}"><i class="zmdi zmdi-home"></i>系统主页</a></li>
                    <li class="breadcrumb-item"><a href="{{url('/admin/goods')}}">商品列表</a></li>
                    <li class="breadcrumb-item active">编辑商品</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <!-- Basic Validation -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="header">
                        <h2><strong>Goods</strong> Edit</h2>
                    </div>
                    <div class="body" >
                        <form id="form_validation" method="POST" action="{{url('admin/goods/'.$goods->id)}}">
                            <input type="hidden" name="_method" value="put">
                            {{csrf_field()}}

                        <!--标题 -->
                            <div class="row clearfix">
                                <div class="col-lg-1 col-md-2 col-sm-4 form-control-label">
                                    <label for="title">商品标题</label>
                                </div>
                                <div class="col-lg-2 col-md-10 col-sm-8">
                                    <div class="form-group">
                                        <input type="text"  class="form-control" name="title" value="{{$goods->title}}" required>
                                    </div>
                                </div>
                            </div>

                            <!--商品分类 -->
                            <div class="row clearfix">
                                <div class="col-lg-1 col-md-2 col-sm-4 form-control-label">
                                    <label for="soft">商品分类</label>
                                </div>
                                <div class="col-lg-2 col-md-10 col-sm-8">
                                    <select class="form-control show-tick" name="tid">
                                        @foreach($types as $v)
                                            <option  value="{{$v->id}}" @if($goods->tid == $v->id) selected @endif >{{$v->typename}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <!--商品品牌 -->
                            <div class="row clearfix">
                                <div class="col-lg-1 col-md-2 col-sm-4 form-control-label">
                                    <label for="soft">商品品牌</label>
                                </div>
                                <div class="col-lg-2 col-md-10 col-sm-8">
                                    <select class="form-control show-tick" name="bid"  onchange="chooseAttr(this.value);">
                                        @foreach($brand as $v)
                                            <option  value="{{$v->id}}" @if($goods->bid == $v->id) selected @endif >{{$v->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <!--商品原价 -->
                            <div class="row clearfix">
                                <div class="col-lg-1 col-md-2 col-sm-4 form-control-label">
                                    <label for="oldprice">商品原价</label>
                                </div>
                                <div class="col-lg-2 col-md-10 col-sm-8">
                                    <div class="form-group">
                                        <input type="number"  class="form-control" name="oldprice" value="{{$goods->oldprice}}">
                                    </div>
                                </div>
                            </div>
                            <!--优惠价格 -->
                            <div class="row clearfix">
                                <div class="col-lg-1 col-md-2 col-sm-4 form-control-label">
                                    <label for="price">优惠价格</label>
                                </div>
                                <div class="col-lg-2 col-md-10 col-sm-8">
                                    <div class="form-group">
                                        <input type="text"  class="form-control" name="price" value="{{$goods->price}}" >
                                    </div>
                                </div>
                            </div>

                            <!--商品属性 -->
                            <div class="row clearfix">
                                <div class="col-lg-1 col-md-2 col-sm-4 form-control-label">
                                    <label for="price">属性组</label>
                                </div>
                                <div class="col-lg-6 col-md-10 col-sm-8">
                                    <div class="form-group">
                                        <div class="row clearfix">
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" id="attrs_title"  value=""/>
                                                </div>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="form-group">
                                                    <button type="button" class=" btn btn-default btn-round" onclick="addattrs();">添加</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="attr_area">

                                @if($attr)
                                    @foreach($attr as $k=>$v)

                                        <div class="row clearfix" id="attrs{{$k}}_group">
                                            <div class="col-lg-1 col-md-2 col-sm-4 form-control-label">
                                                <label for="price">{{$v['title']}}:<input type="hidden" name="attrs_group[]" value="{{$v['title']}}">
                                                </label>
                                            </div>
                                            <div class="col-lg-6 col-md-10 col-sm-8">
                                                <div class="form-group">
                                                    <div class="row clearfix">
                                                        <div class="col-sm-4">
                                                            <div class="form-group">
                                                                <input type="text" class="form-control" id="attrs{{$k}}_add" value=""/>
                                                            </div>
                                                            <span id="attrs{{$k}}_area">
                                                                @foreach($attr[$k]['attrs'] as $ks=>$vs)
                                                                    <input type="checkbox" name="attrs{{$k}}[]" value="{{$attr[$k]['attrs'][$ks]}}" checked>{{$attr[$k]['attrs'][$ks]}}
                                                                @endforeach
                                                            </span>
                                                        </div>
                                                         <div class="col-sm-8">
                                                                <div class="form-group">
                                                                    <button type="button" class=" btn btn-default btn-round" onclick="addinput('{{$k}}')">添加</button>
                                                                </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                            <div class="row clearfix">
                                <div class="col-lg-6 col-md-10 col-sm-8">
                                    <div class="form-group">
                                        <div class="row clearfix">
                                            <table class="table table-striped table-hover table-bordered">
                                                <thead>
                                                <tr id="theadtr">
                                                    @if($attr)
                                                        @foreach($attr as $a)
                                                            <th>{{$a['title']}}</th>
                                                        @endforeach
                                                    @endif
                                                    <th id="trhead">价格</th>
                                                    <th>原价</th>
                                                    <th>库存</th>
                                                </tr>
                                                </thead>
                                                <tbody id="attrs">

                                                </tbody>
                                            </table>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--end 商品属性 -->

                            <!--图片上传 -->
                            <div class="row clearfix">
                                <div class="col-lg-1 col-md-2 col-sm-4 form-control-label">
                                    <label for="img">缩略图</label>
                                </div>
                                <div class="col-lg-3 col-md-10 col-sm-8">
                                    <div class="form-group">
                                        <input id="fileone" type="file" class="file-loading">
                                        @if($goods->picurl != null)
                                            <input type="hidden" id="picurl" placeholder="缩略图" name="picurl" value="{{$goods->picurl}}" >
                                        @endif
                                    </div>

                                </div>
                            </div>
                            <!--商品组图 -->
                            <div class="row clearfix">
                                <div class="col-lg-1 col-md-2 col-sm-4 form-control-label">
                                    <label for="img">组图</label>
                                </div>
                                <div class="col-lg-6 col-md-10 col-sm-8">
                                    <div class="form-group">
                                        <div class="col-sm-11">
                                            <input id="filepic" type="file" multiple>
                                            @if($pic != null)
                                                @foreach($pic as &$i)
                                                    <input type="hidden" value="{{$i['img']}}" name="picimg[]" flag="{{$i['info']}}" show="" >
                                                @endforeach
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <!--关键词 -->
                            <div class="row clearfix">
                                <div class="col-lg-1 col-md-2 col-sm-4 form-control-label">
                                    <label for="order_id">关键词</label>
                                </div>
                                <div class="col-lg-2 col-md-10 col-sm-8">
                                    <div class="form-group">
                                        <input type="text"  class="form-control" name="keywords" value="{{$goods->keywords}}" >
                                    </div>
                                </div>
                            </div>

                            <!--描述 -->
                            <div class="row clearfix">
                                <div class="col-lg-1 col-md-2 col-sm-4 form-control-label">
                                    <label for="description">描述</label>
                                </div>
                                <div class="col-lg-2 col-md-10 col-sm-8">
                                    <div class="form-group">
                                        <textarea name="description" cols="30" rows="5"  class="form-control no-resize"  aria-required="true">{{$goods->description}}</textarea>
                                    </div>
                                </div>
                            </div>
                            <!--状态 -->
                            <div class="row clearfix">
                                <div class="col-lg-1 col-md-2 col-sm-4 form-control-label">
                                    <label for="status">状态</label>
                                </div>
                                <div class="col-lg-2 col-md-10 col-sm-8">
                                    <div class="form-group">
                                        <div class="radio inlineblock m-r-20">
                                            <input type="radio" name="status" @if($goods->status == 0) checked @endif id="male" class="with-gap" value="0" >
                                            <label for="male">上架</label>
                                        </div>
                                        <div class="radio inlineblock">
                                            <input type="radio" name="status" @if($goods->status == 1) checked @endif id="Female" class="with-gap" value="1" >
                                            <label for="Female">下架</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--商品参数 -->
                            <div class="row clearfix">
                                <div class="col-lg-1 col-md-2 col-sm-4 form-control-label">
                                    <label for="status">商品参数</label>
                                </div>
                                <div class="col-lg-7 col-md-10 col-sm-8">
                                    <div class="form-group">
                                        <textarea id="ckeditor" name="parameter">{{$goods->parameter}} </textarea>
                                    </div>
                                </div>
                            </div>
                            <!--内容 -->
                            <div class="row clearfix">
                                <div class="col-lg-1 col-md-2 col-sm-4 form-control-label">
                                    <label for="description">文章内容</label>
                                </div>
                                <div class="col-lg-2 col-md-10 col-sm-8">
                                    <div class="form-group">
                                        <script type="text/javascript" charset="utf-8" src="{{url('/org/ueditor/ueditor.config.js')}}"></script>
                                        <script type="text/javascript" charset="utf-8" src="{{url('/org/ueditor/ueditor.all.min.js')}}"> </script>
                                        <script type="text/javascript" charset="utf-8" src="{{url('/org/ueditor/lang/zh-cn/zh-cn.js')}}"></script>
                                        <script type="text/javascript">
                                            //实例化编辑器
                                            var ue = UE.getEditor('editor');
                                        </script>
                                        <script id="editor" name="content" type="text/plain"  {{--style="width: 900px;height: 300px;"--}} >{!! $goods->content !!}</script>

                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-raised btn-primary btn-round waves-effect" type="submit">提交</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- #END# Basic Validation -->
    </div>
</section>

<script>
    $(document).ready(function() {
        fileinputOne("fileone","picurl");
        fileinputMore('filepic','picimg[]','picarr[]');
    });
    //单图上传
    function fileinputOne(fileid,field){
        var widths = arguments[2] ? arguments[2] : 'auto';//设置默认的图片宽度
        var heights = arguments[3] ? arguments[3] : '160px';//设置默认的图片高度
        //单图上传
        var $input = $("#"+fileid);
        var $picurl = $("#"+field);

        var $Preview =[];
        var $Config =[];
        if($picurl.val()!=''){
            $Preview =["<img class='kv-preview-data file-preview-image' style='width:"+widths+";height:"+heights+";' src='"+$picurl.val()+"'>"];
            $Config =[{key: 1}];
        }
        $input.fileinput({
            uploadUrl: "{{url('admin/uploads')}}",
            deleteUrl: "{{url('admin/updel')}}",
            uploadExtraData: {_token:'{{csrf_token()}}'},  //额外的参数
            autoReplace: true,
            overwriteInitial: true,
            showUploadedThumbs: false,
            maxFileCount: 1,
            initialPreview: $Preview,
            initialPreviewConfig: $Config,
            layoutTemplates: {actionDelete: ''},
        }).on("filebatchselected", function(event, files) {
            $input.fileinput("upload");//选择后自动上传
        }).on('fileuploaded', function(event, data,previewId,index) {
            if(data.response.code==0)
            {
                $picurl.val(data.response.img);
            }
        }).on("filecleared", function(event, files) {
            $picurl.val('');
        }).on('fileuploaderror', function(event,data) {
            // swal("出错了", data.response.error, "error");
        });

    }
    //组图上传
    function fileinputMore(fileid,picurlname,field){
        var widths = arguments[3] ? arguments[3] : 'auto';//设置默认的图片宽度
        var heights = arguments[4] ? arguments[4] : '160px';//设置默认的图片高度
        //组图上传
        var $input = $("#"+fileid);
        var $picimg = $("input[name='"+picurlname+"']");

        var $Preview =[];
        var $Config =[];
        $picimg.each(function(i,e){
            $Preview.push("<img class='kv-preview-data file-preview-image' style='width:"+widths+";height:"+heights+";' src='"+$(this).val()+"'>");
            $Config.push({caption: $(this).attr('flag'),show: $(this).attr('show'),size:0,url:"<input type='hidden' name='"+field+"' value='"+$(this).val()+"'>", key: i});

        });

        var footerTemplate = '<div class="file-thumbnail-footer">\n' +
            '   <div style="margin:5px 0">\n' +
            '       <input type="text" class="hidden" value="{show}" name="show[]"><input class="kv-input kv-new form-control input-sm text-center" value="{caption}" placeholder="填写注释" name="info[]">\n' +
            '   </div>\n' +
            '   <button type="button" class="zmdi zmdi-long-arrow-left zmdi-hc-fw text-info header-left" title="前移"><i class="glyphicon glyphicon-chevron-left"></i></button>\n' +
            '   &nbsp;{size}&nbsp;\n' +
            '   <button type="button" class="zmdi zmdi-long-arrow-right zmdi-hc-fw text-danger header-right" title="后移"><i class="glyphicon glyphicon-chevron-right"></i></button>\n' +
            '   {actions}\n' +
            '</div>';

        $input.fileinput({
            uploadUrl: "{{url('admin/uploads')}}",
            deleteUrl: "{{url('admin/updel')}}",
            uploadExtraData: {_token:'{{csrf_token()}}'},  //额外的参数
            autoReplace: false,
            overwriteInitial: false,
            layoutTemplates: {footer: footerTemplate, size: '<samp><small>({sizeText})</small></samp>'},
            initialPreview: $Preview,
            initialPreviewConfig: $Config,
        }).on("filebatchselected", function(event, files) {
            $input.fileinput("upload");//选择后自动上传
        }).on('fileuploaded', function(event, data,previewId,index) {
            if(data.response.code==0)
            {
                $('#'+previewId).append("<input type='hidden' name='"+field+"' value='"+data.response.img+"'>");
            }
        }).on('fileuploaderror', function(event,data) {
            // swal("出错了", data.response.error, "error");
        });
    }
</script>

<!--商品属性 笛卡尔积 -->
<script src="{{asset('skin/descates.js')}}"></script>
<script>
    $(document).ready(function() {
        //笛卡尔积初始化
        descates();
        //$("[name='status'][value='' ?? '1'}']").attr("checked", true);

        //$("[name='typeid']").find("[value='{$vo.typeid ?? ''}']").attr("selected", true);

    });
    //笛卡尔积处理
    function descates(){
        var spec_goods_price_json = '<?php echo $goodattr ?>';  //控制器传过来
        var spec_goods_price = JSON.parse(spec_goods_price_json);

        var list=new Array();
        $("input[type='checkbox'][name^='attrs']:checked").each(function(){
            if(list.indexOf($(this).attr('name'))==-1){
                list.push($(this).attr('name'));
            }
        });

        var list2=new Array();
        list.forEach(function(val,key){
            list2[key] = new Array();
            $("input[type='checkbox'][name^='attrs']:checked").each(function(){
                if(val==$(this).attr('name')){
                    list2[key].push($(this).val());
                }
            });
        });
        var result = DescartesUtils.descartes(list2);
        var html = "";
        for (var i = 0; i < result.length; i++) {
            var spec_key = result[i].join("_");
            if(spec_goods_price.hasOwnProperty(spec_key)){
                var price = spec_goods_price[spec_key]['price']; // 找到对应规格的价格
                var oldprice = spec_goods_price[spec_key]['oldprice']; // 找到对应规格的价格
                var homenum = spec_goods_price[spec_key]['homenum']; // 找到对应规格的库
            }else{
                var price = $("input[name='price']").val();
                var oldprice = $("input[name='oldprice']").val();
                var homenum = '100';
            }

            html = html + '<tr><td>'+result[i].join("</td><td>")+'</td><td><input type="text" class="form-control" name="price[]" value="'+price+'" placeholder="价格" required/></td><td><input type="text" class="form-control" name="oldprice[]" value="'+oldprice+'" placeholder="原价" required/></td><td><input type="number" class="form-control" name="homenum[]" value="'+homenum+'" placeholder="库存" required/></td></tr>';
        }

        $("#attrs").empty();
        $("#attrs").append(html);
    }
</script>
<script>
    function chooseAttr(val){
        $.ajax({
            url: "{{url('admin/goods/getAttr')}}",        //提交的页面，方法名
            dataType: "json",                               //类型
            data:{typeid:val,_token:'{{csrf_token()}}'},
            type: "POST",                                   //提交方式
            success: function (data) {                      //如果执行成功，那么执行此方法
                var data = JSON.stringify(data);
                $('#attrs').empty();
                $('#attr_area').empty();
                $('#theadtr').empty();

                var dataObj=eval("("+data+")");             //转换为json对象
                $.each( dataObj, function(index,item){

                    var html = '<div class="form-group" id="attrs'+index+'_group"  style="border: 0;">'
                        +'   <label class="col-sm-3 control-label">'+item['title']+'：<input type="hidden" name="attrs_group[]" value="'+item['title']+'"></label>'
                        +'   <div class="col-sm-6">'
                        +'      <div class="input-group">'
                        +'         <span class="input-group-btn">'
                        +'           <button type="button" class="btn btn-default btn-round" onclick="addinput('+index+')">添加</button>'
                        +'         </span>'
                        +'         <input type="text" class="form-control" id="attrs'+index+'_add" value=""/>'
                        +'       </div>'
                        +'       <span id="attrs'+index+'_area">';
                    $.each( item['attrs'], function(index1,item1){
                        html +='<input type="checkbox" name="attrs'+index+'[]" onchange="descates();" value="'+item1+'">'+item1;
                    });
                    html +='       </span>'
                        +'    </div>'
                        +' </div>';
                    $('#attr_area').append(html);

                    $('#theadtr').append('<th>'+item['title']+'</th>');

                });
                $('#theadtr').append('<th id="trhead">价格</th>');
                $('#theadtr').append('<th>原价</th>');
                $('#theadtr').append('<th>库存</th>');
            },
            error: function (err) {                         //如果执行不成功，那么执行此方法
                tips('ajax出错了');
            }
        });
    }
    function addattrs(){
        var title = $('#attrs_title').val();

        var list=new Array();
        $("input[name='attrs_group[]']").each(function(){
            list.push($(this).attr('name'));
        });
        //console.log(list);
        var num = list.length;

        if(title!=''){
            $('#trhead').before('<th>'+title+'</th>');
            $('.tdbody').before('<td></td>');


            var html= '<div class="row clearfix" id="attrs'+num+'_group">'
                +'<div class="col-lg-1 col-md-2 col-sm-4 form-control-label">'
                +'<label for="price">'+title+':<input type="hidden" name="attrs_group[]" value="'+title+'"></label>'
                +'</div>'
                +'<div class="col-lg-6 col-md-10 col-sm-8">'
                +'<div class="form-group">'
                +'<div class="row clearfix">'
                +'<div class="col-sm-4">'
                +'<div class="form-group">'
                +'<input type="text" class="form-control" id="attrs'+num+'_add" value=""/>'
                +'</div>'
                +' <span id="attrs'+num+'_area">'
                +' </span>'
                +'</div>'
                +'<div class="col-sm-8">'
                +'<div class="form-group">'
                +'<button type="button" class=" btn btn-default btn-round" onclick="addinput('+num+')">添加</button>'
                +'</div>'
                +'</div>'
                +'</div>'
                +'</div>'
                +'</div>'
                +'</div>';

            $('#attr_area').append(html);
            $('#attrs_title').val('');
        }
    }

    function addinput(param){
        var val = $('#attrs'+param+'_add').val();
        if(val!=''){
            $('#attrs'+param+'_area').append('<input type="checkbox" name="attrs'+param+'[]" onchange="descates();" value="'+val+'">'+val);
            $('#attrs'+param+'_add').val('');
        }
    }

</script>




<!-- Jquery Core Js -->
<script src="/assets/bundles/libscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js -->
<script src="/assets/bundles/vendorscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js -->
<script src="/assets/plugins/jquery-validation/jquery.validate.js"></script> <!-- Jquery Validation Plugin Css -->
<script src="/assets/plugins/jquery-steps/jquery.steps.js"></script> <!-- JQuery Steps Plugin Js -->
<script src="/assets/bundles/mainscripts.bundle.js"></script><!-- Custom Js -->
<script src="/assets/js/pages/forms/form-validation.js"></script>
<script src="/assets/plugins/ckeditor/ckeditor.js"></script> <!-- Ckeditor -->
<script src="/assets/js/pages/forms/editors.js"></script>
<!-- 图片上传 -->
<script src="{{asset('skin/Fileinput/js/fileinput.js')}}"></script>
@endsection

