/**
 * jquery ui控件，引入此模块将为jQuery对象注册qyerTextarea方法
 * @module common/ui/textarea
 */
 define(function(){
	var $=jQuery;

	var style = [
'.qui-textArea {zoom: 1; }',
'.qui-textArea .red { color: red; }',
'.qui-textArea textarea,',
'.qui-textArea input { word-break:break-all; transition: height 0.2s; -webkit-transition: height 0.2s; -moz-transition: height 0.2s; -ms-transition: height 0.2s; box-sizing: border-box; -webkit-box-sizing: border-box; -moz-box-sizing: border-box; -ms-box-sizing: border-box; }',
'.qui-textArea .autoHeight { overflow: hidden; }'
	].join('');
	window.qyerUtil.insertStyle(style);

	function TextAreaClass(aOption){	 	
		this.$obj = aOption.$obj;
		this.timer = null;
		this.option = aOption.option;
		this.init();
	}

	 TextAreaClass.prototype = {
		$obj:null,
		$textarea:null,
		$cloneTextarea:null,
		initHeight:null,
		maxHeight:null,
		timer:null,
		option:null,
		//初始化加载
	 	init:function(){
	 		this.$textarea = this.$obj.find("textarea").size() ? this.$obj.find("textarea") : this.$obj.find("input");
	 		if(this.$obj.attr('data-width')){					
 				this.$textarea.css('width',this.$obj.attr('data-width'));
 				this.initHeight = this.$obj.attr("data-height") || this.$textarea.outerHeight();
			}
			if(this.$obj.attr('data-height')){
	 			this.$textarea.css('height',this.$obj.attr('data-height'));	
	 			this.initWidth = this.$obj.attr("data-width") || this.$textarea.outerWidth();			
		 	}		 	
	 		if(this.option && this.option.autoIncreaseHeight === true){
	 			this.$cloneTextarea = this.createClone(this.$textarea);
	 		}
	 		this.$obj.show();
	 		this.updateUI();
	 		this.bindEvent();
	 	},
	 	//生成一个克隆对象，用于计算高度
	 	createClone:function($textarea){
	 		if(!$textarea) return;
	 		var $cloneTextarea = this.$textarea.clone(true);
	 		$cloneTextarea.css({"position":"absolute","left":"-9999em","overflow":"auto"});
	 		$cloneTextarea.insertAfter($textarea);
	 		return $cloneTextarea;
	 	},
	 	//绑定事件
	 	bindEvent:function(){
	 		var _this = this;	 		
			this.$obj.keyup(function(e){
	 			_this.registEvent();
	 		})
	 	},
	 	//事件，更新UI
	 	registEvent:function(){
		 	//绑定监测输入值变化
		 	var _this = this;	
		 	window.clearTimeout(this.timer);
		 	this.timer = window.setTimeout(function(){		 		
		 		_this.updateUI(true);
		 	},100);
		 },
		 //更新UI方法
		 updateUI:function(isUpdate){
		 	var $aTextarea = this.$textarea,
		 		$cloneTextarea = this.$cloneTextarea,
			 	$max = this.$obj.find('.max'),
			 	$min = this.$obj.find('.min'),
			 	$current = this.$obj.find('.current'),
			 	$exceed = this.$obj.find('.exceed'),
		 		max = this.option.max,
		 		min = this.option.min,
			 	current = $aTextarea.val().length;

		 	if($cloneTextarea){
 				//每次将输入内容复制到计算高度的克隆textarea中
 				var newHeight, maxHeight;
				$cloneTextarea[0].value = $aTextarea.val();
 					//计算新高度以及获取最大高度
		 		newHeight = parseInt($cloneTextarea[0].scrollHeight,10);
	 			maxHeight = $.isNumeric(this.$obj.attr("data-max-height")) ? this.$obj.attr("data-max-height") : 99999;


		 		if(newHeight > this.initHeight){
		 		//当新高度大于最小高度时，修正为新高度
		 			$aTextarea.addClass("autoHeight");
		 			if(newHeight >= maxHeight){
		 				//当新高度大于最大高度时，修正为最大高度
			 			newHeight = maxHeight;
			 			$aTextarea.removeClass("autoHeight");
			 		}
		 		}else{
		 			newHeight = this.initHeight;
		 		}
				$aTextarea.css('height',newHeight);
		 		newHeight = maxHeight = null;
		 	}
		 	/*更新textarea内容，计算高度*/

		 	/*更新提示信息*/
		 	if(max == -1){
		 		if(current<min){		 			
		 			$current.addClass('red'); 
					if(current==0){$current.removeClass('red');}
		 		}else{
		 			$current.removeClass('red'); 
		 		}
		 	}else{		 		
			 	if(current<min || current > max){		
		 			$current.addClass('red');
					if(current==0){$current.removeClass('red');}
			 	}else{			 		
			 		$current.removeClass('red');
			 	}
		 	}
	 		$current.html(current);
	 		$max.html(max);
	 		$min.html(min);

	 		$aTextArea = $cloneTextarea = $max = $current = $left = max = min = current = left = null;
		 },
		 //输入是否合法判断
		 isValidate:function(){
		 	var curLength = this.$obj.find('textarea').val().length;
		 	return this.option.max == -1 ? curLength >= this.option.min : (curLength >= this.option.min && curLength <= this.option.max);
		 },
		 getContent:function(){
		 	return this.$obj.find('textarea')[0];
		 },
		 setValue:function(html){
		 	this.$textarea.val(html);
		 	this.$cloneTextarea.val(html);
		 	this.updateUI(true);
		 },
		 //返回输入值
		 getTextArea:function(){ 
		 	return this.$obj.find('textarea')[0];
		 },
		 //卸载textarea
		 unload:function(){
		 	this.$cloneTextarea.remove();
		 },
		 reset:function(){
		 	this.$textarea.val('');
		 	this.$cloneTextarea.val('');
		 	this.$obj.find(".current").html(0);
		 }
	};
//////////////////////////////////////////////////////////////////

	/**
	 * jquery 插件
	 * @class jQuery.plugin.qyerTextArea
	 */
	$.fn.extend({
		/**
		 * 构建或设置多行文本框<br/>
		 * 通过元素属性，定义控件 宽（非必填），高（非必填）<br/>
		 * 当开启自动伸展功能后，可选择性启用最大高度(非必填)<br/>
		 * 参见 demo 元素的 data-width、data-height 、data-max-height属性用法
		 * @method qyerTextArea
		 * @chainable
		 * @param {Object|String} aOption 参数对象
		 * <ul>
		 * 	<li>
		 * 		<span>aOption ： Object ， 插件配置对象</span>	
		 * 			<ul>
		 * 				<li> max {Number} 表示限制最大字符字数（不设置表示不开启限制功能，非必填） </li>
		 *				<li> min {Number} 表示限制最小字符字数（不设置表示不开启限制功能，非必填） </li>
		 *				<li> autoIncreaseHeight {boolean} 表示是否自动伸展（不设置表示不开启伸展功能，非必填） </li>
		 * 			</ul>
		 * 	</li>
		 *	<li>
         *      <span>aOption ： String 扩展方法名称</span>
         *      <ul><li>isValidate ，返回元素内容是否合法</li></ul>
         *      <ul><li>getValue ，返回元素内容</li></ul>
         *  </li>
		 * </ul>
		 * @return {jQueryObject} 当前jQuery对象
		 */

	 qyerTextArea:function(aOption){
	 	
	 	var command,type;	 

	 	command = {
	 		isValidate:function(a$This){
	 			return a$This.data('_qyerTextArea').isValidate();
	 		},
	 		getValue:function(a$This){
	 			return a$This.data('_qyerTextArea').getTextArea().value;
	 		},
	 		unload:function(a$This){
	 			a$This.data('_qyerTextArea').unload();
	 		},
	 		reset:function(a$This){
	 			a$This.data('_qyerTextArea').setValue('');
	 		},
	 		setValue:function(a$This, html){
	 			a$This.data('_qyerTextArea').setValue(html);
	 		}
	 	};

	 	type = $.type(aOption);

	 	if(type == 'object' || type == 'undefined'){
	 		$.each(this,function(index,element) {	
	 			var $this,option;			
				$this = $(element);

	 			option = $.extend({},aOption);

			 	option.max = typeof(option.max)!='undefined' ? option.max : -1;
			 	option.min = typeof(option.min)!='undefined' ? option.min : 0;

			 	option.width = $.isNumeric($this.attr('data-width'))==true ? $this.attr('data-width') : null;
			 	option.height = $.isNumeric($this.attr('data-height'))==true ? $this.attr('data-height') : null;

			 	if(!$this.data('_qyerTextArea')){
					$this.data('_qyerTextArea',new TextAreaClass({$obj:$this,option:option}));
			 	}
				$this = option = null;
			});
	 	}
	 	else if(type == 'string'){
	 		var $this,as,result=[];
	 		as = arguments;
	 		$.each(this,function(index,element){
	 			$this = $(element);
	 			if(command[aOption]){
	 				var ps = qyerUtil.sliceArguments(as,1);
	 				ps.unshift($this);
	 				result.push(command[aOption].apply($this,ps));
	 				ps=null;
	 			}
	 		});

	 		$this = as = null;
	 		if(result.length){
	 			return result.length==1?result[0]:result;
	 		}
	 	}
		command=type=null;
		return this;
	}
	});
});
