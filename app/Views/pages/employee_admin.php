<?= $this->extend('layouts/admin'); ?>

<?= $this->section('content'); ?>

<section>
    <div class="title justify-content-center d-flex py-3 mb-5">
        <h1 style="font-weight: 800; color:white; text-shadow: 0px 2.53109px 25.3109px rgba(0, 63, 145, 0.42);">Edit Employee</h1>
    </div>
</section>

<div class="col-6 d-flex " id="class1">
    <div class="dekripsi ms-2">
        <div class="dropdown">
            <button class="dropbtn"><img src="<?= base_url("/assets/download3.png") ?>" style="width:30px; height:30px;"> Export</button>
            <div class="dropdown-content">
                <a class="btn btn-lg" href="/pages/invoice/<?= session()->get('Employee_Name'); ?>" role="button">PDF</a>
                <a class="btn btn-lg" href="<?php echo base_url('Pages/export'); ?>">Excel </a>
            </div>
        </div>
    </div>
</div>

<table class="table table-hover table-striped table-success">
    <thead>
        <tr>
            <th>Nama Karyawan</th>
            <th>Judul Pelatihan</th>
            <th>Penyelenggara</th>
            <th>Notes</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($pelatihan as $row) : ?>
            <tr>
                <td><?= $row->nama_karyawan; ?></td>
                <td><?= $row->nama_pelatihan; ?></td>
                <td><?= $row->penyelenggara; ?></td>
                <td><?= $row->notes; ?></td>
                <td>
                    <a href="#" class="btn btn-info btn-sm btn-edit" data-id="<?= $row->id; ?>" data-notes="<?= $row->notes; ?>">Add Notes</a>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>


<!-- Modal Edit Product-->
<form action="/admin/add" method="post">
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Form Add Notes</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="form-group">
                        <label>Notes</label>
                        <input type="text" class="form-control notes" name="notes" placeholder="Nama Pelatihan">
                    </div>

                </div>
                <div class="modal-footer">
                    <input type="hidden" name="id" class="id">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </div>
        </div>
    </div>
</form>
<!-- End Modal Edit Product-->

<!-- Modal Delete Product-->
<form action="/admin/hapus" method="post">
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete Notes</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <h4>Are you sure want to delete this Note?</h4>

                </div>
                <div class="modal-footer">
                    <input type="hidden" name="id" class="pelatihanID">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                    <button type="submit" class="btn btn-primary">Yes</button>
                </div>
            </div>
        </div>
    </div>
</form>
<!-- End Modal Delete Product-->


<script src="/js/jquery.min.js"></script>
<script src="/js/bootstrap.bundle.min.js"></script>
<script>
    $(document).ready(function() {

        // get Edit Product
        $('.btn-edit').on('click', function() {
            // get data from button edit
            const id = $(this).data('id');
            const notes = $(this).data('notes');
            // Set data to Form Edit
            $('.id').val(id);
            $('.notes').val(notes);
            // Call Modal Edit
            $('#editModal').modal('show');
        });


    });
</script>


<?= $this->endSection(); ?>