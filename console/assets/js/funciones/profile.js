$(document).ready(function () {

	let token = $("#get_csrf_hash").val();

	$("#form_perfil").on('submit', function (e) {
		e.preventDefault();
		$(this).parsley().validate();
		if ($(this).parsley().isValid()) {
			save_data();
		}
	});
	$("#change_pass").on('submit', function (e) {
		e.preventDefault();
		$(this).parsley().validate();
		if ($(this).parsley().isValid()) {
			change_pass();
		}
	});

	$('.select2').select2();
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

function save_data(){
	let form = $("#form_perfil");
	let formdata = false;
	if (window.FormData) {
		formdata = new FormData(form[0]);
	}
	$.ajax({
		type: 'POST',
		url: base_url+'perfil/store',
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

function change_pass(){
	let form = $("#change_pass");
	let formdata = false;
	if (window.FormData) {
		formdata = new FormData(form[0]);
	}
	$.ajax({
		type: 'POST',
		url: base_url+'cambiarcontra/store',
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
	location.href = base_url+"perfil";
}
