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
                                        <h1 class="h4 text-gray-900 mb-4">Selamat Datang!</h1></p>
                                    </div>
                                    <?php if (session()->getFlashdata('error')) : ?>
                                    <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
                                <?php endif; ?>
                                <?php if (session()->getFlashdata('success')) : ?>
                                <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
                            <?php endif; ?>
                            <?php if (session()->has('remainingTime')): ?>
                            <div class="alert alert-danger">Anda harus menunggu <span id="countdown"></span> sebelum mencoba login lagi.</div>
                        <?php endif; ?>
                        <form method="post" action="<?= base_url('login-mahasiswa') ?>">
                            <?= csrf_field() ?>
                            <div class="form-group">
                                <input type="email" name="email" class="form-control form-control-user"
                                id="exampleInputEmail" aria-describedby="emailHelp"
                                placeholder="Masukkan Email Anda" required>
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
                        <div class="form-group">
                            <div class="custom-control custom-checkbox small">
                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                <label class="custom-control-label" for="customCheck">Remember
                                Me</label>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary btn-user btn-block">
                            Login
                        </button>
                    </form>
                    <a href="<?= base_url('login-google') ?>" class="btn btn-google btn-user btn-block mt-1">
                        <i class="fab fa-google fa-fw"></i> Login with Google
                    </a>
                    <hr>
                    <div class="text-center">
                        <a class="small" href="<?= base_url('forgot-password') ?>">Lupa Password?</a>
                    </div>
                    <div class="text-center">
                        <a class="small" href="<?= base_url('register') ?>">Daftar Akun Baru!</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

        <div class="copyright text-center my-auto">
            <span><strong>Copyright &copy; <a href="https://mosyahizuku.site">2023. mochsyarifhidayat</a>.</strong> All rights
            reserved.</span>
        </div>
    
</div>
</div>
</div>

<script>
    function startCountdown(duration, display) {
        var timer = duration, minutes, seconds;
        setInterval(function () {
            minutes = parseInt(timer / 60, 10);
            seconds = parseInt(timer % 60, 10);

            minutes = minutes < 10 ? "0" + minutes : minutes;
            seconds = seconds < 10 ? "0" + seconds : seconds;

            display.textContent = minutes + ":" + seconds;

            if (--timer < 0) {
                window.location.reload(); 
            }
        }, 1000);
    }

    document.addEventListener("DOMContentLoaded", function () {
        var remainingTime = <?php echo json_encode(session()->get('remainingTime')) ?? 0; ?>;
        var countdownDisplay = document.getElementById("countdown");

        if (remainingTime > 0) {
            startCountdown(remainingTime, countdownDisplay);
        }
    });
</script>

<?= $this->endSection() ?>