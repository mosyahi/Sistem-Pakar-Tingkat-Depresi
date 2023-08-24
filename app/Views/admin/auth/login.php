<?= $this->extend('layout/auth') ?>

<?= $this->section('content') ?>

<div class="container">
    <!-- Outer Row -->
    <div class="row justify-content-center">
        <div class="col-xl-8 col-lg-10 col-md-7">
            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-2 d-none d-lg-block"></div>
                        <div class="col-lg-8">
                            <div class="p-5">
                                <div class="text-center">
                                    <img src="public/img/umc.png" width="110px" height="110px">
                                    <p>
                                    <h1 class="h4 text-gray-900 mb-4">Sistem Pakar Diagnosa Depresi Mahasiswa Teknik
                                        Informatika UMC</h1>
                                    </p>
                                </div>
                                <?php if (session()->getFlashdata('error')) : ?>
                                <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
                                <?php endif; ?>
                                <form method="post" action="<?= base_url('/login') ?>">
                                    <?= csrf_field() ?>
                                    <div class="user">
                                        <div id="FormUsername">
                                            <div class="form-group">
                                                <input type="text" class="form-control form-control-user"
                                                    placeholder="Username" name="username" id="username" required>
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
                                            </div>
                                            <button type="submit" class="btn btn-primary btn-user btn-block">
                                                Login
                                            </button>
                                        </div>
                                    </div>
                                </form>
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
</div>

<?= $this->endSection() ?>