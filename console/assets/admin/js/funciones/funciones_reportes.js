$(document).ready(function () {
	$('.select').select2();
	$("#gerencia").change(function()
    {
     	$("#coordinacion *").remove();
     	$("#select2-coordinacion-container").text("");
     	var ajaxdata = { "id_gerencia": $("#gerencia").val() };
        $.ajax({
          	url:"coordinacion",
          	type: "POST",
          	data: ajaxdata,
          	success: function(opciones)
          	{
    			$("#select2-coordinacion-container").text("Seleccione");
    	        $("#coordinacion").html(opciones);
    	        $("#coordinacion").val("");
        	}
        })
    });
});
