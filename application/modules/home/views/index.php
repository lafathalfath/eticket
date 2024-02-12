    <!-- Vendor AmChart -->
    <script src="<?= base_url(); ?>assets/front_template/vendor/amcharts4/core.js"></script>
    <script src="<?= base_url(); ?>assets/front_template/vendor/amcharts4/charts.js"></script>
    <script src="<?= base_url(); ?>assets/front_template/vendor/amcharts4/themes/animated.js"></script>
    <script src="<?= base_url(); ?>assets/front_template/js/amchart.js"></script>

    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex align-items-center">

        <div class="container">
            <div class="row">
                <div class="col-lg-6 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1" data-aos="fade-up" data-aos-delay="200">
                    <h1>E-Ticketing Apps</h1>
                    <h2>Aplikasi Layanan Aduan dan Permintaan Keperluan IT di Badan Standardisasi Nasional.</h2>
                    <div class="d-lg-flex">
                        <a href="<?= base_url('masuk') ?>" class="btn-get-started scrollto">Buat Laporan</a>
                    </div>
                </div>
                <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="200">
                    <img src="<?= base_url(); ?>assets/front_template/img/cs-hero.svg" class="img-fluid animated" alt="">
                </div>
            </div>
        </div>

    </section><!-- End Hero -->

    <main id="main">

        <!-- ======= Amchart ======= -->
        <section id="chart" class="chart section-bg">
            <div class="container">

                <div class="section-title">
                    <h2>Infografis Status</h2>
                    <p style="display: none;">Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
                </div>

                <div class="row mb-3">
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card shadow h-100 py-2 card-ticket">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col mr-2 text-center">
                                        <small class="font-weight-bold text-danger text-uppercase mb-1">Ticket Issued</small>
                                        <h5 class="font-weight-bold mb-0">5</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card shadow h-100 py-2 card-ticket">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col mr-2 text-center">
                                        <small class="font-weight-bold text-warning text-uppercase mb-1">Ticket Ongoing</small>
                                        <h5 class="font-weight-bold mb-0">10</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card shadow h-100 py-2 card-ticket">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col mr-2 text-center">
                                        <small class="font-weight-bold text-success text-uppercase mb-1">Ticket Closed</small>
                                        <h5 class="font-weight-bold mb-0">15</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card shadow h-100 py-2 card-ticket">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col mr-2 text-center">
                                        <small class="font-weight-bold text-primary text-uppercase mb-1">Jumlah Tiket Hari Ini</small>
                                        <h5 class="font-weight-bold mb-0">15</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="accordion-list">
                    <ul>
                        <li class="shadow h-100">
                            <a data-toggle="collapse" class="collapse" href="#accordion-list-1"><span>01</span> Jumlah Ticket Solved / Tidak Solved <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                            <div id="accordion-list-1" class="collapse show" data-parent=".accordion-list">
                                <div id="piechart1" class="piechart1" style="width: 100%; height: 300px; padding: 30px;"></div>
                            </div>
                        </li>

                        <li class="shadow h-100">
                            <a data-toggle="collapse" href="#accordion-list-2" class="collapsed"><span>02</span> Jumlah Ticket Solved By It / Self Solved <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                            <div id="accordion-list-2" class="collapse" data-parent=".accordion-list">
                                <div id="piechart2" class="piechart2" style="width: 100%; height: 300px; padding: 30px;"></div>
                            </div>
                        </li>

                        <li class="shadow h-100">
                            <a data-toggle="collapse" href="#accordion-list-3" class="collapsed"><span>03</span> Kategori Permasalahan <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                            <div id="accordion-list-3" class="collapse" data-parent=".accordion-list">
                                <div id="chart1" class="chart1" style="width: 100%; height: 300px; padding: 30px;"></div>
                            </div>
                        </li>

                        <li class="shadow h-100">
                            <a data-toggle="collapse" href="#accordion-list-4" class="collapsed"><span>04</span> Kategori Request / Permintaan <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                            <div id="accordion-list-4" class="collapse" data-parent=".accordion-list">
                                <div id="chart2" class="chart2" style="width: 100%; height: 300px; padding: 30px;"></div>
                            </div>
                        </li>

                        <li class="shadow h-100">
                            <a data-toggle="collapse" href="#accordion-list-5" class="collapsed"><span>05</span> Jumlah Ticket Periodic (7 Hari Terakhir) <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                            <div id="accordion-list-5" class="collapse" data-parent=".accordion-list">
                                <div id="linechart" class="linechart" style="width: 100%; height: 300px;"></div>
                            </div>
                        </li>

                    </ul>
                </div>

            </div>
        </section>

    </main><!-- End #main -->