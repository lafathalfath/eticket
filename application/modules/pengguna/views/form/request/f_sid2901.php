<div class="container-lg bg-white mt-4 rounded" data-aos="fade-up">
    <div class="p-5">
    <?= form_open('pengguna/form/fsid2901_save', ['id' => 'frm-submit-fsid2901']) ?>
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
                        <label class="font-weight-bold" for="nip">Nomor Induk Pegawai <span class="font-weight-bold text-danger">*</span></label>
                        <input class="form-control" type="number" name="nip" id="nip" placeholder="Masukkan Nomor Induk Pegawai">
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold" for="jabatan">Jabatan <span class="font-weight-bold text-danger">*</span></label>
                        <input class="form-control" type="text" name="jabatan" id="jabatan" placeholder="Masukkan Jabatan">
                    </div>
                </div>
            </div> 
            <hr>
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                    <div class="form-group">
                        <label class="font-weight-bold" for="identitas_perangkat">Identitas Perangkat <span class="font-weight-bold text-danger">*</span></label>
                        <input class="form-control" type="text" name="identitas_perangkat" id="identitas_perangkat" placeholder="Tuliskan Perangkat, cth: Laptop">
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold" for="merk_perangkat">Merk Perangkat <span class="font-weight-bold text-danger">*</span></label>
                        <input class="form-control" type="text" name="merk_perangkat" id="merk_perangkat" placeholder="Tuliskan Merk Perangkat">
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold" for="mac_address">Mac Address <span class="font-weight-bold text-danger">*</span></label>
                        <input class="form-control" type="text" name="mac_address" id="mac_address" placeholder="Tuliskan Mac Address Perangkat">
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold" for="lokasi_kerja">Lokasi Kerja <span class="font-weight-bold text-danger">*</span></label>
                        <input class="form-control" type="text" name="lokasi_kerja" id="lokasi_kerja" placeholder="Tuliskan Alamat Lokasi Kerja">
                    </div>

                    <div class="row">
                     <div class="col-lg-6">
                      <div class="form-group">
                       <label class="font-weight-bold">Tanggal Akses Awal <span class="font-weight-bold text-danger">*</span></label>
                       <div class="input-group date">
                        <div class="input-group-addon">
                               <span class="glyphicon glyphicon-th"></span>
                           </div>
                           <input placeholder="masukkan tanggal Awal" type="date" class="form-control" name="tgl_awal" id="tgl_awal">
                       </div>
                      </div>
                      <div class="form-group">
                       <label class="font-weight-bold">Tanggal Akses Akhir <span class="font-weight-bold text-danger">*</span></label>
                       <div class="input-group date">
                        <div class="input-group-addon">
                               <span class="glyphicon glyphicon-th"></span>
                           </div>
                           <input placeholder="masukkan tanggal Akhir" type="date" class="form-control" name="tgl_akhir" id="tgl_awal">
                       </div>
                      </div>
                     </div>
                    </div>

                </div>

                <div class="col-lg-6 col-md-6 col-sm-12 col-12">                    
                    <div class="form-group">
                        <label class="font-weight-bold" for="jenis_kegiatan">Jenis Kegiatan<span class="font-weight-bold text-danger">*</span></label>
                        <input class="form-control" type="text" name="jenis_kegiatan" id="jenis_kegiatan" placeholder="Tuliskan Jenis Kegiatan">
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold" for="service_id">Service yang Diakses <span class="font-weight-bold text-danger">*</span></label>
                        <select class="form-control select2" name="service_id" id="service_id">
                            <option value="">-- Pilih Service yang diakses --</option>
                            <?php foreach($teleworkingService as $unit) : ?>
                                <option value="<?= $unit->id ?>"><?= $unit->nama_service ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                        <div class="form-group">
                            <label class="font-weight-bold" for="subservice_id">Subservice yang Diakses</label>
                            <select class="form-control select2" name="subservice_id" id="subservice_id">
                                <option value="">-- Jika Memilih Service PC/Server --</option>
                                <?php foreach($teleworkingSubservice as $unit) : ?>
                                    <option value="<?= $unit->id ?>"><?= $unit->nama_subservice ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold" for="ip_address">IP Address</label>
                            <input class="form-control" type="text" name="ip_address" id="ip_address" placeholder="Tuliskan IP Address">
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold" for="aplikasi_id">Aplikasi yang Diakses</label>
                            <select class="form-control select2" name="aplikasi_id" id="aplikasi_id">
                                <option value="">-- Jika Memilih Service Aplikasi --</option>
                                <?php foreach($dataAplikasi as $unit) : ?>
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