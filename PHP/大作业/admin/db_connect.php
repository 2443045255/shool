<?php
// 数据库连接函数
function connectDB() {
    $conn = new mysqli('localhost', 'root', 'root', 'php');
    if ($conn->connect_error) {
        die("连接失败: ". $conn->connect_error);
    }
    return $conn;
}
?>