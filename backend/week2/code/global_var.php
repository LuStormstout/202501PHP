<?php

// PHP 中的全局变量
$a = 1;
// 超出当前脚本中的当前变量的作用域, 可以在当前脚本中的任何地方访问
function test(): void
{
    global $a;
    echo $a;
    echo '<br>';
}

test();

// PHP 的变量作用域
//function fn1()
//{
//    $b = 2;
//}
//var_dump($b); // 报错, $b 未定义
//
//class Test
//{
//    public $c = 3;
//
//    public function fn2()
//    {
//        echo $a; // 报错, $a 未定义
//    }
//}
//var_dump($c); // 报错, $c 未定义

// 一个脚本内同时存在类以及类外的代码的这种写法, 我们称之为混合编程(面向过程与面向对象的混合编程)
// 在现在的编程中, 我们更推崇面向对象编程, 尤其是在使用框架的时候, 一般都是面向对象编程

// PHP 超全局变量
// 超全局变量是在 PHP 中预定义的全局变量, 无需使用 global 关键字就可以在任何 PHP 脚本的任何地方访问
// $_GET, $_POST, $_REQUEST, $_COOKIE, $_SESSION, $_FILES, $_SERVER, $_ENV
// $_GET, $_POST, $_REQUEST, $_COOKIE, $_SESSION, $_FILES 是用来接收用户提交的数据
// $_SERVER, $_ENV 是用来获取服务器端的信息
// 所有通过 GET 方法提交的数据, 以关联数组的形式存储, 键是表单中的 name 属性值, 值是用户输入的值
var_dump($_GET); // 通过 URL 传递的参数
echo '<hr>';
var_dump($_POST); // 通过表单提交的参数, 默认情况下, 表单提交的数据是通过 POST 方法提交的
echo '<hr>';
var_dump($_REQUEST);
echo '<hr>';
$_COOKIE['is_admin'] = true;
var_dump($_COOKIE); // 通过 Cookie 传递的参数
echo '<hr>';

// 访问 $_SESSION 时, 需要先调用 session_start() 方法
session_start();
$_SESSION['is_login'] = true;
var_dump($_SESSION); // 通过 Session 传递的参数
echo '<hr>';
var_dump($_FILES); // 通过文件上传传递的参数
echo '<hr>';
// 服务器端的信息, PHP_SELF 是当前脚本的文件名, SCRIPT_FILENAME 是当前脚本的绝对路径, SERVER_ADDR 是服务器的 IP 地址, SERVER_NAME 是服务器的主机名, SERVER_SOFTWARE 是服务器的软件名, SERVER_PROTOCOL 是服务器的协议, REQUEST_METHOD 是请求的方法, REQUEST_TIME 是请求的时间, QUERY_STRING 是查询字符串, HTTP_REFERER 是上一个页面的 URL, HTTP_USER_AGENT 是用户代理, REMOTE_ADDR 是客户端的 IP 地址, REMOTE_PORT 是客户端的端口号, SERVER_ADDR 是服务器的 IP 地址, SERVER_PORT 是服务器的端口号
var_dump($_SERVER);
echo '<hr>';
var_dump($_ENV); // 环境变量, 例如当前环境是 production 还是 development
echo '<hr>';

// 这些超全局变量都是数组, 通过键值对的方式存储数据, 通过键名访问数据
// $_SESSION 和 $_COOKIE 主要是用来存储用户的登录状态, 以及用户的一些信息
// $_COOKIE 是存储在客户端的, 通过设置过期时间, 可以实现长时间存储
// $_SESSION 是存储在服务器端的, 通过设置过期时间, 可以实现短时间存储
// $_SESSION 是基于 Cookie 实现的, 通过设置 session_id, 可以实现跨页面访问
// $_SESSION 是基于文件实现的, 通过设置 session.save_path, 可以实现存储位置的修改
// 我们可以使用 session 和 cookie 来实现用户登录状态的保持, 以及用户信息的存储