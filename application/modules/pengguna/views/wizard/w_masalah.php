<div class="row">
    <?php foreach($dataMasalah as $r) : ?>
        <div class="col-lg-4 col-md-6 col-sm-12 col-12">
            <div class="card shadow rounded" style="min-width:18rem; margin:30px;" id="pil-layanan" data-id="<?= $r['id'] ?>" data-title="<?= $r['jenis_layanan'] . ' ' . $r['masalah'] ?>">
                <div class="card-body text-center">
                    <h4><b><?= $r['masalah'] ?></b></h4>
                </div>
            </div>
        </div>  
    <?php endforeach; ?>
</div>