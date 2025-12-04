<?= $this->extend('layout/app') ?>

<?= $this->section('content') ?>

<?= $this->include('components/alerts') ?>

<!-- Data Laporan Diagnosa -->
<div class="card shadow mb-4">
    <div class="card-header">
        <div class="btn-group float-right">
            <button type="button" class="btn btn-primary btn-sm mx-2 dropdown-toggle" data-toggle="dropdown"
            aria-expanded="false"><i class="fas fa-cog"></i>&nbsp Aksi
        </button>
        <div class="dropdown-menu">
            <a class="dropdown-item" href="<?= base_url('admin/master_laporan/cetakPdf') ?>"><i
                class="fas fa-download" style="color: #3643b5;"></i>&nbsp Unduh PDF</a>
                <a class="dropdown-item" href="<?= base_url('admin/master_laporan/cetakExcel') ?>"><i
                    class="fas fa-download" style="color: #3643b5;"></i>&nbsp Unduh Excel</a>
                    <a class="dropdown-item" href="<?= base_url('admin/master_laporan/cetakLangsung') ?>"><i
                        class="fas fa-print" style="color: #3643b5;"></i>&nbsp Cetak Langsung</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#konfirmasiTruncate"><i
                            class="fas fa-trash" style="color: #fc2f2f;"></i>&nbsp Hapus Semua Data</a>
                        </div>
                    </div>
                    <h5 class="m-0 font-weight-bold text-primary m-2">
                        <font color="#8B0000">Laporan Diagnosa</font>
                    </h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Mahasiswa</th>
                                    <th>NIM</th>
                                    <th>Semester</th>
                                    <th>Tanggal</th>
                                    <th>Penyakit</th>
                                    <th>CF Akhir</th>
                                    <th>Presentase</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($laporan as $key => $row): ?>
                                    <tr>
                                        <td><?= $key + 1 ?></td>
                                        <td><?= $row['nama_mahasiswa'] ?></td>
                                        <td><?= $row['nim'] ?></td>
                                        <td><?= $row['semester'] ?></td>
                                        <td><?= date('d-m-Y', strtotime($row['tgl_diagnosa'])) ?></td>
                                        <td><?= $row['nama_penyakit'] ?></td>
                                        <td><?= $row['cf_akhir'] ?></td>
                                        <td><?= $row['presentase'] ?>%</td>
                                        <td>
                                            <a href="<?= base_url('admin/master_laporan/lihat/' . $row['id_diagnosa']) ?>" class="btn btn-primary btn-sm btn-circle"><i class="fas fa-eye"></i></a>
                                            <form action="<?= base_url('admin/master_laporan/'.$row['id_diagnosa']) ?>" method="post" class="inline-block">
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
            <!-- End Laporan -->

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
                        Apakah Anda yakin ingin menghapus seluruh data? Tindakan ini tidak dapat dibatalkan.
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <a href="<?= base_url('admin/master_laporan/truncateData') ?>" class="btn btn-danger">Hapus Data</a>
                    </div>
                </div>
            </div>
        </div>


        <?= $this->endSection() ?>