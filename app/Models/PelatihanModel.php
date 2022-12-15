<?php

namespace App\Models;

use CodeIgniter\Model;

class PelatihanModel extends Model
{
    protected $table = 'daftar_pelatihan';
    protected $useTimestamps = false;
    // protected $primaryKey  = 'id';
    protected $allowedFields = ['nama_karyawan', 'nama_pelatihan', 'penyelenggara', 'notes'];

    public function getPelatihanMandiri()
    {
        $name = session()->get('Employee_Name');
        $this->where('nama_karyawan', strtoupper($name));
        return $this->findAll();
    }

    public function getPelatihanSub($name)
    {
        $this->where('nama_karyawan', strtoupper($name));
        return $this->findAll();
    }

    public function getPelatihanbyName($name)
    {
        $this->where('nama_karyawan', strtoupper($name));
        return $this->findAll();
    }

    public function getPelatihan($id)
    {
        $this->where('id', $id);
        return $this->findAll();
    }

    public function hapus($id)
    {
        $this->delete(['id' => $id]); {
            $builder = $this->db->table('daftar_pelatihan');
            $builder->select('*');
            return $builder->get();
        }
    }

    public function savePelatihan($data)
    {
        $query = $this->db->table('daftar_pelatihan')->insert($data);
        return $query;
    }

    public function updatePelatihan($data, $id)
    {
        $query = $this->db->table('daftar_pelatihan')->update($data, array('id' => $id));
        return $query;
    }

    public function deletePelatihan($id)
    {
        $query = $this->db->table('daftar_pelatihan')->delete(array('id' => $id));
        return $query;
    }

    public function getPlthn()
    {
        $builder = $this->db->table('daftar_pelatihan');
        $builder->select('*');
        return $builder->get();
    }

    public function export()
    {
        $name = session()->get('Employee_Name');
        return $this->db->table('daftar_pelatihan')
            ->join('users', 'users.Employee_Name=daftar_pelatihan.nama_karyawan')
            ->where('users.Superior', strtoupper($name))
            ->get()->getResultArray();
    }
}
