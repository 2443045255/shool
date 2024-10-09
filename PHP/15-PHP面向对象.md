# PHP面向对象

## 面向对象（OOP）

### 概念

#### 对象：

在现实世界里我们所面对的事情都是对象，如苹果 猫 电视机等。
而在面向对象的程序设计(OOP)中，对象是一个由信息及对信息进行处理的描述所组成的整体，是对现实世界的抽象。

例如：
小猫 名字：Tom，性别：公，花色：橘色；会叫，会吃饭，会打闹
小狗 名字：Jack，性别：公，花色：黑色；会叫，会吃饭，会打闹

区分：谁在叫，谁在吃饭，谁在打闹

#### 面向对象：

- 面向对象是一种编程思想和方法，它将程序中的**数据**和**操作数据**的方法封装在一起，形成"对象"，并通过对象之间的交互和消息传递来完成程序的功能。
- 面向对象编程(OOP)强调数据的**封装、继承、多态**和**动态绑定**等特性，使得程序具有更好的可扩展性、可维护性和可重用性。



#### **对象的主要三个特性：**

- 对象的行为：对象可以执行的操作，比如：开灯，关灯就是行为。
- 对象的形态：对对象不同的行为是如何响应的，比如：颜色，尺寸，外型。
- 对象的表示：对象的表示就相当于身份证，具体区分在相同的行为与状态下有什么不同（在面向对象编程中，对象的表示通常通过类来实现）。

#### **面向对象编程的三个主要特性：**

- 封装：指将对象的属性和方法封装在一起，使得外部无法直接访问和修改对象的内部状态。通过使用访问控制修饰符（public、private、protected）来限制属性和方法的访问权限，从而实现封装。

- 继承：指可以创建一个新的类，该类继承（extends）了父类的属性和方法，并且可以添加自己的属性和方法。通过继承，可以避免重复编写相似的代码，并且可以实现代码的重用。

- 多态：指可以使用一个父类类型的变量来引用不同子类类型的对象，从而实现对不同对象的统一操作。多态可以使得代码更加灵活，具有更好的可扩展性和可维护性。在 PHP 中，多态可以通过实现接口（interface）和使用抽象类（abstract class）来实现。

### 类（class）

- 定义了一件事物的抽象特点。
- 类的定义包含了数据的形式以及对数据的操作。

#### 类的定义和调用

##### 类的定义

```php
class Animal {
	public $name = "小猫仔";
    public function eat() {
        echo " 在吃饭.";
    }
}
```

##### 类的调用

new 实例化对象

```php
$cat = new Animal;
//$cat = new Animal();
echo $cat->name;
$cat->eat();
```

#### 方法和属性

##### 类方法（函数）

```php
class Animal {
	public $name = "小猫仔";
    public function eat() {
        echo " 在吃饭.";
    }
    function say() {
        echo " 在说话.";
    }
}
```

##### $this

代表自身的对象

```php
class Animal {
	public $name = "小猫仔";
    public function eat() {
        echo $this->name." 在吃饭.";
    }
    function say() {
        echo $this->name." 在说话.";
    }
}

$cat = new Animal;
$cat->name = "小花";
$cat->say();

$dog = new Animal;
$dog->name = "小黑";
$dog->say();
```

##### 访问控制

关键字 public、private、protected

- **public（公有）**：公有的类成员可以在任何地方被访问。
- **protected（受保护）**：受保护的类成员则可以被其自身以及其子类和父类访问（咱家的）。
- **private（私有）**：私有的类成员则只能被其定义所在的类访问（自己的）。


##### `__construct`构造函数

- 构造函数是一种特殊的方法，在创建一个新对象时，它会被自动调用。
- 它可以用来 **初始化** 对象的属性或执行其他必要的操作
- 没有返回值

```php
  class Animal {
	private $name;
	private $birth;
	private $age;

    public function __construct($name,$birth)
    {
        $this->name = $name;
        $this->birth = $birth;
        
        $days = (time() - strtotime($this->birth))/3600/24;
        $this->age = floor($days);
    }

    public function eat() {
        echo  $this->name." 在吃饭.";
    }
}

$cat = new Animal("猫仔","2023-05-23");
echo $cat->name;
echo ' -- ';
echo $cat->birth;
echo ' -- ';
echo $cat->age;
```

##### `__destruct`析构函数

- 析构函数是一种特殊的方法，它在对象被销毁时自动调用
- 它可以用来执行一些清理操作，例如释放资源或关闭数据库连接。
- 当对象不再被引用或脚本执行结束时，析构函数会被自动调用。

```php
class MyClass {
    public function say($i)
    {
      echo 'saying-'.$i;
    }
    public function __destruct() {
        echo "析构函数被调用\n";
    }
}

// 创建对象
$obj = new MyClass();

// 执行其他操作...
for ($i=0; $i < 4; $i++) {
    if($i==3){
        unset($obj);
    }
    if($obj)
        $obj->say($i);
}
```

##### static 静态变量 和 self

「静态」指的是无需对类进行实例化，就可以直接调用这些属性和方法
所有对静态变量进行的操作都会对所有对象起作用
举例：小猫小狗听到指令来吃饭，指令变化，全部都要听从

```php
public static $cat = "cat";

echo self::$cat;
```

##### 类常量

静态属性与类常量相似，唯一的区分是类常量不可以更改，静态属性可以更改
使用场景：所有的对象共用一个属性

```php
const CAT = "cat";

echo self::CAT;
```


##### static 静态方法

```php
public static function say() {
        echo self::$name;
}
```

可以调用静态方法、静态变量
可以调用非静态方法、非静态变量

```php
public function eat() {

        echo $this->name." 在吃饭.";

}
public static function say() {

        echo (new self)->eat();

}
```

#### 类的继承（extends）：

指可以创建一个新的类，该类继承（extends）了父类的属性和方法，并且可以添加自己的属性和方法。通过继承，可以避免重复编写相似的代码，并且可以实现代码的重用。

注意：继承不一定能访问

```php
class Animal {
    public $name="小动物";
    protected $age=3;
    private $birth='2023';
}

class Cat extends Animal {}


var_dump(new Animal);
var_dump(new Cat);
```

```php
class Animal {
    protected $name;

    public function __construct($name) {
        $this->name = $name;
    }

    public function eat() {
        echo $this->name . " 在吃饭.";
    }
}

class Cat extends Animal {
    public function meow() {
        echo $this->name . " 在喵呜.";
    }
}

$cat = new Cat("Tom");
var_dump($cat);
$cat->eat();  // 继承自父类 Animal 的方法
$cat->meow();  // 子类 Cat 自己的方法
```

##### 方法和属性重写

如果从父类继承的方法或属性不能满足子类的需求，可以对其进行改写

##### final 关键字

作用：

- 防止类被继承
- 防止类的方法被重写

如果在一个类前加final，那么这个类就不能被继承；

```php
final class myClass {
    // 类的内容
}
```

如果在一个方法前加final，那么这个方法就不能被重写

```php
final public function eat() {
	echo $this->name . " 在吃饭.";
}
```

注意：final不能用于属性

##### 调用父类方法

parent::
**parent::__construct()**

##### 静态延迟绑定 static

是指在运行时根据实际调用的类来确定静态方法或属性的绑定
语法：`static::$name`

```php
class Animal {
    protected static $name="小动物";

    public static function eat() {
        echo self::$name. " 在吃饭.";
        echo ' ---- ';
        echo static::$name. " 在吃饭.";
    }
}

class Cat extends Animal {
    protected static $name="小猫";
}

Animal::eat();
Cat::eat();

```

#### 类的多态

- 多态性允许不同类的对象对相同的消息作出不同的响应。
- 多态性通过方法重写（覆盖）和方法重载来实现。
- 方法重写是指子类重写父类的方法，以改变方法的实现细节。
- 方法重载是指在同一个类中根据参数个数或类型不同来实现不同功能。
- 需要注意的是，多态性只适用于继承关系的类。子类必须重写父类的方法才能实现多态性。

```php
class Animal {
    protected $name="动物";
    public function makeSound() {
        echo "$this->name 在吼叫。";
    }
}

class Dog extends Animal {
    protected $name="小狗";
    public function makeSound() {
        echo "$this->name 在汪汪。";
    }
}

class Cat extends Animal {
    protected $name="小猫";
    public function makeSound() {
        echo "$this->name 在喵喵。";
    }
}

$animal = new Animal();
$dog = new Dog();
$cat = new Cat();

$animal->makeSound();
$dog->makeSound();
$cat->makeSound();
```

##### 方法重载

```php
$args = func_get_args(); 
$numArgs = func_num_args();

function test(){

    $args = func_get_args(); 
    $numArgs = func_num_args();
    
    var_dump($args[1]);
    var_dump($numArgs);
}

test(1,2,3,4);

```

```php
class Animal {
    public function makeSound() {
        echo "动物在吼叫";
    }
}


class Cat extends Animal {
    public function makeSound() {
        // $args = func_get_args();
        $numArgs = func_num_args();
        
        switch($numArgs){
            case 2:
                echo '执行参数个数为2的事件';
                break;
            case 3:
                echo '执行参数个数为3的事件';
                break;
            default:
                echo '执行默认事件';
        }
    }
}

// $animal = new Animal();
$cat = new Cat();

$cat->makeSound("测试","2");
```

#### 接口和抽象类

##### interface(接口)

```php
interface Animals {
	public function a();
	public function b();
}

class Cat implements Animals {
	public function a(){
	
	};
	public function b(){
	
	};
}
```

接口是指一组方法的集合，不是类，不能被实例化。

- 可以指定某个类必须**实现**哪些方法，但不需要定义这些方法的具体内容
- 只可以使用public
- 通常用于定义一些规范，让代码更加有条理 不易出错。
  例如：小动物必须要吃饭和睡觉，否则就会死！这是必须的，每个小动物都必须有这2个方法！

```php
interface Animals {
    const ANIMAL = "动物";
    public function eat();
    public function sleep($hours);
    public static function jump();
}
  
class Cat implements Animals {
    public function eat() {
        echo "Cat 在吃饭.";
    }

    public function sleep($hours) {
        echo "Cat 要睡 $hours 小时.";
    }

    public static function jump(){
        echo '跳跳跳';
    }
}

$cat = new Cat();
$cat->eat();
$cat->sleep(18);

echo Cat::MAOSHU;
echo Cat::jump();
```


```php
interface Animals {
    public function eat();
    public function sleep($hours);
}
interface Sports {
    public function run();
    public function jump();
}
class Cat implements Animals,Sports {
    public function eat() {
        echo "Cat 在吃饭";
    }

    public function sleep($hours) {
        echo "Cat 要睡 $hours 小时";
    }

    public function run() {
        echo "Cat 在跑步";
    }

    public function jump() {
        echo "Cat 在蹦跳";
    }
}
```

##### 抽象类和抽象方法

和接口非常类似，使用它也是定义一种约束或规范，适合较大型的项目或库使用

###### 抽象类 

```php
abstract class Animals{

}
```

- 抽象类是一种特殊的类，只能被继承，不能被实例化
- 抽象类用于定义一组相关的方法，但这些方法的具体实现由继承它的子类来完成。
- 子类继承抽象类后，必须实现抽象类中的所有抽象方法。
- 抽象类可以包含抽象方法和普通方法

###### 抽象方法

```php
abstract public function xxx();
abstract protected function xxx();
```

- 抽象方法是没有具体实现的方法，只有方法的声明，而不需要方法体。
- 抽象方法只能存在于抽象类中。
- 可以使用protected，但不能使用private私有。

```php
abstract class Animals
{
    abstract public function eat();
    abstract protected function sleep($hours);

    public function play()
    {
      echo '玩耍';
    }
}

class Cat extends Animals
{
    public function eat()
    {
        echo "Cat 在吃饭.";
    }

    protected function sleep($hours)
    {
        echo "Cat 要睡 $hours 小时.";
    }
}


$cat = new Cat();
$cat->eat();
//$cat->sleep(12);
$cat->play();
```

##### 抽象类与接口的区别

1. 抽象类可以包含非抽象方法的实现，而接口只能包含方法的声明，没有方法的实现。 
2. 类只能继承一个抽象类，但可以实现多个接口。 
3. 抽象类可以有构造函数，而接口不能有构造函数。 
4. 抽象类中的方法可以有public、protected和private访问修饰符，而接口中的方法只能是public。 
5. 子类继承抽象类时，必须实现抽象类中的所有抽象方法，否则子类也必须声明为抽象类。
   子类实现接口时，必须实现接口中的所有方法。

#### `trait`代码复用

- 解决类的单一继承问题
- 可同时使用多个trait，用逗号隔开
- 把常用的、通用的代码抽离出来，写成trait

```php
trait A{

}
trait B{

}
class C {
	use A,B;
}
```

和类的继承非常像，但是trait里面不能有类常量，且trait不能被实例化。
根据下面类的继承来修改，对比看下他们的相同点：

```php
class Animal {
    protected $name;
    const MAOSHU="猫叔";

    public function __construct($name) {
        $this->name = $name;
    }

    public function eat() {
        echo $this->name . " 在吃饭.";
    }
}

class Cat extends Animal {
    public function meow() {
        echo $this->name . " 在喵呜.";
    }
}

$cat = new Cat("Tom");
var_dump($cat);
$cat->eat();  // 继承自父类 Animal 的方法
$cat->meow();  // 子类 Cat 自己的方法
```

- trait中可使用抽象方法
- trait中可使用静态属性和静态方法
- trait中可使用其他trait
- trait中可使用parent

```php
class MainClass{
    public function main()
    {
      echo '这是主方法的'.__METHOD__;
    }
}
trait Animal {

    public function eat() {
        parent::main();
        echo $this->name . " 在吃饭.";
        echo __TRAIT__;
    }
}

class Cat extends MainClass {
    use Animal;
    protected $name;
    public function __construct($n) {
        $this->name = $n;
    }
    public function meow() {
        echo $this->name . " 在喵呜.";
        echo __TRAIT__;
    }
}

$cat = new Cat("Tom");
var_dump($cat);
$cat->eat();  // 继承自父类 Animal 的方法
echo '----';
$cat->meow();  // 子类 Cat 自己的方法
```

##### 同名冲突

当一个类同时引入了多个Trait，并且这些Trait中存在同名方法时，就会产生方法冲突。

```php
use A,B{
	//A::eat insteadof B;
    B::eat insteadof A;
    //别名定义
    A::eat as Aeat;
}
```

```php
trait A
{
    public function eat(){
        echo '这是A的';
    }
}

trait B
{
    public function eat(){
        echo '这是B的';
    }
}

class T{
    use A,B{
        A::eat insteadof B;
        B::eat as Beat;
    }
}

$t = new T;

$t->eat();
$t->Beat();
```
