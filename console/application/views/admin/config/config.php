<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<div class="wrapper wrapper-content  animated fadeInRight">
	<div class="row">
		<div class="col-lg-12">
			<div class="ibox" id="main_view">
				<div class="ibox-title">
					<h3 class="text-navy"><b><i class="fa fa-pencil"></i> <?= $titulo; ?></b></h3>
				</div>
				<div class="ibox-content">
					<form name="formulario" id="formulario" novalidate="novalidate">
						<div class="row">
							<div class="form-group col-lg-6"><label for="">Nombre Empresa</label>
								<input name="nombre" id="nombre" class="form-control" placeholder="Ingrese el nombre de la empresa" value="<?= $nombre_empresa ?>" type="text">
							</div>
							<div class="form-group col-lg-6"><label for="">Direccion</label>
								<input name="direccion" id="direccion" class="form-control" placeholder="Ingrese la direccion de la empresa" value="<?= $direccion_empresa ?>" type="text">
							</div>
						</div>
						<div class="row">
							<div class="form-group col-lg-4"><label for="">Telefono</label>
								<input name="telefono" id="telefono" class="form-control" placeholder="Ingrese el telefono de la empresa" value="<?= $telefono_empresa ?>" type="text"></div>
							<div class="form-group col-lg-4"><label for="">Correo Electronico</label>
								<input name="email" id="email" class="form-control" placeholder="Ingrese el Correo electronico de la empresa" value="<?= $correo_empresa ?>" type="text"></div>
							<div class="form-group col-lg-4"><label for="">Pagina Web</label>
								<input name="web" id="web" class="form-control" placeholder="Ingrese la pagina web de la empresa" value="<?= $web_empresa ?>" type="text"></div>
						</div>
						<div class="row">
							<div class="col-lg-12">
								<label for="logo">Imagen principal</label>
								<input type="file" id="logo" name="logo" class="dropify" accept="image/*" data-default-file="<?php if($logo_empresa!="") echo base_url($logo_empresa)?>"/>
							</div>
						</div>
						<div class="row">
							<div class="form-actions col-lg-12">
								<button type="submit" id="btn_edit" name="btn_edit" class="btn btn-primary m-t-n-xs pull-right"><i class="fa fa-save"></i> Guardar Cambios</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<script src="<?= base_url(); ?>assets/admin/js/funciones/<?= $urljs; ?>"></script>
