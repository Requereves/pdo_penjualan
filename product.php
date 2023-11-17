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

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produk</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <div class="container my-5">
        <h1>Produk</h1>
        <br>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Harga</th>
                    <th>Stok</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($products as $product) : ?>
                    <tr>
                        <!-- memanggil isi dari kolom 'name' dari products -->
                        <td><?= $product['id'] ?></td>
                        <td><?= $product['name'] ?></td>
                        <td><?= $product['harga'] ?></td>
                        <td><?= $product['stok'] ?></td>

                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <a class="btn btn-success" href="/db_pdopenjualan">Tambah Produk</a>
        <a class='btn btn-primary' href='/db_pdopenjualan/edit.php?id=$products[id]' role='button'>Ubah</a>
        <a class='btn btn-danger' href='/db_pdopenjualan/delete.php?id=$products[id]' role='button'>Hapus</a>
    </div>
</body>

</html>