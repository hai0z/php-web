<?php

if (isset($_POST['logout'])) {
    unset($_SESSION['admin']);
    header("Location: login.php");
    exit();
}
?>
<div class="navbar bg-base-100 shadow-lg fixed z-10">
    <div class="flex-1">
        <a class="btn btn-ghost normal-case text-xl" href="http://localhost/uddlw/page/admin.php">Admin Page</a>
    </div>
    <div class="flex-none">
        <ul class="menu menu-horizontal px-1">
            <li><a href="http://localhost/uddlw/page/admin.php">Trang chủ</a></li>
            <li tabindex="0">
                <a href="http://localhost/uddlw/page/admin.php">
                    Quản lí sản phẩm
                </a>
            </li>
            <li><a href="http://localhost/uddlw/page/quanli_user.php">Quản lí user</a></li>
        </ul>
    </div>
    <div class="dropdown dropdown-end">
        <label tabindex="0" class="btn btn-ghost btn-circle avatar">
            <div class="w-10 rounded-full">
                <img src="https://demoda.vn/wp-content/uploads/2022/02/avatar-anime-cute.jpg" />
            </div>
        </label>
        <ul tabindex="0" class="menu menu-compact dropdown-content mt-3 p-2 shadow bg-base-100 rounded-box w-52">
            <li>
                <a class="justify-between">
                    Xin chào <?= $_SESSION['admin'] ?>
                </a>
            </li>
            <li>
                <form action="" method='post'>
                    <input type="submit" value="Đăng xuất" name="logout">
                </form>
            </li>
        </ul>
    </div>
</div>