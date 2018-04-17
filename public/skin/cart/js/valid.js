;'use strict';
(function($){

	/**
	 * 获取或设置元素的disabled状态（元素含有disabled类、元素disabled属性）
	 */
	$.fn.disabled = function(status){
		var _ts = $(this)
		if(status==true) {
			_ts.addClass('disabled')
			_ts.attr('disabled',true)
		}
		if(status==false) {
			_ts.removeClass('disabled')
			_ts.attr('disabled',false)
		}

		return _ts.hasClass('disabled') || typeof _ts.attr('disabled')!='undefined'
	}


	/**
	 * 表单的常规校验
	 * @param  {[type]} vas			Object 校验信息
	 * @param  {[type]} callback		Function 校验通过回调执行
	 * 警告：
	 * 	1. 提交按钮务必要添加 type="submit" 属性
	 */
	$.fn.valid = function(vas, callback){
		var form = $(this)
		var ctrls = form.find('[data-valid-control]')
		var isDiy = false

		//判断是不是自定义提示版
		$.each(vas, function(key, val){
			if(vas[key].hasOwnProperty('success')) {
				return !(isDiy = true)
			}
		})

		$.each(ctrls, function(index, ele){
			var key = $(ele).attr('data-valid-control')
			$(ele).on('change', function(){
				if(!test(ele, key)) $(ele).focus()
			})
		})

		form.on('submit', function(ev){
			if(form.find('[type="submit"]').disabled()) {
				ev.preventDefault()
			}
			var vResult = true
			var isFocus = true
			$.each(ctrls, function(index, ele){
				var key = $(ele).attr('data-valid-control')
				if(!test(ele, key)) {
					if(isFocus) {
						$(ele).focus()
						isFocus = false
					}
					vResult = false
					if(!isDiy) return false
				}
			})
			if(callback&&callback.constructor===Function) {
				ev.preventDefault()
				if(vResult) callback(ev, form)
			} else {
				if(!vResult) ev.preventDefault()
			}
		})

		function test(ele, key) {
			var va = vas[key]
			var errDom = isDiy ? null : form.find('[data-valid-error="'+key+'"]')
			if($(ele).prop('type')=='radio' || $(ele).prop('type')=='checkbox') {
			//单选框和复选框
				return $.inRange(form.find('[data-valid-control="'+key+'"]:checked').length, va.norm) ?
				fnSuccess($(ele), va, errDom) : fnError($(ele), va, errDom, va.error)
			} else if(va.norm.context) {
			//确认密码
				return $(ele).val()==va.norm.val()&&$(ele).val().length>0 ?
				fnSuccess($(ele), va, errDom) : fnError($(ele), va, errDom, va.error)
			}else {
			//输入框、文本框、下拉菜单、文件框等
				return va.norm.test($(ele).val()) ?
				fnSuccess($(ele), va, errDom) : fnError($(ele), va, errDom, va.error)
			}
		}

		function fnError(ts, va, errDom, error) {
			if(isDiy) {
				va.error(ts)
			} else {
				errDom.addClass('active').html(error)
			}
			return false
		}

		function fnSuccess(ts, va, errDom) {
			if(isDiy) {
				va.success(ts)
			} else {
				setTimeout(function(){
					errDom.removeClass('active').html('')
				}, 200)
			}
			return true
		}
	}


	/**
	 * 判断数字num是否在区间strs内
	 * @param  {[type]} num  [Number 一个数字，表示实际数量]
	 * @param  {[type]} range [Number or String 表示区间的数字类型或字符串类型]
	 * @return {[type]}      [Boolean 符合条件返回true]
	 * 区间是数学概念，有以下几种：
	 * 	m
	 *	(m,)
	 *	(,n)
	 *	(m,n)
	 *	[m,)
	 *	(,n]
	 *	[m,n]
	 *	(m,n]
	 *	[m,n)
	 */
	$.inRange = function(num, range){
		if(typeof range=='string') range = range.replace(/ /g, '')
		//m
		if(!/^\(|\)|\[|\]$/.test(range)) {
			return num==parseFloat(range)
		//(m,)
		} else if(/^\(\d*\.?\d*,[\)\]]$/.test(range)) {
			return num>parseFloat(range.replace(/\(|,|\)/g,''))
		//(,n)
		} else if(/^[\[\(],\d*\.?\d*\)$/.test(range)) {
			return num<parseFloat(range.replace(/\(|,|\)/g,''))
		//(m,n)
		} else if(/^\(\d*\.?\d*,\d*\.?\d*\)$/.test(range)) {
			var arr = range.replace(/\(|\)/g,'').split(',')
			return num>parseFloat(arr[0]) && num<parseFloat(arr[1])
		//[m,)
		} else if(/^\[\d*\.?\d*,[\)\]]$/.test(range)) {
			return num>=parseFloat(range.replace(/\[|,|\)/g,''))
		//(,n]
		} else if(/^[\[\(],\d*\.?\d*\]$/.test(range)) {
			return num<=parseFloat(range.replace(/\(|,|\]/g,''))
		//[m,n]
		} else if(/^\[\d*\.?\d*,\d*\.?\d*\]$/.test(range)) {
			var arr = range.replace(/\[|\]/g,'').split(',')
			return num>=parseFloat(arr[0]) && num<=parseFloat(arr[1])
		//(m,n]
		} else if(/^\(\d*\.?\d*,\d*\.?\d*\]$/.test(range)) {
			var arr = range.replace(/\(|\]/g,'').split(',')
			return num>parseFloat(arr[0]) && num<=parseFloat(arr[1])
		//[m,n)
		} else if(/^\[\d*\.?\d*,\d*\.?\d*\)$/.test(range)) {
			var arr = range.replace(/\[|\)/g,'').split(',')
			return num>=parseFloat(arr[0]) && num<parseFloat(arr[1])
		} else {
			return false
		}
	}

})(jQuery)