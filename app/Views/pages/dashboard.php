<?= $this->extend('layouts/template'); ?>

<?= $this->section('content'); ?>

<style>
    .left-side {
        border-right: 1px solid white;
    }

    .left-side img {
        /* width: 100px; */
        height: 360px;
    }

    .right-side {
        padding: 35px;
    }

    .profile {
        height: 70vh;
        background-image: linear-gradient(#428042, #3BB73B);
    }

    .title {
        background-image: linear-gradient(#28ABDA, #5EDFF8);
    }
</style>

<section>
    <div class="title justify-content-center d-flex py-3 mb-5">
        <h1 style="font-weight: 800; color:white; text-shadow: 0px 2.53109px 25.3109px rgba(0, 63, 145, 0.42);">Training</h1>
    </div>
</section>

<section>
    <div class="d-flex flex-row col-11">
        <div class="col-6 d-flex align-items-center justify-content-center ms-2">
            <div class="dekripsi ms-2" style="height: 55px; color:black;">
                <a class="btn btn-primary btn-lg" href="" role="button">+ Tambah Pelatihan</a>
            </div>
        </div>

    </div>
</section>

<section>
    <style>
        .table {
            text-align: center;
        }

        .table th {
            background-color: #428042;
            color: white;
        }

        .table a {
            /* border: 1px solid black; */
            text-decoration: none;
            color: white;
            box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.3);
            border-radius: 5px;
            padding: 7px;
        }
    </style>

    <div class="container">
        <table class="table table-bordered border-dark">
            <thead>
                <tr>
                    <th scope="col">Judul Pelatihan</th>
                    <th scope="col">Penyelenggara</th>
                    <th scope="col">Action </th>
                </tr>

            </thead>
        </table>
    </div>

    <?= $this->endSection(); ?>