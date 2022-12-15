<?= $this->extend('layouts/template'); ?>

<?= $this->section('content'); ?>

<style>
    .home1 {
        /* The image used */
        background-image: url(/assets/gambar2-1.png);
        /* Full height */
        height: 100vh;

        /* Center and scale the image nicely */
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
        color: white;
    }

    .justify {
        padding: 70px;
        padding-top: 100px;
    }

    .title {
        background-image: linear-gradient(#28ABDA, #5EDFF8);

    }

    .d-flex {
        gap: 20px;
    }

    .center {
        display: block;
        margin-left: auto;
        margin-right: auto;
        width: 70%;
    }

    .p {
        margin: 10px;
    }

    .stretched-link::after {
        position: absolute;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
        z-index: 1;
        pointer-events: auto;
        content: "";
        background-color: rgba(0, 0, 0, 0);
    }

    .carousel-item {
        height: 100vh;
        min-height: 350px;
        background: no-repeat center center scroll;
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
    }

    .carousel-caption {
        position: absolute;
        top: 80px;
        bottom: auto;
        background-color: #282828;
        opacity: 0.7;
        border-radius: 3%;
    }

    @media(max-width: 768px) {
        h3 {
            font-size: 14px;
        }
    }

    .img {
        margin-left: 80px;
        margin-top: 60px;
        margin-bottom: 30px;
    }

    @import url('https://fonts.googleapis.com/css?family=Oswald:300,400,500,700');
    @import url('https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800');

    .gr-1 {
        background: linear-gradient(170deg, #01E4F8 0%, #1D3EDE 100%);
    }

    .gr-2 {
        background: linear-gradient(170deg, #B4EC51 0%, #429321 100%);
    }

    .gr-3 {
        background: linear-gradient(170deg, #C86DD7 0%, #3023AE 100%);
    }

    * {
        transition: 0.5s;
    }

    .h-100 {
        height: 100vh !important;
    }

    .align-middle {
        position: relative;
        top: 50%;
        transform: translateY(-50%);
    }

    .column {
        margin-top: 3rem;
        padding-left: 3rem;
    }

    .column:hover {
        padding-left: 0;
    }

    .column:hover .card .txt {
        margin-left: 1rem;
    }

    .column:hover .card .txt h1,
    .column:hover .card .txt p {
        color: white;
        opacity: 1;
    }

    .column:hover a {
        color: white;
    }

    .column:hover a:after {
        width: 10%;
    }

    .card {
        min-height: 170px;
        margin: 0;
        padding: 1.7rem 1.2rem;
        border: none;
        border-radius: 0;
        color: black;
        letter-spacing: 0.05rem;
        font-family: 'Oswald', sans-serif;
        box-shadow: 0 0 21px rgba(0, 0, 0, 0.27);
        margin-left: 70px;
        margin-top: 60px;
        margin-bottom: 80px;
    }

    .card .txt {
        margin-left: -3rem;
        z-index: 1;
    }

    .card .txt h1 {
        font-size: 3rem;
        font-weight: 300;
        text-transform: uppercase;
    }

    .card .txt p {
        font-size: 0.7rem;
        font-family: 'Open Sans', sans-serif;
        letter-spacing: 0rem;
        margin-top: 33px;
        opacity: 0;
        color: white;
    }

    .card a {
        z-index: 3;
        font-size: 0.7rem;
        color: black;
        margin-left: 1rem;
        position: relative;
        bottom: -0.5rem;
        text-transform: uppercase;
    }

    .card a:after {
        content: "";
        display: inline-block;
        height: 0.5em;
        width: 0;
        margin-right: -100%;
        margin-left: 10px;
        border-top: 1px solid white;
        transition: 0.5s;
    }

    .card .ico-card {
        position: absolute;
        top: 0;
        left: 0;
        bottom: 0;
        right: 0;
        width: 100%;
        height: 100%;
        overflow: hidden;
    }

    .card i {
        position: relative;
        right: -50%;
        top: 60%;
        font-size: 12rem;
        line-height: 0;
        opacity: 0.2;
        color: white;
        z-index: 0;
    }
</style>

<section>
    <div id="carouselExampleIndicators" class="carousel slide carousel-fade" data-ride="carousel">
        <!-- <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol> -->
        <div class="carousel-inner">
            <div class="carousel-item active" data-bs-interval="10000">
                <img class="d-block w-100" src="/assets/gambar2-1.png" alt="First slide">
                <div class="carousel-caption d-none d-md-block">
                    <div class="container">
                        <h3> E-Training Plan Pharma BO </h3>
                        <p> Training is teaching, or developing in oneself or others, any skills and knowledge or fitness that relate to specific useful competencies. Training has specific goals of improving one's capability, capacity, productivity and performance. It forms the core of apprenticeships and provides the backbone of content at institutes of technology (also known as technical colleges or polytechnics) </p>
                    </div>
                </div>
            </div>
            <div class="carousel-item" data-bs-interval="2000">
                <img class="d-block w-100" src="/assets/gambar1.jpeg" alt="Second slide">
                <div class="carousel-caption d-none d-md-block">
                    <div class="container">
                        <h3> E-Training Plan Pharma BO </h3>
                        <p> Training is teaching, or developing in oneself or others, any skills and knowledge or fitness that relate to specific useful competencies. Training has specific goals of improving one's capability, capacity, productivity and performance. It forms the core of apprenticeships and provides the backbone of content at institutes of technology (also known as technical colleges or polytechnics) </p>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="/assets/gambar3.jpeg" alt="Third slide">
                <div class="carousel-caption d-none d-md-block">
                    <div class="container">
                        <h3> E-Training Plan Pharma BO </h3>
                        <p> Training is teaching, or developing in oneself or others, any skills and knowledge or fitness that relate to specific useful competencies. Training has specific goals of improving one's capability, capacity, productivity and performance. It forms the core of apprenticeships and provides the backbone of content at institutes of technology (also known as technical colleges or polytechnics) </p>
                    </div>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only"></span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only"></span>
        </a>
    </div>
</section>


<?php if (session()->get('log')) : ?>

    <!DOCTYPE html>
    <html lang='en'>

    <head>
        <meta charset='utf-8' />
        <link href='https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.css' rel='stylesheet' />
        <script src='https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.js'></script>

    </head>

    <body>
        <div class="row">
            <div class="col">

                <?php
                $files = glob("assets/images/*.*");
                usort($files, function ($a, $b) {
                    return filemtime($b) - filemtime($a);
                });



                for ($i = 0; $i < count($files); $i++) {
                    $image = $files[$i];
                    $supported_file = array(
                        'gif',
                        'jpg',
                        'jpeg',
                        'png'
                    );

                    $ext = strtolower(pathinfo($image, PATHINFO_EXTENSION));
                    if (in_array($ext, $supported_file)) {
                        echo '<img class="img" src="' . $image . '"  width="540" > ';
                    } else {
                        continue;
                    }
                }

                ?>

            </div>
            <div class="col">
                <div class="container">
                    <div class="col-md-9  column">
                        <div class="card gr-2">
                            <div class="txt">
                                <h5 class="card-header">Next Event</h5>
                                <hr>

                                <?php foreach ($eventmodel as $row) : ?>
                                    <h1><?= $row->Event_Title; ?>
                                    </h1>
                                    <p style="font-size:12px;"><?= $row->Description; ?></p>
                            </div>
                            <a><?= $row->Date; ?></a>
                            <div class="ico-card">
                                <i class="fa fa-codepen"></i>
                            </div>
                        <?php endforeach; ?>
                        </div>
                    </div>

                </div>

            </div>
        </div>

    </body>

    </html>

<?php endif; ?>


<!-- <div class="card border-success" style="width: 27rem;">
    <h5 class="card-header">Next Event</h5>
    <div class="card-body">

            <h2 class="card-title"> </h2>
            <hr>
            <p class="card-text"></p>
            <h6 class="card-subtitle mb-2 text-muted"></h6>
    </div>
</div> -->




<?= $this->endSection(); ?>