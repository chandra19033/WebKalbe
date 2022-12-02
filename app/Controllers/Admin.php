<?php

namespace App\Controllers;

use App\Models\ListPelatihanModel;
use App\Models\PelatihanModel;

class Admin extends BaseController
{

    public function save()
    {
        $model = new ListPelatihanModel();
        $data = array(
            'nama_pelatihan'        => $this->request->getPost('nama_pelatihan'),
            'penyelenggara'       => $this->request->getPost('penyelenggara'),
        );
        $model->savePelatihan($data);
        return redirect()->to('/pages/dashboard');
    }

    public function update()
    {
        $model = new ListPelatihanModel();
        $id = $this->request->getPost('id');
        $data = array(
            'nama_pelatihan'        => $this->request->getPost('nama_pelatihan'),
            'penyelenggara'       => $this->request->getPost('penyelenggara'),
        );
        $model->updatePelatihan($data, $id);
        return redirect()->to('/pages/dashboard');
    }

    public function delete()
    {
        $model = new ListPelatihanModel();
        $id = $this->request->getPost('id');
        $model->deletePelatihan($id);
        return redirect()->to('/pages/dashboard');
    }

    public function add()
    {
        $model = new PelatihanModel();
        $id = $this->request->getPost('id');
        $data = array(
            'notes'       => $this->request->getPost('notes'),
        );
        $model->updatePelatihan($data, $id);
        return redirect()->to('/pages/employee_admin');
    }

    public function hapus()
    {
        $model = new PelatihanModel();
        $id = $this->request->getPost('id');
        $model->deletePelatihan($id);
        return redirect()->to('/pages/employee_admin');
    }
}
