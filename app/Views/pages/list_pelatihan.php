<?= $this->extend('layouts/template'); ?>

<?= $this->section('content'); ?>
<div class="title justify-content-center d-flex py-3">
    <h1>Pelatihan Yang Diambil</h1>
</div>
<section>
    <div class="row justify-content-center padding">
        <div class="col-md-8 ftco-animate fadeInUp ftco-animated">
            <form action="#" class="domain-form" method="get">
                <div class="form-group d-md-flex">
                    <input type="text" class="form-control px-4" name="keyword" placeholder="Cari Judul Pelatihan">
                    <button class="search-domain btn btn-primary px-5" type="submit" name="submit">Cari</button>
                    <!-- <input type="submit" class="search-domain btn btn-primary px-5" value="Cari"> -->
                </div>
            </form>
        </div>
        <!-- <form action="" method="get">
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Cari Judul Pelatihan" name="keyword">
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="submit" name="submit">Cari</button>
                </div>
            </div>
        </form> -->
    </div>

</section>

<section>
    <div class="container">
        <table class="table table-bordered border-dark">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Judul Pelatihan</th>
                    <th scope="col">Penyelenggara</th>
                    <th scope="col">Status</th>
                </tr>
            </thead>
            <?php $i = 1; ?>
            <?php foreach ($listpelatihan as $l) : ?>
                <tr>
                    <td><?= $i++; ?></th>
                    <td><?= $l['nama_pelatihan']; ?></td>
                    <td><?= $l['penyelenggara']; ?></td>
                    <td><a style="color: black!important;" href="/pages/tambah/<?= $l['id']; ?>">Tambah</a></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</section>

<?= $this->endSection(); ?>