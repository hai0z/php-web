<?php
session_start();
require_once('../config/config.php');
if (!$_SESSION['user']) {
    header("Location: http://localhost/uddlw/page/login.php");
} else {
    $id = $_POST['product_id'];
    $sql = "select * from product where id = $id";
    $result = $connection->query($sql);
    $row = mysqli_fetch_assoc($result);
    if (isset($_COOKIE['cart'])) {
        $cart = json_decode($_COOKIE['cart'], true);
    } else {
        $cart = array();
    }

    // Kiểm tra xem sản phẩm đã có trong giỏ hàng hay chưa
    if (array_key_exists($id, $cart)) {
        // Nếu đã có, tăng số lượng sản phẩm
        $cart[$id]['quantity'] += 1;
    } else {

        // Nếu chưa có, thêm sản phẩm mới vào giỏ hàng
        $cart[$id] = array(
            'id' => $row['id'],
            'name' => $row['name'],
            'price' => $row['price'],
            'quantity' => 1,
            'img' => $row['img'],
            'size' => $row['size']
        );
    }


    // Lưu giỏ hàng vào cookie
    setcookie('cart', json_encode($cart, JSON_UNESCAPED_UNICODE), time() + (86400 * 30), "/");
    header("Location: http://localhost/uddlw/page/product_details.php/?id=$id");
}
