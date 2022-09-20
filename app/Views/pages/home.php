<?= $this->extend('layouts/template'); ?>

<?= $this->section('content'); ?>
<style>
    .home {
        /* The image used */
        background-image: url("assets/Kalbe.Png");
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

<section class="py-5">
    <div class="d-flex justify-content-center">
        <div class="title justify-content-center d-flex py-3 mb-5">
            <div style=" color:white;">
                <img src="<?= base_url("assets/daftar_pelatihan.png") ?>" style="height: 180px" class="center">
                <p style=" font-weight: 800; font-size: 32px; text-align: center;">Daftar Pelatihan</p>
            </div>
        </div>

        <div class="title justify-content-center d-flex py-3 mb-5">
            <div style=" color:white;">
                <img src="<?= base_url("assets/daftarkan_subkoordinat.png") ?>" style="height: 180px" class="center">
                <p style=" font-weight: 800; font-size: 32px; text-align: center;">Daftarkan Sub Koordinat</p>
            </div>
        </div>
        <div class="title justify-content-center d-flex py-3 mb-5">
            <div style=" color:white;">
                <img src="<?= base_url("assets/list_subkoordinat.png") ?>" style="height: 180px" class="center">
                <p style=" font-weight: 800; font-size: 32px; text-align: center;">List Sub Koordinat</p>
            </div>
        </div>
        <div class="title justify-content-center d-flex py-3 mb-5">
            <div style=" color:white;">
                <img src="<?= base_url("assets/approve.png") ?>" style="height: 180px" class="center">
                <p style=" font-weight: 800; font-size: 32px; text-align: center;">Approve Pelatihan</p>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection(); ?>