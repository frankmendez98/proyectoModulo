<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<section >
	<div class="container">
		<div class="row justify-content-center">

			<div class="col-lg-6">

				<div class="common-block">

					<div class="inner-title">
						<h4 class="no-margin-bottom">Cambiar Contraseña</h4>
					</div>

					<form data-parsley-validate id="form_change_password">

						<div class="row">

							<div class="col-sm-12 mb-2">

								<div class="form-group">
									<label>Ingresa tu correo eléctronico</label>
									<input type="email" class="form-control" name="email" placeholder="correo@example.com" required>
									<small>Si no te aparece revisa tu carpeta de spam</small>
								</div>

							</div>

						</div>
						<input type="hidden" id="get_csrf_hash" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" />
						<button type="submit" class="butn-style2 margin-20px-top">Enviar</button>

					</form>

				</div>

			</div>

		</div>
	</div>
</section>
