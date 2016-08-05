$(function() {

    $("body").on("touchstart", function(e) {
        //e.preventDefault();
        startX = e.originalEvent.changedTouches[0].pageX,
        startY = e.originalEvent.changedTouches[0].pageY;
    });

    $("body").on("touchmove", function(e) {
        //e.preventDefault();
        moveEndX = e.originalEvent.changedTouches[0].pageX,
        moveEndY = e.originalEvent.changedTouches[0].pageY,
        X = moveEndX - startX,
        Y = moveEndY - startY;

        if (Math.abs(X) > Math.abs(Y) && X > 0) {
            //right
        } else if (Math.abs(X) > Math.abs(Y) && X < 0) {
            //left
        } else if (Math.abs(Y) > Math.abs(X) && Y > 0) {
            var len =$(".host-list-ul a").find("li").length;
            if(len<=8){
              $(".host-banner").css("display", "block");
            }
            //$(".host-banner").css("display", "block");
            //bottom
        } else if (Math.abs(Y) > Math.abs(X) && Y < 0) {
            var len =$(".host-list-ul a").find("li").length;
            if(len>=6){
                $(".host-banner").css("display", "none");
            }

            //top
        }
        // else{
        //   alert("just touch");
        // }
    });
});
