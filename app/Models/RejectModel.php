<?php

namespace App\Models;

use CodeIgniter\Model;

class RejectModel extends Model
{
    protected $table = 'riwayat_reject';
    protected $useTimestamps = true;
    protected $allowedFields = ['nama_karyawan', 'reject_by', 'reason'];

    public function getReject($nama)
    {
        $this->where('nama_karyawan', $nama);
        return $this->findAll();
    }
}
