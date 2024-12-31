$(document).ready(function () {
    $("button").click(function () {
        var YJ_user = document.getElementById("user");
        if (YJ_user.validity.valueMissing == true) {
            YJ_user.setCustomValidity("用户名不能为空");
        } else if (YJ_user.validity.patternMismatch == true) {
            YJ_user.setCustomValidity("用户名必须是字母开头的4～16英文字母和数字");
        } else {
            YJ_user.setCustomValidity("");
        }
        var YJ_pwd = document.getElementById("pwd");
        if (YJ_pwd.validity.valueMissing == true) {
            YJ_pwd.setCustomValidity("密码不能为空");
        } else if (YJ_pwd.validity.patternMismatch == true) {
            YJ_pwd.setCustomValidity("密码必须是4~10位的英文字母和数字");
        } else {
            YJ_pwd.setCustomValidity("");
        }

        var YJ_repwd = document.getElementById("repwd");
        if (YJ_repwd.validity.valueMissing == true) {
            YJ_repwd.setCustomValidity("确认密码不能为空");
        } else if ($("#pwd").val() != $("#repwd").val()) {
            YJ_repwd.setCustomValidity("两次密码不一致");
        } else {
            YJ_repwd.setCustomValidity("")
        }
        var YJ_email = document.getElementById("email");
        if (YJ_email.validity.valueMissing == true) {
            YJ_email.setCustomValidity("邮箱不能为空");
        } else if (YJ_email.validity.typeMismatch == true) {
            YJ_email.setCustomValidity("邮箱格式不正确");
        } else {
            YJ_email.setCustomValidity("");
        }
        var YJ_phone = document.getElementById("phone");
        if (YJ_phone.validity.patternMismatch == true) {
            YJ_phone.setCustomValidity("手机必须是1开头的11位数字");
        } else {
            YJ_phone.setCustomValidity("");
        }
    })
})