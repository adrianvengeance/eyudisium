<?php

namespace App\Controllers;

use \App\Models\MahasiswaModel;
use \App\Models\InfomhsModel;
use \App\Models\BerkasModel;
use \App\Models\AdmincheckModel;
use \App\Models\DosenModel;
use \Config\Services;
use Dompdf\Dompdf;

class Mahasiswa extends BaseController
{
    protected $MahasiswaModel;

    public function __construct()
    {
        $this->AdmincheckModel = new AdmincheckModel();
        $this->MahasiswaModel = new MahasiswaModel();
        $this->InfomhsModel = new InfomhsModel();
        $this->BerkasModel = new BerkasModel();
        $this->DosenModel = new DosenModel();

        $this->npm = session('npm');
    }

    public function index()
    {
        if ($this->npm) {
            $berkas = $this->BerkasModel->where(['npmmhs' => $this->npm])->first();
            if (is_null($berkas['krsterakhir'])) {
                $mhs = $this->MahasiswaModel->where(['npm' => $this->npm])->first();

                $data = [
                    'title' => 'Mahasiswa ' . $mhs['npm'],
                    'isi'   => $mhs,
                    'isiberkas'  => $berkas,
                    'validation' => Services::validation(),
                ];
                return view('/mahasiswa', $data);
            }
            session()->setFlashdata('pesan', 'Berkas sudah diupload, tunggu verifikasi pada Whatsapp.');
            return redirect()->to('/');
        } else {
            return redirect()->to('/');
        }
    }

    public function save()
    {
        if (!$this->validate([
            'no_wa' => [
                'rules' => 'required|is_natural|mobileValidation[no_wa]',
                'errors' => [
                    'required'   => 'No. Whatsapp diperlukan',
                    'is_natural' => 'Format nomor salah',
                    'mobileValidation' => 'Format nomor harus dimulai dengan angka 8'
                ]
            ],
            'krs' => [
                'rules' => 'uploaded[krs]|max_size[krs,2048]|ext_in[krs,pdf]|mime_in[krs,application/pdf]',
                'errors' => [
                    'uploaded' => 'File KRS diperlukan',
                    'max_size' => 'File maksimal 2MB',
                    'ext_in'   => 'File harus dokumen pdf',
                    'mime_in'  => 'File bukan dokumen pdf yang valid'
                ]
            ],
            'berita_acara' => [
                'rules' => 'uploaded[berita_acara]|max_size[berita_acara,2048]|ext_in[berita_acara,pdf]|mime_in[berita_acara,application/pdf]',
                'errors' => [
                    'uploaded' => 'File Berita Acara Sidang Skripsi diperlukan',
                    'max_size' => 'File maksimal 2MB',
                    'ext_in'   => 'File harus dokumen pdf',
                    'mime_in'  => 'File bukan dokumen pdf yang valid'
                ]
            ],
            'hal_pengesahan' => [
                'rules' => 'uploaded[hal_pengesahan]|max_size[hal_pengesahan,2048]|ext_in[hal_pengesahan,pdf]|mime_in[hal_pengesahan,application/pdf]',
                'errors' => [
                    'uploaded' => 'File Halaman Pengesahan diperlukan',
                    'max_size' => 'Ukuran maksimal 2MB',
                    'ext_in'   => 'File harus dokumen pdf',
                    'mime_in'  => 'File bukan dokumen pdf yang valid'
                ]
            ]
        ])) {
            session()->setFlashdata('mahasiswa');
            return redirect()->back()->withInput();    //kembali jika berkas tidak sesuai validasi
        }

        $krs = $this->request->getFile('krs');                          //
        $berita_acara = $this->request->getFile('berita_acara');        //ambil file upload pdf
        $hal_pengesahan = $this->request->getFile('hal_pengesahan');    //

        $krs->move("berkas/$this->npm/krsterakhir");                        //
        $berita_acara->move("berkas/$this->npm/beritaacaraujianskripsi");   //pindahkan ke folder sesuai npm
        $hal_pengesahan->move("berkas/$this->npm/lempengdewanpenguji");     //

        $nama_krs = $krs->getName();                                    //
        $nama_berita_acara = $berita_acara->getName();                  //ambil nama file upload
        $nama_hal_pengesahan = $hal_pengesahan->getName();              //

        $mhs = [
            'nomorwa'       => $this->request->getVar('no_wa'),
        ];

        $berkas = [
            'krsterakhir'               => $nama_krs,
            'beritaacaraujianskripsi'   => $nama_berita_acara,
            'lempengdewanpenguji'       => $nama_hal_pengesahan
        ];
        $this->BerkasModel->where(['npmmhs' => $this->npm])->set($berkas)->update();     //masukan berkas file ke database sesuai npm
        $this->MahasiswaModel->where(['npm' => $this->npm])->set($mhs)->update();     //masukan info mahasiswa ke database sesuai npm


        $mhs = $this->db->table('mahasiswa')->where(['npm' => $this->npm])->get()->getRowArray();
        $data = [
            'title' => 'Berhasil',
            'isi'   => $mhs,
        ];
        return view('uploaded', $data);
    }

    private function _bulan()     //month in indonesia
    {
        $month = date('m');
        switch ($month) {
            case '1':
                $x = "Januari";
                break;
            case '2':
                $x = "Februari";
                break;
            case '3':
                $x = "Maret";
                break;
            case '4':
                $x = "April";
                break;
            case '5':
                $x = "Mei";
                break;
            case '6':
                $x = "Juni";
                break;
            case '7':
                $x = "Juli";
                break;
            case '8':
                $x = "Agustus";
                break;
            case '9':
                $x = "September";
                break;
            case '10':
                $x = "Oktober";
                break;
            case '11':
                $x = "November";
                break;
            case '12':
                $x = "Desember";
                break;
            default:
                $x = "Tidak di ketahui";
                break;
        }
        return $x;
    }

    public function done()
    {
        $mhs = $this->MahasiswaModel->where('npm', $this->npm)->first();
        $tgl = date('d ');              //ambil tanggal hari ini
        $bln = $this->_bulan();          //ambil bulan hari ini dari method bulan()
        $thn = date(' Y');              //ambil tahun hari ini
        $today = $tgl . $bln . $thn;    //buat hh, bulan yyyy 
        $data = [
            'title' => "Bukti Pengajuan Akun $mhs[nama]",
            'mhs'   => $mhs,
            'today' => $today
        ];
        $html = view('buktipengajuanakun', $data);

        // instantiate and use the dompdf class
        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);

        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper('A4', 'portrait');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser
        $dompdf->stream("Bukti Pengajuan Akun-" . $mhs['nama'] . "-" . $mhs['npm'] . ".pdf");   //download bukti unggah dengan nama file sesuai mahasiswa
    }
}
