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
        $this->set('status_daftar', '1');
        $this->update();
    }

    public function dept_manager()
    {
        $nama = session()->get('Employee_Name');
        $this->where('Dept_Manager', $nama);
        return $this->findAll();
    }

    public function qa_manager()
    {
        $nama = session()->get('Employee_Name');
        $this->where('QA_Manager', $nama);
        return $this->findAll();
    }

    public function hco_manager()
    {
        $nama = session()->get('Employee_Name');
        $this->where('HCO_Manager', $nama);
        return $this->findAll();
    }

    public function sitegroup_head()
    {
        $nama = session()->get('Employee_Name');
        $this->where('SiteGroup_Head', $nama);
        return $this->findAll();
    }

    public function status_dept_manager($nama)
    {
        $this->where('Employee_Name', $nama);
        $this->set('status_daftar', '2');
        $this->update();
    }

    public function status_qa_manager($nama)
    {
        $this->where('Employee_Name', $nama);
        $this->set('status_daftar', '3');
        $this->update();
    }

    public function status_hco_manager($nama)
    {
        $this->where('Employee_Name', $nama);
        $this->set('status_daftar', '4');
        $this->update();
    }

    public function status_sitegroup_head($nama)
    {
        $this->where('Employee_Name', $nama);
        $this->set('status_daftar', 'Approved');
        $this->update();
    }

    public function status_rejected($nama)
    {
        $this->where('Employee_Name', $nama);
        $this->set('status_daftar', '0');
        $this->update();
    }
}
