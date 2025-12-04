<?= $this->extend('layout/auth') ?>
<?= $this->section('content') ?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-xl-5 col-lg-12 col-md-9">
            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="p-5">
                                <div class="text-center">
                                    <img src="<?= base_url() ?>img/umc.png" width="70px" height="70px">
                                    <p>
                                        <?php if (!isset($showOtpForm)) : ?>
                                            <h1 class="h4 text-gray-900 mb-4">Silahkan Registrasi Akun Baru</h1></p>
                                        <?php else : ?>
                                            <h1 class="h4 text-gray-900 mb-4">Verifikasi OTP</h1>
                                        <?php endif; ?>
                                    </div>
                                    <?php if (session()->getFlashdata('error')) : ?>
                                    <div class="alert alert-danger">
                                        <?php
                                        $errors = session()->getFlashdata('error');
                                        foreach ($errors as $error) {
                                            echo $error . '<br>';
                                        }
                                        ?>
                                    </div>
                                <?php endif; ?>
                                <?php if (session()->getFlashdata('errorr')) : ?>
                                <div class="alert alert-danger"><?= session()->getFlashdata('errorr') ?></div>
                            <?php endif; ?>
                            <?php if (!isset($showOtpForm)) : ?>
                                <form method="POST" action="<?= base_url('register') ?>">
                                    <?= csrf_field() ?>
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" id="exampleInputEmail"
                                        name="nama_lengkap" maxlength="50" placeholder="Nama Lengkap">
                                    </div>
                                    <div class="form-group">
                                        <input type="email" class="form-control form-control-user"
                                        id="exampleInputEmail" name="email" placeholder="Email Aktif (Verifikasi Kode OTP)"
                                        data-toggle="tooltip" title="Anda Akan Menerima Verifikasi Kode">
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <input type="password" class="form-control" name="password"
                                            id="password" placeholder="Password" required>
                                            <div class="input-group-append">
                                                <button class="btn btn-outline-primary" type="button"
                                                id="togglePassword">
                                                <i class="fa fa-eye-slash" id="eyeSlashIcon"></i>
                                                <i class="fa fa-eye" id="eyeIcon"
                                                style="display: none;"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <small class="form-text text-muted">Password minimal 8 karakter</small>
                                </div>
                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                    Register Akun
                                </button>
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="<?= base_url('forgot-password') ?>">Lupa Password?</a>
                            </div>
                            <div class="text-center">
                                <a class="small" href="<?= base_url('login-mahasiswa') ?>">Sudah punya akun? Silahkan login!</a>
                            </div>
                        <?php else : ?>
                            <!-- Form verifikasi OTP -->
                            <form method="POST" action="<?= base_url('verify-otp') ?>">
                                <?= csrf_field() ?>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="exampleInputOTP"
                                    name="otp" placeholder="Masukkan Kode OTP">
                                </div>
                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                    Verifikasi OTP
                                </button>
                            </form>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer class="sticky-footer bg-white">
        <div class="container my-auto">
            <div class="copyright text-center my-auto">
                <span><strong>Copyright &copy; <a href="#">Umc.2023</a>.</strong> All rights
                reserved.</span>
            </div>
        </div>
    </footer>
</div>
</div>
</div>

<!-- Tautan ke jQuery dan Bootstrap JS (pastikan Anda telah memuatnya di bagian <head> atau sebelum penutup </body>) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
        .tooltip-inner {
            background-color: white; 
            color: black; 
            border: 1px solid #ccc; 
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1); 
        }
    </style>

    <!-- Inisialisasi komponen tooltip -->
    <script>
        $(document).ready(function() {
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>


    <?= $this->endSection() ?>
