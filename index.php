<?php

//import database dari db.php
include_once('includes/db.php');

//membuat kueri sql dari tabel products
$query = "SELECT * FROM products";

//menjalankan database menggunakan $pdo 
$statement = $pdo->query($query);

//mengambil kueri menggunakan fetchAll(PDO::FETCH_ASSOC) dan mengembalikan berbentuk data produk
$products = $statement->fetchAll(PDO::FETCH_ASSOC);

?>

<!-- Tampilkan daftar produk -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toko</title>
    <link rel="stylesheet" href="/assets/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <div class="container my-5">

        <h1>Daftar Produk</h1>
        <br>
        <div class="table">
            <!--Mengulang setiap elemen dalam  array Products dengan menggunakan variabel sementara yg bernama product-->
            <?php foreach ($products as $product) : ?>
                <div>

                    <!--Mengambil nilai dari kolom 'name' untuk nama product -->
                    <h2></h2>

                    <!--Mengambil nilai dari kolom 'price' untuk harga product -->
                    <p></p>

                    <!--Mengambol nilai dari kolom 'stock' untuk stok product-->
                    <p></p>

                    <!--Membuat tautan 'tambah ke keranjang' ke file cart.php-->

                    <div class="row row-cols-1 row-cols-md-3 g-4">
                        <div class="col">
                            <div class="card h-100">
                                <img src="./assets/cola.jpg" class="card-img-top" alt="..." width="256px" height="200px" style="object-fit: contain;">
                                <div class="card-body">
                                    <h5 class="card-title"><?= $product['name']; ?></h5>
                                    <p class="card-text">Harga: <?= $product['harga']; ?></p>
                                    <p class="card-text"><small class="text-muted">Stok: <?= $product['stok']; ?></small></p>
                                    <a class="btn btn-primary" href="cart.php?action=add&id=<?= $product['id']; ?>"><img src="./assets/bxs-cart-add.svg" /></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</body>

</html>