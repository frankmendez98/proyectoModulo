<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<section class="page-title-section bg-img cover-background" data-background="assets/img/bg/bg.jpg"
		 style="background-image: url(assets/img/bg/page-title.jpg);">
	<div class="container">

		<div class="title-info">
			<h1>Contacto</h1></div>
		<div class="breadcrumbs-info">
			<ul>
				<li><a href="<?= base_url("") ?>">Inicio</a></li>
				<li><a href="<?= base_url("contacto") ?>">Contacto</a></li>
			</ul>
		</div>

	</div>
</section>

<!--<div class="container  margin-20px-top">
	<div class="row">

		<div class="col-md-4 xs-margin-20px-bottom">
			<div class="contact-info rounded h-100">
				<div class="contact-icon">
					<i class="ti-mobile"></i>
				</div>
				<h5 class="font-size16 sm-font-size14 font-weight-500 margin-10px-bottom">Teléfonos</h5>
				<ul class="no-margin-bottom">
					<li><a href="contact-us.html#!">(+44) 123 456 789</a></li>
					<li><a href="contact-us.html#!">(+44) 987 654 321</a></li>
				</ul>
			</div>
		</div>
		<div class="col-md-4 xs-margin-20px-bottom">
			<div class="contact-info rounded h-100">
				<div class="contact-icon">
					<i class="ti-location-pin"></i>
				</div>
				<h5 class="font-size16 sm-font-size14 font-weight-500 margin-10px-bottom">Localización</h5>
				<p class="no-margin-bottom">3389 Eglinton Avenue,
					<br> Windermere, London, SK 8GH.</p>
			</div>
		</div>
		<div class="col-md-4">
			<div class="contact-info rounded h-100">
				<div class="contact-icon">
					<i class="ti-email"></i>
				</div>
				<h5 class="font-size16 sm-font-size14 font-weight-500 margin-10px-bottom">Correo Eléctronicos</h5>
				<ul class="no-margin-bottom">
					<li><a href="contact-us.html#!">addyour@emailhere</a></li>
					<li><a href="contact-us.html#!">email@youradress.com</a></li>
				</ul>
			</div>
		</div>

	</div>
</div>-->

<section>
	<div class="container">


		<div class="text-center margin-40px-bottom sm-margin-35px-bottom">
			<h3 class="no-margin-bottom">Escríbenos</h3>
			<p>¿Tienes alguna pregunta? Estamos aquí para ayudar. Envíenos un mensaje y nos pondremos en contacto.</p>
		</div>

		<div class="row">
			<div class="col-lg-10 center-col">

				<form data-parsley-validate id="form_contact">

					<div class="row">

						<div class="col-sm-6 mb-2">
							<div class="form-group">
								<label>Nombre</label>
								<input type="text" class="form-control" name="nombre" placeholder="Ingresa tu nombre" required data-parsley-trigger="change">
							</div>
						</div>

						<div class="col-sm-6 mb-2">
							<div class="form-group">
								<label>Correo Eléctronico</label>
								<input type="email" class="form-control" name="email" placeholder="Ingresa tu correo electronico" required data-parsley-trigger="change">
							</div>
						</div>

					</div>

					<div class="row">

						<div class="col-sm-6 mb-2">
							<div class="form-group">
								<label>Título</label>
								<input type="text" class="form-control" name="titulo" placeholder="Titulo del mensaje" required data-parsley-trigger="change">
							</div>
						</div>

						<div class="col-sm-6 mb-2">
							<div class="form-group">
								<label>Télefono</label>
								<input type="text" class="form-control" name="telefono" placeholder="0000-0000" required data-parsley-trigger="change">
							</div>
						</div>

					</div>

					<div class="row">

						<div class="col-12 mb-4">
							<label>Mensaje</label>
							<div class="form-group mb-1">
								<textarea rows="3" class="form-control" name="mensaje" placeholder="Escribe tu sugerencia duda o pregunta..." required data-parsley-trigger="change"></textarea>
							</div>
						</div>

					</div>

					<button type="submit" class="butn-style2">Enviar</button>

				</form>

			</div>
		</div>
	</div>
</section>
