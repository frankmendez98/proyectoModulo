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
						<h4 class="no-margin-bottom">Mi Perfil</h4>
						<p class="no-margin-bottom">Edita los datos y guarda los cambios.</p>
					</div>

					<form id="form_perfil" data-parsley-validate>
						<div class="row">

							<div class="col-sm-6 mb-2">

								<div class="form-group">
									<label>Nombre</label>
									<input type="text" class="form-control" name="nombre" value="<?=$row->nombre?>" required data-parsley-trigger="change">
								</div>

							</div>

							<div class="col-sm-6 mb-2">

								<div class="form-group">
									<label>Apellido</label>
									<input type="text" class="form-control" name="apellido" value="<?=$row->apellido?>" required data-parsley-trigger="change">
								</div>

							</div>

						</div>

						<div class="row">

							<div class="col-sm-12 mb-2">

								<div class="form-group">
									<label>Correo Eléctronico</label>
									<input type="text" class="form-control" value="<?=$row->correo?>" readonly>
								</div>

							</div>
						</div>
						<div class="row">
							<div class="col-sm-6 mb-2">

								<div class="form-group">
									<label>Teléfono</label>
									<input type="text" class="form-control" name="telefono" value="<?=$row->telefono?>" required data-parsley-trigger="change">
								</div>

							</div>
							<div class="col-sm-6 mb-2">

								<div class="form-group">
									<label>Dirección</label>
									<input type="text" class="form-control" name="direccion" value="<?=$row->direccion?>" required data-parsley-trigger="change">
								</div>

							</div>

						</div>

						<div class="row">

							<div class="col-sm-6 mb-2">

								<div class="form-group">
									<label>Departamento</label>
									<select name="id_departamento" id="id_departamento" class="form-control select2" required data-parsley-trigger="change">
										<?php foreach ($departamentos as $dep): ?>
											<option value="<?=$dep->id_departamento?>"
													<?php if ($dep->id_departamento==$row->id_departamento): ?>
														selected
													<?php endif; ?>
											> <?= $dep->nombre_departamento ?> </option>
										<?php endforeach; ?>
									</select>
								</div>

							</div>

							<div class="col-sm-6 mb-2">

								<div class="form-group">
									<label>Municipio</label>
									<select name="id_municipio" id="id_municipio" class="form-control select2" required data-parsley-trigger="change">
										<?php foreach ($municipios as $mun): ?>
											<option value="<?=$mun->id_municipio?>"
													<?php if ($mun->id_municipio==$row->id_municipio): ?>
														selected
													<?php endif; ?>
											> <?= $mun->nombre_municipio ?> </option>
										<?php endforeach; ?>
									</select>
								</div>

							</div>

						</div>
						<input type="hidden" id="get_csrf_hash" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" />
						<input type="hidden"  name="id_usuario" value="<?=$id_usuario?>" />
						<button type="submit" class="butn-style2 margin-20px-top">Actualizar Datos</button>

					</form>

				</div>

			</div>
			<!-- end right panel -->
		</div>
	</div>
</section>
