 <!-- Begin Page Content -->
 <div class="container-fluid">

     <section id="datapersonil" class="datapersonil">
         <div class="container">

             <div class="section-title">
                 <h2>Master Data Personil</h2>
                 <p style="display: none;">Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
                 <hr>
             </div>

             <!-- Add Data Personil -->
             <button type="button" data-toggle="modal" href="#mdl-add" class="btn btn-sm bg-teal-400 btn-labeled btn-labeled-left rounded-round text-light legitRipple mb-3"><b><i class="icon-add"></i></b>Tambah Data Personil</button>

             <!-- Laporan Tiap Personil DataTables -->
             <div class="card shadow mb-4">
                 <div class="card-header py-3">
                     <h6 class="m-0 font-weight-bold text-primary">Data Personil</h6>
                 </div>
                 <div class="card-body">
                     <div class="table-responsive">
                         <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                             <thead>
                                 <tr>
                                     <th>Nama Personil</th>
                                     <th>Username</th>
                                     <th>Role</th>
                                     <th>Action</th>
                                 </tr>
                             </thead>
                             <tbody>
                                 <tr>
                                     <td>Ilham Muhammad</td>
                                     <td>Ilham</td>
                                     <td>Staff</td>
                                     <td>
                                         <a data-toggle="modal" href="#mdl-detail" class="d-none d-sm-inline-block btn btn-sm btn-info shadow-sm"><i class="fas fa-pencil-alt fa-sm text-white-50"></i> Detail</a>
                                         <a data-toggle="modal" href="#mdl-edit" class="d-none d-sm-inline-block btn btn-sm btn-warning shadow-sm"><i class="fas fa-edit fa-sm text-white-50"></i> Edit</a>
                                         <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm"><i class="fas fa-trash fa-sm text-white-50"></i> Delete</a>
                                     </td>
                                 </tr>

                             </tbody>
                         </table>
                     </div>
                 </div>
             </div>

         </div>
     </section>

 </div>

 <!-- MODAL -->
 <div id="mdl-add" class="modal fade" tabindex="-1">
     <div class="modal-dialog modal-lg">
         <?= form_open_multipart(''); ?>

         <div class="modal-content">
             <div class="modal-header bg-teal-400">
                 <h6 class="text-light modal-title">Tambah Data Personil</h6>
                 <button type="button" class="close" data-dismiss="modal">&times;</button>
             </div>

             <div class="modal-body">
                 <input type="hidden" name="id" id="id">
                 <div class="row">

                     <div class="col-12">
                         <div class="form-group row">
                             <label class="col-form-label col-lg-2">Nama Lengkap</label>
                             <div class="col-lg-10">
                                 <input type="text" name="nama" id="nama" class="form-control" required="">
                             </div>
                         </div>

                         <div class="form-group row">
                             <label class="col-form-label col-lg-2">Username</label>
                             <div class="col-lg-10">
                                 <input type="text" name="username" id="username" class="form-control" required="">
                             </div>
                         </div>

                         <div class="form-group row">
                             <label class="col-form-label col-lg-2">Password</label>
                             <div class="col-lg-10">
                                 <input type="password" name="password" id="password" class="form-control" required="">
                             </div>
                         </div>

                         <div class="form-group row">
                             <label class="col-form-label col-lg-2" for="role">Role</label>
                             <div class="col-lg-10">
                                 <select id="role" name="role" class="form-control">
                                     <option selected>Pilih Role</option>
                                     <option value="">Staff</option>
                                     <option value="">...</option>
                                 </select>
                             </div>
                         </div>

                         <div class="form-group row">
                             <label class="col-form-label col-lg-2">Profile Pict</label>
                             <div class="col-lg-3">
                                 <img id="output-img" src="#" class="img-fluid img-thumbnail">
                             </div>
                             <div class="col-lg-4">
                                 <div class="custom-file">
                                     <input type="file" style="display: none;" onchange="preview(this)" class="custom-file-input" id="image" name="profile-image">
                                     <label class="custom-file-label" for="image">Choose file</label>
                                 </div>
                             </div>
                         </div>

                     </div>
                 </div>
             </div>

             <div class="modal-footer">
                 <button type="button" class="btn btn-link" data-dismiss="modal">Tutup</button>
                 <button type="button" id="btn-simpan" class="btn bg-success text-light">Simpan</button>
             </div>
         </div>
         <?= form_close(); ?>
     </div>
 </div>

 <div id="mdl-detail" class="modal fade" tabindex="-1">
     <div class="modal-dialog modal-lg">
         <?= form_open_multipart(''); ?>

         <div class="modal-content">
             <div class="modal-header bg-teal-400">
                 <h6 class="text-light modal-title">Detail Data Personil</h6>
                 <button type="button" class="close" data-dismiss="modal">&times;</button>
             </div>

             <div class="modal-body">
                 <input type="hidden" name="id" id="id">
                 <div class="row">

                     <div class="col-12">
                         <div class="form-group row">
                             <label class="col-form-label col-lg-2">Nama Lengkap</label>
                             <div class="col-lg-10">
                                 <input type="text" name="nama" id="nama" class="form-control" required="" readonly>
                             </div>
                         </div>

                         <div class="form-group row">
                             <label class="col-form-label col-lg-2">Username</label>
                             <div class="col-lg-10">
                                 <input type="text" name="username" id="username" class="form-control" required="" readonly>
                             </div>
                         </div>

                         <div class="form-group row">
                             <label class="col-form-label col-lg-2">Password</label>
                             <div class="col-lg-10">
                                 <input type="password" name="password" id="password" class="form-control" required="" readonly>
                             </div>
                         </div>

                         <div class="form-group row">
                             <label class="col-form-label col-lg-2" for="role">Role</label>
                             <div class="col-lg-10">
                                 <select id="role" name="role" class="form-control" readonly>
                                     <option value="" selected>Staff</option>
                                 </select>
                             </div>
                         </div>

                         <div class="form-group row">
                             <label class="col-form-label col-lg-2">Profile Pict</label>
                             <div class="col-lg-6">
                                 <img id="output-img" src="#" class="img-fluid img-thumbnail">
                             </div>
                         </div>

                     </div>
                 </div>
             </div>

             <div class="modal-footer">
                 <button type="button" class="btn btn-link" data-dismiss="modal">Tutup</button>
                 <button type="button" id="btn-simpan" class="btn bg-success text-light">Simpan</button>
             </div>
         </div>
         <?= form_close(); ?>
     </div>
 </div>

 <div id="mdl-edit" class="modal fade" tabindex="-1">
     <div class="modal-dialog modal-lg">
         <?= form_open_multipart(''); ?>

         <div class="modal-content">
             <div class="modal-header bg-teal-400">
                 <h6 class="text-light modal-title">Edit Data Personil</h6>
                 <button type="button" class="close" data-dismiss="modal">&times;</button>
             </div>

             <div class="modal-body">
                 <input type="hidden" name="id" id="id">
                 <div class="row">

                     <div class="col-12">
                         <div class="form-group row">
                             <label class="col-form-label col-lg-2">Nama Lengkap</label>
                             <div class="col-lg-10">
                                 <input type="text" name="nama" id="nama" class="form-control" required="">
                             </div>
                         </div>

                         <div class="form-group row">
                             <label class="col-form-label col-lg-2">Username</label>
                             <div class="col-lg-10">
                                 <input type="text" name="username" id="username" class="form-control" required="">
                             </div>
                         </div>

                         <div class="form-group row">
                             <label class="col-form-label col-lg-2">Password</label>
                             <div class="col-lg-10">
                                 <input type="password" name="password" id="password" class="form-control" required="">
                             </div>
                         </div>

                         <div class="form-group row">
                             <label class="col-form-label col-lg-2" for="role">Role</label>
                             <div class="col-lg-10">
                                 <select id="role" name="role" class="form-control">
                                     <option selected>Pilih Role</option>
                                     <option value="">Staff</option>
                                     <option value="">...</option>
                                 </select>
                             </div>
                         </div>

                         <div class="form-group row">
                             <label class="col-form-label col-lg-2">Profile Pict</label>
                             <div class="col-lg-3">
                                 <img id="output-img" src="#" class="img-fluid img-thumbnail">
                             </div>
                             <div class="col-lg-4">
                                 <div class="custom-file">
                                     <input type="file" style="display: none;" onchange="preview(this)" class="custom-file-input" id="image" name="profile-image">
                                     <label class="custom-file-label" for="image">Choose file</label>
                                 </div>
                             </div>
                         </div>

                     </div>
                 </div>
             </div>

             <div class="modal-footer">
                 <button type="button" class="btn btn-link" data-dismiss="modal">Tutup</button>
                 <button type="button" id="btn-simpan" class="btn bg-success text-light">Simpan</button>
             </div>
         </div>
         <?= form_close(); ?>
     </div>
 </div>

 <!-- script preview image -->
 <script type="text/javascript">
     function preview(e) {
         if (e.files[0]) {
             var reader = new FileReader();
             reader.onload = function(e) {
                 document.querySelector('#output-img').setAttribute('src', e.target.result);
             }
             reader.readAsDataURL(e.files[0]);
         }
     }
 </script>