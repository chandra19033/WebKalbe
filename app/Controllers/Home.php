<?php

namespace App\Controllers;

use App\Models\PelatihanModel;

class Home extends BaseController
{
    public function index()
    {
        echo view('layouts/header');
        echo view('pages/home');
        echo view('layouts/footer');
    }

    public function profile()
    {
        $pelatihanModel = new PelatihanModel();
        dd($pelatihanModel->findAll());
        // $pelatihan = $pelatihanModel->findAll();
        // dd($pelatihan);

        echo view('layouts/header');
        echo view('pages/profile');
        echo view('layouts/footer');
    }

    public function login()
    {
        echo view('layouts/header');
        echo view('pages/login');
        echo view('layouts/footer');
    }

    public function list_pelatihan()
    {
        echo view('layouts/header');
        echo view('pages/list_pelatihan');
        echo view('layouts/footer');
    }
}
