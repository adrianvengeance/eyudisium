<?php

namespace App\Controllers;

use \App\Models\CountdownModel;
use \App\Models\InfomhsModel;
use \App\Models\MahasiswaModel;
use \App\Models\AdmincheckModel;
use \App\Models\BerkasModel;
use \Config\Services;

class Berkas extends BaseController
{
    public function __construct()
    {
        $this->uri = new \CodeIgniter\HTTP\URI();
        $this->infomhs = new InfomhsModel();
        $this->mahasiswa = new MahasiswaModel();
        $this->countdown = new CountdownModel();
        $this->admincheck = new AdmincheckModel();
        $this->berkas = new BerkasModel();

        $this->db = db_connect();
        $userid = session('id');
        $this->user = $this->db->table('users')->where(['id' => $userid])->get()->getRowArray();   //ambil data user

        $this->npm = $this->user['username'];
        $this->mhs = $this->db->table('mahasiswa')->where(['npm' => $this->npm])->get()->getRowArray();
    }

    public function index()
    {
        switch ($this->mhs['fakultas']) {
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

        $data = [
            'title' => $this->user['nama'],
            'user'  => $this->user,
            'mhs'   => $this->mhs,
            'fk'    => $fk,
            'bwfk'  => $bwfk,
            'sfk'   => $sfk,
            'submit' => $this->berkas->tidakkosong($this->npm),
            'ajukan' => $this->admincheck->where(['npmmhs' => $this->npm])->first(),
            'berkas' => $this->berkas->where(['npmmhs' => $this->npm])->get()->getRowArray(),
            'uri'   => current_url(),
            'validation'    => Services::validation()
        ];
        return view('/user/mahasiswa/uploadberkas', $data);
    }

    public function fotowarna()
    {
        if (!$this->validate([
            'fotowarna' => [
                'rules' => 'uploaded[fotowarna]|max_size[fotowarna,1024]|is_image[fotowarna]|ext_in[fotowarna,jpg,jpeg]|mime_in[fotowarna,image/jpg,image/jpeg]',
                'errors' => [
                    'uploaded'  => 'Pas Foto Berwarna Diperlukan',
                    'max_size'  => 'File Pas Foto Maksimal 1 MB',
                    'is_image'  => 'File Pas Foto Harus Gambar JPG atau JPEG',
                    'ext_in'    => 'File Pas Foto Harus Gambar JPG atau JPEG',
                    'mime_in'   => 'File Pas Foto Harus Gambar JPG atau JPEG',
                ]
            ]
        ])) {
            return redirect()->back()->withInput();
        }
        $fotowarna = $this->request->getFile('fotowarna');

        $fotowarna->move("berkas/$this->npm/fotowarna");
        $nama_foto = $fotowarna->getName();
        $berkas = ['fotowarna' => $nama_foto];
        $this->db->table('berkas')->where(['npmmhs' => $this->npm])->update($berkas);

        session()->setFlashdata('berkasuploaded', 'Pas Foto Berwarna berhasil di upload');
        return redirect()->back();
    }

    public function fotobw4x5()
    {
        if (!$this->validate([
            'fotobw4x5' => [
                'rules' => 'uploaded[fotobw4x5]|max_size[fotobw4x5,1024]|is_image[fotobw4x5]|ext_in[fotobw4x5,jpg,jpeg]|mime_in[fotobw4x5,image/jpg,image/jpeg]',
                'errors' => [
                    'uploaded'  => 'Pas Foto Hitam Putih 4x5 Diperlukan',
                    'max_size'  => 'File Pas Foto Maksimal 1 MB',
                    'is_image'  => 'File Pas Foto Harus Gambar JPG atau JPEG',
                    'ext_in'    => 'File Pas Foto Harus Gambar JPG atau JPEG',
                    'mime_in'   => 'File Pas Foto Harus Gambar JPG atau JPEG',
                ]
            ]
        ])) {
            return redirect()->back()->withInput();
        }
        $fotobw4x5 = $this->request->getFile('fotobw4x5');

        $fotobw4x5->move("berkas/$this->npm/fotobw4x5");
        $nama_foto = $fotobw4x5->getName();
        $berkas = ['fotobw4x5' => $nama_foto];
        $this->db->table('berkas')->where(['npmmhs' => $this->npm])->update($berkas);

        session()->setFlashdata('berkasuploaded', 'Pas Foto Hitam Putih 4x5 berhasil di upload');
        return redirect()->back();
    }

    public function fotobw4x6()
    {
        if (!$this->validate([
            'fotobw4x6' => [
                'rules' => 'uploaded[fotobw4x6]|max_size[fotobw4x6,1024]|is_image[fotobw4x6]|ext_in[fotobw4x6,jpg,jpeg]|mime_in[fotobw4x6,image/jpg,image/jpeg]',
                'errors' => [
                    'uploaded'  => 'Pas Foto Hitam Putih 4x6 Diperlukan',
                    'max_size'  => 'File Pas Foto Maksimal 1 MB',
                    'is_image'  => 'File Pas Foto Harus Gambar JPG atau JPEG',
                    'ext_in'    => 'File Pas Foto Harus Gambar JPG atau JPEG',
                    'mime_in'   => 'File Pas Foto Harus Gambar JPG atau JPEG',
                ]
            ]
        ])) {
            return redirect()->back()->withInput();
        }
        $fotobw4x6 = $this->request->getFile('fotobw4x6');

        $fotobw4x6->move("berkas/$this->npm/fotobw4x6");
        $nama_foto = $fotobw4x6->getName();
        $berkas = ['fotobw4x6' => $nama_foto];
        $this->db->table('berkas')->where(['npmmhs' => $this->npm])->update($berkas);

        session()->setFlashdata('berkasuploaded', 'Pas Foto Hitam Putih 4x6 berhasil di upload');
        return redirect()->back();
    }

    public function ktm()
    {
        if (!$this->validate([
            'ktm' => [
                'rules' => 'uploaded[ktm]|max_size[ktm,2048]|ext_in[ktm,pdf]|mime_in[ktm,application/pdf]',
                'errors' => [
                    'uploaded' => 'Dokumen Kartu Tanda Mahasiswa diperlukan',
                    'max_size' => 'File maksimal 2MB',
                    'ext_in'   => 'File harus dokumen pdf',
                    'mime_in'  => 'File bukan dokumen pdf yang valid'
                ]
            ]
        ])) {
            return redirect()->back()->withInput();
        }
        $ktm = $this->request->getFile('ktm');

        $ktm->move("berkas/$this->npm/ktm");
        $nama_file = $ktm->getName();
        $berkas = ['ktm' => $nama_file];
        $this->db->table('berkas')->where(['npmmhs' => $this->npm])->update($berkas);

        session()->setFlashdata('berkasuploaded', 'Kartu Tanda Mahasiswa berhasil di upload');
        return redirect()->back();
    }

    public function suketadmkeuangan()
    {
        if (!$this->validate([
            'suketadmkeuangan' => [
                'rules' => 'uploaded[suketadmkeuangan]|max_size[suketadmkeuangan,2048]|ext_in[suketadmkeuangan,pdf]|mime_in[suketadmkeuangan,application/pdf]',
                'errors' => [
                    'uploaded' => 'Dokumen Surat Keterangan Adminstrasi Bebas Keuangan diperlukan',
                    'max_size' => 'File maksimal 2MB',
                    'ext_in'   => 'File harus dokumen pdf',
                    'mime_in'  => 'File bukan dokumen pdf yang valid'
                ]
            ]
        ])) {
            return redirect()->back()->withInput();
        }
        $suketadmkeuangan = $this->request->getFile('suketadmkeuangan');
        $suketadmkeuangan->move("berkas/$this->npm/suketadmkeuangan");
        $namasuket = $suketadmkeuangan->getName();

        $berkas = [
            'suketadmkeuangan' => $namasuket,
        ];
        $this->db->table('berkas')->where(['npmmhs' => $this->npm])->update($berkas);

        session()->setFlashdata('berkasuploaded', 'Surat Keterangan Bebas Administrasi Keuangan berhasil di upload');
        return redirect()->back();
    }

    public function suketpenyerahanskripsi()
    {
        if (!$this->validate([
            'suketpenyerahanskripsi' => [
                'rules' => 'uploaded[suketpenyerahanskripsi]|max_size[suketpenyerahanskripsi,2048]|ext_in[suketpenyerahanskripsi,pdf]|mime_in[suketpenyerahanskripsi,application/pdf]',
                'errors' => [
                    'uploaded' => 'Dokumen Surat Keterangan Penyerahan Skripsi diperlukan',
                    'max_size' => 'File maksimal 2MB',
                    'ext_in'   => 'File harus dokumen pdf',
                    'mime_in'  => 'File bukan dokumen pdf yang valid'
                ]
            ]
        ])) {
            return redirect()->back()->withInput();
        }
        $suketpenyerahanskripsi = $this->request->getFile('suketpenyerahanskripsi');

        $suketpenyerahanskripsi->move("berkas/$this->npm/suketpenyerahanskripsi");
        $nama_file = $suketpenyerahanskripsi->getName();
        $berkas = ['suketpenyerahanskripsi' => $nama_file];
        $this->db->table('berkas')->where(['npmmhs' => $this->npm])->update($berkas);

        session()->setFlashdata('berkasuploaded', 'Surat Keterangan Penyerahan Skripsi berhasil di upload');
        return redirect()->back();
    }

    public function suketsumbanganbuku()
    {
        if (!$this->validate([
            'suketsumbanganbuku' => [
                'rules' => 'uploaded[suketsumbanganbuku]|max_size[suketsumbanganbuku,2048]|ext_in[suketsumbanganbuku,pdf]|mime_in[suketsumbanganbuku,application/pdf]',
                'errors' => [
                    'uploaded' => 'Dokumen Surat Keterangan Penyerahan Sumbangan Buku Pada Program Studi diperlukan',
                    'max_size' => 'File maksimal 2MB',
                    'ext_in'   => 'File harus dokumen pdf',
                    'mime_in'  => 'File bukan dokumen pdf yang valid'
                ]
            ]
        ])) {
            return redirect()->back()->withInput();
        }
        $suketsumbanganbuku = $this->request->getFile('suketsumbanganbuku');

        $suketsumbanganbuku->move("berkas/$this->npm/suketsumbanganbuku");
        $nama_file = $suketsumbanganbuku->getName();
        $berkas = ['suketsumbanganbuku' => $nama_file];
        $this->db->table('berkas')->where(['npmmhs' => $this->npm])->update($berkas);

        session()->setFlashdata('berkasuploaded', 'Surat Keterangan Penyerahan Sumbangan Buku Pada Program Studi berhasil di upload');
        return redirect()->back();
    }

    public function suketperpusda()
    {
        if (!$this->validate([
            'suketperpusda' => [
                'rules' => 'uploaded[suketperpusda]|max_size[suketperpusda,2048]|ext_in[suketperpusda,pdf]|mime_in[suketperpusda,application/pdf]',
                'errors' => [
                    'uploaded' => 'Dokumen Surat Keterangan Bebas Perpustakaan Daerah diperlukan',
                    'max_size' => 'File maksimal 2MB',
                    'ext_in'   => 'File harus dokumen pdf',
                    'mime_in'  => 'File bukan dokumen pdf yang valid'
                ]
            ]
        ])) {
            return redirect()->back()->withInput();
        }
        $suketperpusda = $this->request->getFile('suketperpusda');
        $suketperpusda->move("berkas/$this->npm/suketperpusda");
        $namasuket = $suketperpusda->getName();

        $berkas = [
            'suketperpusda' => $namasuket,
        ];
        $this->db->table('berkas')->where(['npmmhs' => $this->npm])->update($berkas);

        session()->setFlashdata('berkasuploaded', 'Surat Keterangan Bebas Perpustakaan Daerah berhasil di upload');
        return redirect()->back();
    }

    public function suketperpusupy()
    {
        if (!$this->validate([
            'suketperpusupy' => [
                'rules' => 'uploaded[suketperpusupy]|max_size[suketperpusupy,2048]|ext_in[suketperpusupy,pdf]|mime_in[suketperpusupy,application/pdf]',
                'errors' => [
                    'uploaded' => 'Dokumen Surat Keterangan Bebas Perpustakaan Universitas PGRI Yogyakarta diperlukan',
                    'max_size' => 'File maksimal 2MB',
                    'ext_in'   => 'File harus dokumen pdf',
                    'mime_in'  => 'File bukan dokumen pdf yang valid'
                ]
            ]
        ])) {
            return redirect()->back()->withInput();
        }
        $suketperpusupy = $this->request->getFile('suketperpusupy');
        $suketperpusupy->move("berkas/$this->npm/suketperpusupy");
        $namasuket = $suketperpusupy->getName();

        $berkas = [
            'suketperpusupy' => $namasuket,
        ];
        $this->db->table('berkas')->where(['npmmhs' => $this->npm])->update($berkas);

        session()->setFlashdata('berkasuploaded', 'Surat Keterangan Bebas Perpustakaan Universitas PGRI Yogyakarta berhasil di upload');
        return redirect()->back();
    }

    public function daftarnilai()
    {
        if (!$this->validate([
            'daftarnilai' => [
                'rules' => 'uploaded[daftarnilai]|max_size[daftarnilai,2048]|ext_in[daftarnilai,pdf]|mime_in[daftarnilai,application/pdf]',
                'errors' => [
                    'uploaded' => 'Dokumen Daftar Nilai dari Program Studi diperlukan',
                    'max_size' => 'File maksimal 2MB',
                    'ext_in'   => 'File harus dokumen pdf',
                    'mime_in'  => 'File bukan dokumen pdf yang valid'
                ]
            ]
        ])) {
            return redirect()->back()->withInput();
        }
        $daftarnilai = $this->request->getFile('daftarnilai');

        $daftarnilai->move("berkas/$this->npm/daftarnilai");
        $nama_file = $daftarnilai->getName();
        $berkas = ['daftarnilai' => $nama_file];
        $this->db->table('berkas')->where(['npmmhs' => $this->npm])->update($berkas);

        session()->setFlashdata('berkasuploaded', 'Daftar Nilai dari Program Studi berhasil di upload');
        return redirect()->back();
    }

    public function suketperubahanidentitas()
    {
        $suketperubahanidentitas = $this->request->getFile('suketperubahanidentitas');
        if ($suketperubahanidentitas) {
            if (!$this->validate([
                'suketperubahanidentitas' => [
                    'rules' => 'uploaded[suketperubahanidentitas]|max_size[suketperubahanidentitas,2048]|ext_in[suketperubahanidentitas,pdf]|mime_in[suketperubahanidentitas,application/pdf]',
                    'errors' => [
                        'uploaded' => 'Dokumen Surat Keterangan Perubahan Identitas diperlukan (bila ada)',
                        'max_size' => 'File maksimal 2MB',
                        'ext_in'   => 'File harus dokumen pdf',
                        'mime_in'  => 'File bukan dokumen pdf yang valid'
                    ]
                ]
            ])) {
                return redirect()->back()->withInput();
            }
            $suketperubahanidentitas = $this->request->getFile('suketperubahanidentitas');

            $suketperubahanidentitas->move("berkas/$this->npm/suketperubahanidentitas");
            $nama_file = $suketperubahanidentitas->getName();
            $berkas = ['suketperubahanidentitas' => $nama_file];
            $this->db->table('berkas')->where(['npmmhs' => $this->npm])->update($berkas);

            session()->setFlashdata('berkasuploaded', 'Surat Keterangan Perubahan Identitas berhasil di upload');
            return redirect()->back();
        } else {
            $berkas = ['suketperubahanidentitas' => null];
            $this->db->table('berkas')->where(['npmmhs' => $this->npm])->update($berkas);

            session()->setFlashdata('berkasuploaded', 'Tidak ada Surat Keterangan Perubahan Identitas yang di upload');
            return redirect()->back();
        }
    }

    public function sertifept()
    {
        if (!$this->validate([
            'sertifept' => [
                'rules' => 'uploaded[sertifept]|max_size[sertifept,2048]|ext_in[sertifept,pdf]|mime_in[sertifept,application/pdf]',
                'errors' => [
                    'uploaded' => 'Dokumen Sertifikat EPT diperlukan',
                    'max_size' => 'File maksimal 2MB',
                    'ext_in'   => 'File harus dokumen pdf',
                    'mime_in'  => 'File bukan dokumen pdf yang valid'
                ]
            ]
        ])) {
            return redirect()->back()->withInput();
        }
        $sertifept = $this->request->getFile('sertifept');

        $sertifept->move("berkas/$this->npm/sertifept");
        $nama_file = $sertifept->getName();
        $berkas = ['sertifept' => $nama_file];
        $this->db->table('berkas')->where(['npmmhs' => $this->npm])->update($berkas);

        session()->setFlashdata('berkasuploaded', 'Sertifikat EPT berhasil di upload');
        return redirect()->back();
    }

    public function sertifujikomp()
    {
        if (!$this->validate([
            'sertifujikomp' => [
                'rules' => 'uploaded[sertifujikomp]|max_size[sertifujikomp,2048]|ext_in[sertifujikomp,pdf]|mime_in[sertifujikomp,application/pdf]',
                'errors' => [
                    'uploaded' => 'Dokumen Sertifikat Uji Kompetensi Komputer Dasar diperlukan',
                    'max_size' => 'File maksimal 2MB',
                    'ext_in'   => 'File harus dokumen pdf',
                    'mime_in'  => 'File bukan dokumen pdf yang valid'
                ]
            ]
        ])) {
            return redirect()->back()->withInput();
        }
        $sertifujikomp = $this->request->getFile('sertifujikomp');

        $sertifujikomp->move("berkas/$this->npm/sertifujikomp");
        $nama_file = $sertifujikomp->getName();
        $berkas = ['sertifujikomp' => $nama_file];
        $this->db->table('berkas')->where(['npmmhs' => $this->npm])->update($berkas);

        session()->setFlashdata('berkasuploaded', 'Sertifikat Uji Kompetensi Komputer Dasar berhasil di upload');
        return redirect()->back();
    }

    public function ktp()
    {
        if (!$this->validate([
            'ktp' => [
                'rules' => 'uploaded[ktp]|max_size[ktp,2048]|ext_in[ktp,pdf]|mime_in[ktp,application/pdf]',
                'errors' => [
                    'uploaded' => 'Dokumen Fotocopy Kartu Tanda Pengenal diperlukan',
                    'max_size' => 'File maksimal 2MB',
                    'ext_in'   => 'File harus dokumen pdf',
                    'mime_in'  => 'File bukan dokumen pdf yang valid'
                ]
            ]
        ])) {
            return redirect()->back()->withInput();
        }
        $ktp = $this->request->getFile('ktp');

        $ktp->move("berkas/$this->npm/ktp");
        $nama_file = $ktp->getName();
        $berkas = ['ktp' => $nama_file];
        $this->db->table('berkas')->where(['npmmhs' => $this->npm])->update($berkas);

        session()->setFlashdata('berkasuploaded', 'Kartu Tanda Pengenal berhasil di upload');
        return redirect()->back();
    }

    public function aktalahir()
    {
        if (!$this->validate([
            'aktalahir' => [
                'rules' => 'uploaded[aktalahir]|max_size[aktalahir,2048]|ext_in[aktalahir,pdf]|mime_in[aktalahir,application/pdf]',
                'errors' => [
                    'uploaded' => 'Dokumen Akta Kelahiran diperlukan',
                    'max_size' => 'File maksimal 2MB',
                    'ext_in'   => 'File harus dokumen pdf',
                    'mime_in'  => 'File bukan dokumen pdf yang valid'
                ]
            ]
        ])) {
            return redirect()->back()->withInput();
        }
        $aktalahir = $this->request->getFile('aktalahir');

        $aktalahir->move("berkas/$this->npm/aktalahir");
        $nama_file = $aktalahir->getName();
        $berkas = ['aktalahir' => $nama_file];
        $this->db->table('berkas')->where(['npmmhs' => $this->npm])->update($berkas);

        session()->setFlashdata('berkasuploaded', 'Akta Kelahiran berhasil di upload');
        return redirect()->back();
    }

    public function ijazah()
    {
        if (!$this->validate([
            'ijazah' => [
                'rules' => 'uploaded[ijazah]|max_size[ijazah,2048]|ext_in[ijazah,pdf]|mime_in[ijazah,application/pdf]',
                'errors' => [
                    'uploaded' => 'Dokumen Ijazah Terakhir diperlukan',
                    'max_size' => 'File maksimal 2MB',
                    'ext_in'   => 'File harus dokumen pdf',
                    'mime_in'  => 'File bukan dokumen pdf yang valid'
                ]
            ]
        ])) {
            return redirect()->back()->withInput();
        }
        $ijazah = $this->request->getFile('ijazah');

        $ijazah->move("berkas/$this->npm/ijazah");
        $nama_file = $ijazah->getName();
        $berkas = ['ijazah' => $nama_file];
        $this->db->table('berkas')->where(['npmmhs' => $this->npm])->update($berkas);

        session()->setFlashdata('berkasuploaded', 'Ijazah berhasil di upload');
        return redirect()->back();
    }
}
