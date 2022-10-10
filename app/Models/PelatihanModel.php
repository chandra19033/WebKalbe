<?php

namespace App\Models;

use CodeIgniter\Model;

class PelatihanModel extends Model
{
    protected $table = 'daftar_pelatihan';
    protected $useTimestamps = false;
    // protected $primaryKey  = 'id';
    protected $allowedFields = ['nama_karyawan', 'nama_pelatihan', 'penyelenggara'];

    public function getPelatihan()
    {
        $name = session()->get('Employee_Name');
        $this->where('nama_karyawan', strtoupper($name));
        return $this->findAll();
    }
}
