<?= $this->extend('layout/app') ?>

<?= $this->section('content') ?>

<?= $this->include('components/alerts') ?>

<!-- Begin Page Content -->
<div class="container-fluid col-md-10">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header">
            <h5 class="m-0 font-weight-bold text-primary m-2">
                <font color="#8B0000">Form Edit Penyakit</font>
            </h5>
        </div>
        <div class="card-body">
            <form method="post" action="<?= base_url('admin/master_penyakit/update/' . $penyakit['id_penyakit']) ?>">
                <?= csrf_field() ?>
                <div class="form-group">
                    <label for="kode_penyakit">Kode Penyakit</label>
                    <input type="text" class="form-control" name="kode_penyakit"
                        value="<?= $penyakit['kode_penyakit'] ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="nama_penyakit">Nama Penyakit</label>
                    <input type="text" class="form-control" name="nama_penyakit"
                        value="<?= $penyakit['nama_penyakit'] ?>">
                </div>
                <div class="form-group">
                    <label for="deskripsi_penyakit">Deskripsi</label>
                    <textarea class="form-control"
                        name="deskripsi_penyakit"><?= $penyakit['deskripsi_penyakit'] ?></textarea>
                </div>
                <div class="form-group">
                    <label for="solusi_penyakit">Solusi</label>
                    <textarea class="form-control" name="solusi_penyakit"><?= $penyakit['solusi_penyakit'] ?></textarea>
                </div>
                <a href="<?= base_url('admin/master_penyakit') ?>" type="submit" class="btn btn-warning">Batal</a>
                <button type="submit" class="btn btn-primary">Simpan</></button>
            </form>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

<?= $this->endSection() ?>