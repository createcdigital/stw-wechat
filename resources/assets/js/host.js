//created by Manson  2016/08/09

$(function(){

  $(".host_tab_ul li").click(function(){
    var type = $(this).attr('id');
    $(this).css("color","#8CC153");
    $(this).siblings().css("color","#000");
    $(".host_content").css("display","none");
    $("."+type+"").css("display","block");
  });


//host_banner滑动效果
(function(){

  function bannerScroll($this, option) {
    var options = {
    parent: $this,
    scrollBox: ".scrolling",
    controllerBox: '.scroll-nav',
    tm: 'tm' + Math.random(),
    speed: 2000
    };
    this.options = $.extend(options, option);
    this.init();
    }
    bannerScroll.prototype = {
    init: function() { //构造器
    this.render();
    this.scrollBoxPanl();
    this.controller();
    },
    render: function() { //渲染控制面板
    var me = this;
    $(me.options.controllerBox).html(me.controllerPanel())
      .find('li')
      .eq(0)
      .addClass('cur');
    },
    scrollBoxPanl: function() { //滚动面板自适应
    var me = this,
      $scrollBox = $(me.options.scrollBox),
      $li = $scrollBox.find('li'),
      len = $li.length,
      $W = $(window).width(),
      timer = null;
    $li.width($W);
    $scrollBox.width(($W * len));
    $(window).on('resize', function() {
      if (timer) {
        clearTimeout(timer);
      }
      timer = setTimeout(function() {
        me.$W = $(window).width();
        $li.width(me.$W);
        $scrollBox.width((me.$W * len));
      }, 400)
    }).trigger('resize')
    },
    controllerPanel: function() { //控制面板
    var me = this,
      $scrollBox = $(me.options.scrollBox),
      len = $scrollBox.find('li').length,
      sLi = '',
      sUl = null;

    for (var i = 0; i < len; i++) {
      sLi += '<li>' + (i + 1) + '</li>';
    }
    sUl = '<ul>' + sLi + '</ul>';
    return sUl;
    },
    controller: function() { //控制器
    var me = this,
      $scrollBox = $(me.options.scrollBox),
      $li = $scrollBox.find('li'),
      $controller = $(me.options.controllerBox),
      len = $li.length,
      $parent = me.options.parent,
      index = 0,
      flag = false,
      endX = null,
      startX = null;

  function IsMobile() {
      var userAgentInfo = navigator.userAgent;
      var Agents = new Array("Android", "iPhone", "SymbianOS", "Windows Phone", "iPad", "iPod");
      var flag = false;
      for (var v = 0; v < Agents.length; v++) {
        if (userAgentInfo.indexOf(Agents[v]) > 0) {
          flag = true;
          break;
        }
      }
      return flag;
    }
    if (IsMobile()) {
      $scrollBox.get(0).addEventListener('touchstart', function(e) { //点击开始
        var touchChange = e.changedTouches[0];
        if (me.options.tm) {
          clearInterval(me.options.tm);
        }
        startX = touchChange.pageX;
      }, false);
      $scrollBox.get(0).addEventListener('touchend', function(e) {
        var touchChange = e.changedTouches[0];
        endX = touchChange.pageX;
        if (endX - startX < 0) {
          index += 1;
          if (index == len) index = 0;
        } else {
          index -= 1;
          if (index < 0) index = len - 1;
        }

        $controller
          .find('li')
          .eq(index)
          .addClass('cur')
          .siblings('li')
          .removeClass('cur');
        $scrollBox.stop(true).animate({
          marginLeft: -(me.$W * index) + 'px'
        }, 400);
      }, false)

    }

    $(me.options.controllerBox).on('click', 'li', function() { //点击
      index = $(this).index();
      $(this).addClass('cur').siblings('li').removeClass('cur')
      $scrollBox.stop(true).animate({
        marginLeft: -(me.$W * index) + 'px'
      }, 400);

    });

    $parent.hover(function() { //自动
      clearInterval(me.options.tm);
    }, function() {
      me.options.tm = setInterval(function() {
        index++;
        if (index == len) index = 0;
        $controller
          .find('li')
          .eq(index)
          .addClass('cur')
          .siblings('li')
          .removeClass('cur');
        $scrollBox.stop(true).animate({
          marginLeft: -(me.$W * index) + 'px'
        }, 400);
      }, me.options.speed);
    }).trigger('mouseleave');
    }
    }
    $.fn.scrolling = function(option) {
    var $this = $(this);
    return new bannerScroll($this, option);
    }

})();



})
