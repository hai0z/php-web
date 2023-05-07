<?php
session_start();
require_once('../config/config.php');
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}

if (isset($_POST['add'])) {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $image = $_FILES['img']['name'];
    $image_tmp = $_FILES['img']['tmp_name'];
    $size = $_POST['size'];
    $quantity = $_POST['quantity'];
    $description = $_POST['description'];
    move_uploaded_file($image_tmp, "../assets/img/$image");
    $sql = "INSERT INTO `product`(`name`, `price`, `img`,`size`,`description`,`quantity`) 
    VALUES ('$name','$price','$image','$size','$description','$quantity')";
    $result = $connection->query($sql);
    if ($result) {
        $success = true;
    } else {
        $success = false;
    }
}
if (isset($_POST['product_id'])) {
    $id = $_POST['product_id'];
    $sql = "DELETE FROM `product` WHERE id = $id";
    $connection->query($sql);
    header('location: admin.php');
}
$sql = "SELECT * FROM product";
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
            <span class="text-primary-content">Thêm sản phẩm</span>
        </div>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="p-4 grid grid-cols-2">
                <div class="space-y-4 md:space-y-6">
                    <div>
                        <label for="">Tên sản phẩm </label><br />
                        <input required type="text" name="name" id="" class="input input-primary w-full max-w-xs" />
                    </div>
                    <div>
                        <label for="">Giá</label><br />
                        <input required type="number" name="price" id="" class="input input-primary w-full max-w-xs" />
                    </div>
                    <div>
                        <label for="price">Mô tả</label><br>
                        <textarea name="description" id="" cols="50" title="mo ta" placeholder="Mô tả sản phẩm" rows="10" class="textarea textarea-primary">

                        </textarea>
                    </div>
                </div>
                <div class="space-y-4 md:space-y-6">
                    <div>
                        <label for="">Ảnh </label><br />
                        <input type="file" name="img" id="" class="file-input file-input-primary" required />
                    </div>
                    <div>
                        <label for="">Số lượng</label><br />
                        <input type="number" name="quantity" id="" class="input input-primary w-full max-w-xs" required />
                    </div>
                    <div>
                        <label for="">Size</label><br />
                        <select class="select select-primary w-full max-w-xs" name="size">

                            <option value="S">S</option>
                            <option value="M">M</option>
                            <option value="L">L</option>
                            <option value="XL">XL</option>
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
            <input type="submit" class="btn btn-primary mt-4 mx-4 w-32" value="Thêm" name="add" />
        </form>
        <div>
            <div class="bg-primary h-16 rounded-md flex flex-col justify-center p-4 mt-8">
                <span class="text-primary-content">Danh sách sản phẩm</span>

            </div>
            <div class="overflow-x-auto pt-4">
                <table class="table w-full">
                    <!-- head -->
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Tên</th>
                            <th>Ảnh</th>
                            <th>Số lượng</th>
                            <th>Giá tiền</th>
                            <th>Size</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $index = 0;
                        while ($product = $result->fetch_assoc()) {
                            $product_id = $product['id'];
                            $product_name = $product['name'];
                            $product_price = $product['price'];
                            $product_quantity = $product['quantity'];
                            $img = $product['img'];
                            $size = $product['size'];
                            $index++;
                        ?>
                            <tr>
                                <td><?php echo $index; ?></td>
                                <td><?php echo $product_name; ?></td>
                                <td>
                                    <img src="../assets/img/<?= $img; ?>" alt="" class="h-40 w-40">
                                </td>
                                <td><?php echo $product_quantity; ?></td>
                                <td><?php echo $product_price; ?></td>
                                <td><?php echo $size ?></td>
                                <td>
                                    <form action="" method="post">
                                        <input type="hidden" name="product_id" value=<?= $product_id ?> />
                                        <a class="btn btn-outline btn-error" value="Sửa" name="delete" href="./edit_product.php/?id=<?= $product_id ?>">Sửa</a>
                                        <input type="submit" class="btn btn-warning" value="Xoá" name="delete" onclick="return confirm('Bạn chắc chắn muốn xoá?');" />
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