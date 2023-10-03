<?php
# Component 介面
abstract class IComponent {

    protected $info;
    protected $ageGroup;
    protected $featrue;
    abstract public function getGender();
    abstract public function setAge($ageNow);
    abstract public function getAge();
    abstract public function setFeature($fea);
    abstract public function getFeature();
}

# ConcreteComponent 具體元件
class Male extends IComponent {
    public function __construct(){
        $this->gender = "Male";
        $this->setFeature("\n Dude programmer features: ");
    }

    public function getGender(){
        return $this->gender;
    }

    public function getAge(){
        return $this->ageGroup;
    }

    public function setAge($ageNow){
        $this->ageGroup = $ageNow;
    }
    
    public function getFeature(){
        return $this->featrue;
    }

    public function setFeature($fea){
        $this->featrue = $fea;
    }
}

# ConcreteComponent 具體元件
class Female extends IComponent {
    public function __construct(){
        $this->gender = "Female";
        $this->setFeature("\n Grrrl programmer features: ");
    }

    public function getGender(){
        return $this->gender;
    }

    public function getAge(){
        return $this->ageGroup;
    }

    public function setAge($ageNow){
        $this->ageGroup = $ageNow;
    }
    
    public function getFeature(){
        return $this->featrue;
    }

    public function setFeature($fea){
        $this->featrue = $fea;
    }
}

# Decorator 介面
abstract class Decorator extends IComponent{
    // 此類別繼承 setAge()
    // 它仍然是一個抽象類別
    // 你不需要在這裡實作抽象方法
    // 它的工作事保持 Component 原本的樣子，改變它的外觀
    public function setAge($ageNow){
        $this->ageGroup = $this->ageGroup;
    }
    public function getAge(){
        return $this->ageGroup;
    }
}


# ConcreteDecorator 具體裝飾者
class ProgramLangDecorator extends Decorator {
    private $languageNow;
    
    public function __construct(IComponent $infoNow){
        $this->info = $infoNow;
    }

    public function getGender(){
        return $this->info->getGender();
    }

    private $language = array(
        "php" => "PHP",
        "cs" => "C#",
        "js" => "JavaScript",
        "as3" => "ActionScript 3.0"
    );

    public function setFeature($lang){
        $this->languageNow = $this->language[$lang];
    }

    public function getFeature(){
        $output = $this->info->getFeature();
        $format = "\n";
        $output.= " $format Preferred progrmming language: ";
        $output.= $this->languageNow;

        return $output;
    }
}

# ConcreteDecorator 具體裝飾者
class HardwareDecorator extends Decorator {
    private $hardwareNow;
    
    public function __construct(IComponent $infoNow){
        $this->info = $infoNow;
    }

    public function getGender(){
        return $this->info->getGender();
    }

    private $box = array(
        "mac" => "Macintosh",
        "dell" => "Dell",
        "hp" => "Hewlett-Packard",
        "lin" => "Linux"
    );

    public function setFeature($hdw){
        $this->hardwareNow = $this->box[$hdw];
    }

    public function getFeature(){
        $output = $this->info->getFeature();
        $format = "\n";
        $output.= " $format Current Hardware: ";
        $output.= $this->hardwareNow;

        return $output;
    }
}

# ConcreteDecorator 具體裝飾者
class FoodDecorator extends Decorator {
    private $chowNow;
    
    public function __construct(IComponent $infoNow){
        $this->info = $infoNow;
    }
    
    public function getGender(){
        return $this->info->getGender();
    }

    private $snacks = array(
        "piz" => "Pizza",
        "burg" => "Burgers",
        "nach" => "Nachos",
        "veg" => "Veggies"
    );

    public function setFeature($yum){
        $this->chowNow = $this->snacks[$yum];
    }

    public function getFeature(){
        $output = $this->info->getFeature();
        $format = "\n";
        $output.= " $format Favorite food: ";
        $output.= $this->chowNow . "\n";

        return $output;
    }
}

# Client
// function __autoload($class_name){
//     include $class_name.'.php';
// }

class Client{
    // $hotDate 是元件實例
    private $hotDate;

    public function __construct(){
        $this->hotDate = new Female();
        echo $this->hotDate->getGender();
        echo "\n";
        $this->hotDate->setAge("Age Group 4");
        echo $this->hotDate->getAge();
        $this->hotDate = $this->wrapComponent($this->hotDate);
        echo $this->hotDate->getFeature();
    }

    private function wrapComponent(IComponent $component){
        $component = new ProgramLangDecorator($component);
        $component->setFeature("php");
        $component = new HardwareDecorator($component);
        $component->setFeature("lin");
        $component = new FoodDecorator($component);
        $component->setFeature("veg");

        return $component;
    }
}

$worker = new Client();

