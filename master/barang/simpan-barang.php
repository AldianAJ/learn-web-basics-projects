<?php
include 'koneksi.php';
$kd_barang = $_POST['kd_barang'];
$nm_barang = $_POST['nm_barang'];
$satuan = $_POST['satuan'];
$harga_beli = $_POST['harga_beli'];
$harga_jual = $_POST['harga_jual'];
$sql = "INSERT INTO barang VALUES('$kd_barang','$nm_barang','$satuan',$harga_beli,$harga_jual)";
mysqli_query($conn, $sql);