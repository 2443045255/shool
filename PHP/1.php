<?php
// function 输出($name,$age,$hight){
//     echo $name . ",年龄" . $age . ",身高" . "$hight" . PHP_EOL;;
// }
// 输出("小明","12","165");
// 输出("小王","13","165");
// 输出("小红","14","165");

class Animas
{
    public $name = "1";
    function action()
    {
        echo $this->name . "在";
    }
}

$Tom = new Animas();
$Tom->name = "汤姆";
$Tom->action();