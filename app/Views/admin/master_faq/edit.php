<?= $this->extend('layout/app') ?>

<?= $this->section('content') ?>

<?= $this->include('components/alerts') ?>

<!-- Begin Page Content -->
<div class="container-fluid col-md-10">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header">
            <h5 class="m-0 font-weight-bold text-primary m-2">
                <font color="#8B0000">Form Edit FAQ</font>
            </h5>
        </div>
        <div class="card-body">
            <form method="post" action="<?= base_url('admin/master_faq/update/' . $faq['id_faq']) ?>">
                <?= csrf_field() ?>
                <div class="form-group">
                    <label for="pertanyaan">Pertanyaan</label>
                    <input type="text" class="form-control" name="pertanyaan" value="<?= $faq['pertanyaan'] ?>"
                        required>
                </div>
                <div class="form-group">
                    <label for="jawaban">Jawaban</label>
                    <textarea class="form-control" name="jawaban"><?= $faq['jawaban'] ?></textarea>
                </div>
                <a href="<?= base_url('admin/master_faq') ?>" type="submit" class="btn btn-warning">Batal</a>
                <button type="submit" class="btn btn-primary">Simpan</></button>
            </form>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

<?= $this->endSection() ?>