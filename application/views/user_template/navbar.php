  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
      <div class="container d-flex align-items-center">

          <h1 class="logo mr-auto">
              <a href="<?= base_url('') ?>">
                  <img src="<?= base_url(); ?>assets/user_template/img/bsn_logo_white.png" alt="Badan Standardisasi Nasional" class="img-fluid">
              </a>
          </h1>
          <!-- Uncomment below if you prefer to use an image logo -->
          <!-- <a href="<?= base_url('') ?>" class="logo mr-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

          <nav class="nav-menu d-none d-lg-block">
              <ul>
                  <li <?php if ($this->uri->segment(2) == "dashboard") {
                            echo 'class="active"';
                        } ?>><a href="<?= base_url('pengguna/dashboard') ?>">Dashboard</a></li>

                    <li <?php if ($this->uri->segment(2) == "layanan") {
                            echo 'class="active"';
                        } ?>><a href="<?= base_url('pengguna/layanan') ?>">Lapor / Request</a></li>

                  <li <?php if ($this->uri->segment(2) == "status") {
                            echo 'class="active"';
                        } ?>><a href="<?= base_url('pengguna/status') ?>">Status Ticket</a></li>

                  <li <?php if ($this->uri->segment(1) == "faq" || $this->uri->segment(1) == "faqresult" || $this->uri->segment(1) == "faqanswer") {
                            echo 'class="active"';
                        } ?>><a href="<?= base_url('faq') ?>">FAQs</a></li>
              </ul>
          </nav><!-- .nav-menu -->

          <a href="<?= base_url('keluar') ?>" class="get-started-btn scrollto">Logout</a>

      </div>
  </header><!-- End Header -->