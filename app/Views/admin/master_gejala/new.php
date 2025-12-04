<?= $this->extend('layout/app') ?>

<?= $this->section('content') ?>

<?= $this->include('components/alerts') ?>

<!-- Begin Page Content -->
<div class="container-fluid col-md-10">

    <div class="d-sm-flex align-items-center justify-content-between mb-2">
        <h1 class="h3 mb-0 text-gray-800"></h1>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header">
            <h5 class="m-0 font-weight-bold text-primary m-2">
                <font color="#8B0000">Form Tambah Gejala</font>
            </h5>
        </div>
        <div class="card-body">
            <form method="post" action="<?= base_url('admin/master_gejala/simpan') ?>">
                <?= csrf_field() ?>
                <div class="form-group">
                    <label for="kode_gejala">Kode Gejala</label>
                    <input type="text" class="form-control" name="kode_gejala" required>
                </div>
                <div class="form-group">
                    <label for="nama_gejala">Nama Gejala</label>
                    <input type="text" class="form-control" name="nama_gejala" required>
                </div>
                <a href="<?= base_url('admin/master_gejala') ?>" type="submit" class="btn btn-warning">Kembali</a>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection() ?>