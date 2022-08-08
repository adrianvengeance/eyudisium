<?php

namespace App\Models;

use CodeIgniter\Model;

class BerkasModel extends Model
{
    protected $table                = 'berkas';
    protected $primaryKey           = 'id_berkas';
    protected $returnType           = 'array';
    protected $allowedFields        = [
        'npmmhs', 'fotowarna', 'fotobw4x5', 'fotobw4x6', 'ktm', 'suketadmkeuangan', 'beritaacaraujianskripsi', 'suketpenyerahanskripsi', 'lempengdewanpenguji', 'suketsumbanganbuku', 'suketperpusda', 'suketperpusupy', 'daftarnilai', 'krsterakhir', 'dataalumni', 'suketperubahanidentitas', 'sertifept', 'sertifujikomp', 'ktp', 'aktalahir', 'ijazah'
    ];
    protected $useTimestamps        = true;
    protected $dateFormat           = 'datetime';
    protected $createdField         = 'created_at';
    protected $updatedField         = 'updated_at';
    protected $useSoftDeletes       = false;

    // public function doneBerkasAwal()
    // {
    //     $query = $this->select('npmmhs');
    //     $query->where(array('ktm' => null, 'krsterakhir IS NOT NULL' => NULL, 'lempengdewanpenguji IS NOT NULL' => NULL, 'beritaacaraujianskripsi IS NOT NULL' => NULL));
    //     return $query->get()->getResultArray();
    // }

    public function tidakkosong($npm)
    {
        // $berkas = $this->db->table('berkas')->where(['npmmhs' => $npm])->get()->getRowArray();
        $berkas = $this->where('npmmhs', $npm)->first();

        if (
            !is_null($berkas['npmmhs']) &&
            !is_null($berkas['fotowarna']) &&
            !is_null($berkas['fotobw4x5']) &&
            !is_null($berkas['fotobw4x6']) &&
            !is_null($berkas['ktm']) &&
            !is_null($berkas['suketadmkeuangan']) &&
            !is_null($berkas['beritaacaraujianskripsi']) &&
            !is_null($berkas['suketpenyerahanskripsi']) &&
            !is_null($berkas['lempengdewanpenguji']) &&
            !is_null($berkas['suketsumbanganbuku']) &&
            !is_null($berkas['suketperpusda']) &&
            !is_null($berkas['suketperpusupy']) &&
            !is_null($berkas['daftarnilai']) &&
            !is_null($berkas['krsterakhir']) &&
            // !is_null($berkas['suketperubahanidentitas']) &&
            !is_null($berkas['sertifept']) &&
            !is_null($berkas['sertifujikomp']) &&
            !is_null($berkas['ktp']) &&
            !is_null($berkas['aktalahir']) &&
            !is_null($berkas['ijazah']) &&
            !is_null($berkas['dataalumni'])
        ) {
            return true;
        } else {
            return false;
        }
    }

    public function tidakMemenuhi($npm, $path, $file)
    {
        // foreach ($path as $p) {
        //     $data["$path"] = null;
        // }

        $data = ["$path" => null];
        $this->where('npmmhs', $npm)->set($data)->update();
    }
}
