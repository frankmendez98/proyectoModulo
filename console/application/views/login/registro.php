<?php

?>
<section class="page-title-section bg-img cover-background" data-background="<?=base_url("assets/img/bg/page-title.jpg")?>"
		 style="background-image: url(assets/img/bg/page-title.jpg);">
	<div class="container">

		<div class="title-info">
			<h1>Registro</h1></div>
		<div class="breadcrumbs-info">
			<ul>
				<li><a href="<?=base_url("")?>">Inicio</a></li>
				<li><a href="<?=base_url("login")?>">Registro</a></li>
			</ul>
		</div>

	</div>
</section>

<section>
	<div class="container">
		<div class="row">
			<div class="col-lg-3"></div>
			<div class="col-lg-6">

				<div class="common-block">

					<div class="inner-title">
						<h4 class="no-margin-bottom">Registro</h4>
						<p class="no-margin-bottom">Ingresa los datos que se te piden a continuacion.</p>
					</div>
					<form id="form_register" data-parsley-validate>

						<div class="row" >

							<div class="col-sm-6 mb-2">

								<div class="form-group">
									<label>Nombre</label>
									<input type="text" class="form-control" name="name" placeholder="Ingresa tu nombre" required data-parsley-trigger="change">
								</div>

							</div>
							<div class="col-sm-6 mb-2">
								<div class="form-group">
									<label>Apellido</label>
									<input type="text" class="form-control" name="lastn" placeholder="Ingresa tu apellido" autocomplete="last_name" required data-parsley-trigger="change">
								</div>
							</div>

						</div>
						<div class="row">
							<div class="col-sm-12 mb-2">
								<div class="form-group">
									<label>Correo Eléctronico</label>
									<input type="text" class="form-control" name="email" placeholder="Ingresa tu correo" autocomplete="username" required data-parsley-trigger="change">
								</div>
							</div>
						</div>

						<div class="row">

							<div class="col-sm-6 mb-2">

								<div class="form-group">
									<label>Contraseña</label>
									<input type="password" class="form-control" name="password" id="password_register" placeholder="Ingresa tu contraseña" autocomplete="new-password" required data-parsley-trigger="change">
								</div>

							</div>

							<div class="col-sm-6 mb-2">

								<div class="form-group">
									<label>Repite tu Contraseña</label>
									<input type="password" class="form-control" name="re-password" placeholder="Repite tu contraseña" autocomplete="new-password"
										   required data-parsley-trigger="change" data-parsley-equalto="#password_register">
								</div>

							</div>

						</div>
						<input type="hidden" id="get_csrf_hash" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" />
						<button type="submit" class="butn-style2 margin-20px-top">Regitrarse</button>

					</form>

				</div>
			</div>
			<div class="col-lg-3"></div>
			

		</div>
	</div>
</section>
