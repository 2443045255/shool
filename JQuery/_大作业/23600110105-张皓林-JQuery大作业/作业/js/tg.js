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
        $("#nav-one").slideDown();

    }, function () {

        $("#nav-one").slideUp();
    });
    $("#nav-two").hide();
    $("nav .left1 li:eq(5)").toggle(function () {
        $("#nav-two").slideDown();

    }, function () {

        $("#nav-two").slideUp();
    });
})