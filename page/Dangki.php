<?php
session_start();
require_once('../config/config.php');
$err = [];
if (isset($_POST['signup'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $repassword = $_POST['repassword'];
    if ($repassword != $password) {
        $err["pass"] = "Mật khẩu không trùng khớp";
    }
    if (empty($err)) {
        $sql = "INSERT INTO user VALUES('$username','$password','0')";
        $result = $connection->query($sql);
        if ($result) {
            $err["success"] = "Đằng kí thành công";
        } else {
            $err["username"] = "Tài khoản đã tồn tại";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en" data-theme="cupcake">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng kí</title>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@2.51.6/dist/full.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <section class="bg-gray-50 dark:bg-gray-900">
        <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
            <a href="#" class="flex items-center mb-6 text-2xl font-semibold text-gray-900 dark:text-white">
                <img class="w-8 h-8 mr-2" src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/logo.svg" alt="logo">
                Signup
            </a>
            <div class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                    <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                        Đăng Kí
                    </h1>
                    <form class="space-y-4 md:space-y-6" action="" method="post">
                        <div>
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tài khoản</label>
                            <input type="text" name="username" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="" required="">
                        </div>
                        <div>
                            <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Mật khẩu</label>
                            <input type="password" name="password" id="password" placeholder="" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required="">
                        </div>
                        <div>
                            <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nhập lại mật khẩu</label>
                            <input type="password" name="repassword" id="password" placeholder="" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required="">
                        </div>
                        <div class="form-group">
                            <?php if (isset($err) && isset($err['pass'])) : ?>
                                <div class="alert alert-error max-w-xs">
                                    <?php echo $err['pass']; ?>
                                </div>
                            <?php endif; ?>
                            <?php if (isset($err) && isset($err['success'])) : ?>
                                <div class="alert alert-success max-w-xs">
                                    <?php echo $err['success']; ?>
                                </div>
                            <?php endif; ?>
                            <?php if (isset($err) && isset($err['username'])) : ?>
                                <div class="alert alert-error max-w-xs">
                                    <?php echo $err['username']; ?>
                                </div>
                            <?php endif; ?>

                        </div>
                        <button type="submit" class="w-full text-white bg-indigo-500 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center" name="signup">Đăng kí</button>
                        <p class="text-sm font-light text-gray-500 dark:text-gray-400">
                            Đã có tài khoản? <a href="login.php" class="font-medium text-primary-600 hover:underline dark:text-primary-500">Đăng nhập</a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </section>
</body>

</html>