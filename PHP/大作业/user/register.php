<!DOCTYPE html>
<html lang="zh-cn">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>注册</title>
  <link rel="stylesheet" href="../style/main.css">
  <link rel="stylesheet" href="../style/login.css">
</head>

<body>
  <div class="container">
      <ul>
        <div class="login-title">注册</div>
        <li class="line line-input">
          <span class="title">用户名:</span>
          <input type="text" name="username" autocomplete="off">
        </li>
        <li class="line line-input">
          <span class="title">密码:</span>
          <input type="password" name="password" autocomplete="off">
        </li>
        <li class="line line-input">
          <span class="title">确认密码:</span>
          <input type="password" name="re_password">
        </li>
        <li class="line">
          <input type="submit" name="提交注册" class="submit_btn">
          <a href="./login.php" class="topage">已有账号，去登陆</a>
        </li>
      </ul>
  </div>
</body>

</html>