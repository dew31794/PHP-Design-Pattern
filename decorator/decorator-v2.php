<?php
# Component 介面
abstract class Course {
    abstract public function getCost();
}

# ConcreteComponent 具體元件
// 吉他課程
class GuitarCourse extends Course{
    protected $guitarCoursePrice = 2600;
    
    public function getCost(){
        return $this->guitarCoursePrice;
    }
}

# Decorator 介面
abstract class Decorator extends Course{
    protected $course;
    public function __construct(Course $course){
        $this->course = $course;
    }

    public function getCost(){
        return $this->course->getCost();
    }
}

# ConcreteDecorator 具體裝飾者
// 吉他
class Guitar extends Decorator{
    protected $guitarPrice = 4980;
    
    public function getCost(){
        return $this->course->getCost() + $this->guitarPrice;
    }
}

# ConcreteDecorator 具體裝飾者
// 調音器
class Tuner extends Decorator{
    protected $tunerPrice = 120;
    
    public function getCost(){
        return $this->course->getCost() + $this->tunerPrice;
    }
}

$buyCourse = new Tuner(new Guitar(new GuitarCourse));
var_dump($buyCourse->getCost());