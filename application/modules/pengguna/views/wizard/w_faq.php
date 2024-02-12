
<div class="container-lg bg-white mt-4 rounded" data-aos="fade-up">
    <div class="p-3">
        <?php foreach($faq as $f) : ?>            
        <div class="row">
            <div class="col-lg-9">
                <div class="row">
                    <div class="col-12 d-flex justify-content-center">
                        <h6 class="alert alert-secondary text-muted" style="width: 100%;"><?= 'FAQ / ' . $f['masalah'] ?></h6>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">                
                        <h4 class="font-weight-bold"><?= $f['judul'] ?></h4>            
                    </div>
                    <div class="col-lg-3 col-md-6 col-6">
                        <small class="text-muted">Dibuat oleh : <?= $f['created_by'] ?></small><br>            
                        <small class="text-muted">Dimodifikasi pada : -</small>                    
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-12">
                        <?= $f['isi'] ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <button class="btn btn-success mt-2" id="btn-solvedByFaq"><i class="fas fa-thumbs-up"></i> Sangat Membantu</button>
                    </div>
                </div>
                <hr>
            </div>
            <div class="col-lg-3">
                <div class="aler alert-info p-3 rounded" role="alert">
                    <button type="button" class="close btn-sm" aria-label="Close">
                        <span aria-hidden="true"><i class="fas fa-info-circle"></i></span>
                    </button>
                    <div class="alert-heading">
                        <h6 class="font-weight-bold">Apakah jawaban tersebut membantu anda ?</h6>
                    </div>
                    <small>Jika ya, silahkan klik <b>Sangat Membantu</b>, jika tidak silahkan klik <b>Buka Tiket</b>.</small>
                    <hr>                                        
                    <button class="btn btn-primary" id="btn-ticket"><i class="fas fa-ticket-alt"></i> Buka Tiket</button>
                    <input type="hidden" id="tm_id" value="<?= $f['tr_masalah_id'] ?>">
                    <input type="hidden" id="judul_masalah" value="<?= $f['judul'] ?>">
                </div>
            </div>
        </div>
        <?php endforeach; ?>   
        
        
    </div><!-- /row-->        
</div>