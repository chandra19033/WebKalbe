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

    .dropbtn {
        background-image: linear-gradient(#428042, #3BB73B);
        color: white;
        padding: 5px;
        font-size: 16px;
        border: none;
        border-radius: 10px;
    }

    .dropdown {
        position: relative;
        display: inline-block;

    }

    .dropdown-content {
        display: none;
        position: absolute;
        background-image: linear-gradient(#28ABDA, #5EDFF8);
        min-width: 140px;

        z-index: 1;
    }

    .dropdown-content a {
        color: white;
        padding: 10px 12px;
        text-decoration: none;
        display: block;
        font-size: 16px;
    }

    .dropdown-content a:hover {
        background-color: #ddd;
    }

    .dropdown:hover .dropdown-content {
        display: block;
    }

    .dropdown:hover .dropbtn {
        background-color: #3e8e41;
    }
</style>

<section>
    <div class="title justify-content-center d-flex py-3 mb-5">
        <h1 style="font-weight: 800; color:white; text-shadow: 0px 2.53109px 25.3109px rgba(0, 63, 145, 0.42);">Subordinates List</h1>
    </div>
</section>

<section>
    <div class="d-flex flex-row col-11">
        <div class="col-6 d-flex align-items-center justify-content-center">

        </div>
        <div class="col-6 d-flex align-items-center justify-content-end">
            <div class="dekripsi ms-2">
                <div class="dropdown">
                    <button class="dropbtn"><img src="<?= base_url("/assets/download3.png") ?>" style="width:30px; height:30px;"> Download</button>
                    <div class="dropdown-content">
                        <a class="btn btn-lg" href="/pages/invoice/<?= session()->get('Employee_Name'); ?>" role="button">PDF</a>
                        <a class="btn btn-lg" href="<?php echo base_url('Pages/export'); ?>">Excel </a>
                    </div>
                </div>


            </div>
        </div>
    </div>
</section>

<section>


    <table class="table table-hover table-striped table-success">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Employee ID</th>
                <th scope="col">Employee Name </th>
                <th scope="col">Position</th>
                <th scope="col">Status</th>
                <th scope="col">See Activity</th>
            </tr>
        </thead>

        <tbody>
            <?php $i = 1; ?>
            <?php foreach ($subkoordinat as $s) : ?>
                <tr>
                    <td scope="col"><?= $i++; ?></th>
                    <td scope="col"><?= $s['Employee_ID']; ?></th>
                    <td scope="col"><?= $s['Employee_Name']; ?></th>
                    <td scope="col"><?= $s['Postition_Name']; ?></td>
                    <?php if ($s['status_daftar'] == 'open') : ?>
                        <td scope="col">Not Registered</td>
                    <?php else : ?>
                        <td scope="col">Registered</td>
                    <?php endif; ?>
                    <td scope="col"><a href="/pages/detail_subkoordinat/<?= $s['Employee_Name']; ?>" style="color: black;">See Activity</a></th>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</section>


<?= $this->endSection(); ?>