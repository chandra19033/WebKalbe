<?php

namespace App\Models;

use CodeIgniter\Model;

class ApprovalModel extends Model
{
    protected $table = 'approval';
    protected $allowedFields = ['nama_karyawan', 'Dept_Manager', 'QA_Manager', 'HCO_Manager', 'SiteGroup_Head'];

    public function getApproval($nama)
    {
        $this->where('nama_karyawan', $nama);
        return $this->findAll();
    }

    public function regis($nama)
    {
        $this->where('nama_karyawan', $nama);
        $this->set('Dept_Manager', 'not yet approved');
        $this->set('QA_Manager', 'not yet approved');
        $this->set('HCO_Manager', 'not yet approved');
        $this->set('SiteGroup_Head', 'not yet approved');
        $this->update();
    }

    public function approved_dept_manager($nama)
    {
        $this->where('nama_karyawan', $nama);
        $this->set('Dept_Manager', 'approved');
        $this->update();
    }

    public function rejected_dept_manager($nama)
    {
        $this->where('nama_karyawan', $nama);
        $this->set('Dept_Manager', 'rejected');
        $this->update();
    }

    public function approved_qa_manager($nama)
    {
        $this->where('nama_karyawan', $nama);
        $this->set('QA_Manager', 'approved');
        $this->update();
    }

    public function rejected_qa_manager($nama)
    {
        $this->where('nama_karyawan', $nama);
        $this->set('QA_Manager', 'rejected');
        $this->update();
    }

    public function approved_hco_manager($nama)
    {
        $this->where('nama_karyawan', $nama);
        $this->set('HCO_Manager', 'approved');
        $this->update();
    }

    public function rejected_hco_manager($nama)
    {
        $this->where('nama_karyawan', $nama);
        $this->set('HCO_Manager', 'rejected');
        $this->update();
    }

    public function approved_sitegroup_head($nama)
    {
        $this->where('nama_karyawan', $nama);
        $this->set('SiteGroup_Head', 'approved');
        $this->update();
    }

    public function rejected_sitegroup_head($nama)
    {
        $this->where('nama_karyawan', $nama);
        $this->set('SiteGroup_Head', 'rejected');
        $this->update();
    }
}
