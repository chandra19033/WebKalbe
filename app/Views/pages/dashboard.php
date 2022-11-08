<?= $this->extend('layouts/template'); ?>

<?= $this->section('content'); ?>

<section>
    <div class="title justify-content-center d-flex py-3 mb-5">
        <h1 style="font-weight: 800; color:white; text-shadow: 0px 2.53109px 25.3109px rgba(0, 63, 145, 0.42);">Training</h1>
    </div>
</section>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <button type="button" class="btn btn-success mb-2" data-toggle="modal" data-target="#addModal">Add New</button>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Judul Pelatihan</th>
                    <th>Penyelenggara</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($listpelatihan as $row) : ?>
                    <tr>
                        <td><?= $row->nama_pelatihan; ?></td>
                        <td><?= $row->penyelenggara; ?></td>
                        <td>
                            <a href="#" class="btn btn-info btn-sm btn-edit" data-id="<?= $row->id; ?>" data-nama_pelatihan="<?= $row->nama_pelatihan; ?>" data-penyelenggara="<?= $row->penyelenggara; ?>">Edit</a>
                            <a href="#" class="btn btn-danger btn-sm btn-delete" data-id="<?= $row->id; ?>">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

    </div>

    <!-- Modal Add Product-->
    <form action="/admin/save" method="post">
        <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Form Tambah Data Pelatihan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <div class="form-group">
                            <label>Judul Pelatihan</label>
                            <input type="text" class="form-control" name="nama_pelatihan" placeholder="Judul Pelatihan">
                        </div>

                        <div class="form-group">
                            <label>Penyelenggara</label>
                            <input type="text" class="form-control" name="penyelenggara" placeholder="Penyelenggara">
                        </div>


                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <!-- End Modal Add Product-->

    <!-- Modal Edit Product-->
    <form action="/admin/update" method="post">
        <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Form Edit Data Pelatihan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <div class="form-group">
                            <label>Judul Pelatihan</label>
                            <input type="text" class="form-control nama_pelatihan" name="nama_pelatihan" placeholder="Nama Pelatihan">
                        </div>

                        <div class="form-group">
                            <label>Penyelenggara</label>
                            <input type="text" class="form-control penyelenggara" name="penyelenggara" placeholder="Penyelenggara">
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
    <form action="/admin/delete" method="post">
        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Delete Data Pelatihan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <h4>Are you sure want to delete this Data?</h4>

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
                const nama_pelatihan = $(this).data('nama_pelatihan');
                const penyelenggara = $(this).data('penyelenggara');
                // Set data to Form Edit
                $('.id').val(id);
                $('.nama_pelatihan').val(nama_pelatihan);
                $('.penyelenggara').val(penyelenggara);
                // Call Modal Edit
                $('#editModal').modal('show');
            });

            // get Delete Product
            $('.btn-delete').on('click', function() {
                // get data from button edit
                const id = $(this).data('id');
                // Set data to Form Edit
                $('.pelatihanID').val(id);
                // Call Modal Edit
                $('#deleteModal').modal('show');
            });

        });
    </script>
</body>

<?= $this->endSection(); ?>