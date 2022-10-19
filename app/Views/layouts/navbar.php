<style>
    .btn-kotak {
        /* border: 1px black solid; */
        margin: 0px 15px;
        /* color: white; */
        background-image: linear-gradient(#428042, #3BB73B);
        padding: 5px 15px;
        border-radius: 10px;
    }

    .dropdown-menu {
        background-image: linear-gradient(#28ABDA, #5EDFF8);
    }

    .dropdown-menu a {
        float: none;
        color: black;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
        text-align: left;
    }

    .nav-item a {
        color: white !important;
    }

    .btn-img {
        padding: 0px !important;
    }

    .nav-item img {
        width: 50px;
    }

    .navbar-brand img {
        width: 150px;
    }
</style>

<nav class="navbar navbar-expand-lg navbar-light">
    <a class="navbar-brand ms-3" href="/">
        <img src="/assets/logo.png" class="center">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto">
            <?php if (session()->get('log')) : ?>

                <?php if (session()->get('level') == 1) { ?>
                    <li class="btn-kotak nav-item">
                        <a class=" nav-link" href="/pages/dashboard">Dashboard</a>
                    </li>
                <?php } ?>

                <li class="btn-kotak nav-item">
                    <a class=" nav-link" href="/pages/persetujuan">Approval</a>
                </li>
                <li class="btn-kotak nav-item">
                    <a class=" nav-link" href="/pages/list_subkoordinat">Subordinate</a>
                </li>
                <li class="btn-kotak nav-item dropdown">
                    <a class=" nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Training
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown" style="right:0">
                        <a class="dropdown-item" href="/pages/list_pelatihan/<?= session()->get('Employee_Name'); ?>">Self-training</a>
                        <a class="dropdown-item" href="/pages/daftarsub">Subordinate</a>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="btn-img nav-link me-3" href="/pages/profile" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img src="<?= base_url("assets/profile.png") ?>" alt="">
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown" style="right:0;">
                        <a class=" dropdown-item" href="/pages/profile">Profile</a>
                        <a class="dropdown-item" href="<?= base_url('pages/logout') ?>">Logout</a>
                    </div>
                </li>
            <?php else : ?>
                <li class="btn-kotak nav-item">
                    <a class=" nav-link" href="pages/login">Login</a>
                </li>
            <?php endif; ?>
        </ul>
    </div>
</nav>