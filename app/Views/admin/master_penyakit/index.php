<?= $this->extend('layout/app') ?>

<?= $this->section('content') ?>

<?= $this->include ('components/alerts') ?>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header">
        <a href="<?= base_url('/admin/master_penyakit/new') ?>" class="btn btn-primary btn-sm m-2" type="button"
            style="float: right;"><i class="fas fa-plus-circle"></i> Tambah Penyakit
        </a>
        <h5 class="m-0 font-weight-bold text-primary m-2">
            <font color="#8B0000">Data Penyakit</font>
        </h5>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode Penyakit</th>
                        <th>Nama Penyakit</th>
                        <th>Deskripsi</th>
                        <th>Solusi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $counter = 1; ?>
                    <?php foreach ($penyakit as $item) : ?>
                    <tr>
                        <td><?= $counter++ ?></td>
                        <td><?= $item['kode_penyakit'] ?></td>
                        <td><?= $item['nama_penyakit'] ?></td>
                        <td><?= $item['deskripsi_penyakit'] ?></td>
                        <td><?= $item['solusi_penyakit'] ?></td>
                        <td align="center">
                            <form action="<?= base_url('admin/master_penyakit/'.$item['id_penyakit']) ?>" method="post"
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

<?= $this->endSection() ?>