<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<div class="wrapper wrapper-content">
	<div class="row">
		<div class="col-lg-12">
			<div class="ibox" id="main_view">
				<div class="ibox-title">
					<h3 class="text-navy"><b><i class="fa fa-plus-circle"></i> Editar Usuario</b></h3>
				</div>
				<div class="ibox-content">
					<form id="form_edit" novalidate>
						<div class="row">
							<div class="col-lg-6">
								<div class="form-group single-line">
									<label for="nombre">Nombre</label>
									<input type="text" name="nombre" id="nombre" class="form-control"  placeholder="Ingrese un nombre"
										   required data-parsley-trigger="change" value="<?=$row->nombre?>">
								</div>
							</div>
							<div class="col-lg-6">
								<div class="form-group single-line">
									<label for="">Tipo de Usuario</label><br>
									<label class="radio-inline"><input type="radio" name="tipo_usuario" id="tipo_usuario1" value="1" <?php if($row->admin==1) echo "checked"; ?>>Administrador</label>
									<label class="radio-inline"><input type="radio" name="tipo_usuario" id="tipo_usuario2" value="0" <?php if($row->admin==0) echo "checked"; ?>>Usuario normal</label>
								</div>
							</div>

						</div>
						<div class="row">
							<div class="col-lg-6">
								<div class="form-group single-line">
									<label for="usuario">Usuario</label>
									<input type="text" name="usuario" id="usuario" class="form-control"  placeholder="Ingrese un usuario"
										   required data-parsley-trigger="change" value="<?=$row->usuario?>">
								</div>
							</div>
							<div class="col-lg-6">
								<div class="form-group single-line">
									<label for="password">Contraseña</label>
									<input type="password" name="password" id="password" class="form-control"  placeholder="Ingrese una contraseña"
										   required data-parsley-trigger="change" value="<?=$password?>">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="form-actions col-lg-12">
								<button type="submit" id="btn_edit" name="btn_edit" class="btn btn-primary m-t-n-xs pull-right"><i class="fa fa-save"></i>
									Guardar Registro
								</button>
								<input type="hidden" name="id_usuario" value="<?=$row->id_usuario?>">
							</div>
						</div>
					</form>
				</div>

			</div>
			<div class="ibox" style="display: none;" id="divh">
				<div class="row">
					<div class="col-lg-12">
						<div class="ibox float-e-margins">
							<div class="ibox-content text-center">
								<h2 class="text-danger blink_me">Espere un momento, procesando su solicitud!</h2>
								<section class="sect">
									<div id="loader">
									</div>
								</section>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script src="<?= base_url(); ?>assets/admin/js/funciones/<?=$urljs; ?>"></script>
