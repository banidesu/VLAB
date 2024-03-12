<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="<?= base_url(); ?>assets/virtual/img/logo-mamen-hd.png">
    <link rel="icon" type="image/png" href="<?= base_url(); ?>assets/virtual/img/logo-mamen-hd.png">
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
    <link href="<?= base_url(); ?>assets/bootstrap-datepicker/css/bootstrap-datepicker3.min.css" rel="stylesheet" />

    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="<?= base_url(); ?>assets/virtual/css/demo.css" rel="stylesheet" />

    <style>
        .brand {
            margin-top: 0 !important;
        }

        .fw-bold {
            font-weight: bold;
        }

        .fw-medium {
            font-weight: 400;
        }

        fieldset {
            border: 1px solid #888888;
            border-radius: 0.375rem;
            padding: 2rem;
        }

        legend {
            max-width: max-content;
            padding: 1rem 1.8rem;
            border-radius: 0.375rem;
            border: 1px solid #888888;
            text-transform: uppercase;
            font-size: 1.2rem;
        }

        .index-page .brand h3 {
            max-width: max-content;
        }

        .index-page .wrapper>.header {
            height: 100%;
            padding: calc(1rem + 6px) 0;
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

        .form-control[type="file"] {
            opacity: 1 !important;
        }

        .form-label {
            margin-bottom: 0.5rem;
        }

        .custom-file-input[type=file] {
            opacity: 0;
            position: absolute;
            z-index: -1;
            width: 0;
        }

        .custom-file-input-label {
            display: block;
            width: 100%;
            padding: 1rem;
            color: rgba(0, 0, 0, 0.5);
            font-size: 1.2rem;
            font-weight: 600;
            border: 1px solid rgba(0, 0, 0, 0.2);
            background-color: transparent;
            border-radius: 0.375rem;
            cursor: pointer;
        }

        .error.custom-file-input-label {
            border-color: red;
            color: red;
        }

        .error-message {
            color: red;
            font-size: 1.1rem;
            font-weight: 500;
            margin-top: 0.2rem;
        }

        footer {
            padding: 2rem;
            background: -webkit-linear-gradient(135deg, rgba(101, 47, 142, 0.88) 0%, rgba(125, 46, 185, 0.45) 100%);
            border-top: 1px solid whitesmoke;
            text-align: center;
        }

        .form-control-feedback {
            top: 50%;
            transform: translateY(-50%);
        }

        .datepicker {
            margin-top: 1px !important;
        }

        .datepicker.dropdown-menu {
            margin-top: 0;
            opacity: 1;
            visibility: visible;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.175);
        }

        .datepicker th {
            font-weight: bold;
        }

        .alert.alert-danger .container-fluid p {
            display: inline;
            margin: 0;
        }

        @media (min-width: 768px) {
            .index-page .wrapper>.header {
                height: 100%;
                padding: 5rem 0;
            }
        }
    </style>
</head>

<body class="index-page" style="background-image: url('<?= base_url(); ?>assets/virtual/img/intro2.png');">
    <div class="wrapper">
        <!-- Header -->
        <div class="header header-filter">
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
                                    <?= $this->session->flashdata('message'); ?>
                                    <?= form_open_multipart('oprec/', [
                                        "onsubmit" => "return confirm('Apakah semua data sudah benar?');"
                                    ]); ?>
                                    <fieldset>
                                        <legend class="fw-bold">Data Diri</legend>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group <?= form_error('name') ? ' has-error' : '' ?>">
                                                    <label class="control-label" for="name">Nama Lengkap</label>
                                                    <input type="text" id="name" name="name" class="form-control" value="<?= set_value('name'); ?>" required>
                                                    <span class="material-icons form-control-feedback">clear</span>
                                                </div>
                                                <?= form_error('name', '<small class="error-message">', '</small>'); ?>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group <?= form_error('npm') ? ' has-error' : '' ?>">
                                                    <label class="control-label" for="npm">NPM</label>
                                                    <input type="text" id="npm" name="npm" class="form-control" value="<?= set_value('npm'); ?>" required>
                                                    <span class="material-icons form-control-feedback">clear</span>
                                                </div>
                                                <?= form_error('npm', '<small class="error-message">', '</small>'); ?>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group <?= form_error('class') ? ' has-error' : '' ?>">
                                                    <label class="control-label" for="class">Kelas</label>
                                                    <input type="text" id="class" name="class" class="form-control" value="<?= set_value('class'); ?>" required>
                                                    <span class="material-icons form-control-feedback">clear</span>
                                                </div>
                                                <?= form_error('class', '<small class="error-message">', '</small>'); ?>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group <?= form_error('jurusan') ? ' has-error' : '' ?>">
                                                    <label class="control-label" for="jurusan">Jurusan</label>
                                                    <select name="jurusan" id="jurusan" class="form-control" required>
                                                        <option selected disabled></option>
                                                        <?php foreach ($jurusans as $jurusan) : ?>
                                                            <option value="<?= $jurusan['id'] ?>" <?= ($jurusan['id'] == set_value('jurusan')) ? 'selected' : '' ?>>
                                                                <?= $jurusan['jurusan'] ?>
                                                            </option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                    <span class="material-icons form-control-feedback">clear</span>
                                                </div>
                                                <?= form_error('jurusan', '<small class="error-message">', '</small>'); ?>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group <?= form_error('region') ? ' has-error' : '' ?>">
                                                    <label class="control-label" for="region">Region</label>
                                                    <select name="region" id="region" class="form-control" required>
                                                        <option selected disabled></option>
                                                        <option value="depok" <?= (set_value('region') == 'depok') ? 'selected' : '' ?>>Depok</option>
                                                        <option value="kalimalang" <?= (set_value('region') == 'kalimalang') ? 'selected' : '' ?>>Kalimalang</option>
                                                        <option value="salemba" <?= (set_value('region') == 'salemba') ? 'selected' : '' ?>>Salemba</option>
                                                    </select>
                                                    <span class="material-icons form-control-feedback">clear</span>
                                                </div>
                                                <?= form_error('region', '<small class="error-message">', '</small>'); ?>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group <?= form_error('placement') ? ' has-error' : '' ?>">
                                                    <label class="control-label" for="placement">Posisi Lamaran</label>
                                                    <select name="placement" id="placement" class="form-control" required>
                                                        <option selected disabled></option>
                                                        <option value="asisten" <?= (set_value('placement') == 'asisten') ? 'selected' : '' ?>>Asisten <small>(Manajemen/Akuntansi)</small></option>
                                                        <option value="programmer" <?= (set_value('placement') == 'programmer') ? 'selected' : '' ?>>Programmer <small>(Informatika/S. Informasi)</small></option>
                                                    </select>
                                                    <span class="material-icons form-control-feedback">clear</span>
                                                </div>
                                                <?= form_error('placement', '<small class="error-message">', '</small>'); ?>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group <?= form_error('agama') ? ' has-error' : '' ?>">
                                                    <label class="control-label" for="agama">Agama</label>
                                                    <input type="text" id="agama" name="agama" class="form-control" value="<?= set_value('agama'); ?>" required>
                                                    <span class="material-icons form-control-feedback">clear</span>
                                                </div>
                                                <?= form_error('agama', '<small class="error-message">', '</small>'); ?>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group <?= form_error('email') ? ' has-error' : '' ?>">
                                                    <label class="control-label" for="email">Email</label>
                                                    <input type="email" id="email" name="email" class="form-control" value="<?= set_value('email'); ?>" required>
                                                    <span class="material-icons form-control-feedback">clear</span>
                                                </div>
                                                <?= form_error('email', '<small class="error-message">', '</small>'); ?>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group <?= form_error('no_telp') ? ' has-error' : '' ?>">
                                                    <label class="control-label" for="no_telp">No Telp</label>
                                                    <input type="text" id="no_telp" name="no_telp" class="form-control" value="<?= set_value('no_telp'); ?>" required>
                                                    <span class="material-icons form-control-feedback">clear</span>
                                                </div>
                                                <?= form_error('no_telp', '<small class="error-message">', '</small>'); ?>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group <?= form_error('address') ? ' has-error' : '' ?>">
                                                    <label class="control-label" for="address">Alamat</label>
                                                    <textarea id="address" name="address" class="form-control" rows="1" required><?= set_value('address'); ?></textarea>
                                                    <span class="material-icons form-control-feedback">clear</span>
                                                </div>
                                                <?= form_error('address', '<small class="error-message">', '</small>'); ?>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group <?= form_error('ttl') ? ' has-error' : '' ?>">
                                                    <label class="control-label" for="tempat-lahir">Tempat Tgl Lahir</label>
                                                    <div class="row">
                                                        <div class="col-xs-6">
                                                            <input type="text" id="tempat-lahir" name="tempat-lahir" class="form-control" value="<?= set_value('tempat-lahir'); ?>" placeholder="Tempat lahir">
                                                            <span class="material-icons form-control-feedback">clear</span>
                                                            <?= form_error('tempat-lahir', '<small class="error-message">', '</small>'); ?>
                                                        </div>
                                                        <div class="col-xs-6">
                                                            <input type="text" id="tanggal-lahir" name="tanggal-lahir" class="form-control datepicker" value="<?= set_value('tanggal-lahir'); ?>" placeholder="Tanggal Lahir">
                                                            <span class="material-icons form-control-feedback">clear</span>
                                                            <?= form_error('tanggal-lahir', '<small class="error-message">', '</small>'); ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group <?= form_error('sosmed') ? ' has-error' : '' ?>">
                                                    <label class="control-label" for="sosmed">Sosial Media URL | <small>(Instagram/LinkedIn/TikTok)</small></label>
                                                    <input type="text" id="sosmed" name="sosmed" class="form-control" value="<?= set_value('sosmed'); ?>" required>
                                                    <span class="material-icons form-control-feedback">clear</span>
                                                </div>
                                                <?= form_error('sosmed', '<small class="error-message">', '</small>'); ?>
                                            </div>
                                        </div>
                                        <small>
                                            * Untuk sosial media, cantumkan <mark>salah satu</mark> url profile akun (Instagram/LinkedIn/TikTok).
                                            <br>
                                            * Pastikan akun sosmed tidak di private
                                        </small>
                                    </fieldset>
                                    <br>
                                    <fieldset>
                                        <legend class="fw-bold">Upload Berkas</legend>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div style="margin-bottom: 2rem;">
                                                    <label for="cv" class="form-label <?= form_error('cv') ? ' text-danger' : '' ?>">CV</label>
                                                    <label for="cv" class="custom-file-input-label <?= form_error('cv') ? ' error' : '' ?>">No file uploaded</label>
                                                    <input type="file" name="cv" id="cv" class="custom-file-input" accept=".pdf">
                                                    <?= form_error('cv', '<small class="error-message">', '</small>'); ?>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div style="margin-bottom: 2rem;">
                                                    <label for="krs" class="form-label <?= form_error('krs') ? ' text-danger' : '' ?>">KRS</label>
                                                    <label for="krs" class="custom-file-input-label <?= form_error('krs') ? ' error' : '' ?>">No file uploaded</label>
                                                    <input type="file" name="krs" id="krs" class="custom-file-input" accept=".pdf">
                                                    <?= form_error('krs', '<small class="error-message">', '</small>'); ?>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div style="margin-bottom: 2rem;">
                                                    <label for="nilai" class="form-label <?= form_error('nilai') ? ' text-danger' : '' ?>">Transkrip Nilai <small>(semester terakhir)</small></label>
                                                    <label for="nilai" class="custom-file-input-label <?= form_error('nilai') ? ' error' : '' ?>">No file uploaded</label>
                                                    <input type="file" name="transkrip_nilai" id="nilai" class="custom-file-input" accept=".pdf">
                                                    <?= form_error('nilai', '<small class="error-message">', '</small>'); ?>
                                                </div>
                                            </div>
                                        </div>
                                        <small>
                                            * Untuk transktrip nilai yang di upload adalah nilai semester terakhir.
                                            <br>
                                            * Upload file hanya berupa PDF (.pdf)
                                            <br>
                                            * Ukuran file maksimal yaitu 1024KB (1MB)
                                        </small>
                                    </fieldset>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <button class="btn btn-primary fw-bold" title="Kirim" type="submit"><i class="fa fa-fw fa-check-square-o" aria-hidden="true"></i> Kirim</button>
                                            <button class="btn btn-danger" title="Reset" type="reset"><i class="fa fa-fw fa-trash-o" aria-hidden="true"></i></button>
                                            <a href="<?= base_url(); ?>" title="Kembali" class="btn btn-info" type="button"><i class="fa fa-fw fa-arrow-circle-left" aria-hidden="true"></i></a>
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
        $('.datepicker').datepicker({
            format: "dd-mm-yyyy",
            autoclose: 1
        });
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

            // custom file input || Only PDF
            $('.custom-file-input').on('change', function() {
                // console.log($(this).next('.error-message'));
                var file = $(this)[0].files[0],
                    fileName = file ? file.name : 'No file uploaded',
                    fileType = file ? file.type : '',
                    allowedTypes = ['application/pdf'];

                if (!allowedTypes.includes(fileType)) {
                    $(this).prev().addClass('error');

                    // Check if error message already exists
                    var errorMessage = $(this).next('.error-message');
                    if (errorMessage.length === 0) {
                        // Create error message element only if it doesn't exist
                        errorMessage = $('<small/>', {
                            class: 'error-message',
                            text: 'Silakan pilih file PDF!'
                        });
                        // Append error message after the file input
                        $(this).after(errorMessage);
                    }
                } else {
                    $(this).prev().removeClass('error');
                    // Remove error message if exists
                    $(this).next('.error-message').remove();
                }

                $(this).prev().text(fileName);
            });
        });
    </script>
</body>

</html>