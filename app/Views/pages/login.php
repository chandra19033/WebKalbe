<?= $this->extend('layouts/template'); ?>

<?= $this->section('content'); ?>

<section class="vh-100" style=" background-image: url(/assets/login.jpg); background-size: contain; background-repeat: no-repeat;">
    <div class="container-fluid h-custom ">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-md-9 col-lg-6 col-xl-7">
            </div>
            <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">

                <div class="divider d-flex justify-content-center align-items-center my-5">
                    <p class="text-center fw-bold mx-3 mb-0" style=" font-weight: 800; font-size: 60px;">Sign in</p>
                </div>

                <form action="<?= base_url('pages/login'); ?>" method="POST">
                    <?php if (session()->getFlashdata('error')) { ?>
                        <div class="alert alert-danger">
                            <?php echo session()->getFlashdata('error'); ?>
                        </div>
                    <?php } ?>

                    <!-- Email input -->
                    <div class="form-outline mb-4">
                        <input type="email" id="form3Example3" name="user_email" class="form-control form-control-lg" value="<?php echo session()->getFlashdata('user_email') ?>" placeholder="Enter a valid email address" />

                    </div>

                    <!-- Password input -->
                    <div class="form-outline mb-3">
                        <input type="password" id="form3Example4" name="user_password" class="form-control form-control-lg" value="<?php echo session()->getFlashdata('user_password') ?>" placeholder="Enter password" />
                    </div>

                    <div class="d-flex justify-content-between align-items-center">
                        <!-- Checkbox -->
                        <div class="form-check mb-0">
                            <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3" />
                            <label class="form-check-label" for="form2Example3">
                                Remember me
                            </label>
                        </div>
                    </div>

                    <div class="text-center text-lg-start mt-4 pt-2">
                        <button type="submit" name="login" class="btn btn-primary btn-lg" style="padding-left: 11rem; padding-right: 11rem;">Login</button>
                    </div>

                </form>
            </div>
        </div>
    </div>

</section>
<?= $this->endSection(); ?>