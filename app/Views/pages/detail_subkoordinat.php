@@ -0,0 +1,98 @@
<?= $this->extend('layouts/template'); ?>

<?= $this->section('content'); ?>

<section>
    <div class="title justify-content-center d-flex py-3 mb-5">
        <h1 style="font-weight: 800; color:white; text-shadow: 0px 2.53109px 25.3109px rgba(0, 63, 145, 0.42);">Rencana Pelatihan Kalbe Cikarang (RPKC)</h1>
    </div>
</section>

<section>
    <div class="container d-flex flex-row col-11">
        <div class="col-6 d-flex align-items-center justify-content-center">
            <img src="<?= base_url("/assets/depart.png") ?>" alt="" style="height: 70px">
            <div class="dekripsi ms-2" style="color:black;">
                <p class="fw-light" style="margin-bottom: 0px;">Nama / Jabatan</p>
                <p class="fw-bold" style="font-size: 22px; margin-bottom: 0px;"><?= $karyawan['Employee_Name']; ?></p>
                <p class="fw-bold" style="font-size: 22px;"><?= $karyawan['Postition_Name']; ?></p>
            </div>
        </div>
    </div>
</section>

<section style="margin-bottom:70px;">
    <div class="container">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#detailModal">
            Detail Approval
        </button>
        <div class="modal fade" id="detailModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Detail Approval</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <table class="table table-bordered border-dark">
                            <thead>
                                <style>
                                    .coba {
                                        background-color: #32a852 !important;
                                    }
                                </style>
                                <tr>
                                    <th class="coba" scope="col">Dibuat</th>
                                    <th class="coba" scope="col">Direview</th>
                                    <th class="coba" scope="col">Disetujui</th>
                                    <th class="coba" scope="col">Diketahui</th>
                                </tr>
                            </thead>
                            <thead>
                                <tr>
                                    <th scope="col">Dpt. Mgr/Group Mgr</th>
                                    <th scope="col">QA / HCO Mgr</th>
                                    <th scope="col">HCO Mgr.</th>
                                    <th scope="col">Site Head/Group Head </th>
                                </tr>
                            </thead>

                            <tbody>
                                <tr>
                                    <td scope="col"><?= $karyawan['Dept_Manager']; ?></td>
                                    <td scope="col"><?= $karyawan['QA_Manager']; ?></td>
                                    <td scope="col"><?= $karyawan['HCO_Manager']; ?></td>
                                    <td scope="col"><?= $karyawan['SiteGroup_Head']; ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <?php if ($karyawan['status_daftar'] == 'open') : ?>
            <div class="mb-3">
                <a class="ms-auto bg-primary" style="text-decoration: none; color: white; box-shadow: 0px 4px 4px rgb(0 0 0 / 30%); border-radius: 5px; padding: 7px;" href="/pages/registrasi/<?= $karyawan['Employee_Name']; ?>">Daftarkan</a>
            </div>
        <?php endif; ?>
        <table class="table table-bordered border-dark">
            <table class="table table-hover table-bordered border-dark table-striped table-success">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama </th>
                        <th scope="col">Judul Pelatihan</th>
                        <th scope="col">Penyelenggara</th>
                        <th scope="col">Superior</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($pelatihan as $p) : ?>
                        <tr>
                            <td scope="col"><?= $i++; ?></th>
                            <td scope="col"><?= $karyawan['Employee_Name']; ?> </th>
                            <td scope="col"><?= $p['nama_pelatihan']; ?></th>
                            <td scope="col"><?= $p['penyelenggara']; ?></th>
                            <td scope="col"><?= $karyawan['Superior']; ?></th>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
    </div>
</section>


<?= $this->endSection(); ?>