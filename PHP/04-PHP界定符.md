# PHP定界符

- 以`<<<EOF` 开始标记开始，以EOF结束标记结束
- 结束标记必须顶头写，不能有缩进和空格
- 在结束标记要有分号
- EOF可以使用任何字符代替，但是必须标记不能在正文中出现
- 位于开始和结束标记之间的变量可以被正常解析，但函数不能
- 在内容当中要内嵌引号的时候不需要使用转义字符，可以直接使用单双引号
- 当要复制一大段代码的时候就适合使用EOF界定符

```php
$a = 10;
echo <<<EOF
任意的内容
可以换行
可以使用变量$a
EOF;
```
