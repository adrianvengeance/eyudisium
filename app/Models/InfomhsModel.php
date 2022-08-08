<?php

namespace App\Models;

use CodeIgniter\Model;

class InfomhsModel extends Model
{
    protected $table                = 'infomhs';
    protected $primaryKey           = 'id_infomhs';
    protected $returnType           = 'array';
    protected $allowedFields        = [
        'npmmhs', 'email', 'tempatlahir', 'tanggallahir', 'alamatrumah', 'alamatkantor', 'ortu', 'namaortu', 'asalsekolah', 'jenista', 'judulid', 'judulen', 'dosbim1', 'dosbim2', 'penguji1', 'penguji2', 'penguji3', 'tahunlulus', 'gelar', 'foto', 'skripsi1', 'skripsi2'
    ];

    protected $useTimestamps        = true;
    protected $dateFormat           = 'datetime';
    protected $createdField         = 'created_at';
    protected $updatedField         = 'updated_at';
}
