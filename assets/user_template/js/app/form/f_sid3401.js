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
	$('#frm-submit-fsid3401').validate({
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
			nip: {
				// required: true,
				number: true,
				normalizer: function (val) {
					return $.trim(val)
				}
			},
			jabatan: {
				// required: true,
				normalizer: function (val) {
					return $.trim(val)
				}
			},
			jenis_permohonan_id: {
				required: true,
				normalizer: function (val) {
					return $.trim(val)
				}
			},
			nama_aplikasi: {
				required: true,
				normalizer: function (val) {
					return $.trim(val)
				}
			},			
			penggunaan_id: {
				required: true,
				normalizer: function (val) {
					return $.trim(val)
				}
			},
			perusahaan_pengembang: {
				required: true,
				normalizer: function (val) {
					return $.trim(val)
				}
			},			
			deskripsi_aplikasi: {
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
