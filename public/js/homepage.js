var AppHomePage = function(){
    return {
        init: function(){
            AppHomePage.initSlider();
            AppHomePage.changeCategory();
        },
        changeCategory: function(){
            $(".host_tabs_ul li").click(function(){
                $('.host_tabs_li').removeClass('category-tab-focus');
                $(this).addClass('category-tab-focus');

                var containner = $(this).attr("data-category");
                $(".category-list").hide();
                $('.' + containner).show();
                // $.ajax({
                //     method: "POST",
                //     url: "/homepage/"+$(this).attr("data-category"),
                //     headers: {
                //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                //     },
                //     success: function(data, status, xhr){
                //         if(data && data.code == 1)
                //         {
                //             app.addLikeToHistory($("#artwork").attr("data-md5"));
                //         }else
                //         {
                //             alert("like");
                //         }
                //     }
                // });
            });
        },

        initSlider: function(){
            $('.host_banner').scrolling();
        }
    }
}();


AppHomePage.init();