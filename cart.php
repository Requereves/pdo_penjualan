<?php
//import database dari db.php
include_once('includes/db.php');

//membuat kueri sql dari tabel products
$query = "SELECT * FROM listproduk";

//menjalankan database menggunakan $pdo 
$statement = $pdo->query($query);

//mengambil kueri menggunakan fetchAll(PDO::FETCH_ASSOC) dan mengembalikan berbentuk data produk
$listproduk = $statement->fetchAll(PDO::FETCH_ASSOC);

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
    <h2>Keranjang</h2>
    <div class="container my-5">
        <a href="btn btn-primary" href="/db_pdopenjualan">Add Product</a>
        <br>
        <table class="table">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>HARGA</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ( $listproduk as $product): ?>
                    
                    <tr>
                        <!-- memanggil isi kolom 'nama' dari ListProduk -->
                        <td><?= $product['nama'] ?></td> 

                        <!--Memanggil isi kolom 'harga' dari ListProduk-->
                        <td><?= $product['harga'] ?></td> 
                   
                        <td>
                            <a class='btn btn-primary' href='/db_pdopenjualan/edit.php?id=$products[id]' role='button'>Edit</a>
                            <a class='btn btn-danger' href='/db_pdopenjualan/delete.php?id=$products[id]' role='button'>Delete</a>
                        </td>
                    </tr>

                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>

</html>