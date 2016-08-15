@extends('_base_layout')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{asset('/css/journey/common.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('/css/journey/newInfo.css')}}" />


@endsection


@section('content')
    <div class="common_header">
        <div class="common_header_left">
            <button>{{ $store_name }}</button>
        </div>
        <div class="common_header_right">
            <div class="common_header_pattern"> <img src="{{asset('/image/weather.jpg')}}"></div>
            <div class="common_header_temperature">22<span class="d">°C</span></div>

        </div>


    </div>

    <!-- banner -->
    <div class="host_banner">
        <ul class="c scrolling">
            <li  class="cur">
                <img class="pc-banner" src="{{ $slider }}">
            </li>
        </ul>
        <div class="scroll-nav">
        </div>
    </div>

    <!-- 详细介绍-->
    <div class="info_intro">
        <header><button>详情介绍</button></header>
        <section>
            <div class="intro_section_left">
                <div class="intro_section_left_img"><img src="{{ $slider }}"></div>
            </div>
            <div class="intro_section_right">
                <p>{{ str_limit($package["description"], $limit = 230, $end = '...') }}</p>
            </div>
        </section>


    </div>
    <!-- 人数选择器 -->
    <div class="chose_persons">
        <div class="chose_persons_content">
            <header>选择人数</header>
            <section>
                <div class="chose_persons_section_left">
                    <section>
                        <span>成人</span>
                        <ul>
                            <li>-</li>
                            <li class="current">1</li>
                            <li>+</li>
                        </ul>
                    </section>
                    <footer>
                        <span>儿童</span>
                        <ul>
                            <li>-</li>
                            <li class="current">0</li>
                            <li>+</li>
                        </ul>
                    </footer>

                </div>
                <div class="chose_persons_section_right">
                    <a href="javascript:callpay();">
                        <div class="chose_section_right_button">立即购买</div>
                    </a>
                </div>
            </section>
        </div>
    </div>

    <!-- 相关优惠 -->
    <div class="related_discount">
        <header><button>相关优惠</button></header>
        <ul class="related_discount_ul">
            @foreach ($foodList as $item)
            <li>
                <a href="{{ url('/store') }}/{{$item['store_id']}}">
                <div class="related_discount_ul_img">
                    <header><img src="{{$item['image']}}"></header>
                    <footer>
                        <header>{{ $item['packageCount'] }}个套餐</header>
                        <section>{{ $item['startPrice'] }}</section>
                        <footer>起</footer>
                    </footer>
                </div>
                </a>
            </li>
            @endforeach

            @foreach ($shippingList as $item)
            <li>
                <a href="{{ url('/store') }}/{{$item['store_id']}}">
                <div class="related_discount_ul_img">
                    <header><img src="{{$item['image']}}"></header>
                    <footer>
                        <header>{{ $item['packageCount'] }}个套餐</header>
                        <section>{{ $item['startPrice'] }}</section>
                        <footer>起</footer>
                    </footer>
                </div>
                </a>
            </li>
            @endforeach

            @foreach ($entertainmentList as $item)
            <li>
                <a href="{{ url('/store') }}/{{$item['store_id']}}">
                <div class="related_discount_ul_img">
                    <header><img src="{{$item['image']}}"></header>
                    <footer>
                        <header>{{ $item['packageCount'] }}个套餐</header>
                        <section>{{ $item['startPrice'] }}</section>
                        <footer>起</footer>
                    </footer>
                </div>
                </a>
            </li>
            @endforeach
        </ul>

    </div>


    <!-- bottom -->
    <div class="common_bottom">
        <img src="{{asset('/image/bottom-bar.png')}}">
    </div>

@endsection


@section('js')
    <script  type="text/javascript" src="{{asset('/js/coupon-index.js')}}"></script>
@endsection


@section('wechatshare')
    <script type="text/javascript">
        //调用微信JS api 支付
        function jsApiCall()
        {
            WeixinJSBridge.invoke('getBrandWCPayRequest', {!! $paymentjs !!}, function(res){
                        if(res.err_msg == "get_brand_wcpay_request:ok" ) {
                            window.location.href = '{{ $qrcodeurl }}';
                        }else{
                            alert("Payment Declined!");
                        }
                    }
            );
        }
        function callpay()
        {
            if (typeof WeixinJSBridge == "undefined"){
                if( document.addEventListener ){
                    document.addEventListener('WeixinJSBridgeReady', jsApiCall, false);
                }else if (document.attachEvent){
                    document.attachEvent('WeixinJSBridgeReady', jsApiCall);
                    document.attachEvent('onWeixinJSBridgeReady', jsApiCall);
                }
            }else{
                jsApiCall();
            }
        }
    </script>
    <script language="javascript">
        wx.ready(function () {


            wx.onMenuShareTimeline({
                title: 'SHAKE TO WIN',
                link: 'http://stwweixin.createcdigital.com',
                imgUrl: '{{ asset('img/share-icon.png') }}',
                success: function () {
                },
                cancel: function () {
                }
            });
            wx.onMenuShareAppMessage({
                title: 'SHAKE TO WIN',
                title: 'SHAKE TO WIN',
                link: 'http://stwweixin.createcdigital.com',
                imgUrl: '{{ asset('img/share-icon.png') }}',
                success: function () {

                },
                cancel: function () {

                }
            });
            wx.onMenuShareQQ({
                title: 'SHAKE TO WIN',
                title: 'SHAKE TO WIN',
                link: 'http://stwweixin.createcdigital.com',
                imgUrl: '{{ asset('img/share-icon.png') }}',
                success: function () {

                },
                cancel: function () {
                }
            });
            wx.onMenuShareWeibo({
                title: 'SHAKE TO WIN',
                title: 'SHAKE TO WIN',
                link: 'http://stwweixin.createcdigital.com',
                imgUrl: '{{ asset('img/share-icon.png') }}',
                success: function () {

                },
                cancel: function () {
                }
            });

        });
    </script>
@endsection