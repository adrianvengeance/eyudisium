<?php

namespace App\Models;

use CodeIgniter\Model;

class CountdownModel extends Model
{
    protected $table = 'countdown';
    protected $allowedFields = ['fakultas', 'batas_waktu'];


    public function fakultas($fk)
    {
        $builder = $this->db->table('countdown');
        $builder->where('fakultas', $fk);
        return $builder->get()->getRow();
    }

    public function waktuStrtotime($date)
    {
        $batas_waktu = strtotime($date);
        return $batas_waktu;
    }

    public function today()
    {
        $today = strtotime(date("Y-m-d\TH:i:s"));
        return $today;
    }

    public function status($waktu)
    {
        $today = $this->today();
        if ($waktu > $today) {                          //batas_waktu lebih dari hari ini
            return 'Aktif';
        } else {
            return 'Tidak Aktif';
        }
    }
    public function setCountdown($fk)
    {
        return $this->where('fakultas', $fk)->get()->getRow();
    }

    public function hari($date)
    {
        $hari = date('D', $date);
        switch ($hari) {
            case 'Sun':
                $x = "Minggu";
                break;
            case 'Mon':
                $x = "Senin";
                break;
            case 'Tue':
                $x = "Selasa";
                break;
            case 'Wed':
                $x = "Rabu";
                break;
            case 'Thu':
                $x = "Kamis";
                break;
            case 'Fri':
                $x = "Jumat";
                break;
            case 'Sat':
                $x = "Sabtu";
                break;
            default:
                $x = "Tidak di ketahui";
                break;
        }
        return $x;
    }

    public function semua()
    {
        $query = $this->query("SELECT * FROM countdown")->getResult();
        foreach ($query as $row) {
            $yaa[] = [
                'nama' => $row->fakultas,
                'waktu' => $row->batas_waktu,
                'status' => $this->status($this->waktuStrtotime($row->batas_waktu)),
            ];
        }
        return $yaa;
    }
}
