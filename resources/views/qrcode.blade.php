 @extends('_base_layout')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{asset('/css/journey/proof.css')}}" />
@endsection


@section('content')
    <div class="container">
      <div class="p1">支付凭证</div>
      <div class="p2">截屏保存此页到相册,并妥善保管</div>
      <div id="qrcode" class="qrcode"></div>
      <div class="modal"></div>
      <div class="hit">分享页面后可见二维码</div>
    </div>

    <div class="help">
      <div>优惠券使用流程:</div>
      <div class="wrap-item">
        <div class="item">分享朋友圈截屏二维码凭证</div>
        <div class="d">&gt;</div>
        <div class="item">到达景点后出示二维码凭证</div>
        <div class="d">&gt;</div>
        <div class="item">完成购票</div>
      </div>
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
      wx.ready(function () {

        wx.onMenuShareTimeline({
          title: 'SHAKE TO WIN',
          link: 'http://stwweixin.createcdigital.com/',
          imgUrl: '{{ asset('img/share-icon.png') }}',
          success: function () {
            $(".modal").hide();
          },
          cancel: function () {
          }
        });
        wx.onMenuShareAppMessage({
          title: 'SHAKE TO WIN',
          title: 'SHAKE TO WIN',
          link: 'http://stwweixin.createcdigital.com/',
          imgUrl: '{{ asset('img/share-icon.png') }}',
          success: function () {
            $(".modal").hide();
          },
          cancel: function () {

          }
        });
        wx.onMenuShareQQ({
          title: 'SHAKE TO WIN',
          title: 'SHAKE TO WIN',
          link: 'http://stwweixin.createcdigital.com/',
          imgUrl: '{{ asset('img/share-icon.png') }}',
          success: function () {
            $(".modal").hide();
          },
          cancel: function () {
          }
        });
        wx.onMenuShareWeibo({
          title: 'SHAKE TO WIN',
          title: 'SHAKE TO WIN',
          link: 'http://stwweixin.createcdigital.com/',
          imgUrl: '{{ asset('img/share-icon.png') }}',
          success: function () {
            $(".modal").hide();
          },
          cancel: function () {
          }
        });

      });
    </script>
@endsection
