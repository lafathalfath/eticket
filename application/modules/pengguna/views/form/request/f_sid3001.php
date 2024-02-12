<div class="container-lg bg-white mt-4 rounded" data-aos="fade-up">
    <div class="p-5">
    <?= form_open('pengguna/form/fsid3001_save', ['id' => 'frm-submit-fsid3001']) ?>
            <input type="hidden" name="request" value="request">        
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                    <div class="form-group">
                        <label class="font-weight-bold" for="nama_lengkap">Nama Lengkap</label>
                        <input class="form-control" type="text" name="nama_lengkap" id="nama_lengkap" placeholder="Masukkan Nama Lengkap" value="<?= $this->session->name ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold" for="unit_kerja">Unit Kerja <span class="font-weight-bold text-danger">*</span></label>
                        <select class="form-control select2" name="unit_kerja" id="unit_kerja">
                            <option value="">-- Pilih Unit Kerja --</option>
                            <?php foreach($unitKerja as $unit) : ?>
                                <option value="<?= $unit->id ?>"><?= $unit->unit_kerja ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>               
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                    <div class="form-group">
                        <label class="font-weight-bold" for="nip">Nomor Induk Pegawai<span class="font-weight-bold text-danger">*</span></label>
                        <input class="form-control" type="number" name="nip" id="nip" placeholder="Masukkan Nomor Induk Pegawai">
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold" for="jabatan">Jabatan<span class="font-weight-bold text-danger">*</span></label>
                        <input class="form-control" type="text" name="jabatan" id="jabatan" placeholder="Masukkan Jabatan">
                    </div>
                </div>
            </div> 
            <hr>
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                    <div class="form-group">
                        <label class="font-weight-bold" for="aplikasi_id">Nama Perangkat Lunak <span class="font-weight-bold text-danger">*</span></label>
                        <select class="form-control select2" name="aplikasi_id" id="aplikasi_id">
                            <option value="">-- Pilih Perangkat Lunak --</option>
                            <?php foreach($dataSoftware as $unit) : ?>
                                <option value="<?= $unit->id ?>"><?= $unit->jenis_layanan ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>         
                </div>
            </div>
             
            <div class="row">
                <div class="col-12">
                    <div class="text-right">
                        <input type="hidden" name="id_kategori_layanan" id="id_kategori_layanan" value="<?= $kategoriLayananId ?>">
                        <button id="btn-submit" type="submit" style="width:180px" class="btn btn-primary"><i class="far fa-save"></i> Buat Request</button>
                    </div>
                </div>
            </div>
        <?= form_close(); ?>
    </div>    
</div>

<?php if(isset($formScript)) : 
    foreach($formScript as $js) :?>
        <script src="<?= base_url('assets/user_template/js/app/form/') . $js ?>"></script>        
    <?php endforeach;
endif; ?>