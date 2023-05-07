<?php
session_start();
$username = $_SESSION['user'] ?? "";
if (isset($_COOKIE['cart'])) {
    $cart = json_decode($_COOKIE['cart'], true);
    $total_quantity = 0;
    $total_price = 0;
    foreach ($cart as $item) {
        $total_quantity += $item['quantity'];
        $total_price += $item['price'] * $item['quantity'];
    }
} else {
    $cart = array();
}
if (isset($_POST['logout'])) {
    unset($_SESSION['user']);
    header("Location: login.php");
    exit();
}
?>
<div class="navbar bg-base-100 shadow-xl bg-opacity-90 fixed z-10 backdrop-blur-sm">
    <div class="flex-1">
        <a class="btn btn-ghost normal-case text-xl" href="http://localhost/uddlw/page/">Shop Clothes</a>
    </div>
    <div class="flex-none">
        <div class="dropdown dropdown-end">
            <?php
            if (isset($username) && $username != "") { ?>
                <label tabindex="0" class="btn btn-ghost btn-circle mx-3">
                    <div class="indicator">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                        <span class="badge badge-sm indicator-item"><?= $total_quantity ?></span>
                    </div>
                </label>
                <div tabindex="0" class="mt-3 card card-compact dropdown-content w-52 bg-base-100 shadow">
                    <div class="card-body">
                        <span class="font-bold text-lg"><?= $total_quantity ?> mặt hàng</span>
                        <span class="text-info">Tổng tiền: <?= number_format($total_price, 0, '.', '.'); ?>đ</span>
                        <div class="card-actions">
                            <a href="http://localhost/uddlw/page/cart.php" class="btn btn-primary btn-block">
                                Xem giỏ hàng
                            </a>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
        <div class="dropdown dropdown-end">
            <?php
            if (isset($username) && $username != "") { ?>
                <label tabindex="0" class="btn btn-ghost btn-circle avatar">
                    <div class="w-10 rounded-full">
                        <img src="https://demoda.vn/wp-content/uploads/2022/02/avatar-anime-cute.jpg" />
                    </div>
                </label>
                <ul tabindex="0" class="menu menu-compact dropdown-content mt-3 p-2 shadow bg-base-100 rounded-box w-52">
                    <li>
                        <a class="justify-between">
                            Xin chào <?= $username ?>

                        </a>
                    </li>
                    <li>
                        <form action="" method='post'>
                            <input type="submit" value="Đăng xuất" name="logout">
                        </form>
                    </li>
                </ul>
            <?php
            } else {
                echo "<a class='btn btn-ghost' href='http://localhost/uddlw/page/login.php'>Đăng nhập</a>";
            }
            ?>
        </div>
    </div>
</div>