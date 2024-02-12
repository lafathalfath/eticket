$('#backHistory').on('click', function () {
	window.history.back();
})

// Initialize SweetAlert
const swalInit = swal.mixin({
	buttonsStyling: false,
	confirmButtonClass: 'btn btn-primary',
	cancelButtonClass: 'btn btn-light'
})

// error validate init
var errorValidate = function (error, element) {
	var elem = $(element);
	if (elem.hasClass("select2-hidden-accessible")) {
		element = $("#select2-" + elem.attr("id") + "-container").parent();
		error.insertAfter(element);
	} else {
		error.insertAfter(element);
	}
}

var highlight = function (element, errorClass, validClass) {
	var elem = $(element);
	if (elem.hasClass("select2-offscreen")) {
		$("#s2id_" + elem.attr("id") + " ul").addClass(errorClass);
	} else {
		elem.addClass(errorClass);
	}
}

//When removing make the same adjustments as when adding
var unhighlight = function (element, errorClass, validClass) {
	var elem = $(element);
	if (elem.hasClass("select2-offscreen")) {
		$("#s2id_" + elem.attr("id") + " ul").removeClass(errorClass);
	} else {
		elem.removeClass(errorClass);
	}
}

// Modal state on hidden
$('.modal').on('hidden.bs.modal', function () {
	$(this).find('form').trigger('reset')
	$(this).find('.form-control').removeClass('is-valid')
	$(this).find('.form-control').removeClass('myErrorClass')
	$(this).find('.form-control').removeClass('is-invalid')
	$(this).find('label.is-invalid').remove()
	$(this).find('label.myErrorClass').remove()
	$('#id_jenis_layanan').val('')
	$('#id_kategori_layanan').val('')
	$('#masalah').summernote('code', '');
})

// get Detail
function getDetail(val, action) {
	return new Promise(function (resolve, reject) {
		$.ajax({
			url: action,
			method: 'POST',
			dataType: 'json',
			data: {
				id: val
			}
		}).done(function (res) {
			resolve(res)
		}).fail(function () {
			reject('Gagal memuat data!')
		})
	})
}

// destroy function
function destroy(id, action) {
	return new Promise(function (resolve, reject) {
		$.ajax({
			url: action,
			method: 'POST',
			dataType: 'json',
			data: {
				id: id
			}
		}).done(function (res) {
			resolve(res)
		}).fail(function () {
			reject('Gagal hapus data!')
		})
	})
}

//Save Serialize FUnction
function saveSerialize(string, url) {
	return new Promise(function (resolve, reject) {
		$.ajax({
			url: url,
			method: 'POST',
			dataType: 'json',
			data: string
		}).done(function (hasil) {
			resolve(hasil)
		}).fail(function () {
			reject('Gagal simpan data!')
		})
	})
}

// save function
function save(string, action) {
	return new Promise(function (resolve, reject) {
		$.ajax({
			url: action,
			type: 'POST',
			data: string,
			dataType: 'JSON',
			processData: false,
			contentType: false,
			cache: false,
			async: false,
			// beforeSend: function(){
			// 	$("body").addClass("loading-bsn")
			// },
			// complete: function(){
			// 	$("body").removeClass("loading-bsn")
			// }
		}).done(function (res) {
			resolve(res)
		}).fail(function () {
			reject('Gagal Simpan!')
		})
	})
}

// init base_url
function base_url(param) {
	var pathparts = location.pathname.split('/');
	if (location.host == 'localhost' || location.host == '127.0.0.1') {
		var url = location.origin + '/' + pathparts[1].trim('/') + '/';
	} else {
		var url = location.origin + '/';
	}
	return url + param;
}

$(document).ready(function () {
	'use strict'


	if (!$().DataTable) {
		console.warn('Warning - datatables.min.js is not loaded.');
		return;
	}

	$.extend($.fn.dataTable.defaults, {
		autoWidth: false,
		// dom: '<"datatable-header"fl><"datatable-scroll"t><"datatable-footer"ip>',
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

	// init ajax loading
	$(document).on({
		ajaxStart: function () {
			$("body").addClass("loading-bsn");
		},
		ajaxStop: function () {
			$("body").removeClass("loading-bsn");
		},
		ajaxError: function (event, xhr, settings, thrownError) {
			Swal.fire({
				title: '<strong>Terdapat Kesalahan</strong>',
				icon: 'error',
				html: '<p><strong>Location : </strong>' + settings.url + '</p><p><strong>Status Code : </strong>' + xhr.status + '</p><p><strong>Reason : </strong>' + thrownError + '</p><p><strong>silahkan refresh halaman ini</strong></p></div>'
			})
		}
	});

	$('.datepick').daterangepicker({
		singleDatePicker: true,
		showDropdowns: true,
		minDate: moment('2019-01-01'),
		maxDate: moment('2030-01-01'),
		// maxYear: parseInt(moment().format('YYYY'), 10),
		autoApply: true,
		locale: {
			format: 'DD/MM/YYYY'
		}
	});

	$('#btn-add').click(function (e) {
		e.preventDefault()
		$("#mdl-form").modal()
		if ($("#password")) {
			$(".password-span").html('*')
			$("#password").attr("required", true);
		}
	})
})
