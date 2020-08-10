<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ayo Lapor! | Daftar</title>

    <!-- Style -->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/auth/style.css') ?>">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="<?= base_url('assets/vendor/bootstrap/css/bootstrap.min.css') ?>">
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 image-container">
                <img src="<?= base_url('assets/img//buildings.png') ?>" alt="" class="buildings">
                <img src="<?= base_url('assets/img/people.png') ?>" alt="" class="people">
                <br>
                <p class="title">Layanan Pengaduan <br>
                    Masyarakat Secara Online</p>
            </div>

            <div class="col-md-6 form-container">
                <div class="col-lg-8 form-box text-center">
                    <div class="heading mb-4">
                        <h4>Daftar</h4>
                    </div>
                    <form method="post" action="<?= base_url('auth/register') ?>">
                        <div class="form-group">
                            <input type="text" class="form-control form-control-user" name="name" id="name" placeholder="Nama Lengkap">
                            <small class="text-danger text-left"><?= form_error('name'); ?></small>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control form-control-user" name="usernmae" id="username" placeholder="Nama Pengguna">
                            <small class="text-danger text-left"><?= form_error('username'); ?></small>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control form-control-user" name="password" id="password" placeholder="Kata Sandi">
                            <small class="text-danger text-left"><?= form_error('password'); ?></small>
                        </div>
                        <div class="form-group">
                            <input type="number" class="form-control form-control-user" name="telp" id="telp" placeholder="No Telepon">
                            <small class="text-danger text-left"><?= form_error('telp'); ?></small>
                        </div>
                        <div class="form-status">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="optionsLevel" id="radioAdmin" value="option1" ">
                                <label class="form-check-label" for="inlineRadio1">Admin</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="optionsLevel" id="radioKaryawan" value="option2">
                                <label class="form-check-label" for="inlineRadio2">Karyawan</label>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="text-left mb-3">
                                <button type="submit" class="btn">Daftar</button>
                            </div>
                        </div>
                        <div style="color: #777;">Sudah punya akun?
                            <a href="login" class="login-link">Masuk disini</a>
                        </div>
                        <div style="color: #777;">Daftar sebagai
                            <a href="m_register" class="login-link">masyarakat</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>