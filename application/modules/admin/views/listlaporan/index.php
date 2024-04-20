 <!-- Begin Page Content -->
 <script src="<?= base_url('assets/global_assets/js/plugins/forms/selects/select2.min.js'); ?>"></script>
 <script src="<?= base_url('assets/global_assets/js/plugins/notifications/sweet_alert.min.js'); ?>"></script>

 <div class="container-fluid">

     <section id="listlaporan" class="listlaporan">
         <div class="container">

             <div class="section-title">
                 <h2>List Laporan Ticket</h2>
                 <hr>
             </div>

			 <?= $this->session->flashdata('message'); ?>
             <!-- List Laporan DataTables -->
             <div class="card shadow mb-4">
                 <div class="card-header py-3">
                     <h6 class="m-0 font-weight-bold text-primary">List Laporan Ticket</h6>
                 </div>
                 <div class="card-body">
                     <div class="table-responsive">
                         <table class="table table-bordered" id="tbl-list" width="100%" cellspacing="0">
                             <thead>
                                 <tr>
                                   <th>No.</th>
                                     <th>Kode Ticket</th>
                                     <th>Judul</th>
                                     <th>Status Ticket</th>
                                     <th>Tingkat Urgensi</th>
                                     <th>Tgl. Permohonan Ticket</th>
                                     <th>Tgl. Disposisi Tugas</th>
                                     <th>Aksi</th>
                                   </tr>
                               </thead>
                               <tbody></tbody>
                         </table>
                     </div>
                 </div>
             </div>

			 <div id="mdl-detail" class="modal fade" tabindex="-1">
				 <div class="modal-dialog modal-lg">
					 <?= form_open('admin/faq/save', array('id' => 'frm-detail')); ?>

					 <div class="modal-content">
						 <div class="modal-header bg-teal-400">
							 <h6 class="text-light font-weight-bold modal-title">Lihat Tiket</h6>
							 <button type="button" class="close" data-dismiss="modal">&times;</button>
						 </div>

						 <div class="modal-body">
							 <input type="hidden" name="id" id="id">
							 <div class="row">

								 <div class="col-12">
									 <div class="form-group row">
										 <label class="col-form-label font-weight-bold col-lg-2">Kode Ticket :</label>
										 <div class="col-lg-10">
											 <input type="text" name="kode_ticket" id="kode_ticket" class="form-control" required="" disabled>
										 </div>
									 </div>
									 <div class="form-group row">
										 <label class="col-form-label font-weight-bold col-lg-2">Nama Pemohon :</label>
										 <div class="col-lg-10">
											 <input type="text" name="nama" id="nama" class="form-control" required="" disabled>
										 </div>
									 </div>
									 <div class="form-group row">
										 <label class="col-form-label font-weight-bold col-lg-2">Nomor Telepon :</label>
										 <div class="col-lg-10">
											 <input type="text" name="telp" id="telp" class="form-control" required="" disabled>
										 </div>
									 </div>
									 <div class="form-group row">
										 <label class="col-form-label font-weight-bold col-lg-2">Tanggal Ticket :</label>
										 <div class="col-lg-10">
											 <input type="text" name="tanggal_tiket" id="tanggal_tiket" class="form-control" required="" disabled>
										 </div>
									 </div>
									 <div class="form-group row">
										 <label class="col-form-label font-weight-bold col-lg-2">Masalah :</label>
										 <div class="col-lg-10">
											 <div class="masalah"></div>
										 </div>
									 </div>

								 </div>
							 </div>
						 </div>

						 <div class="modal-footer">
							 <button type="button" class="btn btn-link" data-dismiss="modal">Tutup</button>
						 </div>
					 </div>
					 <?= form_close(); ?>
				 </div>
			 </div>

         </div>
     </section>

 </div>

 <script type="text/javascript">
     "use strict"
     var table

     $(function() {
        // Setting datatable defaults
        $.extend($.fn.dataTable.defaults, {
            autoWidth: false,
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
        })

        table = $('#tbl-list').DataTable({
            processing: true,
            serverSide: true,
            deferRender: true,
            responsive: true,
            pageLength: 10,
            paging: true,
            searching: true,
            ordering: true,
            info: true,
            autoWidth: false,
            ajax: {
                url: '<?= base_url("admin/listlaporan/dt_listLaporan"); ?>',
                type: 'POST',
                data: function(d) {
                    d.template_priv = 1;
                    d.jawab_priv = 1;
                    d.detail_priv = 1;
                }
            },
            columns: [{
                    data: 'no',
                    name: 'no',
                    class: 'text-center'
                },
                {
                    data: 'kodeTicket',
                    name: 'kodeTicket',
                    class: 'text-center font-weight-bold'
                },
                {
                    data: 'judul',
                    name: 'judul',
                    class: 'text-center'
                },
                {
                    data: 'status',
                    name: 'status',
                    class: 'text-center'
                },
                {
                    data: 'urgensi',
                    name: 'urgensi',
                    class: 'text-center',
                    render: function(data, type, row, meta) {
                        if ( data == 'Low' ) return '<span class="badge badge-success">' + data + '</span>';
                        if ( data == 'Normal' ) return '<span class="badge badge-warning">' + data + '</span>';
                        if ( data == 'High' ) return '<span class="badge badge-danger">' + data + '</span>';
                    }
                },
                {
                    data: 'waktuPermohonan',
                    name: 'waktuPermohonan',
                    class: 'text-center',
                    render: function(data, type, row, meta) {
                    return moment(data).format('DD/MM/YYYY HH:mm:ss')
                }
                },
                {
                    data: 'waktuDisposisi',
                    name: 'waktuDisposisi',
                    class: 'text-center',
                    render: function(data, type, row, meta) {
                    	return moment(data).format('DD/MM/YYYY HH:mm:ss')
                	}
                },
                {
                    data: 'aksi',
                    name: 'aksi',
                    class: 'text-center',
					render: function(data, type, row, meta) {
                    	var btnList = $(data);
                    	if (row.jenis_layanan_id === null) {
							btnList.find('.btn-template').hide();
						}
						return btnList.prop('outerHTML');
					}
                },
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

        table.on('draw.dt', function() {
            var info = table.page.info();
            table.column(0, {
                search: 'applied',
                order: 'applied',
                page: 'applied'
            }).nodes().each(function(cell, i) {
                cell.innerHTML = i + 1 + info.start
            })
        });

        function parseDetail(r, id) {
			 $('#kode_ticket').val(id)
			 $('#nama').val(r.name)
			 $('.masalah').html(r.description)
			 $('#tanggal_tiket').val(r.created_at)
            $('#telp').val(r.nomor_telepon)
		}

        $('#tbl-list')
		.delegate('a.btn-detail', 'click', function(e) {
			e.preventDefault()

			getDetail($(this).data('id'), base_url("admin/listlaporan/getDetailTicket"))
			.then(function(response) {
				if (response.success) {
					$('.modal-title').text('Lihat Ticket')
					parseDetail(response.data, response.id)
					$('#mdl-detail').modal('show');
				} else {
					swalInit.fire({
						title: 'Terjadi Kesalahan',
						icon: 'error',
						html: response.message
					});
				}
			})
			.catch(function(err) {
				console.log(err)
			})
		})
        .delegate('a.btn-template', 'click', function(e) {
            e.preventDefault()
            window.open(base_url('listlaporan/templatejawaban?ticketId=' + $(this).data('id')), '_blank')
        })
		.delegate('a.btn-jawab', 'click', function(e) {
			e.preventDefault()
			window.open(base_url('listlaporan/ketikjawaban?ticketId=' + $(this).data('id')), '_blank')
		})

       })
   </script>
