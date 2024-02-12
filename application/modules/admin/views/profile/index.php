 <!-- Begin Page Content -->
 <div class="container-fluid">

     <section id="profile" class="profile">
         <div class="container">

             <div class="section-title">
                 <h2>Profile</h2>
                 <hr>
             </div>
             <div class="row">
               <div class="col-lg-6">
                 <?= $this->session->flashdata('message');?>
               </div>
             </div>
             
             <div class="card">
                 <div class="card-body">
                     <div class="row no-gutters">
                       <div class="col-lg-8 col-sm-12">
                         <a href="<?= base_url('admin/profile/editprofile') ?>" class="badge badge-info">Edit Profile</a>
                         <a href="<?= base_url('profile/gantipassword') ?>" class="badge badge-warning">Ganti Password</a>
                       </div>
                         <div class="col-md-4">
                             <img src="<?= base_url('assets/upload/personil/profil/') .
                             $personil['path_images'];?>" class="img-thumbnail img-fluid img-profile">
                         </div>
                         <div class="col-md-8">
                           <div class="card-body">
                             <h5 class="card-title"><?= $personil['nama'];?></h5>
                             <p class="card-text"><?= $personil['username'];?></p>
                           </div>
                         </div>

                 </div>
             </div>

         </div>
     </section>

 </div>
