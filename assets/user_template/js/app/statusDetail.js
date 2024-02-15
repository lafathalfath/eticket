/*
	Author 		: Ilham Muhammad
	Email		: ilhamhmmd@outlook.com
*/

$(document).ready(function () {
	'use strict'

	$('#btn-closed').click(function() {
		Swal.fire({
			icon: 'question',
			title: 'Close Ticket',
			text: "Apakah anda yakin akan menyelesaikan dan menutup ticket ini ?",
			showCloseButton: true,
			showCancelButton: true
		}).then((result) => {
			if (result.value) {
				var form = new FormData();
				form.append("ticketId", $(this).data('ticket'))
				save(form, base_url('pengguna/status/closed'))
					.then(function (response) {
						if (response.success) {
							Swal.fire({
								icon: 'success',
								title: 'Sukses',
								html: response.message,
								showConfirmButton: false,
								timer: 3000
							}).then(function () {
								location.reload()
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

	$('#btn-ongoing').click(function() {
		Swal.fire({
			icon: 'question',
			title: 'Jawaban Kurang Membantu',
			text: "Apakah anda yakin jawaban ini kurang membantu anda ?",
			showCloseButton: true,
			showCancelButton: true
		}).then((result) => {
			if (result.value) {
				var form = new FormData();
				form.append("ticketId", $(this).data('ticket'))
				save(form, base_url('pengguna/status/ongoing'))
					.then(function (response) {
						if (response.success) {
							Swal.fire({
								icon: 'success',
								title: 'Sukses',
								html: response.message,
								showConfirmButton: false,
								timer: 4000
							}).then(function () {
								window.location = base_url('pengguna/status')
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

	$('#chat-form').on('submit', e => {
		e.preventDefault()
		const data = {
			pesan: $('#chat-pesan').val(),
			ticket_id: $('#ticket-id').val(),
			status_ticket: $('#status-ticket').val()
		}
		$.ajax({
			type: 'POST',
			url: base_url('/pengguna/status/storeTicketChat'),
			data: data,
			success: res => {
				console.log(res)
				location.reload()
			},
			error: err => {
				console.error(err)
			}
		})
	})
	$('#chat-box').scrollTop($('#chat-box').scrollHeight)
});
