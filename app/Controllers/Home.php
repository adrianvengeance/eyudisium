<?php

namespace App\Controllers;

use \App\Models\CountdownModel;
use \App\Models\InfomhsModel;
use \App\Models\BerkasModel;
use \App\Models\MahasiswaModel;
use \App\Models\AdmincheckModel;

class Home extends BaseController
{
  protected $countdownTimer;
  protected $mahasiswaModel;

  public function __construct()
  {
    $this->countdownTimer = new CountdownModel();
    $this->berkasModel = new BerkasModel();
    $this->mahasiswaModel = new MahasiswaModel();
    $this->infomahasiswaModel = new InfomhsModel();
    $this->admincheckModel = new AdmincheckModel();
  }

  public function index()
  {
    session()->remove('npm');                               //menghapus session npm        

    $bisnis = $this->countdownTimer->fakultas('Bisnis');
    $bataswaktubisnis = $this->countdownTimer->waktuStrtotime($bisnis->batas_waktu);
    $haribisnis = $this->countdownTimer->hari($bataswaktubisnis);
    $statusbisnis = $this->countdownTimer->status($bataswaktubisnis);

    $fkip = $this->countdownTimer->fakultas('FKIP');
    $bataswaktufkip = $this->countdownTimer->waktuStrtotime($fkip->batas_waktu);
    $harifkip = $this->countdownTimer->hari($bataswaktufkip);
    $statusfkip = $this->countdownTimer->status($bataswaktufkip);

    $pertanian = $this->countdownTimer->fakultas('Pertanian');
    $bataswaktupertanian = $this->countdownTimer->waktuStrtotime($pertanian->batas_waktu);
    $haripertanian = $this->countdownTimer->hari($bataswaktupertanian);
    $statuspertanian = $this->countdownTimer->status($bataswaktupertanian);

    $saintek = $this->countdownTimer->fakultas('Sains dan Teknologi');
    $bataswaktusaintek = $this->countdownTimer->waktuStrtotime($saintek->batas_waktu);
    $harisaintek = $this->countdownTimer->hari($bataswaktusaintek);
    $statussaintek = $this->countdownTimer->status($bataswaktusaintek);

    $data = [
      'title'         => 'e-Yudisium',
      'bisnis'        => $bisnis,
      'bwbisnis'      => $bataswaktubisnis,
      'hbisnis'       => $haribisnis,
      'sbisnis'       => $statusbisnis,
      'fkip'          => $fkip,
      'bwfkip'        => $bataswaktufkip,
      'hfkip'         => $harifkip,
      'sfkip'         => $statusfkip,
      'pertanian'     => $pertanian,
      'bwpertanian'   => $bataswaktupertanian,
      'hpertanian'    => $haripertanian,
      'spertanian'    => $statuspertanian,
      'saintek'       => $saintek,
      'bwsaintek'     => $bataswaktusaintek,
      'hsaintek'      => $harisaintek,
      'ssaintek'      => $statussaintek,
    ];
    return view('homepage', $data);
  }

  public function cari()
  {
    $npm = $this->request->getVar('cari');
    if ($npm) {
      $hasil = $this->mahasiswaModel->carinpm($npm);
      if ($hasil) {
        $hasilberkas = $this->berkasModel->where(['npmmhs' => $npm])->first();
        if (!$hasilberkas) {
          $fknpm = ['npmmhs' => $npm];
          $this->berkasModel->insert($fknpm);
          $mhs = ['npm' => $hasil['npm']];
          session()->set($mhs);
          return redirect()->to('/mahasiswa');
        } elseif ($hasilberkas) {
          if ($hasil['nomorwa'] == null || $hasilberkas['krsterakhir'] == null || $hasilberkas['beritaacaraujianskripsi'] == null || $hasilberkas['lempengdewanpenguji'] == null) {
            $mhs = ['npm' => $hasil['npm']];
            session()->set($mhs);
            return redirect()->to('/mahasiswa');
          } else {
            session()->setFlashdata('pesan', 'Berkas sudah diupload, tunggu verifikasi pada Whatsapp.');
            return redirect()->back();
          }
        }
      } else {
        session()->setFlashdata('pesan', 'NPM tidak sesuai.');
        return redirect()->back();
      }
    } else {
      session()->setFlashdata('pesan', 'Silakan Masukan NPM.');
      return redirect()->back();
    }
  }

  public function info()
  {
    session()->remove('npm');
    $data = [
      'title' => 'Alur e-Yudisium',
    ];
    return view('alur', $data);
  }
}
