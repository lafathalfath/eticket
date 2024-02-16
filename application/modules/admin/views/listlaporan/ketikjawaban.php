<style>
	#input-chat{
		border: none;
	}
	#input-chat:focus{
		border: none;
		outline: none;
	}
	#chat-box{
		overflow-x: hidden;
		overflow-y: scroll;
		max-height: 75vh;
	}
    #chat-box::-webkit-scrollbar{
        width: 7px;
    }
    #chat-box::-webkit-scrollbar-track{
        box-shadow: inset 0 0 5px grey; 
        border-radius: 10px;
    }
    #chat-box::-webkit-scrollbar-thumb{
        background-color: gray; 
        border-radius: 10px;
    }
    #chat-box::-webkit-scrollbar-thumb:hover{
        background-color: white;
    }
	#chat-pesan{
		border: none;
	}
	#chat-pesan:focus{
		border: none;
		outline: none;
	}
</style>
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

			 <!-- chat -->
			 <div class="my-4 w-100 bg-dark rounded-lg">
					<div class="w-100 p-2" id="chat-box">
						<?php foreach($ticketChat as $tc): ?>
							<div class=" d-flex align-items-center
							<?php if($tc['pegawai_id']==$this->session->id) echo '
								justify-content-end
							'; else echo '
								justify-content-start
							' ?>">
								<div class="my-2 px-2 py-1 d-flex flex-column" style="
									<?php if($tc['pegawai_id']==$this->session->id) echo '
										background-color: #17A2B8; border-radius: 10px 10px 0 10px; max-width: 75%; align-items: end;
										'; 
									else echo '
										background-color: white; border-radius: 10px 10px 10px 0; color: black; max-width: 75%;
									';?>
								">
									
									<?= $tc['pesan'] ?>
									<div style="opacity: 0.5;font-size: 12px;">
										<?= substr($tc['tanggal'], -9, -3) ?>
									</div>
								</div>
							</div>
						<?php endforeach; ?>
					</div>
					<div class="p-1 w-100 bg-dark rounded-lg">
						<?php if($ticketStatus != 4): ?>
							<form action="" method="post" id="chat-form" class="w-100 d-flex align-items-center justify-content-center bg-light rounded-lg">
								<input id="ticket-id" type="text" name="ticket_id" value="<?=$ticketId?>" class="d-none">
								<input id="status-ticket" type="text" name="status_id" value="<?= $ticketStatus ?>" class="d-none">
								<input type="text" name="pesan" id="chat-pesan" placeholder="Tulis pesan ..." class="px-2 w-100 bg-transparent">
								<button type="submit" class="m-1 px-2 py-1 btn bg-info">send</button>
							</form>
						<?php else: ?>
							<div class="p-3 w-100 rounded-lg bg-success text-white d-flex align-items-center justify-content-center" style="font-size: 18px; cursor: not-allowed;">
								Tiket telah ditutup
							</div>
						<?php endif; ?>
					</div>
			 </div>
			 <!-- end chat -->
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
		 $('#chat-form').on('submit', e=>{
			e.preventDefault()
			const dataChat = {
				pesan: $('#chat-pesan').val(),
				ticket_id: $('#ticket-id').val(),
				status_ticket: $('#status-ticket').val()
			}
			$.ajax({
				type: 'POST',
				url: base_url('/pengguna/status/storeTicketChat'),
				data: dataChat,
				success: res => {
					console.log(res)
					location.reload()
				},
				error: err => {
					console.error(err)
				}
			})
		 })
     });
 </script>
