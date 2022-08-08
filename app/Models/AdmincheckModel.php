<?php

namespace App\Models;

use CodeIgniter\Database\Query;
use CodeIgniter\Model;

class AdmincheckModel extends Model
{
  protected $table                = 'admincheck';
  protected $primaryKey           = 'id';
  protected $returnType           = 'array';
  protected $allowedFields        = [
    'npmmhs', 'nama', 'fakultas', 'prodi', 'prodicheck', 'alasanprodi', 'ajukankefk', 'diajukan_at', 'fakultascheck', 'alasanfakultas', 'validasikebaak', 'divalidasi_at', 'baakcheck', 'alasanbaak', 'calonyudisium', 'calon_at'
  ];

  protected $useTimestamps        = true;
  protected $dateFormat           = 'datetime';
  protected $createdField         = 'created_at';
  protected $updatedField         = 'updated_at';
  protected $useSoftDeletes       = false;

  public function byProdi($roleprodi)
  {
    $builder = $this->where('prodi', $roleprodi);
    $builder->where('ajukankefk', null);
    return $builder->get()->getResult();
  }
  public function readyHapusByProdi($roleprodi)
  {
    $query = $this->where('prodi', $roleprodi)->where('prodicheck', 2)->where('ajukankefk', null)->get()->getResult();
    $query ? $hasil = true : $hasil = false;
    return $hasil;
  }
  public function readyAjukanKeFk($roleprodi)
  {
    $query = $this->where('prodi', $roleprodi)->where('prodicheck', 1)->where('ajukankefk', null)->get()->getResult();
    ($query) ? $hasil = true : $hasil = false;
    return $hasil;
  }
  public function ajukanDariProdi($prodiAdmin)
  {
    $this->where('prodicheck', 1)->where('prodi', $prodiAdmin)->where('ajukankefk', null)->set('ajukankefk', 'diajukan')->set('diajukan_at', date('Y-m-d\TH:i:s'))->update();
  }

  // ======

  public function byFakultas($rolefakultas)
  {
    $builder = $this->where('fakultas', $rolefakultas);
    $builder->where('ajukankefk', 'diajukan')->where('validasikebaak', null);
    return ($builder->get()->getResult());
  }
  public function readyHapusByFakultas($rolefakultas)
  {
    $query = $this->where('fakultas', $rolefakultas)->where('fakultascheck', 2)->where('validasikebaak', null)->get()->getResult();
    $query ? $hasil = true : $hasil = false;
    return $hasil;
  }
  public function readyAjukanKeBaak($rolefakultas)
  {
    $query = $this->where('fakultas', $rolefakultas)->where('fakultascheck', 1)->where('validasikebaak', null)->get()->getResult();
    ($query) ? $hasil = true : $hasil = false;
    return ($hasil);
  }
  public function validasiDariFakultas($fakultasAdmin)
  {
    $this->where('fakultascheck', 1)->where('fakultas', $fakultasAdmin)->where('validasikebaak', null)->set('validasikebaak', 'divalidasi')->set('divalidasi_at', date('Y-m-d\TH:i:s'))->update();
  }

  //=======

  public function byBaak()
  {
    return $this->where('ajukankefk', 'diajukan')->where('validasikebaak', 'divalidasi')->where('calonyudisium', null)->get()->getResult();
  }
  public function readyHapusByBaak()
  {
    $query = $this->where('baakcheck', 2)->where('calonyudisium', null)->get()->getResult();
    $query ? $hasil = true : $hasil = false;
    return $hasil;
  }
  public function readyKembalikanKeFakultas()
  {
    $query = $this->where('baakcheck', 1)->where('calonyudisium', null)->get()->getResult();
    ($query) ? $hasil = true : $hasil = false;
    return $hasil;
  }
  public function kembalikanDariBaak()
  {
    $this->where('ajukankefk', 'diajukan')->where('validasikebaak', 'divalidasi')->where('baakcheck', 1)->where('calonyudisium', null)->set('calonyudisium', 'yes')->set('calon_at', date('Y-m-d\TH:i:s'))->update();
  }

  // 

  public function calonyudisium($fakultas)
  {
    $query = $this->where('ajukankefk', 'diajukan')->where('validasikebaak', 'divalidasi')->where('calonyudisium', 'yes')->where('fakultas', $fakultas);
    return $query->get()->getResult();
  }

  public function getpesertayudisium($rolefakultas)
  {
    $sql = 'SELECT npmmhs, nama, fakultas, prodi, NOW() AS tanggal FROM admincheck WHERE calonyudisium = ? AND fakultas = ? ';
    $builder = $this->query($sql, ['yes', $rolefakultas]);
    return $builder->getResult();
    // $query = $this->query("SELECT npmmhs, nama, fakultas, prodi, NOW() AS tanggal FROM admincheck WHERE calonyudisium = 'yes' WHERE fakultas = $rolefakultas");
    // return $query->getResultArray();
  }

  public function clearpesertayudisium($rolefakultas)
  {
    $this->where('fakultas', $rolefakultas)->where('ajukankefk', 'diajukan')->where('validasikebaak', 'divalidasi')->where('calonyudisium', 'yes')->where('calon_at !=', null)->delete();
  }

  // 

  public function telahdiajukan($role, $roleporf = null)
  {
    switch ($role) {
      case 3:
        $sql = 'SELECT id, npmmhs, nama, fakultas, prodi, diajukan_at AS tanggal FROM admincheck WHERE prodi = ? AND ajukankefk = ? ORDER BY tanggal DESC';
        $builder = $this->query($sql, [$roleporf, 'diajukan']);
        return $builder->getResult();
        break;
      case 2:
        $sql = 'SELECT id, npmmhs, nama, fakultas, prodi, divalidasi_at AS tanggal FROM admincheck WHERE fakultas = ? AND validasikebaak = ? ORDER BY tanggal DESC';
        $builder = $this->query($sql, [$roleporf, 'divalidasi']);
        return $builder->getResult();
        break;
      case 1:
        $sql = 'SELECT id, npmmhs, nama, fakultas, prodi, calon_at AS tanggal FROM admincheck WHERE calonyudisium = ? ORDER BY tanggal DESC';
        $builder = $this->query($sql, ['yes']);
        return $builder->getResult();
        break;
    }
  }

  //

  public function cleanmahasiswabyprodi($roleprodi)
  {
    $this->where('prodi', $roleprodi)->where('prodicheck', 2)->delete();
  }
  public function cleanmahasiswabyfakultas($rolefakultas)
  {
    $this->where('fakultas', $rolefakultas)->where('fakultascheck', 2)->delete();
  }
  public function cleanmahasiswabybaak()
  {
    $this->where('baakcheck', 2)->delete();
  }

  public function berkasditolak($kolom, $npm)
  {
    $data = ["$kolom" => 2];
    $this->where('npmmhs', $npm)->set($data)->update();
  }
}
