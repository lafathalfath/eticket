<div class="container-lg bg-white mt-4 rounded" data-aos="fade-up">
    <div class="p-5">
    <?= form_open('pengguna/form/fsid3801_save', ['id' => 'frm-submit-fsid3801']) ?>
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
                        <label class="font-weight-bold" for="nip">Nomor Induk Pegawai</label>
                        <input class="form-control" type="number" name="nip" id="nip" placeholder="Masukkan Nomor Induk Pegawai">
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold" for="jabatan">Jabatan</label>
                        <input class="form-control" type="text" name="jabatan" id="jabatan" placeholder="Masukkan Jabatan">
                    </div>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                  <div class="form-group">
                      <label class="font-weight-bold" for="identitas_perangkat">Identitas Perangkat<span class="font-weight-bold text-danger">*</span></label>
                      <input class="form-control" type="text" name="identitas_perangkat" id="identitas_perangkat" placeholder="Masukkan Identitas Perangkat">
                  </div>
                  <div class="form-group">
                      <label class="font-weight-bold" for="merk">Merk<span class="font-weight-bold text-danger">*</span></label>
                      <input class="form-control" type="text" name="merk" id="merk" placeholder="Masukkan Merk">
                  </div>
                  <div class="form-group">
                      <label class="font-weight-bold" for="spesifikasi_perangkat">Spesifikasi Perangkat<span class="font-weight-bold text-danger">*</span></label>
                      <input class="form-control" type="text" name="spesifikasi_perangkat" id="spesifikasi_perangkat" placeholder="Spesifikasi Perangkat">
                  </div>
                  <div class="form-group">
                      <label class="font-weight-bold" for="waktu_awal">Waktu Awal<span class="font-weight-bold text-danger">*</span></label>
                      <input class="form-control" type="date" name="waktu_awal" id="waktu_awal">
                  </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                   <div class="form-group">
                      <label class="font-weight-bold" for="operating_system">Operating System <span class="font-weight-bold text-danger">*</span></label>
                      <select class="form-control select2" name="operating_system" id="operating_system">
                          <option value="">-- Pilih Operating System --</option>
                          <?php foreach($operating_system as $os) : ?>
                              <option value="<?= $os->id ?>"><?= $os->os ?></option>
                          <?php endforeach; ?>
                     </select>
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold" for="nomor_seri">Antivirus<span class="font-weight-bold text-danger">*</span></label>
                        <input class="form-control" type="text" name="antivirus" id="antivirus" placeholder="Masukan Antivirus">
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold" for="nomor_seri">Mac Address<span class="font-weight-bold text-danger">*</span></label>
                        <input class="form-control" type="text" name="mac_address" id="mac_address" placeholder="Masukan Mac Address">
                    </div>

                    <div class="form-group">
                        <label class="font-weight-bold" for="waktu_akhir">Waktu Akhir<span class="font-weight-bold text-danger">*</span></label>
                        <input class="form-control" type="date" name="waktu_akhir" id="waktu_akhir">
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
