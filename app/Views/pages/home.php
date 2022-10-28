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
</style>

<!-- .bg-text {
        background-color: rgb(0, 0, 0);
        /* Fallback color */
        background-color: rgba(0, 0, 0, 0.4);
        backdrop-filter: blur(5px);
        /* Black w/opacity/see-through */
        color: white;
        font-weight: bold;
        border: 3px solid #f1f1f1;
        position: absolute;
        top: 40%;
        left: 50%;
        transform: translate(-50%, -50%);
        z-index: 2;
        width: 80%;
        padding: 20px;
        text-align: center;
    } -->

<section>
    <div class="home1">
        <div class="justify align-items-end col-7">

            <h1 style="font-weight: 800;">Rencana Pelatihan Kalbe Cikarang (RPKC)</h1>
            <hr>
            <p style="font-weight: 400;">Pelatihan ini memiliki satu tujuan bagi sebuah perusahaan, yaitu
                meningkatkan performance kerja karyawan sehingga memberikan manfat besar bagi
                perkembangan perusahaan dan pada akhirnya, perusahaan dapat mencapai tujuannya sesuai
                visi dan misi yang dipegangnya serta bersaing dengan kompetitor lain.</p>
            <p class="lead">
                <a class="btn btn-primary btn-lg" href="" role="button">Lihat Pelatihan ></a>

            </p>
        </div>
    </div>
</section>

<?php if (session()->get('log')) : ?>

    <!-- <section class="py-5">

        <div class="card-deck d-flex justify-content-center">

            <div class="card justify-content-center d-flex py-3 bg-dark mb-3" style="max-width: 18rem;">

                <div class="card-icon" style=" color:white;"><i class="bi bi-circle"></i>
                    <div class="card-body" data-toggle="tooltip" data-placement="bottom" title="Self Training List">
                        <img src="<?= base_url("assets/daftar_pelatihan.png") ?>" style="height: 120px; width:110px" class="center">
                        <a href="/pages/list_pelatihan/<?= session()->get('Employee_Name'); ?>" class="stretched-link"> </a>
                    </div>
                </div>
            </div>

            <div class="card justify-content-center d-flex py-3 bg-dark mb-3" style="max-width: 18rem;">
                <div class="card-icon" style=" color:white;"><i class="bi bi-circle"></i>
                    <div class="card-body" data-toggle="tooltip" data-placement="bottom" title="Register for Subordinate Training">
                        <img src="<?= base_url("assets/daftarkan_subkoordinat.png") ?>" style="height: 120px; width:110px" class="center">
                        <a href="/pages/daftar_sub" class="stretched-link"> </a>
                    </div>
                </div>
            </div>

            <div class="card justify-content-center d-flex py-3 bg-dark mb-3" style="max-width: 18rem;">
                <div class="card-icon" style=" color:white;"><i class="bi bi-circle"></i>
                    <div class="card-body" data-toggle="tooltip" data-placement="bottom" title="Subordinates List">
                        <img src="<?= base_url("assets/list_subkoordinat.png") ?>" style="height: 120px; width:110px" class="center">
                        <a href="/pages/list_subkoordinat" class="stretched-link"> </a>
                    </div>
                </div>
            </div>

            <div class="card justify-content-center d-flex py-3 bg-dark mb-3" style="max-width: 18rem;">
                <div class="card-icon" style=" color:white;"><i class="bi bi-circle"></i>
                    <div class="card-body" data-toggle="tooltip" data-placement="bottom" title="Approval">
                        <img src="<?= base_url("assets/approve.png") ?>" style="height: 120px; width:110px" class="center">
                        <a href="/pages/persetujuan" class="stretched-link"> </a>
                    </div>
                </div>
            </div>
        </div>

    </section> -->


    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }


        body::before {
            content: '';
            position: absolute;
            width: 100%;
            background: #fff;
            clip-path: inset(47% 0 0 0);
            z-index: -1;
            height: 100%;
        }

        ::selection {
            background-image: linear-gradient(#28ABDA, #5EDFF8);
            color: #fff;
        }

        .container {
            max-width: 950px;
            width: 100%;
            overflow: hidden;
            padding: 30px 0;
        }

        .container .main-card {
            display: flex;
            justify-content: space-evenly;
            width: 200%;
            transition: 1s;
        }

        #two:checked~.main-card {
            margin-left: -100%;
        }

        .container .main-card .cards {
            width: calc(100% / 2 - 10px);
            display: flex;
            flex-wrap: wrap;
            margin: 0 20px;
            justify-content: space-between;
        }

        .main-card .cards .card {
            width: calc(100% / 3 - 10px);
            background-image: linear-gradient(#28ABDA, #5EDFF8);
            border-radius: 5px;
            padding: 5px;
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.25);
            transition: all 0.4s ease;
        }

        .main-card .cards .card:hover {
            transform: translateY(-15px);
        }

        .cards .card .content {
            width: 100%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
        }

        .cards .card .content .img {
            height: 170px;
            width: 170px;
            border-radius: 50%;
            padding: 3px;
            background: #FF676D;
            margin-bottom: 14px;
        }

        .card .content .img img {
            height: 100%;
            width: 100%;
            border: 3px solid #ffff;
            border-radius: 50%;
            object-fit: cover;
        }

        .card .content .name {
            font-size: 20px;
            font-weight: 500;
        }

        .card .content .job {
            font-size: 20px;
            color: #FF676D;
        }

        .card .content .media-icons {
            margin-top: 10px;
            display: flex;

        }

        .media-icons a {
            text-align: center;
            line-height: 33px;
            height: 35px;
            width: 35px;
            margin: 0 4px;
            font-size: 14px;
            color: #FFF;
            border-radius: 50%;
            border: 2px solid transparent;
            background-image: linear-gradient(#28ABDA, #5EDFF8);
            transition: all 0.3s ease;
        }

        .media-icons a:hover {
            color: #FF676D;
            background-image: linear-gradient(#28ABDA, #5EDFF8);
            border-color: #FF676D;
        }

        .container .button {
            width: 100%;
            display: flex;
            justify-content: center;
            margin: 20px;
        }

        .button label {
            height: 15px;
            width: 15px;
            border-radius: 20px;
            background-image: linear-gradient(#28ABDA, #5EDFF8);
            margin: 0 4px;
            cursor: pointer;
            transition: all 0.5s ease;
        }

        .button label.active {
            width: 35px;
        }

        #one:checked~.button .one {
            width: 35px;
        }

        #one:checked~.button .two {
            width: 15px;
        }

        #two:checked~.button .one {
            width: 15px;
        }

        #two:checked~.button .two {
            width: 35px;
        }

        input[type="radio"] {
            display: none;
        }

        @media (max-width: 768px) {
            .main-card .cards .card {
                margin: 20px 0 10px 0;
                width: calc(100% / 2 - 10px);
            }
        }

        @media (max-width: 600px) {
            .main-card .cards .card {
                /* margin: 20px 0 10px 0; */
                width: 100%;
            }
        }
    </style>

    <section>
        <!DOCTYPE html>
        <!-- Created By CodingLab - www.codinglabweb.com -->
        <html lang="en" dir="ltr">

        <head>
            <meta charset="UTF-8">
            <!---<title> Responsive Our Team Section | CodingLab </title>---->
            <link rel="stylesheet" href="style.css">
            <!-- Fontawesome CDN Link -->
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
        </head>

        <body>
            <div class="container">
                <input type="radio" name="dot" id="one">
                <input type="radio" name="dot" id="two">
                <div class="main-card">
                    <div class="cards">
                        <div class="card">
                            <div class="content">
                                <div class="img">
                                    <img src="<?= base_url("assets/gambar4.jpeg") ?>" class="center">
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="content">
                                <div class="img">
                                    <img src="<?= base_url("assets/gambar5.jpeg") ?>" class="center">
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="content">
                                <div class="img">
                                    <img src="<?= base_url("assets/gambar6.jpeg") ?>" class="center">
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="cards">
                        <div class="card">
                            <div class="content">
                                <div class="img">
                                    <img src="<?= base_url("assets/gambar7.jpeg") ?>" class="center">
                                </div>

                            </div>
                        </div>
                        <div class="card">
                            <div class="content">
                                <div class="img">
                                    <img src="<?= base_url("assets/gambar8.jpeg") ?>" class="center">
                                </div>
                                <!-- <div class="details">
                                    <div class="name">Adrina Calvo</div>
                                    <div class="job">UI Designer</div>
                                </div>
                                <div class="media-icons">
                                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                                    <a href="#"><i class="fab fa-twitter"></i></a>
                                    <a href="#"><i class="fab fa-instagram"></i></a>
                                    <a href="#"><i class="fab fa-youtube"></i></a>
                                </div> -->
                            </div>
                        </div>
                        <div class="card">
                            <div class="content">
                                <div class="img">
                                    <img src="<?= base_url("assets/gambar9.jpeg") ?>" class="center">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="button">
                    <label for="one" class=" active one"></label>
                    <label for="two" class="two"></label>
                </div>
            </div>
        </body>

        </html>

    </section>

    <section>
        <style>
            :root {
                --dark-body: #4d4c5a;
                --dark-main: #141529;
                --dark-second: #79788c;
                --dark-hover: #323048;
                --dark-text: #f8fbff;
                --light-body: #f3f8fe;
                --light-main: #fdfdfd;
                --light-second: #c3c2c8;
                --light-hover: #edf0f5;
                --light-text: #151426;
                --blue: #007497;
                --white: #fff;
                --shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
                --font-family: cursive;
            }

            .light {
                --bg-body: var(--light-body);
                --bg-main: var(--light-main);
                --bg-second: var(--light-second);
                --color-hover: var(--light-hover);
                --color-txt: var(--light-text);
            }

            * {
                padding: 0;
                margin: 0;
                box-sizing: border-box;
            }



            .calendar {
                height: max-content;
                width: max-content;
                margin-left: auto;
                margin-right: auto;
                background-color: var(--bg-main);
                border-radius: 30px;
                padding: 20px;
                position: relative;
                overflow: hidden;
            }

            .light .calendar {
                box-shadow: var(--shadow);
            }

            .calendar-header {
                display: flex;
                justify-content: space-between;
                align-items: center;
                font-size: 25px;
                font-weight: 600;
                color: var(--color-txt);
                padding: 10px;
            }

            .calendar-body {
                padding: 10px;
            }

            .calendar-week-day {
                height: 50px;
                display: grid;
                grid-template-columns: repeat(7, 1fr);
                font-weight: 600;
            }

            .calendar-week-day div {
                display: grid;
                place-items: center;
                color: var(--bg-second);
            }

            .calendar-days {
                display: grid;
                grid-template-columns: repeat(7, 1fr);
                gap: 2px;
                color: var(--color-txt);
            }

            .calendar-days div {
                width: 50px;
                height: 50px;
                display: flex;
                align-items: center;
                justify-content: center;
                padding: 5px;
                position: relative;
                cursor: pointer;
                animation: to-top 1s forwards;
            }

            .calendar-days div span {
                position: absolute;
            }

            .calendar-days div:hover span {
                transition: width 0.2s ease-in-out, height 0.2s ease-in-out;
            }

            .calendar-days div span:nth-child(1),
            .calendar-days div span:nth-child(3) {
                width: 2px;
                height: 0;
                background-color: var(--color-txt);
            }

            .calendar-days div:hover span:nth-child(1),
            .calendar-days div:hover span:nth-child(3) {
                height: 100%;
            }

            .calendar-days div span:nth-child(1) {
                bottom: 0;
                left: 0;
            }

            .calendar-days div span:nth-child(3) {
                top: 0;
                right: 0;
            }

            .calendar-days div span:nth-child(2),
            .calendar-days div span:nth-child(4) {
                width: 0;
                height: 2px;
                background-color: var(--color-txt);
            }

            .calendar-days div:hover span:nth-child(2),
            .calendar-days div:hover span:nth-child(4) {
                width: 100%;
            }

            .calendar-days div span:nth-child(2) {
                top: 0;
                left: 0;
            }

            .calendar-days div span:nth-child(4) {
                bottom: 0;
                right: 0;
            }

            .calendar-days div:hover span:nth-child(2) {
                transition-delay: 0.2s;
            }

            .calendar-days div:hover span:nth-child(3) {
                transition-delay: 0.4s;
            }

            .calendar-days div:hover span:nth-child(4) {
                transition-delay: 0.6s;
            }

            .calendar-days div.curr-date,
            .calendar-days div.curr-date:hover {
                background-color: var(--blue);
                color: var(--white);
                border-radius: 50%;
            }

            .calendar-days div.curr-date span {
                display: none;
            }

            .month-picker {
                padding: 5px 10px;
                border-radius: 10px;
                cursor: pointer;
            }

            .month-picker:hover {
                background-color: var(--color-hover);
            }

            .year-picker {
                display: flex;
                align-items: center;
            }

            .year-change {
                height: 40px;
                width: 40px;
                border-radius: 50%;
                display: grid;
                place-items: center;
                margin: 0 10px;
                cursor: pointer;
            }

            .year-change:hover {
                background-color: var(--color-hover);
            }

            .calendar-footer {
                padding: 10px;
                display: flex;
                justify-content: flex-end;
                align-items: center;
            }

            .toggle {
                display: flex;
            }

            .toggle span {
                margin-right: 10px;
                color: var(--color-txt);
            }

            .month-list {
                position: absolute;
                width: 100%;
                height: 100%;
                top: 0;
                left: 0;
                background-color: var(--bg-main);
                padding: 20px;
                grid-template-columns: repeat(3, auto);
                gap: 5px;
                display: grid;
                transform: scale(1.5);
                visibility: hidden;
                pointer-events: none;
            }

            .month-list.show {
                transform: scale(1);
                visibility: visible;
                pointer-events: visible;
                transition: all 0.2s ease-in-out;
            }

            .month-list>div {
                display: grid;
                place-items: center;
            }

            .month-list>div>div {
                width: 100%;
                padding: 5px 20px;
                border-radius: 10px;
                text-align: center;
                cursor: pointer;
                color: var(--color-txt);
            }

            .month-list>div>div:hover {
                background-color: var(--color-hover);
            }
        </style>

        <html>

        <body class="light" style="">

            <div class="calendar">
                <div class="calendar-header">
                    <span class="month-picker" id="month-picker">April</span>
                    <div class="year-picker">
                        <span class="year-change" id="prev-year">
                            <pre><</pre>
                        </span>
                        <span id="year">2022</span>
                        <span class="year-change" id="next-year">
                            <pre>></pre>
                        </span>
                    </div>
                </div>
                <div class="calendar-body">
                    <div class="calendar-week-day">
                        <div>Sun</div>
                        <div>Mon</div>
                        <div>Tue</div>
                        <div>Wed</div>
                        <div>Thu</div>
                        <div>Fri</div>
                        <div>Sat</div>
                    </div>
                    <div class="calendar-days"></div>
                </div>

                <div class="month-list"></div>
            </div>
            <script src="app.js"></script>
        </body>

        </html>

        <script>
            let calendar = document.querySelector('.calendar')

            const month_names = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December']

            isLeapYear = (year) => {
                return (year % 4 === 0 && year % 100 !== 0 && year % 400 !== 0) || (year % 100 === 0 && year % 400 === 0)
            }

            getFebDays = (year) => {
                return isLeapYear(year) ? 29 : 28
            }

            generateCalendar = (month, year) => {

                let calendar_days = calendar.querySelector('.calendar-days')
                let calendar_header_year = calendar.querySelector('#year')

                let days_of_month = [31, getFebDays(year), 31, 30, 31, 30, 31, 31, 30, 31, 30, 31]

                calendar_days.innerHTML = ''

                let currDate = new Date()
                if (month > 11 || month < 0) month = currDate.getMonth()
                if (!year) year = currDate.getFullYear()

                let curr_month = `${month_names[month]}`
                month_picker.innerHTML = curr_month
                calendar_header_year.innerHTML = year

                // get first day of month

                let first_day = new Date(year, month, 1)

                for (let i = 0; i <= days_of_month[month] + first_day.getDay() - 1; i++) {
                    let day = document.createElement('div')
                    if (i >= first_day.getDay()) {
                        day.classList.add('calendar-day-hover')
                        day.innerHTML = i - first_day.getDay() + 1
                        day.innerHTML += `<span></span>
                            <span></span>
                            <span></span>
                            <span></span>`
                        if (i - first_day.getDay() + 1 === currDate.getDate() && year === currDate.getFullYear() && month === currDate.getMonth()) {
                            day.classList.add('curr-date')
                        }
                    }
                    calendar_days.appendChild(day)
                }
            }

            let month_list = calendar.querySelector('.month-list')

            month_names.forEach((e, index) => {
                let month = document.createElement('div')
                month.innerHTML = `<div data-month="${index}">${e}</div>`
                month.querySelector('div').onclick = () => {
                    month_list.classList.remove('show')
                    curr_month.value = index
                    generateCalendar(index, curr_year.value)
                }
                month_list.appendChild(month)
            })

            let month_picker = calendar.querySelector('#month-picker')

            month_picker.onclick = () => {
                month_list.classList.add('show')
            }

            let currDate = new Date()

            let curr_month = {
                value: currDate.getMonth()
            }
            let curr_year = {
                value: currDate.getFullYear()
            }

            generateCalendar(curr_month.value, curr_year.value)

            document.querySelector('#prev-year').onclick = () => {
                --curr_year.value
                generateCalendar(curr_month.value, curr_year.value)
            }

            document.querySelector('#next-year').onclick = () => {
                ++curr_year.value
                generateCalendar(curr_month.value, curr_year.value)
            }
        </script>

    </section>


<?php endif; ?>

<?= $this->endSection(); ?>