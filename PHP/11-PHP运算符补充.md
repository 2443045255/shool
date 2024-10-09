# PHP运算符补充

## 其他运算符

### 数组运算符

- +号运算符（合并）
  注意：只会保留第一个数组中的键值对，而忽略后面数组中相同键名的元素，如果想要合并两个数组并覆盖相同键名的元素，可以使用array_merge()函数

```php
  $a = [
    "m" => "测试",
    "n" => "清除"
  ];

  $b = [
    "m" => "测试2",
    "o"=>"测试o",
    "p"=>"测试p",
    "q"=>[
        "cs"=>"二维测试"
    ]
  ];

  $c=[
    "m" => "测试3",
    "n" => "清除3"，
    "cc"=>123
  ];

  print_r($a+$b+$c);
```

- ==
- ===
  有相同的键/值对，且顺序相同、类型相同

```php
    $a = [1,2,3];
    $b = [1,2,"3"];
	var_dump($a == $b);
	var_dump($a === $b);
	
    $a = [
        "a"=>123,
        "b"=>456,
    ];

    $b = [
        "b"=>456,
        "a"=>123,
    ];

    var_dump($a == $b);
    var_dump($a === $b);
```

- `!=` 和 `<>` 对应的对比规则就是 `==`
- `!==` 对应的对比规则 `===`

### 三元运算符 ?:

```php
// $name = $username?$username:"测试";

$name = isset($username)?$username:"测试";

// $name = $username?:"测试";
var_dump($name);
```

### 空合并运算符 ??

用于简化处理可能为null的变量或数组元素的情况。
它的作用是判断一个变量是否未定义或者为null，如果未定义或为null，则返回指定的默认值；否则返回该变量的值

```php
$name = $username ?? "Maoshu";
echo $name;
```

### 组合比较符 <=>

可比较整型 浮点型 字符串

`$c = $a <=> $b; `

如果 $a > $b, 则 $c 的值为 1
如果 $a == $b, 则 $c 的值为 0
如果 $a < $b, 则 $c 的值为 -1

```php
$a = "acd";
$b = "ace";

var_dump($a <=> $b);
```

## 比较

### 数据类型的比较

虽然 PHP 是弱类型语言，但也需要明白变量类型及它们的意义
因为我们经常需要对 PHP 变量进行比较，包含松散和严格比较。

- 松散比较：使用两个等号 == 比较，只比较值，不比较类型。
- 严格比较：用三个等号（全等） === 比较，除了比较值，也比较类型。

例如，"42" 是一个字符串而 42 是一个整数。false 是一个布尔值而 "false" 是一个字符串。

```php
<?php
if(42 == "42") {
    echo '1、值相等';
}
 
echo PHP_EOL; // 换行符
 
if(42 === "42") {
    echo '2、类型相等';
} else {
    echo '3、类型不相等';
}
?>
```

问题：如果只想比较类型是否相同，怎么比较？


### 比较undefined、 0、false、null、空值

分析 isset() is_null() empty()的区别

```php
var_dump(!isset($name));
var_dump(is_null($name));
```

```php
$name = null;
var_dump(!isset($name));
var_dump(is_null($name));
var_dump(empty($name));
```

#### empty

注意：empty() 函数对于未定义的变量也会返回true，因此在使用empty() 函数之前，应该确保变量已经被定义

```php
$var1 = ""; // 空字符串
$var2 = 0; // 整数0
$var3 = null; // null
$var4 = false; // false
$var5 = array(); // 空数组 []

var_dump(empty($var1));
var_dump(empty($var2));
var_dump(empty($var3));
var_dump(empty($var4));
var_dump(empty($var5));
```
