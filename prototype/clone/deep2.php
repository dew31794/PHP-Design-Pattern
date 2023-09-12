<?php
// Prototype 抽象原型：原型接口
interface Prototype{
    public function clone();
}

// ConcretePrototype 具體原型
class ConcretePrototype implements Prototype{
    private $name;

    // 建構子
    public function __construct($name){
        $this->name = $name;
    }

    // 建立物件
    public function clone(){
        return new ConcretePrototype($this->name);
    }

    public function getName(){
        return $this->name;
    }

    public function setName($name){
        $this->name = $name;
    }
}

// Client 客戶
$prototype = new ConcretePrototype("Prototype");
$clone = $prototype->clone();

$prototype->setName('TEST1');

echo $clone->getName().'<br>';  // 輸出結果 = Prototype
echo $prototype->getName().'<br>';  // 輸出結果 = TEST1