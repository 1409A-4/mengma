<!DOCTYPE html>
<html>
<head>
    <base href="{{ URL::asset('/') }}">
    <meta charset="UTF-8">
    <title>提交订单</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link  rel="stylesheet" href="index/css/style.css" type="text/css"  media="all" />
    <link rel="stylesheet" href="index/css/responsiveslides.css">
    <script src="index/js/jquery.min.js"></script>
    <script src="index/js/responsiveslides.min.js"></script>
    <link rel="stylesheet" href="css/02ddd074ab258887bea4f98d71d32b7f.css" type="text/css" >
    <link rel="stylesheet" href="css/jquery.cxcalendar.css">
    <link rel="stylesheet" href="info_files/frame_css.css">
    <link rel="stylesheet" href="css/index.5b07d9dd456b809db030b241ed486e97.css" type="text/css" >
    <link rel="stylesheet" href="assets/css/jquery.cxdialog.css">
    <link rel="stylesheet" href="index/css/b780e.css"  type="text/css" media="screen" />
    <script src="index/bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="index/bootstrap/css/bootstrap.min.css">
    <link href="index/layer/skin/layer.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/validationEngine.jquery.css">

</head>

<body class="">
@include('.index.public.header')
<div class="zw-wrapper zw-order-header">
    <div class="zw-order-logo">
        <a href="/" class="logo-link">
            <img src="index/images/logo.jpg" align="最世界.自由行" width="200">
        </a>
    </div>
    <div class="zw-order-process">
        <img src="images/lo.png" align="最世界.自由行" width="820">
    </div>
</div>

<!--gulp_combine_model_start-->

<!-- 订单预定页内容 -->
<div class="zw-wrapper zw-order-container clearfix">

    <div class="aside">
        <div class="mod-wrapper">


            <div class="mod" data-mod-id="order" data-mod-price="30598">
                <div class="mod-head">
                    <strong class="mod-prod-name">{{ $data['p_abstract'] }}</strong>
                </div>
                <div class="mod-content">
                    <div class="clearfix">
                        <strong class="mod-prod-model">{{ $data['p_name'] }}</strong>
                    </div>
                        <div class="mod-prod-title">使用日期</div>
                        <div class="mod-prod-date">
                            <em class="date fontNum">{{ $data['go_time'] }}</em>
                        </div>
                    <div class="mod-prod-title">价格明细</div>
                    <ul class="mod-prod-items">
                        <li class="mod-prod-item">
                            <em class="item-title">购买数量</em>
                            <em class="item-cost">
                                ￥<em class="price fontNum">{{ $data['pt_price'] }}</em><em class="x fontNum">x</em><em class="num fontNum" id="nump">{{ $data['nump']}}</em>
                            </em>
                        </li>
                        @if($data['numr']* 2 -$data['nump']==0)
                        @else
                            <li class="mod-prod-item">
                                <em class="item-title">房差</em>
                                <em class="item-cost">
                                    ￥
                                    <em class="price fontNum">300</em>
                                    <em class="x fontNum">x</em>
                                    <em class="num fontNum">{{ $data['numr']* 2 -$data['nump'] }}</em>
                                </em>
                            </li>
                        @endif
                    </ul>
                    <div class="mod-prod-title discounts_title hidden">优惠</div>
                    <ul class="mod-prod-discounts">
                    </ul>

                    <div class="mod-prod-price clearfix">
                        <strong class="mod-prod-title">总价</strong>
                        <span class="mod-prod-price-value">￥
                            <em class="price fontNum">{{ $data['pt_price'] *  $data['nump'] +  ($data['numr']* 2 -$data['nump'])* 300 }}</em>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="main">


        <form id="form_id" action="packageBuy" method="POST">
            <input type="hidden"  name="_token" value="{{ csrf_token() }}">
            <input type="hidden"  name="p_id" value="{{ $data['p_id'] }}">
            <input type="hidden"  name="pt_id" value="{{$data['p_type'] }}">
            <input type="hidden"  name="p_nump" value="{{ $data['nump'] }}">
            <div class="mod-wrapper">
                <div class="mod mod-prople" data-mod-id="tourist" data-mod-name="旅客信息" data-mod-num="2">
                    <div class="mod-head clearfix">
                        <div class="mod-title">旅客信息</div>
                        <div class="mod-subtitle">
                            <span class="zwui-iconfont icon-info mod-ico"></span>
                            <span class="vm">请确保您填写的信息真实准确，否则会影响您的顺利出行。</span>
                        </div>


                    </div>
                    <div class="mod-content">
                        <ul class="mod-unit mod-tourists">
                            @for($i=1;$i<=$data['nump'];$i++)
                                <li class="mod-tourist mod-people-li">
                                    <div class="mod-title">
                                        <span class="zwui-iconfont icon-user mod-ico"></span><span class="vm">旅客{{ $i }}</span></div>
                                    <ul class="mod-fields clearfix">

                                        <li class="mod-field size1" data-fetype="input" data-name="中文姓" data-id="firstname">
                                            <div class="input-ribbon" data-key="tourist_firstname" data-fetype="input" data-name="中文姓" data-id="firstname" data-required="true" data-pattern="^[\u2E80-\u9FFF]{1,10}$">
                                                <label class="input-title" for="tourist_firstname-0">中文姓</label>
                                                <div class="input-text">
                                                    <input type="text" name="tourist_firstname[{{ $i }}]" id="tourist_firstname-0" placeholder="例李雷填李（同证件）" class="validate[required,custom[chinese],maxSize[2]]">
                                                </div>
                                            </div>
                                        </li>
                                        <li class="mod-field size1" data-fetype="input" data-name="中文名" data-id="lastname">
                                            <div class="input-ribbon" data-key="tourist_lastname" data-fetype="input" data-name="中文名" data-id="lastname" data-required="true" data-pattern="^[\u2E80-\u9FFF]{1,10}$">
                                                <label class="input-title" for="tourist_lastname-0">中文名</label>
                                                <div class="input-text">
                                                    <input type="text" name="tourist_lastname[{{ $i }}]" id="tourist_lastname-0" placeholder="例李雷填雷（同证件）" class="validate[required,custom[chinese],maxSize[3]]">
                                                </div>
                                            </div>
                                        </li>

                                        <li class="mod-field size1" data-fetype="input" data-name="拼音姓" data-id="firstname_en">
                                            <div class="input-ribbon" data-key="tourist_firstname_en" data-fetype="input" data-name="拼音姓" data-id="firstname_en" data-required="true" data-pattern="^[a-zA-Z\.]+$">
                                                <label class="input-title" for="tourist_firstname_en-0">拼音姓</label>
                                                <div class="input-text">
                                                    <input type="text" name="tourist_firstname_en[{{ $i }}]" id="tourist_firstname_en-0" placeholder="例李雷填LI（同证件）" class="validate[required,custom[onlyLetterSp]]">
                                                </div>
                                            </div>
                                        </li>



                                        <li class="mod-field size1" data-fetype="input" data-name="拼音名" data-id="lastname_en">
                                            <div class="input-ribbon" data-key="tourist_lastname_en" data-fetype="input" data-name="拼音名" data-id="lastname_en" data-required="true" data-pattern="^[a-zA-Z\.]+$">
                                                <label class="input-title" for="tourist_lastname_en-0">拼音名</label>
                                                <div class="input-text">
                                                    <input type="text" name="tourist_lastname_en[{{ $i }}]" id="tourist_lastname_en-0" placeholder="例李雷填LEI（同证件）" class="validate[required,custom[onlyLetterSp]]">
                                                </div>
                                            </div>
                                        </li>



                                        <li class="mod-field size1" data-fetype="radio" data-name="性别" data-id="sex">
                                            <div class="input-ribbon" data-key="tourist_sex" data-fetype="radio" data-name="性别" data-id="sex" data-required="true" >
                                                <label class="input-title" for="tourist_sex-0">性别</label>
                                                <div class="input-text">
                                                    <div class="custom-multi-radio clearfix">
                                                        <div class="custom-radio">
                                                            <input type="radio" id="tourist_sex_1-{{ $i }}" name="tourist_sex[{{ $i }}]" data-name="男" value="1" checked>
                                                            <label class="fixed_radio" for="tourist_sex_1-{{ $i }}"></label>
                                                            <label for="tourist_sex_1-{{ $i }}">男</label>
                                                        </div>
                                                        <div class="custom-radio">
                                                            <input type="radio" id="tourist_sex_2-{{ $i }}" name="tourist_sex[{{ $i }}]" data-name="女" value="2">
                                                            <label class="fixed_radio" for="tourist_sex_2-{{ $i }}"></label>
                                                            <label for="tourist_sex_2-{{ $i }}">女</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>



                                        <li class="mod-field size1" data-fetype="input_select" data-name="国籍" data-id="nationnality">
                                            <div class="input-ribbon" data-key="tourist_nationnality" data-fetype="input_select" data-name="国籍" data-id="nationnality" data-required="true" data-pattern="^([\u4e00-\u9fa5]|[a-zA-Z])+$">
                                                <label class="input-title" for="tourist_nationnality-0">国籍</label>
                                                <div class="input-text">
                                                    <input type="text" data-selectkey="" name="tourist_nationnality[{{ $i }}]" id="tourist_nationnality-0" placeholder="例中国填中国" class="validate[required,custom[chinese]]">
                                                </div>
                                            </div>
                                        </li>



                                        <li class="mod-field size1" data-fetype="date" data-name="出生日期" data-id="birthday">
                                            <div class="input-ribbon" data-key="tourist_birthday" data-fetype="date" data-name="出生日期" data-id="birthday" data-required="true" >
                                                <label class="input-title" for="tourist_birthday-0">出生日期</label>
                                                <div class="input-text">
                                                    <div class="custom-datepicker">
                                                        <label for="tourist_birthday-0">
                                                            {{--<input id="d421" class="Wdate" type="text" onfocus="WdatePicker({skin:'whyGreen',maxDate:'%y-%M-%d'})"/>--}}
                                                            <input type="text"
                                                                   name="tourist_birthday[{{ $i }}]"
                                                                   id="d421"
                                                                   placeholder="选择日期"
                                                                   onfocus="WdatePicker({maxDate:'%y-%M-%d'})"
                                                                   class="validate[required,custom[date]]"
                                                            >
                                                            <span class="zwui-iconfont icon-calendar mod-ico"></span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>



                                        <li class="mod-field size1" data-fetype="input" data-name="出生地" data-id="birth_place">
                                            <div class="input-ribbon" data-key="tourist_birth_place" data-fetype="input" data-name="出生地" data-id="birth_place" data-required="true" >
                                                <label class="input-title" for="tourist_birth_place-0">出生地</label>
                                                <div class="input-text">
                                                    <input type="text" name="tourist_birth_place[{{ $i }}]" id="tourist_birth_place-0" placeholder="" class="validate[required]">
                                                </div>
                                            </div>
                                        </li>



                                        <li class="mod-field mod-field-title size4" data-fetype="special" data-name="证件信息" data-id="identity_info">
                                            <strong class="field-title">证件信息</strong>
                                        </li>
                                        <li class="mod-field size1" data-fetype="select" data-name="证件类型" data-id="identity_type">
                                            <div class="input-ribbon" data-key="tourist_identity_type" data-fetype="select" data-name="证件类型" data-id="identity_type" data-required="true">
                                                <label class="input-title" for="tourist_identity_type-0">证件类型</label>
                                                <div class="input-text">
                                                    <input type="text"  value="身份证" disabled>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="mod-field size1" data-fetype="input" data-name="证件号" data-id="identity_num">
                                            <div class="input-ribbon" data-key="tourist_identity_num" data-fetype="input" data-name="证件号" data-id="identity_num" data-required="true" data-pattern="^[0-9a-zA-Z]+$">
                                                <label class="input-title" for="tourist_identity_num-0">证件号</label>
                                                <div class="input-text">
                                                    <input type="text" name="tourist_identity_num[{{ $i }}]" id="tourist_identity_num-0" placeholder="" class="validate[required,custom[chinaIdLoose]]">
                                                </div>
                                            </div>
                                        </li>
                                        <li class="mod-field size1" data-fetype="date" data-name="有效期" data-id="identity_validity">
                                            <div class="input-ribbon" data-key="tourist_identity_validity" data-fetype="date" data-name="有效期" data-id="identity_validity" data-required="true">
                                                <label class="input-title" for="tourist_identity_validity-0">有效期</label>
                                                <div class="input-text">
                                                    <div class="custom-datepicker">
                                                        <label for="tourist_identity_validity-0">

                                                            <input
                                                                    type="text"
                                                                    name="tourist_identity_validity[{{ $i }}]"
                                                                    id="d422"
                                                                    onfocus="WdatePicker({minDate:'%y-%M-{%d+1}'})"
                                                                    readonly="readonly"
                                                                    data-min="1474083495"
                                                                    class="validate[required,custom[date]]"
                                                            >
                                                            <span class="zwui-iconfont icon-calendar mod-ico"></span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="mod-field size1" data-fetype="input" data-name="签发地" data-id="identity_place">
                                            <div class="input-ribbon" data-key="tourist_identity_place" data-fetype="input" data-name="签发地" data-id="identity_place" data-required="true">
                                                <label class="input-title" for="tourist_identity_place-0">签发地</label>
                                                <div class="input-text">
                                                    <input type="text" name="tourist_identity_place[{{ $i }}]" id="tourist_identity_place-0" placeholder="" class="validate[required]">
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                    <div class="mod-bind-contact clearfix">
                                        <div class="input-ribbon ribbon-bind" data-key="tourist_bind">
                                            <div class="input-text">
                                                <div class="custom-checkbox">
                                                    <input type="checkbox" name="tourist_bind[{{ $i }}]" id="tourist_bind[{{ $i }}]" value="true" checked="checked">
                                                    <label for="tourist_bind[{{ $i }}]" data-bn-ipg="zsj-order-save-traveler"></label>
                                                </div>
                                            </div>
                                            <label class="input-title" for="tourist_bind[{{ $i }}]" data-bn-ipg="zsj-order-save-traveler">保存为常用旅客</label>
                                        </div>
                                    </div>
                                </li>
                            @endfor
                        </ul>
                    </div>
                </div>
            </div>
            <div class="mod-wrapper">
                <div class="mod" data-mod-id="contacts" data-mod-name="联系人信息" data-mod-num="1">
                    <div class="mod-head">
                        <div class="mod-title">联系人信息</div>
                    </div>
                    <div class="mod-content">
                        <ul class="mod-unit mod-contactss">
                            <li class="mod-contacts">
                                <ul class="mod-fields clearfix">
                                    <li class="mod-field size1" data-fetype="input" data-name="姓名" data-id="name">
                                        <div class="input-ribbon " data-key="contacts_name" data-fetype="input" data-name="姓名" data-id="name" data-required="true" data-pattern="^([\u4e00-\u9fa5]|[a-zA-Z])+$">
                                            <label class="input-title" for="contacts_name">姓名</label>
                                            <div class="input-text">
                                                <input type="text" data-id="name" name="contacts_name" id="contacts_name" placeholder="联系人姓名"  class="validate[required,custom[chinese],minSize[2],maxSize[6]]">
                                            </div>
                                        </div>
                                    </li>
                                    <li class="mod-field size1" data-fetype="input" data-name="手机号" data-id="phone">
                                        <div class="input-ribbon country-code" data-key="contacts_phone" data-fetype="input" data-name="手机号" data-id="phone" data-required="true" data-pattern="^\d+$">
                                            <label class="input-title" for="contacts_phone">手机号</label>
                                            <div class="input-text">
                                                <div id="phone-code" class="phone-code qui-select" data-value="" data-ui-menuwidth="242px" data-ui-width="60px" data-ui-height="27px">
                                                    <strong class="titles">
                                                        <span class="title-text">+86</span>
                                                    </strong>
                                                    <div class="contents" style="display:none;">
                                                        <ul></ul>
                                                    </div>
                                                </div>
                                                <input id="input-phone-code" class="input-phone-code validate[required,custom[m_phone]]" type="text" data-id="phone" name="contacts_phone" id="contacts_phone" placeholder="用于接收确认信息" value="">
                                            </div>
                                        </div>
                                    </li>
                                    <li class="mod-field size1" data-fetype="input" data-name="微信" data-id="wechat">
                                        <div class="input-ribbon " data-key="contacts_wechat" data-fetype="input" data-name="微信" data-id="wechat" data-required="false" data-pattern="">
                                            <label class="input-title" for="contacts_wechat">微信</label>
                                            <div class="input-text">
                                                <input type="text" data-id="wechat" name="contacts_wechat" id="contacts_wechat" placeholder="用于境外24小时服务" value="">
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="mod-wrapper">
            </div>


            <div class="mod-wrapper">
                <div class="mod" data-mod-id="price" data-mod-price="30598" data-mod-scene="order">
                    <div class="mod-content">
                        <div class="price-wrapper">
                            ￥<em class="price js-price fontNum">{{ $data['pt_price'] *  $data['nump'] +  ($data['numr']* 2 -$data['nump'])* 300 }}</em><em class="js-coupon"></em>
                        </div>

                            @if(session('name'))
                                    <div class="pay js-submit" data-bn-ipg="zsj-order-pay">
                                        <input type="submit" value="同意以下条款，提交订单" style="background-color: #ff3535;width: 242px;height: 62px;border: none">
                                    </div>
                            @else
                                    <div class="pay js-submit" id="sub" >
                                         同意以下条款，提交订单
                                    </div>
                            @endif
                    </div>
                </div>

                <div class="mod-wrapper">


                    <div class="mod" data-mod-id="notice">
                        <div class="mod-head">
                            <div class="mod-title">预订须知</div>
                        </div>


                        <div class="mod-content">
                            <div class="mod-unit notice-wrapper">
                                <div class="notice-agree">
                                    <div class="input-ribbon" data-key="notice_agree" data-required="true">
                                        <div class="input-text">
                                            <div class="custom-checkbox">
                                                <input type="checkbox" name="notice_agree" id="notice_agree" checked="checked" value="true">
                                                <label for="notice_agree"></label>
                                            </div>
                                        </div>
                                        <label class="input-title" for="notice_agree">同意电子合同及协议的有效性，无需再次签署纸质合同</label>
                                        <div class="input-hint">
                                            <div class="error"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="notice-text" style="margin-top:0">
                                    <p>在预订开始前，请仔细阅读本须知，本须知及产品页面中的重要条款也作为双方协议的补充内容。当您开始预订产品时，已表明您仔细阅读并接受协议的所有条款。</p>
                                    <dl>
                                        <dd>1.购买前，请仔细阅读商品详情，如对商品有任何疑问可致电商家客服询问，在询问清楚后下单购买。</dd>
                                        <dd>2.下单时请正确填写个人信息，并在规定时间内完成支付。如遇到支付类问题，可与穷游网（即北京最世界国际旅行社有限公司）客服联系，穷游网（即北京最世界国际旅行社有限公司）客服将协助您解决问题。</dd>
                                        <dd>3.付款成功后，商家会尽快与您联系并确认出行信息。</dd>
                                        <dd>4.本商品为限时特卖产品，一经售出，不退不换，敬请谅解。</dd>
                                        <dd>5.穷游网（即北京最世界国际旅行社有限公司）有独立于商家的质控体系，任何商家违约，用户都会获得合理赔偿。赔偿规则详见“产品保障条例”。</dd>
                                    </dl>
                                    <p></p>
                                    <h2>自由行产品旅游者网签协议</h2>
                                    <p>说明：<br/>
                                        最世界国际旅行社为穷游网旗下具有出境游资质的旅行社，所有非代订旅游产品和服务均由最世界国际旅行社提供。本网签协议是旅游者与穷游网旗下公司最世界国际旅行社之间签署的约束双方之间的协议。</p>
                                    <dl>
                                        <dt>一、本协议的使用说明</dt>
                                        <dd>1.本协议属于旅游者与旅行社之间签署的委托协议。适用于旅游者委托旅行社代办预订机票、酒店、办理签证、接送服务、导游服务、当地旅游服务等单项服务及组合服务项目。</dd>
                                        <dd>2.本协议委托人为旅游者，受托人为旅行社。</dd>
                                        <dd>3.完整的自由行合同由本协议和每一项产品的《产品预订须知》共同组成。</dd>
                                        <dd>4.旅游者在签订本协议前请仔细阅读本协议各项条款。当您开始预订自由行的旅游度假产品时，已表明您仔细阅读并接受协议的所有条款。 </dd>
                                        <dt>二、相关概念及注解</dt>
                                        <dd>1.出境旅游产品：旅游度假目的地为中国已开放的旅游目的地国家及中国台湾、香港和澳门地区，从出发地到度假目的地往返交通票、目的地酒店住宿、旅行用车及其他可选择附加旅游产品。</dd>
                                        <dd>2.自助游旅游产品：该类产品包含前往度假目的地的往返机票、火车票、目的地住宿酒店、旅行用车及其它可选配的接送机、门票等项目的部分或全部。</dd>
                                        <dd>3.城市玩乐产品：客人抵达目的地后，自由选择的各项旅游体验服务，包括但不限于在目的地使用的观光游、门票、演出、户外运动、休闲活动、交通接驳等综合性的服务。</dd>
                                        <dd>4.旅游者：指通过   穷游       网预订旅游产品的用户，旅游者在          网上预订旅游产品成功后，旅游者和        穷游网      之间建立合同关系。</dd>
                                        <dd>5.酒店入住登记要求：登记入住酒店的客人中至少要有1人超过18周岁，即未满18周岁的客人必须由18周岁以上的客人帮其办理酒店入住手续。</dd>
                                        <dt>三、旅游产品信息及其标准</dt>
                                        <dd>1.自由行的旅游产品内容主要包含：酒店、飞机票、火车票、旅行用车、目的地接待服务及其他当地服务。具体产品的最终包含内容以确认的订单约定内容为准。</dd>
                                        <dd>2.您在进行当地游产品选配时，应在穷游网提供的备选项目范围内进行，对于您超出该范围的合理需求，穷游网将尽力为您落实，但对落实的结果不做任何承诺。</dd>
                                        <dd>3.当地游产品组成要素，均为经过穷游网严格考评筛选出的具备相关资质的供应商提供。</dd>
                                        <dt>四、旅游产品价格</dt>
                                        <dd>1.在穷游网页面展示的产品价格仅为参考价格，由于旅游产品价格的波动性，穷游网保留在不事先知会的情况下更改其网站上已公布的旅游度假产品价格的权利。</dd>
                                        <dd>2.您预订的旅游产品价格，以穷游网给您出具的确认单上最终确定的价格为准。</dd>
                                        <dt>五、预订产品的告知与提示    </dt>
                                        <dd>机票预订提示 </dd>
                                        <dd>1.机票的签、转、退等事宜须按照航空公司的规定办理。通过旅行社向航空公司申请的优惠机票通常附带严格的限制条件：</dd>
                                        <dd>（1）机票出票后，不可变更姓名、证件号码、日期和航班。</dd>
                                        <dd>（2）凡是需要交付定金的机票占位，即便没有出票，取消占位也会发生定金损失。 </dd>
                                        <dd>2.机票（或电子客票行程单）票面价有可能与机票报价不等，旅游者应当对航空公司的商业运作给予理解。旅游者可以索取与实际交费数额相等的正式发票。</dd>
                                        <dd>3.国际交票的航空税不包含在机票报价中，航空公司通常以出票时的汇率为依据确定航空税金额。如因汇率变化，航空税实际价格高于预收价格，旅游者须补缴差额部分。</dd>
                                        <dd>酒店预订提示</dd>
                                        <dd>1.酒店入住、离店、因故提前退房、延住等事宜须按照相应酒店的规定办理。如提前入住或推迟离店，酒店可能酌情加收一定的费用。 </dd>
                                        <dd>2.酒店通常规定12点以前办理退房手续，下午3点后办理入住手续，少数酒店或特殊假期例外。</dd>
                                        <dd>3.如旅游者变更预订，须按酒店变更预订的相关规定办理。另有定金（或其他）约定的，则需承担定金损失或依约定办理。</dd>
                                        <dd>代办签证提示</dd>
                                        <dd>1.旅行社代办签证收取的费用中包含签证费和旅行社服务费。</dd>
                                        <dd>2.旅行社根据使（领）馆的规定书面告知旅游者办理签证所须资料，如使（领）馆的要求发生变更，应及时通知旅游者。</dd>
                                        <dd>3.旅游者应根据通知按期提交相关材料。履行相关手续，并确保各项资料的真实有效。个别使（领）馆可能会致电抽查或要求面谈。</dd>
                                        <dd>4.是否发放签证系有关相关机构之行政权或主权，非旅行社所能控制。如因旅游者提供的材料不真实或自身其它原因不能获取签证，旅行社不承担任何责任，旅游者支付旅行社的签证费和旅行社服务费不予退还。</dd>
                                        <dd>5.一些国家持旅游签证入境时，需要向移民局官员出示酒店预订单、返程机票等，请旅游者注意携带。</dd>
                                        <dd>6.若旅游者须缴纳保证金的，在旅行结束后，凭记载有入境记录的护照和登机牌领回。</dd>
                                        <dt>六、订单生效</dt>
                                        <dd>产品预订成功后，您按期付清穷游网给您确认的应付费用或提供穷游网认可的经济担保时，穷游网给您确认的订单即生效并产生法律效力。</dd>
                                        <dd>如您未按要求及时付清相关费用，而此时穷游网为您预留的产品的价格、内容或标准等发生变化，穷游网对此将不承担任何责任。</dd>
                                        <dd>订单生效，即代表您与穷游网的合作意向已经达成，您的变更、解除旅游产品等的需求，将受到本协议第七条、第八条等相关条款的约束。</dd>
                                        <dt>七、您主动更改已生效订单</dt>
                                        <dd>订单生效后，您若需要更改该订单内的任何项目，请务必在旅游产品行程开始前向穷游网告知您的更改需求，我们会尽量满足您的需求，但您必须全额承担因变更带来的损失及可能增加的费用。若您所预订的产品在目的地停留的日期部分或全部处在国家法定节假日或处在国际性、国家性、地方性重大节日期间，鉴于资源的特殊状况，已生效订单不可进行任何更改。</dd>
                                        <dt>八、您主动解除已生效订单</dt>
                                        <dd>订单生效后，若要主动解除已生效订单，您必须在旅游产品行程开始前向穷游网通知您需要解除的订单，包括但不限于放弃整张订单的全部内容、减少出行人数等。我们会帮您立即取消。但您必须承担处理该订单已经支出的一切费用。包括但不限于护照成本手续费、实际签证费、订房损失费、国际国内机票及其它车船交通费用等。具体规则如下：</dd>
                                        <dd>1.送签证后取消（一般是收到护照后的下一个工作日送签），收取全部签证费用。</dd>
                                        <dd>2.机票一经开出如退票或签转，您将根据航空公司的规定，承担相应的退票或更改损失。</dd>
                                        <dd>3.车船票一经开出如退票，您须承担相应的退票或更改损失。</dd>
                                        <dd>4.您预订的酒店需在入住前取消，如在产品订单中有特别规定的，您需根据约定承担相应的酒店预订损失。如您取消预订或行程有变化，请尽早通知，以避免不必要的损失。</dd>
                                        <dd>5.产品订单中约定违约金的情况，您还需按约定承担相应的违约金。</dd>
                                        <dd>每一项自由行产品变更和解除已生效订单若有更具体规则的请见您预订产品中的细则规定。</dd>
                                        <dt>九、因穷游网原因取消您的已生效订单</dt>
                                        <dd>在您按要求付清所有旅游产品费用后，如因穷游网原因，致使您的旅游产品不能成行而取消的，穷游网应当立即通知您，除无条件退返您已支付的所有费用外，还应按如下标准支付违约金，但不涉及其他赔偿：</dd>
                                        <dd>1.在旅游产品行程开始的72小时前通知客人（不包含双休日及法定假日），除退还客人该旅游产品费用以外，另外支付给客人该旅游产品费用的10%作为违约金。</dd>
                                        <dd>2.在旅游产品行程开始的72小时至24小时之间通知客人的（不包含双休日及法定假日），除退还客人该旅游产品费用以外，另外支付给客人该旅游产品费用的30%作为违约金。</dd>
                                        <dd>3.在旅游产品行程开始前的24小时内或旅游产品行程开始后通知或未通知退订的（不包含双休日及法定假日），除退还客人该旅游产品费用以外，另外支付给客人该旅游产品费用100%作为违约金。</dd>
                                        <dd>4.以上为目的地服务产品（包括签证，租车，城市玩乐）的赔偿标准，自由行和机票类产品穷游有独立的赔付体系，<a href="http://z.qyer.com/regulation?ptype=1016" target="_blank">点击查看</a>。由于某些产品有一定的特殊性，旅行社解除合同的扣除费用条款可能发生变更，如与上述条款发生冲突时，以产品中的“退款政策”和“预定流程”为准。</dd>
                                        <dt>十、旅游者的权利和义务</dt>
                                        <dd>1.您应确保出行人身体条件适合本次外出旅游度假，如出行人为60岁以上的   老年人、孕妇或有心脏病、高血压、呼吸系统疾病等病史，请在征得医院专业医生和家属同意后出行。您应当根据自己的身体情况选择旅游，如系个人身体原因而影响目的地行程的，您需要自行承担责任和医疗费用，已发生费用不退还，未发生费用旅行社需与产品实际供应商协商，根据实际情况决定，但旅行社不做任何承诺，若无法退款的，您需自行承担全部损失。如果您自身原因延期出发或变更线路，您须要支付已经发生的费用和损失后在重新计算旅游费用。</dd>
                                        <dd>2.您应当在预订和购买旅行产品中提供身份、健康等方面的真实信息，如实填写有关资料，履行合法手续。</dd>
                                        <dd>3.您保证提供给穷游网的证件、通讯联络方式、配送地址等相关资料均真实有效。若因您提供的上述信息有误导致影响行程的，责任由您自行承担。</dd>
                                        <dd>4.度假期间，您应尊重当地的宗教信仰、民族习惯和风土人情，自觉保护当地自然环境。</dd>
                                        <dd>5.您应遵守本协议。您必须通过穷游网预订并通过穷游网界面支付全部旅游款。如果您需要退款，请在穷游网工作人员协助下根据相关规则进行退款。</dd>
                                        <dd>6.您在旅游过程中如对旅游产品质量有异议，应积极与穷游网沟通协调解决。</dd>
                                        <dd>7.您有权自愿选择和购买旅游人身意外保险及其他保险。在自由行过程中您自愿参加的一切活动项目，请充分了解活动的内容并严格遵守活动项目的安全规定，建议您主动购买相关保险，穷游网对您在此过程中发生的意外不承担任何责任。</dd>
                                        <dd>8.您可以选择通过穷游网投诉电话进行投诉。为了保护您的权利，穷游网将对您与穷游网电话通话的全过程进行录音，并保存为证据，必要时用来维护双方的合法权益。</dd>
                                        <dt>十一、穷游网的权利和义务</dt>
                                        <dd>1.穷游网代理您办理当地游所需的手续，应妥善保管您的各项证件，如有遗失或毁损，应立即主动补办，并承担补办手续费，因此导致您的直接损失，穷游网应承担赔偿责任。</dd>
                                        <dd>2.穷游网有权收取您预订和购买旅游产品应支付的费用。</dd>
                                        <dd>3.为了保证您预订和购买的产品顺利确认，穷游网有权获得您的个人必要信息。</dd>
                                        <dd>4.穷游网应当对旅游者的个人资料信息保密，妥善保管旅游者提交的各种证件，并向旅游者推荐人身意外保险及其他保险。</dd>
                                        <dd>5.如您不遵守本协议或《产品预定须知》的规定，恶意干扰穷游网旅游平台的正常运营，恶意预订、更改或退订旅游产品，或者恶意向第三方机构投诉穷游网，穷游网将诉诸法律，追究您的侵权责任。</dd>
                                        <dt>十二、关于旅行社责任保险</dt>
                                        <dd>旅行社责任险是对因旅行社责任引起的游客人身伤亡、财产遭受的损失及由此发生的相关费用的赔偿，对于游客，在实际发生意外时，“责任险”保障的主要是旅行社对游客出游期间依法应承担的各种民事赔偿责任，而这种责任由法院或相关仲裁机构裁决。这意味着意外发生后，旅行社是不包揽一切的，它只承担自己的责任。由于游客自身原因或其他方原因导致的损害由游客自行负责，旅行社只提供道义上的协助。为了获得更为全面的保障，我们强烈建议游客出游时根据个人意愿和需要自行投保如人身意外保险等的个人险种。</dd>
                                        <dt>十三、 违约责任</dt>
                                        <dd>旅游者</dd>
                                        <dd>1.因违约、自身过错、在目的地自由活动期间内的行为或自身疾病引起的人身、财产损失应当自行承担；由此给穷游网造成损失的，应当承担赔偿责任。</dd>
                                        <dd>2.如果您未能按照合同约定及时参加旅游项目或未能及时搭乘交通工具、入住酒店的，视为您自愿放弃。如果您在行程中单方面要求解除协议或自愿放弃某项旅游项目的，旅行社不予退还相应旅游费用。</dd>
                                        <dd>穷游网</dd>
                                        <dd>1.在代办旅游手续或行程中，因未尽妥善保管义务而遗失、毁损旅游者证件、手续的，或代办的手续因穷游网过错存在瑕疵的，穷游网应当积极协助旅游者补办相关手续，并承担补办手续所需直接发生的费用及其他应当支付的合理费用。</dd>
                                        <dd>2.未按照合同约定提供旅游产品或提供旅游产品不符合约定的，应当积极采取措施予以补救；未采取补救措施、未能补救或旅游者不同意补救措施的，应当承担相应的赔偿责任。</dd>
                                        <dt>十四 不可抗力和意外事件</dt>
                                        <dd>1.不可抗力是指不能预见、不能避免并不能克服的客观情况，包括因自然原因和社会原因引起的事件，如自然灾害、战争、罢工、骚乱、重大传染病疫情、政府行为等。意外事件指因双方故意或过失以外的偶然因素而发生的，如影响旅游行程的列车和航班等公共交通工具的延误或取消、恶劣天气变化、交通堵塞、盗抢等事件。因不可抗力导致不能履行或不能继续履行已生效订单约定内容的，双方均不承担违约责任，但法律另有规定的除外。因意外事件导致不能履行或不能继续履行已生效订单约定内容的，遭遇意外事件的一方不能因此免责，但另一方可根据实际情况决定是否给予道义帮助。</dd>
                                        <dt>十五 争议的解决</dt>
                                        <dd>在您的预订生效后，如果在本须知或订单约定内容履行过程中，您对相关事宜的履行发生异议，且沟通未果的前提下，您同意按照中华人民共和国相关法律法规的规定来解决争议，并同意接受北京市东城区人民法院的管辖以诉讼的方式解决争议。</dd>
                                        <dt>十六 其它</dt>
                                        <dd>1、网上预订只适用于中国大陆地区的公民。</dd>
                                        <dd>2、本须知未尽事宜，在穷游网确认给您的订单中另行约定。</dd>
                                        <dd>3、本合同为网上在线签约合同，电子合同签约有效。</dd>
                                    </dl>


                                    <h2>重要说明：此产品提供方为爱自游，此协议等同于您与该旅行社签订了旅游合同，穷游网做为平台方仅负责监管并承担平台相关责任。</h2>
                                    <p>自由行旅游产品代订服务合同<br/>
                                        （出境）</p>
                                    <p>甲方：（委托人）___________________；</p>
                                    <p>乙方：（旅行社）___________________；经营许可证编号：______________</p>
                                    <p>经营范围：___________________</p>

                                    <p>委托人阅读本合同条款及有关附件后网上签署同意的，旅行社视为委托人已全部接受，且双方于网上已签订电子合同。该电子合同具有和书面合同同等的法律效力。委托人签订合同并成功提交产品订单，支付款项后，视为合同生效。</p>
                                    <p>根据《中华人民共和国合同法》及有关法律法规的规定，甲乙双方在平等、自愿、协商一致的基础上，就下列委托事项达成如下协议：</p>
                                    <dl>
                                        <dt>第一条　词语定义</dt>
                                        <dd>1.自由行代订服务，指穷游网作为获取并提供旅游产品的平台，为旅游者（即甲方委托人）推荐全方位、个性化的旅游产品，但产品的实际提供方、具体行程安排以及合同签订者都是旅游产品的实际供应商（即乙方旅行社）。穷游网并非旅游产品交易的参与者，对前述交易穷游网仅提供网络平台的技术支持，并对旅游产品供应商行为的合法性、有效性及旅游产品发布信息的真实性、合法性及有效性作监督。</dd>
                                        <dd>2.委托人投保的个人旅游保险，指委托人自行购买或者通过旅行社、航空机票代理点、景区等保险代理机构购买的以旅行期间自身的生命、身体、财产或者相关利益为保险标的的短期保险，包括但不限于航空意外险、旅游意外险、紧急救援保险、特殊项目保险等。</dd>
                                        <dd>3.业务损失费，指旅行社因委托人行前解除合同而产生的经济损失。包括乘坐飞机（车、船）等交通工具的费用（含预订金）、饭店住宿费用（含预订金）、旅游观光汽车的人均车租、景点门票损失费等已发生的实际费用。</dd>
                                        <dd>4.自由行旅游产品，以“交通＋酒店＋个性化可选服务”为核心，在旅行社提供的范围内，委托人可自由选择往返时间、交通、酒店及其他可选配的附加服务，无导游随行，由委托人自行安排行程的旅游产品。</dd>
                                        <dd>5.自由组合航班旅游产品，指去程和回程的航班可以在旅行社所提供的全部航班中任意搭配选择，由于使用旅行社提供的特别组合航班，一经变更或取消会产生实际损失。</dd>
                                        <dd>6.节假日，包括但不限于，春节，国庆节，劳动节，元旦等法定节假日或其它国家性或者地方性的重大节日期间如圣诞节等，节假日的具体时段以国家颁布的为准。凡委托人预订的产品部分或全部涉及节假日的，都属于节假日产品，适用关于节假日产品预定购买的特殊规定。</dd>
                                        <dt>第二条　委托范围</dt>
                                        <dd>委托项目包括但不限于甲方委托乙方办理以下一项或几项服务，旅行社按委托人选择的组合内容代为预订，并接受委托人以总价支付：</dd>
                                        <dd>代订机票、酒店；代办个人旅游签证；代办目的地地面资源服务（例如用车、门票、N日游等）；抵离接送机等。</dd>
                                        <dt>第三条　委托项目和费用</dt>
                                        <dd>1.代订项目和费用：详见产品确认单。</dd>
                                        <dd>2.航空公司燃油涨价或是临时调价而导致的航线价格上涨，对于已成功付款，不再向委托人收取涨价费用；对于还未付款的订单，委托人同意按照涨价后的价格进行支付。</dd>
                                        <dd>3.产品预订成功后，委托人在规定时间内付清应付代订服务费用，经旅行社最终确认后视为合同生效。</dd>
                                        <dd>4.委托人未在规定时间内付清应付费用，订单视为失效，如需要继续预定，委托人需要重新在规定时间内完成付款，且价格应以变更后的产品为准。</dd>
                                        <dt>第四条　甲方权利和义务</dt>
                                        <dd>1.甲方应自觉遵守旅游文明行为规范，尊重目的地的风俗习惯、文化传统和宗教禁忌，爱护旅游资源，保护生态环境；</dd>
                                        <dd>2.甲方应遵守我国和目的地国家（地区）的法律法规和有关规定，不携带违禁物品出入境，按时归国并按要求参加面试和面试销签、提交销签材料，如甲方违反该条规定，甲方自愿承担乙方因此产生的全部损失，同时，如甲方提交担保金的，乙方有权根据情况扣除部分或全部担保金，如甲方提交担保函的，乙方有权按照担保函中的担保金额向甲方和甲方担保人索赔。</dd>
                                        <dd>3.甲方应特别注意目的地的法律法规及风俗禁忌，并应根据自身情况和身体条件慎重选择骑马、攀岩、滑翔、漂流、潜水、游泳、跳伞、热气球、蹦极等高风险或带有危险性的产品；</dd>
                                        <dd>4.甲方应在自己能够控制风险的范围内选择活动项目，并对自己的安全负责；</dd>
                                        <dd>5.甲方应当确保所提供的证件、资料及联系电话真实有效，因甲方提供材料存在问题或者自身其他原因被拒签、缓签、拒绝入境和出境的，相关责任和费用由甲方承担，如给乙方造成损失的，甲方还应当承担赔偿责任；</dd>
                                        <dd>6.甲方向乙方提交的因私护照或者通行证有效期在半年以上，自办签证/签注者应当确保所持签证/签注在出游期间有效；</dd>
                                        <dd>7.甲方应按约定向乙方全额支付所有代订项目的服务总费用；</dd>
                                        <dd>8.甲方应自行保管好随身携带的财物，非因乙方原因导致甲方财物发生丢失的，乙方不负责赔偿；</dd>
                                        <dd>9.发生意外事件或纠纷时，甲方应本着平等协商的原则解决，采取适当措施防止损失扩大，否则应当就扩大的损失承担责任；</dd>
                                        <dd>10.在合法权益受到损害要求协助索赔时，甲方应提供合法有效的凭据；</dd>
                                        <dd>11.节假日产品，鉴于资源的特殊状况，甲方未经乙方同意不得取消或更改。节假日产品甲方预定付款后，取消、更改的，所产生费用全部由甲方承担；</dd>
                                        <dd>12.甲方因自身原因致使人身、财产权益受到损害的，乙方不承担赔偿责任，若因此造成乙方损失的，还应向乙方赔偿。</dd>
                                        <dt>第五条　乙方权利和义务</dt>
                                        <dd>1.乙方有权根据委托人的身体健康状况及相关条件决定是否接纳报名；</dd>
                                        <dd>2.乙方有权拒绝委托人提出的超出合同约定的不合理要求；</dd>
                                        <dd>3.乙方应告知委托人抵达目的地的具体接洽事宜；</dd>
                                        <dd>4.乙方按照约定的内容和标准为委托人提供服务；</dd>
                                        <dd>5.乙方有权收取代订服务和产品的相关费用。</dd>
                                        <dt>第六条　违约责任</dt>
                                        <dd>1.甲方违约责任</dd>
                                        <dd>甲方在出发前提出解除合同的，如预订产品时已对业务损失费用做过特别约定的，从其约定；如未做约定的，应当按下列标准向乙方支付业务损失费，下述时间的计算不包括双休日及法定节假日：</dd>
                                        <dd>若原订单中房间数在4间以下（含4间），</dd>
                                        <dd>（1）出发前7日（不含第7日），按旅游费用总额20%；</dd>
                                        <dd>（2）出发前7日至3日，按旅游费用总额80%；</dd>
                                        <dd>（3）出发前3日（不含第3日）至出发当日，按旅游费用总额100%；</dd>
                                        <dd>若原订单中房间数达5间以上（含5间），</dd>
                                        <dd>（4）出发前7日（不含第7日），按旅游费用总额80%；</dd>
                                        <dd>（5）出发前7日至出发当日，按旅游费用总额100%；</dd>
                                        <dd>如甲方预订的是自由组合航班的旅游产品，航班部分甲方应当按实际损失对乙方予以赔偿，除航班以外的费用按照业务损失费收取，具体业务损失费以第六条第1点为准。</dd>
                                        <dd>多项代订项目中的一项，鉴于资源的特殊性，若更改或取消时，会产生额外损失，此类特定资源的退变更条款以产品中的“预订限制”为准。</dd>
                                        <dd>乙方送签后，甲方取消签证产品的（一般是收到所需材料后的下一个工作日送签），乙方有权收取全部签证/签注费用并要求甲方注销签证/签注，甲方拒绝注销的，应赔偿因此给乙方造成的全部损失。</dd>
                                        <dd>2.　乙方违约责任</dd>
                                        <dd>乙方在出发前提出解除合同的，向甲方全额退还旅游费用，并赔偿甲方损失费用。如预订产品时已对损失费用做过特别约定的，从其约定；如未做约定的，按下列标准向甲方赔偿损失费用，下述时间的计算不包括双休日及法定节假日：</dd>
                                        <dd>（1）出发前7天至14天，按订单费用总额30%；</dd>
                                        <dd>（2）出发前2日至6日，按订单费用总额50%；</dd>
                                        <dd>（3）出发前1天至出发当日，按订单费用总额100%；</dd>
                                        <dt>第七条　合同的变更</dt>
                                        <dd>1.合同生效后，甲方要求更改的，应选择同一出发地和目的地并仍在可售卖日期内的产品；或经乙方同意，甲方可以将其在合同中的权利义务转让给符合出游条件的第三人。但甲方应向旅行社支付由此增加的服务费用，因此给乙方造成的损失也由甲方承担。</dd>
                                        <dd>2.合同生效后，因乙方原因引起的更改，由此增加的服务费用由乙方承担。</dd>
                                        <dt>第八条　不可抗力和意外事件</dt>
                                        <dd>不可抗力，指不能预见、不能避免并不能克服的客观情况，包括但不限于因自然原因和社会原因引起的，如自然灾害、战争、恐怖活动、动乱、骚乱、罢工、突发公共卫生事件、政府行为、黑客攻击、电信部门技术管制。</dd>
                                        <dd>意外事件，指因当事人故意或者过失以外的偶然因素引发的事件，包括但不限于重大礼宾活动导致的交通堵塞、列车航班晚点、景点临时不开放、旅客财物被盗抢等。因不可抗力导致无法履行或者继续履行合同的，双方均可以解除合同，合同解除后，乙方退还甲方未实际发生的费用后不再承担其他任何责任；双方同意变更合同的，因此增加的费用由甲方承担，减少的费用乙方退还甲方。</dd>
                                        <dd>因意外事件导致无法继续履行合同的，损失由各方自行承担，但另一方应配合协调帮助。</dd>
                                        <dt>第九条　第三方责任</dt>
                                        <dd>由于出入境管理局、各国领馆、航空公司、保险公司、及其他有权机构等不可归责于乙方的原因导致委托人人身、财产权益受到损害的，包括但不限于，航班延误或取消、护照延期、签证拒签或未按时出签、不得出入境等，应由甲方自行协商解决，乙方除在力所能及的范围内予以协助外，不再承担其他责任，如给乙方造成损失的，乙方保留一切追偿权。</dd>
                                        <dt>第十条　争议解决</dt>
                                        <dd>本合同履行过程中发生争议，由双方协商解决，协商不成的，任何一方有权依法向原告住所地人民法院起诉。</dd>
                                        <dt>第十一条　特别提示</dt>
                                        <dd>1.旅客信息，委托人应最晚在离出发时间72小时之前向旅行社提供正确的旅客信息，包括证件类型、证件号码、证件有效期、出生日期、性别、国籍等，并应保证上述信息的真实性。</dd>
                                        <dd>2.婴儿，旅游者携带婴儿出行的，需自行购买婴儿机票及办理婴儿签证等，如旅行社可以协助的，需额外收取该部分费用。</dd>
                                        <dd>3.酒店入住，通常酒店对入住客人会有年龄的要求，例如，同订单中至少要有一位入住客人已满十八周岁。实际入住和离店时间以入住的酒店为准，如客人提前入住或推迟离店，均须酌情加收一定的费用。</dd>
                                        <dd>4.付款，为保证产品的成功预订，委托人应在产品确认后24小时之内付款。如委托人未按要求及时付清相关费用，而此时旅行社预留的产品的价格、内容或标准等发生变化，旅行社对此将不承担任何责任。</dd>
                                        <dd>5.明折明扣机票。由于您选择了明折明扣机票，因网上数据更新有一定的延时，您所选定的航班、舱位和价格我们会根据民航订座系统的订位数据订位并最晚在订单最晚回复时间前由操作人员给您回复确认。</dd>
                                        <dd>6.时差，产品行程单和确认单上提及的到达时间和起飞时间均为所在国或地区的当地时间，委托人应合理注意旅游目的国和国内的时差。</dd>
                                        <dd>7.委托人年龄，委托人系18周岁以下（不包括18周岁）或 70岁以上（包括70岁）参加旅游,应有亲属同意，非单人出行。</dd>
                                        <dd>8.安全提示，委托人参加高原地区旅游或风险旅游项目（包括但不限于：游泳、浮潜、冲浪、漂流等水上活动以及骑马、攀岩、登山等高风险的活动）或患有不宜出行旅游的病情（包括但 不限于：恶性肿瘤、心血管病、高血压、呼吸系统疾病、癫痫、怀孕、精神疾病、身体残疾、糖尿病、传染性疾病、慢性疾病健康受损），须在报名前自行前往医疗机构体检后，确保自身身体条件能够完成本次旅游活动，并向旅行社提供体检报告副本；委托人须保证提供的身体健康状况真实，如隐瞒由本人承担全部责任；委托人系 70岁以上（含70岁）参加旅游，应有亲属同意，且非单人出行，同时在出行前如实填写并提交《身体健康申报表》；旅行社已经给予委托人出游安全提示（旅行社已经提示并劝阻，但如委托人仍坚持参加旅游活动，由此造成任何人身意外及不良后果将由委托人本人全部承担）。</dd>
                                        <dt>第十二条</dt>
                                        <dd>本协议已对与旅游者权益有或可能有重大关系的条款用粗体字标注提示旅游者注意，请旅游者仔细阅读。一经旅游者确认，则视为您实际使用本服务前，您已充分阅读理解并接受本合同的全部内容。</dd>
                                    </dl>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
        </form>
    </div>

</div>

<div class="zw-wrapper">
    <ul class="zw-order-introduction clearfix">
        <li class="item garantee">
            <h2 class="title">专业保证</h2>
            <p class="text">我们收集自由行者的真实诉求，也找寻全世界最独特的旅行目的地，让更多的穷游er轻松出行</p>
        </li>
        <li class="item multicheck">
            <h2 class="title">多重审核</h2>
            <p class="text">对旅游产品供应商严格筛选，资质认证层层把关，为自由行者精挑细选最值得信赖的旅行产品</p>
        </li>
        <li class="item attendance">
            <h2 class="title">安心陪护</h2>
            <p class="text">对所有自由行者的购买进行跟踪服务以及质量监控，有效投诉先行赔付，出现任何问题负责到底</p>
        </li>
    </ul>
</div>

<!-- 公共尾部 -->

<!-- 公共尾部 end -->
<div class="wrapper" id="the_login" style="display: none">
    <div class="section">
        <div class="qui-login-section section-register">
            <div class="qui-login-form">
                    <div class="qui-login-input input-control input-control-register-mail">
                        <input type="text" class="ui3_input field_valid"  id="email" title="邮箱"  disabled="disabled">

                    </div>
                    <div class="qui-login-input input-control input-control-register-mail">
                        <input type="text" class="ui3_input field_valid input_check_code fl"   id="mail_code" title="邮箱验证码"  placeholder="输入邮件中的验证码">
                        <input type="button" value="获取验证码" class="ui_button button_code fr" id="code">


                    </div>
                    <div class="qui-login-input">
                        <input type="password" class="ui3_input field_valid" id="pwd"  title="密码"  placeholder="输入4-12位密码，需包含字母及数字">
                    </div>
                    <div class="qui-login-input qui-login-btn">
                        <input type="button"  class="ui_button btn_submit" value="确认"  id="butt">
                        <div class="message-box">
                            <span class="fl">
                                已有穷游账号？ <a class="link-login" href="login/login" data-bn-ipg="web-register-page-login">登录</a>
                            </span>
                            <span class="fr">
                                同意<a href="http://www.qyer.com/htmlpages/member.html" target="_blank" data-bn-ipg="web-register-page-clause">会员条款</a>和
                                <a href="http://www.qyer.com/htmlpages/exemption.html" target="_blank" data-bn-ipg="web-register-page-statement">免责声明</a>
                            </span>
                        </div>
                    </div>
            </div>
            <div class="section-message-box"></div>
        </div>
    </div>
</div>

<input type="hidden" id="pack" value="aaa" >
@include('index.public.foot')
</body>
</html>

<script>
    $(function(){
        $('#form_id').validationEngine();
    });
</script>




