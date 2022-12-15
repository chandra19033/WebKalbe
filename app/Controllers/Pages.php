<?php

namespace App\Controllers;

use App\Models\ApprovalModel;
use App\Models\CalendarModel;
use App\Models\ListPelatihanModel;
use App\Models\PelatihanModel;
use App\Models\KaryawanModel;
use App\Models\Model_Auth;
use App\Models\RejectModel;
use App\Models\RiwayatModel;
use App\Models\EventModel;
use CodeIgniter\Database\Query;
use CodeIgniter\Controller;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\I18n\Time;

class Pages extends BaseController
{
    protected $pelatihanModel;
    protected $listpelatihanModel;
    protected $karyawanModel;
    protected $eventModel;
    protected $calendar;

    public function __construct()
    {

        helper('form');
        $this->Model_Auth = new Model_Auth();
        $this->pelatihanModel = new PelatihanModel();
        $this->karyawanModel = new KaryawanModel();
        $this->riwayatModel = new RiwayatModel();
        $this->approvalModel = new ApprovalModel();
        $this->rejectModel = new RejectModel();
        $this->eventModel = new EventModel();
        $this->listpelatihanModel = new ListPelatihanModel();
    }

    public function index()
    {
        $model = new EventModel();
        $data = [
            'title' => 'Home | Rencana Pelatihan Kalbe Cikarang',
        ];
        $data['eventmodel']  = $model->getNewEvent1()->getResult();
        return view('pages/home', $data);
    }

    public function profile()
    {
        $pelatihan = $this->pelatihanModel->getPelatihanMandiri();
        $riwayat = $this->riwayatModel->getRiwayat();
        $tampung = $this->karyawanModel->getKaryawan(session()->get('Employee_Name'));
        $reject = $this->rejectModel->getReject(session()->get('Employee_Name'));
        $karyawan = $tampung[0];

        $data = [
            'title' => 'profile',
            'pelatihan' => $pelatihan,
            'karyawan' => $karyawan,
            'riwayat' => $riwayat,
            'reject' => $reject
        ];
        return view('pages/profile', $data);
    }

    public function tambah($name = 0, $id = 0)
    {
        $pelatihan = $this->listpelatihanModel->getPelatihan($id);
        $daftar = $this->pelatihanModel->getPelatihanbyName($name);
        $k = $this->karyawanModel->getKaryawan($name);

        $karyawan = $k[0];

        $tampung = $pelatihan[0];

        $trigger = 0;

        foreach ($daftar as $d) :
            if ($d['nama_pelatihan'] == $tampung['nama_pelatihan']) {
                $trigger++;
            } else {
                $trigger = $trigger;
            }
        endforeach;

        if ($karyawan['status_daftar'] == 'open') {
            // dd($karyawan);
            if ($trigger == 0) {
                $data = [
                    'nama_karyawan' =>  strtoupper($name),
                    'nama_pelatihan' => $tampung['nama_pelatihan'],
                    'penyelenggara' => $tampung['penyelenggara'],
                ];

                $riwayat = [
                    'nama_karyawan' =>  strtoupper($name),
                    'riwayat' => 'Menambahkan pelatihan ' . $tampung['nama_pelatihan'],
                    'nik' => $karyawan['Employee_ID']
                ];

                $this->riwayatModel->insert($riwayat);
                $this->pelatihanModel->insert($data);
                $alert = [
                    'pesan' => 'Pelatihan berhasil ditambahkan',
                    'value' => 1,
                    'nama' => $name
                ];
                session()->setFlashdata('pesan', $alert);
                return redirect()->to('/pages/list_pelatihan/' . $name);
            } else {
                $alert = [
                    'pesan' => 'Pelatihan tidak dapat ditambah karena sudah terdaftar',
                    'value' => 0,
                    'nama' => $name
                ];
                session()->setFlashdata('pesan', $alert);
                return redirect()->to('/pages/list_pelatihan/' . $name);
            }
        } elseif ($karyawan['status_daftar'] != 'open') {
            $alert = [
                'pesan' => 'Sudah tidak dapat Daftar karena sudah Submit',
                'value' => 0,
                'nama' => $name
            ];
            session()->setFlashdata('pesan', $alert);
            return redirect()->to('/pages/list_pelatihan/' . $name);
        }

        // $this->pelatihanModel->where('nama_karyawan', 'asd')->delete();

        // var_dump($data);
    }

    public function tambah_mandiri($name)
    {
        $tampung = $this->request->getVar();

        $pelatihan = $tampung;
        $daftar = $this->pelatihanModel->getPelatihanbyName($name);
        $k = $this->karyawanModel->getKaryawan($name);

        $karyawan = $k[0];

        $trigger = 0;

        foreach ($daftar as $d) :
            if ($d['nama_pelatihan'] == $pelatihan['namapelatihan']) {
                $trigger++;
            } else {
                $trigger = $trigger;
            }
        endforeach;

        if ($karyawan['status_daftar'] == 'open') {

            if ($trigger == 0) {
                $data = [
                    'nama_karyawan' =>  strtoupper($name),
                    'nama_pelatihan' => $pelatihan['namapelatihan'],
                    'penyelenggara' => $pelatihan['penyelenggara']
                ];

                $riwayat = [
                    'nama_karyawan' =>  strtoupper($name),
                    'riwayat' => 'Menambahkan pelatihan ' . $pelatihan['namapelatihan'],
                    'nik' => $karyawan['Employee_ID']
                ];

                $this->riwayatModel->insert($riwayat);
                $this->pelatihanModel->insert($data);
                $alert = [
                    'pesan' => 'Pelatihan berhasil ditambahkan',
                    'value' => 1,
                    'nama' => $name
                ];
                session()->setFlashdata('pesan', $alert);
                return redirect()->to('/pages/list_pelatihan/' . $name);
            } else {
                $alert = [
                    'pesan' => 'Pelatihan tidak dapat ditambah karena sudah terdaftar',
                    'value' => 0,
                    'nama' => $name
                ];
                session()->setFlashdata('pesan', $alert);
                return redirect()->to('/pages/list_pelatihan/' . $name);
            }
        } elseif ($karyawan['status_daftar'] != 'open') {
            $alert = [
                'pesan' => 'Sudah tidak dapat Daftar karena sudah Submit',
                'value' => 0,
                'nama' => $name
            ];
            session()->setFlashdata('pesan', $alert);
            return redirect()->to('/pages/list_pelatihan/' . $name);
        }
    }

    public function list_pelatihan($nama)
    {
        $listpelatihanModel = new ListPelatihanModel();

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
        $data = array(
            'title' => 'Login',
        );

        return view('pages/login', $data);
    }

    public function cek_login()
    {
        if ($this->validate([
            'Email' => [
                'label' => 'E-Mail',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Please fill in {field} to enter the website'
                ]
            ],
            'Password' => [
                'label' => 'Password',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Please fill in {field} to enter the website'
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
                session()->set('Job_Title_Name', $cek['Job_Title_Name']);
                session()->set('Job_Title_Level_Name', $cek['Job_Title_Level_Name']);
                session()->set('Organization_Name', $cek['Organization_Name']);
                session()->set('Superior', $cek['Superior']);
                session()->set('Email', $cek['Email']);
                session()->set('Password', $cek['Password']);
                session()->set('Dept_Manager', $cek['Dept_Manager']);
                session()->set('QA_Manager', $cek['QA_Manager']);
                session()->set('HCO_Manager', $cek['HCO_Manager']);
                session()->set('SiteGroup_Head', $cek['SiteGroup_Head']);
                session()->set('status_daftar', $cek['status_daftar']);
                session()->set('level', $cek['level']);

                //$this->setUserMethod($user);
                return redirect()->to(base_url('/'));
                //return redirect()->to(base_url('/'));
            } else {
                //data tidak cocok
                session()->setFlashdata('pesan',    'Login failed, please re-enter your Email and Password');
                return redirect()->to(base_url('pages/login'));
            }
        } else {
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('pages/login'));
        }
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
        session()->remove('Dept_Manager');
        session()->remove('QA_Manager');
        session()->remove('HCO_Manager');
        session()->remove('SiteGroup_Head');
        session()->remove('status_daftar');
        session()->remove('level');
        session()->setFlashdata('pesan', 'Logout Sukses !!');
        return redirect()->to(base_url('/'));
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

    public function detail_subkoordinat($name)
    {
        $pelatihan = $this->pelatihanModel->getPelatihanSub($name);
        $riwayat = $this->riwayatModel->getRiwayatSub($name);
        $tampung = $this->karyawanModel->getKaryawan($name);
        $karyawan = $tampung[0];
        // dd($karyawan);

        $data = [
            'title' => 'detail_subkoordinat',
            'karyawan' => $karyawan,
            'pelatihan' => $pelatihan,
            'riwayat' => $riwayat
        ];

        return view('pages/detail_subkoordinat', $data);
    }


    public function dashboard()
    {
        $model = new ListPelatihanModel();
        $data = [
            'title' => 'dashboard',
        ];
        $data['listpelatihan']  = $model->getPlthn()->getResult();
        echo view('/pages/dashboard', $data);
    }


    public function event_admin()
    {
        $model = new EventModel();
        $data = [
            'title' => 'event_admin',
        ];
        $data['eventmodel']  = $model->getEvent()->getResult();
        return view('pages/event_admin', $data);
    }

    public function employee_admin()
    {
        $model = new PelatihanModel();
        $data = [
            'title' => 'employee_admin',
        ];
        $data['pelatihan']  = $model->getPlthn()->getResult();
        echo view('/pages/employee_admin', $data);
    }

    public function daftar_sub()
    {
        $subkoordinat = $this->karyawanModel->subkoordinat();

        $data = [
            'title' => 'daftarsub',
            'subkoordinat' => $subkoordinat
        ];
        return view('pages/daftar_sub', $data);
    }

    public function registrasi($nama)
    {
        $tampung = $this->karyawanModel->getKaryawan($nama);
        $karyawan = $tampung[0];
        $this->karyawanModel->regis($nama);
        $this->approvalModel->regis($nama);

        $riwayat = [
            'nama_karyawan' =>  strtoupper($nama),
            'riwayat' => 'Pengajuan untuk proses Approval',
            'nik' => $karyawan['Employee_ID']
        ];

        $this->riwayatModel->insert($riwayat);

        if ($nama == session()->get('Employee_Name')) {
            return redirect()->to('/pages/profile');
        } else {
            return redirect()->to('/pages/detail_subkoordinat/' . $nama);
        }
    }

    public function hapus_pelatihan($nama = 0, $id = 0)
    {
        $tampung = $this->karyawanModel->getKaryawan($nama);
        $karyawan = $tampung[0];
        $tampung = $this->pelatihanModel->getPelatihanbyId($id);
        $pelatihan = $tampung[0];

        $riwayat = [
            'nama_karyawan' =>  strtoupper($nama),
            'riwayat' => 'Menghapus pelatihan ' . $pelatihan['nama_pelatihan'],
            'nik' => $karyawan['Employee_ID']
        ];

        $this->riwayatModel->insert($riwayat);

        $this->pelatihanModel->hapus($id);

        return redirect()->to('/pages/detail_subkoordinat/' . $nama);
    }

    public function persetujuan()
    {
        $dept_manager = $this->karyawanModel->dept_manager();
        $qa_manager = $this->karyawanModel->qa_manager();
        $hco_manager = $this->karyawanModel->hco_manager();
        $sitegroup_head = $this->karyawanModel->sitegroup_head();
        $data = [
            'title' => 'persetujuan',
            'dept_manager' => $dept_manager,
            'qa_manager' => $qa_manager,
            'hco_manager' => $hco_manager,
            'sitegroup_head' => $sitegroup_head
        ];

        // dd($data);
        return view('pages/persetujuan', $data);
    }

    public function detail_approval($name)
    {
        $pelatihan = $this->pelatihanModel->getPelatihanSub($name);
        $riwayat = $this->riwayatModel->getRiwayatSub($name);
        $tampung = $this->karyawanModel->getKaryawan($name);
        $karyawan = $tampung[0];

        $data = [
            'title' => 'detail_approval',
            'karyawan' => $karyawan,
            'pelatihan' => $pelatihan,
            'riwayat' => $riwayat
        ];

        return view('pages/detail_approval', $data);
    }

    public function approve_1($nama)
    {
        $tampung = $this->karyawanModel->getKaryawan($nama);
        $karyawan = $tampung[0];

        $this->approvalModel->approved_dept_manager($nama);
        $this->karyawanModel->status_dept_manager($nama);

        $riwayat = [
            'nama_karyawan' =>  strtoupper($nama),
            'riwayat' => 'Telah di Approve oleh Department Manager',
            'nik' => $karyawan['Employee_ID']
        ];

        $this->riwayatModel->insert($riwayat);

        return redirect()->to('/pages/persetujuan');
    }

    public function approve_2($nama)
    {
        $tampung = $this->karyawanModel->getKaryawan($nama);
        $karyawan = $tampung[0];

        $this->approvalModel->approved_qa_manager($nama);
        $this->karyawanModel->status_qa_manager($nama);

        $riwayat = [
            'nama_karyawan' =>  strtoupper($nama),
            'riwayat' => 'Telah di Approve oleh QA Manager',
            'nik' => $karyawan['Employee_ID']
        ];

        $this->riwayatModel->insert($riwayat);

        return redirect()->to('/pages/persetujuan');
    }

    public function approve_3($nama)
    {
        $tampung = $this->karyawanModel->getKaryawan($nama);
        $karyawan = $tampung[0];

        $this->approvalModel->approved_hco_manager($nama);
        $this->karyawanModel->status_hco_manager($nama);

        $riwayat = [
            'nama_karyawan' =>  strtoupper($nama),
            'riwayat' => 'Telah di Approve oleh HCO Manager',
            'nik' => $karyawan['Employee_ID']
        ];

        $this->riwayatModel->insert($riwayat);

        return redirect()->to('/pages/persetujuan');
    }

    public function approve_4($nama)
    {
        $tampung = $this->karyawanModel->getKaryawan($nama);
        $karyawan = $tampung[0];

        $this->approvalModel->approved_sitegroup_head($nama);
        $this->karyawanModel->status_sitegroup_head($nama);

        $riwayat = [
            'nama_karyawan' =>  strtoupper($nama),
            'riwayat' => 'Telah di Approve oleh Site Group Head',
            'nik' => $karyawan['Employee_ID']
        ];

        $this->riwayatModel->insert($riwayat);

        return redirect()->to('/pages/persetujuan');
    }

    public function reject_1($nama)
    {
        $reject = $this->request->getVar();

        $tampung = $this->karyawanModel->getKaryawan($nama);
        $karyawan = $tampung[0];

        $this->approvalModel->rejected_dept_manager($nama);
        $this->karyawanModel->status_rejected($nama);

        $riwayat = [
            'nama_karyawan' =>  strtoupper($nama),
            'riwayat' => 'Telah di Reject oleh Department Manager',
            'nik' => $karyawan['Employee_ID']
        ];

        $this->riwayatModel->insert($riwayat);

        $reject = [
            'nama_karyawan' => strtoupper($nama),
            'reject_by' => 'Department Manager',
            'reason' => $reject['reason']
        ];

        $this->rejectModel->insert($reject);

        return redirect()->to('/pages/persetujuan');
    }

    public function reject_2($nama)
    {
        $reject = $this->request->getVar();

        $tampung = $this->karyawanModel->getKaryawan($nama);
        $karyawan = $tampung[0];

        $this->approvalModel->rejected_qa_manager($nama);
        $this->karyawanModel->status_rejected($nama);

        $riwayat = [
            'nama_karyawan' =>  strtoupper($nama),
            'riwayat' => 'Telah di Reject oleh QA Manager',
            'nik' => $karyawan['Employee_ID']
        ];

        $this->riwayatModel->insert($riwayat);

        $reject = [
            'nama_karyawan' => strtoupper($nama),
            'reject_by' => 'QA Manager',
            'reason' => $reject['reason']
        ];

        $this->rejectModel->insert($reject);

        return redirect()->to('/pages/persetujuan');
    }

    public function reject_3($nama)
    {
        $reject = $this->request->getVar();

        $tampung = $this->karyawanModel->getKaryawan($nama);
        $karyawan = $tampung[0];

        $this->approvalModel->rejected_hco_manager($nama);
        $this->karyawanModel->status_rejected($nama);

        $riwayat = [
            'nama_karyawan' =>  strtoupper($nama),
            'riwayat' => 'Telah di Reject oleh HCO Manager',
            'nik' => $karyawan['Employee_ID']
        ];

        $this->riwayatModel->insert($riwayat);

        $reject = [
            'nama_karyawan' => strtoupper($nama),
            'reject_by' => 'HCO Manager',
            'reason' => $reject['reason']
        ];

        $this->rejectModel->insert($reject);

        return redirect()->to('/pages/persetujuan');
    }

    public function reject_4($nama)
    {
        $reject = $this->request->getVar();

        $tampung = $this->karyawanModel->getKaryawan($nama);
        $karyawan = $tampung[0];

        $this->approvalModel->rejected_sitegroup_head($nama);
        $this->karyawanModel->status_rejected($nama);

        $riwayat = [
            'nama_karyawan' =>  strtoupper($nama),
            'riwayat' => 'Telah di Reject oleh Site Group Head',
            'nik' => $karyawan['Employee_ID']
        ];

        $this->riwayatModel->insert($riwayat);

        $reject = [
            'nama_karyawan' => strtoupper($nama),
            'reject_by' => 'Site Group Head',
            'reason' => $reject['reason']
        ];

        $this->rejectModel->insert($reject);

        return redirect()->to('/pages/persetujuan');
    }

    public function image_admin()
    {

        // Validation
        $input = $this->validate([
            'file' => 'uploaded[file]|max_size[file,10240]|ext_in[file,jpg,jpeg,docx,pdf,png],'
        ]);

        $data = ['title' => 'image_admin'];

        if (!$input) { // Not valid
            $data['validation'] = $this->validator;
            return view('pages/image_admin', $data);
        } else { // Valid

            if ($file = $this->request->getFile('file')) {
                if ($file->isValid() && !$file->hasMoved()) {
                    // Get file name and extension
                    $name = $file->getName();
                    $ext = $file->getClientExtension();

                    // Get random file name
                    $newName = $file->getRandomName();

                    // Store file in public/uploads/ folder
                    $file->move('../public/assets/images', $newName);



                    // File path to display preview
                    $filepath = base_url() . "/assets/images/" . $newName;

                    if (file_exists($filepath)) {
                        unlink($filepath);
                    }

                    // Set Session
                    session()->setFlashdata('message', 'Uploaded Successfully!');
                    session()->setFlashdata('alert-class', 'alert-success');
                    session()->setFlashdata('filepath', $filepath);
                    session()->setFlashdata('extension', $ext);
                } else {
                    // Set Session
                    session()->setFlashdata('message', 'File not uploaded.');
                    session()->setFlashdata('alert-class', 'alert-danger');
                }
            }
        }
        return view('pages/image_admin', $data);
    }
}
