<?php
session_start();
require_once('../config/config.php');
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}

if (isset($_POST['add_user'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = $_POST['role'];
    $sql = "INSERT INTO `user`(`username`, `password`, `role`) 
    VALUES ('$username','$password','$role')";
    $result = $connection->query($sql);
    if ($result) {
        $success = true;
    } else {
        $success = false;
    }
}
if (isset($_POST['delete_username'])) {
    $id = $_POST['username'];
    $sql = "DELETE FROM `user` WHERE username = '$id'";
    $connection->query($sql);
    header('location: quanli_user.php');
}
$sql = "SELECT * FROM user";
$result = $connection->query($sql);
?>

<!DOCTYPE html>
<html lang="en" data-theme="cupcake">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Quản lý sản phẩm</title>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@2.51.6/dist/full.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <?php require_once('../shared/admin_nav_bar.php') ?>
    <div class="min-h-screen px-16 pt-20">
        <div class="bg-primary h-16 rounded-md flex flex-col justify-center p-4">
            <span class="text-primary-content">Thêm Tài Khoản</span>
        </div>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="p-4 grid grid-cols-2">
                <div class="space-y-4 md:space-y-6">
                    <div>
                        <label for="">Tài khoản </label><br />
                        <input required type="text" name="username" id="" class="input input-primary w-full max-w-xs" />
                    </div>
                    <div>
                        <label for="">Mật khẩu</label><br />
                        <input required type="text" name="password" id="" class="input input-primary w-full max-w-xs" />
                    </div>
                    <div>
                        <label for="">Quyền</label><br />
                        <select class="select select-primary w-full max-w-xs" name="role">
                            <option value="0">User</option>
                            <option value="1">Admin</option>
                        </select>
                    </div>
                </div>

            </div>
            <div class="mx-4">
                <?php if (isset($success) && $success) : ?>
                    <div class="alert max-w-xs alert-success">
                        Thêm thành công
                    </div>
                <?php else : ?>
                    <?php if (isset($success) && !$success) : ?>
                        <div class="alert max-w-xs alert-error">
                            Thêm thất bại
                        </div>
                    <?php endif; ?>
                <?php endif; ?>

            </div>
            <input type="submit" class="btn btn-primary mt-4 mx-4 w-32" value="Thêm" name="add_user" />
        </form>
        <div>
            <div class="bg-primary h-16 rounded-md flex flex-col justify-center p-4 mt-8">
                <span class="text-primary-content">Danh sách user</span>

            </div>
            <div class="overflow-x-auto pt-4">
                <table class="table w-full">
                    <!-- head -->
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Tài khoản</th>
                            <th>Mật khẩu</th>
                            <th>Quyền</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $index = 0;
                        while ($user = $result->fetch_assoc()) {
                            $username = $user['username'];
                            $password = $user['password'];
                            $role = $user['role'];
                            $index++;
                        ?>
                            <tr>
                                <td><?php echo $index; ?></td>
                                <td><?php echo $username; ?></td>

                                <td><?php echo $password; ?></td>
                                <td><?php echo $role == '1' ? "Admin" : "User"; ?></td>

                                <td>
                                    <form action="" method="post">
                                        <input type="hidden" name="username" value=<?= $username ?> />
                                        <a class="btn btn-outline btn-error" value="Sửa" name="delete_username" href="./edit_user.php/?id=<?= $username ?>">Sửa</a>
                                        <input type="submit" class="btn btn-warning" value="Xoá" name="delete_username" onclick="return confirm('Bạn chắc chắn muốn xoá?');" />
                                    </form>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>