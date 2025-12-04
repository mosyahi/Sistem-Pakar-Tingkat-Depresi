<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\GejalaModel;
use App\Models\CFMahasiswaModel;
use App\Models\DiagnosaModel;
use App\Models\PenyakitModel;
use App\Models\AturanModel;
use App\Models\DiagnosaGejalaModel;
use Dompdf\Dompdf;

class MasterDiagnosaController extends BaseController
{
    public function cek()
    {
        $gejala = new GejalaModel();
        $cfMahasiswaModel = new CFMahasiswaModel();

        $data['result'] = $gejala->findAll();
        $data['listCFMahasiswa'] = $cfMahasiswaModel->findAll();
        $data['title'] = 'Cek Diagnosa';
        return view('diagnosa/index', $data);
    }
    
    public function hitung()
    {
        $aturanModel = new AturanModel();
        $diagnosaModel = new DiagnosaModel();
        $gejalaModel = new GejalaModel();
        $penyakitModel = new PenyakitModel();
        $cfMahasiswaModel = new CFMahasiswaModel();
        $diagnosaGejalaModel = new DiagnosaGejalaModel();

        $namaLengkap = $this->request->getVar('nama_mahasiswa');
        $jk = $this->request->getVar('jk');
        $nim = $this->request->getVar('nim');
        $prodi = $this->request->getVar('prodi');
        $semester = $this->request->getVar('semester');
        $tglDiagnosa = $this->request->getVar('tgl_diagnosa');
        $listSelectedGejala = $this->request->getVar('selectedGejala');
        $listCF = $this->request->getVar('cf');
        $p_1 = $this->request->getVar('p_1');
        $p_2 = $this->request->getVar('p_2');
        $p_3 = $this->request->getVar('p_3');
        $p_4 = $this->request->getVar('p_4');
        $p_5 = $this->request->getVar('p_5');

        // Validasi jika listSelectedGejala atau listCF kosong
        if (empty($listSelectedGejala) || empty($listCF)) {
        // Tampilkan pesan error atau lakukan tindakan sesuai kebutuhan
            return redirect()->to('mahasiswa/diagnosa/error');
        }

        $mergedData = array();
        foreach ($listSelectedGejala as $key => $idGejala) {
            // Memeriksa apakah $listCF pada indeks $key tidak kosong
            if (isset($listCF[$key]) && !empty($listCF[$key])) {
                $cfUserId = $listCF[$key];

                $cfKepercayaan = $cfMahasiswaModel->where('id_cf_mahasiswa', $cfUserId)->first();

                $mergedData[] = [
                    'id_gejala' => $idGejala,
                    'tingkat_kepercayaan' => $cfKepercayaan['nama_nilai'],
                    'cf_user' => $cfKepercayaan['cf'],
                ];
            } else {
            // Tindakan yang akan diambil jika ListCF tidak dipilih untuk gejala yang dipilih
                return redirect()->to('diagnosa/error');
            }
        }

        
        // Hitung berapa banyak gejala yang dipilih
        $selectedGejalaCount = count($listSelectedGejala);
        // Hitung berapa banyak gejala yang tidak dipilih
        $unselectedGejalaCount = $gejalaModel->countAllResults() - $selectedGejalaCount;

        $cf = array();
        $listGejala = array();
        $penyakitCodes = array();
        $penyakitNames = array();

        for ($i = 0; $i < count($mergedData); $i++) {
            $val = $mergedData[$i];
            $relation = $aturanModel->where('id_gejala', $val['id_gejala'])->findAll();
            $gejala = $gejalaModel->where('id_gejala', $val['id_gejala'])->first();

            if ($relation != null && count($relation) > 0) {
                $listGejalaValue['id_gejala'] = $gejala['id_gejala'];
                $listGejalaValue['kode_gejala'] = $gejala['kode_gejala'];
                $listGejalaValue['nama_gejala'] = $gejala['nama_gejala'];
                $listGejalaValue['tingkat_kepercayaan'] = $val['tingkat_kepercayaan'];
                $listGejalaValue['cf_user'] = $val['cf_user'];
                $listGejalaValue['nilai_cf'] = 0;
                $listGejalaValue['id_penyakit'] = 0;
                $listGejalaValue['kode_penyakit'] = array();
                $listGejalaValue['nama_penyakit'] = array();

                for ($r = 0; $r < count($relation); $r++) {

                    $gejalaRule = $gejalaModel->where('id_gejala', $relation[$r]['id_gejala'])->first();
                    $penyakit = $penyakitModel->find($relation[$r]['id_penyakit']);

                    $value['id_gejala'] = $gejalaRule['id_gejala'];
                    $value['kode_gejala'] = $gejalaRule['kode_gejala'];
                    // $value['kode_gejala'] = $gejala['kode_gejala'];
                    $value['nama_gejala'] = $gejalaRule['nama_gejala'];
                    $value['tingkat_kepercayaan'] = $val['tingkat_kepercayaan'];
                    $value['cf_user'] = $val['cf_user'];
                    $value['cf'] = $relation[$r]['cf'];
                    $value['nilai_cf'] = 0;
                    $value['id_penyakit'] = 0;
                    $value['kode_penyakit'][] = $penyakit ? $penyakit['kode_penyakit'] : '';
                    $value['nama_penyakit'][] = $penyakit ? $penyakit['nama_penyakit'] : '';

                    $value['id_penyakit'] = $relation[$r]['id_penyakit'];
                    $value['nilai_cf'] = $val['cf_user'] * $relation[$r]['cf'];

                    $listGejalaValue['nilai_cf'] = $val['cf_user'] * $relation[$r]['cf'];
                    $listGejalaValue['id_penyakit'] = $val['cf_user'] * $relation[$r]['cf'];
                    $listGejalaValue['kode_penyakit'][] = $penyakit ? $penyakit['kode_penyakit'] : '';
                    $listGejalaValue['nama_penyakit'][] = $penyakit ? $penyakit['nama_penyakit'] : '';

                    array_push($cf, $value);
                    
                    if (!in_array($penyakit['kode_penyakit'], $penyakitCodes)) {
                        array_push($penyakitCodes, $penyakit['kode_penyakit']);
                    }
                    if (!in_array($penyakit['nama_penyakit'], $penyakitNames)) {
                        array_push($penyakitNames, $penyakit['nama_penyakit']);
                    }
                }

                array_push($listGejala, $listGejalaValue);
            }
        }

        /// TODO
        // Perhitungan CF Combine
        $cfCombine = 0;
        $groupByPenyakit = array();

        foreach ($cf as $pen) {
            $groupByPenyakit[$pen['id_penyakit']][] = $pen;
        }

        $new = array();

        if (count($cf) > 1) {
            for ($i = 0; $i < count($cf) - 1; $i++) {
                $depresi = $groupByPenyakit[$cf[$i]['id_penyakit']];

                if (count($depresi) > 1) {
                    for ($j = 0; $j < count($depresi); $j++) {
                        $tingkatDepresi = $depresi[$j];

                        if ($j == 0) {
                            $cfCombine = $tingkatDepresi['nilai_cf'] + $depresi[$j + 1]['nilai_cf'] * (1.0 - $tingkatDepresi['nilai_cf']);

                            if (count($depresi) - 1 == 1) {
                                $new[$i]["nilai_cf"] = $cfCombine;
                                $new[$i]["id_penyakit"] = $cf[$i]['id_penyakit'];
                                break;
                            }
                        } else {
                            if ($j + 1 == count($depresi)) {
                                $new[$i]["nilai_cf"] = $cfCombine;
                                $new[$i]["id_penyakit"] = $cf[$i]['id_penyakit'];
                                break;
                            }
                            $cfCombine = $cfCombine + $depresi[$j + 1]['nilai_cf'] * (1.0 - $cfCombine);
                        }
                    }
                } else {
                    $cfCombine = $cf[$i]['nilai_cf'];
                    $new[$i]["nilai_cf"] = $cfCombine;
                    $new[$i]["id_penyakit"] = $cf[$i]['id_penyakit'];
                }
            }
        } else {
            $cfCombine = $cf[0]['nilai_cf'];
            $new[0]["nilai_cf"] = $cfCombine;
            $new[0]["id_penyakit"] = $cf[0]['id_penyakit'];
        }

        for ($i = 0; $i < (count($new) - count($cf)); $i++) {
            unset($new[$i]);
        }


        $nilaiPenyakitTerbesar = max($new)['nilai_cf'];
        $idPenyakitTerbesar = max($new)['id_penyakit'];

        // Ambil deskripsi dan solusi penyakit
        $penyakitData = $penyakitModel->find($idPenyakitTerbesar);
        $kodePenyakit = $penyakitData['kode_penyakit'];
        $namaPenyakit = $penyakitData['nama_penyakit'];
        $deskripsi = $penyakitData['deskripsi_penyakit'];
        $solusi = $penyakitData['solusi_penyakit'];

        // Simpan diagnosa dengan id_penyakit yang sesuai
        $diagnosa = $diagnosaModel->where('nama_mahasiswa', $namaLengkap)->first();

$p_4_values = $this->request->getVar('p_4');

        if ($diagnosa) {
    // Buat diagnosa baru dengan nilai-nilai yang sama
            $diagnosaModel->save([
                'id_penyakit' => $idPenyakitTerbesar,
                'nama_mahasiswa' => $namaLengkap,
                'jk' => $jk,
                'nim' => $nim,
                'prodi' => $prodi,
                'semester' => $semester,
                'tgl_diagnosa' => $tglDiagnosa,
                'cf_akhir' => $nilaiPenyakitTerbesar,
                'presentase' => number_format($nilaiPenyakitTerbesar * 100, 2),
                'p_1' => $p_1,
                'p_2' => $p_2,
                'p_3' => $p_3,
                'p_4' => implode(', ', $p_4_values),
                'p_5' => $p_5,
            ]);
        } else {
            $diagnosaModel->save([
                'id_penyakit' => $idPenyakitTerbesar,
                'nama_mahasiswa' => $namaLengkap,
                'jk' => $jk,
                'nim' => $nim,
                'prodi' => $prodi,
                'semester' => $semester,
                'tgl_diagnosa' => $tglDiagnosa,
                'cf_akhir' => $nilaiPenyakitTerbesar,
                'presentase' => number_format($nilaiPenyakitTerbesar * 100, 2),
                'p_1' => $p_1,
                'p_2' => $p_2,
                'p_3' => $p_3,
                'p_4' => implode(', ', $p_4_values),
                'p_5' => $p_5,
            ]);
        }

        // $diagnosaId = $diagnosaModel->getInsertID();

        $diagnosaGejala = array();

        foreach ($cf as $val) {
            $cfMahasiswa = $cfMahasiswaModel->where('nama_nilai', $val['tingkat_kepercayaan'])->first();

            if ($cfMahasiswa) {
                $id_penyakit = $val['id_penyakit'];
                $nilai_cf = 0;

                foreach ($new as $item) {
                    if ($item['id_penyakit'] == $id_penyakit) {
                        $nilai_cf = $item['nilai_cf'];
                        break;
                    }
                }

                if ($nilai_cf == 0) {
                    $nilai_cf = $val['nilai_cf'];
                }

                $diagnosaGejala[] = [
                    'id_diagnosa' => $diagnosaModel->getInsertID(),
                    'id_gejala' => $val['id_gejala'],
                    'id_penyakit' => $id_penyakit,
                    'id_cf_mahasiswa' => $cfMahasiswa['id_cf_mahasiswa'],
                    'cf_pakar' => $val['cf'],
                    'cf_hasil' => $nilai_cf,
                ];
            }
        }


        if (!empty($diagnosaGejala)) {
            $diagnosaGejalaModel->insertBatch($diagnosaGejala);
        }

        $resultDiagnosa = [
            'nama_mahasiswa' => $namaLengkap,
            'jk' => $jk,
            'nim' => $nim,
            'prodi' => $prodi,
            'semester' => $semester,
            'tgl_diagnosa' => $tglDiagnosa,
            'tingkat_kepercayaan' => $nilaiPenyakitTerbesar,
            'cf_akhir' => $cfCombine,
            'gejala' => $listGejala,
            'deskripsi' => $deskripsi,
            'solusi_penyakit' => $solusi,
            'nama_penyakit' => $namaPenyakit,
            'kode_penyakit' => $kodePenyakit,
            'p_1' => $p_1,
            'p_2' => $p_2,
            'p_3' => $p_3,
            'p_4' => $p_4,
            'p_5' => $p_5,
            // 'id_penyakit' => 0,
            'presentase' => number_format($nilaiPenyakitTerbesar * 100, 2),
            'jumlah_gejala' => $selectedGejalaCount,
            'jumlah_gejala_tidak_terpilih' => $unselectedGejalaCount,
        ];

        // Mengambil data nama_penyakit dari tabel tbl_penyakit berdasarkan id_penyakit
        $idPenyakitArray = array_column($diagnosaGejala, 'id_penyakit');
        $penyakit = $penyakitModel->whereIn('id_penyakit', $idPenyakitArray)->findAll();

        // Menyiapkan array untuk menyimpan id_penyakit, nama_penyakit, dan kode_penyakit
        $idNamaPenyakitArray = [];
        $idKodePenyakitArray = [];

        foreach ($penyakit as $item) {
            $idNamaPenyakitArray[$item['id_penyakit']] = $item['nama_penyakit'];
            $idKodePenyakitArray[$item['id_penyakit']] = $item['kode_penyakit'];
        }

        // Menambahkan nama_penyakit dan kode_penyakit ke dalam $data['idPenyakitArray']
        $data['idPenyakitArray'] = array_map(function ($gejala) use ($idNamaPenyakitArray, $idKodePenyakitArray) {
            return [
                'id_penyakit' => $gejala['id_penyakit'],
                'nama_penyakit' => $idNamaPenyakitArray[$gejala['id_penyakit']],
                'kode_penyakit' => $idKodePenyakitArray[$gejala['id_penyakit']],
                'cf_hasil' => $gejala['cf_hasil'],
                'persentase' => number_format($gejala['cf_hasil'] * 100, 2) . '%',
            ];
        }, $diagnosaGejala);

        // Menghilangkan hasil yang kembar
        $data['idPenyakitArray'] = array_unique($data['idPenyakitArray'], SORT_REGULAR);

        $data['resultDiagnosa'] = $resultDiagnosa;
        $data['resultDiagnosa']['gejala'] = $listGejala;
        $data['penyakitCodes'] = $penyakitCodes;
        $data['penyakitNames'] = $penyakitNames;
        $data['cf'] = $cf;
        $data['title'] = 'Hasil Diagnosa';

        return view('diagnosa/hasil_diagnosa', $data);
    // }
    }


    public function cetakDiagnosa()
    {
        $diagnosaModel = new DiagnosaModel();
        $diagnosaGejalaModel = new DiagnosaGejalaModel();

        // Mengambil ID diagnosa terakhir
        $lastDiagnosa = $diagnosaModel->orderBy('id_diagnosa', 'DESC')->first();
        $pasienId = $lastDiagnosa['id_diagnosa'];

        // Mengambil data diagnosa berdasarkan ID diagnosa terakhir
        $laporanDiagnosa = $diagnosaModel->select('tbl_diagnosa.*, tbl_penyakit.kode_penyakit, tbl_penyakit.nama_penyakit, tbl_penyakit.deskripsi_penyakit, tbl_penyakit.solusi_penyakit')
        ->join('tbl_penyakit', 'tbl_penyakit.id_penyakit = tbl_diagnosa.id_penyakit', 'left')
        ->where('tbl_diagnosa.id_diagnosa', $pasienId)
        ->findAll();

        // Mengambil ID gejala terakhir
        $lastDiagnosaGejala = $diagnosaGejalaModel->orderBy('id', 'DESC')->first();

        $laporanGejala = $diagnosaGejalaModel->select('tbl_diagnosa_gejala.*, tbl_gejala.kode_gejala, tbl_gejala.nama_gejala, tbl_cf_user.nama_nilai, tbl_cf_user.cf, tbl_penyakit.kode_penyakit, tbl_penyakit.nama_penyakit,')
        ->join('tbl_gejala', 'tbl_gejala.id_gejala = tbl_diagnosa_gejala.id_gejala', 'left')
        ->join('tbl_penyakit', 'tbl_penyakit.id_penyakit = tbl_diagnosa_gejala.id_penyakit', 'left')
        ->join('tbl_cf_user', 'tbl_cf_user.id_cf_mahasiswa = tbl_diagnosa_gejala.id_cf_mahasiswa', 'left')
        ->join('tbl_diagnosa', 'tbl_diagnosa.id_diagnosa = tbl_diagnosa_gejala.id_diagnosa', 'left')
        ->where('tbl_diagnosa.id_diagnosa', $pasienId)
        ->findAll();


        // ambil file view ke sebuah variable
        $view = view('diagnosa/cetak_diagnosa', ['laporanDiagnosa' => $laporanDiagnosa, 'laporanGejala' => $laporanGejala]);

        // bikin instance Dompdf new
        $dompdf = new Dompdf();

        // atur konten HTML ambiran muncul ning file PDF
        $dompdf->loadHtml($view);

        // atur ukuran kertas
        $dompdf->setPaper('A4', 'portrait');

        // dirender dulu PDF nya
        $dompdf->render();

        // nah toli ngasili isi PDF
        $pdfContent = $dompdf->output();

        // atur nama file PDF pas di download
        $filename = 'Laporan-Diagnosa_' . date('d-m-Y') . '.pdf';

        // bikin objek respon
        $response = service('response');

        // atur tipe kontene maning karo header ambir respons
        $response->setContentType('application/pdf');
        $response->setHeader('Content-Disposition', 'attachment; filename="' . $filename . '"');

        // atur isi pdf sebagai body respon, ambil rata
        $response->setBody($pdfContent);

        // respone di kembalikan
        return $response;
    }

    public function errorPage()
    {
        $data['title'] = 'Error';
        return view('diagnosa/error', $data);
    }

}