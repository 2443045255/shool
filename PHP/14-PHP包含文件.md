# PHP包含文件

## 包含文件

在当前文件内引入其他PHP文件、HTML文件或文本文件等，一般用于包含公共方法，公共页面等，例如header footer sider等网页通用部分。

### include 和 require 语句

区别：
**include 和 require 除了处理错误的方式不同之外，在其他方面都是相同的：**

- require 生成一个致命错误（E_COMPILE_ERROR），在错误发生后脚本会停止执行。
- include 生成一个警告（E_WARNING），在错误发生后脚本会继续执行。

因此：
如果你希望被包含的文件是必需的且缺少文件会导致脚本无法正常运行，应使用require（推荐）。
如果你希望被包含的文件是可选的，或者即使缺少文件也希望脚本继续执行，可以使用include。

#### 例如：

##### header.php

```php
<?php 
	$siteTitle = "测试页面";
?>
<html>
<head>
<meta charset="utf-8">
<title><?php echo $siteTitle;?></title>
</head>

```

##### index.php

```php
<?php include 'header.php'; ?>
<body>
<h1>欢迎来到<?php echo $siteTitle;?> !</h1>
<p>有问必答。</p>

</body>
</html>

```

### include_once 和 require_once 语句

和上面的一样，但他只会调用一次，防止重复调用