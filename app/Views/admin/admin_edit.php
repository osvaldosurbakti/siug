<?= $this->extend("layouts/app") ?>

<?= $this->section("content") ?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Ubah Data Admin</h1>
    
</div>

<div class="row">
	<div class="col-xl-8">
        <!-- Account details card-->
        <div class="card mb-4">
            <div class="card-header">Data Lengkap</div>
            <div class="card-body">
                <?php if (!empty(session()->getFlashdata('error'))) : ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <h4>Periksa Entrian Form</h4>
                    </hr />
                    <?php echo session()->getFlashdata('error'); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php endif; ?>
                <form action="<?= url_to('adminUpdate', $user['id']);?>" method="post">
                    <?= csrf_field(); ?>
                    <div class="mb-3">
                        <label class="small mb-1" for="email">Email</label>
                        <input class="form-control" name="email" id="email" type="email" value="<?= $user['email'];?>">
                    </div>
                    <div class="mb-3">
                        <label class="small mb-1" for="name">Nama Lengkap</label>
                        <input class="form-control" name="nama" id="name" type="text" value="<?= $user['name'];?>">
                    </div>
                    <!-- Form Row-->
                    <div class="row gx-3 mb-3">
                        <!-- Form Group (phone number)-->
                        <div class="col-md-6">
                            <label class="small mb-1" for="no_telp">Nomor Telepon</label>
                            <input class="form-control" name="no_telp" id="no_telp" type="tel" value="<?= $user['phone_no'];?>">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="small mb-1" for="password">Password (isi password jika ingin diubah)</label>
                        <input class="form-control" name="password" id="password" type="password" placeholder="Password" fdprocessedid="q80mit">
                    </div>
                    <!-- Save changes button-->
                    <button class="btn btn-primary" type="submit" fdprocessedid="0kh6k">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>



<?= $this->endSection() ?>