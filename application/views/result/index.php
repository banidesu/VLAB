<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-image: url('<?php echo base_url(); ?>assets/virtual/img/intro2.png');
            background-size: cover;
            background-repeat: no-repeat;
        }

        .header {
            color: #000;
            padding: 20px;
            text-align: center;
            border-radius: 20px;
        }

        .container {
            max-width: 500px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
            color: #333;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <h1>Siswa yang lulus tahap 1</h1>
        </div>

        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>No Pendaftaran</th>
                    <th>Jurusan</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>John Doe</td>
                    <td>123456</td>
                    <td>Computer Science</td>
                </tr>
                <!-- Add more rows as needed -->
            </tbody>
        </table>
    </div>
</body>

</html>