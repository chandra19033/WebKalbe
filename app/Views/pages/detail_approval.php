@@ -0,0 +1,98 @@
<?= $this->extend('layouts/template'); ?>

<?= $this->section('content'); ?>

<section>
    <div class="title justify-content-center d-flex py-3 mb-5">
        <h1 style="font-weight: 800; color:white; text-shadow: 0px 2.53109px 25.3109px rgba(0, 63, 145, 0.42);">Rencana Pelatihan Kalbe Cikarang (RPKC)</h1>
    </div>
</section>

<section>
    <div class="container d-flex flex-row col-11">
        <div class="col-6 d-flex align-items-center justify-content-center">
            <img src="<?= base_url("/assets/depart.png") ?>" alt="" style="height: 70px">
            <div class="dekripsi ms-2" style="color:black;">
                <p class="fw-light" style="margin-bottom: 0px;">Nama / Jabatan</p>
                <p class="fw-bold" style="font-size: 22px; margin-bottom: 0px;"><?= $karyawan['Employee_Name']; ?></p>
                <p class="fw-bold" style="font-size: 22px;"><?= $karyawan['Postition_Name']; ?></p>
            </div>
        </div>
    </div>
</section>

<section style="margin-bottom:70px;">
    <div class="container">
        <button type="button" class="btn btn-success mb-3" data-toggle="modal" data-target="#approveModal">
            Approve
        </button>
        <div class="modal fade" id="approveModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Approve</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Yakin ingin melakukan Approve pada karyawan?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <a type="button" class="btn btn-success" data-dismiss="modal">Approve</a>
                    </div>
                </div>
            </div>
        </div>
        <button type="button" class="btn btn-danger mb-3" data-toggle="modal" data-target="#rejectModal">
            Reject
        </button>
        <div class="modal fade" id="rejectModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Approve</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Yakin ingin melakukan Reject pada karyawan?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <a type="button" class="btn btn-danger" data-dismiss="modal">Approve</a>
                    </div>
                </div>
            </div>
        </div>
        <table class="table table-bordered border-dark">
            <table class="table table-hover table-bordered border-dark table-striped table-success">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama </th>
                        <th scope="col">Judul Pelatihan</th>
                        <th scope="col">Penyelenggara</th>
                        <th scope="col">Superior</th>
                        <?php if ($karyawan['status_daftar'] == 'open') : ?>
                            <th scope="col"></th>
                        <?php endif; ?>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($pelatihan as $p) : ?>
                        <tr>
                            <td scope="col"><?= $i++; ?></th>
                            <td scope="col"><?= $karyawan['Employee_Name']; ?> </th>
                            <td scope="col"><?= $p['nama_pelatihan']; ?></th>
                            <td scope="col"><?= $p['penyelenggara']; ?></th>
                            <td scope="col"><?= $karyawan['Superior']; ?></th>
                                <?php if ($karyawan['status_daftar'] == 'open') : ?>
                            <td scope="col"><button style="border-radius: 5px;" type="button" class="btn-danger" data-toggle="modal" data-target="#hapusPelatihan">
                                    Hapus
                                </button></th>
                                <div class="modal fade" id="hapusPelatihan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Hapus Pelatihan</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body" style="color: black;">
                                                Menghapus pelatihan <?= $p['nama_pelatihan']; ?>, Apakah anda yakin?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <a type="button" class="btn btn-danger" href="/pages/hapus_pelatihan/<?= $karyawan['Employee_Name']; ?>/<?= $p['id']; ?>">Delete</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
    </div>
</section>


<?= $this->endSection(); ?>