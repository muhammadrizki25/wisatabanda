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
            <h3 class="m-0 font-weight-bold text-primary"><?= $title ?></h3>
        </div>
        <div class="card-body">
            <button type="button" class="btn btn-primary btn-sm mb-2" data-toggle="modal" data-target="#tambahModal">
                <i class="fas fa-plus"></i> Tambah
            </button>

            <!-- Notifikasi berhasil tambah admin -->
            <div class="swal" data-swal="<?= session('success') ?>"></div>

            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th width="100px" class="text-center">No</th>
                            <th class="text-center">Nama</th>
                            <th class="text-center">Username</th>
                            <th class="text-center">Email</th>
                            <th class="text-center">Tindakan</th>
                        </tr>
                    </thead>
                    <!-- <tfoot>
                    <tr>
                        <th>Name</th>
                        <th>Position</th>
                        <th>Office</th>
                        <th>Age</th>
                        <th>Start date</th>
                        <th>Salary</th>
                    </tr>
                </tfoot> -->
                    <tbody>
                        <?php $no = 1; ?>
                        <?php foreach ($daftar_admin as $admin): ?>
                            <tr>
                                <td class="text-center"><?= $no++; ?></td>
                                <td><?= $admin['nama']; ?></td>
                                <td><?= $admin['username']; ?></td>
                                <td><?= $admin['email']; ?></td>
                                <td class="text-center">
                                    <button type="button" class="btn btn-danger btn-sm"
                                        onclick="hapus('<?= $admin['id']; ?>')">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </td>
                                <!-- <td>$320,800</td> -->
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

<!-- Modal Tambah -->
<div class="modal fade" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="tambahModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahModalLabel"><i class="fas fa-plus"></i> Tambah Admin</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('admin/simpan'); ?>" method="post" enctype="multipart/form-data">
                    <?= csrf_field() ?>

                    <div class="mb-3">
                        <label for="nama">Nama</label>
                        <input type="text" name="nama" id="nama" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="username">Username</label>
                        <input type="text" name="username" id="username" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="email">Email</label>
                        <input type="text" name="email" id="email" class="form-control" required>
                    </div>


                    <div class="mb-3">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" class="form-control" required>
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>

<?= $this->Section('script'); ?>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    const swal = $('.swal').data('swal')

    if (swal) {
        Swal.fire({
            icon: 'success',
            title: 'Berhasil',
            text: swal,
            showConfirmButton: false,
            timer: 1900
        })
    }

    function hapus(id) {
        Swal.fire({
            title: 'Hapus Data',
            text: "Yakin Data admin akan dihapus?",
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Hapus',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    type: 'POST',
                    url: '<?= base_url("admin/delete"); ?>',
                    data: {
                        _method: 'delete',
                        <?= csrf_token() ?>: "<?= csrf_hash(); ?>",
                        id: id
                    },
                    dataType: 'json',
                    success: function (response) {
                        if (response.success) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Berhasil',
                                text: response.success,
                            }).then((result) => {
                                if (result.value) {
                                    window.location.href = "<?= base_url('admin'); ?>"
                                }
                            })
                        }
                    }
                });
            }
        });
    }
</script>
<?= $this->endSection(); ?>