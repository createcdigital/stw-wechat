var AppStoreIndex = function(){
    return {
        init: function(){
            AppStoreIndex.initSlider();
            AppStoreIndex.changeCategory();
        },
        changeCategory: function() {
            $(".host_tabs_ul li").click(function () {
                $('.host_tabs_li').removeClass('category-tab-focus');
                $(this).addClass('category-tab-focus');

                var containner = $(this).attr("data-category");
                $(".category-list").hide();
                $('.' + containner).show();
            });
        },
        
        initSlider: function(){
            $('.host_banner').scrolling();
        }
    }
}();


AppStoreIndex.init();