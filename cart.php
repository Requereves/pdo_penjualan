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
    <title>Keranjang</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container my-5">
        <h1>Keranjang</h1>
        <br>
        <table class="table">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Harga</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($products as $product) : ?>

                    <tr>
                        <!-- memanggil isi dari kolom 'name' dari products -->
                        <td><?= $product['name'] ?></td>
                        <td><?= $product['harga'] ?></td>
                    </tr>

                <?php endforeach; ?>
            </tbody>
        </table>
        <a class='btn btn-success' href="/db_pdopenjualan">Tambah Produk</a>
        <a class='btn btn-primary' href='/db_pdopenjualan/edit.php?id=$products[id]' role='button'>Ubah</a>
        <a class='btn btn-danger' href='/db_pdopenjualan/delete.php?id=$products[id]' role='button'>Hapus</a>
    </div>
</body>

</html>