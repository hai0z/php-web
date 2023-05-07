<?php
require_once('../config/config.php');
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "select * from product where id = $id";
    $result = $connection->query($sql);
    $row = mysqli_fetch_assoc($result);
} ?>
<!DOCTYPE html>
<html lang="en" data-theme="cupcake">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Chi tiết sản phẩm</title>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@2.51.6/dist/full.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="font-mono">
    <?php
    require_once('../shared/navbar.php')
    ?>
    <div class="grid grid-cols-2 pt-20 mb-10 mx-16">
        <div>
            <img src="http://localhost/uddlw/assets/img/<?= $row['img'] ?>" alt="" class="h-[600px]" />
        </div>
        <div class="flex flex-col pl-16">
            <span class="text-[50px] font-bold text-black">
                <?= $row['name'] ?>
            </span>
            <span class="text-[30px] font-bold text-error mt-4">
                <?= number_format($row['price'], 0, '.', '.'); ?>
                VNĐ
            </span>
            <span class="text-[20px] text-black">
                Số lượng trong kho:
                <?= $row['quantity'] ?>
            </span>
            <span class="text-[20px] text-black mt-4">
                Size:
                <?= $row['size'] ?>
            </span>

            <span class="divider"></span>
            <span class="text-[20px] text-black mt-4">
                <?= $row['description'] ?>
            </span>
            <form method="post" action="http://localhost/uddlw/page/addtocart.php">
                <input type="hidden" name="product_id" value=<?= $row['id'] ?> />

                <input class="btn btn-primary w-64 mt-4" type="submit" name="add" value="Thêm vào giỏ hàng" />
            </form>
        </div>
    </div>
    <?php require_once('../shared/footer.php') ?>
</body>

</html>