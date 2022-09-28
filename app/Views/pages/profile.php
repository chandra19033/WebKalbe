<?= $this->extend('layouts/template'); ?>

<?= $this->section('content'); ?>
<section id="profile">
    <div class="row profile">
        <div class="left-side col-4 d-flex align-items-center justify-content-center">
            <img src="<?= base_url("assets/profile.png") ?>" alt="">
        </div>
        <div class="row right-side col-8">
            <div class="nama-email text-center" style="height: 0%; color:white">
                <h2 style="font-weight: 800;">Ari Gunawan Gunaidi</h2>
                <h5 style="font-weight: 400;">Contoh22@gmail.com</h5>
            </div>
            <div class="col-6 d-flex align-items-center">
                <img src="<?= base_url("assets/nik.png") ?>" alt="" style="height: 70px">
                <div class="dekripsi ms-2" style="height: 55px; color:white;">
                    <p class="fw-light" style="margin-bottom: 0px;">NIK</p>
                    <p class="fw-bold" style="font-size: 22px;">24182471847108</p>
                </div>
            </div>

            <div class="col-6 d-flex align-items-center">
                <img src="<?= base_url("assets/nik.png") ?>" alt="" style="height: 70px">
                <div class="dekripsi ms-2" style="height: 55px; color:white;">
                    <p class="fw-light" style="margin-bottom: 0px;">Jabatan</p>
                    <p class="fw-bold" style="font-size: 22px;">Learning and Development Manager</p>
                </div>
            </div>
            <div class="col-6 d-flex align-items-center">
                <img src="<?= base_url("assets/nik.png") ?>" alt="" style="height: 70px">
                <div class="dekripsi ms-2" style="height: 55px; color:white;">
                    <p class="fw-light" style="margin-bottom: 0px;">Departemen / Sub Dept</p>
                    <p class="fw-bold" style="font-size: 22px;">HCO / 5</p>
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
                        <td><a class="bg-primary" href="">Terdaftar</a></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</section>
<?= $this->endSection(); ?>