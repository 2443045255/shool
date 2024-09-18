<?php
$result =1 or var_dump('执行我的语句');
var_dump($result);//1
$result=(1 or var_dump('执行我的语句'));
var_dump($result);//true
$result =0 and var_dump('执行我的语句');
var_dump($result);
$result=(0 and var_dump('执行我的语句'));
var_dump($result);
$result =(false xor false);
var_dump($result);
$result= !false;
var_dump($result);
$a = 1;
$b = false;
if($a>0){
    echo 'a>0';
};
?>