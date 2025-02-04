<!doctype html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <title>更新商品</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark text-white">
    <a href="index.php" class="navbar-brand ms-5">Product</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="index.php?action=detail&id=<?php if (isset($product['id'])) {
                    echo $product['id'];
                } ?>">返回商品详情</a>
            </li>
        </ul>
    </div>
</nav>
<div class="container mt-3">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <h1>更新商品</h1>
            <form action="index.php?action=save" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?php if (isset($product['id'])) {
                    echo $product['id'];
                } ?>">
                <div class="mb-3">
                    <label for="name" class="form-label">商品名称：</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="请输入商品名称"
                           value="<?php if (isset($product['name'])) {
                               echo $product['name'];
                           } ?>" required>
                </div>
                <div class="mb-3">
                    <label for="price" class="form-label">商品价格：</label>
                    <input type="number" class="form-control" id="price" name="price"
                           value="<?php if (isset($product['price'])) {
                               echo $product['price'];
                           } ?>" placeholder="请输入商品价格" required>
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">商品图片：</label>
                    <input class="form-control" type="file" id="image" name="image">
                </div>
                <?php if (isset($product['image'])): ?>
                    <div class="mb-3">
                        <label for="current_image" class="form-label">当前图片：</label>
                        <img id="current_image" src="<?= $product['image'] ?>" class="img-thumbnail"
                             alt="<?= $product['name']; ?>">
                    </div>
                <?php endif; ?>
                <div class="mb-3">
                    <label for="description" class="form-label">商品描述：</label>
                    <textarea class="form-control" id="description" name="description"
                              rows="3" required><?php if (isset($product['description'])) {
                            echo $product['description'];
                        } ?></textarea>
                </div>
                <div>
                    <input class="btn btn-primary" type="submit" value="更新商品信息">
                </div>
            </form>
        </div>
        <div class="col-md-3"></div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"
        integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js"
        integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj"
        crossorigin="anonymous"></script>
</body>
</html>