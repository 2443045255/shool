$(".change").change(function () {
    if ($(".xz").prop("checked") == true) {
        $(".xz").prop("checked", true);
    } else {
        $(".xz").prop("checked", false);
    }
});
$(".xz").change(function () {
    var YJ_lis = $(".xz");
    var YJ_liss = true;
    for (var YJ_i = 0; YJ_i < $(".xz").length; YJ_i++) {
        if (YJ_liss = YJ_liss && $(YJ_lis[i]).prop("checked") == true) {
            $(".change").prop("checked", true);
        } else {
            $(".change").prop("checked", false);
        }
    }
});

function minus(YJ_num) {
    var YJ_prices = document.getElementsByName("price")[YJ_num].value;
    var YJ_count = parseInt(document.getElementsByName("amount")[YJ_num].value) - 1;
    if (YJ_count < 1) {
        alert("不能再减啦，再减就没有啦！");
    } else {
        document.getElementsByName("amount")[YJ_num].value = YJ_count;
        var YJ_totals = parseFloat(YJ_prices * YJ_count);
        document.getElementById("price" + YJ_num).innerHTML = "￥" + YJ_totals;
        total();
    }
}

function plus(YJ_num) {
    var YJ_prices = document.getElementsByName("price")[YJ_num].value;
    var YJ_count = parseInt(document.getElementsByName("amount")[YJ_num].value) + 1;
    document.getElementsByName("amount")[YJ_num].value = YJ_count;
    var YJ_totals = parseFloat(YJ_prices * YJ_count);
    document.getElementById("price" + YJ_num).innerHTML = "￥" + YJ_totals;
    total();
}

function total() {
    var YJ_prices = document.getElementsByName("price");
    var YJ_count = document.getElementsByName("amount");
    var YJ_sum = 0;
    for (var i = 0; i < YJ_prices.length; i++) {
        YJ_sum += YJ_prices[i].value * YJ_count[i].value;
    }
    document.getElementById("totalPrice").innerHTML = "￥" + YJ_sum;

}
$(".order").hide();
$("#button").click(function () {
    var YJ_prices = document.getElementsByName("price");
    var YJ_count = document.getElementsByName("amount");
    var YJ_sum = 0;
    for (var YJ_i = 0; YJ_i < YJ_prices.length; YJ_i++) {
        YJ_sum += YJ_prices[YJ_i].value * YJ_count[YJ_i].value;
    }
    $(".order").show();

    document.getElementById("totalPrice").innerHTML = "￥" + YJ_sum;
    var YJ_p1 = $("#p1").text();
    var YJ_p2 = $("#p2").text();
    var YJ_p3 = $("#p3").text();
    var YJ_p4 = $("#p4").text();
    var YJ_num1 = $(".pr0").text();
    var YJ_num2 = $(".pr1").text();
    var YJ_num3 = $(".pr2").text();
    var YJ_num4 = $(".pr3").text();
    $(".order .sp1").html(YJ_p1+YJ_num1);
    $(".order .sp2").html(YJ_p2+YJ_num2);
    $(".order .sp3").html(YJ_p3+YJ_num3);
    $(".order .sp4").html(YJ_p4+YJ_num4);
    var YJ_t = $("#totalPrice").text();
    $(".order .gj1 span").html(YJ_t);
    $(".styled").prop("checked", true);
    $(".sty").prop("checked", true);
});
$("#submit").click(function (e) {
    var YJ_te=$(".order .d5 span").text();
    if(YJ_te=="￥0.00"){
        alert("请先加购商品！");
    }else{
        alert("您的订单已提交成功！")
        $(".order").hide();
    }

});

$("#del1").click(function () {
    $("tbody #tr1").remove();

});
$("#del2").click(function () {
    $("tbody #tr2").remove();

});
$("#del3").click(function () {
    $("tbody #tr3").remove();

});
$("#del4").click(function () {
    $("tbody #tr4").remove();

});
$(".cart tbody #option .collection").click(function (e) {
    alert("您已成功加入收藏！");

});