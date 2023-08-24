<?= $this->extend('layout/homepage') ?>

<?= $this->section('contentHome') ?>

<!-- ======= Home Section ======= -->
<section id="hero" class="d-flex align-items-center">

    <div class="container">
        <div class="row">
            <div class="col-lg-8 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1"
                data-aos="fade-up" data-aos-delay="200">
                <h1>Terdeteksi Error!</h1>
                <h2 class="mb-4">Silahkan Pilih <strong class="text-warning">Gejala</strong>
                    Yang Kamu Alami Minimal 1 Dengan Cara : Ceklis Kode Gejala, Lalu Pilih Nilai Keyakinan Anda Terhadap Gejala Yang Anda Pilih!</h2>
                <div class="d-flex justify-content-center justify-content-lg-start mt-3">
                    <a href="#" onclick="history.back('/')" class="btn-get-started scrollto"><i class="fas fa-chevron-left"></i>&nbsp Kembali</a>
                </div>
            </div>
            <div class="col-lg-4 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="200">
                <img src="<?= base_url('public/img/warning.png') ?>" class="img-fluid animated"
                    style="height: 280px; width: 280px; margin-bottom: 50px; margin-top: -50px;">
            </div>
        </div>
    </div>
</section>
<!-- End Home -->

<?= $this->endSection() ?>