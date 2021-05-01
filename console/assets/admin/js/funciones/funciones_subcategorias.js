let url = base_url+"admin/";
$(document).ready(function () {
	var id_cat = $("#id_cat").val();
	$('#editable').DataTable({
		"pageLength": 50,
		"serverSide": true,
		"order": [[0, "asc"]],
		"ajax": {
			url: url+'subcategorias/get_data/'+id_cat,
			type: 'POST',
		},
		"language": {
			"sProcessing": "Procesando...",
			"sLengthMenu": "Mostrar _MENU_ registros",
			"sZeroRecords": "No se encontraron resultados",
			"sEmptyTable": "Ningún dato disponible en esta tabla",
			"sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
			"sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
			"sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
			"sInfoPostFix": "",
			"sSearch": "Buscar:",
			"sUrl": "",
			"sInfoThousands": ",",
			"sLoadingRecords": "Cargando...",
			"oPaginate": {
				"sFirst": "Primero",
				"sLast": "Último",
				"sNext": "Siguiente",
				"sPrevious": "Anterior"
			},
			"oAria": {
				"sSortAscending": ": Activar para ordenar la columna de manera ascendente",
				"sSortDescending": ": Activar para ordenar la columna de manera descendente"
			}
		}
	}); // End of DataTable

	$(".select2").select2();

	$("#form_add").on('submit', function(e){
		e.preventDefault();
		$(this).parsley().validate();
		if ($(this).parsley().isValid()){
			save_data();
		}
	});

	$("#form_edit").on('submit', function(e){
		e.preventDefault();
		$(this).parsley().validate();
		if ($(this).parsley().isValid()){
			edit_data();
		}
	});

	$(".dropify").dropify({
		messages: {
			default: "Arrastra una imagen o click aqui",
			replace: "Arrastra y suelta, o click para reemplazar",
			remove: "Remover",
			error: "Ooops, algo salio mal."
		},
		error: {
			fileSize: "El archivo es muy grande(1M max)."
		}
	});

});

$(document).on("click",".delete_row", function(event)
{
	var cat = $("#cat").val();
	event.preventDefault()
	let id_row = $(this).attr("id");
	let dataString = "id=" + id_row;
	Swal.fire({
		title: 'Alerta!!',
		text: "Estas seguro de eliminar este regitro?!",
		type: 'error',
		target:'#page-top',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Aceptar',
		cancelButtonText: 'Cancelar',
	}).then((result) => {
		if (result.value) {
			$.ajax({
				type: "POST",
				url: url+"subcategorias/delete/1",
				data: dataString,
				dataType: 'json',
				success: function (data) {
					notification(data.type,data.title,data.msg);
					if (data.type == "success") {
						setTimeout("reload('"+cat+"');", 1500);
					}
				}
			});
		}
	});
});


function save_data(){
	var cat = $("#cat").val();
	$("#divh").show();
	$("#main_view").hide();
	let form = $("#form_add");
	let formdata = false;
	if (window.FormData) {
		formdata = new FormData(form[0]);
	}
	$.ajax({
		type: 'POST',
		url: url+'subcategorias/agregar/1',
		cache: false,
		data: formdata ? formdata : form.serialize(),
		contentType: false,
		processData: false,
		dataType: 'json',
		success: function (data) {
			$("#divh").hide();
			$("#main_view").show();
			notification(data.type,data.title,data.msg);
			if (data.type == "success") {
				setTimeout("reload('"+cat+"');", 1500);
			}
		}
	});
}

function edit_data(){
	var cat = $("#cat").val();
	$("#divh").show();
	$("#main_view").hide();
	let form = $("#form_edit");
	let formdata = false;
	if (window.FormData) {
		formdata = new FormData(form[0]);
	}
	$.ajax({
		type: 'POST',
		url: url+'subcategorias/editar/1',
		cache: false,
		data: formdata ? formdata : form.serialize(),
		contentType: false,
		processData: false,
		dataType: 'json',
		success: function (data) {
			$("#divh").hide();
			$("#main_view").show();
			notification(data.type,data.title,data.msg);
			if (data.type == "success") {
				setTimeout("reload('"+cat+"');", 1500);
			}
		}
	});
}

function reload(cat) {
	location.href = url+"subcategorias/"+cat;
}
