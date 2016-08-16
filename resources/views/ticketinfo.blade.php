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
    <link rel="stylesheet" type="text/css" href="{{asset('/css/journey/ticketinfo.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('/css/journey/common.css')}}" />

</head>
<body>
    <!-- header -->
    <div class="common_header">
        <div class="common_header_left">
            <button>凯恩斯</button>
        </div>
        <div class="common_header_right">
            <div class="common_header_pattern"> <img src="{{asset('/image/weather.jpg')}}"></div>
            <div class="common_header_temperature">22<span class="d">°C</span></div>
        </div>
    </div>

    <!-- qrcode_container -->

    <div class="qrcode_container">
      <div class="qrcode_container_code">
        <div class="qrcode_container_code_text">
          <div class="qrcode_container_code_text_header">
            <img src="{{ $ticketinfo->headimgurl }}"/>
          </div>
          <p class="store_name">商户名称: {{ $ticketinfo->store_name }}</p>
          <div class="package_name">套餐名称：</div><div class="package_name_val">{{ $ticketinfo->coupon_set_name }}</div>
          <p>套餐价格：{{ $ticketinfo->coupon_set_price }} $
          <p>支付状态：{{ $ticketinfo->pay_status }}
          <p>购买时间：{{ $ticketinfo->created_at  }}
        </div>
      </div>
      <img src="{{asset('/image/postmark.png')}}" class="postmark">
    </div>

    <div class="title">{{ $ticketinfo->nickname }}</div>



    <!-- bottom -->
    <div class="common_bottom">
        <img src="{{asset('/image/bottom-bar.png')}}">
    </div>
</body>
</html>
