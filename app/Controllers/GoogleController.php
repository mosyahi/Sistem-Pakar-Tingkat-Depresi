<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\GoogleModel;

class GoogleController extends BaseController
{
    public function index()
    {
        $model = new GoogleModel();
        $dataGoogle = $model->findAll();

        $data = [
            'title' => 'Master Google',
            'dataGoogle' => $dataGoogle
        ];
        return view('admin/master_google/index', $data);
    }

    public function truncateDataGoogle()
    {
        $googleModel = new GoogleModel();
        $googleModel->emptyTable(); 

        // Simpan pesan sukses ke dalam flash data
        session()->setFlashdata('success', 'Keseluruhan data google berhasil dihapus.');

        // Redirect ke halaman laporan
        return redirect()->back();
    }

    public function delete($id)
    {
        $googleModel = new GoogleModel();

        $googleModel->delete($id);

        return redirect()->back()->with('success', 'Data Google berhasil dihapus.');
    }
}
