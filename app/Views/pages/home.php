<?= $this->extend('layouts/template'); ?>

<?= $this->section('content'); ?>

<style>
    .home {
        /* The image used */
        background-image: url(/assets/Kalbe.Png);
        /* Full height */
        height: 85vh;

        /* Center and scale the image nicely */
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
        color: white;
    }

    .justify {
        padding: 70px;
        padding-top: 100px;
    }

    .title {
        background-image: linear-gradient(#28ABDA, #5EDFF8);
        height: 300px;
        width: 250px;
    }

    .d-flex {
        gap: 20px;
    }

    .center {
        display: block;
        margin-left: auto;
        margin-right: auto;
        width: 70%;
    }

    .p {
        margin: 10px;
    }

    .card {
        border: 0;
        border-radius: 0;
        color: #fff;
        box-shadow: 5px 5px 10px #e1e1e1;
        padding: 3em 0;
        border-bottom-right-radius: 4em;
        border-top-left-radius: 4em;
        background: linear-gradient(to left, #28ABDA 50%, forestgreen 50%);
        background-size: 200%;
        background-position: right;
        transition: background-position 0.5s ease-out;
    }

    .card-icon {
        margin: 0 1em;
    }

    .card-icon i {
        font-size: 3em;
    }

    .card:hover {
        background-position: left;
    }

    .stretched-link::after {
        position: absolute;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
        z-index: 1;
        pointer-events: auto;
        content: "";
        background-color: rgba(0, 0, 0, 0);
    }
</style>

<section>
    <div class="home">
        <div class="justify align-items-end col-7">
            <h1 style="font-weight: 800;">Rencana Pelatihan Kalbe Cikarang (RPKC)</h1>
            <hr>
            <p style="font-weight: 400;">Pelatihan ini memiliki satu tujuan bagi sebuah perusahaan, yaitu
                meningkatkan performance kerja karyawan sehingga memberikan manfat besar bagi
                perkembangan perusahaan dan pada akhirnya, perusahaan dapat mencapai tujuannya sesuai
                visi dan misi yang dipegangnya serta bersaing dengan kompetitor lain.</p>
            <p class="lead">
                <a class="btn btn-primary btn-lg" href="" role="button">Lihat Pelatihan ></a>
            </p>
        </div>

    </div>
</section>

<?php if (logged_in()) : ?>
    <section class="py-5">

        <div class="card-deck d-flex justify-content-center">
            <div class="card justify-content-center d-flex py-3 bg-dark mb-3" style="max-width: 18rem;">
                <div class="card-icon" style=" color:white;"><i class="bi bi-circle"></i>
                    <div class="card-body">
                        <img src="<?= base_url("assets/daftar_pelatihan.png") ?>" style="height: 160px; width:150px" class="center">
                        <a href="/pages/list_pelatihan" class="stretched-link"> </a>
                    </div>
                </div>
            </div>

            <div class="card justify-content-center d-flex py-3 bg-dark mb-3" style="max-width: 18rem;">
                <div class="card-icon" style=" color:white;"><i class="bi bi-circle"></i>
                    <div class="card-body">
                        <img src="<?= base_url("assets/daftarkan_subkoordinat.png") ?>" style="height: 160px; width:150px" class="center">
                        <a href="/pages/list_pelatihan" class="stretched-link"> </a>
                    </div>
                </div>
            </div>

            <div class="card justify-content-center d-flex py-3 bg-dark mb-3" style="max-width: 18rem;">
                <div class="card-icon" style=" color:white;"><i class="bi bi-circle"></i>
                    <div class="card-body">
                        <img src="<?= base_url("assets/list_subkoordinat.png") ?>" style="height: 160px; width:150px" class="center">
                        <a href="/pages/list_subkoordinat" class="stretched-link"> </a>
                    </div>
                </div>
            </div>

            <div class="card justify-content-center d-flex py-3 bg-dark mb-3" style="max-width: 18rem;">
                <div class="card-icon" style=" color:white;"><i class="bi bi-circle"></i>
                    <div class="card-body">
                        <img src="<?= base_url("assets/approve.png") ?>" style="height: 160px; width:150px" class="center">
                        <a href="/pages/persetujuan" class="stretched-link"> </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- 
    <div class="d-flex justify-content-center">
            <div class="title justify-content-center d-flex py-3 mb-5">
                <div style=" color:white;">
                    <a href="/pages/list_pelatihan"><img src="<?= base_url("assets/daftar_pelatihan.png") ?>" style="height: 180px" class="center"></a>
                    <p style=" font-weight: 800; font-size: 32px; text-align: center;">Daftar Pelatihan</p>
                </div>
            </div>

            <div class="title justify-content-center d-flex py-3 mb-5">
                <div style=" color:white;">
                    <a href="/pages/list_pelatihan"><img src="<?= base_url("assets/daftarkan_subkoordinat.png") ?>" style="height: 180px" class="center"></a>
                    <p style=" font-weight: 800; font-size: 32px; text-align: center;">Daftarkan Sub Koordinat</p>
                </div>
            </div>
            <div class="title justify-content-center d-flex py-3 mb-5">
                <div style=" color:white;">
                    <a href="/pages/list_subkoordinat"><img src="<?= base_url("assets/list_subkoordinat.png") ?>" style="height: 180px" class="center"></a>
                    <p style=" font-weight: 800; font-size: 32px; text-align: center;">List Sub Koordinat</p>
                </div>
            </div>
            <div class="title justify-content-center d-flex py-3 mb-5">
                <div style=" color:white;">
                    <a href="/pages/persetujuan"><img src="<?= base_url("assets/approve.png") ?>" style="height: 180px" class="center"></a>
                    <p style=" font-weight: 800; font-size: 32px; text-align: center;">Approve Pelatihan</p>
                </div>
            </div>
        </div>
           -->
    </section>


<?php endif; ?>
<?= $this->endSection(); ?>