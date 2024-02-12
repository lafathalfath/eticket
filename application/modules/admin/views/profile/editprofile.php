 <div class="container-fluid">

    <section id="editprofile" class="editprofile">
        <div class="container">

            <div class="section-title">
                <h2> Edit Profile</h2>
                <hr>
            </div>

            <div class="card">
                <div class="card-body">
                    <div class="row">
                       <div class="col-lg-8 col-sm-12">
                         <?= form_open('admin/profile/editprofile'); ?>
                      <div class="form-group row">
                          <label class="col-form-label col-lg-2">Nama</label>
                          <div class="col-lg-10">
                               <input type="text" name="nama" id="nama" class="form-control" value="<?= $personil['nama'];?>">
                               <?= form_error('nama', 'small class="text-danger pl-3">', '</small>'); ?>
                          </div>
                      </div>

                      <div class="form-group row">
                          <label class="col-form-label col-lg-2">Username</label>
                          <div class="col-lg-10">
                               <input type="text" name="username" id="username" value="<?= $personil['username'];?>" class="form-control">
                               <?= form_error('username', 'small class="text-danger pl-3">', '</small>'); ?>
                          </div>
                      </div>


                      <div class="form-group row">
                          <label class="col-form-label col-lg-2">Profile Picture</label>
                          <div class="col-sm-10">
                               <div class="row">
                                <div class="col-sm-3">
                                  <img src="<?= base_url('assets/upload/personil/profil/') .
                                  $personil['path_images'];?>" class="img-thumbnail">
                          </div>
                          <div class="col-sm-9">
                            <div class="custom-file">
                              <input type="file" class="custom-file-input" id="path_images" name="path_images">
                              <label class="custom-file-label" for="path_images"> Pilih Gambar</label>
                      </div>

</div>
                    </div>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-lg-10">
                     <button type="submit" class="btn btn-primary"> Edit </button>
                </div>
            </div>
            <?= form_close(); ?>

        </div>
    </section>

</div>
