<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<section >
	<div class="container">
		<div class="row justify-content-center">

			<div class="col-lg-6">

				<div class="common-block">

					<div class="inner-title">
						<h4 class="no-margin-bottom">Confirmar correo electronico</h4>
					</div>
					<div class="row">

						<div class="col-sm-12 mb-2">
							<?php if($response=="valido"): ?>
								<div class="alert alert-success">
									<strong>Exito!</strong><br>
									Cuenta confirmada correctamente
								</div>
							<?php elseif ($response =="invalido"):?>
								<div class="alert alert-danger">
									<strong>Incorrecto!</strong><br>
									Error el confirmar su cuenta
								</div>
							<?php endif;?>
						</div>

					</div>
					<a class="butn-style2 margin-20px-top" href="<?=base_url("login")?>">Iniciar Sesin</a>
				</div>

			</div>

		</div>
	</div>
</section>
