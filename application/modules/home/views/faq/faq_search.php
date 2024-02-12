<main id="main">

    <!-- ======= Frequently Asked Questions Section ======= -->
    <section id="faq" class="faq section-faq_ask">
        <div class="container" data-aos="fade-up">

            <div class="section-title-faq_ask mt-5">
                <h2 style="margin-top: 100px;">Frequently Asked Questions</h2>
                <p style="display: none;">Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
            </div>

            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <img src="<?= base_url(); ?>assets/front_template/img/faq2.png" class="img-fluid animated mb-3" alt="faq.png">
                    <form action="<?= base_url('faqresult') ?>" method="post" id="faqformsearch">
                        <div class="form-group">
                            <input type="text" class="form-control" name="faqsearch" id="faqsearch" placeholder="Masukkan Kata Kunci Pencarian" autocomplete="off" />
                            <span class="d-flex justify-content-end">
                                <i class="icofont-search-1 icon-search"></i>
                            </span>
                        </div>
                    </form>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="faq-list"style="display:none;">
                        <ul>
                            <?php foreach ($faq as $list) : ?>
                                <li data-aos="fade-up" data-aos-delay="100">
                                    <i class="bx bx-help-circle icon-help"></i> <a data-toggle="collapse" class="collapse" href="#faq-list-<?= $list['id']; ?>"><?= $list['judul']; ?> <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                                    <div id="faq-list-<?= $list['id']; ?>" class="collapse" data-parent=".faq-list">
                                        <p>
                                            <?= $list['isi']; ?>
                                        </p>
                                    </div>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!-- End Frequently Asked Questions Section -->

</main><!-- End #main -->