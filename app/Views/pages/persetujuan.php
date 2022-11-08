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
        <h1 style="font-weight: 800; color:white; text-shadow: 0px 2.53109px 25.3109px rgba(0, 63, 145, 0.42);">Rencana Pelatihan Kalbe Cikarang (RPKC)</h1>
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
                    <th scope="col">No</th>
                    <th scope="col">NIK</th>
                    <th scope="col">Nama </th>
                    <th scope="col">Jabatan </th>
                    <th scope="col">Status Approval </th>
                    <th scope="col">See Activity </th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach ($karyawan as $k) : ?>
                    <tr>
                        <td scope="col"><?= $i++; ?></th>
                        <td scope="col"><?= $k['Employee_ID']; ?></th>
                        <td scope="col"><?= $k['Employee_Name']; ?></th>
                        <td scope="col"><?= $k['Postition_Name']; ?></td>
                        <?php if ($k['status_daftar'] == 'open') : ?>
                            <td scope="col">Belum Daftar</td>
                        <?php elseif ($k['status_daftar'] == 'close') : ?>
                            <td scope="col">Terdaftar</td>
                        <?php endif; ?>
                        <td scope="col"><a href="/pages/detail_subkoordinat/<?= $k['Employee_Name']; ?>" style="color: black;">See Activity</a></th>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <?= $this->endSection(); ?>