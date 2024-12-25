<!DOCTYPE html>
<html lang="zh-cn">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>用户中心页</title>
  <link rel="stylesheet" href="../style/main.css">
  <link rel="stylesheet" href="../style/login.css">
</head>
<style>
  body {
    display: flex;
    flex-direction: column;
    background: url(../images/user_bg1.jpg) no-repeat;
    background-size: cover;
  }
</style>

<body>
  <?php
  include "common/header.php"
    ?>
  <div class="user_main">
    <div class="user_body">
      <div class="user_module">
        <div class="title">登录记录</div>
        <div class="user_module_body">
          <div class="user_loginRec">
            <div class="user_loginRec_title">
              <p>登录时间</p>
              <p>登录IP</p>
            </div>
            <div class="user_loginRec_body">
              <div class="user_loginRec_item">
                <p>204.1.1</p>
                <p>127.0.0.1</p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="user_module">
        <div class="title">个人功能</div>
        <div class="user_module_body">
          <div class="GN-main">
            <div class="GN-btn" id="change_password">修改密码</div>
            <div class="GN-btn" id="login_out">退出登录</div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="change_password_bg" style="display:none;">
    <div class="change_password_main">
      <div class="change_password_close a">关闭</div>
      <div class="change_password_title">修改密码</div>
      <div class="change_password_body">

        <ul style="padding:0px">
          <li class="line line-input">
            <span class="title">旧密码:</span>
            <input id="old_password" type="text" name="old_password" autocomplete="off">
          </li>
          <li class="line line-input">
            <span class="title">新密码:</span>
            <input id="new_password" type="text" name="new_password" autocomplete="off">
          </li>
          <li class="line">
            <input type="submit" value="确认修改" class="submit_btn" id="change_password_btn">
          </li>
        </ul>
      </div>
    </div>
  </div>
</body>
<script src="../js/main1.js"></script>
<script>
  if (!sessionStorage.getItem('isLogin') || sessionStorage.getItem('isLogin') == 'false') {
    alert('还未登录')
    location.href = 'login.php'
  } else {
    var header_username = document.querySelector("header .username .getvalue")
    header_username.innerText = sessionStorage.getItem('username')
    var user_loginRec_body = document.querySelector('.user_loginRec_body')
    获取用户信息()
  }
  document.getElementById('login_out').onclick = function () {
    退出登录()
  }
  var change_password_bg = document.querySelector('.change_password_bg')
  document.getElementById('change_password').onclick = function () {
    change_password_bg.style.display = 'flex'
  }
  document.querySelector('.change_password_close').onclick = function () {
    change_password_bg.style.display = 'none'
  }
  document.getElementById('change_password_btn').onclick = function () {
    var username = sessionStorage.getItem('username')
    var old_password = document.getElementById('old_password')
    var new_password = document.getElementById('new_password')
    if (!old_password.value || !new_password.value) {
      alert('旧密码或新密码为空')
      return
    }
    if (old_password.value == new_password.value) {
      alert('旧密码与新密码相同')
      return
    }
    修改密码(username, old_password.value, new_password.value)
  }
</script>

</html>