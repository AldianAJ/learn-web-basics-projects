<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>Tambah Pemesanan</title>
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script> -->
    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" />

    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet" />

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" />

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
                    <div class="shadow mb-4">
                        <div class="card-header py-3">
                            <div class="row p-3 flex justify-content-between">
                                <h3 class="m-0 font-weight-bold text-dark">Tambah Pemesanan</h3>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <!-- Tambah Pemesanan-->
                                <div class="modal-body">
                                    <!-- INPUT PEMESANAN -->
                                    <div class="row p-0" id="formPemesanan">
                                        <div class="col-lg-6">
                                            <div class="form-group mb-2">
                                                <label for="tgl" class="col-md-4 col-form-label">Tanggal</label>
                                                <div class="col-md-6">
                                                    <input id="tgl" type="date" class="form-control" value="<?php echo date('Y-m-d'); ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-8">
                                            <div class="form-group mb-2">
                                                <label for="supplier" class="col-md-4 col-form-label">Supplier</label>
                                                <div class="col-md-6">
                                                    <select class="form-select" id="supplier" aria-label="Pilih Supplier">
                                                        <option value="" selected disabled>Pilih Supplier</option>
                                                        <?php
                                                        include 'koneksi.php';
                                                        $sql = "SELECT * FROM supplier";
                                                        $hasil = mysqli_query($conn, $sql);
                                                        if (mysqli_num_rows($hasil) > 0) {
                                                            while ($isi = mysqli_fetch_assoc($hasil)) {
                                                                echo '<option value="' . $isi["kd_supplier"] . '">' . $isi["nm_sales"] . '</option>';
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group mb-2">
                                                <label for="karyawan" class="col-md-4 col-form-label">Karyawan</label>
                                                <div class="col-md-6">
                                                    <select class="form-select" id="karyawan" aria-label="Pilih Karyawan">
                                                        <option value="" selected disabled>Pilih Karyawan</option>
                                                        <?php
                                                        include 'koneksi.php';
                                                        $sql = "SELECT * FROM karyawan";
                                                        $hasil = mysqli_query($conn, $sql);
                                                        if (mysqli_num_rows($hasil) > 0) {
                                                            while ($isi = mysqli_fetch_assoc($hasil)) {
                                                                echo '<option value="' . $isi["kd_karyawan"] . '">' . $isi["nm_karyawan"] . '</option>';
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-8">
                                                <div class="form-group mb-2">
                                                    <label for="keterangan" class="col-md-4 col-form-label p-0">Keterangan</label>
                                                    <input type="text" class="form-control" id="keterangan">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <!-- INPUT KODE BARANG PESAN -->
                                    <div id="formPemesanan">
                                        <div class="input-group mb-3">
                                            <input id="kodebrg" type="text" class="form-control" data-bs-toggle="modal" data-bs-target="#modalKodeBarang" placeholder="Kode" readonly>
                                            <input id="namabrg" type="text" class="form-control" placeholder="Nama" readonly>
                                            <input id="satuanbrg" type="text" class="form-control" placeholder="Satuan" readonly>
                                            <input id="hargabrg" type="text" class="form-control" placeholder="Harga" readonly>
                                            <input id="jmlbrg" type="text" class="form-control" placeholder="Jumlah">
                                            <button type="button" id="save" class="btn btn-primary font-weight-bold ml-2">Add</button>
                                        </div>
                                    </div>
                                    <!-- TABEL PEMESANAN -->
                                    <div class="table-responsive">
                                        <table class="table table-striped">
                                            <thead class="thead-dark">
                                                <tr>
                                                    <th scope="col">Kode</th>
                                                    <th scope="col">Nama</th>
                                                    <th scope="col">Satuan</th>
                                                    <th scope="col">Harga</th>
                                                    <th scope="col">Jumlah</th>
                                                    <th scope="col">Total</th>
                                                    <th scope="col">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody id="tbody">
                                                <!-- Table content will be dynamically generated here -->
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th colspan="5">Total</th>
                                                    <th colspan="2" id="total">0</th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                    <div class="mt-3">
                                        <button class="btn btn-primary font-weight-bold" id="save_detail">Save</button>
                                        <button class="btn btn-secondary font-weight-bold" id="cancel_detail">Cancel</button>
                                    </div>
                                    <!----------------------->
                                    <!-- ---------------------------- -->
                                </div>
                            </div>
                        </div>
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
            <!-- Modal Tambah Barang-->
            <div class="modal fade" id="modalAddBarang" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalAddBarangLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalAddBarangLabel">Tambah Barang</h5>
                        </div>
                        <div class="modal-body">
                            <form id="formBarang">
                                <div class="mb-3">
                                    <label for="add_kode" class="form-label">Kode:</label>
                                    <input type="text" id="add_kode" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="add_nama" class="form-label">Nama:</label>
                                    <input type="text" id="add_nama" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="add_satuan" class="form-label">Satuan:</label>
                                    <input type="text" id="add_satuan" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="add_harga" class="form-label">Harga:</label>
                                    <input type="text" id="add_harga" class="form-control">
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary font-weight-bold" id="saveNewBarang">Save</button>
                            <button type="button" class="btn btn-secondary font-weight-bold" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- ---------------------------- -->

            <!-- Modal Pilih Kode Tambah Pemesanan-->
            <div class="modal fade" id="modalKodeBarang" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalAddBarang" aria-hidden="true">
                <div class="modal-dialog modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h2 class="modal-title text-dark font-weight-bold">Daftar Barang</h2>
                        </div>
                        <div class="modal-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="tabelDaftarBarang">
                                    <thead>
                                        <tr>
                                            <th>Kode</th>
                                            <th>Nama</th>
                                            <th>Satuan</th>
                                            <th>Harga</th>
                                            <th>Pilih</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tbody">
                                        <?php
                                        if (mysqli_num_rows($hasil) > 0) {
                                            while ($isi = mysqli_fetch_assoc($hasil)) {
                                                echo '<tr>';
                                                echo '<td>' . $isi["kd_barang"] . '</td>';
                                                echo '<td>' . $isi["nm_barang"] . '</td>';
                                                echo '<td>' . $isi["satuan"] . '</td>';
                                                echo '<td>' . $isi["harga_beli"] . '</td>';
                                                echo '<td align="center">';
                                                echo '<button id="' . $isi["kd_barang"] . '" class="tambahpilih btn btn-success" data-bs-dismiss="modal">✓</button>';
                                                echo '</td>';
                                                echo '</tr>';
                                            }
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- ---------------------------- -->

            <!-- Modal Update Barang-->
            <div class="modal fade" id="ModalUpdateBarang" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h2 class="modal-title fs-5" id="staticBackdropLabel">Ubah Barang</h2>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div id="formBarang">
                                <form action="tugas1tabelbarang.html" target="_blank" method="post" autocomplete="on">
                                    <div class="mb-3">
                                        <label for="kode" class="form-label">Kode:</label>
                                        <input type="text" id="kodebrg" class="form-control" readonly>
                                    </div>
                                    <div class="mb-3">
                                        <label for="nama" class="form-label">Nama:</label>
                                        <input type="text" id="namabrg" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label for="satuan" class="form-label">Satuan:</label>
                                        <input type="text" id="satuanbrg" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label for="harga" class="form-label">Harga:</label>
                                        <input type="text" id="hargabrg" class="form-control">
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button class="btnHapusBarang btn btn-danger" data-bs-toggle="modal" data-bs-target="#ModalHapusBarang" data-kode="M001">Delete</button>
                            <button type="button" class="btn btn-primary" data-bs-dismiss="modal" name="update" id="update">Update</button>
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
                    let kode = generateCode();
                    $("#kodetransaksi").val(kode);

                    $("#tabelDaftarBarang").on("click", ".btnPilihgBrg", function() {
                        let closestTR = $(this).closest("tr").children();
                        $("#kodebrg, #namabrg, #satuanbrg, #hargabrg").val(closestTR.eq(0).text(), closestTR.eq(1).text(), closestTR.eq(2).text(), closestTR.eq(3).text());
                    });

                    $("#save").click(function() {
                        let harga = parseFloat($("#hargabrg").val());
                        let jumlah = parseFloat($("#jmlbrg").val());
                        let subTotal = harga * jumlah;

                        $("#tbody").append(
                            `<tr>
                <td>${$("#kodebrg").val()}</td>
                <td>${$("#namabrg").val()}</td>
                <td>${$("#satuanbrg").val()}</td>
                <td>${harga}</td>
                <td>${jumlah}</td>
                <td>${subTotal}</td>
                <td><button class="remove btn btn-success">x</button></td>
                            </tr>`
                        );

                        updateTotal();
                        reset();
                    });

                    $("#tbody").on("click", ".remove", function() {
                        $(this).closest("tr").remove();
                        updateTotal();
                    });

                    $("#tbodypilih").on("click", ".tambahpilih", function() {
                        let currentRow = $(this).closest("tr");
                        $("#kodebrg, #namabrg, #satuanbrg, #hargabrg").val(currentRow.find("td:eq(0)").text(), currentRow.find("td:eq(1)").text(), currentRow.find("td:eq(2)").text(), currentRow.find("td:eq(3)").text());
                        $("#jmlbrg").val("1");
                    });

                    $("#save_detail").click(function() {
                        let kodepesan1 = Date.now();
                        let tanggal1 = $("#tgl").val();
                        let supplier1 = $("#supplier").val();
                        let karyawan1 = $("#karyawan").val();
                        let keterangan1 = $("#keterangan").val();
                        let total1 = $("#total").text();

                        $("#tbody tr").each(function() {
                            let currentRow = $(this);
                            let kodebr1 = currentRow.find("td:eq(0)").text();
                            let hargabeli1 = currentRow.find("td:eq(3)").text();
                            let jumlah1 = currentRow.find("td:eq(4)").text();

                            $.post("pemesanan/simpan-detail-pemesanan.php", {
                                kd_pemesanan: kodepesan1,
                                kd_barang: kodebr1,
                                harga_beli: hargabeli1,
                                jumlah: jumlah1
                            });
                        });

                        $.post("pemesanan/simpan-master-pemesanan.php", {
                            kd_pemesanan: kodepesan1,
                            tgl: tanggal1,
                            kd_supplier: supplier1,
                            kd_karyawan: karyawan1,
                            keterangan: keterangan1,
                            total: total1
                        }, function(data, status) {
                            alert("sukses");
                            $('#isi').load("pemesanan/tabel-pemesanan.php");
                        });
                    });
                });

                function reset() {
                    $("#kodebrg, #namabrg, #satuanbrg, #hargabrg, #jmlbrg").val("");
                }

                function updateTotal() {
                    let total = 0;
                    $("#tbody tr").each(function() {
                        total += parseFloat($(this).find("td:eq(5)").text());
                    });
                    $("#total").text(total);
                }
            </script>
</body>

</html>