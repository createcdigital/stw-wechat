<meta charset="UTF-8">
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  	<title>旅游美食</title>
    <link rel="stylesheet" type="text/css" href="{{asset('css/journey/proof.css')}}" />
    <script type="text/javascript" src="{{asset('/js/jquery.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('/js/qrcode.js')}}"></script>
  </head>

  <body>
    <div class="proof-header">
      <a href="#"><</a>
      <span>支付凭证</span>
    </div>

    <div class="proof-content">
      <div class="proof-barcode">
        <header>请对此进行页面截屏,并妥善保管</header>
        <section>
            <div id="qrcode"></div>
            <div class="modal"></div>
        </section>
      </div>
    </div>
    <div class="proof-flow">
      <div class="proof-flow-content">
        <header>优惠券使用流程:</header>
        <section>
          <ul class="proof-flow-section-ul">
            <li><p>分享朋友圈截屏二维码凭证</p></li>
            <li><p>到达景点后出示二维码凭证</p></li>
            <li><p style="margin-top:25%;font-size:38px;">完成购票</p></li>
            <span class="flow-left-arrow">></span>
            <span class="flow-right-arrow">></span>
          </ul>
        </section>
      </div>
    </div>

    <!-- qrcode-js -->
    <script type="text/javascript">
      // 设置参数方式
      (function(){
        var qrcode = new QRCode('qrcode', {
          //text: 'ymc',
          width: 640,
          height: 640,
          colorDark : '#000000',
          colorLight : '#ffffff',
          correctLevel : QRCode.CorrectLevel.H
        });
        // 使用 API
        qrcode.clear();
        qrcode.makeCode('{{ $qrcodeurl }}');
      })();
    </script>
    <script src="https://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
    <script type="text/javascript" charset="utf-8">
      wx.config(<?php echo $jssdk->config(array('onMenuShareTimeline', 'onMenuShareAppMessage', 'onMenuShareQQ', 'onMenuShareWeibo'), false) ?>);
    </script>
    <script language="javascript">
      wx.ready(function () {

        wx.onMenuShareTimeline({
          title: 'SHAKE TO WIN',
          link: 'http://stwweixin.createcdigital.com/journey',
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
          link: 'http://stwweixin.createcdigital.com/journey',
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
          link: 'http://stwweixin.createcdigital.com/journey',
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
          link: 'http://stwweixin.createcdigital.com/journey',
          imgUrl: '{{ asset('img/share-icon.png') }}',
          success: function () {
            $(".modal").hide();
          },
          cancel: function () {
          }
        });

      });
    </script>

  </body>
</html>
