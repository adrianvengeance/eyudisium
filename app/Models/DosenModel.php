<?php

namespace App\Models;

use CodeIgniter\Model;

class DosenModel extends Model
{
    protected $table                = 'dosen';
    protected $primaryKey           = 'id_dosen';
    protected $returnType           = 'array';
    protected $allowedFields        = ['nama', 'nidn'];

    protected $useTimestamps        = true;
    protected $dateFormat           = 'datetime';
    protected $createdField         = 'created_at';
    protected $updatedField         = 'updated_at';
    protected $useSoftDeletes       = false;

    public function list()
    {
        $query = $this->db->table('dosen');
        return $query->get()->getResult();
    }
}
