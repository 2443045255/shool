<?php
function connectDB()
{
    $conn = new mysqli('localhost:3307', 'root', 'root', 'php');
    if ($conn->connect_error) {
        // die("连接失败: " . $conn->connect_error);
        returnFetch('error', '数据库连接失败');
    }
    return $conn;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // returnFetch('error', $_POST);
    $get_type = isset($_POST['type']) ? $_POST['type'] : '';
    $get_username = isset($_POST['username']) ? $_POST['username'] : '';
    $get_password = isset($_POST['password']) ? $_POST['password'] : '';
    $get_password_hash = isset($_POST['password']) ? password_hash($_POST['password'], PASSWORD_DEFAULT) : '';

    if (!isset($_POST['password']) && $get_type != 'getUserInfo' && $get_type != 'change_password') {
        returnFetch('error', '密码为空');
    } else if ($get_type == 'reg') {
        $conn = connectDB(); //连接数据库
        $query = "SELECT * FROM users WHERE username = '$get_username'";
        $result = $conn->query($query);
        if ($result->num_rows > 0) {
            returnFetch('error', '账户已存在');
        } else {
            $insert_query = "INSERT INTO users (username, password) VALUES ('$get_username', '$get_password_hash')";
            if ($conn->query($insert_query) === true) {
                returnFetch('success', '注册成功');
            } else {
                returnFetch('error', '注册失败');
            }
        }
        $conn->close(); //关闭数据库连接
    } else if ($get_type == 'login') {
        $conn = connectDB(); //连接数据库
        $query = "SELECT * FROM users WHERE username = '$get_username'";
        $result = $conn->query($query);
        if ($result->num_rows === 1) {
            $user = $result->fetch_assoc();
            if (password_verify($get_password, $user['password'])) {
                $update_query = "UPDATE users SET last_login_ip = '$_SERVER[REMOTE_ADDR]', login_failed_count = 0 WHERE username = '$get_username'";
                $conn->query($update_query);
                $insert_login_record = "INSERT INTO login_records (username, login_time, login_ip) VALUES ('$user[username]', NOW(), '$_SERVER[REMOTE_ADDR]')";
                $conn->query($insert_login_record);
                returnFetch('success', '登录成功');
            } else {
                $update_failed_count = "UPDATE users SET login_failed_count = login_failed_count + 1 WHERE username = '$get_username'";
                $conn->query($update_failed_count);

                if ($user['login_failed_count'] >= 5) {
                    returnFetch('error', '密码错误多次，已禁用登录');
                } else {
                    returnFetch('error', '密码错误');
                }
            }
        } else {
            returnFetch('error', '用户名不存在');
        }
        $conn->close(); //关闭数据库连接
    } else if ($get_type == 'getUserInfo') {
        $conn = connectDB(); //连接数据库
        $login_records_query = "SELECT login_time, login_ip FROM login_records WHERE username = '$get_username'";
        $login_records_result = $conn->query($login_records_query);
        $login_records_result_Arr = array();
        while ($record = $login_records_result->fetch_assoc()):
            array_push($login_records_result_Arr, array(
                'login_time' => $record['login_time'],
                'login_ip' => $record['login_ip'],
            ));
        endwhile;

        echo json_encode([
            'status' => 'success',
            'login_records_result_Arr' => $login_records_result_Arr,
        ], JSON_UNESCAPED_UNICODE);
        $conn->close(); //关闭数据库连接
    } else if ($get_type == 'change_password') {
        $get_new_password_hash = isset($_POST['new_password']) ? password_hash($_POST['new_password'], PASSWORD_DEFAULT) : '';
        $conn = connectDB(); //连接数据库
        $query = "SELECT * FROM users WHERE username = '$get_username'";
        $result = $conn->query($query);
        $user = $result->fetch_assoc();
        if (password_verify($get_password, $user['password'])) {
            $update_password = "UPDATE users SET password = '$get_new_password_hash' WHERE username = '$get_username'";
            if ($conn->query($update_password) == true) {
                returnFetch('success', '密码修改成功');
            } else {
                returnFetch('error', '密码修改失败');
            }
        } else {
            returnFetch('error', '旧密码错误');
        }
    }

} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method']);
}
function returnFetch($value1, $value2, $value3 = '')
{
    echo json_encode([
        'status' => $value1,
        'message' => $value2,
        'log' => $value3,
    ], JSON_UNESCAPED_UNICODE);
}
