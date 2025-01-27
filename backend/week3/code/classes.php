<?php

namespace classes;

// PHP 中的命名空间 namespace 主要是用来区分不同的代码库，避免命名冲突。
// 比如说我们在同一个项目中可能存在相同名称的类
// 但是如果我们将它们放在不同的命名空间中，就可以避免冲突。

class Car
{
    public int $price;
    public string $color;
    public static int $count = 0;

    public function __construct($price, $color)
    {
        $this->price = $price;
        $this->color = $color;
        self::$count = 1;
    }

    public function getCarInfo(): string
    {
        return "This car is a {$this->color} color. It costs {$this->price} USD. <hr>";
    }

    public static function thisIsAStaticFunction()
    {

    }

    public function getThisClassFunction(): void
    {
        $car = $this->getCarInfo();
        self::thisIsAStaticFunction();
    }
}

$car = new Car(10000, 'red');
$carInfo = $car->getCarInfo();
echo $carInfo;
var_dump($car::$count);
echo '<hr>';
$car::thisIsAStaticFunction();

class Truck extends Car
{
    public int $weight;

    public function __construct($price, $color, $weight)
    {
        parent::__construct($price, $color);
        $this->weight = $weight;
    }

    public function getTruckInfo(): string
    {
        return "This truck is a {$this->color} color. It costs {$this->price} USD. It weights {$this->weight} kg. <hr>";
    }
}

// Vehicle 车辆
// 接口是一种抽象类型，是一种没有具体实现的类。
// 它的作用是定义一些规定好的方法，让其他类去实现这些方法
interface Vehicle
{
    public function getVehicleInfo(): string;
}

// 如果一个类实现了某个接口，那么这个类必须实现接口中定义的所有方法。
class Motorcycle extends Car implements Vehicle
{
    public function getVehicleInfo(): string
    {
        return "This motorcycle is a {$this->color} color. It costs {$this->price} USD. <hr>";
    }
}

