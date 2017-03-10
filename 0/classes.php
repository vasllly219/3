<?php
class Cat
{
  public $name;
  private $gender;
  private $color = 'white';
  private $weight = 0.5;
  private $birthday;

  public function __construct($name, $gender)
  {
    $this->name = $name;
    $this->gender = $gender;
    $this->birthday = time();
  }

  public function setBirthday($birthday)
  {
    $this->birthday = $birthday;
  }

  public function getGender()
  {
    return $this->gender;
  }

  public function getColor()
  {
    return $this->color;
  }

  public function getWeight()
  {
    return $this->weight;
  }

  public function getAge()
  {
    return round((time() - $birthday) / 60 / 60 / 365);
  }
}

class Dog
{
  public $name;
  private $gender;
  private $color = 'black';
  private $weight = 1;
  private $birthday;

  public function __construct($name, $gender)
  {
    $this->name = $name;
    $this->gender = $gender;
    $this->birthday = time();
  }

  public function setBirthday($birthday)
  {
    $this->birthday = $birthday;
  }

  public function getGender()
  {
    return $this->gender;
  }

  public function getColor()
  {
    return $this->color;
  }

  public function getWeight()
  {
    return $this->weight;
  }

  public function getAge()
  {
    return round((time() - $birthday) / 60 / 60 / 365);
  }
}

class House
{
  public static $countHouses = 0;

  private $adress;
  private $floors;
  public $color = 'white';

  public function __construct($adress, $floors)
  {
    self::$countHouses++;
    $this->adress = $adress;
    $this->floors = $floors;
  }

  public function getAdress()
  {
    return $this->adress;
  }

  public function getFloors()
  {
    return $this->floors;
  }
}

class Car
{
  public static $countCars = 0;

  public $color = 'white';
  private $brand;
  private $acceleration;
  private $speed = 0;
  private $maxSpeed = 180;

  public function __construct($brand, $acceleration = 10)
  {
    self::$countCars++;
    $this->brand = $brand;
    $this->acceleration = $acceleration;
  }

  public function getBrand()
  {
    return $this->brnd;
  }

  public function accelerate($time)
  {
    $this->speed = $this->speed + $this->acceleration * $time;
    if ($this->speed > $this->maxSpeed){
      $this->speed = $this->maxSpeed;
    }
  }

  public function braking($time)
  {
    $this->speed = $this->speed - $this->acceleration * $time;
    if ($this->speed < 0){
      $this->speed = 0;
    }
  }

  public function getSpeed()
  {
    return $this->speed;
  }
}

class Phone
{
  private $name;
  private $price;
  private $color = 'black';
  public $number;

  public function __construct($name, $price)
  {
    $this->name = $name;
    $this->price = $price;
  }
}
