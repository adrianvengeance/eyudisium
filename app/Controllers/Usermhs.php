<?php

namespace App\Controllers;                              //biru #007BFF di home  //biru #3B61D1 di user

use \App\Models\UsersModel;
use \App\Models\InfomhsModel;
use \App\Models\AdmincheckModel;
use \App\Models\CountdownModel;
use \App\Models\MahasiswaModel;
use \App\Models\BerkasModel;
use \App\Models\DosenModel;
use \Config\Services;
use Dompdf\Dompdf;
use Dompdf\Options;

class Usermhs extends BaseController
{
  public function __construct()
  {
    $this->uri = new \CodeIgniter\HTTP\URI();
    $this->infomhs = new InfomhsModel();
    $this->mahasiswa = new MahasiswaModel();
    $this->admincheck = new AdmincheckModel();
    $this->countdown = new CountdownModel();
    $this->berkas = new BerkasModel();
    $this->dosen = new DosenModel();

    $this->db = db_connect();
    $userid = session('id');
    $this->user = $this->db->table('users')->where(['id' => $userid])->get()->getRowArray();   //ambil data user

    $this->npm = $this->user['username'];
    $this->mhs = $this->db->table('mahasiswa')->where(['npm' => $this->npm])->get()->getRowArray();
  }

  public function index() //uploadberkas
  {
    if ($this->user['role'] != 4) {
      return redirect()->to('/user');
    }

    return redirect()->to('/user/mahasiswa/berkas');
  }

  public function dataalumni()
  {
    $mhs = $this->infomhs->where(['npmmhs' => $this->npm])->first();
    if (!is_null($mhs)) {
      $data = [
        'title' => $this->user['nama'],
        'user'  => $this->user,
        'mhs'   => $this->mhs,
        'alumni' => $mhs,
        'uri'   => current_url()
      ];
      return view('/user/mahasiswa/alumnidone', $data);
    }
    $tahunbefore = date("Y", strtotime("-1 years", strtotime(date('Y'))));
    $tahunnow   = date("Y");
    $tahunafter = date("Y", strtotime("+1 years", strtotime(date('Y'))));

    $data = [
      'title' => $this->user['nama'],
      'user'  => $this->user,
      'mhs'   => $this->mhs,
      'uri'   => current_url(),
      'yearb' => $tahunbefore,
      'yearn' => $tahunnow,
      'yeara' => $tahunafter,
      'dosens'        => $this->dosen->list(),
      'validation'    => Services::validation()
    ];
    return view('/user/mahasiswa/dataalumni', $data);
  }

  public function dataalumniprocess()
  {
    if (!$this->validate([
      'nama'  => [
        'rules'     => 'required', //|namaValidation[nama],
        'errors'    => [
          'required'  => 'Nama diperlukan',
          // 'namaValidation' => 'Nama hanya boleh a-z .,'
        ]
      ],
      'tempatlahir'   => [
        'rules'     => 'required',
        'errors'    => [
          'required'  => 'Tempat lahir diperlukan',
        ]
      ],
      'tanggallahir'  => [
        'rules'     => 'required',
        'errors'    => [
          'required'  => 'Tanggal lahir diperlukan',
        ]
      ],
      'asalsekolah'  => [
        'rules'     => 'required',
        'errors'    => [
          'required'  => 'Asal sekolah diperlukan',
        ]
      ],
      'alamatrumah'  => [
        'rules'     => 'required',
        'errors'    => [
          'required'  => 'Alamat rumah diperlukan',
        ]
      ],
      'ortu'  => [
        'rules'     => 'required',
        'errors'    => [
          'required'  => 'Silakan pilih nama Ayah atau nama Ibu',
        ]
      ],
      'namaortu'  => [
        'rules'     => 'required',
        'errors'    => [
          'required'  => 'Nama orang tua diperlukan',
        ]
      ],
      'jenista'  => [
        'rules'     => 'required',
        'errors'    => [
          'required'  => 'Silakan pilih Skripsi atau Tesis',
        ]
      ],
      'judulid'  => [
        'rules'     => 'required',
        'errors'    => [
          'required'  => 'Judul dalam bahasa Indonesia diperlukan',
        ]
      ],
      'judulen'  => [
        'rules'     => 'required',
        'errors'    => [
          'required'  => 'Judul dalam bahasa Inggris diperlukan',
        ]
      ],
      'dosbim1'  => [
        'rules'     => 'required',
        'errors'    => [
          'required'  => 'Dosen pembimbing I diperlukan',
        ]
      ],
      'dosbim2'  => [
        'rules'     => 'permit_empty',
        'errors'    => [
          'permit_empty'  => 'Dosen pembimbing II boleh kosong',
        ]
      ],
      'penguji1'  => [
        'rules'     => 'required',
        'errors'    => [
          'required'  => 'Dosen penguji I diperlukan',
        ]
      ],
      'penguji2'  => [
        'rules'     => 'required',
        'errors'    => [
          'required'  => 'Dosen penguji II diperlukan',
        ]
      ],
      'penguji3'  => [
        'rules'     => 'permit_empty',
        'errors'    => [
          'permit_empty'  => 'Dosen penguji III boleh kosong',
        ]
      ],
      'tahunlulus'  => [
        'rules'     => 'required',
        'errors'    => [
          'required'  => 'Tahun lulus diperlukan',
        ]
      ],
      'gelar'  => [
        'rules'     => 'required',
        'errors'    => [
          'required'  => 'Gelar diperlukan',
        ]
      ],
      'nomorwa'  => [
        'rules'     => 'required|is_natural|mobileValidation[no_wa]',
        'errors'    => [
          'required'  => 'Nomor telp/hp diperlukan',
          'is_natural' => 'Format nomor salah',
          'mobileValidation' => 'Format nomor harus dimulai dengan angka 8'
        ]
      ],
      'email'  => [
        'rules'     => 'required|valid_email',
        'errors'    => [
          'required'  => 'Email diperlukan',
          'valid_email' => 'Format email salah'
        ]
      ],
      'foto'  => [
        'rules'     => 'uploaded[foto]|max_size[foto,1024]|is_image[foto]|ext_in[foto,jpg,jpeg]|mime_in[foto,image/jpg,image/jpeg]',
        'errors'    => [
          'uploaded'      => 'Foto diperlukan',
          'max_size'      => 'File foto maksimal 1 MB',
          'is_image'      => 'File foto harus gambar JPG atau JPEG',
          'ext_in'        => 'File foto harus gambar JPG atau JPEG',
          'mime_in'       => 'File foto harus gambar JPG atau JPEG',
        ]
      ],
      'skripsi1'  => [
        'rules'     => 'required',
        'errors'    => [
          'required'      => 'Abstraksi skripsi bahasa Indonesia diperlukan',
        ]
      ],
      'skripsi2'  => [
        'rules'     => 'required',
        'errors'    => [
          'required'      => 'Abstraksi skripsi bahasa Inggris diperlukan',
        ]
      ],

    ])) {
      session()->setFlashdata('dataalumnierror', ' Silakan masukan lagi input yang sesuai.');
      return redirect()->back()->withInput();
    }

    $foto = $this->request->getFile('foto');
    $foto->move("berkas/$this->npm/dataalumni");
    $nfoto = $foto->getName();

    $alumni = [
      'npmmhs'        => $this->npm,
      'email'         => $this->request->getVar('email'),
      'tempatlahir'   => $this->request->getVar('tempatlahir'),
      'tanggallahir'  => $this->request->getVar('tanggallahir'),
      'alamatrumah'   => $this->request->getVar('alamatrumah'),
      'alamatkantor'  => empty($this->request->getVar('alamatkantor')) ? null : $this->request->getVar('alamatkantor'),
      'ortu'          => $this->request->getVar('ortu'),
      'namaortu'      => $this->request->getVar('namaortu'),
      'asalsekolah'   => $this->request->getVar('asalsekolah'),
      'jenista'       => $this->request->getVar('jenista'),
      'judulid'       => $this->request->getVar('judulid'),
      'judulen'       => $this->request->getVar('judulen'),
      'dosbim1'       => $this->request->getVar('dosbim1'),
      'dosbim2'       => empty($this->request->getVar('dosbim2')) ? null : $this->request->getVar('dosbim2'),
      'penguji1'      => $this->request->getVar('penguji1'),
      'penguji2'      => $this->request->getVar('penguji2'),
      'penguji3'      => empty($this->request->getVar('penguji3')) ? null : $this->request->getVar('penguji3'),
      'tahunlulus'    => $this->request->getVar('tahunlulus'),
      'gelar'         => $this->request->getVar('gelar'),
      'foto'          => $nfoto,
      'skripsi1'      => $this->request->getVar('skripsi1'),
      'skripsi2'      => $this->request->getVar('skripsi2'),
    ];

    $this->berkas->where(['npmmhs' => $this->npm])->set(['dataalumni' => 1])->update();
    $this->infomhs->insert($alumni);
    session()->setFlashdata('dataalumni', 'Data alumni berhasil di upload, silakan melakukan pengajuan di halaman Upload berkas.');
    return redirect()->to('/user/mahasiswa/alumni');
  }

  public function pengajuan($npm)
  {
    $mhs = $this->mahasiswa->where('npm', $npm)->first();

    switch ($mhs['fakultas']) {
      case "Bisnis":
        $fk     = $this->countdown->fakultas('Bisnis');
        $bwfk   = $this->countdown->waktuStrtotime($fk->batas_waktu);
        $sfk    = $this->countdown->status($bwfk);
        break;
      case "FKIP":
        $fk     = $this->countdown->fakultas('FKIP');
        $bwfk   = $this->countdown->waktuStrtotime($fk->batas_waktu);
        $sfk    = $this->countdown->status($bwfk);
        break;
      case "Pertanian":
        $fk     = $this->countdown->fakultas('Pertanian');
        $bwfk   = $this->countdown->waktuStrtotime($fk->batas_waktu);
        $sfk    = $this->countdown->status($bwfk);
        break;
      case "Sains dan Teknologi":
        $fk     = $this->countdown->fakultas('Sains dan Teknologi');
        $bwfk   = $this->countdown->waktuStrtotime($fk->batas_waktu);
        $sfk    = $this->countdown->status($bwfk);
        break;
    };
    if ($sfk == 'Tidak Aktif') {
      return redirect()->back();
    } elseif ($sfk == 'Aktif') {
      $data = [
        'npmmhs' => $npm,
        'nama'  => $mhs['nama'],
        'fakultas' => $mhs['fakultas'],
        'prodi' => $mhs['prodi'],
      ];
      $this->admincheck->insert($data);
      session()->setFlashdata('ajukan', "Berkas berhasil diajukan, tunggu pemberitahuan selanjutnya pada Whatsapp.");
      return redirect()->back();
    }
  }

  public function downalumni()
  {
    $mhs = $this->mahasiswa->where('npm', $this->npm)->first();
    $info = $this->infomhs->where('npmmhs', $this->npm)->first();

    $days = ["Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu"];
    $months = ["null", "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];

    $tanggal = (date("Y-m-j", strtotime($info['tanggallahir'])));
    $yeah = date('d ', strtotime($info['tanggallahir'])) . ($months[date("n", strtotime($tanggal))]) . date(' Y', strtotime($info['tanggallahir']));

    $tgl = date('d ');              //ambil tanggal hari ini
    $bln = $this->_bulan();          //ambil bulan hari ini dari method bulan()
    $thn = date(' Y');              //ambil tahun hari ini
    $today = $tgl . $bln . $thn;    //buat hh, bulan yyyy     

    $data = [
      'title' => "Data Alumni $mhs[nama]",
      'mhs'   => $mhs,
      'info'  => $info,
      'today' => $today,
      'tgllhr' => $yeah,
      'uri'   => ('berkas/' . $this->npm . '/dataalumni/' . $info['foto']),
    ];

    // dd($data['uri']);
    // return view('/user/mahasiswa/downloadalumnitest', $data);
    $html = view('/user/mahasiswa/downloadalumni', $data);

    //options
    $options = new Options();
    $options->setChroot(FCPATH); //<-- Set root nya ke /var/www/html/nama-project

    // instantiate and use the dompdf class
    $dompdf = new Dompdf($options);
    // $dompdf->getOptions()->getChroot();
    $dompdf->loadHtml($html);

    // (Optional) Setup the paper size and orientation
    $dompdf->setPaper('A4', 'portrait');

    // Render the HTML as PDF
    $dompdf->render();

    // Output the generated PDF to Browser
    $dompdf->stream("Data Alumni-" . $mhs['nama'] . "-" . $mhs['npm'] . ".pdf");   //download bukti unggah dengan nama file sesuai mahasiswa
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
}
