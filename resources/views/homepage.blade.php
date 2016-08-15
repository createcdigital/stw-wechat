@extends('_base_layout')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{asset('/css/journey/common.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('/css/journey/newHost.css')}}" />


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
                    <a href="{{ url('/store')}}/{{ $slider->id }}" >
                        <img class="pc-banner" src="{{ json_decode($slider->photo_list)[0]->photo_url }}">
                    </a>
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
            <li class="host_tabs_li category-tab-focus" data-category="attractions">景点</li>
            <li class="host_tabs_li" data-category="food">美食</li>
            <li class="host_tabs_li" data-category="shipping">购物</li>
            <li class="host_tabs_li" data-category="entertainment">娱乐</li>
        </ul>
    </div>

    <div class="host_stores">
        <ul class="host_stores_ul category-list attractions">
            @forelse ($attractionsList as $item)
            <a href="{{ url('/store') }}/{{$item['store_id']}}">
            <li style="background-image: url('{{$item['image']}}'); background-repeat:no-repeat;">
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
        <ul class="category-list food">
            @forelse ($foodList as $item)
                <a href="{{ url('/store') }}/{{$item['store_id']}}">
                <li style="background-image: url('{{$item['image']}}'); background-repeat:no-repeat;">
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
                <li style="background-image: url('{{$item['image']}}'); background-repeat:no-repeat;">
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
                <li style="background-image: url('{{$item['image']}}'); background-repeat:no-repeat;">
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
    <script  type="text/javascript" src="{{asset('/js/homepage.js')}}"></script>
@endsection


@section('wechatshare')
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