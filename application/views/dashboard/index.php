<div class="row mb-4">
    <div class="col-12 mb-4">
        <div class="card">
            <div class="d-flex align-items-center">
                <div class="flex-column <?= ($periode_active) ? 'text-success' : 'text-dark' ?>">
                    <div class="card-header"><span class="fw-bold lead"><?= ($periode_active) ? $periode_active['title'] : 'Tidak sedang oprec' ?></span><?= ($periode_active) ? ' : ' . $periode_active['description'] : '' ?></div>
                    <div class="card-body <?= ($periode_active) ? 'd-block' : 'd-none' ?>">
                        <p class="card-text"><?= ($periode_active['date_start'] == $periode_active['date_end']) ? $periode_active['date_start'] : $periode_active['date_start'] . ' s/d ' . $periode_active['date_end'] ?></p>
                    </div>
                </div>
                <!-- <div class="flex-column">
                    <div class="card-header"><i class='bx bx-chevron-right bx-sm'></i></div>
                </div>
                <div class="flex-column text-muted">
                    <div class="card-header"><span class="fw-bold lead">Periode 2</span> : Seleksi Berkas</div>
                    <div class="card-body">
                        <p class="card-text">01 Mei 2024 s/d 01 Juni 2024</p>
                    </div>
                </div>
                <div class="flex-column">
                    <div class="card-header"><i class='bx bx-chevron-right bx-sm'></i></div>
                </div>
                <div class="text-muted">
                    <div class="row flex-column justify-content-center">
                        <div class="col">
                            <div class="card-header"><span class="fw-bold lead">Periode 3</span> : Tes Tulis (Asisten)</div>
                            <div class="card-body">
                                <p class="card-text">01 Juni 2024 s/d 01 Juli 2024</p>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card-header"><span class="fw-bold lead">Periode 3</span> : Live Coding (Programmer)</div>
                            <div class="card-body">
                                <p class="card-text">01 Juni 2024 s/d 01 Juli 2024</p>
                            </div>
                        </div>
                    </div>
                </div> -->
            </div>
        </div>
    </div>
    <div class="col-md">
        <div class="card">
            <div class="card-header">Calon Asisten / Programmer</div>
            <div class="card-body text-primary">
                <p class="card-text">Depok</p>
                <h5 class="card-title"><?= $depok; ?> Orang.</h5>
            </div>
        </div>
    </div>
    <div class="col-md mt-3 mt-md-0">
        <div class="card">
            <div class="card-header">Calon Asisten / Programmer</div>
            <div class="card-body text-primary">
                <p class="card-text">Kalimalang</p>
                <h5 class="card-title"><?= $kalmal; ?> Orang.</h5>
            </div>
        </div>
    </div>
    <div class="col-md mt-3 mt-md-0">
        <div class="card">
            <div class="card-header">Calon Asisten / Programmer</div>
            <div class="card-body text-primary">
                <p class="card-text">Salemba</p>
                <h5 class="card-title"><?= $salemba; ?> Orang.</h5>
            </div>
        </div>
    </div>
    <div class="col-md mt-3 mt-md-0">
        <div class="card">
            <div class="card-header">Calon Asisten / Programmer</div>
            <div class="card-body text-primary">
                <p class="card-text">Karawaci</p>
                <h5 class="card-title"><?= $karawaci; ?> Orang.</h5>
            </div>
        </div>
    </div>
    <div class="col-md mt-3 mt-md-0">
        <div class="card">
            <div class="card-header">Calon Asisten / Programmer</div>
            <div class="card-body text-primary">
                <p class="card-text">Cengkareng</p>
                <h5 class="card-title"><?= $cengkareng; ?> Orang.</h5>
            </div>
        </div>
    </div>
</div>

<div class="card table-responsive pt-0">
    <div class="card-body">
        <table id="dashboard-table" class="datatables-basic table border-top align-middle text-center">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>NPM</th>
                    <th>Region</th>
                    <th>Penempatan</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($calas as $key => $values) : ?>
                    <tr>
                        <td><?= $key + 1 ?></td>
                        <td><?= $values['nama'] ?></td>
                        <td><?= $values['npm'] ?></td>
                        <td><?= $values['region'] ?></td>
                        <td><?= $values['penempatan'] ?></td>
                        <td>
                            <div class="dropdown">
                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="admin/show/<?= $values['id']; ?>"><i class="bx bx-edit-alt me-1"></i>Lihat</a>
                                    <!-- <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-trash me-1"></i>Delete</a> -->
                                </div>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>