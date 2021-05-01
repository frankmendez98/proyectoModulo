<div class="modal-header">
   <button type="button" class="close" data-dismiss="modal">×</button>
   <h3>Ver detalles</h3>
</div>
<div class="modal-body">
  <div class="row">
    <div class="col-md-12">
      <h4>Concepto: <?php echo $concepto ?></h4>
    </div>
    <div class="col-md-12">
      <h4>Tipo de movimiento: <?php echo $tipo ?></h4>
      <h4>Fecha: <?php echo $fecha ?></h4>
    </div>
    <div class="col-md-12">
      <table class="table table-striped table-bordered table-hover table-checkable">
        <thead>
          <tr>
            <th class='col-md-8'>Descripción</th>
            <th class='col-md-1'>Precio</th>
            <th class='col-md-1'>Cantidad</th>
            <th class='col-md-2'>Sub Total</th>
          </tr>
        </thead>
        <tbody>
          <?php
            foreach($detalle as $row)
            {
            	$descripcion = $row['descripcion'];
              if($row["talla"]->talla != "")
              {
                $descripcion = $descripcion." - TALLA ".$row["talla"]->talla;
              }
            	$cantidad = $row['cantidad'];
            	$precio = $row['precio'];
              $subtotal = number_format(round($cantidad * $precio, 2), 2,'.',',');
              echo "<tr>";
              echo "<td>".$descripcion."</td>";
              echo "<td style='text-align:right;'>$".number_format($precio,2,'.',',')."</td>";
              echo "<td style='text-align:right;'>".$cantidad."</td>";
              echo "<td style='text-align:right;'>$".$subtotal."</td>";
              echo "</tr>";
            }
          ?>
        </tbody>
        <tfoot>
          <tr>
            <th class='col-md-8'>Total</th>
            <th class='col-md-1'></th>
            <th class='col-md-1'></th>
            <th class='col-md-2' style="text-align: right;">$<?php echo number_format($total, 2, '.', ','); ?></th>
          </tr>
        </tfoot>
      </table>
    </div>
  </div><!--/row-->
</div><!-- /modal-body -->
<div class="modal-footer">
  <a class="btn" data-dismiss="modal">Close</a>
  <!-- <a class="btn btn-success" id='btnStock'>Cargar</a> -->
</div>
