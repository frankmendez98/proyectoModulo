<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
	<h2 class="modal-title" style="font-weight: bold">Actualizar estado de orden</h2>
</div>

<div class="modal-body">
	<div class="form-group">
		<label>Orden</label><br>
		<input type="text" class="form-control" disabled value="<?=$row->numero_orden?>">
	</div>
	<?php if($id_estado==3): ?>
		<div class="form-group">
			<label>Nuevo estado</label><br>
			<input type="text"  class="form-control" disabled value="ENTREGADO">
			<input type="hidden" name="id_estado" id="id_estado" value="4">
		</div>
	<?php else: ?>
		<div class="form-group">
			<label>Nuevo estado</label><br>
			<select name="id_estado" id="id_estado" class="form-control select2" style="width: 100%">
				<?php foreach ($rows as $row): ?>
					<option value="<?=$row->id_estado?>"><?=$row->descripcion?></option>
				<?php endforeach; ?>
			</select>
		</div>
	<?php endif; ?>
</div>
<div class="modal-footer">
	<input type="hidden" name="id_orden" id="id_orden" value="<?=$id_orden?>">
	<button type="button" class="btn btn-white" data-dismiss="modal">Cerrar</button>
	<button type="button" class="btn btn-primary" id="btn_add">Guardar</button>
</div>

<script>
	$(".select2").select2();

	$("#btn_add").on('click', function(e){
		e.preventDefault();
		let id_estado = $("#id_estado").val()
		let id_orden = $("#id_orden").val()
		save_data(id_estado,id_orden)
	});
</script>
