@extends('_base_layout')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{asset('/css/common.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('/css/qrcode.css')}}" />
    @endsection


    @section('content')
    <!-- header -->
    <div class="common_header">
        <div class="common_header_left">
            <button>凯恩斯</button>
        </div>
        <div class="common_header_right">
            <div class="common_header_pattern"> <img src="{{asset('/img/weather.jpg')}}"></div>
            <div class="common_header_temperature">22<span class="d">°C</span></div>
        </div>
    </div>

    <!-- qrcode_container -->

    <div class="qrcode_container">
      <div class="qrcode_container_code">
        <div class="qrcode_container_code_img">
          <div class="qrcode_container_code_img_up" id="qrcode">
          </div>
        <div class="qrcode_container_code_img_down">分享到朋友圈可见二维码！</div>
        <div class="qrcode_container_code_img_down">截屏此页，并妥善保存！</div>
        </div>
      </div>
      <img src="{{asset('/img/postmark.png')}}" class="postmark">
    </div>



    <!-- bottom -->
    <div class="common_bottom">
        <img src="{{asset('/img/bottom-bar.png')}}">
    </div>
@endsection

@section('js')
    <script  type="text/javascript" src="{{asset('/js/qrcode.js')}}"></script>
    <script type="text/javascript">
        (function(){
            var qrcode = new QRCode('qrcode', {
                //text: 'ymc',
                width: 300,
                height: 300,
                colorDark : '#000000',
                colorLight : '#ffffff',
                correctLevel : QRCode.CorrectLevel.H
            });

            qrcode.clear();
            qrcode.makeCode('{{ $qrcodeurl }}');
        })();
    </script>
@endsection

@section('wechatshare')
    <script language="javascript">
        function removeBlur()
        {
            $(".qrcode_container_code_img_up").find("img").css('-webkit-filter', 'blur(0px)');
        }

        wx.ready(function () {

            wx.onMenuShareTimeline({
                title: '我成功抢购了凯恩斯的优惠卷一张！准备好跟我一起出发吧！',
                link: 'http://stwweixin.createcdigital.com',
                imgUrl: '{{ asset('img/share-icon.png') }}',
                success: function () {
                    removeBlur();
                },
                cancel: function () {
                }
            });
            wx.onMenuShareAppMessage({
                title: '凯恩斯STW疯享优惠',
                desc: '我成功抢购了凯恩斯的优惠卷一张！准备好跟我一起出发吧！',
                link: 'http://stwweixin.createcdigital.com/',
                imgUrl: '{{ asset('img/share-icon.png') }}',
                success: function () {
                    removeBlur();
                },
                cancel: function () {

                }
            });
            wx.onMenuShareQQ({
                title: '凯恩斯STW疯享优惠',
                desc: '我成功抢购了凯恩斯的优惠卷一张！准备好跟我一起出发吧！',
                link: 'http://stwweixin.createcdigital.com/',
                imgUrl: '{{ asset('img/share-icon.png') }}',
                success: function () {
                    removeBlur();
                },
                cancel: function () {
                }
            });
            wx.onMenuShareWeibo({
                title: '凯恩斯STW疯享优惠',
                desc: '我成功抢购了凯恩斯的优惠卷一张！准备好跟我一起出发吧！',
                link: 'http://stwweixin.createcdigital.com/',
                imgUrl: '{{ asset('img/share-icon.png') }}',
                success: function () {
                    removeBlur();
                },
                cancel: function () {
                }
            });

        });
    </script>
@endsection