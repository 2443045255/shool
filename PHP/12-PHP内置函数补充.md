# PHP内置函数补充

## 字符串相关函数

```php
  $strZh = "这是一个字符串";

  $strEn = "This is a string";
```

- strlen()  获取字符串长度 

- strpos() 在字符串内查找一个字符或一段指定的文本，返回第一次出现的位置或false
- stripos() 同上，但不区分大小写
- strrpos() 同上上，返回最后一次出现的位置或false
- strripos() 同上，但不区分大小写

- explode()  把字符串打散成数组
- implode() 把数组拼接成字符串

- strtoupper() 把字符串转换为大写
- strtolower() 把字符串转换为小写
- ucfirst() 将单词的首字母转换为大写
- lcfirst() 将单词的首字母转换为小写
- ucwords() 将字符串中每个单词的首字母转换为大写

- str_replace($search, $replace, $string) 将字符串中的某个子字符串替换为另一个字符串
- strrev()：将字符串反转
- trim()：去除字符串两端的空格
- substr() 截取字符串的一部分
- mb_substr() 截取字符串的一部分(中文)  需要安装扩展mbstring

## 数组相关函数


```php
$array = ["a","b","c","d"];
```

- array()：创建一个数组。 
- count()：返回数组中元素的数量。 
- array_push($array, $newElement)：将一个或多个元素添加到数组的末尾。
- array_unshift($array, $newElement)：将一个或多个元素添加到数组的开头。 
- array_pop()：删除并返回数组中的最后一个元素。 
- array_shift()：删除并返回数组中的第一个元素。 

- array_slice()：从数组中提取一部分元素，组成新的数组。 
- array_merge()：合并两个或多个数组。 
- array_reverse()：反转数组中的元素的顺序。

- in_array()：检查数组中是否存在某个值。 
- array_key_exists()：检查数组中是否存在某个键。 
- array_keys()：返回数组中的所有键，组成新数组。 
- array_values()：返回数组中的所有值，组成新数组。 
- array_search()：在数组中搜索给定的值，并返回对应的键。 
- array_unique()：移除数组中的重复值（原数组不变）。

- max() min() 最大值和最小值
- sort() 数组排序（升序）
- rsort() 数组排序（降序）
- array_sum() 数组求和
- array_product() 数组求乘积

