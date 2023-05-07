<?php
session_start();
require_once('../config/config.php');
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM user WHERE username = '$username' AND password = '$password'";
    $result = $connection->query($sql);
    if (mysqli_num_rows($result) == 1) {
        $row = $result->fetch_assoc();
        if ($row['role'] == 1) {
            $_SESSION['admin'] = $username;
            header("location: http://localhost/uddlw/page/admin.php");
        } else {
            $_SESSION['user'] = $username;
            header("location: http://localhost/uddlw/page/");
        }
    } else {
        $err = "Sai toài khoản hoặc mật khẩu";
    }
}

?>
<!DOCTYPE html>
<html lang="en" data-theme="cupcake">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@2.51.6/dist/full.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <section class="bg-gray-50 dark:bg-gray-900">
        <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
            <a href="#" class="flex items-center mb-6 text-2xl font-semibold text-gray-900 dark:text-white">
                <img class="w-8 h-8 mr-2" src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/logo.svg" alt="logo">
                Login
            </a>
            <div class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                    <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                        Đăng nhập
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
                        <?php if (isset($err)) : ?>
                            <div class="alert alert-error max-w-xs">
                                <?php echo $err; ?>
                            </div>
                        <?php endif; ?>
                        <button type="submit" class="w-full text-white bg-indigo-500 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center" name="login"> Đăng nhập</button>
                        <p class="text-sm font-light text-gray-500 dark:text-gray-400">
                            Chưa có tài khoản? <a href="dangki.php" class="font-medium text-primary-600 hover:underline dark:text-primary-500">Đăng kí</a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </section>
</body>

</html>