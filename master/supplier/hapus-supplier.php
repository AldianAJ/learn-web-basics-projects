<?php
include 'koneksi.php';

$kd_supplier = $_POST['kd_supplier'];
$sql = "DELETE FROM supplier WHERE kd_supplier ='".$kd_supplier."'";
mysqli_query($conn,$sql);