<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\MahasiswaModel;
use App\Models\ResetPasswordModel;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class ResetPasswordController extends BaseController
{
    public function forgotPassword()
    {
        return view('diagnosa/auth/lupa-password');
    }

    public function processForgotPassword()
    {
        $email = $this->request->getPost('email');

        $userModel = new MahasiswaModel();
        $user = $userModel->getUserByEmail($email);

        if ($user) {
            $token = bin2hex(random_bytes(32));

            date_default_timezone_set('Asia/Jakarta');

            $resetModel = new ResetPasswordModel();
            $resetModel->insert([
                'id_mahasiswa' => $user['id_mahasiswa'],
                'token' => $token,
                'expires_at' => date('Y-m-d H:i:s', strtotime('+5 minute')),
            ]);

            $resetLink = base_url('reset-password/' . $token);
            $mail = new PHPMailer(true);

            try {
                $mail = new PHPMailer();
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'ISI EMAIL ANDA DISINI';
                $mail->Password = 'ISI PASSWORD AUTHENTICATED 2 LANGKAH DISINI';
                $mail->SMTPSecure = 'tls';
                $mail->Port = 587;

                $mail->setFrom('ISI EMAIL ANDA DISINI', 'Reset Password');
                $mail->addAddress($email);

                $mail->isHTML(true);
                $mail->Subject = 'Reset Password-Sispasi UMC';
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
                $emailMessage .= '<h1>Link Reset Password</h1>';
                $emailMessage .= '<table>';
                $emailMessage .= '<tr><td style="background-color: #eee;"><strong>' . $resetLink . '</strong></td></tr>';
                $emailMessage .= '</table>';
                $emailMessage .= '</div>';
                $emailMessage .= '</body>';
                $emailMessage .= '</html>';
                $mail->Body    = $emailMessage;

                $mail->send();
            } catch (Exception $e) {
            }

            $session = \Config\Services::session();
            $session->setFlashdata('success', 'Email reset password telah dikirim. Silakan periksa email Anda.');
            return redirect()->to('forgot-password');
        } else {
            $session = \Config\Services::session();
            $session->setFlashdata('error', 'Email tidak terdaftar.');
            return redirect()->back();
        }
    }

    public function showResetForm($token)
    {
        $resetModel = new ResetPasswordModel();
        $resetData = $resetModel->getResetDataByToken($token);

        if (!$resetData) {
            return redirect()->to('login-mahasiswa')->with('error', 'Token tidak ditemukan atau sudah digunakan!');
        }

        date_default_timezone_set('Asia/Jakarta');
        $expiresAt = strtotime($resetData['expires_at']);
        $currentTimestamp = time();
        if ($currentTimestamp > $expiresAt) {
            return redirect()->to('login-mahasiswa')->with('error', 'Token expired karena sudah melebihi batas waktu (5 Menit).');
        }

        return view('diagnosa/auth/verifikasi-password', ['token' => $token]);
    }

    public function reset()
    {
        $token = $this->request->getPost('token');
        $newPassword = $this->request->getPost('new_password');
        $confirmPassword = $this->request->getPost('confirm_password');

        // Validasi password
        if ($newPassword !== $confirmPassword) {
            return redirect()->to('/reset-password/' . $token)->with('error', 'Password dan konfirmasi password tidak cocok.');
        }

        // Validasi form
        $rules = [
            'new_password' => 'required|min_length[8]|regex_match[/^(?=.*[A-Z])(?=.*\d)(?=.*[@\.\,\!\#\$\%\^\&\*\(\)\-\_\+\=\?\:\;\<\>\{\}\[\]])/]',
            'confirm_password' => 'matches[new_password]',
        ];

        $errors = [
            'new_password' => [
                'regex_match' => 'Password harus memiliki setidaknya 8 karakter dengan disertai huruf kapital, angka, dan tanda unik seperti (.,@$)'
            ],
            'confirm_password' => [
                'matches' => 'Konfirmasi password tidak cocok dengan password baru.'
            ],
        ];

        if (!$this->validate($rules, $errors)) {
            return redirect()->to('/reset-password/' . $token)->withInput()->with('error', $this->validator->listErrors());
        }

        // Cek token valid apa engga
        $resetModel = new ResetPasswordModel();
        $resetData = $resetModel->getResetDataByToken($token);

        if (!$resetData) {
            return redirect()->to('forgot-password')->with('error', 'Token anda tidak ditemukan!');
        }

        date_default_timezone_set('Asia/Jakarta');
        $expiresAt = strtotime($resetData['expires_at']);
        $currentTimestamp = time();
        if ($currentTimestamp > $expiresAt) {
            return redirect()->to('login-mahasiswa')->with('error', 'Token expired karena sudah melebihi batas waktu (5 Menit).');
        }

        // Update password buat user terkait
        $userModel = new MahasiswaModel();
        $user = $userModel->find($resetData['id_mahasiswa']);

        if (!$user) {
            return redirect()->to('forgot-password')->with('error', 'User tidak ditemukan!');
        }

        // buat update password
        $userModel->update($user['id_mahasiswa'], ['password' => password_hash($newPassword, PASSWORD_DEFAULT)]);

        // hapus token yang sudah dipake
        $resetModel->delete($resetData['id_reset_pass']);

        return redirect()->to('login-mahasiswa')->with('success', 'Reset Password Berhasil!');
    }
}
