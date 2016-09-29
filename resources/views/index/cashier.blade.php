
<!DOCTYPE html><html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta http-equiv="pragma" content="no-cache">
    <meta http-equiv="cache-control" content="no-cache">
    <title>猛犸收银台</title>
    <base href="{{URL::asset('/')}}"/>
    @include('index.public.style')
    <link href="pay/scss/reset.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="pay/scss/pcCheckoutNew-v1.4.css">
</head>
@include('.index.public.header')
<div class="logo_box">
    <div class="module clearfix">
        <div class="logo fl" style="background:url('pay/img/123.jpg') center left no-repeat;"></div>
        <h3 class="fl">收银台</h3>
    </div>
</div>
<div class="pay_box">
    <div class="module">
        <div class="order_field">
            <div class="order_box">
                <div class="bankOrderInfo clearfix">
                    <div class="fl">
                        <p class="pdt-title">酒店名称：{{$hname['h_name']}}</p>
                        <p class="order-info">订单编号：{{$order}} | 订单金额：{{$data['gprice']}}.00 元 | 已支付：0.00 元</p>
                    </div>
                    <div class="fr pay_money noerma">
                        <p>应付金额：<span class="price fen f24">{{$data['gprice']}}.00</span>
                            <input onkeyup="value=value.replace(/[^\.\d]/g,'');" onblur="queryActivity()" id="splitAmount" name="splitAmount" type="text">元</p>
                    </div>
                </div>
            </div>
            {{--<p class="pay-tips">请您在提交订单后<span class="timeout" id="orderPayLimitTime">23小时57分钟53秒</span>内完成支付，否则订单会自动取消。</p>--}}
        </div>
        <div class="cont_box mask_box z14 choose_box active tn_wallet_box card_and_wallet opacity" id="wallet_div">
            <div class="choose_pay">
                <div class="top_title clearfix" style="padding-top: 20px;">
                    <div class="fl left">
                        <img height="24px" src="pay/img/alipay_logo.gif" alt="">
                    </div>
                    <p class="pay-enter active unopen">
                        <a class="payBtnCom active" href="paying?name={{$hname['h_name']}}&&price={{$data['gprice']}}&&order={{$order}}">立即支付</a>
                    </p>
                </div>
            </div>
        </div>
        <div class="cont_box mask_box link_box opacity">
            <div class="pay-other">
                <div class="top_title clearfix">
                    <div class="fl left"><span>支付平台</span></div>
                </div>
                <div class="pay-other-con">
                    <ul class="pay-other-list clearfix">
                        {{--<li><a href="javascript:accountpaySubmit(9,16)"><span class="alipay-log"></span></a></li>--}} <!-- 这里是支付宝支付 -->
                        <li><a href="javascript:accountpaySubmit(12,14)" class="wxzf"><span class="wx-log"></span></a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="pay-problem">
            <h3>常见问题</h3>
            <p>
                1.订单金额超过银行卡支付限额怎么办？<br>
                答：银行卡限额是指单笔交易在支付时候的最大额度以及每个月最高的支出金额。如果订单金额超过2万元，推荐您使用猛犸钱包或者猛犸宝支付来完成交易。<br>
                <br>
                2.忘记当前银行卡在银行保存的手机号码怎么办？<br>
                答：您可拨打银行客服电话查看或修改银行卡预存手机号码。请明确告诉银行客服是修改该银行卡绑定的手机号码。<br>
                <br>
                3.无法收到手机短信校验码怎么办？<br>
                答：请确认您当前使用的手机号码和该银行卡在银行预存的手机号码一致。如果不一致，请拨打银行客服热线，修改预存的手机号码。如果一致，可致电客服电话123456，联系客服处理。<br>
            </p>
        </div>
    </div>
</div>

<div class="pay_footer">Copyright@2016-2026 猛犸旅游网 </div>
<script>
    $(function(){
        $('.wxzf').click(function(){
            alert('暂不支持微信支付');
        })
    })
</script>
