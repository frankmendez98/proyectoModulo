$(document).ready(function()
{
  $(".numeric").numeric({
    negative: false,
    decimal: false
  });
  $(".decimal").numeric({
    negative: false,
    decimalPlaces: 2
  });

  $('.tel').mask('0000-0000');
  $('.select2').select2();
  $(".upper").blur(function() {
    $(this).val($(this).val().toUpperCase())
  });
  $(".lower").blur(function() {
    $(this).val($(this).val().toLowerCase())
  });
  $('.nit').mask("0000-000000-000-0");
  $('.dui').mask("00000000-0");

  $('.i-checks').iCheck({
    checkboxClass: 'icheckbox_square-green',
    radioClass: 'iradio_square-green',
  });
$('.mayu').keyup(function() {
	this.value = this.value.toLocaleUpperCase();
});


  /*$('#editable').dataTable({
    "paging": true,
    "pageLength": 50,
    "language": {
        "sProcessing":     "Procesando...",
        "sLengthMenu":     "Mostrar _MENU_ registros",
        "sZeroRecords":    "No se encontraron resultados",
        "sEmptyTable":     "Ningún dato disponible en esta tabla",
        "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
        "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
        "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
        "sInfoPostFix":    "",
        "sSearch":         "Buscar:",
        "sUrl":            "",
        "sInfoThousands":  ",",
        "sLoadingRecords": "Cargando...",
        "oPaginate": {
          "sFirst":    "Primero",
          "sLast":     "Último",
          "sNext":     "Siguiente",
          "sPrevious": "Anterior"
        },
        "oAria": {
          "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
          "sSortDescending": ": Activar para ordenar la columna de manera descendente"
        }
    },
  });*/
  $.fn.datepicker.dates['es'] = {
    days: ["Domingo", "Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado", "Domingo"],
    daysShort: ["Dom", "Lun", "Mar", "Mié", "Jue", "Vie", "Sáb", "Dom"],
    daysMin: ["Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa", "Do"],
    months: ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"],
    monthsShort: ["Ene", "Feb", "Mar", "Abr", "May", "Jun", "Jul", "Ago", "Sep", "Oct", "Nov", "Dic"]
  };
  //window.prettyPrint && prettyPrint();
  $(".datepicker").datepicker({
    format: 'dd-mm-yyyy',
    language: 'es',
  });
  var fecha = new Date();
  fecha.setDate(fecha.getDate()+10);

  $('.datepicker1').datepicker({
      format: 'dd-mm-yyyy',
      language: 'es',
      startDate: fecha,
  });
  $('.timepicker').mdtimepicker({
    timeFormat: 'hh:mm:ss.000',
    format: 'h:mm tt',
    theme: 'blue',
    readOnly: true,
    hourPadding: false
  });
});

function notification(type, title, message){
	if(type=="success" || type=="Success"){
		iziToast.success({
			title: title,
			message: message,
			position: 'topRight',
		});
	}
	else if(type=="info" || type=="Info"){
		iziToast.info({
			title: title,
			message: message,
			position: 'topRight',
		});
	}
	else if(type=="warning" || type=="Warning"){
		iziToast.warning({
			title: title,
			message: message,
			position: 'topRight',
		});
	}
	else if(type=="error" || type=="Error"){
		iziToast.error({
			title: title,
			message: message,
			position: 'topRight',
		});
	}
}

function calcularDias(fecha1,fecha2){
  var dia1= fecha1.substr(0,2);
  var mes1= fecha1.substr(3,2);
  var anyo1= fecha1.substr(6);
  
  var dia2= fecha2.substr(0,2);
  var mes2= fecha2.substr(3,2);
  var anyo2= fecha2.substr(6);
  
  var nuevafecha1= new Date(anyo1+","+mes1+","+dia1);
  var nuevafecha2= new Date(anyo2+","+mes2+","+dia2);

  var diasDif = nuevafecha2.getTime() - nuevafecha1.getTime();

  var dias = Math.round(diasDif/(1000 * 60 * 60 * 24));
  
  return dias;
}
