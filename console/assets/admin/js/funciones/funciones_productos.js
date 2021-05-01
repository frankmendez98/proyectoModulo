let url = base_url+"admin/";
$(document).ready(function () {

	$('#editable').DataTable({
		"pageLength": 50,
		"serverSide": true,
		"order": [[0, "asc"]],
		"ajax": {
			url: url+'productos/get_data',
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
	$(".decimal1").numeric({negative:false});
	$(".decimal2").numeric({negative:false, decimal:false});

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

	$(".custom").spectrum({
    showPalette: true,
    palette: [
        ['black', 'white', 'blanchedalmond'],
        ['rgb(255, 128, 0);', 'hsv 100 70 50', 'lightyellow']
    ],
		cancelText: "Cancelar",
    chooseText: "Seleccionar",

  });

});

$(document).on("change", ".custom", function()
{
  var log = $(this).val();
  var color = $(this).parents("tr").find(".sp-preview-inner").attr("style");
	console.log(color);
  var color = color.replace("background-", "");
  // console.log(color);
  // $("#color").val(color);
	$(this).closest("tr").find("#descripcion").val(color);
});

$(document).on("change","#id_categoria", function(event)
{
	var id = $(this).val();
	$("#id_subcategoria *").remove();
	$("#select2-id_subcategoria-container").text("");
	$.ajax({
		type: "POST",
		url: url+"productos/subcategorias",
		data: "id="+id,
		dataType: 'json',
		success: function (datax) {
			if (datax.type == "success") {
				$("#select2-id_subcategoria-container").text("Seleccione");
				$("#id_subcategoria").html(datax.list);
				$("#id_subcategoria").val("");
			}
			else {
				$("#select2-id_subcategoria-container").text("No se encontraron subcategorias");
				$("#id_subcategoria").html(datax.list);
				$("#id_subcategoria").val("");
			}
		}
	});
});

$(document).on("click", "#n_item_color", function()
{
	var lista = '		<tr class="fila">';
	lista += '				<td class="col-lg-5"><input type="hidden" id="id_detalle" class="id_detalle" value=""><input type="text" id="custom" class="custom" /><input type="hidden" id="descripcion" name="descripcion" value="color: rgb(0, 0, 0);"></td>';
	lista += '				<td class="col-lg-5"><input type="text" class="form-control" id="nombre_color" name="nombre_color"></td>';
	lista += '				<td class="col-lg-5"><input type="text" class="form-control decimal1" id="aumento" name="aumento"></td>';
	// lista += '				<td class="col-lg-5"><input type="text" class="form-control decimal2" id="existencia" name="existencia"></td>';
	lista += '				<td class="col-lg-2"><a class="btn btn-danger deltre" idt="15"><i class="fa fa-trash"></i></a></td>';
	lista += '			</tr>';

	// $("#color_table").append(lista);
	$(this).parents("table tbody").prepend(lista);
	$(".decimal1").numeric({negative:false});
	$(".decimal2").numeric({negative:false, decimal:false});
	$(".custom").spectrum({
    showPalette: true,
    palette: [
        ['black', 'white', 'blanchedalmond'],
        ['rgb(255, 128, 0);', 'hsv 100 70 50', 'lightyellow']
    ],
		cancelText: "Cancelar",
    chooseText: "Seleccionar",
  });
	$(".custom").css("width", "100%");
});
$(document).on("click", "#n_item", function()
{
	var lista = '		<tr class="fila">';
	lista += '				<td class="col-lg-5"><input type="hidden" id="id_detalle" class="id_detalle" value=""><input type="text" id="descripcion" name="descripcion" class="form-control"></td>';
	lista += '				<td class="col-lg-5"><input type="text" class="form-control decimal1" id="aumento" name="aumento"></td>';
	// lista += '				<td class="col-lg-5"><input type="text" class="form-control decimal2" id="existencia" name="existencia"></td>';
	lista += '				<td class="col-lg-2"><a class="btn btn-danger deltre" idt="15"><i class="fa fa-trash"></i></a></td>';
	lista += '			</tr>';

	// $("#caracteristica_table").append(lista);
	$(this).parents("table tbody").prepend(lista);
	$(".decimal1").numeric({negative:false});
	$(".decimal2").numeric({negative:false, decimal:false});
});

$(document).on("click","#btn_add_tall", function(event)
{
	var id_tipo = $("#tipo_caracteristicas").val();
	var color = $("#tipo_caracteristicas").select2().find(":selected").data("id");
	if(id_tipo != "")
	{
		if(color == 1)
		{
			var lista = "";
			lista += '<div class="col-lg-4">';
			lista += '	<table class="table table-bordered table-hover table-striped tab-datos">';
			lista += '		<thead>';
			lista += '			<tr>';
			lista += '				<th class="col-lg-5" style="text-align:center;" colspan="4"><input type="hidden" class="form-control" id="id_tipop" name="id_tipop" value=""><input type="hidden" class="form-control" id="c_caracteristica" name="c_caracteristica" value="'+id_tipo+'"><input type="hidden" class="form-control" id="color_exist" name="color_exist" value="1"><input type="text" class="form-control" id="titulo_c" name="titulo_c" placeholder="Nombre caracteristica"></th>';
			lista += '			</tr>';
			lista += '			<tr>';
			lista += '				<th class="col-lg-5">Color</th>';
			lista += '				<th class="col-lg-5">Nombre</th>';
			lista += '				<th class="col-lg-5">Aumento</th>';
			// lista += '				<th class="col-lg-5">Existencia</th>';
			lista += '				<th class="col-lg-2">Acciones</th>';
			lista += '			</tr>';
			lista += '		</thead>';
			lista += '		<tbody id="color_table" class="tab_body">';

			lista += '		</tbody>';
			lista += '		<tfooter>';
			lista += '			<tr>';
			lista += '				<th class="col-lg-5" style="text-align:center;" colspan="4"><a id="n_item_color">Nuevo item</a></th>';
			lista += '			</tr>';
			lista += '		</tfooter>';
			lista += '	</table>';
			lista += '</div>';
			$(".caja-compac").append(lista);
		}
		else
		{
			var lista = "";
			lista += '<div class="col-lg-4">';
			lista += '	<table class="table table-bordered table-hover table-striped tab-datos">';
			lista += '		<thead>';
			lista += '			<tr>';
			lista += '				<th class="col-lg-5" style="text-align:center;" colspan="4"><input type="hidden" class="form-control" id="id_tipop" name="id_tipop" value=""><input type="hidden" class="form-control" id="c_caracteristica" name="c_caracteristica" value="'+id_tipo+'"><input type="hidden" class="form-control" id="color_exist" name="color_exist" value="0"><input type="text" class="form-control" id="titulo_c" name="titulo_c" placeholder="Nombre caracteristica"></th>';
			lista += '			</tr>';
			lista += '			<tr>';
			lista += '				<th class="col-lg-5">Descripción</th>';
			lista += '				<th class="col-lg-5">Aumento</th>';
			// lista += '				<th class="col-lg-5">Existencia</th>';
			lista += '				<th class="col-lg-2">Acciones</th>';
			lista += '			</tr>';
			lista += '		</thead>';
			lista += '		<tbody id="caracteristica_table" class="tab_body">';

			lista += '		</tbody>';
			lista += '		<tfooter>';
			lista += '			<tr>';
			lista += '				<th class="col-lg-5" style="text-align:center;" colspan="4"><a id="n_item">Nuevo item</a></th>';
			lista += '			</tr>';
			lista += '		</tfooter>';
			lista += '	</table>';
			lista += '</div>';
			$(".caja-compac").append(lista);
		}
	}
	$("#tipo_caracteristicas").val('').trigger('change') ;;
});
$(document).on("click",".deltr", function(event)
{
	var tr = $(this).parents("tr");
	tr.remove();
});
$(document).on("click",".deltre", function(event)
{
	var tr = $(this).parents("tr");
	var id = $(this).attr('idt');
	$.ajax({
		type: "POST",
		url: url+"productos/deletetalla",
		data: "id="+id,
		dataType: 'json',
		success: function (datax) {
			//notification(data.type,data.title,data.msg);
			if (datax.type == "success") {
				tr.remove();
			}
		}
	});
});

$(document).on("click","#tipo_producto1", function(event)
{
	if($(this).is(":checked"))
	{
		// $(".stock").attr("hidden",true);
	}
});
$(document).on("click","#tipo_producto2", function(event)
{
	if($(this).is(":checked"))
	{
		// $(".stock").removeAttr("hidden");
		if($("#talla2").is(":checked"))
		{
			// $(".tallas").attr("hidden",true);
			// $(".ntall").removeAttr("hidden");
		}
		else {
			// $(".ntall").attr("hidden",true);
			// $(".tallas").removeAttr("hidden");
		}
	}
});
$(document).on("click","#talla2", function(event)
{
	if($(this).is(":checked"))
	{
		$(".tallas").attr("hidden",true);
		$(".ntall").removeAttr("hidden");
	}
});
$(document).on("click","#talla1", function(event)
{
	if($(this).is(":checked"))
	{
		$(".tallas").removeAttr("hidden");
		$(".ntall").attr("hidden",true);
	}
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

$(document).on("click",".delete_row", function(event)
{
	event.preventDefault()
	let id_row = $(this).attr("id");
	let exis = parseInt($(this).attr("canti"));
	let dataString = "id=" + id_row;
	var text = "Estas seguro de eliminar este regitro?!";
	if(exis >0)
	{
		text = "Este producto tiene existencias si lo elimina perdera todos los datos que haya ingresado, seguro de eliminar este regitro?!";
	}
	Swal.fire({
		title: 'Alerta!!',
		text: text,
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
				url: url+"productos/delete",
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


function save_data(){
	var err = 0;
	var array_json = new Array();
	$(".tab-datos").each(function(index) {
		var titulo = $(this).find("#titulo_c").val();
		var color = $(this).find("#color_exist").val();
		var caracteristica = $(this).find("#c_caracteristica").val();
		var id_tipop = $(this).find("#id_tipop").val();
		if(titulo != "")
		{
			var obj = new Object();
			obj.titulo = titulo;
			obj.color = color;
			obj.caracteristica = caracteristica;
			obj.id_tipop = id_tipop;
			var array_json1 = new Array();
			a = $(this).find("tbody > .fila");
			for (var i = 0; i < a.length; i++) {
				var aumento = $(a[i]).find('#aumento').val();
				// var existencia = $(a[i]).find('#existencia').val();
				var descripcion = $(a[i]).find('#descripcion').val();
				var id_detalle = $(a[i]).find('#id_detalle').val();
				if(color == 1)
				{
					var nombre_color = $(a[i]).find('#nombre_color').val();
				}
				else
				{
					var nombre_color = "";
				}
				// console.log("Descripcion: "+descripcion+" Aumento: "+aumento+" Existencia: "+existencia);
				if(descripcion != "")
				{
					if(aumento != "")
					{

							var obj1 = new Object();
							obj1.aumento = aumento;
							obj1.descripcion = descripcion;
							// obj1.existencia = existencia;
							obj1.nombre_color = nombre_color;
							obj1.id_detalle = id_detalle;
							text1 = JSON.stringify(obj1);
							array_json1.push(text1);

					}
					else
					{
						err += 1;
					}
				}
				else
				{
					err += 1;
				}
			}
			var json_arr1 = '[' + array_json1 + ']';
			obj.lista = json_arr1;
			text = JSON.stringify(obj);
			array_json.push(text);
		}
		else
		{
			err += 1;
		}
	});
	var json_arr = '[' + array_json + ']';
	console.log(json_arr);
	// console.log(json_arr);

	// var array_json = new Array();
	// var err = 0;
	// $("#tallas_table tr").each(function(index) {
	// 	var tall = $(this).find(".tall").val();
	// 	var cant = $(this).find(".cant").val();
	// 	if (tall == "")
	// 	{
	// 		err =1;
	// 	}
	// 	var obj = new Object();
	// 	obj.tall = tall;
	// 	obj.cant = cant;
	// 	//convert object to json string
	// 	text = JSON.stringify(obj);
	// 	array_json.push(text);
	// });
	// var json_arr = '[' + array_json + ']';
	if(!err)
	{
		$("#divh").show();
		$("#main_view").hide();
		$("#listas_array").val(json_arr);
		let form = $("#form_add");
		let formdata = false;
		if (window.FormData) {
			formdata = new FormData(form[0]);
		}
		$.ajax({
			type: 'POST',
			url: url+'productos/agregar',
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
					// setTimeout("reload();", 1500);
				}
			}
		});
	}
	else {
		notification("Warning","Advertencia","Falta ingresar el detalle de una o varias caracteristicas");
	}
}

function edit_data(){
	var err = 0;
	var array_json = new Array();
	$(".tab-datos").each(function(index) {
		var titulo = $(this).find("#titulo_c").val();
		var color = $(this).find("#color_exist").val();
		var caracteristica = $(this).find("#c_caracteristica").val();
		var id_tipop = $(this).find("#id_tipop").val();
		if(titulo != "")
		{
			var obj = new Object();
			obj.titulo = titulo;
			obj.color = color;
			obj.caracteristica = caracteristica;
			obj.id_tipop = id_tipop;
			var array_json1 = new Array();
			a = $(this).find("tbody > .fila");
			for (var i = 0; i < a.length; i++) {
				var aumento = $(a[i]).find('#aumento').val();
				// var existencia = $(a[i]).find('#existencia').val();
				var descripcion = $(a[i]).find('#descripcion').val();
				var id_detalle = $(a[i]).find('#id_detalle').val();
				if(color == 1)
				{
					var nombre_color = $(a[i]).find('#nombre_color').val();
				}
				else
				{
					var nombre_color = "";
				}
				// console.log("Descripcion: "+descripcion+" Aumento: "+aumento+" Existencia: "+existencia);
				if(descripcion != "")
				{
					if(aumento != "")
					{

							var obj1 = new Object();
							obj1.aumento = aumento;
							obj1.descripcion = descripcion;
							// obj1.existencia = existencia;
							obj1.nombre_color = nombre_color;
							obj1.id_detalle = id_detalle;
							text1 = JSON.stringify(obj1);
							array_json1.push(text1);

					}
					else
					{
						err += 1;
					}
				}
				else
				{
					err += 1;
				}
			}
			var json_arr1 = '[' + array_json1 + ']';
			obj.lista = json_arr1;
			text = JSON.stringify(obj);
			array_json.push(text);
		}
		else
		{
			err += 1;
		}
	});
	var json_arr = '[' + array_json + ']';
	console.log(json_arr);
	// var array_json = new Array();
	// var err = 0;
	// $("#tallas_table tr").each(function(index) {
	// 	var tall = $(this).find(".tall").val();
	// 	var id = $(this).attr('id');
	// 	var cant = $(this).find(".cant").val();
	// 	if (tall == "")
	// 	{
	// 		err =1;
	// 	}
	// 	var obj = new Object();
	// 	obj.id = id;
	// 	obj.tall = tall;
	// 	obj.cant = cant;
	// 	//convert object to json string
	// 	text = JSON.stringify(obj);
	// 	array_json.push(text);
	// });
	// var json_arr = '[' + array_json + ']';
	if(!err)
	{
		$("#divh").show();
		$("#main_view").hide();
		// $("#tallas").val(json_arr);
		$("#listas_array").val(json_arr);
		let form = $("#form_edit");
		let formdata = false;
		if (window.FormData) {
			formdata = new FormData(form[0]);
		}
		$.ajax({
			type: 'POST',
			url: url+'productos/editar',
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
	else {
		notification("Warning","Advertencia","Falta ingresar el detalle de una o varias tallas");
	}
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
	location.href = url+"productos";
}
// $(document).on("click", "#btn_add_tall_des", function()
// {
// 	explora();
// })
// function explora()
// {
//
// }
