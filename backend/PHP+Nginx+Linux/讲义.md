# PHP 培训讲义

## 目录
1. [PHP 基础](#php-基础)
	- [PHP 简介](#php-简介)
	- [变量](#变量)
		- [变量的定义和使用](#变量的定义和使用)
		- [变量类型](#变量类型)
		- [变量的类型转换](#变量的类型转换)
	- [常量](#常量)
	- [数据类型](#数据类型)
		- [字符串](#字符串)
		- [整数](#整数)
		- [浮点数](#浮点数)
		- [布尔值](#布尔值)
		- [数组](#数组)
		- [对象](#对象)
		- [NULL](#null)
	- [条件判断](#条件判断)
		- [if 语句](#if-语句)
		- [if...elseif...else 语句](#ifelseifelse-语句)
		- [switch 语句](#switch-语句)
	- [循环](#循环)
		- [for 循环](#for-循环)
		- [while 循环](#while-循环)
		- [do...while 循环](#dowhile-循环)
		- [foreach 循环](#foreach-循环)
	- [数组操作](#数组操作)
		- [数组的定义和使用](#数组的定义和使用)
		- [数组操作函数](#数组操作函数)
	- [字符串处理](#字符串处理)
		- [字符串的定义和操作](#字符串的定义和操作)
		- [字符串处理函数](#字符串处理函数)
2. [PHP 高级内容](#php-高级内容)
	- [函数](#函数)
		- [函数的定义和使用](#函数的定义和使用)
		- [参数和返回值](#参数和返回值)
		- [作用域](#作用域)
		- [匿名函数](#匿名函数)
	- [类和对象](#类和对象)
		- [类的定义](#类的定义)
		- [对象的创建和使用](#对象的创建和使用)
		- [属性和方法](#属性和方法)
		- [构造函数和析构函数](#构造函数和析构函数)
		- [继承](#继承)
		- [接口](#接口)
		- [抽象类](#抽象类)
	- [魔术方法](#魔术方法)
	- [魔术变量](#魔术变量)
	- [超全局变量](#超全局变量)
3. [常用 PHP 方法](#常用-php-方法)
	- [字符串处理函数](#字符串处理函数)
	- [数组处理函数](#数组处理函数)
	- [文件处理函数](#文件处理函数)
4. [错误和异常处理](#错误和异常处理)
	- [错误处理](#错误处理)
	- [异常处理](#异常处理)

## PHP 基础

### PHP 简介
PHP，全称为 `PHP: Hypertext Preprocessor`，是一种通用开源脚本语言，尤其适用于 Web 开发并可嵌入 HTML 中。PHP 语法吸收了 C、Java、Perl 等语言的特点，利于学习，使用广泛。

### 变量
变量是存储数据的容器。在 PHP 中，变量以 `$` 符号开头，后面跟着变量名。变量名区分大小写。

#### 变量的定义和使用
```php
<?php
// 定义变量
$variable_name = "Hello, World!";
$number = 100;
$float_number = 10.5;
$boolean = true;

// 使用变量
echo $variable_name;  // 输出：Hello, World!
echo $number;         // 输出：100
echo $float_number;   // 输出：10.5
echo $boolean;        // 输出：1 (true 会转换为 1)
?>
```

#### 变量类型
PHP 支持多种变量类型，包括：
- 字符串（String）
- 整数（Integer）
- 浮点数（Float/Double）
- 布尔值（Boolean）
- 数组（Array）
- 对象（Object）
- 空值（NULL）

#### 变量的类型转换
```php
<?php
// 定义整数变量
$number = 10;         
// 将整数变量转换为字符串变量
$string_number = (string)$number;  
echo $string_number;  // 输出：10

// 将整数变量转换为浮点数变量
$float_number = (float)$number;    
echo $float_number;   // 输出：10.0
?>
```

### 常量
常量是一个简单值的标识符，在脚本中不能改变。常量使用 `define()` 函数定义。

#### 常量的定义和使用
```php
<?php
// 定义常量
define("GREETING", "Welcome to PHP!");

// 使用常量
echo GREETING;  // 输出：Welcome to PHP!
?>
```

### 数据类型
PHP 支持多种数据类型，用于表示不同类型的值。

#### 字符串
字符串是字符的序列，用于表示文本。可以使用单引号或双引号定义字符串。

```php
<?php
// 定义字符串变量
$string1 = "Hello, World!";
$string2 = 'Hello, World!';
?>
```

#### 整数
整数是没有小数部分的数字。可以是正数或负数。

```php
<?php
// 定义整数变量
$int1 = 123;
$int2 = -123;
?>
```

#### 浮点数
浮点数是带小数部分的数字。

```php
<?php
// 定义浮点数变量
$float1 = 10.5;
$float2 = -10.5;
?>
```

#### 布尔值
布尔值表示真或假，使用 `true` 或 `false`。

```php
<?php
// 定义布尔值变量
$bool1 = true;
$bool2 = false;
?>
```

#### 数组
数组是一个变量，可以存储多个值。

```php
<?php
// 定义数组
$array = ["red", "green", "blue"];
?>
```

#### 对象
对象是类的实例，类是包含属性和方法的结构。

```php
<?php
// 定义类
class Car {
    // 类的构造函数
    function Car() {
        // 定义属性
        $this->model = "VW";
    }
}
// 创建类的实例
$herbie = new Car();
// 访问对象的属性
echo $herbie->model;
?>
```

#### NULL
NULL 是一个特殊类型，表示变量没有值。

```php
<?php
// 定义一个 NULL 变量
$var = NULL;
?>
```

### 条件判断
条件判断用于根据不同的条件执行不同的代码块。常见的条件判断语句包括 `if`、`else`、`elseif` 和 `switch`。

#### if 语句
```php
<?php
// 定义一个变量
$age = 20;

// if 语句判断条件是否为真
if ($age >= 18) {
    // 条件为真时执行的代码
    echo "You are an adult.";
} else {
    // 条件为假时执行的代码
    echo "You are a minor.";
}
?>
```

#### if...elseif...else 语句
```php
<?php
// 定义一个变量
$score = 85;

// 使用 if...elseif...else 语句判断多个条件
if ($score >= 90) {
    // 条件为真时执行的代码
    echo "Grade: A";
} elseif ($score >= 80) {
    echo "Grade: B";
} elseif ($score >= 70) {
    echo "Grade: C";
} elseif ($score >= 60) {
    echo "Grade: D";
} else {
    // 所有条件均为假时执行的代码
    echo "Grade: F";
}
?>
```

#### switch 语句
```php
<?php
// 定义一个变量
$day = "Monday";

// 使用 switch 语句判断多个条件
switch ($day) {
    case "Monday":
        echo "Today is Monday.";
        break;
    case "Tuesday":
        echo "Today is Tuesday.";
        break;
    case "Wednesday":
        echo "Today is Wednesday.";
        break;
    default:
        echo "Today is not Monday, Tuesday, or Wednesday.";
        break;
}
?>
```

### 循环
循环用于重复执行代码块。常见的循环语句包括 `for`、`while`、`do...while` 和 `foreach`。

#### for 循环
```php
<?php
// 使用 for 循环输出数字 0 到 4
for ($i = 0; $i < 5; $i++) {
    echo "The number is: $i <br>";
}
?>
```

#### while 循环
```php
<?php
// 使用 while 循环输出数字 0 到 4
$i = 0;
while ($i < 5) {
    echo "The number is: $i <br>";
    $i++;
}
?>
```

#### do...while 循环
```php
<?php
// 使用 do...while 循环输出数字 0 到 4
$i = 0;
do {
    echo "The number is: $i <br>";
    $i++;
} while ($i < 5);
?>
```

#### foreach 循环
```php
<?php
// 定义一个数组
$colors = ["red", "green", "blue", "yellow"];

// 使用 foreach 循环遍历数组
foreach ($colors as $color) {
    echo "The color is: $color <br>";
}
?>
```

### 数组操作
数组是一个变量，可以存储多个值。PHP 提供了许多数组操作函数。

#### 数组的定义和使用
```php
<?php
// 定义一个索引数组
$colors = ["red", "green", "blue"];

// 访问数组元素
echo $colors[0];  // 输出：red

// 定义一个关联数组
$ages = ["Peter" => 35, "Ben" => 37, "Joe" => 43];

// 访问关联数组元素
echo $ages["Peter"];  // 输出：35
?>
```

#### 数组操作函数
```php
<?php
// 定义一个数组
$fruits = ["apple", "banana", "cherry"];

// 数组长度
echo count($fruits);  // 输出：3

// 数组合并
$vegetables = ["carrot", "pea"];
$food = array_merge($fruits, $vegetables);
print_r($food);  // 输出：Array ( [0] => apple [1] => banana [2] => cherry [3] => carrot [4] => pea )

// 数组排序
sort($fruits);
print_r($fruits);  // 输出：Array ( [0] => apple [1] => banana [2] => cherry )
?>
```

### 字符串处理
PHP 提供了许多函数用于字符串处理。

#### 字符串的定义和操作
```php
<?php
// 定义字符串
$str = "Hello, World!";

// 获取字符串长度
echo strlen($str);  // 输出：13

// 字符串连接
$str1 = "Hello";
$str2 = "World";
echo $str1 . " " . $str2;  // 输出：Hello World
?>
```

#### 字符串处理函数
```php
<?php
// 定义字符串
$str = "Hello, World!";

// 转换为小写
echo strtolower($str);  // 输出：hello, world!

// 转换为大写
echo strtoupper($str);  // 输出：HELLO, WORLD!

// 查找子字符串
echo strpos($str, "World");  // 输出：7

// 替换子字符串
echo str_replace("World", "Dolly", $str);  // 输出：Hello, Dolly!
?>
```

## PHP 高级内容

### 函数
函数是可以重复使用的代码块，用于执行特定任务。函数可以接受参数并返回值。

#### 函数的定义和使用
```php
<?php
// 定义函数
function sayHello() {
    echo "Hello, World!";
}

// 调用函数
sayHello();  // 输出：Hello, World!
?>
```

#### 参数和返回值
```php
<?php
// 定义带参数的函数
function add($a, $b) {
    return $a + $b;
}

// 调用函数并输出返回值
$sum = add(5, 10);
echo "Sum: $sum";  // 输出：Sum: 15
?>
```

#### 作用域
变量的作用域是变量在程序中可见的范围。PHP 有三种变量作用域：局部作用域、全局作用域和静态作用域。

```php
<?php
// 全局变量
$x = 5;

function myTest() {
    // 使用 global 关键字访问全局变量
    global $x;
    echo $x;
}

myTest();  // 输出：5
?>
```

#### 匿名函数
匿名函数是没有名称的函数，常用于回调函数。

```php
<?php
// 定义匿名函数
$sayHello = function($name) {
    echo "Hello, $name";
};

// 调用匿名函数
$sayHello("John");  // 输出：Hello, John
?>
```

### 类和对象
PHP 是一门面向对象的编程语言，支持类和对象的创建与使用。

#### 类的定义
```php
<?php
// 定义类
class Car {
    // 属性
    public $color;
    public $model;

    // 方法
    public function __construct($color, $model) {
        $this->color = $color;
        $this->model = $model;
    }

    public function message() {
        return "My car is a " . $this->color . " " . $this->model . ".";
    }
}
?>
```

#### 对象的创建和使用
```php
<?php
// 创建对象
$myCar = new Car("red", "Toyota");

// 调用对象的方法
echo $myCar->message();  // 输出：My car is a red Toyota.
?>
```

#### 属性和方法
```php
<?php
// 定义类
class Person {
    // 属性
    public $name;
    public $age;

    // 方法
    public function __construct($name, $age) {
        $this->name = $name;
        $this->age = $age;
    }

    public function introduce() {
        return "My name is " . $this->name . " and I am " . $this->age . " years old.";
    }
}

// 创建对象
$person = new Person("John", 30);

// 调用对象的方法
echo $person->introduce();  // 输出：My name is John and I am 30 years old.
?>
```

#### 构造函数和析构函数
```php
<?php
// 定义类
class Fruit {
    // 属性
    public $name;
    public $color;

    // 构造函数
    function __construct($name, $color) {
        $this->name = $name;
        $this->color = $color;
    }

    // 析构函数
    function __destruct() {
        echo "The fruit is {$this->name} and the color is {$this->color}.";
    }
}

// 创建对象
$apple = new Fruit("Apple", "red");
?>
```

#### 继承
```php
<?php
// 定义父类
class Animal {
    public $name;
    public function __construct($name) {
        $this->name = $name;
    }
    public function sound() {
        echo "Some sound";
    }
}

// 定义子类
class Dog extends Animal {
    public function sound() {
        echo "Bark";
    }
}

// 创建子类对象
$dog = new Dog("Buddy");
echo $dog->name;  // 输出：Buddy
$dog->sound();    // 输出：Bark
?>
```

#### 接口
```php
<?php
// 定义接口
interface Animal {
    public function makeSound();
}

// 实现接口
class Dog implements Animal {
    public function makeSound() {
        echo "Bark";
    }
}

// 创建对象
$dog = new Dog();
$dog->makeSound();  // 输出：Bark
?>
```

#### 抽象类
```php
<?php
// 定义抽象类
abstract class Animal {
    abstract public function makeSound();
}

// 继承抽象类
class Dog extends Animal {
    public function makeSound() {
        echo "Bark";
    }
}

// 创建对象
$dog = new Dog();
$dog->makeSound();  // 输出：Bark
?>
```

### 魔术方法
魔术方法是以双下划线（__）开头的特殊方法，在特定情况下会自动调用。常见的魔术方法包括 __construct()、__destruct()、__call()、__get()、__set() 等。

#### __construct() 和 __destruct()
```php
<?php
// 定义类 Fruit
class Fruit {
    public $name;
    public $color;

    // 构造函数，在对象创建时调用
    function __construct($name, $color) {
        $this->name = $name;
        $this->color = $color;
    }

    // 析构函数，在对象销毁时调用
    function __destruct() {
        echo "The fruit is {$this->name} and the color is {$this->color}.";
    }
}

// 创建对象 apple
$apple = new Fruit("Apple", "red");
// 脚本结束时自动调用析构函数，输出："The fruit is Apple and the color is red."
?>
```

#### __call()
```php
<?php
// 定义类 Test
class Test {
    // __call() 方法，在调用不存在的方法时执行
    public function __call($name, $arguments) {
        echo "Calling method '$name' with arguments: " . implode(', ', $arguments);
    }
}

// 创建对象并调用不存在的方法 runTest
$obj = new Test();
$obj->runTest('arg1', 'arg2');  // 输出："Calling method 'runTest' with arguments: arg1, arg2"
?>
```

#### __get() 和 __set()
```php
<?php
// 定义类 Person
class Person {
    private $data = array();

    // __set() 方法，在设置不存在的属性时调用
    public function __set($name, $value) {
        $this->data[$name] = $value;
    }

    // __get() 方法，在获取不存在的属性时调用
    public function __get($name) {
        return $this->data[$name];
    }
}

// 创建对象并设置和获取属性
$person = new Person();
$person->name = "John";  // 调用 __set()
echo $person->name;      // 调用 __get()，输出："John"
?>
```

### 魔术变量
魔术变量是 PHP 预定义的一些变量，能够获取当前执行环境的相关信息。常见的魔术变量包括 __LINE__、__FILE__、__DIR__、__FUNCTION__、__CLASS__ 等。

```php
<?php
// 输出当前行号
echo "This is line number " . __LINE__ . "<br>";

// 输出当前文件的完整路径
echo "The full path of this file is " . __FILE__ . "<br>";

// 输出当前文件所在的目录
echo "The directory of this file is " . __DIR__ . "<br>";

// 定义一个函数并输出函数名
function myFunction() {
    echo "The function name is " . __FUNCTION__ . "<br>";
}
myFunction();

// 定义一个类并输出类名
class MyClass {
    public function getClassName() {
        echo "The class name is " . __CLASS__ . "<br>";
    }
}
$obj = new MyClass();
$obj->getClassName();
?>
```

### 超全局变量
超全局变量是 PHP 内置的一些特殊数组，能够在脚本的任何地方访问。常见的超全局变量包括 $_GET、$_POST、$_SESSION、$_COOKIE、$_SERVER、$_GLOBALS 等。

#### $_GET 和 $_POST
```php
<?php
// 假设表单通过 GET 方法提交
// 获取表单中的 name 字段值
$name = $_GET['name'];
echo "Hello, " . $name;
?>
```

#### $_SESSION
```php
<?php
// 开启会话
session_start();

// 设置 session 变量
$_SESSION['username'] = "JohnDoe";

// 获取 session 变量
echo "Username is " . $_SESSION['username'];
?>
```

#### $_COOKIE
```php
<?php
// 设置 cookie，过期时间为 1 小时后
setcookie("user", "JohnDoe", time() + 3600);

// 获取 cookie
if (isset($_COOKIE['user'])) {
    echo "User is " . $_COOKIE['user'];
} else {
    echo "User is not set.";
}
?>
```

#### $_SERVER
```php
<?php
// 输出服务器相关信息
echo $_SERVER['PHP_SELF'];  // 当前执行脚本的文件名
echo $_SERVER['SERVER_NAME'];  // 当前服务器名称
echo $_SERVER['HTTP_HOST'];  // 当前请求头中的主机
echo $_SERVER['HTTP_USER_AGENT'];  // 当前请求头中的用户代理信息
echo $_SERVER['SCRIPT_NAME'];  // 当前脚本的路径
?>
```

# 常用 PHP 方法

## 字符串处理函数

### strlen()
获取字符串长度。

#### 用法
```php
strlen(string $str): int
```
- $str：输入的字符串。

#### 示例
```php
<?php
// 定义字符串
$str = "Hello, World!";
// 获取字符串长度
echo strlen($str);  // 输出：13
?>
```

### strpos()
查找子字符串在字符串中的位置。

#### 用法
```php
strpos(string $haystack, string $needle): int|false
```
- $haystack：要搜索的字符串。
- $needle：要查找的子字符串。

#### 示例
```php
<?php
// 定义字符串
$str = "Hello, World!";
// 查找子字符串的位置
$position = strpos($str, "World");
echo $position;  // 输出：7
?>
```

### str_replace()
替换字符串中的子字符串。

#### 用法
```php
str_replace(mixed $search, mixed $replace, mixed $subject): mixed
```
- $search：要查找的值。
- $replace：要替换的值。
- $subject：执行替换的字符串或数组。

#### 示例
```php
<?php
// 定义字符串
$str = "Hello, World!";
// 替换子字符串
$newStr = str_replace("World", "PHP", $str);
echo $newStr;  // 输出：Hello, PHP!
?>
```

### substr()
返回字符串的子串。

#### 用法
```php
substr(string $string, int $start, ?int $length = null): string
```
- $string：输入的字符串。
- $start：子串开始位置。
- $length：子串的长度（可选）。

#### 示例
```php
<?php
// 定义字符串
$str = "Hello, World!";
// 获取子字符串
$subStr = substr($str, 7, 5);
echo $subStr;  // 输出：World
?>
```

### strtoupper() 和 strtolower()
转换字符串为大写和小写。

#### 用法
```php
strtoupper(string $string): string
strtolower(string $string): string
```
- $string：输入的字符串。

#### 示例
```php
<?php
// 定义字符串
$str = "Hello, World!";
// 转换为大写
echo strtoupper($str);  // 输出：HELLO, WORLD!
// 转换为小写
echo strtolower($str);  // 输出：hello, world!
?>
```

### trim()
去除字符串两侧的空白字符。

#### 用法
```php
trim(string $string, string $characters = " nrtv0"): string
```
- $string：输入的字符串。
- $characters：要去除的字符（可选）。

#### 示例
```php
<?php
// 定义字符串
$str = "  Hello, World!  ";
// 去除空白字符
echo trim($str);  // 输出：Hello, World!
?>
```

### str_split()
将字符串分割成数组。

#### 用法
```php
str_split(string $string, int $length = 1): array
```
- $string：输入的字符串。
- $length：每个数组元素的长度（可选）。

#### 示例
```php
<?php
// 定义字符串
$str = "Hello";
// 分割字符串
$array = str_split($str, 2);
print_r($array);  // 输出：Array ( [0] => He [1] => ll [2] => o )
?>
```

## 数组处理函数

### array_merge()
合并一个或多个数组。

#### 用法
```php
array_merge(array ...$arrays): array
```
- $arrays：要合并的一个或多个数组。

#### 示例
```php
<?php
// 定义两个数组
$array1 = ["red", "green"];
$array2 = ["blue", "yellow"];
// 合并数组
$result = array_merge($array1, $array2);
print_r($result);  // 输出：Array ( [0] => red [1] => green [2] => blue [3] => yellow )
?>
```

### array_push()
将一个或多个元素压入数组的末尾。

#### 用法
```php
array_push(array &$array, mixed ...$values): int
```
- $array：输入的数组。
- $values：要添加的值。

#### 示例
```php
<?php
// 定义数组
$array = ["red", "green"];
// 向数组添加元素
array_push($array, "blue", "yellow");
print_r($array);  // 输出：Array ( [0] => red [1] => green [2] => blue [3] => yellow )
?>
```

### in_array()
检查数组中是否存在某个值。

#### 用法
```php
in_array(mixed $needle, array $haystack, bool $strict = false): bool
```
- $needle：要搜索的值。
- $haystack：要搜索的数组。
- $strict：是否进行严格比较（可选）。

#### 示例
```php
<?php
// 定义数组
$array = ["red", "green", "blue"];
// 检查数组中是否存在某个值
$result = in_array("green", $array);
echo $result;  // 输出：1 (true)
?>
```

### array_slice()
从数组中取出一段子数组。

#### 用法
```php
array_slice(array $array, int $offset, ?int $length = null, bool $preserve_keys = false): array
```
- $array：输入的数组。
- $offset：起始位置。
- $length：子数组的长度（可选）。
- $preserve_keys：是否保留原始键值（可选）。

#### 示例
```php
<?php
// 定义数组
$array = ["a", "b", "c", "d", "e"];
// 从数组中取出一段
$slice = array_slice($array, 2, 2);
print_r($slice);  // 输出：Array ( [0] => c [1] => d )
?>
```

### array_search()
在数组中搜索给定的值，如果成功则返回首个相应的键名。

#### 用法
```php
array_search(mixed $needle, array $haystack, bool $strict = false): int|string|false
```
- $needle：要搜索的值。
- $haystack：要搜索的数组。
- $strict：是否进行严格比较（可选）。

#### 示例
```php
<?php
// 定义数组
$array = ["red", "green", "blue"];
// 搜索数组中的值
$key = array_search("green", $array);
echo $key;  // 输出：1
?>
```

### array_reverse()
返回数组的逆序。

#### 用法
```php
array_reverse(array $array, bool $preserve_keys = false): array
```
- $array：输入的数组。
- $preserve_keys：是否保留键名（可选）。

#### 示例
```php
<?php
// 定义数组
$array = ["a", "b", "c"];
// 逆序数组
$reversed = array_reverse($array);
print_r($reversed);  // 输出：Array ( [0] => c [1] => b [2] => a )
?>
```

### array_keys()
返回数组中所有的键名。

#### 用法
```php
array_keys(array $array, mixed $search_value = null, bool $strict = false): array
```
- $array：输入的数组。
- $search_value：搜索的值（可选）。
- $strict：是否进行严格比较（可选）。

#### 示例
```php
<?php
// 定义数组
$array = ["name" => "John", "age" => 30, "gender" => "male"];
// 获取数组的键名
$keys = array_keys($array);
print_r($keys);  // 输出：Array ( [0] => name [1] => age [2] => gender )
?>
```

### array_values()
返回数组中的所有值。

#### 用法
```php
array_values(array $array): array
```
- $array：输入的数组。

#### 示例
```php
<?php
// 定义数组
$array = ["name" => "John", "age" => 30, "gender" => "male"];
// 获取数组的值
$values = array_values($array);
print_r($values);  // 输出：Array ( [0] => John [1] => 30 [2] => male )
?>
```

## 文件处理函数

### fopen(), fread(), fclose()
打开文件进行读写操作。

#### 用法
```php
fopen(string $filename, string $mode): resource|false
fread(resource $handle, int $length): string|false
fclose(resource $handle): bool
```
- $filename：要打开的文件名。
- $mode：打开文件的模式（例如 'r' 只读模式）。
- $handle：文件句柄。
- $length：要读取的字节数。

#### 示例
```php
<?php
// 打开文件 example.txt
$file = fopen("example.txt", "r") or die("Unable to open file!");

// 读取文件内容
echo fread($file, filesize("example.txt"));

// 关闭文件
fclose($file);
?>
```

### file_get_contents() 和 file_put_contents()
读取文件内容并将内容写入文件。

#### 用法
```php
file_get_contents(string $filename, bool $use_include_path = false, resource $context = null, int $offset = 0, int $maxlen = null): string|false
file_put_contents(string $filename, mixed $data, int $flags = 0, resource $context = null): int|false
```
- $filename：要读取或写入的文件名。
- $use_include_path：是否在 include 路径中搜索文件（可选）。
- $context：上下文资源（可选）。
- $offset：读取的起始位置（可选）。
- $maxlen：读取的最大长度（可选）。
- $data：要写入的数据。
- $flags：写入标志（可选）。

#### 示例
```php
<?php
// 读取文件内容
$content = file_get_contents("example.txt");
echo $content;

// 写入内容到文件
file_put_contents("example.txt", "Hello, PHP!");
?>
```

### fwrite()
将内容写入文件。

#### 用法
```php
fwrite(resource $handle, string $string, int $length = null): int|false
```
- $handle：文件句柄。
- $string：要写入的字符串。
- $length：要写入的最大字节数（可选）。

#### 示例
```php
<?php
// 打开文件 example.txt
$file = fopen("example.txt", "w") or die("Unable to open file!");

// 写入内容到文件
fwrite($file, "Hello, PHP!");

// 关闭文件
fclose($file);
?>
```

### file_exists()
检查文件或目录是否存在。

#### 用法
```php
file_exists(string $filename): bool
```
- $filename：要检查的文件或目录名。

#### 示例
```php
<?php
// 检查文件是否存在
if (file_exists("example.txt")) {
    echo "The file exists.";
} else {
    echo "The file does not exist.";
}
?>
```

### is_readable() 和 is_writable()
检查文件是否可读或可写。

#### 用法
```php
is_readable(string $filename): bool
is_writable(string $filename): bool
```
- $filename：要检查的文件名。

#### 示例
```php
<?php
// 检查文件是否可读
if (is_readable("example.txt")) {
    echo "The file is readable.";
} else {
    echo "The file is not readable.";
}

// 检查文件是否可写
if (is_writable("example.txt")) {
    echo "The file is writable.";
} else {
    echo "The file is not writable.";
}
?>
```

### unlink()
删除文件。

#### 用法
```php
unlink(string $filename): bool
```
- $filename：要删除的文件名。

#### 示例
```php
<?php
// 删除文件
if (unlink("example.txt")) {
    echo "The file has been deleted.";
} else {
    echo "The file could not be deleted.";
}
?>
```

## 数学处理函数

### abs()
返回一个数的绝对值。

#### 用法
```php
abs(mixed $number): number
```
- $number：输入的数字。

#### 示例
```php
<?php
// 计算绝对值
echo abs(-5);  // 输出：5
?>
```

### round()
对浮点数进行四舍五入。

#### 用法
```php
round(float $val, int $precision = 0, int $mode = PHP_ROUND_HALF_UP): float
```
- $val：输入的浮点数。
- $precision：小数点后的位数（可选）。
- $mode：舍入模式（可选）。

#### 示例
```php
<?php
// 四舍五入
echo round(3.14159, 2);  // 输出：3.14
?>
```

### max() 和 min()
返回数组或多个值中的最大值和最小值。

#### 用法
```php
max(array $values): mixed
min(array $values): mixed
```
- $values：输入的数组或多个值。

#### 示例
```php
<?php
// 定义数组
$numbers = [1, 2, 3, 4, 5];
// 获取最大值
echo max($numbers);  // 输出：5
// 获取最小值
echo min($numbers);  // 输出：1
?>
```

### pow()
返回数的乘幂。

#### 用法
```php
pow(mixed $base, mixed $exp): number
```
- $base：底数。
- $exp：指数。

#### 示例
```php
<?php
// 计算乘幂
echo pow(2, 3);  // 输出：8
?>
```

### sqrt()
返回一个数的平方根。

#### 用法
```php
sqrt(float $arg): float
```
- $arg：输入的数字。

#### 示例
```php
<?php
// 计算平方根
echo sqrt(16);  // 输出：4
?>
```

### rand() 和 mt_rand()
生成随机数。

#### 用法
```php
rand(): int
rand(int $min, int $max): int
mt_rand(): int
mt_rand(int $min, int $max): int
```
- $min：最小值（可选）。
- $max：最大值（可选）。

#### 示例
```php
<?php
// 生成 0 到 RAND_MAX 之间的随机数
echo rand();  // 输出：例如 123456

// 生成 1 到 10 之间的随机数
echo rand(1, 10);  // 输出：例如 7

// 生成 0 到 MT_RAND_MAX 之间的随机数
echo mt_rand();  // 输出：例如 654321

// 生成 1 到 10 之间的随机数
echo mt_rand(1, 10);  // 输出：例如 3
?>
```

## 日期和时间处理函数

### date() 和 time()
格式化日期和时间。

#### 用法
```php
date(string $format, int $timestamp = time()): string
time(): int
```
- $format：日期和时间的格式。
- $timestamp：时间戳（可选）。

#### 示例
```php
<?php
// 获取当前日期和时间
echo date("Y-m-d H:i:s");  // 输出：例如 2024-07-23 14:35:22

// 获取当前时间戳
echo time();  // 输出：例如 1627047322
?>
```

### strtotime()
将任何英文文本的日期或时间描述解析为 Unix 时间戳。

#### 用法
```php
strtotime(string $datetime, int $baseTimestamp = time()): int|false
```
- $datetime：日期或时间的描述。
- $baseTimestamp：基准时间戳（可选）。

#### 示例
```php
<?php
// 将日期转换为时间戳
echo strtotime("now");  // 输出：当前时间的时间戳

// 将具体日期转换为时间戳
echo strtotime("2024-07-23 14:00");  // 输出：例如 1627045200
?>
```

## 正则表达式函数

### preg_match()
执行匹配正则表达式。

#### 用法
```php
preg_match(string $pattern, string $subject, array &$matches = null, int $flags = 0, int $offset = int $offset = 0): int|false
```
- $pattern：正则表达式模式。
- $subject：输入字符串。
- $matches：匹配结果数组（可选）。
- $flags：标志（可选）。
- $offset：搜索的起始位置（可选）。

#### 示例
```php
<?php
// 定义字符串
$str = "Hello, World!";
// 正则表达式模式
$pattern = "/World/";
// 执行匹配
if (preg_match($pattern, $str, $matches)) {
    echo "Match found: " . $matches[0];  // 输出：Match found: World
} else {
    echo "No match found.";
}
?>
```

### preg_replace()
执行搜索和替换的正则表达式。

#### 用法
```php
preg_replace(mixed $pattern, mixed $replacement, mixed $subject, int $limit = -1, int &$count = null): mixed
```
- $pattern：正则表达式模式。
- $replacement：替换字符串或数组。
- $subject：输入字符串或数组。
- $limit：替换的最大次数（可选）。
- $count：替换的次数（可选）。

#### 示例
```php
<?php
// 定义字符串
$str = "Hello, World!";
// 正则表达式模式
$pattern = "/World/";
// 替换字符串
$replacement = "PHP";
// 执行搜索和替换
$newStr = preg_replace($pattern, $replacement, $str);
echo $newStr;  // 输出：Hello, PHP!
?>
```

### preg_split()
通过正则表达式分割字符串。

#### 用法
```php
preg_split(string $pattern, string $subject, int $limit = -1, int $flags = 0): array|false
```
- $pattern：正则表达式模式。
- $subject：输入字符串。
- $limit：分割的最大次数（可选）。
- $flags：标志（可选）。

#### 示例
```php
<?php
// 定义字符串
$str = "apple,banana,cherry";
// 正则表达式模式
$pattern = "/,/";
$result = preg_split($pattern, $str);
print_r($result);  // 输出：Array ( [0] => apple [1] => banana [2] => cherry )
?>
```

## JSON 处理函数

### json_encode()
将 PHP 变量转换为 JSON 格式。

#### 用法
```php
json_encode(mixed $value, int $options = 0, int $depth = 512): string|false
```
- $value：要编码的值。
- $options：选项（可选）。
- $depth：编码的最大深度（可选）。

#### 示例
```php
<?php
// 定义数组
$array = ["name" => "John", "age" => 30, "city" => "New York"];
// 将数组转换为 JSON
$json = json_encode($array);
echo $json;  // 输出：{"name":"John","age":30,"city":"New York"}
?>
```

### json_decode()
将 JSON 数据转换为 PHP 变量。

#### 用法
```php
json_decode(string $json, bool $assoc = false, int $depth = 512, int $options = 0): mixed
```
- $json：要解码的 JSON 字符串。
- $assoc：是否返回关联数组（可选）。
- $depth：解码的最大深度（可选）。
- $options：选项（可选）。

#### 示例
```php
<?php
// 定义 JSON 字符串
$json = '{"name":"John","age":30,"city":"New York"}';
// 将 JSON 转换为 PHP 变量
$data = json_decode($json, true);
print_r($data);  // 输出：Array ( [name] => John [age] => 30 [city] => New York )
?>
```

## 会话和 Cookie 处理函数

### session_start()
启动一个新的会话或重用现有会话。

#### 用法
```php
session_start(): bool
```

#### 示例
```php
<?php
// 启动会话
session_start();
// 设置会话变量
$_SESSION["username"] = "JohnDoe";
// 获取会话变量
echo $_SESSION["username"];  // 输出：JohnDoe
?>
```

### setcookie()
发送一个 Cookie。

#### 用法
```php
setcookie(string $name, string $value = "", int $expires = 0, string $path = "", string $domain = "", bool $secure = false, bool $httponly = false): bool
```
- $name：Cookie 名称。
- $value：Cookie 值（可选）。
- $expires：过期时间（可选）。
- $path：服务器路径（可选）。
- $domain：域名（可选）。
- $secure：是否仅通过 HTTPS 发送（可选）。
- $httponly：是否仅通过 HTTP 协议访问（可选）。

#### 示例
```php
<?php
// 设置 Cookie，过期时间为 1 小时后
setcookie("user", "JohnDoe", time() + 3600);
// 获取 Cookie
if (isset($_COOKIE["user"])) {
    echo "User is " . $_COOKIE["user"];
} else {
    echo "User is not set.";
}
?>
```

## 其他常用函数

### die() 和 exit()
输出一条消息并退出当前脚本。

#### 用法
```php
die(string $message = ""): void
exit(string $status = ""): void
```
- $message：输出的消息（可选）。
- $status：退出状态（可选）。

#### 示例
```php
<?php
// 检查条件并退出脚本
if (!file_exists("example.txt")) {
    die("File not found");
}
// 继续执行
echo "File found";
?>
```

### empty() 和 isset()
检查变量是否为空或是否已设置。

#### 用法
```php
empty(mixed $var): bool
isset(mixed $var, mixed ...$vars): bool
```
- $var：要检查的变量。

#### 示例
```php
<?php
// 检查变量是否为空
$var1 = "";
if (empty($var1)) {
    echo "Variable is empty";
}

// 检查变量是否已设置
$var2 = "Hello";
if (isset($var2)) {
    echo "Variable is set";
}
?>
```

### include() 和 require()
包含并运行指定文件。

#### 用法
```php
include(string $filename): mixed
require(string $filename): mixed
```
- $filename：要包含的文件名。

#### 示例
```php
<?php
// 包含文件
include("header.php");
echo "Main content";
include("footer.php");
?>
```

### include_once() 和 require_once()
包含并运行指定文件（仅一次）。

#### 用法
```php
include_once(string $filename): mixed
require_once(string $filename): mixed
```
- $filename：要包含的文件名。

#### 示例
```php
<?php
// 包含文件（仅一次）
include_once("config.php");
?>
```

### intval() 和 floatval()
获取变量的整数值和浮点数值。

#### 用法
```php
intval(mixed $var, int $base = 10): int
floatval(mixed $var): float
```
- $var：要转换的变量。
- $base：进制（可选）。

#### 示例
```php
<?php
// 获取整数值
$var1 = "123";
echo intval($var1);  // 输出：123

// 获取浮点数值
$var2 = "123.45";
echo floatval($var2);  // 输出：123.45
?>
```

### var_dump()
打印变量的相关信息。

#### 用法
```php
var_dump(mixed $expression, mixed ...$expressions): void
```
- $expression：要打印的变量。

#### 示例
```php
<?php
// 打印变量信息
$var = array("name" => "John", "age" => 30);
var_dump($var);
?>
```



## 错误和异常处理

### 错误处理
PHP 提供了多种错误处理机制。

#### error_reporting()
```php
<?php
// 设置错误报告级别
error_reporting(E_ALL);
?>
```

#### set_error_handler()
```php
<?php
// 自定义错误处理函数
function customError($errno, $errstr) {
    echo "Error: [$errno] $errstr";
}

// 设置错误处理函数
set_error_handler("customError");

// 触发错误
echo($test);
?>
```

### 异常处理
PHP 提供了 try...catch 块用于异常处理。

```php
<?php
// 自定义异常类
class customException extends Exception {
    public function errorMessage() {
        // 错误消息
        $errorMsg = 'Error on line ' . $this->getLine() . ' in ' . $this->getFile()
        . ': <b>' . $this->getMessage() . '</b> is not a valid E-Mail address';
        return $errorMsg;
    }
}

// 异常处理
try {
    // 触发异常
    if (filter_var("someone@example...com", FILTER_VALIDATE_EMAIL) === FALSE) {
        throw new customException("someone@example...com");
    }
} catch (customException $e) {
    // 显示自定义异常消息
    echo $e->errorMessage();
}
?>
```

## 练习题

### 变量和数据类型
1. 定义一个字符串变量，输出其长度。
2. 定义一个包含三个元素的数组，输出数组的第二个元素。
3. 将一个整数变量转换为浮点数并输出。

### 条件判断
1. 使用 if 语句判断一个变量是否为正数，并输出相应的信息。
2. 使用 switch 语句根据变量的值输出不同的消息。

### 循环
1. 使用 for 循环输出从 1 到 10 的数字。
2. 使用 foreach 循环遍历一个数组并输出每个元素。

### 字符串和数组处理
1. 定义一个字符串，并将其转换为大写。
2. 定义两个数组，将它们合并并输出结果。

### 错误和异常处理
1. 自定义一个错误处理函数，并触发一个错误。
2. 定义一个自定义异常类，并在 try...catch 块中使用它。

## 练习答案

### 变量和数据类型
```php
// 1. 定义一个字符串变量，输出其长度
$str = "Hello, World!";
echo strlen($str);  // 输出：13

// 2. 定义一个包含三个元素的数组，输出数组的第二个元素
$array = ["apple", "banana", "cherry"];
echo $array[1];  // 输出：banana

// 3. 将一个整数变量转换为浮点数并输出
$int = 10;
$float = (float)$int;
echo $float;  // 输出：10.0
?>
```

### 条件判断
```php
// 1. 使用 if 语句判断一个变量是否为正数，并输出相应的信息
$number = 5;
if ($number > 0) {
    echo "The number is positive.";
} else {
    echo "The number is not positive.";
}

// 2. 使用 switch 语句根据变量的值输出不同的消息
$day = "Monday";
switch ($day) {
    case "Monday":
        echo "Today is Monday.";
        break;
    case "Tuesday":
        echo "Today is Tuesday.";
        break;
    default:
        echo "Today is neither Monday nor Tuesday.";
        break;
}
?>
```

### 循环
```php
// 1. 使用 for 循环输出从 1 到 10 的数字
for ($i = 1; $i <= 10; $i++) {
    echo "Number: $i <br>";
}

// 2. 使用 foreach 循环遍历一个数组并输出每个元素
$colors = ["red", "green", "blue"];
foreach ($colors as $color) {
    echo "Color: $color <br>";
}
?>
```

### 字符串和数组处理
```php
// 1. 定义一个字符串，并将其转换为大写
$str = "hello, world!";
$upperStr = strtoupper($str);
echo $upperStr;  // 输出：HELLO, WORLD!

// 2. 定义两个数组，将它们合并并输出结果
$array1 = ["red", "green"];
$array2 = ["blue", "yellow"];
$mergedArray = array_merge($array1, $array2);
print_r($mergedArray);  // 输出：Array ( [0] => red [1] => green [2] => blue [3] => yellow )
?>
```

### 错误和异常处理
```php
// 1. 自定义一个错误处理函数，并触发一个错误
function customError($errno, $errstr) {
    echo "Error: [$errno] $errstr";
}
set_error_handler("customError");
echo($undefinedVar);  // 输出：Error: [8] Undefined variable: undefinedVar

// 2. 定义一个自定义异常类，并在 try...catch 块中使用它
class customException extends Exception {
    public function errorMessage() {
        $errorMsg = 'Error on line ' . $this->getLine() . ' in ' . $this->getFile() . ': <b>' . $this->getMessage() . '</b> is not a valid E-Mail address';
        return $errorMsg;
    }
}
try {
    if (filter_var("someone@example...com", FILTER_VALIDATE_EMAIL) === FALSE) {
        throw new customException("someone@example...com");
    }
} catch (customException $e) {
    echo $e->errorMessage();  // 输出自定义异常消息
}
?>
```



