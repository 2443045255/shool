<?php
// 引入数据库连接文件
require_once 'db_connect.php';
// 引入页脚文件
require_once 'footer.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // 获取登录表单数据
    $username = $_POST['username'];
    $password = $_POST['password'];

    // 连接数据库
    $conn = connectDB();

    // 验证用户名和密码
    $query = "SELECT * FROM users WHERE username = '$username'";
    $result = $conn->query($query);
    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            // 登录成功，更新登录信息并记录登录记录
            $update_query = "UPDATE users SET last_login_ip = '$_SERVER[REMOTE_ADDR]', login_failed_count = 0 WHERE username = '$username'";
            $conn->query($update_query);

            $insert_login_record = "INSERT INTO login_records (user_id, login_time, login_ip) VALUES ('$user[id]', NOW(), '$_SERVER[REMOTE_ADDR]')";
            $conn->query($insert_login_record);

            // 保存登录状态
            session_start();
            $_SESSION['logged_in'] = true;
            $_SESSION['username'] = $user['username'];

            // 跳转到用户中心页面
            header("Location: user_center.php");
        } else {
            // 密码错误，增加登录失败次数
            $update_failed_count = "UPDATE users SET login_failed_count = login_failed_count + 1 WHERE username = '$username'";
            $conn->query($update_failed_count);

            // 判断登录失败次数是否超过阈值（这里假设阈值为5）
            if ($user['login_failed_count'] >= 5) {
                $error = "您已多次登录失败，账号已被锁定，请联系管理员";
            } else {
                $error = "密码错误，请重新输入";
            }
        }
    } else {
        $error = "用户名不存在，请检查输入";
    }
    $conn->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>用户登录</title>
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

        /* 错误提示信息样式 */
        p.error {
            text-align: center;
            margin-top: 15px;
            color: red;
        }
    </style>
</head>
<body>
    <div class="main-container">
        <h2>用户登录</h2>
        <?php if (isset($error)) {?>
            <p style="color: red;"><?php echo $error;?></p>
        <?php }?>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <label for="username">用户名:</label>
            <input type="text" name="username" id="username"><br><br>
            <label for="password">密码:</label>
            <input type="password" name="password" id="password"><br><br>
            <input type="submit" value="登录">
        </form>
    </div>
</body>
</html>