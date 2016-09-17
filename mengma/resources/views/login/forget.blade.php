<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>登录</title>
    <base href="{{URL::asset('/')}}">
    <meta name="google-site-verification" content="DVVM1p1HEm8vE1wVOQ9UjcKP--pNAsg_pleTU5TkFaM" />
    <link href="index/css/b780e.css" rel="stylesheet" type="text/css" media="screen" />
    <link rel="shortcut icon" href="http://www.qyer.com/favicon.ico" />
    <script type="text/javascript" src="index/Scripts/f1753d9d1e4645ca9ce2ffdcb679920f.js"></script>
    @include('index.public.style')
</head>
<body>
@include('index.public.header')
<div class="qyWrap user-accounts">
    <div class="accounts-head">
        <h2>找回密码</h2>
    </div>
    <div class="accounts-body">
        <div class="qui-login-section">
            <div class="qui-login-form">
                <form id="findPasswordForm" action="login/pass_Check" method="post">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="qui-login-input input-control input-control-register-mail">
                        <a href="javascript:;" class="icon-clear"></a>
                        <input type="text" class="ui3_input field_valid" name="mail_input" id="email" title="邮箱" tabindex="1" placeholder="输入用于登录的邮箱地址" value="">

                        <div class="message-box"></div>
                    </div>
                    <div class="qui-login-input input-control-validcode">
                        <input type="text" class="ui3_input field_valid input_check_code fl" name="valid_code" maxlength="5" tabindex="2" title="验证码" placeholder="验证码">
                    <span class="check_code fr" style="width: 125px;">
                        <a href="javascript:;" title="换一换"><img src="{{URL('login/verify/1')}}" onclick="this.src='{{URL('login/verify')}}/'+Math.random()"></a>
                    </span>
                        <div class="message-box"></div>
                    </div>
                    <div class="qui-login-input input-control input-control-register-mail">
                        <input type="text" class="ui3_input field_valid input_check_code fl" maxlength="6" name="mail_valid_code" title="邮箱验证码" tabindex="3" placeholder="输入邮件中的验证码">
                        <a href="javascript:;" class="ui_button button_code fr" id="code" data-type="mail"><span>发送验证码</span></a>
                        <div class="message-box"></div>
                    </div>
                    <div class="qui-login-input qui-login-btn">
                        <input type="submit" class="ui_button btn_submit" value="完成验证">
                        <div class="message-box">
                        <span>
                            没有邮箱账号？ <a class="change-login-type" href="/?action=getmobilepass">手机号找回</a>
                        </span>
                        </div>
                    </div>
                </form>
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


<script type="text/javascript">

    $('#code').click(function () {
        email=$('#email').val();

        $.get('login/send',{email:email},function (msg) {

        })
    })

</script>
</body>
</html>