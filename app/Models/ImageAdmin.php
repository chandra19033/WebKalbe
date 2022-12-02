<?php

namespace App\Models;

use CodeIgniter\Model;

class ImageAdmin extends Model
{
    protected $table = 'image';

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
}
