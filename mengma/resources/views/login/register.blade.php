<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>注册</title>
  cccc
    <meta name="google-site-verification" content="DVVM1p1HEm8vE1wVOQ9UjcKP--pNAsg_pleTU5TkFaM" />
    <link href="index/Css/b780e.css" rel="stylesheet" type="text/css" media="screen" />
    <link rel="shortcut icon" href="http://www.qyer.com/favicon.ico" />
    {{--<script type="text/javascript" src="index/Scripts/a3a41c812cab4d049e225c771525458a.js"></script>--}}
    @include('index.public.style')
</head>
<body>
@include('index.public.header')
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
    @include('.index.public.foot')
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