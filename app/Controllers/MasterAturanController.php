<?php

namespace App\Controllers;

use App\Models\AturanModel;
use App\Models\PenyakitModel;
use App\Models\GejalaModel;

class MasterAturanController extends BaseController
{
    public function index()
    {
        $aturanModel = new AturanModel();
        $aturanData = $aturanModel->findAll();

        $penyakitModel = new PenyakitModel();
        $gejalaModel = new GejalaModel();

        foreach ($aturanData as $key => $aturan) {
            $penyakitData = $penyakitModel->find($aturan['id_penyakit']);
            $gejalaData = $gejalaModel->find($aturan['id_gejala']);

            $aturanData[$key]['penyakit'] = $penyakitData;
            $aturanData[$key]['gejala'] = $gejalaData;
        }

        $data = [
            'aturan' => $aturanData,
            'title' => 'Data Aturan',
        ];

        return view('admin/master_aturan/index', $data);
    }


    public function new()
    {
        $penyakitModel = new PenyakitModel();
        $gejalaModel = new GejalaModel();

        $data = [
            'penyakit' => $penyakitModel->orderBy('kode_penyakit', 'ASC')->findAll(),
            'gejala' => $gejalaModel->orderBy('kode_gejala', 'ASC')->findAll(),
            'title' => 'Tambah Aturan',
        ];

        return view('admin/master_aturan/new', $data);
    }


    public function simpan()
    {
        $aturanModel = new AturanModel();

        $data = [
            'id_penyakit' => $this->request->getPost('penyakit'),
            'id_gejala' => $this->request->getPost('gejala'),
            'mb' => $this->request->getPost('mb'),
            'md' => $this->request->getPost('md'),
            'cf' => $this->request->getPost('mb') - $this->request->getPost('md'),
        ];

        // Cek apakah kombinasi kode_penyakit dan kode_gejala uwis ana
        $existingData = $aturanModel->where('id_penyakit', $data['id_penyakit'])
        ->where('id_gejala', $data['id_gejala'])
        ->first();

        if ($existingData) {
            return redirect()->to(base_url('/admin/master_aturan/new'))
            ->withInput()
            ->with('error', 'Kombinasi data aturan dari kode_penyakit dan kode_gejala sudah ada!');
        }

        $aturanModel->insert($data);

        return redirect()->back()->with('success', 'Aturan berhasil ditambahkan.');
    }


    public function edit($id)
    {
        $aturanModel = new AturanModel();
        $penyakitModel = new PenyakitModel();
        $gejalaModel = new GejalaModel();

        $aturanData = $aturanModel->find($id);
        
        // Mengurutkan data penyakit berdasarkan kode_penyakit
        $penyakitData = $penyakitModel->orderBy('kode_penyakit', 'ASC')->findAll();

        // Mengurutkan data gejala berdasarkan kode_gejala
        $gejalaData = $gejalaModel->orderBy('kode_gejala', 'ASC')->findAll();

        $data = [
            'aturan' => $aturanData,
            'penyakit' => $penyakitData,
            'gejala' => $gejalaData,
            'title' => 'Edit Aturan',
        ];

        return view('admin/master_aturan/edit', $data);
    }


    public function update($id)
    {
        $aturanModel = new AturanModel();

        // Mendapatkan data aturan yang ada sebelumnya
        $existingData = $aturanModel->find($id);

        $data = [
            'id_penyakit' => $this->request->getPost('penyakit'),
            'id_gejala' => $this->request->getPost('gejala'),
            'mb' => $this->request->getPost('mb'),
            'md' => $this->request->getPost('md'),
            'cf' => $this->request->getPost('mb') - $this->request->getPost('md'),
        ];

        // Cek kombinasi kode penyakit dan kode gejala agar tidak ada yang sama
        $existingCombination = $aturanModel->where('id_penyakit', $data['id_penyakit'])
        ->where('id_gejala', $data['id_gejala'])
        ->where('id_aturan !=', $id)
        ->first();

        if ($existingCombination) {
            return redirect()->to(base_url('/admin/master_aturan/edit/' . $id))
            ->withInput()
            ->with('error', 'Kombinasi data aturan dari kode_penyakit dan kode_gejala sudah ada!');
        }

        // Cek data jika tidak ada perubahan
        if (!$existingData || !$this->isDataChanged($this->request->getPost(), $existingData)) {
            return redirect()->to('admin/master_aturan')->withInput()->with('error', 'Tidak ada perubahan data gejala.');
        }

        $aturanModel->update($id, $data);

        return redirect()->to(base_url('/admin/master_aturan'))->with('success', 'Aturan berhasil diperbarui.');
    }

    // Fungsi untuk memeriksa perubahan data
    private function isDataChanged($newData, $existingData)
    {
        // Bandingkan nilai-nilai dari data baru dengan data yang ada sebelumnya
        return $newData['penyakit'] !== $existingData['id_penyakit'] ||
        $newData['gejala'] !== $existingData['id_gejala'] ||
        $newData['mb'] !== $existingData['mb'] ||
        $newData['md'] !== $existingData['md'];
    }


    public function delete($id)
    {
        $aturanModel = new AturanModel();
        $aturanModel->delete($id);

        return redirect()->to(base_url('/admin/master_aturan'))->with('success', 'Aturan berhasil dihapus.');
    }
}