<?php

namespace App\Controllers;

use App\Models\PelatihanModel;

class Pages extends BaseController
{
    protected $pelatihanModel;
    public function __construct()
    {
        $this->pelatihanModel = new PelatihanModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Home | Rencana Pelatihan Kalbe Cikarang'
        ];
        return view('pages/home', $data);
    }

    public function profile()
    {
        $pelatihan = $this->pelatihanModel->findAll();

        $data = [
            'title' => 'Profile',
            'pelatihan' => $pelatihan
        ];

        echo view('pages/profile', $data);
    }

    public function login()
    {
        echo view('layouts/header');
        echo view('pages/login');
        echo view('layouts/footer');
    }
}
