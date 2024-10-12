<?php
class Animaf{
    private $age;
    protected $name;
    public function __construct($age){
        $this->age = $age;
    }

    final public function eat(){
        echo $this->age . "岁的" . $this->name . "在吃饭。";
    }
}

class Cat extends Animaf{
    public function __construct($age,$name){
        $this->name = $name;
        parent::__construct($age);
    }
}

$cat = new Cat(3,"TOM");
// var_dump($cat);
$cat->eat();
?>