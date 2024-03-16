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

<div class="bs-toast toast fade position-fixed bg-success" id="toastPeriode" style="top: 2em; right: 2em;" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="toast-header">
        <div class="me-auto fw-medium">Berhasil</div>
        <i class='bx bx-check-double me-2'></i>
        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
    <div class="toast-body">Data periode berhasil ditambahkan</div>
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
        $('#dashboard-table').DataTable();

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
                        var toastPeriode = $($('#toastPeriode'));
                        var toastPeriodeElement = new bootstrap.Toast(toastPeriode, {
                            animation: true,
                            delay: 4000
                        })
                        $('#inputPeriode').modal('hide');
                        toastPeriodeElement.show();

                        setTimeout(() => {
                            location.reload();
                        }, 4500);
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