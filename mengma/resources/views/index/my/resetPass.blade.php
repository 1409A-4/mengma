<!DOCTYPE html>
<!-- saved from url=(0030)http://www.qyer.com/u/password -->
<html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <title>修改我的用户密码 - 穷游网</title>
    <base href="{{URL::asset('/')}}">

    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1">
    <link rel="shortcut icon" href="http://www.qyer.com/favicon.ico">
    <script type="text/javascript" async="" src="index/js/beacon.js"></script>
    {{--<script type="text/javascript" async="" src="./修改我的用户密码 - 穷游网_files/ga"></script>--}}
    <script>
        window.QYER = {
            uid:[8384004][0]|0
        };
        window.__qRequire__ = {
            version: '1473155922',
            combineCSS: []
        };
    </script>
    <link rel="stylesheet" href="index/css/base_css.aa34ca3be0292dcb3c11fca7f3fc3fdf.css">
    <link rel="stylesheet" href="index/css/profile_css.f5d8c939e6dbd48df4441fc1c04bf835.css">

    <script src="index/js/base_js.0ad9dd885d23fc7dc5c97d4710989559.js"></script>
    <style type="text/css">.qui-feedback { position:fixed; _position:absolute; z-index:99; top:120px; right:-246px; display:none;}.qui-feedback .icon { float:left; width:24px; height:150px; background:url(http://static.qyer.com/models/common/component/feedback/icons_feedback.png) 0 0 no-repeat; cursor:pointer;}.qui-feedback.js-current > .icon { background-position:-29px 0;}.qui-feedback .cnt { float:left; width:246px; height:280px; background-color:#e8e4df;}.qui-feedback .cnt form { padding:10px; font-size:0;}.qui-feedback .cnt textarea { width:214px; height:192px; padding:2px 5px; border:1px solid #ccc; font-size:12px;}.qui-feedback .cnt input { float:right; margin-top:10px;}.qui-feedback .help { position:relative; top:-1px; border:1px solid #ccc; border-top:none; background:#fefdc9; height:24px; line-height:22px; text-align:center;font-size:12px;}.qui-feedback .help a { font-weight:bold; }</style>
    <script src="index/js/profile_js.a7939a9dc6c19d586cc7347d309653f0.js"></script>
    <script type="text/javascript" src="index/js/jquery.cookie.js"></script>
    <script type="text/javascript" charset="utf-8" async="" data-requirecontext="_" data-requiremodule="web_old_tooltips" src="index/js/tooltip.js"></script>
    <script type="text/javascript" charset="utf-8" async="" data-requirecontext="_" data-requiremodule="common/models/basic/js/require-css" src="index/js/require-css.js"></script>
    <link type="text/css" rel="stylesheet" href="index/css/tooltip.css">
    {{--<script type="text/javascript" src="js/jia.js"></script>--}}
    @include("index.public.style")
</head>
<body>
<link href="index/css/jiathis_share.css" rel="stylesheet" type="text/css">
<iframe frameborder="0" style="position: absolute; display: none; opacity: 0;"></iframe>
<div class="jiathis_style" style="position: absolute; z-index: 1000000000; display: none; top: 50%; left: 50%; overflow: auto;"></div>
<div class="jiathis_style" style="position: absolute; z-index: 1000000000; display: none; overflow: auto;"></div>
{{--<iframe frameborder="0" src="./修改我的用户密码 - 穷游网_files/jiathis_utility.html" style="display: none;"></iframe>--}}
@include("index.public.header")


<link href="index/css/headerfoot_black.min-b9b248b9e55e7c6d0d4563ef311d9f73.css" rel="stylesheet">
<script src="index/js/headerfoot_black.min-e0b0f90a51b948628c849d2fa239d0e5.js" async="async"></script>


<div class="u_set_cnt clearfix">
    <!--设置模块导航 -->
    <div class="u_set_menu">
        <ul class="fontSong">
            <li data-bn-ipg="usercenter-setting-profile"><a href="{{url('index/center')}}" class="data">个人资料</a></li>
           {{-- <li data-bn-ipg="usercenter-setting-follow"><a href="http://www.qyer.com/u/8384004/follow" class="private">关注（0）</a></li>
            <li data-bn-ipg="usercenter-setting-fan"><a href="http://www.qyer.com/u/8384004/fans" class="attent">粉丝（0）</a></li>--}}
        </ul>
        <ul>
           {{-- <li data-bn-ipg="usercenter-setting-bind"><a href="http://www.qyer.com/u/bind" class="account">账号管理</a></li>
            <li data-bn-ipg="usercenter-setting-certificate"><a href="http://www.qyer.com/u/1/memberauth" class="certificate">用户认证</a></li>--}}
            <li data-bn-ipg="usercenter-setting-invite"><a href="{{url('index/invite')}}" class="friend">邀请好友</a></li>

        </ul>
        <ul>
            <li data-bn-ipg="usercenter-setting-password" class="current"><a href="{{url('index/resetpass')}}" class="pass">修改密码</a></li>

        </ul>
    </div>    <!--设置模块内容 -->
    <div class="u_set_main">
        <!--设置模块栏目标题 -->
        <div class="u_set_title">
            <strong class="text fontYaHei">修改密码</strong>
        </div>
        <!--设置模块栏目内容 -->
        <div class="u_set_pass">
            <form action="{{url('index/pass_Check')}}" method="post"  id="passwordform" {{--onsubmit="return false"--}}>
                <ul class="clearfix">
                    <li>
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <div class="fl">当前密码：</div>
                        <div class="fr">
                            <input name="oldpassword" id="oldpassword" type="password" class="ui2_input">
                            <p class="cRed_caution" id="user_pwd_ret">旧密码不能为空</p>
                        </div>
                    </li>
                    <li>
                        <div class="fl">新设密码：</div>
                        <div class="fr">
                            <input name="newpassword" id="newpassword" type="password" class="ui2_input">
                            <p class="cRed_caution" id="newpasswordtips">新密码不能为空</p>
                        </div>
                    </li>
                    <li>
                        <div class="fl">重复密码：</div>
                        <div class="fr">
                            <input name="repassword" id="repassword" type="password" class="ui2_input">
                            <p class="cRed_caution" id="user_npwd1_ret">重复密码不能为空</p>
                        </div>
                    </li>
                    <li>
                        <div class="fr">
                            <button class="ui_buttonB fl mr10" >保存设置</button>

                        </div>
                    </li>
                </ul>

            </form>
        </div>
    </div>
</div>

<script language="javascript" type="text/javascript">

    /*$("#passwordform").submit(function(){
        var oldpassword = $.trim($('#oldpassword').val());
        var newpassword = $.trim($('#newpassword').val());
        var repassword = $.trim($('#repassword').val());

        //var ret = checkOldPwd();
        var ret1 = checkNewPwd();
        var ret2 = checkRNewPwd();

        if(ret1 && ret2){
            $.ajax({
                dataType: "json",
                type: "POST",
                url: "profile.php?action=password&is_ajax=1",
                data:$("#passwordform").serialize(),
                success: function(res){
                    if(res.error == 0){
                        tips.show(res.msg);
                        setTimeout(function (){
                           // window.location.href='http://login.qyer.com/login.php?action=userlogout';
                        }, 3000);
                    }else{
                        $('#user_pwd_ret').html(res.msg);
                        $('#password').focus();
                        $('#user_pwd_ret').show();
                    }

                    //alert(msg);
                    /!*if(msg == 1){
                     tips.show('密码修改成功!');
                     //alert('更新成功');
                     }else if(msg == 0 || msg == -7){
                     alert('没有做任何修改');
                     }else if(msg == -8 ){
                     alert('该用户受保护无权限更改');
                     }else if(msg == -1){ //旧密码不正确
                     $('#user_pwd_ret').html('旧密码不正确');
                     $('#user_pwd_ret').show();
                     }  *!/

                }
            });
        }
        return false;
    });*/

    $(function(){
        $('#oldpassword').blur(function(){ checkOldPwd(); });
        $('#newpassword').blur(function(){ checkNewPwd(); });
        $('#repassword').blur(function(){ checkRNewPwd(); });
    });

    function checkOldPwd(){
        var ret = 1;
        var oldpassword = $.trim($('#oldpassword').val());
        if(oldpassword == ''){
            $('#user_pwd_ret').html('旧密码不能为空!');
            $('#password').focus();
            $('#user_pwd_ret').show();
            return false;
        }
        $('#user_pwd_ret').hide();
        return ret;
    }

    function checkNewPwd(){
        var newpassword = $.trim($('#newpassword').val());
        if(newpassword == ''){
            $('#newpasswordtips').html('新密码不能为空!');
            //$('#newpassword').focus();
            $('#newpasswordtips').show();
            return false;
        }
        if(! /^[\w\W]{4,12}$/.test(newpassword)){
            $('#newpasswordtips').html('密码需要4-12位，包含字母及数字!');
            //$('#newpassword').focus();
            $('#newpasswordtips').show();
            return false;
        }
        $('#newpasswordtips').hide();
        return true;
    }

    function checkRNewPwd(){
        var newpassword = $.trim($('#newpassword').val());
        var repassword = $.trim($('#repassword').val());

        if(repassword == ''){
            $('#user_npwd1_ret').html('重复密码不能为空!');
            $('#newpassword1').focus();
            $('#user_npwd1_ret').show();
            return false;
        }

        if(! /^[\d]{4,12}$/.test(repassword)){
            $('#user_npwd1_ret').html('密码需要4-12位，包含字母及数字!');
            $('#newpassword1').focus();
            $('#user_npwd1_ret').show();
            return false;
        }

        if(newpassword != repassword){

            $('#user_npwd1_ret').html('两次密码不一样!');
            $('#user_npwd1_ret').show();
            return false;
        }
        $('#user_npwd1_ret').hide();
        return true;
    }
</script>
<div style="display: none;">http://www.qyer.com/ajax.php?action=close&amp;reload=1&amp;url=http%3A%2F%2Fwww.qyer.com%2Fu%2Fpassword</div>
<div class="qyer_footer">
    <div class="topline"></div>
    <div class="content">
        <p class="nav">
            <a href="http://www.qyer.com/htmlpages/about.html" target="_blank" rel="nofollow" data-bn-ipg="foot-about-1">穷游简介</a>
            <a href="http://www.qyer.com/partner/" target="_blank" rel="nofollow" data-bn-ipg="foot-about-3">合作伙伴</a>
            <a href="http://www.qyer.com/job/" target="_blank" rel="nofollow" data-bn-ipg="foot-join-1">加入我们</a>
            <a href="http://site.qyer.com/tyro/" target="_blank" rel="nofollow" data-bn-ipg="foot-help-1">新手上路</a>
            <a href="http://bbs.qyer.com/forum-10-1.html" target="_blank" rel="nofollow" data-bn-ipg="foot-help-2">使用帮助</a>
            <a href="http://www.qyer.com/sitemap.html" target="_blank" data-bn-ipg="foot-help-4">网站地图</a>
            <a href="http://www.qyer.com/htmlpages/member.html" target="_blank" rel="nofollow" data-bn-ipg="foot-clause-1">会员条款</a>
            <a href="http://www.qyer.com/htmlpages/bbsguide.html" target="_blank" rel="nofollow" data-bn-ipg="foot-clause-2">社区指南</a>
            <a href="http://www.qyer.com/htmlpages/copyright.html" target="_blank" rel="nofollow" data-bn-ipg="foot-clause-3">版权声明</a>
            <a href="http://www.qyer.com/htmlpages/exemption.html" target="_blank" rel="nofollow" data-bn-ipg="foot-clause-4">免责声明</a>
            <a href="http://www.qyer.com/htmlpages/contact.html" target="_blank" rel="nofollow" data-bn-ipg="foot-about-2">联系我们</a>
        </p>
        <p class="info">2004-2016 © 穷游网®  qyer.com All rights reserved. Version v5.57  京ICP备12003524号  京公网安备11010102001935号  京ICP证140673号</p>

        <!--友情链接模块-->

    </div>
</div>





<div class="qui-feedback" style="display: block;"><div class="icon js-btn" title="意见反馈"></div><div class="cnt"><form method="post"><textarea class="js-feedback-cnt" cols="50" rows="10" placeholder="有任何意见或建议请告诉我们"></textarea><p class="help">使用遇到问题？请先进入<a href="http://bbs.qyer.com/forum-10-1.html" target="_blank">帮助中心</a></p><input class="ui_button js-submitBtn" type="button" value="提交"></form></div></div></body></html>/