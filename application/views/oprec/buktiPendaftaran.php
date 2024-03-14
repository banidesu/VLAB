<?php
// siapin data
$nama = htmlspecialchars(ucwords($this->input->post('name', true)));
$npm = htmlspecialchars($this->input->post('npm', true));
$kelas = htmlspecialchars(strtoupper($this->input->post('class', true)));
$jurusan = htmlspecialchars($this->input->post('jurusan', true));
$region = $this->input->post('region', true);
$divisi = $this->input->post('placement', true);
$agama = htmlspecialchars(ucwords($this->input->post('agama', true)));
$email = htmlspecialchars(strtolower($this->input->post('email', true)));
$no_telp = htmlspecialchars($this->input->post('no_telp', true));
$alamat = htmlspecialchars($this->input->post('address', true));
$ttl = htmlspecialchars(ucwords($this->input->post('tempat-lahir', true))) . ', ' . htmlspecialchars($this->input->post('tanggal-lahir', true));
$sosmed = htmlspecialchars(strtolower($this->input->post('sosmed', true)));

// ini logic nya
$prefix = ($divisi == 'asisten') ? 'AS' : 'AP';
$suffix  =
    ($region == 'depok') ? 'D'
    : (($region == 'kalimalang') ? 'J'
        : (($region == 'salemba') ? 'C'
            : (($region == 'karawaci') ? 'K' : 'L')));

$this->db->select('COUNT(*) as count');
$this->db->from('tb_peserta');
$this->db->where('penempatan', $divisi);
$this->db->where('region', $region);
$jumlah_per_divisi_per_region = $this->db->get()->row()->count;

$nomor_urut_per_divisi_per_region = str_pad($jumlah_per_divisi_per_region, 3, '0', STR_PAD_LEFT); // Asumsi maksimal 999 orang per region per divisi

// Generate Code
$form_code = $prefix . $suffix . $nomor_urut_per_divisi_per_region;

// Ngambil jurusan dari tabel tb_jurusan
$this->db->select('tb_jurusan.jurusan');
$this->db->from('tb_jurusan');
$this->db->join('tb_peserta', 'tb_peserta.jurusan = tb_jurusan.id');
$this->db->where('tb_peserta.email', $email);
$jurusan = $this->db->get()->row()->jurusan;
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Form Bukti Pendaftaran Lab Mamen</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
        }

        .head {
            display: flex;
            text-align: center;
            font-size: 24px;
        }

        table,
        th,
        td {
            padding: 12.8px;
            border: 1px solid lightgray;
            border-collapse: collapse;
        }
    </style>
</head>

<body>
    <div class="head" style="margin: 32px 0 16px;">
        <p style="margin-bottom: 16px;">Form Pendaftaran Asisten</p>
        <p>Laboratorium Manajemen Menengah</p>
    </div>

    <div style="margin: 0 48px;">
        <table style="width: 100%; font-size: 12.8px; table-layout: fixed;">
            <tr>
                <th style="text-align: left; width: 26%;">No Pendaftaran :</th>
                <th style="text-align: left;"><?= $form_code; ?></th>
                <th rowspan="8" style="width: 25%;">Tempel Foto Disini</th>
            </tr>
            <tr>
                <th style="text-align: left; width: 26%;">Nama Lengkap :</th>
                <th style="text-align: left;"><?= $nama; ?></th>
            </tr>
            <tr>
                <th style="text-align: left; width: 26%;">NPM / Kelas :</th>
                <th style="text-align: left;"><?= $npm . ' / ' . $kelas; ?></th>
            </tr>
            <tr>
                <th style="text-align: left; width: 26%;">Jurusan :</th>
                <th style="text-align: left;"><?= $jurusan; ?></th>
            </tr>
            <tr>
                <th style="text-align: left; width: 26%;">Tempat, Tanggal Lahir :</th>
                <th style="text-align: left;"><?= $ttl; ?></th>
            </tr>
            <tr>
                <th style="text-align: left; width: 26%;">Alamat :</th>
                <th style="text-align: left;"><?= $alamat; ?></th>
            </tr>
            <tr>
                <th style="text-align: left; width: 26%;">Agama :</th>
                <th style="text-align: left;"><?= $agama; ?></th>
            </tr>
            <tr>
                <th style="text-align: left; width: 26%;">No Telepon / HP :</th>
                <th style="text-align: left;"><?= $no_telp; ?></th>
            </tr>
        </table>
        <p style="font-size: 16px; margin: 10px 0 16px; text-align: center;">Syarat Pendaftaran</p>
        <div style="text-align: center; font-size: 12px;">
            <div style="width: 33.33333333%; float: left;">
                <p style="margin-bottom: 10px;">Fotocopy KRS (___)</p>
                <p style="margin-bottom: 10px;">Fotocopy KTP (___)</p>
                <p>CV (___)</p>
            </div>
            <div style="width: 33.33333333%; float: left;">
                <p style="margin-bottom: 10px;">Fotocopy Rangkuman Nilai (___)</p>
                <p style="margin-bottom: 10px;">Surat Lamaran (___)</p>
                <p>Foto 4x6 (2 lembar) (___)</p>
            </div>
            <div style="width: 33.33333333%; float: left;">
                <p style="margin-bottom: 10px;">Motivation Letter (___)</p>
                <p>Nilai IPK (___)</p>
            </div>
            <div style="clear: both;"></div>
        </div>
        <p style="font-size: 14px; margin: 16px 0 10px; text-align: center;">Depok, <?= date('d M Y', time()); ?></p>
        <div style="text-align: center; font-size: 14px;">
            <div style="width: 50%; float: left;">
                <p style="margin-bottom: 32px;">Pelamar</p>
                <span>(____________)</span>
            </div>
            <div style="width: 50%; float: left;">
                <p style="margin-bottom: 32px;">Petugas Pendaftaran</p>
                <span>(____________)</span>
            </div>
            <div style="clear: both;"></div>
        </div>
        <hr style="border: 1px dotted black; margin: 16px 0 8px;">
        <table style="width: 100%; font-size: 12.8px; table-layout: fixed;">
            <tr>
                <th style="text-align: left; width: 26%;">No Pendaftaran :</th>
                <th style="text-align: left;"><?= $form_code; ?></th>
                <th rowspan="3" style="width: 25%;">Tempel Foto Disini</th>
            </tr>
            <tr>
                <th style="text-align: left; width: 26%;">Nama Lengkap :</th>
                <th style="text-align: left;"><?= $nama; ?></th>
            </tr>
            <tr>
                <th style="text-align: left; width: 26%;">NPM / Kelas :</th>
                <th style="text-align: left;"><?= $npm . ' / ' . $kelas; ?></th>
            </tr>
        </table>
        <p style="font-size: 14px; margin: 10px 0; text-align: center;">Depok, <?= date('d M Y', time()); ?></p>
        <div style="text-align: center; font-size: 14px;">
            <div style="width: 50%; float: left;">
                <p style="margin-bottom: 32px;">Pelamar</p>
                <span>(____________)</span>
            </div>
            <div style="width: 50%; float: left;">
                <p style="margin-bottom: 32px;">Petugas Pendaftaran</p>
                <span>(____________)</span>
            </div>
            <div style="clear: both;"></div>
        </div>
    </div>
</body>

</html>