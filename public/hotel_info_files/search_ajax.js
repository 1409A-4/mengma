var search_input=search_input||{};search_input={init:function(){var _self=this;var s_input=$(".tn_s_input");var s_popbox=$("#searchInputBox");var search_box=$(".search_box");search_box.each(function(i,n){_self.showMoreCondition($(n));});this.seniorSearch();this.filterCont();this.showMTTwoLines();this.txt_focus();},creatPopbox:function(){},showPopBox:function(t,s){var _self=this;var tnSearchBox=$("#tnSearchBox");var search_pop_box=$(".search_pop_box");var tnSearchBoxhg=tnSearchBox.height();var updatePosition=function(){var _offset=tnSearchBox.offset();var tnSearchBoxBtom=_offset.top;var tnSearchBoxLeft=_offset.left;s.css({"top":tnSearchBoxBtom+tnSearchBoxhg,"left":tnSearchBoxLeft});}
if(tnSearchBox.length){tnSearchBox.find("input").click(function(e){$("#searchAdvBox").hide();if($.trim($("#keyword-input").val())==''){updatePosition();s.show();}
_self.stopEvent(e);});$(window).resize(function(){if(s.is(":visible")){updatePosition();}})
t.keyup(function(){if($.trim($("#keyword-input").val())=='')
{s.show();}else{s.hide();}});s.find(".closeThisBox").click(function(){s.hide();});s.click(function(e){_self.stopEvent(e);});$("body").click(function(){s.hide();});}},stopEvent:function(event){var e=event||window.event;if(e.stopPropagation){e.stopPropagation();}else{e.cancelBubble=true;}},showMoreCondition:function(t){var _state=true;var __this=this;var t_moreCondition=t.find(".moreCondition");t.find(".showallbtn_s a").click(function(){var t_this=$(this);if(t_moreCondition.hasClass("hide")){t_moreCondition.slideDown(function(){t_moreCondition.removeClass("hide").show();if(_state){__this.showMTTwoLines(t_moreCondition);_state=false;}});t_this.html("收起更多 <em class='tn_fontface'>&#xe620;</em>");}else{t_moreCondition.slideUp(function(){t_moreCondition.addClass("hide").hide();});t_this.html("更多条件（交通类型、住宿类型、组团特色、产品特色） <em class='tn_fontface'>&#xe61f;</em>");}});},showMTTwoLines:function(t){var J_prop=t?t.find(".search_adv_others"):$(".search_adv_others");J_prop.each(function(i,n){if(parseInt($(n).css("height"))>28){$(n).css("height",28);$(n).next(".search_adv_more").show().unbind("click").click(function(){$(n).hasClass("isShowALl")?$(n).removeClass("isShowALl").css("height",28):$(n).addClass("isShowALl").css("height","auto");$(n).hasClass("isShowALl")?$(this).html("<span>收起<i class='tn_fontface'>&#xe620;</i></span>"):$(this).html("<span>更多<i class='tn_fontface'>&#xe61f;</i></span>");});}
else{$(n).css("height","auto");}});},seniorSearch:function(){var _self=this;var _state=true;var seniorSearch=$("#seniorSearch");var search_pop_box=$(".search_pop_box");var tnSearchBox=$("#tnSearchBox");var tnSearchBoxhg=tnSearchBox.height();var updatePositionAdv=function(){var advOffset=tnSearchBox.offset();var tnSearchBoxBtom=advOffset.top;var tnSearchBoxLeft=advOffset.left;search_pop_box.css({"top":tnSearchBoxBtom+tnSearchBoxhg-2,"left":tnSearchBoxLeft});}
seniorSearch.click(function(){updatePositionAdv();search_pop_box.toggle();if(search_pop_box.css("display")==="block"){$("#searchInputBox").hide();$(".autocomplete").hide();}
if(_state){_self.showMTTwoLines($("#searchAdvBox"));_state=false;}
return false;});$(window).resize(function(){if(search_pop_box.is(":visible")){updatePositionAdv();}})
search_pop_box.find(".closeSenSearch").click(function(e){search_pop_box.hide();_self.stopEvent(e);});search_pop_box.click(function(e){_self.stopEvent(e);});$("body").click(function(){search_pop_box.hide();});},filterCont:function(){var search_adv_others_a=$(".search_adv_others a");var search_adv_buxian_a=$(".search_adv_buxian a");search_adv_others_a.click(function(){var $this=$(this);$this.parent().prev().find("a").removeClass('checked');if($this.hasClass('checked')){$this.removeClass('checked');}else{if($this.parent(".onlyShowOne").length){$this.siblings('.checked').removeClass('checked');}
$this.addClass('checked');}});search_adv_buxian_a&&search_adv_buxian_a.click(function(){var $this=$(this);$this.addClass('checked');$this.parent().next().find("a").removeClass('checked');});},filterDate:function(){var _self=this;var search_input_date_1=$(".search_input_date");var search_input_date_2=$(".search_input_date_2");search_input_date_1.TN_date({wrap:$("body"),onSelect:function(){}});search_input_date_2.TN_date({wrap:$("body"),onSelect:function(){}});},txt_focus:function(){var $keyWord=$(".pkg_input .input_addr");var a=$keyWord.val();$keyWord.focus(function(){if(this.value==a){this.value="";this.style.color="#333"}});$keyWord.blur(function(){if(this.value==""){this.value=a;this.style.color="#aaa"}});},clearSearchLens:function(thisObj){var cur=$(thisObj);var _parents=cur.parents(".search_box").eq(0);_parents.find(".search_adv_others a").removeClass("checked");_parents.find(".search_adv_buxian a").addClass("checked");_parents.find(".J_FilterCustomPrice input").val("");_parents.find(".search_adv_properties input").val("");}}
$(function(){});var newHotSearch=false;var searchAjax=searchAjax||{};searchAjax={init:function(){var _self=this;_self.getAll();},getAll:function(){var _self=this;var url='//s.tuniu.com/yii.php?r=search/search/callwidget&type=all';$.ajax({url:url,type:"get",async:true,dataType:"jsonp",jsonp:"js_callback",success:function(json){searchAjax.cjAdvanceCallback(json);search_input.init();if(json.hot&&json.hot.length>0){newHotSearch=true;searchAjax.cjHotCallback(json);search_input.showPopBox($(".tn_s_input"),$("#searchInputBox"));}}});},getHot:function(){var _self=this;var url='//s.tuniu.com/yii.php?r=search/search/callwidget&all=hot';$.ajax({url:url,type:"get",async:true,dataType:"jsonp",jsonp:"js_callback",success:function(json)
{newHotSearch=true;searchAjax.cjHotCallback(json);search_input.showPopBox($(".tn_s_input"),$("#searchInputBox"));}});},cjAdvanceCallback:function(json){if(json){$("body").append(json.advance);}},cjHotCallback:function(hotObj){if(hotObj){$("body").append(hotObj.hot);}},cookieClear:function(element){var url='//s.tuniu.com/yii.php?r=search/search/ajaxAddCookie';$.ajax({url:url,type:"get",async:true,dataType:"jsonp",jsonp:"jsoncallback",success:function(json)
{$(element).parents('.sib_last_search').remove();}});},advanceSearch:function(obj){var params={};$(obj).parents('div[box="searchBox"]').find("dl[filter-type]").each(function(){var filterType=$(this).attr('filter-type');switch(filterType){case'keyword':var advanceFunc=function(inputStr){if(inputStr===null||inputStr===undefined||inputStr===''||inputStr==='请输入目的地、主题或关键词'){return false;}else{return true;}};var defKeyword=false;var inputStr=advanceFunc($(this).find("input").val());if(!(defKeyword&&inputStr))params['keywords']=false;if(inputStr){params['keywords']=$(this).find("input").val();}else if(defKeyword){params['keywords']=$("#keyword-input").val();};break;case'planDate':var startDate=$(this).find('input[name="start"]').val();var endDate=$(this).find('input[name="end"]').val();if(startDate!='yyyy-mm-dd')params['startDate']=startDate;if(endDate!='yyyy-mm-dd')params['endDate']=endDate;break;case'price':var min=$(this).find('input[name="min"]').val();var max=$(this).find('input[name="max"]').val();if(min!='')params['minPrice']=min;if(max!='')params['maxPrice']=max;break;case'prdType':var prdType=$(this).find('.checked').attr('filter-value');if(prdType!='0')params['prdType']=prdType;break;default:var option=new Array();var rel=true;$(this).find("a[filter-value]").each(function(){if($(this).attr("class")=='checked'){var filterValue=$(this).attr('filter-value');if(filterValue==0){rel=false;}else{option.push(filterValue);}}});if(rel)params[filterType]=option;}});if(params.keywords!==false)
{$.ajax({type:'get',url:"//s.tuniu.com/yii.php?r=search/search/getUrlForHomePage",data:{'data':params},dataType:"jsonp",jsonp:"js_callback",success:function(data){window.location.href=data;}});}
else
{alert('请输入目的地、主题或关键词');}}};if(typeof $!='undefined'){$(function(){searchAjax.init();});};