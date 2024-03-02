<?php
include 'koneksi.php';
$kd_barang = $_POST['kd_barang'];
$nm_barang = $_POST['nm_barang'];
$satuan = $_POST['satuan'];
$harga_beli = $_POST['harga_beli'];
$harga_jual = $_POST['harga_jual'];
$sql = "UPDATE barang SET nm_barang ='$nm_barang', satuan = '$satuan',
harga_beli = '$harga_beli', harga_jual = '$harga_jual' WHERE kd_karyawan ='$kd_karyawan'";

mysqli_query($conn, $sql);
