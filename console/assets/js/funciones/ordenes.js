let token =   $("#get_csrf_hash").val();
let url = base_url+"ordenes";
$(document).ready(function () {

	Filltable();

	$('#fecha_filtro').change(function(){
		$('#editable').DataTable().destroy();
		Filltable($('#fecha_filtro').val());
	});

});

function Filltable(fecha_filtro=''){
	$('#editable').DataTable({
		pageLength: 10,
		/*		"searching": false,
				"lengthChange": false,*/
		serverSide: true,
		order: [[0, "asc"]],
		ajax: {
			url: url+'/get_data',
			type: 'POST',
			data: {
				csrf_token_name: token,
				fecha_filtro: fecha_filtro
			},
		},
		language: {
			sProcessing: "Procesando...",
			sLengthMenu: "Mostrar _MENU_ registros",
			sZeroRecords: "No se encontraron resultados",
			sEmptyTable: "Ningún dato disponible en esta tabla",
			sInfo: "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
			sInfoEmpty: "Mostrando registros del 0 al 0 de un total de 0 registros",
			sInfoFiltered: "(filtrado de un total de _MAX_ registros)",
			sInfoPostFix: "",
			sSearch: "Buscar:",
			sUrl: "",
			sInfoThousands: ",",
			sLoadingRecords: "Cargando...",
			oPaginate: {
				sFirst: "Primero",
				sLast: "Último",
				sNext: "Siguiente",
				sPrevious: "Anterior"
			},
			oAria: {
				sSortAscending: ": Activar para ordenar la columna de manera ascendente",
				sSortDescending: ": Activar para ordenar la columna de manera descendente"
			}
		}
	}); // End of DataTable
}

