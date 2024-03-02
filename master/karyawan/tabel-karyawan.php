<?php
include 'koneksi.php';
$sql = "SELECT * FROM karyawan";
$hasil = mysqli_query($conn, $sql);
?>

<head>
    <link href="css/style.css" rel="stylesheet">
</head>


<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <div class="container-fluid">
                    <div class="shadow mb-4">
                        <div class="card">
                            <div class="card-header py-3">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h3 class="m-0 font-weight-bold text-dark">Karyawan</h3>
                                    <button type="button" class="btn btn-primary font-weight-bold" id="btnTambahKaryawan" data-bs-toggle="modal" data-bs-target="#ModalAddKaryawan">Tambah Karyawan</button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Kode</th>
                                                <th>Nama</th>
                                                <th>Jabatan</th>
                                                <th>Telp</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody id="tbody">
                                            <?php
                                            while ($row = mysqli_fetch_assoc($hasil)) {
                                            ?>
                                                <tr>
                                                    <td><?php echo $row['kd_karyawan']; ?></td>
                                                    <td><?php echo $row['nm_karyawan']; ?></td>
                                                    <td><?php echo $row['jabatan']; ?></td>
                                                    <td><?php echo $row['telp']; ?></td>
                                                    <td><button class="btn btn-primary btnUpdateKaryawan font-weight-bold m-2" data-bs-toggle="modal" data-bs-target="#ModalUpdateKaryawan" data-kode="<?php echo $row['kd_karyawan']; ?>">Edit</button><button class="btn btn-danger btnDeleteKaryawan font-weight-bold" data-kode="<?php echo $row['kd_karyawan']; ?>">Delete</button>
                                                    </td>
                                                </tr>
                                            <?php
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
    </div>


    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
    <!-- Modal Tambah Karyawan-->
    <div class="modal fade" id="ModalAddKaryawan" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalAddKaryawanLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title font-weight-bold" id="modalAddKaryawanLabel">Tambah Karyawan</h2>
                </div>
                <div class="modal-body">
                    <form id="formKaryawan" autocomplete="off">
                        <div class="mb-3">
                            <label for="add_kode_karyawan" class="form-label">Kode:</label>
                            <input type="text" id="add_kode_karyawan" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="add_nama_karyawan" class="form-label">Nama:</label>
                            <input type="text" id="add_nama_karyawan" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="add_jabatan" class="form-label">Jabatan:</label>
                            <input type="text" id="add_jabatan" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="add_telp" class="form-label">Telp:</label>
                            <input type="tel" id="add_telp" class="form-control" required>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary font-weight-bold" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary font-weight-bold" id="save">Save</button>
                </div>
            </div>
        </div>
    </div>



    <!-- ---------------------------- -->

    <!-- Modal Update Karyawan-->
    <div class="modal fade" id="ModalUpdateKaryawan" tabindex="-1" aria-labelledby="modalUpdateKaryawanLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title" id="modalUpdateKaryawanLabel">Ubah Karyawan</h2>
                </div>
                <div class="modal-body">
                    <form id="formKaryawan" autocomplete="on">
                        <div class="mb-3">
                            <label for="update_kode_karyawan" class="form-label">Kode:</label>
                            <input type="text" id="update_kode_karyawan" readonly class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="update_nama_karyawan" class="form-label">Nama:</label>
                            <input type="text" id="update_nama_karyawan" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="update_jabatan" class="form-label">Jabatan:</label>
                            <input type="text" id="update_jabatan" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="update_telp" class="form-label">Telp:</label>
                            <input type="text" id="update_telp" class="form-control">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-success" id="update">Update</button>
                </div>
            </div>
        </div>
    </div>




    <!-- ---------------------------- -->

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
            // Save button click event
            $('#save').click(function() {
                var kd = $('#add_kode_karyawan').val();
                var nm = $('#add_nama_karyawan').val();
                var jb = $('#add_jabatan').val();
                var tl = $('#add_telp').val();
                $.post("karyawan/simpan-karyawan.php", {
                    kd_karyawan: kd,
                    nm_karyawan: nm,
                    jabatan: jb,
                    telp: tl
                }, function(data, status) {
                    alert("Data saved successfully");
                    $('#isi').load("karyawan/tabel-karyawan.php");
                });
            });

            // Update button click event
            $('#update').click(function() {
                var kd = $('#update_kode_karyawan').val();
                var nm = $('#update_nama_karyawan').val();
                var jb = $('#update_jabatan').val();
                var tl = $('#update_telp').val();
                $.post("karyawan/ubah-karyawan.php", {
                    kd_karyawan: kd,
                    nm_karyawan: nm,
                    jabatan: jb,
                    telp: tl
                }, function(data, status) {
                    alert("Data updated successfully");
                    $('#isi').load("karyawan/tabel-karyawan.php");
                });
            });

            $(document).ready(function() {
                $('.btnDeleteKaryawan').click(function() {
                    var kd = $(this).data('kode'); // Mendapatkan kode karyawan dari atribut data

                    // Mengirim permintaan AJAX untuk menghapus karyawan
                    $.post("karyawan/hapus-karyawan.php", {
                        kd_karyawan: kd
                    }, function(data, status) {
                        alert("Data deleted successfully");
                        $('#isi').load("karyawan/tabel-karyawan.php"); // Memuat ulang tabel karyawan setelah penghapusan
                    });

                });
            });


            // Update employee details
            $("#dataTable").on("click", ".btnUpdateKaryawan", function() {
                let closestTR = $(this).closest("tr").children();
                $("#update_kode_karyawan").val(closestTR.eq(0).text());
                $("#update_nama_karyawan").val(closestTR.eq(1).text());
                $("#update_jabatan").val(closestTR.eq(2).text());
                $("#update_telp").val(closestTR.eq(3).text());
            });
        });
    </script>

</body>