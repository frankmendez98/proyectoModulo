<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<div class="wrapper wrapper-content">
	<div class="row">
		<div class="col-lg-12">
			<div class="ibox" id="main_view">
				<div class="ibox-title">
					<h3 class="text-navy"><b><i class="fa fa-plus-circle"></i> Editar Sub Categoria</b></h3>
				</div>
				<div class="ibox-content">
					<form id="form_edit" novalidate>
						<div class="row">
							<div class="col-lg-6">
								<div class="form-group single-line">
									<label for="nombre">Nombre</label>
									<input type="hidden" name="cat" id="cat" value="<?=$cat?>">
									<input type="text" name="nombre" id="nombre" class="form-control mayu"  placeholder="Ingrese un nombre" value="<?=$row->nombre_cat?>"
										   required data-parsley-trigger="change">
								</div>
							</div>
							<div class="col-lg-6">
								<div class="form-group single-line">
									<label for="descripcion">Descripcion</label>
									<input type="text" name="descripcion" id="descripcion" class="form-control mayu"  placeholder="Ingrese una descripcion" value="<?=$row->descripcion?>"
										   required data-parsley-trigger="change">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-12">
								<div class="mt-3">
									<label for="foto">Foto de la categoria</label>
									<input type="file" id="foto" name="foto" class="dropify" accept="image/*" data-default-file="<?=base_url("assets/").$row->imagen?>"/>
									<p class="text-muted text-center mt-2 mb-0">Agrega foto de la categoria</p>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="form-actions col-lg-12">
								<input type="hidden" name="id_subcategoria" value="<?=$row->id_subcategoria?>">
								<button type="submit" id="btn_edit" name="btn_add" class="btn btn-primary m-t-n-xs pull-right"><i class="fa fa-save"></i>
									Guardar Registro
								</button>
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
