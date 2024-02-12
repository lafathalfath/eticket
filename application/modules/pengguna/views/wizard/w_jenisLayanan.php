<br>
<div class="container">
    <div class="form-group">
        <label for="search" class="col-lg-4 text-white font-weight-bold">Cari <?= $kategoriLayanan['kategori_layanan'] ?> :</label>
        <div class="col-lg-4">
            <input type="text" placeholder="Masukkan Kata Kunci" class="form-control" name="search" id="search">
        </div>
    </div>
</div>
<div class="row">
    <?php foreach($dataJenisLayanan as $r) : ?>    
    <div class="col-lg-4 col-md-6 col-sm-12 col-12 jenis-layanan">
        <div class="card shadow rounded" style="min-width:18rem; margin:30px;" id="pil-layanan" data-id="<?= $r['id'] ?>" data-title="<?= $r['jenis_layanan'] ?>">
            <img class="wizard-img" src="<?= base_url('assets/user_template/img/' . $r['gambar']) ?>" class="card-img-top" alt="Jenis Layanan">
            <div class="card-body title">
                <h4><b><?= $r['jenis_layanan'] ?></b></h4>
                <small class="card-text"><?= $r['jenis_layanan_detail'] ?></small>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
</div>

<script>
    $(document).ready(function() {
        $('#search').on('keyup', function() {
            var search = $(this).val().toLowerCase()
            $('.jenis-layanan').hide()
            $('.jenis-layanan .title').each(function() {
                // $(this).toggle($(this).text().toLowerCase().includes(search))
                if($(this).text().toLowerCase().indexOf("" + search + "") != -1) {
                     $(this).closest('.jenis-layanan').show()
                }
            })
        })
    })
</script>