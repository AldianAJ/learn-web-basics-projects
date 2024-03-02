<?php
include 'koneksi.php';
$sql = "SELECT * FROM permintaan";
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
    <title>Permintaan</title>
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
                <div class="row">
                        <div class="col-6">
                            <h2 class="font-weight-bold text-dark">Permintaan</h2>
                        </div>
                        <div class="col-6 text-right">
                            <button class="btn btn-primary font-weight-bold" id="btnTambahPermintaan" data-toggle="modal" data-target="#staticBackdrop">Tambah Permintaan</button>
                        </div>
                    </div>
                    <div class="shadow mb-4">                        
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="myTable" width="100%" cellspacing="0">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>Kode</th>
                                            <th>Tanggal</th>
                                            <th>Nama Konsumen</th>
                                            <th>Nama Karyawan</th>
                                            <th>Total</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tbody">
                                        <?php
                                        // Pisahkan logika PHP dan HTML di sini
                                        if (mysqli_num_rows($hasil) > 0) {
                                            while ($isi = mysqli_fetch_assoc($hasil)) {
                                                echo '<tr>
                                                    <td>' . $isi["kd_permintaan"] . '</td>
                                                    <td>' . $isi["tgl"] . '</td>
                                                    <td>' . $isi["konsumen"] . '</td>
                                                    <td>' . $isi["kd_karyawan"] . '</td>
                                                    <td>' . $isi["total"] . '</td>
                                                    <td><button class="btnViewPermintaan btn btn-secondary">View</button></td>
                                                </tr>';
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
        console.log("ini index");
        $(document).ready(function() {
            $('#btnTambahPermintaan').click(function() {
                $('#isi').load("permintaan/tambah-permintaan.php");
            });

            var jumlah = 0;
            var total = 0;
            $("#myTable tr:gt(0)").each(function() {
                jumlah += Number($(this).find("td:eq(5)").text());
                total += Number($(this).find("td:eq(4)").text());
            });
            $("#totalPermintaan").text(jumlah);
            $("#totalItem").text(total);
        });

        $("#myTable").on("click", ".btnViewPermintaan", function() {
            let kd_permintaan = $(this).closest("tr").find("td:eq(0)").text();
            $('#isi').load("permintaan/detail-permintaan.php?kd_permintaan=" + kd_permintaan);
        });
    </script>
</body>

</html>