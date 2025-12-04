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
                                        <h1 class="h4 text-gray-900 mb-4">Verifikasi Kode OTP</h1></p>
                                    </div>
                                    <?php if (session()->getFlashdata('error')) : ?>
                                    <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
                                <?php endif; ?>
                                <?php if (session()->getFlashdata('success')) : ?>
                                <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
                            <?php endif; ?>
                            <form method="POST" action="<?= base_url('verify-otp') ?>">
                                <?= csrf_field() ?>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="otp" name="otp" placeholder="Kode OTP" required>
                                    <small class="form-text text-muted" id="countdown-message">Kode OTP akan expired dalam waktu <span id="countdown"></span> menit</small>
                                </div>
                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                    Verifikasi OTP
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<script>
    function startCountdown(duration, display, messageDisplay) {
        var startTime = new Date().getTime();
        localStorage.setItem('countdown_start', startTime);

        function updateCountdown() {
            var currentTime = new Date().getTime();
            var elapsedTime = currentTime - startTime;
            var remainingTime = duration - Math.floor(elapsedTime / 1000);

            if (remainingTime <= 0) {
                clearInterval(countdownInterval);
                localStorage.removeItem('countdown_start');
                display.textContent = "00:00";
                messageDisplay.textContent = "Kode OTP sudah melebihi batas waktu (EXPIRED)";
            } else {
                var minutes = parseInt(remainingTime / 60, 10);
                var seconds = remainingTime % 60;

                minutes = minutes < 10 ? "0" + minutes : minutes;
                seconds = seconds < 10 ? "0" + seconds : seconds;

                display.textContent = minutes + ":" + seconds;
            }
        }

        updateCountdown();
        var countdownInterval = setInterval(updateCountdown, 1000);
    }

    window.onload = function () {
        var fiveMinutes = 5 * 60,
        display = document.querySelector('#countdown'),
        messageDisplay = document.querySelector('#countdown-message');

        var storedStartTime = localStorage.getItem('countdown_start');
        if (storedStartTime) {
            var currentTime = new Date().getTime();
            var elapsedTime = currentTime - storedStartTime;
            var remainingTime = fiveMinutes - Math.floor(elapsedTime / 1000);

            if (remainingTime > 0) {
                startCountdown(remainingTime, display, messageDisplay);
            } else {
                localStorage.removeItem('countdown_start');
                display.textContent = "00:00";
                messageDisplay.textContent = "Kode OTP sudah melebihi batas waktu (Expired)";
            }
        } else {
            startCountdown(fiveMinutes, display, messageDisplay);
        }
    };
</script>

<?= $this->endSection() ?>
