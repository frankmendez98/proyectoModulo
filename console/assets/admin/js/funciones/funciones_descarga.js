let url = base_url+"admin/";
function round(value, decimals) {
  return Number(Math.round(value + 'e' + decimals) + 'e-' + decimals);
}
$(document).ready(function () {

	$('#editable').DataTable({
		"pageLength": 50,
		"serverSide": true,
		"order": [[0, "asc"]],
		"ajax": {
			url: url+'inventario/get_data',
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
  $(".datepick2").datepicker({
    format: "dd-mm-yyyy"
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


  $("#scrollable-dropdown-menu #producto_buscar").typeahead({
    highlight: true,
  },
  {
    limit:100,
    name: 'productos',
    display: function(data) {
      prod=data.producto.split("|");
      return prod[1];
    },
    source: function show(q, cb, cba) {
      console.log(q);
      var url = 'fetch/'+ q;
      $.ajax({ url: url })
      .done(function(res) {
        if(res)cba(JSON.parse(res))
      })
    },
    templates:{
      suggestion:function (data) {
        var prod=data.producto.split("|");
        return '<div class="tt-suggestion tt-selectable">'+prod[1]+'</div>';

      }
    }
  }).on('typeahead:selected', onAutocompleted);
  function onAutocompleted($e, datum) {
		$('.typeahead').typeahead('val', '');
    var prod0=datum.producto;
    var prod= prod0.split("|");
    var id_prod = prod[0];
    var descrip = prod[1];
    agregar_producto(id_prod);
  }
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
$(document).on("change",".tallas", function(){
  var talla = $(this).val();
  var tr = $(this).parents("tr");
  $.ajax({
    type: "POST",
    url: url+"/inventario/stock_talla",
    data: "id="+talla,
    dataType: "JSON",
    success: function(datax)
    {
      tr.find(".existencia").val(datax.cantidad);
      var cantidad = parseFloat(tr.find('#cant').val());

      if(datax.cantidad < cantidad)
      {
        tr.find('#cant').val(datax.cantidad);
      }
      totalfact();
    }
  });
});
function agregar_producto(id_prod) {
  console.log("ok");
  id_prod = $.trim(id_prod);
  //cantidad = parseInt(cantidad)
  var id_prev = "";
  var id_new = id_prod;
  var id_previo = new Array();
  var filas = 0;
  var id_previo = new Array();
  $("#inventable>tbody  tr").each(function (index) {
      if (index >= 0) {
        var campo0 = "";
        $(this).children("td").each(function (index2) {
          switch (index2) {
            case 0:
              campo0 = $(this).text();
              if (campo0 != undefined || campo0 != '') {
                id_previo.push(campo0);
              }
              break;
          }
        });
        filas = filas + 1;
      } //if index>0
  });
  // urlprocess = $('#urlprocess').val();


  var id_pedido = $("#select_pedidos").val();
  var dataString = 'process=consultar_stock&id_producto=' + id_prod;

    $.ajax({
      type: "POST",
      url: url+'inventario/cargar_producto',
      data: dataString,
      dataType: 'json',
      success: function(data) {
        var descripcion = data.descripcion;
        var precios = data.precios;
        var stock = data.stock;
        if(stock != 0)
        {
          var tr_add = '<tr class="" id=' + filas + '>';
          tr_add += "<td class='col-md-1'><input type='hidden'  id='id_producto' name='id_producto' value='" + id_prod + "'>" + id_prod + "</td>";
          tr_add += '<td  class="col-md-4">' + descripcion + '</td>';
          tr_add += "<td class='col-md-2'>"+data.talla+"</td>";
          tr_add += "<td class='col-md-1'><input type='text'  class='form-control existencia' id='existencia' name='existencia' value='" + stock + "' style='width:80px;' readOnly></td>";
          tr_add += "<td class='col-md-2'><input type='text'  class='form-control precio_compra' id='precio_compra' name='precio_compra' value='" + precios + "' style='width:80px;' readOnly></td>";
          tr_add += "<td class='col-md-1'><input type='text'  class='form-control decimal' id='cant' name='cant' value='1' style='width:60px;'></td>";
          tr_add += '<td class="Delete col-md-1"><input  id="delprod" type="button" class="btn btn-danger fa pull-right"  value="&#xf1f8;"></td>';
          tr_add += '</tr>';
          //agregar columna a la tabla de facturacion
          var existe = false;
          var posicion_fila = 0;
          var posicion_fila2 = 0;
          /*$.each(id_previo, function(i, id_prod_ant) {
            if (id_prod == id_prod_ant) {
              existe = true;
              posicion_fila = i;
              posicion_fila2 = posicion_fila + 1
              setRowCant(posicion_fila2);
            }
          });*/
          console.log(existe);
          if (true){//(existe == false) {
            $("#first").remove();
            $("#inventable").prepend(tr_add);
            $("#inventable>tbody #"+filas).find("#cant").focus();
            $(".decimal").numeric({decimal: false, negative: false});
            $(".precio_compra").numeric();
            $(".sel").select2({
                tags: true,
                createTag: function(tag) {
                  if (tag.term.match(/^\d*\.?\d*$/))
                    return {
                      text: tag.term,
                      id: 1
                    }
                }
            });
            $(".sel2").trigger('change');
            $(".vence").datepicker({
              format: "dd-mm-yyyy"
            });
            //$('.btn-danger').prop('disabled', 'true')
            //$('.decimal').prop('readOnly', 'true')
          }
          // totales();
          totalfact();
        }
        else
        {
          notification("Error","Importante!","Este producto no contiene stock.");
        }
      }
    });
}


function totalfact() {
  // var urlprocess = $('#urlprocess').val();
  var total = 0;
  var totalcantidad = 0;
  var total_gravado = 0;
  var filas = 0;
  $("#inventable>tbody  tr").each(function(index)
  {
    if (index >= 0) {
      var subtotal = 0;
      var precio_compra = parseFloat($(this).find("#precio_compra").val());
      var cantidad = parseInt($(this).find("#cant").val());

      total_gravado += (precio_compra * cantidad);
      total += (precio_compra * cantidad);
      totalcantidad += cantidad;
      console.log(total_gravado);
      filas += 1;
    }
  });
  // IMPUESTOS
  total = round(total, 2);
  total_dinero = total.toFixed(2);
  total_gravado = parseFloat(total_gravado).toFixed(2);
  //console.log(total_gravado);

  var total_gravado_mostrar = parseFloat(total_gravado).toFixed(2);
  $('#total_gravado').html(total_gravado_mostrar);
  //console.log(total_gravado_mostrar);
  //$('#total_exento').html(total_exento_mostrar);
  //$('#total_exenta').html(total_exento_mostrar);
  $('#totcant').html(totalcantidad);
  //    $('#totdescto').html(total_descto_mostrar);
  // $('#totaltexto').load(urlprocess, {
  //   'process': 'total_texto',
	//
  // });
	var dataString = 'total='+ total_gravado_mostrar;
/*$.ajax({
		type: "POST",
		url: "total_texto",
		data: dataString,
		success: function (data) {
			$('#totaltexto').html(data);
		}
	});*/
}

$(document).on("click", ".Delete", function() {
  var parent = $(this).parents().get(0);
  $(parent).remove();
  totalfact();
});

$(document).on("blur", "#cant", function() {
  $(this).removeClass('hoverTable2');
})
$(document).on("blur", "#inventable", function() {
  totalfact();
})
$(document).on("keyup", "#cant", function() {
  var valor = $(this).val();
  var cantidad = parseFloat($(this).parents("tr").find('#existencia').val());

  if(valor > cantidad)
  {
    $(this).val(cantidad);
  }
  else
  {
  }
  totalfact();
});

$(document).on("keypress", "#cant", function(evt)
{
  if(evt.keyCode == 13)
  {
    if($(this).val()!="")
    {
      $("#producto_buscar").focus();
      //console.log("OK");
    }
    else {
      notification("Error","Alerta!","Ingrese una canntidad");
    }
  }
});


$(document).on("click", "#submit1", function()
{
	save_data();
})

function save_data(){
	var i = 0;
  var subtotal = 0;
  subt_exento = 0;
  subt_gravado = 0;
  var StringDatos = "";
  var total_compras = $('#total_gravado').text();
  var fecha_movimiento = $("#fecha2").val();
  var array_json = new Array();
  var verificar = 'noverificar';
  var verificador = [];
  var fallo = 0;
  $("#inventable>tbody  tr").each(function(index) {
    if (index >= 0)
    {
      var cantidad = $(this).find("#cant").val();
      var precio_compra = $(this).find("#precio_compra").val();
      var id_producto = $(this).find("#id_producto").val();
      var precio_venta = $(this).find("#precio_venta").val();
      var talla = $(this).find(".tallas").val();
      if(precio_compra != "")
			{
				if(precio_compra != 0)
				{
					if(cantidad != "")
					{
						if(cantidad != 0)
						{
							var obj = new Object();
			        obj.id_producto = id_producto;
			        obj.precio_compra = precio_compra;
			        obj.cantidad = cantidad;
			        obj.talla = talla;
			        //convert object to json string
			        text = JSON.stringify(obj);
			        array_json.push(text);
						}
						else
						{
								fallo = 1;
						}
					}
					else {
						fallo = 1;
					}
				}
				else {
					fallo = 1;
				}
			}
			else {
				fallo = 1;
			}
      i = i + 1;
    }
  });
  var json_arr = '[' + array_json + ']';

  var dataString = 'process=insert' + '&cuantos=' + i + '&json_arr=' + json_arr;
  dataString += '&fecha_movimiento=' + fecha_movimiento ;
  dataString += '&total_compras=' + total_compras;

  if(fallo == 0)
	{
		if(i > 0)
		{
      $.ajax({
        type: 'POST',
        url: url+'inventario/salida',
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
    else
    {
      notification("Error","Alerta!","Aun no se han cargado productos a la lista");
    }
  }
  else
  {
    notification("Error","Alerta!","Verifique que todos los datos esten correctos");
  }
}

function reload() {
	location.href = url+"inventario";
}
