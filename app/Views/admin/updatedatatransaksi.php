<!DOCTYPE html>
<html lang="en">

<head>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-maskmoney/3.0.2/jquery.maskMoney.min.js"></script>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Update Data Transaksi</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row justify-content-center">
                    <div class="col-lg-7 my-auto">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Update Data Transaksi</h1>
                            </div>
                            <form class="user" method="POST" action="/admin/updatedatatransaksi">
                                <div class="form-group">
                                    <label for="jumlah_pinjaman">Jumlah Pinjaman</label>
                                    <input type="text" id="jumlah_pinjaman" name="jumlah_pinjaman" value="<?= $dataPelanggan['jumlah_pinjaman']; ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="potong_atas">Potong Atas</label>
                                    <input type="checkbox" id="potong_atas" name="potong_atas" <?= $dataPelanggan['potong_atas'] !== null && $dataPelanggan['potong_atas'] == 0 ? 'checked' : '' ?>>
                                </div>
                                <div class="form-group">
                                    <label for="jumlah_diterima">Jumlah Pinjaman Yang Diterima</label>
                                    <input type="text" id="jumlah_diterima" name="jumlah_diterima" value="<?= $dataPelanggan['jumlah_diterima']; ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="jumlah_dibayarkan">Jumlah Pinjaman Yang Perlu Dibayarkan</label>
                                    <input type="text" id="jumlah_dibayarkan" name="jumlah_dibayarkan" value="<?= $dataPelanggan['jumlah_dibayarkan']; ?>" readonly>
                                </div>
                                <div class="form-group mt-4">
                                    <label for="batas_pembayaran">Batas Akhir Pembayaran Pinjaman</label>
                                    <input type="date" class="form-control form-control-user" id="batas_pembayaran" name="batas_pembayaran" value="<?= $dataPelanggan['batas_pembayaran']; ?>">
                                </div>
                                <div class="form-group mt-4">
                                    <label for="status_transaksi">Status Transaksi Saat ini</label>
                                    <select class="form-control" id="status_transaksi" name="status_transaksi">
                                        <option value="gadai" <?= $dataPelanggan['status_transaksi'] == 'gadai' ? 'selected' : ''; ?>>Gadai</option>
                                        <option value="diperpanjang" <?= $dataPelanggan['status_transaksi'] == 'diperpanjang' ? 'selected' : ''; ?>>Diperpanjang</option>
                                        <option value="diperpanjang2" <?= $dataPelanggan['status_transaksi'] == 'diperpanjang2' ? 'selected' : ''; ?>>Diperpanjang 2</option>
                                        <option value="dilelang" <?= $dataPelanggan['status_transaksi'] == 'dilelang' ? 'selected' : ''; ?>>Dilelang</option>
                                        <option value="terjual" <?= $dataPelanggan['status_transaksi'] == 'terjual' ? 'selected' : ''; ?>>Terjual</option>
                                    </select>
                                </div>
                                <div class="form-group mt-4">
                                    <button type="submit" class="btn btn-primary btn-user btn-block">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</body>

<!-- Bootstrap core JavaScript-->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="js/sb-admin-2.min.js"></script>

<script>
    $(document).ready(function() {
        // Mendapatkan elemen input
        var jumlahPinjamanInput = $('#jumlah_pinjaman');
        var potongAtasCheckbox = $('#potong_atas');
        var jumlahDiterimaInput = $('#jumlah_diterima');
        var jumlahDibayarkanInput = $('#jumlah_dibayarkan');

        // Menambahkan event listener pada input jumlah pinjaman dan potong atas
        jumlahPinjamanInput.on('input', updateJumlahDiterima);
        potongAtasCheckbox.on('change', updateJumlahDiterima);

        // Fungsi untuk mengupdate jumlah pinjaman yang diterima dan jumlah pinjaman yang perlu dibayarkan
        function updateJumlahDiterima() {
            var jumlahPinjaman = parseFloat(jumlahPinjamanInput.val());
            var potongAtas = potongAtasCheckbox.is(':checked');
            var persentasePotongAtas = 0.1; // 10% dari jumlah pinjaman

            if (potongAtas) {
                var jumlahDiterima = jumlahPinjaman - (jumlahPinjaman * persentasePotongAtas);
                var jumlahDibayarkan = jumlahPinjaman;
            } else {
                var jumlahDiterima = jumlahPinjaman;
                var jumlahDibayarkan = jumlahPinjaman + (jumlahPinjaman * persentasePotongAtas);
            }

            // Mengupdate nilai input
            jumlahDiterimaInput.val(jumlahDiterima.toFixed(2));
            jumlahDibayarkanInput.val(jumlahDibayarkan.toFixed(2));
        }
    });
</script>

</html>