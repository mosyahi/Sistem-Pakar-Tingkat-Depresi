<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\MahasiswaModel;
use App\Models\OtpModel;
use PHPMailer\PHPMailer\PHPMailer;

class RegisterController extends BaseController
{
    public function register()
    {
    // Handle form submission
        if ($this->request->getMethod() === 'post') {
            $model = new MahasiswaModel();

            // Validasi form
            $rules = [
                'nama_lengkap' => 'required',
                'email' => 'required|valid_email',
                'password' => 'required|min_length[8]|regex_match[/^(?=.*[A-Z])(?=.*\d)(?=.*[@\.\,\!\#\$\%\^\&\*\(\)\-\_\+\=\?\:\;\<\>\{\}\[\]])/]',
            ];

            $errors = [
                'password' => [
                    'regex_match' => 'Password harus memiliki setidaknya 8 karakter dengan di sertai huruf kapital, angka, dan tanda unik seperti (.,@$)'
                ]
            ];

            if (!$this->validate($rules, $errors)) {
                return redirect()->back()->withInput()->with('error', $this->validator->getErrors());
            }

            $data = [
                'nama_lengkap' => $this->request->getPost('nama_lengkap'),
                'email' => $this->request->getPost('email'),
                'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT)
            ];

            $existingEmail = $model->where('email', $data['email'])->first();
            if ($existingEmail) {
                return redirect()->to(site_url('register'))->with('errorr', 'Email sudah digunakan.');
            }

            $otp = $this->generateOTP();

        // Kirim email OTP dan simpan OTP ke database
            if ($this->sendOTPByEmail($data['email'], $otp)) {
            // Simpan data registrasi ke sesi
                session()->setTempdata('registration_data', $data, 300);

                return redirect()->to('verify-otp')->with('success', 'Kode OTP sudah terkirim. Silakan cek Email anda!');
            } else {
                return redirect()->back()->withInput()->with('error', 'Gagal mengirimkan email OTP. Silakan coba lagi.');
            }
        }

        return view('diagnosa/auth/register');
    }

    public function verifyOTP()
    {
        $session = session();
        $registrationData = $session->getTempdata('registration_data');

    // Jika data registrasi tidak ada dalam sesi, arahkan pengguna kembali ke halaman pendaftaran
        if (!$registrationData) {
            return redirect()->to('register')->with('errorr', 'Silakan melakukan pendaftaran terlebih dahulu.');
        }

    // Handle form submission
        if ($this->request->getMethod() === 'post') {
            $otp = $this->request->getPost('otp');

        // Verifikasi OTP dari tabel tbl_otp secara case-sensitive
        if ($this->verifyOTPFromDB($otp)) { // Verifikasi tanpa mengubah huruf kecil
            // Simpan data ke dalam database
            $model = new MahasiswaModel();
            $model->insert($registrationData);

            // Hapus OTP dari tabel tbl_otp
            $this->deleteOTPFromDB($otp);

            // Hapus data registrasi dari sesi setelah berhasil verifikasi dan penyimpanan
            $session->removeTempdata('registration_data');

            return redirect()->to('login-mahasiswa')->with('success', 'Registrasi berhasil. Silakan login.');
        } else {
            return redirect()->back()->withInput()->with('error', 'Kode OTP tidak valid. Silakan coba lagi.');
        }
    }

    return view('diagnosa/auth/verifikasi');
}





// Membuat metode public baru untuk memanggil sendOTP()
public function sendOTPByEmail($email, $otp)
{
    $model = new OTPModel(); // Ganti dengan nama model yang sesuai
    $data = [
        'email' => $email,
        'otp' => $otp,
        'created_at' => date('Y-m-d H:i:s')
    ];

    if ($model->insert($data)) {
        return $this->sendOTP($email, $otp);
    } else {
        return false; // Gagal menyimpan OTP
    }
}

public function sendOTP($email, $otp)
{
    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'koi020987@gmail.com';
        $mail->Password = 'bxreoedupmdpgpwk';
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        // Recipients
        $mail->setFrom('koi020987@gmail.com', 'Sispasi UMC');
        $mail->addAddress($email);

        // Content
        $mail->isHTML(true);
        $mail->Subject = 'Kode OTP Registrasi Sispasi UMC';

        $emailMessage = '<html>';
        $emailMessage .= '<head>';
        $emailMessage .= '<style>';
        $emailMessage .= '.body { font-family: Arial, sans-serif; color: #333; }';
        $emailMessage .= '.container { max-width: 600px; margin: 0 auto; padding: 20px; background-color: #f7f7f7; }';
        $emailMessage .= '.logo { display: block; margin: 0 auto; }';
        $emailMessage .= 'h1 { text-align: center; margin-bottom: 20px; }';
        $emailMessage .= 'table { width: 100%; }';
        $emailMessage .= 'td { padding: 10px; text-align: center; }';
        $emailMessage .= 'strong { font-weight: bold; }';
        $emailMessage .= '</style>';
        $emailMessage .= '</head>';
        $emailMessage .= '<body>';
        $emailMessage .= '<div class="container">';
        $emailMessage .= '<img src="https://sbmptmu.id/wp-content/uploads/2022/04/logo-umc-1009x1024-Reza-M-768x779.png" alt="Logo" class="logo" style="width: 50px; height: 50px;">';
        $emailMessage .= '<h1>Kode OTP</h1>';
        $emailMessage .= '<table>';
        $emailMessage .= '<tr><td style="background-color: #eee;"><strong>' . $otp . '</strong></td></tr>';
        $emailMessage .= '</table>';
        $emailMessage .= '</div>';
        $emailMessage .= '</body>';
        $emailMessage .= '</html>';

        $mail->Body = $emailMessage;

        $mail->send();
        return $otp; // Pengiriman email sukses
    } catch (Exception $e) {
        return false; // Pengiriman email gagal
    }
}


protected function verifyOTPFromDB($otp)
{
    $model = new OTPModel(); 
    $otpData = $model->where('otp', $otp)->first();

    if ($otpData) {
        // Memeriksa apakah OTP dari database sama persis dengan yang dimasukkan secara case-sensitive
        if (hash_equals($otpData['otp'], $otp)) {
            $createdAt = strtotime($otpData['created_at']);
            $currentTime = time();

            // Verifikasi hanya jika belum melewati 5 menit
            if ($currentTime - $createdAt <= 300) {
                return true; 
            }
        }
    }

    return false; // Verifikasi gagal
}


// Metode untuk menghapus OTP dari tabel tbl_otp
protected function deleteOTPFromDB($otp)
{
    $model = new OTPModel();
    $model->where('otp', $otp)->delete();
}

protected function generateOTP($length = 6)
{
    $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
    $otp = '';
    $charactersLength = strlen($characters);

    for ($i = 0; $i < $length; $i++) {
        $otp .= $characters[rand(0, $charactersLength - 1)];
    }

    return $otp;
}

}
