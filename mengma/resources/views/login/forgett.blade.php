<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>注册</title>
    <base href="{{URL::asset('/')}}">
    <meta name="google-site-verification" content="DVVM1p1HEm8vE1wVOQ9UjcKP--pNAsg_pleTU5TkFaM" />
    <link href="index/Css/68f9b04404bf43d88b25f5f045c6eda6.css" rel="stylesheet" type="text/css" media="screen" />
    <link rel="shortcut icon" href="http://www.qyer.com/favicon.ico" />
    {{--<script type="text/javascript" src="index/Scripts/a3a41c812cab4d049e225c771525458a.js"></script>--}}
</head>
<body>
<div class="main">
    <div class="login-container">
        <div class="wrapper">
            <div class="login-logo">

                <span class="title">注册</span>
            </div>
            <div class="section">
                @if (count($errors) > 0)
                    <div >
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li style="color: red;">{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="qui-login-section section-register">
                    <div class="qui-login-tabs">
                        <a class="change-tab change-login-type change-register-mail current" href="javascript:;" data-action="register" data-type="mail" data-bn-ipg="web-register-page-tab-mail">邮箱注册</a>
                       {{-- <a class="change-tab change-login-type change-register-phone" href="javascript:;" data-action="register" data-type="phone" data-bn-ipg="web-register-page-tab-phone">手机注册</a>--}}
                    </div>
                    <div class="qui-login-form">
                        <form  action="login/regis" method="post" {{--autocomplete="off"--}}>
                            <input type="hidden" name="_token" value="{{csrf_token()}}">

                            <div class="qui-login-input input-control input-control-register-mail">
                                <a href="javascript:;" class="icon-clear"></a>
                                <input type="text" class="ui3_input field_valid" name="mail_input" id="email" title="邮箱" tabindex="1" placeholder="输入用于登录的邮箱地址">
                                <input type="hidden" name="type" value="mail">
                                <div class="message-box"></div>
                            </div>
                            <div class="qui-login-input input-control input-control-register-phone" style="display: none;">
                                <div id="phoneCodeForRegister" class="qui-select qui-select-register fl" data-ui-width="62px" data-ui-menuwidth="265px" data-ui-height="38px" >
                                    <strong class="titles"><span class="title-text">86</span></strong>
                                    <div class="contents" style="display:none;">
                                        <ul></ul>
                                    </div>
                                </div>
                                <input type="text" class="ui3_input field_valid input_phone_code fr" name="phone_input" title="手机号" tabindex="1" placeholder="输入用于登录的手机号码">
                                <input type="hidden" name="area_code" value="86">
                                <input type="hidden" name="type" value="phone">
                                <div class="message-box"></div>
                            </div>
                            <div class="qui-login-input input-control-validcode">
                                <input type="text" class="ui3_input field_valid input_check_code fl" name="valid_code" maxlength="5" tabindex="2" title="图片识别码" placeholder="图片识别码">
                        <span class="check_code fr" style="width: 125px;">
                            <a href="javascript:;" title="换一换"><img src="{{URL('login/verify/1')}}" onclick="this.src='{{URL('login/verify')}}/'+Math.random()"></a>
                        </span>
                                <div class="message-box"></div>
                            </div>
                            <div class="qui-login-input input-control input-control-register-mail">
                                <input type="text" class="ui3_input field_valid input_check_code fl" maxlength="6"  name="mail_valid_code" title="邮箱验证码" tabindex="3" placeholder="输入邮件中的验证码">
                                <a href="javascript:;" class="ui_button button_code fr" id="code" data-type="mail"><span>发送验证码</span></a>
                                <div class="message-box"></div>
                            </div>
                            <div class="qui-login-input input-control input-control-register-phone" style="display: none;">
                                <input type="text" class="ui3_input field_valid input_check_code fl"  maxlength="6" name="phone_valid_code" title="短信验证码" tabindex="3" placeholder="输入短信中的验证码">
                                <a href="javascript:;" class="ui_button button_code fr" data-type="phone"><span>发送验证码</span></a>
                                <div class="message-box"></div>
                            </div>
                            <div class="qui-login-input">
                                <input type="text" class="ui3_input field_valid" name="username" maxlength="15" title="用户名" tabindex="3" placeholder="起一个具有辨识度的用户名">
                                <div class="message-box">
                                    <span class="checktip">注：用户名暂不支持更改</span>
                                </div>
                            </div>
                            <div class="qui-login-input">
                                <input type="password" class="ui3_input field_valid" name="password" maxlength="16" title="密码" tabindex="4" placeholder="输入4-12位密码，需包含字母及数字">
                                <div class="message-box"></div>
                            </div>
                            <div class="qui-login-input qui-login-btn">
                                <input type="submit"  class="ui_button btn_submit" value="注册" data-value="注册">
                                <div class="message-box">
                            <span class="fl">
                                已有穷游账号？ <a class="link-login" href="login/login" data-bn-ipg="web-register-page-login">登录</a>
                            </span>
                            <span class="fr">
                                同意<a href="http://www.qyer.com/htmlpages/member.html" target="_blank" data-bn-ipg="web-register-page-clause">会员条款</a>和<a href="http://www.qyer.com/htmlpages/exemption.html" target="_blank" data-bn-ipg="web-register-page-statement">免责声明</a>
                            </span>
                                </div>
                            </div>

                        </form>
                    </div>
                    <div class="section-message-box"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="phpreferer" style="display: none;"></div>
<div class="qyer_footer">
    <div class="qyer_footerBox">
        <ul class="qyer_footer_about">
            <li>
                <dl>
                    <dt>关于我们</dt>
                    <dd><a href="http://www.qyer.com/htmlpages/about.html" target="_blank" rel="nofollow" data-bn-ipg="foot-about-1">穷游简介</a></dd>
                    <dd><a href="http://www.qyer.com/htmlpages/contact.html" target="_blank" rel="nofollow" data-bn-ipg="foot-about-2">联系我们</a></dd>
                    <dd><a href="http://www.qyer.com/partner/" target="_blank" rel="nofollow" data-bn-ipg="foot-about-3">合作伙伴</a></dd>
                </dl>
            </li>
            <li>
                <dl>
                    <dt>加入穷游</dt>
                    <dd><a href="http://www.qyer.com/job/" target="_blank" rel="nofollow" data-bn-ipg="foot-join-1">招聘职位</a></dd>
                </dl>
            </li>
            <li>
                <dl>
                    <dt>网站条款</dt>
                    <dd><a href="http://www.qyer.com/htmlpages/member.html" target="_blank" rel="nofollow" data-bn-ipg="foot-clause-1">会员条款</a></dd>
                    <dd><a href="http://www.qyer.com/htmlpages/bbsguide.html" target="_blank" rel="nofollow" data-bn-ipg="foot-clause-2">社区指南</a></dd>
                    <dd><a href="http://www.qyer.com/htmlpages/copyright.html" target="_blank" rel="nofollow" data-bn-ipg="foot-clause-3">版权声明</a></dd>
                    <dd><a href="http://www.qyer.com/htmlpages/exemption.html" target="_blank" rel="nofollow" data-bn-ipg="foot-clause-4">免责声明</a></dd>
                </dl>
            </li>
            <li>
                <dl>
                    <dt>帮助中心</dt>
                    <dd><a href="http://site.qyer.com/tyro/" target="_blank" rel="nofollow" data-bn-ipg="foot-help-1">新手上路</a></dd>
                    <dd><a href="http://bbs.qyer.com/forum-10-1.html" target="_blank" rel="nofollow" data-bn-ipg="foot-help-2">使用帮助</a></dd>
                    <dd><a href="http://www.qyer.com/sitemap.html" target="_blank" data-bn-ipg="foot-help-4">网站地图</a></dd>
                </dl>
            </li>
            <li>
                <dl class="qyer_footer_attention">
                    <dt>关注我们</dt>
                    <dd><a href="http://weibo.com/go2eu" target="_blank" title="穷游网@新浪微博" rel="nofollow" data-bn-ipg="foot-concern-1" class="weibo">穷游网@新浪微博</a></dd>
                    <dd><a href="http://www.flickr.com/photos/go2eu" target="_blank" title="穷游网@flickr" rel="nofollow" data-bn-ipg="foot-concern-2" class="flickr">穷游网@flickr</a></dd>
                    <dd><a href="http://page.renren.com/600986584" target="_blank" title="穷游网@人人" rel="nofollow" data-bn-ipg="foot-concern-3" class="renren">穷游网@人人</a></dd>
                    <dd><a href="http://site.douban.com/go2eu" target="_blank" title="穷游网@豆瓣" rel="nofollow" data-bn-ipg="foot-concern-4" class="douban">穷游网@豆瓣</a></dd>
                    <dd><a href="http://instagram.com/qyer" target="_blank" title="穷游网@instagram" rel="nofollow" data-bn-ipg="foot-concern-7" class="instagram">穷游网@instagram</a></dd>
                    <dd><a href="http://plus.weico.com/134522585376811014" target="_blank" title="穷游网@微可拍" rel="nofollow" data-bn-ipg="foot-concern-8" class="weico">穷游网@微可拍</a></dd>
                </dl>
            </li>
        </ul>
        <div class="qyer_footer_appStore"><a class="qyer_hf_bg btn_appstore" href="http://itunes.apple.com/cn/artist/qyer/id492202235" target="_blank" rel="nofollow" data-bn-ipg="foot-appstore" alt="穷游网@App Store" title="穷游网@App Store" /></a></div>
        <div class="qyer_footer_copyright"><a class="qyer_hf_bg btn_copyright" href="http://www.qyer.com/" rel="nofollow" data-bn-ipg="foot-logo" alt="穷游网" /></a>
            <p>2004-2015 &copy; 穷游网&trade; qyer.com All rights reserved.&nbsp;&nbsp;<a href="http://www.miibeian.gov.cn/" target="_blank" rel="nofollow">京ICP备12003524号</a>&nbsp;&nbsp;京公网安备11010502023470</p>
            <p><a href="http://www.qyer.com/">穷游网</a>为<a href="http://www.qyer.com/">旅行</a>者提供原创实用的<a href="http://www.qyer.com/">出境游</a><a href="http://place.qyer.com/">旅行指南</a>和<a href="http://place.qyer.com/">旅游攻略</a>、<a href="http://bbs.qyer.com/">旅行社区</a>和<a href="http://ask.qyer.com/">问答</a>交流平台，并提供<a href="http://qyer.ailvxing.com/">签证</a>、<a href="http://bx.qyer.com/">保险</a>、<a href="http://flight.qyer.com/">机票</a>、<a href="http://hotel.qyer.com/">酒店预订</a>、<a href="http://car.qyer.com/">租车</a>等服务。</p>
        </div>
        <!--友情链接模块-->
    </div>
</div>
<script src="index/js/jquery.js"></script>
<script>
    $('#code').click(function () {
        email=$('#email').val();

        $.get('login/send',{email:email},function (msg) {

        })
    })
</script>

</body>
</html>