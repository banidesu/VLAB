<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accordion without Box Styling</title>
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

        .accordion-wrapper {
            background-color: white;
            border-radius: 20px;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .accordion {
            max-width: 600px;
            width: 100%;
        }

        .accordion-header {
            background-color: transparent;
            border: none;
            border-radius: 0;
            margin-bottom: 10px;
        }

        .accordion-button {
            color: white;
            text-decoration: none;
            padding: 1rem;
            display: block;
            width: 100%;
            text-align: left;
            background-color: rgba(0, 0, 0, 0.5);
            border-radius: 5px;
        }

        .accordion-button:hover {
            background-color: rgba(0, 0, 0, 0.7);
        }

        .accordion-body {
            background-color: rgba(0, 0, 0, 0.1);
            padding: 1rem;
            border-radius: 5px;
            color: white;
        }

        .accordion-body strong {
            color: white;
        }

        /* Style for the footer */
        footer {
            background-color: rgba(0, 0, 0, 0.5);
            color: white;
            text-align: center;
            padding: 10px;
            width: 100%;
            position: fixed;
            bottom: 0;
        }
    </style>
</head>

<body>

    <div class="accordion" id="accordionExample">
        <div>
            <h2 class="accordion-header" id="headingOne">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    Nama Siswa yang Lulus Tahap 1 (Pemberkasan)
                </button>
            </h2>
            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    Selamat kepada peserta yang lulus tahap 1, <a href="https://drive.google.com/file/d/1d9oIZjgyFf_boYJ6Yk4t3ZpA7iieDpAn/view" target="_blank">Cek Disini!</a>
                </div>
            </div>
        </div>

        <div>
            <h2 class="accordion-header" id="headingTwo">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    Nama Siswa yang Lulus Tahap 2 (Tes Tertulis dan live coding)
                </button>
            </h2>
            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    Selamat kepada peserta yang lulus tahap 2, <a href="">Cek Disini!</a>
                </div>
            </div>
        </div>

        <div>
            <h2 class="accordion-header" id="headingThree">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                    Nama Siswa yang Lulus Tahap 3 (Test Desain Khusus Programmer)
                </button>
            </h2>
            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    Selamat kepada peserta yang lulus tahap 3, <a href="">Cek Disini!</a>
                </div>
            </div>
        </div>
        <div>
            <h2 class="accordion-header" id="headingFour">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                    Nama Siswa yang Lulus Tahap 4 (Test Tutor)
                </button>
            </h2>
            <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    Selamat kepada peserta yang lulus tahap 4, <a href="">Cek Disini!</a>
                </div>
            </div>
        </div>
        <div>
            <h2 class="accordion-header" id="headingFive">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                    Nama Siswa yang Lulus Tahap 5 (Test Interview 1)
                </button>
            </h2>
            <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    Selamat kepada peserta yang lulus tahap 5, <a href="">Cek Disini!</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap 5 Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Footer -->
    <footer>
        <p>&copy; 2024, Made with favorite by MaMen Tim for a better web.</p>
    </footer>
</body>

</html>