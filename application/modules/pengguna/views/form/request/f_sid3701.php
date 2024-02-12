<div class="container-lg bg-white mt-4 rounded" data-aos="fade-up">
    <div class="p-5">
        <?= form_open('pengguna/form/fsid3701_save', ['id' => 'frm-submit-fsid3701']) ?>
            <input type="hidden" name="request" value="request">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                    <div class="form-group">
                        <label class="font-weight-bold" for="nama_lengkap">Nama Lengkap<span class="font-weight-bold text-danger">*</span></label>
                        <input class="form-control" type="text" name="nama_lengkap" id="nama_lengkap" placeholder="Masukkan Nama Lengkap" value="<?= $this->session->name ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold" for="unit_kerja">Unit Kerja<span class="font-weight-bold text-danger">*</span></label>
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
                        <label class="font-weight-bold" for="nip">Nomor Induk Pribadi<span class="font-weight-bold text-danger">*</span></label>
                        <input class="form-control" type="text" name="nip" id="nip" placeholder="Masukkan Nomor Induk Pegawai" required>
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold" for="jabatan">Jabatan<span class="font-weight-bold text-danger">*</span></label>
                        <input class="form-control" type="text" name="jabatan" id="jabatan" placeholder="Masukkan Jabatan" required>
                    </div>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                  <div class="form-group">
                     <label class="font-weight-bold" for="operating_system">Room Vidcon<span class="font-weight-bold text-danger">*</span></label>
                     <select class="form-control select2" name="ruang_vicon" id="ruang_vicon">
                         <option value="">-- Pilih Video Conference --</option>
                         <?php foreach($dataVidcon as $dvi) : ?>
                             <option value="<?= $dvi->id ?>"><?= $dvi->nama ?></option>
                         <?php endforeach; ?>
                    </select>
                   </div>
                    <div class="form-group">
                        <label class="font-weight-bold" for="nama_kegiatan">Nama Kegiatan / Rapat<span class="font-weight-bold text-danger">*</span></label>
                        <input class="form-control" type="text" name="nama_kegiatan" id="nama_kegiatan" placeholder="Masukkan Nama Kegiatan / Rapat" required>
                    </div>
                    <div class="form-group">
                       <label class="font-weight-bold" for="kategori_tempat">Kategori_tempat<span class="font-weight-bold text-danger">*</span></label>
                       <select class="form-control select2" name="kategori_tempat" id="kategori_tempat">
                            <option value="">-- Pilih Kategori Tempat --</option>
                           <?php foreach($kategori_tempat as $ktempat) : ?>
                               <option value="<?= $ktempat->id ?>"><?= $ktempat->kategori_tempat ?></option>
                           <?php endforeach; ?>
                      </select>
                     </div>

                    <div class="form-group" id="tempat_tetap">
                       <label class="font-weight-bold" for="ruang_rapat">Tempat Tetap<span class="font-weight-bold text-danger"></span></label>
                       <select class="form-control select2" name="ruang_rapat" id="ruang_rapat">
                           <option value="">-- Pilih Tempat Tetap --</option>
                           <?php foreach($tempat_rapat as $trapat) : ?>
                               <option value="<?= $trapat->id ?>"><?= $trapat->ruang_rapat ?></option>
                           <?php endforeach; ?>
                      </select>
                     </div>

                    <div class="form-group" id="tempat_tidak_tetap">
                        <label class="font-weight-bold" for="tidak_tetap">Tempat Tidak Tetap</label>
                        <input class="form-control" type="text" name="tidak_tetap" id="tidak_tetap" placeholder="Masukkan ruangan tidak tetap">
                    </div>

                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                    <div class="form-group">
                        <label class="font-weight-bold" for="tgl_mulai">Tgl. Mulai Penggunaan<span class="font-weight-bold text-danger">*</span></label>
                        <input class="form-control" type="date" name="tgl_mulai" id="tgl_mulai">
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold" for="tgl_akhir">Tgl. Akhir Penggunaan<span class="font-weight-bold text-danger">*</span></label>
                        <input class="form-control" type="date" name="tgl_akhir" id="tgl_akhir">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="text-right">
                        <button type="submit" style="width:120px" class="btn btn-primary">Submit</button>
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