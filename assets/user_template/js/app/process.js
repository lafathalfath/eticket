$(document).ready(function () {
	'use strict'

	const swalInit = Swal.mixin({
		customClass: {
			confirmButton: 'btn btn-success',
			cancelButton: 'btn btn-danger'
		},
		buttonsStyling: false
	})

	// validate and submit form
	var validObj = $('#frm-submit').validate({
		rules: {
			masalah: {
				required: true,
				normalizer: function (val) {
					return $.trim(val)
				}
			}
		},
		// errorClass: "is-invalid",
		// validClass: "is-valid",	
		// onkeyup: false,
		errorClass: "myErrorClass",
		errorPlacement: errorValidate,
		submitHandler: function (form) {
			Swal.fire({
				type: 'question',
				title: 'Simpan Data',
				text: "Apakah semua data telah terisi dengan benar ?",
				showCloseButton: true,
				showCancelButton: true
			}).then((result) => {
				if (result.value) {
					var form = new FormData();
					var attach = document.getElementById('attachment').files.length;
					for (var x = 0; x < attach; x++) {
						form.append("attachment[]", document.getElementById('attachment').files[x]);
						console.log(document.getElementById('attachment').files[x])
					}

					// append some val to form
					form.append("id", $('#id').val())
					form.append("nama_proyek", $('#nama_proyek').val())
					form.append("jml_foto", $('#jml_foto').val())
					form.append("nama_pic", $('#nama_pic').val())
					form.append("kontak_pic", $('#kontak_pic').val())
					form.append("id_client", $('#id_client').val())
					form.append("tgl_proyek", $('#tgl_proyek').val())
					form.append("tgl_order", $('#tgl_order').val())
					form.append("lokasi_proyek", $('#lokasi_proyek').val())
					form.append("lokasi_file", $('#lokasi_file').val())

					save(form, base_url('proyek/save'))
						.then(function (response) {
							if (response.success) {
								Swal.fire({
									type: 'success',
									title: 'Sukses',
									html: response.message,
									showConfirmButton: false,
									timer: 2000
								});
								$('#mdl-form').modal('hide');
								table.ajax.reload()
							} else {
								Swal.fire({
									title: 'Gagal',
									type: 'error',
									html: response.message,
									showCloseButton: true,
									// showConfirmButton: false,
								});
							}
							console.log(response.console_message)
						})
						.catch(function (err) {
							console.log(err)
						})
				}
			})
		}
	});
	$('select').select2({}).on("change", function (e) {
		$(this).valid()
	});

	$('#imageContainer')
		.delegate('#btn-img', 'click', function (e) {
			e.preventDefault()
			let that = $(this)
			Swal.fire({
				type: 'info',
				// title: 'Hapus / Lihat Gambar',			
				showCancelButton: true,
				showCloseButton: true,
				cancelButtonColor: '#ff0000',
				cancelButtonText: '<i class="icon-trash"></i> Hapus',
				confirmButtonText: '<i class="ti-eye"></i> Lihat',
			}).then((result) => {
				if (result.value) {
					window.open(that.data('link'), "_blank");
				} else if (result.dismiss === Swal.DismissReason.cancel) {
					Swal.fire({
						type: 'question',
						title: 'Hapus Data',
						text: "Apakah anda yakin akan menghapusnya?",
						showCloseButton: true,
						showCancelButton: true
					}).then((result) => {
						if (result.value) {
							destroy(that.data('id'), base_url('proyek/destroy_image'))
								.then(function (res) {
									if (res.success) {
										Swal.fire({
											type: 'success',
											title: 'Sukses',
											html: res.message,
											showConfirmButton: false,
											timer: 2000
										}).then(function () {
											$('#mdl-form').modal('hide');
										})
									} else {
										Swal.fire({
											title: 'Gagal',
											type: 'error',
											html: res.message
										});
									}
									console.log(res.console_message)
								})
								.catch(function (err) {
									console.log(err)
								})
						}
					})
				}
			})
		})

	$('#tbl-list')
		.delegate('button.btn-show', 'click', function (e) {
			e.preventDefault()
			let that = $(this)

			getDetail(that.data('id'), base_url('proyek/get_gambar'))
				.then(function (res) {
					$.each(res.data, function (index, value) {
						// alert( index + ": " + value.path_gambar );
						console.log(index + ": " + value.detail_gambar);
						// container.appendChild(createImageNode(base_url(value.path_gambar)));
						$("#imageContainerShow").append('<a href="' + base_url(value.path_gambar) + '" target="_blank"><img style="margin:5px" height="100" width="100" src="' + base_url(value.path_gambar) + ' " alt="' + value.detail_gambar + '"></a>')
					});
				}).catch(function (err) {
					console.log(err)
				})

			getDetail(that.data('id'), base_url('proyek/get_show'))
				.then(function (res) {
					if (res.success) {
						$("#mdl-show").modal('show')
						parseDetailShow(res.data, res.id)
					} else {
						Swal.fire({
							title: 'Terjadi Kesalahan',
							type: 'error',
							html: res.message
						});
					}
				})
				.catch(function (err) {
					console.log(err)
				})
		})
		.delegate('button.btn-edit', 'click', function (e) {
			e.preventDefault()
			let that = $(this)

			getDetail(that.data('id'), base_url('proyek/get_gambar'))
				.then(function (res) {
					var container = document.getElementById('imageContainer');
					$.each(res.data, function (index, value) {
						// alert( index + ": " + value.path_gambar );
						console.log(index + ": " + value.detail_gambar);
						// container.appendChild(createImageNode(base_url(value.path_gambar)));
						$("#imageContainer").append('<a id="btn-img" data-link="' + base_url(value.path_gambar) + '" data-id="' + value.id + '" href="javascript:void(0)"><img style="margin:5px" height="100" width="100" src="' + base_url(value.path_gambar) + ' " alt="' + value.detail_gambar + '"></a>')
					});
				}).catch(function (err) {
					console.log(err)
				})

			getDetail(that.data('id'), base_url('proyek/get'))
				.then(function (res) {
					if (res.success) {
						$("#mdl-form").modal('show')
						$("#mdl-form .modal-title").html('Edit Data Proyek')
						parseDetail(res.data, res.id)
					} else {
						Swal.fire({
							title: 'Terjadi Kesalahan',
							type: 'error',
							html: res.message
						});
					}
				}).catch(function (err) {
					console.log(err)
				})
		})
		.delegate('button.btn-destroy', 'click', function (e) {
			e.preventDefault()
			let that = $(this)
			Swal.fire({
				type: 'question',
				title: 'Hapus Data',
				text: "Apakah anda yakin akan menghapusnya?",
				showCloseButton: true,
				showCancelButton: true
			}).then((result) => {
				if (result.value) {
					destroy(that.data('id'), base_url('proyek/destroy'))
						.then(function (res) {
							if (res.success) {
								Swal.fire({
									type: 'success',
									title: 'Sukses',
									html: res.message,
									showConfirmButton: false,
									timer: 2000
								}).then(function() {
									$('#mdl-form').modal('hide');
									table.ajax.reload()
								})
							} else {
								Swal.fire({
									title: 'Gagal',
									type: 'error',
									html: res.message
								});
							}
							console.log(res.console_message)
						})
						.catch(function (err) {
							console.log(err)
						})
				}
			})
		})

	function createImageNode(arrImg) {
		var img = document.createElement('img');
		img.src = arrImg;
		img.width = "100";
		img.height = "100";
		img.style.margin = "5px";
		img.className = "btn-img";
		return img;
	}

	function parseDetail(r, id) {
		$('#id').val(id)
		$('#nama_proyek').val(r.nama_proyek)
		$('#jml_foto').val(r.jml_foto)
		$('#nama_pic').val(r.nama_pic)
		$('#kontak_pic').val(r.no_telp_pic)
		$('#tgl_order').val(moment(r.tgl_order).format('DD/MM/YYYY'))
		$('#tgl_proyek').val(moment(r.tgl_proyek).format('DD/MM/YYYY'))
		$('#lokasi_proyek').val(r.lokasi_proyek)
		$('#lokasi_file').val(r.lokasi_file)
		$('#id_client').select2('val', r.id_client)
	}

	function parseDetailShow(r, id) {
		$('#btn-pdf').attr('data-id', id)
		$('#btn-excel').attr('data-id', id)
		$('#btn-cetak').attr('data-id', id)
		$('#nama_proyek_show').html(r.nama_proyek)
		$('#jml_foto_show').html(r.jml_foto)
		$('#nama_pic_show').html((r.nama_pic != '') ? r.nama_pic : '-')
		$('#kontak_pic_show').html((r.no_telp_pic != '') ? r.no_telp_pic : '-')
		$('#tgl_order_show').html(moment(r.tgl_order).format('DD/MM/YYYY'))
		$('#tgl_proyek_show').html(moment(r.tgl_proyek).format('DD/MM/YYYY'))
		$('#lokasi_proyek_show').html((r.lokasi_proyek != '') ? r.lokasi_proyek : '-')
		$('#lokasi_file_show').html(r.lokasi_file)
		$('#nama_client_show').html(r.nama_client)
		$('#gambar_show').html((r.gambar !== null) ? '<img src="' + base_url(r.gambar) + '"></img>' : '-')
	}

	$('#btn-add').click(function (e) {
		e.preventDefault()
		$("#mdl-form").modal()
		if ($("#password")) {
			$(".password-span").html('*')
			$("#password").attr("required", true);
		}
	})

	$('#btn-cetak').click(function (e) {
		e.preventDefault()
		var printContents = document.getElementById('rincian').innerHTML;
		var originalContents = document.body.innerHTML;
		// document.body.innerHTML = printContents;
		
		var winPrint = window.open('', '', 'left=0,top=0,width=800,height=600,toolbar=0,scrollbars=0,status=0');
		winPrint.document.write(printContents);

		winPrint.document.close();
		winPrint.focus();
		winPrint.print();
		winPrint.close(); 
	})

	$('#btn-pdf').click(function (e) {
		e.preventDefault()
		var that = $(this)
		window.open(base_url('generate/pdf?id=' + that.data('id')), "_blank");
	})

	$('#btn-excel').click(function (e) {
		e.preventDefault()
		var that = $(this)
		window.open(base_url('generate/excel?id=' + that.data('id')), "_self");
	})

})

// $(document).ready(function () {
// 	'use strict'
// 	$('form#wrapped').validate({
// 		errorPlacement: function (error, element) {
// 			if (element.is(':radio') || element.is(':checkbox')) {
// 				error.insertBefore(element.next())
// 			} else {
// 				error.insertAfter(element)
// 			}
// 		},
// 		submitHandler: function (form) {
// 			Swal.fire({
// 				icon: 'question',
// 				title: 'Apakah Permasalahan Teratasi ?',
// 				html: 'Apabila permasalahan anda belum teratasi silahkan melakukan <b>Buka Tiket</b>',
// 				cancelButtonText: 'Tutup',
// 				confirmButtonText: '<i class="fa fa-ticket-alt"></i> Buka Tiket',
// 				denyButtonText: '<i class="fa fa-smile-wink"></i> Selesai',
// 				showCloseButton: true,
// 				showDenyButton: true,
// 				showCancelButton: true,
// 				denyButtonColor: '#28a745'
// 			}).then((result) => {
// 				if (result.isConfirmed) {
// 					Swal.fire('Saved!', '', 'success')
// 				} else if (result.isDenied) {
// 					save(new FormData(form), form.action)
// 						.then(function (response) {
// 							if (response.success) {
// 								Swal.fire({
// 									type: 'success',
// 									title: 'Sukses',
// 									html: response.message,
// 									showConfirmButton: false,
// 									timer: 2000
// 								});
// 								$('#mdl-form').modal('hide');
// 								table.ajax.reload()
// 							} else {
// 								Swal.fire({
// 									title: 'Gagal',
// 									type: 'error',
// 									html: response.message,
// 									showCloseButton: true,
// 									// showConfirmButton: false,
// 								});
// 							}
// 							console.log(response.console_message)
// 						})
// 						.catch(function (err) {
// 							console.log(err)
// 						})
// 				}
// 			})
// 		}
// 	})
// })
