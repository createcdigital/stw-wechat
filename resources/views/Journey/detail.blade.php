
<meta charset="UTF-8">
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="_token" content="{{ csrf_token() }}"/>
  	<title>旅游美食</title>
    <link rel="stylesheet" type="text/css" href="{{asset('/css/journey/detail.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('/css/lrzj.css')}}" />
    <script  type="text/javascript" src="{{asset('js/jquery.min.js')}}"></script>
    <script  type="text/javascript" src="{{asset('js/event.drag.min.js')}}"></script>
    <script  type="text/javascript" src="{{asset('js/touchSlider.js')}}"></script>
  </head>

  <body>
    <!-- header -->
    <div class="detail-header">
      <a href="{{url('host')}}"><</a>
    <span>优惠详情</span>
    </div>
    <!-- Banner滑动 -->
    <div class="main_visual detail-banner">
      <div class="flicking_con">
        <div class="flicking_inner">
          <?php if(!empty($stores)){foreach ($stores[0]->photo_array as $key => $value) { ?>
              <a class="" href="javascript:">1</a>
          <?php }}?>
        </div>
      </div>
			<div style="" class="main_image">
				<ul style="width: 1920px; overflow: visible;">
          <?php if(!empty($stores)){foreach ($stores[0]->photo_array as $key => $value) { ?>
  					<li style="float: none; display: block; position: absolute; top: 0px; left: 0px; width: 1455px;">
              <span><img src="<?= $value->photo_url; ?>"></span>
            </li>
          <?php }}?>
				</ul>
			</div>
		</div>

    <!-- 产品信息-->
    <div class="detail-text">
      <div class="detail-text-info">
        <p coupon_title="<?php if(!empty($stores)){echo $stores[0]->title;} ?>" ><?php if(!empty($stores)){echo $stores[0]->title;} ?></p>
        <span><?php if(!empty($stores)){echo $stores[0]->quantity_sold;} ?>人领取</span>
      </div>
    </div>
    <!-- 支付信息 -->
    <div class="detail-pay">
      <ul class="detail-pay-ul">

        <?php if(!empty($stores)&& !empty($stores[0]->set1_name)){ ?>
          <li coupon_id="<?php if(!empty($stores)){echo $stores[0]->id;} ?>" set_name="<?=trim($stores[0]->set1_name);?>" set_price="<?=trim($stores[0]->set1_price);?>">
            <img src="{{asset('image/bingo.png')}}">
            <span>
              <?=trim($stores[0]->set1_name);?>
              <?=trim($stores[0]->set1_price);?>￥
            </span>
            <a>微信支付</a>
          </li>
        <?php }?>

        <?php if(!empty($stores)&& !empty($stores[0]->set2_name)){ ?>
          <li coupon_id="<?php if(!empty($stores)){echo $stores[0]->id;} ?>" set_name="<?=trim($stores[0]->set2_name);?>" set_price="<?=trim($stores[0]->set2_price);?>">
            <img src="{{asset('image/bingo.png')}}">
            <span>
              <?=trim($stores[0]->set2_name);?>
              <?=trim($stores[0]->set2_price);?>￥
            </span>
            <a>微信支付</a>
          </li>
        <?php }?>

        <?php if(!empty($stores)&& !empty($stores[0]->set3_name)){ ?>
          <li coupon_id="<?php if(!empty($stores)){echo $stores[0]->id;} ?>" set_name="<?=trim($stores[0]->set3_name);?>" set_price="<?=trim($stores[0]->set3_price);?>">
            <img src="{{asset('image/bingo.png')}}">
            <span>
              <?=trim($stores[0]->set3_name);?>
              <?=trim($stores[0]->set3_price);?>￥
            </span>
            <a>微信支付</a>
          </li>
        <?php }?>

        <?php if(!empty($stores)&& !empty($stores[0]->set4_name)){ ?>
          <li coupon_id="<?php if(!empty($stores)){echo $stores[0]->id;} ?>" set_name="<?=trim($stores[0]->set4_name);?>" set_price="<?=trim($stores[0]->set4_price);?>">
            <img src="{{asset('image/bingo.png')}}">
            <span>
              <?=trim($stores[0]->set4_name);?>
              <?=trim($stores[0]->set4_price);?>￥
            </span>
            <a>微信支付</a>
          </li>
        <?php }?>

      </ul>
    </div>

    <!-- 产品详情 -->
    <div class="detail-specifics">
      <header>详情: </header>
      <section><?php if(!empty($stores)){echo $stores[0]->description;} ?></section>
      <footer>
        <p>营业时间: <span><?php if(!empty($stores)){echo $stores[0]->open_time;} ?></span></p>
        <p>服务电话: <span><?php if(!empty($stores)){echo $stores[0]->service_phone;} ?></span></p>
      </footer>
    </div>
  </body>
  <script type="text/javascript">
    //调用微信JS api 支付
    function jsApiCall()
    {
      WeixinJSBridge.invoke('getBrandWCPayRequest', {!! $paymentjs !!}, function(res){
                if(res.err_msg == "get_brand_wcpay_request:ok" ) {
                  //alert("/proof");
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
  <!-- Banner滑动的JS -->
  <script>
      $(document).ready(function () {
        $(".main_visual").hover(function(){
          $("#btn_prev,#btn_next").fadeIn()
          },function(){
          $("#btn_prev,#btn_next").fadeOut()
          })
        $dragBln = false;
        $(".main_image").touchSlider({
          flexible : true,
          speed : 200,
          btn_prev : $("#btn_prev"),
          btn_next : $("#btn_next"),
          paging : $(".flicking_con a"),
          counter : function (e) {
            $(".flicking_con a").removeClass("on").eq(e.current-1).addClass("on");
          }
        });
        $(".main_image").bind("mousedown", function() {
          $dragBln = false;
        })
        $(".main_image").bind("dragstart", function() {
          $dragBln = true;
        })

        $(".detail-pay-ul li").click(function(){
          callpay();
        });
      });
  </script>
</html>
