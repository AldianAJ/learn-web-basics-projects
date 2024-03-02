<?php
include 'koneksi.php';
$kd_pemesanan = $_GET['kd_pemesanan'];

$sql = "SELECT * FROM pemesanan WHERE kd_pemesanan = $kd_pemesanan";
$hasil = mysqli_query($conn, $sql);
if ($hasil && mysqli_num_rows($hasil) > 0) {
    $isi = mysqli_fetch_assoc($hasil);
    extract($isi); // Extracting array values to variables

    // Retrieving values from pemesanan table
    $tgl = $isi["tgl"];
    $kd_supplier = $isi["kd_supplier"];
    $kd_karyawan = $isi["kd_karyawan"];
    $keterangan = $isi["keterangan"];
    $total = $isi["total"];

    // Fetching detail_pemesanan
    $sql_detail = "SELECT * FROM detail_pemesanan
                JOIN barang ON barang.kd_barang = detail_pemesanan.kd_barang
                WHERE kd_pemesanan = $kd_pemesanan";
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

    <title>Detail Pemesanan</title>

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Page Headings -->
                    <div class="shadow mb-4">
                        <div class="card-header py-3">
                            <div class="row p-3 flex justify-content-between">
                                <h3 class="m-0 font-weight-bold text-primary">Detail Permintaan</h3>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <tbody>
                                        <tr>
                                            <th>Kode :</th>
                                            <td><?php echo $kd_pemesanan; ?></td>
                                            <th>Tanggal :</th>
                                            <td><?php echo date("d-m-Y", strtotime($tgl)); ?></td>
                                        </tr>
                                        <tr>
                                            <th>Nama Sales :</th>
                                            <td><?php echo $kd_supplier; ?></td>
                                            <th>Nama Karyawan :</th>
                                            <td><?php echo $kd_karyawan; ?></td>
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
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
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
                                            echo '<tr>';
                                            echo '<td>' . $isi_detail["kd_barang"] . '</td>';
                                            echo '<td>' . $isi_detail["nm_barang"] . '</td>';
                                            echo '<td>' . $isi_detail["satuan"] . '</td>';
                                            echo '<td>' . $isi_detail["harga_beli"] . '</td>';
                                            echo '<td>' . $isi_detail["jumlah"] . '</td>';
                                            echo '<td>' . $isi_detail["jumlah"] * $isi_detail["harga_beli"] . '</td>';
                                            echo '</tr>';
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
                            <button class="btn btn-info" id="closePemesanan">Close</button>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- End of Main Content -->
        </div>
        <!-- End of Content Wrapper -->
    </div>

    <!-- End of Page Wrapper -->


    <!-- Scroll to Top Button-->
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


    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>

    <script>
        $(document).ready(function() {
            // CLOSE VIEW PEMESANAN
            $('#closePemesanan').click(function() {
                $('#isi').load("pemesanan/tabel-pemesanan.php");
            });

            // HITUNG SUB TOTAL DAN GRAND TOTAL
            let grandTotal = 0;

            $("#tbodyDetailTransaksi tr").each(function() {
                let currentRow = $(this);
                let subtotal = Number(currentRow.find("td:eq(3)").text()) * Number(currentRow.find("td:eq(4)").text());
                currentRow.find("td:eq(5)").text(subtotal);
                grandTotal += subtotal;
            });

            $("#totalAkhir").text(grandTotal);
        });
    </script>

</body>

</html>