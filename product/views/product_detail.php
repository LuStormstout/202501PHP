<!doctype html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>商品详情</title>
</head>
<body>
<div>
    <?php if (empty($product)): ?>
        <h1>商品不存在</h1>
        <?php return; ?>
    <?php else: ?>
        <h2><?= $product['name']; ?></h2>
        <p>价格: <?= $product['price']; ?></p>
        <p>商品描述: <?= $product['description']; ?></p>
        <p>创建时间: <?= $product['created_at']; ?></p>
        <p>更新时间: <?= $product['updated_at']; ?></p>
    <?php endif; ?>
</div>
</body>
</html>