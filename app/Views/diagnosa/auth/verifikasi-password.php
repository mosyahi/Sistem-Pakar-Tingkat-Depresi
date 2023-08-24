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
                                    <img src="<?= base_url('public/img/umc.png') ?>" width="70px" height="70px">
                                    <p>
                                        <h1 class="h4 text-gray-900 mb-4">Silahkan Masukkan Password Baru</h1></p>
                                    </div>
                                    <?php if (session()->getFlashdata('error')) : ?>
                                    <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
                                <?php endif; ?>
                                <?php if (session()->getFlashdata('success')) : ?>
                                <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
                            <?php endif; ?>
                            <form action="<?= base_url('reset-password'); ?>" method="post">
                                <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
                                <input type="hidden" name="token" value="<?= $token ?>" />
                                <div class="form-group">
                                    <small class="form-text text-muted">Password minimal 8 karakter</small>
                                    <div class="input-group">
                                        <input type="password" class="form-control" name="new_password"
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
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control form-control-user" id="confirm_password" name="confirm_password" placeholder="Konfirmasi Password Baru" required>
                            </div>
                            <button type="submit" class="btn btn-primary btn-user btn-block">
                                Submit
                            </button>
                        </form>
                        <hr>
                        <div class="text-center">
                            <a class="small" href="<?= base_url('login-mahasiswa') ?>">Kembali ke Halaman Login</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>

<?= $this->endSection() ?>