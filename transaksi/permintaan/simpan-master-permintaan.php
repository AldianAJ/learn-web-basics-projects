<?php
include 'koneksi.php';
$kd_permintaan = $_POST['kd_permintaan'];
$tgl = $_POST['tgl'];
$konsumen = $_POST['konsumen'];
$telp = $_POST['telp'];
$alamat = $_POST['alamat'];
$keterangan = $_POST['keterangan'];
$kd_karyawan = $_POST['kd_karyawan'];
$total = $_POST['total'];
$sql = "INSERT INTO permintaan VALUES
('$kd_permintaan','$tgl','$konsumen','$telp','$alamat','$keterangan','$kd_karyawan',$total)";
mysqli_query($conn, $sql);
