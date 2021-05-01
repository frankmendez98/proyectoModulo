<div class="modal-header">
   <button type="button" class="close" data-dismiss="modal">×</button>
   <h3>Gestion de inventario</h3>
</div>
<div class="modal-body">
  <div class="row">
    <div class="col-md-12">
      <h2 style='text-align:center'><?php echo $descripcion; ?></h2>
    </div>
    <div class="col-md-12">
      <?php
        if($stock != 0)
        {
          echo "<h3 style='text-align:center'>Este producto actualmente contiene ".round($stock)." existencias</h3>";
        }
        else
        {
          echo "<h3 style='text-align:center'>Este producto actualmente no contiene existencias</h3>";
        }
      ?>
    </div>
    <div class="col-md-12">
      <h5 for="" style="text-align:center;">Si desea agregar nuevas existencias o ajustar el inventario puede hacerlo en el siguiente campo</h5>

    </div>
    <div class="col-md-12">
      <div class="col-md-4">

      </div>
      <div class="col-md-4">
        <input type="text" class="form-control decimal" name="cantidad" id="cantidad" value="">
      </div>
    </div>

  </div><!--/row-->
  <input type="hidden" name="id" id="id" value="<?php echo $id;?>">
  <input type="hidden" name="precio" id="precio" value="<?php echo $precio;?>">
  <input type="hidden" name="fecha" id="fecha" value="<?php echo date('d-m-Y');?>">
</div><!-- /modal-body -->
<div class="modal-footer">
  <a class="btn btn-success" id='btnStock' style="background-color: #3C0087;"><i class='fa fa-upload'></i> Cargar</a>
  <a class="btn btn-warning" id='btnAjuste' style="background-color: #F5B700"><i class='fa fa-balance-scale'></i> Ajustar</a>
  <a class="btn" data-dismiss="modal"><i class='fa fa-close'></i> Cerrar</a>
</div>
<script type="text/javascript">
  $(".decimal").numeric({decimal: false, negative: false});
</script>
