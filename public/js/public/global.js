$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

//全选
$(".lj_check-all").click(function(){
	var checked = $(this).is(":checked");
	
	if (checked){
		$(".lj_checkbox").each(function(index, element){
			this.checked = true;
		});
	}else{
		$(".lj_checkbox").each(function(index, element){
			this.checked = false;
		});
	}
	
	
});


//删除多个    --   改变多个状态
$(".lj_del_multi").click(function(){
	
	var callback = $(this).attr('callback');
	var pos = $(this).attr('pos');
	if (!pos) return;
	var warning = $(this).attr("warning");
	var checked_items = $(":checked.lj_checkbox");
	var ids = new Array();
	checked_items.each(function(){
		ids.push(this.value);
	});
	ids_str = ids.toString();
	if (ids_str.length<=0) return;
	
	if (warning){
		if (!confirm(warning)){
			return;
		}
	}
	
	$.post(pos, {'ids':ids_str}, function(json){
		if (callback){
			callback = eval(callback);
			callback(json);
		}else{
			if (json.code !=200){
				alert(json.msg);
				return;
			}
			alert(json.msg);
			window.location.reload();
		}
	});
	
});


//批量打印 
$(".lj_muti_print").click(function(){
	var pos = $(this).attr('pos');
	if (!pos) return;
	var warning = $(this).attr("warning");
	var checked_items = $(":checked.lj_checkbox");
	var ids = new Array();
	checked_items.each(function(){
		ids.push(this.value);
	});
	ids_str = ids.toString();
	if (ids_str.length<=0) return;
	
	if (warning){
		if (!confirm(warning)){
			return;
		}
	}
	pos = pos + '&order_id=' + ids_str;
	window.open(pos);
	
});



//生成采购单  --   传多个订单ids
$(".lj_add_purchase").click(function(){
	var pos = $(this).attr('pos');
	if (!pos) return;
	var warning = $(this).attr("warning");
	var checked_items = $(":checked.lj_checkbox");
	var ids = new Array();
	checked_items.each(function(){
		ids.push(this.value);
	});
	ids_str = ids.toString();
	if (ids_str.length<=0) return;
	
	if (warning){
		if (!confirm(warning)){
			return;
		}
	}
	
	$.post(pos, {'ids':ids_str}, function(json){
		if (json.code !=200){
			alert(json.msg);
			return;
		}
		window.location.href = json.forward;
	});
	
});


//批量设置选中项某个值
$(".lj_set_multi").click(function(){
	
	var callback = $(this).attr('callback');
	var pos = $(this).attr('pos');
	if (!pos) return;
	
	var v = $(this).prev().val().trim();
	if (v.length ==0){
		return;
	}
	
	var warning = $(this).attr("warning");
	var checked_items = $(":checked.lj_checkbox");
	var ids = new Array();
	checked_items.each(function(){
		ids.push(this.value);
	});
	
	ids_str = ids.toString();
	if (ids_str.length<=0) return;
	
	if (warning){
		if (!confirm(warning)){
			return;
		}
	}
	
	$.post(pos, {'ids':ids_str, 'val':v}, function(json){
		if (callback){
			callback = eval(callback);
			callback(json);
		}else{
			if (json.code !=200){
				alert(json.msg);
				return;
			}
			alert(json.msg);
			window.location.reload();
		}
	});
	
});


//批量设置选中项某个值-new 
$("#lj_set_multi").click(function(){
	var pos = $(this).attr('pos');
	if (!pos) return;
	
	var attribute_name = $('#lj_set_multi_select').val();
	if(attribute_name.length ==0){
		return;
	}
	
	var v = $('#lj_set_multi_value').children().val();
	var v = v.trim();
	if (v.length ==0){
		return;
	}
	
	var checked_items = $(":checked.lj_checkbox");
	var ids = new Array();
	checked_items.each(function(){
		ids.push(this.value);
	});
	ids_str = ids.toString();
	if (ids_str.length<=0) return;
	
	var warning = $(this).attr("warning");
	if (warning){
		if (!confirm(warning)){
			return;
		}
	}
	
	var callback = $(this).attr('callback');
	
	console.log(pos, attribute_name,v,ids_str);
	
	$.post(pos, {ids:ids_str,attr_n:attribute_name,attr_v:v}, function(json){
		if (callback){
			callback = eval(callback);
			callback(json);
		}else{
			if (json.code !=200){
				alert(json.msg);
				return;
			}
			alert(json.msg);
			window.location.reload();
		}
	});
	
});

//单个ajax请求
$(".lj_ajax-a").click(function(){
	
	var warning = $(this).attr('warning');
	
	var callback = $(this).attr('callback');
	
	if (warning){
		var sure = confirm(warning);
		if (!sure) return;
	}
	
	
	
	var pos = $(this).attr('pos');
	if (!pos) return;
	
	$.get(pos, function(json){
		
		if (callback){
			callback = eval(callback);
			callback(json);
		}else{
			if (json.code !=200){
				alert(json.msg);
				return;
			}
			
			//alert(json.msg);
			window.location.reload();
		}
	});
});

//单个ajax请求
$(".lj_ajax-del").click(function(){
	var warning = $(this).attr('warning');
	var callback = $(this).attr('callback');
	if (warning){
		var sure = confirm(warning);
		if (!sure) return;
	}
	
	var pos = $(this).attr('pos');
	if (!pos) return;
	
	$.post(pos, {_method:'DELETE'}, function(json){
		if (callback){
			callback = eval(callback);
			callback(json);
		}else{
			if (json.code !=200){
				alert(json.msg);
				return;
			}
			window.location.reload();
		}
	});
	
});

//ajax提交表单
$("#lj_ajax-form-submit").click(function(){
	
	var trigger = $(this);
	var _form =  $("form[name=lj_ajax-form]");
	var data = _form.serialize();
	var pos = _form.attr('action');
	var callback = trigger.attr('callback');
        var warning = $(this).attr('warning');
        
        if (warning){
		var sure = confirm(warning);
		if (!sure) return;
	}
	
	$.ajax({
		type:'post',
		url:pos,
		data:data,
		dataType:'json',
		success:function(json){
			if (callback){
				callback = eval(callback);
				callback(json);
			}else{
				if (json.code!=200){
					alert(json.msg);
					return;
				}
				alert(json.msg);
				setTimeout(function(){
                                    if(json.forward){
                                        window.location.href = json.forward;
                                    }else{
//                                        window.location.href = location.href;
                                         location.reload(true);
                                    }
				}, 400);
			}
		}
	});
});



//查询
$("#lj_search-form-submit").click(function(){
	$("form[name=lj_search-form]").submit();;
});

//模拟普通表单提交
$('#lj_general-form-submit').click(function(){
	$("form[name=lj_general-form").submit();
});


//列表页更改商品是否属性 （勾叉）
$(".lj_turn-status-pic").click(function(){
	var _this = $(this);
	var item_id = _this.attr('item_id');
	var attr_name = _this.attr('attr_name');
	var attr_value = _this.attr('attr_value');
	var pos = _this.attr('pos');
	var pic_name;
	var value;
	if (attr_value =='yes'){
		pic_name = 'yes.gif';
		value = 'no';
	}else{
		pic_name = 'no.gif';
		value = 'yes';
	}
	
	$.post(pos, {'item_id':item_id, 'attr_name':attr_name, 'attr_value':attr_value}, function(json){
		if (json.code ==200){
			_this.find('img').attr('src', '/assets/lj/images/public/'+pic_name);
			_this.attr('attr_value', value);
		}
		return;
	});
});




//下拉修改
$('.lj_alter_select').click(function(e){
	e.stopPropagation();
	if($(this).find('select').length) return false;
	
	var _this = $(this);
	var attr_name = $(this).attr('attr_name');
	var pos = $(this).attr('pos');
	var ids = $(this).attr('ids');
	
	var select = $('.lj_hidden_select').clone();
	select.removeAttr('style');
	
	select.find('option').each(function(){
		if (this.value == _this.html().trim()){
			$(this).attr('selected', 'selected');
		}
	});
	
	select.blur(function(){
		var _self = this;
		$.post(pos, 'model_pk='+ids+'&model_fn='+attr_name+'&model_fv='+this.value, function(json){
			try{
				if (json.code==200){
					$(_self).parents('tr').find('td.last_modify_time').html(json.data.csc_last_modify);
					$(_self).parent().html(_self.value);
				}else{
					alert(json.msg);
				}
			}catch(e){
				alert(e.name+":"+e.message);
			}
		});
	});
	
	_this.html('').append(select);
	
});





//表格奇偶行数颜色交替
function render_table1(){
	$('.lj_table1').find('tr:even').attr('bgcolor', '#eee');
	$('.lj_table1').find('tr:odd').attr('bgcolor', '#f8f8f8');
}


//屏幕滚动时固定某元素
function fix(){
	var lj_top = $('#lj_fixed_dom').offset().top;
	
	$(window).scroll(function(){
		var scroll_top = $(window).scrollTop();
		if (scroll_top>=lj_top){
			var w = $('.lj_fix_table').width();
			var h = $('.lj_fix_table th').height();
			
			$('#lj_fixed_dom').addClass('lj_fixed_dom');
			$('#lj_fixed_dom').width(w).height(h);
			
			$('#lj_fixed_dom th').each(function(){
				$(this).removeAttr('width');
			});
			
			$('.lj_fix_table tr:eq(1) td').each(function(){
				$('#lj_fixed_dom th:eq('+$(this).index()+')').width($(this).width());
			});
			
			
			
			
			
			
			
		}else{
			$('#lj_fixed_dom').removeClass('lj_fixed_dom');
		}
			
	});
}

$(function(){
	render_table1();
});


//修改排序
$('.lj_alter').click(function(e){
	e.stopPropagation();
	if($(this).find('input').length) return false;
	
	var attr_name = $(this).attr('attr_name');
	var pos = $(this).attr('pos');
	var ids = $(this).attr('ids');
	
	alertValue($(this), ids, pos, attr_name);
});

var alertValue = function (obj, ids, pos,attr_name) {
    var input = $('<input type="text" value="' + obj.text() + '" style="width:80px;text-align:center;" size="3"/>');
    input.blur(function () {
        var _self = this;
        $.post(pos, 'id=' + ids + '&attr_value=' + this.value + '&attr_name=' + attr_name, function (data) {
            try {
                if (data.code == 200) {
                    $(_self).parent().html(_self.value);
                } else {
                    alert(data.msg);
                }
            } catch (e) {
                alert(e.name + ":" + e.message);
            }
        });
    });
    obj.html('').append(input);
};


