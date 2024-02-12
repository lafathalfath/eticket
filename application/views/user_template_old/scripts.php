<!-- COMMON SCRIPTS -->
<script src="<?= base_url('assets/user_template/js/jquery-3.5.1.min.js') ?>"></script>
<script src="<?= base_url('assets/user_template/js/common_scripts.min.js') ?>"></script>
<script src="<?= base_url('assets/user_template/js/menu.js') ?>"></script>
<script src="<?= base_url('assets/user_template/js/main.js') ?>"></script>
<script src="<?= base_url('assets/user_template/js/sweetalert2.min.js') ?>"></script>
<script src="<?= base_url('assets/back_template/vendor/fontawesome-free/js/all.js') ?>"></script>
<script src="<?= base_url('assets/user_template/js/app/functions.js') ?>"></script>

<?php if(isset($scripts)) : 
    foreach($scripts as $js) :?>
        <script src="<?= base_url('assets/user_template/js/app/') . $js ?>"></script>        
    <?php endforeach;
endif; ?>