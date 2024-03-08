<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="<?= base_url(); ?>assets/virtual/img/apple-icon.png">
    <link rel="icon" type="image/png" href="<?= base_url(); ?>assets/virtual/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title><?= $judul; ?> | Portal</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <!--     Fonts and icons     -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" />
    <link rel="stylesheet" href="<?= base_url(); ?>assets\font-awesome\4.2.0\css\font-awesome.min.css" />

    <!-- CSS Files -->
    <link href="<?= base_url(); ?>assets/virtual/css/bootstrap.min.css" rel="stylesheet" />
    <link href="<?= base_url(); ?>assets/virtual/css/material-kit.css" rel="stylesheet" />
    <link href="<?= base_url(); ?>assets\bootstrap-datepicker\css\bootstrap-datepicker3.min.css" rel="stylesheet" />

    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="<?= base_url(); ?>assets/virtual/css/demo.css" rel="stylesheet" />

    <style>
        .container {
            display: grid;
            place-items: center stretch;
            height: 100dvh;
        }

        .brand {
            margin-top: 0 !important;
        }

        .fw-bold {
            font-weight: bold;
        }

        .index-page .brand h3 {
            max-width: max-content;
        }

        .index-page .wrapper>.header {
            height: 100dvh;
        }

        hr {
            border-width: 2px;
            border-color: rgba(0, 0, 0, 0.4);
            margin-top: 7px;
            margin-bottom: 0;
        }

        .form-group {
            margin: 0;
        }

        footer {
            /* position: absolute;
            z-index: 999;
            width: 100%;
            bottom: 0; */
            padding: 2rem;
            background: -webkit-linear-gradient(135deg, rgba(101, 47, 142, 0.88) 0%, rgba(125, 46, 185, 0.45) 100%);
            border-top: 1px solid whitesmoke;
            text-align: center;
        }
    </style>
</head>

<body class="index-page" style="overflow: auto;">
    <div class="wrapper">
        <!-- Header -->
        <div class="header header-filter" style="background-image: url('<?= base_url(); ?>assets/virtual/img/intro2.png');">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <div class="brand">
                            <div class="card card-frame">
                                <div class="card-body">
                                    <h3 class="fw-bold">Pendaftaran Laboratorium Manajemen Menengah</h3>
                                </div>
                                <hr>
                                <div class="card-body text-left">
                                    <form action="#" method="post">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label" for="name">Nama Lengkap</label>
                                                    <input type="text" id="name" name="name" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label" for="npm">NPM</label>
                                                    <input type="text" id="npm" name="npm" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label" for="email">Email</label>
                                                    <input type="email" id="email" name="email" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label" for="jurusan">Jurusan</label>
                                                    <select name="jurusan" id="jurusan" class="form-control">
                                                        <option selected disabled></option>
                                                        <?php foreach ($jurusans as $jurusan) : ?>
                                                            <option value="<?= $jurusan['id'] ?>"><?= $jurusan['jurusan'] ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label" for="class">Kelas</label>
                                                    <input type="text" id="class" name="class" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label" for="no_telp">No Telp</label>
                                                    <input type="text" id="no_telp" name="no_telp" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label" for="address">Alamat</label>
                                                    <textarea id="address" name="address" class="form-control" rows="1"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label" for="ttl">Tempat Tgl Lahir</label>
                                                    <input type="date" id="ttl" name="ttl" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <button class="btn btn-primary" type="submit">Submit</button>
                                                <button class="btn btn-danger" title="Reset" type="reset"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Header -->

    </div>

    <footer>
        <p style="color: white; margin: 0;">&copy; 2024, Made with favorite by MaMen Tim for a better web.</p>
    </footer>

    <!--   Core JS Files   -->
    <script src="<?= base_url(); ?>assets/virtual/js/jquery.min.js" type="text/javascript"></script>
    <script src="<?= base_url(); ?>assets/virtual/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="<?= base_url(); ?>assets/virtual/js/material.min.js"></script>

    <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
    <script src="<?= base_url(); ?>assets/virtual/js/nouislider.min.js" type="text/javascript"></script>

    <!--  Plugin for the Datepicker, full documentation here: http://www.eyecon.ro/bootstrap-datepicker/ -->
    <script src="<?= base_url(); ?>assets\bootstrap-datepicker\js\bootstrap-datepicker.min.js" type="text/javascript"></script>

    <!-- Control Center for Material Kit: activating the ripples, parallax effects, scripts from the example pages etc -->
    <script src="<?= base_url(); ?>assets/virtual/js/material-kit.js" type="text/javascript"></script>
    <script src="<?= base_url(); ?>assets/virtual/js/Function.js" type="text/javascript"></script>

    <script>
        $(document).ready(function() {
            $('#no_telp').on('input', function(e) {
                var input = $(this).val();
                input = input.replace(/\D/g, '');
                if (input.length > 13) {
                    input = input.slice(0, 13);
                }
                $(this).val(input);
            });
            $('#npm').on('input', function(e) {
                var input = $(this).val();
                input = input.replace(/\D/g, '');
                if (input.length > 10) {
                    input = input.slice(0, 10);
                }
                $(this).val(input);
            });
        });
    </script>
</body>

</html>