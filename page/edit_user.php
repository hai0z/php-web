<?php
require_once('../config/config.php');
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM `user` WHERE username = '$id'";
    $result = $connection->query($sql);
    $row = $result->fetch_assoc();
}
if (isset($_POST['edit_user'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = $_POST['role'];
    $sql = "UPDATE `user` SET `password` = '$password', `role` = '$role' WHERE `username` = '$username'";
    if ($connection->query($sql)) {
        $success = true;
    } else {
        $success = false;
    }
}
?>
<!DOCTYPE html>
<html lang="en" data-theme="cupcake">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/daisyui@2.51.6/dist/full.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Sửa</title>
</head>

<body>
    <?php include '../shared/admin_nav_bar.php' ?>
    <div class="main mx-16 pt-20">
        <div class="bg-primary h-16 rounded-md flex flex-col justify-center p-4">
            <span class="text-primary-content">Sửa</span>
        </div>
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="p-4 grid grid-cols-2">
                <div class="space-y-2">
                    <div class="form-group">
                        <label for="name">Tài khoản</label> <br>
                        <input type="text" name="username" id="name" placeholder="Tài khoản" class="input input-primary" value="<?php echo $row['username'] ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="price">Mật khẩu</label><br>
                        <input type="text" name="password" id="price" placeholder="mật khẩu" class="input input-primary" required value="<?php echo $row['password'] ?>">
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
            <div class="form-group">
                <?php if (isset($success) && $success) : ?>
                    <div class="alert alert-success max-w-xs">
                        Sửa thành công
                    </div>
                <?php else : ?>
                    <?php if (isset($success) && !$success) : ?>
                        <div class="alert alert-error max-w-xs">
                            Sửa thất bại
                        </div>
                    <?php endif; ?>
                <?php endif; ?>
            </div>
            <div class="form-group mt-1 p-4">
                <input type="submit" value="Sửa" name="edit_user" class="btn btn-primary w-40 ">
            </div>
        </form>
    </div>
</body>

</html>