var orderLogin={width:290,height:170,placeValuesBeforeTB:'savedValues',TB_iframe:true,modal:true,title:'登录',ticket_id:null,route_id:null,regphonewidth:380,regphoneheight:280,regphonetitle:'验证手机',hotelregwidth:380,hotelregheight:280,isLogin:function(pars,login_func,tel_func,id,telephone){this.ticket_id=id;this.route_id=id;var url="/main.php?do=order_login_ajax&flag=is_login&tel="+telephone+"&catch="+Math.random();$.get(url,function(data){if(data=='1'){eval(login_func+'()');}else{try{var tel=$("#tel_reg").val();if(tel!=''&&tel!=undefined){eval(login_func+'()');}else{orderLogin.show_login(pars,login_func,tel_func,telephone);}}
catch(e){orderLogin.show_login(pars,login_func,tel_func,telephone);};}})},check_login_tel:function(pars,login_func,tel_func,tel){this.tel=tel;var url="/main.php?do=order_login_ajax&flag=check_login_tel&tel="+tel+"&catch="+Math.random();$.ajax({url:url,type:'post',async:false,success:function(data){if(data=='0'){$('#new_login_t').show();}else{$('#old_login_t').show();}}})},isLogin_sp:function(pars,login_func,tel_func,id){this.ticket_id=id;this.route_id=id;var url="/main.php?do=order_login_ajax&flag=is_login&catch="+Math.random();$.get(url,function(data){if('1'){eval(login_func+'()');}else{}})},show_login:function(pars,login_func,tel_func,tel){var ssoLoginFlag=document.getElementById('ssoLoginFlag');if(typeof(ssoLoginFlag)=="undefined"||ssoLoginFlag==null){var url="/main.php?do=order_login_new&";url+="1=1&"+pars;url+="&login_func="+login_func;url+="&tel_func="+tel_func;url+="&tel="+tel;url+="&placeValuesBeforeTB="+this.placeValuesBeforeTB;url+="&TB_iframe="+this.TB_iframe;url+="&height="+this.height;url+="&width="+this.width;url+="&modal="+this.modal;url+="&catch="+Math.random();tb_show(this.title,url,'');}else{var url='/yii.php?r=ssoConnect/checkloginStatus';$.get(url,function(data){if(data==0){var str=window.location.host;var domain=str.split(".")[0];if($.layer&&typeof($.layer)=="function"){$.layer({type:2,title:false,shadeClose:true,closeBtn:[1,true],iframe:{src:'https://passport.tuniu.com/login/iframe?origin='+encodeURIComponent('http://www.tuniu.com/ssoConnect/Iframe?reload='+domain)},area:['375px','350px']});}else{var url="/main.php?do=order_login_new&";url+="1=1&"+pars;url+="&login_func="+login_func;url+="&tel_func="+tel_func;url+="&tel="+tel;url+="&placeValuesBeforeTB="+this.placeValuesBeforeTB;url+="&TB_iframe="+this.TB_iframe;url+="&height="+this.height;url+="&width="+this.width;url+="&modal="+this.modal;url+="&catch="+Math.random();tb_show(this.title,url,'');}}else{if($.layer&&typeof($.layer)=="function"){layer.alert("您已登录，将帮你自动刷新页面！");}
window.location.reload();}});}},close_login:function(){try{pageTracker._trackPageview("/度假/会员身份识别/跳出");}catch(_e){}
tb_remove();},show_reg_phone_check:function(pars,login_func,tel_func,tel){var url="/main.php?do=user_reg_phone_check&";url+="1=1&"+pars;url+="&login_func="+login_func;url+="&tel_func="+tel_func;url+="&tel="+tel;url+="&hid_flag=1";url+="&placeValuesBeforeTB="+this.placeValuesBeforeTB;url+="&TB_iframe="+this.TB_iframe;url+="&height="+this.regphoneheight;url+="&width="+this.regphonewidth;url+="&modal="+this.modal;url+="&catch="+Math.random();tb_show(this.regphonetitle,url,'');},ticket_login_back:function(){$("#form_order_"+this.ticket_id).submit();},ticket_tel_back:function(tel){var strtel="<input type='hidden'  name='tel' value='"+tel+"'>";$("#button_"+this.ticket_id).before(strtel);$("#form_order_"+this.ticket_id).submit();},route_login_back:function(){var mode=$("#mode").val();try{var tel=$("#tel_reg").val();}catch(_e){var tel='';}
if(tel!=''){var strtel="<input type='hidden'  name='tel' value='"+tel+"'>";$("#order_price").after(strtel);}
view_order2(mode);},route_tel_back:function(tel){var mode=$("#mode").val();var strtel="<input type='hidden'  name='tel' value='"+tel+"'>";$("#order_price").after(strtel);view_order2(mode);},package_login_back:function(){$('#step2').submit();},package_tel_back:function(tel){var strtel="<input type='hidden'  name='tel' value='"+tel+"'>";$("#room_num").after(strtel);$('#step2').submit();},new_package_login_back:function(){$('#package_form').submit();},new_package_tel_back:function(tel){var strtel="<input type='hidden'  name='tel' value='"+tel+"'>";$("#room_price").after(strtel);$('#package_form').submit();},new_package_pack_login_back:function(){if(typeof reptip!='undefined'&&!reptip())
{return false;}
$('#pack_form').submit();},new_package_pack_tel_back:function(tel){var strtel="<input type='hidden'  name='tel' value='"+tel+"'>";$("#room_price").after(strtel);$('#pack_form').submit();},login_back_2:function(){$('#form_order').submit();},tel_back_2:function(tel){var strtel="<input type='hidden'  name='tel' value='"+tel+"'>";$("#route_id").after(strtel);$('#form_order').submit();},login_back_3:function(){window.location.href="http://"+window.location.host+"/main.php?do=ticket_booking";},tel_back_3:function(tel){window.location.href="http://"+window.location.host+"/main.php?do=ticket_booking&tel="+tel;},login_back_4:function(){$('#ticket_booking').submit();},tel_back_4:function(tel){var strtel="<input type='hidden'  name='tel' value='"+tel+"'>";$("#ticket_id").after(strtel);$('#ticket_booking').submit();},hotel_login_back:function(){$('#hotel_booking').submit();},hotel_tel_back:function(tel){var strtel="<input type='hidden'  name='tel' value='"+tel+"'>";$("#book_room_num").after(strtel);$('#hotel_booking').submit();},coupon_login_back:function(){$('#coupon_booking').submit();},coupon_tel_back:function(tel){var strtel="<input type='hidden'  name='tel' value='"+tel+"'>";$("#route_id").after(strtel);$('#coupon_booking').submit();},visa_login_back:function(){$('#visa_booking').submit();},visa_tel_back:function(tel){var strtel="<input type='hidden' name='tel' value='"+tel+"'>";$("#visa_id").after(strtel);$('#visa_booking').submit();},gp_route_login_back:function(){group_purchase.view_order();},gp_route_tel_back:function(tel){$("#tel").val(tel);group_purchase.view_order();},conpany_route_login_callback:function(){var route_id=document.getElementById('route_id_hide').value;window.location.href="http://"+window.location.host+'?do=tour_order_create&rid='+route_id;},conpany_route_tel_callback:function(tel){var route_id=document.getElementById('route_id_hide').value;window.location.href="http://"+window.location.host+'?do=tour_order_create&rid='+route_id;}};(function($){$.fn.TN_date=function(settings)
{settings=jQuery.extend({dateW:'tnDateW',tnStartDate:'date_t_pre',tnEndDate:'date_t_next',leaveDate:83},settings);var jQueryMatchedObj=this;var startDateArea=$(this[0]);var endDateArea=$(this[1]);var dateWObj;var tnStartDateObj;var tnEndDateObj;var nowTarget;var monthnames=new Array("1月","2月","3月","4月","5月","6月","7月","8月","9月","10月","11月","12月");var monthdays,todayDate,thisday,thismonth,thisdate,thisyear;var fthisday,fthismonth,fthisyear,ftodayDate;function _initialize()
{stateC(startDateArea);stateC(endDateArea);_initDate();dateWObj=$('<div id="'+settings.dateW+'"></div>').appendTo('#wrap');dateWObj.mousedown(function(event){event.stopPropagation();});dateWObj.hide();tnStartDateObj=$('<div id="'+settings.tnStartDate+'"></div>').appendTo(dateWObj);tnEndDateObj=$('<div id="'+settings.tnEndDate+'"></div>').appendTo(dateWObj);$('#'+settings.dateW+' .tdCobj').live('mouseover',function(){$(this).addClass('tdCobjS');}).live('mouseout',function(){$(this).removeClass('tdCobjS');}).die('click').live('click',function(){nowTarget.val($(this).attr('id'));var selectWeek=nowTarget.val();nowTarget.css({'color':'#000'});dateWObj.hide();var nowWeek=getWeekday(selectWeek);$(document).unbind('mousedown',hideDateObj);if(nowTarget.attr('id')==startDateArea.attr('id'))
{if(endDateArea.val()!='yyyy-mm-dd'&&endDateArea.val()!='')
{var strArr1=startDateArea.val().split('-');var strArr2=endDateArea.val().split('-');var str11=new Date(strArr1[0],strArr1[1]-1,strArr1[2]);var str22=new Date(strArr2[0],strArr2[1]-1,strArr2[2]);var tempArr2=str11;if(str11>=str22)
{endDateArea.val(GetDateStr(str11,1));var tt=getWeekday(GetDateStr(str11,0));endDateArea.parent().find(".date").html(tt);}
else
{var strArr3=GetDateStr(tempArr2,settings.leaveDate-1).split('-');var str33=new Date(strArr3[0],strArr3[1]-1,strArr3[2]);if(str33<str22)
{str11=new Date(strArr1[0],strArr1[1]-1,strArr1[2]);endDateArea.val(GetDateStr(str11,1));}}
startDateArea.parent().find(".date").html(nowWeek);}
if($('body#hotel_order_page').length){$(document).on('click',function(event){var $target=$(event.target);if(!$target.is('#tnDateW td')&&!$target.is('#tnDateW a')&&!$target.is('#begin_date')&&!$target.is('#end_date')){changeBookDate&&changeBookDate();}});$('#g_next').replaceWith('<input type="button" value="下一步" class="yellow_btn order_btn" onclick="changeBookDate();">');}
endDateArea.focus();}else if(nowTarget.attr('id')==endDateArea.attr('id')){if(startDateArea.val()!='yyyy-mm-dd'&&startDateArea.val()!=''){hotelCommon.changeDate();endDateArea.parent().find(".date").html(nowWeek);if($('body#hotel_order_page').length){changeBookDate&&changeBookDate();}}else{startDateArea.focus();}}});$('#'+settings.dateW+' a.pre_link').live('click',function(){return MoveDate('pre')});$('#'+settings.dateW+' a.next_link').live('click',function(){return MoveDate('next')});startDateArea.focus(function(){focusInputProcess($(this));}).blur(function(){blurTxtProcess($(this));}).keydown(function(){return false;}).mousedown(function(event){event.stopPropagation();});endDateArea.focus(function(){focusInputProcess($(this));}).blur(function(){blurTxtProcess($(this));}).keydown(function(){return false;}).mousedown(function(event){event.stopPropagation();});$(window).resize(function(){if(dateWObj.is(':visible'))posDate();});};function GetDateStr(pdate,AddDayCount)
{var dd=pdate;dd.setDate(dd.getDate()+AddDayCount);var y=dd.getYear();y=y%100;y=((y<50)?(2000+y):(1900+y));var m=dd.getMonth()+1;var d=dd.getDate();return y+"-"+m+"-"+d;}
function stateC(obj)
{if(obj.val()=='yyyy-mm-dd'||obj.val()=='')
{if(obj.val()=='')obj.val('yyyy-mm-dd');obj.css({'color':'#999'});}
else
{}}
function focusInputProcess(obj)
{nowTarget=obj;var ptip=false;if((obj.val()=='yyyy-mm-dd'&&nowTarget.attr('id')==startDateArea.attr('id'))||(obj.val()=='yyyy-mm-dd'&&startDateArea.val()=='yyyy-mm-dd'&&nowTarget.attr('id')==endDateArea.attr('id')))
{obj.val('').css({'color':'#000'});ftodayDate=thisdate;fthisday=thisday;fthismonth=thismonth;fthisyear=thisyear;}
else if(nowTarget.attr('id')==startDateArea.attr('id'))
{var tArr=obj.val().split('-');var gddayDate=new Date(tArr[0],tArr[1]-1,tArr[2]);fthisday=gddayDate.getDay();fthismonth=gddayDate.getMonth();fthisyear=gddayDate.getYear();fthisyear=fthisyear%100;fthisyear=((fthisyear<50)?(2000+fthisyear):(1900+fthisyear));ftodayDate=gddayDate.getDate();}
else if(nowTarget.attr('id')==endDateArea.attr('id'))
{if(startDateArea.val()!='yyyy-mm-dd')
{var tArr;if(endDateArea.val()!='yyyy-mm-dd')
tArr=obj.val().split('-');else
tArr=startDateArea.val().split('-');var tArr2=startDateArea.val().split('-');if(tArr[0]==tArr2[0]&&tArr[1]==tArr2[1])ptip=true;var gddayDate=new Date(tArr[0],tArr[1]-1,tArr[2]);fthisday=gddayDate.getDay();fthismonth=gddayDate.getMonth();fthisyear=gddayDate.getYear();fthisyear=fthisyear%100;fthisyear=((fthisyear<50)?(2000+fthisyear):(1900+fthisyear));ftodayDate=gddayDate.getDate();}
else
{var tArr=obj.val().split('-');var gddayDate=new Date(tArr[0],tArr[1]-1,tArr[2]);fthisday=gddayDate.getDay();fthismonth=gddayDate.getMonth();fthisyear=gddayDate.getYear();fthisyear=fthisyear%100;fthisyear=((fthisyear<50)?(2000+fthisyear):(1900+fthisyear));ftodayDate=gddayDate.getDate();}}
formDate(ptip);posDate();dateWObj.show();preDocEvent();}
function formDate(ctip)
{var nday=fthisday;var nmonth=fthismonth;var nyear=fthisyear;var ndate=ftodayDate;var nextMonthObj=_getPreAndNextMoth('n');fthisday=nextMonthObj.xDay;fthismonth=nextMonthObj.xMonth;fthisyear=nextMonthObj.xYear;ftodayDate=1;var outStr,outStr2;if((nyear==thisyear&&nmonth==thismonth)||ctip)
{outStr=('<div class="date_t_b"><div id="pre_month"><span class="pre_link">&lt;&lt;</span>'+nyear+"年"+monthnames[nmonth]+'</div>')+_createDate(nyear,nmonth,ndate,nday);}
else
{outStr=('<div class="date_t_b"><div id="pre_month"><a href="#" class="pre_link">&lt;&lt;</a>'+nyear+"年"+monthnames[nmonth]+'</div>')+_createDate(nyear,nmonth,ndate,nday);}
outStr2=('<div class="date_t_b"><div id="next_month"><a href="#" class="next_link">&gt;&gt;</a>'+nextMonthObj.xYear+"年"+monthnames[nextMonthObj.xMonth]+'</div>')+_createDate(nextMonthObj.xYear,nextMonthObj.xMonth,1,nextMonthObj.xDay);tnStartDateObj.html(outStr);tnEndDateObj.html(outStr2);bl_height();}
function posDate()
{var pos=nowTarget.offset();var posL=pos.left;var posT=pos.top+nowTarget.outerHeight()+1;dateWObj.css({'left':posL,'top':posT});}
function blurTxtProcess(obj)
{if(obj.val()=='')
{obj.val('yyyy-mm-dd');obj.css({'color':'#999'});}
else if(obj.val()!='yyyy-mm-dd')
{obj.css({'color':'#000'});}}
function _initDate()
{todayDate=new Date();var tArr=GetDateStr(todayDate,0).split('-');todayDate=new Date(tArr[0],tArr[1]-1,tArr[2]);thisday=todayDate.getDay();thismonth=todayDate.getMonth();thisdate=todayDate.getDate();thisyear=todayDate.getYear();thisyear=thisyear%100;thisyear=((thisyear<50)?(2000+thisyear):(1900+thisyear));ftodayDate=thisdate;fthisday=thisday;fthismonth=thismonth;fthisyear=thisyear;}
function preDocEvent()
{$(document).unbind('mousedown',hideDateObj);$(document).mousedown(hideDateObj);}
function bl_height()
{var sNum=tnStartDateObj.find('tr').length;var eNum=tnEndDateObj.find('tr').length;var astr='<tr><td>&nbsp;</td><td></td><td></td><td></td><td></td><td></td><td></td></tr>';if(sNum>eNum)
{tnEndDateObj.find('table').append(astr);}
else if(eNum>sNum)
{tnStartDateObj.find('table').append(astr);}
else
{}}
function hideDateObj()
{$(document).unbind('mousedown',hideDateObj);dateWObj.hide();initTxt(startDateArea);initTxt(endDateArea);hotelCommon.changeDate();}
function initTxt(obj)
{if(obj.val()=='')
{obj.val('yyyy-mm-dd');obj.css({'color':'#999'});}
else if(obj.val()!='yyyy-mm-dd')
{obj.css({'color':'#000'});}
else
{}}
function MoveDate(direction)
{var nextMonthObj;var nextMonthObj2;if(direction=='pre')
{nextMonthObj=_getPreAndNextMoth('p');fthisday=nextMonthObj.xDay;fthismonth=nextMonthObj.xMonth;fthisyear=nextMonthObj.xYear;nextMonthObj2=_getPreAndNextMoth('p');var outStr,outStr2;if(nextMonthObj2.xYear==thisyear&&nextMonthObj2.xMonth==thismonth)
{outStr=_pickDateStr(thisyear,thismonth,thisyear,thismonth,thisdate,thisday,'p',true,true);outStr2=_pickDateStr(fthisyear,fthismonth,fthisyear,fthismonth,1,fthisday,'n',true,true);}
else
{outStr=_pickDateStr(nextMonthObj2.xYear,nextMonthObj2.xMonth,nextMonthObj2.xYear,nextMonthObj2.xMonth,1,nextMonthObj2.xDay,'p',false,true);outStr2=_pickDateStr(fthisyear,fthismonth,fthisyear,fthismonth,1,fthisday,'n',true,true);}
tnStartDateObj.html(outStr);tnEndDateObj.html(outStr2);}
else
{nextMonthObj=_getPreAndNextMoth('n');var outStr,outStr2;outStr=_pickDateStr(fthisyear,fthismonth,fthisyear,fthismonth,1,fthisday,'p',false,false);outStr2=_pickDateStr(nextMonthObj.xYear,nextMonthObj.xMonth,nextMonthObj.xYear,nextMonthObj.xMonth,1,nextMonthObj.xDay,'n',true,false);tnStartDateObj.html(outStr);tnEndDateObj.html(outStr2);}
bl_height();fthisday=nextMonthObj.xDay;fthismonth=nextMonthObj.xMonth;fthisyear=nextMonthObj.xYear;return false;}
function _pickDateStr(xyear,xmonth,cyear,cmonth,cdate,cday,PNtip,btip,qtip)
{var outStr='';var stip=false;if(nowTarget.attr('id')==endDateArea.attr('id')&&startDateArea.val()!=''&&startDateArea.val()!='yyyy-mm-dd'&&qtip)
{var tArr=startDateArea.val().split('-');if(fthisyear==tArr[0]&&fthismonth==tArr[1])
stip=true;}
if(PNtip=='p')
{outStr+='<div class="date_t_b"><div id="pre_month">';if(btip||stip)
{outStr+='<span class="pre_link">&lt;&lt;</span>';}
else
{outStr+='<a href="#" class="pre_link">&lt;&lt;</a>';}}
else
{outStr+='<div class="date_t_b"><div id="next_month"><a href="#" class="next_link">&gt;&gt;</a>';}
outStr+=(xyear+"年"+monthnames[xmonth]+'</div>'+_createDate(cyear,cmonth,cdate,cday));return outStr;}
function _getPreAndNextMoth(pntip)
{var gdYear=0;var gdMonth=0;if(pntip=='n')
{if(fthismonth<11)
{gdMonth=fthismonth+1;gdYear=fthisyear;}
else
{gdMonth=0;gdYear=fthisyear+1;}}
else
{if(fthismonth>0)
{gdMonth=fthismonth-1;gdYear=fthisyear;}
else
{gdMonth=11;gdYear=fthisyear-1;}}
var gddayDate=new Date(gdYear,gdMonth,1);var fthisgdday=gddayDate.getDay();var fthisgdmonth=gddayDate.getMonth();var fthisgdyear=gddayDate.getYear();fthisgdyear=fthisgdyear%100;fthisgdyear=((fthisgdyear<50)?(2000+fthisgdyear):(1900+fthisgdyear));return{'xYear':fthisgdyear,'xMonth':fthisgdmonth,'xDay':fthisgdday};}
function _createDate(gYear,gMonth,gDate,gDay)
{var startArr=[];var endArr=[];var sttip=false;var entip=false;if(startDateArea.val()!=''&&startDateArea.val()!='yyyy-mm-dd')
{sttip=true;startArr=startDateArea.val().split('-');}
if(endDateArea.val()!=''&&endDateArea.val()!='yyyy-mm-dd')
{entip=true;endArr=endDateArea.val().split('-');}
monthdays=new Array(31,28,31,30,31,30,31,31,30,31,30,31);if(((gYear%4==0)&&!(gYear%100==0))||(gYear%400==0))
{monthdays[1]++;}
var outStr='';var tAddStr='<td class="tdCobj tdCobjN"';var tempDate;var ftempDate;if(nowTarget.attr('id')==startDateArea.attr('id'))
{if(gYear==thisyear&&gMonth==thismonth)
{tempDate=thisdate;}
else
{tempDate=1;}}
else if(nowTarget.attr('id')==endDateArea.attr('id'))
{tAddStr='<td class="tdCobjN"';if(startDateArea.val()!=''&&startDateArea.val()!='yyyy-mm-dd')
{var tArr=startDateArea.val().split('-');if(gYear==tArr[0]&&gMonth==tArr[1]-1)
{tempDate=tArr[2];}
else
{tempDate=1;}}
else
{if(gYear==thisyear&&gMonth==thismonth)
{tempDate=thisdate;}
else
{tempDate=1;}}}
else{}
var startspaces=gDate;while(startspaces>7)
{startspaces-=7;}
startspaces=gDay-startspaces+1;if(startspaces<0)
{startspaces+=7;}
outStr+='<table cellpadding="0" cellspacing="0" border="0" class="dateSel_t">';outStr+='<tr>';outStr+='<th align="center" style="color:#ff9900"><strong>日</strong></th>';outStr+='<th align="center">一</th>';outStr+='<th align="center">二</th>';outStr+='<th align="center">三</th>';outStr+='<th align="center">四</th>';outStr+='<th align="center">五</th>';outStr+='<th align="center" style="color:#ff9900"><strong>六</strong></th>';outStr+='</tr>';outStr+='<tr>';for(s=0;s<startspaces;s++)
{outStr+='<td></td>';}
var count=1;while(count<=monthdays[gMonth])
{for(b=startspaces;b<7;b++)
{if(count<=monthdays[gMonth])
{var tetip=false;if(nowTarget.attr('id')==endDateArea.attr('id'))
{var teDate=new Date(startArr[0],startArr[1]-1,startArr[2]);var teArr=GetDateStr(teDate,settings.leaveDate-1).split('-');teDate=new Date(teArr[0],teArr[1]-1,teArr[2]);var tpDate=new Date(gYear,gMonth,count);if(tpDate>teDate)tetip=true;}
if(count<tempDate||tetip)
{outStr+='<td>';}
else
{if(sttip&&entip)
{if(nowTarget.attr('id')==startDateArea.attr('id'))
{if((startArr[0]==gYear.toString()&&parseInt(startArr[1])==(gMonth+1).toString()&&parseInt(startArr[2])==count.toString())||(endArr[0]==gYear.toString()&&parseInt(endArr[1])==(gMonth+1).toString()&&parseInt(endArr[2])==count.toString()))
outStr+=tAddStr;else
outStr+='<td class="tdCobj"';}
else
{if(startArr[0]==gYear.toString()&&parseInt(startArr[1])==(gMonth+1).toString()&&parseInt(startArr[2])==count.toString())
outStr+=tAddStr;else if(endArr[0]==gYear.toString()&&parseInt(endArr[1])==(gMonth+1).toString()&&parseInt(endArr[2])==count.toString())
outStr+='<td class="tdCobj tdCobjN"';else
outStr+='<td class="tdCobj"';}}
else if(sttip||entip)
{if(sttip)
{if(startArr[0]==gYear.toString()&&startArr[1]==(gMonth+1).toString()&&startArr[2]==count.toString())
outStr+=tAddStr;else
outStr+='<td class="tdCobj"';}
else if(entip)
{if(endArr[0]==gYear.toString()&&endArr[1]==(gMonth+1).toString()&&endArr[2]==count.toString())
outStr+=tAddStr;else
outStr+='<td class="tdCobj"';}
else{}}
else
{outStr+='<td class="tdCobj"';}
outStr+=(' id="'+gYear.toString()+'-'+(gMonth+1).toString()+'-'+count.toString()+'">');}
outStr+=count.toString();}
outStr+='</td>';count++;}
outStr+='</tr>';startspaces=0;}
outStr+='</table>';return outStr;}
function getWeekday(sDate){var dt=new Date(sDate.replace(/-/g,'/'));var todayDate=new Date();var strArr1=GetDateStr(todayDate,0).split('-');var strArr2=GetDateStr(dt,0).split('-');var str11=new Date(strArr1[0],strArr1[1]-1,strArr1[2]);var str22=new Date(strArr2[0],strArr2[1]-1,strArr2[2]);var a=['星期日','星期一','星期二','星期三','星期四','星期五','星期六'];var result=(str22-str11)/3600000;switch(result)
{case 0:return"今天";break;case 24:return"明天";break;case 48:return"后天";break;default:return a[dt.getDay()];}}
_initialize();}})(jQuery);;jQuery.extend({TN_checkName:function(name){name=name.replace(/(^\s*)/g,"");if(name==''){return 2;}else if(this.TN_strlen(name)>20||this.TN_strlen(name)<4){return 3;}else{var expression=new RegExp("^[\u4E00-\u9FA5A-Za-z ]+$");if(expression.test(name)){if(/.*[\u4e00-\u9fa5]+.*$/.test(name)&&/\s/.test(name)){return 4;}
if(/.*[\u4e00-\u9fa5]+.*$/.test(name)&&/.*[A-Za-z]+.*$/.test(name)){return 4;}
return 1;}else{return 4;}}},TN_checkEnglishName:function(name){name=name.replace(/(^\s*)/g,"");if(name==''){return 2;}else if(this.TN_strlen(name)>20||this.TN_strlen(name)<1){return 3;}else{var expression=new RegExp("^[\.A-Za-z]+$");if(expression.test(name)){return 1;}else{return 4;}}},TN_checkNameForTicket2:function(name){name=name.replace(/(^\s*)/g,"");if(name==''){return 2;}else if(/(\u5148\u751f)|(\u5c0f\u59d0)|(\u5973\u58eb)|(\u8001\u5e08)/.test(name)){return 3;}else{var expression=new RegExp("^[\u4E00-\u9FA5]+$");if(expression.test(name)){return 1;}else{return 4;}}},TN_checkTel:function(tel){if(tel==''){return 2;}else if(new RegExp("^((13[0-9])|(15[0-35-9])|(18[0-9])|(17[0-9])|145|147)[0-9]{8,8}$").test(tel)==false){return 3;}else{return 1;}},TN_checkPhone:function(area_code,phone){if(area_code!=''||phone!=''){var reg1=/^\d{3,4}$/;var reg2=/^\d{7,8}$/;if(!reg1.test(area_code)){return 2;}
if(!reg2.test(phone)){return 3;}}
return 1;},TN_checkEmail:function(email){if(email!=''){var patrn=/^\w+((-\w+)|(\.\w+))*\@[A-Za-z0-9]+((\.|-)[A-Za-z0-9]+)*\.[A-Za-z0-9]+$/;if(!patrn.exec(email)){return 3;}}else{return 2}
return 1;},TN_checkPostcode:function(postcode){var expression=new RegExp("^[0-9]{6,6}$");if(expression.test(postcode)==true){return 1;}else if(postcode!=''){return 3;}else{return 2;}},TN_strlen:function(str){var len=0;for(var i=0;i<str.length;i++){if(str.charCodeAt(i)>255||str.charCodeAt(i)<0){len+=2;}else{len++;}}
return len;},TN_checkIdCard:function(IDCard){if(IDCard==''){return 2;}else if(new RegExp("(^[0-9]*[1-9][0-9]*$)").test(IDCard)==false){return 3;}else{return 1;}}});