<?php

namespace App\Models;

use CodeIgniter\Model;

class Model_Auth extends Model
{
    // public function save_register($data)
    // {
    //     $this->db->table('users')->insert($data);
    // }

    public function login($Email, $Password)
    {
        return $this->db->table('users')->where([
            'Email' => $Email,
            'Password' => $Password,
        ])->get()->getRowArray();
    }
}
