<?php

// PHP 中的魔术变量和魔术方法

// 魔术方法, 都是在某种情况下自动调用的方法, 不能手动调用
// 我们可以通过它会自动调用的特性, 在某些情况下实现一些特殊的功能
// __construct() 构造方法, 在创建对象时调用
// __destruct() 析构方法, 在对象销毁时调用
// __call() 在对象中调用一个不可访问方法时调用
// __callStatic() 在静态上下文中调用一个不可访问方法时调用
// __get() 获得一个类的成员变量时调用, 当调用一个不可访问的成员变量时调用
// __set() 设置一个类的成员变量时调用, 当给一个不可访问的成员变量赋值时调用
// __isset() 当对不可访问属性调用 isset() 或 empty() 时调用
// __unset() 当对不可访问属性调用 unset() 时被调用
// __sleep() 在对象被序列化之前调用
// __wakeup() 在对象被反序列化之后调用
// __toString() 类被当成字符串时的回应方法
// __invoke() 调用一个对象时的回应方法
// __clone() 当对象复制完成时调用
// __autoload() 尝试加载未定义的类
// __debugInfo() 打印所需调试信息

// 魔术方法的使用
class MagicMethods
{
    public static string $staticProperty = "静态属性";

    private string $privateProperty = "私有属性, 外部不可访问";

    public string $publicProperty;

    public function __construct($publicProperty)
    {
        // 构造方法, 在创建对象时调用
        // 主要用来初始化对象的属性等
        $this->publicProperty = $publicProperty;
        echo "构造方法被调用 <hr>";
    }

    public function __destruct()
    {
        echo "析构方法被调用 <hr>";
    }

    private function privateMethod(): void
    {
        echo "调用了一个不可访问的方法 <hr>";
    }

    public function __call($name, $arguments)
    {
        echo "调用了一个不可访问的方法 $name <hr>";
    }

    private static function privateStaticMethod(): void
    {
        echo "调用了一个不可访问的静态方法 <hr>";
    }

    public static function __callStatic($name, $arguments)
    {
        echo "调用了一个不可访问的静态方法 $name <hr>";
    }

    public function __get($name)
    {
        echo "获得了一个不可访问的属性 $name <hr>";
    }

    public function __set($name, $value)
    {
        echo "设置了一个不可访问的属性 $name <hr>";
    }

    public function __isset($name)
    {
        echo "对不可访问的属性调用了 isset() 或 empty() $name <hr>";
    }

    public function __unset($name)
    {
        echo "对不可访问的属性调用了 unset() $name <hr>";
    }

    public function __sleep()
    {
        echo "对象被序列化之前调用 <hr>";
    }

    public function __wakeup()
    {
        echo "对象被反序列化之后调用 <hr>";
    }

    public function __toString()
    {
        return "类被当成字符串时的回应方法 <hr>";
    }

    public function __invoke(): void
    {
        echo "调用一个对象时的回应方法 <hr>";
    }

    public function __clone()
    {
        echo "对象复制完成时调用 <hr>";
    }

    public function __autoload(): void
    {
        echo "尝试加载未定义的类 <hr>";
    }

    public function __debugInfo()
    {
        echo "打印所需调试信息 <hr>";
    }
}

echo MagicMethods::$staticProperty . "<hr>";
MagicMethods::privateStaticMethod();

$magicMethods = new MagicMethods('公有属性');
$magicMethods->privateMethod();
echo $magicMethods->privateProperty;
var_dump(isset($magicMethods->privateProperty));
echo "<hr>";

class User
{
    public function __get(string $name)
    {
        echo "这个是通过 __CLASS__ 打印出来的当前类名: " . __CLASS__ . "<hr>";
        // 这个地方是一个简单的魔术方法的使用案例
        // 当我们访问 User 类中的 name 属性的时候
        // 我们可以去判断一下当前数据模型对应的数据库中是否有这个字段, 如果有, 我们就返回数据库中的值
        // 这只是一个简单的案例说明, 实际开发中, 我们可能会做更多的事情, 需要根据实际情况来判断
        // 例如我们已经有缓存下来当前数据模型对应的数据库的字段, 我们可以在其中判断当前访问的属性是否在数据库中有对应的字段
        return "张三";
    }
}

$user = new User();
var_dump($user->name);
echo "<hr>";


// 魔术变量
// __LINE__ 文件中的当前行号
// __FILE__ 文件的完整路径和文件名
// __DIR__ 文件所在的目录
// __FUNCTION__ 函数名称
// __CLASS__ 类的名称
// __TRAIT__ Trait 的名字
// __METHOD__ 类的方法名
// __NAMESPACE__ 当前命名空间的名称

echo __LINE__ . "<hr>";
echo __FILE__ . "<hr>";
echo __DIR__ . "<hr>";

function thisFunctionNameWillBeEcho(): void
{
    echo __FUNCTION__ . "<hr>";
}

thisFunctionNameWillBeEcho();

echo __NAMESPACE__ . "<hr>";

