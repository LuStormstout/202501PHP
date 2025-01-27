# Nginx 服务器配置

## 目录
1. [Nginx 简介](#nginx-简介)
2. [Nginx 安装与配置](#nginx-安装与配置)
3. [Nginx 基本命令](#nginx-基本命令)
4. [Nginx 配置文件结构](#nginx-配置文件结构)
5. [Nginx 常见配置示例](#nginx-常见配置示例)
    - [配置静态文件服务](#配置静态文件服务)
    - [配置 PHP 请求](#配置-php-请求)
    - [在 PHPstudy 中配置多个虚拟主机](#在-phpstudy-中配置多个虚拟主机)
6. [Nginx 性能优化](#nginx-性能优化)
7. [Nginx 常见问题排查](#nginx-常见问题排查)
8. [Windows 下配置 hosts 文件](#windows-下配置-hosts-文件)

## Nginx 简介
Nginx 是一个高性能的 HTTP 和反向代理服务器，也是一个 IMAP/POP3/SMTP 代理服务器。Nginx 以其高性能、高并发连接的特点而著称。

## Nginx 安装与配置
### 安装 Nginx
在不同的操作系统下安装 Nginx 的方法有所不同，这里以 Ubuntu 和 CentOS 为例：

**Ubuntu:**
```bash
sudo apt update
sudo apt install nginx
```

**CentOS:**
```bash
sudo yum update
sudo yum install nginx
```

### 启动与停止 Nginx
**启动 Nginx:**
```bash
sudo systemctl start nginx
```

**停止 Nginx:**
```bash
sudo systemctl stop nginx
```

### Nginx 配置文件路径
在不同的操作系统中，Nginx 的配置文件路径可能有所不同，常见的有：
- /etc/nginx/nginx.conf

## Nginx 基本命令
### 启动 Nginx
```bash
sudo systemctl start nginx
```

### 停止 Nginx
```bash
sudo systemctl stop nginx
```

### 重启 Nginx
```bash
sudo systemctl restart nginx
```

### 重新加载 Nginx 配置
```bash
sudo systemctl reload nginx
```

### 检查 Nginx 配置是否正确
```bash
sudo nginx -t
```

## Nginx 配置文件结构
Nginx 的配置文件采用模块化设计，主要包括以下几个部分：
- **全局块**: 设置全局变量，如用户、进程数等。
- **events 块**: 设置 Nginx 的工作模式，如连接数上限等。
- **http 块**: 设置 HTTP 服务器相关配置，包括代理、缓存、日志定义等。

## Nginx 常见配置示例
### 配置静态文件服务
以下是一个详细的静态文件服务配置示例：
```nginx
server {
# 监听端口
listen 80;

    # 定义服务器名称
    server_name example.com;

    # 定义请求根路径的处理
    location / {
        # 设置根目录
        root /var/www/html;

        # 设置默认文档
        index index.html index.htm;
    }
}
```

### 配置 PHP 请求
以下是一个详细的处理 PHP 请求的配置示例：
```nginx
server {
# 监听端口
listen 80;

    # 定义服务器名称
    server_name example.com;

    # 定义请求根路径的处理
    location / {
        # 设置根目录
        root /var/www/html;

        # 设置默认文档
        index index.html index.htm index.php;
    }

    # 处理 PHP 请求
    location ~ .php$ {
        # 设置根目录
        root /var/www/html;

        # 设置 FastCGI 服务器地址
        fastcgi_pass unix:/var/run/php/php7.4-fpm.sock;

        # 设置 FastCGI 请求的相关参数
        fastcgi_index index.php;
        fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
        include fastcgi_params;
    }

    # 定义错误页面的处理
    error_page 404 /404.html;
    location = /40x.html {
    }

    # 处理 50x 错误
    error_page 500 502 503 504 /50x.html;
    location = /50x.html {
    }
}
```

### 在 PHPstudy 中配置多个虚拟主机
在 Windows 中使用 PHPstudy 配置 Nginx 处理多个虚拟网站的步骤如下：

1. **打开 PHPstudy**
   打开 PHPstudy 软件，确保 Nginx 服务已经启动。

2. **找到 Nginx 配置文件**
   在 PHPstudy 中，Nginx 的配置文件通常位于 `PHPstudyPHPTutorialNginxconf` 目录下的 `nginx.conf` 文件中。

3. **修改 Nginx 配置文件**
   打开 `nginx.conf` 文件，添加多个虚拟主机的配置。以下是详细的示例：

```nginx
# 定义 Nginx 运行的用户和用户组
user www-data;

# 定义 Nginx 进程数，一般设置为 CPU 核心数
worker_processes auto;

# 定义 Nginx 进程 ID 存储文件路径
pid /run/nginx.pid;

# events 块，用于设置 Nginx 的工作模式
events {
# 设置每个进程的最大连接数
worker_connections 1024;
}

# http 块，用于设置 HTTP 服务器相关配置
http {
# 引入 MIME 类型定义文件
include mime.types;

    # 设置默认的 MIME 类型
    default_type application/octet-stream;

    # 启用高效传输模式
    sendfile on;

    # 减少网络报文段发送次数
    tcp_nopush on;

    # 减少网络数据包数量
    tcp_nodelay on;

    # 设置连接超时时间
    keepalive_timeout 65;

    # 设置日志格式
    log_format main '$remote_addr - $remote_user [$time_local] "$request" '
                      '$status $body_bytes_sent "$http_referer" '
                      '"$http_user_agent" "$http_x_forwarded_for"';

    # 定义访问日志文件路径及使用的日志格式
    access_log logs/access.log main;

    # 定义第一个虚拟主机
    server {
        # 监听端口
        listen 80;

        # 定义服务器名称
        server_name site1.com;

        # 定义请求根路径的处理
        location / {
            # 设置根目录
            root html/site1;

            # 设置默认文档
            index index.html index.htm index.php;
        }

        # 处理 PHP 请求
        location ~ .php$ {
            # 设置根目录
            root html/site1;

            # 设置 FastCGI 服务器地址
            fastcgi_pass 127.0.0.1:9000;

            # 设置 FastCGI 请求的相关参数
            fastcgi_index index.php;
            fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
            include fastcgi_params;
        }

        # 定义错误页面的处理
        error_page 404 /404.html;
        location = /40x.html {
        }

        # 处理 50x 错误
        error_page 500 502 503 504 /50x.html;
        location = /50x.html {
        }
    }

    # 定义第二个虚拟主机
    server {
        # 监听端口
        listen 80;

        # 定义服务器名称
        server_name site2.com;

        # 定义请求根路径的处理
        location / {
            # 设置根目录
            root html/site2;

            # 设置默认文档
            index index.html index.htm index.php;
        }

        # 处理 PHP 请求
        location ~ .php$ {
            # 设置根目录
            root html/site2;

            # 设置 FastCGI 服务器地址
            fastcgi_pass 127.0.0.1:9000;

            # 设置 FastCGI 请求的相关参数
            fastcgi_index index.php;
            fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
            include fastcgi_params;
        }

        # 定义错误页面的处理
        error_page 404 /404.html;
        location = /40x.html {
        }

        # 处理 50x 错误
        error_page 500 502 503 504 /50x.html;
        location = /50x.html {
        }
    }
}
```

## Windows 下配置 hosts 文件
为了在 Windows 下访问本地配置 的虚拟网站，需要修改 Windows 的 hosts 文件，使得 `site1.com` 和 `site2.com` 指向本地 IP 地址。

1. **打开记事本，以管理员身份运行。**
2. **打开文件 `C:WindowsSystem32driversetchosts`。**
3. **在文件末尾添加以下内容：**
   ```plaintext
   127.0.0.1   site1.com
   127.0.0.1   site2.com
   ```
4. **保存文件并关闭记事本。**

这样，访问 `http://site1.com` 和 `http://site2.com` 就会指向本地的 Nginx 服务器。

## Nginx 性能优化
### 调整 worker_processes 和 worker_connections
根据服务器的 CPU 核心数和并发连接数调整以下参数：
```nginx
worker_processes auto;
events {
worker_connections 1024;
}
```

### 启用 Gzip 压缩
启用 Gzip 压缩以减少传输数据量：
```nginx
http {
gzip on;
gzip_min_length 1024;
gzip_comp_level 5;
gzip_types text/plain text/css application/json application/javascript text/xml application/xml application/xml+rss text/javascript;
}
```

## Nginx 常见问题排查
### 查看 Nginx 错误日志
错误日志通常位于 /var/log/nginx/error.log，可以通过以下命令查看：
```bash
tail -f /var/log/nginx/error.log
```

### 检查 Nginx 配置文件
在修改配置文件后，使用以下命令检查配置文件是否正确：
```bash
sudo nginx -t
```

### 查看 Nginx 状态
使用 systemctl 查看 Nginx 服务状态：
```bash
sudo systemctl status nginx
```