<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Update Data Pelanggan</title>

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
                                <h1 class="h4 text-gray-900 mb-4">Update Data Pelanggan</h1>
                            </div>
                            <form class="user">
                                <div class="form-group">
                                    <label for="nama">Nama</label>
                                    <input type="text" class="form-control form-control-user" id="nama" value="<?= $dataPelanggan['nama']; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="nik">Nomor Induk Kependudukan</label>
                                    <input type="number" class="form-control form-control-user" id="nik" name="nik" value="<?= $dataPelanggan['nik']; ?>">
                                </div>
                                <div class=" form-group">
                                    <label for="alamat">Alamat</label>
                                    <input type="text" class="form-control form-control-user" id="alamat" name="alamat" value="<?= $dataPelanggan['alamat']; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="nomor_handphone">Nomor Handphone</label>
                                    <input type="number" class="form-control form-control-user" id="nomor_handphone" name="nomor_handphone" value="<?= $dataPelanggan['nomor_handphone']; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="tanggal_gadai">Tanggal Perjanjian Gadai</label>
                                    <input type="date" class="form-control form-control-user" id="tanggal_gadai" name="nama_barang" value="<?= $dataPelanggan['tanggal_gadai']; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="nama_barang">Nama Barang Gadai</label>
                                    <input type="email" class="form-control form-control-user" id="nama_barang" name="nama_barang" value="<?= $dataPelanggan['nama_barang']; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="kelengkapan_barang">Kelengkapan Barang Gadai</label>
                                    <input type="name" class="form-control form-control-user" id="kelengkapan_barang" name="kelengkapan_barang" value="<?= $dataPelanggan['kelengkapan_barang']; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="password">Password Akun</label>
                                    <input type="password" class="form-control form-control-user" id="password" name="password" value="<?= $dataPelanggan['password']; ?>">
                                </div>
                                <form action="upload.php" method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label for="foto_ktp">Upload Foto KTP:</label>
                                        <div class="col-sm-2">
                                            <img src="/img/<?= $dataPelanggan['foto_ktp']; ?>" class="img-thumbnail img-preview" style="max-width: 300px; max-height: 300px;">
                                        </div>
                                        <input type="file" class="form-control-file" id="foto_ktp" name="foto_ktp" value="<?= $dataPelanggan['foto_ktp']; ?>">
                                    </div>
                                </form>
                                <a href="/admin" class="btn btn-primary btn-user btn-block">
                                    Simpan
                                </a>
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

</body>

</html>