<!-- Begin Page Content -->
<script src="<?= base_url('assets/global_assets/js/plugins/tables/datatables/datatables.min.js'); ?>"></script>
<script src="<?= base_url('assets/global_assets/js/plugins/forms/selects/select2.min.js'); ?>"></script>
<script src="<?= base_url('assets/global_assets/js/plugins/notifications/sweet_alert.min.js'); ?>"></script>

<div class="container-fluid">

    <section id="Faq" class="Faq">
        <div class="container">

            <div class="section-title">
                <h2>FAQ</h2>
                <hr>
            </div>

            <!-- Add FAQ -->
            <button type="button" id="btn-add" class="btn btn-sm bg-teal-400 btn-labeled btn-labeled-left rounded-round text-light legitRipple mb-3"><b><i class="icon-add"></i></b>Tambah FAQ</button>

            <!-- FAQs DataTables -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">FAQs</h6>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table id="tbl-list" class="table">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Judul</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                            <tfoot>
                                <tr>
                                    <th>No.</th>
                                    <th>Judul</th>
                                    <th>Aksi</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </section>

</div>

<!-- MODAL -->
<div id="mdl-detail" class="modal fade" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <?= form_open_multipart('admin/faq/save', array('id' => 'frm-detail')); ?>

        <div class="modal-content">
            <div class="modal-header bg-teal-400">
                <h6 class="text-light modal-title">Edit FAQ</h6>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <div class="modal-body">
                <input type="hidden" name="id" id="id">
                <div class="row">

                    <div class="col-12">
                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">Judul FAQ</label>
                            <div class="col-lg-10">
                                <input type="text" name="judul" id="judul" class="form-control" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">isi</label>
                            <div class="col-lg-10">
                                <textarea name="isi" id="isi" class="form-control"></textarea>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-link" data-dismiss="modal">Tutup</button>
                <button type="button" id="btn-simpan" class="btn bg-success text-light">Simpan</button>
            </div>
        </div>
        <?= form_close(); ?>
    </div>
</div>

<div id="mdl-add" class="modal fade" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <?= form_open('admin/faq/save', array('id' => 'frm-detail')); ?>

        <div class="modal-content">
            <div class="modal-header bg-teal-400">
                <h6 class="text-white modal-title">Tambah FAQ</h6>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <div class="modal-body">
                <input type="hidden" name="kode" id="kode">
                <div class="row">

                    <div class="col-12">
                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">Judul</label>
                            <div class="col-lg-10">
                                <input disabled type="text" name="judul" id="judul1" class="form-control" required="">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">isi</label>
                            <div class="col-lg-10">
                                <textarea disabled name="isi" id="isi1" class="form-control"></textarea>
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
            ordering: false,
            info: true,
            autoWidth: false,
            ajax: {
                url: '<?= base_url("admin/faq/dt_faq"); ?>',
                type: 'POST',
                data: function(d) {
                    d.edit_priv = 1;
                    d.delete_priv = 1;
                    d.view_priv = 1;
                }
            },
            columns: [{
                    data: 'no',
                    name: 'no',
                    class: 'text-center'
                },
                {
                    data: 'judul',
                    name: 'h.judul'
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

        $('#btn-add').click(function() {
        $('#mdl-detail.modal-title').text('Tambah FAQ')
        $('#mdl-detail').modal('show');
        })

        $('#tbl-list')
            .delegate('a.btn-view', 'click', function(e) {
                e.preventDefault()

                let that = $(this)

                detail_data(that.data('id'))
                    .then(function(hasil) {
                        if (hasil.error == true) {
                            swalInit.fire({
                                title: 'Terjadi Kesalahan',
                                type: 'error',
                                html: hasil.message
                            });
                        } else {
                            $('.modal-title').text('View FAQ')
                            parse_view(hasil.data, hasil.id)
                            $('#mdl-add').modal('show');
                        }

                    })
                    .catch(function(err) {
                        console.log(err)
                    })
            })
            .delegate('a.btn-edit', 'click', function(e) {
                e.preventDefault()

                let that = $(this)

                detail_data(that.data('id'))
                    .then(function(hasil) {
                        if (hasil.error == true) {
                            swalInit.fire({
                                title: 'Terjadi Kesalahan',
                                type: 'error',
                                html: hasil.message
                            });
                        } else {
                            $('.modal-title').text('Edit FAQ')
                            parse_detail(hasil.data, hasil.id)
                            $('#mdl-detail').modal('show');
                        }

                    })
                    .catch(function(err) {
                        console.log(err)
                    })
            })

            .delegate('a.btn-delete', 'click', function(e) {
                e.preventDefault()

                let that = $(this)

                swalInit.fire({
                    title: 'Konfirmasi',
                    text: "Apakah anda yakin akan menghapus data ini?",
                    showCancelButton: true,
                    confirmButtonText: 'Ya, Hapus!',
                    cancelButtonText: 'Tidak!',
                    confirmButtonClass: 'btn btn-success',
                    cancelButtonClass: 'btn btn-danger',
                    buttonsStyling: false
                }).then(function(result) {
                    if (result.value) {
                        hapus_data(that.data('id'))
                            .then(function(hasil) {
                                if (hasil.error == true) {
                                    swalInit.fire({
                                        title: 'Terjadi Kesalahan',
                                        type: 'error',
                                        html: hasil.message
                                    });
                                } else {
                                swalInit.fire({
                                        title: 'Sukses',                                         
                                        html: hasil.message
                                    });
                                    table.ajax.reload()
                                }
                            })
                    }
                });
            })


        function hapus_data(val) {
            return new Promise(function(resolve, reject) {
                $.ajax({
                    url: '<?= base_url("admin/faq/hapus"); ?>',
                    method: 'POST',
                    dataType: 'json',
                    data: {
                        id: val
                    }
                }).done(function(hasil) {
                    resolve(hasil)
                }).fail(function() {
                    reject('Gagal hapus data detail!')
                })
            })
        }

        $('#btn-simpan').on('click', function(e) {
            e.preventDefault()

            simpan_data()
                .then(function(hasil) {
                    if (hasil.success) {
                        table.ajax.reload()
                        $('#mdl-detail').modal('hide')
                        swalInit.fire({
                            title: 'Sukses',
                            html: hasil.message,
                            type: 'success'
                        })
                    } else {
                        swalInit.fire({
                            title: 'Terjadi Kesalahan',
                            type: 'error',
                            html: hasil.message
                        });                        
                    }
                })
                .catch(function(err) {
                    console.log(err)
                })
        })

        function simpan_data() {
            form = $('#frm-detail').serializeArray()
            form.push({
                name: 'judul',
                value: $('#judul').val()
            })
            form.push({
                name: 'isi',
                value: $('#isi').val()
            })

            return new Promise(function(resolve, reject) {
                $.ajax({
                    url: $('#frm-detail').attr('action'),
                    method: 'POST',
                    dataType: 'json',
                    data: form
                }).done(function(hasil) {
                    resolve(hasil)
                }).fail(function() {
                    reject('Gagal simpan data!')
                })
            })
        }

        // Upload Summer Notee
        $('#isi').summernote({
        dialogsInBody: true,
        dialogsFade: false,
            toolbar: [
                ['font', ['bold', 'underline', 'clear']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link', 'picture', 'video']],
            ],
            callbacks: {
                onImageUpload: function(image) {
                    uploadImage(image[0]);
                },
                onMediaDelete : function(target) {
                    deleteImage(target[0].src);
                }
            }
        });
        
        function uploadImage(image) {
            var data = new FormData();
            data.append("image", image);
            $.ajax({
                url: "<?php echo site_url('admin/faq/upload_image')?>",
                cache: false,
                contentType: false,
                processData: false,
                data: data,
                type: "POST",
                success: function(res) {
                    if (res.success) {
                        $('#isi').summernote("insertImage", res.url);
                    } else {
                        swalInit.fire({
                            title: 'Terjadi Masalah',
                            html: res.message,
                            type: 'error',
                        })
                    }
                },
                error: function(data) {
                    console.log(data);
                }
            });
        }

        function deleteImage(src) {
            $.ajax({
                data: {src : src},
                type: "POST",
                url: "<?php echo site_url('admin/faq/delete_image')?>",
                cache: false,
                success: function(response) {
                    console.log(response);
                }
            });
        }

        $('#mdl-detail').on('hide.bs.modal', function(e) {
            $('#frm-detail').trigger('reset')
            $('#id').val('')
            $('#isi').summernote('code', '');
        })

        $('#mdl-add').on('hide.bs.modal', function(e) {
            $('#frm-detail').trigger('reset')
            $('#kode').val('')
            $('#isi1').summernote('code', '');
        })

        function detail_data(val) {
            return new Promise(function(resolve, reject) {
                $.ajax({
                    url: '<?= base_url("admin/faq/get_detail"); ?>',
                    method: 'POST',
                    dataType: 'json',
                    data: {
                        id: val
                    }
                }).done(function(hasil) {
                    resolve(hasil)
                }).fail(function() {
                    reject('Gagal memuat data detail!')
                })
            })
        }

        function parse_detail(r, id) {
            $('#id').val(id)
            $('#judul').val(r.judul)
            $('#isi').summernote('code', r.isi)

        }

        function parse_view(r, id) {
            $('#kode').val(id)
            $('#judul1').val(r.judul)
            $('#isi1').summernote('code', r.isi)
            $('#isi1').summernote('disable')
        }

    })
</script>