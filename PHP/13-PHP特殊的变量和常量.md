# PHP特殊的变量和常量

## 特殊的变量写法和常量

### 特殊的变量写法

```php
$a ='test';
$$a = "测试";

echo $a;
echo ' ---- ';
echo $$a;
echo ' ---- ';
echo $test;
```

实际使用场景：

```php
for ($i=0; $i < 5; $i++) { 
    $a = "test".$i;
    $$a = "测试-".$i;
}

echo $test1;
echo $test2;

```

### 常量

常量值被定义后，在脚本的其他任何地方都不能被改变。
命名规则和变量类似，严格区分大小写，但无需$符
**注意：** 默认是全局的，可以在整个运行的脚本的任何地方使用。

```php
define("TEST", "test.com");
echo TEST;

echo '<hr>';

const TEST1 = "测试";
echo TEST1;

$a = 2;
define("TEST".$a, "测试1");
echo constant("TEST".$a);

echo '<hr>';

```

实际使用场景：

```php
for ($i=0; $i < 5; $i++) { 
    $a = "TEST".$i;
    // $$a = "测试-".$i;
    define($a,'测试-'.$i);
}

echo TEST1;
echo TEST2;
```

#### const和define的区别

- const不能在条件语句中定义常量

```php
$a = 1;
if($a==1){
    define("TEST".$a, "测试1");
    echo constant("TEST".$a);
    
    const TEST2 = "测试2";
    echo TEST2;
}
```


- const用于类成员变量的定义，define不可以用于类成员变量的定义，可用于全局常量。
- const可在类中使用，define不能

```php
class ceshi {
    
    const Ceshi = '测试';
    public function cc()
    {
        define('TEST','新测试');
        echo self::Ceshi;
    }

}
$c = new ceshi;
$c->cc();

echo '----';
echo TEST;
```


#### 常量和变量的区别：

- 常量前面没有美元符号($)，而且不能有

- 常量可以不用理会变量的作用域在任何地方定义和访问

- 常量一旦定义就不能重新定义或取消定义

- 常量的值只能是标量（字符串、整数、浮点数、布尔值）,注意：现在也支持数组了

获取所有的常量

```php
get_defined_constants()
get_defined_constants(true)
get_defined_constants(true)["user"]
```

### 魔术常量

魔术常量：它的值随着它在代码中的位置改变而改变

##### `__LINE__` 

文件中的当前行号

```php
echo '这是第 " ' . __LINE__ . ' " 行';
```

##### `__FILE__`

文件的完整路径和文件名，包含（盘符）根目录

```php
echo '该文件的完整路径为 " ' . __FILE__ . ' " ';
```

##### `__DIR__`

文件所在的目录

```php
echo '该文件位于 " ' . __DIR__ . ' " ';
```

##### `__FUNCTION__`

该函数被定义时的名字（区分大小写）

```php
function test() {
    echo  '函数名为：' . __FUNCTION__ ;
}
test();
```

##### `__CLASS__`

该类被定义时的名字（区分大小写）

```php
<?php
class testClass {
    function test() {
        echo '类名为：'  . __CLASS__ . "<br>";
        echo  '函数名为：' . __FUNCTION__ ;
    }
}
$t = new testClass();
$t->test();
?>
```


##### `__NAMESPACE__`

命名空间

```php
namespace MyProject; 
echo '命名空间为："', __NAMESPACE__, '"'; // 输出 "MyProject"
```

##### `__METHOD__`

包含了：命名空间 类名 函数名

```php
namespace TEST;
class MyClass {
    public function myMethod() {
        echo __METHOD__; // 输出：TEST\MyClass::myMethod
    }
}

$obj = new MyClass();
$obj->myMethod();
```

##### `__TRAIT__`

当前使用的 trait 的名称

```php
trait MyTrait {
    public function myMethod() {
        echo "trait的名称为: " . __TRAIT__;
    }
}

class MyClass {
    use MyTrait;
}

$obj = new MyClass();
$obj->myMethod();
```
