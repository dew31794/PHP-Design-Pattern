<?php
// Prototype 抽象原型：原型接口
interface Prototype{
    // public function clone();
}

// ConcretePrototype 具體原型
class ConcretePrototype implements Prototype{
    private $name;

    // 建構子
    public function __construct($name){
        $this->name = $name;
    }

    // 建立物件
    // public function clone(){
    //     return new ConcretePrototype($this->name);
    // }

    public function getName(){
        return $this->name;
    }

    public function setName($name){
        $this->name = $name;
    }
}

// Client 客戶
$prototype = new ConcretePrototype("Prototype");
$test = $prototype;

$prototype->setName("TEST2");

echo $test->getName().'<br>';  // 輸出結果 = TEST2
echo $prototype->getName().'<br>';  // 輸出結果 = TEST2