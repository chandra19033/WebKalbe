<?= $this->extend('layouts/admin') ?>
<?= $this->section('content') ?>

<section>
    <div class="title justify-content-center d-flex py-3 mb-5">
        <h1 style="font-weight: 800; color:white; text-shadow: 0px 2.53109px 25.3109px rgba(0, 63, 145, 0.42);">Events</h1>
    </div>
</section>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
</head>

<body>

    <button type="button" id="button1" class="btn btn-success mb-2" data-toggle="modal" data-target="#addModal">Add Event</button>
    <div class="container">
        <table class="table table-hover table-striped table-success">
            <thead>
                <tr>
                    <th>Event Title</th>
                    <th>Description</th>
                    <th>Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($eventmodel as $row) : ?>
                    <tr>
                        <td><?= $row->Event_Title; ?></td>
                        <td><?= $row->Description; ?></td>
                        <td><?= $row->Date; ?></td>
                        <td>
                            <a href="#" class="btn btn-info btn-sm btn-edit" data-id="<?= $row->id; ?>" data-Event_Title="<?= $row->Event_Title; ?>" data-Description="<?= $row->Description; ?>" data-Date="<?= $row->Date; ?>">Edit</a>
                            <a href="#" class="btn btn-danger btn-sm btn-delete" data-id="<?= $row->id; ?>">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <!-- Modal Add Product-->
    <form action="/admin/save_event" method="post">
        <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Event Data Form</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <div class="form-group">
                            <label>Event Title</label>
                            <input type="text" class="form-control" name="Event_Title" placeholder="Add Event Title">
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <input type="text" class="form-control" name="Description" placeholder="Add Description">
                        </div>
                        <div class="form-group">
                            <label>Date</label>
                            <input type="text" class="form-control" name="Date" placeholder="Add Date">
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
    <form action="/admin/update_event" method="post">
        <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Event Data Edit Form</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <div class="form-group">
                            <label>Event Title</label>
                            <input type="text" class="form-control Event_Title" name="Event_Title" placeholder="Add Event Title">
                        </div>

                        <div class="form-group">
                            <label>Description</label>
                            <input type="text" class="form-control Description" name="Description" placeholder="Add Description">
                        </div>

                        <div class="form-group">
                            <label>Date</label>
                            <input type="text" class="form-control Date" name="Date" placeholder="Add Date">
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
    <form action="/admin/delete_event" method="post">
        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Delete Data</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <h4>Are you sure want to delete this Event?</h4>

                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="id" class="eventID">
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
                const Event_Title = $(this).data('Event_Title');
                const Description = $(this).data('Description');
                const Date = $(this).data('Date');
                // Set data to Form Edit
                $('.id').val(id);
                $('.Event_Title').val(Event_Title);
                $('.Description').val(Description);
                $('.Date').val(Date);
                // Call Modal Edit
                $('#editModal').modal('show');
            });

            // get Delete Product
            $('.btn-delete').on('click', function() {
                // get data from button edit
                const id = $(this).data('id');
                // Set data to Form Edit
                $('.eventID').val(id);
                // Call Modal Edit
                $('#deleteModal').modal('show');
            });

        });
    </script>

</body>

<?= $this->endSection() ?>