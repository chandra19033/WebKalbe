<?php

namespace App\Models;

use CodeIgniter\Model;

class KaryawanModel extends Model
{
    protected $table = 'users';
    protected $allowedFields = ['status_daftar'];

    public function getKaryawan($name)
    {
        $this->where('Employee_Name', $name);
        return $this->findAll();
    }

    public function subkoordinat()
    {
        $superior = session()->get('Employee_Name');
        $this->where('Superior', $superior);
        return $this->findAll();
    }

    public function regis($nama)
    {
        $this->where('Employee_Name', $nama);
        $this->set('status_daftar', 'close');
        $this->update();
    }
}
