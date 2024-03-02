<?php
include 'koneksi.php';
$kd_pemesanan = $_POST['kd_pemesanan'];
$kd_barang = $_POST['kd_barang'];
$jumlah = $_POST['jumlah'];
$harga_beli = $_POST['harga_beli'];

$sql = "INSERT INTO detail_pemesanan VALUES
('$kd_pemesanan','$kd_barang',$jumlah,$harga_beli)";
mysqli_query($conn, $sql);
