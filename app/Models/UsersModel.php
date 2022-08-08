<?php

namespace App\Models;

use CodeIgniter\Model;

class UsersModel extends Model
{
    protected $table                = 'users';
    protected $primaryKey           = 'id';
    protected $allowedFields        = ['nama', 'username', 'password', 'role', 'rolefakultas', 'roleprodi'];
    protected $useTimestamps        = false;
    protected $useSoftDeletes       = false;

    // public function mhsNotListed($npms)
    // {
    //     // dd($npms);
    //     $npm = ['18111100031', '18111100032', 'admininformatika'];
    //     $query = $this->havingIn('username', $npm)->get()->getResult();
    //     return $query;
    // }

    public function roleFkForProdi($roleprodi)
    {
        switch ($roleprodi) {
            case 'Bimbingan dan Konseling':
                $fk = 'FKIP';
                break;
            case 'Pendidikan Pancasila dan Kewarganegaraan':
                $fk = 'FKIP';
                break;
            case 'Pendidikan Guru Pendidikan Anak Usia Dini':
                $fk = 'FKIP';
                break;
            case 'Pendidikan Luar Biasa':
                $fk = 'FKIP';
                break;
            case 'Pendidikan Guru Sekolah Dasar':
                $fk = 'FKIP';
                break;
            case 'Pendidikan Matematika':
                $fk = 'FKIP';
                break;
            case 'Pendidikan Bahasa dan Sastra Indonesia':
                $fk = 'FKIP';
                break;
            case 'Pendidikan Sejarah':
                $fk = 'FKIP';
                break;
            case 'Pendidikan Bahasa Inggris':
                $fk = 'FKIP';
                break;
            case 'Pendidikan Vokasional':
                $fk = 'FKIP';
                break;
            case 'Teknologi Otomotif':
                $fk = 'FKIP';
                break;
            case 'Pendidikan Ilmu Pengetahuan Sosial (S2)':
                $fk = 'FKIP';
                break;
            case 'Pendidikan Dasar (S2)':
                $fk = 'FKIP';
                break;

            case 'Akuntansi':
                $fk = 'Bisnis';
                break;
            case 'Manajemen':
                $fk = 'Bisnis';
                break;
            case 'Bisnis Digital':
                $fk = 'Bisnis';
                break;

            case 'Informatika':
                $fk = 'Sains dan Teknologi';
                break;
            case 'Teknik Industri':
                $fk = 'Sains dan Teknologi';
                break;
            case 'Farmasi':
                $fk = 'Sains dan Teknologi';
                break;
            case 'Teknik Biomedis':
                $fk = 'Sains dan Teknologi';
                break;
            case 'Gizi':
                $fk = 'Sains dan Teknologi';
                break;
            case 'Vokasi Sarjana Terapan Teknologi Rekayasa Elektro-medis':
                $fk = 'Sains dan Teknologi';
                break;
            case 'Arsitektur':
                $fk = 'Sains dan Teknologi';
                break;
            case 'Ilmu Keolahragaan':
                $fk = 'Sains dan Teknologi';
                break;

            case 'Agroteknologi':
                $fk = 'Pertanian';
                break;
            case 'Teknologi Hasil Pertanian':
                $fk = 'Pertanian';
                break;
        };
        return $fk;
    }

    public function clearmhs($arrnpm)
    {
        $this->whereIn('username', $arrnpm)->delete();
    }
}
