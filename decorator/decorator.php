<?php
# Component 介面
abstract class IComponent {

    protected $date;
    protected $ageGroup;
    protected $feature;
    abstract public function getAge($ageNow);
    abstract public function getAge();
    abstract public function getFeature();
    abstract public function getFeature($fea);
}

# ConcreteComponent 具體元件
class Male extends IComponent {
    public function __construct(){
        $this->date = "Male";
        $this->getFeature("\nDude programer features: ");
    }

    public function getAge(){
        return $this->ageGroup;
    }

    public function getAge($ageNow){
        $this->ageGroup = $ageNow;
    }

    public function getFeature(){
        return $this->feature;
    }

    public function getFeature($fea){
        $this->feature = $fea;
    }
}

# ConcreteComponent 具體元件
class Male extends IComponent {
    public function __construct(){
        $this->date = "Male";
        $this->getFeature("\nDude programer features: ");
    }

    public function getAge(){
        return $this->ageGroup;
    }

    public function getAge($ageNow){
        $this->ageGroup = $ageNow;
    }

    public function getFeature(){
        return $this->feature;
    }

    public function getFeature($fea){
        $this->feature = $fea;
    }
}

# Decorator 介面
abstract class Decorator extends IComponent{
    // 此類別繼承 getSite() 與 getPrice();
    // 它仍然是一個抽象類別
    // 你不需要在這裡實作抽象方法
    // 它的工作事保持 Component 原本的樣子，改變它的外觀
    public function getSite(){}
    public function getPrice(){}
}


# ConcreteDecorator 具體裝飾者
class MaintenanceDecorator extends Decorator {
    public function __construct(IComponent $siteNow){
        $this->site = $siteNow;
    }

    public function getSite(){
        $format = "\n Maintenance ";
        return $this->site->getSite(). $format;
    }

    public function getPrice(){
        return 950 + $this->site->getPrice();
    }
}

# ConcreteDecorator 具體裝飾者
class VideoDecorator extends Decorator {
    public function __construct(IComponent $siteNow){
        $this->site = $siteNow;
    }

    public function getSite(){
        $format = "\n Video ";
        return $this->site->getSite(). $format;
    }

    public function getPrice(){
        return 5000 + $this->site->getPrice();
    }
}

# ConcreteDecorator 具體裝飾者
class DatabaseDecorator extends Decorator {
    public function __construct(IComponent $siteNow){
        $this->site = $siteNow;
    }

    public function getSite(){
        $format = "\n Database ";
        return $this->site->getSite(). $format;
    }

    public function getPrice(){
        return 3500 + $this->site->getPrice();
    }
}

# Client
// function __autoload($class_name){
//     include $class_name.'.php';
// }

class Client{
    private $basicSite;

    public function __construct(){
        $this->basicSite = new BasicSite();
        $this->basicSite = $this->wrapComponent($this->basicSite);

        $siteShow = $this->basicSite->getSite();
        $price = $this->basicSite->getPrice();

        echo $siteShow;
        echo "\n" ;
        echo 'Total = $' . $price;
    }

    private function wrapComponent(IComponent $component){
        $component = new MaintenanceDecorator($component);
        $component = new VideoDecorator($component);
        $component = new DatabaseDecorator($component);

        return $component;
    }
}

$worker = new Client()