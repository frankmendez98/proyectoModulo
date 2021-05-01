
var url = base_url+"admin/permisos/";
$(document).ready(function () {

    $('#editable2').DataTable({
        "pageLength": 50,
        "serverSide": true,
        "order": [[0, "desc"]],
        "ajax": {
            url: url+"get_data",
            type: 'POST'
        },
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
    }); // End of DataTable

    $("#fileinput").fileinput({
        showUpload: false,
        showBrowse: false,
        dropZoneEnabled: true,
        dropZoneTitle: "Arrastre y suelte sus archivos aqui",
        dropZoneClickTitle: " o click para seleccionar archivos",
        showRemove: false,
        showCaption: false,
        removeTitle: "Borrar",
        zoomTitle: 'Ver Detalles',
        //theme: "explorer-fa",
        removeFromPreviewOnError: true,
        overwriteInitial: false,
        showUpload: false,
        browseOnZoneClick: true,
        enableResumableUpload: true,
        language: "es",
        maxFileCount: 15,
        allowedFileExtensions: ["jpg", "gif", "bmp", "png", "docx", "xlsx", "odt", "ods", "pdf", "doc", "xls"]
    });
    $('#formulario').validate({
        rules: {
            tipo_permiso: {
                required: true,
            },
            fecha_inicio: {
                required: true,
            },
            hora_inicio: {
                required: true,
            },
            fecha_fin: {
                required: true,
            },
            hora_fin: {
                required: true,
            },
            justificacion: {
                required: true,
            },
        },
        messages: {
            tipo_permiso: "Por favor seleccione una opcion",
            fecha_inicio: "Por favor seleccione",
            hora_inicio: "Por favor seleccione",
            fecha_fin: "Por favor seleccione",
            hora_fin: "Por favor seleccione",
            justificacion: "Por favor ingrese una justificacion",
        },
        submitHandler: function (form) {
            senddata();
        }
    });

    $('.select').select2();
    $("#tipo_permiso").change(function () {
        if ($(this).val() != "") {
            $("#infos").text($("#tipo_permiso option:selected").attr("data-description"));
        } else {
            $("#infos").text("");
        }
    });

	$('#tipo_solicitud').on('change', function() {
		if($(this).val()==0){
			$(".horas").removeAttr("style");
		}
		else if($(this).val()==1){
			$(".horas").attr("style", "display: none;");
		}

	});
});
$(function () {
    //binding event click for button in modal form
    $(document).on("click", ".canceled", function (event) {
        var id = $(this).attr("id");
        canceled(id);
    });
    $(document).on("click", ".aproved", function (event) {
        var id = $(this).attr("id");
        aproved(id);
    });
    $(document).on("click", ".denied", function (event) {
        var id = $(this).attr("id");
        denied(id);
    });
    // Clean the modal form
    $(document).on('hidden.bs.modal', function (e) {
        var target = $(e.target);
        target.removeData('bs.modal').find(".modal-content").html('');
    });

});

function senddata() {

    $("#main_view").hide();
    $("#main_view").attr("style", "display: none;");
    $("#divh").attr("style", "display: block;");
    var process = $('#process').val();
    if (process == 'insert') {
        var id_usuario = 0;
        var urlprocess = 'guardar_solicitud';
    }
    if (process == 'edited') {
        var urlprocess = 'editar_solicitud';
    }
    var form = $("#formulario");
    var formdata = false;
    if (window.FormData) {
        formdata = new FormData(form[0]);
    }
    $.ajax({
        type: 'POST',
        url: url+urlprocess,
        cache: false,
        data: formdata ? formdata : form.serialize(),
        contentType: false,
        processData: false,
        dataType: 'json',
        success: function (datax) {
            display_notify(datax.typeinfo, datax.msg);
            $("#divh").hide();
            $("#divh").attr("style", "display: none;");
            $("#main_view").attr("style", "display: block;");
            if (datax.typeinfo == "Success") {
                setTimeout("reload('" + datax.base + "');", 1000);
            }
        }
    });
}

function reload(base) {
    if (tipo > 0) {
        location.href = base + 'Permisos_Colaborador';
    } else {
        location.href = base + 'Permisos';
    }
}

function canceled(id) {
    dataString = "id=" + id;
    swal({
            title: "Esta seguro que desea cancelar esta solicitud?",
            text: "Usted no podra deshacer este cambio",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Si, Continuar",
            cancelButtonText: "No, Cerrar",
            closeOnConfirm: true
        },
        function () {
            $.ajax({
                type: "POST",
                url: url+"cancelar_solicitud",
                data: dataString,
                dataType: 'json',
                success: function (datax) {
                    display_notify(datax.typeinfo, datax.msg);
                    if (datax.typeinfo == "Success") {
                        setTimeout("reload('" + datax.base + "');", 1500);
                    }
                }
            });
        });
}

function aproved(id) {
    dataString = "id=" + id;
    swal({
            title: "Esta seguro que desea aprobar esta solicitud?",
            text: "Usted no podra deshacer este cambio",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Si, Continuar",
            cancelButtonText: "No, Cerrar",
            closeOnConfirm: true
        },
        function () {
            $.ajax({
                type: "POST",
                url: base_url+"Permisos_Colaborador/aprobar_solicitud",
                data: dataString,
                dataType: 'json',
                success: function (datax) {
                    display_notify(datax.typeinfo, datax.msg);
                    if (datax.typeinfo == "Success") {
                        setTimeout("reload('" + datax.base + "');", 1500);
                    }
                }
            });
        });
}

function denied(id) {
    dataString = "id=" + id;
    swal({
        title: "Justificación!",
        //text: "Escriba Observación:",
        type: "input",
        showCancelButton: true,
        confirmButtonText: 'Continuar',
        closeOnConfirm: false,
        inputPlaceholder: "Observación"
    }, function (sms) {
        if (sms === false) return false;
        if (sms === "") {
            swal.showInputError("Por favor ingrese la justificación para denegar la solicitud!");
            return false
        }
        $.ajax({
            type: "POST",
            url: base_url+"Permisos_Colaborador/denegar_solicitud",
            data: dataString,
            dataType: 'json',
            success: function (datax) {
                display_notify(datax.typeinfo, datax.msg);
                if (datax.typeinfo == "Success") {
                    setTimeout("reload('" + datax.base + "');", 1500);
                }
            }
        });
    });
}
