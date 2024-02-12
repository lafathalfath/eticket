<!-- ======= Hero Section ======= -->
<section id="hero-dash" class="user-dash d-flex align-items-center">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1" data-aos="fade-up" data-aos-delay="200">
                <h1><?= $sapa . ',' ?></h1>
                <h1><?= $user['name'] ?></h1>
                <div class="d-lg-flex">
                    <a href="<?= base_url('pengguna/layanan') ?>" class="btn-get-started scrollto">Buat Laporan / Request</a>
                </div>
            </div>
            <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="200">
                <img src="<?= base_url('assets/user_template/img/helpdesk.png'); ?>" class="img-fluid animated" alt="BSN">
            </div>
        </div>
    </div>

</section><!-- End Hero -->


<!-- ======= Info Ticket Section ======= -->
<section id="dashboard-section" class="dashboard-section section-bg">
    <div class="container">
        <div class="section-title">
            <h2>Info Ticket Saya</h2>
            <p style="display: none;">Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
        </div>             

        <div class="row">
            <div class="col-xl-6 col-xl-6 col-md-6 col-sm-12 col-12 mb-4">
                <div class="card shadow h-100 py-2 card-ticket">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col mr-2 text-center">
                                <h6 class="font-weight-bold text-danger text-uppercase mb-1">Ticket Opened</h6>
                                <h2 class="font-weight-bold mb-0"><?= $ticketOpen ?></h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-6 col-xl-6 col-md-6 col-sm-12 col-12 mb-4">
                <div class="card shadow h-100 py-2 card-ticket">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col mr-2 text-center">
                                <h6 class="font-weight-bold text-warning text-uppercase mb-1">Ticket Ongoing</h6>
                                <h2 class="font-weight-bold mb-0"><?= $ticketOngoing ?></h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-6 col-xl-6 col-md-6 col-sm-12 col-12 mb-4">
                <div class="card shadow h-100 py-2 card-ticket">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col mr-2 text-center">
                                <h6 class="font-weight-bold text-success text-uppercase mb-1">Ticket Closed</h6>
                                <h2 class="font-weight-bold mb-0"><?= $ticketClosed ?></h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-6 col-xl-6 col-md-6 col-sm-12 col-12 mb-4">
                <div class="card shadow h-100 py-2 card-ticket">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col mr-2 text-center">
                                <h6 class="font-weight-bold text-primary text-uppercase mb-1">Total Ticket Dibuat</h6>
                                <h2 class="font-weight-bold mb-0"><?= $totalTicket ?></h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="cta" class="cta">
    <div class="container">
        <div class="section-title-white">
            <h2>Ticket Saya</h2>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="table-responsive">
                    <div class="card">
                        <div class="card-body">
                            <table class="table table-hover table-style table-bordered" id="tbl-list" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Kode Ticket</th>
                                        <th>Judul</th>
                                        <th>Status</th>
                                        <th>Keterangan</th>
                                        <th>Tgl. Permohonan</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- <div class="container aos-init aos-animate" data-aos="zoom-in">
        <div class="row">
            <div class="col-lg-9 text-center text-lg-left">
                <h3>Open Ticket</h3>
                <p>Layanan Aduan dan Permintaan Keperluan IT di Badan Standardisasi Nasional.</p>
            </div>
            <div class="col-lg-3 cta-btn-container text-center">
                <a class="cta-btn align-middle" href="<?= base_url('pengguna/layanan') ?>">Lapor / Request</a>
            </div>
        </div>
    </div> -->
</section>

<a href="<?= base_url('pengguna/layanan') ?>" class="sticky-layanan"><img src="<?= base_url('assets/user_template/img/sticky-layanan.png
') ?>" alt=""></a>