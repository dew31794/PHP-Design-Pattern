<?php
# Component 介面
abstract class IComponent {

    protected $site;
    // 宣告抽象方法
    abstract public function getSite();
    abstract public function getPrice();
}


# ConcreteComponent 具體元件
class BasicSite extends IComponent {
    public function __construct(){
        $this->site = "Basic Site";
    }

    public function getSite(){
        return $this->site;
    }
    // 網站基本價格 12000
    public function getPrice(){
        return 12000;
    }
}

# Decorator 介面
// Decorator 抽象類別 維繫元件介面的角色
abstract class Decorator extends IComponent{
    // 此類別繼承 getSite() 與 getPrice();
    // 它仍然是一個抽象類別
    // 你不需要在這裡實作抽象方法
    // 它的工作事保持 Component 原本的樣子，改變它的外觀
    // public function getSite(){}
    // public function getPrice(){}
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
        // $this->basicSite = new BasicSite();
        // $this->basicSite = $this->wrapComponent($this->basicSite);
        $this->basicSite = new DatabaseDecorator(new VideoDecorator(new MaintenanceDecorator(new BasicSite())));

        $siteShow = $this->basicSite->getSite();
        $price = $this->basicSite->getPrice();

        echo $siteShow;
        echo "\n" ;
        echo 'Total = $' . $price;
    }
}

$worker = new Client();