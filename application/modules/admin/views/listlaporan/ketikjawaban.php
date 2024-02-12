 <!-- Begin Page Content -->
 <div class="container-fluid">

     <section id="ketikjawaban" class="ketikjawaban">
         <div class="container">
			 <?= $this->session->flashdata('message'); ?>
			<?php if (isset($trTicket)) : ?>
             <div class="form-group">
                 <label class="font-weight-bold" for="judul">Judul Ticket</label>
                 <input type="text" class="form-control" id="judul" value="<?= $trTicket->title ?>" readonly>
             </div>
             <div class="form-group">
                 <label class="font-weight-bold" for="deskpertanyaan">Deskripsi Pertanyaan</label>
                 <textarea name="" id="" class="form-control" readonly><?= strip_tags($trTicket->description) ?></textarea>
             </div>
			 <div class="form-group">
				<label class="font-weight-bold" for="attachment">Attachment</label><br>
				<?php foreach($ticketAttachment as $attachment) : ?>
					<a href="<?= base_url($attachment->path_attachment) ?>" target="_blank"><?= $attachment->detail_attachment ?></a>
					<?php if (next($ticketAttachment)) {
						echo ', '; // Add comma for all elements instead of last
					}?>
				<?php endforeach; ?>
			</div>  
             <hr>
			 <?php if (is_null($trJawaban)) : ?>
			 <?= form_open('listlaporan/ketikjawaban?ticketId='.encode($trTicket->id)); ?>
                 <div class="form-group">
                     <label for="deskjawaban">Tulis Jawaban Ticket</label>
                     <textarea name="text" id="summernote" class="form-control"></textarea>
					 <?= form_error('text', '<small class="text-danger pl-3">', '</small>'); ?>
                 </div>
                 <button type="submit" class="btn bg-success text-light">Submit</button>
			 <?php else : ?>


			 	<?php
				// KALO FAQNYA NULL TAMPILIN KETIKJAWABAN
				if (is_null($trJawaban->faq_id)) :
				?>
				 <div class="form-group">
					 <label for="deskjawaban">Jawaban Ticket</label><br>
					 <?= html_entity_decode($trJawaban->jawab) ?>
				 </div>
				 <div class="form-group">
					 <label for="judul">Waktu Jawab</label>
					 <input type="text" class="form-control" value="<?= $trJawaban->waktu_jawab ?>" readonly>
				 </div>
				<?php else: ?>
					<div class="form-group">
						<label>Sudah terjawab di menu jawaban menggunakan template, klik <a href="<?= base_url('listlaporan/templatejawaban?ticketId='.encode($trTicket->id)) ?>">disini</a> untuk melihat jawban</label>
					</div>
				<?php endif; ?>
			 <?php endif; ?>
                 <a href="<?= base_url('listlaporan') ?>" class="btn btn-warning">Kembali</a>
			 <?= form_close(); ?>
			<?php else: ?>
				<div class="alert alert-danger text-center mt-4" role="alert">
					Data Tiket Tidak Ditemukan
				</div>
				<a href="<?= base_url('listlaporan') ?>" class="btn btn-warning">Kembali</a>
			 <?php endif; ?>
         </div>
     </section>

 </div>

 <script type="text/javascript">
     $(document).ready(function() {
         $('#summernote').summernote({
			 toolbar: [
				 ['font', ['bold', 'underline', 'clear']],
				 ['fontname', ['fontname']],
				 ['color', ['color']],
				 ['para', ['ul', 'ol', 'paragraph']],
				 ['table', ['table']],
				 ['insert', ['link', 'picture', 'video']],
				 ['view', ['fullscreen', 'help']],
			 ],

		 });
     });
 </script>
