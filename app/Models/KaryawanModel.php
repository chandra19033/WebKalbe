<?php

namespace App\Models;

use CodeIgniter\Model;

class KaryawanModel extends Model
{
    protected $table = 'users';

    public function subkoordinat()
    {
        $superior = session()->get('Employee_Name');
        $this->where('Superior', $superior);
        return $this->findAll();
    }
}
