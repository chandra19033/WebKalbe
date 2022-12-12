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

    .card1 {
        border: 0;
        border-radius: 0;
        color: #fff;
        box-shadow: 5px 5px 10px #e1e1e1;
        padding: 3em 0;
        border-bottom-right-radius: 4em;
        border-top-left-radius: 4em;
        background: linear-gradient(to left, #28ABDA 50%, forestgreen 50%);
        background-size: 200%;
        background-position: right;
        transition: background-position 0.5s ease-out;
    }

    .card-icon1 {
        margin: 0 1em;
    }

    .card-icon1 i {
        font-size: 3em;
    }

    .card:hover1 {
        background-position: left;
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

    #calendar {
        width: 400px;
        height: 400px;
        margin-left: 70px;
        margin-top: 40px;
        margin-bottom: 80px;

    }

    .img {
        margin-left: 100px;
        margin-top: 80px;
        margin-bottom: 80px;
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

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var calendarEl = document.getElementById('calendar');
                var calendar = new FullCalendar.Calendar(calendarEl, {
                    initialView: 'dayGridMonth'
                });
                calendar.render();
            });
        </script>
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


            </div>
        </div>

    </body>

    </html>

<?php endif; ?>

<?= $this->endSection(); ?>