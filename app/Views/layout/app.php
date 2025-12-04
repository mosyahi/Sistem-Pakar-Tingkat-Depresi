<!DOCTYPE html>
<html lang="en">

<?php include 'dash/head.php'; ?>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php include 'dash/sidebar.php'; ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php include 'dash/header.php'; ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <?= $this->renderSection('content') ?>
                </div>

            </div>
            <!-- End Main Content -->

            <!-- Footer -->
            <?php include 'dash/footer.php'; ?>
            <!-- End of Footer -->

        </div>
        <!-- Content Row -->

    </div>
    <!-- End Page Wrapper -->

    <!-- Modal Logout-->
    <?php include 'dash/modal.php'; ?>

    <!-- Script -->
    <?php include 'dash/script.php'; ?>

</body>

</html>