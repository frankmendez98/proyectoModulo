<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<section >
	<div class="container">
		<div class="row justify-content-center">

			<div class="col-lg-6">

				<div class="common-block">

					<div class="inner-title">
						<h4 class="no-margin-bottom">Cuenta creada!</h4>
					</div>


					<div class="row">

						<div class="col-sm-12 mb-2">
							<div class="alert alert-success">
								<strong>Exito!</strong><br>
								Tu cuenta ha sido creada, pero debes verificar tu <strong>correo electronico</strong>, revisa tu carpeta de spam o ingresa el codigo recibido aqui.
							</div>
							<div class="form-group">
								<input type="text" class="form-control" name="codigo" id="codigo" placeholder="">
							</div>
						</div>

					</div>

					<a class="butn-style2 margin-20px-top" id="val_code">Validar</a>
					<a class="butn-style2  margin-20px-top" href="<?=base_url("")?>">Salir</a>

				</div>

			</div>

		</div>
	</div>
</section>
