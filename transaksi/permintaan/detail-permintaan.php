<?php
include 'koneksi.php';
$kd_permintaan = $_GET['kd_permintaan'];

$sql = "SELECT * FROM permintaan WHERE kd_permintaan = $kd_permintaan";
$hasil = mysqli_query($conn, $sql);
if ($hasil && mysqli_num_rows($hasil) > 0) {
    $isi = mysqli_fetch_assoc($hasil);
    extract($isi); // Extracting array values to variables

    // Retrieving values from permintaan table
    $tgl = $isi["tgl"];
    $konsumen = $isi["konsumen"];
    $telp = $isi["telp"];
    $alamat = $isi["alamat"];
    $keterangan = $isi["keterangan"];
    $kd_karyawan = $isi["kd_karyawan"];
    $total = $isi["total"];

    // Fetching detail_permintaan
    $sql_detail = "SELECT * FROM detail_permintaan
                JOIN barang ON barang.kd_barang = detail_permintaan.kd_barang
                WHERE kd_permintaan = $kd_permintaan";
    $hasil_detail = mysqli_query($conn, $sql_detail);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Detail Permintaan</title>
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
</head>

<body id="page-top">
    <div id="wrapper">
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <div class="container-fluid">
                    <div class="shadow mb-4">
                        <div class="card-header py-3">
                            <div class="row p-3 flex justify-content-between">
                                <h3 class="m-0 font-weight-bold text-primary">Detail Permintaan</h3>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" width="100%" cellspacing="0">
                                    <tbody>
                                        <tr>
                                            <th>Kode :</th>
                                            <td><?php echo $kd_permintaan; ?></td>
                                            <th>Tanggal :</th>
                                            <td><?php echo date("d-m-Y", strtotime($tgl)); ?></td>
                                        </tr>
                                        <tr>
                                            <th>Karyawan :</th>
                                            <td><?php echo $kd_karyawan; ?></td>
                                            <th>Konsumen :</th>
                                            <td><?php echo $konsumen; ?></td>
                                        </tr>
                                        <tr>
                                            <th colspan="1">Telephone :</th>
                                            <td colspan="3"><?php echo $telp; ?></td>
                                        </tr>
                                        <tr>
                                            <th colspan="1">Alamat :</th>
                                            <td colspan="3"><?php echo $alamat; ?></td>
                                        </tr>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th colspan="1">Keterangan :</th>
                                            <td colspan="3"><?php echo $keterangan; ?></td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <br><br>
                            <table class="table table-bordered" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Kode</th>
                                        <th>Nama</th>
                                        <th>Satuan</th>
                                        <th>Harga</th>
                                        <th>Jumlah</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody id="tbodyDetailTransaksi">
                                    <?php
                                    if (mysqli_num_rows($hasil_detail) > 0) {
                                        while ($isi_detail = mysqli_fetch_assoc($hasil_detail)) {
                                            echo '<tr>
                                                <td>' . $isi_detail["kd_barang"] . '</td>
                                                <td>' . $isi_detail["nm_barang"] . '</td>
                                                <td>' . $isi_detail["satuan"] . '</td>
                                                <td>' . $isi_detail["harga_jual"] . '</td>
                                                <td>' . $isi_detail["jumlah"] . '</td>
                                                <td>' . ($isi_detail["jumlah"] * $isi_detail["harga_jual"]) . '</td>
                                            </tr>';
                                        }
                                    }
                                    ?>
                                    <tr>
                                        <td colspan="5" align="center"><b>Total</b></td>
                                        <td><b><?php echo $total; ?></b></td>
                                    </tr>
                                </tbody>
                            </table>
                            <br><br>
                            <button class="btn btn-secondary" id="closePermintaan">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Tombol untuk scroll ke atas -->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Modal untuk konfirmasi logout -->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Are you sure you want to logout and end your current session?</div>
                <div class="modal-footer">
                    <!-- Tombol untuk membatalkan logout -->
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <!-- Tombol untuk logout -->
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="js/sb-admin-2.min.js"></script>
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <script src="js/demo/datatables-demo.js"></script>
    <script>
        $(document).ready(function() {
            $('#closePermintaan').click(function() {
                $('#isi').load("permintaan/tabel-permintaan.php");
            });

            let subtotal = 0;
            let grandTotal = 0;

            $("#tbodyDetailTransaksi tr").each(function() {
                let currentRow = $(this);
                subtotal = Number(currentRow.find("td:eq(3)").text()) * Number(currentRow.find("td:eq(4)").text());
                currentRow.find("td:eq(5)").text(subtotal);
                grandTotal += subtotal;
            });

            $("#totalAkhir").text(grandTotal);
        });
    </script>
</body>

</html>