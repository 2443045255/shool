# PHP语法

## 基础语法

PHP脚本以`<?php 开头,以?>结尾`:

```php
<?php //此处是PHP代码 ?>
<?php
// 此处是PHP代码
?>
```

PHP脚本可以放置在文件的任意位置,文件扩展名是".php"
PHP文件通常包含HTML标签以及一些PHP脚本代码,注意: html、js、css可以在php文件中运行,但php代码不能再html、js、css中运行

php语句以分号结尾(;)

```html
<!DOCTYPE html>
<html>
<body>
<h1>My first PHP page</h1>
<?php
echo "Hello world!";
?>
</body>
</html>
```

## PHP的输出方法echo和print

不同点:
- echo可以输出一个以上的字符串,用英文逗号隔开
- print只能输出一个字符串,并始终返回1
- echo比print稍快,开销稍低

```php
<?php
echo "hello", " string", 1, " 2 ";
?>
```

相同点:
- 都是一个语言结构,有无括号均可以使用

## 注释

注释不会被程序读取执行,唯一的作用就是提供代码编辑者阅读(让别人读明白,提醒自己做过什么,特别是一些函数的用途)

```php
<?php
// 这里是单行注释
# 这里也是单行注释
/*
这是多行注释
任意换行即可
*/
?>
```

## 变量

变量是存储信息的容器,存储一段数据

```php
$a = 5;
$b = 6;
$c = $a + $b;
echo $c;
```

=不是数学上的等号,而是称为赋值符号

变量的命名规则
- php变量以$符号开头(shift+4),之后是变量名
- 变量名称必须以字母或者下划线开头
- 变量名称不能以数字开头,中间不能有空格
- 变量名词只能包含字母、下划线、数字字符(A-z, 0-9以及_)
- 变量名词大小写敏感($y, $Y是不同的变量)

推荐的命名方法
- 下划线命名法`$first_name`
- 小驼峰命名法`$firstName`
- 大驼峰命名法`$FirstName`

不必告诉PHP变量的数据类型,php会根据变量的值,自动把变量转换为正确的数据类型

变量有作用域,后面函数的时候再说

## 补充:大小写敏感

所有用户定义的函数、类和关键字(if,else,echo)等都对大小写不敏感,但是所有变量都对大小写敏感

```php
ECHO "HELLO";
echo "hello";
EchO "hello";
```

## 空白符

空格、tab、换行这几个字符在php的字符串中都可以使用

```php
$a = "
Hello

World
";
```

## 命令行输入内容

- php可以在命令行中通过解释器`php filename.php`来运行
- 可以使用方法readline获取命令行的输入
- 可以使用方法fgets来获取标准输入的内容

```php
$input = readline("请输入内容");
echo "您输入的内容是: " . $input;
```
