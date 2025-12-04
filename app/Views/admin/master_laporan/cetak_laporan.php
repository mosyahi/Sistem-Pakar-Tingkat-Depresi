<!DOCTYPE html>
<html>

<head>
    <title>Laporan Data Diagnosa</title>
    <style>
    /* CSS styling for the PDF content */
    body {
        font-family: Arial, sans-serif;
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    table th,
    table td {
        padding: 8px;
        border: 1px solid #000;
    }

    table th {
        background-color: #f0f0f0;
    }
    </style>
</head>

<body>
    <?php
    // Set zona waktu sesuai dengan waktu yang diinginkan
    date_default_timezone_set('Asia/Jakarta');
    ?>
    <h1 align="center">Laporan Data Diagnosa</h1>
    <h5>Tanggal Cetak : <?= date('d-m-Y H:i:s') ?></h5>
    <table>
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
            </tr>
        </thead>
        <tbody>
            <?php foreach ($laporan as $key => $row): ?>
            <tr>
                <td><?= $key + 1 ?></td>
                <td><?= $row['nama_mahasiswa'] ?></td>
                <td><?= $row['nim'] ?></td>
                <td><?= $row['semester'] ?></td>
                <td><?= $row['tgl_diagnosa'] ?></td>
                <td><?= $row['nama_penyakit'] ?></td>
                <td><?= $row['cf_akhir'] ?></td>
                <td><?= $row['presentase'] ?>%</td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <!-- Button Kembali -->
    <a href="<?= base_url('admin/master_laporan') ?>" class="btn btn-primary btn-print">
        <<< Kembali</a>

            <!-- CSS untuk menyembunyikan button saat cetak -->
            <style>
            @media print {
                .btn-print {
                    display: none;
                }
            }
            </style>

            <script>
            window.onload = function() {
                window.print();
            }
            </script>


</body>

</html>