<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Tambah Barang Lelang</title>

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
                                <h1 class="h4 text-gray-900 mb-4">Tambah Barang Lelang</h1>
                            </div>
                            <form action="/adminlelang/save" method="post" enctype="multipart/form-data">
                                <?= csrf_field(); ?>
                                <div class="form-group">
                                    <label for="nama_barang">Nama Barang Lelang</label>
                                    <input type="text" class="form-control form-control-user" id="nama_barang" name="nama_barang" placeholder="Nama Barang Lelang" autofocus>
                                </div>
                                <div class="form-group">
                                    <label for="harga_barang">Harga Barang Lelang</label>
                                    <input type="text" class="form-control form-control-user" id="harga_barang" name="harga_barang" placeholder="Harga">
                                </div>
                                <div class="form-group">
                                    <label for="kelengkapan_barang">Kelengkapan Barang Lelang</label>
                                    <input type="text" class="form-control form-control-user" id="kelengkapan_barang" name="kelengkapan_barang" placeholder="Kelengkapan Barang Lelang">
                                </div>
                                <div class="form-group">
                                    <label for="gambar_barang">Gambar Barang Lelang</label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="gambar_barang" name="gambar_barang">
                                        <label class="custom-file-label" for="gambar_barang">Pilih gambar...</label>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                    Simpan
                                </button>
                            </form>
                        </div>
                    </div>
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

</body>

</html>