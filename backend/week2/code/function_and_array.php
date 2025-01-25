<?php

// 函数定义
function sum(int $num1, int $num2): int
{
    return $num1 + $num2;
}

// 函数调用
$sum = sum(1, 2); // 3
echo $sum . "<br>";

// 不管是在职场中还是在网络上等等遇到解决不了的问题, 需要提问时
// 首先你需要说明白你遇到的问题
// 然后你需要说明你已经尝试过的方法
// 最后你需要说明你的期望结果是什么

// 匿名函数
$sum = function (int $num1, int $num2): int {
    return $num1 + $num2;
};
echo $sum(1, 2) . "<br>"; // 3
// 箭头函数
$multiply = fn(int $num1, int $num2): int => $num1 * $num2;
echo $multiply(2, 3) . "<br>"; // 6

// {} 一般是在定义代码块的时候使用, 例如 if, else, for, foreach, while, class, function 等等

// PHP 数组
// 数组定义, PHP 5.4.0 是开始支持 [] 定义数组的版本
// 索引数组
$fruits = array("Apple", "Banana", "Orange");
$fruits = ["Apple", "Banana", "Orange"];
$emptyArray = [];
$emptyArray = array();
// 关联数组
$person = [
    "name" => "John",
    "age" => 30,
    "married" => true
];
$person = array(
    "name" => "John",
    "age" => 30,
    "married" => true
);

// 数组操作
// 访问数组元素
echo $fruits[0] . "<br>"; // Apple

// 修改数组元素
$fruits[0] = "Pineapple";
echo $fruits[0] . "<br>"; // Pineapple
var_dump($fruits);
echo "<br>";

// 添加数组元素
$fruits[] = "Apple"; // 会在数组的最后一个位置添加元素
var_dump($fruits);
echo "<br>";

// 删除数组元素
// unset() 函数用于销毁给定的变量
// unset($array[0]); 删除数组中的第一个元素, 但是索引不会重新排序
// 如果想要让数组的索引重新排序, 可以使用 array_values() 函数
unset($fruits[0]);
$fruits = array_values($fruits);
// echo $fruits[0] . "<br>"; // Banana
var_dump($fruits);
echo "<br>";
echo "<hr>";

// 数组遍历
// for 循环
// isset() 函数用于检测变量是否已设置并且非 NULL
// 其实在开发中, 一般不会使用 for 循环来遍历数组, 一般使用 foreach 循环
echo "for 循环遍历数组" . "<br>";
for ($i = 0; $i < count($fruits); $i++) {
    echo $fruits[$i] . "<br>";
}

echo "<hr>";

// !!! foreach 循环
echo "foreach 循环遍历数组" . "<br>";
foreach ($fruits as $fruit) {
    echo $fruit . "<br>";
}
