//created by Manson  2016/08/09

$(function(){

  $(".host_tab_ul li").click(function(){
    var type = $(this).attr('id');
    $(this).css("color","rgb(38, 182, 109)");
    $(this).siblings().css("color","#000");
    $(".host_content").css("display","none");
    $("."+type+"").css("display","block");
  });


})
