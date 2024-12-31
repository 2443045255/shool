$(document).ready(function () {
    $("button").click(function () { 
       var YJ_text1=$("input:eq(0)").val();
       var YJ_text2=$("input:eq(1)").val();
       var YJ_text3=$("input:eq(2)").val();
       var YJ_text4=$("input:eq(3)").val();
       var YJ_text5=$("input:eq(4)").val();
       if(YJ_text1==""){
           $(".span1").text("*不能为空");
           return false;
        }else{
           $(".span1").text("");
       }
       if(YJ_text2==""){
           $(".span2").text("*不能为空");
           return false;
       }else{
        $(".span2").text("");
    }
       if(YJ_text3==""){
           $(".span3").text("*不能为空");
           return false;
       } else{
        $(".span3").text("");
    }
       if(YJ_text4==""){
           $(".span4").text("*不能为空");
           return false;
       }else{
        $(".span4").text("");
    }
       if(YJ_text5==""){
           $(".span5").text("*不能为空");
           return false;
       }else{
        $(".span5").text("");
    }
        alert("提交成功！感谢您的留言！");
        window.location.reload()
    });
    $(window).scroll(function () {
        if ($(window).scrollTop() >= $("#foods").height()) {
            $("#foods").addClass("fixed");
        } else {
            $("#foods").removeClass("fixed");
        }
    });
});