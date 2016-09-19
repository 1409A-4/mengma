<!DOCTYPE HTML>
<head>
    <title>自由行</title>
    <base href="<?php echo e(URL::asset('/')); ?>"/>
    <link rel="stylesheet" type="text/css" href="css/hotel_car1.css">
    <script src="js/frame.hotel_car1.js"></script>
    <script src="js/respond.min.js"></script>
    <?php echo $__env->make('index.public.style', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
</head>

<!---start-header---->
<div class="header">
    <div class="wrap">
        <div class="logo">
            <a href="index.html"><img src="index/images/logo.png" title="logo" /></a>
        </div>
        <div class="top-nav">
            <ul>
                <li ><a href="<?php echo e(url('/')); ?>">首页</a></li>
                <li><a href="">机票</a></li>
                <li ><a href="hotel">酒店</a></li>
                <li class="active"><a href="hotelCar">自由行</a></li>
                <?php if(session('name')): ?>
                    <li><a href="<?php echo e(URL('index/center')); ?>" class="nav2" style="text-decoration:none" >用户中心</a></li>
                    <li><a href="<?php echo e(URL('login/loginout')); ?>" class="nav3" style="text-decoration:none">退出</a></li>
                <?php else: ?>
                    <li><a href="<?php echo e(url('login/register')); ?>">注册</a></li>
                    <li><a href="<?php echo e(url('login/login')); ?>">登录</a></li>
                <?php endif; ?>

            </ul>
        </div>
        <div class="clear"> </div>
    </div>
</div>

<head>


    <script>
        window.QYER = {};
        window.QYER.uid = 0;

        window.zw_user_info = {//用户信息
            mail_info:{//设置提醒的邮箱信息
                mail: 0,
                ckemail: ''	},
            remaind_data:{//设置提醒的传送数据
                product_type:null,//产品类型
                start_pos:null,//出发地
                date_str:null,//旅行时间
                country:null	}
        }
    </script>



















    <!--[if lte IE 8]>

    <![endif]-->
</head>

<body class="">




<script>window.QYER={uid:[0][0]||0};</script>






<!--token:d41d8cd98f00b204e9800998ecf8427e-->

<!-- 公共头部 -->

<!-- 公共头部 end -->


<script>
    // console.log('$select_item:', [{"name":"\u4ea7\u54c1\u7c7b\u578b","key":"stype","list":[[{"id":0,"name":"\u5168\u90e8","activity":1,"link":"http:\/\/z.qyer.com\/all_0_0_0_0_158_0_0\/?_channel=freetour&_type=channel"},{"id":146,"name":"\u81ea\u7531\u884c","size":2000,"link":"http:\/\/z.qyer.com\/all_0_0_0_0_158,146_0_0\/?_channel=freetour&_type=channel","activity":0},{"id":145,"name":"\u673a\u7968","size":954,"link":"http:\/\/z.qyer.com\/all_0_0_0_0_158,145_0_0\/?_channel=freetour&_type=channel","activity":0},{"id":157,"name":"\u9152\u5e97","size":717,"link":"http:\/\/z.qyer.com\/all_0_0_0_0_158,157_0_0\/?_channel=freetour&_type=channel","activity":0},{"id":148,"name":"\u90ae\u8f6e","size":194,"link":"http:\/\/z.qyer.com\/all_0_0_0_0_158,148_0_0\/?_channel=freetour&_type=channel","activity":0},{"id":150,"name":"\u4fdd\u9669","size":17,"link":"http:\/\/z.qyer.com\/all_0_0_0_0_158,150_0_0\/?_channel=freetour&_type=channel","activity":0},{"id":144,"name":"\u7279\u8272\u7ebf\u8def","size":3,"link":"http:\/\/z.qyer.com\/all_0_0_0_0_158,144_0_0\/?_channel=freetour&_type=channel","activity":0}]]},{"name":"\u51fa\u53d1\u5730","key":"start_pos","list":[{"0":{"id":0,"name":"\u5168\u90e8","activity":1,"link":"http:\/\/z.qyer.com\/all_0_0_0_0_158_0_0\/?_channel=freetour&_type=channel"},"bjtj":{"name":"\u5317\u4eac\/\u5929\u6d25","activity":0,"link":"http:\/\/z.qyer.com\/all_1_0_0_0_158_0_0\/?_channel=freetour&_type=channel"},"shhz":{"name":"\u4e0a\u6d77\/\u676d\u5dde","activity":0,"link":"http:\/\/z.qyer.com\/all_2_0_0_0_158_0_0\/?_channel=freetour&_type=channel"},"cdcq":{"name":"\u6210\u90fd\/\u91cd\u5e86","activity":0,"link":"http:\/\/z.qyer.com\/all_3_0_0_0_158_0_0\/?_channel=freetour&_type=channel"},"gzsz":{"name":"\u5e7f\u5dde\/\u6df1\u5733","activity":0,"link":"http:\/\/z.qyer.com\/all_4_0_0_0_158_0_0\/?_channel=freetour&_type=channel"},"hmt":{"name":"\u6e2f\u6fb3\u53f0","activity":0,"link":"http:\/\/z.qyer.com\/all_5_0_0_0_158_0_0\/?_channel=freetour&_type=channel"},"inland":{"name":"\u56fd\u5185\u5176\u4ed6","activity":0,"link":"http:\/\/z.qyer.com\/all_6_0_0_0_158_0_0\/?_channel=freetour&_type=channel"},"abroad":{"name":"\u6d77\u5916","activity":0,"link":"http:\/\/z.qyer.com\/all_7_0_0_0_158_0_0\/?_channel=freetour&_type=channel"}}]},{"name":"\u76ee\u7684\u5730","key":"country","list":[[{"id":0,"name":"\u5168\u90e8","activity":1,"link":"http:\/\/z.qyer.com\/all_0_0_0_0_158_0_0\/?_channel=freetour&_type=channel"},{"id":215,"name":"\u6cf0\u56fd","cid":10,"size":700,"link":"http:\/\/z.qyer.com\/all_0_0_215_0_158_0_0\/?_channel=freetour&_type=channel","activity":0},{"id":14,"name":"\u65e5\u672c","cid":10,"size":534,"link":"http:\/\/z.qyer.com\/all_0_0_14_0_158_0_0\/?_channel=freetour&_type=channel","activity":0},{"id":497,"name":"\u9a6c\u5c14\u4ee3\u592b","cid":10,"size":457,"link":"http:\/\/z.qyer.com\/all_0_0_497_0_158_0_0\/?_channel=freetour&_type=channel","activity":0},{"id":233,"name":"\u97e9\u56fd","cid":10,"size":430,"link":"http:\/\/z.qyer.com\/all_0_0_233_0_158_0_0\/?_channel=freetour&_type=channel","activity":0},{"id":11,"name":"\u4e2d\u56fd","cid":10,"size":387,"link":"http:\/\/z.qyer.com\/all_0_0_11_0_158_0_0\/?_channel=freetour&_type=channel","activity":0},{"id":216,"name":"\u8d8a\u5357","cid":10,"size":200,"link":"http:\/\/z.qyer.com\/all_0_0_216_0_158_0_0\/?_channel=freetour&_type=channel","activity":0},{"id":232,"name":"\u65b0\u52a0\u5761","cid":10,"size":193,"link":"http:\/\/z.qyer.com\/all_0_0_232_0_158_0_0\/?_channel=freetour&_type=channel","activity":0},{"id":213,"name":"\u9a6c\u6765\u897f\u4e9a","cid":10,"size":181,"link":"http:\/\/z.qyer.com\/all_0_0_213_0_158_0_0\/?_channel=freetour&_type=channel","activity":0},{"id":570,"name":"\u5370\u5ea6\u5c3c\u897f\u4e9a","cid":10,"size":168,"link":"http:\/\/z.qyer.com\/all_0_0_570_0_158_0_0\/?_channel=freetour&_type=channel","activity":0},{"id":446,"name":"\u83f2\u5f8b\u5bbe","cid":10,"size":126,"link":"http:\/\/z.qyer.com\/all_0_0_446_0_158_0_0\/?_channel=freetour&_type=channel","activity":0},{"id":503,"name":"\u6bdb\u91cc\u6c42\u65af","cid":76,"size":119,"link":"http:\/\/z.qyer.com\/all_0_0_503_0_158_0_0\/?_channel=freetour&_type=channel","activity":0},{"id":236,"name":"\u7f8e\u56fd","cid":234,"size":95,"link":"http:\/\/z.qyer.com\/all_0_0_236_0_158_0_0\/?_channel=freetour&_type=channel","activity":0},{"id":240,"name":"\u6fb3\u5927\u5229\u4e9a","cid":239,"size":94,"link":"http:\/\/z.qyer.com\/all_0_0_240_0_158_0_0\/?_channel=freetour&_type=channel","activity":0},{"id":219,"name":"\u67ec\u57d4\u5be8","cid":10,"size":80,"link":"http:\/\/z.qyer.com\/all_0_0_219_0_158_0_0\/?_channel=freetour&_type=channel","activity":0},{"id":422,"name":"\u5317\u9a6c\u91cc\u4e9a\u7eb3\u7fa4\u5c9b","cid":239,"size":69,"link":"http:\/\/z.qyer.com\/all_0_0_422_0_158_0_0\/?_channel=freetour&_type=channel","activity":0},{"id":522,"name":"\u5e15\u52b3","cid":239,"size":54,"link":"http:\/\/z.qyer.com\/all_0_0_522_0_158_0_0\/?_channel=freetour&_type=channel","activity":0},{"id":402,"name":"\u963f\u8054\u914b","cid":10,"size":52,"link":"http:\/\/z.qyer.com\/all_0_0_402_0_158_0_0\/?_channel=freetour&_type=channel","activity":0},{"id":189,"name":"\u610f\u5927\u5229","cid":12,"size":51,"link":"http:\/\/z.qyer.com\/all_0_0_189_0_158_0_0\/?_channel=freetour&_type=channel","activity":0},{"id":186,"name":"\u6cd5\u56fd","cid":12,"size":50,"link":"http:\/\/z.qyer.com\/all_0_0_186_0_158_0_0\/?_channel=freetour&_type=channel","activity":0},{"id":537,"name":"\u65af\u91cc\u5170\u5361","cid":10,"size":43,"link":"http:\/\/z.qyer.com\/all_0_0_537_0_158_0_0\/?_channel=freetour&_type=channel","activity":0},{"id":531,"name":"\u585e\u820c\u5c14","cid":76,"size":40,"link":"http:\/\/z.qyer.com\/all_0_0_531_0_158_0_0\/?_channel=freetour&_type=channel","activity":0},{"id":182,"name":"\u897f\u73ed\u7259","cid":12,"size":39,"link":"http:\/\/z.qyer.com\/all_0_0_182_0_158_0_0\/?_channel=freetour&_type=channel","activity":0},{"id":206,"name":"\u5e0c\u814a","cid":12,"size":37,"link":"http:\/\/z.qyer.com\/all_0_0_206_0_158_0_0\/?_channel=freetour&_type=channel","activity":0},{"id":208,"name":"\u4fc4\u7f57\u65af","cid":12,"size":37,"link":"http:\/\/z.qyer.com\/all_0_0_208_0_158_0_0\/?_channel=freetour&_type=channel","activity":0},{"id":15,"name":"\u5fb7\u56fd","cid":12,"size":33,"link":"http:\/\/z.qyer.com\/all_0_0_15_0_158_0_0\/?_channel=freetour&_type=channel","activity":0},{"id":1072,"name":"\u5173\u5c9b","cid":239,"size":32,"link":"http:\/\/z.qyer.com\/all_0_0_1072_0_158_0_0\/?_channel=freetour&_type=channel","activity":0},{"id":13,"name":"\u82f1\u56fd","cid":12,"size":31,"link":"http:\/\/z.qyer.com\/all_0_0_13_0_158_0_0\/?_channel=freetour&_type=channel","activity":0},{"id":193,"name":"\u6377\u514b","cid":12,"size":29,"link":"http:\/\/z.qyer.com\/all_0_0_193_0_158_0_0\/?_channel=freetour&_type=channel","activity":0},{"id":238,"name":"\u52a0\u62ff\u5927","cid":234,"size":28,"link":"http:\/\/z.qyer.com\/all_0_0_238_0_158_0_0\/?_channel=freetour&_type=channel","activity":0},{"id":241,"name":"\u65b0\u897f\u5170","cid":239,"size":22,"link":"http:\/\/z.qyer.com\/all_0_0_241_0_158_0_0\/?_channel=freetour&_type=channel","activity":0}],[{"id":"10","name":"\u4e9a\u6d32","en_name":"","type":"continent","parentid":"0","sort":"15472","countrylist":[{"id":"11","name":"\u4e2d\u56fd\u5185\u5730","en_name":"","type":"country","parentid":"10","sort":"9999","link":"http:\/\/z.qyer.com\/all_0_0_11_0_158_0_0\/?_channel=freetour&_type=channel","activity":0},{"id":11186,"name":"\u53f0\u6e7e","en_name":"","type":"city","parentid":"10","sort":"283","country":"11","link":"http:\/\/z.qyer.com\/all_0_0_11_11186_158_0_0\/?_channel=freetour&_type=channel","activity":0},{"id":50,"name":"\u9999\u6e2f","en_name":"","type":"city","parentid":"10","sort":"210","country":"11","link":"http:\/\/z.qyer.com\/all_0_0_11_50_158_0_0\/?_channel=freetour&_type=channel","activity":0},{"id":51,"name":"\u6fb3\u95e8","en_name":"","type":"city","parentid":"10","sort":"85","country":"11","link":"http:\/\/z.qyer.com\/all_0_0_11_51_158_0_0\/?_channel=freetour&_type=channel","activity":0},{"id":"215","name":"\u6cf0\u56fd","en_name":"","type":"country","parentid":"10","sort":"975","link":"http:\/\/z.qyer.com\/all_0_0_215_0_158_0_0\/?_channel=freetour&_type=channel","activity":0},{"id":"14","name":"\u65e5\u672c","en_name":"","type":"country","parentid":"10","sort":"939","link":"http:\/\/z.qyer.com\/all_0_0_14_0_158_0_0\/?_channel=freetour&_type=channel","activity":0},{"id":"233","name":"\u97e9\u56fd","en_name":"","type":"country","parentid":"10","sort":"573","link":"http:\/\/z.qyer.com\/all_0_0_233_0_158_0_0\/?_channel=freetour&_type=channel","activity":0},{"id":"497","name":"\u9a6c\u5c14\u4ee3\u592b","en_name":"","type":"country","parentid":"10","sort":"464","link":"http:\/\/z.qyer.com\/all_0_0_497_0_158_0_0\/?_channel=freetour&_type=channel","activity":0},{"id":"232","name":"\u65b0\u52a0\u5761","en_name":"","type":"country","parentid":"10","sort":"314","link":"http:\/\/z.qyer.com\/all_0_0_232_0_158_0_0\/?_channel=freetour&_type=channel","activity":0},{"id":"213","name":"\u9a6c\u6765\u897f\u4e9a","en_name":"","type":"country","parentid":"10","sort":"301","link":"http:\/\/z.qyer.com\/all_0_0_213_0_158_0_0\/?_channel=freetour&_type=channel","activity":0},{"id":"570","name":"\u5370\u5ea6\u5c3c\u897f\u4e9a","en_name":"","type":"country","parentid":"10","sort":"291","link":"http:\/\/z.qyer.com\/all_0_0_570_0_158_0_0\/?_channel=freetour&_type=channel","activity":0},{"id":"216","name":"\u8d8a\u5357","en_name":"","type":"country","parentid":"10","sort":"251","link":"http:\/\/z.qyer.com\/all_0_0_216_0_158_0_0\/?_channel=freetour&_type=channel","activity":0},{"id":"446","name":"\u83f2\u5f8b\u5bbe","en_name":"","type":"country","parentid":"10","sort":"166","link":"http:\/\/z.qyer.com\/all_0_0_446_0_158_0_0\/?_channel=freetour&_type=channel","activity":0},{"id":"219","name":"\u67ec\u57d4\u5be8","en_name":"","type":"country","parentid":"10","sort":"126","link":"http:\/\/z.qyer.com\/all_0_0_219_0_158_0_0\/?_channel=freetour&_type=channel","activity":0},{"id":"402","name":"\u963f\u8054\u914b","en_name":"","type":"country","parentid":"10","sort":"106","link":"http:\/\/z.qyer.com\/all_0_0_402_0_158_0_0\/?_channel=freetour&_type=channel","activity":0},{"id":"537","name":"\u65af\u91cc\u5170\u5361","en_name":"","type":"country","parentid":"10","sort":"85","link":"http:\/\/z.qyer.com\/all_0_0_537_0_158_0_0\/?_channel=freetour&_type=channel","activity":0},{"id":"220","name":"\u5c3c\u6cca\u5c14","en_name":"","type":"country","parentid":"10","sort":"24","link":"http:\/\/z.qyer.com\/all_0_0_220_0_158_0_0\/?_channel=freetour&_type=channel","activity":0},{"id":"487","name":"\u8001\u631d","en_name":"","type":"country","parentid":"10","sort":"23","link":"http:\/\/z.qyer.com\/all_0_0_487_0_158_0_0\/?_channel=freetour&_type=channel","activity":0},{"id":"231","name":"\u5370\u5ea6","en_name":"","type":"country","parentid":"10","sort":"23","link":"http:\/\/z.qyer.com\/all_0_0_231_0_158_0_0\/?_channel=freetour&_type=channel","activity":0},{"id":"461","name":"\u54c8\u8428\u514b\u65af\u5766","en_name":"","type":"country","parentid":"10","sort":"19","link":"http:\/\/z.qyer.com\/all_0_0_461_0_158_0_0\/?_channel=freetour&_type=channel","activity":0},{"id":"558","name":"\u6587\u83b1","en_name":"","type":"country","parentid":"10","sort":"18","link":"http:\/\/z.qyer.com\/all_0_0_558_0_158_0_0\/?_channel=freetour&_type=channel","activity":0},{"id":"511","name":"\u7f05\u7538","en_name":"","type":"country","parentid":"10","sort":"18","link":"http:\/\/z.qyer.com\/all_0_0_511_0_158_0_0\/?_channel=freetour&_type=channel","activity":0},{"id":"544","name":"\u5854\u5409\u514b\u65af\u5766","en_name":"","type":"country","parentid":"10","sort":"17","link":"http:\/\/z.qyer.com\/all_0_0_544_0_158_0_0\/?_channel=freetour&_type=channel","activity":0},{"id":"403","name":"\u963f\u66fc","en_name":"","type":"country","parentid":"10","sort":"16","link":"http:\/\/z.qyer.com\/all_0_0_403_0_158_0_0\/?_channel=freetour&_type=channel","activity":0},{"id":"476","name":"\u5361\u5854\u5c14","en_name":"","type":"country","parentid":"10","sort":"15","link":"http:\/\/z.qyer.com\/all_0_0_476_0_158_0_0\/?_channel=freetour&_type=channel","activity":0},{"id":"507","name":"\u8499\u53e4","en_name":"","type":"country","parentid":"10","sort":"14","link":"http:\/\/z.qyer.com\/all_0_0_507_0_158_0_0\/?_channel=freetour&_type=channel","activity":0},{"id":"414","name":"\u5df4\u57fa\u65af\u5766","en_name":"","type":"country","parentid":"10","sort":"14","link":"http:\/\/z.qyer.com\/all_0_0_414_0_158_0_0\/?_channel=freetour&_type=channel","activity":0},{"id":"468","name":"\u5409\u5c14\u5409\u65af\u65af\u5766","en_name":"","type":"country","parentid":"10","sort":"14","link":"http:\/\/z.qyer.com\/all_0_0_468_0_158_0_0\/?_channel=freetour&_type=channel","activity":0},{"id":"562","name":"\u4e4c\u5179\u522b\u514b\u65af\u5766","en_name":"","type":"country","parentid":"10","sort":"14","link":"http:\/\/z.qyer.com\/all_0_0_562_0_158_0_0\/?_channel=freetour&_type=channel","activity":0},{"id":"532","name":"\u6c99\u7279\u963f\u62c9\u4f2f","en_name":"","type":"country","parentid":"10","sort":"14","link":"http:\/\/z.qyer.com\/all_0_0_532_0_158_0_0\/?_channel=freetour&_type=channel","activity":0},{"id":"433","name":"\u4e0d\u4e39","en_name":"","type":"country","parentid":"10","sort":"13","link":"http:\/\/z.qyer.com\/all_0_0_433_0_158_0_0\/?_channel=freetour&_type=channel","activity":0},{"id":"572","name":"\u7ea6\u65e6","en_name":"","type":"country","parentid":"10","sort":"13","link":"http:\/\/z.qyer.com\/all_0_0_572_0_158_0_0\/?_channel=freetour&_type=channel","activity":0},{"id":"569","name":"\u4ee5\u8272\u5217","en_name":"yiselie","type":"country","parentid":"10","sort":"12","link":"http:\/\/z.qyer.com\/all_0_0_569_0_158_0_0\/?_channel=freetour&_type=channel","activity":0},{"id":"436","name":"\u671d\u9c9c","en_name":"","type":"country","parentid":"10","sort":"12","link":"http:\/\/z.qyer.com\/all_0_0_436_0_158_0_0\/?_channel=freetour&_type=channel","activity":0},{"id":"568","name":"\u4f0a\u6717","en_name":"","type":"country","parentid":"10","sort":"11","link":"http:\/\/z.qyer.com\/all_0_0_568_0_158_0_0\/?_channel=freetour&_type=channel","activity":0}]},{"id":"12","name":"\u6b27\u6d32","en_name":"","type":"continent","parentid":"0","sort":"2850","countrylist":[{"id":"186","name":"\u6cd5\u56fd","en_name":"","type":"country","parentid":"12","sort":"269","link":"http:\/\/z.qyer.com\/all_0_0_186_0_158_0_0\/?_channel=freetour&_type=channel","activity":0},{"id":"189","name":"\u610f\u5927\u5229","en_name":"","type":"country","parentid":"12","sort":"234","link":"http:\/\/z.qyer.com\/all_0_0_189_0_158_0_0\/?_channel=freetour&_type=channel","activity":0},{"id":"15","name":"\u5fb7\u56fd","en_name":"","type":"country","parentid":"12","sort":"227","link":"http:\/\/z.qyer.com\/all_0_0_15_0_158_0_0\/?_channel=freetour&_type=channel","activity":0},{"id":"13","name":"\u82f1\u56fd","en_name":"","type":"country","parentid":"12","sort":"201","link":"http:\/\/z.qyer.com\/all_0_0_13_0_158_0_0\/?_channel=freetour&_type=channel","activity":0},{"id":"182","name":"\u897f\u73ed\u7259","en_name":"","type":"country","parentid":"12","sort":"182","link":"http:\/\/z.qyer.com\/all_0_0_182_0_158_0_0\/?_channel=freetour&_type=channel","activity":0},{"id":"524","name":"\u745e\u58eb","en_name":"","type":"country","parentid":"12","sort":"135","link":"http:\/\/z.qyer.com\/all_0_0_524_0_158_0_0\/?_channel=freetour&_type=channel","activity":0},{"id":"206","name":"\u5e0c\u814a","en_name":"","type":"country","parentid":"12","sort":"120","link":"http:\/\/z.qyer.com\/all_0_0_206_0_158_0_0\/?_channel=freetour&_type=channel","activity":0},{"id":"193","name":"\u6377\u514b","en_name":"","type":"country","parentid":"12","sort":"113","link":"http:\/\/z.qyer.com\/all_0_0_193_0_158_0_0\/?_channel=freetour&_type=channel","activity":0},{"id":"198","name":"\u5965\u5730\u5229","en_name":"","type":"country","parentid":"12","sort":"101","link":"http:\/\/z.qyer.com\/all_0_0_198_0_158_0_0\/?_channel=freetour&_type=channel","activity":0},{"id":"200","name":"\u8377\u5170","en_name":"","type":"country","parentid":"12","sort":"88","link":"http:\/\/z.qyer.com\/all_0_0_200_0_158_0_0\/?_channel=freetour&_type=channel","activity":0},{"id":"424","name":"\u6bd4\u5229\u65f6","en_name":"","type":"country","parentid":"12","sort":"68","link":"http:\/\/z.qyer.com\/all_0_0_424_0_158_0_0\/?_channel=freetour&_type=channel","activity":0},{"id":"448","name":"\u82ac\u5170","en_name":"","type":"country","parentid":"12","sort":"62","link":"http:\/\/z.qyer.com\/all_0_0_448_0_158_0_0\/?_channel=freetour&_type=channel","activity":0},{"id":"195","name":"\u571f\u8033\u5176","en_name":"","type":"country","parentid":"12","sort":"61","link":"http:\/\/z.qyer.com\/all_0_0_195_0_158_0_0\/?_channel=freetour&_type=channel","activity":0},{"id":"207","name":"\u5308\u7259\u5229","en_name":"","type":"country","parentid":"12","sort":"59","link":"http:\/\/z.qyer.com\/all_0_0_207_0_158_0_0\/?_channel=freetour&_type=channel","activity":0},{"id":"425","name":"\u51b0\u5c9b","en_name":"","type":"country","parentid":"12","sort":"55","link":"http:\/\/z.qyer.com\/all_0_0_425_0_158_0_0\/?_channel=freetour&_type=channel","activity":0},{"id":"208","name":"\u4fc4\u7f57\u65af","en_name":"","type":"country","parentid":"12","sort":"54","link":"http:\/\/z.qyer.com\/all_0_0_208_0_158_0_0\/?_channel=freetour&_type=channel","activity":0},{"id":"523","name":"\u8461\u8404\u7259","en_name":"","type":"country","parentid":"12","sort":"51","link":"http:\/\/z.qyer.com\/all_0_0_523_0_158_0_0\/?_channel=freetour&_type=channel","activity":0},{"id":"804","name":"\u68b5\u8482\u5188","en_name":"","type":"country","parentid":"12","sort":"47","link":"http:\/\/z.qyer.com\/all_0_0_804_0_158_0_0\/?_channel=freetour&_type=channel","activity":0},{"id":"205","name":"\u4e39\u9ea6","en_name":"","type":"country","parentid":"12","sort":"46","link":"http:\/\/z.qyer.com\/all_0_0_205_0_158_0_0\/?_channel=freetour&_type=channel","activity":0},{"id":"406","name":"\u7231\u5c14\u5170","en_name":"","type":"country","parentid":"12","sort":"45","link":"http:\/\/z.qyer.com\/all_0_0_406_0_158_0_0\/?_channel=freetour&_type=channel","activity":0},{"id":"493","name":"\u5362\u68ee\u5821","en_name":"","type":"country","parentid":"12","sort":"44","link":"http:\/\/z.qyer.com\/all_0_0_493_0_158_0_0\/?_channel=freetour&_type=channel","activity":0},{"id":"654","name":"\u6469\u7eb3\u54e5","en_name":"","type":"country","parentid":"12","sort":"44","link":"http:\/\/z.qyer.com\/all_0_0_654_0_158_0_0\/?_channel=freetour&_type=channel","activity":0},{"id":"482","name":"\u514b\u7f57\u5730\u4e9a","en_name":"","type":"country","parentid":"12","sort":"43","link":"http:\/\/z.qyer.com\/all_0_0_482_0_158_0_0\/?_channel=freetour&_type=channel","activity":0},{"id":"521","name":"\u632a\u5a01","en_name":"","type":"country","parentid":"12","sort":"43","link":"http:\/\/z.qyer.com\/all_0_0_521_0_158_0_0\/?_channel=freetour&_type=channel","activity":0},{"id":"202","name":"\u745e\u5178","en_name":"","type":"country","parentid":"12","sort":"41","link":"http:\/\/z.qyer.com\/all_0_0_202_0_158_0_0\/?_channel=freetour&_type=channel","activity":0},{"id":"538","name":"\u65af\u6d1b\u4f10\u514b","en_name":"","type":"country","parentid":"12","sort":"40","link":"http:\/\/z.qyer.com\/all_0_0_538_0_158_0_0\/?_channel=freetour&_type=channel","activity":0},{"id":"427","name":"\u6ce2\u5170","en_name":"","type":"country","parentid":"12","sort":"29","link":"http:\/\/z.qyer.com\/all_0_0_427_0_158_0_0\/?_channel=freetour&_type=channel","activity":0},{"id":"495","name":"\u7f57\u9a6c\u5c3c\u4e9a","en_name":"","type":"country","parentid":"12","sort":"25","link":"http:\/\/z.qyer.com\/all_0_0_495_0_158_0_0\/?_channel=freetour&_type=channel","activity":0},{"id":"498","name":"\u9a6c\u8033\u4ed6","en_name":"","type":"country","parentid":"12","sort":"22","link":"http:\/\/z.qyer.com\/all_0_0_498_0_158_0_0\/?_channel=freetour&_type=channel","activity":0},{"id":"785","name":"\u5723\u9a6c\u529b\u8bfa","en_name":"","type":"country","parentid":"12","sort":"21","link":"http:\/\/z.qyer.com\/all_0_0_785_0_158_0_0\/?_channel=freetour&_type=channel","activity":0},{"id":"407","name":"\u7231\u6c99\u5c3c\u4e9a","en_name":"","type":"country","parentid":"12","sort":"21","link":"http:\/\/z.qyer.com\/all_0_0_407_0_158_0_0\/?_channel=freetour&_type=channel","activity":0},{"id":"539","name":"\u65af\u6d1b\u6587\u5c3c\u4e9a","en_name":"","type":"country","parentid":"12","sort":"21","link":"http:\/\/z.qyer.com\/all_0_0_539_0_158_0_0\/?_channel=freetour&_type=channel","activity":0},{"id":"421","name":"\u4fdd\u52a0\u5229\u4e9a","en_name":"","type":"country","parentid":"12","sort":"19","link":"http:\/\/z.qyer.com\/all_0_0_421_0_158_0_0\/?_channel=freetour&_type=channel","activity":0},{"id":"762","name":"\u5217\u652f\u6566\u58eb\u767b","en_name":"","type":"country","parentid":"12","sort":"19","link":"http:\/\/z.qyer.com\/all_0_0_762_0_158_0_0\/?_channel=freetour&_type=channel","activity":0},{"id":"530","name":"\u585e\u6d66\u8def\u65af","en_name":"","type":"country","parentid":"12","sort":"18","link":"http:\/\/z.qyer.com\/all_0_0_530_0_158_0_0\/?_channel=freetour&_type=channel","activity":0},{"id":"489","name":"\u7acb\u9676\u5b9b","en_name":"","type":"country","parentid":"12","sort":"18","link":"http:\/\/z.qyer.com\/all_0_0_489_0_158_0_0\/?_channel=freetour&_type=channel","activity":0},{"id":"485","name":"\u62c9\u8131\u7ef4\u4e9a","en_name":"","type":"country","parentid":"12","sort":"18","link":"http:\/\/z.qyer.com\/all_0_0_485_0_158_0_0\/?_channel=freetour&_type=channel","activity":0},{"id":"464","name":"\u9ed1\u5c71","en_name":"","type":"country","parentid":"12","sort":"18","link":"http:\/\/z.qyer.com\/all_0_0_464_0_158_0_0\/?_channel=freetour&_type=channel","activity":0},{"id":"805","name":"\u76f4\u5e03\u7f57\u9640","en_name":"","type":"country","parentid":"12","sort":"17","link":"http:\/\/z.qyer.com\/all_0_0_805_0_158_0_0\/?_channel=freetour&_type=channel","activity":0},{"id":"560","name":"\u4e4c\u514b\u5170","en_name":"","type":"country","parentid":"12","sort":"17","link":"http:\/\/z.qyer.com\/all_0_0_560_0_158_0_0\/?_channel=freetour&_type=channel","activity":0},{"id":"457","name":"\u683c\u9c81\u5409\u4e9a","en_name":"","type":"country","parentid":"12","sort":"16","link":"http:\/\/z.qyer.com\/all_0_0_457_0_158_0_0\/?_channel=freetour&_type=channel","activity":0},{"id":"399","name":"\u963f\u5c14\u5df4\u5c3c\u4e9a","en_name":"","type":"country","parentid":"12","sort":"16","link":"http:\/\/z.qyer.com\/all_0_0_399_0_158_0_0\/?_channel=freetour&_type=channel","activity":0},{"id":"527","name":"\u585e\u5c14\u7ef4\u4e9a","en_name":"","type":"country","parentid":"12","sort":"15","link":"http:\/\/z.qyer.com\/all_0_0_527_0_158_0_0\/?_channel=freetour&_type=channel","activity":0},{"id":"566","name":"\u4e9a\u7f8e\u5c3c\u4e9a","en_name":"","type":"country","parentid":"12","sort":"15","link":"http:\/\/z.qyer.com\/all_0_0_566_0_158_0_0\/?_channel=freetour&_type=channel","activity":0},{"id":"418","name":"\u767d\u4fc4\u7f57\u65af","en_name":"","type":"country","parentid":"12","sort":"14","link":"http:\/\/z.qyer.com\/all_0_0_418_0_158_0_0\/?_channel=freetour&_type=channel","activity":0},{"id":"404","name":"\u963f\u585e\u62dc\u7586","en_name":"","type":"country","parentid":"12","sort":"14","link":"http:\/\/z.qyer.com\/all_0_0_404_0_158_0_0\/?_channel=freetour&_type=channel","activity":0},{"id":"428","name":"\u6ce2\u9ed1","en_name":"","type":"country","parentid":"12","sort":"2","link":"http:\/\/z.qyer.com\/all_0_0_428_0_158_0_0\/?_channel=freetour&_type=channel","activity":0},{"id":"479","name":"\u79d1\u7d22\u6c83","en_name":"","type":"country","parentid":"12","sort":"1","link":"http:\/\/z.qyer.com\/all_0_0_479_0_158_0_0\/?_channel=freetour&_type=channel","activity":0},{"id":"512","name":"\u6469\u5c14\u591a\u74e6","en_name":"","type":"country","parentid":"12","sort":"1","link":"http:\/\/z.qyer.com\/all_0_0_512_0_158_0_0\/?_channel=freetour&_type=channel","activity":0}]},{"id":"239","name":"\u5927\u6d0b\u6d32","en_name":"","type":"continent","parentid":"0","sort":"941","countrylist":[{"id":"240","name":"\u6fb3\u5927\u5229\u4e9a","en_name":"","type":"country","parentid":"239","sort":"448","link":"http:\/\/z.qyer.com\/all_0_0_240_0_158_0_0\/?_channel=freetour&_type=channel","activity":0},{"id":"241","name":"\u65b0\u897f\u5170","en_name":"","type":"country","parentid":"239","sort":"208","link":"http:\/\/z.qyer.com\/all_0_0_241_0_158_0_0\/?_channel=freetour&_type=channel","activity":0},{"id":"422","name":"\u5317\u9a6c\u91cc\u4e9a\u7eb3\u7fa4\u5c9b","en_name":"","type":"country","parentid":"239","sort":"99","link":"http:\/\/z.qyer.com\/all_0_0_422_0_158_0_0\/?_channel=freetour&_type=channel","activity":0},{"id":"522","name":"\u5e15\u52b3","en_name":"","type":"country","parentid":"239","sort":"72","link":"http:\/\/z.qyer.com\/all_0_0_522_0_158_0_0\/?_channel=freetour&_type=channel","activity":0},{"id":"447","name":"\u6590\u6d4e","en_name":"","type":"country","parentid":"239","sort":"48","link":"http:\/\/z.qyer.com\/all_0_0_447_0_158_0_0\/?_channel=freetour&_type=channel","activity":0},{"id":"1072","name":"\u5173\u5c9b","en_name":"","type":"country","parentid":"239","sort":"36","link":"http:\/\/z.qyer.com\/all_0_0_1072_0_158_0_0\/?_channel=freetour&_type=channel","activity":0},{"id":"545","name":"\u6cd5\u5c5e\u6ce2\u5229\u5c3c\u897f\u4e9a","en_name":"","type":"country","parentid":"239","sort":"24","link":"http:\/\/z.qyer.com\/all_0_0_545_0_158_0_0\/?_channel=freetour&_type=channel","activity":0},{"id":"505","name":"\u7f8e\u5c5e\u8428\u6469\u4e9a","en_name":"","type":"country","parentid":"239","sort":"1","link":"http:\/\/z.qyer.com\/all_0_0_505_0_158_0_0\/?_channel=freetour&_type=channel","activity":0},{"id":"412","name":"\u5df4\u5e03\u4e9a\u65b0\u51e0\u5185\u4e9a","en_name":"","type":"country","parentid":"239","sort":"1","link":"http:\/\/z.qyer.com\/all_0_0_412_0_158_0_0\/?_channel=freetour&_type=channel","activity":0},{"id":"543","name":"\u6240\u7f57\u95e8\u7fa4\u5c9b","en_name":"","type":"country","parentid":"239","sort":"1","link":"http:\/\/z.qyer.com\/all_0_0_543_0_158_0_0\/?_channel=freetour&_type=channel","activity":0},{"id":"547","name":"\u6c64\u52a0","en_name":"","type":"country","parentid":"239","sort":"1","link":"http:\/\/z.qyer.com\/all_0_0_547_0_158_0_0\/?_channel=freetour&_type=channel","activity":0},{"id":"554","name":"\u74e6\u52aa\u963f\u56fe","en_name":"","type":"country","parentid":"239","sort":"1","link":"http:\/\/z.qyer.com\/all_0_0_554_0_158_0_0\/?_channel=freetour&_type=channel","activity":0},{"id":"563","name":"\u65b0\u5580\u91cc\u591a\u5c3c\u4e9a","en_name":"","type":"country","parentid":"239","sort":"1","link":"http:\/\/z.qyer.com\/all_0_0_563_0_158_0_0\/?_channel=freetour&_type=channel","activity":0}]},{"id":"234","name":"\u5317\u7f8e","en_name":"","type":"continent","parentid":"0","sort":"650","countrylist":[{"id":"236","name":"\u7f8e\u56fd","en_name":"","type":"country","parentid":"234","sort":"478","link":"http:\/\/z.qyer.com\/all_0_0_236_0_158_0_0\/?_channel=freetour&_type=channel","activity":0},{"id":"238","name":"\u52a0\u62ff\u5927","en_name":"","type":"country","parentid":"234","sort":"79","link":"http:\/\/z.qyer.com\/all_0_0_238_0_158_0_0\/?_channel=freetour&_type=channel","activity":0},{"id":"515","name":"\u58a8\u897f\u54e5","en_name":"","type":"country","parentid":"234","sort":"22","link":"http:\/\/z.qyer.com\/all_0_0_515_0_158_0_0\/?_channel=freetour&_type=channel","activity":0},{"id":"565","name":"\u7259\u4e70\u52a0","en_name":"","type":"country","parentid":"234","sort":"16","link":"http:\/\/z.qyer.com\/all_0_0_565_0_158_0_0\/?_channel=freetour&_type=channel","activity":0},{"id":"454","name":"\u54e5\u65af\u8fbe\u9ece\u52a0","en_name":"","type":"country","parentid":"234","sort":"16","link":"http:\/\/z.qyer.com\/all_0_0_454_0_158_0_0\/?_channel=freetour&_type=channel","activity":0},{"id":"462","name":"\u6d77\u5730","en_name":"","type":"country","parentid":"234","sort":"15","link":"http:\/\/z.qyer.com\/all_0_0_462_0_158_0_0\/?_channel=freetour&_type=channel","activity":0},{"id":"417","name":"\u5df4\u62ff\u9a6c","en_name":"","type":"country","parentid":"234","sort":"15","link":"http:\/\/z.qyer.com\/all_0_0_417_0_158_0_0\/?_channel=freetour&_type=channel","activity":0},{"id":"413","name":"\u5df4\u54c8\u9a6c","en_name":"","type":"country","parentid":"234","sort":"2","link":"http:\/\/z.qyer.com\/all_0_0_413_0_158_0_0\/?_channel=freetour&_type=channel","activity":0},{"id":"1380","name":"\u9a6c\u63d0\u5c3c\u514b","en_name":"","type":"country","parentid":"234","sort":"2","link":"http:\/\/z.qyer.com\/all_0_0_1380_0_158_0_0\/?_channel=freetour&_type=channel","activity":0},{"id":"430","name":"\u4f2f\u5229\u5179","en_name":"","type":"country","parentid":"234","sort":"1","link":"http:\/\/z.qyer.com\/all_0_0_430_0_158_0_0\/?_channel=freetour&_type=channel","activity":0},{"id":"426","name":"\u6ce2\u591a\u9ece\u5404","en_name":"","type":"country","parentid":"234","sort":"1","link":"http:\/\/z.qyer.com\/all_0_0_426_0_158_0_0\/?_channel=freetour&_type=channel","activity":0},{"id":"555","name":"\u5371\u5730\u9a6c\u62c9","en_name":"","type":"country","parentid":"234","sort":"1","link":"http:\/\/z.qyer.com\/all_0_0_555_0_158_0_0\/?_channel=freetour&_type=channel","activity":0},{"id":"1295","name":"\u74dc\u5fb7\u7f57\u666e","en_name":"","type":"country","parentid":"234","sort":"1","link":"http:\/\/z.qyer.com\/all_0_0_1295_0_158_0_0\/?_channel=freetour&_type=channel","activity":0},{"id":"1383","name":"\u6cd5\u5c5e\u5723\u9a6c\u4e01","en_name":"","type":"country","parentid":"234","sort":"1","link":"http:\/\/z.qyer.com\/all_0_0_1383_0_158_0_0\/?_channel=freetour&_type=channel","activity":0}]},{"id":"76","name":"\u975e\u6d32","en_name":"","type":"continent","parentid":"0","sort":"361","countrylist":[{"id":"503","name":"\u6bdb\u91cc\u6c42\u65af","en_name":"","type":"country","parentid":"76","sort":"155","link":"http:\/\/z.qyer.com\/all_0_0_503_0_158_0_0\/?_channel=freetour&_type=channel","activity":0},{"id":"531","name":"\u585e\u820c\u5c14","en_name":"","type":"country","parentid":"76","sort":"54","link":"http:\/\/z.qyer.com\/all_0_0_531_0_158_0_0\/?_channel=freetour&_type=channel","activity":0},{"id":"513","name":"\u6469\u6d1b\u54e5","en_name":"","type":"country","parentid":"76","sort":"45","link":"http:\/\/z.qyer.com\/all_0_0_513_0_158_0_0\/?_channel=freetour&_type=channel","activity":0},{"id":"492","name":"\u7559\u5c3c\u6c6a","en_name":"","type":"country","parentid":"76","sort":"25","link":"http:\/\/z.qyer.com\/all_0_0_492_0_158_0_0\/?_channel=freetour&_type=channel","activity":0},{"id":"517","name":"\u5357\u975e","en_name":"","type":"country","parentid":"76","sort":"24","link":"http:\/\/z.qyer.com\/all_0_0_517_0_158_0_0\/?_channel=freetour&_type=channel","activity":0},{"id":"244","name":"\u57c3\u53ca","en_name":"","type":"country","parentid":"76","sort":"20","link":"http:\/\/z.qyer.com\/all_0_0_244_0_158_0_0\/?_channel=freetour&_type=channel","activity":0},{"id":"483","name":"\u80af\u5c3c\u4e9a","en_name":"","type":"country","parentid":"76","sort":"17","link":"http:\/\/z.qyer.com\/all_0_0_483_0_158_0_0\/?_channel=freetour&_type=channel","activity":0},{"id":"546","name":"\u5766\u6851\u5c3c\u4e9a","en_name":"","type":"country","parentid":"76","sort":"15","link":"http:\/\/z.qyer.com\/all_0_0_546_0_158_0_0\/?_channel=freetour&_type=channel","activity":0},{"id":"496","name":"\u9a6c\u8fbe\u52a0\u65af\u52a0","en_name":"","type":"country","parentid":"76","sort":"3","link":"http:\/\/z.qyer.com\/all_0_0_496_0_158_0_0\/?_channel=freetour&_type=channel","activity":0},{"id":"471","name":"\u52a0\u7eb3","en_name":"","type":"country","parentid":"76","sort":"1","link":"http:\/\/z.qyer.com\/all_0_0_471_0_158_0_0\/?_channel=freetour&_type=channel","activity":0},{"id":"550","name":"\u7a81\u5c3c\u65af","en_name":"","type":"country","parentid":"76","sort":"1","link":"http:\/\/z.qyer.com\/all_0_0_550_0_158_0_0\/?_channel=freetour&_type=channel","activity":0},{"id":"1426","name":"\u9a6c\u7ea6\u7279","en_name":"","type":"country","parentid":"76","sort":"1","link":"http:\/\/z.qyer.com\/all_0_0_1426_0_158_0_0\/?_channel=freetour&_type=channel","activity":0}]},{"id":"235","name":"\u5357\u7f8e","en_name":"","type":"continent","parentid":"0","sort":"86","countrylist":[{"id":"243","name":"\u963f\u6839\u5ef7","en_name":"","type":"country","parentid":"235","sort":"25","link":"http:\/\/z.qyer.com\/all_0_0_243_0_158_0_0\/?_channel=freetour&_type=channel","activity":0},{"id":"242","name":"\u5df4\u897f","en_name":"","type":"country","parentid":"235","sort":"23","link":"http:\/\/z.qyer.com\/all_0_0_242_0_158_0_0\/?_channel=freetour&_type=channel","activity":0},{"id":"575","name":"\u667a\u5229","en_name":"","type":"country","parentid":"235","sort":"15","link":"http:\/\/z.qyer.com\/all_0_0_575_0_158_0_0\/?_channel=freetour&_type=channel","activity":0},{"id":"453","name":"\u54e5\u4f26\u6bd4\u4e9a","en_name":"","type":"country","parentid":"235","sort":"14","link":"http:\/\/z.qyer.com\/all_0_0_453_0_158_0_0\/?_channel=freetour&_type=channel","activity":0},{"id":"509","name":"\u79d8\u9c81","en_name":"","type":"country","parentid":"235","sort":"5","link":"http:\/\/z.qyer.com\/all_0_0_509_0_158_0_0\/?_channel=freetour&_type=channel","activity":0},{"id":"1292","name":"\u6cd5\u5c5e\u572d\u4e9a\u90a3","en_name":"","type":"country","parentid":"235","sort":"2","link":"http:\/\/z.qyer.com\/all_0_0_1292_0_158_0_0\/?_channel=freetour&_type=channel","activity":0},{"id":"429","name":"\u73bb\u5229\u7ef4\u4e9a","en_name":"","type":"country","parentid":"235","sort":"1","link":"http:\/\/z.qyer.com\/all_0_0_429_0_158_0_0\/?_channel=freetour&_type=channel","activity":0},{"id":"557","name":"\u59d4\u5185\u745e\u62c9","en_name":"","type":"country","parentid":"235","sort":"1","link":"http:\/\/z.qyer.com\/all_0_0_557_0_158_0_0\/?_channel=freetour&_type=channel","activity":0}]},{"id":"759","name":"\u5357\u6781\u6d32","en_name":"","type":"continent","parentid":"0","sort":"9","countrylist":[{"id":"760","name":"\u5357\u6781","en_name":"","type":"country","parentid":"759","sort":"9","link":"http:\/\/z.qyer.com\/all_0_0_760_0_158_0_0\/?_channel=freetour&_type=channel","activity":0}]}]]},{"name":"\u65c5\u884c\u65f6\u95f4","key":"date","list":[[{"name":"\u5168\u90e8","link":"http:\/\/z.qyer.com\/all_0_0_0_0_158_0_0\/?_channel=freetour&_type=channel","activity":1},{"link":"http:\/\/z.qyer.com\/all_0_201609_0_0_158_0_0\/?_channel=freetour&_type=channel","name":"\u4e5d\u6708","activity":0},{"link":"http:\/\/z.qyer.com\/all_0_201610_0_0_158_0_0\/?_channel=freetour&_type=channel","name":"\u5341\u6708","activity":0},{"link":"http:\/\/z.qyer.com\/all_0_201611_0_0_158_0_0\/?_channel=freetour&_type=channel","name":"\u5341\u4e00\u6708","activity":0},{"link":"http:\/\/z.qyer.com\/all_0_201612_0_0_158_0_0\/?_channel=freetour&_type=channel","name":"\u5341\u4e8c\u6708","activity":0},{"link":"http:\/\/z.qyer.com\/all_0_201701_0_0_158_0_0\/?_channel=freetour&_type=channel","name":"\u4e00\u6708","activity":0},{"link":"http:\/\/z.qyer.com\/all_0_201702_0_0_158_0_0\/?_channel=freetour&_type=channel","name":"\u4e8c\u6708","activity":0},{"link":"http:\/\/z.qyer.com\/all_0_201703_0_0_158_0_0\/?_channel=freetour&_type=channel","name":"\u4e09\u6708","activity":0},{"link":"http:\/\/z.qyer.com\/all_0_201704_0_0_158_0_0\/?_channel=freetour&_type=channel","name":"\u56db\u6708","activity":0},{"link":"http:\/\/z.qyer.com\/all_0_201705_0_0_158_0_0\/?_channel=freetour&_type=channel","name":"\u4e94\u6708","activity":0},{"link":"http:\/\/z.qyer.com\/all_0_201706_0_0_158_0_0\/?_channel=freetour&_type=channel","name":"\u516d\u6708","activity":0},{"link":"http:\/\/z.qyer.com\/all_0_201707_0_0_158_0_0\/?_channel=freetour&_type=channel","name":"\u4e03\u6708","activity":0},{"link":"http:\/\/z.qyer.com\/all_0_201708_0_0_158_0_0\/?_channel=freetour&_type=channel","name":"\u516b\u6708","activity":0}],{"NewYear":{"name":"\u65b0\u5e74","link":"http:\/\/z.qyer.com\/all_0_5_0_0_158_0_0\/?_channel=freetour&_type=channel","activity":0},"SpringFestival":{"name":"\u6625\u8282","link":"http:\/\/z.qyer.com\/all_0_6_0_0_158_0_0\/?_channel=freetour&_type=channel","activity":0},"QingMing":{"name":"\u6e05\u660e","link":"http:\/\/z.qyer.com\/all_0_7_0_0_158_0_0\/?_channel=freetour&_type=channel","activity":0},"Worker":{"name":"\u52b3\u52a8","link":"http:\/\/z.qyer.com\/all_0_8_0_0_158_0_0\/?_channel=freetour&_type=channel","activity":0},"DuanWu":{"name":"\u7aef\u5348","link":"http:\/\/z.qyer.com\/all_0_9_0_0_158_0_0\/?_channel=freetour&_type=channel","activity":0},"MidAutumn":{"name":"\u4e2d\u79cb","link":"http:\/\/z.qyer.com\/all_0_10_0_0_158_0_0\/?_channel=freetour&_type=channel","activity":0},"National":{"name":"\u56fd\u5e86","link":"http:\/\/z.qyer.com\/all_0_11_0_0_158_0_0\/?_channel=freetour&_type=channel","activity":0}}]}]);
</script>


<!--gulp_combine_model_start-->
<!-- 头图 -->
<div class="zw-module-banner-wrap" style="background-image:url('images/be.png')">
    <ul class="zw-module-banner-imglist clearfix">
        <li class="banner-img-cell">
            <a class="banner-img-cell-link" href="http://z.qyer.com/zt/sbgg0601/?campaign=pdbanner&category=sbgg0601" target="_blank" data-bn-ipg="zsj-banner-pos1" style="background-image:url('images/be.png')"></a>
        </li>
    </ul>
</div>
<!-- 头图 end -->










<!-- 大卡片区域 -->
<div class="zw-module-productlist-unit freetour">
    <div class="zw-module-bigcard-wrap clearfix">
        <div class="zw-module-bigcard-item ">
            <a href="hotelCarin" target="_blank" data-ra_arg="8e9eaea4ea56739afefe7bf096a9e2d5dd6649e6fcd3aea49679b0b7c1c6f494|79807" data-bn-ipg="zsj-pos1-pic-lm79807">
                <img class="zw-module-bigcard-itemimg" src="images/420x280.jpg" data-original="images/420x280.jpg" width="356" height="240" title="" alt="">
            </a>
            <div class="zw-module-bigcard-iteminfo clearfix ">
                <div class="infotype-wrap">
                    <span class="zw-module-bigcard-infotype">自由行</span>
                    <i class="zwui-iconfont icon-local2"></i>
                    <span class="zw-module-bigcard-infoplace">上海 - 长白山</span>
                    <div class="zw-module-bigcard-infonum"><span>67505</span>次浏览<span>199</span>件已售</div>
                </div>
                <div class="zw-module-bigcard-tag-wrap">
                    <div class="zw-module-bigcard-h2ul-wrap">
                        <h2>
                            <a href="http://z.qyer.com/deal/79807/?strategy=gorder" title="【中秋/国庆】上海直飞长白山4天3晚自由行(赠接送机+4-5星酒店可选)" target="_blank" data-bn-ipg="zsj-pos1-title-lm79807" data-ra_arg="8e9eaea4ea56739afefe7bf096a9e2d5dd6649e6fcd3aea49679b0b7c1c6f494|79807">【中秋/国庆】上海直飞长白山4天3晚自由行(赠接送机+4-5星酒店可选)</a>
                        </h2>
                        <ul class="zw-module-bigcard-flightproperty clearfix">
                        </ul>
                    </div>
                    <ul class="zw-module-bigcard-servicetag clearfix">
                        <li>赠接送机</li>
                    </ul>
                    <div class="zw-module-bigcard-price"><span class="line">3299元</span><em>899</em>元起</div>
                </div>
                <div class="zw-module-bigcard-bottombar">
                    <div class="zw-module-bigcard-datebar">旅行时间：&nbsp;2016/07-2016/12</div>
                    <a class="zw-module-bigcard-btn" href="http://z.qyer.com/deal/79807/?strategy=gorder" target="_blank" data-bn-ipg="zsj-pos1-btn-lm79807" data-ra_arg="8e9eaea4ea56739afefe7bf096a9e2d5dd6649e6fcd3aea49679b0b7c1c6f494|79807">立即预订</a>
                </div>
            </div>
        </div>
    </div>
    <div class="zw-module-bigcard-wrap clearfix">
        <div class="zw-module-bigcard-item ">
            <a href="http://z.qyer.com/deal/78367/?strategy=gorder" target="_blank" data-ra_arg="8e9eaea4ea56739afefe7bf096a9e2d5dd6649e6fcd3aea49679b0b7c1c6f494|78367" data-bn-ipg="zsj-pos2-pic-lm78367">
                <img class="zw-module-bigcard-itemimg" src="images/you.jpg" data-original="http://pic.qyer.com/lastminute/library/2015/05/06/5549c71f3c883.jpg/420x280" width="356" height="240" title="" alt="">
            </a>
            <div class="zw-module-bigcard-iteminfo clearfix ">
                <div class="infotype-wrap">
                    <span class="zw-module-bigcard-infotype">邮轮</span>
                    <i class="zwui-iconfont icon-local2"></i>
                    <span class="zw-module-bigcard-infoplace">上海 - 熊本市 熊本县 宫崎县</span>
                    <div class="zw-module-bigcard-infonum"><span>10167</span>次浏览<span>26</span>件已售</div>
                </div>
                <div class="zw-module-bigcard-tag-wrap">
                    <div class="zw-module-bigcard-h2ul-wrap">
                        <h2>
                            <a href="http://z.qyer.com/deal/78367/?strategy=gorder" title="【10月1日】皇家加勒比海洋量子号上海-熊本-宫崎6天5晚" target="_blank" data-bn-ipg="zsj-pos2-title-lm78367" data-ra_arg="8e9eaea4ea56739afefe7bf096a9e2d5dd6649e6fcd3aea49679b0b7c1c6f494|78367">【10月1日】皇家加勒比海洋量子号上海-熊本-宫崎6天5晚</a>
                        </h2>
                        <ul class="zw-module-bigcard-flightproperty clearfix">
                        </ul>
                    </div>
                    <ul class="zw-module-bigcard-servicetag clearfix">
                    </ul>
                    <div class="zw-module-bigcard-price"><span class="line">9999元</span><em>8599</em>元起</div>
                </div>
                <div class="zw-module-bigcard-bottombar">
                    <div class="zw-module-bigcard-datebar">旅行时间：&nbsp;2016/10-2016/10</div>
                    <a class="zw-module-bigcard-btn" href="http://z.qyer.com/deal/78367/?strategy=gorder" target="_blank" data-bn-ipg="zsj-pos2-btn-lm78367" data-ra_arg="8e9eaea4ea56739afefe7bf096a9e2d5dd6649e6fcd3aea49679b0b7c1c6f494|78367">立即预订</a>
                </div>
            </div>
        </div>
    </div>


</div>




<!-- 通用dock 开始 -->
<div class="zw-module-dock-wrap">
    <div class="zw-module-dock-comm clearfix">
        <ul class="dock-nav"></ul>
    </div>
</div>
<!-- 通用dock end -->

<!-- 右侧浮动 -->
<div class="zw-module-sidefloater-wrap">
    <!-- <a class="zw-module-sidefloater-cell personalcenter" title="" data-bn-ipg="zsj-ucenter">
        <i class="zwui-iconfont icon-PersonalCenter"></i>
    </a> -->
    <a class="zw-module-sidefloater-cell myorder" href="http://www.qyer.com/u/lm-order" title="" target="_blank" data-bn-ipg="zsj-myorder">
        <i class="zwui-iconfont icon-order"></i>
        <div class="sidefloater-cell-text">
            <p class="sidefloater-cell-text-inner">
                <span>我的</span>
                <span>订单</span>
            </p>
        </div>
    </a>
    <a class="zw-module-sidefloater-cell collect" href="http://www.qyer.com/u/lastmin" title="" target="_blank" data-bn-ipg="zsj-fav">
        <i class="zwui-iconfont icon-Collect"></i>
        <div class="sidefloater-cell-text">
            <p class="sidefloater-cell-text-inner">
                <span>我的</span>
                <span>收藏</span>
            </p>
        </div>
    </a>
    <div id="gototop" class="zw-module-sidefloater-cell totop" data-bn-ipg="zsj-top">
        <i class="zwui-iconfont icon-top"></i>
    </div>
</div>
<!-- 右侧浮动 end -->
<!--gulp_combine_model_end-->

<script type="text/javascript">
    var _adwq = _adwq || [];
    _adwq.push(['_setAccount', 'ycsd9']);
    _adwq.push(['_setDomainName', '.qyer.com']);
    _adwq.push(['_trackPageview']);
    (function() {
        var adw = document.createElement('script');
        adw.type = 'text/javascript';
        adw.async = true;
        adw.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://s') + '.emarbox.com/js/adw.js';
        var s = document.getElementsByTagName('script')[0];
        s.parentNode.insertBefore(adw, s);
    })();
</script>











<script type="text/javascript">

    var _gaq = _gaq || [];

    _gaq.push(["_setAccount", "UA-185023-1"]);
    _gaq.push(["_setDomainName", "qyer.com"]);
    _gaq.push(["_setSiteSpeedSampleRate",10]);
    _gaq.push(["_addIgnoredRef", "qyer.com"]);
    _gaq.push(["_addOrganic","soso","w"]);
    _gaq.push(["_addOrganic","sogou","query"]);
    _gaq.push(["_addOrganic","baidu","word"]);
    _gaq.push(["_addOrganic","baidu","q1"]);
    _gaq.push(["_addOrganic","baidu","q2"]);
    _gaq.push(["_addOrganic","m.baidu","word"]);
    _gaq.push(["_addOrganic","so.360","q"]);
    _gaq.push(["_addOrganic","so","q"]);
    _gaq.push(["_addOrganic","baidu","w"]);
    _gaq.push(["_addOrganic","cn.bing","q"]);
    _gaq.push(["_addOrganic","sm","q"]);
    _gaq.push(["_trackPageview"]);

    var _qyer_userid = "0";

    (function() {

        var qt = document.createElement("script"); qt.type = "text/javascript"; qt.async = true;

        qt.src = "http://qt.qyer.com/beacon.js";

        var ga = document.createElement("script"); ga.type = "text/javascript"; ga.async = true;

//ga.src = ("https:" == document.location.protocol ? "https://ssl" : "http://www") + ".google-analytics.com/ga.js";
        ga.src = "http://api.qyer.com/js/ga";


//if("https:" == document.location.protocol){
//    var s = document.getElementsByTagName("script")[0];s.parentNode.insertBefore(ga, s);
//}else{
        var s = document.getElementsByTagName("script")[0];s.parentNode.insertBefore(qt, s); s.parentNode.insertBefore(ga, s);
//}

    })();

</script>



<?php echo $__env->make('index.public.foot', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
</body>
</html>

