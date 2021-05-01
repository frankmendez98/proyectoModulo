let url = base_url+"admin/edicion_pagina";

$(document).ready(function () {

	$("#form_edit").on('submit', function(e){
		e.preventDefault();
		$(this).parsley().validate();
		if ($(this).parsley().isValid()){
			edit_data();
		}
	});
});

function edit_data() {
	var form = $("#form_edit");
	var formdata = false;
	if (window.FormData) {
		formdata = new FormData(form[0]);
	}
	notification("Warning", "Advertencia", "Espere un momento, subiendo imagenes");

	$.ajax({
		type: 'POST',
		url: url+'/cambios',
		cache: false,
		data: formdata ? formdata : form.serialize(),
		contentType: false,
		processData: false,
		dataType: 'json',
		success: function (datax) {
			notification(datax.type, datax.title,datax.msg);
			if (datax.type == "success") {
				setTimeout("reload();", 1000);
			}
		}
	});
}

function reload() {
	location.href = url;
}
