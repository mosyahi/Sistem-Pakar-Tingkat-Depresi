<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\FaqModel;

class MasterFaqController extends BaseController
{
    public function index()
    {
        $model = new FaqModel();
        $faq = $model->findAll();

        $data['faq'] = array_map(function ($item) {
            $item['title'] = 'Data Faq';
            $item['edit_url'] = base_url('admin/master_faq/edit/'.$item['id_faq']);
            $item['delete_url'] = base_url('admin/master_faq/delete/'.$item['id_faq']);
            return $item;
        }, $faq);

        $data['title'] = 'Data Faq';

        return view('admin/master_faq/index', $data);
    }


    public function new()
    {
        $data = [
            'title' => 'Tambah Faq',
        ];

        return view('admin/master_faq/new', $data);
    }


    public function simpan()
    {
        $model = new FaqModel();

        $data = [
            'pertanyaan' => $this->request->getPost('pertanyaan'),
            'jawaban' => $this->request->getPost('jawaban'),
        ];

        $model->insert($data);

        return redirect()->to('admin/master_faq')->with('success', 'Data faq berhasil ditambahkan.');
    }


    public function delete($id_faq)
    {
        $model = new FaqModel();

        // Hapus faq
        $model->delete($id_faq);

    return redirect()->to('/admin/master_faq')->with('success', 'Data faq berhasil dihapus.');
}


public function edit($id)
    {
        $model = new FaqModel();
        $data['faq'] = $model->find($id);

        if (!$data['faq']) {
            return redirect()->to('/master_faq')->with('error', 'Data faq tidak ditemukan.');
        }

        $data['title'] = 'Edit Faq';

        return view('admin/master_faq/edit', $data);
    }


    public function update($id)
    {
        $model = new FaqModel();

        // Ambil data faq sebelumnya
        $existingData = $model->find($id);

        // Validasi perubahan data
        if (!$existingData || !$this->isDataChanged($this->request->getPost(), $existingData)) {
            return redirect()->to('admin/master_faq')->withInput()->with('error', 'Tidak ada perubahan data faq.');
        }

        $validationRules = [
            'pertanyaan' => 'required',
            'jawaban' => 'required',
        ];

        if (!$this->validate($validationRules)) {
            return redirect()->back()->withInput()->with('error', $this->validator->listErrors());
        }

        $data = [
            'pertanyaan' => $this->request->getPost('pertanyaan'),
            'jawaban' => $this->request->getPost('jawaban'),
        ];

        $model->update($id, $data);

        return redirect()->to('admin/master_faq')->with('success', 'Data faq berhasil diupdate.');
    }


    // Fungsi untuk memeriksa perubahan data
    private function isDataChanged($newData, $existingData)
    {
        // Bandingkan nilai-nilai dari data baru dengan data yang ada sebelumnya
        return $newData['pertanyaan'] !== $existingData['pertanyaan'] ||
        $newData['jawaban'] !== $existingData['jawaban'];
    }

}