<html><head>
    <title>{{ trans('member.membercenter') }}</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta name="format-detection" content="telephone=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <link href="{{ asset('css/ourcenter.css') }}" rel="stylesheet" type="text/css">
    <style id="style-1-cropbar-clipper">/* Copyright 2014 Evernote Corporation. All rights reserved. */
        .en-markup-crop-options {
            top: 18px !important;
            left: 50% !important;
            margin-left: -100px !important;
            width: 200px !important;
            border: 2px rgba(255,255,255,.38) solid !important;
            border-radius: 4px !important;
        }

        .en-markup-crop-options div div:first-of-type {
            margin-left: 0px !important;
        }
    </style></head>

<body style="height: 918px;">

<div class="am-widthLimite" data-role="am-widthLimite">

    <div class="ourCenterHaveGift_cover am-touchable" id="ourCenterHaveGift_cover" style="display:none">
        <canvas width="640" height="960" class="myCanvas" id="myCanvas"></canvas>
        <!--<div class="icon">扫一扫</div>-->
        <div class="bg_c"></div>
    </div>

    <div class="am-app">
        <!-- modules of shuwu -- start-->
        <!--  page.dashboard -- start -->
        <div class="member_cover am-touchable" style="display:none">
            <canvas width="38" height="38" class="myCanvas" id="myCanvas_memberCenter"></canvas>
            <div class="icon"></div>
            <div class="bg_c"></div>
        </div>
        <div class="am-page page-ourCenterHaveGift" id="page_ourCenterHaveGift" style="transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1);">
            <div class="am-header giftHeader">
                <div class="btn left am-clickable city" style="color:#F7F1F1;">{{ $member->wechat_province }}</div>
                <div class="btn btn-coupons right am-clickable usercard" id="coupons_mycoupons" style="color: #F5F1F1;margin-right: 5px">会员卡</div>
                <!--  <div class="btn am-clickable am-backbutton leftBut"></div> -->
                <!-- <div class="btnScan am-clickable"></div> -->
            </div>
            <div class="giftBody">
                <div class="am-body-inner">
                    <div class="ourCenterHaveGift_box">
                        <div class="top">
                            <ol>
                                <li class="am-clickable account" style="position: relative;">
                                    <p>
                                        <!--<span class="icon"></span>
                                        <span class="span2">账号</span>-->
                                        <span class="span2">用户昵称</span>
                                    </p>
                                    <span class="pName" id="pname4OurCenterHaveGift">{{ $member->wechat_nickname  }}</span>
                                </li>
                                <!--<li class="am-clickable account">
                                <p>
                                <span class="icon yuan"></span>
                                <span class="span2">账户余额</span>
                                </p>
                                <span class="pBalance"><strong>0.00</strong>元</span>
                                </li>-->
                                <li class="am-clickable photoBtn" style="position: relative;">
                                    <div class="imgbg"></div>
                                    <div class="photoDiv">
                                        <img src="{{ $member->wechat_headimgurl }}" alt="">
                                    </div>
                                    <!--<h3 class="memberCard am-clickable usercard" style="position: relative;">会员卡</h3>-->
                                    <!--<h3 class="pName" id="pname4OurCenterHaveGift"></h3>-->
                                </li>
                                <!-- <li class="am-clickable message">
                                <p class="p1">
                                <span class="icon" data-role="message-icon-dd"><i></i></span>
                                <span>消息</span>
                                </p>
                                <p>
                                <span style="font-size:19px; color:#FF5961;" id="unread4OurCenterHaveGift"></span>
                                <span style="font-size:12px; color:#FF5961;">未读</span>
                                </p>
                                </li> -->
                                <li class="am-clickable membercenter" style="position: relative;">
                                    <p class="p1">

                                        <span style="color:#FF5961;">积分</span>
                                    </p>
                                    <p>
                                        <span id="myPoints" style="font-size:17px; color:#FF5961;">{{ $member->points }}</span>
                                        <span class="icon-k"></span>
                                    </p>
                                </li>
                            </ol>
                        </div>
                        <div class="middle" data-role="egift-card-li" style="display:none;">
                            <ul>
                                <!--<li class="am-clickable egiftbind">
                                <div class="icon"></div>
                                <div class="text">充值</div>
                                </li>
                                <li class="am-clickable topay">
                                <div class="icon"></div>
                                <div class="text">付款码</div>
                                </li>
                                <li class="am-clickable scansion">
                                <div class="icon"></div>
                                <div class="text">扫一扫</div>
                                </li>-->
                                <!--<li class="am-clickable egiftcard">
                                <div class="icon"></div>
                                <div class="text">卡商城</div>
                                </li>
                                <li class="am-clickable recordlist">
                                <div class="icon"></div>
                                <div class="text">账户余额</div>
                                </li>-->
                            </ul>
                        </div>
                        <div class="am-carrousel ourCenterHaveGift-carrousel down am-touchable" am-event="touchable" id="ourCenterHaveGift-carrousel" style="width: 500px; height: 315px;">
                            <ul class="am-carrousel-inner" style="width: 500px; transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1);">
                                <li style="width: 500px; height: 315px; float: left;">
                                    <table cellpadding="0" cellspacing="0">
                                        <!--<tr data-role="egift-card-li">
                                        class="none" <td class="am-clickable">
                                        <div class="icon"><img src="{{ asset('img/gift01.png') }}" alt=""/></div>
                                        <div class="text">充值</div>
                                        </td>
                                        <td class="am-clickable topay">
                                        <div class="icon"><img src="{{ asset('img/gift02.png') }}" alt=""/></div>
                                        <div class="text">当面付</div>
                                        </td>
                                        <td class="am-clickable egiftbind">
                                        <div class="icon"><img src="{{ asset('img/gift03.png') }}" alt=""/></div>
                                        <div class="text">礼品卡绑定</div>
                                        </td>
                                        <td class="am-clickable recordlist">
                                        <div class="icon"><img src="{{ asset('img/gift04.png') }}" alt=""/></div>
                                        <div class="text">消费记录</div>
                                        </td>

                                        <td class="am-clickable gift_card egiftbind">
                                        <div class="icon"></div>
                                        <div class="text ">充值</div>
                                        </td>
                                        <td class="am-clickable gift_pay topay">
                                        <div class="icon"></div>
                                        <div class="text">付款码</div>
                                        </td>
                                        <td class="am-clickable gift_record recordlist">
                                        <div class="icon"></div>
                                        <div class="text ">消费记录</div>
                                        </td>
                                        </tr>-->
                                        <tbody><tr>
                                            <td class="am-clickable coupon" style="position: relative;">
                                                <div class="icon"><img src="{{ asset('img/gift05.png') }}" alt="">
                                                </div>
                                                <div class="text">
                                                    优惠券
                                                </div></td>
                                            <td class="am-clickable cardbag" style="position: relative;">
                                                <div class="icon"><img src="{{ asset('img/gift06.png') }}" alt="">
                                                </div>
                                                <div class="text">
                                                    卡包
                                                </div></td>
                                            <td class="am-clickable kstore" style="position: relative;">
                                                <div class="icon"><img src="{{ asset('img/gift17.png') }}" alt="">
                                                </div>
                                                <div class="text">
                                                    K金商城
                                                </div></td>

                                        </tr>
                                        <tr>
                                            <td class="am-clickable message" style="position: relative;">
                                                <div class="icon">
                                                    <div class="msgUnreadCount" style="display: none;">0</div><img src="{{ asset('img/gift15.png') }}" alt="">
                                                </div>
                                                <div class="text">
                                                    消息<!--<sup></sup>-->
                                                </div></td>
                                            <td class="am-clickable giftcard" style="position: relative;">
                                                <div class="icon"><img src="{{ asset('img/gift16.png') }}" alt="">
                                                </div>
                                                <div class="text">
                                                    礼品卡
                                                </div></td>
                                            <!--    <td class="am-clickable signIn">
                                            <div class="icon"><img src="{{ asset('img/gift08.png') }}" alt=""/></div>
                                            <div class="text">签到记录</div>
                                            </td> -->
                                            <td class="am-clickable suggestion" style="position: relative;">
                                                <div class="icon"><img src="{{ asset('img/gift11.png') }}" alt="">
                                                </div>
                                                <div class="text">
                                                    建议
                                                </div></td>
                                        </tr>
                                        <tr>
                                            <!--   <td class="am-clickable share">
                                            <div class="icon"><img src="{{ asset('img/gift09.png') }}" alt=""/></div>
                                            <div class="text">分享管理</div>
                                            </td>
                                            <td class="am-clickable version">
                                            <div class="icon"><img src="{{ asset('img/gift10.png') }}" alt=""/></div>
                                            <div class="text">版本</div>
                                            </td> -->
                                            <!-- <td class="am-clickable pocket">
                                            <div class="icon"><div class="pocketUnreadCount">0</div><img src="{{ asset('img/gift06.png') }}" alt=""/></div>
                                            <div class="text">口袋</div>
                                            </td> -->
                                            <!--<td class="am-clickable">
                                            <div class="icon"><img src="{{ asset('img/gift07.png') }}" alt=""/></div>
                                            <div class="text">积分</div>
                                            </td>-->

                                        </tr>
                                        </tbody></table>
                                </li>
                            </ul>
                        </div>
                        <!-- <div class="haveNoGift">
                        <img src="res/dashboard_c0.jpg" alt="" />
                        </div> -->
                        <div class="dotDiv">
                            <ol id="giftdot"></ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="scanSuccess_pop" style="display:none" id="kgold_scan_confirm_1">
                <div class="box">
                    <p>
                        积分确认成功！
                    </p>
                    <div class="scannotes">
                        当日新增积分在不晚于7个工作日审核后进入会员账号。如有任何问题，请致电肯德基服务热线
                        <br>
                        4009-200-715
                    </div>
                </div>
            </div>
        </div>
        <!--  page.我的K金详情 -- end -->
        <!--  page.photoViewer -- end -->
        <!-- modules of XiaoDan --end-->

        <!-- modules of common --start-->
        <!-- modules of common --end-->
    </div>
</div>


<script src="{{ asset('js/jq.js') }}" type="text/javascript"></script>
<script type="text/javascript">
    $(".coupon").click(function(){
        window.location.href = "https://open.weixin.qq.com/connect/oauth2/authorize?appid=wx3be6367203f983ac&redirect_uri=https%3A%2F%2Fmp.weixin.qq.com%2Fbizmall%2Fcardlandingpage%3Fbiz%3DMjM5MzcxNjk1MQ%3D%3D%26page_id%3D1%26scene%3D1&response_type=code&scope=snsapi_base#wechat_redirect";
    });
</script>
</body></html>