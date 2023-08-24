<?= $this->extend('layout/app') ?>

<?= $this->section('content') ?>

<?= $this->include('components/alerts') ?>

<div class="card shadow mb-4">
    <div class="card-header">
        <h5 class="m-0 font-weight-bold text-primary">
            <font color="#8B0000">Form Edit Aturan</font>
        </h5>
    </div>
    <div class="card-body">
        <form action="<?= base_url('/admin/master_aturan/update/'.$aturan['id_aturan']) ?>" method="POST">
            <?= csrf_field() ?>
            <div class="form-group">
                <label for="kode_penyakit">Penyakit</label>
                <select class="form-control" id="kode_penyakit" name="penyakit">
                    <?php foreach ($penyakit as $p) : ?>
                    <option value="<?= $p['id_penyakit'] ?>"
                        <?= ($aturan['id_penyakit'] == $p['id_penyakit']) ? 'selected' : '' ?>>
                        <?= $p['kode_penyakit'] . ' - ' . $p['nama_penyakit']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="kode_gejala">Gejala</label>
                <select class="form-control" id="kode_gejala" name="gejala">
                    <?php foreach ($gejala as $g) : ?>
                    <option value="<?= $g['id_gejala'] ?>"
                        <?= ($aturan['id_gejala'] == $g['id_gejala']) ? 'selected' : '' ?>>
                        <?= $g['kode_gejala'] . ' - ' . $g['nama_gejala']; ?>
                    </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="mb">Nilai MB</label>
                <select class="form-control" id="mb" name="mb">
                    <option value="0" <?= ($aturan['mb'] == 0) ? 'selected' : '' ?>>0</option>
                    <option value="0.1" <?= ($aturan['mb'] == 0.1) ? 'selected' : '' ?>>0.1</option>
                    <option value="0.2" <?= ($aturan['mb'] == 0.2) ? 'selected' : '' ?>>0.2</option>
                    <option value="0.3" <?= ($aturan['mb'] == 0.3) ? 'selected' : '' ?>>0.3</option>
                    <option value="0.4" <?= ($aturan['mb'] == 0.4) ? 'selected' : '' ?>>0.4</option>
                    <option value="0.5" <?= ($aturan['mb'] == 0.5) ? 'selected' : '' ?>>0.5</option>
                    <option value="0.6" <?= ($aturan['mb'] == 0.6) ? 'selected' : '' ?>>0.6</option>
                    <option value="0.7" <?= ($aturan['mb'] == 0.7) ? 'selected' : '' ?>>0.7</option>
                    <option value="0.8" <?= ($aturan['mb'] == 0.8) ? 'selected' : '' ?>>0.8</option>
                    <option value="0.9" <?= ($aturan['mb'] == 0.9) ? 'selected' : '' ?>>0.9</option>
                    <option value="1" <?= ($aturan['mb'] == 1) ? 'selected' : '' ?>>1</option>
                </select>
            </div>
            <div class="form-group">
                <label for="md">Nilai MD</label>
                <select class="form-control" id="md" name="md">
                    <option value="0" <?= ($aturan['md'] == 0) ? 'selected' : '' ?>>0</option>
                    <option value="0.1" <?= ($aturan['md'] == 0.1) ? 'selected' : '' ?>>0.1</option>
                    <option value="0.2" <?= ($aturan['md'] == 0.2) ? 'selected' : '' ?>>0.2</option>
                    <option value="0.3" <?= ($aturan['md'] == 0.3) ? 'selected' : '' ?>>0.3</option>
                    <option value="0.4" <?= ($aturan['md'] == 0.4) ? 'selected' : '' ?>>0.4</option>
                    <option value="0.5" <?= ($aturan['md'] == 0.5) ? 'selected' : '' ?>>0.5</option>
                    <option value="0.6" <?= ($aturan['md'] == 0.6) ? 'selected' : '' ?>>0.6</option>
                    <option value="0.7" <?= ($aturan['md'] == 0.7) ? 'selected' : '' ?>>0.7</option>
                    <option value="0.8" <?= ($aturan['md'] == 0.8) ? 'selected' : '' ?>>0.8</option>
                    <option value="0.9" <?= ($aturan['md'] == 0.9) ? 'selected' : '' ?>>0.9</option>
                    <option value="1" <?= ($aturan['md'] == 1) ? 'selected' : '' ?>>1</option>
                </select>
            </div>
            <a href="<?= base_url('admin/master_aturan') ?>" type="submit" class="btn btn-warning">Batal</a>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</div>

<?= $this->endSection() ?>