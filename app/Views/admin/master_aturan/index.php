<?= $this->extend('layout/app') ?>

<?= $this->section('content') ?>

<?= $this->include('components/alerts') ?>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header">
        <a href="<?= base_url('/admin/master_aturan/new') ?>" class="btn btn-primary btn-sm m-2" type="button"
            style="float: right;"><i class="fas fa-plus-circle"></i> Tambah Aturan</a>
        <h5 class="m-0 font-weight-bold text-primary m-2">
            <font color="#8B0000">Data Aturan</font>
        </h5>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode Penyakit</th>
                        <th>Kode Gejala</th>
                        <th>Nama Penyakit</th>
                        <th>Nama Gejala</th>
                        <th>MB</th>
                        <th>MD</th>
                        <th>CF</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($aturan as $row) : ?>
                    <tr>
                        <td><?= $i++; ?></td>
                        <td><?= $row['penyakit']['kode_penyakit']; ?></td>
                        <td><?= $row['gejala']['kode_gejala']; ?></td>
                        <td><?= $row['penyakit']['nama_penyakit'] ?? ''; ?></td>
                        <td><?= $row['gejala']['nama_gejala'] ?? ''; ?></td>
                        <td><?= $row['mb']; ?></td>
                        <td><?= $row['md']; ?></td>
                        <td><?= $row['cf']; ?></td>
                        <td align="center">
                            <a class="d-none d-sm-inline-block btn btn-circle btn-sm btn-warning shadow-sm"
                                href="<?= base_url('/admin/master_aturan/edit/'.$row['id_aturan']) ?>">
                                <i class="fas fa-pencil-alt"></i>
                            </a>
                            <form action="<?= base_url('/admin/master_aturan/'.$row['id_aturan']) ?>" method="POST"
                                style="display: inline-block;">
                                <?= csrf_field() ?>
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit"
                                    class="d-none d-sm-inline-block btn btn-circle btn-sm btn-danger shadow-sm"
                                    onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?= $this->endSection() ?>