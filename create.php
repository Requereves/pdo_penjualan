<?php

//import database dari db.php
include_once('includes/db.php');

//membuat kueri sql dari tabel products
$query = "SELECT * FROM listproduk";

//menjalankan database menggunakan $pdo 
$statement = $pdo->query($query);

//mengambil kueri menggunakan fetchAll(PDO::FETCH_ASSOC) dan mengembalikannya berbentuk data produk
$listproduk = $statement->fetchAll(PDO::FETCH_ASSOC);

//mengecek apakah data post kosong/tidak 
if ( !empty($_POST)) {

    //menyiapkan variabel yg akan di masukkan/digunakan
    $id = isset($_POST['id']) && !empty($_POST['id']) && $_POST['id'] != 'auto' ? $_POST['id'] : NULL;

    //mengecek apakah variabel 'nama' ada 
    $nama = isset ($_POST['nama']) ? $_POST['nama'] : '';
    //mengecek apakah variabel 'harga' ada 
    $harga = isset ($_POST['harga']) ? $_POST['harga'] : '';
    //mengecek apakah variabel 'stok' ada 
    $stok = isset ($_POST['stok']) ? $_POST['stok'] : '';
     
    $created = isset($_POST['created']) ? $_POST['created'] : date('Y-m-d H:i:s');

    //memasukkan data baru ke produk tabel
    $stmt = $pdo->prepare('INSERT INTO products VALUES (?, ?, ?, ?)');
    $stmt->execute([$id, $nama, $harga, $stok]);

    //pesan output
    $sukses = 'Created Successfully!';
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menambahkan produk</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body>

     <div class="container my-5">
        <h2>Produk Baru</h2>

    

        <form method="post">

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Name</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="name" value="<?php echo $nama; ?>">
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Harga</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="name" value="<?php echo $harga; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Stok</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="name" value="<?php echo $stok; ?>">
                </div>
            </div>


            <div class="row mb-3">
                <div class="offset-sm-3 col-sm-3 d-grid">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                <div class="col-sm-3 d-grid">
                    <a class="btn btn-outline-primary" href="/pdopenjualan/product.php" role="button">Cancel</a>
                </div>
            </div>
        </form>
     </div>

</body>
</html>