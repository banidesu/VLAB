<div class="row mb-4">
    <div class="col-md-4 mb-4">
        <div class="card">
            <div class="card-header">
                <span class="fw-bold h5">Status</span>
            </div>
            <hr class="m-0">
            <div class="card-body text-center <?= ($periodes) ? 'd-none' : 'd-block' ?>">Tidak ada data</div>
            <?php if ($periodes) : $lastPeriod = false; ?>
                <div class="d-flex flex-column align-items-center text-center">
                    <?php foreach ($periodes as $periode) : ?>
                        <?php if ($periode['title'] !== 'end') : ?>
                            <div class="<?= ($periode['is_active'] == 1) ? 'text-primary' : 'text-muted' ?>">
                                <div class="card-header"><span class="<?= ($periode['is_active'] == 1) ? 'fw-bold lead' : '' ?>"><?= $periode['title'] ?></span> : <?= $periode['description'] ?></div>
                                <div class="card-body">
                                    <p class="card-text"><?= ($periode['date_start'] == $periode['date_end']) ? $periode['date_start'] : $periode['date_start'] . ' s/d ' . $periode['date_end'] ?></p>
                                </div>
                            </div>
                            <div class="flex-column" id="arrowPeriode">
                                <div class="card-header p-0"><i class='bx bx-chevron-down bx-sm'></i></div>
                            </div>
                        <?php else : $lastPeriod = true; ?>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
                <div class="card-body text-center">
                    <button class="btn btn-<?= (!$lastPeriod) ? 'warning' : 'info' ?>" id="btnLastPeriod"><?= (!$lastPeriod) ? 'Terakhir?' : 'Ada perubahan?' ?></button>
                </div>
            <?php endif; ?>
        </div>
    </div>
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <span class="fw-bold h5">Setting Periode</span>
            </div>
            <hr class="m-0">
            <div class="card-body">
                <div class="d-flex justify-content-end align-items-center">
                    <?php $lastPeriod = false;
                    if ($periodes) : ?>
                        <?php foreach ($periodes as $periode) : ?>
                            <?php if ($periode['title'] === 'end') : ?>
                                <?php $lastPeriod = true; ?>
                                <?php break; ?>
                            <?php endif; ?>
                        <?php endforeach; ?>
                        <?php if (!$lastPeriod) : ?>
                            <button class="btn btn-outline-success btn-sm mb-4 me-2" data-bs-toggle="modal" data-bs-target="#activePeriode"><i class='bx bx-calendar-check bx-icon me-1'></i> Activate Periode</button>
                        <?php endif; ?>
                        <button class="btn btn-outline-danger btn-sm mb-4 me-2" data-bs-toggle="modal" data-bs-target="#closeOprec"><i class='bx bx-window-close bx-icon me-1'></i> Close Oprec</button>
                    <?php endif; ?>
                    <?php if (!$lastPeriod) : ?>
                        <button class="btn btn-primary btn-sm mb-4" data-bs-toggle="modal" data-bs-target="#inputPeriode"><i class='bx bx-calendar-plus bx-icon me-1'></i> Tambah Periode</button>
                    <?php endif; ?>
                </div>
                <div class="text-center <?= ($periodes) ? 'd-none' : 'd-block' ?>">Tidak ada data</div>
                <div class="table-responsive <?= ($periodes) ? 'd-block' : 'd-none' ?>">
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
                                <?php if ($periode['title'] !== 'end') : ?>
                                    <tr>
                                        <td><?= $periode['title'] ?></td>
                                        <td><?= $periode['description'] ?></td>
                                        <td><?= $periode['date_start'] ?></td>
                                        <td><?= $periode['date_end'] ?></td>
                                    </tr>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>