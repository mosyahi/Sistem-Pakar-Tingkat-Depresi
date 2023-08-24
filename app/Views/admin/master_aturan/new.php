<?= $this->extend('layout/app') ?>

<?= $this->section('content') ?>

<?= $this->include('components/alerts') ?>

<div class="card shadow mb-4">
    <div class="card-header">
        <h5 class="m-0 font-weight-bold text-primary">
            <font color="#8B0000">Form Tambah Aturan</font>
        </h5>
    </div>
    <div class="card-body">
        <form action="<?= base_url('/admin/master_aturan/simpan') ?>" method="POST">
            <?= csrf_field() ?>
            <div class="form-group">
                <label for="penyakit">Penyakit</label>
                <select class="form-control" id="penyakit" name="penyakit" required>
                    <option value="">Pilih Penyakit</option>
                    <?php foreach ($penyakit as $p) : ?>
                    <option value="<?= $p['id_penyakit']; ?>"><?= $p['kode_penyakit'] . ' - ' . $p['nama_penyakit']; ?>
                    </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="gejala">Gejala</label>
                <select class="form-control" id="gejala" name="gejala" required>
                    <option value="">Pilih Gejala</option>
                    <?php foreach ($gejala as $g) : ?>
                    <option value="<?= $g['id_gejala']; ?>"><?= $g['kode_gejala'] . ' - ' . $g['nama_gejala']; ?>
                    </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="mb">Nilai MB</label>
                <select class="form-control" id="mb" name="mb" required>
                    <option value="">Pilih Nilai MB</option>
                    <option value="0">0</option>
                    <option value="0.1">0.1</option>
                    <option value="0.2">0.2</option>
                    <option value="0.3">0.3</option>
                    <option value="0.4">0.4</option>
                    <option value="0.5">0.5</option>
                    <option value="0.6">0.6</option>
                    <option value="0.7">0.7</option>
                    <option value="0.8">0.8</option>
                    <option value="0.9">0.9</option>
                    <option value="1">1</option>
                </select>
            </div>
            <div class="form-group">
                <label for="md">Nilai MD</label>
                <select class="form-control" id="md" name="md" required>
                    <!-- <option value="">Pilih Nilai MD</option> -->
                    <option value="">Pilih Nilai MD</option>
                    <option value="0">0</option>
                    <option value="0.1">0.1</option>
                    <option value="0.2">0.2</option>
                    <option value="0.3">0.3</option>
                    <option value="0.4">0.4</option>
                    <option value="0.5">0.5</option>
                    <option value="0.6">0.6</option>
                    <option value="0.7">0.7</option>
                    <option value="0.8">0.8</option>
                    <option value="0.9">0.9</option>
                    <option value="1">1</option>
                </select>
            </div>
            <a href="<?= base_url('admin/master_aturan') ?>" type="submit" class="btn btn-warning">Batal</a>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</div>

<?= $this->endSection() ?>