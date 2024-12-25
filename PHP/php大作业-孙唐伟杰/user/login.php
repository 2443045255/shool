<?php session_start();?>
<!DOCTYPE html>
<html lang="zh-cn">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>登录</title>
  <link rel="stylesheet" href="../style/main.css">
  <link rel="stylesheet" href="../style/login.css">
</head>

<body>
  <div class="container">
    <ul>
      <div class="login-title">登录</div>
      <li class="line line-input">
        <span class="title">用户名:</span>
        <input id="username" type="text" name="username" autocomplete="off">
      </li>
      <li class="line line-input">
        <span class="title">密码:</span>
        <input id="password" type="password" name="password" autocomplete="off">
      </li>
      <li class="line">
        <input type="submit" value="提交登录" class="submit_btn">
        <a href="./register.php" class="topage">去注册</a>
      </li>
    </ul>
  </div>
</body>
<script src="../js/main1.js"></script>
<script>
  if(sessionStorage.getItem("isLogin") == 'true'){
    alert('已登录,前往用户中心页')
    location.href = 'user.php'
  }
  var submit_btn = document.querySelector('.submit_btn')
  var username = document.getElementById('username')
  var password = document.getElementById('password')
  submit_btn.addEventListener('click', function () {
    if (password检查() == false) return
    if (username.value && password.value) {
      fetchToPhp('login', username.value, password.value)
      submit_btn.setAttribute('disabled', '');
      // submit_btn.removeAttribute('disabled');
    }

  })
  if(sessionStorage.getItem("username")){
    username.value = sessionStorage.getItem("username")
  }
</script>

</html>
