<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>E-ticketing Apps BSN</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="<?= base_url(); ?>assets/front_template/img/favicon-bsn.svg" rel="icon">
  <link href="<?= base_url(); ?>assets/front_template/img/favicon-bsn.svg" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link rel="stylesheet" href="<?= base_url('assets/back_template/vendor/fontawesome-free/css/all.min.css') ?>">
  <link href="<?= base_url(); ?>assets/front_template/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?= base_url(); ?>assets/front_template/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="<?= base_url(); ?>assets/front_template/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="<?= base_url(); ?>assets/front_template/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="<?= base_url(); ?>assets/front_template/vendor/aos/aos.css" rel="stylesheet">
  <link rel="stylesheet" href="<?= base_url('assets/front_template/vendor/summernote/summernote.css') ?>">
  <link rel="stylesheet" href="<?= base_url('assets/global_assets/js/plugins/forms/selects/select2.min.css') ?>">
  <!-- Template Main CSS File -->
  <link href="<?= base_url(); ?>assets/user_template/css/style.css" rel="stylesheet">

  <!-- Datatables -->
  <link href="<?= base_url() ?>assets/back_template/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
  
  <link href="<?= base_url() ?>assets/user_template/plugins/pnotify/bootstrap/PNotifyBootstrap4.css" rel="stylesheet">
  <link href="<?= base_url() ?>assets/user_template/plugins/pnotify/core/dist/PNotify.css" rel="stylesheet">
  <link href="<?= base_url() ?>assets/user_template/plugins/pnotify/core/dist/BrightTheme.css" rel="stylesheet">
  <link href="<?= base_url() ?>assets/user_template/plugins/pnotify/confirm/PNotifyConfirm.css" rel="stylesheet">
  

  <?php if(isset($styles)) : 
      foreach($styles as $css) :?>
        <link rel="stylesheet" href="<?= base_url('assets/user_template/css/app/') . $css ?>">
      <?php endforeach;
  endif; ?>

</head>

<body>