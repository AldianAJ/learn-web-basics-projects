<?php
include 'koneksi.php';
$sql = "SELECT * FROM supplier";
$hasil =  mysqli_query($conn, $sql);
?>

<body id="page-top">
    <div id="wrapper">
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <div class="container-fluid">
                    <div class="shadow mb-4">
                        <div class="card">
                            <div class="card-header py-3">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h3 class="m-0 font-weight-bold text-dark">Supplier</h3>
                                    <button type="button" class="btn btn-primary font-weight-bold" id="btnTambahSupplier" data-bs-toggle="modal" data-bs-target="#modalAddSupplier">Tambah</button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Kode</th>
                                                <th>Nama</th>
                                                <th>Perusahaan</th>
                                                <th>Telp Sales</th>
                                                <th>Telp Kantor</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody id="tbody">
                                            <?php
                                            while ($row = mysqli_fetch_assoc($hasil)) {
                                            ?>
                                                <tr>
                                                    <td><?php echo $row['kd_supplier']; ?></td>
                                                    <td><?php echo $row['nm_supplier']; ?></td>
                                                    <td><?php echo $row['perusahaan']; ?></td>
                                                    <td><?php echo $row['telp_sales']; ?></td>
                                                    <td><?php echo $row['telp_kantor']; ?></td>
                                                    <td><button class="btn btn-primary btnUpdateSupplier font-weight-bold m-2" data-bs-toggle="modal" data-bs-target="#ModalUpdateSupplier" data-kode="<?php echo $row['kd_supplier']; ?>">Edit</button><button class="btn btn-danger btnDeleteSupplier font-weight-bold" data-kode="<?php echo $row['kd_supplier']; ?>">Delete</button>
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

    <!-- Modal Tambah Supplier-->
    <div class="modal fade" id="modalAddSupplier" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalAddSupplier" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title text-dark font-weight-bold" id="staticBackdropLabel">Tambah Supplier</h2>
                </div>
                <div class="modal-body">
                    <div id="formSupplier">
                        <form target="_blank" method="post" autocomplete="on">
                            <label for="kode_supplier" class="form-label">Kode:</label>
                            <input type="text" id="add_kode_supplier" class="form-control"><br>
                            <label for="nama_sales" class="form-label">Nama Sales:</label>
                            <input type="text" id="add_nama_sales" class="form-control"><br>
                            <label for="perusahaan" class="form-label">Perusahaan:</label>
                            <input type="text" id="add_perusahaan" class="form-control"><br>
                            <label for="telp_sales" class="form-label">Telp Sales:</label>
                            <input type="text" id="add_telp_sales" class="form-control"><br>
                            <label for="telp_kantor" class="form-label">Telp Kantor:</label>
                            <input type="text" id="add_telp_kantor" class="form-control"><br>
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary font-weight-bold" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary font-weight-bold" data-bs-dismiss="modal" id="save">Save</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Update Karyawan-->
    <div class="modal fade" id="ModalUpdateSupplier" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title fs-5" id="staticBackdropLabel">Ubah Supplier</h2>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="formSupplier">
                        <form target="_blank" method="post" autocomplete="on">
                            <div>
                                <label for="kode_supplier" class="form-label">Kode:</label>
                                <input type="text" id="update_kode_supplier" readonly class="form-control"><br>
                            </div>
                            <label for="nama_sales" class="form-label">Nama Sales:</label>
                            <input type="text" id="update_nama_sales" class="form-control"><br>
                            <label for="perusahaan" class="form-label">Perusahaan:</label>
                            <input type="text" id="update_perusahaan" class="form-control"><br>
                            <label for="telp_sales" class="form-label">Telp Sales:</label>
                            <input type="text" id="update_telp_sales" class="form-control"><br>
                            <label for="telp_kantor" class="form-label">Telp Kantor:</label>
                            <input type="text" id="update_telp_kantor" class="form-control"><br>
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-success" data-bs-dismiss="modal" id="update">Update</button>
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