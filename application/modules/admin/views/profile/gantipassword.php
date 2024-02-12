 <!-- Begin Page Content -->
 <div class="container-fluid">

     <section id="gantipasswordprofile" class="gantipasswordprofile">
         <div class="container">

             <div class="section-title">
                 <h2>Ganti Password</h2>
                 <hr>
             </div>
             <?= $this->session->flashdata('message'); ?>
             <form action ="<?= base_url('admin/profile/gantipassword');?>" method ="post">
                 <div class="form-group">
                     <label for="passwordlama">Password Lama</label>
                     <input type="password" class="form-control" id="passwordlama" name="passwordlama">
                     <?= form_error('passwordlama', 'small class="text-danger pl-3">', '</small>'); ?>
                 </div>
                 <div class="form-group">
                     <label for="passwordbaru">Password Baru</label>
                     <input type="password" class="form-control" id="passwordbaru" name="passwordbaru">
                     <?= form_error('passwordbaru', 'small class="text-danger pl-3">', '</small>'); ?>
                 </div>
                 <div class="form-group">
                     <label for="konfirmasipasswordbaru">Konfirmasi Password Baru</label>
                     <input type="password" class="form-control" id="konfirmasipasswordbaru" name="konfirmasipasswordbaru">
                     <?= form_error('konfirmasipasswordbaru', 'small class="text-danger pl-3">', '</small>'); ?>
                 </div>
<div class="form-group">
                 <button type="submit" class="btn btn-primary">Submit</button>
                 <a href="<?= base_url('profile') ?>" class="btn btn-warning">Kembali</a>
               </div>
             </form>

         </div>
     </section>

 </div>
