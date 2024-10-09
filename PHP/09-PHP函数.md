# PHP函数

## 函数

函数是一段可重复使用的代码块，可以将一系列操作封装起来，使代码更加模块化、可维护和可重用，来大大节省我们的开发时间和代码量，提高编程效率。

### 内置函数

内置函数有很多，之前学的print_r() count() 就是一个内置函数，
获取当前时间 time()，date('Y-m-d H:i:s')

这节我们主要讲自定义函数

### 创建（定义）函数 和 调用

PHP 函数准则：

- 函数的名称应该提示出它的功能
- 函数名称以字母或下划线开头（不能以数字开头）

```php
function functionName() { 
// 要执行的代码 
}
//调用
functionName();
```

```php
function test(){
    echo '我的名字是：test';
}

test();

// 获取当前的时间
function nowTime(){
	echo date('Y-m-d H:i:s');
}

nowTime();
```

### 添加参数

为了给函数添加更多的功能，我们可以添加参数，参数类似变量

```php
function myName($name){
	echo "我的名字是：$name";
}

myName("test");
```

```php
// 获取当前的时间
function nowTime($type){
    if($type=="time"){
        echo date('Y-m-d H:i:s');
    }
    else if($type=="day"){
        echo date('Y-m-d');
    }
}

nowTime("time");
```

### 多个参数

```php
function plus($a,$b)
{
  echo $a+$b;
}

plus(2,3);
```

```php
//严格模式
declare(strict_types=1);
function plus(int $a,int $b)
{
  echo $a+$b;
}

plus('2','13');
```

### 返回值

return ， 可有可无，但一般都有

```php
function plus($a,$b)
{
  return $a+$b;
}

echo plus(2,3);
```
