/*
	Author 		: Ilham Muhammad
	Email		: ilhamhmmd@outlook.com
	Description	: Layanan JS native wizard process (Semi Single Page Application - SPA)
*/

$(document).ready(function () {
	'use strict'
	var counter = 0;
	var state = [];
	var stateTitle = [];

	// construct function
	hidingBackward();
	generateLayanan();

	$('.step').delegate('div#pil-layanan', 'click', function (e) {
		e.preventDefault()
		let that = $(this)
		increaseCounter()
		hidingBackward()
		if (counter == 0) {
			generateLayanan();
			state.push(that.data('id'))
			stateTitle.push(that.data('title'))
		} else if (counter == 1) {
			generateKategoriLayanan(that.data('id'), that.data('title'))
			state.push(that.data('id'))
			stateTitle.push(that.data('title'))
		} else if (counter == 2) {
			generateJenisLayanan(that.data('id'), that.data('klasifikasi-id'), that.data('title'));
			state.push(that.data('id'))
			stateTitle.push(that.data('title'))
			$('#backward').attr('data-klasifikasi-id', that.data('klasifikasi-id'))
		} else if (counter == 3) {
			generateMasalah(that.data('id'), that.data('title'));
			state.push(that.data('id'))
			stateTitle.push(that.data('title'))
		} else if (counter == 4) {
			generateFaq(that.data('id'), that.data('title'));
			state.push(that.data('id'))
			stateTitle.push(that.data('title'))
		}
	})

	function generateLayanan() {
		$.ajax({
			type: 'POST',
			url: base_url('pengguna/layanan/generateLayanan'),
			// // data    : string,
			cache: false,
			success: function (data) {
				$("#title").html('Layanan apa yang anda butuhkan ?');
				$("#sub_title").html('Silahkan pilih <strong>Layanan</strong> yang tersedia.');
				$("#generateView").html(data);
			}
		});
	}

	function generateKategoriLayanan(id, title) {
		$.ajax({
			type: 'POST',
			url: base_url('pengguna/layanan/generateKategoriLayanan'),
			data: {
				id: id
			},
			cache: false,
			success: function (data) {
				if (id == 1) {
					$("#title").html(title + ' apa yang anda butuhkan ?');
					$("#sub_title").html('Silahkan pilih layanan yang tersedia.');
				} else {
					$("#title").html(title + ' apa yang anda butuhkan ?');
					$("#sub_title").html('Silahkan pilih request layanan yang tersedia.');
				}

				$("#generateView").html(data);
				$('#backward').data('id', id)
			}
		});
	}

	function generateJenisLayanan(id, klasifikasiId, title) {
		let url;
		if (klasifikasiId == 1) {
			url = base_url('pengguna/layanan/generateJenisLayanan');
		} else {
			url = base_url('pengguna/layanan/generateFormRequest');
		}
		$.ajax({
			type: 'POST',
			url: url,
			data: {
				id: id,
				klasifikasi_id: klasifikasiId
			},
			cache: false,
			success: function (data) {
				if (klasifikasiId == 1) {
					$("#title").html('Jenis layanan ' + title + ' apa yang anda butuhkan ?');
					$("#sub_title").html('Silahkan pilih layanan yang tersedia.');
				} else {
					$("#title").html('Form Request ' + title);
					$("#sub_title").html('Silahkan isi form permohonan berikut.');
				}
				
				$("#generateView").html(data);			
			}
		});
	}

	function generateMasalah(id, title) {
		$.ajax({
			type: 'POST',
			url: base_url('pengguna/layanan/generateMasalah'),
			data: {
				id: id,
			},
			cache: false,
			success: function (data) {
				$("#title").html('Permasalahan ' + title + ' apa yang anda hadapi ?');
				$("#sub_title").html('Silahkan pilih permasalahan yang tersedia.');

				$("#generateView").html(data);
			}
		});
	}

	function generateFaq(id, title) {
		$.ajax({
			type: 'POST',
			url: base_url('pengguna/layanan/generateFaq'),
			data: {
				id: id,
			},
			cache: false,
			success: function (data) {
				$("#title").html('FAQ ' + title);
				$("#sub_title").html('Silahkan coba arahan berikut.');

				$("#generateView").html(data);
			}
		});
	}

	function increaseCounter() {
		let val = parseInt(document.getElementById('counter').value, 10);
		val = isNaN(val) ? 0 : val;
		val++;
		counter++;
		document.getElementById('counter').value = val;
	}

	function decreaseCounter() {
		let val = parseInt(document.getElementById('counter').value, 10);
		val = isNaN(val) ? 0 : val;
		val < 1 ? val = 1 : '';
		val--;
		counter--;
		document.getElementById('counter').value = val;
	}

	function hidingBackward() {
		document.getElementById("backward").hidden = counter <= 0;
	}

	$("#backward").on('click', function () {
		let that = $(this)
		decreaseCounter();
		hidingBackward();
		if (counter == 0) {
			generateLayanan();
		} else if (counter == 1) {
			generateKategoriLayanan(state.slice(-2).reverse().pop(), stateTitle.slice(-2).reverse().pop());
		} else if (counter == 2) {
			generateJenisLayanan(state.slice(-2).reverse().pop(), that.data('klasifikasi-id'), stateTitle.slice(-2).reverse().pop());
		} else if (counter == 3) {
			generateMasalah(state.slice(-2).reverse().pop(), stateTitle.slice(-2).reverse().pop());
		} else if (counter == 4) {
			generateFaq(state.slice(-2).reverse().pop(), stateTitle.slice(-2).reverse().pop());
		}
		state.pop()
		stateTitle.pop()
	});

	// Create Open Ticket Lapor / Komplain
	$('#generateView').on('click', '#btn-ticket', function (e) {
		e.preventDefault()
		$("#mdl-form").modal()
		$('#id_jenis_layanan').val(state[2])
		$('#id_kategori_layanan').val(state[1])
		$('#tr_masalah_id').val($('#tm_id').val())
		$('#judul').val($('#judul_masalah').val())
	})

	// Button Trigger Solved By Faq
	$('#generateView').on('click', '#btn-solvedByFaq', function (e) {
		e.preventDefault()
		Swal.fire({
			icon: 'success',
			title: 'Terimakasih',
			text: "Masalah Teratasi! Senang rasanya bisa membantu anda",
			showCloseButton: true,
			showConfirmButton: false,
			showCancelButton: false,
			timer: 3000
		}).then(function () {
			window.location = base_url('pengguna/dashboard')
		})
	})

	function sendFiles(files, editor) {
		var data = new FormData();
		data.append("file", files);
		console.log(files)
		$.ajax({
			type: "POST",
			data: data,
			url: base_url('pengguna/layanan/upload_files'),
			cache: false,
			contentType: false,
			processData: false,
			success: function (url) {
				console.log(url)
				editor.summernote("editor.insertImage", url);
			},
			error: function (data) {
				console.log(data);
			}
		});
	}

	function deleteImage(src) {
		$.ajax({
			data: {
				src: src
			},
			type: "POST",
			url: base_url('pengguna/layanan/delete_image'),
			cache: false,
			success: function (response) {
				console.log(response);
			}
		});
	}

	// validate and submit form
	var val = $('#frm-submit-ticket').validate({
		ignore: ":hidden:not(#masalah),.note-editable.panel-body",
		// ignore: ":hidden:not(#masalah),.note-editable.card-block",
		rules: {
			masalah: {
				required: true,
				normalizer: function (val) {
					return $.trim(val)
				}
			},
			judul: {
				required: true,
				normalizer: function (val) {
					return $.trim(val)
				}
			}
		},
		// errorClass: "is-invalid",
		// validClass: "is-valid",
		errorClass: "myErrorClass",
		errorPlacement: errorValidate,
		submitHandler: function (form) {
			Swal.fire({
				icon: 'question',
				title: 'Simpan Data',
				text: "Apakah semua permasalahan anda telah tersampaikan dengan benar ?",
				confirmButtonText: 'Buat Ticket',
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

					// append data val to formData
					form.append("id_jenis_layanan", $('#id_jenis_layanan').val())
					form.append("id_kategori_layanan", $('#id_kategori_layanan').val())
					form.append("masalah", $('#masalah').val())
					form.append("judul", $('#judul').val())
					form.append("tr_masalah_id", $('#tr_masalah_id').val())

					save(form, base_url('pengguna/layanan/save_ticket'))
						.then(function (response) {
							if (response.success) {
								Swal.fire({
									icon: 'success',
									title: 'Sukses',
									html: response.message,
									showConfirmButton: false,
									timer: 4000
								}).then(function () {
									window.open(base_url('pengguna/status'), '_self')
								})
							} else {
								Swal.fire({
									title: 'Gagal',
									icon: 'error',
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

	// init summernote
	$('#masalah').summernote({
		toolbar: [
			['style', ['bold', 'italic', 'clear']],
			['para', ['ul', 'ol', 'paragraph']],
			// ['insert', ['link', 'picture', 'video']]
		],
		// height: 300,
		// options:[ 'maxlength', ['10'] ],
		placeholder: 'Silahkan isi detail permasalahan anda.',
		callbacks: {
			onImageUpload: function (image, editor, welEditable) {
				console.log(image); //File content 0
				console.log(editor); //undefined
				console.log(welEditable); //undefined
				// sendFiles(files[0], $(this));
			},
			onMediaDelete: function (target) {
				deleteImage(target[0].src);
			},
			onChange: function (contents, $editable) {
				$(this).val($(this).summernote('isEmpty') ? "" : contents);
				val.element($(this));
			}
		}
	})

	// Create Open Ticket
	$('#generateView').on('submit', 'form#frm-submit-fsid2901', function (e) {
		e.preventDefault()
		var form = $('form')
		$('#id_kategori_layanan').val(state[1])
		//submit form
		Swal.fire({
			icon: 'question',
			title: 'Simpan Data',
			text: "Apakah semua data telah terisi dengan benar ?",
			showCloseButton: true,
			showCancelButton: true
		}).then((result) => {
			if (result.value) {
				save(new FormData(this), form.attr('action'))
					.then(function (response) {
						if (response.success) {
							Swal.fire({
								icon: 'success',
								title: 'Sukses',
								html: response.message,
								showConfirmButton: false,
								timer: 2000
							}).then(function () {
								window.open(base_url('pengguna/status'), '_self')
							})
						} else {
							Swal.fire({
								icon: 'error',
								title: 'Gagal',
								html: response.message,
								showCloseButton: true,
								howConfirmButton: false,
							});
						}
						console.log(response.console_message)
					})
					.catch(function (err) {
						console.log(err)
					})
			}
		})
	})

	$('#generateView').on('submit', 'form#frm-submit-fsid3001', function (e) {
		e.preventDefault()
		var form = $('form')
		$('#id_kategori_layanan').val(state[1])
		//submit form
		Swal.fire({
			icon: 'question',
			title: 'Simpan Data',
			text: "Apakah semua data telah terisi dengan benar ?",
			showCloseButton: true,
			showCancelButton: true
		}).then((result) => {
			if (result.value) {
				save(new FormData(this), form.attr('action'))
					.then(function (response) {
						if (response.success) {
							Swal.fire({
								icon: 'success',
								title: 'Sukses',
								html: response.message,
								showConfirmButton: false,
								timer: 2000
							}).then(function () {
								window.open(base_url('pengguna/status'), '_self')
							})
						} else {
							Swal.fire({
								icon: 'error',
								title: 'Gagal',
								html: response.message,
								showCloseButton: true,
								howConfirmButton: false,
							});
						}
						console.log(response.console_message)
					})
					.catch(function (err) {
						console.log(err)
					})
			}
		})
	})

	$('#generateView').on('submit', 'form#frm-submit-fsid3301', function (e) {
		e.preventDefault()
		var form = $('form')
		$('#id_kategori_layanan').val(state[1])
		//submit form
		Swal.fire({
			icon: 'question',
			title: 'Simpan Data',
			text: "Apakah semua data telah terisi dengan benar ?",
			showCloseButton: true,
			showCancelButton: true
		}).then((result) => {
			if (result.value) {
				save(new FormData(this), form.attr('action'))
					.then(function (response) {
						if (response.success) {
							Swal.fire({
								icon: 'success',
								title: 'Sukses',
								html: response.message,
								showConfirmButton: false,
								timer: 2000
							}).then(function () {
								window.open(base_url('pengguna/status'), '_self')
							})
						} else {
							Swal.fire({
								icon: 'error',
								title: 'Gagal',
								html: response.message,
								showCloseButton: true,
								howConfirmButton: false,
							});
						}
						console.log(response.console_message)
					})
					.catch(function (err) {
						console.log(err)
					})
			}
		})
	})

	$('#generateView').on('submit', 'form#frm-submit-fsid3401', function (e) {
		e.preventDefault()
		var form = $('form')
		$('#id_kategori_layanan').val(state[1])
		//submit form
		Swal.fire({
			icon: 'question',
			title: 'Simpan Data',
			text: "Apakah semua data telah terisi dengan benar ?",
			showCloseButton: true,
			showCancelButton: true
		}).then((result) => {
			if (result.value) {
				save(new FormData(this), form.attr('action'))
					.then(function (response) {
						if (response.success) {
							Swal.fire({
								icon: 'success',
								title: 'Sukses',
								html: response.message,
								showConfirmButton: false,
								timer: 2000
							}).then(function () {
								window.open(base_url('pengguna/status'), '_self')
							})
						} else {
							Swal.fire({
								icon: 'error',
								title: 'Gagal',
								html: response.message,
								showCloseButton: true,
								howConfirmButton: false,
							});
						}
						console.log(response.console_message)
					})
					.catch(function (err) {
						console.log(err)
					})
			}
		})
	})

	$('#generateView').on('submit', 'form#frm-submit-fsid3601', function (e) {
		e.preventDefault()
		var form = $('form')
		$('#id_kategori_layanan').val(state[1])
		//submit form
		Swal.fire({
			icon: 'question',
			title: 'Simpan Data',
			text: "Apakah semua data telah terisi dengan benar ?",
			showCloseButton: true,
			showCancelButton: true
		}).then((result) => {
			if (result.value) {
				save(new FormData(this), form.attr('action'))
					.then(function (response) {
						if (response.success) {
							Swal.fire({
								icon: 'success',
								title: 'Sukses',
								html: response.message,
								showConfirmButton: false,
								timer: 2000
							}).then(function () {
								window.open(base_url('pengguna/status'), '_self')
							})
						} else {
							Swal.fire({
								icon: 'error',
								title: 'Gagal',
								html: response.message,
								showCloseButton: true,
								howConfirmButton: false,
							});
						}
						console.log(response.console_message)
					})
					.catch(function (err) {
						console.log(err)
					})
			}
		})
	})

	$('#generateView').on('submit', 'form#frm-submit-fsid3701', function (e) {
		e.preventDefault()
		var form = $('form')
		$('#id_kategori_layanan').val(state[1])
		//submit form
		Swal.fire({
			icon: 'question',
			title: 'Simpan Data',
			text: "Apakah semua data telah terisi dengan benar ?",
			showCloseButton: true,
			showCancelButton: true
		}).then((result) => {
			if (result.value) {
				save(new FormData(this), form.attr('action'))
					.then(function (response) {
						if (response.success) {
							Swal.fire({
								icon: 'success',
								title: 'Sukses',
								html: response.message,
								showConfirmButton: false,
								timer: 2000
							}).then(function () {
								window.open(base_url('pengguna/status'), '_self')
							})
						} else {
							Swal.fire({
								icon: 'error',
								title: 'Gagal',
								html: response.message,
								showCloseButton: true,
								howConfirmButton: false,
							});
						}
						console.log(response.console_message)
					})
					.catch(function (err) {
						console.log(err)
					})
			}
		})
	})

	$('#generateView').on('submit', 'form#frm-submit-fsid3801', function (e) {
		e.preventDefault()
		var form = $('form')
		$('#id_kategori_layanan').val(state[1])
		//submit form
		Swal.fire({
			icon: 'question',
			title: 'Simpan Data',
			text: "Apakah semua data telah terisi dengan benar ?",
			showCloseButton: true,
			showCancelButton: true
		}).then((result) => {
			if (result.value) {
				save(new FormData(this), form.attr('action'))
					.then(function (response) {
						if (response.success) {
							Swal.fire({
								icon: 'success',
								title: 'Sukses',
								html: response.message,
								showConfirmButton: false,
								timer: 2000
							}).then(function () {
								window.open(base_url('pengguna/status'), '_self')
							})
						} else {
							Swal.fire({
								icon: 'error',
								title: 'Gagal',
								html: response.message,
								showCloseButton: true,
								howConfirmButton: false,
							});
						}
						console.log(response.console_message)
					})
					.catch(function (err) {
						console.log(err)
					})
			}
		})
	})

	$('#generateView').on('submit', 'form#frm-submit-fsid3901', function (e) {
		e.preventDefault()
		var form = $('form')
		$('#id_kategori_layanan').val(state[1])
		//submit form
		Swal.fire({
			icon: 'question',
			title: 'Simpan Data',
			text: "Apakah semua data telah terisi dengan benar ?",
			showCloseButton: true,
			showCancelButton: true
		}).then((result) => {
			if (result.value) {
				save(new FormData(this), form.attr('action'))
					.then(function (response) {
						if (response.success) {
							Swal.fire({
								icon: 'success',
								title: 'Sukses',
								html: response.message,
								showConfirmButton: false,
								timer: 2000
							}).then(function () {
								window.open(base_url('pengguna/status'), '_self')
							})
						} else {
							Swal.fire({
								icon: 'error',
								title: 'Gagal',
								html: response.message,
								showCloseButton: true,
								howConfirmButton: false,
							});
						}
						console.log(response.console_message)
					})
					.catch(function (err) {
						console.log(err)
					})
			}
		})
	})

	$('#generateView').on('submit', 'form#frm-submit-fsid4001', function (e) {
		e.preventDefault()
		var form = $('form')
		$('#id_kategori_layanan').val(state[1])
		//submit form
		Swal.fire({
			icon: 'question',
			title: 'Simpan Data',
			text: "Apakah semua data telah terisi dengan benar ?",
			showCloseButton: true,
			showCancelButton: true
		}).then((result) => {
			if (result.value) {
				save(new FormData(this), form.attr('action'))
					.then(function (response) {
						if (response.success) {
							Swal.fire({
								icon: 'success',
								title: 'Sukses',
								html: response.message,
								showConfirmButton: false,
								timer: 2000
							}).then(function () {
								window.open(base_url('pengguna/status'), '_self')
							})
						} else {
							Swal.fire({
								icon: 'error',
								title: 'Gagal',
								html: response.message,
								showCloseButton: true,
								howConfirmButton: false,
							});
						}
						console.log(response.console_message)
					})
					.catch(function (err) {
						console.log(err)
					})
			}
		})
	})

	$('#generateView').on('submit', 'form#frm-submit-fsid4101', function (e) {
		e.preventDefault()
		var form = $('form')
		$('#id_kategori_layanan').val(state[1])
		//submit form
		Swal.fire({
			icon: 'question',
			title: 'Simpan Data',
			text: "Apakah semua data telah terisi dengan benar ?",
			showCloseButton: true,
			showCancelButton: true
		}).then((result) => {
			if (result.value) {
				save(new FormData(this), form.attr('action'))
					.then(function (response) {
						if (response.success) {
							Swal.fire({
								icon: 'success',
								title: 'Sukses',
								html: response.message,
								showConfirmButton: false,
								timer: 2000
							}).then(function () {
								window.open(base_url('pengguna/status'), '_self')
							})
						} else {
							Swal.fire({
								icon: 'error',
								title: 'Gagal',
								html: response.message,
								showCloseButton: true,
								howConfirmButton: false,
							});
						}
						console.log(response.console_message)
					})
					.catch(function (err) {
						console.log(err)
					})
			}
		})
	})

});
