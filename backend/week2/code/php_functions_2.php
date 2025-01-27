<?php

// 其他常用函数

// intval() 函数用于获取变量的整数值, 将变量转换为整数类型
// 语法: intval(var, base)
// var: 必需, 要转换的变量
// base: 可选, 转换时使用的进制数
// 返回值: 返回整数值
$strNum = "123.45";
var_dump($strNum); // string(6) "123.45"
echo "<br>";
$num = intval($strNum);
var_dump($num); // int(123)
echo "<br>";
$num = (int)$strNum;
var_dump($num); // int(123)
echo "<br>";

// floatval() 函数用于获取变量的浮点值, 将变量转换为浮点类型
// 语法: floatval(var)
// var: 必需, 要转换的变量
// 返回值: 返回浮点值
$num = floatval($strNum);
var_dump($num); // float(123.45)
echo "<br>";

// boolval() 函数用于获取变量的布尔值, 将变量转换为布尔类型
// 语法: boolval(var)
// var: 必需, 要转换的变量
// 返回值: 返回布尔值
$isTrue = 1;
$isFalse = 0;
$bool = boolval($isTrue);
var_dump($bool); // bool(true)
echo "<br>";

// serialize() 函数用于将变量序列化为字符串
// 语法: serialize(var)
// var: 必需, 要序列化的变量
// 返回值: 返回序列化后的字符串
// 使用场景举例: 我们可以将数组序列化为字符串, 然后存储到数据库中
// 其实现在的 MySQL 支持存储 JSON 格式的数据, 所以这个用法已经不常见了
$user = [
    "name" => "Tom",
    "age" => 20,
    "isAdmin" => true
];
$userStr = serialize($user);
var_dump($userStr); // string(59) "a:3:{s:4:"name";s:3:"Tom";s:3:"age";i:20;s:6:"isAdmin";b:1;}"
echo "<br>";

// unserialize() 函数用于将字符串反序列化为变量
// 语法: unserialize(str)
// str: 必需, 要反序列化的字符串
// 返回值: 返回反序列化后的变量
$user = unserialize($userStr);
var_dump($user); // array(3) { ["name"]=> string(3) "Tom" ["age"]=> int(20) ["isAdmin"]=> bool(true) }
echo "<br>";

// urlencode() 函数用于对 URL 字符串进行编码
// 语法: urlencode(str)
// str: 必需, 要编码的字符串
// 返回值: 返回编码后的字符串
$url = "https://translate.google.com?text=你好PHP";
$url = urlencode($url);
var_dump($url); // string(51) "https%3A%2F%2Ftranslate.google.com%3Ftext%3D%E4%BD%A0%E5%A5%BDPHP"
echo "<br>";

// urldecode() 函数用于对 URL 字符串进行解码
// 语法: urldecode(str)
// str: 必需, 要解码的字符串
// 返回值: 返回解码后的字符串
$url = urldecode($url);
var_dump($url); // string(42) "https://translate.google.com?text=你好PHP"
echo "<br>";

// parse_url() 函数用于解析 URL, 返回其组成部分
// 语法: parse_url(url, component)
// url: 必需, 要解析的 URL
// component: 可选, 指定要返回的 URL 部分, 0: 返回全部部分, 1: 返回协议部分, 2: 返回主机部分, 3: 返回端口部分, 4: 返回路径部分, 5: 返回查询部分, 6: 返回片段部分
// component PHP_URL_SCHEME: 协议部分, PHP_URL_HOST: 主机部分, PHP_URL_PORT: 端口部分, PHP_URL_USER: 用户部分, PHP_URL_PASS: 密码部分, PHP_URL_PATH: 路径部分, PHP_URL_QUERY: 查询部分, PHP_URL_FRAGMENT: 片段部分
// 返回值: 返回解析后的 URL 组成部分
$url = "https://translate.google.com?text=你好PHP&lang=zh&lang=en";
$urlArr = parse_url($url, PHP_URL_QUERY);
var_dump($urlArr);
echo "<br>";

// http_build_query() 函数用于生成 URL-encoded 的请求字符串
// 语法: http_build_query(query_data, numeric_prefix, arg_separator, enc_type)
// query_data: 必需, 要编码的数据
// numeric_prefix: 可选, 如果设置为 TRUE, 数字键名将会被编码为 a[0], a[1], a[2] 等
// arg_separator: 可选, 指定参数分隔符, 默认为 &
// enc_type: 可选, 指定编码类型, 默认为 PHP_QUERY_RFC1738
// 返回值: 返回 URL-encoded 的请求字符串
$data = [
    "text" => "你好PHP",
    "lang" => ["zh", "en"]
];
$queryStr = http_build_query($data);
var_dump($queryStr); // string(38) "text=%E4%BD%A0%E5%A5%BDPHP&lang%5B0%5D=zh&lang%5B1%5D=en"
echo "<br>";

// is_array() 函数用于判断变量是否是数组
// 语法: is_array(var)
// var: 必需, 要检查的变量
// 返回值: 如果变量是数组, 返回 TRUE, 否则返回 FALSE
$arr = [1, 2, 3];
$isArray = is_array($arr); // bool(true)
var_dump($isArray); // bool(true)
echo "<br>";
echo "<hr>";

// PHP 判空和检查变量函数
// empty() 检查一个变量是否为空, 如果变量不存在或其值等于 false, 则返回 true. 常用于表单验证.
$var1 = "";
$var2 = "hello";
$var3 = 0;
var_dump(empty($var1));
echo "<br>";
var_dump(empty($var2));
echo "<br>";
var_dump(empty($var3));
echo "<br>";
echo "<hr>";

//if (!empty($var1)) {
//    // 这个意思就是 var1 如果不为空的话干什么什么...
//}

// isset() 函数用于检测变量是否已设置并且非 NULL, 如果变量存在且值不为 NULL, 则返回 true. 常用于检查变量是否存在.
$var4 = null;
var_dump(isset($var1));
echo "<br>";
var_dump(isset($var2));
echo "<br>";
var_dump(isset($var3));
echo "<br>";
var_dump(isset($var4));
echo "<br>";

class Country
{
    public string $name;

//    public function __construct()
//    {
//        $this->name = "China";
//    }
}

$country = new Country();
var_dump(isset($country->name));
echo "<br>";
echo "<hr>";

// is_null() 检查一个变量是否为 null。如果变量的值为 null，则返回 true。常用于数据库查询结果验证。
var_dump(is_null($var4));
echo "<br>";

//使用场景对比
// empty(): 常用于表单验证，检查输入是否为空。
// isset(): 常用于检查表单提交的字段，确保变量存在。
// is_null(): 常用于数据库查询结果验证，检查变量是否为 null。

// 使用 empty() 可以检查变量是否为空，包括 0、""、null、false 等。
// 使用 isset() 可以确保变量已设置且不为 null。
// 使用 is_null() 可以明确检查变量是否为 null。
