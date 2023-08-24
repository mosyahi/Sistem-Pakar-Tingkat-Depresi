<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PenyakitModel;
use App\Models\AturanModel;

class MasterPenyakitController extends BaseController
{
    public function index()
    {
        $model = new PenyakitModel();
        $penyakit = $model->findAll();

        $data['penyakit'] = array_map(function ($item) {
            $item['edit_url'] = base_url('admin/master_penyakit/edit/'.$item['id_penyakit']);
            $item['delete_url'] = base_url('admin/master_penyakit/delete/'.$item['id_penyakit']);
            return $item;
        }, $penyakit);

        $data['title'] = 'Data Penyakit';

        return view('admin/master_penyakit/index', $data);
    }


    public function new()
    {
        $data = [
            'title' => 'Tambah Penyakit',
        ];

        return view('admin/master_penyakit/new', $data);
    }


    public function simpan()
    {
        $model = new PenyakitModel();

        $data = [
            'kode_penyakit' => $this->request->getPost('kode_penyakit'),
            'nama_penyakit' => $this->request->getPost('nama_penyakit'),
            'deskripsi_penyakit' => $this->request->getPost('deskripsi_penyakit'),
            'solusi_penyakit' => $this->request->getPost('solusi_penyakit'),
        ];

        $existingKodePenyakit = $model->where('kode_penyakit', $data['kode_penyakit'])->countAllResults();
        $existingNamaPenyakit = $model->where('nama_penyakit', $data['nama_penyakit'])->countAllResults();

        if ($existingKodePenyakit > 0 && $existingNamaPenyakit > 0) {
            return redirect()->to('admin/master_penyakit')->withInput()->with('error', 'Kode penyakit dan nama penyakit sudah ada.');
        } elseif ($existingKodePenyakit > 0) {
            return redirect()->to('admin/master_penyakit')->withInput()->with('error', 'Kode penyakit sudah ada.');
        } elseif ($existingNamaPenyakit > 0) {
            return redirect()->to('admin/master_penyakit')->withInput()->with('error', 'Nama penyakit sudah ada.');
        }

        // Cek apakah ada kesamaan pada kode_penyakit dan nama_penyakit
        $existingBoth = $model->where('nama_penyakit', $data['nama_penyakit'])
        ->where('kode_penyakit', $data['kode_penyakit'])
        ->countAllResults();

        if ($existingBoth > 0) {
            return redirect()->to('admin/master_penyakit')->withInput()->with('error', 'Kode penyakit dan nama penyakit sudah ada.');
        }

        $validationRules = [
            'kode_penyakit' => [
                'label' => 'Kode Penyakit',
                'rules' => 'required|regex_match[/^P\d{1,2}$/]',
                'errors' => [
                    'required' => '{field} harus diisi.',
                    'regex_match' => '{field} harus diawali dengan "P" dan diikuti oleh maksimal dua angka (contoh : P01).',
                ],
            ],
        ];

        if (!$this->validate($validationRules)) {
            return redirect()->to('admin/master_penyakit')->withInput()->with('errorVal', $this->validator->listErrors());
        }

        $model->insert($data);

        return redirect()->to('admin/master_penyakit')->with('success', 'Data penyakit berhasil ditambahkan.');
    }


    public function edit($id)
    {
        $model = new PenyakitModel();
        $data['penyakit'] = $model->find($id);

        // if (!$data['penyakit']) {
        //     return redirect()->to('/master_penyakit')->with('error', 'Data penyakit tidak ditemukan.');
        // }

        $data['title'] = 'Edit Penyakit';

        return view('admin/master_penyakit/edit', $data);
    }


    public function update($id)
    {
        $model = new PenyakitModel();

        $existingData = $model->find($id);

        if (!$existingData || !$this->isDataChanged($this->request->getPost(), $existingData)) {
            return redirect()->to('admin/master_penyakit')->withInput()->with('error', 'Tidak ada perubahan data penyakit.');
        }

        $validationRules = [
            'kode_penyakit' => 'required',
            'nama_penyakit' => 'required',
            'deskripsi_penyakit' => 'required',
            'solusi_penyakit' => 'required',
        ];

        if (!$this->validate($validationRules)) {
            return redirect()->back()->withInput()->with('error', $this->validator->listErrors());
        }

        $data = [
            'kode_penyakit' => $this->request->getPost('kode_penyakit'),
            'nama_penyakit' => $this->request->getPost('nama_penyakit'),
            'deskripsi_penyakit' => $this->request->getPost('deskripsi_penyakit'),
            'solusi_penyakit' => $this->request->getPost('solusi_penyakit'),
        ];

        if ($existingData['nama_penyakit'] !== $data['nama_penyakit'] && $model->where('nama_penyakit', $data['nama_penyakit'])->countAllResults() > 0) {
            return redirect()->to('admin/master_penyakit')->withInput()->with('error', 'Nama penyakit sudah ada.');
        }

        $model->update($id, $data);

        return redirect()->to('admin/master_penyakit')->with('success', 'Data penyakit berhasil diupdate.');
    }

    private function isDataChanged($newData, $existingData)
    {
        return $newData['kode_penyakit'] !== $existingData['kode_penyakit'] ||
        $newData['nama_penyakit'] !== $existingData['nama_penyakit'] ||
        $newData['deskripsi_penyakit'] !== $existingData['deskripsi_penyakit'] ||
        $newData['solusi_penyakit'] !== $existingData['solusi_penyakit'];
    }


    public function delete($id_penyakit)
    {
        $penyakitModel = new PenyakitModel();
        $aturanModel = new AturanModel();

        $countAturan = $aturanModel->where('id_penyakit', $id_penyakit)->countAllResults();
        if ($countAturan > 0) {
            return redirect()->to('/admin/master_penyakit')->with('error', 'Penyakit tidak dapat dihapus karena terkait dengan aturan, Silahkan hapus aturan terlebih dahulu!');
        }

        $penyakitModel->delete($id_penyakit);

        return redirect()->to('/admin/master_penyakit')->with('success', 'Data penyakit berhasil dihapus.');
    }

}