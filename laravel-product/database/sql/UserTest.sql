CREATE TABLE `user` (
                        `id` INT UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '用户ID，主键，自增',
                        `username` VARCHAR(50) NOT NULL UNIQUE COMMENT '用户名，唯一标识',
                        `password` VARCHAR(255) NOT NULL COMMENT '用户密码，存储加密后的哈希值',
                        `email` VARCHAR(100) NOT NULL UNIQUE COMMENT '用户邮箱，唯一标识',
                        `phone` VARCHAR(20) DEFAULT NULL COMMENT '用户手机号，可选',
                        `avatar` VARCHAR(255) DEFAULT NULL COMMENT '用户头像URL',
                        `gender` TINYINT(1) DEFAULT NULL COMMENT '性别（0=未知，1=男，2=女）',
                        `birthday` DATE DEFAULT NULL COMMENT '出生日期',
                        `country` VARCHAR(50) DEFAULT NULL COMMENT '国家',
                        `province` VARCHAR(50) DEFAULT NULL COMMENT '省份',
                        `city` VARCHAR(50) DEFAULT NULL COMMENT '城市',
                        `address` VARCHAR(255) DEFAULT NULL COMMENT '详细地址',
                        `zip_code` VARCHAR(10) DEFAULT NULL COMMENT '邮政编码',
                        `status` TINYINT(1) NOT NULL DEFAULT 1 COMMENT '用户状态（0=禁用，1=正常）',
                        `role` ENUM('admin', 'user', 'editor') NOT NULL DEFAULT 'user' COMMENT '用户角色（admin=管理员, user=普通用户, editor=编辑）',
                        `register_ip` VARCHAR(45) DEFAULT NULL COMMENT '注册IP地址',
                        `last_login_ip` VARCHAR(45) DEFAULT NULL COMMENT '最近登录IP地址',
                        `last_login_time` DATETIME DEFAULT NULL COMMENT '最近登录时间',
                        `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP COMMENT '账户创建时间',
                        `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '账户更新时间',
                        PRIMARY KEY (`id`),
                        UNIQUE KEY `idx_username` (`username`),
                        UNIQUE KEY `idx_email` (`email`),
                        KEY `idx_phone` (`phone`),
                        KEY `idx_status` (`status`),
                        KEY `idx_role` (`role`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='用户表';

INSERT INTO `user` (`username`, `password`, `email`, `phone`, `avatar`, `gender`, `birthday`, `country`, `province`, `city`, `address`, `zip_code`, `status`, `role`, `register_ip`, `last_login_ip`, `last_login_time`, `created_at`, `updated_at`) VALUES
                                                                                                                                                                                                                                                         ('zhangsan', '$2y$10$abcdefghijklmnopqrstuv', 'zhangsan@example.com', '13800138000', 'https://example.com/avatar1.jpg', 1, '1995-06-15', '中国', '北京市', '北京', '朝阳区某小区', '100000', 1, 'user', '192.168.1.1', '192.168.1.100', '2025-02-09 10:30:00', NOW(), NOW()),

                                                                                                                                                                                                                                                         ('lisi', '$2y$10$hijklmnopqrstuvwxyzabcdef', 'lisi@example.com', '13900239000', 'https://example.com/avatar2.jpg', 2, '1998-11-23', '中国', '上海市', '上海', '浦东新区某公寓', '200000', 1, 'editor', '192.168.1.2', '192.168.1.101', '2025-02-08 15:45:00', NOW(), NOW()),

                                                                                                                                                                                                                                                         ('wangwu', '$2y$10$qrstuvwxyzabcdefghijkl', 'wangwu@example.com', '15000345000', 'https://example.com/avatar3.jpg', 1, '2000-05-09', '中国', '广东省', '广州', '天河区某小区', '510000', 1, 'admin', '192.168.1.3', '192.168.1.102', '2025-02-07 08:20:00', NOW(), NOW()),

                                                                                                                                                                                                                                                         ('zhaoliu', '$2y$10$mnopqrstuvwxyabcdefghijkl', 'zhaoliu@example.com', '13600456000', 'https://example.com/avatar4.jpg', 0, '1993-12-01', '中国', '四川省', '成都', '锦江区某写字楼', '610000', 1, 'user', '192.168.1.4', '192.168.1.103', '2025-02-06 20:10:00', NOW(), NOW()),

                                                                                                                                                                                                                                                         ('qianqi', '$2y$10$uvwxyzabcdefghijklmnopqrst', 'qianqi@example.com', '13400567000', 'https://example.com/avatar5.jpg', 2, '1997-03-27', '中国', '江苏省', '南京', '鼓楼区某住宅', '210000', 1, 'editor', '192.168.1.5', '192.168.1.104', '2025-02-05 14:55:00', NOW(), NOW());
