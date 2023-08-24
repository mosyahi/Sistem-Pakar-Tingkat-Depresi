<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\DiagnosaModel;
use App\Models\PenyakitModel;
use App\Models\GejalaModel;
use App\Models\CFMahasiswaModel;
use App\Models\DiagnosaGejalaModel;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Dompdf\Dompdf;

class MasterLaporanController extends BaseController
{
    public function index()
    {
        $diagnosaModel = new DiagnosaModel();
        $laporan = $diagnosaModel->getLaporan();
        $data = [
            'title' => 'Data Laporan',
            'laporan' => $laporan 
        ];

        return view('admin/master_laporan/index', $data);
    }

    public function lihat($idDiagnosa)
    {
        $diagnosaModel = new DiagnosaModel();
        $diagnosaGejalaModel = new DiagnosaGejalaModel();
        $penyakitModel = new PenyakitModel();
        $gejalaModel = new GejalaModel();  
        $CFMahasiswaModel = new CFMahasiswaModel(); 

        $diagnosa = $diagnosaModel->find($idDiagnosa);

        $diagnosaGejala = $diagnosaGejalaModel->where('id_diagnosa', $idDiagnosa)->findAll();

        foreach ($diagnosaGejala as &$data) {
            $cfMahasiswa = $CFMahasiswaModel->find($data['id_cf_mahasiswa']);
            $data['nama_nilai'] = $cfMahasiswa['nama_nilai'];
            $data['cf'] = $cfMahasiswa['cf'];
        }

        foreach ($diagnosaGejala as &$data) {
            $penyakitDiagnosa = $penyakitModel->find($data['id_penyakit']);
            $data['nama_penyakit'] = $penyakitDiagnosa['nama_penyakit'];
            $data['kode_penyakit'] = $penyakitDiagnosa['kode_penyakit'];
        }

        foreach ($diagnosaGejala as &$data) {
            $gejala = $gejalaModel->find($data['id_gejala']);
            $data['kode_gejala'] = $gejala['kode_gejala'];
            $data['nama_gejala'] = $gejala['nama_gejala'];
        }

        $penyakit = $penyakitModel->find($diagnosa['id_penyakit']);

        return view('admin/master_laporan/view', [
            'diagnosa' => $diagnosa,
            'diagnosaGejala' => $diagnosaGejala,
            'penyakit' => $penyakit,
            'title' => 'Laporan'
        ]);
    }

    public function delete($id_diagnosa)
    {
        $diagnosaModel = new DiagnosaModel();
        $diagnosaGejalaModel = new DiagnosaGejalaModel();

        $diagnosaGejalaModel->where('id_diagnosa', $id_diagnosa)->delete();

        $diagnosaModel->delete($id_diagnosa);

        return redirect()->to('/admin/master_laporan')->with('success', 'Data berhasil dihapus.');
    }


    public function cetakExcel()
    {
        $diagnosaModel = new DiagnosaModel();
        // $penyakitModel = new PenyakitModel();

        $laporan = $diagnosaModel->select('tbl_diagnosa.*, tbl_penyakit.nama_penyakit')
        ->join('tbl_penyakit', 'tbl_penyakit.id_penyakit = tbl_diagnosa.id_penyakit', 'left')
        ->findAll();

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'Laporan Data Diagnosa');
        $sheet->setCellValue('A2', 'Tanggal Cetak: ' . date('d-m-Y'));
        $sheet->setCellValue('A3', '');

        $sheet->setCellValue('A4', 'No');
        $sheet->setCellValue('B4', 'Nama Mahasiswa');
        $sheet->setCellValue('C4', 'NIM');
        $sheet->setCellValue('D4', 'Semester');
        $sheet->setCellValue('E4', 'Tanggal');
        $sheet->setCellValue('F4', 'Penyakit');
        $sheet->setCellValue('G4', 'CF Akhir');
        $sheet->setCellValue('H4', 'Presentase');

        $row = 5;
        foreach ($laporan as $key => $data) {
            $sheet->setCellValue('A' . $row, $key + 1);
            $sheet->setCellValue('B' . $row, $data['nama_mahasiswa']);
            $sheet->setCellValue('C' . $row, $data['nim']);
            $sheet->setCellValue('D' . $row, $data['semester']);
            $sheet->setCellValue('E' . $row, $data['tgl_diagnosa']);
            $sheet->setCellValue('F' . $row, $data['nama_penyakit']);
            $sheet->setCellValue('G' . $row, $data['cf_akhir']);
            $sheet->setCellValue('H' . $row, $data['presentase'] . '%');
            $row++;
        }

        $sheet->getColumnDimension('A')->setWidth(5);
        $sheet->getColumnDimension('B')->setWidth(20);
        $sheet->getColumnDimension('C')->setWidth(15);
        $sheet->getColumnDimension('D')->setWidth(15);
        $sheet->getColumnDimension('E')->setWidth(15);
        $sheet->getColumnDimension('F')->setWidth(20);
        $sheet->getColumnDimension('G')->setWidth(15);
        $sheet->getColumnDimension('H')->setWidth(15);

        $filename = 'Laporan-Diagnosa_' . date('d-m-Y') . '.xlsx';
        $writer = new Xlsx($spreadsheet);
        $filePath = WRITEPATH . 'uploads/' . $filename;
        $writer->save($filePath);
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="' . $filename . '"');
        header('Content-Length: ' . filesize($filePath));
        readfile($filePath);

        exit;
    }

    public function cetakPdf()
    {
        $diagnosaModel = new DiagnosaModel();

        $laporan = $diagnosaModel->select('tbl_diagnosa.*, tbl_penyakit.nama_penyakit')
        ->join('tbl_penyakit', 'tbl_penyakit.id_penyakit = tbl_diagnosa.id_penyakit', 'left')
        ->findAll();

        $view = view('admin/master_laporan/laporan_pdf', ['laporan' => $laporan]);
        $dompdf = new Dompdf();
        $dompdf->loadHtml($view);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        $pdfContent = $dompdf->output();
        $filename = 'Laporan-Diagnosa_' . date('d-m-Y') . '.pdf';
        $response = service('response');
        $response->setContentType('application/pdf');
        $response->setHeader('Content-Disposition', 'attachment; filename="' . $filename . '"');
        $response->setBody($pdfContent);

        return $response;
    }


    public function cetakLangsung()
    {
        $diagnosaModel = new DiagnosaModel();

        $laporan = $diagnosaModel->select('tbl_diagnosa.*, tbl_penyakit.nama_penyakit')
        ->join('tbl_penyakit', 'tbl_penyakit.id_penyakit = tbl_diagnosa.id_penyakit', 'left')
        ->findAll();

        $data = [
            'laporan' => $laporan,
            'title' => 'Cetak Laporan Diagnosa'
        ];

        $view = view('admin/master_laporan/cetak_laporan', $data);
        $response = service('response');
        $response->setContentType('text/html');
        $response->setBody($view);

        return $response;
    }

    public function unduhDiagnosa($id_diagnosa)
    {
        $diagnosaModel = new DiagnosaModel();
        $diagnosaGejalaModel = new DiagnosaGejalaModel();

        $lastDiagnosa = $diagnosaModel->orderBy('id_diagnosa', 'DESC')->first();
        $pasienId = $id_diagnosa;
        $laporanDiagnosa = $diagnosaModel->select('tbl_diagnosa.*, tbl_penyakit.kode_penyakit, tbl_penyakit.nama_penyakit, tbl_penyakit.deskripsi_penyakit, tbl_penyakit.solusi_penyakit')
        ->join('tbl_penyakit', 'tbl_penyakit.id_penyakit = tbl_diagnosa.id_penyakit', 'left')
        ->where('tbl_diagnosa.id_diagnosa', $pasienId)
        ->findAll();

        $lastDiagnosaGejala = $diagnosaGejalaModel->orderBy('id', 'DESC')->first();

        $laporanGejala = $diagnosaGejalaModel->select('tbl_diagnosa_gejala.*, tbl_gejala.kode_gejala, tbl_gejala.nama_gejala, tbl_cf_user.nama_nilai, tbl_cf_user.cf, tbl_penyakit.kode_penyakit, tbl_penyakit.nama_penyakit,')
        ->join('tbl_gejala', 'tbl_gejala.id_gejala = tbl_diagnosa_gejala.id_gejala', 'left')
        ->join('tbl_penyakit', 'tbl_penyakit.id_penyakit = tbl_diagnosa_gejala.id_penyakit', 'left')
        ->join('tbl_cf_user', 'tbl_cf_user.id_cf_mahasiswa = tbl_diagnosa_gejala.id_cf_mahasiswa', 'left')
        ->join('tbl_diagnosa', 'tbl_diagnosa.id_diagnosa = tbl_diagnosa_gejala.id_diagnosa', 'left')
        ->where('tbl_diagnosa.id_diagnosa', $pasienId)
        ->findAll();

        $view = view('diagnosa/cetak_diagnosa', ['laporanDiagnosa' => $laporanDiagnosa, 'laporanGejala' => $laporanGejala]);
        $dompdf = new Dompdf();
        $dompdf->loadHtml($view);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        $pdfContent = $dompdf->output();
        $filename = 'Laporan-Diagnosa_' . date('d-m-Y') . '.pdf';
        $response = service('response');
        $response->setContentType('application/pdf');
        $response->setHeader('Content-Disposition', 'attachment; filename="' . $filename . '"');
        $response->setBody($pdfContent);

        return $response;
    }

    public function truncateData()
    {
        $diagnosaModel = new DiagnosaModel();
        $diagnosaModel->truncate();

        $diagnosaGejalaModel = new DiagnosaGejalaModel();
        $diagnosaGejalaModel->truncate();
        session()->setFlashdata('success', 'Keseluruhan data berhasil dihapus.');

        return redirect()->to(base_url('admin/master_laporan'));
    }
}