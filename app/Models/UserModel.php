<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = "user";
    protected $primaryKey = 'user_id';
    protected $allowedField = ['user_email', 'user_password'];
}
