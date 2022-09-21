<?php

namespace App\Models;

use CodeIgniter\Model;

class PelatihanModel extends Model
{
    protected $table = 'daftar_pelatihan';
    protected $useTimestamps = true;

    public function getPelatihan()
    {
        $this->where('nama_karyawan', 'ARI GUNAWAN GUNAIDI');
        return $this->findAll();
    }
}
