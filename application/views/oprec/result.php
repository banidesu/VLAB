<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laboratorium Manajemen Menengah | Pengumuman Hasil Seleksi</title>

    <meta name="description" content="V-Lab Manajemen Menengah adalah website resmi Laboratorium Manajemen Menengah Universitas Gunadarma">

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="<?= base_url() ?>assets/virtual/img/logo-mamen-hd.png">

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/vendor/vendor/fonts/boxicons.css">

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-image: linear-gradient(45deg, rgba(101, 47, 142, 0.88) 0%, rgba(125, 46, 185, 0.45) 100%), url('<?= base_url(); ?>assets/virtual/img/intro2.png');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        /* Style for the footer */
        footer {
            background-color: rgba(0, 0, 0, 0.5);
            color: white;
            text-align: center;
            padding: 1rem;
            width: 100%;
            position: fixed;
            bottom: 0;
        }
    </style>
</head>

<body>

    <div class="container-md w-75">
        <div class="card">
            <div class="card-header">
                <p class="m-0 lead fw-bold"><i class='bx fs-4 bxs-megaphone'></i> Pengumuman Hasil Seleksi</p>
            </div>
            <div class="card-body">
                <?php if ($hasil_seleksi) : ?>
                    <div class="accordion" id="accordionExample">
                        <?php foreach ($hasil_seleksi as $key => $hasil) : ?>
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?= $key; ?>" aria-expanded="false" aria-controls="collapse<?= $key ?>">
                                        Nama mahasiswa yang Lulus &nbsp; <span class="fw-bold"><?= $hasil['description'] ?></span>
                                    </button>
                                </h2>
                                <div id="collapse<?= $key ?>" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        Silahkan melihat hasil seleksi untuk <?= $hasil['description'] ?> <a href="<?= base_url() ?>assets/uploads/oprec/result/<?= $hasil['file_name'] ?>">disini</a>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php else : ?>
                    <h4 class="text-danger text-center">Belum ada pengumuman Hasil Seleksi.</h4>
                <?php endif; ?>
            </div>
            <div class="card-footer <?= ($hasil_seleksi) ? 'd-block' : 'd-none' ?>">
                <small>* Bagi mahasiswa yang belum lolos jangan patah semangat!! tetap berusaha dan kami percaya bahwa setiap dari kalian pasti memiliki potensi yang luar biasa, dan keputusan ini bukanlah refleksi dari nilai atau kemampuan Anda secara pribadi. Proses seleksi ini sangat kompetitif, dan seringkali keputusan sulit harus dibuat.</small>
            </div>
        </div>
    </div>
    <!-- Bootstrap 5 Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Footer -->
    <footer>
        <p class="m-0">&copy; 2024, Made with favorite by MaMen Tim for a better web.</p>
    </footer>
</body>

</html>