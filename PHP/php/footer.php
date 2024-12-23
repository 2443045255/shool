<?php
// 页脚内容和样式
$footer_style = "
    <style>
        footer {
            background-color: #333;
            color: white;
            text-align: center;
            padding: 10px;
            position: fixed;
            bottom: 0;
            width: 100%;
        }
    </style>
";
$footer_content = "
    <footer>
        &copy; <?php echo date('Y');?> 湄洲湾职业技术学院23101PHP连接数据库大作业
    </footer>
";
// 输出页脚样式和内容
echo $footer_style;
echo $footer_content;
?>