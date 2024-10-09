# PHP数组

数组能够在一个变量当中存储多个值，并且可以根据键访问当中的值

数值数组

```php
$testArray = array("测试", "测试", "测试");
$numArray = [1, 2, 3, 4, 5];
var_dump($testArray);
var_dump($numArray);
print_r($testArray); // print_r函数可以带着格式输出
```

## 数值数组

不指定键，键从0开始自增

```php
$nums = [1, 2, 3, 4];
```

## 关联数组

使用指定的键，键是字符串

```php
$ages = ["dog"=>"10", "cat"=>"8"];
// 或者
$ages["dog"] = "10";
$ages["cat"] = "8";
```

## 混合键使用

没有写键的时候会按照数字键继续递增

```php
$testArray = [
  "1",
  "test" => "neo",
  "3",
  "4"
];
```

## 数组相关的函数

```php
echo count($testArray); // 获取数组的长度

// 遍历数组(数值数组)
for($i = 0; $i < count($testArray); $i++) {
  echo $testArray[$i];
}

// 遍历数组
foreach ($testArray as $value) {
  // 要执行的代码
}

// 遍历数组
foreach ($testArray as $key => $value) {
  // 要执行的代码
}
```

## 多维数组

多维数组是包含一个多个数组的数组

```php
$testArray = [
  "class" => [
    1,
    2,
    3
  ],
  "room" => [
    4,
    5,
    6
  ]
];
```
