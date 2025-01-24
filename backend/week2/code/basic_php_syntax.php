<?php

// 大家在写 PHP 代码的时候, 始终要有一个思维, 我需要知道「数据流」走到哪里了
// 这个对初学者很重要, 也是学习编程的一个重要的思维方式
// 尤其是后端代码, 因为后端代码基本上都是在处理数据, 所以我们必须要清楚数据是怎么流动的
// 前端请求的数据你收到了没? 从数据库中拿到你想要的数据了没有? 数据处理完了你返回给前端了没有?
// 整个请求流程是怎么样的?

$name = '张三'; // 字符串
$age = 18; // 整数

echo $name . "今年 $age 岁了";

$height = 1.75; // 浮点数
$isLogin = true; // 布尔值
$scores = [80, 90, 100]; // 数组, 索引数组
$person = ['name' => '张三', 'age' => 18]; // 数组, 关联数组
$obj = new stdClass(); // 对象

class Student
{
    // public 公开的
    // protected 受保护的
    // private 私有的

    // 类的属性
    // public 修饰的属性可以在类的内部, 子类和外部访问
    public string $name;
    public int $age;

    // protected 修饰的属性可以在类的内部和子类访问, 外部无法访问
    protected string $gender;

    // private 修饰的属性只能在类的内部访问, 子类和外部都无法访问
    private array $scores = [];

    /**
     * __construct 构造函数, 在创建对象时自动调用
     *
     * @param $name
     * @param $age
     */
    public function __construct($name, $age)
    {
        $this->name = $name;
        $this->age = $age;
    }

    /**
     * 添加学生成绩
     * 类的方法声明, 方法也是同样可以使用 public, private, protected 修饰
     *
     * @param int $score 成绩
     * @return void
     */
    public function addScore(int $score): void
    {
        // echo 1111; die; // 对于初学者可以使用这种方法来测试代码是否执行到这里了
        // var_dump($score); // 如果我们已经用 echo 测试程序已经执行到这里了
        // 但是$this->scores 还是空的
        // 我们可以使用 var_dump() 来查看 $score 或者 $this->scores 的值
        $this->scores[] = $score;
    }

    /**
     * 获取学生成绩
     *
     * @return array
     */
    public function getScore(): array
    {
        // !!! 这只是一个简单的例子, 为了说明 private 的作用, 实际开发中要结合实际情况
        // 假设我们的成绩是隐私信息, 只能在类的内部访问
        // 不允许类的外部直接读取成绩
        // 但是为什么我们这里又要返回成绩呢?
        // 是因为有些私有属性是需要提供一些方法来让外部访问的, 这样我们就可以控制访问的权限
        // 假设我们这里有一个判断语句, 如果是老师就可以查看成绩
        // if ($this->role === 'teacher') {
        //     return $this->scores;
        // }
        return $this->scores;
    }
}

$student = new Student('张三', 18); // 对象

// 访问对象的属性, PHP 是使用 -> 符号, 在我们前面学的 JavaScript 是使用 . 符号
echo $student->name; // 访问对象的属性
echo "<br>";
$student->addScore(80); // 调用对象的方法
$student->addScore(90);
# !!! echo $student->scores; // 无法访问对象的私有属性
var_dump($student->getScore()); // 通过对象的方法访问私有属性
// 这个是 var_dump() 方法在这里打印出来的内容包含了详细的数组信息,
// array(2) { [0]=> int(80) [1]=> int(90) }
// 对应在 PHP 中的数组的样子是 [80, 90]
// 如果我们声明一个数组 $scores = [80, 90]; 在 PHP 中打印出来的样子也是一样的
$scoresTest = [80, 90];
echo "<br>";
echo "<h3>这是用 PHP 的 echo 来输出的 HTML 标签</h3>";
var_dump($scoresTest);
echo "<br>";
echo "这是用 print_r() 方法来输出的数组" . "\r\n";
print_r($scoresTest);

// PHP 中的运算符
// 算术运算符
// + - * / % ++ --
$numA = 10;
$numB = 3;
$sum = $numA + $numB;
$diff = $numA - $numB;
$product = $numA * $numB;
$quotient = $numA / $numB;
$remainder = $numA % $numB;
echo "<br>";
var_dump(
    "这是加法:" . $sum, "这是减法:" . $diff, "这是乘法:" . $product, "这是除法:" . $quotient, "这是求余数:" . $remainder
);

// 比较运算符, 比较运算符的结果是布尔值
// == === != !== > < >= <=
// (10 == 10); // true
// (5 == "5"); // true
// (10 === 10); // true
// (5 === "5"); // false
// (10 != 10); // false
// (10 !== 10); // false
// (10 > 10); // false
// (10 < 10); // false
// (10 >= 10); // true 这个是大于等于, 也就是大于或者等于
// (10 <= 10); // true 这个是小于等于, 也就是小于或者等于

// 逻辑运算符
// && || !
// ($numA > 5 && $numB < 5); // true 两个条件都满足
// ($numA > 5 || $numB < 5); // true 两个条件满足一个即可
// !($numA > 5); // false 取反, ($numA > 5) 是 true, 取反就是 false

// 三元运算符
$newAIsGreater5 = $numA > 5 ? '大于 5' : '小于等于 5';
// 这个是 PHP 7.0 之后的语法, 如果 $student->age 存在就返回 $student->age, 否则返回 0
$studentAge = $student->age ?? 0;

// 流程控制
// if else
if ($numA > 5) {
    echo "大于 5";
} elseif ($numA === 5) {
    echo "等于 5";
} else {
    echo "小于 5";
}

// for 循环
echo "<br>";
for ($i = 0; $i < 10; $i++) {
    echo $i;
    echo "<br>";
}

// while 循环
echo "<br>";
echo "<hr>";
$count = 0;
while ($count < 5) {
    echo $count;
    echo "<br>";
    $count++;
}

// foreach 循环
// !!! foreach 在 PHP 中很重要, 因为大多数的业务场景中我们都是在处理数组
echo "<br>";
echo "<hr>";
// 多维数组, 下面的数组是一个二维数组, 也就是数组中的元素是数组
// 当然多维数组可以是三维, 四维, 五维, 甚至更多维
// ['name' => '张三', 'age' => 18] 这种数组我们叫做关联数组
// 它有定义好的 key (索引), 也就是 'name' 和 'age'
$students = [
    ['name' => '张三', 'age' => 18],
    ['name' => '李四', 'age' => 19],
    ['name' => '王五', 'age' => 20],
];
foreach ($students as $student) {
    echo '这是 $student :';
    var_dump($student);
    echo "<br>";
    echo $student['name'] . '今年' . $student['age'] . '岁了';
    echo "<br>";
}

echo "<br>";
echo "<hr>";
$studentA = [
    'name' => '张三', 'age' => 18,
    'scores' => ["语文: 80", "数学: 90", "英语: 100"]
];
foreach ($studentA as $key => $value) {
    echo '这是 $key :';
    var_dump($key);
    echo "<br>";
    echo '这是 $value :';
    var_dump($value);
    echo "<br>";
}

// is_array() 函数用于检查变量是否是数组
// count() 函数用于返回数组的长度, [] 数组的长度是 0, [1, 2, 3] 数组的长度是 3
// strlen() 函数用于返回字符串的长度
// 以下的这些代码是我们在页面上要循环展示学生成绩的时候, 可以参考的代码
echo "<hr>";
echo "姓名: " . $studentA['name'];
echo "<br>";
echo "年龄: " . $studentA['age'];
echo "<br>";
foreach ($studentA as $key => $value) {
    echo "<ul>";
    if ($key === 'scores' && is_array($value) && count($value) > 0) {
        echo "<br>";
        foreach ($value as $score) {
            echo "<li>$score</li>";
            echo "<br>";
        }
    }
    echo "</ul>";
}



