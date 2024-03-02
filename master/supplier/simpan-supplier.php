<?php
include 'koneksi.php';
$kd_supplier = $_POST['kd_supplier'] ;
$nm_sales = $_POST['nm_sales'] ;
$perusahaan = $_POST['perusahaan'] ;
$telp_sales = $_POST['telp_sales'] ;
$telp_kantor = $_POST['telp_kantor'] ; 
$sql = "INSERT INTO supplier VALUES('$kd_supplier','$nm_sales','$perusahaan','$telp_sales','$telp_kantor')";
mysqli_query($conn,$sql);