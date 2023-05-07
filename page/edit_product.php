<?php
require_once('../config/config.php');
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM `product` WHERE id = $id";
    $result = $connection->query($sql);
    $row = $result->fetch_assoc();
}
if (isset($_POST['edit'])) {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $image = $_FILES['img']['name'];
    $size = $_POST['size'];
    $quantity = $_POST['quantity'];
    $description = $_POST['description'];
    if ($image == '') {
        $sql = "UPDATE `product` SET `name` = '$name', `price` = '$price', `description` = '$description', 
        `quantity` = '$quantity', `size`= '$size'  WHERE `id` = $id";
        if ($connection->query($sql)) {
            $success = true;
        } else {
            $success = false;
        }
    } else {
        $image_tmp = $_FILES['image']['tmp_name'];
        move_uploaded_file($image_tmp, "./assets/img/$image");
        $sql = "UPDATE `product` SET `name` = '$name', `price` = '$price', `description` = '$description', 
        `quantity` = '$quantity', `size`= '$size', `img` = '$image'  WHERE `id` = $id";
        if ($connection->query($sql)) {
            $success = true;
        } else {
            $success = false;
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
                <div>
                    <div class="form-group">
                        <label for="name">Tên sản phẩm</label> <br>
                        <input type="text" name="name" id="name" placeholder="Tên sản phẩm" class="input input-primary" value="<?php echo $row['name'] ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="price">Giá</label><br>
                        <input type="number" name="price" id="price" placeholder="Giá" class="input input-primary" required value="<?php echo $row['price'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="price">Mô tả</label><br>
                        <textarea name="description" id="" cols="50" title="mo ta" placeholder="Mô tả sản phẩm" rows="10" class="textarea textarea-primary">
                            <?php echo trim($row['description']) ?>
                        </textarea>
                    </div>
                </div>
                <div>
                    <div class="form-group">
                        <label for="image">Ảnh</label> <br>
                        <img src="http://localhost/uddlw/assets/img/<?php echo $row['img'] ?>" alt="" class="w-64 h-64">
                        <input type="file" name="img" id="img" class="file-input file-input-primary mt-1">
                    </div>
                    <div class="form-group">
                        <label for="price">Số lượng</label><br>
                        <input type="number" name="quantity" id="price" placeholder="Giá" class="input input-primary" required value="<?php echo $row['quantity'] ?>">
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
            <div class="form-group mt-1">
                <input type="submit" value="Sửa" name="edit" class="btn btn-primary w-40 ">
            </div>
        </form>
    </div>
</body>

</html>