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

<!-- <section>
    <div class="title justify-content-center d-flex py-3 mb-5">
        <h1 style="font-weight: 800; color:white; text-shadow: 0px 2.53109px 25.3109px rgba(0, 63, 145, 0.42);">Approval List</h1>
    </div>
</section> -->


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


    <?php if ($dept_manager != NULL) : ?>
        <div class="title justify-content-center d-flex py-3 mb-5">
            <h1 style="font-weight: 800; color:white; text-shadow: 0px 2.53109px 25.3109px rgba(0, 63, 145, 0.42);">Approval as Department Manager</h1>
        </div>
        <table class="table table-hover table-striped table-success">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">NIK</th>
                    <th scope="col">Employee Name </th>
                    <th scope="col">Position </th>
                    <th scope="col">Approval Status </th>
                    <th scope="col">Action </th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach ($dept_manager as $d) : ?>
                    <tr>
                        <td scope="col"><?= $i++; ?></th>
                        <td scope="col"><?= $d['Employee_ID']; ?></th>
                        <td scope="col"><?= $d['Employee_Name']; ?></th>
                        <td scope="col"><?= $d['Postition_Name']; ?></td>
                        <?php if ($d['status_daftar'] == 'open') : ?>
                            <td scope="col">On Progresss</td>
                            <td scope="col">-</td>
                        <?php elseif ($d['status_daftar'] == '0') : ?>
                            <td scope="col">Rejected</td>
                            <td scope="col">-</td>
                        <?php elseif ($d['status_daftar'] == '1') : ?>
                            <td scope="col">Need Approve</td>
                            <td scope="col"><a href="/pages/detail_approval/<?= $d['Employee_Name']; ?>" style="color: black;">See Activity</a>
                                <a href="/pages/approve_1/<?= $d['Employee_Name']; ?>" style="color: white; background-color:#3BB73B;">Approve</a>
                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">
                                    Reject
                                </button>
                                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Reject</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="/pages/reject_1/<?= $d['Employee_Name']; ?>" method="GET">
                                                    <div class="form-group mb-3">
                                                        <label for="exampleInputPassword1">Alasan Reject</label>
                                                        <input type="text" class="form-control" name="reason" id="reason">
                                                    </div>
                                                    <button type="submit" class="btn btn-danger">Reject</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php elseif ($d['status_daftar'] != '1') : ?>
                            <td scope="col">Approved</td>
                            <td scope="col">-</td>
                        <?php endif; ?>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
    <?php if ($qa_manager != NULL) : ?>
        <div class="title justify-content-center d-flex py-3 mb-5">
            <h1 style="font-weight: 800; color:white; text-shadow: 0px 2.53109px 25.3109px rgba(0, 63, 145, 0.42);">Approval as QA Manager</h1>
        </div>
        <table class="table table-hover table-striped table-success">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">NIK</th>
                    <th scope="col">Nama </th>
                    <th scope="col">Jabatan </th>
                    <th scope="col">Status Approval </th>
                    <th scope="col">Action </th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach ($qa_manager as $q) : ?>
                    <tr>
                        <td scope="col"><?= $i++; ?></th>
                        <td scope="col"><?= $q['Employee_ID']; ?></th>
                        <td scope="col"><?= $q['Employee_Name']; ?></th>
                        <td scope="col"><?= $q['Postition_Name']; ?></td>
                        <?php if ($q['status_daftar'] == 'open' || $q['status_daftar'] == '1') : ?>
                            <td scope="col">On Progresss</td>
                            <td scope="col">-</td>
                        <?php elseif ($q['status_daftar'] == '0') : ?>
                            <td scope="col">Rejected</td>
                            <td scope="col">-</td>
                        <?php elseif ($q['status_daftar'] == '2') : ?>
                            <td scope="col">Need Approve</td>
                            <td scope="col"><a href="/pages/detail_approval/<?= $q['Employee_Name']; ?>" style="color: black;">See Activity</a>
                                <a href="/pages/approve_2/<?= $q['Employee_Name']; ?>" style="color: white; background-color:#3BB73B;">Approve</a>
                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">
                                    Reject
                                </button>
                                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Reject</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="/pages/reject_2/<?= $q['Employee_Name']; ?>" method="GET">
                                                    <div class="form-group mb-3">
                                                        <label for="exampleInputPassword1">Alasan Reject</label>
                                                        <input type="text" class="form-control" name="reason" id="reason">
                                                    </div>
                                                    <button type="submit" class="btn btn-danger">Reject</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php elseif ($q['status_daftar'] != '2') : ?>
                            <td scope="col">Approved</td>
                            <td scope="col">-</td>
                        <?php endif; ?>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
    <?php if ($hco_manager != NULL) : ?>
        <div class="title justify-content-center d-flex py-3 mb-5">
            <h1 style="font-weight: 800; color:white; text-shadow: 0px 2.53109px 25.3109px rgba(0, 63, 145, 0.42);">Approval as HCO Manager</h1>
        </div>
        <table class="table table-hover table-striped table-success">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">NIK</th>
                    <th scope="col">Nama </th>
                    <th scope="col">Jabatan </th>
                    <th scope="col">Status Approval </th>
                    <th scope="col">Action </th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach ($hco_manager as $h) : ?>
                    <tr>
                        <td scope="col"><?= $i++; ?></th>
                        <td scope="col"><?= $h['Employee_ID']; ?></th>
                        <td scope="col"><?= $h['Employee_Name']; ?></th>
                        <td scope="col"><?= $h['Postition_Name']; ?></td>
                        <?php if ($h['status_daftar'] == 'open' || $h['status_daftar'] == '1' || $h['status_daftar'] == '2') : ?>
                            <td scope="col">On Progresss</td>
                            <td scope="col">-</td>
                        <?php elseif ($h['status_daftar'] == '0') : ?>
                            <td scope="col">Rejected</td>
                            <td scope="col">-</td>
                        <?php elseif ($h['status_daftar'] == '3') : ?>
                            <td scope="col">Need Approve</td>
                            <td scope="col"><a href="/pages/detail_approval/<?= $h['Employee_Name']; ?>" style="color: black;">See Activity</a>
                                <a href="/pages/approve_3/<?= $h['Employee_Name']; ?>" style="color: white; background-color:#3BB73B;">Approve</a>
                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">
                                    Reject
                                </button>
                                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Reject</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="/pages/reject_3/<?= $h['Employee_Name']; ?>" method="GET">
                                                    <div class="form-group mb-3">
                                                        <label for="exampleInputPassword1">Alasan Reject</label>
                                                        <input type="text" class="form-control" name="reason" id="reason">
                                                    </div>
                                                    <button type="submit" class="btn btn-danger">Reject</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php elseif ($h['status_daftar'] != '3') : ?>
                            <td scope="col">Approved</td>
                            <td scope="col">-</td>
                        <?php endif; ?>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
    <?php if ($sitegroup_head != NULL) : ?>
        <div class="title justify-content-center d-flex py-3 mb-5">
            <h1 style="font-weight: 800; color:white; text-shadow: 0px 2.53109px 25.3109px rgba(0, 63, 145, 0.42);">Approval as Site Group Head</h1>
        </div>
        <table class="table table-hover table-striped table-success">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">NIK</th>
                    <th scope="col">Nama </th>
                    <th scope="col">Jabatan </th>
                    <th scope="col">Status Approval </th>
                    <th scope="col">Action </th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach ($sitegroup_head as $s) : ?>
                    <tr>
                        <td scope="col"><?= $i++; ?></th>
                        <td scope="col"><?= $s['Employee_ID']; ?></th>
                        <td scope="col"><?= $s['Employee_Name']; ?></th>
                        <td scope="col"><?= $s['Postition_Name']; ?></td>
                        <?php if ($s['status_daftar'] == 'open' || $s['status_daftar'] == '1' || $s['status_daftar'] == '2' || $s['status_daftar'] == '3') : ?>
                            <td scope="col">On Progresss</td>
                            <td scope="col">-</td>
                        <?php elseif ($s['status_daftar'] == '0') : ?>
                            <td scope="col">Rejected</td>
                            <td scope="col">-</td>
                        <?php elseif ($s['status_daftar'] == '4') : ?>
                            <td scope="col">Need Approve</td>
                            <td scope="col"><a href="/pages/detail_approval/<?= $s['Employee_Name']; ?>" style="color: black;">See Activity</a>
                                <a href="/pages/approve_4/<?= $s['Employee_Name']; ?>" style="color: white; background-color:#3BB73B;">Approve</a>
                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">
                                    Reject
                                </button>
                                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Reject</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="/pages/reject_4/<?= $s['Employee_Name']; ?>" method="GET">
                                                    <div class="form-group mb-3">
                                                        <label for="exampleInputPassword1">Alasan Reject</label>
                                                        <input type="text" class="form-control" name="reason" id="reason">
                                                    </div>
                                                    <button type="submit" class="btn btn-danger">Reject</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php elseif ($s['status_daftar'] != '4') : ?>
                            <td scope="col">Approved</td>
                            <td scope="col">-</td>
                        <?php endif; ?>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>


    <?= $this->endSection(); ?>