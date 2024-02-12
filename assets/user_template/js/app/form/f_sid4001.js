/*
	Author 		: Ilham Muhammad
	Email		: ilhamhmmd@outlook.com
	Description	: Form JS
*/

$(document).ready(function () {
	'use strict'

	$('.select2').select2({
		width: '100%'
	}).on("change", function (e) {
		$(this).valid()
	});

	// validate and submit form
	$('#frm-submit-fsid4001').validate({
		rules: {
			nama_lengkap: {
				required: true,
				normalizer: function (val) {
					return $.trim(val)
				}
			},
			unit_kerja: {
				required: true,
				normalizer: function (val) {
					return $.trim(val)
				}
			},
			jabatan: {
				required: true,
				normalizer: function (val) {
					return $.trim(val)
				}
			},
			nip: {
				required: true,
				number: true,
				normalizer: function (val) {
					return $.trim(val)
				}
			},
			nama_barang: {
				required: true,
				normalizer: function (val) {
					return $.trim(val)
				}
			},
			merk_produk: {
				required: true,
				normalizer: function (val) {
					return $.trim(val)
				}
			},
			nomor_seri: {
				required: true,
				normalizer: function (val) {
					return $.trim(val)
				}
			},
			keterangan: {
				required: true,
				normalizer: function (val) {
					return $.trim(val)
				}
			},
		},
		errorClass: "myErrorClass",
		// validClass: "is-valid",
		errorPlacement: errorValidate
	});

});
