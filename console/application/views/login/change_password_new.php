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
					<?php if($response=="valido"): ?>

						<form data-parsley-validate id="form_new_password">

							<div class="row">

								<div class="col-sm-12 mb-2">

									<div class="form-group">
										<label>Nueva Contraseña</label>
										<input type="password" class="form-control" name="password_new" id="password_new" required>
									</div>
									<div class="form-group">
										<label>Repite tu Contraseña</label>
										<input type="password" class="form-control" id="re_password" required data-parsley-equalto="#password_new">
									</div>

								</div>

							</div>
							<input type="hidden" name="id_usuario" value="<?=$id_usuario?>">
							<button type="submit" class="butn-style2 margin-20px-top">Enviar</button>
							<input type="hidden" id="get_csrf_hash" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" />

						</form>
					<?php else: ?>
						<div class="row">

							<div class="col-sm-12 mb-2">
								<div class="alert alert-danger">
									<strong>Error!</strong><br>
									Error en el cambio de contraseña!.
								</div>
							</div>

						</div>

					<?php endif; ?>
				</div>

			</div>

		</div>
	</div>
</section>
