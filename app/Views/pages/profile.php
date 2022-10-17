<?= $this->extend('layouts/template'); ?>

<?= $this->section('content'); ?>
<section id="profile">
    <div class="row profile">
        <div class="left-side col-4 d-flex align-items-center justify-content-center">
            <img src="<?= base_url("assets/profile.png") ?>" style="height: 280px;" alt="">
        </div>
        <div class="row right-side col-8">
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
                    <p class="fw-light" style="margin-bottom: 0px;">Jabatan</p>
                    <p class="fw-bold" style="font-size: 22px;"><?= session()->get('Postition_Name') ?></p>
                </div>
            </div>
            <div class="col-6 d-flex align-items-center">
                <img src="<?= base_url("assets/nik.png") ?>" alt="" style="height: 70px">
                <div class="dekripsi ms-2" style="height: 55px; color:white;">
                    <p class="fw-light" style="margin-bottom: 0px;">Departemen / Sub Dept</p>
                    <p class="fw-bold" style="font-size: 22px;"><?= session()->get('Organization_Name') ?></p>
                </div>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="title justify-content-center d-flex py-3 mb-5">
        <h1>Pelatihan Yang Diambil</h1>
    </div>

    <div class="container">
        <div class="mb-3">
            <a class="ms-auto bg-primary" style="text-decoration: none; color: white; box-shadow: 0px 4px 4px rgb(0 0 0 / 30%); border-radius: 5px; padding: 7px;" href="/pages/registrasi/<?= session()->get('Employee_Name') ?>">Daftarkan</a>
        </div>
        <table class="table table-bordered border-dark">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Karyawan</th>
                    <th scope="col">Nama Pelatihan</th>
                    <th scope="col">Penyelenggara</th>
                    <th scope="col">Status</th>
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
                        <?php if ($karyawan['status_daftar'] == 'open') : ?>
                            <td><a class="bg-primary" href="">Belum Terdaftar</a></td>
                        <?php elseif ($karyawan['status_daftar'] == 'close') : ?>
                            <td><a class="bg-primary" href="">Terdaftar</a></td>
                        <?php endif; ?>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</section>
<?= $this->endSection(); ?>