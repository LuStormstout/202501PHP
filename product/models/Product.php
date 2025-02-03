<?php
// product/models/Product.php - 产品模型类, 负责处理产品相关数据操作

// 相对路径
//require_once './databases/db.php';

// 绝对路径
require_once BASE_PATH . 'databases/db.php';

class Product
{
    private ?PDO $conn;

    public function __construct()
    {
        $this->conn = Database::getInstance()->getConnection();
    }

    /**
     * 获取所有商品信息
     *
     * @return array
     */
    public function getAllProducts(): array
    {
        // 查询所有商品的 SQL 语句
        $sql = "SELECT * FROM `products`";
        $stmt = $this->conn->query($sql);
        // 如果查询到数据, 则返回数据, 否则返回空数组
        if ($stmt->rowCount() > 0) {
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } else {
            return [];
        }
    }

    public function getProductById(int $id): mixed
    {
        $sql = "SELECT * FROM `products` WHERE `id` = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } else {
            return null;
        }
    }

    /**
     * 添加商品到数据库
     *
     * @param $name
     * @param $price
     * @param $description
     * @param $image
     * @return bool
     */
    public function addProduct($name, $price, $description, $image): bool
    {
        $sql = "INSERT INTO `products` (`name`, `price`, `description`, `image`) VALUES (:name, :price, :description, :image)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':price', $price);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':image', $image);
        if ($stmt->execute()) {
            return true;
        }
        return false;
    }
}