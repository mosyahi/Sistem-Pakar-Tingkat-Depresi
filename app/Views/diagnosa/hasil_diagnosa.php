<?= $this->extend('layout/homepage') ?>

<?= $this->section('contentHome') ?>

<!-- ======= Header ======= -->
<header id="header" class="fixed-top ">
    <div class="container d-flex align-items-center">

        <h5 class="logo me-auto" style="font-size: 20px;">
            <img src="<?= base_url('public/img/umc.png') ?>" class="mb-1" style="height: 28px; width: 28px;" alt="">
            <a href="#home">Sispasi Umc </a>
        </h5>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html" class="logo me-auto"><img src="public/landing/assets/img/logo.png" alt="" class="img-fluid"></a> -->

        <nav id="navbar" class="navbar">
            <ul>
                <li><a class="nav-link scrollto active" href="#informasi">Hasil</a></li>
                <li><a class="nav-link scrollto" href="#cta">Solusi</a></li>
                <li><a class="nav-link scrollto" href="<?= base_url('mahasiswa/cek_diagnosa') ?>">Cek Diagnosa Kembali</a></li>
                <li><a class="nav-link scrollto" href="<?= base_url('logout') ?>">Logout</a></li>
                <li><a class="getstarted scrollto" href="<?= base_url('mahasiswa/diagnosa/cetak_diagnosa') ?>">Unduh <i class="fas fa-download"></i></a></li>
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->

    </div>
</header>
<!-- End Header -->
<br><br>
<main id="main">

    <!-- ======= Section ======= -->
    <section id="informasi" class="services section-bg">
        <div class="container" data-aos="fade-up">
            <div class="section-title">
                <h2>Hasil Diagnosa</h2>
                <p>Hasil diagnosa tingkat depresi oleh <strong>'<?= $resultDiagnosa['nama_mahasiswa']; ?> -
                    <?= $resultDiagnosa['nim']; ?> - Prodi <?= $resultDiagnosa['prodi']; ?> - Semester <?= $resultDiagnosa['semester']; ?>'</strong> pada
                    tanggal <strong>'<?= date('d-m-Y', strtotime($resultDiagnosa['tgl_diagnosa'])); ?>'</strong> telah
                    diperoleh melalui suatu
                hasil perhitungan yang dilakukan oleh sistem sebagai berikut:</strong></p>
            </div>
            <div class="row text-center">
                <div class="col-xl-3 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
                    <div class="icon-box">
                        <div class="icon"><i class="bx bx-plus-medical" style="color: #51AAEF;"></i></div>
                        <h4><a href="#informasi">Gejala Terpilih</a></h4>
                        <p class="mb-2">Berdasarkan perhitungan sistem, jumlah gejala yang anda pilih
                        adalah :</p>
                        <h2><?= $resultDiagnosa['jumlah_gejala']; ?> Gejala</h2>
                    </div>
                </div>

                <div class="col-xl-3 col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="zoom-in"
                data-aos-delay="200">
                <div class="icon-box">
                    <div class="icon"><i class="bx bx-plus-medical" style="color: #54DA5D;"></i></div>
                    <h4><a href="#informasi">Gejala Tak Terpilih</a></h4>
                    <p class="mb-2">Berdasarkan perhitungan sistem, jumlah gejala yang tidak anda pilih
                    adalah :</p>
                    <h2><?= $resultDiagnosa['jumlah_gejala_tidak_terpilih']; ?> Gejala</h2>
                </div>
            </div>

            <div class="col-xl-3 col-md-6 d-flex align-items-stretch mt-4 mt-xl-0" data-aos="zoom-in"
            data-aos-delay="300">
            <div class="icon-box">
                <div class="icon"><i class="bx bx bx-plus-medical" style="color: #E6E44C;"></i></div>
                <h4><a href="#informasi">Nilai CF Akhir</a></h4>
                <p class="mb-2">Berdasarkan perhitungan sistem, CF Akhir dari gejala yang anda pilih
                adalah :</p>
                <h2><?= sprintf("%.4g", $resultDiagnosa['tingkat_kepercayaan']); ?>
            </h2>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 d-flex align-items-stretch mt-4 mt-xl-0" data-aos="zoom-in"
    data-aos-delay="400">
    <div class="icon-box">
        <div class="icon"><i class="bx bx-plus-medical" style="color: #DD3A3A;"></i></div>
        <h4><a href="#informasi">Presentase</a></h4>
        <p align="center" class="mb-2">Berdasarkan perhitungan sistem, presentase dari CF Akhir anda
        adalah :</p>
        <h2 align="center"><?= $resultDiagnosa['presentase']; ?> %</h2>
    </div>
</div>
<div class="container-fluid py-4">
    <div class="card shadow mb-4">
        <div class="card-header">
            <h5 class="m-0 font-weight-bold text-primary m-2">
                <font color="#8B0000">Expert System</font>
            </h5>
        </div>
        <div class="card-body">
            <div class="accordion" id="accordionExample">
                <!-- Collapse 2 - Pilih Gejala -->
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button collapsed" type="button"
                        data-bs-toggle="collapse" data-bs-target="#collapseOne"
                        aria-expanded="false" aria-controls="collapseOne"><i class="fas fa-comments"></i>
                        &nbsp Pertanyaan Tentang Anda
                    </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse"
                aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <div class="table-responsive" align="left">
                        <table class="table table-bordered" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Pertanyaan</th>
                                    <th>Jawaban</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Apakah anda melakukan test ini untuk diri sendiri atau orang lain?</td>
                                    <td>
                                        <?= $resultDiagnosa['p_1']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Berapa rentan usia anda?</td>
                                    <td>
                                        <?= $resultDiagnosa['p_2']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Apakah anda sedang mempunyai masalah?</td>
                                    <td>
                                        <?= $resultDiagnosa['p_3']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Apakah ada masalah berikut yang menggambarkan anda sekarang?</td>
                                    <td>
                                        <?= $resultDiagnosa['p_4']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Apakah anda mempunyai keluhan lain?</td>
                                    <td>
                                        <?= $resultDiagnosa['p_5']; ?>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="mt-3">
        <div class="accordion" id="accordionExample">
            <!-- Collapse 2 - Pilih Gejala -->
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingTwo">
                    <button class="accordion-button collapsed" type="button"
                    data-bs-toggle="collapse" data-bs-target="#collapseTwo"
                    aria-expanded="false" aria-controls="collapseTwo"><i class="fas fa-briefcase-medical"></i>
                    &nbsp Tingkat Depresi Anda
                </button>
            </h2>
            <div id="collapseTwo" class="accordion-collapse collapse"
            aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
            <div class="accordion-body">
                <div class="table-responsive">
                    <table class="table table-bordered" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Kode Penyakit</th>
                                <th>Nama Penyakit</th>
                                <th>CF Hasil</th>
                                <th>Persentase</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th colspan="3">CF Terbesar</th>
                                <th><?= sprintf("%.4g", $resultDiagnosa['tingkat_kepercayaan']); ?></th>
                            </tr>
                            <tr>
                                <th colspan="3">Persentase Terbesar</th>
                                <th><?= $resultDiagnosa ['presentase']; ?></th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php foreach ($idPenyakitArray as $item) : ?>
                                <tr>
                                    <td><?= $item['kode_penyakit']; ?></td>
                                    <td><?= $item['nama_penyakit']; ?></td>
                                    <td><?= sprintf("%.4g", $item['cf_hasil']); ?></td>
                                    <td><?= $item['persentase']; ?>%</td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="mt-3">
        <div class="accordion" id="accordionExample">
            <!-- Collapse 2 - Pilih Gejala -->
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingTwo">
                    <button class="accordion-button collapsed" type="button"
                    data-bs-toggle="collapse" data-bs-target="#collapseThree"
                    aria-expanded="false" aria-controls="collapseThree"><i
                    class="fas fa-info-circle"></i>
                    &nbsp Detail Perhitungan
                </button>
            </h2>
            <div id="collapseThree" class="accordion-collapse collapse"
            aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
            <div class="accordion-body">
                <div class="table-responsive">
                    <table class="table table-bordered" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode Gejala</th>
                                <th>Gejala Terpilih</th>
                                <th>Tingkat Kepercayaan</th>
                                <th>Kode Penyakit</th>
                                <th>CF Pakar</th>
                                <th>CF User</th>
                                <th>CF User * CF Pakar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($resultDiagnosa['gejala'] as $gejala) : ?>
                                <tr>
                                    <td><?= $i++; ?></td>
                                    <td><?= $gejala['kode_gejala']; ?></td>
                                    <td><?= $gejala['nama_gejala']; ?></td>
                                    <td><?= $gejala['tingkat_kepercayaan']; ?> (<?= $gejala['cf_user']; ?>)</td>
                                    <td>
                                        <?php foreach ($penyakitCodes as $kode_penyakit) : ?>
                                            <?php if (in_array($kode_penyakit, $gejala['kode_penyakit'])) : ?>
                                                <p><?= $kode_penyakit ?></p>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </td>
                                    <td>
                                        <?php foreach ($cf as $item) : ?>
                                            <?php if ($item['id_gejala'] == $gejala['id_gejala']) : ?>
                                                <p><?= $item['cf']; ?></p>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </td>
                                    <td>
                                        <?php $cfUserCount = count($cf) ?>
                                        <?php if ($cfUserCount > 0): ?>
                                            <?php for ($j = 0; $j < $cfUserCount; $j++): ?>
                                                <?php if ($cf[$j]['id_gejala'] == $gejala['id_gejala']): ?>
                                                    <p><?= $cf[$j]['cf_user']; ?></p>
                                                <?php endif; ?>
                                            <?php endfor; ?>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <?php foreach ($cf as $value) : ?>
                                            <?php if ($value['id_gejala'] == $gejala['id_gejala']) : ?>
                                                <p><?= $value['nilai_cf']; ?></p>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                        <tfoot>
                            <tr class="table-warning">
                                <th colspan="7">
                                    Combine
                                </th>
                                <th>
                                    <?= sprintf("%.4g", $resultDiagnosa['tingkat_kepercayaan']); ?>
                                </th>
                            </tr>
                            <tr class="table-primary">
                                <th colspan="7">
                                    Persentase
                                </th>
                                <th>
                                    <?= $resultDiagnosa ['presentase']; ?>%
                                </th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>
</div>
</section>
<!-- End Informasi Section -->


<!-- ======= Cta Section ======= -->
<section id="cta" class="cta">
    <div class="container" data-aos="zoom-in">
        <div class="section-title">
            <h2 class="text-white">Tingkat Depresi Yang Dialami</h2>
        </div>
        <div class="row">
            <div class="col-lg-7 text-center text-lg-start">
                <h3><?= $resultDiagnosa['nama_penyakit']; ?> <?= $resultDiagnosa['kode_penyakit']; ?></h3>
                <p> <?= $resultDiagnosa['deskripsi']; ?></p><br>
                <h3>Solusi Penanganan <?= $resultDiagnosa['kode_penyakit']; ?></h3>
                <p> <?= $resultDiagnosa['solusi_penyakit']; ?></p>
            </div>
            <div class="col-lg-5 cta-btn-container text-center">
                <a class="cta-btn align-middle" href="<?= base_url('mahasiswa/cek_diagnosa') ?>"><i
                    class="fas fa-chevron-left"></i>
                Kembali</a>
                <a class="cta-btn align-middle" href="<?= base_url('mahasiswa/diagnosa/cetak_diagnosa') ?>"><i class="fas fa-download"></i> Unduh Diagnosa</a>
            </div>
        </div>

    </div>
</section>
<!-- End Cta Section -->
</main><!-- End #main -->

<?= $this->endSection() ?>