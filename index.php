<?php

//import database dari db.php
include_once('includes/db.php');

//membuat kueri sql dari tabel products
$query = "SELECT * FROM listproduk ";

//menjalankan database menggunakan $pdo 
$statement = $pdo->query($query);

//mengambil kueri menggunakan fetchAll(PDO::FETCH_ASSOC) dan mengembalikan berbentuk data produk
$listproduk = $statement->fetchAll(PDO::FETCH_ASSOC);

?>

<!-- Tampilkan daftar produk -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toko</title>
    <link rel="stylesheet" href="style.css">
   
</head>
<body>
    <h1>Daftar Produk</h1>
    <div class="table">
        <!--Mengulang setiap elemen dalam  array Products dengan menggunakan variabel sementara yg bernama product-->
        <?php foreach ($listproduk as $product): ?>
            <div class="product">
                
                <!--Mengambil nilai/isi dari kolom 'name' untuk nama product -->
                <h2><?= $product['nama']; ?></h2>

                <!--Mengambil nilai/isi dari kolom 'price' untuk harga product -->
                <p>Harga: <?= $product['harga']; ?></p>

                <!--Membuat tautan 'tambah ke keranjang' ke file cart.php-->
                <a href="cart.php?action=add&id=<?= $product['id']; ?>">Tambah ke Keranjang</a>
            </div>
        <?php endforeach; ?>
    </div>
</body>
</html>