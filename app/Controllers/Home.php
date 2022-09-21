<?php

namespace App\Controllers;

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

    public function list_subkoordinat()
    {
        echo view('layouts/header');
        echo view('pages/list_subkoordinat');
        echo view('layouts/footer');
    }
}
}
