<?php

namespace App\Controllers;

use App\Models\ListPelatihanModel;
use App\Models\PelatihanModel;
use App\Models\Model_Auth;
use CodeIgniter\Database\Query;

class Pages extends BaseController
{
    protected $pelatihanModel;
    protected $listpelatihanModel;

    public function __construct()
    {

        helper('form');
        $this->Model_Auth = new Model_Auth();
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
        $data = array(
            'title' => 'Login',
        );

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

        return view('pages/login', $data);
    }

    public function cek_login()
    {
        if ($this->validate([
            'Email' => [
                'label' => 'E-Mail',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!!'
                ]
            ],
            'Password' => [
                'label' => 'Password',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!!'
                ]
            ],

        ])) {
            //valid
            $Email = $this->request->getPost('Email');
            $Password = $this->request->getPost('Password');
            $cek = $this->Model_Auth->login($Email, $Password);
            if ($cek) {
                //ditemukan
                session()->set('log', true);
                session()->set('Employee_ID', $cek['Employee_ID']);
                session()->set('Employee_Name', $cek['Employee_Name']);
                session()->set('Postition_Name', $cek['Postition_Name']);
                session()->set('Job_Title_Level_Name', $cek['Job_Title_Level_Name']);
                session()->set('Organization_Name', $cek['Organization_Name']);
                session()->set('Superior', $cek['Superior']);
                session()->set('Email', $cek['Email']);
                session()->set('Password', $cek['Password']);

                //$this->setUserMethod($user);
                return redirect()->to(base_url('/'));
                //return redirect()->to(base_url('/'));
            } else {
                //data tidak cocok
                session()->setFlashdata('pesan', 'Login Gagal !!');
                return redirect()->to(base_url('pages/login'));
            }
        } else {
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('pages/login'));
        }
    }

    private function setUserMethod($user)
    {
        $data =
            [
                'No.' => $user['No.'],
                'Employee_ID' => $user['Employee_ID'],
                'Employee_Name' => $user['Employee_Name'],
                'Postition_Name' => $user['Postition_Name'],
                'Job_Title_Level_Name' => $user['Job_Title_Level_Name'],
                'Organization_Name' => $user['Organization_Name'],
                'Superior' => $user['Superior'],
                'Email' => $user['Email'],
                'Password' => $user['Password'],
                'isLoggedIn' => true,
            ];
    }

    public function logout()
    {
        session()->remove('log');
        session()->remove('Employee_ID');
        session()->remove('Employee_Name');
        session()->remove('Postition_Name');
        session()->remove('Job_Title_Level_Name');
        session()->remove('Organization_Name');
        session()->remove('Superior');
        session()->remove('Email');
        session()->remove('Password');
        session()->setFlashdata('pesan', 'Logout Sukses !!');
        return redirect()->to(base_url('/'));
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
