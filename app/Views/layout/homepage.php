<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title><?= env('app.name') ?> <?= $title ?></title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="<?= base_url('img/umc.png') ?>" rel="icon">
    <link href="<?= base_url('landing/assets/img/apple-touch-icon.png') ?>" rel="apple-touch-icon">
    <link href="<?= base_url('vendor/fontawesome-free/css/all.min.css') ?>" rel="stylesheet" type="text/css">

    <!-- Google Fonts -->
    <!-- <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css"> -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="<?= base_url('landing/assets/vendor/aos/aos.css') ?>" rel="stylesheet">
    <link href="<?= base_url('landing/assets/vendor/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet">
    <link href="<?= base_url('landing/assets/vendor/bootstrap-icons/bootstrap-icons.css') ?>" rel="stylesheet">
    <link href="<?= base_url('landing/assets/vendor/boxicons/css/boxicons.min.css') ?>" rel="stylesheet">
    <link href="<?= base_url('landing/assets/vendor/glightbox/css/glightbox.min.css') ?>" rel="stylesheet">
    <link href="<?= base_url('landing/assets/vendor/remixicon/remixicon.css') ?>" rel="stylesheet">
    <link href="<?= base_url('landing/assets/vendor/swiper/swiper-bundle.min.css') ?>" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="<?= base_url('landing/assets/css/css.css') ?>" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.min.css">
    
    <!-- =======================================================
  * Template Name: Arsha
  * Updated: Mar 10 2023 with Bootstrap v5.2.3
  * Template URL: https://bootstrapmade.com/arsha-free-bootstrap-html-template-corporate/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>
    <div id="preloader"></div>

    <!-- Content -->
    <?= $this->renderSection('contentHome') ?>
    <!-- End Content -->

    <!-- ======= Footer ======= -->
    <footer id="footer">
        <div class="footer-top">
            <div class="container">
                <div class="row d-flex align-items-center justify-content-center">

                    <div class="col-lg-3 col-md-6 footer-contact">
                        <h3>Sispasi UMC</h3>
                        <p>
                            Jalan Watubelah <br>
                            Kabupaten Cirebon, Jawa Barat<br>
                            Indonesia <br><br>
                            <strong>Phone:</strong> 0231 xxxxx<br>
                            <strong>Email:</strong> umc@umc.ac.id<br>
                        </p>
                    </div>

                    <div class="col-lg-3 col-md-6 footer-links">
                        <h4>Media Sosial</h4>
                        <p>Untuk informasi lebih lanjut terkait aplikasi sistem pakar diagnosa tingkat depresi
                            silahkan
                            hubungi sosial media kami.</p>
                        <div class="social-links mt-3">
                            <a href="https://www.umc.ac.id/" class="twitter"><i class="bx bxl-google"></i></a>
                            <a href="https://www.facebook.com/universitasmuhammadiyahcirebon/" class="facebook"><i class="bx bxl-facebook"></i></a>
                            <a href="https://www.instagram.com/umc.cirebon/" class="instagram"><i class="bx bxl-instagram"></i></a>
                            <a href="https://twitter.com/UM_Cirebon" class="linkedin"><i class="bx bxl-twitter"></i></a>
                            <a href="https://wa.me/628988658838" class="google-plus"><i class="bx bxl-whatsapp"></i></a>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <!-- Footer Homepage -->
        <?php include 'homepage/footer_homepage.php'; ?>
        <!-- End Footer Page -->

    </footer><!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="<?= base_url('landing/assets/vendor/aos/aos.js') ?>"></script>
    <script src="<?= base_url('landing/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
    <script src="<?= base_url('landing/assets/vendor/glightbox/js/glightbox.min.js') ?>"></script>
    <script src="<?= base_url('landing/assets/vendor/isotope-layout/isotope.pkgd.min.js') ?>"></script>
    <script src="<?= base_url('landing/assets/vendor/swiper/swiper-bundle.min.js') ?>"></script>
    <script src="<?= base_url('landing/assets/vendor/waypoints/noframework.waypoints.js') ?>"></script>
    <script src="<?= base_url('landing/assets/vendor/php-email-form/validate1.js') ?>"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>

    <!-- Template Main JS File -->
    <script src="<?= base_url('landing/assets/js/main.js') ?>"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.all.min.js"></script>

</body>

</html>