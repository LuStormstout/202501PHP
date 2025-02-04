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
    protected function uploadImage(array $file): array
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
            include BASE_PATH . 'views/product_add.php';
        }
    }

    /**
     * 删除商品
     */
    public function delete(): void
    {
        $id = (int)$_GET['id'] ?? 0;
        $product = $this->productModel->getProductById($id);
        if ($product === null) {
            echo '商品不存在';
            return;
        }
        $image = $product['image'];
        if ($this->productModel->deleteProduct($id) === false) {
            echo '删除商品失败';
        }

        // 删除图片
        unlink($image);
        // if (file_exists($image) && unlink($image) === false) {
        # todo 这里删除失败了需要去记录日志, 但是如果上面商品删除成功了, 我们也认为这个操作是成功的
        // }

        header('Location: index.php');
    }

    /**
     * 更新商品, 显示更新表单
     */
    public function update(): void
    {
        $id = (int)$_GET['id'] ?? 0;
        $product = $this->productModel->getProductById($id);
        if ($product === null) {
            echo '商品不存在';
            return;
        }
        include BASE_PATH . 'views/product_update.php';
    }

    /**
     * 更新商品, 处理更新请求
     */
    public function save(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = (int)$_POST['id'];
            $name = htmlspecialchars($_POST['name']);
            $price = floatval($_POST['price']);
            $description = htmlspecialchars($_POST['description']);

            $product = $this->productModel->getProductById($id);
            if ($product === null) {
                echo '商品不存在';
                return;
            }

            if ($_FILES['image']['tmp_name'] === '') {
                $imageUploadResult = ['status' => true, 'path' => $product['image']];
            } else {
                $imageUploadResult = $this->uploadImage($_FILES['image']);

                if ($imageUploadResult['status'] === false) {
                    echo $imageUploadResult['error'];
                    return;
                }
                // 删除原图片
                unlink($product['image']);
            }

            if ($this->productModel->saveProduct(
                    $id, $name, $price, $description, $imageUploadResult['path']
                ) === false) {
                echo '更新商品失败';
                return;
            }

            header('Location: index.php?action=detail&id=' . $id);
        }
    }

}
