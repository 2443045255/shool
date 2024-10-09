# PHP运算符

## 基础运算符

- +
- -
- *
- /
- %

## 整数除法

- 函数intdiv
- 参数接收两个整数
- 返回一个向下取整的整数

## 赋值运算符

- =
- +=
- -=
- *=
- /=
- %=
- .= 连接运算符 用于连接两个字符串

## 自增自减

- ++
- --
## 比较运算符

- `==`
- `===` 绝对等于，除了判断值相等还会判断类型是否相等
- `>`
- `<`
- `>=`
- `<=`
- `!=`
- `<>`不等于和`!=`只有写法的区别
- `!==`

## 逻辑运算符

- `and` 与运算 `&&`

  - `&&` 运算符的优先级大于 `and`

  - `and`的优先级低于`=`

  - ```php
    $bool = true && false;
    echo $bool;
    $bool = true and false;
    echo $bool;
    ```

- `or` 或运算 `||`

  - `||`运算符的优先级大于`or`

  - `or`的优先级低于`=`

  - ```php
    $bool = false || true;
    echo $bool;
    $bool = false || true;
    echo $bool;
    ```

  - `or`有阻断的效果

  - ```php
    $result = 0 or var_dump('执行我的语句');
    var_dump($result);
    $result = (0 or var_dump('执行我的语句'));
    var_dump($result);
    $result = 0 and var_dump('执行我的语句');
    var_dump($result);
    $result = (0 and var_dump('执行我的语句'));
    var_dump($result);
    ```

- `xor` 异或运算

- `!` 非运算
