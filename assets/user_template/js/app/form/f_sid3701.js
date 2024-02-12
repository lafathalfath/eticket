/*
	Author 		: Ilham Muhammad
	Email		: ilhamhmmd@outlook.com
	Description	: Form JS
*/

$(document).ready(function () {
	'use strict'

	$('#tempat_tidak_tetap').hide()
	$('#tempat_tetap').hide()

	$('.select2').select2({
		width: '100%'
	}).on("change", function (e) {
		$(this).valid()
	});

	// validate and submit form
	$('#frm-submit-fsid3701').validate({
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
			ruang_vicon: {
				required: true,
				normalizer: function (val) {
					return $.trim(val)
				}
			},
			nama_kegiatan: {
				required: true,
				normalizer: function (val) {
					return $.trim(val)
				}
			},
			kategori_tempat: {
				required: true,
				normalizer: function (val) {
					return $.trim(val)
				}
			},
			waktu_awal: {
				required: true,
				normalizer: function (val) {
					return $.trim(val)
				}
			},
			waktu_akhir: {
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

	$('#kategori_tempat').on('change', function() {
		// alert($(this).val())
		if($(this).val() == 1) {
			$('#tempat_tetap').show()
			$('#tempat_tidak_tetap').hide()
			$("#ruang_rapat").prop('required',true)
			$("#tidak_tetap").prop('required',false)
		} else if($(this).val() == 2) {
			$('#tempat_tidak_tetap').show()
			$('#tempat_tetap').hide()
			$("#tidak_tetap").prop('required',true)
			$("#ruang_rapat").prop('required',false)
		} else {
			$('#tempat_tidak_tetap').hide()
			$('#tempat_tetap').hide()
			$("#ruang_rapat").prop('required',false)
			$("#tidak_tetap").prop('required',false)
		}
	})

	// init daterangepicker
	$('.datepick').daterangepicker({
		singleDatePicker: true,
		showDropdowns: true,
		minDate: '2019-01-01',
		maxDate: '2030-01-01',
		// maxYear: parseInt(moment().format('YYYY'), 10),
		autoApply: true,
		locale: {
			format: 'DD/MM/YYYY'
		}
	});

});
