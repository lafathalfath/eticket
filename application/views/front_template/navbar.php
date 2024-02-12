  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top ">
      <div class="container d-flex align-items-center">

          <h1 class="logo mr-auto">
              <a href="<?= base_url('') ?>">
                  <img src="<?= base_url(); ?>assets/front_template/img/BSN_logo master_PNG.png" alt="logo BSN" class="img-fluid">
              </a>
          </h1>
          <!-- Uncomment below if you prefer to use an image logo -->
          <!-- <a href="<?= base_url('') ?>" class="logo mr-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

          <nav class="nav-menu d-none d-lg-block">
              <ul>
                  <li <?php if ($this->uri->segment(1) == "") {
                            echo 'class="active"';
                        } ?>><a href="<?= base_url('') ?>">Home</a></li>

                  <!-- <li><a href="#chart">Infografis</a></li> -->
                  <li <?php if ($this->uri->segment(1) == "tatacara") {
                            echo 'class="active"';
                        } ?>><a href="<?= base_url('tatacara') ?>">Tata Cara</a></li>

                  <li <?php if ($this->uri->segment(1) == "server") {
                            echo 'class="active"';
                        } ?>><a href="<?= base_url('server') ?>">Server Info</a></li>

                  <li <?php if ($this->uri->segment(1) == "faq" || $this->uri->segment(1) == "faqresult" || $this->uri->segment(1) == "faqanswer") {
                            echo 'class="active"';
                        } ?>><a href="<?= base_url('faq') ?>">FAQs</a></li>
              </ul>
          </nav><!-- .nav-menu -->

          <a href="<?= base_url('masuk') ?>" class="get-started-btn scrollto">Buat Laporan</a>

      </div>
  </header><!-- End Header -->