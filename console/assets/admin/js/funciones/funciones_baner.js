let url = base_url+"admin/";
$(document).ready(function () {

	$('#editable').DataTable({
		"pageLength": 50,
		"serverSide": true,
		"order": [[0, "asc"]],
		"ajax": {
			url: url+'baner/get_data',
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
	$(".decimal").numeric();

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

  /*$("#custom").spectrum({
    showPalette: true,
    palette: [
        ['black', 'white', 'blanchedalmond'],
        ['rgb(255, 128, 0);', 'hsv 100 70 50', 'lightyellow']
    ]
  });
	*/
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

$(document).on('hidden.bs.modal', function(e) {
  var target = $(e.target);
  target.removeData('bs.modal').find(".modal-content").html('');
});

$(document).on("click",".state_change", function(event)
{
	event.preventDefault()
	let id = $(this).attr("id");
	let data = $(this).attr("data-state");
	//let token =   $("#get_csrf_hash").val();
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
				url: url+"productos/state_change",
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

$(document).on("change", "#custom", function()
{
  var log = $(this).val();
  var color = $(this).parent("div").find(".sp-preview-inner").attr("style");
  var color = color.replace("background-", "");
  console.log(color);
  $("#color").val(color);
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
				url: url+"baner/delete",
				data: dataString,
				dataType: 'json',
				success: function (data) {
					notification(data.type,data.title,data.msg);
					if (data.type == "success") {
						setTimeout("reload();", 1500);
					}
          else if(data.type == "Num_null")
          {
            Swal.fire({
          		title: 'Alerta!!',
          		text: data.msg,
          		type: 'error',
          		target:'#page-top',
          		// showCancelButton: true,
          		confirmButtonColor: '#3085d6',
          		// cancelButtonColor: '#d33',
          		confirmButtonText: 'Aceptar',
          		// cancelButtonText: 'Cancelar',
          	}).then((result) => {
          		if (result.value) {

          		}
          	});
          }
				}
			});
		}
	});
});


function save_data(){
  var baner = $("#baner").val();
  if(baner != "")
  {
  	$("#divh").show();
  	$("#main_view").hide();
  	let form = $("#form_add");
  	let formdata = false;
  	if (window.FormData) {
  		formdata = new FormData(form[0]);
  	}
  	$.ajax({
  		type: 'POST',
  		url: url+'baner/agregar',
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
  else
  {
    notification("error","!Importante","Seleccione una imagen");
  }
}

function edit_data()
{
    $("#divh").show();
  	$("#main_view").hide();
  	let form = $("#form_edit");
  	let formdata = false;
  	if (window.FormData) {
  		formdata = new FormData(form[0]);
  	}
  	$.ajax({
  		type: 'POST',
  		url: url+'baner/baner_editar',
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

$(document).on("click", "#btnStock", function()
{
	var cantidad = $("#cantidad").val();
	if(cantidad != 0)
	{
		if(cantidad != "")
		{
			cargar_stock();
		}
		else
		{
			notification("Error","Alerta!","Ingrese una canntidad");
		}
	}
	else
	{
		notification("Error","Alerta!","Ingrese una canntidad");
	}
})
$(document).on("click", "#btnAjuste", function()
{
	var cantidad = $("#cantidad").val();
	if(cantidad != "")
	{
		ajustar_stock();
	}
	else
	{
		notification("Error","Alerta!","Ingrese una canntidad");
	}
})

function cargar_stock()
{
	var i = 0;
  var subtotal = 0;

  var StringDatos = "";
  var fecha_movimiento = $("#fecha").val();
  var array_json = new Array();

	var id_producto = $("#id").val();
	var precio = $("#precio").val();
	var cantidad = $("#cantidad").val();

	var total_compras = precio * cantidad;

	var obj = new Object();
	obj.id_producto = id_producto;
	obj.precio_compra = precio;
	obj.cantidad = cantidad;
	//convert object to json string
	text = JSON.stringify(obj);
	array_json.push(text);

  var json_arr = '[' + array_json + ']';
  // console.log('jsons:' + json_arr);


  var dataString = 'process=insert' + '&cuantos=1&json_arr=' + json_arr;
  dataString += '&fecha_movimiento=' + fecha_movimiento ;
  dataString += '&total_compras=' + total_compras;

  $.ajax({
    type: 'POST',
    url: url+'inventario/ingreso',
    data: dataString,
    dataType: 'json',
    success: function(data) {
      notification(data.type,data.title,data.msg);
      if(data.type == "success")
      {
        $("#inventable").html("");
        $("#submit1").attr("disabled", true);
        setInterval("reload();", 1500);
      }
    }
  });
}

function ajustar_stock()
{
	var i = 0;
  var subtotal = 0;

  var StringDatos = "";
  var fecha_movimiento = $("#fecha").val();
  var array_json = new Array();

	var id_producto = $("#id").val();
	var precio = $("#precio").val();
	var cantidad = $("#cantidad").val();

	var total_compras = precio * cantidad;

	var obj = new Object();
	obj.id_producto = id_producto;
	obj.precio_compra = precio;
	obj.cantidad = cantidad;
	//convert object to json string
	text = JSON.stringify(obj);
	array_json.push(text);

  var json_arr = '[' + array_json + ']';
  // console.log('jsons:' + json_arr);


  var dataString = 'process=insert' + '&cuantos=1&json_arr=' + json_arr;
  dataString += '&fecha_movimiento=' + fecha_movimiento ;
  dataString += '&total_compras=' + total_compras;

  $.ajax({
    type: 'POST',
    url: url+'inventario/ajuste_inventario',
    data: dataString,
    dataType: 'json',
    success: function(data) {
      notification(data.type,data.title,data.msg);
      if(data.type == "success")
      {
        $("#inventable").html("");
        $("#submit1").attr("disabled", true);
        setInterval("reload();", 1500);
      }
    }
  });
}

function reload() {
	location.href = url+"baner";
}
