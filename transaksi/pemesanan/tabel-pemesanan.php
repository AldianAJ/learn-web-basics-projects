<?php
include 'koneksi.php';
$sql = "SELECT * FROM pemesanan";
$hasil = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Tabel Pemesanan</title>

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

                    <!-- Page Headings-->
                    <div class="row">
                        <div class="col-6">
                            <h2 class="font-weight-bold text-dark">Pemesanan</h2>
                        </div>
                        <div class="col-6 text-right">
                            <button class="btn btn-primary font-weight-bold" id="btnTambahPemesanan" data-toggle="modal" data-target="#staticBackdrop">Tambah Pemesanan</button>
                        </div>
                    </div>

                    <!-- DataTales Example -->
                    <div class="shadow mb-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="myTable" width="100%" cellspacing="0">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th>Kode Pemesanan</th>
                                                <th>Tanggal</th>
                                                <th>Nama Sales</th>
                                                <th>Nama Karyawan</th>
                                                <th>Total</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody id="tbody">
                                            <!-- PHP Loop to Populate Table Rows -->
                                            <?php
                                            if (mysqli_num_rows($hasil) > 0) {
                                                while ($isi = mysqli_fetch_assoc($hasil)) {
                                                    echo '<tr>';
                                                    echo '<td>' . $isi["kd_pemesanan"] . '</td>';
                                                    echo '<td>' . $isi["tgl"] . '</td>';
                                                    echo '<td>' . $isi["kd_supplier"] . '</td>';
                                                    echo '<td>' . $isi["kd_karyawan"] . '</td>';
                                                    echo '<td>' . $isi["total"] . '</td>';
                                                    echo '<td><button class="btnViewPemesanan btn btn-secondary font-weight-bold">View</button></td>';
                                                    echo '</tr>';
                                                }
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
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
        console.log("ini index");

        $(document).ready(function() {
            // Tambah Pemesanan
            $('#btnTambahPemesanan').click(function() {
                $('#isi').load("pemesanan/tambah-pemesanan.php");
            });

            console.log("masuk di fungsi hitung total pemesanan");
            // Hitung total pemesanan dan total item
            var totalPemesanan = 0;
            var totalItem = 0;

            $("#myTable tr").each(function() {
                var $row = $(this);
                var total = parseFloat($row.find("td:eq(5)").text());
                var itemTotal = parseFloat($row.find("td:eq(4)").text());

                if (!isNaN(total)) totalPemesanan += total;
                if (!isNaN(itemTotal)) totalItem += itemTotal;
            });

            $("#totalPemesanan").text(totalPemesanan);
            $("#totalItem").text(totalItem);
        });

        $("#myTable").on("click", ".btnViewPemesanan", function() {
            var kd_pemesanan = $(this).closest("tr").find("td:eq(0)").text();
            $('#isi').load("pemesanan/detail-pemesanan.php?kd_pemesanan=" + kd_pemesanan);
        });
    </script>

</body>

</html>