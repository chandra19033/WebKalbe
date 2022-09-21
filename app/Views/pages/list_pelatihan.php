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
    <style>
        .padding {
            padding: 3rem !important;

        }

        .domain-form .form-group {
            border: 1px solid #9ff0c8;
            padding: 20px;
        }


        .domain-form .form-group input {
            height: 40px !important;
            border: transparent;
        }

        .form-control {
            height: 42px !important;
            background: #fff !important;
            color: #3a4348 !important;
            font-size: 18px;
            border-radius: 0px;
            -webkit-box-shadow: none !important;
            box-shadow: none !important;
        }

        .px-4 {
            padding-left: 1.5rem !important;
        }

        .domain-form .form-group .search-domain {
            background: #22d47b;
            border: 2px solid #22d47b;
            color: #fff;
            -webkit-border-radius: 0;
            -moz-border-radius: 0;
            -ms-border-radius: 0;
            border-radius: 0;
        }

        .domain-price span {
            color: #3a4348;
            margin: 0 10px;
        }

        .domain-price span small {
            color: #24bdc9;
        }
    </style>

    <div class="row justify-content-center padding">
        <div class="col-md-8 ftco-animate fadeInUp ftco-animated">
            <form action="#" class="domain-form">
                <div class="form-group d-md-flex">
                    <input type="text" class="form-control px-4" placeholder="Cari Judul Pelatihan">
                    <input type="submit" class="search-domain btn btn-primary px-5" value="Cari">
                </div>
            </form>
        </div>
    </div>

</section>

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

    <div class="container">
        <table class="table table-bordered border-dark">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Judul Pelatihan</th>
                    <th scope="col">Penyelenggara </th>
                    <th scope="col">Status</th>
                </tr>
            </thead>

        </table>
    </div>
</section>

<?= $this->endSection(); ?>