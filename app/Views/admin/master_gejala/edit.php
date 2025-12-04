<?= $this->extend('layout/app') ?>

<?= $this->section('content') ?>

<?= $this->include('components/alerts') ?>

<!-- Begin Page Content -->
<div class="container-fluid col-md-10">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header">
            <h5 class="m-0 font-weight-bold text-primary m-2">
                <font color="#8B0000">Form Edit Gejala</font>
            </h5>
        </div>
        <div class="card-body">
            <form method="post" action="<?= base_url('admin/master_gejala/update/' . $gejala['id_gejala']) ?>">
                <?= csrf_field() ?>
                <div class="form-group">
                    <label for="kode_gejala">Kode Gejala</label>
                    <input type="text" class="form-control" name="kode_gejala" value="<?= $gejala['kode_gejala'] ?>"
                        readonly>
                </div>
                <div class="form-group">
                    <label for="nama_gejala">Nama Gejala</label>
                    <input type="text" class="form-control" name="nama_gejala" value="<?= $gejala['nama_gejala'] ?>">
                </div>
                <a href="<?= base_url('admin/master_gejala') ?>" type="submit" class="btn btn-warning">Batal</a>
                <button type="submit" class="btn btn-primary">Simpan</></button>
            </form>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

<?= $this->endSection() ?>