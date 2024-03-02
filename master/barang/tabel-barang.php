<?php
include 'koneksi.php';
$sql = "SELECT * FROM barang";
$total_harga_beli = 0;
$total_harga_jual = 0;
$hasil = mysqli_query($conn, $sql);
?>

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
                                    <h3 class="m-0 font-weight-bold text-dark">Barang</h3>
                                    <button type="button" class="btn btn-primary font-weight-bold" id="btnTambahBarang" data-bs-toggle="modal" data-bs-target="#modalAddBarang">Tambah Barang</button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered text-dark" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Kode</th>
                                                <th>Nama</th>
                                                <th>Satuan</th>
                                                <th>Harga Beli</th>
                                                <th>Harga Jual</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody id="tbody">
                                            <?php
                                            while ($row = mysqli_fetch_assoc($hasil)) {
                                                // Tambahkan nilai harga beli dan harga jual ke total
                                                $total_harga_beli += $row['harga_beli'];
                                                $total_harga_jual += $row['harga_jual'];
                                            ?>
                                                <tr>
                                                    <td><?php echo $row['kd_barang']; ?></td>
                                                    <td><?php echo $row['nm_barang']; ?></td>
                                                    <td><?php echo $row['satuan']; ?></td>
                                                    <td><?php echo $row['harga_beli']; ?></td>
                                                    <td><?php echo $row['harga_jual']; ?></td>
                                                    <td><button class="btn btn-primary btnUpdateBarang font-weight-bold m-2" data-bs-toggle="modal" data-bs-target="#ModalUpdateBarang" data-kode="<?php echo $row['kd_barang']; ?>">Edit</button><button class="btn btn-danger btnDeleteBarang font-weight-bold" data-kode="<?php echo $row['kd_barang']; ?>">Delete</button>
                                                    </td>
                                                </tr>
                                            <?php
                                            }
                                            ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td colspan="3" class="text-center font-weight-bold">Total</td>
                                                <td><b><?php echo number_format($total_harga_beli, 0, ",", ".") ?></b></td>
                                                <td><b><?php echo number_format($total_harga_jual, 0, ",", ".") ?></b></td>
                                            </tr>
                                            <tr>
                                                <td colspan="3" class="text-center font-weight-bold">Keuntungan</td>
                                                <td colspan="2" class="text-center font-weight-bold"><?php echo number_format($total_harga_jual - $total_harga_beli, 0, ",", ".") ?></td>
                                            </tr>
                                        </tfoot>
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

    <!-- Modal Tambah Barang-->
    <div class="modal fade" id="modalAddBarang" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalAddBarangLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title text-dark font-weight-bold" id="modalAddBarangLabel">Tambah Barang</h2>
                </div>
                <div class="modal-body">
                    <form target="_blank" method="post" autocomplete="on" id="formBarang">
                        <div class="mb-3">
                            <label for="kode_barang" class="form-label">Kode:</label>
                            <input type="text" id="add_kode_barang" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="nama_barang" class="form-label">Nama:</label>
                            <input type="text" id="add_nama_barang" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="satuan" class="form-label">Satuan:</label>
                            <input type="text" id="add_satuan" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="harga_beli" class="form-label">Harga Beli:</label>
                            <input type="text" id="add_harga_beli" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="harga_jual" class="form-label">Harga Jual:</label>
                            <input type="text" id="add_harga_jual" class="form-control">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary font-weight-bold" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary font-weight-bold" data-bs-dismiss="modal" id="save">Save</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
    <!-- Modal Update Karyawan-->
    <div class="modal fade" id="ModalUpdateBarang" tabindex="-1" aria-labelledby="modalUpdateBarangLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title" id="modalUpdateBarangLabel">Ubah Barang</h2>
                </div>
                <div class="modal-body">
                    <form id="formBarang" autocomplete="on">
                        <div class="mb-3">
                            <label for="update_kode_barang" class="form-label">Kode:</label>
                            <input type="text" id="update_kode_barang" readonly class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="update_nama_barang" class="form-label">Nama:</label>
                            <input type="text" id="update_nama_barang" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="update_satuan" class="form-label">Satuan:</label>
                            <input type="text" id="update_satuan" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="update_harga_beli" class="form-label">Harga Beli:</label>
                            <input type="text" id="update_harga_beli" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="update_harga_jual" class="form-label">Harga Jual:</label>
                            <input type="text" id="update_harga_jual" class="form-control">
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

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>
    <script>
        $(document).ready(function() {
            // Save button click event
            $('#save').click(function() {
                var kb = $('#add_kode_barang').val();
                var nb = $('#add_nama_barang').val();
                var sb = $('#add_satuan').val();
                var hb = $('#add_harga_beli').val();
                var hj = $('#add_harga_jual').val();
                $.post("barang/simpan-barang.php", {
                    kd_barang: kb,
                    nm_barang: nb,
                    satuan: sb,
                    harga_beli: hb,
                    harga_jual: hj
                }, function(data, status) {
                    alert("Data saved successfully");
                    $('#isi').load("barang/tabel-barang.php");
                });
            });

            // Update button click event
            $('#update').click(function() {
                var kb = $('#update_kode_barang').val();
                var nb = $('#update_nama_barang').val();
                var sb = $('#update_satuan').val();
                var hb = $('#update_harga_beli').val();
                var hj = $('#update_harga_jual').val();
                $.post("barang/ubah-barang.php", {
                    kd_barang: kb,
                    nm_barang: nb,
                    satuan: sb,
                    harga_beli: hb,
                    harga_jual: hj
                }, function(data, status) {
                    alert("Data updated successfully");
                    $('#isi').load("barang/tabel-barang.php");
                });
            });

            $(document).ready(function() {
                $('.btnDeleteBarang').click(function() {
                    var kb = $(this).data('kode'); // Mendapatkan kode karyawan dari atribut data

                    // Mengirim permintaan AJAX untuk menghapus karyawan
                    $.post("barang/hapus-barang.php", {
                        kd_barang: kb
                    }, function(data, status) {
                        alert("Data deleted successfully");
                        $('#isi').load("barang/tabel-barang.php"); // Memuat ulang tabel karyawan setelah penghapusan
                    });

                });
            });


            // Update employee details
            $("#dataTable").on("click", ".btnUpdateBarang", function() {
                let closestTR = $(this).closest("tr").children();
                $("#update_kode_barang").val(closestTR.eq(0).text());
                $("#update_nama_barang").val(closestTR.eq(1).text());
                $("#update_satuan").val(closestTR.eq(2).text());
                $("#update_harga_beli").val(closestTR.eq(3).text());
                $("#update_harga_jual").val(closestTR.eq(4).text());
            });
        });
    </script>
</body>