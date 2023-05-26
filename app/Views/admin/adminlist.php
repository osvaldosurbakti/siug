<?= $this->extend("layouts/app") ?>

<?= $this->section("content") ?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">List Admin</h1>
    
</div>

<div class="row">

	<div class="col-xl-12 col-lg-12">
		<div class="d-sm-flex align-items-center justify-content-between mb-4">
            <a href="<?= route_to('adminAdd');?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i> Tambah Admin</a>
        </div>
	<div class="card shadow mb-4">
        <div class="card-body">
        	<?php if (!empty(session()->getFlashdata('message'))) : ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <?php echo session()->getFlashdata('message'); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php endif; ?>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Nomor Telepon</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Nomor Telepon</th>
                            <th>Aksi</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php foreach ($users as $data) : ?>
                            <tr>
                                <td><?= $data['name']; ?></td>
                                <td><?= $data['email']; ?></td>
                                <td><?= $data['phone_no']; ?></td>
                                <td>
                                    <a href="<?= url_to('adminEdit',$data['id']); ?>" class="btn btn-info btn-circle btn-sm"><i class="fas fa-edit"></i></a>
                                    <a>
                                        <form action="<?= url_to('adminDelete',$data['id']); ?>" method="post" class="d-inline">
                                            <?= csrf_field(); ?>
                                            <input type="hidden" name="_method" value="DELETE">
                                            <button type="submit" class="btn btn-danger btn-circle btn-sm" onclick="return confirm('Apakah anda yakin dihapus?')">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </div>
</div>



<?= $this->endSection() ?>