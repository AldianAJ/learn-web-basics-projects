<?php
include 'koneksi.php';
$kd_pemesanan = $_POST['kd_pemesanan'];
$tgl = $_POST['tgl'];
$kd_karyawan = $_POST['kd_karyawan'];
$kd_supplier = $_POST['kd_supplier'];
$keterangan = $_POST['keterangan'];
$total = $_POST['total'];
$sql = "INSERT INTO pemesanan VALUES
('$kd_pemesanan','$tgl','$kd_karyawan','$kd_supplier','$keterangan',$total)";
mysqli_query($conn, $sql);



