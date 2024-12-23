<!DOCTYPE html>
<html lang="zh-cn">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>用户中心页</title>
  <link rel="stylesheet" href="../style/main.css">
</head>

<body>
  <?php
  include "common/header.php"
    ?>
  <div class="user_main">
    <div class="user_body">
      <div class="user_module">
        <div class="title">个人信息</div>
        <div class="user_module_body">
          <div class="user_username">
            <span>账户:</span>
            <span>XXX</span>
          </div>
          <div class="user_password">
            <span>密码:</span>
            <span>XXX</span>
          </div>
        </div>
      </div>
      <div class="user_module">
        <div class="title">登录记录</div>
        <div class="user_module_body">
          <div class="user_loginRec">
            <div class="user_loginRec_title">
              <p>登录时间</p><p>登录IP</p>
            </div>
            <div class="user_loginRec_body">
              <div class="user_loginRec_item">
                <p>204.1.1</p><p>127.0.0.1</p>
              </div>
              <div class="user_loginRec_item">
                <p>204.1.1</p><p>127.0.0.1</p>
              </div>
              <div class="user_loginRec_item">
                <p>204.1.1</p><p>127.0.0.1</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>