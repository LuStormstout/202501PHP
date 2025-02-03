<?php
// index.php - 项目入口文件, 负责加载控制器和模型, 并分发请求


// 定义项目根目录
const BASE_PATH = __DIR__ . '/';

// 我们在执行的时候, 真正执行的是这个文件, 即所谓的当前文件
// 因为我们在这里引入了 controllers 和 models 对应的文件
// 所以当在 controllers 和 models 中的文件中引入文件的时候的相对路径是相对于 index.php 文件的

// 自动加载控制器和模型
spl_autoload_register(function ($className) {
    if (file_exists('controllers/' . $className . '.php')) {
        include 'controllers/' . $className . '.php';
    } else if (file_exists('models/' . $className . '.php')) {
        include 'models/' . $className . '.php';
    }
});

// 获取 URL 参数, 确定要调用的控制器和方法
$controller = $_GET['controller'] ?? 'Product';
$action = $_GET['action'] ?? 'list';

// 创建控制器实例并调用对应的方法
$controllerName = $controller . 'Controller';
$controller = new $controllerName();
$controller->{$action}();

// 大家开发的流程应该是先去写 config 定义数据库连接信息
// 然后去写 databases 数据库连接
// 再去 controller 中写对应的方法, 在 controller 中如果需要调用数据库操作的时候再去写对应的 model 里面的方法
// controller 中写了 getAllProducts() 方法, 这个方法中需要数据库中的所有 product 数据
// 所以在 model 中写了 getAllProducts() 方法
// 然后获取到数据之后需要显示在页面上, 所以在 view 中写了对应的页面
