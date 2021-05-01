<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<div class="wrapper wrapper-content">
	<div class="row">
		<div class="col-lg-12">
			<div class="ibox" id="main_view">
				<div class="ibox-title">
					<h3 class="text-navy"><b><i class="fa fa-plus-circle"></i> Agregar Producto</b></h3>
				</div>
				<div class="ibox-content">
					<form id="form_add" novalidate>
						<div class="row">
							<div class="col-lg-3">
								<div class="form-group single-line">
									<label for="descripcion">Nombre</label>
									<input type="text" name="descripcion_nombre" id="descripcion_nombre" class="form-control mayu"  placeholder="Ingrese una descripcion"
											required data-parsley-trigger="change">
								</div>
							</div>
							<div class="col-lg-3">
								<div class="form-group single-line">
									<label for="marca">Marca</label>
									<input type="text" name="marca" id="marca" class="form-control mayu"  placeholder="Ingrese una marca"
										   required data-parsley-trigger="change">
								</div>
							</div>

							<div class="col-lg-3">
								<div class="form-group single-line">
									<label for="id_categoria">Categoria</label><br>
									<select name="id_categoria" id="id_categoria" class="form-control select2" required data-parsley-trigger="change">
										<?php foreach ($categorias as $row): ?>
											<option value="<?=$row->id_categoria?>"><?=$row->nombre_cat?></option>
										<?php endforeach; ?>
									</select>
								</div>
							</div>
							<div class="col-lg-3">
								<div class="form-group single-line">
									<label for="id_subcategoria">Sub Categoria</label><br>
									<select name="id_subcategoria" id="id_subcategoria" class="form-control select2" data-parsley-trigger="change">
										<?php if ($subcategorias != null): ?>
											<option value="">Seleccione</option>
											<?php foreach ($subcategorias as $sub): ?>
												<option value="<?=$sub->id_subcategoria?>"><?=$sub->nombre_cat?></option>
											<?php endforeach; ?>
										<?php else: ?>
											<option value="">No se encontraron subcategorias</option>
										<?php endif; ?>
									</select>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-3">
								<div class="form-group single-line">
									<label for="precio">Precio</label>
									<input type="text" name="precio" id="precio" class="form-control decimal"  placeholder="Ingrese un precio" required data-parsley-trigger="change">
								</div>
							</div>
							<div class="col-lg-3">
								<div class="form-group single-line">
									<label for="">Tipo de Producto</label><br>
									<label class="radio-inline"><input type="radio" name="tipo_producto" id="tipo_producto1" value="VIRTUAL">VIRTUAL</label>
									<label class="radio-inline"><input type="radio" name="tipo_producto" id="tipo_producto2" value="FISICO" checked>FISICO</label>
								</div>
							</div>
							<div class="col-lg-3 stock" hidden>
								<div class="form-group single-line">
									<label for="">Producto con tallas</label><br>
									<label class="radio-inline"><input type="radio" name="ttalla" id="talla1" checked value="SI">SI</label>
									<label class="radio-inline"><input type="radio" name="ttalla" id="talla2" value="No">No</label>
								</div>
							</div>
						<div class="col-lg-3 ntall stock" hidden>
							<div class="form-group single-line">
								<label for="stock">Stock</label>
								<input type="text" name="stock" id="stock" class="form-control numeric"  placeholder="" data-parsley-trigger="change">
							</div>
						</div>
						</div>
						<!-- <div class="row tallas stock">
								<div class="col-lg-3">
									<div class="form-group single-line">
										<label for="Talla">Talla</label>
										<input type="text" id="talla" class="form-control"  placeholder="" data-parsley-trigger="change">
										<input type="hidden" id="tallas" name="tallas">
									</div>
								</div>
								<div class="col-lg-3">
									<div class="form-group">
										<br>
										<br>
										<button type="button" id="btn_add_tall" class="btn btn-primary m-t-n-xs pull-left"><i class="fa fa-plus"></i>
											Agregar
										</button>
									</div>
								</div>
						</div> -->
						<div class="row tallas stock">
							<div class="col-lg-3">
								<div class="form-group single-line">
									<label for="id_subcategoria">Tipo caracteristica</label><br>
									<select name="tipo_caracteristicas" id="tipo_caracteristicas" class="form-control select2" data-parsley-trigger="change">
										<option value="">Seleccione</option>
										<?php
										  	foreach($tipo as $fila)
												{
										  		$id_tipo = $fila["id_tipo"];
										  		$nombre = $fila["nombre"];
										  		$color = $fila["color"];
													echo '<option value="'.$id_tipo.'" data-id="'.$color.'">'.$nombre.'</option>';
										  	}
										?>
									</select>
									<input type="hidden" name="listas_array" id="listas_array">
								</div>
							</div>
								<div class="col-lg-3">
									<div class="form-group">
										<br>
										<br>
										<button type="button" id="btn_add_tall" class="btn btn-primary m-t-n-xs pull-left"><i class="fa fa-plus"></i>
											Agregar
										</button>
									</div>
								</div>
						</div>
						<div class="row tallas stock caja-compac">
						<!-- <div class="col-lg-3">
							<table class="table table-bordered table-hover table-striped">
								<thead>
									<tr>
										<th class="col-lg-5">Talla</th>
										<th class="col-lg-5">Existencia</th>
										<th class="col-lg-2">Acciones</th>
									</tr>
								</thead>
								<tbody id="tallas_table">

								</tbody>
							</table>
						</div> -->
						</div>
						<div class="row">
							<div class="col-lg-12">
								<div class="form-group single-line">
									<label for="">Descripcion del producto</label>
									<textarea class="form-control" name="desc_larga" rows="3" required data-parsley-trigger="change" placeholder="Ingrese una descripcion"></textarea>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-6">
								<label for="foto">Imagen principal</label>
								<input type="file" id="foto" name="foto" class="dropify" accept="image/*" required data-parsley-trigger="change"/>
							</div>
							<div class="col-lg-6">
								<label for="img2">Imagen 2 del producto</label>
								<input type="file" id="img2" name="img2" class="dropify" accept="image/*"/>
							</div>
							<div class="col-lg-6">
								<label for="img3">Imagen 3 del producto</label>
								<input type="file" id="img3" name="img3" class="dropify" accept="image/*"/>
							</div>
							<div class="col-lg-6">
								<label for="img4">Imagen 4 del producto</label>
								<input type="file" id="img4" name="img4" class="dropify" accept="image/*"/>
							</div>
						</div>
						<div class="row m-t-6">
							<div class="form-actions col-lg-12">
								<button type="submit" id="btn_add" name="btn_add" class="btn btn-primary m-t-n-xs pull-right"><i class="fa fa-save"></i>
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
