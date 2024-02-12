 <!-- Begin Page Content -->
 <div class="container-fluid">

     <section id="editFaq" class="editFaq">
         <div class="container">

             <div class="section-title">
                 <h2>Edit FAQs</h2>
                 <hr>
             </div>

             <form>
                 <div class="form-group">
                     <label for="judul">Judul</label>
                     <input type="text" class="form-control" id="judul" aria-describedby="emailHelp" placeholder="Enter Text">
                 </div>
                 <div class="form-group">
                     <label for="exampleInputPassword1">Isi</label>
                     <textarea name="" id="" cols="30" rows="10" class="form-control"></textarea>
                 </div>
                 <button type="submit" class="btn btn-primary">Submit</button>
                 <a href="<?= base_url('listfaq') ?>" class="btn btn-warning">Kembali</a>
             </form>

         </div>
     </section>

 </div>