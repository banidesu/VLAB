<div class="row mb-4">
    <div class="col-md-4 mb-4">
        <div class="card">
            <div class="card-header">
                <span class="fw-bold h5">Status</span>
            </div>
            <hr class="m-0">
            <div class="d-flex flex-column align-items-center text-center">
                <?php foreach ($periodes as $periode) : ?>
                    <div class="<?= ($periode['is_active'] === 1) ? 'text-primary' : 'text-muted' ?>">
                        <div class="card-header"><span class="<?= ($periode['is_active'] === 1) ? 'fw-bold lead' : '' ?>"><?= $periode['title'] ?></span> : <?= $periode['description'] ?></div>
                        <div class="card-body">
                            <p class="card-text"><?= ($periode['date_start'] == $periode['date_end']) ? $periode['date_start'] : $periode['date_start'] . ' s/d ' . $periode['date_end'] ?></p>
                        </div>
                    </div>
                    <div class="flex-column" id="arrowPeriode">
                        <div class="card-header"><i class='bx bx-chevron-down bx-sm'></i></div>
                    </div>
                <?php endforeach; ?>
                <!-- <div class="text-muted">
                    <div class="card-header"><span>Periode 2</span> : Seleksi Berkas</div>
                    <div class="card-body">
                        <p class="card-text">31 Mei 2024 s/d 09 Juni 2024</p>
                    </div>
                </div>
                <div class="flex-column">
                    <div class="card-header"><i class='bx bx-chevron-down bx-sm'></i></div>
                </div>
                <div class="text-muted">
                    <div class="card-header"><span>Periode 3</span> : Tes Tulis (Asisten) & Live Coding & Design (Programmer)</div>
                    <div class="card-body">
                        <p class="card-text">09 Juni 2024</p>
                    </div>
                </div>
                <div class="flex-column">
                    <div class="card-header"><i class='bx bx-chevron-down bx-sm'></i></div>
                </div>
                <div class="text-muted">
                    <div class="card-header"><span>Periode 4</span> : Tes Tutor (Asisten & Programmer)</div>
                    <div class="card-body">
                        <p class="card-text">16 Juni 2024</p>
                    </div>
                </div>
                <div class="flex-column">
                    <div class="card-header"><i class='bx bx-chevron-down bx-sm'></i></div>
                </div>
                <div class="text-muted">
                    <div class="card-header"><span>Periode 5</span> : Tes Wawancara (Asisten & Programmer)</div>
                    <div class="card-body">
                        <p class="card-text">24 Juni 2024</p>
                    </div>
                </div>
                <div class="flex-column">
                    <div class="card-header"><i class='bx bx-chevron-down bx-sm'></i></div>
                </div>
                <div class="text-muted">
                    <div class="card-header"><span>Periode 6</span> : Tes wawancara staff</div>
                    <div class="card-body">
                        <p class="card-text">-</p>
                    </div>
                </div> -->
            </div>
        </div>
    </div>
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <span class="fw-bold h5">Setting Periode</span>
            </div>
            <hr class="m-0">
            <div class="card-body">
                <div class="d-flex justify-content-end">
                    <button class="btn btn-primary btn-sm mb-4" data-bs-toggle="modal" data-bs-target="#inputPeriode"><i class='bx bx-bookmark-alt-plus bx-icon me-1'></i> Tambah Periode</button>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered text-center">
                        <thead>
                            <tr>
                                <th>Judul</th>
                                <th>Deskripsi</th>
                                <th>Periode Mulai</th>
                                <th>Periode Selesai</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($periodes as $periode) : ?>
                                <tr>
                                    <td><?= $periode['title'] ?></td>
                                    <td><?= $periode['description'] ?></td>
                                    <td><?= $periode['date_start'] ?></td>
                                    <td><?= $periode['date_end'] ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>