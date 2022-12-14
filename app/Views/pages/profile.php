<?= $this->extend('layouts/template'); ?>

<?= $this->section('content'); ?>
<section id="profile">
    <div class="row profile">
        <div class="left-side col-3 d-flex align-items-center justify-content-center">
            <img src="<?= base_url("assets/profile.png") ?>" style="height: 200px;" alt="">
        </div>
        <div class="row right-side col-9">
            <div class="nama-email text-center" style="height: 0% ; color:white">
                <h2 style="font-weight: 800;"><?= session()->get('Employee_Name') ?></h2>
                <h5 style="font-weight: 400;"><?= session()->get('Email') ?></h5>
            </div>
            <div class="col-6 d-flex align-items-center">
                <img src="<?= base_url("assets/nik.png") ?>" alt="" style="height: 70px">
                <div class="dekripsi ms-2" style="height: 55px; color:white;">
                    <p class="fw-light" style="margin-bottom: 0px;">NIK</p>
                    <p class="fw-bold" style="font-size: 22px;"><?= session()->get('Employee_ID') ?></p>
                </div>
            </div>

            <div class="col-6 d-flex align-items-center">
                <img src="<?= base_url("assets/nik.png") ?>" alt="" style="height: 70px">
                <div class="dekripsi ms-2" style="height: 55px; color:white;">
                    <p class="fw-light" style="margin-bottom: 0px;">Position</p>
                    <p class="fw-bold" style="font-size: 22px;"><?= session()->get('Postition_Name') ?></p>
                </div>
            </div>
            <div class="col-6 d-flex align-items-center">
                <img src="<?= base_url("assets/nik.png") ?>" alt="" style="height: 70px">
                <div class="dekripsi ms-2" style="height: 55px; color:white;">
                    <p class="fw-light" style="margin-bottom: 0px;">Department / Sub Dept</p>
                    <p class="fw-bold" style="font-size: 22px;"><?= session()->get('Organization_Name') ?></p>
                </div>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="title justify-content-center d-flex py-3 mb-5">
        <h1>Taken Training List</h1>
    </div>

    <div class="container">
        <?php if (session()->get('status_daftar') == 'open' || session()->get('status_daftar') == '0') : ?>
            <div class="mb-3">
                <a class="ms-auto bg-primary" style="text-decoration: none; color: white; box-shadow: 0px 4px 4px rgb(0 0 0 / 30%); border-radius: 5px; padding: 7px;" href="/pages/registrasi/<?= session()->get('Employee_Name') ?>">Register All Training</a>
            </div>
        <?php endif; ?>
        <button type="button" class="btn btn-primary mb-4" data-toggle="modal" data-target="#detailModal">
            History
        </button>
        <div class="modal fade" id="detailModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document" style="max-width: 900px;">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">History</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" style="max-height: 450px; overflow-y: scroll;">
                        <table class="table table-hover table-striped table-success">
                            <thead>
                                <style>
                                    .coba {
                                        background-color: #32a852 !important;
                                    }
                                </style>
                                <tr>
                                    <th class="coba" scope="col">No.</th>
                                    <th class="coba" scope="col">NIK</th>
                                    <th class="coba" scope="col">Employee Name</th>
                                    <th class="coba" scope="col">History</th>
                                    <th class="coba" scope="col">Date/Time</th>
                                </tr>
                            </thead>

                            <tbody>
                                <style>
                                    .left-table {
                                        text-align: left;
                                    }
                                </style>
                                <style>
                                </style>
                                <?php $i = 1; ?>
                                <?php foreach ($riwayat as $r) : ?>
                                    <tr>
                                        <td class="left-table" scope="col"><?= $i++; ?></td>
                                        <td class="left-table" scope="col"><?= $r['NIK']; ?></td>
                                        <td class="left-table" scope="col"><?= $r['nama_karyawan']; ?></td>
                                        <td class="left-table" scope="col"><?= $r['riwayat']; ?></td>
                                        <td class="left-table" scope="col"><?= $r['created_at']; ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <?php if (session()->get('status_daftar') == '0') : ?>
            <button type="button" class="btn btn-danger mb-4" data-toggle="modal" data-target="#rejectModal">
                Alasan di-Reject
            </button>
            <div class="modal fade" id="rejectModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document" style="max-width: 900px;">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Alasan Reject</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body" style="max-height: 450px; overflow-y: scroll;">
                            <table class="table table-bordered border-dark">
                                <thead>
                                    <style>
                                        .coba {
                                            background-color: #32a852 !important;
                                        }
                                    </style>
                                    <tr>
                                        <th class="coba" scope="col">No.</th>
                                        <th class="coba" scope="col">Employee Name</th>
                                        <th class="coba" scope="col">Rejected By</th>
                                        <th class="coba" scope="col">Reason</th>
                                        <th class="coba" scope="col">Date/Time</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <style>
                                        .left-table {
                                            text-align: left;
                                        }
                                    </style>
                                    <style>
                                    </style>
                                    <?php $i = 1; ?>
                                    <?php foreach ($reject as $rj) : ?>
                                        <tr>
                                            <td class="left-table" scope="col"><?= $i++; ?></td>
                                            <td class="left-table" scope="col"><?= $rj['nama_karyawan']; ?></td>
                                            <td class="left-table" scope="col"><?= $rj['reject_by']; ?></td>
                                            <td class="left-table" scope="col"><?= $rj['reason']; ?></td>
                                            <td class="left-table" scope="col"><?= $rj['created_at']; ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        <table class="table table-hover table-striped table-success">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Employee Name</th>
                    <th scope="col">Training Title</th>
                    <th scope="col">Organizer</th>
                    <th scope="col">Status</th>
                    <?php if ($karyawan['status_daftar'] == 'open' || $karyawan['status_daftar'] == '0') : ?>
                        <th scope="col"></th>
                    <?php endif; ?>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach ($pelatihan as $p) : ?>
                    <tr>
                        <td><?= $i++; ?></th>
                        <td><?= $p['nama_karyawan']; ?></td>
                        <td><?= $p['nama_pelatihan']; ?></td>
                        <td><?= $p['penyelenggara']; ?></td>
                        <?php if ($karyawan['status_daftar'] == 'open' || $karyawan['status_daftar'] == '0') : ?>
                            <td><a class="bg-primary" href="">Belum Terdaftar</a></td>
                        <?php elseif ($karyawan['status_daftar'] == 'close') : ?>
                            <td><a class="bg-primary" href="">Terdaftar</a></td>
                        <?php endif; ?>
                        <?php if ($karyawan['status_daftar'] == 'open' || $karyawan['status_daftar'] == '0') : ?>
                            <td scope="col"><button style="border-radius: 5px;" type="button" class="btn-danger" data-toggle="modal" data-target="#hapusPelatihan">
                                    Delete
                                </button></th>
                                <div class="modal fade" id="hapusPelatihan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Delete Training</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body" style="color: black;">
                                                Removing <?= $p['nama_pelatihan']; ?> Training, Are you sure?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <a type="button" class="btn btn-danger" href="/pages/hapus_pelatihan/<?= session()->get('Employee_Name'); ?>/<?= $p['id']; ?>">Delete</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php elseif ($karyawan['status_daftar'] == 'Approved') : ?>
                            <td><?= $karyawan['status_daftar']; ?></td>
                        <?php else : ?>
                            <td>On Progress</td>
                        <?php endif; ?>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</section>
<?= $this->endSection(); ?>