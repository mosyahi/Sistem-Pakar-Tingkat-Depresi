![My Image](Screenshoot/landing.png)
# SISPASI UMC 2023

## Apa itu Sispasi UMC?

Sispasi UMC adalah sistem pakar untuk mendiagnosis tingkat depresi pada mahasiswa tingkat akhir dengan menggunakan metode certainty factor [Mosyahi-Dev](https://mosyahi.wordpress.com).

## Fitur 
### Halaman Utama
- Landing Page
- Halaman Tentang, Informasi, FAQ dan Kontak
- Halaman Kritik Dan Saran (Pemberitahuan dan ucapan terima kasih Akan terkirim melalu Email)

### Halaman Cek Diagnosa
- Homepage Cek Diagnosa              
- Form Biodata
- Form Pertanyaa Internal (Pribadi)
- Form Gejala
- Panduan pemakaian

### Halaman Hasil Diagnosa
- Homepage Hasil Diagnosa              
- Tampil jumlah gejala terpilih dan tak terpilih
- Tampil Nilai CF Akhir terbesar dan Persentase
- Tampil jawaban mengenai pertanyaan personal (Pribadi)
- Tampil perbandingan persentase dengan penyakit lain
- Tampil detail perhitungan
- Tampil deskripsi depresi dan solusi penanganan
- Unduh hasil diagnosis (PDF)

### Login User
- Memakai Email dan Password (Enskripsi)
- Register (Akan dapat Email OTP)
- Lupa Password (Akan dapat Email Token)
- Login With Google (OAuth2)

### Login Admin
- Memakai Username dan Password

### Dashboard Admin
- Data Gejala, Penyakit, dan FAQ (Crud)
- Data Aturan/Rule (Untuk setting nilai pakar)
  * Setting nilai MB dan MD
  * nilai CF pakar otomatis keluar saat nilai MB dan MD dimasukkan
- Data laporan diagnosa
  * Fitur Truncate Data
  * Fitur Unduh PDF
  * Fitur Unduh Excel
  * Fitur Cetak Langsung
  * View data individu
  * Unduh PDF (Individu)
- Data Admin & User
- Data OTP & Token Reset Password

## Dokumentasi Project
### Halaman Diagnosa
| Form Login | Login Success |
| -------------- | -------------- |
| ![My Image](Screenshoot/login-user.png) | ![My Image](Screenshoot/log-user-success.png) |
| Form Biodata | Form Pertanyaan |
| ![My Image](Screenshoot/biodata.png) | ![My Image](Screenshoot/pertanyaan.png) |
| Form Pilih Gejala | Hasil Diagnosa (1) |
| ![My Image](Screenshoot/pilih-gejala.png) | ![My Image](Screenshoot/hasil-1.png) |
| Hasil Diagnosa (2) | Hasil Diagnosa (3) |
| ![My Image](Screenshoot/hasil-2.png) | ![My Image](Screenshoot/hasil-3.png) |

### Halaman Dashboard
| Dashboard 1 | Laporan diagnosa (All) |
| -------------- | -------------- |
| ![My Image](Screenshoot/dashboard-1.png) | ![My Image](Screenshoot/aturan.png) |
| Laporan Diagnosa All | Laporan Diagnosa Individu |
| ![My Image](Screenshoot/dashboard-2.png) | ![My Image](Screenshoot/dashboard-3.png) |


## Run Project
### Persyaratan
- [Composer](https://getcomposer.org/)
- [XAMPP](https://www.apachefriends.org/download.html) atau sejenisnya dengan versi php 7.4++ dengan mengaktifkan ``intl`` pada ``xampp\config\php.ini`` hapus tanda `` ; ``




