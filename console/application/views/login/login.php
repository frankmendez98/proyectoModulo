<?php

?>
<section class="page-title-section bg-img cover-background" data-background="<?=base_url("assets/img/bg/page-title.jpg")?>"
		 style="background-image: url(assets/img/bg/page-title.jpg);">
	<div class="container">

		<div class="title-info">
			<h1>Iniciar Sesión</h1></div>
		<div class="breadcrumbs-info">
			<ul>
				<li><a href="<?=base_url("")?>">Inicio</a></li>
				<li><a href="<?=base_url("login")?>">Iniciar Sesión</a></li>
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
						<h4 class="no-margin-bottom">Iniciar Sesión</h4>
						<!--<p class="no-margin-bottom">Ingresa tus credenciales.</p>-->
					</div>

					<form id="form_login" data-parsley-validate>

						<div class="row">

							<div class="col-sm-12 mb-2">

								<div class="form-group">
									<label>Correo Eléctronico</label>
									<input type="email" class="form-control" name="email" placeholder="Ingresa tu correo" autocomplete="email"
										   required data-parsley-trigger="change">
								</div>

							</div>

							<div class="col-sm-12 mb-2">

								<div class="form-group">
									<label>Contraseña </label>
									<input type="password" class="form-control" name="password" placeholder="Ingresa tu contraseña" autocomplete="current-password"
										   required data-parsley-trigger="change">
								</div>

							</div>

						</div>

						<div class="row">
							<div class="col-sm-6 text-left text-sm-left">
								<u><a href="<?=base_url("login/forget")?>" class="m-link-muted">Olvidaste tu contraseña?</a></u>
							</div>
							<div class="col-sm-6 text-left text-sm-right">
								<u><a href="<?=base_url("login/registro")?>" class="m-link-muted">No tienes cuenta? Registrate!</a></u>
							</div>

						</div>
						<button type="submit" class="butn-style2 margin-20px-top">Ingresar</button>
						<input type="hidden" id="get_csrf_hash" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" />

					</form>

				</div>

			</div>
			<div class="col-lg-3"></div>

		</div>
	</div>
</section>
