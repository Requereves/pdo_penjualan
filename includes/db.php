<?php
$host = 'localhost';
$dbname = 'db_pdopenjualan';
$username = 'root';
$password = '';

try {
    //membuat objek pdo untuk koneksi database
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

    //menampilkan error pada pdo
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //jika berhasil maka pdo akan berjalan
} catch (PDOException $e) {

    //jika gagal maka pesan dibawah akan muncul
    die("Koneksi gagal: " . $e->getMessage());
}