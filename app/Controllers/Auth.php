<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\MahasiswaModel;
use App\Models\GoogleModel;
use Google_Client;

class Auth extends BaseController
{

    private function initializeGoogleClient()
    {
        $client = new Google_Client();
        $client->setClientId('************************');
        $client->setClientSecret('*********************');
        $client->setRedirectUri(base_url('login-google/callback'));
        $client->addScope('email');
        $client->addScope('profile');
        return $client;
    }

    public function showLogin()
    {
        $session = session();
        
        if ($session->get('logged_in') || $session->get('login_diagnosa')) {
            return redirect()->back()->with('error', 'Anda harus logout terlebih dahulu');
        }
        return view('admin/auth/login');
    }

    public function showLoginMahasiswa()
    {
        $session = session();
        
        if ($session->get('logged_in') || $session->get('login_diagnosa')) {
            return redirect()->back()->with('error', 'Anda harus logout terlebih dahulu');
        }
        return view('diagnosa/auth/login');
    }

    public function login()
    {
        $model = new UserModel();
        $inputUsername = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $user = $model->getUserByUsername($inputUsername);

        if ($user && password_verify($password, $user['password']) && $inputUsername === $user['username']) {
            // Login sukses
            $session = session();
            $session->set([
                'logged_in' => true,
                'admin_id' => $user['id_admin'],
                'username' => $user['username'],
                'nama_lengkap' => $user['nama_lengkap']
            ]);

            $alertMessage = "Selamat datang, " . $user['nama_lengkap'] . "!";
            return redirect()->to('admin')->with('logSuccess', $alertMessage);
        } else {
            return redirect()->back()->withInput()->with('error', 'Username atau password salah');
        }
    }

    public function loginMahasiswa()
    {
        $model = new MahasiswaModel();
        $inputEmail = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $failedAttempts = session()->get('failed_attempts') ?? 0;

        if ($failedAttempts >= 3) {
            $lastFailedAttempt = session()->get('last_failed_attempt') ?? 0;
            $currentTime = time();

            if ($currentTime - $lastFailedAttempt < 180) { 
                $remainingTime = 180 - ($currentTime - $lastFailedAttempt);
                return redirect()->to('login-mahasiswa')->withInput()->with('remainingTime', $remainingTime);
            }
        }

        $mahasiswa = $model->getUserByEmail($inputEmail);

        if ($mahasiswa) {
            if (password_verify($password, $mahasiswa['password'])) {
                session()->remove('failed_attempts');
                session()->remove('last_failed_attempt');

                $session = session();
                $session->set([
                    'login_diagnosa' => true,
                    'mahasiswa_id' => $mahasiswa['id_mahasiswa'],
                    'email' => $mahasiswa['email'],
                    'nama_lengkap' => $mahasiswa['nama_lengkap']
                ]);

                $alertMessage = "Selamat datang, " . $mahasiswa['nama_lengkap'] . "!";
                return redirect()->to('mahasiswa/cek_diagnosa')->with('logSuccess', $alertMessage);
            } else {
                $failedAttempts++;
                session()->set('failed_attempts', $failedAttempts);
                session()->set('last_failed_attempt', time());

                if ($failedAttempts === 1 || $failedAttempts === 2) {
                    return redirect()->to('login-mahasiswa')->withInput()->with('error', 'Email atau password salah');
                } elseif ($failedAttempts >= 3) {
                    $remainingTime = 180;
                    return redirect()->to('login-mahasiswa')->withInput()->with('remainingTime', $remainingTime);
                }
            }
        } else {
            return redirect()->to('login-mahasiswa')->withInput()->with('error', 'Email tidak terdaftar');
        }
    }

    public function loginGoogle()
    {
        $client = $this->initializeGoogleClient();
        $authUrl = $client->createAuthUrl();
        return redirect()->to($authUrl);
    }

    public function googleCallback()
    {
        $client = $this->initializeGoogleClient();
        $code = $this->request->getGet('code');

        if ($code) {
            $token = $client->fetchAccessTokenWithAuthCode($code);
            if (!isset($token['error'])) {
                $oauth2Service = new \Google_Service_Oauth2($client);
                $userInfo = $oauth2Service->userinfo->get();

                $googleModel = new \App\Models\GoogleModel();
                $existingUser = $googleModel->where('google_id', $userInfo->getId())->first();

                if (!$existingUser) {
                    $userData = [
                        'google_id' => $userInfo->getId(),
                        'email' => $userInfo->getEmail(),
                        'nama_lengkap' => $userInfo->getName(),
                    ];
                    $googleModel->insert($userData);
                }
                $session = session();
                // $session->set('login_diagnosa', true);
                $session->set([
                    'login_diagnosa' => true,
                    'email' => $userInfo->getEmail(),
                    'nama_lengkap' => $userInfo->getName()
                ]);
                $alertMessage = "Selamat datang, " . $userInfo->getName() . "!";
                return redirect()->to('mahasiswa/cek_diagnosa')->with('logSuccess', $alertMessage);

            } else {

                return redirect()->to('login-mahasiswa')->with('error', 'Gagal mengotentikasi dengan Google.');
            }
        } else {
            return redirect()->to('login-mahasiswa')->with('error', 'Kode otorisasi tidak ditemukan.');
        }
    }

    public function logout()
    {
        $client = $this->initializeGoogleClient();
        $client->revokeToken();
        // composer require google/apiclient:^2.14

        $session = session();
        $session->destroy();

        return redirect()->to('/');
    }

}