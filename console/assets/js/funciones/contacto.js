$(document).ready(function () {

	$("#form_contact").on('submit', function (e) {
		e.preventDefault();
		$(this).parsley().validate();
		if ($(this).parsley().isValid()) {
			save_data();
		}
	});

});

function save_data(){
	let form = $("#form_contact");
	let formdata = false;
	if (window.FormData) {
		formdata = new FormData(form[0]);
	}
	$.ajax({
		type: 'POST',
		url: base_url+'contacto/enviar',
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
	location.href = base_url+"contacto";
}
