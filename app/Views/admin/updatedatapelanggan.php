<!DOCTYPE html>
<html lang="en">

<head>

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
                                <h1 class="h4 text-gray-900 mb-4">Update Data Pelanggan</h1>
                            </div>
                            <form class="user">
                                <div class="form-group">
                                    <label for="nama">Nama</label>
                                    <input type="text" class="form-control form-control-user" id="nama" placeholder="Nama" value="<?= $dataPelanggan['nama_barang']; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="nama">Nomor Induk Kependudukan</label>
                                    <input type="number" class="form-control form-control-user" id="angka" placeholder="Nomor Induk Kependudukan">
                                </div>
                                <div class="form-group">
                                    <label for="nama">Alamat</label>
                                    <input type="text" class="form-control form-control-user" id="nama" placeholder="Alamat">
                                </div>
                                <div class="form-group">
                                    <label for="nama">Nomor Handphone</label>
                                    <input type="number" class="form-control form-control-user" id="angka" placeholder="Nomor Handphone">
                                </div>
                                <div class="form-group">
                                    <label for="nama">Tanggal Perjanjian Gadai</label>
                                    <input type="date" class="form-control form-control-user" id="exampleInputEmail" placeholder="Email Address">
                                </div>
                                <div class="form-group">
                                    <label for="nama">Nama Barang Gadai</label>
                                    <input type="email" class="form-control form-control-user" id="exampleInputEmail" placeholder="Nama Barang Gadai">
                                </div>
                                <div class="form-group">
                                    <label for="nama">Kelengkapan Barang Gadai</label>
                                    <input type="name" class="form-control form-control-user" id="exampleInputEmail" placeholder="Kelengkapan Barang Gadai">
                                </div>
                                <div class="form-group">
                                    <label for="nama">Password Akun</label>
                                    <input type="password" class="form-control form-control-user" id="exampleInputEmail" placeholder="Password">
                                </div>
                                <form action="upload.php" method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label for="fileUpload">Upload Foto KTP:</label>
                                        <input type="file" class="form-control-file" id="fileUpload" name="fileUpload">
                                    </div>
                                </form>

                                <a href="admin" class="btn btn-primary btn-user btn-block">
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