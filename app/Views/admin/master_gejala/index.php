<?= $this->extend('layout/app') ?>

<?= $this->section('content') ?>

<?= $this->include('components/alerts') ?>

<!-- Content Data Tabel Gejala -->
<div class="card shadow mb-4">
    <div class="card-header">
        <a href="<?= base_url('/admin/master_gejala/new') ?>" class="btn btn-primary btn-sm m-2" type="button"
            style="float: right;"><i class="fas fa-plus-circle"></i> Tambah Gejala
        </a>
        <h5 class="m-0 font-weight-bold text-primary m-2">
            <font color="#8B0000">Data Gejala</font>
        </h5>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode Gejala</th>
                        <th>Gejala</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $counter = 1; ?>
                    <?php foreach ($gejala as $item) : ?>
                    <tr>
                        <td><?= $counter++ ?></td>
                        <td><?= $item['kode_gejala'] ?></td>
                        <td><?= $item['nama_gejala'] ?></td>
                        <td align="center">
                            <form action="<?= base_url('admin/master_gejala/'.$item['id_gejala']) ?>" method="post"
                                class="inline-block">
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>">
                                <a class="d-none d-sm-inline-block btn btn-circle btn-sm btn-warning shadow-sm"
                                    href="<?= $item['edit_url'] ?>">
                                    <i class="fas fa-pencil-alt"></i>
                                </a>
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
<!-- Akhir Content -->

<?= $this->endSection() ?>