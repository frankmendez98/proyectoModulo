$(document).ready(function () {


	$("#form_login").on('submit', function(e){
		e.preventDefault();
		$(this).parsley().validate();
		if ($(this).parsley().isValid()){
			login();
		}
	});
	$("#form_register").on('submit', function(e){

		e.preventDefault();
		$(this).parsley().validate();
		if ($(this).parsley().isValid()){
			registro();
		}
	});

	$("#form_confirm").on('submit', function(e){

		e.preventDefault();
		$(this).parsley().validate();
		if ($(this).parsley().isValid()){
			confirm_email();
		}
	});
	$("#form_change_password").on('submit', function(e){

		e.preventDefault();
		$(this).parsley().validate();
		if ($(this).parsley().isValid()){
			change_password();
		}
	});
	$("#form_new_password").on('submit', function(e){

		e.preventDefault();
		$(this).parsley().validate();
		if ($(this).parsley().isValid()){
			new_password();
		}
	});

});



function login(){
	let form = $("#form_login");
	let formdata = false;
	if (window.FormData) {
		formdata = new FormData(form[0]);
	}
	$.ajax({
		type: 'POST',
		url: base_url+'login/login',
		cache: false,
		data: formdata ? formdata : form.serialize(),
		contentType: false,
		processData: false,
		dataType: 'json',
		success: function (data) {
			notification(data.type,data.title,data.message);
			if (data.type == "success")
			{
				if(data.cart)
				{
					let aviso = "Seguir comprando o ir al Pago ";
					//setTimeout("reload();", 1500);
						swal({
							title: "Aviso",
							text: aviso,
							type: "warning",
							showCancelButton: true,
							confirmButtonClass: "btn-danger",
							confirmButtonText: "Continuar al Pago",
							cancelButtonText: "Ir a Catalogo",
							closeOnConfirm: true,
							closeOnCancel: true
						},
						function (isConfirm) {
							if (isConfirm) {
								window.location = base_url + 'checkout/';
							}else{
								window.location = base_url + 'catalogo/';
								}
						});
					}
					else {
						window.location = base_url + 'catalogo/';
					}
			}
		}
	});
}

function registro(){
	let form = $("#form_register");
	let formdata = false;
	if (window.FormData) {
		formdata = new FormData(form[0]);
	}
	$.ajax({
		type: 'POST',
		url: base_url+'login/register',
		cache: false,
		data: formdata ? formdata : form.serialize(),
		contentType: false,
		processData: false,
		dataType: 'json',
		success: function (data) {
			notification(data.type,data.title,data.message);
			if (data.type == "success") {
				setTimeout("reload_login();", 1500);
			}
		}
	});
}

function confirm_email(){
	let form = $("#form_confirm");
	let formdata = false;
	if (window.FormData) {
		formdata = new FormData(form[0]);
	}
	$.ajax({
		type: 'POST',
		url: base_url+'login/confirmar',
		cache: false,
		data: formdata ? formdata : form.serialize(),
		contentType: false,
		processData: false,
		dataType: 'json',
		success: function (data) {
			notification(data.type,data.title,data.message);
			if (data.type == "success") {
				setTimeout("reload_login();", 1500);

			}
		}
	});
}

function change_password(){
	let form = $("#form_change_password");
	let formdata = false;
	if (window.FormData) {
		formdata = new FormData(form[0]);
	}
	$.ajax({
		type: 'POST',
		url: base_url+'login/forget',
		cache: false,
		data: formdata ? formdata : form.serialize(),
		contentType: false,
		processData: false,
		dataType: 'json',
		success: function (data) {
			notification(data.type,data.title,data.message);
			if (data.type == "success") {
				setTimeout("location.href = base_url+\"login/change_password_send\";", 1500);
			}
		}
	});
}
function new_password(){
	let form = $("#form_new_password");
	let formdata = false;
	if (window.FormData) {
		formdata = new FormData(form[0]);
	}
	$.ajax({
		type: 'POST',
		url: base_url+'login/new_password',
		cache: false,
		data: formdata ? formdata : form.serialize(),
		contentType: false,
		processData: false,
		dataType: 'json',
		success: function (data) {
			notification(data.type,data.title,data.message);
			if (data.type == "success") {
				setTimeout("location.href = base_url+\"login/change_password_success\";", 1500);
			}
		}
	});
}

function reload() {
	location.href = base_url+"home";
}

function reload_login() {
	location.href = base_url+"login";
}

function reload_registro() {
	location.href = base_url+"login/cuenta_creada";
}
