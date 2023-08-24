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

        // // Konfigurasi pagination
        // $pager = \Config\Services::pager();
        // $perPage = 10; // Jumlah data per halaman
        // $currentPage = $this->request->getVar('page') ? (int)$this->request->getVar('page') : 1; // Halaman saat ini, jika tidak ada parameter 'page', default adalah halaman 1

        // if ($search) {
        // // Jika ada input pencarian, lakukan pencarian berdasarkan beberapa kolom menggunakan query builder
        //     $penyakit = $model->like('kode_penyakit', $search)
        //     ->orLike('nama_penyakit', $search)
        //     ->orLike('deskripsi_penyakit', $search)
        //     ->orLike('solusi_penyakit', $search)
        //     ->findAll();
        // } else {
        // Jika tidak ada input pencarian, ambil semua data penyakit
            
        // }

        // $total = $model->countAllResults(); // Total jumlah data penyakit
        // $penyakit = $model->paginate($perPage, 'penyakit', $currentPage); // Ambil data penyakit untuk halaman saat ini

        $data['penyakit'] = array_map(function ($item) {
            $item['edit_url'] = base_url('admin/master_penyakit/edit/'.$item['id_penyakit']);
            $item['delete_url'] = base_url('admin/master_penyakit/delete/'.$item['id_penyakit']);
            return $item;
        }, $penyakit);

    //     $data = [
    //         'penyakit' => array_map(function ($item) {
    //             $item['edit_url'] = base_url('admin/master_penyakit/edit/'.$item['id_penyakit']);
    //             $item['delete_url'] = base_url('admin/master_penyakit/delete/'.$item['id_penyakit']);
    //             return $item;
    //         }, $penyakit),
    //     'pager' => $pager->makeLinks($currentPage, $perPage, $total, 'admin/master_penyakit'), // Menghasilkan link pagination
    // ];
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

        // Cek apakah kode_penyakit sudah ada sebelumnya
        $existingKodePenyakit = $model->where('kode_penyakit', $data['kode_penyakit'])->countAllResults();
        // Cek apakah nama_penyakit sudah ada sebelumnya
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

        // Ambil data penyakit sebelumnya
        $existingData = $model->find($id);

        // Validasi perubahan data
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

        // Cek apakah nama_penyakit sudah ada sebelumnya, kecuali jika tidak ada perubahan pada nama_penyakit
        if ($existingData['nama_penyakit'] !== $data['nama_penyakit'] && $model->where('nama_penyakit', $data['nama_penyakit'])->countAllResults() > 0) {
            return redirect()->to('admin/master_penyakit')->withInput()->with('error', 'Nama penyakit sudah ada.');
        }

        $model->update($id, $data);

        return redirect()->to('admin/master_penyakit')->with('success', 'Data penyakit berhasil diupdate.');
    }


    // Fungsi untuk memeriksa perubahan data
    private function isDataChanged($newData, $existingData)
    {
        // Bandingkan nilai-nilai dari data baru dengan data yang ada sebelumnya
        return $newData['kode_penyakit'] !== $existingData['kode_penyakit'] ||
        $newData['nama_penyakit'] !== $existingData['nama_penyakit'] ||
        $newData['deskripsi_penyakit'] !== $existingData['deskripsi_penyakit'] ||
        $newData['solusi_penyakit'] !== $existingData['solusi_penyakit'];
    }


    public function delete($id_penyakit)
    {
        $penyakitModel = new PenyakitModel();
        $aturanModel = new AturanModel();

        // Periksa apakah ada aturan terkait dengan penyakit yang akan dihapus
        $countAturan = $aturanModel->where('id_penyakit', $id_penyakit)->countAllResults();
        if ($countAturan > 0) {
            return redirect()->to('/admin/master_penyakit')->with('error', 'Penyakit tidak dapat dihapus karena terkait dengan aturan, Silahkan hapus aturan terlebih dahulu!');
        }

        // Hapus penyakit
        $penyakitModel->delete($id_penyakit);

    return redirect()->to('/admin/master_penyakit')->with('success', 'Data penyakit berhasil dihapus.');
}

}