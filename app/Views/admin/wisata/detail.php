<?= $this->extend('admin/layout/template') ?>

<?= $this->Section('style'); ?>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
<?= $this->endSection(); ?>
e
<?= $this->Section('content') ?>

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h3 class="m-0 font-weight-bold text-primary"><?= $title ?> : <?=$wisata['nama']?></h3>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <tr>
                            <th width="150">Nama Wisata</th>
                            <td><?=$wisata['nama']?></td>
                        </tr>
                        <tr>
                            <th>Gambar</th>
                            <td>
                                <img src="<?= base_url('/public/gambar/wisata/'.$wisata['gambar']); ?>" width="400">
                            </td>
                        </tr>
                        <tr>
                            <th>Deskripsi</th>
                            <td><?= htmlspecialchars_decode($wisata['deskripsi'])?></td>
                        </tr>
                        <tr>
                            <th>Alamat</th>
                            <td><?=$wisata['alamat']?></td>
                        </tr>
                </table>
                <div class="justify-content-end d-flex">
                    <a href="<?= base_url('wisata') ?>" class="btn btn-primary btn-sm mt-2">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

<?= $this->endSection(); ?>