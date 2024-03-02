<?php
include 'koneksi.php';
$kd_permintaan = $_POST['kd_permintaan'];
$kd_barang = $_POST['kd_barang'];
$harga_jual = $_POST['harga_jual'];
$jumlah = $_POST['jumlah'];

$sql = "INSERT INTO detail_permintaan VALUES
('$kd_permintaan','$kd_barang',$harga_jual,$jumlah)";
mysqli_query($conn, $sql);

