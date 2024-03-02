<?php
include 'koneksi.php';

$kd_karyawan = $_POST['kd_karyawan'];
$sql = "DELETE FROM karyawan WHERE kd_karyawan ='" . $kd_karyawan . "'";
mysqli_query($conn, $sql);