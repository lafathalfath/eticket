</div>
<!-- End of Main Content -->

<!-- Footer -->
<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright &copy; E-Ticketing BSN 2020</span>
        </div>
    </div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="<?= base_url('logout') ?>">Logout</a>
            </div>
        </div>
    </div>
</div>
<script>
$('.custom-file-input').on('change', function() {
  let fileName =$(this).val().split('\\').pop();
  $(this).next('.custom-file-label').addClass("selected").html(fileName);
});
</script>

<!-- Bootstrap core JavaScript-->
<script src="<?= base_url() ?>assets/back_template/vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url() ?>assets/back_template/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?= base_url() ?>assets/back_template/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?= base_url() ?>assets/back_template/js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="<?= base_url() ?>assets/back_template/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>assets/back_template/vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="<?= base_url() ?>assets/back_template/js/demo/datatables-demo.js"></script>

<!-- Summer Note -->
<script src="<?= base_url('assets/back_template/vendor/summernote/summernote.min.js'); ?>"></script>

<script src="<?= base_url('assets/user_template/js/sweetalert2.min.js') ?>"></script>
<script src="<?= base_url('assets/global_assets/js/plugins/ui/moment/moment.min.js') ?>"></script>

<script src="<?= base_url('assets/global_assets/js/plugins/pickers/daterangepicker.js') ?>"></script>

<script src="<?= base_url('assets/global_assets/js/plugins/forms/selects/select2.min.js') ?>"></script>

<script src="<?= base_url('assets/user_template/js/app/functions.js') ?>"></script>

<!-- Pnotify 4 -->
<script src="<?= base_url('assets/user_template/plugins/pnotify/bootstrap/PNotifyBootstrap4.js'); ?>"></script>
<script src="<?= base_url('assets/user_template/plugins/pnotify/core/dist/PNotify.js'); ?>"></script>
<script src="<?= base_url('assets/user_template/plugins/pnotify/confirm/PNotifyConfirm.js'); ?>"></script>
<!-- ================== -->
</body>
