<?= $this->extend('layout/homepage') ?>

<?= $this->section('contentHome') ?>

<!-- ======= Header ======= -->
<header id="header" class="fixed-top ">
    <div class="container d-flex align-items-center">

        <h5 class="logo me-auto" style="font-size: 20px;">
            <img src="<?= base_url() ?>img/umc.png" class="mb-1" style="height: 28px; width: 28px;" alt="">
            <a href="#home">Sispasi Umc </a>
        </h5>

        <nav id="navbar" class="navbar">
            <ul>
                <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
                <li><a class="nav-link scrollto" href="#tentang">Tentang</a></li>
                <li><a class="nav-link scrollto" href="#informasi">Informasi</a></li>
                <li><a class="nav-link scrollto" href="#faq">Faq</a></li>
                <li><a class="nav-link scrollto" href="#contact">Kontak</a></li>
                <li class="dropdown"><a href="#"><span>Daftar</span> <i class="bi bi-chevron-down"></i></a>
                    <ul>
                      <li><a href="<?= base_url('register') ?>">Daftar Akun</a></li>
                      <li><a href="<?= base_url('forgot-password') ?>">Lupa Password</a></li>
                  </ul>
              </li>
              <li><a class="getstarted scrollto" href="<?= base_url('login-mahasiswa') ?>">Sign-In</a></li>
          </ul>
          <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

  </div>
</header>
<!-- End Header -->

<!-- ======= Home Section ======= -->
<section id="hero" class="d-flex align-items-center">

    <div class="container">
        <div class="row">
            <div class="col-lg-8 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1"
            data-aos="fade-up" data-aos-delay="200">
            <h1>SISPASI UMC</h1>
            <h2 class="mb-4">Sistem Pakar Diagnosa <strong class="text-warning">Tingkat Depresi</strong>
                Mahasiswa Tingkat Akhir Universitas Muhammadiyah
            Cirebon</h2>
            <div class="d-flex justify-content-center justify-content-lg-start mt-3">
                <a href="<?= base_url ('login-mahasiswa') ?>" class="btn-get-started scrollto">Cek Tingkat Depresimu
                Sekarang</a>
                <a class="btn-watch-video" id="liveToastBtn"><i class="fas fa-heartbeat"></i></a>
            </div>
        </div>
        <div class="col-lg-4 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="200">
            <img src="<?= base_url() ?>img/umc.png" class="img-fluid animated"
            style="height: 240px; width: 240px; margin-bottom: 50px; margin-top: -50px;">
        </div>
    </div>
</div>

</section>
<!-- End Home -->

<main id="main">

    <!-- ======= Tentang Section ======= -->
    <section id="tentang" class="about">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>Tentang</h2>
            </div>

            <div class="row content">
                <div class="col-lg-6 text-center">
                    <p>
                        Aplikasi sistem pakar yang dirancang khusus untuk mendiagnosa tingkat depresi pada mahasiswa
                        tingkat akhir merupakan solusi inovatif untuk membantu dalam penilaian dan pemahaman
                        terhadap kondisi kesehatan mental para mahasiswa. Dengan menggunakan kecerdasan buatan dan
                        basis pengetahuan yang dikembangkan oleh pakar di bidang psikologi, aplikasi
                        ini dapat memberikan hasil diagnosa yang akurat dan rekomendasi yang tepat.
                    </p>
                </div>
                <div class="col-lg-6 pt-4 pt-lg-0">
                    <ul>
                        <li><i class="ri-check-double-line"></i> Aplikasi ini didasarkan pada pengetahuan dan
                        pengalaman para pakar di bidang psikologi.</li>
                        <li><i class="ri-check-double-line"></i> Aplikasi ini memiliki gejala-gejala khas yang
                            berkaitan dengan depresi pada mahasiswa tingkat akhir berdasarkan pengetahuan pakar.
                        </li>
                        <li><i class="ri-check-double-line"></i> Aplikasi sistem pakar ini menggunakan metode
                            Certainty Factor (CF) untuk menghitung tingkat keyakinan terhadap diagnosa yang
                        diberikan.</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- ======= Informasi Section ======= -->
    <section id="informasi" class="services section-bg">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>Informasi</h2>
                <p>Dalam Ilmu kesehatan khususnya penyakit depresi memiliki beberapa tingkatan, dan masing-masing
                    tingkatan tersebut mempunyai level waspada. berikut adalah tingkatan depresi yang terdapat pada
                aplikasi ini.</p>
            </div>

            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-12 d-flex align-items-stretch mt-4 mt-md-0" data-aos="zoom-in"
                data-aos-delay="200">
                <div class="icon-box">
                    <div class="icon"><i class="bx bx-plus-medical" style="color: #54DA5D;"></i></div>
                    <h4><a href="#informasi">Mild Major Depressive Disorder </a></h4>
                    <p>tingkat depresi mayor yang memiliki gejala yang lebih ringan dibandingkan dengan tingkat yang lebih parah. Pada tingkat ini, gejala depresi biasanya memengaruhi kehidupan sehari-hari, namun individu masih dapat menjalani aktivitas sehari-hari dengan tingkat fungsionalitas yang relatif normal.</p>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 col-sm-12 d-flex align-items-stretch mt-4 mt-md-0" data-aos="zoom-in"
            data-aos-delay="300">
            <div class="icon-box">
                <div class="icon"><i class="bx bx bx-plus-medical" style="color: #E6E44C;"></i></div>
                <h4><a href="#informasi">Moderate Major Depressive Disorder</a></h4>
                <p>tingkat depresi mayor yang memiliki gejala sedang. Pada tingkat ini, gejala depresi dapat lebih mengganggu kehidupan sehari-hari individu dan mempengaruhi fungsionalitas mereka dalam berbagai bidang, seperti pekerjaan, hubungan, atau aktivitas sosial.</p>
            </div>
        </div>

        <div class="col-lg-4 col-md-6 col-sm-12 d-flex align-items-stretch mt-4 mt-md-0" data-aos="zoom-in"
        data-aos-delay="400">
        <div class="icon-box">
            <div class="icon"><i class="bx bx-plus-medical" style="color: #DD3A3A;"></i></div>
            <h4><a href="#informasi">Severe Major Depressive Disorder</a></h4>
            <p>tingkat depresi mayor yang memiliki gejala yang sangat parah dan mengganggu. Pada tingkat ini, gejala depresi sangat menghambat individu dalam menjalani kehidupan sehari-hari. Mereka mungkin mengalami kesulitan dalam menjalankan tugas-tugas rutin, berinteraksi dengan orang lain, atau bahkan memiliki pemikiran atau perilaku yang berpotensi merugikan diri sendiri.</p>
        </div>
    </div>
</div>

<div class="row bagian-dua">
    <div class="col-lg-4 col-md-6 col-sm-12 d-flex align-items-stretch mt-4 mt-md-0" data-aos="zoom-in"
    data-aos-delay="400">
    <div class="icon-box">
        <div class="icon"><i class="bx bx-plus-medical" style="color: #54DA5D;"></i></div>
        <h4><a href="#informasi">Mild Persistent Depressive Disorder (Dysthymia)</a></h4>
        <p>tingkat yang lebih ringan dari Dysthymia. Pada tingkat ini, gejala depresi ada dan terjadi secara terus-menerus selama setidaknya dua tahun, tetapi gejalanya cenderung lebih ringan dan dapat dikelola dengan lebih baik dibandingkan dengan tingkat yang lebih parah.</p>
    </div>
</div>

<div class="col-lg-4 col-md-6 col-sm-12 d-flex align-items-stretch mt-4 mt-md-0" data-aos="zoom-in"
data-aos-delay="400">
<div class="icon-box">
    <div class="icon"><i class="bx bx-plus-medical" style="color: #E6E44C;"></i></div>
    <h4><a href="#informasi">Moderate Persistent Depressive Disorder (Dysthymia) </a></h4>
    <p>tingkat Dysthymia yang memiliki gejala sedang. Pada tingkat ini, gejala depresi dapat lebih mengganggu dan mempengaruhi kehidupan sehari-hari individu dengan lebih signifikan.</p>
</div>
</div>

<div class="col-lg-4 col-md-6 col-sm-12 d-flex align-items-stretch mt-4 mt-md-0" data-aos="zoom-in"
data-aos-delay="400">
<div class="icon-box">
    <div class="icon"><i class="bx bx-plus-medical" style="color: #DD3A3A;"></i></div>
    <h4><a href="#informasi">Severe Persistent Depressive Disorder (Dysthymia)</a></h4>
    <p>tingkat Dysthymia yang memiliki gejala yang sangat parah dan menghambat. Pada tingkat ini, gejala depresi yang berat dan terus-menerus mengganggu fungsionalitas individu secara signifikan dalam berbagai aspek kehidupan, termasuk pekerjaan, hubungan, dan kesejahteraan umum.</p>
</div>
</div>
</div>
</div>
</section>
<!-- End Informasi Section -->

<!-- ======= FAQ Section ======= -->
<section id="faq" class="faq section-bg">
    <div class="container" data-aos="fade-up">

        <div class="section-title">
            <h2>FAQ</h2>
            <p>Beberapa pertanyaan yang sering diajukan oleh pasien atau user yang akan melakukan diagnosa terkait
            tingkat depresi yang dialami.</p>
        </div>

        <div class="faq-list">
            <ul>
                <?php foreach ($faq as $row) : ?>
                    <li data-aos="fade-up" data-aos-delay="100">
                        <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" class="collapse"
                        data-bs-target="#faq-list-<?= $row->id_faq ?>"> <?= $row->pertanyaan ?> <i
                        class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                        <div id="faq-list-<?= $row->id_faq ?>" class="collapse" data-bs-parent=".faq-list">
                            <p style="margin-left: 30px;""><?= $row->jawaban ?></p>
                        </div>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>

    </div>
</section>
<!-- End FAQ Section -->

<!-- ======= Contact Section ======= -->
<section id="contact" class="contact">
  <div class="container" data-aos="fade-up">

    <div class="section-title">
      <h2>Kontak</h2>
      <p>Informasi kontak universitas muhammadiyah cirebon yang dapat dihubungi. Dan berikan juga kritik dan saran anda terhadap Aplikasi Sispasi UMC.</p>
  </div>

  <div class="row">

      <div class="col-lg-5 d-flex align-items-stretch">
        <div class="info">
          <div class="address">
            <i class="bi bi-geo-alt"></i>
            <h4>Lokasi:</h4>
            <p>Jalan Watubelah, Kab Cirebon, Jawa Barat</p>
        </div>

        <div class="email">
            <i class="bi bi-envelope"></i>
            <h4>Email:</h4>
            <p>mochsyarifhidayat24@gmail.com</p>
        </div>

        <div class="phone">
            <i class="bi bi-phone"></i>
            <h4>Call:</h4>
            <p>+628988658xxx</p>
        </div>

        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31697.83756220836!2d108.45726361083985!3d-6.741812499999993!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6f1e22287a46eb%3A0x354ab97c26d6f778!2sGedung%20Fakultas%20FISIP%20%26%20TEKNIK%20Universitas%20Muhammadiyah%20Cirebon!5e0!3m2!1sen!2sid!4v1691069568198!5m2!1sen!2sid" frameborder="0" style="border:0; width: 100%; height: 290px;" allowfullscreen></iframe>
    </div>

</div>

<div class="col-lg-7 mt-5 mt-lg-0 d-flex align-items-stretch">
    <form action="<?= base_url('contact/sendEmail') ?>" method="post" role="form" class="php-email-form">
        <div class="row">
            <div class="form-group col-md-6">
                <label for="namaLengkap">Nama Lengkap</label>
                <input type="text" name="namaLengkap" class="form-control" id="namaLengkap" required>
            </div>
            <div class="form-group col-md-6">
                <label for="email">Email</label>
                <input type="email" class="form-control" name="email" id="email" required>
                <p class="email-note text-danger" style="font-size: 12px;">*Anda akan menerima email balasan</p>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-6">
                <label for="phone">No Handphone</label>
                <input type="number" name="phone" class="form-control" id="phone" required>
            </div>
            <div class="form-group col-md-6">
                <label for="judul">Judul Pesan</label>
                <input type="text" class="form-control" name="judul" id="judul" required>
            </div>
        </div>
        <div class="form-group">
            <label for="isi">Isi Pesan</label>
            <textarea class="form-control" name="isi" rows="10" required></textarea>
        </div>
        <div class="my-3">
            <div class="loading">Loading</div>
            <div class="alert alert-success error-message"></div>
            <div class="alert alert-success sent-message"></div>
        </div>
        <div class="text-center">
            <button type="submit" id="kirimBtn">Kirim Pesan</button>
        </div>
    </form>
</div>
</div>
</div>
</section><!-- End Contact Section -->

<div class="toast-container position-fixed bottom-0 end-0 p-3">
    <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header">
            <img src="<?= base_url() ?>img/umc.png" width="17px" height="17px" class="rounded me-2" alt="...">
            <strong class="me-auto">Jumlah Data Rekam Diagnosa</strong>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body text-center">
            <h3 color="#8b0000" id="dataCount"><?= count($laporan) ?></h3>Diagosasis sudah dilakukan oleh berbagai pengguna
        </div>
    </div>
</div>

<script>
    const toastTrigger = document.getElementById('liveToastBtn');
    const toastLiveExample = document.getElementById('liveToast');
    const dataCountElement = document.getElementById('dataCount');
    const maxDataCount = <?php echo count($laporan); ?>;
    const animationDuration = 5000; // Durasi animasi dalam milidetik (ms)
    const updateInterval = 100; // Interval waktu antara dua perubahan nilai (ms)

    if (toastTrigger) {
        toastTrigger.addEventListener('click', () => {
            const toast = new bootstrap.Toast(toastLiveExample);
            toast.show();
            animateDataCount();
        });
    }

    function animateDataCount() {
        let currentValue = 0;
        const increment = Math.ceil(maxDataCount / (animationDuration / updateInterval));

        const interval = setInterval(() => {
            currentValue += increment;
            if (currentValue >= maxDataCount) {
                currentValue = maxDataCount;
                clearInterval(interval);
            }
            dataCountElement.textContent = currentValue;
        }, updateInterval);
    }
</script>

<style>
    /* Animasi gerakan atas bawah */
    @keyframes moveUpDown {
        0%, 100% {
            transform: translateY(0);
        }
        50% {
            transform: translateY(-10px);
        }
    }

    /* Animasi gerakan kiri kanan */
    @keyframes moveLeftRight {
        0%, 100% {
            transform: translateX(0);
        }
        50% {
            transform: translateX(10px);
        }
    }

    /* Animasi perubahan warna ikon hati */
    @keyframes changeIconColor {
        0% {
            color: white;
        }
        25% {
            color: pink;
        }
        50% {
            color: #8b0000;
        }
        75% {
            color: #dec37a;
        }
        100% {
            color: white;
        }
    }

    /* Gaya untuk tombol hati */
    .btn-watch-video {
        display: inline-block;
        cursor: pointer;
        animation: moveUpDown 2s infinite alternate, moveLeftRight 3s infinite alternate; /* Mengatur animasi bergerak secara bergantian untuk pergerakan atas bawah dan kiri kanan */
    }

    /* Gaya untuk ikon hati */
    .btn-watch-video i {
        animation: changeIconColor 10s infinite; /* Mengatur animasi perubahan warna ikon hati dengan durasi 4 detik dan berulang */
        transition: color 0.5s; /* Menambahkan efek transisi untuk perubahan warna ikon */
    }
</style>

<script>
// Fungsi untuk mengaktifkan animasi pada tombol
    function activateButtonAnimation() {
      const button = document.getElementById('liveToastBtn');
      button.classList.add('active');

  // Hapus kelas 'active' setelah 1 detik (sesuaikan dengan durasi animasi)
      setTimeout(() => {
        button.classList.remove('active');
    }, 1000);
  }

// Event listener untuk tombol diklik
  document.getElementById('liveToastBtn').addEventListener('click', function () {
      activateButtonAnimation();
  // Tambahkan fungsi lain yang ingin Anda lakukan saat tombol diklik di sini
  });

</script>


</main><!-- End #main -->

<?= $this->endSection() ?>