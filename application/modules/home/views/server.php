<main id="main">

    <!-- ======= Server Information Section ======= -->
    <section id="server" class="server section-server">
        <div class="container" data-aos="fade-up">

            <div class="section-title-server mt-5">
                <h2 style="margin-top: 100px;">Server Information</h2>
                <p style="display: none;">Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="table-responsive">
                        <div class="card">
                            <div class="card-body">
                                <table class="table table-hover table-style table-bordered" id="tableServer" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th scope="col">No.</th>
                                            <th scope="col">Nama Aplikasi</th>
                                            <th scope="col">URL</th>
                                            <th scope="col">Server Status Hari Ini</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1; ?>
                                        <?php foreach ($result['monitors'] as $res) : ?>
                                            <tr>
                                                <th scope="row"><?= $i; ?></th>
                                                <td><?= $res['friendly_name']; ?></td>
                                                <td><a href="<?= $res['url']; ?>"><?= $res['url']; ?></a></td>
                                                <?= ($res['status'] == 2) ? "<td><span class='badge badge-success'>UP</span></td>" : "<td><span class='badge badge-danger'>DOWN</span></td>" ?>
                                            </tr>
                                            <?php $i++; ?>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!-- End Server Information Section -->

</main><!-- End #main -->