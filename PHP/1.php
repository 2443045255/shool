<?php
$a = [1,"dog" => 3];
foreach($a as $k => $v){
    echo $k . ':' . $v;
    echo PHP_EOL;
}
$a = "123";
function firstFunc(int $value){
    echo " $value ";
    global $a;
    echo $a;
}
firstFunc(123);
?>