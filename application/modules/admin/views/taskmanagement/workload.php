<script src="<?= base_url('assets/global_assets/js/plugins/tables/datatables/datatables.min.js'); ?>"></script>
<script src="<?= base_url('assets/global_assets/js/plugins/forms/selects/select2.min.js'); ?>"></script>
<script src="<?= base_url('assets/global_assets/js/plugins/notifications/sweet_alert.min.js'); ?>"></script><!-- Begin Page Content -->
 <div class="container-fluid">

     <section id="listlaporan" class="listlaporan">
         <div class="container">

             <div class="section-title">
                 <h2>List Workload Personil</h2>
                 <hr>
             </div>

             <!-- Arahkan laporan -->
             <a href="<?= base_url('taskmanagement/arahkanlaporan') ?>" class="btn btn-primary mb-3"><i class="fas fa-plus"></i> Assign Ticket</a>

             <!-- List Workload DataTables -->
             <div class="card shadow mb-4">
                 <!-- <div class="card-header py-3">
                     <h6 class="m-0 font-weight-bold text-primary mb-3">List Workload Personil</h6>
                 </div> -->

                 <div class="card-body">
                     <div class="table-responsive">
                         <table class="table table-bordered" id="tbl-list" width="100%" cellspacing="0">
                             <thead>
                                 <tr>
                                    <th>No. </th>
                                    <th>Personil</th>
                                    <th><span class="badge badge-danger">Urgensi Tinggi</span></th>
                                    <th><span class="badge badge-warning">Urgensi Normal</span></th>
                                    <th><span class="badge badge-success">Urgensi Rendah</span></th>
                                    <th>Ticket Berjalan</th>
                                    <th>Ticket Selesai</th>
                                    <th>Aksi</th>
                                 </tr>
                             </thead>
                             <tbody></tbody>
                         </table>
                     </div>
                 </div>
             </div>

         </div>
     </section>

 </div>

 <div id="mdl-detail" class="modal fade" tabindex="-1">
     <div class="modal-dialog modal-lg">
         <?= form_open('admin/faq/save', array('id' => 'frm-detail')); ?>

         <div class="modal-content">
             <div class="modal-header bg-teal-400">
                 <h6 class="text-light modal-title">Lihat Workload</h6>
                 <button type="button" class="close" data-dismiss="modal">&times;</button>
             </div>

             <div class="modal-body">
                 <input type="hidden" name="id" id="id">
                 <div class="row">

                     <div class="col-12">
                       <div class="form-group row">
                           <label class="col-form-label col-lg-4">Personil</label>
                           <div class="col-lg-8">
                               <select name="personil" id="personil" class="form-control" required="" disabled>
                                   <option value="">Personil</option>
                                   <?php foreach ($l_personil as $r) : ?>
                                       <option value="<?= $r['id']; ?>"><?= $r['nama']; ?></option>
                                   <?php endforeach; ?>
                               </select>
                           </div>
                       </div>
                       <div class="form-group row">
                           <label class="col-form-label col-lg-4">Urgensi</label>
                           <div class="col-lg-8">
                               <select name="urgensi" id="urgensi" class="form-control" disabled>
                                   <option value="">Urgensi</option>
                                   <?php foreach ($l_urgensi as $r) : ?>
                                       <option value="<?= $r['id']; ?>"><?= $r['urgensi']; ?></option>
                                   <?php endforeach; ?>
                               </select>
                           </div>
                       </div>

                         <div class="form-group row">
                             <label class="col-form-label col-lg-2">Permasalahan</label>
                             <div class="col-lg-10">
                               <input type="text" name="judul" id="judul" class="form-control" required="" disabled>
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

 <!-- Function -->
 <script type="text/javascript">
     "use strict"
     var table, swalInit, form

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

        // Initialize
        swalInit = swal.mixin({
            buttonsStyling: false,
            confirmButtonClass: 'btn btn-primary',
            cancelButtonClass: 'btn btn-light'
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
                url: '<?= base_url("admin/taskmanagement/dt_workload"); ?>',
                type: 'POST',
                data: function(d) {
                    d.arahkan_priv = 1;
                    d.detail_priv = 1;
                }
            },
            columns: [{
                    data: 'no',
                    name: 'no',
                    class: 'text-center'
                },
                {
                    data: 'nama',
                    name: 'nama',
                    class: 'text-center'
                },
                {
                    data: 'workload_high',
                    name: 'workload_high',
                    class: 'text-center font-weight-bold',
                    // render: function(data, type, row, meta) {
                    //     return '<span class="badge badge-danger">' + data + '</span>';
                    // }
                },
                {
                    data: 'workload_normal',
                    name: 'workload_normal',
                    class: 'text-center font-weight-bold',
                    //  render: function(data, type, row, meta) {                        
                    //     return '<span class="badge badge-warning">' + data + '</span>';
                    // }
                },
                {
                    data: 'workload_low',
                    name: 'workload_low',
                    class: 'text-center font-weight-bold',
                    //  render: function(data, type, row, meta) {
                    //     return '<span class="badge badge-success">' + data + '</span>';
                    // }
                },
                {
                    data: 'workload_progress',
                    name: 'workload_progress',
                    class: 'text-center font-weight-bold',
                },
                {
                    data: 'workload_finish',
                    name: 'workload_finish',
                    class: 'text-center font-weight-bold'
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

        table.on('draw.dt', function() {
            var info = table.page.info();
            table.column(0, {
                search: 'applied',
                order: 'applied',
                page: 'applied'
            }).nodes().each(function(cell, i) {
                cell.innerHTML = i + 1 + info.start
            })
        })
    })
</script>
