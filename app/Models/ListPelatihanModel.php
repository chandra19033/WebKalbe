<?php

namespace App\Models;

use CodeIgniter\Model;

class ListPelatihanModel extends Model
{
    protected $table = 'list_pelatihan';
    protected $primaryKey = 'id';
    // protected $useTimestamps = true;
    protected $allowedFields = ['nama_pelatihan', 'penyelenggara'];

    public function search($keyword)
    {
        $this->like('nama_pelatihan', $keyword);
        return $this->findAll();

        // $builder = $this->table('list_pelatihan');
        // $builder->like('nama_pelatihan', $keyword);
        // return $builder;
    }

    public function getPelatihan($id)
    {
        $this->where('id', $id);
        return $this->findAll();
    }

    public function getPlthn()
    {
        $builder = $this->db->table('list_pelatihan');
        $builder->select('*');
        return $builder->get();
    }

    public function savePelatihan($data)
    {
        $query = $this->db->table('list_pelatihan')->insert($data);
        return $query;
    }

    public function updatePelatihan($data, $id)
    {
        $query = $this->db->table('list_pelatihan')->update($data, array('id' => $id));
        return $query;
    }

    public function deletePelatihan($id)
    {
        $query = $this->db->table('list_pelatihan')->delete(array('id' => $id));
        return $query;
    }
}
