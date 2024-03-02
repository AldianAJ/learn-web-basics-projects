<?php
include 'koneksi.php';

$kd_karyawan = $_POST['kd_barang'];
$sql = "DELETE FROM barang WHERE kd_barang ='" . $kd_barang . "'";
mysqli_query($conn, $sql);