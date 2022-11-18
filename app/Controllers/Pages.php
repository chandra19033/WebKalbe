<?php

namespace App\Controllers;

use App\Models\CalendarModel;
use App\Models\ListPelatihanModel;
use App\Models\PelatihanModel;
use App\Models\KaryawanModel;
use App\Models\Model_Auth;
use CodeIgniter\Database\Query;
use TCPDF;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use CodeIgniter\Controller;
use CodeIgniter\HTTP\RequestInterface;

class Pages extends BaseController
{
    protected $pelatihanModel;
    protected $listpelatihanModel;
    protected $karyawanModel;
    protected $calendar;

    public function __construct()
    {

        helper('form');
        $this->Model_Auth = new Model_Auth();
        $this->pelatihanModel = new PelatihanModel();
        $this->karyawanModel = new KaryawanModel();

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
        $pelatihan = $this->pelatihanModel->getPelatihanMandiri();
        $tampung = $this->karyawanModel->getKaryawan(session()->get('Employee_Name'));
        $karyawan = $tampung[0];

        $data = [
            'title' => 'profile',
            'pelatihan' => $pelatihan,
            'karyawan' => $karyawan
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
            if ($trigger == 0) {
                $data = [
                    'nama_karyawan' =>  strtoupper($name),
                    'nama_pelatihan' => $tampung['nama_pelatihan'],
                    'penyelenggara' => $tampung['penyelenggara']
                ];

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
        } elseif ($karyawan['status_daftar'] == 'close') {
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
        } elseif ($karyawan['status_daftar'] == 'close') {
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
                    'required' => 'Harap isi {field} untuk masuk website RPKC'
                ]
            ],
            'Password' => [
                'label' => 'Password',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Harap isi {field} untuk masuk website RPKC !!!'
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
                session()->setFlashdata('pesan', 'Login gagal, harap masukan kembali Email dan Password');
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
        $tampung = $this->karyawanModel->getKaryawan($name);
        $karyawan = $tampung[0];
        // dd($karyawan);

        $data = [
            'title' => 'detail_subkoordinat',
            'karyawan' => $karyawan,
            'pelatihan' => $pelatihan
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


    // public function dashboard()
    // {
    //     $listpelatihanModel = new ListPelatihanModel();

    //     $keyword = $this->request->getVar('keyword');
    //     if ($keyword) {
    //         $listpelatihan = $listpelatihanModel->search($keyword);
    //     } else {
    //         $listpelatihan = $listpelatihanModel->findAll();
    //     }

    //     $data = [
    //         'title' => 'dashboard',

    //     ];

    //     return view('pages/dashboard', $data);
    // }

    public function persetujuan()
    {
        $karyawan = $this->karyawanModel->approval();
        $data = [
            'title' => 'persetujuan',
            'karyawan' => $karyawan
        ];
        return view('pages/persetujuan', $data);
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
        $this->karyawanModel->regis($nama);

        if ($nama == session()->get('Employee_Name')) {
            return redirect()->to('/pages/profile');
        } else {
            return redirect()->to('/pages/detail_subkoordinat/' . $nama);
        }
    }

    public function invoice()
    {
        $id = $this->request->uri->getSegment(3);

        $listPelatihan = new \App\Models\ListPelatihanModel();
        $listPelatihan = $listPelatihan->find($id);

        $html = view('pages/invoice', [
            'listPelatihan' => $listPelatihan,
        ]);

        $pdf = new TCPDF('L', 'mm', array(215.9, 330.2), true, 'UTF-8', false);

        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('Dea Venditama');
        $pdf->SetTitle('RPKC');
        $pdf->SetSubject('RPKC');

        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(false);

        $pdf->addPage();

        // output the HTML content
        $pdf->writeHTML($html, true, false, true, false, '');
        //line ini penting
        $this->response->setContentType('application/pdf');
        //Close and output PDF document
        $pdf->Output('RPKC.pdf', 'I');
    }

    function export()
    {
        $daftar_pelatihan = new PelatihanModel();
        $data = $daftar_pelatihan->findAll();
        $file_name = 'RPKC.xlsx';

        $spreadsheet = new Spreadsheet();

        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'id');
        $sheet->setCellValue('B1', 'nama_karyawan');
        $sheet->setCellValue('C1', 'nama_pelatihan');
        $sheet->setCellValue('D1', 'penyelenggara');
        $count = 4;

        foreach ($data as $row) {
            $sheet->setCellValue('A' . $count, $row['id']);
            $sheet->setCellValue('B' . $count, $row['nama_karyawan']);
            $sheet->setCellValue('C' . $count, $row['nama_pelatihan']);
            $sheet->setCellValue('D' . $count, $row['penyelenggara']);
            $count++;
        }

        $writer = new Xlsx($spreadsheet);

        $writer->save($file_name);

        header("Content-Type: application/vnd.ms-excel");
        header('Content-Disposition: attachment; filename="' . basename($file_name) . '"');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length:' . filesize($file_name));
        flush();
        readfile($file_name);

        exit;
    }
}
