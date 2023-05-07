<?php require_once('../config/config.php');
$totalItems = "SELECT * FROM `product`";
$currentPage = $_GET['page'] ?? 1;
$itemsPerPage = 8;
$start = ($currentPage - 1) * $itemsPerPage;
$sql = "SELECT * FROM `product` LIMIT $start, $itemsPerPage ";
$result = $connection->query($sql);
$totalPages =
    ceil($connection->query($totalItems)->num_rows / $itemsPerPage); ?>
<!DOCTYPE html>
<html lang="en" data-theme="cupcake">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Shop clothes</title>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@2.51.6/dist/full.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<style>
    * {
        scroll-behavior: smooth;
    }
</style>

<body class="font-mono">
    <?php
    require_once('../shared/navbar.php')
    ?>
    <div class="min-h-screen pt-24">
        <!-- hero -->
        <div class="flex flex-col md:flex-row justify-around items-center">
            <div class="flex flex-col hidden md:flex">
                <a class="text-[20px] md:text-[40px] lg:text-[50px]">Shop Quần Áo</a>
                <a href="#shop" class="btn btn-primary w-32">Mua ngay</a>
            </div>
            <div>
                <img src="../assets/img/hero-img.svg" alt="" />
            </div>
        </div>
        <!-- men -->
        <div id="shop"></div>
        <div class="mt-24 md:mx-8 lg:mx-16 p-4">
            <div class="md:grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8 items-center justify-center flex flex-row flex-wrap">
                <?php while ($row = $result->fetch_assoc()) : ?>
                    <div class="card w-80 bg-base-100 shadow-xl h-[500px]">
                        <figure>
                            <a href="./product_details.php/?id=<?= $row['id'] ?>">
                                <img src="../assets/img/<?= $row['img'] ?>" alt="product" />
                            </a>
                        </figure>
                        <div class="card-body">
                            <h2 class="card-title">
                                <?= $row['name'] ?>
                            </h2>
                            <div class="flex-1">
                                <span>Giá:
                                    <span class="badge badge-secondary">
                                        <?= number_format($row['price'], 0, '.', '.'); ?>
                                        đ</span></span>
                                <div class="card-actions justify-end">
                                    <a href="./product_details.php/?id=<?= $row['id'] ?>" class="btn btn-primary">
                                        Mua ngay
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
        <div class="btn-group mx-auto container flex justify-center items-center my-4">
            <div class="btn-group">
                <a class="btn" href="?page=<?= ($currentPage > 1) ? $currentPage - 1 : 1 ?>">&laquo;</a>
                <?php for ($i = 1; $i <= $totalPages; $i++) : ?>
                    <a href="?page=<?= $i ?>" class="<?= $i == $currentPage ? 'btn-active btn' : '' ?> btn"><?= $i ?></a>
                <?php endfor; ?>
                <a class="btn" href="?page=<?= ($currentPage < $totalPages) ? $currentPage + 1 : $totalPages ?>">&raquo</a>
            </div>
        </div>
    </div>
    <!-- footer -->
    <?php require_once("../shared/footer.php") ?>
</body>

</html>