<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class FaqSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'pertanyaan' => 'Apa penyebab depresi?',
                'jawaban' => 'Penyebab depresi bisa bervariasi, termasuk faktor genetik, ketidakseimbangan zat kimia dalam otak, stres, peristiwa traumatik, dan faktor lingkungan.',
            ],
            [
                'pertanyaan' => 'Bagaimana cara mengatasi depresi?',
                'jawaban' => 'Mengatasi depresi melibatkan kombinasi pengobatan, seperti terapi psikologis dan penggunaan obat-obatan, serta perubahan gaya hidup yang sehat, dukungan sosial, dan kegiatan yang menyenangkan.',
            ],
            [
                'pertanyaan' => 'Apakah depresi bisa sembuh total?',
                'jawaban' => 'Ya, depresi dapat disembuhkan sepenuhnya dengan perawatan yang tepat, seperti terapi psikologis dan pengobatan yang diresepkan oleh profesional kesehatan.',
            ],
            [
                'pertanyaan' => 'Apa perbedaan depresi dengan sedih biasa?',
                'jawaban' => 'Depresi berbeda dengan sedih biasa karena gejalanya berlangsung dalam jangka waktu yang lebih lama dan lebih parah, mempengaruhi fungsi sehari-hari, dan tidak bisa hilang hanya dengan berusaha memperbaiki suasana hati.',
            ],
            [
                'pertanyaan' => 'Kapan sebaiknya saya mencari bantuan professional saat mengalami depresi?',
                'jawaban' => 'Sebaiknya Anda mencari bantuan profesional segera jika mengalami gejala depresi yang mengganggu kehidupan sehari-hari Anda, berlangsung lebih dari beberapa minggu, atau jika ada pemikiran atau rencana bunuh diri.',
            ],
            [
                'pertanyaan' => 'Contoh Pertanyaan 6',
                'jawaban' => 'Contoh Jawaban 6',
            ],
            // Tambahkan data pertanyaan dan jawaban lainnya sesuai kebutuhan
        ];

        // Insert data ke dalam tabel tbl_faq
        $this->db->table('tbl_faq')->insertBatch($data);
    }
}