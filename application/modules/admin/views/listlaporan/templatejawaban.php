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
				 <label class="font-weight-bold" for="deskpertanyaan">Deskripsi Permasalahan</label>
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
			 <?= form_open('listlaporan/templatejawaban?ticketId='.encode($trTicket->id)); ?>
				 <div class="form-group row">
					 <label class="col-form-label col-lg-4 font-weight-bold">Pilih FAQ<span class="text-danger">*</span></label>
					 <div class="col-lg-12">
						 <div class="table-responsive">
							 <table id="tbl-faq" class="table">
								 <thead>
								 <tr>
									 <th>#</th>
									 <th>Judul</th>
									 <th>Isi</th>
									 <th>Pilih</th>
								 </tr>
								 </thead>
								 <tbody></tbody>
							 </table>
						 </div>
					 </div>
				 </div>
			 	<button type="submit" class="btn bg-success text-light">Submit</button>
			 <?php else : ?>

				 <?php
			 		// KALO JAWABANNYA NULL TAMPILIN JAWABAN FAQ
					if (is_null($trJawaban->jawaban_id)) :
				 ?>
				 <div class="form-group">
					 <label>Judul FAQ</label>
					 <input type="text" class="form-control" value="<?= $trJawaban->judul ?>" readonly>
				 </div>
				 <div class="form-group">
					 <label for="deskjawaban">Isi FAQ</label>
					 <textarea class="form-control" readonly><?= strip_tags($trJawaban->isi) ?></textarea>
				 </div>
				 <div class="form-group">
					 <label>Waktu Jawab</label>
					 <input type="text" class="form-control" value="<?= $trJawaban->waktu_jawab ?>" readonly>
				 </div>
				 <?php else: ?>
					<div class="form-group">
						<label>Sudah terjawab di menu jawaban, klik <a href="<?= base_url('listlaporan/ketikjawaban?ticketId='.encode($trTicket->id)) ?>">disini</a> untuk melihat jawban</label>
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
	 "use strict"
	 var table;

	 $(function () {
		 if (!$().DataTable) {

			 console.warn('Warning - datatables.min.js is not loaded.');
			 return
		 }

		 // Setting datatable defaults
		 $.extend($.fn.dataTable.defaults, {
			 autoWidth: false,
			 //  dom: '<"datatable-header"fl><"datatable-scroll"t><"datatable-footer"ip>',
			 language: {
				 search: '<span>Pencarian:</span> _INPUT_',
				 searchPlaceholder: 'Kata kunci...',
				 lengthMenu: '<span>Tampil:</span> _MENU_',
				 paginate: {
					 'first': 'Pertama',
					 'last': 'Terakhir',
					 'next': $('html').attr('dir') == 'rtl' ? '&larr;' : '&rarr;',
					 'previous': $('html').attr('dir') == 'rtl' ? '&rarr;' : '&larr;'
				 }
			 }
		 });


		 table = $('#tbl-faq').DataTable({
			 processing: true,
			 serverSide: true,
			 deferRender: true,
			 responsive: true,
			 lengthMenu: [3, 5, 10],
			 pageLength: 5,
			 paging: true,
			 searching: true,
			 ordering: true,
			 info: true,
			 autoWidth: false,
			 ajax: {
				 url: '<?= base_url("admin/listlaporan/dt_listFaq"); ?>',
				 type: 'POST',
				 data: function(d) {
					 d.pilih_priv = 1;
					 // NOTE! add ticket_id if want to choose only based on masalah
				 }
			 },
			 columns: [
				 {
					 data: 'no',
					 name: 'no',
					 class: 'text-center'
				 },
				 {
					 data: 'judul',
					 name: 'judul'
				 },
				 {
					 data: 'isi',
					 name: 'isi'
				 },
				 {
					 data: 'pilih',
					 name: 'pilih',
					 class: 'text-center'
				 }
			 ],
			 columnDefs: [{
				 'sortable': false,
				 'searchable': false,
				 'targets': [0, -1]
			 }],
			 order: [
				 [1, 'asc']
			 ]
		 });

		 table.on('draw.dt', function () {
			 var info = table.page.info();
			 table.column(0, {
				 search: 'applied',
				 order: 'applied',
				 page: 'applied'
			 }).nodes().each(function (cell, i) {
				 cell.innerHTML = i + 1 + info.start;
			 })
		 })

		 $('#tbl-faq tbody').on('click', 'tr', function () {

		 	var radioFaq = $(this).find(".check-faq");

		 	if ($(this).hasClass('selected') ) {
				$(this).removeClass('selected');
			 	radioFaq.prop("checked", false);
			} else {
			 	$('tr.selected').removeClass('selected');
			 	$(this).addClass('selected');
			 	radioFaq.prop("checked", true);
			}
		 });
	 });
 </script>
