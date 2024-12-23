<?php
// 引入页脚文件
require_once 'footer.php';
// 清除登录会话状态
session_start();
session_destroy();
header("Location: login.php");
?>