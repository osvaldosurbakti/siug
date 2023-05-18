<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Simpan Data Pelanggan</title>

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
                                <h1 class="h4 text-gray-900 mb-4">Simpan Data Pelanggan</h1>
                            </div>
                            <form action="/simpandatapelanggan/save" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="nama">Nama</label>
                                    <input type="text" class="form-control form-control-user" id="nama" name="nama" placeholder="Nama" autofocus>
                                </div>
                                <div class="form-group">
                                    <label for="nik">Nomor Induk Kependudukan</label>
                                    <input type="text" class="form-control form-control-user" id="nik" name="nik" placeholder="Nomor Induk Kependudukan">
                                </div>
                                <div class="form-group">
                                    <label for="alamat">Alamat</label>
                                    <input type="text" class="form-control form-control-user" id="alamat" name="alamat" placeholder="Alamat">
                                </div>
                                <div class="form-group">
                                    <label for="nomor_handphone">Nomor Handphone</label>
                                    <input type="number" class="form-control form-control-user" id="nomor_handphone" name="nomor_handphone" placeholder="Nomor Handphone">
                                </div>
                                <div class="form-group">
                                    <label for="tanggal_gadai">Tanggal Perjanjian Gadai</label>
                                    <input type="date" class="form-control form-control-user" id="tanggal_gadai" name="tanggal_gadai" placeholder="Tanggal Perjanjian Gadai">
                                </div>
                                <div class="form-group">
                                    <label for="nama_barang">Nama Barang Gadai</label>
                                    <input type="text" class="form-control form-control-user" id="nama_barang" name="nama_barang" placeholder="Nama Barang Gadai">
                                </div>
                                <div class="form-group">
                                    <label for="kelengkapan_barang">Kelengkapan Barang Gadai</label>
                                    <input type="text" class="form-control form-control-user" id="kelengkapan_barang" name="kelengkapan_barang" placeholder="Kelengkapan Barang Gadai">
                                </div>
                                <div class="form-group">
                                    <label for="password">Password Akun</label>
                                    <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Password">
                                </div>
                                <div class="form-group">
                                    <label for="foto_ktp">Upload Foto KTP</label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="foto_ktp" name="foto_ktp">
                                        <label class="custom-file-label" for="foto_ktp">Pilih foto ktp...</label>
                                    </div>
                                </div>
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
                                <label for="batas_pembayaran">Batas Akhir Pembayaran Pinjaman</label>
                                <input type="date" class="form-control form-control-user" id="batas_pembayaran" name="batas_pembayaran" placeholder="Tanggal">
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