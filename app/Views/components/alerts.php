<!-- Alerts Unutuk menampilkan pemberitahuan sukses/gagal -->
<?php if (session()->getFlashdata('error')) : ?>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        Swal.fire({
            icon: 'error',
            title: 'Error!',
            text: "<?= session()->getFlashdata('error') ?>",
                showConfirmButton: true // Menampilkan tombol "OK"
            });
    });
</script>
<?php endif; ?>

<?php if (session()->getFlashdata('success')) : ?>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        Swal.fire({
            icon: 'success',
            title: 'Success!',
            text: "<?= session()->getFlashdata('success') ?>",
            showConfirmButton: true
        });
    });
</script>
<?php endif; ?>

<?php if (session()->getFlashdata('logSuccess')) : ?>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        Swal.fire({
            icon: 'success',
            title: 'Login Berhasil!',
            text: "<?= session()->getFlashdata('logSuccess') ?>",
            showConfirmButton: true
        });
    });
</script>
<?php endif; ?>

<?php if (session()->getFlashdata('errorVal')) : ?>
<div class="alert alert-danger alert-fade" role="alert">
    <?= session()->getFlashdata('errorVal') ?>
</div>
<script>
setTimeout(function() {
    var errorAlert = document.querySelector('.alert-danger');
    errorAlert.classList.add('fade-out');
    setTimeout(function() {
        errorAlert.style.display = 'none';
    }, 500); 
}, 5000); 
</script>
<?php endif; ?>

<style>
    .alert-fade {
        transition: opacity 0.5s ease-out;
    }

    .fade-out {
        opacity: 0;
        transition: opacity 0.5s ease-out;
    }
</style>
<!-- End Alert -->

<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>