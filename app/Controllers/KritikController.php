<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use PHPMailer\PHPMailer\PHPMailer;

class KritikController extends BaseController
{
    public function sendEmail()
    {
        $request = $this->request;

        // Mengumpulkan data dari formulir
        $name = $request->getPost("namaLengkap");
        $email = $request->getPost("email");
        $phone = $_POST["phone"];
        $judul = $request->getPost("judul");
        $message = $request->getPost("isi");

        // Pengaturan penerima email
        $to = "mosyahichannel@gmail.com"; // Ganti dengan alamat email tujuan

        // Subjek email
        $subject = "Sispasi UMC - Pesan dari $name";

        // Isi pesan email dalam format HTML
        $emailMessage = '<html>';
        $emailMessage .= '<head>';
        $emailMessage .= '<style>';
        $emailMessage .= '.body { font-family: Arial, sans-serif; color: #333; }';
        $emailMessage .= '.container { max-width: 600px; margin: 0 auto; padding: 20px; background-color: #f7f7f7; }';
        $emailMessage .= '.logo { display: block; margin: 0 auto; }';
        $emailMessage .= 'h1 { text-align: center; margin-bottom: 20px; }';
        $emailMessage .= 'table { width: 100%; }';
        $emailMessage .= 'td { padding: 10px; }';
        $emailMessage .= 'strong { font-weight: bold; }';
        $emailMessage .= '</style>';
        $emailMessage .= '</head>';
        $emailMessage .= '<body>';
        $emailMessage .= '<div class="container">';
        $emailMessage .= '<img src="https://sbmptmu.id/wp-content/uploads/2022/04/logo-umc-1009x1024-Reza-M-768x779.png" alt="Logo" class="logo" style="width: 50px; height: 50px;">';
        $emailMessage .= '<h1>Kritik dan Saran</h1>';
        $emailMessage .= '<table>';
        $emailMessage .= '<tr><td>Nama</td><td>: ' . htmlspecialchars($name) . '</td></tr>';
        $emailMessage .= '<tr><td>Email</td><td>: ' . htmlspecialchars($email) . '</td></tr>';
        $emailMessage .= '<tr><td>No.HP</td><td>: ' . htmlspecialchars($phone) . '</td></tr>';
        $emailMessage .= '<tr><td>Judul</td><td>: ' . htmlspecialchars($judul) . '</td></tr>';
        $emailMessage .= '</table>';
        $emailMessage .= '<p><strong>Pesan:</strong></p>';
        $emailMessage .= '<p>' . nl2br(htmlspecialchars($message)) . '</p>';
        $emailMessage .= '</div>';
        $emailMessage .= '</body>';
        $emailMessage .= '</html>';

        // Mengirim email menggunakan phpmailer dengan format HTML
        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'mosyahizuku@gmail.com';
        $mail->Password = 'yuvjnlfedivbzkyt';
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        $mail->setFrom($email, $name);
        $mail->addAddress($to);

        $mail->Subject = $subject;
        $mail->Body = $emailMessage;
        $mail->isHTML(true);

        if ($mail->send()) {
            // Pesan jika email berhasil terkirim
            echo "Pesan berhasil terkirim.";

            // Mengirim email balasan
            $subjectBalasan = "Tim Sispasi UMC";
            $emailMessageBalasan = '<html>';
            $emailMessageBalasan .= '<head>';
            $emailMessageBalasan .= '<style>';
            $emailMessageBalasan .= '.body { font-family: Arial, sans-serif; color: #333; }';
            $emailMessageBalasan .= '.container { max-width: 600px; margin: 0 auto; padding: 20px; background-color: #f7f7f7; }';
            $emailMessageBalasan .= '.logo { display: block; margin: 0 auto; }';
            $emailMessageBalasan .= 'h1 { text-align: center; margin-bottom: 20px; }';
            $emailMessageBalasan .= '</style>';
            $emailMessageBalasan .= '</head>';
            $emailMessageBalasan .= '<body>';
            $emailMessageBalasan .= '<div class="container">';
            $emailMessageBalasan .= '<img src="https://sbmptmu.id/wp-content/uploads/2022/04/logo-umc-1009x1024-Reza-M-768x779.png" alt="Logo" class="logo" style="width: 50px; height: 50px;">';
            $emailMessageBalasan .= '<h1>Terima Kasih atas Kritik dan Saran Anda</h1>';
            $emailMessageBalasan .= '<p> Sebagai Tim Sispasi UMC, kami ingin menyampaikan ucapan terima kasih yang tulus atas kritik dan saran yang Anda berikan. Setiap masukan dari Anda adalah motivasi bagi kami untuk terus berkembang dan memberikan pelayanan terbaik kepada pengguna <strong>Sispasi UMC</strong>.<br><br> Kami sangat menghargai kesempatan untuk mendengar pandangan Anda tentang pelayanan pada aplikasi ini. Kritik yang konstruktif dan saran yang berharga telah memberikan pencerahan bagi kami untuk melihat sisi-sisi yang perlu ditingkatkan.<br><br> Sekali lagi, terima kasih telah memberikan kritik yang jujur dan saran yang bermanfaat.</p>';
            $emailMessageBalasan .= '<p>Hormat Kami,<br>Tim Sispasi UMC</p>';
            $emailMessageBalasan .= '</div>';
            $emailMessageBalasan .= '</body>';
            $emailMessageBalasan .= '</html>';

            $mailBalasan = new PHPMailer();
            $mailBalasan->isSMTP();

            // Konfigurasi SMTP untuk email balasan
            $mailBalasan->Host = 'smtp.gmail.com';
            $mailBalasan->SMTPAuth = true;
            $mailBalasan->Username = 'mosyahizuku@gmail.com';
            $mailBalasan->Password = 'yuvjnlfedivbzkyt';
            $mailBalasan->SMTPSecure = 'tls';
            $mailBalasan->Port = 587;

            // Coba kirim email balasan
            try {
                $mailBalasan->setFrom($email, 'Tim Sispasi UMC');
                $mailBalasan->addAddress($email);
                $mailBalasan->Subject = $subjectBalasan;
                $mailBalasan->Body = $emailMessageBalasan;
                $mailBalasan->isHTML(true);

                if ($mailBalasan->send()) {
                // Pesan jika email balasan berhasil terkirim
                    echo " Silahkan cek email anda.";
                } else {
                // Pesan jika email balasan gagal terkirim
                    echo " Email balasan gagal terkirim. " . $mailBalasan->ErrorInfo;
                }
            } catch (Exception $e) {
                echo " Terjadi kesalahan saat mengirim email balasan: " . $e->getMessage();
            }
        } else {
            // Pesan jika email gagal terkirim
            echo "Pesan gagal terkirim!. " . $mail->ErrorInfo;
        }
    }
}
