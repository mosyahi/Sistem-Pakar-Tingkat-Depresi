<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\MahasiswaModel;

class MasterUserController extends BaseController
{
    public function index()
    {
        $model = new UserModel();
        $dataAdmin = $model->findAll();

        $data = [
            'title' => 'Master Akun',
            'dataAdmin' => $dataAdmin
        ];
        return view('admin/master_admin/index', $data);
    }

    public function indexMahasiswa()
    {
        $model = new MahasiswaModel();
        $dataMahasiswa = $model->findAll();

        $data = [
            'title' => 'Master Akun',
            'dataMahasiswa' => $dataMahasiswa
        ];
        return view('admin/master_mahasiswa/index', $data);
    }

    public function truncateData()
    {
        $adminModel = new UserModel();
        $adminModel->truncate(); 

        // Simpan pesan sukses ke dalam flash data
        session()->setFlashdata('success', 'Keseluruhan data admin berhasil dihapus.');

        // Redirect ke halaman laporan
        return redirect()->back();
    }

    public function truncateDataMahasiswa()
    {
        $mahasiswaModel = new MahasiswaModel();
        $mahasiswaModel->emptyTable(); 

        // Simpan pesan sukses ke dalam flash data
        session()->setFlashdata('success', 'Keseluruhan data mahasiswa berhasil dihapus.');

        // Redirect ke halaman laporan
        return redirect()->back();
    }

    public function delete($id_admin)
    {
        $userModel = new UserModel();
        // $diagnosaGejalaModel = new DiagnosaGejalaModel();

        $userModel->delete($id_admin);

        return redirect()->to('admin/master_admin')->with('success', 'Data Admin berhasil dihapus.');
    }

    public function hapus($id_mahasiswa)
    {
        $mahasiswaModel = new MahasiswaModel();

        $mahasiswaModel->delete($id_mahasiswa);

        return redirect()->to('admin/master_user')->with('success', 'Data Admin berhasil dihapus.');
    }
}
