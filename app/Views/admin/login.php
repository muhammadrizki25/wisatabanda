<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <!-- Favicon -->
  <link href="<?= base_url('public'); ?>/favicon1.ico" rel="icon">

  <link href="<?= base_url('public/assets-admin/login'); ?>/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?= base_url('public/assets-admin/login'); ?>/css/font-awesome.min.css" rel="stylesheet">
  <link href="<?= base_url('public/assets-admin/login'); ?>/css/style.css" rel="stylesheet">

  <title>Login Admin</title>
</head>

<body>
  <section class="form-02-main">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="_lk_de">
            <div class="form-03-main">
              <div class="logo">
                <img src="<?= base_url('public/assets-admin/login/images'); ?>/logo1.png">
              </div>
              <h3 class="text-center" style="font-weight: bold">Silahkan Login :)</h3>
              <form action="<?= base_url('auth/login') ?>" method="post">
                <div class="form-group">
                  <input type="text" name="username" class="form-control _ge_de_ol" type="text"
                    placeholder="Masukkan Username" required="" aria-required="true">
                </div>

                <div class="form-group">
                  <input type="password" name="password" class="form-control _ge_de_ol" type="text"
                    placeholder="Masukkan Password" required="" aria-required="true">
                </div>

                <!-- <div class="checkbox form-group">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="">
                    <label class="form-check-label" for="">
                      Remember me
                    </label>
                  </div>
                  <a href="#">Forgot Password</a>
                </div> -->

                <!-- Notifikasi gagal tambah Tempat -->
                <?php if(session('failed')) : ?>
                    <div class="alert alert-danger" role="alert">
                        <?= session('failed'); ?>
                    </div>
                <?php endif; ?>

                <div class="form-group">
                  <button class="btn btn-primary btn-lg w-100" type="submit">Login</button>
                </div>
              </form>

              <!-- <div class="form-group nm_lk"><p>Or Login With</p></div>

                <div class="form-group pt-0">
                  <div class="_social_04">
                    <ol>
                      <li><i class="fa fa-facebook"></i></li>
                      <li><i class="fa fa-twitter"></i></li>
                      <li><i class="fa fa-google-plus"></i></li>
                      <li><i class="fa fa-instagram"></i></li>
                      <li><i class="fa fa-linkedin"></i></li>
                    </ol>
                  </div>
                </div> -->
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</body>

</html>