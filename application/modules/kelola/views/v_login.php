<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>E-Ticketing - Login</title>

    <!-- Custom fonts for this template-->
    <link href="<?= base_url() ?>assets/back_template/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url() ?>assets/back_template/css/sb-admin-2.min.css" rel="stylesheet">

    <style>
    /*--------------------------------------------------------------
    # Preloader
    --------------------------------------------------------------*/
    #preloader {
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        z-index: 9999;
        overflow: hidden;
        background: #37517e;
    }

    #preloader:before {
        content: "";
        position: fixed;
        top: calc(50% - 30px);
        left: calc(50% - 30px);
        border: 6px solid #37517e;
        border-top-color: #fff;
        border-bottom-color: #fff;
        border-radius: 50%;
        width: 60px;
        height: 60px;
        -webkit-animation: animate-preloader 1s linear infinite;
        animation: animate-preloader 1s linear infinite;
    }

    @-webkit-keyframes animate-preloader {
        0% {
            transform: rotate(0deg);
        }

        100% {
            transform: rotate(360deg);
        }
    }

    @keyframes animate-preloader {
        0% {
            transform: rotate(0deg);
        }

        100% {
            transform: rotate(360deg);
        }
    }

        ul.myErrorClass,
        input.myErrorClass,
        textarea.myErrorClass,
        select.myErrorClass {
            border-width: 1px !important;
            border-style: solid !important;
            border-color: #cc0000 !important;
            background-color: #f3d8d8 !important;
            /* background-image: url(http://goo.gl/GXVcmC) !important; */
            background-position: 50% 50% !important;
            background-repeat: repeat !important;
        }

        ul.myErrorClass input {
            color: #666 !important;
        }

        label.myErrorClass {
            color: red;
            font-size: 11px;
            /*    font-style: italic;*/
            display: block;
        }
    </style>

</head>

<body class="bg-gradient-bsn">
    <?= form_open('kelola/do_login', ['class' => 'user', 'id'=>'login-form']); ?>
    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-6 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <!-- <div class="col-lg-6 d-none d-lg-block bg-login-image"></div> -->

                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">E-Ticketing BSN</h1>
                                    </div>

                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" id="username" name="username" placeholder="Masukkan Username">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="password" class="form-control form-control-user" id="password" placeholder="Masukkan Password">
                                    </div>

                                    <button type="submit" id="login" class="btn btn-primary btn-user btn-block">Masuk</button>

                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="<?= base_url('pusdatin/lupapassword') ?>">Forgot Password ?</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?= form_close(); ?>   

    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url() ?>assets/back_template/vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url() ?>assets/back_template/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url() ?>assets/back_template/vendor/jquery-easing/jquery.easing.min.js"></script>
    
    <!-- Custom scripts for all pages-->
    <script src="<?= base_url() ?>assets/back_template/js/sb-admin-2.min.js"></script>
    <script src="<?= base_url(); ?>assets/global_assets/js/plugins/forms/validation/validate.min.js"></script>
    <script src="<?= base_url('assets/user_template/js/sweetalert2.min.js') ?>"></script>
    
    <script src="<?= base_url('assets/user_template/js/app/functions.js') ?>"></script>

    <!--===============================================================================================-->
    <!-- Pnotify Full Pack -->
    <script src="<?= base_url('assets/'); ?>global_assets/js/plugins/pnotify/PNotify.js"></script>
    <script src="<?= base_url('assets/'); ?>global_assets/js/plugins/pnotify/PNotifyButtons.js"></script>
    <script src="<?= base_url('assets/'); ?>global_assets/js/plugins/pnotify/PNotifyAnimate.js"></script>
    <script src="<?= base_url('assets/'); ?>global_assets/js/plugins/pnotify/PNotifyCallbacks.js"></script>
    <script src="<?= base_url('assets/'); ?>global_assets/js/plugins/pnotify/PNotifyNonBlock.js"></script>
    <script src="<?= base_url('assets/'); ?>global_assets/js/plugins/pnotify/PNotifyMobile.js"></script>
    <script src="<?= base_url('assets/'); ?>global_assets/js/plugins/pnotify/PNotifyHistory.js"></script>
    <script src="<?= base_url('assets/'); ?>global_assets/js/plugins/pnotify/PNotifyDesktop.js"></script>
    <script src="<?= base_url('assets/'); ?>global_assets/js/plugins/pnotify/PNotifyConfirm.js"></script>
    <script src="<?= base_url('assets/'); ?>global_assets/js/plugins/pnotify/PNotifyStyleMaterial.js"></script>
    <script src="<?= base_url('assets/'); ?>global_assets/js/plugins/pnotify/PNotifyReference.js"></script>
    <!--===============================================================================================-->

    <script>
    $(document).ready(function () {
    'use strict'
    
    // validate and submit form
    $('#login-form').validate({
        rules: {
            username: {
                required: true,
                normalizer: function (val) {
                    return $.trim(val)
                }
            },
            password: {
                required: true,
                normalizer: function (val) {
                    return $.trim(val)
                }
            }
        },
        errorClass: "myErrorClass",
        // validClass: "is-valid",
        // highlight: function (element, errorClass, validClass) {
        // 	$(element).addClass(errorClass).removeClass(validClass);
        // },
        // unhighlight: function (element, errorClass, validClass) {
        // 	$(element).removeClass(errorClass).addClass(validClass);
        // },
        errorPlacement: function (error, element) {
            // var placement = $(element).data('error');
            // if (placement) {
            //     $(placement).append(error)
            // } else {
            //     error.insertAfter(element);
            // }
            var elem = $(element);
            if (element.parent('.input-group').length) {
                error.insertAfter(element.parent());
            } else {
                error.insertAfter(element);
            }
        },
        submitHandler: function (form) {
            save(new FormData(form), form.action)
                .then(function (response) {
                    if (response.success) {
                        Swal.fire({
                            title: 'Logged in',
                            icon: 'success',
                            html: response.message,
                            showConfirmButton: false,
                            timer: 2000
                        }).then(function() {
                            window.open(response.link, '_self')
                        })
                    } else {
                        Swal.fire({
                            title: '',
                            icon: 'error',
                            html: response.message,
                            showCloseButton: true,
                            // showConfirmButton: false,
                        });
                    }
                })
                .catch(function (err) {
                    console.log(err)
                })
        }
    });
});
</script>

</body>

</html>