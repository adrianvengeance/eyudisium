<?php

namespace App\Controllers;

use Config\Services;
use \App\Models\UsersModel;
use \App\Models\BerkasModel;
use \App\Models\MahasiswaModel;

class Auth extends BaseController
{
    public function __construct()
    {
        $this->berkasmodel = new BerkasModel();
        $this->usersModel = new UsersModel();
        $this->mahasiswaModel = new MahasiswaModel();
        $this->db = db_connect();
        $userid = session('id');
        $this->user = $this->usersModel->where('id', $userid)->first();   //ambil data user
    }

    public function login()
    {
        if (session('id')) {                            //jika masih login,
            return redirect()->to('user/data');         //redirect tidak bisa mengakses halaman login 
        }
        $data = [
            'title' => 'Login'
        ];
        return view('auth/login', $data);
    }

    public function loginProcess()
    {
        $post = $this->request->getPost();                                                      //ambil input post
        $user = $this->usersModel->where('username', $post['username'])->first();               //select where username ada        
        if ($user) {                                                                            //jika ada username
            // if (password_verify($post['password'], $user->password)) {                          //jika password match
            if (password_verify($post['password'], $user['password'])) {                          //jika password match
                // $params = ['id' => $user->id];                                                  //set id
                $params = ['id' => $user['id']];                                                  //set id
                session()->set($params);                                                        //set session dari id
                return redirect()->to('/user');                                                 //ke user
            } else {
                return redirect()->back()->withInput()->with('error', 'Password tidak sesuai');
            }
        } else {
            return redirect()->back()->with('error', 'Username tidak sesuai');
        }
    }

    public function logout()
    {
        session()->remove('id');                //remove session 
        return redirect()->to('/login');
    }

    public function register()
    {
        if ($this->user['role'] != 1) {
            return redirect()->to('/user');
        }
        $listProdi = array('Bimbingan dan Konseling', 'Pendidikan Pancasila dan Kewarganegaraan', 'Pendidikan Guru Pendidikan Anak Usia Dini', 'Pendidikan Luar Biasa', 'Pendidikan Guru Sekolah Dasar', 'Pendidikan Matematika', 'Pendidikan Bahasa dan Sastra Indonesia', 'Pendidikan Sejarah', 'Pendidikan Bahasa Inggris', 'Pendidikan Vokasional', 'Teknologi Otomotif', 'Pendidikan Ilmu Pengetahuan Sosial (S2)', 'Pendidikan Dasar (S2)', 'Akuntansi', 'Manajemen', 'Bisnis Digital', 'Informatika', 'Teknik Industri', 'Farmasi', 'Teknik Biomedis', 'Gizi', 'Vokasi Sarjana Terapan Teknologi Rekayasa Elektro-medis', 'Arsitektur', 'Ilmu Keolahragaan', 'Agroteknologi', 'Teknologi Hasil Pertanian');

        $data = [
            'title'     => 'Register',
            'fakultas'  => ['Bisnis', 'FKIP', 'Pertanian', 'Sains dan Teknologi'],
            'prodi'     => ($listProdi),
            'validation' => Services::validation()
        ];
        return view('auth/register', $data);
    }

    public function registerprocess()
    {
        if (!$this->validate([
            'nama'      => [
                'rules'  => 'required',
                // 'rules'  => 'required|namaValidation',
                'errors' => [
                    'required'      => 'Nama diperlukan',
                    // 'namaValidation' => 'Format nama salah' //'Nama tidak boleh menggunakan karakter selain huruf titik dan koma'
                ]
            ],
            'username'  => [
                'rules'  => 'required|is_unique[users.username]|max_length[20]',
                'errors' => [
                    'required'  => 'Username diperlukan',
                    'is_unique' => 'Username sudah terdaftar',
                    'max_length' => 'Username maksimal 20 karakter'
                ]
            ],
            'password1' => [
                'rules'  => 'required|min_length[8]',
                'errors' => [
                    'required'      => 'Password diperlukan',
                    'min_length'    => 'Password minimal 8 karakter'
                ]
            ],
            'password2' => [
                'rules'  => 'required|matches[password1]',
                'errors' => [
                    'required'  => 'Verifikasi Password diperlukan',
                    'matches'   => 'Password tidak sama'
                ]
            ],
            'role'      => [
                'rules'  => 'required|is_natural',
                'errors' => [
                    'required'      => 'Role diperlukan',
                    'is_natural'    => 'Role salah'
                ]
            ]
        ])) {
            return redirect()->back()->withInput();
        }

        $account = [
            'nama'       => $this->request->getVar('nama'),
            'username'   => $this->request->getVar('username'),
            'password'   => password_hash($this->request->getVar('password2'), PASSWORD_BCRYPT),
            'role'       => $this->request->getVar('role'),
            'rolefakultas' => empty($this->request->getVar('rolefakultas')) ? null : $this->request->getVar('rolefakultas'),
            'roleprodi'  => empty($this->request->getVar('roleprodi')) ? null : $this->request->getVar('roleprodi')
        ];
        $this->usersModel->insert($account);

        session()->setFlashdata('register', 'Akun baru berhasil dibuat');
        return redirect()->to('/register');
    }

    public function findmhs()
    {
        if ($this->user['role'] == 4) {
            return redirect()->to('/user');
        }
        if ($this->user['role'] != 1) {
            return redirect()->to('/user');
        }

        session()->remove('mhs');
        $data = [
            'title' => 'Register',
            'validation' => Services::validation()
        ];
        return view('auth/findmhs', $data);
    }

    public function findmhsprocess()
    {
        $npm = $this->request->getVar('cari');

        if ($npm) {
            $hasil = $this->mahasiswaModel->where('npm', $npm)->first();
            if ($hasil) {
                $created = $this->usersModel->where('username', $npm)->first();
                if (!$created) {
                    $mhs = ['mhs' => $hasil['npm']];
                    session()->set($mhs);
                    return redirect()->to('registermahasiswa/create');
                } else {
                    session()->setFlashdata('pesan', 'Akun untuk user ini telah dibuat');
                    return redirect()->back();
                }
            } else {
                session()->setFlashdata('pesan', 'NPM tidak ditemukan');
                return redirect()->back();
            }
        } else {
            session()->setFlashdata('pesan', 'Silakan Masukan NPM');
            return redirect()->back();
        }
    }

    public function createmhs()
    {
        if ($this->user['role'] == 4) {
            return redirect()->to('/user');
        }
        if ($this->user['role'] != 1) {
            return redirect()->to('/user');
        }

        $npm = session('mhs');
        if ($npm) {
            $hasil = $this->mahasiswaModel->where('npm', $npm)->first();
            $data = [
                'title' => 'Register',
                'mhs'   => $hasil,
                'validation' => Services::validation()
            ];
            return view('auth/registermhs', $data);
        } else {
            return redirect()->to('/registermahasiswa');
        }
    }

    public function createmhsprocess()
    {
        if (!$this->validate([
            'nama'      => [
                'rules'  => 'required',
                // 'rules'  => 'required|namavalidation[nama]',
                'errors' => [
                    'required'      => 'Nama diperlukan',
                    // 'namaValidation' => 'Format nama salah' //'Nama tidak boleh menggunakan karakter selain huruf'
                ]
            ],
            'username'  => [
                'rules'  => 'required|is_unique[users.username]|max_length[20]',
                'errors' => [
                    'required'  => 'Username diperlukan',
                    'is_unique' => 'Username sudah terdaftar',
                    'max_length' => 'Username maksimal 20 karakter'
                ]
            ],
            'password1' => [
                'rules'  => 'required|min_length[8]',
                'errors' => [
                    'required'      => 'Password diperlukan',
                    'min_length'    => 'Password minimal 8 karakter'
                ]
            ],
            'password2' => [
                'rules'  => 'required|matches[password1]',
                'errors' => [
                    'required'  => 'Verifikasi Password diperlukan',
                    'matches'   => 'Password tidak sama'
                ]
            ],
            'role'      => [
                'rules'  => 'required|is_natural',
                'errors' => [
                    'required'      => 'Role diperlukan',
                    'is_natural'    => 'Role salah'
                ]
            ]
        ])) {
            return redirect()->back()->withInput();
        }
        $account = [
            'nama'       => $this->request->getVar('nama'),
            'username'   => $this->request->getVar('username'),
            'password'   => password_hash($this->request->getVar('password2'), PASSWORD_BCRYPT),
            'role'       => $this->request->getVar('role'),
            'rolefakultas' => $this->request->getVar('fakultas'),
            'roleprodi' => $this->request->getVar('prodi')
        ];
        $this->usersModel->insert($account);

        session()->setFlashdata('createaccount', 'Akun baru berhasil dibuat');
        return redirect()->to('/registermahasiswa');
    }

    public function profile()
    {
        $data = [
            'title' => 'Profile',
            'user'  => $this->user
        ];

        return view('auth/profile', $data);
    }

    public function changepass()
    {
        $data = [
            'title' => 'Edit Profile',
            'user'  => $this->user,
            'validation' => Services::validation()
        ];
        return view('auth/changepass', $data);
    }

    public function changepassprocess()
    {
        $post = $this->request->getPost();
        $user = $this->user;

        if ($this->validate([
            'oldpassword'   => [
                'rules'     => 'required',
                'errors'    => [
                    'required'  => 'Password lama dibutuhkan'
                ]
            ],
            'password1' => [
                'rules'  => 'required|min_length[8]',
                'errors' => [
                    'required'      => 'Password baru diperlukan',
                    'min_length'    => 'Password minimal 8 karakter'
                ]
            ],
            'password2' => [
                'rules'  => 'required|matches[password1]',
                'errors' => [
                    'required'  => 'Verifikasi Password diperlukan',
                    'matches'   => 'Password tidak sama'
                ]
            ],
        ])) {
            if (password_verify($post['oldpassword'], $user['password'])) {
                $data = ['password' => password_hash($post['password2'], PASSWORD_BCRYPT)];
                $this->usersModel->update($user['id'], $data);

                session()->setFlashdata('pass', 'Password berhasil diganti');
                return redirect()->to('/profile');
            } else {
                session()->setFlashdata('errorpass', 'Password lama salah');
                return redirect()->back();
            }
        } else {
            return redirect()->back()->withInput();
        }
    }
}
