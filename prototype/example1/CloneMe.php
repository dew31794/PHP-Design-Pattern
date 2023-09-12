<?php
abstract class CloneImg
{
    public $name;
    public $picture;
    // abstract function __clone();
}

class Animal extends CloneImg
{
    public function __construct()
    {
        $this->picture = "kangaroo.jpg";
        $this->name = "Little kangaroo";
    }   
    
    public function display()
    {
        echo "<img width='200' src='img/$this->picture'>";
        echo "<p>$this->name</p>";
    }
    
    public function __clone()
    {
        echo "-------------------<br />";
        echo "Clone here.<br /><br />";
    }
}

$animal = new Animal();
$animal->display();

$slacker = clone $animal;  //如果有__clone()方法會執行，但不能呼叫該方法
$slacker->name = "After";
$slacker->display();