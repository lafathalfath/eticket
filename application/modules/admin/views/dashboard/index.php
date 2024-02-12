<!-- Vendor AmChart -->
<script src="<?= base_url(); ?>assets/back_template/vendor/amcharts4/core.js"></script>
<script src="<?= base_url(); ?>assets/back_template/vendor/amcharts4/charts.js"></script>
<script src="<?= base_url(); ?>assets/back_template/vendor/amcharts4/themes/animated.js"></script>
<script src="<?= base_url(); ?>assets/back_template/js/dashboard.js"></script>

<!-- Begin Page Content -->
<div class="container-fluid">

    <section id="chart" class="chart">
        <div class="container">

            <div class="section-title">
                <h2>Statistik</h2>
            </div>

            <!-- Content Row -->
            <div class="row">
                <!-- Ticket Issued -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-danger shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Ticket Issued</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">10</div>
                                </div>
                                <div class="col-auto">
                                    <!-- <i class="fas fa-calendar fa-2x text-gray-300"></i> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Ticket Ongoing -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-warning shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Ticket Ongoing</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">15</div>
                                </div>
                                <div class="col-auto">
                                    <!-- <i class="fas fa-dollar-sign fa-2x text-gray-300"></i> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Ticket Closed -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Ticket Closed</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">18</div>
                                </div>
                                <div class="col-auto">
                                    <!-- <i class="fas fa-comments fa-2x text-gray-300"></i> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Jumlah Tiket Hari Ini -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-success shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Jumlah Tiket Hari Ini</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">5</div>
                                </div>
                                <div class="col-auto">
                                    <!-- <i class="fas fa-dollar-sign fa-2x text-gray-300"></i> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">

                <div class="col-lg-12">
                    <!-- Jumlah Ticket Solved / Tidak Solved -->
                    <div class="card shadow mb-4">
                        <!-- Card Header - Accordion -->
                        <a href="#collapseCard1" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCard1">
                            <h6 class="m-0 font-weight-bold text-primary">Jumlah Ticket Solved / Tidak Solved</h6>
                        </a>
                        <!-- Card Content - Collapse -->
                        <div class="collapse" id="collapseCard1">
                            <div class="card-body">
                                <div id="piechart1" class="piechart1" style="width: 100%; height: 300px; padding: 30px;"></div>
                            </div>
                        </div>
                    </div>

                    <!-- Jumlah Ticket Solved By It / Self Solved -->
                    <div class="card shadow mb-4">
                        <!-- Card Header - Accordion -->
                        <a href="#collapseCard2" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCard2">
                            <h6 class="m-0 font-weight-bold text-primary">Jumlah Ticket Solved By It / Self Solved</h6>
                        </a>
                        <!-- Card Content - Collapse -->
                        <div class="collapse" id="collapseCard2">
                            <div class="card-body">
                                <div id="piechart2" class="piechart2" style="width: 100%; height: 300px; padding: 30px;"></div>
                            </div>
                        </div>
                    </div>

                    <!-- Kategori Permasalahan -->
                    <div class="card shadow mb-4">
                        <!-- Card Header - Accordion -->
                        <a href="#collapseCard3" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCard3">
                            <h6 class="m-0 font-weight-bold text-primary">Kategori Permasalahan</h6>
                        </a>
                        <!-- Card Content - Collapse -->
                        <div class="collapse" id="collapseCard3">
                            <div class="card-body">
                                <div id="chart1" class="chart1" style="width: 100%; height: 300px; padding: 30px;"></div>
                            </div>
                        </div>
                    </div>

                    <!-- Kategori Request / Permintaan -->
                    <div class="card shadow mb-4">
                        <!-- Card Header - Accordion -->
                        <a href="#collapseCard4" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCard4">
                            <h6 class="m-0 font-weight-bold text-primary">Kategori Request / Permintaan</h6>
                        </a>
                        <!-- Card Content - Collapse -->
                        <div class="collapse" id="collapseCard4">
                            <div class="card-body">
                                <div id="chart2" class="chart2" style="width: 100%; height: 300px; padding: 30px;"></div>
                            </div>
                        </div>
                    </div>

                    <!-- Jumlah Ticket Periodic (7 Hari Terakhir) -->
                    <div class="card shadow mb-4">
                        <!-- Card Header - Accordion -->
                        <a href="#collapseCard5" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCard5">
                            <h6 class="m-0 font-weight-bold text-primary">Jumlah Ticket Periodic (7 Hari Terakhir)</h6>
                        </a>
                        <!-- Card Content - Collapse -->
                        <div class="collapse" id="collapseCard5">
                            <div class="card-body">
                                <div id="linechart" class="linechart" style="width: 100%; height: 300px; padding: 30px;"></div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

</div>