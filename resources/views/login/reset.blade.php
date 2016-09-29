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
        <h2>重置密码</h2>
    </div>
    <div class="accounts-body">
        <div class="qui-login-section">
            <div class="qui-login-form">
                <form id="resetPasswordForm" action="login/reset" method="post">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <input type="hidden" name="email" value="{{$email}}">
                    <div class="qui-login-input">
                        <input type="password" class="ui3_input field_valid" name="password" maxlength="16" title="密码" tabindex="1" placeholder="输入8-16位密码，需包含字母及数字">
                        <div class="message-box"></div>
                    </div>
                    <div class="qui-login-input">
                        <input type="password" class="ui3_input field_valid" name="re_password" maxlength="16" title="重复密码" tabindex="2" placeholder="再次输入密码">
                        <div class="message-box"></div>
                    </div>
                    <div class="qui-login-input qui-login-btn">
                        <input type="button" class="ui_button btn_submit" value="重置密码">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
<div class="phpreferer" style="display: none;"></div>
<div class="qyer_footer">
    @include('index.public.foot')
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