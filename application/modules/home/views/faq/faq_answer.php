  <main id="main">

      <!-- ======= Faq-Ask Section ======= -->
      <section id="faq_ask" class="faq_ask section-faq_ask">
          <div class="container" data-aos="fade-up">

              <div class="section-title-faq_ask">
                  <h2 style="margin-top: 100px;">FAQ Detail</h2>
              </div>

              <div class="mb-3">
                  <a href="<?= base_url('faqresult') ?>" style="color: white; font-size: 22px;" class="btn btn-dark btn-sm">
                      <i class="icofont-arrow-left">Kembali</i>
                  </a>
              </div>

              <div class="row mb-3">
                  <div class="col-lg-12 faq-form">
                      <h3><?= $result['judul']; ?></h3>
                      <small>Last Update : <?= date("d M Y", strtotime($result['last_modified'])) ?></small>
                      <br>
                      <br>
                      <?= $result['isi']; ?>
                      <br>
                  </div>
              </div>
          </div>
      </section>
      <!-- End Contact Section -->

  </main><!-- End #main -->