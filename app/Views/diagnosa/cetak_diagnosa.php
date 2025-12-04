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
    <h5>Tanggal Diunduh : <?= date('d-m-Y H:i:s') ?></h5>
    <div>
        <table>
            <thead>
                <tr>
                    <th colspan="6">Biodata</th>
                </tr>
            </thead>
            <thead>
                <tr>
                    <th>Nama Mahasiswa</th>
                    <th>NIM</th>
                    <th>Prodi</th>
                    <th>Semester</th>
                    <th>Jenis Kelamin</th>
                    <th>Tanggal Diagnosa</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($laporanDiagnosa as $key => $row): ?>
                    <tr>
                        <td style="text-align: center"><?= $row['nama_mahasiswa'] ?></td>
                        <td style="text-align: center"><?= $row['nim'] ?></td>
                        <td style="text-align: center"><?= $row['prodi'] ?></td>
                        <td style="text-align: center"><?= $row['semester'] ?></td>
                        <td style="text-align: center"><?= $row['jk'] ?></td>
                        <td style="text-align: center"><?= date('d-m-Y', strtotime($row['tgl_diagnosa'])); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <br><br>
    <div>
        <table>
            <thead>
                <tr>
                    <th colspan="2">Tentang Anda</th>
                </tr>
            </thead>
            <thead>
                <tr>
                    <th>Pertanyaan</th>
                    <th>Jawaban</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($laporanDiagnosa as $key => $row): ?>
                    <tr>
                        <td>Apakah anda melakukan test ini untuk diri sendiri atau orang lain?</td>
                        <td><?= $row['p_1']; ?></td>
                    </tr>
                    <tr>
                        <td>Berapa rentan usia anda?</td>
                        <td><?= $row['p_2']; ?></td>
                    </tr>
                    <tr>
                        <td>Apakah anda sedang mempunyai masalah?</td>
                        <td><?= $row['p_3']; ?></td>
                    </tr>
                    <tr>
                        <td>Apakah ada masalah berikut yang menggambarkan anda sekarang?</td>
                        <td><?= $row['p_4']; ?></td>
                    </tr>
                    <tr>
                        <td>Apakah anda mempunyai keluhan lain?</td>
                        <td><?= $row['p_5']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <br><br>
    <div>
        <table>
            <thead>
                <tr>
                    <th colspan="7">Gejala Yang Dipilih</th>
                </tr>
            </thead>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kode Gejala</th>
                    <th>Nama Gejala</th>
                    <th>Kode Penyakit</th>
                    <th>Nama Penyakit</th>
                    <th>Tingkat Kepercayaan</th>
                    <th>CF User</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($laporanGejala as $key => $row): ?>
                    <tr>
                        <td style="text-align: center"><?= $key + 1 ?></td>
                        <td style="text-align: center"><?= $row['kode_gejala'] ?></td>
                        <td><?= $row['nama_gejala'] ?></td>
                        <td style="text-align: center"><?= $row['kode_penyakit'] ?></td>
                        <td><?= $row['nama_penyakit'] ?></td>
                        <td style="text-align: center"><?= $row['nama_nilai'] ?></td>
                        <td style="text-align: center"><?= $row['cf'] ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <?php foreach ($laporanDiagnosa as $key => $row): ?>
            <caption style="font-size: 10px; color: red; text-align: left;">
                *Dari semua gejala yang Anda pilih, <strong><?= $row['nama_penyakit'] ?></strong> menjadi tingkatan depresi dengan presentase tertinggi.
            </caption>
        <?php endforeach; ?>
    </div>
    <br><br>
    <div>
        <table>
            <thead>
                <tr>
                    <th colspan="4">Tingkat Depresi Yang Dialami</th>
                </tr>
            </thead>
            <thead>
                <tr>
                    <th>Kode</th>
                    <th>Nama Penyakit</th>
                    <th>CF Akhir</th>
                    <th>Tingkat Presentase</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($laporanDiagnosa as $key => $row): ?>
                    <tr>
                        <td style="text-align: center"><?= $row['kode_penyakit'] ?></td>
                        <td style="text-align: center"><?= $row['nama_penyakit'] ?></td>
                        <td style="text-align: center"><?= $row['cf_akhir'] ?></td>
                        <td style="text-align: center"><?= $row['presentase'] ?>%</td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <br><br>
    <div>
        <table>
            <thead>
                <?php foreach ($laporanDiagnosa as $key => $row): ?>
                    <tr>
                        <th colspan="2">Solusi <?= $row['nama_penyakit'] ?></th>
                    </tr>
                </thead>
            <?php endforeach; ?>
            <thead>
                <tr>
                    <th>Deskripsi Penyakit</th>
                    <th>Solusi Penanganan</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($laporanDiagnosa as $key => $row): ?>
                    <tr>
                        <td style="text-align: center"><?= $row['deskripsi_penyakit'] ?></td>
                        <td style="text-align: center"><?= $row['solusi_penyakit'] ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <!-- <br><br>
    <div align="left" style="position: absolute; bottom: 0; left: 0;">
        <footer style="font-size: 10px; color: red;">
            Sispasi-Umc | Meskipun sistem pakar ini membantu dalam proses diagnosa depresi, penting untuk diingat bahwa perhitungannya tidak dapat dijadikan sebagai acuan mutlak. Untuk mendapatkan data yang lebih pasti, disarankan untuk berkonsultasi dengan seorang psikolog.
        </footer>
    </div> -->

</body>

</html>


