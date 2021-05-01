<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<section>
	<div class="container">
		<div class="row justify-content-center">

			<!-- start left panel -->
			<?=$dash?>
			<!-- end left panel -->

			<!-- start right panel -->
			<div class="col-lg-8">

				<div class="common-block">

					<div class="inner-title">
						<h4 class="no-margin-bottom">Cambiar Contraseña</h4>
					</div>
					<form id="change_pass" data-parsley-validate>
						<div class="row">
							<div class="col-sm-12 mb-2">
								<div class="form-group">
									<label>Antigua Contraseña</label>
									<input type="password" class="form-control" name="old_pass" required data-parsley-trigger="change">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-12 mb-2">
								<div class="form-group">
									<label>Nueva Contraseña</label>
									<input type="password" class="form-control" name="new_pass" id="new_pass" required data-parsley-trigger="change">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-12 mb-2">
								<div class="form-group">
									<label>Repetir Contraseña</label>
									<input type="password" class="form-control" name="re_pass" required data-parsley-trigger="change" data-parsley-equalto="#new_pass">
								</div>
							</div>
						</div>
						<input type="hidden"  name="id_usuario" value="<?=$id_usuario?>" />
						<button type="submit" class="butn-style2 margin-20px-top">Actualizar Datos</button>
					</form>
				</div>

			</div>
			<!-- end right panel -->
		</div>
	</div>
</section>
