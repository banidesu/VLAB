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
            </div>
        </div>
    </div>
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <span class="fw-bold h5">Hasil Seleksi</span>
            </div>
            <hr class="m-0">
            <div class="card-body">
                <div class="d-flex justify-content-end align-items-center">
                    <button class="btn btn-success btn-sm mb-4" data-bs-toggle="modal" data-bs-target="#inputHasilSeleksi"><i class='bx bxs-megaphone bx-icon me-1'></i> Umumkan Hasil Seleksi</button>
                </div>
                <div class="text-center <?= ($hasil_seleksi) ? 'd-none' : 'd-block' ?>">Tidak ada data</div>
                <div class="table-responsive <?= ($hasil_seleksi) ? 'd-block' : 'd-none' ?>">
                    <table class="table text-center">
                        <thead>
                            <tr>
                                <th>Tampil?</th>
                                <th>Judul</th>
                                <th>Deskripsi</th>
                                <th>Periode Mulai</th>
                                <th>Periode Selesai</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($hasil_seleksi as $hasil) : ?>
                                <tr>
                                    <td>
                                        <label for="checkboxTampilkanHasilSeleksi" class="form-label w-100">
                                            <input type="checkbox" class="form-check-input" id="checkboxTampilkanHasilSeleksi" title="Tampilkan" <?= ($hasil['hasil_active'] == 1) ? 'checked' : '' ?>>
                                        </label>
                                    </td>
                                    <td><?= $hasil['title'] ?></td>
                                    <td><?= $hasil['description'] ?></td>
                                    <td><?= $hasil['date_start'] ?></td>
                                    <td><?= $hasil['date_end'] ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>