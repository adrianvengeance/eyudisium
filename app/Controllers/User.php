<?php

namespace App\Controllers;                              //biru #007BFF di home  //biru #3B61D1 di user
use \App\Models\UsersModel;
use \App\Models\BerkasModel;
use \App\Models\MahasiswaModel;
use \App\Models\AdmincheckModel;
use \App\Models\CountdownModel;
use \App\Models\InfomhsModel;
use \App\Models\HistoryModel;
use Config\Services;
use Config\Validation;

class User extends BaseController
{
    public function __construct()
    {
        $this->usersModel = new UsersModel();
        $this->countdown = new CountdownModel();
        $this->mahasiswa = new MahasiswaModel();
        $this->history = new HistoryModel();
        $this->infomhs = new InfomhsModel();
        $this->berkas = new BerkasModel();
        $this->check = new AdmincheckModel();
        $this->uri = new \CodeIgniter\HTTP\URI();
        $this->db = db_connect();

        $userid = session('id');
        $this->user = $this->db->table('users')->where(['id' => $userid])->get()->getRowArray();   //ambil data user
    }

    public function index()
    {
        session()->remove('mhs');
        if (session('id')) {
            if ($this->user['role'] == 4) {
                return redirect()->to('/usermhs');
            }
            return redirect()->to('user/data');
        }
        return redirect()->to('/login');
        // throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('Silakan Login terlebih dahulu');
    }

    public function data()
    {
        if ($this->user['role'] == 4) {
            return redirect()->to('/user');
        }
        session()->remove('mhs');

        $dataMahasiswa = null;
        $admin = null;
        if ($this->user['role'] == 3) {                 //prodi
            if ($mee = $this->check->byProdi($this->user['roleprodi'])) {
                $dataMahasiswa = $mee;
                $ready = $this->check->readyAjukanKeFk($this->user['roleprodi']);
                $tolak = $this->check->readyHapusByProdi($this->user['roleprodi']);
                $admin = 'prodi';
            } else {
                $dataMahasiswa = null;
                $tolak = null;
                $ready = null;
                $admin = null;
            }
        } elseif ($this->user['role'] == 2) {           //fakultas
            if ($mee = $this->check->byFakultas($this->user['rolefakultas'])) {
                $dataMahasiswa = $mee;
                $ready = $this->check->readyAjukanKeBaak($this->user['rolefakultas']);
                $tolak = $this->check->readyHapusByFakultas($this->user['rolefakultas']);
                $admin = 'fakultas';
            } else {
                $dataMahasiswa = null;
                $tolak = null;
                $ready = null;
                $admin = null;
            }
        } else if ($this->user['role'] == 1) {          //baak
            if ($mee = $this->check->byBaak()) {
                $dataMahasiswa = $mee;
                $ready = $this->check->readyKembalikanKeFakultas();
                $tolak = $this->check->readyHapusByBaak();
                $admin = 'baak';
            } else {
                $dataMahasiswa = null;
                $tolak = null;
                $ready = null;
                $admin = null;
            }
        }
        $data = [
            'title' => 'Home',
            'user'  => $this->user,
            'data'  => $dataMahasiswa,
            'admin' => $admin,
            'ready' => $ready,
            'tolak' => $tolak,
            'alasan' => $this->_alasanuser(),
            'uri'   => current_url(),
            'validation' => Services::validation()
        ];
        return view('/user/dataMahasiswa', $data);
    }

    private function _usercheck()
    {
        switch ($this->user['role']) {
            case (1):
                $check = 'baakcheck';
                break;
            case (2):
                $check = 'fakultascheck';
                break;
            case (3):
                $check = 'prodicheck';
                break;
        }
        return $check;
    }

    private function _alasanuser()
    {
        switch ($this->user['role']) {
            case (1):
                $alasan = 'alasanbaak';
                break;
            case (2):
                $alasan = 'alasanfakultas';
                break;
            case (3):
                $alasan = 'alasanprodi';
                break;
        }
        return $alasan;
    }

    private function _userrole()
    {
        switch ($this->user['role']) {
            case (1):
                $user = 'BAAk';
                break;
            case (2):
                $user = 'Fakultas';
                break;
            case (3):
                $user = 'Prodi';
                break;

            default:
                $user = null;
                break;
        }
        return $user;
    }

    public function mhsprofile($npm)
    {
        if ($this->user['role'] == 4) {
            return redirect()->to('/user');
        }

        $mhs = $this->mahasiswa->where(['npm' => $npm])->get()->getRowArray();
        $berkasmhs = $this->berkas->where(['npmmhs' => $npm])->get()->getRowArray();
        $cek = $this->check->where(['npmmhs' => $npm])->get()->getRowArray();
        $infomhs = $this->infomhs->where(['npmmhs' => $npm])->first();

        $data = [
            'title' => 'Profile Mahasiswa',
            'mhs'   => $mhs,
            'cek'   => $cek,
            'user'  => $this->_userrole(),
            'check' => $this->_usercheck(),
            'alasan'    => $this->_alasanuser(),
            'npm'       => $npm,
            'infomhs'   => $infomhs,
            'berkas'    => $berkasmhs,
        ];
        return view('/user/profileMahasiswa', $data);
    }

    public function previewberkasfile($npm, $namaFolder, $filename)
    {
        $file = new \CodeIgniter\Files\File("berkas/$npm/$namaFolder/$filename");

        $data = [
            'title' => "Berkas $npm",
            'npm'   => $npm,
            'path'  => $file,
            'pdf'  => $filename
        ];
        if ($namaFolder == 'fotowarna' || $namaFolder == 'fotobw4x5' || $namaFolder == 'fotobw4x6') {
            return view('user/imageview', $data);
        }
        return view('user/pdfview', $data);
    }

    public function previewdataalumnifile($npm, $filename)
    {
        $mee = (pathinfo($filename));

        $file = new \CodeIgniter\Files\File("berkas/$npm/dataalumni/$filename");
        $data = [
            'title' => "Berkas $npm",
            'npm'   => $npm,
            'path'  => $file,
            'pdf'  => $filename
        ];
        if ($mee['extension'] != 'pdf') {
            return view('user/imageview', $data);
        }
        return view('user/pdfview', $data);
    }

    public function rejectberkas($npm, $path, $file)
    {
        switch ($this->user['role']) {
            case 1:
                $field = 'baakcheck';
                break;
            case 2:
                $field = 'fakultascheck';
                break;
            case 3:
                $field = 'prodicheck';
                break;
        }
        $this->check->berkasditolak($field, $npm);
        $this->berkas->tidakMemenuhi($npm, $path, $file);
        session()->setFlashdata('memenuhi', 'Berkas mahasiswa berhasil dihapus, harap memberitahu mahasiswa melalui no Whatsapp');
        return redirect()->back();
    }

    public function mhsprofilecheck($npm)
    {
        $check = $this->_usercheck();
        $alasan = $this->_alasanuser();

        $update = [
            "$check" => $this->request->getVar('check'),
            "$alasan" => empty($this->request->getVar('alasan')) ? null : $this->request->getVar('alasan'),
        ];
        $this->db->table('admincheck')->where(['npmmhs' => $npm])->update($update);
        session()->setFlashdata('check', 'Mahasiswa berhasil diverifikasi.');
        return redirect()->to('/user/data');
    }

    public function ajukandariprodi()
    {
        if (!$this->check->readyAjukanKeFk($this->user['roleprodi'])) {
            return redirect()->to('/user');
        };

        $this->check->ajukanDariProdi($this->user['roleprodi']);
        session()->setFlashdata('check', 'Mahasiswa berhasil diajukan ke Fakultas');
        return redirect()->back();
    }

    public function ajukandarifakultas()
    {
        if (!$this->check->readyAjukanKeBaak($this->user['rolefakultas'])) {
            return redirect()->to('/user');
        };

        $this->check->validasiDariFakultas($this->user['rolefakultas']);
        session()->setFlashdata('check', 'Berhasil memintakan validasi ke BAAk');
        return redirect()->back();
    }

    public function ajukandaribaak()
    {
        if (!$this->check->readyKembalikanKeFakultas()) {
            return redirect()->to('/user');
        };
        $this->check->kembalikanDariBaak();
        session()->setFlashdata('check', 'Berhasil merilis daftar calon peserta Yudisium ke Fakultas');
        return redirect()->back();
    }

    public function listdiajukan()
    {
        switch ($this->user['role']) {
            case 1:
                $text1 = 'BAAk Telah Merilis Calon Peserta Yudisium ke Fakultas';
                $text2 = $this->user['nama'] . ', Admin Biro Administrasi Akademik';
                $text3 = 'Yogyakarta, ' . date('d F Y');
                $judul = 'Data Mahasiswa Calon Peserta Yudisium';
                $datamhs = $this->check->telahdiajukan(1);
                break;
            case 2:
                $text1 = 'Fakultas Telah Memintakan Validasi Calon Peserta Yudisium ke BAAk';
                $text2 = $this->user['nama'] . ', Admin Fakultas ' . $this->user['rolefakultas'];
                $text3 = 'Yogyakarta, ' . date('d F Y');
                $judul = 'Data Mahasiswa yang Dimintakan Validasi ke BAAk';
                $datamhs = $this->check->telahdiajukan(2, $this->user['rolefakultas']);
                break;
            case 3:
                $text1 = 'Prodi Telah Mengajukan Calon Peserta Yudisium ke Fakultas';
                $text2 = $this->user['nama'] . ', Admin Prodi ' . $this->user['roleprodi'];
                $text3 = 'Yogyakarta, ' . date('d F Y');
                $judul = 'Data Mahasiswa yang Diajukan ke Fakultas';
                $datamhs = $this->check->telahdiajukan(3, $this->user['roleprodi']);
                break;
        }

        $data = [
            'title' => $judul,
            'user'  => $this->user,
            'data'  => $datamhs,
            'text1' => $text1,
            'text2' => $text2,
            'text3' => $text3,
            'uri'   => current_url(),
            'validation' => Services::validation()
        ];
        return view('/user/dataDiajukan', $data);
    }

    public function listCalon()
    {
        if ($this->user['role'] != 2) {
            return redirect()->to('/user');
        }
        $cd = $this->countdown->fakultas($this->user['rolefakultas']);

        $data = [
            'title' => 'Yudisium Fakultas ' . $cd->fakultas . ' Periode ' . date("F", strtotime($cd->batas_waktu)),
            'user'  => $this->user,
            'data'  => $this->check->calonyudisium($this->user['rolefakultas']),
            'uri'   => current_url(),
            'validation' => Services::validation()
        ];
        return view('/user/listYudisium', $data);
    }

    public function tidakmemenuhi()
    {
        switch ($this->user['role']) {
            case 3:
                $this->check->cleanmahasiswabyprodi($this->user['roleprodi']);
                break;
            case 2:
                $this->check->cleanmahasiswabyfakultas($this->user['rolefakultas']);
                break;
            case 1:
                $this->check->cleanmahasiswabybaak();
                break;
        }
        session()->setFlashdata('check', 'Berhasil menghapus pengajuan yang tidak memenuhi');
        return redirect()->back();
    }
    public function tolakpengajuan($npm)
    {
        $this->check->where('npmmhs', $npm)->delete();
        session()->setFlashdata('check', 'Berhasil menolak pengajuan mahasiswa');
        return redirect()->back();
    }

    //

    public function clearpesertayudisium()
    {
        if ($this->user['role'] != 2) {
            return redirect()->to('/user');
        }
        $students = ($this->check->getpesertayudisium($this->user['rolefakultas']));

        // foreach ($students as $y) {
        //     $npms[] = $y->npmmhs;                    //delete their accounts
        // }
        // $this->usersModel->clearmhs($npms);

        $this->history->insertBatch($students);
        $this->check->clearpesertayudisium($this->user['rolefakultas']);
        session()->setFlashdata('calon', 'Berhasil membersihkan daftar calon peserta yudisium');
        return redirect()->back();
    }

    // periode

    public function set()
    {
        if ($this->user['role'] == 4) {
            return redirect()->to('/user');
        }

        if ($this->user['role'] == 1) {
            $data = [
                'title' => 'Periode',
                'user' => $this->user,
                'uri' => current_url(),
                'data' => $this->countdown->semua(),
            ];
            return view('/user/listCountdown', $data);
        }
        if ($this->user['role'] == 3) {
            $rolefk = $this->usersModel->roleFkForProdi($this->user['roleprodi']);
            $fk = $this->countdown->setCountdown($rolefk);
            $bataswaktu = $this->countdown->waktuStrtotime($fk->batas_waktu);
        } elseif ($this->user['role'] == 2) {
            $fk = $this->countdown->setCountdown($this->user['rolefakultas']);
            $bataswaktu = $this->countdown->waktuStrtotime($fk->batas_waktu);
        }

        $data = [
            'title' => 'Periode',
            'user'  => $this->user,
            'uri'   => current_url(),
            'fk'    => $fk,
            'status' => $this->countdown->status($bataswaktu),
        ];
        return view('/user/setCountdown', $data);
    }

    public function setperiode($fk)
    {
        if ($this->user['role'] != 2) {
            return redirect()->to('/user');
        };

        $this->countdown->where(['fakultas' => $fk])->set(['batas_waktu' => $this->request->getVar('datetime')])->update();
        session()->setFlashdata('pesan', 'Periode Fakultas ' . $fk . ' berhasil diubah.');
        return redirect()->back();
    }

    // 

    public function yudisiumhistory()
    {
        $data = [
            'title' => 'History',
            'user'  => $this->user,
            'uri'   => current_url(),
            'data'  => $this->history->ambilsemua()
        ];
        return view('/user/history', $data);
    }

    public function historyprofile($npm)
    {
        $mhs = $this->mahasiswa->where(['npm' => $npm])->get()->getRowArray();
        $berkasmhs = $this->berkas->where(['npmmhs' => $npm])->get()->getRowArray();
        $infomhs = $this->infomhs->where(['npmmhs' => $npm])->first();

        $data = [
            'title' => 'Profile Mahasiswa',
            'user'  => $this->user,
            'mhs'   => $mhs,
            'npm'       => $npm,
            'infomhs'   => $infomhs,
            'berkas'    => $berkasmhs,
        ];
        return view('/user/historyprofile', $data);
    }
}
