<?php

namespace App\Models;

use CodeIgniter\Model;

class MahasiswaModel extends Model
{
    protected $table                = 'mahasiswa';
    protected $primaryKey           = 'id_mahasiswa';
    protected $returnType           = 'array';
    protected $allowedFields        = [
        'npm', 'nama', 'jeniskelamin', 'nomorwa', 'email', 'prodi', 'fakultas', 'infomhs', 'berkas', 'check'
    ];

    protected $useTimestamps        = true;
    protected $dateFormat           = 'datetime';
    protected $createdField         = 'created_at';
    protected $updatedField         = 'updated_at';
    protected $useSoftDeletes       = false;

    public function carinpm($npm)
    {
        $query   = $this->db->query('SELECT * FROM mahasiswa WHERE npm = ' . $npm . '');
        $results = $query->getRowArray();
        return $results;
    }

    function getSemua()
    {
        $builder = $this->db->table('mahasiswa');
        $builder->join('berkas', 'berkas.npmmhs = mahasiswa.npm');
        $builder->join('admincheck', 'admincheck.npmmhs = mahasiswa.npm');
        return $query = $builder->get();
        // return $query->getResult();
    }
}
