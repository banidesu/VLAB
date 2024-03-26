</div>
<!-- / Content -->

<!-- Footer -->
<footer class="content-footer footer bg-footer-theme">
    <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
        <div class="mb-2 mb-md-0">
            &copy; <?= date('Y', time()) ?>, made with ❤️ by <a href="https://instagram.com/labmamen" target="_blank" class="footer-link fw-bolder">V-Lab Team</a>
        </div>
    </div>
</footer>
<!-- / Footer -->

<div class="content-backdrop fade"></div>
</div>
<!-- Content wrapper -->
</div>
<!-- / Layout page -->
</div>

<!-- Overlay -->
<div class="layout-overlay layout-menu-toggle"></div>
</div>
<!-- / Layout wrapper -->

<!-- Modal Logout -->
<div class="modal fade" id="logout" tabindex="-1" aria-labelledby="logout" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="logout">Yakin ingin keluar?</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body"></div>
            <div class="modal-footer">
                <a href="<?= base_url(); ?>login/logout" type="button" class="btn btn-primary align-items-center d-inline-flex">
                    <span class='tf-icons bx bx-log-out me-1'></span> Keluar
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Modal Input Periode -->
<div class="modal fade" id="inputPeriode" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="inputPeriodeLabel">Tambah Periode</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url() ?>admin/period" method="post" id="formPeriode">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12 mb-3">
                            <label for="title" class="form-label">Judul</label>
                            <input type="text" id="title" name="title" class="form-control" placeholder="e.g. Periode 1">
                            <small class="text-danger error-message mt-2" id="title-error"></small>
                        </div>
                        <div class="col-12 mb-3">
                            <label for="description" class="form-label">Deskripsi</label>
                            <input type="text" id="description" name="description" class="form-control" placeholder="e.g. Tes tulis (Asisten)">
                            <small class="text-danger error-message mt-2" id="description-error"></small>
                        </div>
                        <div class="col-12 mb-3">
                            <small class="fw-medium d-block">Kategori</small>
                            <div class="form-check form-check-inline mt-3">
                                <input class="form-check-input" type="radio" name="period_id" id="regist" value="1">
                                <label class="form-check-label" for="regist">Registration</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="period_id" id="seleksi" value="2">
                                <label class="form-check-label" for="seleksi">Seleksi</label>
                            </div>
                            <small class="text-danger error-message mt-2 d-block" id="period_id-error"></small>
                        </div>
                    </div>
                    <div class="row g-2">
                        <div class="col mb-0">
                            <label for="date1" class="form-label">Periode Mulai</label>
                            <input type="date" id="date1" name="date1" class="form-control">
                            <small class="text-danger error-message mt-2" id="date1-error"></small>
                        </div>
                        <div class="col mb-0">
                            <label for="date2" class="form-label">Periode Berakhir</label>
                            <input type="date" id="date2" name="date2" class="form-control">
                            <small class="text-danger error-message mt-2" id="date2-error"></small>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary text-center" id="btnPeriodeSimpan">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Input Hasil Seleksi -->
<div class="modal fade" id="inputHasilSeleksi" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="inputHasilSeleksiLabel">Umumkan Hasil Seleksi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url() ?>admin/upload" method="post" id="formUpload" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12 mb-3">
                            <label for="periode" class="form-label">Periode</label>
                            <select name="periode" id="periode" class="form-control">
                                <option selected value="">-</option>
                                <?php // Cek apakah $periodes udah di set 
                                if (isset($periodes)) : ?>
                                    <?php // Kalo ada looping datanya
                                    foreach ($periodes as $period) : ?>
                                        <?php
                                        // Konversi date_end dari database menjadi format time()
                                        $date_end_timestamp = strtotime($period['date_end']);
                                        // Panggil Time saat ini
                                        $current_timestamp = time();
                                        // Bandingkan Time saat ini dengan yang dari database
                                        if (($period['is_active'] == 0) && ($date_end_timestamp < $current_timestamp) && ($period['period_id'] != 1)) :
                                            $data_exist = false;
                                            // Lakukan pengecekan apakah data sudah ada di tabel tb_hasil
                                            foreach ($hasil_seleksi as $hasil) :
                                                if ($hasil['hasil_period_id'] == $period['id']) {
                                                    // Jika data sudah ada, tandai bahwa data sudah ada dan hentikan perulangan
                                                    $data_exist = true;
                                                    break;
                                                }
                                            endforeach;
                                            // Jika data belum ada, tambahkan pilihan di dropdown
                                            if (!$data_exist) : ?>
                                                <option value="<?= $period['id'] ?>"><?= $period['title'] ?> : <?= $period['description'] ?></option>
                                        <?php
                                            endif;
                                        endif;
                                        ?>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </select>
                            <small class="text-danger error-message mt-2" id="periode-error"></small>
                        </div>
                        <div class="col-12 mb-3">
                            <label for="excel_file" class="form-label">Upload File Excel</label>
                            <input type="file" id="excel_file" name="excel_file" class="form-control" accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet">
                            <small class="text-danger error-message mt-2" id="excel-file-error"></small>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary text-center" id="btnHasilSeleksiSimpan">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Close Oprec -->
<div class="modal fade" id="closeOprec" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-danger" id="closeOprecLabel">Close Oprec</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url() ?>admin/closeoprec" method="post" id="formCloseOprec">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12 mb-3">
                            <label for="confirm" class="form-label text-danger">ketik "Konfirmasi"</label>
                            <input type="text" id="confirm" name="confirm" class="form-control border-danger text-danger">
                            <small class="text-danger error-message mt-2" id="confirm-error"></small>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger text-center btn-sm rounded-pill" id="btnCloseOprec">Tutup Oprec</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Activate Periode -->
<?php if (isset($periodes)) : ?>
    <div class="modal fade" id="activePeriode" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <form action="<?= base_url() ?>admin/period" method="post" id="formPeriode">
                        <small class="text-light fw-medium">Pilih Periode yang sedang berjalan</small>
                        <?php foreach ($periodes as $period) : ?>
                            <div class="form-check mt-3">
                                <input name="is_active" class="form-check-input" type="radio" <?= ($period['is_active'] == 1) ? 'checked disabled' : '' ?> data-period-id="<?= $period['id'] ?>" id="<?= $period['title'] ?>">
                                <label class="form-check-label" for="<?= $period['title'] ?>">
                                    <?= $period['title'] . ' : ' . $period['description'] ?>
                                </label>
                            </div>
                        <?php endforeach; ?>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>

<div class="bs-toast toast fade position-fixed bg-success" id="toastPeriode" style="top: 2em; right: 2em;" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="toast-header">
        <div class="me-auto fw-medium">Berhasil</div>
        <i class='bx bx-check-double me-2'></i>
        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
    <div class="toast-body"></div>
</div>
<!-- Core JS -->
<!-- build:js assets/vendor/js/core.js -->
<script src="<?= base_url() ?>assets/vendor/vendor/libs/jquery/jquery.js"></script>
<script src="<?= base_url() ?>assets/vendor/vendor/libs/popper/popper.js"></script>
<script src="<?= base_url() ?>assets/vendor/vendor/js/bootstrap.js"></script>
<script src="<?= base_url() ?>assets/vendor/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

<script src="<?= base_url() ?>assets/vendor/vendor/js/menu.js"></script>
<!-- endbuild -->

<!-- Vendors JS -->
<script src="<?= base_url() ?>assets/vendor/vendor/libs/apex-charts/apexcharts.js"></script>

<!-- Main JS -->
<script src="<?= base_url() ?>assets/vendor/js/main.js"></script>

<!-- Page JS -->
<script src="<?= base_url() ?>assets/vendor/js/dashboards-analytics.js"></script>

<!-- Datatables JS -->
<script src="<?= base_url() ?>vendor/datatables/dataTables.min.js"></script>

<script>
    $(document).ready(function() {
        $('#dashboard-table').DataTable({
            initComplete: function() {
                <?php if (isset($calas)) : ?>
                    $('<div class="row mt-2 justify-content-end download-files"><div class="col-md-auto ms-auto"></div></div>').insertAfter('#dashboard-table_wrapper>div:first-child()');
                    $('.download-files>div').append('<button class="btn btn-sm btn-outline-info me-3" data-id="ASD">Download Asisten Depok</button>');
                    $('.download-files>div').append('<button class="btn btn-sm btn-outline-info me-3 mt-2 mt-md-0" data-id="ASJ">Download Asisten Kalimalang</button>');
                    $('.download-files>div').append('<button class="btn btn-sm btn-outline-primary me-3 mt-2 mt-md-0" data-id="APD">Download Programmer Depok</button>');
                    $('.download-files>div').append('<button class="btn btn-sm btn-outline-primary mt-2 mt-md-0" data-id="APJ">Download Programmer Kalimalang</button>');
                <?php endif; ?>
            }
        });

        $('#formPeriode').submit(function(e) {
            e.preventDefault();

            var formData = $(this).serialize();

            $.ajax({
                url: <?php base_url() ?> 'period',
                type: 'POST',
                data: formData,
                dataType: 'json',
                beforeSend: function() {
                    $('#btnPeriodeSimpan').attr('disabled', true).html(
                        `<small class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></small>`
                    );
                },
                success: function(response) {
                    $('#btnPeriodeSimpan').removeAttr('disabled').html('Simpan');
                    // Check if response contains validation errors
                    if (response.status === 'error') {
                        // Clear previous error messages
                        $('.error-message').text('');

                        // Display each error message below the respective input field
                        $.each(response.message, function(field, errorMessage) {
                            errorMessage = errorMessage.replace(/<\/?[^>]+(>|$)/g, "");
                            $('#' + field + '-error').text(errorMessage);
                        });
                    } else {
                        var toastPeriode = $('#toastPeriode');
                        var toastBody = toastPeriode.find('.toast-body');
                        toastBody.eq(0).text(response.message);
                        var toastPeriodeElement = new bootstrap.Toast(toastPeriode, {
                            animation: true,
                            delay: 2000
                        })
                        $('#inputPeriode').modal('hide');
                        toastPeriodeElement.show();

                        setTimeout(() => {
                            location.reload();
                        }, 2500);
                    }
                },
                error: function(xhr, status, error) {
                    // Log AJAX errors
                    console.error('AJAX Error:', error);
                    console.log('Response:', xhr.responseText);
                    alert("error");
                }
            });
        });

        $('input[name=is_active]').on('click', function() {
            const periodId = $(this).data('period-id');

            $.ajax({
                url: "<?= base_url('admin/changeactiveperiod') ?>",
                type: 'post',
                dataType: 'json',
                data: {
                    id: periodId
                },
                success: function(response) {
                    var toastPeriode = $('#toastPeriode');
                    var toastBody = toastPeriode.find('.toast-body');
                    toastBody.eq(0).text(response.message);
                    var toastPeriodeElement = new bootstrap.Toast(toastPeriode, {
                        animation: true,
                        delay: 2000
                    })
                    $('#activePeriode').modal('hide');
                    toastPeriodeElement.show();

                    setTimeout(() => {
                        location.reload();
                    }, 2500);
                },
                error: function(xhr, status, error) {
                    // Log AJAX errors
                    console.error('AJAX Error:', error);
                    console.log('Response:', xhr.responseText);
                    alert("error");
                }
            });
        });

        $('#formCloseOprec').submit(function(e) {
            e.preventDefault();

            var formData = $(this).serialize();

            $.ajax({
                url: $(this).attr('action'),
                type: $(this).attr('method'),
                data: formData,
                dataType: 'json',
                beforeSend: function() {
                    $('#btnCloseOprec').attr('disabled', true).html(
                        `<small class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></small>`
                    );
                },
                success: function(r) {
                    $('#btnCloseOprec').removeAttr('disabled').html('Tutup Oprec');

                    if (r.status === 'error') {
                        // Clear previous error messages
                        $('.error-message').text('');

                        // Display each error message below the respective input field
                        $.each(r.message, function(field, errorMessage) {
                            errorMessage = errorMessage.replace(/<\/?[^>]+(>|$)/g, "");
                            $('#' + field + '-error').text(errorMessage);
                        });
                    } else {
                        var toastPeriode = $('#toastPeriode');
                        var toastBody = toastPeriode.find('.toast-body');
                        toastBody.eq(0).text(r.message);
                        var toastPeriodeElement = new bootstrap.Toast(toastPeriode, {
                            animation: true,
                            delay: 3000
                        })
                        $('#closeOprec').modal('hide');
                        toastPeriodeElement.show();

                        setTimeout(() => {
                            location.reload();
                        }, 3500);
                    }
                },
                error: function(xhr, status, error) {
                    // Log AJAX errors
                    console.error('AJAX Error:', error);
                    console.log('Response:', xhr.responseText);
                    alert("error");
                }
            });
        });

        $('.download-files>div>button').each(function() {
            $(this).on('click', function() {
                var dataId = {
                    id: $(this).data('id')
                };

                $.ajax({
                    url: '<?php echo base_url(); ?>Admin/getCalasPerDivisiPerRegion',
                    type: 'post',
                    data: dataId,
                    xhrFields: {
                        responseType: 'blob'
                    },
                    success: function(response, status, xhr) {
                        // Check if the request was successful (status code 200)
                        if (xhr.status === 200) {
                            var byteLength = response.size;

                            // Check if the byte length is greater than 0
                            if (byteLength > 0) {
                                var url = window.URL.createObjectURL(response);

                                var filename = "";
                                var disposition = xhr.getResponseHeader('Content-Disposition');
                                if (disposition && disposition.indexOf('attachment') !== -1) {
                                    var filenameRegex = /filename[^;=\n]*=((['"]).*?\2|[^;\n]*)/;
                                    var matches = filenameRegex.exec(disposition);
                                    if (matches != null && matches[1]) {
                                        filename = matches[1].replace(/['"]/g, '');
                                    }
                                }

                                // Create an anchor element to initiate the download
                                var downloadLink = document.createElement('a');
                                downloadLink.href = url;
                                downloadLink.download = filename + '.zip';
                                document.body.appendChild(downloadLink);
                                // Initiate the download
                                downloadLink.click();

                                // Cleanup
                                window.URL.revokeObjectURL(url);
                                document.body.removeChild(downloadLink);
                            } else {
                                // If the zip file is empty, show an alert to the user
                                var toastPeriode = $('#toastPeriode');
                                toastPeriode.removeClass('bg-success').addClass('bg-danger');
                                var toastBody = toastPeriode.find('.toast-body');
                                var toastHeader = toastPeriode.find('.toast-header');
                                toastHeader.find('div').text('Gagal');
                                toastHeader.find('i').removeClass('bx bx-check-double').addClass('bx bx-user-x');
                                toastBody.text("Tidak ada calas pada region ini.");
                                var toastPeriodeElement = new bootstrap.Toast(toastPeriode, {
                                    animation: true,
                                    delay: 4000
                                })
                                toastPeriodeElement.show();
                            }
                        } else {
                            // If the request was not successful, show an alert to the user
                            alert("Failed to fetch data. Status: " + xhr.status);
                        }
                    },
                    error: function(xhr, status, error) {
                        // Log AJAX errors
                        console.error('AJAX Error:', error);
                        console.log('Response:', xhr.responseText);
                        alert("Error occurred while fetching data");
                    }
                });
            });
        });

        $('#formUpload').submit(function(e) {
            e.preventDefault();

            var formData = new FormData(this);

            $.ajax({
                url: $(this).attr('action'),
                type: $(this).attr('method'),
                data: formData,
                dataType: 'json',
                contentType: false,
                processData: false,
                beforeSend: function() {
                    $('#btnHasilSeleksiSimpan').attr('disabled', true).html(
                        `<small class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></small>`
                    );
                },
                success: function(r) {
                    $('#btnHasilSeleksiSimpan').removeAttr('disabled').html('Simpan');

                    if (r.status === 'error') {
                        $('.error-message').text('');
                        $.each(r.message, function(field, errorMessage) {
                            errorMessage = errorMessage.replace(/<\/?[^>]+(>|$)/g, "");
                            $('#' + field + '-error').text(errorMessage);
                        });
                    } else {
                        var toastPeriode = $('#toastPeriode');
                        var toastBody = toastPeriode.find('.toast-body');
                        toastBody.text(r.message);
                        var toastPeriodeElement = new bootstrap.Toast(toastPeriode, {
                            animation: true,
                            delay: 2000
                        })
                        $('#inputHasilSeleksi').modal('hide');
                        toastPeriodeElement.show();

                        setTimeout(() => {
                            location.reload();
                        }, 2500);
                    }
                },
                error: function(xhr, status, error) {
                    // Log AJAX errors
                    console.error('AJAX Error:', error);
                    console.log('Response:', xhr.responseText);
                    alert("error");
                }
            });
        });
    });
</script>

<!-- Place this tag in your head or just before your close body tag. -->
<script async defer src="https://buttons.github.io/buttons.js"></script>
</body>

</html>