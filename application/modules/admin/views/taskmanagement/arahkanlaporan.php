<script src="<?= base_url('assets/global_assets/js/plugins/tables/datatables/datatables.min.js'); ?>"></script>
<script src="<?= base_url('assets/global_assets/js/plugins/forms/selects/select2.min.js'); ?>"></script>
<script src="<?= base_url('assets/global_assets/js/plugins/notifications/sweet_alert.min.js'); ?>"></script>

 <!-- Begin Page Content -->
 <div class="container-fluid">

     <section id="arahkanlaporan" class="arahkanlaporan">
         <div class="container">

             <div class="section-title">
                 <h2>Arahkan Laporan Ticket</h2>
                 <hr>
             </div>

             <button id="backHistory" class="btn btn-info btn-sm">Kembali</button>

             <!-- List Workload DataTables -->
             <div class="card shadow mt-4">
                 <div class="card-header py-3">
                     <h6 class="m-0 font-weight-bold text-primary mb-3">List Ticket Pemohon</h6>
                 </div>

                 <div class="card-body">
                     <div class="table-responsive">
                         <table class="table table-bordered" id="tbl-list" width="100%" cellspacing="0">
                             <thead>
                                 <tr>
                                    <th>No</th>
                                    <th>Kode Ticket</th>
                                    <th>Judul Ticket</th>
                                    <th>Tanggal Ticket</th>
                                    <th>Aksi</th>
                                 </tr>
                             </thead>
                             <tbody></tbody>
                         </table>
                     </div>
                 </div>
             </div>

             <!-- Modal Detail Ticket -->
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
                                         <label class="col-form-label font-weight-bold col-lg-2">Kode Ticket</label>
                                         <div class="col-lg-10">
                                             <input type="text" name="kode_ticket" id="kode_ticket" class="form-control" required="" disabled>
                                         </div>
                                     </div>                                     
                                     <div class="form-group row">
                                         <label class="col-form-label font-weight-bold col-lg-2">Nama Pemohon</label>
                                         <div class="col-lg-10">
                                             <input type="text" name="nama" id="nama" class="form-control" required="" disabled>
                                         </div>
                                     </div>
                                     <div class="form-group row">
                                         <label class="col-form-label font-weight-bold col-lg-2">Tanggal Ticket</label>
                                         <div class="col-lg-10">
                                             <input type="text" name="tanggal_tiket" id="tanggal_tiket" class="form-control" required="" disabled>
                                         </div>
                                     </div>
                                     <div class="form-group row">
                                         <label class="col-form-label font-weight-bold col-lg-2">Judul Ticket</label>
                                         <div class="col-lg-10">
                                             <input type="text" name="judul_ticket" id="judul_ticket" class="form-control" required="" disabled>
                                         </div>
                                     </div>
                                     <div class="form-group row">
                                         <label class="col-form-label font-weight-bold col-lg-2">Deskripsi Permasalahan</label>
                                         <div class="col-lg-10">
                                         <div class="alert alert-secondary mt-4"><span id="permasalahan"></span></div>
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

             <div id="mdl-form" class="modal fade" tabindex="-1">
                 <div class="modal-dialog modal-lg">
                     <?= form_open('admin/taskmanagement/save', array('id' => 'frm-modal')); ?>

                     <div class="modal-content">
                         <div class="modal-header bg-teal-400">
                             <h6 class="text-light modal-title"></h6>
                             <button type="button" class="close" data-dismiss="modal">&times;</button>
                         </div>

                         <div class="modal-body">
                            <input type="hidden" name="ticket_id" id="ticket_id">
                            <div class="row">
                                <div class="col-12 col-lg-12 col-md-12 col-sm-12">                                    

                                    <div class="form-group row">
                                        <label class="col-form-label col-lg-4 font-weight-bold">Pilih Personil<span class="text-danger">*</span></label>
                                        <div class="col-lg-12">
                                            <div class="table-responsive">
                                                <table id="tbl-personil" class="table">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Personil</th>
                                                            <th>Pilih</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody></tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-lg-4 font-weight-bold">Sesuaikan Urgensi<span class="text-danger">*</span></label>
                                        <div class="col-lg-10">
                                            <select name="urgensi" id="urgensi" class="form-control" required="">
                                                <option value="">-- Pilih Urgensi --</option>
                                                <?php foreach ($l_urgensi as $r) : ?>
                                                    <option value="<?= $r['id']; ?>"><?= $r['urgensi']; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>

                                </div>
                             </div>
                         </div>

                         <div class="modal-footer">
                             <button type="button" class="btn btn-link" data-dismiss="modal">Tutup</button>
                             <button type="submit" id="btn-simpan" class="btn bg-success text-light">Simpan</button>
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
     var table, table2, form

     $(function() {
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
                 url: '<?= base_url("admin/taskmanagement/dt_listingTicket"); ?>',
                 type: 'POST',
                 data: function(d) {
                     d.detail_priv = 1;
                     d.arahkan_priv = 1;
                 }
             },
             columns: [{
                     data: 'no',
                     name: 'no',
                     class: 'text-center'
                 },
                 {
                    data: 'kode_ticket',
                    name: 'kode_ticket',
                    class: 'text-center font-weight-bold'
                 },
                 {
                    data: 'judul_ticket',
                    name: 'judul_ticket',
                    class: 'text-center'
                 },
                {
                    data: 'tanggal_tiket',
                    name: 't.waktu_lapor',
                    class: 'text-center',
                    render: function(data, type, row, meta) {
                        return moment(data).format('DD/MM/YYYY h:mm:ss')
                    }
                },
                {
                    data: 'aksi',
                    name: 'aksi',
                    class: 'text-center'
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

         table2 = $('#tbl-personil').DataTable({
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
                 url: '<?= base_url("admin/taskmanagement/dt_listPersonil"); ?>',
                 type: 'POST',
                 data: function(d) {
                     d.pilih_priv = 1;
                     d.urgensi_priv = 1;
                 }
             },
             columns: [
                {
                     data: 'no',
                     name: 'no',
                     class: 'text-center'
                 },
                 {
                     data: 'nama',
                     name: 'pl.nama'
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

         table2.on('draw.dt', function () {
            var info = table.page.info();
            table2.column(0, {
                search: 'applied',
                order: 'applied',
                page: 'applied'
            }).nodes().each(function (cell, i) {
                cell.innerHTML = i + 1 + info.start;
            })
        })

        // $("div.urgensi-container").html('<select name="urgensi" id="urgensi" class="form-control select2"></select>');

        // $.getJSON(base_url('admin/taskmanagement/getUrgensi'), function (data) {
		// 	$.each(data, function (key,value) {
		// 		$("#urgensi").append('<option value="'+ this.id +'">'+ this.urgensi +'</option>')
		// 	})
		// 	table2.ajax.reload()
		// })

        $('#tbl-personil tbody').on( 'click', 'tr', function () {
            console.log('personil : ' + $(this).find("#personil").val())
            if ( $(this).hasClass('selected') ) {
                $(this).removeClass('selected');
                $(this).find("#personil").prop("checked", false);
            }
            else {
                $('tr.selected').removeClass('selected');
                $(this).addClass('selected');
                $(this).find("#personil").prop("checked", true);
            }
        });

        $('#tbl-list')
        .delegate('a.detail', 'click', function(e) {
                e.preventDefault()

                let that = $(this)

                getDetail(that.data('id'), base_url("admin/taskmanagement/getDetailTicket"))
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

                $('#mdl-add').modal('show');
        })
        .delegate('a.tugaskan', 'click', function(e) {
            e.preventDefault()
            $('.modal-title').text('Tugaskan Ticket')
            $('#mdl-form').modal('show');
            $('#ticket_id').val($(this).data('id'))
        })

        function parseDetail(r, id) {
            $('#kode_ticket').val(id)
            $('#nama').val(r.name)
            $('#judul_ticket').val(r.title)
            $('#permasalahan').html(r.description)
            $('#tanggal_tiket').val(r.created_at)
        }

        $('#frm-modal').on('submit', function(e) {
            e.preventDefault()
            var that = $(this)

            //submit form
            Swal.fire({			
                title: 'Simpan Data',
                text: "Apakah semua data telah terisi dengan benar ?",
                showCloseButton: true,
                showCancelButton: true
            }).then((result) => {
                if (result.value) {
                    saveSerialize(that.serializeArray(), that.attr('action'))
                    .then(function(response) {
                        if (response.success) {
                            table.ajax.reload()
                            $('#mdl-form').modal('hide')
                            swalInit.fire({
                                // icon: 'success',
                                title: 'Sukses',
                                text: response.message,
                                showConfirmButton: false,
                                timer: 3000								
                            })
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
                }
            })
        })

    $('#mdl-form').on('hide.bs.modal', function(e) {
        $('#frm-modal').trigger('reset')
        $('#id').val('')
    })

     });
 </script>
