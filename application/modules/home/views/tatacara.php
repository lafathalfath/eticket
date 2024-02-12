<main id="main">

    <!-- ======= Tata Cara Section ======= -->
    <section id="tatacara" class="tatacara section-tatacara">
        <div class="container" data-aos="fade-up">

            <div class="section-title-tatacara">
                <h2 style="margin-top: 100px;">Tata Cara Membuat Ticket</h2>
                <p>Terdapat 2 jenis ticket, silahkan pilih cara untuk request ticket pada aplikasi e-ticketing.</p>
            </div>

            <div class="section-btn-tatacara">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <button class="btn btn-primary" id="ticket_lapor" onclick="ticket_lapor()">Cara Membuat Ticket Lapor / Komplain</button>
                        <button class="btn btn-info" id="ticket_request" onclick="ticket_request()">Cara Membuat Ticket Request</button>
                    </div>
                </div>
            </div>

            <div class="section-ticket-tatacara collapse" id="timeline_lapor">
                <h3>Tata Cara Membuat Ticket Lapor / Komplain</h3>
                <div class="timeline mt-5">
                    <div class="container-timeline left">
                        <div class="content">
                            <h4>STEP 1 - <strong>LOGIN</strong></h4>
                            <a href="<?= base_url('assets/front_template/img/tatacara/login.png') ?>" data-lightbox="login-1" data-title="Login Page">
                                <img src="<?= base_url('assets/front_template/img/tatacara/login.png') ?>" alt="login" class="img-thumbnail my-1">
                            </a>
                            <p>Sebelum membuat ticket diharuskan login terlebih dahulu menggunakan <strong>username akun VPN beserta passwordnya</strong>.</p>
                        </div>
                    </div>

                    <div class="container-timeline right">
                        <div class="content">
                            <h4>STEP 2 - <strong>DASHBOARD</strong></h4>
                            <a href="<?= base_url('assets/front_template/img/tatacara/lapor_request.png') ?>" data-lightbox="lapor_request-1" data-title="Dashboard Page">
                                <img src="<?= base_url('assets/front_template/img/tatacara/lapor_request.png') ?>" alt="lapor_request" class="img-thumbnail my-1">
                            </a>
                            <p>Setelah login anda akan diarahkan ke halaman dashboard, lalu pilih menu <strong>Lapor / Request</strong> untuk membuat ticket.</p>
                        </div>
                    </div>

                    <div class="container-timeline left">
                        <div class="content">
                            <h4>STEP 3 - <strong>PILIH LAYANAN</strong></h4>
                            <a href="<?= base_url('assets/front_template/img/tatacara/jenis_layanan.png') ?>" data-lightbox="jenis_layanan-1" data-title="Jenis Layanan Page">
                                <img src="<?= base_url('assets/front_template/img/tatacara/jenis_layanan.png') ?>" alt="jenis_layanan" class="img-thumbnail my-1">
                            </a>
                            <p>Silahkan Pilih <strong>Lapor / Komplain</strong> sebelum membuat ticket.</p>
                        </div>
                    </div>

                    <div class="container-timeline right">
                        <div class="content">
                            <h4>STEP 4 - <strong>PILIH KATEGORI LAPORAN</strong></h4>
                            <a href="<?= base_url('assets/front_template/img/tatacara/lapor_komplain.png') ?>" data-lightbox="lapor_komplain-1" data-title="Pilih Laporan Page">
                                <img src="<?= base_url('assets/front_template/img/tatacara/lapor_komplain.png') ?>" alt="lapor_komplain" class="img-thumbnail my-1">
                            </a>
                            <p>Setelah anda memilih layanan lapor/komplain lalu anda diharuskan memilih <strong>Kategori Lapor / Komplain</strong> yang anda butuhkan.</p>
                        </div>
                    </div>

                    <div class="container-timeline left">
                        <div class="content">
                            <h4>STEP 5 - <strong>PILIH JENIS LAYANAN</strong></h4>
                            <a href="<?= base_url('assets/front_template/img/tatacara/jenis_laporan.png') ?>" data-lightbox="jenis_laporan-1" data-title="Jenis Layanan Page">
                                <img src="<?= base_url('assets/front_template/img/tatacara/jenis_laporan.png') ?>" alt="jenis_layanan" class="img-thumbnail my-1">
                            </a>
                            <p>Silahkan Pilih <strong>Jenis Layanan</strong> yang ingin anda laporkan.</p>
                        </div>
                    </div>

                    <div class="container-timeline right">
                        <div class="content">
                            <h4>STEP 6 - <strong>PILIH KASUS PERMASALAHAN</strong></h4>
                            <a href="<?= base_url('assets/front_template/img/tatacara/kasus_laporan.png') ?>" data-lightbox="kasus_laporan-1" data-title="Pilih Kasus Permasalahan Page">
                                <img src="<?= base_url('assets/front_template/img/tatacara/kasus_laporan.png') ?>" alt="kasus_laporan" class="img-thumbnail my-1">
                            </a>
                            <p>Silahkan anda memilih <strong>Kasus Permasalahan</strong> yang anda hadapi.</p>
                        </div>
                    </div>

                    <div class="container-timeline left">
                        <div class="content">
                            <h4>STEP 7 - <strong>FAQ PERMASALAHAN</strong></h4>
                            <a href="<?= base_url('assets/front_template/img/tatacara/faq_kasus_laporan.png') ?>" data-lightbox="faq_kasus_laporan-1" data-title="FAQ Permasalahan Page">
                                <img src="<?= base_url('assets/front_template/img/tatacara/faq_kasus_laporan.png') ?>" alt="jenis_layanan" class="img-thumbnail my-1">
                            </a>
                            <p>Jika anda sudah memilih permasalahan silahkan anda ikuti <strong>FAQ Permasalahan</strong> yang sudah tertera. Jika FAQ tersebut dapat mengatasi permasalahan anda, silahkan klik tombol <strong>"Sangat Membantu"</strong> namun jika masalah anda belum bisa diatasi silahkan ikuti langkah selanjutnya.</p>
                        </div>
                    </div>

                    <div class="container-timeline right">
                        <div class="content">
                            <h4>STEP 8 - <strong>BUKA TICKET LAPORAN</strong></h4>
                            <a href="<?= base_url('assets/front_template/img/tatacara/buka_ticket_laporan.png') ?>" data-lightbox="buka_ticket_laporan-1" data-title="Buka Ticket Laporan Page">
                                <img src="<?= base_url('assets/front_template/img/tatacara/buka_ticket_laporan.png') ?>" alt="buka_ticket_laporan" class="img-thumbnail my-1">
                            </a>
                            <p>Silahkan anda klik tombol biru <strong>"Buka Ticket"</strong> lalu isi form yang tersedia terkait masalah yang anda hadapi dan deskripsikan masalah anda dengan detail lalu lampirkan gambar untuk memperkuat detail masalah anda lalu klik simpan.</p>
                        </div>
                    </div>

                    <div class="container-timeline left">
                        <div class="content">
                            <h4>STEP 9 - <strong>STATUS TICKET</strong></h4>
                            <a href="<?= base_url('assets/front_template/img/tatacara/status_ticket.png') ?>" data-lightbox="status_ticket-1" data-title="FAQ Permasalahan Page">
                                <img src="<?= base_url('assets/front_template/img/tatacara/status_ticket.png') ?>" alt="jenis_layanan" class="img-thumbnail my-1">
                            </a>
                            <p>Ticket yang sudah anda buat akan muncul pada menu <strong>Status Ticket</strong> ,anda dapat melihat ticket anda dan menelusuri respon ticket yang sudah anda buat.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="section-ticket-tatacara collapse" id="timeline_request">
                <h3>Tata Cara Membuat Ticket Request</h3>
                <div class="timeline mt-5">
                    <div class="container-timeline left">
                        <div class="content">
                            <h4>STEP 1 - <strong>LOGIN</strong></h4>
                            <a href="<?= base_url('assets/front_template/img/tatacara/login.png') ?>" data-lightbox="login-1" data-title="Login Page">
                                <img src="<?= base_url('assets/front_template/img/tatacara/login.png') ?>" alt="login" class="img-thumbnail my-1">
                            </a>
                            <p>Sebelum membuat ticket diharuskan login terlebih dahulu menggunakan <strong>username akun VPN beserta passwordnya</strong>.</p>
                        </div>
                    </div>

                    <div class="container-timeline right">
                        <div class="content">
                            <h4>STEP 2 - <strong>DASHBOARD</strong></h4>
                            <a href="<?= base_url('assets/front_template/img/tatacara/lapor_request.png') ?>" data-lightbox="lapor_request-1" data-title="Dashboard Page">
                                <img src="<?= base_url('assets/front_template/img/tatacara/lapor_request.png') ?>" alt="lapor_request" class="img-thumbnail my-1">
                            </a>
                            <p>Setelah login anda akan diarahkan ke halaman dashboard, lalu pilih menu <strong>Lapor / Request</strong> untuk membuat ticket.</p>
                        </div>
                    </div>

                    <div class="container-timeline left">
                        <div class="content">
                            <h4>STEP 3 - <strong>PILIH LAYANAN</strong></h4>
                            <a href="<?= base_url('assets/front_template/img/tatacara/jenis_layanan.png') ?>" data-lightbox="jenis_layanan-1" data-title="Jenis Layanan Page">
                                <img src="<?= base_url('assets/front_template/img/tatacara/jenis_layanan.png') ?>" alt="jenis_layanan" class="img-thumbnail my-1">
                            </a>
                            <p>Silahkan Pilih <strong>Permintaan Baru</strong> sebelum membuat ticket.</p>
                        </div>
                    </div>

                    <div class="container-timeline right">
                        <div class="content">
                            <h4>STEP 4 - <strong>PILIH JENIS PERMINTAAN</strong></h4>
                            <a href="<?= base_url('assets/front_template/img/tatacara/layanan_permintaan.png') ?>" data-lightbox="layanan_permintaan-1" data-title="Pilih Jenis Layanan Page">
                                <img src="<?= base_url('assets/front_template/img/tatacara/layanan_permintaan.png') ?>" alt="layanan_permintaan" class="img-thumbnail my-1">
                            </a>
                            <p>Silahkan Memilih <strong>Jenis Permintaan Baru</strong> yang anda butuhkan.</p>
                        </div>
                    </div>

                    <div class="container-timeline left">
                        <div class="content">
                            <h4>STEP 5 - <strong>ISI FORM PERMINTAAN</strong></h4>
                            <a href="<?= base_url('assets/front_template/img/tatacara/form_permintaan.png') ?>" data-lightbox="form_permintaan-1" data-title="Isi Form Permintaan Page">
                                <img src="<?= base_url('assets/front_template/img/tatacara/form_permintaan.png') ?>" alt="jenis_layanan" class="img-thumbnail my-1">
                            </a>
                            <p>Silahkan <strong>Isi Form</strong> permohonan terkait permintaan yang anda lakukan, lalu jika sudah selesai silahkan klik <strong>Buat Request</strong></p>
                        </div>
                    </div>

                    <div class="container-timeline right">
                        <div class="content">
                            <h4>STEP 6 - <strong>STATUS TICKET</strong></h4>
                            <a href="<?= base_url('assets/front_template/img/tatacara/status_ticket.png') ?>" data-lightbox="status_ticket-1" data-title="FAQ Permasalahan Page">
                                <img src="<?= base_url('assets/front_template/img/tatacara/status_ticket.png') ?>" alt="jenis_layanan" class="img-thumbnail my-1">
                            </a>
                            <p>Ticket yang sudah anda buat akan muncul pada menu <strong>Status Ticket</strong> ,anda dapat melihat ticket anda dan menelusuri respon ticket yang sudah anda buat.</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!-- End Tata Cara Section -->

</main><!-- End #main -->

<script>
    function ticket_lapor() {
        $("#timeline_lapor").collapse('toggle');
        $("#timeline_request").collapse('hide');
    }

    function ticket_request() {
        $("#timeline_lapor").collapse('hide');
        $("#timeline_request").collapse('toggle');
    }
</script>