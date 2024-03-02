<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Tambah Permintaan</title>
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" />
    <link href="css/sb-admin-2.min.css" rel="stylesheet" />
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" />
</head>

<body id="page-top">
    <div id="wrapper">
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <div class="container-fluid">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h3 class="m-0 font-weight-bold text-dark">Tambah Permintaan</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-4">
                                    <div class="form-group row">
                                        <label for="tgl" class="col-md-4 col-form-label">Tanggal</label>
                                        <div class="col-md-8">
                                            <input id="tgl" type="date" class="form-control" value="<?php echo date('Y-m-d'); ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="konsumen" class="col-md-4 col-form-label">Konsumen</label>
                                        <div class="col-md-8">
                                            <input type="text" id="konsumen" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="table-responsive mt-4">
                                <table class="table table-striped table-bordered">
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
                                        <!-- Isi tabel akan di-generate melalui JavaScript -->
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th colspan="5">Total</th>
                                            <th colspan="2" id="total">0</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <div class="mt-4">
                                <button class="btn btn-primary mr-2 font-weight-bold" id="save_detail">Save</button>
                                <button class="btn btn-secondary font-weight-bold" id="cancel_detail">Cancel</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="js/sb-admin-2.min.js"></script>
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <script src="js/demo/datatables-demo.js"></script>
    <script>
        $(document).ready(function() {
            let grandTotal = 0;

            $("#save").click(function() {
                let kode = $("#kodebrg").val();
                let nama = $("#namabrg").val();
                let satuan = $("#satuanbrg").val();
                let harga = $("#hargabrg").val();
                let jumlah = $("#jmlbrg").val();
                let total = Number(harga) * Number(jumlah);

                $("#tbody").append(
                    "<tr><td>" +
                    kode + "</td><td>" +
                    nama + "</td><td>" +
                    satuan + "</td><td>" +
                    harga + "</td><td>" +
                    jumlah + "</td><td>" +
                    total +
                    '</td><td><button background class="remove btn btn-success">x</button></tr>'
                );

                updateGrandTotal();
                reset();
            });

            $("#tbody").on("click", ".remove", function() {
                $(this).closest("tr").remove();
                updateGrandTotal();
            });

            $("#tbodypilih").on("click", ".tambahpilih", function() {
                var currentRow = $(this).closest("tr");
                $("#kodebrg").val(currentRow.find("td:eq(0)").text());
                $("#namabrg").val(currentRow.find("td:eq(1)").text());
                $("#satuanbrg").val(currentRow.find("td:eq(2)").text());
                $("#hargabrg").val(currentRow.find("td:eq(3)").text());
                $("#jmlbrg").val("1");
            });

            $("#save_detail").click(function() {
                let kodeper1 = <?php echo date('YmdHis'); ?>;
                let tanggal1 = $("#tgl").val();
                let konsumen1 = $("#konsumen").val();
                let karyawan1 = $("#karyawan").val();
                let telp1 = $("#telp").val();
                let alamat1 = $("#alamat").val();
                let keterangan1 = $("#keterangan").val();
                let total1 = $("#total").text();

                $("#tbody tr").each(function() {
                    let currentRow = $(this);
                    let kodebr1 = currentRow.find("td:eq(0)").text();
                    let hargajual1 = currentRow.find("td:eq(3)").text();
                    let jumlah1 = currentRow.find("td:eq(4)").text();
                    $.post("permintaan/simpan-detail-permintaan.php", {
                        kd_permintaan: kodeper1,
                        kd_barang: kodebr1,
                        harga_jual: hargajual1,
                        jumlah: jumlah1
                    });
                });

                $.post("permintaan/simpan-master-permintaan.php", {
                    kd_permintaan: kodeper1,
                    tgl: tanggal1,
                    konsumen: konsumen1,
                    telp: telp1,
                    alamat: alamat1,
                    keterangan: keterangan1,
                    kd_karyawan: karyawan1,
                    total: total1
                }, function(data, status) {
                    alert("sukses");
                    $('#isi').load("permintaan/tabel-permintaan.php");
                });
            });

            function updateGrandTotal() {
                grandTotal = 0;
                $("#tbody tr").each(function() {
                    grandTotal += Number($(this).find("td:eq(5)").text());
                });
                $("#total").text(grandTotal);
            }

            function reset() {
                $("#kodebrg").val("");
                $("#namabrg").val("");
                $("#satuanbrg").val("");
                $("#hargabrg").val("");
                $("#jmlbrg").val("");
            }
        });
    </script>
</body>

</html>