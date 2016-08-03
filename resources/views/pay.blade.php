<!DOCTYPE html>
<html>
    <head>
        <title>支付页面</title>
        <style>

        </style>
        <script type="text/javascript">
                //调用微信JS api 支付
                // openid: {{ $openid }}
                function jsApiCall()
                {
                    WeixinJSBridge.invoke('getBrandWCPayRequest', {{ $paymentjs }}, function(res){
                            if(res.err_msg == "get_brand_wcpay_request：ok" ) {
                                alert("success");
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
    </head>
    <body>
        <br/>
        <p color="#9ACD32"><b>该笔订单支付金额为<span style="color:#f00;font-size:50px">1分</span>钱</b></p><br/><br/>
        <div align="center">
            <button style="width:210px; height:50px; border-radius: 15px;background-color:#FE6714; border:0px #FE6714 solid; cursor: pointer;  color:white;  font-size:16px;" type="button" onclick="callpay()" >立即支付</button>
        </div>
    </body>
</html>
