<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
	<h2 class="modal-title" style="font-weight: bold">Agregar Producto Destacado</h2>
</div>

<div class="modal-body">
	<div class="form-group">
		<label>Producto</label><br>
		<!--<div id="scrollable-dropdown-menu">
			<input type="text" id="producto" class="form-control" placeholder="Busqueda del producto" data-provide="typeahead">
			<input type="hidden" name="id_producto" id="id_producto" >
		</div>-->
		<select name="id_producto" id="id_producto" class="form-control select2" style="width: 100%">
			<option value="0">Seleccione un producto</option>
			<?php foreach ($rows as $row): ?>
			<option value="<?=$row->id_producto?>"><?=$row->descripcion?></option>
			<?php endforeach; ?>
		</select>
	</div>
</div>
<div class="modal-footer">
	<button type="button" class="btn btn-white" data-dismiss="modal">Cerrar</button>
	<button type="button" class="btn btn-primary" id="btn_add">Guardar</button>
</div>

<script>
	$(".select2").select2();

	$("#btn_add").on('click', function(e){
		e.preventDefault();
		let id_producto = $("#id_producto").val()
		save_data(id_producto)
	});
</script>
