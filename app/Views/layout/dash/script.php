<script>
const togglePassword = document.querySelector('#togglePassword');
const password = document.querySelector('#password');
const eyeSlashIcon = document.querySelector('#eyeSlashIcon');
const eyeIcon = document.querySelector('#eyeIcon');

togglePassword.addEventListener('click', function() {
    const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
    password.setAttribute('type', type);
    eyeSlashIcon.style.display = type === 'password' ? 'block' : 'none';
    eyeIcon.style.display = type === 'password' ? 'none' : 'block';
});
</script>

<!-- Bootstrap core JavaScript-->
<script src="<?= base_url('public/vendor/jquery/jquery.min.js') ?>"></script>
<script src="<?= base_url('public/vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>

<!-- Core plugin JavaScript-->
<script src="<?= base_url('public/vendor/jquery-easing/jquery.easing.min.js') ?>"></script>

<!-- Custom scripts for all pages-->
<script src="<?= base_url('public/js/sb-admin-2.min.js') ?>"></script>

<!-- Page level plugins -->
<script src="<?= base_url('public/vendor/datatables/jquery.dataTables.min.js') ?>"></script>
<script src="<?= base_url('public/vendor/datatables/dataTables.bootstrap4.min.js') ?>"></script>

<!-- Page level custom scripts -->
<script src="<?= base_url('public/js/demo/datatables-demo.js') ?>"></script>