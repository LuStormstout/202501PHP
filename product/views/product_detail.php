<!doctype html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <title>商品详情</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark text-white">
    <a href="#" class="navbar-brand ms-5">Product</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
</nav>
<div class="container mt-3">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <?php if (empty($product)): ?>
                <h1>商品不存在</h1>
                <a href="index.php" class="btn btn-primary">返回列表</a>
                <?php return; ?>
            <?php else: ?>
                <img src="<?= $product['image']; ?>" class="img-thumbnail" alt="<?= $product['name']; ?>">
                <h2><?= $product['name']; ?></h2>
                <p><strong>价格:</strong> <?= $product['price']; ?></p>
                <p><strong>商品描述:</strong> <?= $product['description']; ?></p>
                <p><strong>创建时间:</strong> <?= $product['created_at']; ?></p>
                <p><strong>更新时间:</strong> <?= $product['updated_at']; ?></p>
                <a href="index.php" class="btn btn-primary">返回列表</a>
                <a href="index.php?action=update&id=<?= $product['id']; ?>" class="btn btn-primary">编辑</a>
                <a href="index.php?action=delete&id=<?= $product['id']; ?>" class="btn btn-danger">删除</a>
            <?php endif; ?>
        </div>
        <div class="col-md-2"></div>
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