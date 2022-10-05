<?php

namespace App\Models;

use CodeIgniter\Model;

class ListPelatihanModel extends Model
{
    protected $table = 'list_pelatihan';
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
}
