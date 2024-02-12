<!-- Vendor JS Files -->
<script src="<?= base_url(); ?>assets/front_template/vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url(); ?>assets/front_template/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url(); ?>assets/front_template/vendor/jquery.easing/jquery.easing.min.js"></script>

<script src="<?= base_url(); ?>assets/front_template/vendor/waypoints/jquery.waypoints.min.js"></script>
<script src="<?= base_url(); ?>assets/front_template/vendor/isotope-layout/isotope.pkgd.min.js"></script>
<script src="<?= base_url(); ?>assets/front_template/vendor/owl.carousel/owl.carousel.min.js"></script>
<script src="<?= base_url(); ?>assets/front_template/vendor/aos/aos.js"></script>
<script src="<?= base_url(); ?>assets/global_assets/js/plugins/forms/validation/validate.min.js"></script>

<!-- Template Main JS File -->
<script src="<?= base_url(); ?>assets/front_template/js/main.js"></script>

<!-- Datatables -->
<!-- Page level plugins -->
<script src="<?= base_url() ?>assets/back_template/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>assets/back_template/vendor/datatables/dataTables.bootstrap4.min.js"></script>

<script src="<?= base_url('assets/back_template/vendor/fontawesome-free/js/all.min.js') ?>"></script>
<script src="<?= base_url('assets/global_assets/js/plugins/forms/selects/select2.min.js') ?>"></script>
<script src="<?= base_url('assets/global_assets/js/plugins/ui/moment/moment.min.js') ?>"></script>
<script src="<?= base_url('assets/global_assets/js/plugins/pickers/daterangepicker.js') ?>"></script>
<script src="<?= base_url('assets/user_template/js/sweetalert2.min.js') ?>"></script>
<script src="<?= base_url('assets/user_template/js/app/functions.js') ?>"></script>
<!-- Summer Note -->
<script src="<?= base_url('assets/back_template/vendor/summernote/summernote.min.js'); ?>"></script>

<!-- Pnotify 4 -->
<script src="<?= base_url('assets/user_template/plugins/pnotify/bootstrap/PNotifyBootstrap4.js'); ?>"></script>
<script src="<?= base_url('assets/user_template/plugins/pnotify/core/dist/PNotify.js'); ?>"></script>
<script src="<?= base_url('assets/user_template/plugins/pnotify/confirm/PNotifyConfirm.js'); ?>"></script>
<!-- ================== -->


<?php if(isset($scripts)) : 
    foreach($scripts as $js) :?>
        <script src="<?= base_url('assets/user_template/js/app/') . $js ?>"></script>        
    <?php endforeach;
endif; ?>