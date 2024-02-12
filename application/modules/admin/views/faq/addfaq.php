 <!-- Begin Page Content -->
 <div class="container-fluid">

     <section id="addFaq" class="addFaq">
         <div class="container">

             <div class="section-title">
                 <h2>Add FAQs</h2>
                 <hr>
             </div>

             <form id="form-faq" enctype="multipart/form-data">
                 <div class="form-group">
                     <label for="judul">Judul</label>
                     <input type="text" class="form-control" name="judul" id="judul" aria-describedby="emailHelp" placeholder="Enter Text">
                 </div>
                 <div class="form-group">laragon
                     <label for="exampleInputPassword1">Isi</label>
                     <textarea name="isi" id="summernote" class="form-control"></textarea>
                 </div>
                 <button type="submit" class="btn btn-primary">Submit</button>
                 <a href="<?= base_url('listfaq') ?>" class="btn btn-warning">Kembali</a>
             </form>

         </div>
     </section>

 </div>

 <!-- Summer Note -->
 <script src="<?= base_url('assets/back_template/vendor/summernote/summernote.min.js'); ?>"></script>

 <script>
     $(document).ready(function() {
                 $("#form-faq").on("submit", function(e) {
                     e.preventDefault();
                     formdata = new FormData();
                     formdata.append('judul', $('#judul').val())
                     formdata.append('isi', $('#isi').summernote())

                     $.ajax({
                         url: '<?php echo base_url('admin/faq/save_upload'); ?>',
                         data: formdata,
                         type: "POST",
                         dataType: 'JSON',
                         contentType: false,
                         cache: false,
                         processData: false,
                         success: function(response) {
                             if (response.res == 'success') {
                                 Swal.fire({
                                     type: 'success',
                                     title: 'Selamat !',
                                     html: 'Berhasil Membuat Informasi'
                                 });
                             } else if (response.res == 'gagal') {
                                 Swal.fire({
                                     type: 'error',
                                     title: 'Ups !',
                                     html: 'Berhasil Gagal Membuat Informasi'
                                 });
                             }
                         }
                     })
                 });
             }
 </script>