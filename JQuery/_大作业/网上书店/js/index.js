$(document).ready(function () {
    $(window).scroll(function () {
        if ($(window).scrollTop() >= $("nav").height()) {
            $("nav").addClass("fixed");
        } else {
            $("nav").removeClass("fixed");
        }
        if ($(window).scrollTop() >= $("#nav-one").height()) {
            $("#nav-one").addClass("fixed2");
        } else {
            $("#nav-one").removeClass("fixed2");
        }
        if ($(window).scrollTop() >= $("#nav-two").height()) {
            $("#nav-two").addClass("fixed2");
        } else {
            $("#nav-two").removeClass("fixed2");
        }

    });
    $(".fl").hover(
        function () {
            $(".fl p").slideDown(1000);
        },
        function () {
            $(".fl p").slideUp(1000);
        },
    );
    $(".p1").hover(
        function () {
            $(".p1 p").slideDown(1000);
        },
        function () {
            $(".p1 p").slideUp(1000);
        },
    );
    $("li").hover(
        function () {
            $(this).children("div").show();
        },
        function () {
            $(this).children("div").hide();
        }
    )
    $("#nav-one").hide();
    $("nav .left1 li:eq(2)").toggle(function () {
        // over
        $("#nav-one").slideDown();

    }, function () {

        $("#nav-one").slideUp();
    });  
    $("#nav-two").hide();
    $("nav .left1 li:eq(5)").toggle(function () {
        // over
        $("#nav-two").slideDown();

    }, function () {

        $("#nav-two").slideUp();
    });

    var YJ_imgWidth = $('.slider li img:eq(0)').width();
    var YJ_curIndex = 0;
    var YJ_imgLen = $(".slider li").length;
    $(".wrapper").width(YJ_imgWidth);
    $(".slider").width(YJ_imgWidth * YJ_imgLen);

    var YJ_autoChange = setInterval(function () {
        if (YJ_curIndex < YJ_imgLen - 1) {
            YJ_curIndex++;
        } else {
            YJ_curIndex = 0;
        }
        changeTo(YJ_curIndex);
    }, 2000);

    $(".left").hover(function () {
        clearInterval(YJ_autoChange);
    }, function () {
        autoChangeAgain();
    })

    $(".left").click(function () {
        YJ_curIndex = (YJ_curIndex > 0) ? (--YJ_curIndex) : (YJ_imgLen - 1);
        changeTo(YJ_curIndex);
    });

    $(".right").hover(function () {
        clearInterval(YJ_autoChange);
    }, function () {
        autoChangeAgain();
    })

    $(".right").click(function () {
        YJ_curIndex = (YJ_curIndex < YJ_imgLen - 1) ? (++YJ_curIndex) : 0;
        changeTo(YJ_curIndex);
    });

    function changeTo(YJ_num) {
        var YJ_goLeft = YJ_num * YJ_imgWidth;
        $(".slider").animate({
            left: '-' + YJ_goLeft + 'px'
        }, 0);
        $(".pagination-wrap").find('li').removeClass('active').eq(YJ_num).addClass('active');
    }

    function autoChangeAgain() {
        YJ_autoChange = setInterval(function () {
            if (YJ_curIndex < YJ_imgLen - 1) {
                YJ_curIndex++;
            } else {
                YJ_curIndex = 0;
            }
            changeTo(YJ_curIndex);
        }, 2500);
    }

    $(".pagination-wrap").find('li').each(function (YJ_item) {
        $(this).hover(function () {
            clearInterval(YJ_autoChange);
            changeTo(YJ_item);
            YJ_curIndex = YJ_item;
        }, function () {
            autoChangeAgain();
        })
    })
   
})
