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

// 获取用户信息
$username = $_SESSION['username'];
$conn = connectDB();
$query = "SELECT * FROM users WHERE username = '$username'";
$result = $conn->query($query);
$user = $result->fetch_assoc();

// 获取登录记录
$login_records_query = "SELECT login_time, login_ip FROM login_records WHERE user_id = '$user[id]'";
$login_records_result = $conn->query($login_records_query);

// 处理修改密码操作
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['action']) && $_POST['action'] == "update_password") {
    $old_password = $_POST['old_password'];
    $new_password = $_POST['new_password'];
    $confirm_new_password = $_POST['confirm_new_password'];

    if (empty($old_password) || empty($new_password) || empty($confirm_new_password)) {
        $passwordError = "所有字段均为必填项";
    } elseif ($new_password!= $confirm_new_password) {
        $passwordError = "新密码与确认新密码不匹配";
    } else {
        $conn = connectDB();
        $username = $_SESSION['username'];
        $query = "SELECT * FROM users WHERE username = '$username'";
        $result = $conn->query($query);
        $user = $result->fetch_assoc();

        if (!password_verify($old_password, $user['password'])) {
            $passwordError = "旧密码错误";
        } else {
            $hashed_new_password = password_hash($new_password, PASSWORD_DEFAULT);
            $update_query = "UPDATE users SET password = '$hashed_new_password' WHERE username = '$username'";
            if ($conn->query($update_query) === TRUE) {
                // 密码修改成功，提示信息并可以选择重新登录
                $passwordSuccess = "密码修改成功，请重新登录";
                // 清除登录会话状态
                session_destroy();
                // 重定向到登录页面（这里可以选择不同的处理方式，比如只是显示提示信息让用户手动点击登录）
                header("Location: login.php");
                exit;
            } else {
                $passwordError = "密码修改失败: ". $conn->error;
            }
        }
        $conn->close();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>用户中心</title>
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

        /* 侧边栏样式 */
   .sidebar {
            background-color: #f9f9f9;
            border-radius: 10px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 200px;
            margin-right: 20px;
        }

        /* 侧边栏链接样式 */
   .sidebar a,.sidebar button {
            display: block;
            text-decoration: none;
            color: #333;
            padding: 10px;
            margin-bottom: 10px;
            width: 100%;
            box-sizing: border-box;
            text-align: left;
        }

        /* 侧边栏链接悬停样式 */
   .sidebar a:hover,.sidebar button:hover {
            background-color: #e9e9e9;
        }

        /* 内容区域样式 */
   .content {
            flex: 1;
        }

        h3 {
            text-align: left;
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

        a {
            background-color: #007BFF;
            color: white;
            padding: 12px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            display: block;
            text-align: center;
            width: fit-content;
            margin-left: auto;
            margin-right: auto;
            margin-top: 20px;
        }

        a:hover {
            background-color: #0056b3;
        }

        ul {
            list-style-type: none;
            padding: 0;
        }

        li {
            margin-bottom: 5px;
            border-bottom: 1px solid #ccc;
            padding-bottom: 5px;
        }

        /* 弹出表单的样式 */
   .popup-form {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 30px;
            width: 350px;
        }

      .popup-form h3 {
            text-align: center;
        }

      .popup-form label {
            margin-top: 15px;
        }

      .popup-form input[type = "text"],
      .popup-form input[type = "password"] {
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

      .popup-form input[type = "submit"] {
            background-color: #007BFF;
            color: white;
            padding: 12px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 20px;
        }

      .popup-form input[type = "submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="main-container">
        <div class="sidebar">
            <button id="user-info-btn">用户信息</button>
            <button id="login-records-btn">登录记录</button>
            <button id="change-password-btn">修改密码</button>
            <a href="logout.php">退出登录</a>
        </div>
        <div class="content">
            <h2>用户中心</h2>
            <?php if ($user):?>
                <div id="user-info" style="display: none;">
                    <h3>个人信息</h3>
                    <p>用户名: <?php echo $user['username'];?></p>
                </div>
                <div id="login-records" style="display: none;">
                    <h3>登录记录</h3>
                    <ul>
                        <?php while ($record = $login_records_result->fetch_assoc()):?>
                            <li>登录时间: <?php echo $record['login_time'];?>-IP: <?php echo $record['login_ip'];?></li>
                        <?php endwhile;?>
                    </ul>
                </div>
            <?php endif;?>

            <!-- 修改密码弹出表单 -->
            <div id="popup-form" class="popup-form">
                <h3>修改密码</h3>
                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                    <input type="hidden" name="action" value="update_password">
                    <label for="old_password">旧密码:</label>
                    <input type="password" name="old_password" id="old_password"><br><br>
                    <label for="new_password">新密码:</label>
                    <input type="password" name="new_password" id="new_password"><br><br>
                    <label for="confirm_new_password">确认新密码:</label>
                    <input type="password" name="confirm_new_password" id="confirm_new_password"><br><br>
                    <input type="submit" value="修改密码">
                </form>
            </div>
        </div>
    </div>

    <script>
        // 获取按钮和弹出内容
        var userInfoBtn = document.getElementById('user-info-btn');
        var userInfo = document.getElementById('user-info');
        var loginRecordsBtn = document.getElementById('login-records-btn');
        var loginRecords = document.getElementById('login-records');
        var changePasswordBtn = document.getElementById('change-password-btn');
        var popupForm = document.getElementById('popup-form');

        // 用户信息按钮点击事件
        userInfoBtn.addEventListener('click', function () {
            userInfo.style.display = (userInfo.style.display === 'block')? 'none' : 'block';
            loginRecords.style.display = 'none';
            popupForm.style.display = 'none';
        });

        // 登录记录按钮点击事件
        loginRecordsBtn.addEventListener('click', function () {
            loginRecords.style.display = (loginRecords.style.display === 'block')? 'none' : 'block';
            userInfo.style.display = 'none';
            popupForm.style.display = 'none';
        });

        // 修改密码按钮点击事件
        changePasswordBtn.addEventListener('click', function () {
            popupForm.style.display = (popupForm.style.display === 'block')? 'none' : 'block';
            userInfo.style.display = 'none';
            loginRecords.style.display = 'none';
        });
    </script>
</body>
</html>