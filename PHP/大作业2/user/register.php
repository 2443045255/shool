<!DOCTYPE html>
<html lang="zh-cn">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>注册</title>
  <link rel="stylesheet" href="../style/main.css">
  <link rel="stylesheet" href="../style/login.css">
</head>
<style>
  body {
    background: url(../images/reg_bg1.jpg) no-repeat;
    background-size: cover;
  }
</style>

<body>
  <div class="container">
    <ul>
      <div class="login-title">注册</div>
      <li class="line line-input">
        <span class="title">用户名:</span>
        <input id="username" type="text" name="username" autocomplete="off" value="你好世界">
      </li>
      <li class="line line-input">
        <span class="title">密码:</span>
        <input id="password" type="text" name="password" autocomplete="off" value="123">
      </li>
      <li class="line line-input">
        <span class="title">确认密码:</span>
        <input id="two_password" type="password" name="re_password" value="123">
      </li>
      <li class="line line_btn">
        <input type="submit" value="注册" class="submit_btn">
        <a href="./login.php" class="topage">已有账号，去登陆</a>
      </li>
    </ul>
  </div>
</body>
<script src="../js/main1.js"></script>
<script>
  var submit_btn = document.querySelector('.submit_btn')
  var username = document.getElementById('username')
  var password = document.getElementById('password')
  var two_password = document.getElementById('two_password')
  var getData = null
  submit_btn.addEventListener('click', function () {
    if (password检查() == false) return
    if (username.value && password.value && two_password.value) {
      fetchToPhp('reg', username.value, password.value)
      submit_btn.setAttribute('disabled', '')
      // submit_btn.removeAttribute('disabled');
    }
  })
</script>

</html>