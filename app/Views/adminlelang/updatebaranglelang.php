<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>UD. Ricky Gadai Medan</title>

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
                                <h1 class="h4 text-gray-900 mb-4">Update Barang Lelang</h1>
                            </div>
                            <form action="/adminlelang/update/<?= $baranglelang['id']; ?>" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="slug" value="<?= $baranglelang['slug']; ?>">
                                <div class="form-group">
                                    <label for="nama_barang">Nama Barang Lelang</label>
                                    <input type="text" class="form-control form-control-user" name="nama_barang" id="nama_barang" value="<?= $baranglelang['nama_barang']; ?>" autofocus>
                                </div>
                                <div class="form-group">
                                    <label for="harga_barang">Harga Barang Lelang</label>
                                    <input type="text" class="form-control form-control-user" name="harga_barang" id="harga_barang" value="<?= $baranglelang['harga_barang']; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="kelengkapan_barang">Kelengkapan Barang Lelang</label>
                                    <input type="text" class="form-control form-control-user" name="kelengkapan_barang" id="kelengkapan_barang" value="<?= $baranglelang['kelengkapan_barang']; ?>">
                                </div>
                                <div class="col-sm-2">
                                    <img src="/<?= $baranglelang['gambar_barang']; ?>" class="img-thumbnail img-preview" width="100">
                                </div>
                                <div class="form-group">
                                    <label for="gambar_barang">Gambar Barang Lelang</label>
                                    <input type="file" class="form-control-file" name="gambar_barang" id="gambar_barang" value="<?= $baranglelang['gambar_barang']; ?>">
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