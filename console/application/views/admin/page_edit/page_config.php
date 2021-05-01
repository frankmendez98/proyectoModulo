<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<div class="wrapper wrapper-content  animated fadeInRight">
	<div class="row">
		<div class="col-lg-12">
			<div class="ibox" id="main_view">
				<div class="ibox-title">
					<h3 class="text-navy"><b><i class="fa fa-pencil"></i> Editar informacion de sitio web</b></h3>
				</div>
				<div class="ibox-content">
					<form id="form_edit" data-parsley-validate>
						<div class="row">
							<div class="col-lg-6">
								<div class="form-group single-line">
									<label for="nombre">Nombre Empresa</label>
									<input type="text" name="nombre" id="nombre" class="form-control"  required data-parsley-trigger="change" value="<?=$row->nombre?>">
								</div>
							</div>
							<div class="col-lg-6">
								<div class="form-group single-line">
									<label for="telefono">Telefono</label>
									<input type="text" name="telefono" id="telefono" class="form-control" required data-parsley-trigger="change" value="<?=$row->telefono?>">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-6">
								<div class="form-group single-line">
									<label for="correo">Correo de Informacion</label>
									<input type="text" name="correo" id="correo" class="form-control"  required data-parsley-trigger="change" value="<?=$row->correo?>">
								</div>
							</div>
							<div class="col-lg-6">
								<div class="form-group single-line">
									<label for="correo_remitente">Correo Remitente en Contacto</label>
									<input type="text" name="correo_remitente" id="correo_remitente" class="form-control" required data-parsley-trigger="change" value="<?=$row->correo_remitente?>">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-4">
								<div class="form-group single-line">
									<label for="facebook">Facebook</label>
									<input type="text" name="facebook" id="facebook" class="form-control" value="<?=$row->facebook?>">
								</div>
							</div>
							<div class="col-lg-4">
								<div class="form-group single-line">
									<label for="twitter">Twitter</label>
									<input type="text" name="twitter" id="twitter" class="form-control" value="<?=$row->twitter?>">
								</div>
							</div>
							<div class="col-lg-4">
								<div class="form-group single-line">
									<label for="instagram">Instagram</label>
									<input type="text" name="instagram" id="instagram" class="form-control" value="<?=$row->instagram?>" >
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-6">
								<div class="mt-3">
									<label for="logo">Logo del sitio web</label>
									<input type="file" id="logo" name="logo" class="dropify" accept="image/*" data-default-file="<?=base_url($row->logo)?>"/>
									<p class="text-muted text-center mt-2 mb-0">Logo del sitio web</p>
								</div>
							</div>
							<div class="col-lg-6">
								<div class="mt-3">
									<label for="bienvenida">Foto de Bienvenida</label>
									<input type="file" id="bienvenida" name="bienvenida" class="dropify" accept="image/*" data-default-file="<?=base_url($row->imagen)?>"/>
									<p class="text-muted text-center mt-2 mb-0">Foto de Bienvenida</p>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="form-actions col-lg-12">
								<button type="submit" id="btn_edit" class="btn btn-primary m-t-n-xs pull-right"><i class="fa fa-save"></i> Guardar Cambios</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
	$(".dropify").dropify({
		messages: {
			default: "Arrastra una imagen o click aqui",
			replace: "Arrastra y suelta, o click para reemplazar",
			remove: "Remover",
			error: "Ooops, algo salio mal."
		},
		error: {
			fileSize: "El archivo es muy grande(1M max)."
		}
	});
</script>
