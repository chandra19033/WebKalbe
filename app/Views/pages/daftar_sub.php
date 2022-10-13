<?= $this->extend('layouts/template'); ?>

<?= $this->section('content'); ?>

<section>
    <div class="title justify-content-center d-flex py-3 mb-5">
        <h1 style="font-weight: 800; color:white; text-shadow: 0px 2.53109px 25.3109px rgba(0, 63, 145, 0.42);">Subordinates List</h1>
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
                    <th scope="col">Position</th>
                    <th scope="col">Daftar Pelatihan</th>
                </tr>
            </thead>

            <?php $i = 1; ?>
            <?php foreach ($subkoordinat as $s) : ?>
                <tr>
                    <td scope="col"><?= $i++; ?></th>
                    <td scope="col"><?= $s['Employee_ID']; ?></th>
                    <td scope="col"><?= $s['Employee_Name']; ?></th>
                    <td scope="col"><?= $s['Postition_Name']; ?></th>
                    <td scope="col"><a href="/pages/list_pelatihan/<?= $s['Employee_Name']; ?>" style="color: black;">Daftar</a></th>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</section>


<?= $this->endSection(); ?>