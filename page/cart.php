<?php
if (isset($_COOKIE['cart'])) {
    $cart = json_decode($_COOKIE['cart'], true);
} else {
    $cart = array();
}

if (isset($_POST['delete'])) {
    $product_id = $_POST['product_id'];
    if (array_key_exists($product_id, $cart)) {
        unset($cart[$product_id]);
    }

    // Lưu giỏ hàng vào cookie
    setcookie('cart', json_encode($cart, JSON_UNESCAPED_UNICODE), time() + (86400 * 30), "/");
    header("Refresh:0");
}

?>
<!DOCTYPE html>
<html lang="en" data-theme="cupcake">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giỏ hàng</title>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@2.51.6/dist/full.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="font-mono">
    <?php require_once('../shared/navbar.php') ?>
    <div class="overflow-x-auto pt-20 mx-16 min-h-screen">
        <table class="table w-full">
            <!-- head -->
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Tên</th>
                    <th>Ảnh</th>
                    <th>Số lượng</th>
                    <th>Giá tiền</th>
                    <th>Tổng tiền</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $index = 0;
                $total_quantity = 0;
                $total_price = 0;

                foreach ($cart as $product_id => $product) {
                    $product_id = $product['id'];
                    $product_name = $product['name'];
                    $product_price = $product['price'];
                    $product_quantity = $product['quantity'];
                    $img = $product['img'];
                    $product_total = $product_price * $product_quantity;
                    $total_quantity += $product_quantity;
                    $total_price += $product_total;
                    $index++;
                ?>
                    <tr>
                        <td><?php echo $index; ?></td>
                        <td><?php echo $product_name; ?></td>
                        <td>
                            <img src="http://localhost/uddlw/assets/img/<?= $img ?>" alt="" class="md:h-40 md:w-40">
                        </td>
                        <td><?php echo $product_quantity; ?></td>
                        <td><?= number_format($product_price, 0, '.', '.'); ?> VNĐ</td>
                        <td><?= number_format($product_total, 0, '.', '.'); ?> VNĐ</td>
                        <td>
                            <form action="" method="post">
                                <input type="hidden" name="product_id" value=<?= $product_id ?> />

                                <input type="submit" class="btn btn-error" value="Xoá" name="delete" />

                            </form>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
        <div class="flex flex-row justify-end">
            Tổng tiền: <span class="text-error"><?= number_format($total_price, 0, '.', '.'); ?> VNĐ</span>
        </div>
    </div>
    <?php require_once('../shared/footer.php') ?>
</body>

</html>