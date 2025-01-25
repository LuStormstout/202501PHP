<?php

// PHP 官方文档 https://www.php.net/manual/zh/

// PHP 常用的内置函数
// 1、字符串处理函数
// strlen() 计算字符串的长度
$username = "LuStormstout";
$usernameLength = strlen($username);
echo "The length of username is: $usernameLength <br>";

// 这个函数计算的是字节长度，不是字符长度
// 一个中文字符占 3 个字节
// 一个英文字符占 1 个字节
// 我们之前在提到 MySQL 数据库的时候，也提到过字符集的问题
// 我们推荐使用 utf8mb4 字符集，因为它支持更多的字符，包括 emoji 表情
echo strlen("我住在东京") . "<br>"; // 15

// substr() 截取字符串的一部分, 返回截取的字符串
// substr(string, start, length)
// string: 必需。需要被截取的字符串。
// start: 必需。规定在字符串的何处开始。
// length: 可选。规定被返回字符串的长度。默认是直到字符串的结尾。
$country = "Japan";
$countryShort = substr($country, 0, 2);
echo "$country short name is: $countryShort <br>";
$str = "Hello world!";
echo substr($str, 6) . "<br>"; // world!
// 如果 start 是负数，那么截取的起始位置是从字符串结尾开始算起的
echo substr($str, -6, 5) . "<br>"; // world

// strpos() 查找字符串中的某个字符或字符串, 返回第一次出现的位置
// strpos(string, find, start)
// string: 必需。需要被查找的字符串。
// find: 必需。规定要查找的字符串或者字符。
// start: 可选。规定在字符串的何处开始搜索, 默认是 0。
$pos = strpos($str, "world");
echo "The position of world is: $pos <br>";
// 如果没找到，返回 false
var_dump(strpos($str, "PHP")); // bool(false)
echo "<br>";
$pos = strpos($str, "world", 3); // 6
echo "The position of world is: $pos <br>";

// 例: 可以在不区分大小写的验证码的验证的时候使用
// strtolower(string $string): string 将字符串转换为小写
// strtoupper(string $string): string 将字符串转换为大写
echo "HELLO WORLD! 转换成小写" . strtolower("HELLO WORLD!") . "<br>"; // hello world!
echo "hello world! 转换成小写" . strtoupper("hello world!") . "<br>"; // HELLO WORLD!

// str_replace() 替换字符串中的某个字符或字符串
// str_replace(find, replace, string, count)
// find: 必需。规定要查找的字符串。
// replace: 必需。规定要替换 find 的字符串。
// string: 必需。需要被搜索和替换的字符串。
// count: 可选。一个变量，对替换数进行计数。
// 必传参数如果不传，会报错, 可选参数如果不传，它不会报错，会使用默认值
$replaceStr = str_replace("world", "PHP", $str, $count);
echo "The replaced string is: $replaceStr <br>";
echo "The replaced count is: $count <br>";

// md5() 计算字符串的 MD5 散列值
// MD5 是一种常用的哈希算法，用于给字符串加密
// MD5 生成的散列值是固定的 32 个字符
// MD5 是不可逆的，即无法通过 MD5 散列值反推出原始字符串
// MD5 也是不安全的，因为它容易被暴力破解
// 建议不要直接使用 md5() 来加密密码, 可以使用 password_hash() 函数
$str = "123456";
$md5Str = md5($str);
echo "The MD5 of $str is: $md5Str <br>";

// impode() 将数组元素组合为一个字符串
// implode(separator, array)
// separator: 可选。规定数组元素之间放置的内容。默认是 ""。
// array: 必需。规定要合并的数组。
$arr = array("apple", "banana", "orange");
$str = implode(", ", $arr);
echo "The imploded string is: $str <br>";

// explode() 函数把字符串打散为数组
// explode(separator, string, limit)
// separator: 必需。规定在哪里分割字符串。
// string: 必需。规定要打散的字符串。
// limit: 可选。规定所返回的数组元素的数目。
$str = "Hello, world!";
$arr = explode(", ", $str);
var_dump($arr); // array(2) { [0]=> string(5) "Hello" [1]=> string(6) "world!" }
echo "<br>";

// trim() 函数移除字符串两侧的空白字符或其他预定义字符
// trim(string, charlist)
// string: 必需。规定要处理的字符串。
// charlist: 可选。规定从字符串中删除哪些字符。默认是空格。
// 例: 用户输入的时候，去掉两边的空格, 比如说密码、用户名
$str = "  Hello world!  ";
$trimmedStr = trim($str);
echo "The trimmed string is: $trimmedStr <br>";
$str = "##Hello world!#";
$trimmedStr = trim($str, "#");
echo "The trimmed string is: $trimmedStr <br>";

// 2、数组处理函数
// count() 计算数组中的元素数目
$arr = array(1, 2, 3, 4, 5);
$count = count($arr);
echo "The count of array is: $count <br>";

// array_push() 将一个或多个元素插入数组的末尾（入栈）
// array_push(array, value1, value2, ...)
// array: 必需。规定要操作的数组。
// value1: 必需。规定要插入的值。
// ...
$arr = array(1, 2, 3);
array_push($arr, 4, 5);
var_dump($arr); // array(5) { [0]=> int(1) [1]=> int(2) [2]=> int(3) [3]=> int(4) [4]=> int(5) }
echo "<br>";

// array_pop() 删除数组中的最后一个元素（出栈）
// array_pop(array)
// array: 必需。规定要操作的数组。
$arr = array(1, 2, 3);
$popValue = array_pop($arr);
echo "The pop value is: $popValue <br>";
var_dump($arr); // array(2) { [0]=> int(1) [1]=> int(2) }
echo "<br>";

// array_shift() 删除数组中的第一个元素，并返回被删除元素的值
// array_shift(array)
// array: 必需。规定要操作的数组。
$arr = array(1, 2, 3);
$shiftValue = array_shift($arr);
echo "The shift value is: $shiftValue <br>";
var_dump($arr); // array(2) { [0]=> int(2) [1]=> int(3) }
echo "<br>";

// array_unshift() 在数组开头插入一个或多个元素
// array_unshift(array, value1, value2, ...)
// array: 必需。规定要操作的数组。
// value1: 必需。规定要插入的值。
// ...
// 返回值是插入元素后的数组长度
$arr = array(1, 2, 3);
array_unshift($arr, 0);
var_dump($arr); // array(4) { [0]=> int(0) [1]=> int(1) [2]=> int(2) [3]=> int(3) }
echo "<br>";

// array_merge() 合并一个或多个数组
$arr1 = array("a", "b", "c");
$arr2 = array("d", "e", "f");
$mergedArr = array_merge($arr1, $arr2);
var_dump($mergedArr);
echo "<br>";
// 在关联数组中，如果有相同的键，后面的值会覆盖前面的值
$student1 = array("name" => "Tom", "class" => "A");
$student2 = array("name" => "Jerry", "age" => 22);
$mergedArr = array_merge($student1, $student2);
var_dump($mergedArr);
echo "<br>";

// array_unique() 移除数组中重复的值
$arr = array(1, 2, 2, 3, 4, 4, 5);
$uniqueArr = array_unique($arr);
var_dump($uniqueArr);
echo "<br>";

// array_reverse() 返回一个元素顺序相反的数组
$arr = array(1, 2, 3, 4, 5);
$reversedArr = array_reverse($arr);
var_dump($reversedArr);
echo "<br>";

// sort() 对数组进行升序排列, 例如: 游戏中的排行榜等等
// rsort() 对数组进行降序排列
$arr = array(5, 3, 1, 4, 2);
sort($arr);
var_dump($arr);
echo "<br>";
rsort($arr);
var_dump($arr);
echo "<br>";

// shuffle() 将数组打乱
$arr = array(1, 2, 3, 4, 5);
shuffle($arr);
print_r($arr);
echo "<br>";

// array_sum() 计算数组中所有值的和
$arr = array(1, 2, 3, 4, 5);
$sum = array_sum($arr); // 15
echo "The sum of array is: $sum <br>";

// array_key_exists() 检查数组中是否存在指定的键名
// array_key_exists(key, array)
// key: 必需。规定要检查的键。
// array: 必需。规定要搜索的数组。
// 返回值是布尔值
// 举个简单的例子，检查是否存在 isLogin 这个 key
$student = array("name" => "Tom", "age" => 20);
if (array_key_exists("name", $student)) {
    echo "The key name exists in array <br>";
} else {
    echo "The key name does not exist in array <br>";
}

// in_array() 检查数组中是否存在指定的值
// in_array(value, array, strict)
// value: 必需。规定要查找的值。
// array: 必需。规定要搜索的数组。
// strict: 可选。如果该参数的值为 TRUE，则函数会检查数组中的值的类型也相同。默认是 FALSE。
// 返回值是布尔值
$arr = array(1, 2, 3, 4, 5);
if (in_array(3, $arr)) {
    echo "The value 3 exists in array <br>";
} else {
    echo "The value 3 does not exist in array <br>";
}
var_dump(in_array("3", $arr)); // bool(true)
echo "<br>";

// array_search() 在数组中搜索给定的值，如果成功则返回相应的键名
// array_search(value, array, strict)
// value: 必需。规定要查找的值。
// array: 必需。规定要搜索的数组。
// strict: 可选。如果该参数的值为 TRUE，则函数会检查数组中的值的类型也相同。默认是 FALSE。
// 返回值是键名，如果没找到，返回 false
$arr = array(1, 2, 3, 4, 5);
$key = array_search(3, $arr);
echo "The key of value 3 is: $key <br>";

// array_keys() 返回数组中部分的或所有的键名
// array_keys(array, search_value, strict)
// array: 必需。规定要返回其键的数组。
// search_value: 可选。规定要搜索的值。
// strict: 可选。是否完全匹配
// 返回值是包含数组中所有键名的数组
$arr = array("a" => 1, "b" => 2, "c" => 3);
$keys = array_keys($arr); // ["a", "b", "c"]
var_dump($keys);
echo "<br>";

// array_values() 返回数组中所有的值
// array_values(array)
// array: 必需。规定要返回其值的数组。
// 返回值是包含数组中所有值的数组
$arr = array("a" => 1, "b" => 2, "c" => 3);
$values = array_values($arr); // [1, 2, 3]
// 使用 echo 来输出数组的时候, PHP 会抛出一个警告, 但是结果会显示出来
// !!! 不要这么干
// echo $arr;
var_dump($values);
echo "<br>";

// array_slice() 返回数组中的一段
// array_slice(array, offset, length, preserve_keys)
// array: 必需。规定要返回其值的数组。
// offset: 必需。规定在何处开始。
// length: 可选。规定返回值的长度。
// preserve_keys: 可选。规定是否保留数组的键。默认是 FALSE。
$arr = array("a", "b", "c", "d", "e");
$sliceArr = array_slice($arr, 1, 3);
var_dump($sliceArr); // ["b", "c", "d"]
echo "<br>";

// 3、文件处理函数
// file_get_contents() 函数把整个文件读入一个字符串中
// file_get_contents(filename, include_path, context, start, length)
// filename: 必需。规定要读取的文件。
// include_path: 可选。如果为 TRUE，则在 include_path 中搜索文件。
// context: 可选。规定文件句柄的环境。context 是一套可以修改流的行为的选项。
// start: 可选。规定开始读取的位置。该参数是在 PHP 5.1 中添加的。
// length: 可选。规定要读取的字节数。该参数是在 PHP 5.1 中添加的。
$content = file_get_contents("test.txt");
echo "The content of file is: $content <br>";
// $content = file_get_contents("https://www.php.net/docs.php");
// echo "The content of file is: $content <br>";

// file_put_contents() 函数把一个字符串写入文件中
// file_put_contents(filename, data, mode, context)
// filename: 必需。规定要写入数据的文件。
// data: 必需。规定要写入文件的数据。可以是字符串、数组、流资源等。
// mode: 可选。规定打开文件的模式。默认是 0。
// context: 可选。规定文件句柄的环境。context 是一套可以修改流的行为的选项。
$data = "Hello, world!";
// 如果文件不存在，会创建文件, 但是需要注意的是，PHP 需要有写入文件的权限
// 如果文件存在，会覆盖文件
// 如果文件存在，且 mode 是 FILE_APPEND，会在文件末尾追加内容
file_put_contents("test.txt", $data, FILE_APPEND);

// file_exists() 函数检查文件或目录是否存在
// file_exists(filename)
// filename: 必需。规定要检查的文件或目录。
// 处理文件相关的函数, 前面都是要加上文件的路径, 我们这里的例子中, 文件都是在当前目录下
if (file_exists("test.txt")) {
    echo "The file exists <br>";
} else {
    echo "The file does not exist <br>";
}

// 至于文件的权限, 大家自己去查一下, 这里不做详细的介绍

// unlink() 函数删除文件

// mkdir() 函数创建目录

// rmdir() 函数删除目录

// chmod() 函数改变文件或目录的权限

// 4、日期和时间函数
// date() 函数格式化本地日期和时间
// date(format, timestamp)
// format: 必需。规定时间戳的格式。
// timestamp: 可选。规定时间戳。默认是当前日期和时间。
// 时间戳是一个长整数，它是从 Unix 纪元（格林尼治时间 1970 年 1 月 1 日 00:00:00）起的秒数
// 例: Y 年份, m 月份, d 日期, H 小时, i 分钟, s 秒
echo date("Y-m-d H:i:s") . "<br>";

// time() 函数返回当前的 Unix 时间戳
echo time() . "<br>";

// strtotime() 函数将任何英文文本的日期时间描述解析为 Unix 时间戳
// strtotime(time, now)
// time: 必需。规定要解析的时间字符串。
// now: 可选。规定用作基准的时间。默认是当前时间。
// 2025-01-25 23:06:54
$timestamp = strtotime("2025-01-25 23:06:54");
echo "The timestamp is: $timestamp <br>";

// 5、JSON 处理函数
// json_encode() 函数对变量进行 JSON 编码
// json_encode(value, options, depth)
// value: 必需。要编码的值。该函数只对 UTF-8 编码的数据有效。
// options: 可选。规定编码选项。默认是 0。
// depth: 可选。规定深度。必须大于 0。默认是 512。
$arr = array("name" => "Tom", "age" => 20);
$json = json_encode($arr);
echo "The JSON is: $json <br>";

// json_decode() 函数对 JSON 格式的字符串进行解码，并转换为 PHP 变量
// json_decode(json, assoc, depth, options)
// json: 必需。要解码的 JSON 字符串。
// assoc: 可选。规定返回数组还是对象。默认是对象。
// depth: 可选。规定深度。必须大于 0。默认是 512。
// options: 可选。规定二进制安全或者 JSON_BIGINT_AS_STRING。默认是 0。
$json = '{"name":"Tom","age":20}';
$arr = json_decode($json, true);
var_dump($arr);
echo "<br>";

// 6、调试函数
// var_dump() 函数返回变量的数据类型和值

// print_r() 函数打印关于变量的易于理解的信息

// debug_backtrace() 函数生成一条回溯跟踪(backtrace)

// 7、数学函数
// abs() 函数返回一个数的绝对值
echo abs(-6.7) . "<br>";

// ceil() 函数向上舍入为最接近的整数
echo ceil(0.60) . "<br>";

// floor() 函数向下舍入为最接近的整数
echo floor(0.60) . "<br>";

// max() 函数返回给定数组中的最大值
echo max(0, 150, 30, 20, -8, -200) . "<br>";

// min() 函数返回给定数组中的最小值
echo min(0, 150, 30, 20, -8, -200) . "<br>";

// rand() 函数生成随机整数
// 例: 生成一个 1000 到 9999 之间的随机数
echo rand(1000, 9999) . "<br>";
echo rand() . "<br>";

// round() 函数对浮点数进行四舍五入
echo round(0.60) . "<br>";

// sqrt() 函数返回一个数的平方根
echo sqrt(64) . "<br>";
