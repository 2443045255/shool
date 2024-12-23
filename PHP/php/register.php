<?php
// 引入数据库连接文件
require_once 'db_connect.php';
// 引入页脚文件
require_once 'footer.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // 获取注册表单数据
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // 验证数据合法性
    if (empty($username) || empty($password) || empty($confirm_password)) {
        $error = "所有字段均为必填项";
    } elseif ($password!= $confirm_password) {
        $error = "密码与确认密码不匹配";
    } else {
        // 连接数据库
        $conn = connectDB();

        // 检查用户名是否已存在
        $query = "SELECT * FROM users WHERE username = '$username'";
        $result = $conn->query($query);
        if ($result->num_rows > 0) {
            $error = "用户名已被注册，请更换用户名";
        } else {
            // 对密码进行哈希处理
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            // 插入新用户数据
            $insert_query = "INSERT INTO users (username, password) VALUES ('$username', '$hashed_password')";
            if ($conn->query($insert_query) === TRUE) {
                // 注册成功，设置会话变量并跳转到登录页面
                session_start();
                $_SESSION['username'] = $username;
                header("Location: login.php");
            } else {
                $error = "注册失败: ". $conn->error;
            }
        }
        $conn->close();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>用户注册</title>
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

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            margin-top: 15px;
        }

        input[type = "text"],
        input[type = "password"] {
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        input[type = "submit"] {
            background-color: #007BFF;
            color: white;
            padding: 12px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 20px;
        }

        input[type = "submit"]:hover {
            background-color: #0056b3;
        }

        /* 已有账号链接样式 */
     .login-link {
            text-align: center;
            margin-top: 15px;
        }

     .login-link a {
            color: #007BFF;
            text-decoration: none;
        }

     .login-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="main-container">
        <h2>用户注册</h2>
        <?php if (isset($error)) {?>
            <p style="color: red;"><?php echo $error;?></p>
        <?php }?>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <label for="username">用户名:</label>
            <input type="text" name="username" id="username"><br><br>
            <label for="password">密码:</label>
            <input type="password" name="password" id="password"><br><br>
            <label for="confirm_password">确认密码:</label>
            <input type="password" name="confirm_password" id="confirm_password"><br><br>
            <input type="submit" value="提交注册">
            <div class="login-link">
                <a href="login.php">已有账号？去登录</a>
            </div>
        </form>
    </div>
</body>
</html>