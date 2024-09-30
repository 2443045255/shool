# PHP变量补充

## 变量作用域

讲完了函数，就可以学习前面提到过的变量作用域了

变量的作用域是脚本中变量可被引用/使用的部分。

### 局部 和 全局(global) 作用域

- 在所有函数外部定义的变量，拥有全局作用域
- 除了函数外，全局变量可以被脚本中的任何部分访问
- 要在一个函数中访问一个全局变量，需要使用 global 关键字
- 函数内部声明的变量是局部变量，仅能在函数内部访问

```php
$variable="variable";
function test(){
	global $variable;
	$age="35";
	echo $variable;
}
test();
echo $age;
```

### static 作用域

当一个函数完成时，它的所有变量通常都会被删除。然而，有时候希望某个局部变量不要被删除。
要做到这一点，请在第一次声明变量时使用 **static** 关键字

每次调用该函数时，该变量将会保留着函数前一次被调用时的值，但是该变量仍然是函数的局部变量

```php
function myTest()
{
    static $a=0;
    echo $a;
    $a++;
    echo PHP_EOL;    // 换行符
}
 
myTest();
myTest();
myTest();
```

### 函数的参数作用域

参数是通过调用代码将值传递给函数的局部变量

```php
function test($variable){
	echo $variable;
}

test('test');
var_dump($variable);
```

### unset和isset函数

unset()可以删除变量，isset() 可以判断变量是否存在

```php
$variable="variable";

function test(){
	// global $variable;
	$age="35";
    var_dump(isset($age));
	unset($age);

    var_dump(isset($age));
}
test();
var_dump($variable);

```


## 超级全局变量

- $GLOBALS
- $_SERVER

- $_REQUEST
- $_POST
- $_GET
- $_FILES
- $_ENV
- $_COOKIE
- $_SESSION

#### $GLOBALS 

是一个包含了全部变量的全局组合数组。变量的名字就是数组的键。

```php
print_r($GLOBALS);

$variable="variable";
$age=35;
function test3(){
	global $variable,$age;
	$age = "38";
    $variable = "variable";
}
test3();
echo $age;
echo $variable;
```


```php
$variable="variable";
$age=35;

function test2(){
    $GLOBALS["age"]="38";
    $GLOBALS["variable"] = "variable";

    echo $GLOBALS["variable"].'---'.$GLOBALS["age"];
}

test2();
echo PHP_EOL; 
echo $age;
echo $variable;
```

###  `$_SERVER`

- `$_SERVER` 是一个包含了诸如头信息(header)、路径(path)、以及脚本位置(script locations)等等信息的数组。
- 这个数组中的项目由 Web 服务器创建。
- 不能保证每个服务器都提供全部项目；服务器可能会忽略一些，或者提供一些没有在这里列举出来的项目。

```php
print_r($_SERVER)
```

资料来自 [PHP 超级全局变量 | 菜鸟教程 (runoob.com)](https://www.runoob.com/php/php-superglobals.html)