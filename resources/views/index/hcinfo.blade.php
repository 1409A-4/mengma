<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html class="" xmlns="http://www.w3.org/1999/xhtml">
<head>

    <title>自由行</title>

    <base href="{{URL::asset('/')}}"/>
    @include('index.public.style')


</head>
<body>
@include('.index.public.header')

<div class="lmMain">
    <div class="grand-title clearfix">
        <h1 style="visibility: visible;" class="title-text fontYaHei">{{$data['p_abstract']}}</h1>
        <p class="normal-price">
            <span class="former-price">¥3299</span>
            <span class="after-price"><em>{{ $data['p_price'] }}</em>元起</span>
        </p>
    </div>
    <!-- 表单  -->
    <form id="lastminuteorderform" name="lastminuteorderform" action="packagePro" method="POST" str="0">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" name="p_id" value="{{ $data['p_id'] }}">
        <div class="top-section clearfix">
            <div class="left-tuwen">
                <div class="gallery">

                    <span class="product-id">产品编号79807</span>


                    <div style="display: none;" class="not-start">
                        <p class="not-ico"></p>
                        <p class="not-time timer"></p>
                        <p class="not-text"><span class="hg lhg"></span>开始抢购<span class="hg rhg"></span></p>
                    </div>
                    <div class="scroll-unit">
                        <div data-canslide="false" class="img-scroll clearfix">
                            <div class="scroll-cell"><img src="{{ $data['p_img'] }}"></div>
                        </div>
                    </div>
                </div>
                <div class="gallery-bottom clearfix">
                    <p class="desc"><span class="desc-inner">67556</span> 次浏览</p>
                    <p class="desc"><span class="desc-inner">199</span> 件已售</p>
                </div>

                <div class="green-tip">
                    <span class="dh left-dh">“</span>
                    <div class="tip-list">
                        <p>直飞航班：上海直飞长白山，一站直达，省去转机时间以及旅途劳累<br>
                            避暑仙境：长白山夏季气温21度，感受纯净与清凉<br>
                            夏季礼包：水乐园+征西滑道+天池西景区接送</p>
                    </div>
                    <span class="dh right-dh">”</span>
                    <span class="trangle"></span>
                </div>
                <div class="recommend">
                    <p class="recomm-text fontYaHei"><i class="qui-icon-sun recomm-icon"></i> 亮点推荐<span class="light"></span><a class="more" href="javascript:void(0);">查看更多</a></p>
                </div>
                <ul class="tools clearfix">
                    <li class="sc" data-id="79807" data-bn-ipg="lm-detail-collect"><span class="qui-icon-heart"></span> 收藏</li>
                    <li class="fx">
                        <span class="qui-icon-share"></span>
                        <span>分享</span>
                        <div class="share-wrap size24 qui-iconShares">
                            <span class="trangle"></span>
                            <a class="tsina" data-title="我在@穷游折扣 发现了一条超值特价，【899元起 【中秋/国庆】上海直飞长白山4天3晚自由行(赠接送机+4-5星酒店可选)】点这里预订&gt;&gt; " data-summary="" data-url="http://z.qyer.com/deal/79807/?campaign=web_share&amp;category=lm_read_detail#jtss-tsina" data-pic="http://pic.qyer.com/lastminute/deal/share/2016/07/01/14673622212126" data-bn-ipg="lm-detail-share-sina "></a>
                            <a class="weixin" data-title="我在@穷游折扣 发现了一条超值特价，【899元起 【中秋/国庆】上海直飞长白山4天3晚自由行(赠接送机+4-5星酒店可选)】点这里预订&gt;&gt; " data-summary="" data-url="http://m.qyer.com/z/deal/79807/campaign=web_share&amp;category=lm_read_detail#jtss-tsina" data-pic="http://pic.qyer.com/lastminute/deal/share/2016/07/01/14673622212126" data-bn-ipg="lm-detail-share-weixin"></a>
                        </div>
                    </li>
                    <li class="tx"><span class="qui-icon-edit"></span> 填写信息 一键秒杀</li>
                </ul>
            </div>            <div class="right-operate">
                <div class="content-wrap">
                    <div class="content-unit product-option">
                        <h4 class="unit-title">产品类型</h4>
                        <div class="unit-nr">
                            <input type="hidden" name="p_type" id="p_type">
                            <ul class="type-list clearfix" data-orheight="144">
                                @foreach($type as $ty)
                                    <li class="first cli" data-pid="219425" data-type="{{ $ty['pt_id'] }}" data-bn-ipg="lm-detail-type-219425" >
                                        <p title="四星宜必思尚品（晚航班）" >{{ $ty['pt_name'] }}（<span>{{ $ty['pt_price'] }}</span>元）</p>
                                    </li>
                                @endforeach

                            </ul>

                        </div>
                    </div>


                    <div class="content-unit lm-calendar">
                        <h4 class="unit-title">出发日期
                            <span class="title-desc"><input id="d422" name="go_time" class="Wdate" type="text" onfocus="WdatePicker({minDate:'%y-%M-{%d+1}'})"/> </span>

                        </h4>
                        <div>
                            <p></p>
                        </div>

                    </div>
                    <div class="content-unit person-number">
                        <h4 class="unit-title">购买数量</h4>
                        <div class="unit-nr">
                            <ul class="person-list clearfix">
                                <li>
                                    <p class="num-p">
                                        <span class="mun-text">人数</span>
                                        <a class="num-btn minus" data-bn-ipg="lm-paydetail-adult-increase"
                                           href="javascript:void(0);" id="min">
                                            <span class="qui-icon-minus-reverse"></span>
                                        </a>
                                        <input data-tiptype="stock" id="nump" class="num-input" value="1"
                                               data-min="" data-max="" type="text" name="nump">
                                        <a class="num-btn add" data-bn-ipg="lm-paydetail-adult-decrease" href="javascript:void(0);">
                                            <span class="qui-icon-plus-reverse" id="max"></span>
                                        </a>
                                    </p>
                                </li>
                                <li style="display: list-item;">
                                    <p class="num-p">
                                        <span class="mun-text">房间</span>
                                        <a class="num-btn minus" href="javascript:void(0);" id="rin">
                                            <span class="qui-icon-minus-reverse"></span>
                                        </a>
                                        <input data-tiptype="stock" id="numr" class="num-input" value="1" data-min="2" data-max="3" type="text" name="numr">
                                        <a class="num-btn add disable" href="javascript:void(0);" id="rax">
                                            <span class="qui-icon-plus-reverse"></span>
                                        </a>
                                    </p>
                                </li>
                                <span class="num-tip" style="left: 189.5px; display: none;" id="tp">
                                    <i class="qui-icon-tip-info-reverse"></i>不能大于出行人数</span>
                                 <span class="num-tip" style="left: 189.5px; display: none;" id="tip">
                                     <i class="qui-icon-tip-info-reverse"></i>已到最小值</span>
                            </ul>
                        </div>
                    </div>

                    <div class="booking-unit">
                        <div class="notice-unit">
                            <i class="qui-icon-tip-info-reverse notice-ico"></i>
                            <span class="notice-text">请注意：多程机票需按行程顺序完全使用，往返程机票无法单独使用回程</span>
                            <span class="qui-icon-close-reverse notice-close"></span>
                        </div>

                        <div class="book-cell enable clearfix">

                            <div class="price-unit">
                                <span class="price">¥<em class="fontYaHei" id="all"></em></span>
                                <div class="room-offset" style="display: inline;" id="dis">
                                    <span >含<em class="single-room-offset" id="room">300</em>元单房差</span>
                                    <a class="qui-icon-tip-info-reverse offset-btn" href="javascript:void(0);">
                                        <div class="offset-tip">
                                            <span class="qui-icon-housediff bad"></span>
                                            <p class="offset-tip-text">自由行产品以2人入住1间房为价格核算标准，如出现单人购买入住1间房，需补交1人房差。</p>
                                            <span class="trangle"></span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                                <input  class="book-btn book-now fontYaHei enable buttt" data-bn-ipg="lm-detail-booking-main" value="立即预订" type="button" id="butt">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <div class="detail-content-wrap">
        <div class="detail-nav-wrap " id="cc">
            <div class="detail-nav clearfix">
                <ul class="nav-unit clearfix">
                    <li class="li-0 fontYaHei " p-id="1">
                        产品简介
                        <span class="trangle"></span>
                    </li>
                    <li class="li-0 fontYaHei" p-id="2">
                        费用说明
                        <span class="trangle" ></span>
                    </li>
                    <li class="li-0 fontYaHei" p-id="3">
                        产品详情
                        <span class="trangle"></span>
                    </li>
                    <li class="li-0 fontYaHei" p-id="4">
                        预订流程
                        <span class="trangle"></span>
                    </li>
                    <li class="li-0 fontYaHei" p-id="5">
                        退款政策
                        <span class="trangle"></span>
                    </li>
                    <li class="li-0 fontYaHei " p-id="6">
                        行程提示
                        <span class="trangle"></span>
                    </li>
                    <li class="li-0 fontYaHei " p-id="7">
                        其他说明
                        <span class="trangle"></span>
                    </li>
                    <li class="li-0 fontYaHei " p-id="8">
                        咨询
                        <span class="trangle"></span>
                    </li>
                </ul>
                <div class="nav-right" style="display: none;">
                    <span class="nav-price">¥<em id="sum">0</em></span>

                        <input class="nav-book fontYaHei canbook buttt" type="button" value="立即预订" data-bn-ipg="lm-detail-booking-bar" id="butt">


                </div>
            </div>
        </div>

        <!-- 详情具体内容 start -->
        <div class="detail-wrap clearfix">
            <div class="left-list">
                <div class="detail-unit" id="1">
                    <h4 class="unit-title cpjs fontYaHei"><i class="tit-text">产品简介</i></h4>
                    <div class="detail-cell">
                        <div class="sub-content">
                            <p class="no-ico font14"><span class="p-title">出发地：</span><span class="p-cont">上海</span></p>
                            <p class="no-ico font14"><span class="p-title">目的地：</span><span class="p-cont">长白山/<a href="http://place.qyer.com/china/" target="_blank">中国</a></span></p>
                            <p class="no-ico font14"><span class="p-title">交通信息：</span><span class="p-cont">飞机去/飞机回</span></p>
                            <p class="no-ico font14"><span class="p-title">旅行时间：</span><span class="p-cont">2016年07月04日至2016年12月03日</span></p>
                            <p class="no-ico font14"><span class="p-title">供应商家：</span><span class="p-cont">
                                                    <a href="http://z.qyer.com/sup/5/" data-bn-ipg="lm-detail-supplier-name" target="_blank">上海春秋</a>
                        </span>
                            </p>
                            <p class="no-ico font14"><a class="nr-qjd-entrance" href="http://z.qyer.com/sup/5/"><i class="qui-icon-shop-settled-reverse entrance-ico"></i><em class="entrance-text">进入商家店铺</em></a></p>
                        </div>
                    </div>
                    <div class="detail-cell">
                    </div>
                    <!--折扣君-->
                    <div class="detail-cell">
                        <h5 class="sub-title zkjzld" id="zkjzld" name="zkjzld">折扣君找亮点</h5>
                        <div class="sub-content">
                            <div class="zkjzld-cont">
                                <span class="trangle"></span>
                                <ul>
                                    <li>直飞航班：上海直飞长白山，一站直达，省去转机时间以及旅途劳累<br>
                                        避暑仙境：长白山夏季气温21度，感受纯净与清凉<br>
                                        夏季礼包：水乐园+征西滑道+天池西景区接送</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="detail-cell">

                    </div>

                </div>
                <div class="detail-unit" id="2">
                    <h4 class="unit-title fysm fontYaHei"><i class="tit-text">费用说明</i></h4>
                    <div class="detail-cell">
                        <div class="sub-content">
        <span style="color: red;">
        <strong>请注意：多程机票需严格按行程顺序使用，如任意一段未使用则后续航段均无法使用。</strong>
        </span>
                        </div>
                    </div>
                    <div class="detail-cell">
                        <div class="detail-cell">
                            <h5 class="sub-title zyts">价格包含</h5>
                            <div class="sub-content">
                                <p>1、<span style="color: #636363;">上</span><span style="color: green;"><span style="color: #636363;">海直飞长白山4天往返含税机票；</span></span></p><p>2、<span style="color:#636363">含3晚住宿，酒店含双早</span><span style="color:#636363"></span></p><p><strong>3、<span style="color: #636363;">赠送夏季大礼包，详见“赠送项目”</span><span style="color: #636363;"></span></strong></p><p><strong><span style="color: #636363;">4、赠送长白山大剧院演出门票，详见“赠送项目”</span></strong></p><p><span style="color: #636363;">4、航班免费行李额手提+托运共10Kg。手提不超过7公斤且尺寸不超过20厘米×30厘米×40厘米；婴儿无免费行李额</span></p><p><span style="color: red;"></span></p><p>备注：</p><p>①手机端点击<strong><span style="color: green;">“立即预定”</span></strong>，即可查看价格和库存信息；</p><p>②长白山4-5天往返机票产品：<a href="http://z.qyer.com/deal/76323/" _src="http://z.qyer.com/deal/76323/">http://z.qyer.com/deal/76323/</a></p><p>③<strong><span style="color: orange;">+350换购上海迪士尼乐园门票</span></strong>：<a href="http://z.qyer.com/deal/83879" _src="http://z.qyer.com/deal/83879">http://z.qyer.com/deal/83879</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="detail-cell">
                        <div class="detail-cell">
                            <h5 class="sub-title zyts">价格不含</h5>
                            <div class="sub-content">
                                <p><span style="color: #636363;">1、以上“费用包含”中未包含的项目费用。&nbsp;<br>2、其它私人消费。&nbsp;</span></p><p><span style="color: #636363;">3、此产品酒店为两人入住一间价格，单人入住需补单房差。</span></p><p><span style="color: #636363;">4、不含旅游意外保险。</span></p><p><span style="color: #636363;">5、因交通延阻、罢工、大风、大雾、航班取消或更改时间等不可抗力原因所引致的额外费用。</span></p><p><br></p>
                            </div>
                        </div>
                    </div>
                    <div class="detail-cell">
                        <div class="detail-cell">
                            <h5 class="sub-title zyts">赠送项目</h5>
                            <div class="sub-content">
                                <p><strong><span style="color: green;">赠送夏季大礼包，入住酒店不同，礼包略有不同，如下：</span></strong></p><p><strong>①长白山机场至酒店往返接送机服务</strong><br>温馨提示：机场出口处有举“长白山万达度假区”牌子的工作人员引导上车，因接送机是由万达集团提供的免费机场巴士，根据航班情况滚动发车，若因自己原因未能乘坐机场巴士，我社不退任何费用，敬请谅解。<br><strong>②宜必思酒店：娱乐项目与巴士服务（简称:夏季娱乐大礼包）</strong><br>礼遇1：酒店每间夜含2人度假区征西滑道体验（每天1次体验，共3次，请合理安排时间）<br>礼遇2：酒店每间夜含2人天池西景区的往返巴士接送服务（每人指定时间接送往返1次,西景区门票及环保车票需自理，需提前1天于酒店前台预定）<br></p><p><span style="color: #636363;"><strong>③假日度假酒店：娱乐项目与巴士服务（简称:夏季娱乐大礼包）</strong></span></p><p>礼遇1：酒店每间夜含2人度假区山地缆车观光。<br>礼遇2：酒店每间夜含2人度假区限时自行车骑行（4小时/次，可循环租赁。具体骑行时间以当天度假区公布为准）<br>礼遇3：酒店每间夜含2人天池西景区的往返巴士接送服务（每人指定时间接送往返1次,西景区门票及环保车票需自理）<br>礼遇4：酒店每间夜含2人高尔夫练习场限时体验（具体击球规则和时间以球场当天公布为准）<br></p><p><strong>④智选假日酒店：娱乐项目与巴士服务（简称：夏季娱乐大礼包）</strong></p><p>入住此酒店，夏季娱乐大礼包，包含第③项的礼遇1、礼遇2、礼遇3项服务；</p><p><strong>⑤长白山万达水乐园</strong></p><p>酒店每间夜含2人度假区水乐园门票（8月1日起班期，包含此项目）</p><p><strong>⑥长白山大剧院</strong></p><p>免费赠送每人1张长白山大剧院演出门票（2-12周岁儿童也享受赠送）。</p><p>取票方式：提预订时提供的，第一位出行人的证件后六位，在长白山度假区大剧院取票口取票入场观演。<br>取票时间：13：30—21：00。<br>使用时间：10月11日起不包含此项目<br>演出时间：每晚19：30（周一停演）。<br>演
                                    出内容：《天地长白》以采参人与人参仙女之间的爱情故事为主线，进一步深挖了长白山文化的丰富内涵，开创性地将人参文化、森林文化、冰雪文化、神话文化、
                                    民俗文化、萨满文化、东北虎文化、杜鹃花文化等融入其中。由吉林省歌舞团和乌克兰异域美女倾情表演，宫殿般的奢华舞美，多类艺术跨界合作，打造全新度假视
                                    听。<br></p><p><strong><span style="color: green;">备注：</span></strong><br></p><p>①通过春秋预定，一间房间可以有一位12周岁以下儿童享受酒店娱乐礼包和水乐园(享受日期与成人一致）<br>②办理方式：办理酒店娱乐大礼包和水乐园门票需在办理入住时一同办理或在各酒店度假服务中心办理<br>③娱乐项目；巴士接送服务；水乐园具体使用规则，开放时间和发车时间以万达度假区各酒店当日公布为准，万达度假区有权视天气等因素改变使用规则，敬请谅解。<br>④大礼包所含项目均为赠送，如放弃，请恕无费用可退；11月1日起（含11月1日当天）由于天气原因，将不赠送；</p><p><br></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="detail-unit" id="3">
                    <h4 class="unit-title cpxq fontYaHei"><i class="tit-text">产品详情</i></h4>
                    <!--交通信息-->
                    <div class="detail-cell">
                        <h5 class="sub-title jtxx">
                            交通信息<span class="subtit-tip"><i class="qui-icon-tip-info-reverse subtit-tip-ico"></i><i class="subtit-tip-text">交通信息，酒店信息为参考信息，最终的交通，酒店信息以供应商确认为准</i></span>
                        </h5>
                        <table class="triffc">
                            <thead>
                            <tr>
                                <th class="th-title">交通1</th>
                                <th colspan="7">周一、二、四、五出发，参考航班（晚航班）</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td class="td-go-back"><em class="triffc-type ">
                                        往</em>
                                </td>
                                <td class="td-days">第1天</td>
                                <td class="triffc-setoff-city">
                                    <p>17:45</p>

                                    <p class="green-text">上海浦东T2</p>
                                </td>
                                <td class="triffc-line"><span class="line-ico"></span></td>
                                <td class="triffc-arrivel-city">
                                    <p>20:30 </p>

                                    <p class="green-text">长白山</p>
                                </td>
                                <td class="triffc-company" colspan="2">
                                    <p>春秋航空 9C8531</p>
                                </td>
                            </tr>
                            <tr>
                                <td class="td-go-back"><em class="triffc-type ">
                                        返</em>
                                </td>
                                <td class="td-days">第4天</td>
                                <td class="triffc-setoff-city">
                                    <p>21:30</p>

                                    <p class="green-text">长白山</p>
                                </td>
                                <td class="triffc-line"><span class="line-ico"></span></td>
                                <td class="triffc-arrivel-city">
                                    <p>00:15 +1</p>

                                    <p class="green-text">上海浦东T2</p>
                                </td>
                                <td class="triffc-company" colspan="2">
                                    <p>春秋航空 9C8532</p>
                                </td>
                            </tr>
                            </tbody>
                            <thead>
                            <tr>
                                <th class="th-title">交通2</th>
                                <th colspan="7">周三出发，参考航班（晚航班）</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td class="td-go-back"><em class="triffc-type ">
                                        往</em>
                                </td>
                                <td class="td-days">第1天</td>
                                <td class="triffc-setoff-city">
                                    <p>16:55</p>

                                    <p class="green-text">上海浦东T2</p>
                                </td>
                                <td class="triffc-line"><span class="line-ico"></span></td>
                                <td class="triffc-arrivel-city">
                                    <p>19:35 </p>

                                    <p class="green-text">长白山</p>
                                </td>
                                <td class="triffc-company" colspan="2">
                                    <p>春秋航空 9C8531</p>
                                </td>
                            </tr>
                            <tr>
                                <td class="td-go-back"><em class="triffc-type ">
                                        返</em>
                                </td>
                                <td class="td-days">第4天</td>
                                <td class="triffc-setoff-city">
                                    <p>23:00</p>

                                    <p class="green-text">长白山</p>
                                </td>
                                <td class="triffc-line"><span class="line-ico"></span></td>
                                <td class="triffc-arrivel-city">
                                    <p>01:50 +1</p>

                                    <p class="green-text">上海浦东T2</p>
                                </td>
                                <td class="triffc-company" colspan="2">
                                    <p>春秋航空 9C8532</p>
                                </td>
                            </tr>
                            </tbody>
                            <thead>
                            <tr>
                                <th class="th-title">交通3</th>
                                <th colspan="7">周六出发，参考航班（晚航班）</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td class="td-go-back"><em class="triffc-type ">
                                        往</em>
                                </td>
                                <td class="td-days">第1天</td>
                                <td class="triffc-setoff-city">
                                    <p>19:15</p>

                                    <p class="green-text">上海浦东T2</p>
                                </td>
                                <td class="triffc-line"><span class="line-ico"></span></td>
                                <td class="triffc-arrivel-city">
                                    <p>22:00 </p>

                                    <p class="green-text">长白山</p>
                                </td>
                                <td class="triffc-company" colspan="2">
                                    <p>春秋航空 9C8531</p>
                                </td>
                            </tr>
                            <tr>
                                <td class="td-go-back"><em class="triffc-type ">
                                        返</em>
                                </td>
                                <td class="td-days">第4天</td>
                                <td class="triffc-setoff-city">
                                    <p>22:00</p>

                                    <p class="green-text">长白山</p>
                                </td>
                                <td class="triffc-line"><span class="line-ico"></span></td>
                                <td class="triffc-arrivel-city">
                                    <p>00:50 +1</p>

                                    <p class="green-text">上海浦东T2</p>
                                </td>
                                <td class="triffc-company" colspan="2">
                                    <p>春秋航空 9C8532</p>
                                </td>
                            </tr>
                            </tbody>
                            <thead>
                            <tr>
                                <th class="th-title">交通4</th>
                                <th colspan="7">周日出发，参考航班（晚航班）</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td class="td-go-back"><em class="triffc-type ">
                                        往</em>
                                </td>
                                <td class="td-days">第1天</td>
                                <td class="triffc-setoff-city">
                                    <p>16:55</p>

                                    <p class="green-text">上海浦东T2</p>
                                </td>
                                <td class="triffc-line"><span class="line-ico"></span></td>
                                <td class="triffc-arrivel-city">
                                    <p>19:35 </p>

                                    <p class="green-text">长白山</p>
                                </td>
                                <td class="triffc-company" colspan="2">
                                    <p>春秋航空 9C8531</p>
                                </td>
                            </tr>
                            <tr>
                                <td class="td-go-back"><em class="triffc-type ">
                                        返</em>
                                </td>
                                <td class="td-days">第4天</td>
                                <td class="triffc-setoff-city">
                                    <p>21:30</p>

                                    <p class="green-text">长白山</p>
                                </td>
                                <td class="triffc-line"><span class="line-ico"></span></td>
                                <td class="triffc-arrivel-city">
                                    <p>00:15 +1</p>

                                    <p class="green-text">上海浦东T2</p>
                                </td>
                                <td class="triffc-company" colspan="2">
                                    <p>春秋航空 9C8532</p>
                                </td>
                            </tr>
                            </tbody>
                            <thead>
                            <tr>
                                <th class="th-title">交通5</th>
                                <th colspan="7">10月30日起出发，参考航班（早航班）</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td class="td-go-back"><em class="triffc-type ">
                                        往</em>
                                </td>
                                <td class="td-days">第1天</td>
                                <td class="triffc-setoff-city">
                                    <p>06:50</p>

                                    <p class="green-text">上海浦东T2</p>
                                </td>
                                <td class="triffc-line"><span class="line-ico"></span></td>
                                <td class="triffc-arrivel-city">
                                    <p>09:30 </p>

                                    <p class="green-text">长白山</p>
                                </td>
                                <td class="triffc-company" colspan="2">
                                    <p>春秋航空 9C8531</p>
                                </td>
                            </tr>
                            <tr>
                                <td class="td-go-back"><em class="triffc-type ">
                                        返</em>
                                </td>
                                <td class="td-days">第4天</td>
                                <td class="triffc-setoff-city">
                                    <p>12:00</p>

                                    <p class="green-text">长白山</p>
                                </td>
                                <td class="triffc-line"><span class="line-ico"></span></td>
                                <td class="triffc-arrivel-city">
                                    <p>14:40 </p>

                                    <p class="green-text">上海浦东T2</p>
                                </td>
                                <td class="triffc-company" colspan="2">
                                    <p>春秋航空 9C8532</p>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <!--交通信息end-->
                    <!--酒店信息-->
                    <div class="detail-cell">
                        <h5 class="sub-title jdxx">酒店信息</h5>
                        <div class="jd-unit clearfix ">
                            <h6 class="jd-tit">酒店1</h6>

                            <div class="jd-unit-cont">
                                <div class="jd-cell-top">
                                    <p class="jd-name">长白山万达宜必思尚品酒店<span class="js-en-name">Ibis Styles ChangBaiShan Wanda</span><span class="star-wrap">
                                                <em class="qui-icon-star-reverse star"></em>
                                                <em class="qui-icon-star-reverse star"></em>
                                                <em class="qui-icon-star-reverse star"></em>
                                                <em class="qui-icon-star-reverse star"></em>
                                            </span>
                                    </p>

                                    <p class="mt10">白山市</p>

                                    <p>地址：抚松县长白山国际度假区白云路85号</p>

                                    <p class="mt10">
                                        <span class="spanUnit"><em>入住晚数：</em>3晚</span>
                                        <span class="spanUnit"><em>床型：</em>双床</span>
                                        <span class="spanUnit"><em>房型：</em>双人间&nbsp;</span>
                                    </p>
                                </div>
                                <div class="jd-cell-bottom">
                                    <p>长白山万达宜必思尚品酒店地处吉林省长白山国际度假区中心地带，距离长白山机场仅12公里，并提供免费机
                                        场穿梭巴士。距长白山著名旅游景区仅20公里，距长春310公里。长白山机场拥有长春、北京、上海、武汉、大连及广州等多条主要城市航线。新建的“营抚”
                                        高速使您往返长春，吉林和沈阳等主要城市更加方便快捷。</p>
                                </div>
                            </div>
                        </div>
                        <div class="jd-unit clearfix mt20">
                            <h6 class="jd-tit">酒店2</h6>

                            <div class="jd-unit-cont">
                                <div class="jd-cell-top">
                                    <p class="jd-name">长白山万达假日度假酒店<span class="js-en-name">Holiday Inn Resort Changbaishan</span><span class="star-wrap">
                                                <em class="qui-icon-star-reverse star"></em>
                                                <em class="qui-icon-star-reverse star"></em>
                                                <em class="qui-icon-star-reverse star"></em>
                                                <em class="qui-icon-star-reverse star"></em>
                                                <em class="qui-icon-star-reverse star"></em>
                                            </span>
                                        <span class="jd-same-level-tip">或同级别酒店</span>
                                    </p>

                                    <p class="mt10">长白山</p>

                                    <p>地址：抚松县抚松县长白山国际度假区白云路455号</p>

                                    <p class="mt10">
                                        <span class="spanUnit"><em>入住晚数：</em>3晚</span>
                                        <span class="spanUnit"><em>床型：</em>大/双床</span>
                                        <span class="spanUnit"><em>房型：</em>双人间&nbsp;</span>
                                    </p>
                                </div>
                                <div class="jd-cell-bottom">
                                    <p>长白山万达假日度假酒店位于长白山国际旅游度假区的核心地带，是洲际集团中国地区首家度假与全套房相结合的品牌。<br>酒
                                        店会议设施完善，设有专属通道直达总面积近1900平方米的会议区域，面积985平方米挑高9米的无立柱及7个不同规格的多功能厅，同时提供餐饮休闲康乐
                                        设施和多间特色餐厅及酒吧，“吉咖啡”全日制餐厅为您带来盛宴之旅，室内游泳池、水疗、儿童游乐室和健身中心等康体设施是放松身心的首选！</p><p><br></p>
                                </div>
                            </div>
                        </div>
                        <div class="jd-unit clearfix mt20">
                            <h6 class="jd-tit">酒店3</h6>

                            <div class="jd-unit-cont">
                                <div class="jd-cell-top">
                                    <p class="jd-name">长白山万达智选假日酒店<span class="js-en-name">Holiday Inn Express Changbaishan</span><span class="star-wrap">
                                                <em class="qui-icon-star-reverse star"></em>
                                                <em class="qui-icon-star-reverse star"></em>
                                                <em class="qui-icon-star-reverse star"></em>
                                                <em class="qui-icon-star-reverse star"></em>
                                            </span>
                                        <span class="jd-same-level-tip">或同级别酒店</span>
                                    </p>

                                    <p class="mt10">长白山</p>

                                    <p>地址：长白山国际度假区白云路87号</p>

                                    <p class="mt10">
                                        <span class="spanUnit"><em>入住晚数：</em>3晚</span>
                                        <span class="spanUnit"><em>床型：</em>大/双床</span>
                                        <span class="spanUnit"><em>房型：</em>双人间&nbsp;</span>
                                    </p>
                                </div>
                                <div class="jd-cell-bottom">
                                    <p>长白山万达智选假日酒店位于吉林省长白山国际度假区内。作为大中华地区最大的智选假日酒店，秉承“始终智
                                        选”的品牌理念：为旅客提供免费早餐和上网服务，舒适宜人的客房及极具特色的淋浴体验。体现出智选假日酒店的独特魅力。酒店由两座欧式建筑群组成，设有迷
                                        你超市，雪具存放库，自助商务中心和洗衣服务等设施一应俱全。酒店拥有400平方米的多功能厅，可以满足各中小规模的会议需求。此外，度假区内还提供滑
                                        雪、温泉、高尔夫和登山等丰富的山地度假活动，为您开启舒适、便捷、精彩的假日之旅。</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--酒店信息end-->
                </div>
                <div class="detail-unit" id="4">
                    <h4 class="unit-title ydlc fontYaHei"><i class="tit-text">预订流程</i></h4>
                    <div class="detail-cell">
                        <div class="sub-content">
                            <p><img style="width:100%;height:auto;" class="yd-pic" src="info_files/img_prebook.jpg"></p>
                        </div>
                    </div>
                </div>
                <div class="detail-unit" id="5">
                    <h4 class="unit-title tjxc fontYaHei"><i class="tit-text">退款政策</i></h4>
                    <div class="detail-cell">
                        <div class="sub-content">
                            <p></p><p><span style="color: green;"><strong>本产品为限时特卖产品，一经售出，不退不换，敬请谅解！</strong></span></p><p></p>
                            <p>最世界自由行有独立于商家的质控体系，任何商家违约，用户都会获得合理赔偿，<a href="http://z.qyer.com/regulation?ptype=1018" target="_blank">详情请查看</a></p>
                        </div>
                    </div>
                </div>
                <div class="detail-unit" id="6">
                    <h4 class="unit-title xcts fontYaHei"><i class="tit-text">行程提示</i></h4>
                    <div class="detail-cell">
                        <h5 class="sub-title zyts">出行提示</h5>
                        <div class="sub-content setBigImgViewModule">
                            <p style="white-space: normal;">1、以上为针对大陆客人的特别价格，外籍以及港澳台人士报名请同商家联系。</p><p>2、儿童2-12周岁（不含12周岁），可拍不占床价，儿童占床与成人同价，12岁及以上儿童必须占床；</p><p>3、本产品不接受18周岁有以下儿童单独预订，请谅解。</p><p>4、本产品为旅游团队优惠机票，合同一经签订或网上订单全额付款者，即为出票，不签转、不更改、不退票。<br></p><p>5、在游客在付款结束后的1个工作日内，商家会通过邮件和短信发给游客确认订单信息。</p><p><span style="color: green;"><strong>6、因国内航班时刻变动情况，建议用户在出发前3天，在春秋航空官网或拔打95524查询最终航班时刻。</strong></span></p><p>7、为不耽误你的行程，请你至少在航班起飞前120分钟到达机场，凭借身份证在【春秋航空】柜台领取登机牌并入境安检，以免误机。</p><p>8、如有孕妇或70岁及以上老人出行，请先电话咨询商家客服再下单，否则下单付款后因身体缘由导致无法出行，后果由客人承担。</p><p>9、外籍人士及港澳台人士请根据自己护照所属地区的情况携带有效的出入境相关证件。</p><p>10、如需开发票，请务必在确认协议后的10个工作日内与商家客服邮件联系。所开发票金额以您实际支付的金额为准，不含优惠券或抵用券或积分等金额。</p><p>11、此产品为特价团队机票，往返搭配固定日期及航班，无法延长或缩短行程日期；且往返航班需按顺序使用，如去程不使用回程则无法使用。</p><p>10、以上航班仅为参考航班，具体航班时刻以供应商实际出票为准。</p><p>11、如需购买保险，请至少出发前3个工作日拍下保险，过期将无法为您操作。</p><p>818智选假日：16116 &nbsp;宜必思：23116 &nbsp;假日度假：48192 &nbsp; 智选假日：54545 &nbsp;</p>
                        </div>
                    </div>
                </div>
                <div class="detail-unit" id="7">
                    <h4 class="unit-title qtsm fontYaHei"><i class="tit-text">其他说明</i></h4>
                    <div class="detail-cell">
                        <div class="sub-content">
                            <div class="look-more-unit">
                                <div class="look-more-wrapp" data-maxheight="84">
                                    <div class="look-more-inner">
                                        <p><strong style="color: green;">★</strong><strong style="color: green;">春小秋其他精品行程推荐：</strong><br></p><p>1、【暑期特惠】上海直飞甲米6-7天自由行(可选兰塔岛套餐)</p><p><a href="http://z.qyer.com/deal/58562/" _src="http://z.qyer.com/deal/58562/">http://z.qyer.com/deal/58562/</a></p><p>2、【暑期特惠】上海直飞普吉岛6天4晚自由行(可选五星酒店+豪华池景房)</p><p><a href="http://z.qyer.com/deal/57969/" _src="http://z.qyer.com/deal/57969/">http://z.qyer.com/deal/57969/</a></p><p>3、【暑期特惠】上海直飞沙巴5/6天往返含税机票(赠送电子地图)</p><p><a href="http://z.qyer.com/deal/59851/" _src="http://z.qyer.com/deal/59851/">http://z.qyer.com/deal/59851/</a></p><p>4、更多春秋旗舰店产品<br></p><p><a href="http://z.qyer.com/sup/5/" _src="http://z.qyer.com/sup/5/">http://z.qyer.com/sup/5/</a></p><p><img src="info_files/w1080.jpg"></p><p><br></p>
                                    </div>
                                </div>
                                <div class="look-more-btn-wrap"><a class="look-more-btn" href="javascript:void(0);"><i class="more-btn-ico"></i><span class="more-btn-text">查看全部</span></a></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="detail-unit" id="8">
                    <a name="mod_question"></a>
                    <h4 class="unit-title pl fontYaHei"><i class="tit-text">咨询</i></h4>
                    <div class="detail-cell consultBar">
                        <div id="question_list">
                            <div class="mod_consult">
                                <ul class="mod_consult_list">
                                    <li class="mod_consult_list_item">
                                        <p class="face">
                                            <a href="javascript:void(0);">
                                                <img alt="" src="info_files/middle4.png" height="48" width="48">
                                            </a>
                                        </p>
                                        <p class="name">
                                            <a href="javascript:void(0);">林承</a>
                                            <span class="date">2016-09-04 21:02:17</span>
                                        </p>
                                        <p class="cnt">长白山演出门票找谁联系</p>
                                        <div class="mod_answer_bar">
                                            <p class="anFace">
                                                <a href="http://z.qyer.com/sup/5/">
                                                    <img alt="" src="info_files/48x48.jpg" height="48" width="48">
                                                </a>
                                            </p>
                                            <p class="anName">
                                                <a href="http://z.qyer.com/sup/5/">
                                                    上海春秋</a>
                                                <i class="anName-ico">商家</i>
                                                <span class="anDate">2016-09-05 10:10:11</span>
                                            </p>
                                            <p class="anCnt">您好~在产品页面赠送项目一栏有详细的说明哦~
                                                取票方式：提预订时提供的，第一位出行人的证件后六位，在长白山度假区大剧院取票口取票入场观演。</p>
                                        </div>
                                    </li>
                                    <li class="mod_consult_list_item">
                                        <p class="face">
                                            <a href="javascript:void(0);">
                                                <img alt="" src="info_files/middle6.png" height="48" width="48">
                                            </a>
                                        </p>
                                        <p class="name">
                                            <a href="javascript:void(0);">Annalo</a>
                                            <span class="date">2016-08-25 11:05:51</span>
                                        </p>
                                        <p class="cnt">活动截止时间是什么时候？</p>
                                        <div class="mod_answer_bar">
                                            <p class="anFace">
                                                <a href="http://z.qyer.com/sup/5/">
                                                    <img alt="" src="info_files/48x48.jpg" height="48" width="48">
                                                </a>
                                            </p>
                                            <p class="anName">
                                                <a href="http://z.qyer.com/sup/5/">
                                                    上海春秋</a>
                                                <i class="anName-ico">商家</i>
                                                <span class="anDate">2016-08-26 09:56:45</span>
                                            </p>
                                            <p class="anCnt">您好：长白山秒杀已经结束，但部分优惠券等还可使用，整个818大促活动将于今晚12点结束，谢谢！</p>
                                        </div>
                                    </li>
                                    <li class="mod_consult_list_item">
                                        <p class="face">
                                            <a href="javascript:void(0);">
                                                <img alt="" src="info_files/middle2.png" height="48" width="48">
                                            </a>
                                        </p>
                                        <p class="name">
                                            <a href="javascript:void(0);">user_2254fC0t</a>
                                            <span class="date">2016-08-22 23:25:52</span>
                                        </p>
                                        <p class="cnt">五星的那个是什么酒店</p>
                                        <div class="mod_answer_bar">
                                            <p class="anFace">
                                                <a href="http://z.qyer.com/sup/5/">
                                                    <img alt="" src="info_files/48x48.jpg" height="48" width="48">
                                                </a>
                                            </p>
                                            <p class="anName">
                                                <a href="http://z.qyer.com/sup/5/">
                                                    上海春秋</a>
                                                <i class="anName-ico">商家</i>
                                                <span class="anDate">2016-08-23 11:35:35</span>
                                            </p>
                                            <p class="anCnt">您好：该套餐所含五星酒店为长白山万达假日度假酒店，如果该酒店无房我们将提供其他同级酒店。谢谢！</p>
                                        </div>
                                    </li>
                                    <li class="mod_consult_list_item">
                                        <p class="face">
                                            <a href="javascript:void(0);">
                                                <img alt="" src="info_files/120.jpg" height="48" width="48">
                                            </a>
                                        </p>
                                        <p class="name">
                                            <a href="javascript:void(0);">习惯_是琥珀</a>
                                            <span class="date">2016-08-22 08:47:03</span>
                                        </p>
                                        <p class="cnt">你好，请问什么日期出发有早航班</p>
                                        <div class="mod_answer_bar">
                                            <p class="anFace">
                                                <a href="http://z.qyer.com/sup/5/">
                                                    <img alt="" src="info_files/48x48.jpg" height="48" width="48">
                                                </a>
                                            </p>
                                            <p class="anName">
                                                <a href="http://z.qyer.com/sup/5/">
                                                    上海春秋</a>
                                                <i class="anName-ico">商家</i>
                                                <span class="anDate">2016-08-22 11:56:50</span>
                                            </p>
                                            <p class="anCnt">您好：早航班已售罄，目前班期就只有晚航班了，谢谢！</p>
                                        </div>
                                    </li>
                                    <li class="mod_consult_list_item">
                                        <p class="face">
                                            <a href="javascript:void(0);">
                                                <img alt="" src="info_files/middle1.png" height="48" width="48">
                                            </a>
                                        </p>
                                        <p class="name">
                                            <a href="javascript:void(0);">user_plWJIrRHh2</a>
                                            <span class="date">2016-08-19 16:46:09</span>
                                        </p>
                                        <p class="cnt">我已下单成功，现需买保险，你们提供的链接试过了，但找不到买保险的界面，怎么办</p>
                                        <div class="mod_answer_bar">
                                            <p class="anFace">
                                                <a href="http://z.qyer.com/sup/5/">
                                                    <img alt="" src="info_files/48x48.jpg" height="48" width="48">
                                                </a>
                                            </p>
                                            <p class="anName">
                                                <a href="http://z.qyer.com/sup/5/">
                                                    上海春秋</a>
                                                <i class="anName-ico">商家</i>
                                                <span class="anDate">2016-08-22 10:28:47</span>
                                            </p>
                                            <p class="anCnt">您好，保险标签已设置，您现在直接进入产品页面在产品类型中选择保险标签拍下来就行啦，谢谢！</p>
                                        </div>
                                    </li>
                                </ul>
                            </div>

                            <div class="mt30 clearfix pageBar">
                                <div class="ui_page"><a data-bn-ipg="pages-3" data-ra_arg="ra_null|1" href="javascript:question_page(1)" class="ui_page_item ui_page_item_current">1</a>
                                    <a data-bn-ipg="pages-3" data-ra_arg="ra_null|2" href="javascript:question_page(2)" class="ui_page_item">2</a>
                                    <a data-bn-ipg="pages-3" data-ra_arg="ra_null|3" href="javascript:question_page(3)" class="ui_page_item">3</a>
                                    <a data-bn-ipg="pages-5" data-ra_arg="ra_null|2" href="javascript:question_page(2)" class="ui_page_item ui_page_next" title="下一页">下一页</a>
                                </div>
                            </div>
                        </div>
                        <div class="mod_talk_edit mt30">
                            <p class="mod_talk_edit_face"><a href="http://www.qyer.com/u/0"><img alt="" src="info_files/middle6.png" height="80" width="80"></a></p>
                            <div class="mod_talk_edit_cnt">

                                <p class="arrow"></p>
                                <p class="arrow2"></p>
                                <div id="textarea" class="qui-textArea" data-width="536" data-height="80" style="">
                                    <textarea style="width: 536px; height: 80px;" placeholder="说说你的疑问" class="ui2_textarea"></textarea>
                                    <div class="tips">
                                        <span class="current">0</span>/<span class="max">140</span>
                                    </div>
                                </div>
                                <div class="btm clearfix">
                                    <div style="display:none;" id="textarea-tip" class="ui2_error_layer">
                                        <p class="ui2_error_layer_arrow"></p>
                                        <p class="ui2_error_layer_arrow2"></p>
                                        <p class="ui2_error_layer_text">至少写够10个字，最多不超过140字</p>
                                    </div>
                                    <p class="fr"><input id="mod_talk_sub" value="咨询" class="ui_buttonB" type="button"></p>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="detail-unit merchant-deal-record">
                    <h4 class="unit-title fontYaHei"><i class="tit-text">商家成交记录 <span class="record-count">(<span class="record-count-num">2000+</span>)</span></i></h4>
                    <div class="detail-cell" style="margin-bottom:20px;">
                        <table class="record-table">
                            <thead>
                            <tr>
                                <th>买家</th>
                                <th class="product-name-th">产品名称</th>
                                <th class="product-type-th">产品类型</th>
                                <th class="product-num-th">数量</th>
                                <th class="product-price-th">成交价格</th>
                                <th>成交时间</th>
                            </tr>
                            </thead>
                            <tbody><tr><td>我*1</td><td><p style="max-height: 4.2em;" class="product-name need-dots">【中秋/国庆假期】上海直飞清迈6天自由行(可选3-5星古城附近酒店)<span style="display: inline;" class="ellipsis-dots">...</span></p></td><td><p class="product-type need-dots">6天4晚三星酒店<span class="ellipsis-dots">...</span></p></td><td>2</td><td>￥3598.00</td><td>2016-09-12<br>14:01:20</td></tr><tr><td>C*6</td><td><p style="max-height: 4.2em;" class="product-name need-dots">【中秋/国庆】上海直飞曼谷6/7天往返含税机票(可选含1晚五星酒店)<span style="display: inline;" class="ellipsis-dots">...</span></p></td><td><p class="product-type need-dots">【特惠】6天往返含税机票<span class="ellipsis-dots">...</span></p></td><td>2</td><td>￥1600.00</td><td>2016-09-12<br>13:31:48</td></tr><tr><td>陆*噜</td><td><p style="max-height: 4.2em;" class="product-name need-dots">【元旦/春节假期】上海直飞首尔4-5天自由行(赠接送机,可选3-4星优质酒店)<span style="display: inline;" class="ellipsis-dots">...</span></p></td><td><p class="product-type need-dots">5天4晚（四星酒店）<span class="ellipsis-dots">...</span></p></td><td>2</td><td>￥4998.00</td><td>2016-09-12<br>13:25:06</td></tr><tr><td>梓*o</td><td><p style="max-height: 4.2em;" class="product-name need-dots">上海直飞北海道札幌/旭川+茨城 4-8天往返含税机票(可选WiFi套餐,可升级酒店住宿)<span style="display: inline;" class="ellipsis-dots">...</span></p></td><td><p class="product-type need-dots">【札幌一地】5天往返机票+WiFi<span class="ellipsis-dots">...</span></p></td><td>2</td><td>￥2798.00</td><td>2016-09-12<br>12:33:50</td></tr><tr><td>e*9</td><td><p class="product-name need-dots">【限时特惠】上海直飞甲米6-7天往返含税机票<span class="ellipsis-dots">...</span></p></td><td><p class="product-type need-dots">7天往返含税机票<span class="ellipsis-dots">...</span></p></td><td>2</td><td>￥4598.00</td><td>2016-09-12<br>11:56:41</td></tr></tbody>
                        </table>
                        <div class="mt20 clearfix record-table-pager" data-id="79807" data-total-count="50"><div class="ui_page"><a href="javascript:;" class="ui_page_item ui_page_item_current" data-idx="1" data-bn-ipg="">1</a><a href="javascript:;" class="ui_page_item" data-idx="2" data-bn-ipg="">2</a><a href="javascript:;" class="ui_page_item" data-idx="3" data-bn-ipg="">3</a><a href="javascript:;" class="ui_page_item" data-idx="4" data-bn-ipg="">4</a><a href="javascript:;" class="ui_page_item" data-idx="5" data-bn-ipg="">5</a><a href="javascript:;" class="ui_page_item" data-idx="10" data-bn-ipg="">...10</a><a href="javascript:;" data-idx="next" class="ui_page_item ui_page_next" data-bn-ipg="">下一页</a></div></div>
                    </div>
                </div>
            </div>

            <div class="right-merchant">
                <!--侧边开始-->
                <div class="lmSideCell gysj">
                    <h4 class="side-title fontYaHei">供应商家</h4>
                    <div class="cell-cont">
                        <div class="sj-top-wrap">
                            <div class="sj-top">
                                <div class="img-box"><img src="info_files/14165585022035"></div>
                                <div class="text-box">
                                    <p class="text-tit">
                                        上海春秋
                                    </p>
                                    <p class="ico-box">
                                        <span title="入住商家" class="qui-icon-shop-settled-reverse css-ico ruzhu"></span>
                                        <span title="认证商家" class="qui-icon-shop-auth-reverse css-ico renzheng"></span>
                                    </p>
                                </div>
                            </div>
                            <a class="qjd-entrance" data-bn-ipg="lm-detail-supplier-button" href="http://z.qyer.com/sup/5/">进入商家店铺<i class="btn-arrow">&gt;</i></a>
                        </div>
                        <div class="sj-phone">
                            <h4 class="phone-tit"><i class="qui-icon-tel ico"></i><span class="tit-text">客服电话</span></h4>
                            <ul class="phone-list">
                                <li>4008206222</li>
                            </ul>


                            <p class="phone-day">
                                周一至周五 9:00-18:00
                            </p>

                            <h4 class="qqserve-tit"><span class="ico qui-icon-QQ"></span><span class="tit-text">在线QQ客服</span></h4>
                            <p class="qqserve-btns"><a href="http://wpa.qq.com/msgrd?v=3&amp;uin=2881122403&amp;site=zqyer&amp;menu=yes" target="_blank" class="qqserve-btn">上海春秋客服</a></p>
                            <p class="phone-day">
                                周一至周五 9:00-18:00
                            </p>

                        </div>


                    </div>
                </div>


                <div class="lmSideCell xgsp">
                    <h4 class="side-title fontYaHei">专属推荐</h4>
                    <div class="cell-cont">
                        <ul class="cell-list">
                            <li class="clearfix">
                                <div class="pic"><a href="http://z.qyer.com/deal/57377/?strategy=baseline_relatedz" target="_blank" data-bn-ipg="lm-detail-recommen-about-img" data-ra_arg="5218dac8348e86aaea3b5e79739c38419ccbcf3e"><img src="info_files/210x140_012.jpg"></a></div>
                                <div class="wenzi">
                                    <p class="wtop"><a data-bn-ipg="lm-detail-recommen-about-title" href="http://z.qyer.com/deal/57377/?strategy=baseline_relatedz" target="_blank" data-ra_arg="5218dac8348e86aaea3b5e79739c38419ccbcf3e">全国多地直飞三亚5-6天自由行(五星酒店7选1,多重优惠)</a></p>
                                    <p class="wbot"><em>1769</em>元起</p>
                                </div>
                            </li>
                            <li class="clearfix">
                                <div class="pic"><a href="http://z.qyer.com/deal/49531/?strategy=baseline_relatedz" target="_blank" data-bn-ipg="lm-detail-recommen-about-img" data-ra_arg="5218dac8348e86aaea3b5e79739c38419ccbcf3e"><img src="info_files/210x140_011.jpg"></a></div>
                                <div class="wenzi">
                                    <p class="wtop"><a data-bn-ipg="lm-detail-recommen-about-title" href="http://z.qyer.com/deal/49531/?strategy=baseline_relatedz" target="_blank" data-ra_arg="5218dac8348e86aaea3b5e79739c38419ccbcf3e">全国多地直飞台北3-15天往返含税机票(赠1晚酒店)</a></p>
                                    <p class="wbot"><em>1879</em>元起</p>
                                </div>
                            </li>
                            <li class="clearfix">
                                <div class="pic"><a href="http://z.qyer.com/deal/59358/?strategy=baseline_relatedz" target="_blank" data-bn-ipg="lm-detail-recommen-about-img" data-ra_arg="5218dac8348e86aaea3b5e79739c38419ccbcf3e"><img src="info_files/210x140_008.jpg"></a></div>
                                <div class="wenzi">
                                    <p class="wtop"><a data-bn-ipg="lm-detail-recommen-about-title" href="http://z.qyer.com/deal/59358/?strategy=baseline_relatedz" target="_blank" data-ra_arg="5218dac8348e86aaea3b5e79739c38419ccbcf3e">【中秋/国庆假期】上海直飞香港4天3晚自由行(可选3-4星酒店)</a></p>
                                    <p class="wbot"><em>1480</em>元起</p>
                                </div>
                            </li>
                            <li class="clearfix">
                                <div class="pic"><a href="http://z.qyer.com/deal/70529/?strategy=baseline_relatedz" target="_blank" data-bn-ipg="lm-detail-recommen-about-img" data-ra_arg="5218dac8348e86aaea3b5e79739c38419ccbcf3e"><img src="info_files/210x140_011.jpg"></a></div>
                                <div class="wenzi">
                                    <p class="wtop"><a data-bn-ipg="lm-detail-recommen-about-title" href="http://z.qyer.com/deal/70529/?strategy=baseline_relatedz" target="_blank" data-ra_arg="5218dac8348e86aaea3b5e79739c38419ccbcf3e">全国多地直飞台北5天4晚自由行(可选五星酒店,含接送机,赠一日游)</a></p>
                                    <p class="wbot"><em>3228</em>元起</p>
                                </div>
                            </li>
                            <li class="clearfix">
                                <div class="pic"><a href="http://z.qyer.com/deal/62545/?strategy=baseline_relatedz" target="_blank" data-bn-ipg="lm-detail-recommen-about-img" data-ra_arg="5218dac8348e86aaea3b5e79739c38419ccbcf3e"><img src="info_files/210x140_005.jpg"></a></div>
                                <div class="wenzi">
                                    <p class="wtop"><a data-bn-ipg="lm-detail-recommen-about-title" href="http://z.qyer.com/deal/62545/?strategy=baseline_relatedz" target="_blank" data-ra_arg="5218dac8348e86aaea3b5e79739c38419ccbcf3e">香港/北京/上海/广州直飞台北3-14天往返含税机票(赠送1晚酒店)</a></p>
                                    <p class="wbot"><em>1599</em>元起</p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="lmSideCell yzrmzk">
                    <h4 class="side-title fontYaHei">热门商品</h4>
                    <div class="cell-cont">
                        <ul class="cell-list">
                            <li class="clearfix">
                                <div class="pic"><a href="http://z.qyer.com/deal/48504/?strategy=baseline_relatedz" data-ra_arg="5218dac8348e86aaea3b5e79739c38419ccbcf3e" data-bn-ipg="lm-detail-recommen-img-48504" target="_blank"><img src="info_files/210x140_009.jpg"></a></div>
                                <div class="wenzi">
                                    <p class="wtop"><a href="http://z.qyer.com/deal/48504/?strategy=baseline_relatedz" data-ra_arg="5218dac8348e86aaea3b5e79739c38419ccbcf3e" data-bn-ipg="lm-detail-recommen-title-48504" target="_blank">韩国4G无限流量随身Wifi租赁(全国多地机场取还)</a></p>
                                    <p class="wbot"><em>8</em>元起</p>
                                </div>
                            </li>
                            <li class="clearfix">
                                <div class="pic"><a href="http://z.qyer.com/deal/69600/?strategy=baseline_relatedz" data-ra_arg="5218dac8348e86aaea3b5e79739c38419ccbcf3e" data-bn-ipg="lm-detail-recommen-img-69600" target="_blank"><img src="info_files/210x140_010.jpg"></a></div>
                                <div class="wenzi">
                                    <p class="wtop"><a href="http://z.qyer.com/deal/69600/?strategy=baseline_relatedz" data-ra_arg="5218dac8348e86aaea3b5e79739c38419ccbcf3e" data-bn-ipg="lm-detail-recommen-title-69600" target="_blank">欧洲33国4G无限流量wifi租赁(机场/快递取还可选)</a></p>
                                    <p class="wbot"><em>35</em>元起</p>
                                </div>
                            </li>
                            <li class="clearfix">
                                <div class="pic"><a href="http://z.qyer.com/deal/52032/?strategy=baseline_relatedz" data-ra_arg="5218dac8348e86aaea3b5e79739c38419ccbcf3e" data-bn-ipg="lm-detail-recommen-img-52032" target="_blank"><img src="info_files/210x140_007.jpg"></a></div>
                                <div class="wenzi">
                                    <p class="wtop"><a href="http://z.qyer.com/deal/52032/?strategy=baseline_relatedz" data-ra_arg="5218dac8348e86aaea3b5e79739c38419ccbcf3e" data-bn-ipg="lm-detail-recommen-title-52032" target="_blank">【扫码入园】西班牙巴塞罗那巴特罗之家免排队电子票(含中文3D视频导览)</a></p>
                                    <p class="wbot"><em>158</em>元起</p>
                                </div>
                            </li>
                            <li class="clearfix">
                                <div class="pic"><a href="http://z.qyer.com/deal/52033/?strategy=baseline_relatedz" data-ra_arg="5218dac8348e86aaea3b5e79739c38419ccbcf3e" data-bn-ipg="lm-detail-recommen-img-52033" target="_blank"><img src="info_files/210x140_004.jpg"></a></div>
                                <div class="wenzi">
                                    <p class="wtop"><a href="http://z.qyer.com/deal/52033/?strategy=baseline_relatedz" data-ra_arg="5218dac8348e86aaea3b5e79739c38419ccbcf3e" data-bn-ipg="lm-detail-recommen-title-52033" target="_blank">【超长有效期】西班牙巴塞罗那米拉之家免排队门票(含中文语音导览)</a></p>
                                    <p class="wbot"><em>140</em>元起</p>
                                </div>
                            </li>
                            <li class="clearfix">
                                <div class="pic"><a href="http://z.qyer.com/deal/66314/?strategy=baseline_relatedz" data-ra_arg="5218dac8348e86aaea3b5e79739c38419ccbcf3e" data-bn-ipg="lm-detail-recommen-img-66314" target="_blank"><img src="info_files/210x140.jpg"></a></div>
                                <div class="wenzi">
                                    <p class="wtop"><a href="http://z.qyer.com/deal/66314/?strategy=baseline_relatedz" data-ra_arg="5218dac8348e86aaea3b5e79739c38419ccbcf3e" data-bn-ipg="lm-detail-recommen-title-66314" target="_blank">日本4G无限流量随身Wifi租赁（仅限北京、上海、广州、成都自取）</a></p>
                                    <p class="wbot"><em>9</em>元起</p>
                                </div>
                            </li>
                            <li class="clearfix">
                                <div class="pic"><a href="http://z.qyer.com/deal/53382/?strategy=baseline_relatedz" data-ra_arg="5218dac8348e86aaea3b5e79739c38419ccbcf3e" data-bn-ipg="lm-detail-recommen-img-53382" target="_blank"><img src="info_files/210x140_003.jpg"></a></div>
                                <div class="wenzi">
                                    <p class="wtop"><a href="http://z.qyer.com/deal/53382/?strategy=baseline_relatedz" data-ra_arg="5218dac8348e86aaea3b5e79739c38419ccbcf3e" data-bn-ipg="lm-detail-recommen-title-53382" target="_blank">【免排队】西班牙巴塞罗那圣家堂门票 (登塔可选)</a></p>
                                    <p class="wbot"><em>129</em>元起</p>
                                </div>
                            </li>
                            <li class="clearfix">
                                <div class="pic"><a href="http://z.qyer.com/deal/49817/?strategy=baseline_relatedz" data-ra_arg="5218dac8348e86aaea3b5e79739c38419ccbcf3e" data-bn-ipg="lm-detail-recommen-img-49817" target="_blank"><img src="info_files/210x140_002.jpg"></a></div>
                                <div class="wenzi">
                                    <p class="wtop"><a href="http://z.qyer.com/deal/49817/?strategy=baseline_relatedz" data-ra_arg="5218dac8348e86aaea3b5e79739c38419ccbcf3e" data-bn-ipg="lm-detail-recommen-title-49817" target="_blank">【官方授权】日本大阪环球影城入园实体票/电子票(实体包邮)</a></p>
                                    <p class="wbot"><em>480</em>元起</p>
                                </div>
                            </li>
                            <li class="clearfix">
                                <div class="pic"><a href="http://z.qyer.com/deal/64717/?strategy=baseline_relatedz" data-ra_arg="5218dac8348e86aaea3b5e79739c38419ccbcf3e" data-bn-ipg="lm-detail-recommen-img-64717" target="_blank"><img src="info_files/210x140_006.jpg"></a></div>
                                <div class="wenzi">
                                    <p class="wtop"><a href="http://z.qyer.com/deal/64717/?strategy=baseline_relatedz" data-ra_arg="5218dac8348e86aaea3b5e79739c38419ccbcf3e" data-bn-ipg="lm-detail-recommen-title-64717" target="_blank">【万圣节惊魂】日本大阪环球影城快速票</a></p>
                                    <p class="wbot"><em>288</em>元起</p>
                                </div>
                            </li>

                        </ul>
                    </div>
                </div>

                <div class="lmSideCell travel-adviser">
                    <h4 class="side-title fontYaHei">个性化自由行 <span class="gray">— </span><span class="small">为六人以上出游打造</span></h4>
                    <div class="cell-cont consult-list">
                        <div class="item clearfix">
                            <span class="logo qui-icon-weixin"></span>
                            <div class="cont">
                                <div class="tt">微信号(点此扫码)
                                    <div class="img">
                                        <img src="info_files/weixin_freewalk2.jpg">
                                        <p class="label-txt">关注微信</p>
                                    </div>
                                </div>

                                <p class="cc">qyer13683021353</p>
                            </div>
                        </div>
                        <div class="item last clearfix">
                            <span class="logo qui-icon-QQ"></span>
                            <div class="cont">
                                <p class="tt">QQ群</p>
                                <p class="cc">318830574</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="lmSideCell bookzk">
                    <h4 class="side-title fontYaHei">订阅穷游最世界</h4>
                    <div class="cell-cont">
                        <div class="gzzk clearfix">
                            <span class="ico"></span>
                            <p class="at">关注@<a href="http://weibo.com/zuishijie2015" style="color:#636363;text-decoration:none;" target="_blank">穷游最世界</a></p>
                            <span class="guanzhu" data-bn-ipg="lm-detail-follow-sina"><wb:follow-button uid="1889659390" type="red_1" width="62" height="24"></wb:follow-button></span>
                        </div>
                        <div class="sao">
                            <img src="info_files/img_sao.jpg">
                        </div>
                        <div class="ind_emailyd">
                            <form method="post" target="_blank" action="http://user.qyer.com/subscibe.php">
                                <div class="email clearfix">
                                    <span class="email-ico"></span>
                                    <input value="114" name="edmidbox[]" type="hidden">
                                    <input value="lastminute" name="submit_from" type="hidden">
                                    <input value="其他" name="usercity" type="hidden">
                                    <input value="lastminute" name="username" type="hidden">
                                    <input id="bookEmail" class="email-input" name="email" placeholder="输入E-mail" type="text">
                                    <input id="emailSubmit" class="eamil-submit" data-bn-ipg="lm-detail-subscribe" value="订阅" onclick="$(this).parents('form').submit()" type="button">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!--侧边结束-->


            </div>
        </div>
        <!-- 详情具体内容 end -->
    </div>
    </form>
</div>
</body>
@include('index.public.foot')
</html>
<script language="javascript" type="text/javascript" src="My97DatePicker/WdatePicker.js"></script>

<script>
    $(function(){
        //导航栏变化
        $(window).scroll(function(){
            if($(this).scrollTop()>790) {
               $('#cc').addClass("float");
                $('.nav-right').show();

            }else{
                $('#cc').removeClass("float");
                $('.nav-right').hide();
            }
        });

        //回顶部
        $("#ui_gotop").click(function() {
            $("html,body").animate({scrollTop:0}, 500);
        });

        $(".li-0").click(function() {

            var p = $(this).attr('p-id');
            var  hi2 = $("#"+p).offset().top-80;
            $("html,body").animate({scrollTop:hi2}, 500);
            $('.nav-unit').find('.active').removeClass('active');
            $(this).addClass('active');


        });

    });
</script>