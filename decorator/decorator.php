<?php
# Component 介面
interface Course {
    public function getCost();
}

# ConcreteComponent
// 課程
class BaseCourse implements Course{
    protected $basePrice = 2600;
    
    public function getCost()
    {
        return $this->basePrice;
    }
}

# Decorator 介面
abstract class CourseDecorator implements Course{
    protected $course;
    public function __construct(Course $course){
        $this->course = $course;
    }

    public function getCost(){
        return $this->course->getCost();
    }
}

# ConcreteDecorator
// 吉他
class Guitar extends CourseDecorator{
    protected $guitarPrice = 4980;
    
    public function getCost()
    {
        return $this->course->getCost() + $this->guitarPrice;
    }
}

# ConcreteDecorator
// 調音器
class Tuner extends CourseDecorator{
    protected $tunerPrice = 120;
    
    public function getCost()
    {
        return $this->course->getCost() + $this->tunerPrice;
    }
}

class RentalGuitar extends BaseCourse{
    protected $rentalPrice = 500;
    
    public function getCost()
    {
        return parent::getCost() + $this->rentalPrice;
    }
}

class GuitarTuner extends BaseCourse{   
    public function getCost()
    {
        return parent::getCost() + 100000;
    }
}

// $buyCourse = new BaseCourse();

// var_dump($buyCourse->getCost());

// $buyGuitar = new Guitar();

// var_dump($buyGuitar->getCost());

// $buyTuner = new Tuner();

// var_dump($buyTuner->getCost());

// $buyRental = new RentalGuitar();

// var_dump($buyRental->getCost());

// $buyCourse = new GuitarTuner();

// var_dump($buyCourse->getCost());

$buyCourse = new Tuner(new Guitar(new BaseCourse));
var_dump($buyCourse->getCost());