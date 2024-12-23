<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>登录</title>
  <link rel="stylesheet" href="../style/main.css">
  <link rel="stylesheet" href="../style/login.css">
</head>

<body>
  <div class="container">
    <form action="">
      <ul>
        <div class="login-title">登录</div>
        <li class="line line-input">
          <span class="title">用户名:</span>
          <input type="text" name="username" autocomplete="off">
        </li>
        <li class="line line-input">
          <span class="title">密码:</span>
          <input type="password" name="password" autocomplete="off">
        </li>
        <li class="line">
          <input type="submit" value="提交登录" class="submit_btn">
          <a href="./register.php" class="topage">去注册</a>
        </li>
      </ul>
    </form>
  </div>
  <?php
    include "common/header.php"
  ?>
</body>

</html>