<?php

namespace App\Controllers;

use App\Models\ListPelatihanModel;
use App\Models\PelatihanModel;
use App\Models\EventModel;
use App\Models\KaryawanModel;
use TCPDF;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

use App\Libraries\PdfLibrary;

class Export extends BaseController
{

    public function __construct()
    {

        helper('form');
        $this->pelatihanModel = new PelatihanModel();
        $this->karyawanModel = new KaryawanModel();
        $this->eventModel = new EventModel();
        $this->listpelatihanModel = new ListPelatihanModel();
    }

    public function view()
    {

        $model = new PelatihanModel();
        $data = $model->select('*')
            ->first();

        return view('pages/view', [
            'data' => $data,
        ]);
    }

    public function invoice()
    {

        $pelatihanModel = new PelatihanModel();
        $data = $pelatihanModel->findAll();


        $html = view('pages/invoice', [
            'data' => $data,
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
        $spreadsheet->getActiveSheet()->getStyle('A1:G1')->getFont()->setBold(true);

        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'id');
        $sheet->setCellValue('B1', 'NIK');
        $sheet->setCellValue('C1', 'Jabatan');
        $sheet->setCellValue('D1', 'Nama');
        $sheet->setCellValue('E1', 'Judul Pelatihan');
        $sheet->setCellValue('F1', 'Penyelenggara');
        $sheet->setCellValue('G1', 'Notes');
        $count = 2;
        $i = 1;

        foreach ($data as $row) {
            $sheet->setCellValue('A' . $count, $i++);
            $sheet->setCellValue('B' . $count, $row['nik']);
            $sheet->setCellValue('C' . $count, $row['nama_karyawan']);
            $sheet->setCellValue('D' . $count, $row['jabatan']);
            $sheet->setCellValue('E' . $count, $row['nama_pelatihan']);
            $sheet->setCellValue('F' . $count, $row['penyelenggara']);
            $sheet->setCellValue('G' . $count, $row['notes']);
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

    function export2()
    {
        $daftar_pelatihan = new PelatihanModel();
        $data = $daftar_pelatihan->export();
        $file_name = 'RPKC.xlsx';

        $spreadsheet = new Spreadsheet();

        $spreadsheet->getActiveSheet()->getStyle('A1:G1')->getFont()->setBold(true);

        $sheet = $spreadsheet->getActiveSheet();

        $sheet->setCellValue('A1', 'id');
        $sheet->setCellValue('B1', 'NIK');
        $sheet->setCellValue('C1', 'Jabatan');
        $sheet->setCellValue('D1', 'Nama');
        $sheet->setCellValue('E1', 'Judul Pelatihan');
        $sheet->setCellValue('F1', 'Penyelenggara');
        $sheet->setCellValue('G1', 'Notes');
        $count = 2;
        $i = 1;

        foreach ($data as $row) {
            $sheet->setCellValue('A' . $count, $i++);
            $sheet->setCellValue('B' . $count, $row['nik']);
            $sheet->setCellValue('C' . $count, $row['nama_karyawan']);
            $sheet->setCellValue('D' . $count, $row['jabatan']);
            $sheet->setCellValue('E' . $count, $row['nama_pelatihan']);
            $sheet->setCellValue('F' . $count, $row['penyelenggara']);
            $sheet->setCellValue('G' . $count, $row['notes']);
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
