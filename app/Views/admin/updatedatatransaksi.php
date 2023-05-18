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

    <title>SB Admin 2 - Register</title>

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
                            <form class="user">
                                <div class="form-group">
                                    <label for="jumlah_pinjaman">Jumlah Pinjaman</label>
                                    <input type="text" id="jumlah_pinjaman" name="jumlah_pinjaman" placeholder="Rp 0">
                                </div>
                                <div class="form-group">
                                    <label for="potong_atas">Potong Atas</label>
                                    <input type="checkbox" id="potong_atas" name="potong_atas">
                                </div>
                                <div class="form-group">
                                    <label for="jumlah_diterima">Jumlah Pinjaman Yang Diterima</label>
                                    <input type="text" id="jumlah_diterima" name="jumlah_diterima" placeholder="Rp 0" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="jumlah_dibayarkan">Jumlah Pinjaman Yang Perlu Dibayarkan</label>
                                    <input type="text" id="jumlah_dibayarkan" name="jumlah_dibayarkan" placeholder="Rp 0" readonly>
                                </div>
                                <div class="form-group mt-4">
                                    <label for="batas_pembayaran">Batas Akhir Pembayaran Pinjaman</label>
                                    <input type="date" class="form-control form-control-user" id="batas_pembayaran" name="batas_pembayaran" placeholder="Tanggal">
                                </div>
                                <div class="form-group mt-4">
                                    <label for="batas_pembayaran">Status Transaksi Saat ini</label>

                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Dropdown
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right animated--grow-in" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="#">Diperpanjang</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="#">Dilelang</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="#">Terjual</a>
                                    </div>

                                </div>
                                <div class="form-group mt-4">
                                    <a href="admin" class="btn btn-primary btn-user btn-block">
                                        Simpan
                                    </a>
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
    // Mendapatkan elemen input
    var jumlahPinjamanInput = document.getElementById('jumlah_pinjaman');
    var potongAtasCheckbox = document.getElementById('potong_atas');
    var jumlahDiterimaInput = document.getElementById('jumlah_diterima');
    var jumlahDibayarkanInput = document.getElementById('jumlah_dibayarkan');

    // Menambahkan event listener pada input jumlah pinjaman dan potong atas
    jumlahPinjamanInput.addEventListener('input', updateJumlahDiterima);
    potongAtasCheckbox.addEventListener('change', updateJumlahDiterima);

    // Fungsi untuk mengupdate jumlah pinjaman yang diterima dan jumlah pinjaman yang perlu dibayarkan
    function updateJumlahDiterima() {
        var jumlahPinjaman = parseFloat(jumlahPinjamanInput.value);
        var potongAtas = potongAtasCheckbox.checked;
        var persentasePotongAtas = 0.1; // 10% dari jumlah pinjaman

        if (potongAtas) {
            var jumlahDiterima = jumlahPinjaman - (jumlahPinjaman * persentasePotongAtas);
            var jumlahDibayarkan = jumlahPinjaman;
        } else {
            var jumlahDiterima = jumlahPinjaman;
            var jumlahDibayarkan = jumlahPinjaman + (jumlahPinjaman * persentasePotongAtas);
        }

        // Mengupdate nilai input
        jumlahDiterimaInput.value = jumlahDiterima.toFixed(2);
        jumlahDibayarkanInput.value = jumlahDibayarkan.toFixed(2);
    }
</script>

</html>