<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<div class="wrapper wrapper-content">
	<div class="row">
		<div class="col-lg-12">
			<div class="ibox">
				<div class="ibox-title">
					<h3 class="text-navy"><b><i class="fa fa-edit"></i> Editar Sucursal</b></h3>
				</div>
				<div class="ibox-content">
					<form id="form_edit" novalidate>
						<div class="row">
							<div class="col-lg-12">
								<div class="form-group single-line">
									<label for="nombre">Nombre</label>
									<input type="text" name="nombre" id="nombre" class="form-control"  placeholder="Ingrese un nombre" value="<?=$row->descripcion?>"
										   required data-parsley-trigger="change">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-6">
								<div class="form-group single-line">
									<label for="direccion">Direccion</label>
									<input type="text" name="direccion" id="direccion" class="form-control"  placeholder="Ingrese una direccion" value="<?=$row->direccion?>"
										   required data-parsley-trigger="change">
								</div>
							</div>
							<div class="col-lg-3">
								<div class="form-group single-line">
									<label for="telefono">Telefono</label>
									<input type="text" name="telefono" id="telefono" class="form-control"  placeholder="Ingrese un telefono" value="<?=$row->telefono1?>"
										   required data-parsley-trigger="change">
								</div>
							</div>
							<div class="col-lg-3">
								<div class="form-group single-line">
									<label for="whatsapp">WhatsApp</label>
									<input type="text" name="whatsapp" id="whatsapp" class="form-control"  placeholder="Ingrese un para whatsapp" value="<?=$row->whatsapp?>"
										   required data-parsley-trigger="change">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="form-actions col-lg-12">
								<button type="submit" id="btn_edit" name="btn_edit" class="btn btn-primary m-t-n-xs pull-right"><i class="fa fa-save"></i>
									Guardar Registro
								</button>
								<input value="<?=$row->id_sucursal?>" type="hidden" name="id_sucursal">
							</div>
						</div>
					</form>
				</div>

			</div>

		</div>
	</div>
</div>
<?php if (isset($urljs)): ?>
	<script src="<?= base_url(); ?>assets/admin/js/funciones/<?=$urljs; ?>"></script>
<?php endif; ?>
