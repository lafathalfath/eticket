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
	$('#frm-submit-fsid2901').validate({
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
			identitas_perangkat: {
				required: true,
				normalizer: function (val) {
					return $.trim(val)
				}
			},
			merk_perangkat: {
				required: true,
				normalizer: function (val) {
					return $.trim(val)
				}
			},
			mac_address: {
				required: true,
				normalizer: function (val) {
					return $.trim(val)
				}
			},
			lokasi_kerja: {
				required: true,
				normalizer: function (val) {
					return $.trim(val)
				}
			},
			jenis_kegiatan: {
				required: true,
				normalizer: function (val) {
					return $.trim(val)
				}
			},
			service_id: {
				required: true,
				normalizer: function (val) {
					return $.trim(val)
				}
			},
			subservice_id: {
				//required: true,
				normalizer: function (val) {
					return $.trim(val)
				}
			},
			ip_address: {
				//required: true,
				normalizer: function (val) {
					return $.trim(val)
				}
			},
			aplikasi_id: {
				//required: true,
				normalizer: function (val) {
					return $.trim(val)
				}
			},
			tgl_awal: {
				required: true,
				normalizer: function (val) {
					return $.trim(val)
				}
			},
			tgl_akhir: {
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
