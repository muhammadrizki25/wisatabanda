<?= $this->extend('admin/layout/template') ?>

<?= $this->Section('style'); ?>
<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
<?= $this->endSection(); ?>

<?= $this->Section('content') ?>

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h3 class="m-0 font-weight-bold text-primary"><?= $title ?> : <?= $data_penginapan['nama'] ?></h3>
        </div>
        <div class="card-body">
            <!-- Notifikasi berhasil ubah Penginapan -->
            <?php if (session('success')): ?>
                <div class="alert alert-success" role="alert">
                    <?= session('success'); ?>
                </div>
            <?php endif; ?>

            <!-- Notifikasi gagal ubah Penginapan -->
            <?php $errors = validation_errors(); ?>
            <?php if (session('failed')): ?>
                <div class="alert alert-danger" role="alert">
                    <?= session('failed'); ?>
                </div>
            <?php endif; ?>
            <div class="table-responsive">
                <form action="<?= base_url('penginapan/simpan_update/' . $data_penginapan['id']); ?>" method="post"
                    enctype="multipart/form-data">
                    <?= csrf_field(); ?>
                    <input type="hidden" name="_method" value="PUT">
                    <input type="hidden" name="gambarLama" value="<?= $data_penginapan['gambar'] ?>">
                    <div class="mb-3">
                        <label for="nama">Nama Penginapan</label>
                        <input type="text" name="nama" id="nama"
                            class="form-control <?= (isset($errors['nama'])) ? 'is-invalid' : ''; ?>"
                            value="<?= set_value('nama'), $data_penginapan['nama'] ?>">

                        <?php if (isset($errors['nama'])): ?>
                            <div class="invalid-feedback">
                                <?= validation_show_error('nama'); ?>
                            </div>
                        <?php endif; ?>
                    </div>

                    <div class="mb-3">
                        <label for="gambar">Gambar</label>
                        <input type="file" name="gambar" id="gambar" class="form-control mb-2
                            <?= (isset($errors['gambar'])) ? 'is-invalid' : ''; ?>" onchange="previewImg()">

                        <?php if (isset($errors['gambar'])): ?>
                            <div class="invalid-feedback">
                                <?= validation_show_error('gambar'); ?>
                            </div>
                        <?php endif; ?>

                        <img src="<?= base_url('public/gambar/penginapan/' . $data_penginapan['gambar']) ?>" alt=""
                            class="preview-img mb-3 " width="200px">
                    </div>

                    <div class="mb-3">
                        <label for="deskripsi">Deskripsi</label>
                        <textarea name="deskripsi" id="deskripsi" cols="30" rows="10"
                            class="form-control <?= (isset($errors['deskripsi'])) ? 'is-invalid' : ''; ?>"><?= set_value('deskripsi'), $data_penginapan['deskripsi'] ?></textarea>
                        <?php if (isset($errors['deskripsi'])): ?>
                            <div class="invalid-feedback">
                                <?= validation_show_error('deskripsi'); ?>
                            </div>
                        <?php endif; ?>
                    </div>

                    <div class="mb-3">
                        <label for="alamat">Alamat</label>
                        <textarea name="alamat" id="alamat" cols="30" rows="10"
                            class="form-control <?= (isset($errors['alamat'])) ? 'is-invalid' : ''; ?>"><?= set_value('alamat'), $data_penginapan['alamat'] ?></textarea>

                        <?php if (isset($errors['alamat'])): ?>
                            <div class="invalid-feedback">
                                <?= validation_show_error('alamat'); ?>
                            </div>
                        <?php endif; ?>
                    </div>

                    <div class="row">
                        <div class="mb-3 col-6">
                            <label for="latitude">Latitude</label>
                            <input type="text" name="latitude" id="latitude"
                                class="form-control <?= (isset($errors['latitude'])) ? 'is-invalid' : ''; ?>"
                                value="<?= set_value('latitude'), $data_penginapan['latitude'] ?>">
                            <?php if (isset($errors['latitude'])): ?>
                                <div class="invalid-feedback">
                                    <?= validation_show_error('latitude'); ?>
                                </div>
                            <?php endif; ?>
                        </div>

                        <div class=" mb-3 col-6">
                            <label for="longitude">Longitude</label>
                            <input type="text" name="longitude" id="longitude"
                                class="form-control <?= (isset($errors['longitude'])) ? 'is-invalid' : ''; ?>"
                                value="<?= set_value('longitude'), $data_penginapan['longitude'] ?>">
                            <?php if (isset($errors['longitude'])): ?>
                                <div class="invalid-feedback">
                                    <?= validation_show_error('longitude'); ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="mb-3 justify-content-end d-flex">
                        <a href="<?= base_url('penginapan') ?>" class="btn btn-secondary btn-sm mt-2" style="margin-right: 10px;">Kembali</a>
                        <button class="btn btn-primary btn-sm mt-2">Ubah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

<?= $this->endSection(); ?>

<?= $this->Section('script'); ?>
<script type="importmap">
            {
                "imports": {
                    "ckeditor5": "https://cdn.ckeditor.com/ckeditor5/42.0.1/ckeditor5.js",
                    "ckeditor5/": "https://cdn.ckeditor.com/ckeditor5/42.0.1/"
                }
            }
        </script>

        <script type="module">
            import {
                ClassicEditor,
                Essentials,
                Bold,
                Italic,
                Paragraph,
                Highlight,
                Link,
                List,
                Strikethrough,
                TodoList,
                Underline,
                Undo
            } from 'ckeditor5';

            ClassicEditor
                .create( document.querySelector( '#deskripsi' ), {
                    plugins: [ Essentials, Bold, Italic, Paragraph, Highlight, Link, List, Strikethrough, TodoList, Underline, Undo ],
                    toolbar: {
                        items: [
                            'undo', 'redo', '|', 'bold', 'italic', 'underline', 'strikethrough', '|', 'link', 'highlight', '|', 'bulletedList', 'numberedList', 'todoList'
                        ]
                    }
                } )
                .then( /* ... */ )
                .catch( /* ... */ );
        </script>
<script>
    function previewImg() {
        const gambar = document.querySelector('#gambar');
        const imgPreview = document.querySelector('.preview-img');

        const fileGambar = new FileReader();
        fileGambar.readAsDataURL(gambar.files[0]);

        fileGambar.onload = function (e) {
            imgPreview.src = e.target.result;
        }
    }
</script>
<?= $this->endSection(); ?>