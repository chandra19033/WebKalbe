<?= $this->extend('layouts/template'); ?>

<?= $this->section('content'); ?>
<div class="title justify-content-center d-flex py-3">
    <h1>Training List For "<?= $nama; ?>"</h1>
</div>
<section>
    <?php if (session()->getFlashdata('pesan')) : ?>
        <?php $tampung = session()->getFlashdata('pesan'); ?>
        <?php if ($tampung['value'] == 1) : ?>
            <div class="alert alert-success" role="alert">
                <?= $tampung['pesan']; ?>
            </div>
        <?php elseif ($tampung['value'] == 0) : ?>
            <div class="alert alert-danger" role="alert">
                <?= $tampung['pesan']; ?>
            </div>
        <?php endif; ?>
    <?php endif; ?>

    <div class="row justify-content-center padding">
        <div class="col-md-8 ftco-animate fadeInUp ftco-animated">

            <form action="/pages/list_pelatihan/<?= $nama; ?>" class="domain-form" method="get">
                <div class="form-group d-md-flex">
                    <input type="text" class="form-control px-4" name="keyword" placeholder="Search for Training Title">
                    <button class="search-domain btn btn-primary px-5" type="submit" name="submit">Search</button>
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
        <div class="mb-3">
            <!-- Button trigger modal -->
            <button type="button" id="button1" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                External Training
            </button>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">External Training</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="/pages/tambah_mandiri/<?= $nama; ?>" method="GET">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Training Title</label>
                                    <input type="text" class="form-control" name="namapelatihan" id="namapelatihanluar">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="exampleInputPassword1">Organizer</label>
                                    <input type="text" class="form-control" name="penyelenggara" id="penyelenggaraluar">
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                        <!-- <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary">Save changes</button>
                                </div> -->
                    </div>
                </div>
            </div>
        </div>
        <table class="table table-hover table-striped table-success ">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Training Title</th>
                    <th scope="col">Organizer</th>
                    <th scope="col">Status</th>
                </tr>
            </thead>

            <tbody>
                <?php $i = 1; ?>
                <?php foreach ($listpelatihan as $l) : ?>
                    <tr>
                        <td><?= $i++; ?></th>
                        <td><?= $l['nama_pelatihan']; ?></td>
                        <td><?= $l['penyelenggara']; ?></td>
                        <td><a style="color: white!important;" class="btn btn-success " href="/pages/tambah/<?= $nama; ?>/<?= $l['id']; ?>">Add</a></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Pelatihan dari Luar</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/pages/tambah_mandiri/<?= $nama; ?>" method="GET">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Training Title</label>
                            <input type="text" class="form-control" name="namapelatihan" id="namapelatihanluar">
                        </div>
                        <div class="form-group mb-3">
                            <label for="exampleInputPassword1">Organizer</label>
                            <input type="text" class="form-control" name="penyelenggara" id="penyelenggaraluar">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>




            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">External Training</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="/pages/tambah_mandiri/<?= $nama; ?>" method="GET">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Training Title</label>
                                    <input type="text" class="form-control" name="namapelatihan" id="namapelatihanluar">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="exampleInputPassword1">Organizer</label>
                                    <input type="text" class="form-control" name="penyelenggara" id="penyelenggaraluar">
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                        <!-- <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div> -->

                    </div>
                </div>
            </div>
        </div>
    </div>

</section>

<?= $this->endSection(); ?>