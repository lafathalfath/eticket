<div class="row">
    <?php foreach($dataLayanan as $r) : ?>
    <div class="col-lg-6 col-md-6 col-sm-12 col-12" style="padding:50px">
        <div class="card shadow rounded" id="pil-layanan" data-id="<?= $r['id'] ?>" data-title="<?= $r['klasifikasi'] ?>">
            <img class="wizard-img" src="<?= base_url('assets/user_template/img/' . $r['gambar']) ?>" class="card-img-top" alt="Ilustrasi">
            <div class="card-body">
                <h4><b><?=$r['klasifikasi'] ?></b></h4>
                <small class="card-text"><?=$r['detail_klasifikasi'] ?></small>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
</div>