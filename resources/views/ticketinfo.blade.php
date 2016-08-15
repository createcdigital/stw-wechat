<meta charset="UTF-8">
<html>
  <head>
    <meta name="viewport" content="width=device-width,initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  	<title>stw-wechat</title>
    <link rel="stylesheet" type="text/css" href="{{asset('/css/journey/ticketinfo.css')}}" />
  </head>
  <body>

    <div class="ticket_content">
      <header>
        <p><img src="<?php if(!empty($ticketInfo[0])){echo $ticketInfo[0]->headimgurl;}?>"></p>
      </header>
      <div class="ticket_content_name"><?php if(!empty($ticketInfo[0])){echo $ticketInfo[0]->nickname;}?></div>
      <section>
        <ul class="ticket_section_ul">
          <li>
            <p>套餐名称</p>
            <div class="section_li_text"><?php if(!empty($ticketInfo[0])){echo $ticketInfo[0]->coupon_title;}?></div>
          </li>
          <li>
            <p>套餐价格</p>
            <span>$<?php if(!empty($ticketInfo[0])){echo $ticketInfo[0]->coupon_set_price;}?>
                （¥<?php if(!empty($ticketInfo[0])){echo $ticketInfo[0]->coupon_cny_price;}?>）</span>
          </li>
          <li>
            <p>支付状态</p>
            <span><?php if(!empty($ticketInfo[0])){if($ticketInfo[0]->pay_status == 0){echo "未支付";}else{echo "已支付";}}?></span>
          </li>
          <li>
            <p>购买时间</p>
            <span><?php if(!empty($ticketInfo[0])){echo $ticketInfo[0]->created_at;}?></span>
          </li>
        </ul>
      </section>
      <footer>------支付信息-------</footer>

    </div>

  </body>

</html>
