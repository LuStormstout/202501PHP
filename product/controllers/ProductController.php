<?php
// controllers/ProductController.php - 产品控制器类, 负责处理产品相关请求

// 这里要是想写成相对路径的话,
// 是相对于 index.php 文件的,
// 因为这个文件被引入到 index.php 中了,
// 而我们在浏览器里面访问的是 index.php
//require_once './models/Product.php';

// 这个是绝对路径, 从根目录开始的
require_once BASE_PATH . 'models/Product.php';

class ProductController
{
    /**
     * @var Product $productModel 商品模型实例
     */
    private Product $productModel;

    /**
     * 构造函数, 实例化商品模型
     */
    public function __construct()
    {
        $this->productModel = new Product();
    }

    /**
     * 「我需要查询数据库中的所有产品数据, 并显示在页面上」
     * 显示所有商品信息
     *
     * @return void
     */
    public function list(): void
    {
        // 我需要所有的商品信息, 我的商品信息存储在数据库中的, 我应该去找 Model 要数据
        $products = $this->productModel->getAllProducts();
        // 我需要把商品信息展示在页面上, 我应该去找 View 要页面
        include BASE_PATH . 'views/product_list.php';
    }

    /**
     * 「我需要查询数据库中的某个产品数据, 并显示在页面上」
     * 显示商品详情
     *
     * @return void
     */
    public function detail(): void
    {
        $id = $_GET['id'] ?? 0;
        $product = $this->productModel->getProductById($id);
        include BASE_PATH . 'views/product_detail.php';
    }

    /**
     * 上传图片
     *
     * @param array $file
     * @return array
     */
    public function uploadImage(array $file): array
    {
        $imageUploadResult = [];
        // 设置目标文件路径
        $targetFile = UPLOAD_IMAGE['UPLOAD_DIR'] . basename(uniqid() . '_' . $file['name']);
        // 获取文件类型
        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

        // 检查文件是否为图片
        $check = getimagesize($file['tmp_name']);
        if ($check === false) {
            $imageUploadResult['error'] = '文件不是图片';
            $imageUploadResult['status'] = false;
            return $imageUploadResult;
        }

        // 检查文件大小
        if ($file['size'] > UPLOAD_IMAGE['MAX_SIZE']) {
            $imageUploadResult['error'] = '文件过大';
            $imageUploadResult['status'] = false;
            return $imageUploadResult;
        }

        // 检查文件类型
        if (in_array($imageFileType, UPLOAD_IMAGE['ALLOWED_TYPES']) === false) {
            $imageUploadResult['error'] = '只允许上传 JPG, JPEG, PNG 和 GIF 格式的图片';
            $imageUploadResult['status'] = false;
            return $imageUploadResult;
        }

        // 上传文件
        if (move_uploaded_file($file['tmp_name'], $targetFile) === false) {
            $imageUploadResult['error'] = '上传图片失败';
            $imageUploadResult['status'] = false;
            return $imageUploadResult;
        }

        $imageUploadResult['status'] = true;
        $imageUploadResult['path'] = $targetFile;
        return $imageUploadResult;
    }

    /**
     * 添加商品
     *
     * @return void
     */
    public function add(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = htmlspecialchars($_POST['name']);
            $price = floatval($_POST['price']);
            $description = htmlspecialchars($_POST['description']);
            $imageUploadResult = $this->uploadImage($_FILES['image']);

            if ($imageUploadResult['status'] === false) {
                echo $imageUploadResult['error'];
                return;
            }

            if ($this->productModel->addProduct(
                    $name, $price, $description, $imageUploadResult['path']
                ) === false) {
                echo '添加商品失败';
                return;
            }

            header('Location: index.php');
        } else {
            include BASE_PATH . 'views/product_add.html';
        }
    }

    /**
     * 删除商品
     */
    public function delete()
    {
        // 删除商品我需要知道要删除哪一个商品, 所以我需要商品的唯一标识
        // 我应该从 URL 中获取商品的唯一标识, 也就是 GET 参数中的
        // 我需要调用模型里面的对应的删除方法去操作数据库
        // 需要注意的是我还要同时删除掉对应商品的图片
        // ...
    }

    /**
     * 更新商品
     */
    public function update()
    {
        // 我需要先把需要更新的商品信息获取到显示在表单中(数据回显)
        // ...
    }

}
