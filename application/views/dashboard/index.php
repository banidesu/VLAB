<div class="card table-responsive pt-0">
    <div class="card-body">
        <table id="dashboard-table" class="datatables-basic table border-top">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>NPM</th>
                    <th>Region</th>
                    <th>Penempatan</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($calas as $values) : ?>
                    <tr>
                        <?php foreach ($values as $value) : ?>
                            <td><?= $value['nama'] ?></td>
                        <?php endforeach; ?>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>