<?php

namespace App\Controllers;

use App\Models\ListPelatihanModel;
use App\Models\PelatihanModel;
use CodeIgniter\Database\Query;

class Pages extends BaseController
{
    protected $pelatihanModel;
    protected $listpelatihanModel;
    public function __construct()
    {
        $this->pelatihanModel = new PelatihanModel();
        $this->listpelatihanModel = new ListPelatihanModel();
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

    public function tambah($id)
    {
        $name = user()->Nama;
        $pelatihan = $this->listpelatihanModel->getPelatihan($id);

        $tampung = $pelatihan[0];

        $data = [
            'nama_karyawan' =>  strtoupper($name),
            'nama_pelatihan' => $tampung['nama_pelatihan'],
            'penyelenggara' => $tampung['penyelenggara']
        ];

        // dd($data);

        // var_dump($data);

        // $db = \CONFIG\Database::connect();
        // $builder = $db->table("daftar_pelatihan");
        // $query = $builder->query
        // $builder->insert($data);

        if ($this->pelatihanModel->insert($data)) {
            return redirect()->to('/pages/profile');
        } else {
            dd($data);
        }

        // $this->pelatihanModel->where('nama_karyawan', 'asd')->delete();

        // var_dump($data);
    }

    public function listpelatihan()
    {
        $listpelatihanModel = new ListPelatihanModel();
        // $listpelatihan = $listpelatihanModel->findAll();

        // var_dump($this->request->getVar('keyword'));
        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $listpelatihan = $listpelatihanModel->search($keyword);
        } else {
            $listpelatihan = $listpelatihanModel->findAll();
        }

        $data = [
            'title' => 'list_pelatihan',
            'listpelatihan' => $listpelatihan
        ];
        // var_dump($listpelatihan);
        return view('pages/list_pelatihan', $data);
    }

    public function login()
    {
        /*
       $UserModel = new UserModel();
        $login = $this->request->getPost('login');
        if ($login) {
            $user_email = $this->request->getPost('user_email');
            $user_password = $this->request->getPost('user_password');

            if ($user_email == '' or $user_password == '') {
                $err = "Silahkan masukan email dan password";
            }

            if (empty($err)) {
                $dataUser = $UserModel->where("user_email", $user_email)->first();
                if (
                    $dataUser['user_password'] != md5($user_password)
                ) {
                    $err = "password tidak sesuai";
                }
            }

            if (empty($err)) {
                $dataSesi = [
                    'user_id' => $dataUser['user_id'],
                    'user_email' => $dataUser['user_email'],
                    'user_password' => $dataUser['user_password'],
                ];
                session()->set($dataSesi);
                return redirect()->to('/pages/dashboard');
            }

            if ($err) {
                session()->setFlashdata('error', $err);
                return redirect()->to("login");
            }
        }
*/

        return view('pages/login');
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
