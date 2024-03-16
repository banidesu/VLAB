<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header"><span class="fw-bold h5">Data Calas</span></div>
            <hr class="m-0">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <tbody>
                            <tr>
                                <td>Nama</td>
                                <td>:</td>
                                <td style="width: 60%;"><?= $calas['nama'] ?></td>
                            </tr>
                            <tr>
                                <td>Kelas</td>
                                <td>:</td>
                                <td style="width: 60%;"><?= $calas['kelas'] ?></td>
                            </tr>
                            <tr>
                                <td>Jurusan</td>
                                <td>:</td>
                                <td style="width: 60%;"><?= $calas['nama_jurusan'] ?></td>
                            </tr>
                            <tr>
                                <td>Region</td>
                                <td>:</td>
                                <td style="width: 60%;"><?= $calas['region'] ?></td>
                            </tr>
                            <tr>
                                <td>Penempatan</td>
                                <td>:</td>
                                <td style="width: 60%;"><?= $calas['penempatan'] ?></td>
                            </tr>
                            <tr>
                                <td>No Telp</td>
                                <td>:</td>
                                <td style="width: 60%;"><?= $calas['no_telp'] ?></td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td>:</td>
                                <td style="width: 60%;"><?= $calas['email'] ?></td>
                            </tr>
                            <tr>
                                <td>Tempat Tanggal Lahir</td>
                                <td>:</td>
                                <td style="width: 60%;"><?= $calas['ttl'] ?></td>
                            </tr>
                            <tr>
                                <td>NPM</td>
                                <td>:</td>
                                <td style="width: 60%;"><?= $calas['npm'] ?></td>
                            </tr>
                            <tr>
                                <td>Alamat</td>
                                <td>:</td>
                                <td style="width: 60%;"><?= $calas['alamat'] ?></td>
                            </tr>
                            <tr>
                                <td>Agama</td>
                                <td>:</td>
                                <td style="width: 60%;"><?= $calas['agama'] ?></td>
                            </tr>
                            <tr>
                                <td>Sosial Media</td>
                                <td>:</td>
                                <td style="width: 60%;"><a href="<?= $calas['sosmed'] ?>"><?= $calas['sosmed'] ?></a></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4 mt-4 mt-md-0">
        <div class="card">
            <div class="card-header"><span class="fw-bold h5">Archive</span></div>
            <hr class="m-0">
            <div class="card-body">
                <p>Unduh Berkas :</p>
                <a href="<?= base_url() ?>assets/uploads/oprec/<?= $calas['archive'] ?>" target="_blank"><?= $calas['archive'] ?></a>
            </div>
        </div>
    </div>
</div>