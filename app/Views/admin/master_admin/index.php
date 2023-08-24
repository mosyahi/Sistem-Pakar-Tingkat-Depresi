<?= $this->extend('layout/app') ?>

<?= $this->section('content') ?>

<?= $this->include('components/alerts') ?>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header">
        <div class="btn-group float-right">
            <button type="button" class="btn btn-primary btn-sm mx-2 dropdown-toggle" data-toggle="dropdown"
            aria-expanded="false"><i class="fas fa-cog"></i>&nbsp Aksi
        </button>
        <div class="dropdown-menu">
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#konfirmasiTruncate"><i
                    class="fas fa-trash" style="color: #fc2f2f;"></i>&nbsp Hapus Semua Data Admin</a>
                </div>
            </div>
            <h5 class="m-0 font-weight-bold text-primary m-2">
                <font color="#8B0000">Data Admin</font>
            </h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Username</th>
                            <th>Password</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $counter = 1; ?>
                        <?php foreach ($dataAdmin as $item) : ?>
                            <tr>
                                <td><?= $counter++ ?></td>
                                <td><?= $item['nama_lengkap'] ?></td>
                                <td><?= $item['username'] ?></td>
                                <td><?= str_repeat('*', min(strlen($item['password']), 8)) ?></td>
                                <td class="text-center">
                                    <form action="<?= base_url('admin/master_admin/'.$item['id_admin']) ?>" method="post" class="inline-block">
                                        <?= csrf_field() ?>
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button type="submit" class="d-none d-sm-inline-block btn btn-circle btn-sm btn-danger shadow-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
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

    <!-- Modal Konfirmasi Truncate Data -->
    <div class="modal fade" id="konfirmasiTruncate" tabindex="-1" role="dialog" aria-labelledby="confirmTruncateModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmTruncateModalLabel">Konfirmasi Truncate Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Apakah Anda yakin ingin menghapus seluruh data? Data akan dihapus secara permanen dari database.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <a href="<?= base_url('admin/master_admin/truncateData') ?>" class="btn btn-danger">Hapus Data</a>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>