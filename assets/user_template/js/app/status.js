/*
	Author 		: Ilham Muhammad
	Email		: ilhamhmmd@outlook.com
*/

$(document).ready(function () {
	"use strict";
	var table;

	// Setting datatable defaults
	$.extend($.fn.dataTable.defaults, {
		autoWidth: false,
		// dom: "<'row datatable-header'<'col-12 length-left'l><'col-4'><'col-4'><'col-4 dt_select'>><'datatable-scroll'tr><'datatable-footer'fip>",
		dom:
			"<'row'<'col-sm-12 col-md-4'l><'col-sm-12 col-md-4 dt_select'><'col-sm-12 col-md-4'f>>" +
			"<'row'<'col-sm-12'tr>>" +
			"<'row'<'col-sm-12 col-md-7'i><'col-sm-12 col-md-7'p>>",
		language: {
			search: "<span>Pencarian:</span> _INPUT_",
			searchPlaceholder: "Kata kunci...",
			lengthMenu: "<span>Tampil:</span> _MENU_",
			paginate: {
				first: "Pertama",
				last: "Terakhir",
				next: $("html").attr("dir") == "rtl" ? "&larr;" : "&rarr;",
				previous: $("html").attr("dir") == "rtl" ? "&rarr;" : "&larr;",
			},
		},
	});

	table = $("#tbl-list").DataTable({
		processing: true,
		serverSide: true,
		deferRendepr: true,
		responsive: true,
		pageLength: 10,
		paging: true,
		searching: true,
		ordering: true,
		info: true,
		autoWidth: false,
		ajax: {
			url: base_url("pengguna/status/dt_statusTicket"),
			type: "POST",
			data: function (d) {
				d.detail_priv = 1;
				d.statusId = $("#filterStatus").val();
			},
		},
		columns: [
			{
				data: "no",
				name: "no",
				class: "text-center",
			},
			{
				data: "kodeTicket",
				name: "kodeTicket",
				class: "text-center font-weight-bold",
			},
			{
				data: "jenisTicket",
				name: "jenisTicket",
				class: "text-center",
			},
			{
				data: "judul",
				name: "judul",
				class: "text-center",
			},
			{
				data: "status",
				name: "status",
				class: "text-center font-weight-bold",
				//  render: function(data, type, row, meta) {
				//     return '<span class="badge badge-warning">' + data + '</span>';
				// }
			},
			{
				data: "tgl",
				name: "tgl",
				class: "text-center",
				render: function (data, type, row, meta) {
					return moment(data).format("DD/MM/YYYY HH:mm:ss");
				},
			},
			{
				data: "lama_pengerjaan",
				name: "lama_pengerjaan",
				class: "text-center",
			},
			{
				data: "aksi",
				name: "aksi",
				class: "text-center",
			},
		],
		columnDefs: [
			{
				sortable: false,
				searchable: false,
				targets: [0, -1],
			},
		],
		order: [[1, "asc"]],
	});

	table.on("draw.dt", function () {
		var info = table.page.info();
		table
			.column(0, {
				search: "applied",
				order: "applied",
				page: "applied",
			})
			.nodes()
			.each(function (cell, i) {
				cell.innerHTML = i + 1 + info.start;
			});
	});

	$("div.dt_select").html(
		'<div class="dataTables_select"><label><span>Status:&nbsp;</span><select name="filterStatus" id="filterStatus" class="custom-select custom-select-sm form-control form-control-sm"></select></label></div>'
	);

	$("#filterStatus").change(function (e) {
		e.preventDefault();
		table.ajax.reload();
	});

	$.getJSON(base_url("pengguna/dashboard/getStatusList"), function (data) {
		$("#filterStatus").append('<option value="0">All</option>');
		$.each(data, function (key, value) {
			$("#filterStatus").append(
				'<option value="' + this.id + '">' + this.status + "</option>"
			);
		});
		table.ajax.reload();
	});

	$("#tbl-list").delegate("a.detail", "click", function (e) {
		e.preventDefault();

		let that = $(this);

		window.open(
			base_url("pengguna/status/detail?ticketId=" + that.data("id")),
			"_self"
		);
	});
});
