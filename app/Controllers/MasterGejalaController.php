<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\GejalaModel;
use App\Models\AturanModel;

class MasterGejalaController extends BaseController
{
    public function index()
    {
        $model = new GejalaModel();
        $gejala = $model->findAll();

        $data['gejala'] = array_map(function ($item) {
            $item['edit_url'] = base_url('admin/master_gejala/edit/'.$item['id_gejala']);
            $item['delete_url'] = base_url('admin/master_gejala/delete/'.$item['id_gejala']);
            return $item;
        }, $gejala);

        $data['title'] = 'Data Gejala';

        return view('admin/master_gejala/index', $data);
    }


    public function new()
    {
        $data = [
            'title' => 'Tambah Gejala',
        ];

        return view('admin/master_gejala/new', $data);
    }


    public function simpan()
    {
        $model = new GejalaModel();

        $data = [
            'kode_gejala' => $this->request->getPost('kode_gejala'),
            'nama_gejala' => $this->request->getPost('nama_gejala'),
        ];

        // Cek apakah kode_gejala sudah ada sebelumnya
        $existingKodeGejala = $model->where('kode_gejala', $data['kode_gejala'])->countAllResults();
        // Cek apakah nama_gejala sudah ada sebelumnya
        $existingNamaGejala = $model->where('nama_gejala', $data['nama_gejala'])->countAllResults();

        if ($existingKodeGejala > 0 && $existingNamaGejala > 0) {
            return redirect()->to('admin/master_gejala')->withInput()->with('error', 'Kode gejala dan nama gejala sudah ada.');
        } elseif ($existingKodeGejala > 0) {
            return redirect()->to('admin/master_gejala')->withInput()->with('error', 'Kode gejala sudah ada.');
        } elseif ($existingNamaGejala > 0) {
            return redirect()->to('admin/master_gejala')->withInput()->with('error', 'Nama gejala sudah ada.');
        }

        // Cek apakah ada kesamaan pada kode_gejala dan nama_gejala
        $existingBoth = $model->where('nama_gejala', $data['nama_gejala'])
                                ->where('kode_gejala', $data['kode_gejala'])
                                ->countAllResults();

        if ($existingBoth > 0) {
            return redirect()->to('admin/master_gejala')->withInput()->with('error', 'Kode gejala dan nama gejala sudah ada.');
        }


        $validationRules = [
                'kode_gejala' => [
                    'label' => 'Kode Gejala',
                    'rules' => 'required|regex_match[/^G\d{1,2}$/]',
                    'errors' => [
                        'required' => '{field} harus diisi.',
                        'regex_match' => '{field} harus diawali dengan "G" dan diikuti oleh maksimal dua angka (contoh : G01).',
                    ],
                ],
                'nama_gejala' => [
                    'label' => 'Nama Gejala',
                    'rules' => 'required',
                    'errors' => [
                    'required' => '{field} harus diisi.',
                ],
            ],
        ];

            if (!$this->validate($validationRules)) {
                return redirect()->to('admin/master_gejala')->withInput()->with('errorVal', $this->validator->listErrors());
            }

        $model->insert($data);

        return redirect()->to('admin/master_gejala')->with('success', 'Data gejala berhasil ditambahkan.');
    }


    public function edit($id)
    {
        $model = new GejalaModel();
        $data['gejala'] = $model->find($id);

        // if (!$data['gejala']) {
        //     return redirect()->to('/master_gejala')->with('error', 'Data gejala tidak ditemukan.');
        // }

        $data['title'] = 'Edit Gejala';

        return view('admin/master_gejala/edit', $data);
    }


    public function update($id)
    {
        $model = new GejalaModel();

        // Ambil data gejala sebelumnya
        $existingData = $model->find($id);

        // Validasi perubahan data
        if (!$existingData || !$this->isDataChanged($this->request->getPost(), $existingData)) {
            return redirect()->to('admin/master_gejala')->withInput()->with('error', 'Tidak ada perubahan data gejala.');
        }

        $validationRules = [
            'kode_gejala' => 'required',
            'nama_gejala' => 'required',
        ];

        if (!$this->validate($validationRules)) {
            return redirect()->back()->withInput()->with('error', $this->validator->listErrors());
        }

        $data = [
            'kode_gejala' => $this->request->getPost('kode_gejala'),
            'nama_gejala' => $this->request->getPost('nama_gejala'),
        ];

        // Cek apakah nama_gejala sudah ada sebelumnya, kecuali jika tidak ada perubahan pada nama_gejala
        if ($existingData['nama_gejala'] !== $data['nama_gejala'] && $model->where('nama_gejala', $data['nama_gejala'])->countAllResults() > 0) {
            return redirect()->to('admin/master_gejala')->withInput()->with('error', 'Nama gejala sudah ada.');
        }

        $model->update($id, $data);

        return redirect()->to('admin/master_gejala')->with('success', 'Data gejala berhasil diupdate.');
    }


    // Fungsi untuk memeriksa perubahan data
    private function isDataChanged($newData, $existingData)
    {
        // Bandingkan nilai-nilai dari data baru dengan data yang ada sebelumnya
        return $newData['kode_gejala'] !== $existingData['kode_gejala'] ||
        $newData['nama_gejala'] !== $existingData['nama_gejala'];
    }


    public function delete($id_gejala)
    {
        $gejalaModel = new GejalaModel();
        $aturanModel = new AturanModel();

        // Periksa apakah ada aturan terkait dengan gejala yang akan dihapus
        $countAturan = $aturanModel->where('id_gejala', $id_gejala)->countAllResults();
        if ($countAturan > 0) {
            return redirect()->to('/admin/master_gejala')->with('error', 'Gejala tidak dapat dihapus karena terkait dengan aturan, Silahkan hapus aturan terlebih dahulu!');
    }

        // Hapus gejala
        $gejalaModel->delete($id_gejala);

        return redirect()->to('/admin/master_gejala')->with('success', 'Data gejala berhasil dihapus.');
    }

}