<div class="row mb-4">
    <div class="col-md">
        <div class="card">
            <div class="card-header">Calon Asisten / Programmer</div>
            <div class="card-body text-primary">
                <p class="card-text">Depok</p>
                <h5 class="card-title">17 Orang.</h5>
            </div>
        </div>
    </div>
    <div class="col-md mt-3 mt-md-0">
        <div class="card">
            <div class="card-header">Calon Asisten / Programmer</div>
            <div class="card-body text-primary">
                <p class="card-text">Kalimalang</p>
                <h5 class="card-title">15 Orang.</h5>
            </div>
        </div>
    </div>
    <div class="col-md mt-3 mt-md-0">
        <div class="card">
            <div class="card-header">Calon Asisten / Programmer</div>
            <div class="card-body text-primary">
                <p class="card-text">Salemba</p>
                <h5 class="card-title">6 Orang.</h5>
            </div>
        </div>
    </div>
    <div class="col-md mt-3 mt-md-0">
        <div class="card">
            <div class="card-header">Calon Asisten / Programmer</div>
            <div class="card-body text-primary">
                <p class="card-text">Karawaci</p>
                <h5 class="card-title">4 Orang.</h5>
            </div>
        </div>
    </div>
    <div class="col-md mt-3 mt-md-0">
        <div class="card">
            <div class="card-header">Calon Asisten / Programmer</div>
            <div class="card-body text-primary">
                <p class="card-text">Cengkareng</p>
                <h5 class="card-title">5 Orang.</h5>
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
                                    <a class="dropdown-item" href="admin/<?= $values['id'] ?>"><i class="bx bx-edit-alt me-1"></i>Lihat</a>
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