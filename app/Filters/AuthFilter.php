<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Config\Services;

class AuthFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $session = Services::session();

        $isAdmin = $session->get('logged_in');
        $isMahasiswa = $session->get('login_diagnosa');

        // Cek apakah sedang di halaman login admin
        $isAdminSignInPage = ($request->uri->getPath() === 'AdministratorSign-In');

        // Cek apakah sedang di halaman login mahasiswa
        $isMahasiswaSignInPage = ($request->uri->getPath() === 'LoginMahasiswa');

        if ($isAdmin) {
            
        } elseif ($isMahasiswa) {
            // Jika sudah login sebagai mahasiswa, pastikan pengguna hanya dapat mengakses halaman yang sesuai
            if (!$isMahasiswaSignInPage && strpos($request->uri->getPath(), 'mahasiswa') === false) {
                return redirect()->to('mahasiswa/cek_diagnosa')->with('error', 'Anda tidak diizinkan mengakses halaman ini');
            }
        } else {
            // Jika belum login, pastikan pengguna hanya dapat mengakses halaman login
            if (!$isAdminSignInPage && !$isMahasiswaSignInPage) {
                return redirect()->to('login-mahasiswa')->with('error', 'Anda harus login terlebih dahulu');
            }
        }

        return $request;
    }


    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do nothing
    }
}
