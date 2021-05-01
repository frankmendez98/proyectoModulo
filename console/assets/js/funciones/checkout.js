$(document).ready(function() {
  //alert("En chequeo...");
  console.log("En chequeo...");

  let token = $("#get_csrf_hash").val();
  $("#form_reg").on('submit', function (e) {
    e.preventDefault();
    $(this).parsley().validate();
    if ($(this).parsley().isValid()) {
      save_data();
    }
  });
  var procc = $("#procc").val();
  if(procc == "payment")
  {
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
  }
  $('.select2').select2();
  if(procc == "address")
  {
    $('#telefono').mask('0000-0000');
  }
  $("#id_departamento").change(function () {
    $("#id_municipio *").remove();
    $("#select2-id_municipio-container").text("");
    let ajaxdata = {
      "id_departamento": $("#id_departamento").val(),
      "csrf_token_name": token,
    };
    $.ajax({
      url: base_url + 'perfil/get_municipios',
      type: "POST",
      data: ajaxdata,
      success: function (opciones) {
        $("#select2-id_municipio-container").text("Selecciona un municipio");
        $("#id_municipio").html(opciones);
        $("#id_municipio").val("");
      }
    })
  });
});
$(document).on("click","#btnfinish",function(){
  $.ajax({
    type: 'POST',
    url: base_url+"Checkout/finalizar_orden",
    data: "",
    success: function(datax)
    {
      swal('Informacion','Gracias por realizar tu pedido', 'success');
      setTimeout('location.replace(base_url);',1500);
    }
  });
});
$(document).on("click","#accept",function(){
  if($(this).is(":checked"))
  {
    $("#acceptt").prop("checked", false);
  }
});
$(document).on("click","#acceptt",function(){
  if($(this).is(":checked"))
  {
    $("#accept").prop("checked", false);
  }
});
$(document).on("click","#savepayment",function(){
  $(this).attr('disabled',true);
  efectivo = 0;
  tarjeta = 0;
  transferencia = 0;
  if($("#accept").is(":checked"))
  {
    transferencia = 1;
  }
  if($("#accepttt").is(":checked"))
  {
    efectivo = 0;
  }
  /*if($("#acceptt").is(":checked"))
  {
    tarjeta = 1;
  }*/
  $("#efectivo").val(efectivo);
  $("#tarjeta").val(tarjeta);
  $("#transferencia").val(transferencia);
  var form = $("#form_add");
  var formdata = false;
  if (window.FormData) {
    formdata = new FormData(form[0]);
  }

  //if($("#accept").is(":checked") || $("#acceptt").is(":checked"))
  if($("#accept").is(":checked") || $("#accepttt").is(":checked"))
  {
    datos='efectivo='+efectivo+'&tarjeta='+tarjeta+'&transferencia='+transferencia;
    if(tarjeta == 1)
    {
      swal({
        type: 'warning',
        title: 'Advertencia',
        text: "¿Confirma que desea proceder a realizar el pago de su orden?",
        showCancelButton: true,
        showConfirmButton: true,
        confirmButtonClass: 'btn-success',
        cancelButtonClass: 'btn-danger',
        confirmButtonText: 'Si, Continuar',
        cancelButtonText: 'No, Regresar',
      },
      function(isConfirm)
      {
        if(isConfirm)
        {
          location.replace(base_url+"Checkout/pago_orden");
        }
      });
    }
    else if(transferencia == 1) {
      if ($('#foto').get(0).files.length === 0)
      {
        iziToast.info({
          title: "Advertencia",
          message: "Debe agregar una imagen para continuar",
          position: 'topRight',
        });
      }
      else
      {

        iziToast.warning({
          title: "Información",
          message: "Espere un momento, procesando su pedido",
          position: 'topRight',
        });
        $.ajax({
          type: 'POST',
          url: base_url+"Checkout/grabar_orden",
          cache: false,
          data: formdata ? formdata : form.serialize(),
          contentType: false,
          processData: false,
          dataType: 'JSON',
          success: function(datax)
          {
            if(datax.typeinfo == "Success")
            {
              swal('Informacion','Pedido generado con exito', 'success');
              setTimeout('location.replace(base_url+"Checkout/review");',1500);
            }
            else {
              $("#savepayment").attr('disabled',false);
              swal('Advertencia','Error al guardar el pedido', 'warning');
            }
          }
        });
      }
    }
    else {
      $.ajax({
        type: 'POST',
        url: base_url+"Checkout/grabar_orden",
        cache: false,
        data: datos,
        dataType: 'JSON',
        success: function(datax)
        {
          if(datax.typeinfo == "Success")
          {
            swal('Informacion','Pedido generado con exito', 'success');
            setTimeout('location.replace(base_url+"Checkout/review");',1500);
          }
          else {
            $("#savepayment").attr('disabled',false);
            swal('Advertencia','Error al guardar el pedido', 'warning');
          }
        }
      });
    }
  }
  else
  {
    $("#savepayment").attr('disabled',false);
    swal('Advertencia','Debe seleccionar un metodo de pago', 'warning');
  }
});
function save_data(){
  let form = $("#form_reg");
  let formdata = false;
  if (window.FormData) {
    formdata = new FormData(form[0]);
  }
  $.ajax({
    type: 'POST',
    url: base_url+'checkout/store',
    cache: false,
    data: formdata ? formdata : form.serialize(),
    contentType: false,
    processData: false,
    dataType: 'json',
    success: function (data) {
      notification(data.type,data.title,data.message);
      if (data.type == "success") {

        setTimeout("reload();", 1500);
      }
    }
  });
}
function reload() {
  location.href = base_url+"checkout/shipping";
}
var cargop = parseFloat($("#cargop").val());
var cargof = parseFloat($("#cargof").val());
var totalFinal = parseFloat($("#subtotal").val());
var total = parseFloat($("#totalFinal").val());
$(document).on("click","#acceptt", function()
{
  if($(this).is(":checked"))
  {
    $("#cgtar").attr("hidden",false);
    var recargo = totalFinal*(cargop/100) + cargof;
    $(".totalTarjeta").text("$"+recargo.toFixed(2));
    $(".totalFinal_td").text("$"+(recargo+total).toFixed(2));
    $("#totalFinal").val((recargo+total).toFixed(2));
  }
  else {
    $("#cgtar").attr("hidden",true);
    $(".totalTarjeta").text("");
    $(".totalFinal_td").text("$"+total.toFixed(2));
    $("#totalFinal").val(total.toFixed(2));
  }
})
