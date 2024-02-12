<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>E-Ticketing Apps Admin</title>
    <link href="<?= base_url('assets/css/bootstrap_limitless.min.css'); ?>" rel="stylesheet" type="text/css">
    <link href="<?= base_url('assets/global_assets/css/icons/icomoon/styles.min.css'); ?>" rel="stylesheet" type="text/css">
    <link href="<?= base_url('assets/css/components.min.css'); ?>" rel="stylesheet" type="text/css">
    <!-- Custom fonts for this template-->
    <link href="<?= base_url() ?>assets/back_template/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url() ?>assets/back_template/css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="<?= base_url() ?>assets/back_template/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">

    <link href="<?= base_url('assets/css/colors.min.css'); ?>" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="<?= base_url('assets/back_template/vendor/summernote/summernote-bs4.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/global_assets/js/plugins/forms/selects/select2.min.css') ?>">

    <script src="<?= base_url('assets/global_assets/js/main/jquery.min.js'); ?>"></script>
    <script src="<?= base_url('assets/global_assets/js/plugins/loaders/blockui.min.js'); ?>"></script>
    <!-- <script src="<?= base_url('assets/global_assets/js/plugins/ui/ripple.min.js'); ?>"></script> -->

    <script src="<?= base_url('assets/js/app.js'); ?>"></script>

    <style>
        .overlay-bsn {
            display: none;
            position: fixed;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            z-index: 999;
            background: rgba(255,255,255,0.8) url("../../img/loading-bsn.gif") center no-repeat;
        }
        /* Turn off scrollbar when body element has the loading class */
        body.loading-bsn {
            overflow: hidden;   
        }
        /* Make spinner image visible when body element has the loading class */
        body.loading-bsn .overlay-bsn {
            display: block;
        }
    </style>
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">