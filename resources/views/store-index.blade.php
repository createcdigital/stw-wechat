@extends('_base_layout')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{asset('/css/journey/common.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('/css/journey/newCoupon.css')}}" />


@endsection


@section('content')
    <div class="common_header">
        <div class="common_header_left">
            <button>凯恩斯</button>
        </div>
        <div class="common_header_right">
            <div class="common_header_pattern"> <img src="{{asset('/image/weather.jpg')}}"></div>
            <div class="common_header_temperature">22<span class="d">°C</span></div>

        </div>


    </div>

    <!-- banner -->
    <div class="host_banner">
        <ul class="c scrolling">
            @forelse ($sliderList as $slider)
                <li  class="cur">
                        <img class="pc-banner" src="{{ $slider->photo_url }}">
                </li>
            @empty
                <p class="null-data">暂时没有数据</p>
            @endforelse
        </ul>
        <div class="scroll-nav">
        </div>
    </div>


    <div class="host_tabs">
        <ul class="host_tabs_ul">
            <li class="host_tabs_li category-tab-focus" data-category="coupon">景点</li>
            <li class="host_tabs_li" data-category="food">美食</li>
            <li class="host_tabs_li" data-category="shipping">购物</li>
            <li class="host_tabs_li" data-category="entertainment">娱乐</li>
        </ul>
    </div>

    <div class="coupon_content">
        <ul class="category-list coupon coupon_content_ul">
            @if ($coupon->package_a_title != "")
            <a href="{{ url('/coupon/') }}/{{$coupon->id}}&a">
            <li>
                <div class="coupon_content_li_left">优惠套餐A</div>
                <!--  <div class="coupon_content_li_left_side"></div>-->
                <div class="coupon_content_li_mid">
                    <div class="content_li_mid_img">
                        <img src="{{ $coupon->package_a_image }}" />
                    </div>
                </div>
                <div class="coupon_content_li_right">
                    <header>{{ $coupon->package_a_available_date }}</header>
                    <section>{{ str_limit($coupon->package_a_title, $limit = 20, $end = '...') }}</section>
                    <footer>
                        <div class="coupon_li_footer_button">立即购买</div>
                    </footer>
                </div>
            </li>
            </a>
            @endif

            @if ($coupon->package_b_title != "")
            <a href="{{ url('/coupon/') }}/{{$coupon->id}}&b">
                <li>
                    <div class="coupon_content_li_left">优惠套餐B</div>
                    <!--  <div class="coupon_content_li_left_side"></div>-->
                    <div class="coupon_content_li_mid">
                        <div class="content_li_mid_img">
                            <img src="{{ $coupon->package_b_image }}" />
                        </div>
                    </div>
                    <div class="coupon_content_li_right">
                        <header>{{ $coupon->package_b_available_date }}</header>
                        <section>{{ str_limit($coupon->package_b_title, $limit = 20, $end = '...') }}</section>
                        <footer>
                            <div class="coupon_li_footer_button">立即购买</div>
                        </footer>
                    </div>
                </li>
            </a>
            @endif

            @if ($coupon->package_c_title != "")
            <a href="{{ url('/coupon/') }}/{{$coupon->id}}&c">
                <li>
                    <div class="coupon_content_li_left">优惠套餐C</div>
                    <!--  <div class="coupon_content_li_left_side"></div>-->
                    <div class="coupon_content_li_mid">
                        <div class="content_li_mid_img">
                            <img src="{{ $coupon->package_c_image }}" />
                        </div>
                    </div>
                    <div class="coupon_content_li_right">
                        <header>{{ $coupon->package_c_available_date }}</header>
                        <section>{{ str_limit($coupon->package_c_title, $limit = 20, $end = '...') }}</section>
                        <footer>
                            <div class="coupon_li_footer_button">立即购买</div>
                        </footer>
                    </div>
                </li>
           </a>
            @endif

            @if ($coupon->package_d_title != "")
            <a href="{{ url('/coupon/') }}/{{$coupon->id}}&d">
                <li>
                    <div class="coupon_content_li_left">优惠套餐D</div>
                    <!--  <div class="coupon_content_li_left_side"></div>-->
                    <div class="coupon_content_li_mid">
                        <div class="content_li_mid_img">
                            <img src="{{ $coupon->package_d_image }}" />
                        </div>
                    </div>
                    <div class="coupon_content_li_right">
                        <header>{{ $coupon->package_d_available_date }}</header>
                        <section>{{ str_limit($coupon->package_d_title, $limit = 20, $end = '...') }}</section>
                        <footer>
                            <div class="coupon_li_footer_button">立即购买</div>
                        </footer>
                    </div>
                </li>
            </a>
            @endif

            @if ($coupon->package_e_title != "")
            <a href="{{ url('/coupon/') }}/{{$coupon->id}}&e">
                <li>
                    <div class="coupon_content_li_left">优惠套餐E</div>
                    <!--  <div class="coupon_content_li_left_side"></div>-->
                    <div class="coupon_content_li_mid">
                        <div class="content_li_mid_img">
                            <img src="{{ $coupon->package_e_image }}" />
                        </div>
                    </div>
                    <div class="coupon_content_li_right">
                        <header>{{ $coupon->package_e_available_date }}</header>
                        <section>{{ str_limit($coupon->package_e_title, $limit = 20, $end = '...') }}</section>
                        <footer>
                            <div class="coupon_li_footer_button">立即购买</div>
                        </footer>
                    </div>
                </li>
            </a>
            @endif

            @if ($coupon->package_f_title != "")
            <a href="{{ url('/coupon/') }}/{{$coupon->id}}&f">
                <li>
                    <div class="coupon_content_li_left">优惠套餐F</div>
                    <!--  <div class="coupon_content_li_left_side"></div>-->
                    <div class="coupon_content_li_mid">
                        <div class="content_li_mid_img">
                            <img src="{{ $coupon->package_f_image }}" />
                        </div>
                    </div>
                    <div class="coupon_content_li_right">
                        <header>{{ $coupon->package_f_available_date }}</header>
                        <section>{{ str_limit($coupon->package_f_title, $limit = 20, $end = '...') }}</section>
                        <footer>
                            <div class="coupon_li_footer_button">立即购买</div>
                        </footer>
                    </div>
                </li>
            </a>
            @endif

            @if ($coupon->package_g_title != "")
            <a href="{{ url('/coupon/') }}/{{$coupon->id}}&g">
                <li>
                    <div class="coupon_content_li_left">优惠套餐G</div>
                    <!--  <div class="coupon_content_li_left_side"></div>-->
                    <div class="coupon_content_li_mid">
                        <div class="content_li_mid_img">
                            <img src="{{ $coupon->package_g_image }}" />
                        </div>
                    </div>
                    <div class="coupon_content_li_right">
                        <header>{{ $coupon->package_g_available_date }}</header>
                        <section>{{ str_limit($coupon->package_g_title, $limit = 20, $end = '...') }}</section>
                        <footer>
                            <div class="coupon_li_footer_button">立即购买</div>
                        </footer>
                    </div>
                </li>
            </a>
            @endif

            @if ($coupon->package_h_title != "")
            <a href="{{ url('/coupon/') }}/{{$coupon->id}}&h">
                <li>
                    <div class="coupon_content_li_left">优惠套餐H</div>
                    <!--  <div class="coupon_content_li_left_side"></div>-->
                    <div class="coupon_content_li_mid">
                        <div class="content_li_mid_img">
                            <img src="{{ $coupon->package_h_image }}" />
                        </div>
                    </div>
                    <div class="coupon_content_li_right">
                        <header>{{ $coupon->package_h_available_date }}</header>
                        <section>{{ str_limit($coupon->package_h_title, $limit = 20, $end = '...') }}</section>
                        <footer>
                            <div class="coupon_li_footer_button">立即购买</div>
                        </footer>
                    </div>
                </li>
            </a>
            @endif
        </ul>
        <ul class="category-list food">
            @forelse ($foodList as $item)
                <a href="{{ url('/store') }}/{{$item['store_id']}}">
                    <li style="background-image: url('{{$item['image']}}')">
                        <div class="host_stores_info"></div>
                        <div class="host_stores_text" style="background-color: #F8A519 ;">
                            <div class="host_stores_text_left">
                                <header>{{ $item['packageCount'] }}个套餐</header>
                                <section>{{ $item['startPrice'] }}</section>
                                <footer>起</footer>

                            </div>
                            <div class="host_stores_text_right">
                                <span>已有{{ $item['purchaseCount'] }}人领取</span>
                            </div>

                        </div>
                    </li>
                </a>
            @empty
                <p class="null-data">暂时没有数据</p>
            @endforelse
        </ul>
        <ul class="category-list shipping">
            @forelse ($shippingList as $item)
                <a href="{{ url('/store') }}/{{$item['store_id']}}">
                    <li style="background-image: url('{{$item['image']}}')">
                        <div class="host_stores_info"></div>
                        <div class="host_stores_text" style="background-color: #F8A519 ;">
                            <div class="host_stores_text_left">
                                <header>{{ $item['packageCount'] }}个套餐</header>
                                <section>{{ $item['startPrice'] }}</section>
                                <footer>起</footer>

                            </div>
                            <div class="host_stores_text_right">
                                <span>已有{{ $item['purchaseCount'] }}人领取</span>
                            </div>

                        </div>
                    </li>
                </a>
            @empty
                <p class="null-data">暂时没有数据</p>
            @endforelse
        </ul>
        <ul class="category-list entertainment">
            @forelse ($entertainmentList as $item)
                <a href="{{ url('/store') }}/{{$item['store_id']}}">
                    <li style="background-image: url('{{$item['image']}}')">
                        <div class="host_stores_info"></div>
                        <div class="host_stores_text" style="background-color: #F8A519 ;">
                            <div class="host_stores_text_left">
                                <header>{{ $item['packageCount'] }}个套餐</header>
                                <section>{{ $item['startPrice'] }}</section>
                                <footer>起</footer>

                            </div>
                            <div class="host_stores_text_right">
                                <span>已有{{ $item['purchaseCount'] }}人领取</span>
                            </div>

                        </div>
                    </li>
                </a>
            @empty
                <p class="null-data">暂时没有数据</p>

            @endforelse
        </ul>
    </div>




    <!-- bottom -->
    <div class="common_bottom">
        <img src="{{asset('/image/bottom-bar.png')}}">
    </div>

@endsection


@section('js')
    <script  type="text/javascript" src="{{asset('/js/bannerscroll.js')}}"></script>
    <script  type="text/javascript" src="{{asset('/js/store-index.js')}}"></script>
@endsection


@section('wechatshare')
    <script language="javascript">
        wx.ready(function () {

            wx.onMenuShareTimeline({
                title: '我抢购了凯恩斯的非凡旅程，爱上绿，恋上蓝，立即出发吧！',
                link: 'http://stwweixin.createcdigital.com',
                imgUrl: '{{ asset('img/share-icon.png') }}',
                success: function () {
                },
                cancel: function () {
                }
            });
            wx.onMenuShareAppMessage({
                title: '凯恩斯STW疯享优惠',
                desc: '我抢购了凯恩斯的非凡旅程，爱上绿，恋上蓝，立即出发吧！',
                link: 'http://stwweixin.createcdigital.com',
                imgUrl: '{{ asset('img/share-icon.png') }}',
                success: function () {

                },
                cancel: function () {

                }
            });
            wx.onMenuShareQQ({
                title: '凯恩斯STW疯享优惠',
                desc: '我抢购了凯恩斯的非凡旅程，爱上绿，恋上蓝，立即出发吧！',
                link: 'http://stwweixin.createcdigital.com',
                imgUrl: '{{ asset('img/share-icon.png') }}',
                success: function () {

                },
                cancel: function () {
                }
            });
            wx.onMenuShareWeibo({
                title: '凯恩斯STW疯享优惠',
                desc: '我抢购了凯恩斯的非凡旅程，爱上绿，恋上蓝，立即出发吧！',
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