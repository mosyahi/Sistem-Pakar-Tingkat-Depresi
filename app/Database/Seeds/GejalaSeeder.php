<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class GejalaSeeder extends Seeder
{
    public function run()
    {
        // Referensi Jurnal International DSM-5
        $data = [
            [
                'kode_gejala' => 'G01',
                'nama_gejala' => 'Anda mengalami suasana hati sedih hampir setiap hari dalam kurun waktu 2 minggu',
            ],
            [
                'kode_gejala' => 'G02',
                'nama_gejala' => 'Anda kehilangan minat atau kesenangan yang signifikan dalam semua hal atau hampir semua aktivitas sepanjang hari dalam kurun waktu 2 minggu terakhir',
            ],
            [
                'kode_gejala' => 'G03',
                'nama_gejala' => 'Anda mengalami perubahan berat badan yang signifikan tanpa melakukan diet atau perubahan nafsu makan selama 2 minggu terakhir',
            ],
            [
                'kode_gejala' => 'G04',
                'nama_gejala' => 'Anda mengalami kesulitan tidur atau tidur berlebihan selama 2 minggu terakhir',
            ],
            [
                'kode_gejala' => 'G05',
                'nama_gejala' => 'Anda merasa gelisah atau pergerakan anda lebih lambat selama 2 minggu terakhir',
            ],
            [
                'kode_gejala' => 'G06',
                'nama_gejala' => 'Anda merasa lelah atau kehilangan energi hampir setiap hari selama 2 minggu terakhir',
            ],
            [
                'kode_gejala' => 'G07',
                'nama_gejala' => 'Anda merasa rendah diri atau merasa bersalah secara berlebihan hampir setiap hari dalam kurun waktu 2 minggu terakhir',
            ],
            [
                'kode_gejala' => 'G08',
                'nama_gejala' => 'Anda kesulitan berpikir atau berkonsentrasi, atau sulit membuat keputusan hampir setiap hari dalam 2 minggu terakhir',
            ],
            [
                'kode_gejala' => 'G09',
                'nama_gejala' => 'Anda sering memikirkan tentang kematian, memiliki pemikiran bunuh diri berulang tanpa rencana khusus, atau pernah mencoba bunuh diri atau memiliki rencana spesifik untuk bunuh diri dalam 2 minggu terakhir',
            ],
            [
                'kode_gejala' => 'G10',
                'nama_gejala' => 'Gejala-gejala yang Anda alami disebabkan oleh pengaruh zat tertentu (seperti obat-obatan)',
            ],
            [
                'kode_gejala' => 'G11',
                'nama_gejala' => 'Gejala-gejala yang Anda alami menyebabkan kesulitan atau gangguan signifikan dalam berinteraksi sosial, pekerjaan atau kegiatan penting lainnya',
            ],
            [
                'kode_gejala' => 'G12',
                'nama_gejala' => 'Anda mengalami perubahan nafsu makan yang memburuk atau berlebihan dalam 2 minggu terakhir',
            ],
            [
                'kode_gejala' => 'G13',
                'nama_gejala' => 'Suasana hati anda tertekan sepanjang hari dalam 2 tahun belakangan ini',
            ],
            [
                'kode_gejala' => 'G14',
                'nama_gejala' => 'Ada perubahan nafsu makan yang memburuk atau nafsu makan berlebih selama 2 tahun belakangan ini',
            ],
            [
                'kode_gejala' => 'G15',
                'nama_gejala' => 'Anda mengalami kesulitan tidur atau tidur berlebihan selama 2 tahun terakhir',
            ],
            [
                'kode_gejala' => 'G16',
                'nama_gejala' => 'Dalam 2 tahun belakangan ini anda mengalami kelelahan dalam menjalani aktivitas sehari-hari',
            ],
            [
                'kode_gejala' => 'G17',
                'nama_gejala' => 'Dalam 2 tahun terakhir Anda sering merasakan perasaan rendah diri',
            ],
            [
                'kode_gejala' => 'G18',
                'nama_gejala' => 'Dalam 2 tahun terakhir anda mengalami kurang konsentrasi atau kesulitan mengambil keputusan',
            ],
            [
                'kode_gejala' => 'G19',
                'nama_gejala' => 'Dalam 2 tahun terakhir anda mengalami putus ada terhadap hal yang sedang anda kejar',
            ],
            [
                'kode_gejala' => 'G20',
                'nama_gejala' => 'Anda merasa tidak pernah bahagia dalam 2 tahun terakhir',
            ],
        ];

        $this->db->table('tbl_gejala')->insertBatch($data);
    }
}
