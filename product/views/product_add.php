<!doctype html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>添加商品</title>
</head>
<body>
<div>
    <form action="index.php?action=add" method="post" enctype="multipart/form-data">
        <div>
            <label for="name">商品名称：</label>
            <input type="text" name="name" id="name">
        </div>
        <div>
            <label for="price">商品价格：</label>
            <input type="text" name="price" id="price">
        </div>
        <div>
            <label for="image">商品图片：</label>
            <input type="file" name="image" id="image">
        </div>
        <div>
            <label for="description">商品描述：</label>
            <textarea name="description" id="description" cols="30" rows="10"></textarea>
        </div>
        <div>
            <input type="submit" value="添加">
        </div>
    </form>
</div>
</body>
</html>