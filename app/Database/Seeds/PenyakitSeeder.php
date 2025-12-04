<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class PenyakitSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'kode_penyakit' => 'P01',
                'nama_penyakit' => 'Mild Major Depressive Disorder (Ringan)',
                'deskripsi_penyakit' => 'Mild Major Depressive Disorder adalah tingkat depresi mayor yang
                memiliki gejala yang lebih ringan dibandingkan dengan tingkat yang lebih
                parah. Pada tingkat ini, gejala depresi biasanya memengaruhi kehidupan
                sehari-hari, namun individu masih dapat menjalani aktivitas sehari-hari
                dengan tingkat fungsionalitas yang relatif normal.',
                'solusi_penyakit' => 'Solusi penanganan untuk Mild Major Depressive Disorder melibatkan kombinasi terapi kognitif perilaku (CBT), terapi dukungan, dan perubahan gaya hidup sehat. Terapi kognitif perilaku membantu individu mengubah pola pikir negatif menjadi pola pikir yang lebih adaptif dan positif. Terapi dukungan, seperti terapi interpersonal atau kelompok dukungan, dapat memberikan wadah untuk berbagi pengalaman dan mendapatkan dukungan emosional dari orang-orang terdekat. Selain itu, menjaga pola tidur yang teratur, mengadopsi pola makan sehat, dan berpartisipasi dalam kegiatan fisik yang memadai juga penting untuk meningkatkan kesejahteraan mental dan mengurangi gejala depresi pada tingkat yang lebih ringan.',
            ],
            [
                'kode_penyakit' => 'P02',
                'nama_penyakit' => 'Mild Persistent Depressive Disorder (Dysthymia Ringan)',
                'deskripsi_penyakit' => 'Mild Persistent Depressive Disorder (Dysthymia) mengacu pada tingkat
                yang lebih ringan dari Dysthymia. Pada tingkat ini, gejala depresi ada dan
                terjadi secara terus-menerus selama setidaknya dua tahun, tetapi gejalanya
                cenderung lebih ringan dan dapat dikelola dengan lebih baik dibandingkan
                dengan tingkat yang lebih parah.',
                'solusi_penyakit' => 'Solusi penanganan untuk Mild Persistent Depressive Disorder (Dysthymia) meliputi terapi kognitif perilaku (CBT), dukungan sosial, dan perubahan gaya hidup sehat. Terapi kognitif perilaku membantu individu mengidentifikasi pola pikir negatif dan mengembangkan strategi untuk mengubahnya menjadi pola pikir yang lebih positif. Dukungan sosial dari keluarga, teman, atau kelompok dukungan dapat memberikan dukungan emosional dan praktis dalam menghadapi gejala dysthymia. Perubahan gaya hidup sehat, seperti menjaga pola tidur yang teratur, menerapkan kegiatan fisik yang memadai, dan mengelola stres, juga penting untuk mengelola gejala dysthymia pada tingkat yang lebih ringan.',
            ],
            [
                'kode_penyakit' => 'P03',
                'nama_penyakit' => 'Moderate Major Depressive Disorder (Sedang)',
                'deskripsi_penyakit' => 'Moderate Major Depressive Disorder mengacu pada tingkat depresi mayor
                yang memiliki gejala sedang. Pada tingkat ini, gejala depresi dapat lebih
                mengganggu kehidupan sehari-hari individu dan mempengaruhi
                fungsionalitas mereka dalam berbagai bidang, seperti pekerjaan, hubungan,
                atau aktivitas sosial.',
                'solusi_penyakit' => 'Solusi penanganan untuk Moderate Major Depressive Disorder melibatkan pendekatan terapi kombinasi yang mencakup terapi kognitif perilaku (CBT), terapi interpersonal, dan mungkin juga penggunaan obat antidepresan yang diresepkan oleh dokter. Terapi kognitif perilaku membantu individu mengidentifikasi dan mengubah pola pikir negatif yang mendasari depresi, sedangkan terapi interpersonal fokus pada perbaikan hubungan dan interaksi sosial. Penggunaan obat antidepresan dapat membantu mengurangi gejala depresi. Dalam kombinasi dengan dukungan sosial dan perubahan gaya hidup sehat, seperti menjaga rutinitas tidur yang teratur, pola makan sehat, dan olahraga, solusi penanganan tersebut bertujuan untuk memperbaiki kesejahteraan mental individu dan membantu mereka mengatasi gejala depresi yang sedang.',
            ],
            [
                'kode_penyakit' => 'P04',
                'nama_penyakit' => 'Moderate Persistent Depressive Disorder (Dysthymia Sedang)',
                'deskripsi_penyakit' => 'Moderate Persistent Depressive Disorder (Dysthymia) menggambarkan
                tingkat Dysthymia yang memiliki gejala sedang. Pada tingkat ini, gejala
                depresi dapat lebih mengganggu dan mempengaruhi kehidupan sehari-hari
                individu dengan lebih signifikan.',
                'solusi_penyakit' => 'Solusi penanganan untuk Moderate Persistent Depressive Disorder (Dysthymia) meliputi terapi kognitif perilaku (CBT), konseling psikoterapi, dan dukungan sosial yang positif. Terapi kognitif perilaku dapat membantu individu mengidentifikasi pola pikir negatif dan menggantinya dengan pola pikir yang lebih positif. Konseling psikoterapi dapat memberikan wadah untuk mengeksplorasi penyebab dan emosi yang mendasari dysthymia serta mengembangkan strategi penanganan yang efektif. Dukungan sosial dari keluarga, teman, atau kelompok dukungan juga penting dalam membantu individu mengatasi gejala dan meningkatkan kesejahteraan mental.',
            ],
            [
                'kode_penyakit' => 'P05',
                'nama_penyakit' => 'Severe Major Depressive Disorder (Parah)',
                'deskripsi_penyakit' => 'Severe Major Depressive Disorder adalah tingkat depresi mayor yang
                memiliki gejala yang sangat parah dan mengganggu. Pada tingkat ini, gejala
                depresi sangat menghambat individu dalam menjalani kehidupan seharihari. Mereka mungkin mengalami kesulitan dalam menjalankan tugas-tugas
                rutin, berinteraksi dengan orang lain, atau bahkan memiliki pemikiran atau
                perilaku yang berpotensi merugikan diri sendiri.',
                'solusi_penyakit' => 'Solusi penanganan untuk Severe Major Depressive Disorder yang parah meliputi kombinasi konseling terapi psikologis, pengobatan dengan obat antidepresan yang diresepkan oleh dokter, dan dukungan sosial yang kuat. Terapi kognitif perilaku dan terapi interpersonal dapat membantu individu mengatasi gejala depresi dan mengembangkan strategi penanganan yang efektif. Penting juga untuk melibatkan keluarga dan teman-teman dalam proses pemulihan serta memonitor dan mengurangi risiko perilaku yang merugikan diri sendiri melalui perawatan yang tepat dan pengawasan yang ketat.',
            ],
            [
                'kode_penyakit' => 'P06',
                'nama_penyakit' => 'Severe Persistent Depressive Disorder (Dysthymia Parah)',
                'deskripsi_penyakit' => 'Severe Persistent Depressive Disorder (Dysthymia) adalah tingkat
                Dysthymia yang memiliki gejala yang sangat parah dan menghambat. Pada
                tingkat ini, gejala depresi yang berat dan terus-menerus mengganggu
                fungsionalitas individu secara signifikan dalam berbagai aspek kehidupan,
                termasuk pekerjaan, hubungan, dan kesejahteraan umum.',
                'solusi_penyakit' => 'Severe Persistent Depressive Disorder (Dysthymia) yang parah membutuhkan penanganan yang tepat, seperti konseling psikoterapi, terapi obat, atau terapi gabungan. Dukungan sosial dan pengelolaan stres yang sehat juga penting. Perubahan gaya hidup sehat, seperti tidur yang cukup, pola makan sehat, dan kegiatan fisik yang memadai, juga dapat membantu. Konsultasikan dengan profesional medis atau psikolog untuk mendapatkan penanganan yang sesuai dengan kebutuhan individu.',
            ],
        ];

        $this->db->table('tbl_penyakit')->insertBatch($data);
    }
}
