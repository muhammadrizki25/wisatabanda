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
            <a href="<?= base_url('penginapan/tambah'); ?>" class="btn btn-primary btn-sm mb-2">
                <i class="fas fa-plus"></i> Tambah
            </a>

            <!-- Notifikasi berhasil tambah penginapan -->
            <div class="swal" data-swal="<?= session('success') ?>"></div>

            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th width="100px" class="text-center">No</th>
                            <th class="text-center">Judul</th>
                            <th class="text-center">Gambar</th>
                            <th class="text-center">Tindakan</th>
                            <!-- <th>Start date</th> -->
                            <!-- <th>Salary</th> -->
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
                        <?php foreach ($daftar_penginapan as $penginapan): ?>
                            <tr>
                                <td class="text-center"><?= $no++; ?></td>
                                <td><?= $penginapan['nama']; ?></td>
                                <td><img src="<?= base_url('/public/gambar/penginapan/' . $penginapan['gambar']); ?>"
                                        width="400"></td>
                                <td class="text-center">
                                    <a href="<?= base_url('penginapan/detail/' . $penginapan['id']) ?>"
                                        class="btn btn-secondary btn-sm"><i class="fas fa-eye"></i></a>
                                    <a href="<?= base_url('penginapan/update/' . $penginapan['id']); ?>"
                                        class="btn btn-success btn-sm">
                                        <i class="fas fa-edit"></i></a>
                                    <button type="button" class="btn btn-danger btn-sm"
                                        onclick="hapus('<?= $penginapan['id']; ?>')">
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
            text: "Yakin Data Penginapan akan dihapus?",
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
                    url: '<?= base_url("penginapan/delete"); ?>',
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
                                    window.location.href = "<?= base_url('penginapan'); ?>"
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