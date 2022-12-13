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

<<<<<<< Updated upstream
    public function getPelatihan($id)
=======
<<<<<<< HEAD
    public function getPelatihanbyId($id)
=======
    public function getPelatihan($id)
>>>>>>> 197aa8a9cd8603208444a90beb2f0acc9a61847f
>>>>>>> Stashed changes
    {
        $this->where('id', $id);
        return $this->findAll();
    }

<<<<<<< Updated upstream
=======
<<<<<<< HEAD
    public function hapus($id)
    {
        $this->delete(['id' => $id]);
=======
>>>>>>> Stashed changes
    public function getPlthn()
    {
        $builder = $this->db->table('daftar_pelatihan');
        $builder->select('*');
        return $builder->get();
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
<<<<<<< Updated upstream
=======
>>>>>>> 197aa8a9cd8603208444a90beb2f0acc9a61847f
>>>>>>> Stashed changes
    }
}
