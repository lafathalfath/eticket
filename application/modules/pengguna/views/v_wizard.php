<main class="wizard">
    <!-- ======= Wizard Section ======= -->
    <section id="wizard">
        <div class="container" data-aos="fade-up">
            
            <div class="section-title mt-5">
                <h2 id="title" class="text-white font-weight-bold"></h2>
                <p id="sub_title" class="text-white"></p>                
            </div>

            <div class="row justify-content-center mt-4">
                <button class="btn btn-secondary" id="backward"><i class="fas fa-arrow-circle-left"></i> Sebelumnya lmxcplvz </button>
                <input type="hidden" id="counter">
            </div>
            
            <div class="row justify-content-center mt-2">
                <div class="col-lg-12">
                    <div class="step" id="generateView"></div>
                </div>
            </div>

        </div>
    </section>
    <!-- End Frequently Asked Questions Section -->

</main><!-- End #main -->

<!-- Modal Init -->
<div class="modal fade bs-example-modal-lg" role="dialog" aria-labelledby="mdl-form" id="mdl-form" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header text-white" style="background-color: #4b5bb0">
                <h4 class="modal-title"><i class="fas fa-ticket-alt"></i> Buka Ticket</h4>
                <button type="button" class="close text-white" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <?= form_open('pengguna/layanan/save_ticket', ['id' => 'frm-submit-ticket']) ?>
            <div class="modal-body">
                <div class="form-row">
                    <div class="col-md-12 mb-12">
                        <input type="hidden" name="id_jenis_layanan" id="id_jenis_layanan">
                        <input type="hidden" name="id_kategori_layanan" id="id_kategori_layanan">
                        <input type="hidden" name="tr_masalah_id" id="tr_masalah_id">
                        <div class="form-group">
                            <label for="judul">Permasalahan <small class="text-danger">*</small></label>
                            <input type="text" class="form-control" id="judul" name="judul" maxlength="50" placeholder="Masukkan Judul Masalah" multiple>
                        </div>
                        <div class="form-group">
                            <label for="masalah">Deskripsi Permasalahan <span class="font-weight-bold text-danger">*</span></label>
                            <textarea id="masalah" name="masalah"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="attachment">Upload Attachment <small class="text-danger">(png/jpg/jpeg)</small></label>
                            <input type="file" class="form-control" id="attachment" name="attachment" placeholder="Upload Attachment" multiple>
                        </div>                      
                    </div>                    
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-dark waves-effect waves-light">Simpan</button>
            </div>         
            <?= form_close() ?>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<div class="overlay-bsn"></div>

<script>
    // Set BG full cover on body elem
    document.body.style.background = "url('./../assets/user_template/img/bg.png')";
</script>