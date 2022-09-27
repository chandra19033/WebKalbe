<?php

namespace App\Models;

use CodeIgniter\Model;

class ListPelatihanModel extends Model
{
    protected $table = 'list_pelatihan';
    protected $useTimestamps = true;

    public function search($keyword)
    {
        $this->like('nama_pelatihan', $keyword);
        return $this->findAll();

        // $builder = $this->table('list_pelatihan');
        // $builder->like('nama_pelatihan', $keyword);
        // return $builder;
    }
}
