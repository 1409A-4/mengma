window.onerror=function(errorMessage,scriptURI,lineNumber,columnNumber,errorObj){$.ajax({url:"/yii.php?r=/hotel/hotel/errorCatch",type:'post',dataType:'json',data:{errorMessage:errorMessage,scriptURI:scriptURI,lineNumber:lineNumber,columnNumber:columnNumber,userAgent:navigator.userAgent,url:window.location.href},success:function(s){},error:function(e){}});}
$(function(){window.onerror=function(errorMessage,scriptURI,lineNumber,columnNumber,errorObj){$.ajax({url:"/yii.php?r=/hotel/hotel/errorCatch",type:'post',dataType:'json',data:{errorMessage:errorMessage,scriptURI:scriptURI,lineNumber:lineNumber,columnNumber:columnNumber,userAgent:navigator.userAgent,url:window.location.href},success:function(s){},error:function(e){}});}});