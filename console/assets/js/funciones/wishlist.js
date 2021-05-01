let url = base_url+"lista_deseos";
let token =   $("#get_csrf_hash").val();

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

$(document).on("click",".delete_row", function(event)
{
	event.preventDefault()
	let id_row = $(this).attr("id");
	let dataString = "id=" + id_row;
	swal({
			title: "Aviso",
			text: "Estas seguro de eliminar este producto?!",
			type: "error",
			showCancelButton: true,
			confirmButtonClass: "btn-danger",
			confirmButtonText: "Aceptar",
			cancelButtonText: "Cancelar",
			closeOnConfirm: false,
			closeOnCancel: true
		},
		function (isConfirm) {
			if (isConfirm) {
				$.ajax({
					type: "POST",
					url: url+"/delete",
					data: dataString,
					dataType: 'json',
					success: function (data) {
						notification(data.type,data.title,data.msg);
						if (data.type == "success") {
							setTimeout("reload();", 1500);
						}
					}
				});
			}
		});

});

$(document).on("click",".add_cart", function(event)
{
	event.preventDefault()
	let id_row = $(this).attr("id");
	let nombre = $(this).data("nombre");
	let imagen = $(this).data("imagen");
	let precio = $(this).data("precio");
	swal({
			title: "Aviso",
			text: "Ingresa la cantidad?!",
			type: "input",
			showCancelButton: true,
			closeOnConfirm: false,
			inputPlaceholder: "Ingresa la cantidad",
			closeOnCancel: true
		},
		 function (inputValue) {
			if (inputValue === false) return false;
			if (inputValue === "") {
				swal.showInputError("Ingresa una cantidad");
				return false
			}
			if(inputValue < 1) {
				swal.showInputError("El valor debe ser mayor a 1");
				return false
			}
			 let dataString = "product_id=" + id_row+"&quantity="+inputValue+"&image="+imagen+"&product_price="+precio+"&product_name="+nombre;
			 $.ajax({
				 method: "POST",
				 url: base_url+"catalogo/add_to_cart",
				 data: dataString,
				 success: function (data) {
					 $('#detail_cart').html(data);
					 var aviso = "El producto:" + nombre + "\n ha sido agregado:" + inputValue + " unidad(es)\n";
					 swal({
							 title: "Aviso",
							 text: aviso,
							 type: "warning",
							 showCancelButton: true,
							 confirmButtonClass: "btn-danger",
							 confirmButtonText: "Ver Carrito",
							 cancelButtonText: "Continuar",
							 closeOnConfirm: false,
							 closeOnCancel: true
						 },
						 function (isConfirm) {
							 if (isConfirm) {
								 window.location = base_url + 'catalogo/cart';
							 }
							 else {
								 setTimeout("reload();", 1000);
							 }
						 });
				 }
			 });
		});
});

function reload() {
	location.href=url;
}
