 <!-- Begin Page Content -->
 <div class="container-fluid">

     <section id="detailworkload" class="detailworkload">
         <div class="container">

             <div class="section-title">
                <h2 class="font-weight-bold">Detail Workload Personil</h2>
                <hr>
             </div>

            <button id="backHistory" class="btn btn-info btn-sm">Kembali</button>

             <?php if($checkPersonil == true) : ?>
             <!-- Personil Detailed -->
            <div class="card mt-4">
                <div class="card-body">
                    <table>
                        <tr>
                            <td>Nama</td><td>:</td><td class="font-weight-bold"><?= $personilData['nama'] ?></td>
                        </tr>
                        <tr>
                            <td>Peran</td><td>:</td><td class="font-weight-bold"><?= $personilData['role'] ?></td>
                        </tr>
                    </table>
                </div>
            </div>

             <div class="card shadow mt-4">
                <div class="card-header">
                    <div class="form-group">
                        <label for="filter">Filter</label>
                        <select class="form-control" name="filter" id="filter">
                            <option value="2">Ticket Dikerjakan</option>
                            <option value="3">Ticket Selesai</option>
                        </select>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="tbl-list" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No. </th>
                                    <th>Kode Ticket</th>
                                    <th>Status</th>
                                    <th>Urgensi</th>
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

            <?php else : ?>
                <div class="alert alert-danger text-center mt-4" role="alert">
                    Data Personil Tidak Ditemukan
                </div>
            <?php endif; ?>
         </div>
     </section>
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
                            <label class="col-form-label font-weight-bold col-lg-2">Judul Ticket</label>
                            <div class="col-lg-10">
                                <input type="text" name="judul_ticket" id="judul_ticket" class="form-control" required="" disabled>
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
                                <input type="text" name="tanggal_ticket" id="tanggal_ticket" class="form-control" required="" disabled>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label font-weight-bold col-lg-2">Deskripsi Permasalahan</label>
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

  <!-- Function -->
  <script type="text/javascript">
     "use strict"
     var table, form

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
                url: '<?= base_url("admin/taskmanagement/dt_detailWorkload"); ?>',
                type: 'POST',
                data: function(d) {
                    d.detail_priv = 1;
                    d.statusId = $('#filter').val()
                    d.personilId = <?= $personilData['id']; ?>
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
                    data: 'status',
                    name: 'status',
                    class: 'text-center font-weight-bold'
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
                    data: 'waktu_ticket',
                    name: 'waktu_ticket',
                    class: 'text-center',
                    render: function(data, type, row, meta) {
                        return moment(data).format('DD/MM/YYYY h:mm:ss')
                    }
                },
                {
                    data: 'waktu_disposisi',
                    name: 'waktu_disposisi',
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

        $('#tbl-list')
            .delegate('a.detail', 'click', function(e) {
                 e.preventDefault()

                 let that = $(this)

                 getDetail(that.data('id'), base_url("admin/taskmanagement/getDetailTicket"))
                     .then(function(response) {
                         if (response.success) {
                             $('.modal-title').text('Lihat Detail Ticket')
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

            function parseDetail(r, id) {
                 $('#kode_ticket').val(id)
                 $('#judul_ticket').val(r.title)
                 $('#nama').val(r.name)
                 $('.masalah').html(r.description)
                 $('#tanggal_ticket').val(r.created_at)
             }
        
        //filter change event
        $('#filter').on('change', function() {
            table.ajax.reload()
        })
    })
</script>