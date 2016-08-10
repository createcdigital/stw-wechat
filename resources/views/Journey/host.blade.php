<meta charset="UTF-8">
<html>
  <head>
    <meta name="viewport" content="width=device-width,initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  	<title>stw-wechat</title>
    <link rel="stylesheet" type="text/css" href="{{asset('/css/host.css')}}" />
    <script  type="text/javascript" src="{{asset('/js/jquery.min.js')}}"></script>
    <script  type="text/javascript" src="{{asset('/js/host.js')}}"></script>
  </head>
  <body>

    <!-- banner -->
    <div class="host_banner">
      <ul class="c scrolling">
        <li  class="cur">
          <a href="detail/<?php if(!empty($scenery[0])){echo $scenery[0]->id;}else{ echo 1;}?>" >
            <img class="pc-banner" src="<?php if(!empty($scenery[0])){echo $scenery[0]->photo;}?>">
          </a>
        </li>
        <li  class="cur">
          <a href="detail/<?php if(!empty($food[0])){echo $food[0]->id;}else{ echo 1;}?>" >
            <img class="pc-banner" src="<?php if(!empty($food[0])){echo $food[0]->photo;}?>">
          </a>
        </li>
        <li  class="cur">
          <a href="detail/<?php if(!empty($stay[0])){echo $stay[0]->id;}else{ echo 1;}?>" >
            <img class="pc-banner" src="<?php if(!empty($stay[0])){echo $stay[0]->photo;}?>">
          </a>
        </li>
      </ul>
      <div class="scroll-nav">
      </div>
    </div>

    <!-- host_tab -->
    <div class="host_tab">
      <ul class="host_tab_ul">
        <li id="tab-scenery" style="color:#8CC153;">景点</li>
        <li id="tab-food" >美食</li>
        <li id="tab-stay" >购物</li>
        <li id="tab-entertainment" >娱乐</li>
      </ul>
    </div>


    <!-- stores_info -->
    <div class="host_content tab-scenery">
      <?php foreach ($scenery as $key => $value){?>
      <a href="detail/<?=$value->id; ?> ">
        <div class="host_content_text">
          <div class="text_contain">
            <div class="content_text_img">
              <img src="<?=$value->photo;?>">
              <div class="text_img_get">领取</div>
              <!-- <button>立即领取</button> -->
            </div>
            <div class="content_text_info">
              <header><?= $value->business_name; ?></header>
              <span><?= $value->quantity_sold; ?>人已领取</span>
            </div>
          </div>
        </div>
      </a>
      <?php } ?>
    </div>

    <div class="host_content tab-food" style="display:none">
      <?php foreach ($food as $key => $value){?>
      <a href="detail/<?=$value->id; ?> ">
        <div class="host_content_text">
          <div class="text_contain">
            <div class="content_text_img">
              <img src="<?=$value->photo;?>">
              <div class="text_img_get">领取</div>
              <!-- <button>立即领取</button> -->
            </div>
            <div class="content_text_info">
              <header><?= $value->business_name; ?></header>
              <span><?= $value->quantity_sold; ?>人已领取</span>
            </div>
          </div>
        </div>
      </a>
      <?php } ?>
    </div>

    <div class="host_content tab-entertainment" style="display:none">
      <?php foreach ($entertainment as $key => $value){?>
      <a href="detail/<?=$value->id; ?> ">
        <div class="host_content_text">
          <div class="text_contain">
            <div class="content_text_img">
              <img src="<?=$value->photo;?>">
              <div class="text_img_get">领取</div>
              <!-- <button>立即领取</button> -->
            </div>
            <div class="content_text_info">
              <header><?= $value->business_name; ?></header>
              <span><?= $value->quantity_sold; ?>人已领取</span>
            </div>
          </div>
        </div>
      </a>
      <?php } ?>
    </div>

    <div class="host_content tab-stay" style="display:none">
      <?php foreach ($stay as $key => $value){?>
      <a href="detail/<?=$value->id; ?> ">
        <div class="host_content_text">
          <div class="text_contain">
            <div class="content_text_img">
              <img src="<?=$value->photo;?>">
              <div class="text_img_get">领取</div>
              <!-- <button>立即领取</button> -->
            </div>
            <div class="content_text_info">
              <header><?= $value->business_name; ?></header>
              <span><?= $value->quantity_sold; ?>人已领取</span>
            </div>
          </div>
        </div>
      </a>
      <?php } ?>
    </div>

    <!-- banner_js -->
    <script>
        $(function(){
          $('.host_banner').scrolling();
        })
    </script>

  </body>

</html>
