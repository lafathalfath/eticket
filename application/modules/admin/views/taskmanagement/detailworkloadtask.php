 <!-- Begin Page Content -->
 <div class="container-fluid">

     <section id="detailworkloadtask" class="detailworkloadtask">
         <div class="container">

             <div class="form-group">
                 <label for="judul">Judul Ticket</label>
                 <input type="text" class="form-control" id="judul" readonly value="Ticket 1">
             </div>
             <div class="form-group">
                 <label for="deskpertanyaan">Deskripsi Pertanyaan</label>
                 <textarea name="" id="summernote" class="form-control" readonly></textarea>
             </div>
             <a href="<?= base_url('taskmanagement/detailworkload') ?>" class="btn btn-sm btn-info">Kembali</a>

         </div>
     </section>

 </div>

 <script type="text/javascript">
     $(document).ready(function() {
         $('#summernote').summernote();
     });
 </script>