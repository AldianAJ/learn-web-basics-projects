<?php
include 'koneksi.php';
$kd_karyawan = $_POST['kd_karyawan'];
$nm_karyawan = $_POST['nm_karyawan'];
$jabatan = $_POST['jabatan'];
$telp = $_POST['telp'];
$sql = "INSERT INTO karyawan VALUES('$kd_karyawan','$nm_karyawan','$jabatan','$telp')";
mysqli_query($conn, $sql);
