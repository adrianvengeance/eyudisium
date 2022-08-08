<?php

namespace App\Models;

use CodeIgniter\Model;

class HistoryModel extends Model
{

    protected $table                = 'history';
    protected $primaryKey           = 'id';
    protected $useSoftDeletes       = true;
    protected $allowedFields        = ['npmmhs', 'nama', 'fakultas', 'prodi', 'tanggal'];

    // Dates
    protected $useTimestamps        = false;
    protected $dateFormat           = 'datetime';
    protected $createdField         = 'created_at';
    protected $updatedField         = 'updated_at';
    protected $deletedField         = 'deleted_at';

    public function ambilsemua()
    {
        $query = $this->orderBy('fakultas', 'ASC');
        $query->orderBy('tanggal', 'DESC');
        return $query->get()->getResultArray();
    }
}
