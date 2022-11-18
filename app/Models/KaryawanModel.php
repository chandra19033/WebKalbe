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

    public function approval()
    {
        $nama = session()->get('Employee_Name');
        // $sql = 'SELECT * FROM users WHERE Dept_Manager = ? OR QA_Manager = ? OR HCO_Manager = ? OR SiteGroup_Head = ?';
        // $this->query($sql, $nama);
        $this->where('Dept_Manager', $nama);
        // $this->where('QA_Manager', $nama);
        // $this->where('HCO_Manager', $nama);
        // $this->where('SiteHead_Group', $nama);
        return $this->findAll();
    }
}
