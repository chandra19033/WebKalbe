<?php

namespace App\Controllers;

use App\Models\ListPelatihanModel;
use App\Models\PelatihanModel;
use App\Models\KaryawanModel;
use CodeIgniter\Database\Query;

class Pages extends BaseController
{
    protected $pelatihanModel;
    protected $listpelatihanModel;
    protected $karyawanModel;
    public function __construct()
    {
        $this->pelatihanModel = new PelatihanModel();
        $this->listpelatihanModel = new ListPelatihanModel();
        $this->karyawanModel = new KaryawanModel();
        // $this->karyawanModel = new KaryawanModel();
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
        return view('pages/profile', $data);
    }

    public function tambah($id)
    {
        $name = session()->get('Employee_Name');
        $pelatihan = $this->listpelatihanModel->getPelatihan($id);
        $daftar = $this->pelatihanModel->getPelatihan();

        $tampung = $pelatihan[0];

        $trigger = 0;

        foreach ($daftar as $d) :
            if ($d['nama_pelatihan'] == $tampung['nama_pelatihan']) {
                $trigger++;
            } else {
                $trigger = $trigger;
            }
        endforeach;

        // dd($trigger);


        if ($trigger == 0) {
            $data = [
                'nama_karyawan' =>  strtoupper($name),
                'nama_pelatihan' => $tampung['nama_pelatihan'],
                'penyelenggara' => $tampung['penyelenggara']
            ];

            $this->pelatihanModel->insert($data);
            $alert = [
                'pesan' => 'Pelatihan berhasil ditambahkan',
                'value' => 1
            ];
            session()->setFlashdata('pesan', $alert);
            return redirect()->to('/pages/list_pelatihan');
        } else {
            $alert = [
                'pesan' => 'Pelatihan tidak dapat ditambah karena sudah terdaftar',
                'value' => 0
            ];
            session()->setFlashdata('pesan', $alert);
            return redirect()->to('/pages/list_pelatihan');
        }

        // $this->pelatihanModel->where('nama_karyawan', 'asd')->delete();

        // var_dump($data);
    }

    public function listpelatihan()
    {
        $listpelatihanModel = new ListPelatihanModel();
        $nama = session()->get('Employee_Name');

        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $listpelatihan = $listpelatihanModel->search($keyword);
        } else {
            $listpelatihan = $listpelatihanModel->findAll();
        }

        $data = [
            'title' => 'list_pelatihan',
            'listpelatihan' => $listpelatihan,
            'nama' => $nama
        ];
        return view('pages/list_pelatihan', $data);
    }

    public function login()
    {
        return view('pages/login');
    }

    public function list_pelatihan()
    {
        // $subkoordinat = $this->karyawanModel->subkoordinat();
        // dd($subkoordinat);
        $data = [
            'title' => 'list_pelatihan'
        ];
        return view('pages/list_pelatihan', $data);
    }

    public function list_subkoordinat()
    {
        $subkoordinat = $this->karyawanModel->subkoordinat();

        $data = [
            'title' => 'list_subkoordinat',
            'subkoordinat' => $subkoordinat
        ];
        return view('pages/list_subkoordinat', $data);
    }
    public function detail_subkoordinat($id)
    {
        $data = [
            'title' => 'detail_subkoordinat'
        ];
        // return view('pages/detail_subkoordinat', $data);
    }


    public function dashboard()
    {
        $data = [
            'title' => 'dashboard'
        ];
        return view('pages/dashboard', $data);
    }

    public function persetujuan()
    {
        $data = [
            'title' => 'persetujuan'
        ];
        return view('pages/persetujuan', $data);
    }
}
