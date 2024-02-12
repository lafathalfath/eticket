<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="eTicketing Badan Standardisasi Nasional (BSN)">
    <meta name="author" content="Badan Standardisasi Nasional">
    <title>BSN eTicketing | <?= $page_title ?></title>

    <!-- Favicons-->
    <link rel="shortcut icon" href="<?= base_url(); ?>assets/front_template/img/favicon-bsn.svg" type="image/x-icon">    

    <!-- GOOGLE WEB FONT -->
	<link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@300;400;700&display=swap" rel="stylesheet">

    <!-- BASE CSS -->
    <link href="<?= base_url('assets/user_template/css/bootstrap.min.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/user_template/css/style.css') ?>" rel="stylesheet">
	<link href="<?= base_url('assets/user_template/css/menu.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/user_template/css/vendors.min.css') ?>" rel="stylesheet">
	<link href="<?= base_url('assets/back_template/vendor/fontawesome-free/css/all.min.css') ?>" rel="stylesheet" type="text/css">
	<link href="<?= base_url('assets/user_template/css/skins/square/grey.css') ?>" rel="stylesheet">

    <!-- YOUR CUSTOM CSS -->
    <link href="<?= base_url('assets/user_template/css/custom.css') ?>" rel="stylesheet">
	
	<script src="<?= base_url('assets/user_template/js/modernizr.js') ?>"></script>

    <?php if(isset($styles)) : ?>
        <link href="<?= base_url('assets/user_template/css/app/') . $styles ?>" rel="stylesheet">
    <?php endif; ?>
	

</head>