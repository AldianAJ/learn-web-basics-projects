<?php
include 'koneksi.php';
$kd_karyawan = $_POST['kd_karyawan'];
$nm_karyawan = $_POST['nm_karyawan'];
$jabatan = $_POST['jabatan'];
$telp = $_POST['telp'];
$sql = "UPDATE karyawan SET nm_karyawan ='$nm_karyawan',jabatan = '$jabatan',
telp = '$telp' WHERE kd_karyawan ='$kd_karyawan'";

mysqli_query($conn, $sql);
