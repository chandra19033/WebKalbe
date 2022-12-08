<?php

namespace App\Models;

use CodeIgniter\Model;

class RiwayatModel extends Model
{
    protected $table = 'riwayat';
    protected $useTimestamps = true;
    protected $allowedFields = ['nama_karyawan', 'riwayat', 'penyelenggara'];

    public function getRiwayat()
    {
        $name = session()->get('Employee_Name');
        $this->where('nama_karyawan', strtoupper($name));
        return $this->findAll();
    }

    public function getRiwayatSub($name)
    {
        $this->where('nama_karyawan', strtoupper($name));
        return $this->findAll();
    }
}
