<meta charset="UTF-8">
<html>
<head>
    <meta name="format-detection" content="telephone=no" />
    <meta name="viewport" content="width=640, user-scalable=no"/>
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black" />
    <meta name="format-detection" content="telephone=no">

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="_token" content="{{ csrf_token() }}"/>
    <title>SHAKE TO WIN</title>

    @yield('css')

</head>
<body>


@yield('content')

<script src="{{ asset('js/jq.js') }}"></script>
@yield('js')

<!-- START WECHAT SHARE -->
<script src="{{ asset('js/wechat.js') }}"></script>
<script type="text/javascript" charset="utf-8">
    wx.config(<?php echo $jssdk->config(array('onMenuShareTimeline', 'onMenuShareAppMessage', 'onMenuShareQQ', 'onMenuShareWeibo'), false) ?>);
</script>
@yield('wechatshare')
<!--/ END WECHAT SHARE -->
</body>
</html>