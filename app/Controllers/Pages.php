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
        // $db = \Config\Database::connect();
        // $builder = $db->table('daftar_pelatihan');
        // $builder->where('nama_karyawan', 'ARI GUNAWAN GUNAIDI');
        // $pelatihan = $builder->get()->getResult();
        // $pelatihan = $builder;
        // $nama_karyawan = 'ARI GUNAWAN GUNAIDI';
        // $pelatihan = $this->pelatihanModel->where('nama_karyawan', 'ARI GUNAWAN GUNAIDI');
        $pelatihan = $this->pelatihanModel->getPelatihan();
        $data = [
            'title' => 'profile',
            'pelatihan' => $pelatihan
        ];
        // var_dump($pelatihan);
        echo view('pages/profile', $data);
    }

    public function login()
    {
        $data = [
            'title' => 'login'
        ];
        return view('pages/login', $data);
    }

    public function list_pelatihan()
    {
        $data = [
            'title' => 'list_pelatihan'
        ];
        return view('pages/list_pelatihan', $data);
    }

    public function list_subkoordinat()
    {
        $data = [
            'title' => 'list_subkoordinat'
        ];
        return view('pages/list_subkoordinat', $data);
    }
}
