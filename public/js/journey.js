//created by Manson  2016/07/27

$(function(){

  $(".host-navigate-ul li").click(function(){
    var type = $(this).attr('id');
    $(this).css("border-bottom","3px solid rgb(38, 182, 109)");
    $(this).siblings().css("border-bottom","none");
    $(".host-list").css("display","none");
    $("."+type+"").css("display","block");
  });





})
