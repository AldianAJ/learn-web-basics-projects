<?php
include 'koneksi.php';

$kd_supplier = $_POST['kd_supplier'];
$nm_sales = $_POST['nm_sales'];
$perusahaan = $_POST['perusahaan'];
$telp_sales = $_POST['telp_sales'];
$telp_kantor = $_POST['telp_kantor'];

$sql = "UPDATE supplier 
        SET nm_sales ='$nm_sales',
            perusahaan = '$perusahaan',
            telp_sales = '$telp_sales',
            telp_kantor = '$telp_kantor' 
        WHERE kd_supplier ='$kd_supplier'";

mysqli_query($conn, $sql);
