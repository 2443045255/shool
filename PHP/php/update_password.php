<?php
// 引入数据库连接文件
require_once 'db_connect.php';
// 引入页脚文件
require_once 'footer.php';

// 检查用户是否已登录
session_start();
if (!isset($_SESSION['logged_in']) ||!$_SESSION['logged_in']) {
    header("Location: login.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // 获取修改密码表单数据
    $old_password = $_POST['old_password'];
    $new_password = $_POST['new_password'];
    $confirm_new_password = $_POST['confirm_new_password'];

    // 验证数据合法性
    if (empty($old_password) || empty($new_password) || empty($confirm_new_password)) {
        $error = "所有字段均为必填项";
    } elseif ($new_password!= $confirm_new_password) {
        $error = "新密码与确认新密码不匹配";
    } else {
        // 连接数据库
        $conn = connectDB();

        // 获取当前用户信息
        $username = $_SESSION['username'];
        $query = "SELECT * FROM users WHERE username = '$username'";
        $result = $conn->query($query);
        $user = $result->fetch_assoc();

        // 验证旧密码是否正确
        if (!password_verify($old_password, $user['password'])) {
            $error = "旧密码错误";
        } else {
            // 对新密码进行哈希处理并更新数据库
            $hashed_new_password = password_hash($new_password, PASSWORD_DEFAULT);
            $update_query = "UPDATE users SET password = '$hashed_new_password' WHERE username = '$username'";
            if ($conn->query($update_query) === TRUE) {
                // 密码修改成功，清除登录会话状态并跳转到登录页面
                session_destroy();
                header("Location: login.php");
            } else {
                $error = "密码修改失败: ". $conn->error;
            }
        }
        $conn->close();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>修改密码结果</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        /* 主容器样式，模仿图片中的白色框体 */
    .main-container {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 30px;
            width: 350px;
        }

        h2 {
            text-align: center;
            margin-top: 0;
        }

        p.error {
            text-align: center;
            margin-top: 15px;
            color: red;
        }
    </style>
</head>
<body>
    <div class="main-container">
        <h2>修改密码结果</h2>
        <?php if (isset($error)) {?>
            <p class="error"><?php echo $error;?></p>
        <?php }?>
    </div>
</body>
</html>