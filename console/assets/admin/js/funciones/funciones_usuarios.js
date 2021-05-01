let url = base_url+"admin/usuarios";
$(document).ready(function () {

	$('#editable').DataTable({
		"pageLength": 50,
		"serverSide": true,
		"order": [[0, "asc"]],
		"ajax": {
			url: url+'/get_data',
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

	$('#admin_chk').change(function () {
		$(this).is(":checked") ? $('.checkboxes').prop("checked", true) :    $('.checkboxes').prop("checked", false);
	});
});
$(document).on("click","#btn_save",function (e) {
	e.preventDefault();
	let modules = [];
	$(':checkbox:checked').each(function(i){
		modules[i] = $(this).val();
	});
	let id_usuario = $("#id_usuario").val();
	let admin_val = 0;
	$('#admin_chk').is(":checked") ? admin_val=1 : admin_val=0;
	permissions_user(modules,id_usuario,admin_val);
});

$(document).on("click",".state_change", function(event)
{
	event.preventDefault()
	let id = $(this).attr("id");
	let data = $(this).attr("data-state");
	let dataString = "id=" + id;
	Swal.fire({
		title: 'Alerta!!',
		text: "Estas seguro de "+ data+" este registro?!",
		type: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Si,'+data,
		cancelButtonText: 'Cancelar',
	}).then((result) => {
		if (result.value) {
			$.ajax({
				type: "POST",
				url: url+"/state_change",
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

$(document).on("click",".delete_row", function(event)
{
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

function permissions_user(modules, id_usuario, admin){
	for (let i=0; i<modules.length; i++){
		if(modules[i] == 0 || modules[i] == "" ){
			modules.splice(i,1);
		}
	}
	let dataString = "modules="+modules+"&admin="+admin+"&id_usuario="+id_usuario;
	Swal.fire({
		title: 'Alerta!',
		text: "¿Seguro de asignar estos permisos?",
		type: 'info',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Aceptar',
		cancelButtonText: 'Cancelar',
	}).then((result) => {
		if (result.value) {
			$.ajax({
				type: "POST",
				url: url + "/permisos",
				data: dataString,
				dataType: 'json',
				success: function (data) {
					notification(data.type, data.title, data.msg);
					if (data.type == "success") {
						setTimeout("reload();", 1500);
					}
				}
			});
		}
	});
}

function save_data(){
	$("#divh").show();
	$("#main_view").hide();
	let form = $("#form_add");
	let formdata = false;
	if (window.FormData) {
		formdata = new FormData(form[0]);
	}
	$.ajax({
		type: 'POST',
		url: url+'/agregar',
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
				setTimeout("reload();", 1500);
			}
		}
	});
}

function edit_data(){
	$("#divh").show();
	$("#main_view").hide();
	let form = $("#form_edit");
	let formdata = false;
	if (window.FormData) {
		formdata = new FormData(form[0]);
	}
	$.ajax({
		type: 'POST',
		url: url+'/editar',
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
				setTimeout("reload();", 1500);
			}
		}
	});
}

function reload() {
	location.href = url;
}
