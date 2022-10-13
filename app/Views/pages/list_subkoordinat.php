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
        <h1 style="font-weight: 800; color:white; text-shadow: 0px 2.53109px 25.3109px rgba(0, 63, 145, 0.42);">Subordinates List</h1>
    </div>
</section>

<section>
    <div class="d-flex flex-row col-11">
        <div class="col-6 d-flex align-items-center justify-content-center">
            <img src="<?= base_url("/assets/depart.png") ?>" alt="" style="height: 70px">
            <div class="dekripsi ms-2" style="height: 55px; color:black;">
                <p class="fw-light" style="margin-bottom: 0px;">Departemen / Sub Dept</p>
                <p class="fw-bold" style="font-size: 22px;">HCO / 1</p>
            </div>
        </div>
        <div class="col-6 d-flex align-items-center justify-content-end">
            <div class="dekripsi ms-2" style="height: 55px; color:black;">
                <a class="btn btn-primary btn-lg" href="" role="button">Generate PDF ></a>
            </div>
        </div>
    </div>
</section>

<section>


    <div class="container">
        <table class="table table-hover table-bordered border-dark table-striped table-success">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Employee ID</th>
                    <th scope="col">Nama </th>
                    <th scope="col">Jabatan</th>
                    <!-- <th scope="col">Dept. Mgr / Group Mgr</th>
                    <th scope="col">QA / HCO</th>
                    <th scope="col">Site Head / Group Head</th>
                    <th scope="col">HCO</th> -->
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
                        <!-- <td scope="col"></th>
                        <td scope="col">QA / HCO</th>
                        <td scope="col">Site Head / Group Head</th>
                        <td scope="col">HCO</th> -->
                        <td scope="col"><a href="/pages/detail_subkoordinat/<?= $s['Employee_Name']; ?>" style="color: black;">See Activity</a></th>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</section>


<?= $this->endSection(); ?>