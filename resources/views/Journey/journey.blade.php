<meta charset="UTF-8">
<html>
  <head>
    <meta name="viewport" content="width=device-width,initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  	<title>旅游美食</title>
    <link rel="stylesheet" type="text/css" href="{{asset('/css/journey/journey.css')}}" />
    <script  type="text/javascript" src="{{asset('/js/jquery.min.js')}}"></script>
    <script  type="text/javascript" src="{{asset('/js/journey.js')}}"></script>
  </head>

  <body>
    <!-- banner -->
    <div class="host-banner"><img src="http://stwadmin.createcdigital.com/pic/57a30f214877347e1ecae5f49fde00c50aa8c19b5e322"></div>
    <!-- tabs -->
    <div class="host-navigate">
      <ul class="host-navigate-ul">
        <li id="tab-scenery" style="border-bottom:3px solid rgb(38, 182, 109);">景点</li>
        <li id="tab-food">美食</li>
        <li id="tab-entertainment">娱乐</li>
        <li id="tab-stay">住宿</li>
      </ul>
    </div>
    <!-- 景点 -->
    <div class="host-list tab-scenery" >
      <ul class="host-list-ul">
        <?php foreach ($scenery as $key => $value){?>
        <a href="detail/<?=$value->id; ?>">
        <li>
          <div class="host-list-content">
            <div class="list-content-img"><img src="<?=$value->photo;?>"></div>
            <div class="list-content-text">
              <p><?= $value->business_name; ?></p>
              <span><?= $value->quantity_sold; ?>人已领取</span>
            </div>
            <button>领取</button>
          </div>
        </li>
        </a>
        <?php } ?>
      </ul>
    </div>
    <!-- 美食 -->
    <div class="host-list tab-food" style="display:none;">
      <ul class="host-list-ul">
        <?php foreach ($food as $key => $value){?>
        <a href="detail/<?=$value->id; ?> ">
        <li>
          <div class="host-list-content">
            <div class="list-content-img"><img src="<?=$value->photo;?>"></div>
            <div class="list-content-text">
              <p><?= $value->business_name; ?></p>
              <span><?= $value->quantity_sold; ?>人已领取</span>
            </div>
            <button>领取</button>
          </div>
        </li>
        </a>
        <?php } ?>
      </ul>
    </div>
    <!-- 娱乐 -->
    <div class="host-list tab-entertainment" style="display:none;">
      <ul class="host-list-ul">
        <?php foreach ($entertainment as $key => $value){?>
        <a href="detail/<?=$value->id; ?> ">
        <li>
          <div class="host-list-content">
            <div class="list-content-img"><img src="<?=$value->photo;?>"></div>
            <div class="list-content-text">
              <p><?= $value->business_name; ?></p>
              <span><?= $value->quantity_sold; ?>人已领取</span>
            </div>
            <button>领取</button>
          </div>
        </li>
        </a>
        <?php } ?>
      </ul>
    </div>
    <!-- 住宿 -->
    <div class="host-list tab-stay" style="display:none;">
      <ul class="host-list-ul">
        <?php foreach ($stay as $key => $value){?>
        <a href="detail/<?=$value->id; ?> ">
        <li>
          <div class="host-list-content">
            <div class="list-content-img"><img src="<?=$value->photo;?>"></div>
            <div class="list-content-text">
              <p><?= $value->business_name; ?></p>
              <span><?= $value->quantity_sold; ?>人已领取</span>
            </div>
            <button>领取</button>
          </div>
        </li>
        </a>
        <?php } ?>
      </ul>
    </div>

  </body>
</html>
