
<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<div class="wrapper wrapper-content">
	<div class="row">
		<div class="col-lg-12">
			<div class="ibox" id="main_view">
				<div class="ibox-title">
					<h3 class="text-navy"><b><i class="fa fa-plus-circle"></i> Editar Producto</b></h3>
				</div>
				<div class="ibox-content">
					<form id="form_edit" novalidate>
						<div class="row">
							<div class="col-lg-3">
								<div class="form-group single-line">
									<label for="descripcion">Nombre</label>
									<input type="text" name="descripcion_nombre" id="descripcion_nombre" class="form-control mayu"  placeholder="Ingrese una descripcion"
										   required data-parsley-trigger="change" value="<?=$row->descripcion?>">
								</div>
							</div>
							<div class="col-lg-3">
								<div class="form-group single-line">
									<label for="marca">Marca</label>
									<input type="text" name="marca" id="marca" class="form-control mayu"  placeholder="Ingrese una marca"
										   required data-parsley-trigger="change" value="<?=$row->marca?>">
								</div>
							</div>
							<div class="col-lg-3">
								<div class="form-group single-line">
									<label for="id_categoria">Categoria</label><br>
									<select name="id_categoria" id="id_categoria" class="form-control select2" data-parsley-trigger="change">
										<?php foreach ($categorias as $rows): ?>
											<option value="<?=$rows->id_categoria?>"
												<?php if ($rows->id_categoria == $row->id_categoria): ?>
													<?= "selected" ?>
												<?php endif; ?>
											> <?= $rows->nombre_cat ?> </option>
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
												<option value="<?=$sub->id_subcategoria?>" <?php if($row->id_subcategoria==$sub->id_subcategoria){ echo " selected  "; } ?>><?=$sub->nombre_cat?></option>
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
									<input type="text" name="precio" id="precio" class="form-control"  placeholder="Ingrese un precio" value="<?=$precio?>" required data-parsley-trigger="change">
								</div>
							</div>
							<div class="col-lg-3">
								<div class="form-group single-line">
									<label for="">Tipo de Producto</label><br>
									<label class="radio-inline"><input type="radio" name="tipo_producto" id="tipo_producto1" value="VIRTUAL" <?php if($tipo_producto=="VIRTUAL") echo "checked"; ?> >VIRTUAL</label>
									<label class="radio-inline"><input type="radio" name="tipo_producto" id="tipo_producto2" value="FISICO" <?php if($tipo_producto=="FISICO") echo "checked"; ?> >FISICO</label>
								</div>
							</div>
							<div class="col-lg-3 stock" hidden>
								<div class="form-group single-line">
									<label for="">Producto con tallas</label><br>
									<label class="radio-inline"><input type="radio" name="ttalla" id="talla1" <?php if($row->talla){ echo "checked"; } ?> value="SI">SI</label>
									<label class="radio-inline"><input type="radio" name="ttalla" id="talla2" <?php if(!$row->talla){ echo "checked"; } ?> value="No">No</label>
								</div>
							</div>
						<div class="col-lg-3 ntall stock" hidden>
							<div class="form-group single-line">
								<label for="stock">Stock</label>
								<input type="text" name="stock" id="stock" class="form-control numeric"  value="<?=$row->stock?>" placeholder="" data-parsley-trigger="change">
							</div>
						</div>
						</div>

							<div class="row tallas stock" hidden>
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
							</div>
							<div class="row tallas stock" hidden>
							<div class="col-lg-3">
								<table class="table table-bordered table-hover table-striped">
									<thead>
										<tr>
											<th class="col-lg-5">Talla</th>
											<th class="col-lg-5">Existencia</th>
											<th class="col-lg-2">Acciones</th>
										</tr>
									</thead>
									<tbody id="tallas_table">
										<?php
										 	if($tallas != 0)
											{
												foreach ($tallas as $talla) {
													echo "<tr id='".$talla->id_talla."'>";
													echo "<td><input type='text' class='form-control tall' value='".$talla->talla."' style='width:80px;'></td>";
													echo "<td><input type='text' class='form-control cant' value='".$talla->cantidad."' style='width:80px;'></td>";
													echo "<td><a class='btn btn-danger deltre' idt='".$talla->id_talla."'><i class='fa fa-trash'></i></a></td>";
													echo "</tr>";
												}
											}
										 ?>
									</tbody>
								</table>
							</div>
							</div>

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
								<?php
										// print_r($tipos_list);
								  	echo $list;
								?>
							</div>
							<div class="row">
								<div class="col-lg-12">
									<div class="form-group single-line">
										<label for="">Descripcion del producto</label>
										<textarea class="form-control" name="desc_larga" rows="3" required data-parsley-trigger="change" placeholder="Ingrese una descripcion"><?=$row->desc_larga?></textarea>
									</div>
								</div>
								</div>
							<div class="row">
							<div class="col-lg-6">
								<label for="foto">Imagen principal</label>
								<input type="file" id="foto" name="foto" class="dropify" accept="image/*" data-default-file="<?php if($row->imagen!="") echo base_url("assets/".$row->imagen)?>"/>
							</div>

							<div class="col-lg-6">
								<label for="img2">Imagen 2 del producto</label>
								<input type="file" id="img2" name="img2" class="dropify" accept="image/*" data-default-file="<?php if($row->img2!="")echo base_url("assets/".$row->img2)?>"/>
							</div>
							<div class="col-lg-6">
								<label for="img3">Imagen 3 del producto</label>
								<input type="file" id="img3" name="img3" class="dropify" accept="image/*" data-default-file="<?php if($row->img3!="")echo base_url("assets/".$row->img3)?>"/>
							</div>
							<div class="col-lg-6">
								<label for="img4">Imagen 4 del producto</label>
								<input type="file" id="img4" name="img4" class="dropify" accept="image/*" data-default-file="<?php if($row->img4!="")echo base_url("assets/".$row->img4)?>"/>
							</div>
						</div>
						<div class="row m-t-10">
							<div class="form-actions col-lg-12">
								<input type="hidden" name="id_producto" value="<?=$row->id_producto?>">
								<button type="submit" id="btn_edit" name="btn_edit" class="btn btn-primary m-t-n-xs pull-right"><i class="fa fa-save"></i>
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
