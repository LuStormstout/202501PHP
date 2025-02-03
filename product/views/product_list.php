<!doctype html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>商品列表</title>
</head>
<body>
<?php if (!empty($products) && is_array($products)): ?>
    <?php foreach ($products as $product): ?>
        <div>
            <h2><?= $product['name']; ?></h2>
            <p>价格: <?= $product['price']; ?></p>
            <p>商品描述: <?= $product['description']; ?></p>
        </div>
    <?php endforeach; ?>
<?php else: ?>
    <p>暂无商品信息</p>
<?php endif; ?>
</body>
</html>