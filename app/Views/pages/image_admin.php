<?= $this->extend('layouts/admin'); ?>

<?= $this->section('content'); ?>

<section>
    <div class="title justify-content-center d-flex py-3 mb-5">
        <h1 style="font-weight: 800; color:white; text-shadow: 0px 2.53109px 25.3109px rgba(0, 63, 145, 0.42);">Add Image</h1>
    </div>

</section>


<!doctype html>
<html>

<body>

    <div class="container">

        <div class="row">
            <div class="col-md-12">
                <?php
                // Display Response
                if (session()->has('message')) {
                ?>
                    <div class="alert <?= session()->getFlashdata('alert-class') ?>">
                        <?= session()->getFlashdata('message') ?>
                    </div>
                <?php
                }
                ?>

                <?php
                // File preview
                if (session()->has('filepath')) { ?>

                    <?php
                    if (session()->getFlashdata('extension') == 'jpg' || session()->getFlashdata('extension') == 'jpeg' || session()->getFlashdata('extension') == 'png') {
                    ?>
                        <img src="<?= session()->getFlashdata('filepath') ?>" with="200px" height="200px"><br>

                    <?php
                    } else {
                    ?>
                        <a href="<?= session()->getFlashdata('filepath') ?>">Click Here..</a>
                <?php
                    }
                }
                ?>

                <?php $validation = \Config\Services::validation(); ?>

                <form method="post" action="<?= site_url('pages/image_admin') ?>" enctype="multipart/form-data">

                    <?= csrf_field(); ?>
                    <div class="form-group">
                        <label for="file">File:</label>

                        <input type="file" class="form-control" id="file" name="file" />
                        <!-- Error -->


                    </div>
                    <input id="button1" type="submit" class="btn btn-success" name="submit" value="Upload">
                    <input id="button1" type="submit" class="btn btn-danger" name="button1" value="Delete" />
                </form>

                <?php
                if (isset($_POST['button1'])) {
                    $files = glob('./assets/images/*.*');

                    foreach ($files as $file) {
                        if (is_file($file))
                            unlink($file);
                    }
                    $path   = './assets/images';
                    rmdir($path);
                }

                ?>

            </div>
        </div>
    </div>
</body>

</html>



<?= $this->endSection(); ?>