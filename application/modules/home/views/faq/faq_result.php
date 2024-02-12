  <main id="main">

      <!-- ======= Faq-Ask Section ======= -->
      <section id="faq_ask" class="faq_ask section-faq_ask">
          <div class="container" data-aos="fade-up">

              <div class="section-title-faq_ask">
                  <h2 style="margin-top: 100px;">FAQs</h2>
                  <form action="<?= base_url('faqresult') ?>" method="post" id="faqformsearch">
                      <div class="form-row d-flex justify-content-center align-items-center">
                          <div class="col-lg-6">
                              <input type="text" class="form-control" name="faqsearch" id="faqsearch" placeholder="Masukkan Kata Kunci Pencarian" autocomplete="off" value="<?= $result_search; ?>">
                              <span class="d-flex justify-content-end">
                                  <i class="icofont-search-1 icon-search"></i>
                              </span>
                          </div>
                      </div>
                  </form>

                  <div class="row d-flex justify-content-center align-items-center">
                      <div class="col-lg-6">
                          <?php if (empty($search)) : ?>
                              <div class="alert alert-danger mt-3" role="alert">
                                  Data Tidak Ditemukan
                              </div>
                          <?php else : ?>
                              <div class="alert alert-success mt-3" role="alert">
                                  Menampilkan <strong><?= $total_rows; ?> Data</strong> Berdasarkan Kata Kunci
                              </div>
                          <?php endif; ?>
                      </div>
                  </div>
              </div>

              <div class="row mb-3">
                  <?php foreach ($search as $result) : ?>
                      <div class="col-lg-12 faq-form">
                          <a href="<?= base_url('faqanswer') ?>/<?= $result['id'] ?>" style="font-size: 16px;"><?= $result['judul']; ?></a>
                          <br>
                          <small>Last Update : <?= date("d M Y", strtotime($result['last_modified'])) ?></small>
                      </div>
                  <?php endforeach; ?>
              </div>

              <?php echo $this->pagination->create_links(); ?>
          </div>
      </section>
      <!-- End Contact Section -->

  </main><!-- End #main -->