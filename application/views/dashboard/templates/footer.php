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

<!-- Modal -->
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
    });
</script>

<!-- Place this tag in your head or just before your close body tag. -->
<script async defer src="https://buttons.github.io/buttons.js"></script>
</body>

</html>