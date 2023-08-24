<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\OtpModel;
use App\Models\ResetPasswordModel;
use App\Models\MahasiswaModel;

class OTPController extends BaseController
{
    public function index()
    {
        $model = new OtpModel();
        $dataOtp = $model->findAll();

        $data = [
            'title' => 'Master Akun',
            'dataOtp' => $dataOtp
        ];
        return view('admin/master_otp/index', $data);
    }

    public function indexToken()
    {
        $model = new ResetPasswordModel();
        $dataToken = $model->findAll();

        $modelMahasiswa = new MahasiswaModel();

        foreach ($dataToken as $key => $token) {
            $tokenData = $modelMahasiswa->find($token['id_mahasiswa']);
            $dataToken[$key]['mahasiswa'] = $tokenData;
        }

        $data = [
            'title' => 'Master Akun',
            'dataToken' => $dataToken
        ];
        return view('admin/master_token/index', $data);
    }

    public function truncateData()
    {
        $otpModel = new OtpModel();
        $otpModel->emptyTable(); 

        session()->setFlashdata('success', 'Keseluruhan data OTP berhasil dihapus.');

        return redirect()->back();
    }

    public function truncateDataToken()
    {
        $tokenModel = new ResetPasswordModel();
        $tokenModel->emptyTable(); 

        session()->setFlashdata('success', 'Keseluruhan data token berhasil dihapus.');

        return redirect()->back();
    }

    public function delete($id)
    {
        $otpModel = new OtpModel();

        $otpModel->delete($id);

        return redirect()->back()->with('success', 'Data OTP berhasil dihapus.');
    }

    public function hapus($id_reset_pass)
    {
        $tokenModel = new ResetPasswordModel();

        $tokenModel->delete($id_reset_pass);

        return redirect()->back()->with('success', 'Data Token berhasil dihapus.');
    }
}
