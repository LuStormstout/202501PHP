<?php
// product/databases/db.php - 数据库连接类, 采用单例模式管理数据库连接

// 相对路径
//require_once './config/config.php';

// 绝对路径
require_once BASE_PATH . 'config/config.php';

/**
 * 数据库连接类
 *
 * Class Database
 */
class Database
{
    /**
     * 保存类实例的静态变量
     *
     * @var Database|null
     */
    private static Database|null $instance = null;

    /**
     * 数据库连接对象
     *
     * @var PDO|null
     */
    private ?PDO $conn;

    /**
     * 构造函数私有化, 防止外部直接创建对象
     */
    private function __construct()
    {
        // 连接数据库
        try {
            $db = new PDO("mysql:host=" . DATABASE['DB_HOST'] . ";dbname=" . DATABASE['DB_NAME'], DATABASE['DB_USER'], DATABASE['DB_PASS']);
            // 设置 PDO 错误模式为异常
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->conn = $db;
        } catch (PDOException $e) {
            die("数据库连接失败: " . $e->getMessage());
        }
    }

    /**
     * 获取类实例的公共静态方法
     *
     * @return Database|null
     */
    public static function getInstance(): ?Database
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    /**
     * 获取数据库连接对象
     *
     * @return PDO|null
     */
    public function getConnection(): ?PDO
    {
        return $this->conn;
    }
}